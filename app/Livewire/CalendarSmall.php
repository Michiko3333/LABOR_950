<?php

namespace App\Livewire;

use App\Models\Calendar_event;
use App\Models\CurrentUser;
use App\Models\Values_calendar_event_category_type;
use App\Permission;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On;

class CalendarSmall extends Component
{
    private $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    public $start_day = 0;

    public $date = null;
    public $today = null;
    public $active_year, $active_month;
    public $showHeader = false;
    public $days_ja = [
        'Sun' => '日',
        'Mon' => '月',
        'Tue' => '火',
        'Wed' => '水',
        'Thu' => '木',
        'Fri' => '金',
        'Sat' => '土'
    ];
    public $num_days = '';
    public $num_days_last_month = '';
    public $num_days_next_month = '';
    public $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $first_day_of_week = 0;
    public $events = [];

    public $years = [];
    public $months = array(
        1 => '01',
        2 => '02',
        3 => '03',
        4 => '04',
        5 => '05',
        6 => '06',
        7 => '07',
        8 => '08',
        9 => '09',
        10 => '10',
        11 => '11',
        12 => '12'
    );


    public $select_year, $select_month;
    public $select_date = 1;
    public $current_edit_id = 0;

    public $inputs_edit_id = 0;
    public $inputs_name = '';
    public $inputs_category = '';
    public $inputs_contents = '';
    public $inputs_error = false;

    public $isOpen = false;
    public $clickable = false;
    public $values = [];

    public function mount(int $year, int $month, bool $showHeader = false, int $firstDayWeek = 0, int $firstDate = 1, bool $clickable = false, array $values = [])
    {
        $this->showHeader = $showHeader;
        $this->clickable = $clickable;
        $this->select_date = $firstDate;
        $this->start_day = $firstDayWeek;
        $this->today = $this->formatDate($year, $month, $this->select_date);
        $current_date = date('Y', strtotime($this->today));
        $one_year_ago = date('Y', strtotime('-1 year', strtotime($current_date)));
        $one_year_later = date('Y', strtotime('+1 year', strtotime($current_date)));
        $this->years = array(
            'one_year_ago' => $one_year_ago,
            'current_date' => $current_date,
            'one_year_later' => $one_year_later
        );

        $this->select_year = $current_date;
        $this->select_month = date('m', strtotime($this->today));
        $this->values = $values;
        $this->calcDate();
    }

    public function render()
    {
        $this->calcDate();

        if ($this->start_day < 0 || $this->start_day > 6) $this->start_day = 0;
        $before_start_day = array_slice($this->day_base, 0, $this->start_day);
        $after_start_day = array_slice($this->day_base, $this->start_day);

        $this->days = array_merge($after_start_day, $before_start_day);

        $this->events = [];

        $this->num_days = date('t', strtotime('01-' . $this->active_month . '-' . $this->active_year));
        $this->num_days_last_month = date('j', strtotime('last day of previous month', strtotime('01-' . $this->active_month . '-' . $this->active_year)));
        $this->num_days_next_month = date('j', strtotime('last day of next month', strtotime('01-' . $this->active_month . '-' . $this->active_year)));
        $this->first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $this->days);

        return view('livewire.calendar-small');
    }

    public function calcDate()
    {
        $this->date = date('y-m-d', strtotime($this->select_year . '-' . $this->select_month . '-' . $this->select_date));
        $this->active_year = $this->date != null ? date('Y', strtotime($this->date)) : date('Y');
        $this->active_month = $this->date != null ? date('m', strtotime($this->date)) : date('m');
    }

    public function add_event($id, $txt, $date, $days = 1, $color = '')
    {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$id, $txt, $date, $days, $color];
    }

    public function checkdate($event, $i, $d)
    {
        return date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[2]));
    }

    public function formatDate(int $year, int $month, int $date)
    {
        $today = date('Y-m-d');
        if (checkdate($month, $date, $year)) {
            return date('Y-m-d', strtotime("$year-$month-$date"));
        }
        return $today;
    }

    public function page($move)
    {
        $min = strtotime($this->years['one_year_ago'] . '-01-01 00:00');
        $max = strtotime($this->years['one_year_later'] . '-12-31 23:59');
        if ($move == 'next') {
            $m = strtotime('+1 month', strtotime($this->date));
            if ($max > $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));
            }
        } else {
            $m = strtotime('-1 month', strtotime($this->date));
            if ($min <= $m) {
                $d = date('Y-m-d', $m);
                $this->select_year = date('Y', strtotime($d));
                $this->select_month = date('m', strtotime($d));
            }
        }
    }

    public function isToday($i)
    {
        return $i == date('d', strtotime($this->today)) && $this->active_month == date('m', strtotime($this->today)) && $this->active_year == date('Y', strtotime($this->today));
    }

    public function setToday()
    {
        $this->select_year = date('Y', strtotime($this->today));
        $this->select_month = date('m', strtotime($this->today));
    }

    public function clickNum($num)
    {
        $clicked_date = $this->formatDate($this->select_year, $this->select_month, $num);
        $this->dispatch('calendar-small-clicked', $clicked_date);
    }
}
