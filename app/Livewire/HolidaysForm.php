<?php

namespace App\Livewire;

use App\Models\Holidays;
use Livewire\Component;
use Livewire\Attributes\On;

use Carbon\Carbon;

class HolidaysForm extends Component
{
    public $year = 0;
    public $next_year = 0;
    public $select_year = 0;
    public $changeFlg = false;

    public $data = [];
    public $errs = [];

    public function mount($errors, $year=2025, $next_year=2026)
    {
        $this->year = $year;
        $this->next_year = $next_year;

        $this->select_year = $this->year;

        $this->getHolidays();

        if (!is_null($errors)) {
            foreach ($errors->keys() as $value) {
                array_push($this->errs, $value);
            }
        }
    }

    public function render()
    {
        if (count($this->data) < 1) {
            array_push($this->data, $this->defaultValues());
        }

        return view('livewire.holidays-form');
    }

    public function getHolidays()
    {
        $this->data = [];
        $c_ar = \old('holiday_name');
        if (!empty($c_ar)) {
            for ($i = 0; $i < count($c_ar); $i++) {
                $def = $this->defaultValues();
                foreach ($def as $key => $value) {
                    $oldValue = \old($key);
                    if (!is_null($oldValue) && is_array($oldValue) && array_key_exists($i, $oldValue)) {
                        $def[$key] = $oldValue[$i];
                    }
                }
                array_push($this->data, $def);
            }
        } else {
            if(!$this->changeFlg) {
                $holidays = Holidays::select('id', 'holiday_name', 'holiday_date')
                    ->whereYear('holiday_date', $this->year)
                    ->where('delete_flg', 0)
                    ->get();

                if(count($holidays) > 0) {
                    foreach($holidays as $holiday) {
                        $d = $this->defaultValues();
                        $d['id'] = $holiday->id;
                        $d['holiday_name'] = $holiday->holiday_name;
                        $d['holiday_date'] = $holiday->holiday_date;

                        array_push($this->data, $d);
                    }
                }
            } else {
                $holidays = Holidays::select('id', 'holiday_name', 'holiday_date')
                    ->whereYear('holiday_date', $this->next_year)
                    ->where('delete_flg', 0)
                    ->get();

                if(count($holidays) > 0) {
                    foreach($holidays as $holiday) {
                        $d = $this->defaultValues();
                        $d['id'] = $holiday->id;
                        $d['holiday_name'] = $holiday->holiday_name;
                        $d['holiday_date'] = $holiday->holiday_date;

                        array_push($this->data, $d);
                    }
                }
            }
        }

        \Log::info($this->data);
    }

    private function defaultValues()
    {
        $defaultValues = [
            'id' => '',
            'holiday_name' => '',
            'holiday_date' => '',
        ];

        return $defaultValues;
    }

    public function append()
    {
        array_push($this->data, $this->defaultValues());
    }

    public function copy()
    {
        $last_year = $this->select_year - 1;
        $last_year_holidays = Holidays::select('id', 'holiday_name', 'holiday_date')
            ->whereYear('holiday_date', $last_year)
            ->where('delete_flg', 0)
            ->get();

        if(count($last_year_holidays) > 0) {
            $this->data = [];
            foreach($last_year_holidays as $holiday) {
                $d = $this->defaultValues();
                $d['holiday_name'] = $holiday->holiday_name;
                $formattedDate = Carbon::parse($holiday->holiday_date)->addYear();
                $d['holiday_date'] = $formattedDate;

                array_push($this->data, $d);
            }
        }
    }

    #[On('onChangeYear')]
    public function onChangeYear($year)
    {
        $this->select_year = $year;
        $this->changeFlg = !$this->changeFlg;
        $this->getHolidays();
        \Log::info($this->changeFlg);
    }

    #[On('rm-holiday-item')]
    public function removeHolidayItem($index)
    {
        unset($this->data[$index]);
    }
}
