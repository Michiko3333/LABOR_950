<?php

namespace App\Livewire;

use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Values_branch_branch_type;

class AdminBranchForm extends Component
{
    public $data = [];
    public $branch_types = [];
    public $errs = [];
    public $prefectures = [];
    public $insuranceTypes = [];

    public function mount($errors, $branch = [], $prefectures = [], $insuranceTypes = [])
    {
        $this->prefectures = $prefectures;
        $this->insuranceTypes = $insuranceTypes;
        $this->branch_types = Values_branch_branch_type::pluck('name', 'id')->toArray();
        $c_ar = \old('br-name');
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue)) {
                        $def[$key] = $oldValue[$i];
                    }
                }
                array_push($this->data, $def);
            }
        } else {
            foreach ($branch as $item) {
                $d = $this->defaultValues();
                $d['br-id'] = $item->id;
                $d['br-post_code'] = $item->post_code;
                $d['br-address_prefecture'] = $item->address_prefecture;
                $d['br-address_city'] = $item->address_city;
                $d['br-address_ward'] = $item->address_ward;
                $d['br-address_apartment'] = $item->address_apartment;
                $d['br-name'] = $item->name;
                $d['br-tel_area_code'] = $item->tel_area_code;
                $d['br-tel_city_code'] = $item->tel_city_code;
                $d['br-tel_subscriber_code'] = $item->tel_subscriber_code;
                $d['br-tel_overseas'] = $item->tel_overseas;
                $d['br-place_type'] = $item->place_type;
                $d['br-branch_type'] = $item->branch_type;
                $d['br-labor_insurance_no'] = $item->labor_insurance_no;
                $d['br-labor_insurance_payment_method'] = $item->labor_insurance_payment_method;
                $d['br-insurance_type_id'] = $item->insurance_type_id;
                $d['br-labor_insurance_establishment_date'] = $item->labor_insurance_establishment_date;
                $d['br-insurance_office_no'] = $item->insurance_office_no;
                $d['br-insurance_office_reference_no'] = $item->insurance_office_reference_no;
                $d['br-pension_office_no'] = $item->pension_office_no;
                $d['br-pension_office_reference_no'] = $item->pension_office_reference_no;
                $d['br-pension_office_id'] = $item->pension_office_id;
                $d['br-employment_insurance_office_no'] = $item->employment_insurance_office_no;
                $d['br-employment_insurance_establishment_date'] = $item->employment_insurance_establishment_date;
                $d['br-hello_work_id'] = $item->hello_work_id;
                $d['br-labor_bureau_id'] = $item->labor_bureau_id;
                $d['br-labor_supervision_id'] = $item->labor_supervision_id;
                $d['br-start_date_of_month'] = $item->start_date_of_month;
                $d['br-start_days_of_week'] = $item->start_days_of_week;
                $d['br-start_time_of_day'] = $item->start_time_of_day;
                $d['br-work_time_start'] = $item->work_time_start;
                $d['br-work_time_end'] = $item->work_time_end;
                $d['br-agreed_hours_year'] = $item->agreed_hours_year;
                $d['br-agreed_hours_month'] = $item->agreed_hours_month;
                $d['br-agreed_hours_week'] = $item->agreed_hours_week;
                $d['br-agreed_hours_day'] = $item->agreed_hours_day;
                $d['br-working_days_yearly'] = $item->working_days_yearly;
                $d['br-working_days_monthly'] = $item->working_days_monthly;
                $d['br-holiday_yearly'] = $item->holiday_yearly;
                $d['br-hoiday_monthly'] = $item->hoiday_monthly;
                $d['br-holiday_legal'] = $item->holiday_legal;
                $d['br-holiday_not_logal'] = $item->holiday_not_logal;
                $d['br-work_style_type'] = $item->work_style_type;
                array_push($this->data, $d);
            }
        }

        if (count($this->data) < 1) {
            array_push($this->data, $this->defaultValues());
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                array_push($this->errs, $value);
            }
        }
    }
    public function render()
    {
        return view('livewire.admin-branch-form');
    }

    public function append()
    {
        array_push($this->data, $this->defaultValues());
        $this->dispatch('form-appended');
    }

    #[On('active-state')]
    public function changeAccordionState($data)
    {
        foreach ($data as $d) {
            $i = $d['index'];
            $v = $d['value'];
            $this->data[$i]['br-class_content'] = $v;
        }
    }

    public function remove($index)
    {
        unset($this->data[$index]);
        $this->data = array_values($this->data);
    }

    private function defaultValues()
    {
        return [
            'br-class_content' => 'content active',
            'br-id' => 0,
            'br-post_code' => '',
            'br-address_prefecture' => '',
            'br-address_city' => '',
            'br-address_ward' => '',
            'br-address_apartment' => '',
            'br-name' => '',
            'br-tel_area_code' => '',
            'br-tel_city_code' => '',
            'br-tel_subscriber_code' => '',
            'br-tel_overseas' => '',
            'br-place_type' => 1,
            'br-branch_type' => 1,
            'br-labor_insurance_no' => '',
            'br-labor_insurance_payment_method' => '',
            'br-insurance_type_id' => '',
            'br-labor_insurance_establishment_date' => '',
            'br-insurance_office_no' => '',
            'br-insurance_office_reference_no' => '',
            'br-pension_office_no' => '',
            'br-pension_office_id' => '',
            'br-employment_insurance_office_no' => '',
            'br-employment_insurance_establishment_date' => '',
            'br-hello_work_id' => '',
            'br-labor_bureau_id' => '',
            'br-labor_supervision_id' => '',
            'br-start_date_of_month' => '',
            'br-start_days_of_week' => '',
            'br-start_time_of_day' => '',
            'br-work_time_start' => '',
            'br-work_time_end' => '',
            'br-agreed_hours_year' => '',
            'br-agreed_hours_month' => '',
            'br-agreed_hours_week' => '',
            'br-agreed_hours_day' => '',
            'br-working_days_yearly' => '',
            'br-working_days_monthly' => '',
            'br-holiday_yearly' => '',
            'br-hoiday_monthly' => '',
            'br-holiday_legal' => '',
            'br-holiday_not_logal' => '',
            'br-work_style_type' => '',
        ];
    }
}
