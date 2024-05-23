<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Company_type;
use App\Models\Values_company_business_type;

class AdminCompanyList extends BaseTable
{
    public $search = '';

    public $subList = [];

    public function mount($page = 1, $search = '')
    {
        $this->page = $page;
        $this->search = $search;
    }

    public function render()
    {
        $condition = Company::select(
            'id',
            'name',
            'company_no',
            'company_type_id',
            'business_type',
            'company_division',
            'company_no'
        )->where('delete_flg', 0);

        $companies = Company::select('id')->where('delete_flg', 0)->get();

        $employeeSums = [];

        foreach ($companies as $company) {
            $employeeSum = Employee::join('m_branch', 'm_employee.branch_id', '=', 'm_branch.id')
                ->join('m_company', 'm_branch.company_id', '=', 'm_company.id')
                ->select('m_employee.id')
                ->where('m_branch.company_id', $company->id)
                ->where('m_company.delete_flg', 0)
                ->where('m_branch.delete_flg', 0)
                ->count();

            $employeeSums[] = $employeeSum;
        }

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);
        $this->subList = $this->getSubList();

        return view('livewire.admin-company-list', ['employeeSums' => $employeeSums]);
    }

    public function toEdit($id)
    {
        redirect()->route('admin.company_update', ['id' => $id]);
    }

    public function toDepartment($id)
    {
        redirect()->route('admin.company_department_update', ['id' => $id]);
    }

    private function getSubList()
    {
        $company_type = Company_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');

        return [
            'company_type' => $company_type,
            'businessTypes' => $businessTypes
        ];
    }
}
