<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wage;
use App\Models\WageOvertime;
use App\Models\WageAllowance;
use App\Models\WageSalary;
use Livewire\Attributes\On;

class WagePaymentStatusEditWageAmount extends Component
{
    public $wage_data_add;

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
    public $total_exclusion = 0;
    public $wage_amount_after_exclusion;

    public $wageData = []; 

    
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
            \Log::info('空の場合を見てみる:', $this->selectedAllowances);
            return;
        }
        else {
            $this->onEditHensyu();
        }
    }

    public function onEditHensyu()
    {
        $wage_id = array_key_first($this->wageData);
        if ($wage_id) {
            $this->wageData[$wage_id]['selectedAllowances'] = $this->selectedAllowances;
            $this->wageData[$wage_id]['total_exclusion'] = $this->total_exclusion;
            $this->wageData[$wage_id]['wage_amount_after_exclusion'] = $this->wage_amount_after_exclusion;
        }
        $this->dispatch('wageAfterChange', $this->wage_amount_after_exclusion);

        $this->dispatch('close_hensyu_modal');
    }

    //賃金支払い状況モーダルから取得した行データの受信
    #[On('editWageAmount')]
    public function editWageAmount($data)
    {
        \Log::info($data);

        $wage_id = $data['wage_id'];

         if (isset($this->wageData[$wage_id])) {
            $this->total_amount = $this->wageData[$wage_id]['total_amount'];
            $this->wage_base_amount = $this->wageData[$wage_id]['wage_base_amount'];
            $this->absence_deduction = $this->wageData[$wage_id]['absence_deduction'];
            $this->late_deduction = $this->wageData[$wage_id]['late_deduction'];
            $this->other_deduction = $this->wageData[$wage_id]['other_deduction'];
            $this->allowances1 = $this->wageData[$wage_id]['allowances1'];
            $this->allowances2 = $this->wageData[$wage_id]['allowances2'];
            $this->allowances3 = $this->wageData[$wage_id]['allowances3'];
            $this->allowances4 = $this->wageData[$wage_id]['allowances4'];
            $this->selectedAllowances = $this->wageData[$wage_id]['selectedAllowances'] ?? [];
            $this->total_exclusion = $this->wageData[$wage_id]['total_exclusion'] ?? 0;
            $this->wage_amount_after_exclusion = $this->wageData[$wage_id]['wage_amount_after_exclusion'] ?? 0;
        } else {

            $this->reset([
                'total_amount', 'wage_base_amount', 'absence_deduction', 
                'late_deduction', 'other_deduction', 'allowances1', 'allowances2', 
                'allowances3', 'allowances4', 'selectedAllowances', 
                'total_exclusion', 'wage_amount_after_exclusion'
            ]);
                
            $this->wage_data_add_Wage = Wage::where('id', $wage_id)
                ->select('total_amount', 'wage_base_amount', 'absence_deduction', 'late_deduction', 'other_deduction')
                ->first();


            if ($this->wage_data_add_Wage) {
            $this->total_amount = $this->wage_data_add_Wage->total_amount;
            $this->wage_base_amount = $this->wage_data_add_Wage->wage_base_amount;
            $this->absence_deduction = $this->wage_data_add_Wage->absence_deduction;
            $this->late_deduction = $this->wage_data_add_Wage->late_deduction;
            $this->other_deduction = $this->wage_data_add_Wage->other_deduction;

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
                'selectedAllowances' => []
            ];
        }
    }

}