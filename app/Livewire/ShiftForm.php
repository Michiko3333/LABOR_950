<?php

namespace App\Livewire;

use App\Models\CurrentUser;
use Livewire\Component;

class ShiftForm extends Component
{
    public $errs = [];

    public $start_year = 2000;
    public $start_month = 1;
    public $start_weekday = 1;
    public $start_date = 1;
    public $render_months = [];

    public $branch_list = [];

    public $branch_value = null;
    public $title_value = null;

    public $initial_date = '';
    public $initial_weekday = '';

    public $clickable = true;

    private $days_ja = [
        '日',
        '月',
        '火',
        '水',
        '木',
        '金',
        '土'
    ];

    public $test = [];

    public function mount(int $start_year, int $start_month = 1, int $start_weekday = 0, int $start_date = 1, bool $clickable = true)
    {
        $this->clickable = $clickable;
        $this->start_year = $start_year;
        $this->start_month = $start_month;
        $this->start_weekday = $start_weekday;
        $this->start_date = $start_date;

        $this->initial_date = $this->start_year . '/' . $this->start_month . '/' . $this->start_date;
        $this->initial_weekday = $this->days_ja[$this->start_weekday];

        $current_user = new CurrentUser();
        $current_company = $current_user->currentCompany();
        $this->branch_list = $current_company->branch()->where('delete_flg', 0)->get();
        $this->test = [];

        $date = $this->formatDate(2024, 10, 30);
        array_push($this->test, [
            'full' => $date,
            'color' => 'var(--color-red)',
            'year' => date('Y', strtotime($date)),
            'month' => date('n', strtotime($date)),
            'date' => date('j', strtotime($date)),
            'mark' => 'rest'
        ]);
    }

    public function render()
    {
        $this->render_months = $this->reorderMonths($this->start_month);

        return view('livewire.shift-form');
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
}
