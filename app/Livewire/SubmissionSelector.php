<?php

namespace App\Livewire;

use App\Models\Hello_work;
use App\Models\Pension_office;
use App\Models\Prefecture;
use Livewire\Component;

class SubmissionSelector extends Component
{
    public $prefectures = [];
    public $selected_prefecture = '';

    public $hello_work_list = [];
    public $selected_hello_work = '';

    public $pension_office_list = [];
    public $selected_pension_office = '';

    public $apply_to_code = '';
    public $apply_to_name = '';

    public $mode = 0;

    private $old_value = '';
    private $old_value_hw = '';
    private $old_value_po = '';

    public function mount($mode = 0)
    {
        $this->mode = $mode;
        $this->old_value = \old('selected_prefecture');
        $this->old_value_hw = \old('selected_hello_work');
        $this->old_value_po = \old('selected_pension_office');
        $this->apply_to_code = \old('apply_to_code');
        $this->apply_to_name = \old('apply_to_name');
    }

    public function render()
    {

        $this->prefectures = Prefecture::get();

        if (!empty($this->old_value)) {
            $this->selected_prefecture = $this->old_value;
            $this->old_value = '';
        }
        if (!empty($this->old_value_hw) && $this->mode === 0) {
            $this->selected_hello_work = $this->old_value_hw;
            $this->old_value_hw = '';
        }
        if (!empty($this->old_value_po) && $this->mode === 1) {
            $this->selected_pension_office = $this->old_value_po;
            $this->old_value_po = '';
        }

        if ($this->mode === 0) {
            // m_hellow_work
            $this->hello_work_list = Hello_work::whereNotNull('submit_union_name_d')->whereNotNull('identifier_d')->where('address_prefecture', $this->selected_prefecture)->get();
            $hello_work_list_ids = $this->hello_work_list->pluck('id')->toArray();
            if (!empty($this->selected_hello_work)) {
                if (array_search($this->selected_hello_work, $hello_work_list_ids) === false) {
                    $this->selected_hello_work = '';
                    $this->apply_to_code = '';
                    $this->apply_to_name = '';
                } else {
                    $hello_work = Hello_work::select('identifier_d', 'submit_union_name_d')->where('id', $this->selected_hello_work)->first();
                    $this->apply_to_code = $hello_work->identifier_d;
                    $this->apply_to_name = $hello_work->submit_union_name_d;
                }
            }
        } else if ($this->mode === 1) {
            // m_pension_office
            $this->pension_office_list = Pension_office::whereNotNull('submit_union_name_e')->whereNotNull('identifier_e')->where('address_prefecture', $this->selected_prefecture)->get();
            $pension_office_list_ids = $this->pension_office_list->pluck('id')->toArray();
            if (!empty($this->selected_pension_office)) {
                if (array_search($this->selected_pension_office, $pension_office_list_ids) === false) {
                    $this->selected_pension_office = '';
                    $this->apply_to_code = '';
                    $this->apply_to_name = '';
                } else {
                    $pension_office = Pension_office::select('identifier_e', 'submit_union_name_e')->where('id', $this->selected_pension_office)->first();
                    $this->apply_to_code = $pension_office->identifier_e;
                    $this->apply_to_name = $pension_office->submit_union_name_e;
                }
            }
        }


        return view('livewire.submission-selector');
    }
}
