<?php

namespace App\Livewire;

use App\Models\Allowance;
use App\Models\Employee;
use App\Models\Receptionist;
use App\Models\Managerial_position;
use Livewire\Component;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Bonus;
use App\Models\Bounty;
use App\Models\Branch_allowance;
use Livewire\Attributes\On;

class BranchPaymentConfirmModal extends BaseTable
{
    public $salariesByBranch;
    public $mergedSalaries;
    public $bonusByBranch;
    public $mergedBonus;
    public $bountyByBranch;
    public $mergedBounty;
    public $allowanceByBranch;
    public $index;
    public $salariesID;
    public $bonusID;
    public $bountyID;
    public $allowanceID;

    protected $listeners = ['confirmModalOpened'];

    public function confirmModalOpened($branchID, $index)
    {
        $this->salariesByBranch = Salary::where('branch_id', $branchID)->where('delete_flg', 0)->get();
        $this->salariesID = Salary::where('branch_id', $branchID)->where('delete_flg', 0)->pluck('salary_id')->toArray();
        $this->salariesID = array_map('strval', $this->salariesID);
        if($this->salariesByBranch->isNotEmpty()){
            foreach ($this->salariesByBranch as $salary) {
                $salaryId = $salary->salary_id;
                if (isset($mergedSalaries[$salaryId])) {
                    $mergedSalaries[$salaryId]['department_id'] = $mergedSalaries[$salaryId]['department_id'] . "," . $salary->department_id;
                } else {
                    $mergedSalaries[$salaryId] = [
                        'salary_id' => $salary->salary_id,
                        'department_id' => $salary->department_id,
                        'branch_id' => $salary->branch_id,
                        'payroll_deadline' => $salary->payroll_deadline,
                        'payroll_month' => $salary->payroll_month,
                        'payroll_day' => $salary->payroll_day,
                        'applied_date' => $salary->applied_date,
                        'updated_at' => substr($salary->updated_at, 0, 10),
                    ];
                }
                $departmentIds = explode(',', $mergedSalaries[$salaryId]['department_id']);
                $departmentNames = [];
                foreach ($departmentIds as $id) {
                    $department = Department::where('id', $id)->first();
                    if ($department) {
                        $departmentNames[] = $department->name;
                    }
                }
                $mergedSalaries[$salaryId]['department_names'] = implode('，', $departmentNames);
            }
            $mergedSalaries = array_values($mergedSalaries);
            $this->mergedSalaries = $mergedSalaries;
        } else {
            $this->mergedSalaries = null;
        }
        $this->bonusByBranch = Bonus::where('branch_id', $branchID)->where('delete_flg', 0)->get();
        $this->bonusID = Bonus::where('branch_id', $branchID)->where('delete_flg', 0)->pluck('bonus_id')->toArray();
        $this->bonusID = array_map('strval', $this->bonusID);
        if($this->bonusByBranch->isNotEmpty()){
            foreach ($this->bonusByBranch as $bonus) {
                $bonusId = $bonus->bonus_id;
                if (isset($mergedBonus[$bonusId])) {
                    $mergedBonus[$bonusId]['department_id'] = $mergedBonus[$bonusId]['department_id'] . "," . $bonus->department_id;
                } else {
                    $mergedBonus[$bonusId] = [
                        'bonus_id' => $bonus->bonus_id,
                        'department_id' => $bonus->department_id,
                        'branch_id' => $bonus->branch_id,
                        'bonus_payment_month' => $bonus->bonus_payment_month,
                        'applied_date' => $bonus->applied_date,
                        'updated_at' => substr($bonus->updated_at, 0, 10),
                    ];
                }
                $departmentIds = explode(',', $mergedBonus[$bonusId]['department_id']);
                $departmentNames = [];
                foreach ($departmentIds as $id) {
                    $department = Department::where('id', $id)->first();
                    if ($department) {
                        $departmentNames[] = $department->name;
                    }
                }
                $mergedBonus[$bonusId]['department_names'] = implode('，', $departmentNames);
            }
            $mergedBonus = array_values($mergedBonus);
            $this->mergedBonus = $mergedBonus;
        } else {
            $this->mergedBonus = null;
        }
        $this->bountyByBranch = Bounty::where('branch_id', $branchID)->where('delete_flg', 0)->get();
        $this->bountyID = Bounty::where('branch_id', $branchID)->where('delete_flg', 0)->pluck('bounty_id')->toArray();
        $this->bountyID = array_map('strval', $this->bountyID);
        if($this->bountyByBranch->isNotEmpty()){
            foreach ($this->bountyByBranch as $bounty) {
                $bountyId = $bounty->bounty_id;
                if (isset($mergedBounty[$bountyId])) {
                    $mergedBounty[$bountyId]['department_id'] = $mergedBounty[$bountyId]['department_id'] . "," . $bounty->department_id;
                } else {
                    $mergedBounty[$bountyId] = [
                        'bounty_id' => $bounty->bounty_id,
                        'department_id' => $bounty->department_id,
                        'branch_id' => $bounty->branch_id,
                        'bonus_payment_month' => $bounty->bonus_payment_month,
                        'applied_date' => $bounty->applied_date,
                        'updated_at' => substr($bounty->updated_at, 0, 10),
                    ];
                }
                $departmentIds = explode(',', $mergedBounty[$bountyId]['department_id']);
                $departmentNames = [];
                foreach ($departmentIds as $id) {
                    $department = Department::where('id', $id)->first();
                    if ($department) {
                        $departmentNames[] = $department->name;
                    }
                }
                $mergedBounty[$bountyId]['department_names'] = implode('，', $departmentNames);
            }
            $mergedBounty = array_values($mergedBounty);
            $this->mergedBounty = $mergedBounty;
        } else {
            $this->mergedBounty = null;
        }
        $this->allowanceByBranch = Branch_allowance::where('branch_id', $branchID)
        ->where('delete_flg', 0)
        ->get();
        $this->allowanceID = Branch_allowance::where('branch_id', $branchID)->where('delete_flg', 0)->pluck('id')->toArray();
        $this->allowanceID = array_map('strval', $this->allowanceID);
        $this->index =$index;
        $this->dispatch('salariesDataUpdated', [
            'salariesByBranch' =>$this->mergedSalaries,
            'bonusByBranch' =>$this->mergedBonus,
            'bountyByBranch' =>$this->mergedBounty,
            'allowanceByBranch' =>$this->allowanceByBranch,
            'index' =>$this->index,
            'salariesID' =>$this->salariesID,
            'bonusID' =>$this->bonusID,
            'bountyID' =>$this->bountyID,
            'allowanceID' =>$this->allowanceID,
        ]);
    }

    public function render()
    {
        return view('livewire.branch-payment-confirm-modal');
    }
}
