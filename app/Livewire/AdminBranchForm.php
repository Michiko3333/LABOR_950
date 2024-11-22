<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Branch;
use App\Models\Hello_work;
use App\Models\Labor_bureau;
use App\Models\Labor_supervision;
use App\Models\Pension_office;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Values_branch_branch_type;

class AdminBranchForm extends Component
{
    public $data = [];
    public $company = null;
    public $branch_types = [];
    public $errs = [];
    public $prefectures = [];
    public $labor_insurance_payment_method = [];
    public $place_type = [];
    public $start_days_of_week = [];
    public $work_style_type = [];
    public $hello_work_id = [];
    public $loading = false;
    public $departments;
    public $salary;
    public $bonus;
    public $bounty;
    public $id;

    public $labor_bureau_names = [];
    public $labor_supervision_names = [];
    public $pension_office_names = [];

    public function mount($errors, $branch = [], $departments,$salary = [],$bonus = [],$bounty = [],$prefectures = [], 
    $labor_insurance_payment_method = [], $place_type = [], $start_days_of_week = [], $work_style_type = [], $id = null)
    {
        if (!empty($id)) {
            $company = Company::find($id);
            $this->company = $company;
        }
        $this->prefectures = $prefectures;
        $this->labor_insurance_payment_method = $labor_insurance_payment_method;
        $this->place_type = $place_type;
        $this->start_days_of_week = $start_days_of_week;
        $this->work_style_type = $work_style_type;
        $this->branch_types = Values_branch_branch_type::pluck('name', 'id')->toArray();
        $this->hello_work_id = Hello_work::pluck('name', 'id')->toArray();
        $this->departments = $departments;
        $this->salary = $salary;
        $this->bonus = $bonus;
        $this->bounty = $bounty;
        $this->id = $id;

        $this->labor_bureau_names = Labor_bureau::distinct()->select('submit_name_jk')->get()->pluck('submit_name_jk');
        $this->labor_supervision_names = Labor_supervision::distinct()->select('submit_name_hij')->get()->pluck('submit_name_hij');
        $this->pension_office_names = Pension_office::select('submit_name_f', 'id')->whereNotNull('submit_name_f')->pluck('submit_name_f', 'id');

        $c_ar = \old('br-name');
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($i, $oldValue)) {
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
                $d['br-address_city_kana'] = $item->address_city_kana;
                $d['br-address_ward_kana'] = $item->address_ward_kana;
                $d['br-address_apartment_kana'] = $item->address_apartment_kana;
                $fax = $item->fax;
                $fax_parts = preg_split('/-/', $fax);
                $d['br-fax1'] = isset($fax_parts[0]) ? $fax_parts[0] : null;
                $d['br-fax2'] = isset($fax_parts[1]) ? $fax_parts[1] : null;
                $d['br-fax3'] = isset($fax_parts[2]) ? $fax_parts[2] : null;
                $d['br-mail_address'] = $item->mail_address;
                $d['br-name'] = $item->name;
                $d['br-tel_area_code'] = $item->tel_area_code;
                $d['br-tel_city_code'] = $item->tel_city_code;
                $d['br-tel_subscriber_code'] = $item->tel_subscriber_code;
                $d['br-tel_overseas'] = $item->tel_overseas;
                $d['br-place_type'] = $item->place_type;
                $d['br-branch_type'] = $item->branch_type;
                $d['br-labor_insurance_no'] = $item->labor_insurance_no;
                $d['br-labor_insurance_payment_method'] = $item->labor_insurance_payment_method;
                $d['br-labor_insurance_establishment_date'] = $item->labor_insurance_establishment_date;
                $d['br-insurance_office_no'] = $item->insurance_office_no;
                $d['br-insurance_office_reference_no'] = $item->insurance_office_reference_no;
                $d['br-pension_office_no'] = $item->pension_office_no;
                $d['br-pension_office_reference_prefecture'] = $item->pension_office_reference_prefecture;
                $d['br-pension_office_reference_no_cities'] = $item->pension_office_reference_no_cities;
                $d['br-pension_office_reference_no_office'] = $item->pension_office_reference_no_office;
                $d['br-pension_office_id'] = $item->pension_office_id;
                $d['br-employment_insurance_office_no'] = $item->employment_insurance_office_no;
                $d['br-employment_insurance_establishment_date'] = $item->employment_insurance_establishment_date;
                $d['br-hello_work_id'] = $item->hello_work_id;
                $d['br-labor_bureau_name'] = $item->labor_bureau_name;
                $d['br-labor_supervision_name'] = $item->labor_supervision_name;
                $d['br-start_date_of_month'] = $item->start_date_of_month;
                $d['br-start_days_of_week'] = $item->start_days_of_week;
                $d['br-start_time_of_day'] = $item->start_time_of_day;
                $d['br-work_time_start'] = $item->work_time_start;
                $d['br-work_time_end'] = $item->work_time_end;
                $d['br-agreed_hours_year_h'] = $item->agreed_hours_year_h;
                $d['br-agreed_hours_year_m'] = $item->agreed_hours_year_m;
                $d['br-agreed_hours_month_h'] = $item->agreed_hours_month_h;
                $d['br-agreed_hours_month_m'] = $item->agreed_hours_month_m;
                $d['br-agreed_hours_week_h'] = $item->agreed_hours_week_h;
                $d['br-agreed_hours_week_m'] = $item->agreed_hours_week_m;
                $d['br-agreed_hours_day_h'] = $item->agreed_hours_day_h;
                $d['br-agreed_hours_day_m'] = $item->agreed_hours_day_m;
                $d['br-working_days_yearly'] = $item->working_days_yearly;
                $d['br-working_days_monthly'] = $item->working_days_monthly;
                $d['br-holiday_yearly'] = $item->holiday_yearly;
                $d['br-holiday_monthly'] = $item->holiday_monthly;
                $d['br-holiday_legal'] = $item->holiday_legal;
                $d['br-holiday_not_logal'] = $item->holiday_not_logal;
                $d['br-work_style_type'] = $item->work_style_type;
                $d['br-labor_insurance_category'] = $item->labor_insurance_category;
                $d['br-kenpo_no'] = $item->kenpo_no;
                $d['br-insurance_office_name'] = $item->insurance_office_name;
                $d['br-insurance_applicable_date'] = $item->insurance_applicable_date;
                $d['br-pension_office_name'] = $item->pension_office_name;
                $d['br-employment_insurance_rate'] = $item->employment_insurance_rate;
                $d['br-rate_pattern_id'] = $item->rate_pattern_id;
                $d['br-fractional_adjustment_pattern_id'] = $item->fractional_adjustment_pattern_id;
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
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->data, $this->defaultValues());
        $this->dispatch('form-appended', count($this->data));
    }

    #[On('branch-form-loaded')]
    public function branchFormLoaded()
    {
        $this->loading = false;
    }

    #[On('active-state')]
    public function changeAccordionState($data)
    {
        foreach ($data as $d) {
            $i = $d['index'];
            $v = $d['value'];
            $this->data[$i]['br-class_content'] = $v;
        }
        $this->dispatch('change-state');
    }

    public function remove($index)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->data[$index]);
        $this->data = array_values($this->data);
        $this->loading = false;
        $this->dispatch('remove');
    }

    private function defaultValues()
    {
        $defaultValues = [
            'br-class_content' => 'content active',
            'br-id' => 0,
            'br-post_code' => '',
            'br-address_prefecture' => '',
            'br-address_city' => '',
            'br-address_ward' => '',
            'br-address_apartment' => '',
            'br-address_city_kana' => '',
            'br-address_ward_kana' => '',
            'br-address_apartment_kana' => '',
            'br-fax1' => '',
            'br-fax2' => '',
            'br-fax3' => '',
            'br-mail_address' => '',
            'br-name' => '',
            'br-tel_area_code' => '',
            'br-tel_city_code' => '',
            'br-tel_subscriber_code' => '',
            'br-tel_overseas' => '',
            'br-place_type' => 1,
            'br-branch_type' => 1,
            'br-labor_insurance_no' => '',
            'br-labor_insurance_payment_method' => '',
            'br-labor_insurance_establishment_date' => '',
            'br-insurance_office_no' => '',
            'br-insurance_office_reference_no' => '',
            'br-pension_office_no' => '',
            'br-pension_office_id' => '',
            'br-employment_insurance_office_no' => '',
            'br-employment_insurance_establishment_date' => '',
            'br-pension_office_reference_prefecture' => '',
            'br-pension_office_reference_no_cities' => '',
            'br-pension_office_reference_no_office' => '',
            'br-hello_work_id' => '',
            'br-labor_bureau_name' => '',
            'br-labor_supervision_name' => '',
            'br-start_date_of_month' => '',
            'br-start_days_of_week' => '',
            'br-start_time_of_day' => '',
            'br-work_time_start' => '',
            'br-work_time_end' => '',
            'br-agreed_hours_year_h' => '',
            'br-agreed_hours_year_m' => '',
            'br-agreed_hours_month_h' => '',
            'br-agreed_hours_month_m' => '',
            'br-agreed_hours_week_h' => '',
            'br-agreed_hours_week_m' => '',
            'br-agreed_hours_day_h' => '',
            'br-agreed_hours_day_m' => '',
            'br-working_days_yearly' => '',
            'br-working_days_monthly' => '',
            'br-holiday_yearly' => '',
            'br-holiday_monthly' => '',
            'br-holiday_legal' => '',
            'br-holiday_not_logal' => '',
            'br-work_style_type' => '',
            'br-labor_insurance_category' => '',
            'br-kenpo_no' => '',
            'br-insurance_office_name' => '',
            'br-insurance_applicable_date' => '',
            'br-pension_office_name' => '',
            'br-employment_insurance_rate' => '',
            'br-rate_pattern_id' => '',
            'br-fractional_adjustment_pattern_id' => '',
        ];

        if ($this->company !== null) {
            $companyID = $this->company->id;

            $headquarters = Branch::where('company_id', $companyID)
                ->where('branch_type', 1)
                ->exists();

            if ($headquarters) {
                $defaultValues['br-branch_type'] = 2;
            }
        } else {
            $defaultValues['br-branch_type'] = 1;
        }
        return $defaultValues;
    }
}
