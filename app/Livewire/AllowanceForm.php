<?php

namespace App\Livewire;

use App\Models\Allowance;
use App\Models\Branch_allowance;
use App\Models\Branch_allowance_history;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;

class AllowanceForm extends Component
{
    public $uniqueId;

    public $allowanceData = [];
    public $departments = [];
    public $branchId;
    public $childKey;
    public $allowance;
    public $alErrs = [];
    public $loading = false;
    public $allowanceHistory;
    public $companyId;
    public $allowance_list;

    public function mount($errors,$branchId, $childKey = null, $allowance = [], $companyId) {
        $this->uniqueId = str_replace('.', '', uniqid('allowance_', true));

        $allowance = Branch_allowance::where('branch_id',$branchId)->where('delete_flg', 0)->get();
        $this->allowance = $allowance;
        $allowanceHistory = Branch_allowance_history::where('branch_id',$branchId)->get();
        $this->allowanceHistory = $allowanceHistory;
        $this->companyId = $companyId;
        $this->childKey = $childKey;
        $this->allowance_list = Allowance::where('branch_id', $branchId)->where('delete_flg', 0)->pluck('name', 'id');
        $c_ar = \old('al-allowance.'.$this->childKey);
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($this->childKey, $oldValue) && array_key_exists($i, $oldValue[$this->childKey])) {
                        $def[$key] = $oldValue[$this->childKey][$i];
                    }
                }
                array_push($this->allowanceData, $def);
            }
        }else {
            foreach ($allowance as $item) {
                $d = $this->defaultValues();
                $d['al-id'] = $item['id'];
                $d['al-allowance'] = $item['allowance'];
                $d['al-amount'] = $item['amount'];
                $d['al-pay_month'] = $item['pay_month'];
                $d['al-target'] = $item['target'];
                if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $item['applied_date'], $matches)) {
                    $year = $matches[1];
                    $month = intval($matches[2]);
                    $item['applied_date'] = "{$year}年{$month}月";
                }
                $d['al-applied_date'] = $item['applied_date'];
                array_push($this->allowanceData, $d);
            }
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                $alErrs = $errors->get($value);
                foreach ($alErrs as $alErr) {
                    array_push($this->alErrs, $value);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.allowance-form', [
            'childKey' => $this->childKey,
            'allowanceHistory' => $this->allowanceHistory,
        ]);
    }

    public function allowanceAppend()
    {
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->allowanceData, $this->defaultValues());
        $this->dispatch('allowance-appended');
    }

    #[On('allowance-form-loaded')]
    public function allowanceFormLoaded()
    {
        $this->loading = false;
    }

    public function removeAllowance($allowanceKey)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->allowanceData[$allowanceKey]);
        $this->allowanceData = array_values($this->allowanceData);
        $this->loading = false;
        $this->dispatch('allowance-removed');
    }

    private function defaultValues()
    {
        $defaultValues = [
            'al-id' => 0,
            'al-key' => str_replace('.', '', uniqid('allowance_', true)),
            'al-allowance' => '',
            'al-amount' => '',
            'al-pay_month' => '',
            'al-target' => '',
            'al-applied_date' => '',
        ];

        return $defaultValues;
    }
}
