<?php

namespace App\Livewire;

use App\Models\Bounty;
use App\Models\Department;
use App\Models\Bounty_history;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;

class BountyForm extends Component
{
    public $bountyData = [];
    public $departments = [];
    public $branchId;
    public $childKey;
    public $bounty;
    public $bouErrs = [];
    public $loading = false;
    public $bountyHistory;
    public $companyId;

    public function mount($errors, $branchId, $childKey = null, $bounty = [], $companyId)
    {
        $bounty = Bounty::where('branch_id', $branchId)->where('delete_flg', 0)->get();
        $this->bounty = $bounty;
        $bountyHistory = Bounty_history::where('branch_id', $branchId)->get();
        $this->bountyHistory = $bountyHistory;
        $this->companyId = $companyId;
        $this->childKey = $childKey;
        $departments = Department::where('company_id', $companyId)->get();
        $this->departments = $departments;
        foreach ($this->bountyHistory as $historyItem) {
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
        $c_ar = \old('bou-applied_date.' . $this->childKey);
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($this->childKey, $oldValue) && array_key_exists($i, $oldValue[$this->childKey])) {

                        $def[$key] = $oldValue[$this->childKey][$i];
                    }
                }
                array_push($this->bountyData, $def);
            }
        } else {
            $mergedData = [];

            foreach ($bounty as $item) {
                $bouId = $item['bounty_id'];

                if (!isset($mergedData[$bouId])) {
                    $mergedData[$bouId] = $item;

                    $mergedData[$bouId]['department_id'] = $item['department_id'];
                } else {
                    $mergedData[$bouId]['department_id'] .= ',' . $item['department_id'];
                }

                $mergedData[$bouId]['bonus_payment_month'] = $item['bonus_payment_month'];
                $mergedData[$bouId]['applied_date'] = $item['applied_date'];
            }

            foreach ($mergedData as $bouId => $data) {
                $d = $this->defaultValues();
                $d['bou-id'] = $data['bounty_id'];
                $bonus_payment_month = explode('，', $data->bonus_payment_month);
                $d['bou-bonus_payment_month'] = !empty($bonus_payment_month) ? $bonus_payment_month : null;
                $d['bou-applied_date'] = $data['applied_date'];
                $department_id = explode(',', $data->department_id);
                $d['bou-departments'] = !empty($department_id) ? $department_id : null;
                array_push($this->bountyData, $d);
            }
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                $bouErrs = $errors->get($value);
                foreach ($bouErrs as $bouErrs) {
                    array_push($this->bouErrs, $value);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.bounty-form', [
            'departments' => $this->departments,
            'childKey' => $this->childKey,
            'bountyHistory' => $this->bountyHistory,
        ]);
    }

    public function bountyAppend()
    {
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->bountyData, $this->defaultValues());
        $this->dispatch('bounty-appended');
    }

    #[On('bounty-form-loaded')]
    public function bountyFormLoaded()
    {
        $this->loading = false;
    }

    public function removebounty($bountyKey)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->bountyData[$bountyKey]);
        $this->loading = false;
        $this->dispatch('bounty-removed');
    }

    private function defaultValues()
    {
        $defaultValues = [
            'bou-id' => 0,
            'bou-bonus_payment_month' => '',
            'bou-applied_date' => '',
            'bou-departments' => '',
        ];

        return $defaultValues;
    }
}
