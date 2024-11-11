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
    public $loading = false;

    public function mount($errors, $dependent = [], $id = null)
    {
        if (!empty($id)) {
            $employee = Employee::find($id);
            $this->employee = $employee;
        }
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
                array_push($this->data, $def);
            }
        } else {
            foreach ($dependent as $item) {
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
                $d['de-age'] = $item->age;
                $d['de-occupation'] = $item->occupation;
                $d['de-annual_income'] = $item->annual_income;
                $d['de-contact'] = $item->contact;
                $d['de-date_of_authorisation'] = $item->date_of_authorisation;
                $d['de-date_of_expiry'] = $item->date_of_expiry;
                $d['de-dependent_type'] = $item->dependent_type;
                $d['de-mynumber_card_no'] = $item->mynumber_card_no;
                $d['de-pension_no'] = $item->pension_no;
                $d['de-other_1'] = $item->other_1;
                $d['de-other_2'] = $item->other_2;
                $d['de-history_flg'] = $item->history_flg;
                array_push($this->data, $d);
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

    public function append()
    {
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->data, $this->defaultValues());
        $this->dispatch('form-appended');
    }

    #[On('dependent-form-loaded')]
    public function dependentFormLoaded()
    {
        $this->loading = false;
    }

    #[On('active-state')]
    public function changeAccordionState($data)
    {
        foreach ($data as $d) {
            $i = $d['index'];
            $v = $d['value'];
            $this->data[$i]['de-class_content'] = $v;
        }
    }

    public function remove($index)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->data[$index]);
        $this->data = array_values($this->data);
        $this->loading = false;
    }

    public function history($index)
    {
        if ($this->loading) return;
        $this->data[$index]['de-history_flg'] = 1;
        $this->dispatch('history_flg-change', ['index' => $index]);
    }

    private function defaultValues()
    {
        $defaultValues = [
            'de-class_content' => 'content active',
            'de-id' => 0,
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
            'de-other_1' => '',
            'de-other_2' => '',
            'de-history_flg' => 0,
        ];

        return $defaultValues;
    }
}
