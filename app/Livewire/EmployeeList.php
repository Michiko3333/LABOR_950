<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class EmployeeList extends BaseTable
{
    public $search = '';
    public $branch_name = '';
    public $type = 0;
    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $currentCompanyId = $currentCompany->id;
        $condition = Employee::select(['m_employee.id', 'last_name', 'first_name', 'position.name as position_name', 'branch.name as branch_name'])
            ->leftJoin('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
            ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
            ->leftJoin('m_managerial_position as position', 'position.id', '=', 'managerial_position_id')
            ->where('company.id', $currentCompanyId);

        /*
        $condition = Employee::select([
            'm_employee.id as id',
            'branch.name as branch_name',
            DB::raw('COALESCE(managerial_position.name, "") AS managerial_position_name'),
            'last_name',
            'first_name',
            'division_name'
        ])->leftJoin('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
            ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
            ->leftJoin('m_managerial_position as managerial_position', 'm_employee.managerial_position_id', '=', 'managerial_position.id')
            ->where('m_employee.delete_flg', 0)
            ->where('company.id', $currentCompanyId);
            */
        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, first_name)"), 'LIKE', $pat);
        }


        $this->data = $this->getData($condition);
        $items = $this->data['items'];
        foreach ($items as &$item) {
            $item->departments = Employee_department::select('name')
                ->leftJoin('m_department as dep', 'm_employee_department.department_id', '=', 'dep.id')
                ->where('employee_id', $item->id)
                ->pluck('name');
        }

        return view('livewire.employee-list');
    }
    #[On('request-reload')]
    public function handleRequestReload($data)
    {
        $this->company_name = $data['name'];
    }
    public function toEdit($id)
    {
        $items = $this->data['items'];
        redirect()->route('employee_update', ['id' => $id]);
    }
}
