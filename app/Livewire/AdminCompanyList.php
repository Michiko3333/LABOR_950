<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\Company;
use App\Models\Values_company_listed_type;
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

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);
        $this->subList = $this->getSubList();

        return view('livewire.admin-company-list');
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
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');

        return [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes
        ];
    }
}
