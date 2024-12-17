<?php

namespace App\Livewire;

use App\Models\Ledger;

class LedgerList extends BaseTable
{
    public $limit = 10;
    public $search = '';

    public function mount($search = '')
    {
        $this->page = request()->get('p', 1);
        $this->paginated = true;
        $this->pageMemory = true;
        $this->search = $search;
    }

    public function render()
    {
        $ids = [];

        $condition = Ledger::select(
            'procedure_id',
            'procedure_name'
        );

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('procedure_name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);

        foreach($this->data['items'] as $item) {
            $ids[] = $item->procedure_id;
        }

        $this->RestrictingQueryParameters($ids);

        return view('livewire.ledger-list');
    }
}
