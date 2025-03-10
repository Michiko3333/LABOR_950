<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Branch;
use App\Models\Wage;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Attendance;
use Livewire\Attributes\On;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Rules\noEmoji;

class WagePaymentStatusAnotherMonth extends Component{

    public array $filtered_wage_data = [];
    public $sixty_years_total_amount;

    public array $selectedRows = []; // 保存用の選択データ

   
    //支給対象年月の編集ボタン（openPaymentModal）がクリックされた時の処理
    public function openPaymentModal(){
        $this->dispatch('showModal');
    }

    //行をクリックしたときの処理
    public function handleRowClick($year, $month, $day, $amount)
    {
        \Log::info("クリックされたデータ: 年={$year}, 月={$month}, 日={$day},金額={$amount}");

    }
    
    //選択されたデータを保存
    public function saveSelectedData()
    {
    }

    public function render(){
        return view('livewire.wage-payment-status-another-month');
    }


    

    //60歳到達時の賃金の取得、直近の最大24ヶ月の年月と賃金を取得する処理
    #[On('select_payment_status_after60')]
    public function selectPaymentStatusAfter60($employee) {  

        if ($employee['birthday']) {
            $birthday = Carbon::parse($employee['birthday']);
            $sixty_years_old_date = $birthday->copy()->addYears(60);
            $sixty_years_old_month = $sixty_years_old_date->format('Y-m-d');

            $sixty_years_wage = Wage::where('employee_id', $employee['id'])
                ->where('month', '>=', $sixty_years_old_month)
                ->orderBy('month', 'asc')
                ->select('total_amount','month')
                ->first();

            $sixty_years_total_amount = $sixty_years_wage->total_amount ?? 0;

            $wage_data_24 = Wage::where('employee_id', $employee['id'])
                ->orderBy('month', 'desc')
                ->select('total_amount','month')
                ->take(24)     
                ->get();

            $filtered_wage_data = [];

            foreach ($wage_data_24 as $wage24) {
                $payment_target_year_month24 = Carbon::parse($wage24->month);
                $payment_target_year_month24 = Controller::convertWesternCalendarToJapaneseCalendar($payment_target_year_month24);

                $era_number = match ($payment_target_year_month24['japanese_calendar_era_string']) {
                    '平成' => 7,
                    '令和' => 9,
                    default => null, 
                };

                $valid_total_amount = $wage24->total_amount;

                 // valid_total_amount が 75% 以下の場合
                $isBelow75Percent = $valid_total_amount <= ($sixty_years_total_amount * 0.75);

                $filtered_wage_data[] = [
                    'era_number'=> $era_number,
                    'era' => $payment_target_year_month24['japanese_calendar_era_string'],
                    'year' => $payment_target_year_month24['japanese_calendar_result']->year,
                    'month' => $payment_target_year_month24['japanese_calendar_result']->month,
                    'day' => $payment_target_year_month24['japanese_calendar_result']->day,
                    'valid_total_amount' => $valid_total_amount,
                    'below_75_percent_flag' => $isBelow75Percent ? true : false, // フラグを追加
                ];
            }
            $this->filtered_wage_data = $filtered_wage_data;
            $this->sixty_years_total_amount = $sixty_years_total_amount;
        }
    }
}