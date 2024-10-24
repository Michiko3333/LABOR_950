<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FilterColumn extends Component
{
    public $name = '';
    public $list_all_base = [];
    public $list_all = [];
    public $list_show = [];
    public $value_all = null;
    public $value_show = null;
    public $filterSaveTarget = 'save-filter-column';

    public function mount(array $columns = [], array $default = [], $name = '')
    {
        $this->name = $name;
        $this->list_all_base = $columns;
        $this->list_show = $default;
        if (!empty($name)) $this->filterSaveTarget = $this->filterSaveTarget . '-' . $name;
    }

    public function render()
    {
        $show = array_column($this->list_show, 'value');
        $this->list_all = [];
        foreach ($this->list_all_base as $value) {
            if (!in_array($value['value'], $show)) array_push($this->list_all, $value);
        }

        $this->dispatchFilterColumn();
        return view('livewire.filter-column');
    }

    public function moveToShow()
    {
        $key = array_search($this->value_all, array_column($this->list_all, 'value'));
        if (count($this->list_all) < 1) return;

        $target = $this->list_all[$key];
        array_push($this->list_show, $target);
    }

    public function moveToAll()
    {
        $key = array_search($this->value_show, array_column($this->list_show, 'value'));
        if (count($this->list_show) < 1) return;

        unset($this->list_show[$key]);
        $this->list_show = array_values($this->list_show);
    }

    public function moveToUp()
    {
        $key = array_search($this->value_show, array_column($this->list_show, 'value'));
        if (count($this->list_show) < 1) {
            return;
        }

        if ($key - 1 < 0) return;

        $temp = $this->list_show[$key];
        $this->list_show[$key] = $this->list_show[$key - 1];
        $this->list_show[$key - 1] = $temp;
        $this->list_show = array_values($this->list_show);
        $this->value_show = $temp['value'];
    }

    public function moveToDown()
    {
        $key = array_search($this->value_show, array_column($this->list_show, 'value'));
        if (count($this->list_show) < 1) {
            return;
        }

        if ($key + 1 >= count($this->list_show)) return;

        $temp = $this->list_show[$key];
        $this->list_show[$key] = $this->list_show[$key + 1];
        $this->list_show[$key + 1] = $temp;
        $this->list_show = array_values($this->list_show);
        $this->value_show = $temp['value'];
    }

    public function getUserList()
    {
        return $this->list_show;
    }

    #[On('dispatch-filter-column')]
    public function dispatchFilterColumn()
    {
        if (empty($this->name)) {
            $this->dispatch('refresh-filter', $this->list_show);
        } else {
            $this->dispatch('refresh-filter:' . $this->name, $this->list_show);
        }
    }
}
