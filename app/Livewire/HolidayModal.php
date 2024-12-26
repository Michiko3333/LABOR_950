<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class HolidayModal extends Component
{
    private $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $days_ja = [
        'Sun' => '日',
        'Mon' => '月',
        'Tue' => '火',
        'Wed' => '水',
        'Thu' => '木',
        'Fri' => '金',
        'Sat' => '土'
    ];
    public $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $start_day = 7;

    public $week1 = [];
    public $week2 = [];
    public $week3 = [];
    public $week4 = [];
    public $week5 = [];
    public $week6 = [];


    public function render()
    {
        if ($this->start_day < 0 || $this->start_day > 6) $this->start_day = 0;
        $before_start_day = array_slice($this->day_base, 0, $this->start_day);
        $after_start_day = array_slice($this->day_base, $this->start_day);

        $this->days = array_merge($after_start_day, $before_start_day);

        return view('livewire.holiday-modal');
    }

    #[On('holiday-modal-week-order')]
    public function onChangeWeekOrder($num)
    {
        $this->start_day = $num;
    }

    #[On('holiday-modal-insert')]
    public function onClickInsert()
    {
        $this->dispatch('insert-holidays', [
            '1' => $this->week1,
            '2' => $this->week2,
            '3' => $this->week3,
            '4' => $this->week4,
            '5' => $this->week5,
            '6' => $this->week6,
        ]);
        $this->week1 = [];
        $this->week2 = [];
        $this->week3 = [];
        $this->week4 = [];
        $this->week5 = [];
        $this->week6 = [];
    }

    #[On('holiday-modal-cancel')]
    public function onCancel()
    {
        $this->week1 = [];
        $this->week2 = [];
        $this->week3 = [];
        $this->week4 = [];
        $this->week5 = [];
        $this->week6 = [];
    }
}
