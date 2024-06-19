<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Company_type;
use App\Models\Prefecture;
use App\Models\Receptionist;

use Illuminate\Support\Facades\DB;

class ClientList extends BaseTable
{
    public $id;

    public $search = '';

    public $subList = [];

    public function mount($id, $page = 1, $search = '')
    {
        $this->id = $id;
        $this->page = $page;
        $this->search = $search;
    }

    public function render()
    {
        $condition = Company::join('m_branch', 'm_company.id', '=', 'm_branch.company_id')
        ->join('m_receptionist', 'm_company.id', '=', 'm_receptionist.client_company_id')
        ->select(
            'm_company.id as company_id',
            'm_company.name as name',
            'm_company.company_division as company_division',
            'm_company.company_no as company_no',
            'm_company.company_type_id as type_id',
            'm_receptionist.id as receptionist_id',
            'm_branch.address_prefecture as prefecture',
            'm_branch.address_city as city',
            'm_branch.address_ward as ward',
            'm_branch.address_apartment as apartment'
        )
        ->where('m_receptionist.employee_id', $this->id)
        ->where('m_branch.branch_type', 1)
        ->where('m_company.delete_flg', 0);

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('m_company.name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);
        $this->subList = $this->getSubList();

        return view('livewire.client-list');
    }

    private function getSubList()
    {
        $company_type = Company_type::pluck('name', 'id');
        $prefecture = Prefecture::pluck('name', 'id');

        return [
            'company_type' => $company_type,
            'prefecture' => $prefecture
        ];
    }
}
