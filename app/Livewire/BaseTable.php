<?php

namespace App\Livewire;

use Livewire\Component;

class BaseTable extends Component
{
    public $page = 1;
    public $limit = 10;
    public $offset = 0;

    public $data = [];

    protected function getData($condition)
    {
        $page = $this->page;
        $pageSize = $this->limit;

        // 条件を満たす全アイテム数を効率的に取得
        $totalItems = $condition->count();

        // 必要なデータのみを効率的に取得
        $items = $condition->skip(($page - 1) * $pageSize)->take($pageSize)->get();

        // 全ページ数を計算
        $totalPages = ceil($totalItems / $pageSize);

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
}
