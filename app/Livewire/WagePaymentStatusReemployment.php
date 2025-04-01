<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wage;
use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Attributes\On;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WagePaymentStatusReemployment extends Component{

    public $wage_id_1;
    public $era_1;
    public $year_1;
    public $month_1;
    public $total_amount_1;
    public $reduced_days_1;
    public $checkbox_1= false;

    public $wage_id_2;
    public $era_2;
    public $year_2;
    public $month_2;
    public $total_amount_2;
    public $reduced_days_2;
    public $checkbox_2= false;

    public $wage_id_3;
    public $era_3;
    public $year_3;
    public $month_3;
    public $total_amount_3;
    public $reduced_days_3;
    public $checkbox_3 = false;

    public $payment_target_year_months = [];

    public $wage_amount_after_exclusion;
    public $selectedType;
    public $checkedIndexes;

    public $employeeId;
    public string $info_text_1;
    public string $info_text_2;


    public function render()
    {
        $employeeId = $this->employeeId ? $this->employeeId : null;

        return view('livewire.wage-payment-status-reemployment', [
            'employeeId' => $this->employeeId
        ]);
    }

    //月額賃金と選択社員情報の受信
    #[On('submit-basic-allowance')]
    public function SubmitBasicAllowance($seventy_five_percent_threshold,$employeeData,$calculated_wage)
    {
        $this->seventy_five_percent_threshold = $seventy_five_percent_threshold;
        $this->employeeData = $employeeData;
        $this->calculated_wage = $calculated_wage;
        $seventy_five_percent_threshold = $seventy_five_percent_threshold;
        $employee = $employeeData;
        $calculated_wage = $calculated_wage;

        $this->SelectStatusReemployment($seventy_five_percent_threshold,$employee,$calculated_wage);
    }

    public function SelectStatusReemployment($seventy_five_percent_threshold,$employee,$calculated_wage) { 
    
        $this->resetData();
        $this->employeeId = $employee['id'];
        $birthday = Carbon::parse($employee['birthday']);
        $sixty_years_old_date = $birthday->copy()->addYears(60);

        $info_text_1 = "※選択可能な年月は基本手当から算出した平均月額賃金と比べて、再就職後の賃金が75％未満になっている年月です。";
        $info_text_2 = "※選択した支給対象年月の前１ヶ月〜２ヶ月の賃金が75％未満と連続している場合は、最大3ヶ月分が自動で選択されます。";

        $this->dispatch('updateInfoText', [
            'info_text_1' => $info_text_1,
            'info_text_2' => $info_text_2
        ]);
        
        $this->dispatch('calculatedWageUpdated', calculated_wage: $calculated_wage, sixty_years_old_date: $sixty_years_old_date->format('Y-m-d'));

        $wages_below_75_percent = Wage::where('employee_id', $employee['id'])
            ->where('total_amount', '<', $seventy_five_percent_threshold)
            ->where('month', '>=', $sixty_years_old_date)
            ->orderBy('month', 'desc')
            ->take(3)
            ->get();

        if ($wages_below_75_percent->isEmpty()) {
            $this->dispatch('show_error');
            return;
        }

        $payment_target_year_months = [];

        foreach ($wages_below_75_percent as $wage) {
            $payment_target_year_month = Carbon::parse($wage->month);
            $payment_target_year_month = Controller::convertWesternCalendarToJapaneseCalendar($payment_target_year_month);

            $attendance = Attendance::where('employee_id', $wage->employee_id)
                ->where('month', $wage->month)
                ->select('absent_days', 'late_days', 'early_days')
                ->first();

            $late_days = (float) ($attendance->late_days ?? 0);
            $early_days = (float) ($attendance->early_days ?? 0);
            $absent_days = (float) ($attendance->absent_days ?? 0);
            $result = $late_days + $early_days + $absent_days;

            $payment_target_year_months[] = [
                'wage_id' => $wage->id, 
                'era' => $payment_target_year_month['japanese_calendar_era_string'],
                'year' => $payment_target_year_month['japanese_calendar_result']->year,
                'month' => $payment_target_year_month['japanese_calendar_result']->month,
                'day' => $payment_target_year_month['japanese_calendar_result']->day,
                'total_amount' => $wage->total_amount, 
                'reduced_days' => $result,
            ];
        }

        $this->setData($payment_target_year_months);
        $this->dispatch('show_form');
    }

    public function setData($payment_target_year_months)
    {
        $this->payment_target_year_months = $payment_target_year_months;

        if (isset($payment_target_year_months[0])) {
            $this->checkbox_1 = false; 
            $this->wage_id_1 = $payment_target_year_months[0]['wage_id'];
            $this->era_1 = $payment_target_year_months[0]['era'];
            $this->year_1 = $payment_target_year_months[0]['year'];
            $this->month_1 = $payment_target_year_months[0]['month'];
            $this->total_amount_1 = $payment_target_year_months[0]['total_amount'];
            $this->reduced_days_1 = $payment_target_year_months[0]['reduced_days'];
        } else {
            $this->checkbox_1 = false; 
            $this->wage_id_1 = null;
            $this->era_1 = null;
            $this->year_1 = null;
            $this->month_1 = null;
            $this->total_amount_1 = null;
            $this->reduced_days_1 = null;
        }

        if (isset($payment_target_year_months[1])) {
            $this->checkbox_2 = false; 
            $this->wage_id_2 = $payment_target_year_months[1]['wage_id'];
            $this->era_2 = $payment_target_year_months[1]['era'];
            $this->year_2 = $payment_target_year_months[1]['year'];
            $this->month_2 = $payment_target_year_months[1]['month'];
            $this->total_amount_2 = $payment_target_year_months[1]['total_amount'];
            $this->reduced_days_2 = $payment_target_year_months[1]['reduced_days'];
        } else {
            $this->checkbox_2 = false; 
            $this->wage_id_2 = null;
            $this->era_2 = null;
            $this->year_2 = null;
            $this->month_2 = null;
            $this->total_amount_2 = null;
            $this->reduced_days_2 = null;
        }

        if (isset($payment_target_year_months[2])) {
            $this->checkbox_3 = false; 
            $this->wage_id_3 = $payment_target_year_months[2]['wage_id'];
            $this->era_3 = $payment_target_year_months[2]['era'];
            $this->year_3 = $payment_target_year_months[2]['year'];
            $this->month_3 = $payment_target_year_months[2]['month'];
            $this->total_amount_3 = $payment_target_year_months[2]['total_amount'];
            $this->reduced_days_3 = $payment_target_year_months[2]['reduced_days'];
        } else {
            $this->checkbox_3 = false; 
            $this->wage_id_3 = null;
            $this->era_3 = null;
            $this->year_3 = null;
            $this->month_3 = null;
            $this->total_amount_3 = null;
            $this->reduced_days_3 = null;
        }
    }

    private function resetData()
    {
        $this->checkbox_1 = false; 
        $this->wage_id_1 = null;
        $this->era_1 = null;
        $this->year_1 = null;
        $this->month_1 = null;
        $this->total_amount_1 = null;
        $this->reduced_days_1 = null;

        $this->checkbox_2 = false; 
        $this->wage_id_2 = null;
        $this->era_2 = null;
        $this->year_2 = null;
        $this->month_2 = null;
        $this->total_amount_2 = null;
        $this->reduced_days_2 = null;

        $this->checkbox_3 = false; 
        $this->wage_id_3= null;
        $this->era_3 = null;
        $this->year_3 = null;
        $this->month_3 = null;
        $this->total_amount_3 = null;
        $this->reduced_days_3 = null;
    }

    // 編集ボタンが押された時
    #[On('openEditWageAmountModal')]
    public function openEditWageAmountModal($type)
    {
        $data = $this->payment_target_year_months[$type] ?? null;

        if (empty($data)) {
            $this->dispatch('showErrorMessage_empty_input');
            return;
        } else {
            $this->selectedType = $type;
            $this->dispatch('editWageAmount', $data);
            $this->dispatch('open_edit_modal_input');
        }
    }

    // チェックの状態を受け取ったとき
    #[On('checkbox_change')]
    public function checkbox_change($checkedIndexes)
    {
        $this->dispatch('sendCheckedIndexes', $checkedIndexes);
    }

    // 連携ボタンが押された時
    #[On('reflectValues')]
    public function reflectValues()
    {
        $this->dispatch('runConfirmation');
    }

    // 別の年月の選択データを受信して上書きする
    #[On('selectedRowsUpdated')]
    public function selectedRowsUpdated($tempSelectedRows) {

        $payment_target_year_months = [];

        foreach ($tempSelectedRows as $tempRow) {
            $found = false;
        
            foreach ($payment_target_year_months as $existingRow) {
                if (
                    $existingRow['era'] === $tempRow['era'] &&
                    $existingRow['year'] === $tempRow['year'] &&
                    $existingRow['month'] === $tempRow['month']
                ) {
                    $existingRow['valid_id'] = $tempRow['valid_id'];
                    $existingRow['total_amount'] = $tempRow['valid_total_amount'];
                    $existingRow['reduced_days'] = $tempRow['reduced_days24'];
                    $existingRow['below_75_percent_flag'] = $tempRow['below_75_percent_flag'];
        
                    $found = true;
                    break;
                }
            }
        
            if (!$found) {
                $payment_target_year_months[] = [
                    'wage_id' => $tempRow['valid_id'], 
                    'era' => $tempRow['era'],
                    'year' => $tempRow['year'],
                    'month' => $tempRow['month'],
                    'day' => $tempRow['day'],
                    'total_amount' => $tempRow['valid_total_amount'],
                    'reduced_days' => $tempRow['reduced_days24'],
                ];
            }
        }

        $this->setData($payment_target_year_months);
    }

    // 編集後の賃金データを受信して上書きする
    #[On('wageAfterChange')]
    public function wageAfterChange($wage_amount_after_exclusion)
    {
        if ($this->selectedType === 0) {
            $this->total_amount_1 = $wage_amount_after_exclusion;
        } elseif ($this->selectedType === 1) {
            $this->total_amount_2 = $wage_amount_after_exclusion;
        } elseif ($this->selectedType === 2) {
            $this->total_amount_3 = $this->$wage_amount_after_exclusion;
        }
    }
}
