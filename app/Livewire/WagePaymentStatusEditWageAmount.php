<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wage;
use App\Models\WageOvertime;
use App\Models\WageAllowance;
use App\Models\WageSalary;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class WagePaymentStatusEditWageAmount extends Component
{
    public $total_amount;
    public $wage_base_amount;
    public $absence_deduction;
    public $late_deduction;
    public $other_deduction;
    public $wage_overtime_name;
    public $wage_overtime_amount;
    public $wage_allowance_name;
    public $wage_allowance_amount;
    public $wage_salary_name;
    public $wage_salary_amount;

    public $allowances1 = [];
    public $allowances2 = [];
    public $allowances3 = [];
    public $allowances4 = [];
    public $selectedAllowances = [];

    public $total_payment_amount;
    public $total_exclusion =0;
    public $wage_amount_after_exclusion;
    public $selected_wage_id;

    public $wageData = []; 
    public array $backupWageData = [];
    public array $isBackupTaken = [];

    public function render()
    {
        return view('livewire.wage-payment-status-edit-wage-amount');
    }

    // チェックが変更されたときに合計を計算
    public function updatedSelectedAllowances()
    {
        $total1 = collect($this->selectedAllowances['allowances1'] ?? [])
            ->filter()
            ->keys()
            ->map(fn($index) => $this->allowances1[$index]['amount'] ?? 0)
            ->sum();

        $total2 = collect($this->selectedAllowances['allowances2'] ?? [])
            ->filter()
            ->keys()
            ->map(fn($index) => $this->allowances2[$index]['amount'] ?? 0)
            ->sum();

        $total3 = collect($this->selectedAllowances['allowances3'] ?? [])
            ->filter()
            ->keys()
            ->map(fn($index) => $this->allowances3[$index]['amount'] ?? 0)
            ->sum();

        $total4 = collect($this->selectedAllowances['allowances4'] ?? [])
            ->filter()
            ->keys()
            ->map(fn($index) => $this->allowances4[$index]['amount'] ?? 0)
            ->sum();

        $this->total_exclusion = $total1 + $total2 + $total3 + $total4;

        $this->updatedTotalExclusion();
    }

    // 除外合計の値が変わるたびに除外後の賃金額を計算
    public function updatedTotalExclusion()
    {
        $this->wage_amount_after_exclusion = $this->total_amount - $this->total_exclusion;
    }

    // 確定ボタン
    #[On('onEditClick')]
    public function onEditClick()
    {
        function hasTrueValue($array) {
            foreach ($array as $value) {
                if (is_array($value)) {
                    if (hasTrueValue($value)) {
                        return true;
                    }
                } elseif ($value === true) {
                    return true;
                }
            }
            return false;
        }

        if (empty($this->selectedAllowances) ||
        (is_array($this->selectedAllowances) && !hasTrueValue($this->selectedAllowances))
        ) {
            $this->dispatch('showErrorMessage_nodata_hensyu');
            return;
        }
        else {
            $this->onEditHensyu();
        }
    }

    public function onEditHensyu()
    {
        if (!isset($this->selected_wage_id)) {
            return;
        }

        $wage_id = $this->selected_wage_id;

        $this->wageData[$wage_id] = [
            'total_amount' => $this->total_amount,
            'wage_base_amount' => $this->wage_base_amount,
            'absence_deduction' => $this->absence_deduction,
            'late_deduction' => $this->late_deduction,
            'other_deduction' => $this->other_deduction,
            'allowances1' => $this->allowances1,
            'allowances2' => $this->allowances2,
            'allowances3' => $this->allowances3,
            'allowances4' => $this->allowances4,
            'selectedAllowances' => $this->selectedAllowances,
            'total_exclusion' => $this->total_exclusion,
            'wage_amount_after_exclusion' => $this->wage_amount_after_exclusion,
        ];

        $this->backupWageData($wage_id);

        $this->dispatch('wageAfterChange', [
            'wage_id' => $wage_id,
            'wage_amount_after_exclusion' => $this->wage_amount_after_exclusion
        ]);

        $this->dispatch('close_hensyu_modal');
    }

    public function backupWageData($wage_id)
    {
        if (isset($this->wageData[$wage_id])) {
            $this->backupWageData[$wage_id] = $this->wageData[$wage_id];
            $this->isBackupTaken[$wage_id] = true;
        }
    }

    public function restoreFromWageData(array $data)
    {
        $this->total_amount = $data['total_amount'];
        $this->wage_base_amount = $data['wage_base_amount'];
        $this->absence_deduction = $data['absence_deduction'];
        $this->late_deduction = $data['late_deduction'];
        $this->other_deduction = $data['other_deduction'];
        $this->allowances1 = $data['allowances1'];
        $this->allowances2 = $data['allowances2'];
        $this->allowances3 = $data['allowances3'];
        $this->allowances4 = $data['allowances4'];
        $this->selectedAllowances = $data['selectedAllowances'];
        $this->total_exclusion = $data['total_exclusion'];
        $this->wage_amount_after_exclusion = $data['wage_amount_after_exclusion'];
    }

    //賃金支払い状況モーダルから取得した行データの受信
    #[On('editWageAmount')]
    public function editWageAmount($data)
    {
        $wage_id = $data['wage_id'];
        $this->selected_wage_id = $wage_id;

        if (!empty($this->backupWageData[$wage_id])) {
            $this->restoreFromWageData($this->backupWageData[$wage_id]);
            return;
        }

        $this->reset([
            'total_amount', 'wage_base_amount', 'absence_deduction', 
            'late_deduction', 'other_deduction', 'allowances1', 'allowances2', 
            'allowances3', 'allowances4', 'selectedAllowances'
        ]);
                
        $wage = Wage::where('id', $wage_id)
            ->where('wage_type', '給与')
            ->select('total_amount', 'wage_base_amount', 'absence_deduction', 'late_deduction', 'other_deduction')
            ->first();

        if ($wage) {
            $this->total_amount = $wage->total_amount;
            $this->wage_base_amount = $wage->wage_base_amount;
            $this->absence_deduction = $wage->absence_deduction;
            $this->late_deduction = $wage->late_deduction;
            $this->other_deduction = $wage->other_deduction;

        $this->allowances2 = array_filter([
            ['name' => '欠勤控除', 'amount' => $this->absence_deduction ?: null],
            ['name' => '遅早控除', 'amount' => $this->late_deduction ?: null],
            ['name' => 'その他控除', 'amount' => $this->other_deduction ?: null]
        ], fn($item) => $item['amount'] !== null && $item['amount'] != 0);
        } else {
            $this->allowances2 = [];
        }

        $this->allowances1 = WageOvertime::where('wage_id', $wage_id)
            ->select('name', 'amount')
            ->get()
            ->toArray();

        $this->allowances3 = WageAllowance::where('wage_id', $wage_id)
            ->select('name', 'amount')
            ->get()
            ->toArray();

        $this->allowances4 = WageSalary::where('wage_id', $wage_id)
            ->select('name', 'amount')
            ->get()
            ->toArray();

        $this->total_exclusion = 0;
        $this->wage_amount_after_exclusion = $this->total_amount - $this->total_exclusion;

        $this->wageData[$wage_id] = [
            'total_amount' => $this->total_amount,
            'wage_base_amount' => $this->wage_base_amount,
            'absence_deduction' => $this->absence_deduction,
            'late_deduction' => $this->late_deduction,
            'other_deduction' => $this->other_deduction,
            'allowances1' => $this->allowances1,
            'allowances2' => $this->allowances2,
            'allowances3' => $this->allowances3,
            'allowances4' => $this->allowances4,
            'selectedAllowances' => [],
            'total_exclusion' => $this->total_exclusion,
            'wage_amount_after_exclusion' => $this->wage_amount_after_exclusion,
        ];
    }
}
