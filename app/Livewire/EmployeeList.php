<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\Country;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\Employee_qualifications;
use App\Models\Prefecture;
use App\Models\Residential_status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use \Carbon\Carbon;

class EmployeeList extends BaseTable
{
    public $search = '';
    public $branch_name = '';
    public $type = 0;
    public $useColumnFilter = true;
    public $country_type = [];
    public $residential_status = [];

    public function mount()
    {
        $this->residential_status = Residential_status::pluck('content', 'id');
        $this->country_type = Country::pluck('country_name', 'id');
        $this->dispatchFilter();
    }

    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $currentCompanyId = $currentCompany->id;
        $prefectures = Prefecture::pluck('name', 'id');
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
            ->where('company.id', $currentCompanyId);

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);

        $items = $this->data['items'];
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

        return view('livewire.employee-list');
    }

    public function formatDate($d)
    {
        if (empty($d)) return '-';
        return Carbon::parse($d)->format('Y年m月d日');
    }

    #[On('request-reload')]
    public function handleRequestReload($data)
    {
        // $this->company_name = $data['name'];
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

    public function format_insured_status($v)
    {
        if ($v == 1) return '海外勤務者（介護保険適用除外）';
        if ($v == 2) return '育児休業者、産前産後休業者（社会保険免除）';
        if ($v == 3) return '特定第二号被保険者（介護保険負担有）';
        if ($v == 4) return '短期雇用特例被保険者';
        if ($v == 5) return 'その他';
        return $v;
    }

    public function format_acquisition_of_distinction($v)
    {
        if ($v == 1) return '健保・厚年';
        if ($v == 2) return '共済出向';
        if ($v == 3) return '船保任続';
        return $v;
    }

    public function format_overseas_special_exception($v)
    {
        if ($v == 1) return '海外在住';
        if ($v == 2) return '短期在留';
        if ($v == 3) return 'その他';
        return $v;
    }

    public function format_welfare_pension($v)
    {
        if ($v == 1) return '加入';
        return $v;
    }

    public function format_country_id($v)
    {
        return $this->country_type[$v] ?? '日本';
    }

    public function format_residential_status_id($v)
    {
        return $this->residential_status[$v] ?? '-';
    }

    public function format_dispatch_contract_completion($v)
    {
        if ($v == 1) return '特定の事業所に勤務';
        if ($v == 2) return '不特定の事業所に勤務';
        return $v;
    }
}
