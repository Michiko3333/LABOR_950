<?php

namespace App\Livewire;

use App\Models\CurrentUser;
use App\Models\Branch;
use App\Models\Company;
use Livewire\Component;

class SearchBranchList extends BaseTable
{
    public $search = '';
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    public $laborMode = false;

    public $selectorBrName = '';
    public $selectorBrId = '';
    public $division = '';

    public $id = '';

    public function mount($id = '', $laborMode = false, $selectorBrName = '', $selectorBrId = '', $division = '')
    {
        $this->id = $id;
        $this->laborMode = $laborMode;
        $this->selectorBrName = $selectorBrName;
        $this->selectorBrId = $selectorBrId;
        $this->division = $division;
    }

    public function render()
    {
        $search = $this->search;
        $division = $this->division;
        $currentCompany = CurrentUser::CurrentCompany();
        $currentCompanyId = $currentCompany->id;
        $condition = Branch::select('id', 'name')
            ->where('company_id', $currentCompanyId)
            ->where('delete_flg', 0);
        if (!empty($search)) {
            $pat = '%' . addcslashes($search, '%_\\') . '%';
            $condition = $condition->where('name', 'LIKE', $pat);
        }

        $d = $this->getData($condition);
        $items = collect();
        foreach ($d['items'] as $key => &$item) {
            $obj = new \stdClass();
            $obj->id = $item->id;
            $obj->branch_name = $item->name;
            $items->push($obj);
        }
        $d['items'] = $items;
        $this->data = $d;
        
        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.search-branch-list');
    }

    public function selectBranch($id)
    {
        $this->paginated = true;
        $items = $this->data['items'];
        $output = [];

        $d = $items->where('id', $id)->first();

        $output = [
            'id' => $d->id,
            'branch_id' => $d->id,
            'branch_name' => $d->branch_name,
            'selector_br_id' => $this->selectorBrId,
            'selector_br_name' => $this->selectorBrName,
            'modal_id' => $this->id
        ];

        $this->dispatch('modal-onSelectBranch', data: $output);

        $this->search = '';
        $this->page = 1;
    }
}
