<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\ShiftCalendar;
use App\Models\ShiftCalendarHoliday;
use App\Models\Values_branch_start_days_of_week;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ShiftForm extends Component
{
    private $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    public $errs = [];

    public $start_year;
    public $start_month;
    public $start_weekday = 7;
    public $start_date = 1;
    public $render_months = [];
    public $is_default = false;

    public $branch_value = null;
    public $title_value = null;

    public $initial_date = '';
    public $initial_weekday = '';

    public $editable = true;

    public $weeks = [];
    public $day_list = [];
    public $year_list = [];
    public $values = [];

    public $branch_list = [];

    public $current_shift = 0;
    public $saved_list = [];

    public $is_saving = false;

    public $work_time = 0;

    public function mount($editable = true)
    {
        $current_user = new CurrentUser();
        $current_company = $current_user->currentCompany();

        $this->editable = $editable;

        $this->branch_list = $current_company->branch()->get()->pluck('name', 'id');

        $current_main_branch = $current_company->branch()->where('branch_type', 1)->where('delete_flg', 0)->first();
        if (!empty($current_main_branch)) {
            $h = $current_main_branch->agreed_hours_day_h;
            $m = $current_main_branch->agreed_hours_day_m;
            $this->work_time = $h + floor($m / 60 * 100) / 100;
        }

        $shiftCalendar = ShiftCalendar::where('company_id', $current_company->id)->where('delete_flg', 0)->orderBy('is_default', 'desc');

        $this->saved_list = $shiftCalendar->get()->pluck('title', 'id');
        $this->saved_list[0] = '新規';

        if ($this->current_shift > 0) {
            $shiftCalendar = $shiftCalendar->where('id', $this->current_shift);
        }
        $master = $shiftCalendar->first();

        if (empty($master)) {
            $main_branch = Branch::where('company_id', $current_company->id)->where('branch_type', 1)->first();
            $this->title_value = '';
            $this->start_year = date('Y');
            $this->start_month = $current_company->start_month_of_year ?? 1;
            $this->start_date = $current_company->start_day_of_month ?? 1;
            $this->start_weekday = $current_company->start_day_of_week ?? 7;
            $this->branch_value = $main_branch->id;
            $this->is_default = 0;
            $this->current_shift = 0;
        } else {
            $this->current_shift = $master->id;
            $this->title_value = $master->title;
            $this->start_year = $master->year;
            $this->start_month = $master->month;
            $this->start_date = $master->day;
            $this->start_weekday = $master->week;
            $this->branch_value = $master->branch_id ?? $current_company->branch_id;
            $this->is_default = $master->is_default;

            $holidays = ShiftCalendarHoliday::where('company_id', $current_company->id)
                ->where('shift_calendar_id', $master->id)
                ->where('delete_flg', 0)
                ->get();

            foreach ($holidays as $holiday) {
                $date = [
                    'full' => date('Y-m-d', strtotime($holiday->full_date)),
                    'color' => 'var(--color-red)',
                    'year' => $holiday->year,
                    'month' => $holiday->month,
                    'date' => $holiday->day,
                    'mark' => 'holiday'
                ];
                $this->values[] = $date;
            }
        }

        $cr = (int) date('Y');
        $this->year_list = [];
        for ($i = $cr - 2; $i < $cr + 3; $i++) {
            $this->year_list[] = $i;
        }
        $this->weeks = Values_branch_start_days_of_week::pluck('name', 'id');

        $this->makeListData();
    }

    public function render()
    {
        $this->render_months = $this->reorderMonths($this->start_month);
        if (!checkdate($this->start_month, $this->start_date, $this->start_year)) {
            $this->start_date = 1;
        }
        $this->makeListData();

        $current_company = CurrentUser::currentCompany();
        $shiftCalendar = ShiftCalendar::where('company_id', $current_company->id)->where('delete_flg', 0)->orderBy('is_default', 'desc');
        $this->saved_list = $shiftCalendar->get()->pluck('title', 'id');
        $this->saved_list[0] = '新規';

        $this->dispatch('holiday-modal-week-order', $this->start_weekday);

        return view('livewire.shift-form');
    }

    public function makeListData()
    {
        $last_day = date('j', strtotime('last day of', strtotime('01-' . $this->start_month . '-' . $this->start_year)));
        $this->day_list = [];
        for ($c = 1; $c <= $last_day; $c++) {
            $this->day_list[] = $c;
        }
    }

    public function reorderMonths($startMonth)
    {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        if ($startMonth < 1 || $startMonth > 12) {
            $startMonth = 1;
        }

        $startIndex = array_search($startMonth, $months);
        $firstPart = array_slice($months, $startIndex);
        $secondPart = array_slice($months, 0, $startIndex);

        return array_merge($firstPart, $secondPart);
    }

    public function formatDate(int $year, int $month, int $date)
    {
        $today = date('Y-m-d');
        if (checkdate($month, $date, $year)) {
            return date('Y-m-d', strtotime("$year-$month-$date"));
        }
        return $today;
    }

    public function save()
    {
        if ($this->is_saving) return;

        $r = $this->validate([
            'title_value' => 'required|string|max:100',
            'start_year' => 'numeric|between:1000,9999|max_digits:4',
            'start_month' => 'numeric|between:1,12|max_digits:2',
            'start_date' => 'numeric|between:1,31|max_digits:2',
            'start_weekday' => 'numeric|between:1,7',
        ]);

        $this->is_saving = true;

        DB::beginTransaction();
        try {
            $current_company = CurrentUser::currentCompany();
            if (!empty($this->is_default)) {
                ShiftCalendar::where('company_id', $current_company->id)->where('delete_flg', 0)->update(['is_default' => 0]);
            }
            if ($this->current_shift > 0) {
                $target = ShiftCalendar::where('id', $this->current_shift)->where('company_id', $current_company->id)->where('delete_flg', 0);
                $target->update([
                    'company_id' => $current_company->id,
                    'branch_id' => $this->branch_value,
                    'title' => $this->title_value,
                    'year' => $this->start_year,
                    'month' => $this->start_month,
                    'day' => $this->start_date,
                    'week' => $this->start_weekday,
                    'is_default' => $this->is_default
                ]);
                $from = date('Y-m-d 00:00:00', strtotime($this->start_year . '-' . $this->start_month . '-' . $this->start_date));
                $tmp = strtotime($this->start_year . '-' . $this->start_month . '-' . $this->start_date);
                $to = date('Y-m-d 00:00:00', strtotime('+1 year', $tmp));

                ShiftCalendarHoliday::whereBetween('full_date', [$from, $to])
                    ->where('company_id', $current_company->id)
                    ->where('shift_calendar_id', $this->current_shift)
                    ->update(['delete_flg' => 1]);

                foreach ($this->values as $value) {
                    $q = ShiftCalendarHoliday::where('company_id', $current_company->id)
                        ->where('shift_calendar_id', $this->current_shift)
                        ->where('year', $value['year'])
                        ->where('month', $value['month'])
                        ->where('day', $value['date']);

                    if ($q->exists()) {
                        $q->update([
                            'delete_flg' => 0
                        ]);
                    } else {
                        ShiftCalendarHoliday::create([
                            'company_id' => $current_company->id,
                            'shift_calendar_id' => $this->current_shift,
                            'year' => $value['year'],
                            'month' => $value['month'],
                            'day' => $value['date'],
                            'full_date' => date('Y-m-d', strtotime($value['full']))
                        ]);
                    }
                }
            } else {
                $target = ShiftCalendar::create([
                    'company_id' => $current_company->id,
                    'branch_id' => $this->branch_value,
                    'title' => $this->title_value,
                    'year' => $this->start_year,
                    'month' => $this->start_month,
                    'day' => $this->start_date,
                    'week' => $this->start_weekday,
                    'is_default' => $this->is_default
                ]);
                foreach ($this->values as $value) {
                    ShiftCalendarHoliday::create([
                        'company_id' => $current_company->id,
                        'shift_calendar_id' => $target->id,
                        'year' => $value['year'],
                        'month' => $value['month'],
                        'day' => $value['date'],
                        'full_date' => date('Y-m-d', strtotime($value['full']))
                    ]);
                }
            }
            DB::commit();
            $this->dispatch('onSavedShiftCalendar');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e);
            $this->dispatch('onErrorShiftCalendar');
        }
        $this->is_saving = false;
        $this->render();
    }

    #[On('calendar-small-clicked')]
    public function CalendarClicked($dateStr)
    {

        $date = [
            'full' => date('Y-m-d', strtotime($dateStr)),
            'color' => 'var(--color-red)',
            'year' => date('Y', strtotime($dateStr)),
            'month' => date('n', strtotime($dateStr)),
            'date' => date('j', strtotime($dateStr)),
            'mark' => 'holiday'
        ];

        $targetFull = $date['full'];

        $found = false;
        foreach ($this->values as $key => $item) {
            if ($item['full'] === $targetFull) {
                // 一致する要素があれば削除
                unset($this->values[$key]);
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->values[] = $date;
        }

        $this->values = array_values($this->values);
    }

    public function setHoliday($year, $month, $day)
    {
        $str = $year . '-' . $month . '-' . $day;
        $date = [
            'full' => date('Y-m-d', strtotime($str)),
            'color' => 'var(--color-red)',
            'year' => date('Y', strtotime($str)),
            'month' => date('n', strtotime($str)),
            'date' => date('j', strtotime($str)),
            'mark' => 'holiday'
        ];

        $targetFull = $date['full'];

        $found = false;
        foreach ($this->values as $key => $item) {
            if ($item['full'] === $targetFull) {
                // 一致する要素があれば削除
                $found = true;
                break;
            }
        }

        if (!$found) {
            return $date;
        }
        return [];
    }

    public function download()
    {
        $currentCompany = CurrentUser::currentCompany();
        $data = [
            'origin' => [
                'title' => $this->title_value,
                'year' => $this->start_year,
                'month' => $this->start_month,
                'day' => $this->start_date,
                'week' => $this->start_weekday,
            ],
            'render_months' => $this->render_months,
            'values' => $this->values,
            'company_name' => $currentCompany->name,
            'work_time' => $this->work_time
        ];
        return redirect('/calendar/shift/download')->with('shift-pdf-data', $data);
    }

    #[On('insert-holidays')]
    public function insertHolidays($array)
    {
        $year = $this->start_year;
        $start_day = $this->start_weekday;
        $start_date = $this->start_date;
        $add_values = $this->values;
        foreach ($this->render_months as $month) {
            if ($start_day < 0 || $start_day > 6) $start_day = 0;
            $before_start_day = array_slice($this->day_base, 0, $start_day);
            $after_start_day = array_slice($this->day_base, $start_day);
            $days = array_merge($after_start_day, $before_start_day);

            $first_day_of_week = array_search(date('D', strtotime($year . '-' . $month . '-1')), $days);
            $num_days = date('t', strtotime('01-' . $month . '-' . $year));
            $s_year = $year;
            $s_month = $month;
            $c = 0;
            $w = array_search(date('D', strtotime($year . '-' . $month . '-' . $start_date)), $days);
            for ($i = $start_date; $i <= $num_days + $start_date - 1; $i++) {
                $num = $i > $num_days ? $i - $num_days : $i;
                $row = ceil(($w + 1 + $c) / 7);
                if ($row > 6) $week = [];
                else $week = $array[$row];

                if (checkdate($s_month, $num, $s_year)) {
                    $week_num = date('w', strtotime($s_year . '-' . $s_month . '-' . $num));
                    $week_name = $this->day_base[$week_num];
                    if (!empty($week[$week_name])) {
                        $holiday = $this->setHoliday($s_year, $s_month, $num);
                        if (!empty($holiday)) $add_values[] = $holiday;
                    }
                }

                if ($num == $num_days) {
                    $s_month++;
                    if ($s_month == 13) {
                        $s_month = 1;
                        $s_year++;
                    }
                }
                $c++;
            }

            if ($month == 12) {
                $year++;
            }
        }
        $this->values = array_values($add_values);
    }

    public function onChangeShiftId()
    {
        $current_company = CurrentUser::info();
        $main_branch = Branch::where('company_id', $current_company->id)->where('branch_type', 1)->first();

        $this->values = [];

        if ($this->current_shift > 0) {
            $master = ShiftCalendar::where('company_id', $current_company->id)->where('id', $this->current_shift)->where('delete_flg', 0)->first();

            $this->current_shift = $master->id;
            $this->title_value = $master->title;
            $this->start_year = $master->year;
            $this->start_month = $master->month;
            $this->start_date = $master->day;
            $this->start_weekday = $master->week;
            $this->branch_value = $master->branch_id;
            $this->is_default = $master->is_default;

            $holidays = ShiftCalendarHoliday::where('company_id', $current_company->id)
                ->where('shift_calendar_id', $master->id)
                ->where('delete_flg', 0)
                ->get();

            foreach ($holidays as $holiday) {
                $date = [
                    'full' => date('Y-m-d', strtotime($holiday->full_date)),
                    'color' => 'var(--color-red)',
                    'year' => $holiday->year,
                    'month' => $holiday->month,
                    'date' => $holiday->day,
                    'mark' => 'holiday'
                ];
                $this->values[] = $date;
            }
        } else {
            $this->title_value = '';
            $this->start_year = date('Y');
            $this->start_month = $current_company->start_month_of_year ?? 1;
            $this->start_date = $current_company->start_day_of_month ?? 1;
            $this->start_weekday = $current_company->start_day_of_week ?? 7;
            $this->branch_value = $main_branch->id;
            $this->is_default = false;
        }

        $this->render();
    }
}
