<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class AdminLaborList extends BaseTable
{
    public $search = '';
    public $company_name = '';
    public $type = 0;
    public function render()
    {
        $condition = Employee::select([
            'm_employee.id as id',
            'employee_type',
            'company.name as company_name',
            'last_name',
            'first_name',
            'company_division'
        ])->join('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
            ->join('m_company as company', 'branch.company_id', '=', 'company.id')
            ->where('m_employee.delete_flg', 0);

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', $pat);
        }

        if (!empty($this->company_name)) {
            $pat = '%' . addcslashes($this->company_name, '%_\\') . '%';
            $condition = $condition->where('company.name', 'LIKE', $pat);
        }

        if (!empty($this->type)) {
            $condition->where('company_division', $this->type);
        }

        $this->data = $this->getData($condition);

        return view('livewire.admin-labor-list');
    }
    #[On('request-reload')]
    public function handleRequestReload($data)
    {
        $this->company_name = $data['name'];
    }
    public function toEdit($id)
    {
        $items = $this->data['items'];
        $employee = $items->where('id', $id)->first();
        $company = $employee->branch->company()->first();
        if ($company->company_division == 1) {
            redirect()->route('admin.labor_update', ['id' => $id]);
        } else {
            redirect()->route('admin.employee_update', ['id' => $id]);
        }
    }
    public function toPermission($id)
    {
        redirect()->route('labor_permission', ['id' => $id]);
    }
    public function toAddCompany($id)
    {
        redirect()->route('admin.client', ['id' => $id]);
    }
}
