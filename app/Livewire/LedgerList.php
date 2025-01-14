<?php

namespace App\Livewire;

use App\Models\Ledger;
use App\Models\LedgerCategory;
use App\Models\LedgerCategoryBig;
use App\Models\LedgerCategoryMedium;

class LedgerList extends BaseTable
{
    public $limit = 10;
    public $search = '';

    public $big_categories = [];
    public $medium_categories = [];
    public $big_category_id = '';
    public $medium_category_id = '';

    public function mount($search = '')
    {
        $this->page = request()->get('p', 1);
        $this->paginated = true;
        $this->pageMemory = true;
        $this->search = $search;
        $this->big_categories =LedgerCategoryBig::pluck('big_category_name', 'id')->toArray();
        $this->medium_categories =LedgerCategoryMedium::pluck('medium_category_name', 'id')->toArray();
    }

    public function updatedBigCategoryId($value)
    {
        $this->medium_category_id = null;
        $this->medium_categories = LedgerCategoryMedium::when(!empty($value), function ($query) use ($value) {
            return $query->where('big_category_id', $value);
        })
        ->pluck('medium_category_name', 'id')
        ->toArray();
    }

    public function render()
    {
        $big_category_id = $this->big_category_id;
        $medium_category_id = $this->medium_category_id;
        
        $ids = [];

        $condition = Ledger::select(
            'procedure_id',
            'procedure_name'
        );

        $filtered_ledger = LedgerCategory::when(!empty($big_category_id), function ($query) use ($big_category_id) {
            return $query->where('big_category_id', $big_category_id);
        })
        ->when(!empty($medium_category_id), function ($query) use ($medium_category_id) {
            return $query->where('medium_category_id', $medium_category_id);
        })
        ->pluck('ledger_id');
        if (!empty($filtered_ledger)) {
            $condition = Ledger::select('procedure_id', 'procedure_name')
            ->whereIn('id', $filtered_ledger);
        }else{
            $condition = Ledger::select('procedure_id', 'procedure_name');
        }
        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('procedure_name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);

        foreach($this->data['items'] as $item) {
            $ids[] = $item->procedure_id;
        }

        $this->RestrictingQueryParameters($ids);
        
        return view('livewire.ledger-list', [
            'big_categories' => $this->big_categories,
            'medium_categories' => $this->medium_categories,
        ]);
    }
}
