<?php

namespace App\Livewire;

use Livewire\Component;

class BranchFormItem extends Component
{
    public $company;
    public $item = [];
    public $key = 0;
    public $errs = [];

    public $branch_types = [];
    public $place_type = [];
    public $labor_bureau_names = [];
    public $prefectures = [];
    public $pension_office_names = [];
    public $hello_work_id = [];
    public $labor_insurance_payment_method = [];
    public $labor_supervision_names = [];
    public $start_days_of_week = [];
    public $work_style_type = [];
    public $salary;
    public $bonus;
    public $bounty;

    public $tabs = [];
    public $paymentTabs = [];

    public $departments;

    public function mount($company, $item = [], $key = 0, $list, $tabs, $paymentTabs, $departments, $errs)
    {
        $this->company = $company;
        $this->place_type = $list['place_type'];
        $this->prefectures = $list['prefectures'];
        $this->labor_insurance_payment_method = $list['labor_insurance_payment_method'];
        $this->start_days_of_week = $list['start_days_of_week'];
        $this->work_style_type = $list['work_style_type'];
        $this->branch_types = $list['branch_types'];
        $this->labor_bureau_names = $list['labor_bureau_names'];
        $this->labor_supervision_names = $list['labor_supervision_names'];
        $this->pension_office_names = $list['pension_office_names'];
        $this->hello_work_id = $list['hello_work_id'];
        $this->salary = $list['salary'];
        $this->bonus = $list['bonus'];
        $this->bounty = $list['bounty'];

        $this->tabs = $tabs;
        $this->paymentTabs = $paymentTabs;

        $this->key = $key;
        $this->item = $item;
        $this->departments = $departments;

        $this->errs = $errs;
    }
    public function render()
    {
        return view('livewire.branch-form-item');
    }

    public function switchAccordion()
    {
        $this->item['lw-accordion'] = !$this->item['lw-accordion'];
    }

    public function changeTab($target)
    {
        $this->item['lw-current_tab'] = $target;
    }

    public function changePaymentTab($target)
    {
        $this->item['lw-payment_tab'] = $target;
    }

    public function removeBranch($index)
    {
        $this->dispatch('rm-branch-item', $index);
    }
}
