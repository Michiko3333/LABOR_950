<?php

namespace App\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $total;
    public $currentPage;
    public $perPageNum;
    public $visibleNum = 2;

    public function mount($total, $currentPage = 1, $perPageNum = 10)
    {
        $this->total = (int) $total;
        $this->currentPage = (int) $currentPage;
        $this->perPageNum = (int) $perPageNum;
    }

    public function render()
    {
        $pageCount = floor($this->total / $this->perPageNum);
        $disableFirst = $this->currentPage <= 1;
        $disableLast = $this->currentPage >= $pageCount;

        $ar = $this->paginate($this->currentPage, $pageCount);
        $elements = [];

        for ($i = 0; $i < count($ar); $i++) {
            if ($ar[$i] == $pageCount && $this->currentPage < $pageCount - 2) {
                $elements[] = '...';
            }

            $elements[] = $ar[$i];

            if ($ar[$i] == 1 && $this->currentPage > 3) {
                $elements[] = '...';
            }
        }

        return view('livewire.pagination', [
            'disableFirst' => $disableFirst,
            'disableLast' => $disableLast,
            'elements' => $elements,
        ]);
    }

    public function paging($page)
    {
        if ($this->currentPage != $page) {
            $this->currentPage = $page;
            $this->emit('pageChanged', $page);
        }
    }

    public function paginate($c, $t)
    {
        $l = $r = [];
        $d = array_filter([$c - 2, $c - 1, $c, $c + 1, $c + 2], function ($n) use ($t) {
            return $n > 1 && $n < $t;
        });
        $d = array_merge($d);

        $diff = 5 - count($d);
        if (count($d) > 0) {
            for ($i = 1; $i < $diff; $i++) {
                array_unshift($l, $d[0] - $i);
                array_push($r, $d[count($d) - 1] + $i);
            }
        }

        if ($t == 0) $t = 1;
        return array_unique(array_merge([1], array_filter(array_merge($l, $d, $r), function ($n) use ($t) {
            return $n > 1 && $n < $t;
        }), [$t]));
    }

    public function movePage($page)
    {
        $this->dispatch('movePage', page: $page);
    }

    public function onPrev()
    {
        $this->dispatch('onPrev');
    }
    public function onNext()
    {
        $this->dispatch('onNext');
    }
}
