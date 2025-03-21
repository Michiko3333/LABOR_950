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
    public $tmp = [];
    public $value_all = null;
    public $value_show = null;
    public $filterShowTarget = 'show-filter-column';
    public $filterSaveTarget = 'save-filter-column';
    public $filterHiddenTarget = 'hidden-filter-column';
    public $select_all = null;
    public $select_show = null;
    public $isFirst = true;

    public function mount(array $columns = [], array $default = [], $name = '')
    {
        $this->name = $name;
        $this->list_all_base = $columns;
        $this->list_show = $default;
        if (!empty($name)) $this->filterSaveTarget = $this->filterSaveTarget . '-' . $name;
    }

    public function render()
    {

        $this->list_all = [];
        $show = array_column($this->list_show, 'value');

        foreach ($this->list_all_base as $value) {
            if (!in_array($value['value'], $show)) array_push($this->list_all, $value);
        }

        if ($this->isFirst) {
            $this->dispatchFilterColumn();
            $this->isFirst = false;
        }

        return view('livewire.filter-column');
    }

    public function moveToShow()
    {
        if ($this->select_all === null) {
            $this->select_all = 0;
            $this->select_show = null;
        }

        $current = array_filter($this->list_all, function ($e) {
            return !empty($e['parent']);
        });

        if (count($current) < 1) return;

        $id = $this->select_all;
        for ($i = $this->select_all; $i < count($this->list_all); $i++) {
            if (!empty($this->list_all[$i]['parent'])) {
                $id = $i;
                break;
            }
        }

        $this->select_all = $id;
        array_push($this->list_show, $this->list_all[$this->select_all]);
    }

    public function moveToAll()
    {
        if ($this->select_show === null) {
            $this->select_show = 0;
            $this->select_all = null;
        }

        $current = array_filter($this->list_show, function ($e) {
            return !empty($e['parent']);
        });

        if (count($current) < 1) return;

        $id = $this->select_show;
        for ($i = $this->select_show; $i < count($this->list_show); $i++) {
            if (!empty($this->list_show[$i]['parent'])) {
                $id = $i;
                break;
            }
        }

        $this->select_show = $id;
        unset($this->list_show[$this->select_show]);
        $this->list_show = array_values($this->list_show);
    }

    public function moveToUp()
    {
        $key = $this->select_show;

        if ($key < 1) return;

        $temp = $this->list_show[$key];
        $this->list_show[$key] = $this->list_show[$key - 1];
        $this->list_show[$key - 1] = $temp;
        $this->list_show = array_values($this->list_show);
        $this->select_show = $key - 1;
    }

    public function moveToDown()
    {
        $key = $this->select_show;
        if ($key >= count($this->list_show) - 1 || $key == '') return;

        $temp = $this->list_show[$key];
        $this->list_show[$key] = $this->list_show[$key + 1];
        $this->list_show[$key + 1] = $temp;
        $this->list_show = array_values($this->list_show);
        $this->select_show = $key + 1;
    }

    public function getUserList()
    {
        return $this->list_show;
    }

    public function selectAll($i)
    {
        if (empty($this->list_all[$i])) return;
        if (empty($this->list_all[$i]['parent'])) return;
        $this->select_all = $i;
        $this->select_show = null;
    }

    public function selectShow($i)
    {
        if (empty($this->list_show[$i])) return;
        if (empty($this->list_show[$i]['parent'])) return;
        $this->select_show = $i;
        $this->select_all = null;
    }

    #[On('dispatch-filter-column')]
    public function dispatchFilterColumn()
    {
        if (empty($this->name)) {
            $this->dispatch('refresh-filter', $this->list_show, $this->isFirst);
        } else {
            $this->dispatch('refresh-filter:' . $this->name, $this->list_show, $this->isFirst);
        }
    }

    #[On('show-filter-column')]
    public function onShowEvent()
    {
        $this->tmp = $this->list_show;
    }

    #[On('hidden-filter-column')]
    public function onHiddenEvent()
    {
        $this->list_show = $this->tmp;
    }
}
