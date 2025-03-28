<?php

namespace App\Livewire;

use Livewire\Component;

class HolidaysFormItem extends Component
{
    public $key = 0;
    public $item = [];
    public $errs = [];

    public function mount($key = 0, $item = [], $errs=[])
    {
        $this->key = $key;
        $this->item = $item;
        $this->errs = $errs;
    }
    public function render()
    {
        return view('livewire.holidays-form-item');
    }

    public function removeHoliday($index)
    {
        $this->dispatch('rm-holiday-item', $index);
    }
}
