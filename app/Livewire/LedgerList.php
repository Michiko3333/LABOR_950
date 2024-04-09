<?php

namespace App\Livewire;

use App\Models\Ledger;

class LedgerList extends BaseTable
{
    public $limit = 10;
    public $search = '';

    public function mount($page = 1, $search = '')
    {
        $this->page = $page;
        $this->search = $search;
    }

    public function render()
    {
        $condition = Ledger::select(
            'procedure_id',
            'procedure_name'
        );

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('procedure_name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);

        return view('livewire.ledger-list');
    }
}
