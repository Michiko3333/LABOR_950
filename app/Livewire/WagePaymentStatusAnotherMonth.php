<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wage;
use App\Models\Attendance;
use Livewire\Attributes\On;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class WagePaymentStatusAnotherMonth extends Component
{

    public array $filtered_wage_data = [];
    public $sixty_years_total_amount;
    public array $payment_target_year_month24_A = [];

    public array $selectedRows = [];
    public array $tempSelectedRows = [];
    public array $backup_selectedRows = [];
    public $calculated_wage;
    public $sixty_years_old_date;

    // 行がクリックされたとき
    public function handleRowClick($index)
    {
        $this->selectedRows = [];
        $this->addPreviousMonths($index);
    }

    // 選択された行と前2ヶ月が対象となるかのチェック
    public function addPreviousMonths($index)
    {

        $wageData = $this->filtered_wage_data[$index] ?? null;
        if (!$wageData) return;

        $this->selectedRows[$index] = $wageData;        

        for ($i = 1; $i <= 2; $i++) {
            $prevIndex = $index + $i;
        
            // 前月のデータが存在するか確認
            if (isset($this->filtered_wage_data[$prevIndex])) {

                $selectedMonth = $this->selectedRows[$index]['months'];
                $previousMonth = $selectedMonth->copy()->subMonth(); 
                $previousTwoMonths = $selectedMonth->copy()->subMonth(2); 
        
                $prevSelectedMonth = $this->filtered_wage_data[$prevIndex]['months'];

                if ($this->filtered_wage_data[$prevIndex]['below_75_percent_flag'] && $prevSelectedMonth->format('Y-m') === $previousMonth->format('Y-m')) {
                    $this->selectedRows[$prevIndex] = $this->filtered_wage_data[$prevIndex];
                }
                elseif ($this->filtered_wage_data[$prevIndex]['below_75_percent_flag'] && $prevSelectedMonth->format('Y-m') === $previousTwoMonths->format('Y-m')) {
                    $this->selectedRows[$prevIndex] = $this->filtered_wage_data[$prevIndex];
                } else {
                    break;
                }
            } else {
                break;
            }
        }


        $this->selectedRows = array_intersect_key($this->selectedRows, $this->filtered_wage_data);
        $this->tempSelectedRows = array_values($this->selectedRows);
    }

    public function render()
    {
        return view('livewire.wage-payment-status-another-month');
    }

    // キャンセルボタン
    #[On('onCancel24')]
    public function onCancel24()
    {
        $this->selectedRows = $this->backup_selectedRows;

    }

    // 確定ボタン　選択データのバックアップ＆賃金支払い状況モーダルのフォームに送る
    #[On('onEdit24')]
    public function onEdit24()
    {
        if (empty($this->selectedRows)) {
            $this->dispatch('showErrorMessage_nodata24');
            return;
        }

        $this->backup_selectedRows = $this->selectedRows;
        $this->dispatch('selectedRowsUpdated', $this->tempSelectedRows);
        $this->dispatch('closed24modal');
    }

     //月額賃金受信
    #[On('calculatedWageUpdated')]
    public function updateWage($calculated_wage,$sixty_years_old_date) {
        $this->calculated_wage = $calculated_wage;
        $this->sixty_years_old_date = $sixty_years_old_date;
    }

    //60歳到達時の賃金の取得、直近の最大24ヶ月の年月と賃金を取得する処理
    #[On('select_payment_status_after60')]
    public function selectPaymentStatusAfter60($employeeData) {

        $employee =$employeeData;
        $employeeId = $employee['id'];

        $this->backup_selectedRows = [];

        if (!$this->calculated_wage || !$this->sixty_years_old_date) {
            return;
        }   

        $seventyFivePercentThreshold = $this->calculated_wage * 0.75;
        
        $wageData = Wage::where('employee_id', $employeeId)
            ->where('month', '>=', $this->sixty_years_old_date)
            ->orderBy('month', 'desc')
            ->select('id', 'total_amount', 'month')
            ->take(24)
            ->get();

        $this->filtered_wage_data = $wageData->map(function ($wage) use ($employeeId, $seventyFivePercentThreshold) {
            $wageMonth = Carbon::parse($wage->month);
            $convertedDate = Controller::convertWesternCalendarToJapaneseCalendar($wageMonth);
    
            $eraNumber = match ($convertedDate['japanese_calendar_era_string']) {
                '平成' => 7,
                '令和' => 9,
                default => null, 
            };
    
            $attendance = Attendance::where('employee_id', $employeeId)
                ->where('month', $wage->month)
                ->select('absent_days', 'late_days', 'early_days')
                ->first();

            $late_days = (float) ($attendance->late_days ?? 0);
            $early_days = (float) ($attendance->early_days ?? 0);
            $absent_days = (float) ($attendance->absent_days ?? 0);
            $result = $late_days + $early_days + $absent_days;

            return [
                'valid_id' => $wage->id,
                'months' => $wageMonth,
                'era_number' => $eraNumber,
                'era' => $convertedDate['japanese_calendar_era_string'],
                'year' => $convertedDate['japanese_calendar_result']->year,
                'month' => $convertedDate['japanese_calendar_result']->month,
                'day' => $convertedDate['japanese_calendar_result']->day,
                'valid_total_amount' => $wage->total_amount,
                'reduced_days24' => $result,
                'below_75_percent_flag' => $wage->total_amount <= $seventyFivePercentThreshold,
            ];
        })->toArray();
    }
}