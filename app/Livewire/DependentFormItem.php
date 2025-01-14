<?php

namespace App\Livewire;

use Livewire\Component;

class DependentFormItem extends Component
{
    public $employee;
    public $item = [];
    public $key = 0;
    public $errs = [];
    public $spouseExists;

    public $prefectures = [];

    protected $listeners = ['updateItem','spouseFlagChanged'];

    public function mount($employee, $item = [], $key = 0, $list, $errs, $spouseExists = null)
    {
        $this->employee = $employee;
        $this->prefectures = $list['prefectures'];

        $this->key = $key;
        $this->item = $item;

        $this->errs = $errs;
        $this->spouseExists = $spouseExists;
    }
    public function render()
    {
        return view('livewire.dependent-form-item');
    }
    public function updated($propertyName)
    {
        if ($propertyName === 'item.de-spouse_flag') {
            $this->dispatch('spouseFlagUpdated');
        }
    }
    public function spouseFlagChanged()
    {
        $this->spouseExists = !$this->spouseExists;
    }  

    public function switchAccordion()
    {
        $this->item['lw-accordion'] = !$this->item['lw-accordion'];
    }

    public function removeDependent($index)
    {
        $this->dispatch('rm-dependent-item', $index);
    }

    public function removeDependentHistoryItem($index)
    {
        $this->dispatch('rm-dependent-history-item', $index);
    }
    
    public function history($index)
    {
        $this->dispatch('history-dependent-item', $index);
    }

    public function updateItem($updatedItem)
    {
        $this->item = $updatedItem[$this->key];
    }
}
