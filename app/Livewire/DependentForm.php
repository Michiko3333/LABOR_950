<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Dependent;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;

class DependentForm extends Component
{
    public $data = [];
    public $employee = null;
    public $errs = [];
    public $prefectures = [];
    public $historyData = [];
    public $spouseExists;

    protected $listeners = ['spouseFlagUpdated'];

    public function mount($errors, $prefectures = [], $dependent = [], $id = null)
    {
        if (!empty($id)) {
            $employee = Employee::find($id);
            $this->employee = $employee;
        }
        $this->prefectures = $prefectures;
        $c_ar = \old('de-last_name');
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($i, $oldValue)) {
                        $def[$key] = $oldValue[$i];
                    }
                }
                if($def['de-history_flg'] == 0){
                    array_push($this->data, $def);
                }else{
                    array_push($this->historyData, $def);
                }
            }
            $this->spouseExists = empty(array_filter($this->data, function ($item) {
                return isset($item['de-spouse_flag']) && $item['de-spouse_flag'] == 1;
            }));
        } else {
            foreach ($dependent as $item) {
                if ($item['history_flg'] === 0) {
                    $d = $this->defaultValues();
                    $d['de-id'] = $item->id;
                    $d['de-relationship_spouse'] = $item->relationship_spouse;
                    $d['de-relationship_dependent'] = $item->relationship_dependent;
                    $d['de-spouse_flag'] = $item->spouse_flag;
                    $d['de-last_name'] = $item->last_name;
                    $d['de-first_name'] = $item->first_name;
                    $d['de-last_name_kana'] = $item->last_name_kana;
                    $d['de-first_name_kana'] = $item->first_name_kana;
                    $d['de-sex'] = $item->sex;
                    $d['de-birthday'] = $item->birthday;
                    $d['de-occupation'] = $item->occupation;
                    $d['de-annual_income'] = $item->annual_income;
                    $d['de-contact'] = $item->contact;
                    $d['de-date_of_authorisation'] = $item->date_of_authorisation;
                    $d['de-date_of_expiry'] = $item->date_of_expiry;
                    $d['de-dependent_type'] = $item->dependent_type;
                    $d['de-mynumber_card_no'] = $item->mynumber_card_no;
                    $d['de-pension_no'] = $item->pension_no;
                    $d['de-history_flg'] = $item->history_flg;
                    $d['de-insurer_no'] = $item->insurer_no;
                    $d['de-remarks'] = $item->remarks;
                    $d['de-living_type'] = $item->living_type;
                    $d['de-post_code'] = $item->post_code;
                    $d['de-address_prefecture'] = $item->address_prefecture;
                    $d['de-address_city'] = $item->address_city;
                    $d['de-address_ward'] = $item->address_ward;
                    $d['de-address_apartment'] = $item->address_apartment;
                    $d['de-insurance_office_no'] = $item->insurance_office_no;
                    array_push($this->data, $d);
                }
                $this->spouseExists = empty(array_filter($this->data, function ($item) {
                    return isset($item['de-spouse_flag']) && $item['de-spouse_flag'] == 1;
                }));
            }
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                array_push($this->errs, $value);
            }
        }
    }
    public function render()
    {
        return view('livewire.dependent-form');
    }

    function spouseFlagUpdated()
    {
        $this->spouseExists = !$this->spouseExists;
        $this->dispatch('spouseFlagChanged');
    }
    public function append()
    {
        array_push($this->data, $this->defaultValues());
        if(count($this->data) == 1) {
            $this->spouseExists = true;
        }
    }

    #[On('rm-dependent-item')]
    public function removeDependentItem($index)
    {
        if($this->data[$index]['de-spouse_flag'] == 1){
            $this->spouseExists = !$this->spouseExists;
            $this->dispatch('spouseFlagChanged');
        }
        unset($this->data[$index]);
    }

    #[On('history-dependent-item')]
    public function history($index)
    {
        $this->data[$index]['de-history_flg'] = 1;
        if($this->data[$index]['de-spouse_flag'] == 1){
            $this->spouseExists = !$this->spouseExists;
            $this->dispatch('spouseFlagChanged');
        }
        array_unshift($this->historyData, $this->data[$index]);
        unset($this->data[$index]);
        $this->dispatch('history-change',$index);
    }

    private function defaultValues()
    {
        $defaultValues = [
            'lw-accordion' => 1,
            'de-class_content' => 'content active',
            'de-id' => 0,
            'de-key' => str_replace('.', '', uniqid('dependent_', true)),
            'de-relationship_spouse' => '',
            'de-relationship_dependent' => '',
            'de-spouse_flag' => '',
            'de-last_name' => '',
            'de-first_name' => '',
            'de-last_name_kana' => '',
            'de-first_name_kana' => '',
            'de-sex' => '',
            'de-birthday' => '',
            'de-age' => '',
            'de-occupation' => '',
            'de-annual_income' => '',
            'de-contact' => '',
            'de-date_of_authorisation' => '',
            'de-date_of_expiry' => '',
            'de-dependent_type' => '',
            'de-mynumber_card_no' => '',
            'de-pension_no' => '',
            'de-history_flg' => 0,
            'de-insurer_no' => '',
            'de-remarks' => '',
            'de-living_type' => '',
            'de-post_code' => '',
            'de-address_prefecture' => '',
            'de-address_city' => '',
            'de-address_ward' => '',
            'de-address_apartment' => '',
            'de-insurance_office_no' => '',
        ];

        return $defaultValues;
    }
}
