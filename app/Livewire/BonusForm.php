<?php

namespace App\Livewire;

use App\Models\Bonus;
use App\Models\Department;
use App\Models\Bonus_history;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;

class BonusForm extends Component
{
    public $uniqueId;

    public $bonusData = [];
    public $departments = [];
    public $branchId;
    public $childKey;
    public $bonus;
    public $boErrs = [];
    public $loading = false;
    public $bonusHistory;
    public $companyId;

    public function mount($errors, $branchId, $childKey = null, $bonus = [], $companyId)
    {
        $this->uniqueId = str_replace('.', '', uniqid('bonus_', true));

        $bonus = Bonus::where('branch_id', $branchId)->where('delete_flg', 0)->get();
        $this->bonus = $bonus;
        $bonusHistory = Bonus_history::where('branch_id', $branchId)->get();
        $this->bonusHistory = $bonusHistory;
        $this->companyId = $companyId;
        $this->childKey = $childKey;
        $departments = Department::where('company_id', $companyId)->get();
        $this->departments = $departments;
        foreach ($this->bonusHistory as $historyItem) {
            $departmentIds = explode(',', $historyItem->department_id);
            $departmentNames = [];
            foreach ($departmentIds as $id) {
                $department = Department::where('id', $id)->first();
                if ($department) {
                    $departmentNames[] = $department->name;
                }
            }
            $historyItem->department_names = implode('，', $departmentNames);
        }
        $c_ar = \old('bo-applied_date.' . $this->childKey);
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($this->childKey, $oldValue) && array_key_exists($i, $oldValue[$this->childKey])) {

                        $def[$key] = $oldValue[$this->childKey][$i];
                    }
                }
                array_push($this->bonusData, $def);
            }
        } else {
            $mergedData = [];

            foreach ($bonus as $item) {
                $boId = $item['bonus_id'];

                if (!isset($mergedData[$boId])) {
                    $mergedData[$boId] = $item;

                    $mergedData[$boId]['department_id'] = $item['department_id'];
                } else {
                    $mergedData[$boId]['department_id'] .= ',' . $item['department_id'];
                }

                $mergedData[$boId]['bonus_payment_month'] = $item['bonus_payment_month'];
                $applied_date = $item['applied_date'];
                if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $applied_date, $matches)) {
                    $year = $matches[1];
                    $month = intval($matches[2]);
                    $applied_date = "{$year}年{$month}月";
                }
                $mergedData[$boId]['applied_date'] = $applied_date;
            }

            foreach ($mergedData as $boId => $data) {
                $d = $this->defaultValues();
                $d['bo-id'] = $data['bonus_id'];
                $bonus_payment_month = explode('，', $data->bonus_payment_month);
                $d['bo-bonus_payment_month'] = !empty($bonus_payment_month) ? $bonus_payment_month : null;
                $d['bo-applied_date'] = $data['applied_date'];
                $department_id = explode(',', $data->department_id);
                $d['bo-departments'] = !empty($department_id) ? $department_id : null;
                array_push($this->bonusData, $d);
            }
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                $boErrs = $errors->get($value);
                foreach ($boErrs as $boErrs) {
                    array_push($this->boErrs, $value);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.bonus-form', [
            'departments' => $this->departments,
            'childKey' => $this->childKey,
            'bonusHistory' => $this->bonusHistory,
        ]);
    }

    public function bonusAppend()
    {
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->bonusData, $this->defaultValues());
        $this->dispatch('bonus-appended');
    }

    #[On('bonus-form-loaded')]
    public function bonusFormLoaded()
    {
        $this->loading = false;
    }

    public function removebonus($bonusKey)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->bonusData[$bonusKey]);
        $this->bonusData = array_values($this->bonusData);
        $this->loading = false;
        $this->dispatch('bonus-removed');
    }

    private function defaultValues()
    {
        $defaultValues = [
            'bo-id' => 0,
            'bo-key' => str_replace('.', '', uniqid('bonus_', true)),
            'bo-bonus_payment_month' => '',
            'bo-applied_date' => '',
            'bo-departments' => '',
        ];

        return $defaultValues;
    }
}
