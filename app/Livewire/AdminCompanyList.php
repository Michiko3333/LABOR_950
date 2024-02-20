<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;

class AdminCompanyList extends Component
{
    public $data = [];
    public $subList = [];
    public function render()
    {
        $this->data = $this->getData();
        $this->subList = $this->getSubList();

        return view('livewire.admin-company-list');
    }

    public function toEdit($id)
    {
        redirect()->route('admin.company_update', ['id' => $id]);
    }

    private function getData()
    {
        $d = Company::select(
            'id',
            'name',
            'company_no',
            'company_type_id',
            'business_type',
            'company_division',
            'company_no'
        )->where('delete_flg', 0)->get();
        return $d;
    }

    private function getSubList()
    {
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');

        \Log::info(print_r($businessTypes, true));

        return [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes
        ];
    }
}
