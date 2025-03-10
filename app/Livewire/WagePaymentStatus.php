<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Branch;
use App\Models\Wage;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Attributes\On;
use App\Http\Controllers\Controller;

class WagePaymentStatus extends Component{

    // 1番目のデータ
    public $era_1;
    public $year_1;
    public $month_1;
    public $total_amount_1;
    public $reduced_days_1;

    // 2番目のデータ
    public $era_2;
    public $year_2;
    public $month_2;
    public $total_amount_2;
    public $reduced_days_2;

    // 3番目のデータ
    public $era_3;
    public $year_3;
    public $month_3;
    public $total_amount_3;
    public $reduced_days_3;

    //render() は「データを集めて画面を作る関数」
    public function render()
    {
        return view('livewire.wage-payment-status');
    }

    #[On('select_status')]
    public function selectStatus($id) {

        $wage_data = Wage::where('employee_id', $id)
        ->orderBy('month', 'desc')
        ->take(3)     
        ->get();

        $payment_target_year_months = []; 
        if ($wage_data->isNotEmpty()) {
            foreach ($wage_data as $wage) {
                $payment_target_year_month = Carbon::parse($wage->month);
                $payment_target_year_month = Controller::convertWesternCalendarToJapaneseCalendar($payment_target_year_month);
                
                $era = match ($payment_target_year_month['japanese_calendar_era_string']) {
                    '平成' => 7,
                    '令和' => 9,
                    default => null, 
                };

                // attendanceテーブルから遅刻・早退時間を取得
                $attendance = Attendance::where('employee_id', $wage->employee_id)
                ->where('month', $wage->month)
                ->select('absent_days','late_time', 'early_time')
                ->first();

                // branchテーブルから勤務時間を取得
                $branch = Branch::where('company_id', $wage->company_id)
                ->select('agreed_hours_day_h')
                ->first();

                // 計算
                $late_time = (float) ($attendance->late_time ?? 0);
                $early_time = (float) ($attendance->early_time ?? 0);
                $agreed_hours_day_h = (float) ($branch->agreed_hours_day_h ?? 1);
                $absent_days = (float) ($attendance->absent_days ?? 0);

                // 計算: 遅刻・早退時間の合計を勤務時間で割り、欠勤日数を加算
                $result = (($late_time + $early_time) / $agreed_hours_day_h) + $absent_days;
                $result = number_format($result, 1);  // 小数点1桁で四捨五入

                $payment_target_year_months[] = [
                    'era' => $era,
                    'year' => $payment_target_year_month['japanese_calendar_result']->year,
                    'month' => $payment_target_year_month['japanese_calendar_result']->month,
                    'day' => $payment_target_year_month['japanese_calendar_result']->day,
                    'total_amount' => $wage->total_amount, 
                    'reduced_days' => $result,
                ];
            }
        }
        $this->setData($payment_target_year_months);
    }

    public function setData($payment_target_year_months)
    {
        if (isset($payment_target_year_months[0])) {
            $this->era_1 = $payment_target_year_months[0]['era'];
            $this->year_1 = $payment_target_year_months[0]['year'];
            $this->month_1 = $payment_target_year_months[0]['month'];
            $this->total_amount_1 = $payment_target_year_months[0]['total_amount'];
            $this->reduced_days_1 = $payment_target_year_months[0]['reduced_days'];
        }

        if (isset($payment_target_year_months[1])) {
            $this->era_2 = $payment_target_year_months[1]['era'];
            $this->year_2 = $payment_target_year_months[1]['year'];
            $this->month_2 = $payment_target_year_months[1]['month'];
            $this->total_amount_2 = $payment_target_year_months[1]['total_amount'];
            $this->reduced_days_2 = $payment_target_year_months[1]['reduced_days'];
        }

        if (isset($payment_target_year_months[2])) {
            $this->era_3 = $payment_target_year_months[2]['era'];
            $this->year_3 = $payment_target_year_months[2]['year'];
            $this->month_3 = $payment_target_year_months[2]['month'];
            $this->total_amount_3 = $payment_target_year_months[2]['total_amount'];
            $this->reduced_days_3 = $payment_target_year_months[2]['reduced_days'];
        }
    }
}