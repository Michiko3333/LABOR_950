<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\Attendance;
use App\Models\Country;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\Employee_qualifications;
use App\Models\Prefecture;
use App\Models\Residential_status;
use App\Models\Wage;
use App\PdfService\EmployeeListXlsx;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use \Carbon\Carbon;
use App\Formats\EmployeeListFormats;

class EmployeeList extends BaseTable
{
    use EmployeeListFormats;
    public $search = '';
    public $branch_name = '';
    public $type = 0;
    public $useColumnFilter = true;
    public $country_type = [];
    public $residential_status = [];

    public $wage_name = ['給与', '役員報酬'];
    public $bonus_name = ['賞与', '役員賞与'];

    public function mount()
    {
        $this->residential_status = Residential_status::pluck('content', 'id');
        $this->country_type = Country::pluck('country_name', 'id');
        $this->page = request()->get('p', 1);
        $this->paginated = true;
        $this->pageMemory = true;
        $this->dispatchFilter();
    }

    public function render()
    {
        $ids = [];
        $currentCompany = CurrentUser::currentCompany();
        $currentCompanyId = $currentCompany->id;
        $condition = $this->getQueryBase($currentCompanyId);
        $this->data = $this->getData($condition);
        foreach ($this->data['items'] as $item) {
            $ids[] = $item->id;
        }
        $this->RestrictingQueryParameters($ids);
        $this->data['items'] = $this->getFormatData($this->data['items'], $currentCompanyId);

        return view('livewire.employee-list');
    }


    public function toEdit($id)
    {
        $items = $this->data['items'];
        redirect()->route('employee_update', ['id' => $id]);
    }
    public function toPermission($id)
    {
        redirect()->route('employee_permission', ['id' => $id]);
    }

    #[On('export-filter-list')]
    public function exportFilterList()
    {
        $currentCompany = CurrentUser::currentCompany();
        $currentCompanyId = $currentCompany->id;
        $condition = $this->getQueryBase($currentCompanyId);
        $items = $condition->get();
        $items = $this->getFormatData($items, $currentCompanyId);

        $xlsx = new EmployeeListXlsx($items, $this->showColumns);
        $xlsx->run();
        return $xlsx->export();
    }

    private function getQueryBase($currentCompanyId)
    {
        $condition = Employee::select(
            'm_employee.*',
            'branch.name as branch_name',
            'employee_status_val.name as employee_status_name',
            'position.name as managerial_position',
            'labor_insurance_type_val.name as labor_insurance_type_name',
            'emp_insurance_type_val.name as employment_insurance_type_name'
        )
            ->leftJoin('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
            ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
            ->leftJoin('m_managerial_position as position', function ($join) {
                $join->on('position.id', '=', 'managerial_position_id')
                    ->where('position.delete_flg', 0);
            })
            ->leftJoin('m_values_employee_employee_status as employee_status_val', 'm_employee.employee_status', '=', 'employee_status_val.id')
            ->leftJoin('m_values_employee_labor_insurance_type as labor_insurance_type_val', 'm_employee.labor_insurance_type', '=', 'labor_insurance_type_val.id')
            ->leftJoin('m_values_employee_employment_insurance_type as emp_insurance_type_val', 'm_employee.employment_insurance_type', '=', 'emp_insurance_type_val.id')
            ->where('company.id', $currentCompanyId)
            ->where('m_employee.delete_flg', 0);

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', $pat);
        }

        return $condition;
    }

    private function getFormatData($items, $currentCompanyId)
    {
        $prefectures = Prefecture::pluck('name', 'id');
        foreach ($items as &$item) {
            $item->departments = Employee_department::select('name')
                ->where('m_employee_department.delete_flg', 0)
                ->leftJoin('m_department as dep', 'm_employee_department.department_id', '=', 'dep.id')
                ->where('employee_id', $item->id)
                ->where('dep.delete_flg', 0)
                ->pluck('name');

            $item->qualifications = Employee_qualifications::join('m_qualifications', 'm_employee_qualifications.qualifications_id', '=', 'm_qualifications.id')
                ->where('m_employee_qualifications.employee_id', $item->id)
                ->where('m_qualifications.delete_flg', 0)
                ->where('m_employee_qualifications.delete_flg', 0)
                ->pluck('m_qualifications.qualification_name');

            $attendances = Attendance::where('employee_id', $item->id)->where('branch_id', $item->branch_id)->where('company_id', $currentCompanyId)
                ->where('delete_flg', 0)
                ->orderBy('month')->first();

            $item->attendance_month = $attendances->month ?? null;
            $item->actual_working_days = $attendances->actual_working_days ?? null;
            $item->working_days = $attendances->working_days ?? null;
            $item->holidays = $attendances->holidays ?? null;
            $item->absent_days = $attendances->absent_days ?? null;
            $item->paid_leave = $attendances->paid_leave ?? null;
            $item->remaining_paid_leave = $attendances->remaining_paid_leave ?? null;

            $salary = Wage::where('employee_id', $item->id)->where('branch_id', $item->branch_id)->where('company_id', $currentCompanyId)
                ->where('delete_flg', 0)
                ->whereIn('wage_type', $this->wage_name)
                ->orderBy('month')->first();

            $item->w_total_amount = $salary->total_amount ?? null;
            $item->w_wage_base_amount = $salary->wage_base_amount ?? null;
            $item->w_overtime_label = $salary->overtime_label ?? null;
            $item->w_allowance_label = $salary->allowance_label ?? null;
            $item->w_amount = $salary->wage_amount ?? null;

            $bonus = Wage::where('employee_id', $item->id)->where('branch_id', $item->branch_id)->where('company_id', $currentCompanyId)
                ->where('delete_flg', 0)
                ->whereIn('wage_type', $this->bonus_name)
                ->orderBy('month')->first();

            $item->b_total_amount = $bonus->total_amount ?? null;
            $item->b_wage_base_amount = $bonus->wage_base_amount ?? null;
            $item->b_overtime_label = $bonus->overtime_label ?? null;
            $item->b_allowance_label = $bonus->allowance_label ?? null;
            $item->b_amount = $bonus->wage_amount ?? null;

            if (!empty($item->address_prefecture)) {
                $pref = Prefecture::where('id', $item->address_prefecture)->first();
                $item->address_prefecture_name = $pref->name;
            } else {
                $item->address_prefecture_name = '';
            }

            $item->labor_insurance_type = $item->labor_insurance_type_name;
            $item->employment_insurance_type = $item->employment_insurance_type_name;

            $directory = 'photo/' . $currentCompanyId;
            $files = Storage::files($directory);
            $filePath = '';
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $item->id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (empty($filePath)) {
                $filePath = '/img/image.png';
            }
            $item->icon = $filePath;

            $item->address_prefecture_name = $prefectures[$item->address_prefecture];
        }

        return $items;
    }
}
