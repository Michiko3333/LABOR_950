<?php

namespace App\Livewire;

use App\Models\Salary;
use App\Models\Department;
use App\Models\Salary_history;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\Attributes\On;

class SalaryForm extends Component
{
    public $uniqueId;

    public $salaryData = [];
    public $departments = [];
    public $branchId;
    public $childKey;
    public $salary;
    public $saErrs = [];
    public $loading = false;
    public $salaryHistory;
    public $companyId;

    public function mount($errors, $branchId, $childKey = null, $salary = [], $companyId)
    {
        $this->uniqueId = str_replace('.', '', uniqid('salary_', true));

        $salary = Salary::where('branch_id', $branchId)->where('delete_flg', 0)->get();
        $this->salary = $salary;
        $salaryHistory = Salary_history::where('branch_id', $branchId)->get();
        $this->salaryHistory = $salaryHistory;
        $this->companyId = $companyId;
        $this->childKey = $childKey;
        $departments = Department::where('company_id',$companyId)->where('delete_flg', 0)->get();
        $this->departments = $departments;
        foreach ($this->salaryHistory as $historyItem) {
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
        $c_ar = \old('sa-payroll_deadline.' . $this->childKey);
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($this->childKey, $oldValue) && array_key_exists($i, $oldValue[$this->childKey])) {

                        $def[$key] = $oldValue[$this->childKey][$i];
                    }
                }
                array_push($this->salaryData, $def);
            }
        } else {
            $mergedData = [];

            foreach ($salary as $item) {
                $saId = $item['salary_id'];

                if (!isset($mergedData[$saId])) {
                    $mergedData[$saId] = $item;

                    $mergedData[$saId]['department_id'] = $item['department_id'];
                } else {
                    $mergedData[$saId]['department_id'] .= ',' . $item['department_id'];
                }

                $mergedData[$saId]['payroll_deadline'] = $item['payroll_deadline'];
                $mergedData[$saId]['payroll_month'] = $item['payroll_month'];
                $mergedData[$saId]['payroll_day'] = $item['payroll_day'];

                $applied_date = $item['applied_date'];
                if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $applied_date, $matches)) {
                    $year = $matches[1];
                    $month = intval($matches[2]);
                    $applied_date = "{$year}年{$month}月";
                }
                $mergedData[$saId]['applied_date'] = $applied_date;
            }

            foreach ($mergedData as $saId => $data) {
                $d = $this->defaultValues();
                $d['sa-id'] = $data['salary_id'];
                $d['sa-payroll_deadline'] = $data['payroll_deadline'];
                $d['sa-payroll_month'] = $data['payroll_month'];
                $d['sa-payroll_day'] = $data['payroll_day'];
                $d['sa-applied_date'] = $data['applied_date'];
                $department_id = explode(',', $data->department_id);
                $d['sa-departments'] = !empty($department_id) ? $department_id : null;
                array_push($this->salaryData, $d);
            }
        }

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                $saErrs = $errors->get($value);
                foreach ($saErrs as $saErr) {
                    array_push($this->saErrs, $value);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.salary-form', [
            'departments' => $this->departments,
            'childKey' => $this->childKey,
            'salaryHistory' => $this->salaryHistory,
        ]);
    }

    public function salaryAppend()
    {
        if ($this->loading) return;
        $this->loading = true;
        array_push($this->salaryData, $this->defaultValues());
        $this->dispatch('salary-appended');
    }

    #[On('salary-form-loaded')]
    public function salaryFormLoaded()
    {
        $this->loading = false;
    }

    public function removeSalary($salaryKey)
    {
        if ($this->loading) return;
        $this->loading = true;
        unset($this->salaryData[$salaryKey]);
        $this->salaryData = array_values($this->salaryData);
        $this->loading = false;
        $this->dispatch('salary-removed');
    }

    private function defaultValues()
    {
        $defaultValues = [
            'sa-id' => 0,
            'sa-key' => str_replace('.', '', uniqid('salary_item', true)),
            'sa-payroll_deadline' => '',
            'sa-payroll_month' => '',
            'sa-payroll_day' => '',
            'sa-applied_date' => '',
            'sa-departments' => '',
        ];

        return $defaultValues;
    }
}
