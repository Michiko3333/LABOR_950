<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class BaseTable extends Component
{
    public $page = 1;
    public $limit = 10;
    public $offset = 0;

    public $data = [];

    public $paginated = false;

    public $useColumnFilter = false;
    public $showColumns = [];

    public $pageMemory = false;

    protected function getData($condition)
    {
        if (!$this->paginated) $this->page = 1;
        $page = $this->page;
        $pageSize = $this->limit;

        // 条件を満たす全アイテム数を効率的に取得
        $totalItems = $condition->count();

        // 必要なデータのみを効率的に取得
        $items = $condition->skip(($page - 1) * $pageSize)->take($pageSize)->get();

        // 全ページ数を計算
        $totalPages = ceil($totalItems / $pageSize);

        $this->paginated = false;

        // ページ情報とデータを返す
        return [
            'items' => $items,
            'pagination' => [
                'totalItems' => $totalItems,
                'currentPage' => $page,
                'pageSize' => $pageSize,
                'totalPages' => $totalPages,
            ],
        ];
    }

    // クエリパラメーターのバリデーション
    public function RestrictingQueryParameters(array $ids)
    {
        $queryParameterP = request()->get('p');
        $totalPages = $this->data['pagination']['totalPages'];
        if(isset($queryParameterP)) {
            if(1 > $queryParameterP || $queryParameterP > $totalPages) {
                abort(404);
            }
        }

        $queryParameterId = request()->query('id');
        if(isset($queryParameterId)) {
            if (!in_array($queryParameterId, $ids)) {
                abort(404);
            }
        }
    }

    public function isShowColumn($value)
    {
        $key = array_search($value, array_column($this->showColumns, 'value'));
        $r = $key > -1;

        return $this->useColumnFilter ? $r : true;
    }

    protected function dispatchFilter()
    {
        if ($this->useColumnFilter) $this->dispatch('dispatch-filter-column');
    }

    #[On('movePage')]
    public function movePage($page)
    {
        $this->paginated = true;
        if($page === 0) {
            return;
        }
        $this->page = $page;
        if($this->pageMemory) {
            $this->dispatch('pageMemory', $this->page);
        }
    }
    #[On('onPrev')]
    public function onPrev()
    {
        $this->paginated = true;
        $this->page = $this->page - 1;
        if($this->pageMemory) {
            $this->dispatch('pageMemory', $this->page);
        }
    }
    #[On('onNext')]
    public function onNext()
    {
        $this->paginated = true;
        $this->page = $this->page + 1;
        if($this->pageMemory) {
            $this->dispatch('pageMemory', $this->page);
        }
    }
    #[On('refresh-filter')]
    public function filterColumn($list)
    {
        $this->showColumns = $list;
    }
}
