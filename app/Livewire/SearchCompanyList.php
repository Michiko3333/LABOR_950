<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Company;
use Livewire\Component;

class SearchCompanyList extends BaseTable
{
    public $search = '';
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    public $laborMode = false;

    public $selectorName = '';
    public $selectorId = '';
    public $selectorBrName = '';
    public $selectorBrId = '';
    public $withBranch = false;
    public $division = '';

    public $id = '';

    public function mount($id = '', $laborMode = false, $selectorName = '', $selectorId = '', $selectorBrName = '', $selectorBrId = '', $division = '', $withBranch = false)
    {
        $this->id = $id;
        $this->laborMode = $laborMode;
        $this->selectorName = $selectorName;
        $this->selectorId = $selectorId;
        $this->selectorBrName = $selectorBrName;
        $this->selectorBrId = $selectorBrId;
        $this->withBranch = $withBranch;
        $this->division = $division;
    }

    public function render()
    {

        if ($this->withBranch) {

            $search = $this->search;
            $division = $this->division;
            $condition = Branch::with('company:id,name')
                ->where('delete_flg', 0)
                ->whereHas('company', function ($query) use ($search, $division) {
                    if (!empty($division)) {
                        $query = $query->where('company_division', $division);
                    }
                    if (!empty($search)) {
                        $pat = '%' . addcslashes($search, '%_\\') . '%';
                        $query = $query->where('name', 'LIKE', $pat);
                    }
                });

            $d = $this->getData($condition);
            $items = collect();
            foreach ($d['items'] as $key => &$item) {
                $obj = new \stdClass();
                $obj->id = $item->id;
                $obj->company_id = $item->company_id;
                $obj->name = $item->company->name;
                $obj->branch_name = $item->name;
                $items->push($obj);
            }
            $d['items'] = $items;
            $this->data = $d;
        } else {
            $condition = Company::select('id', 'name')->where('delete_flg', 0);
            if ($this->division > 0) {
                $condition = $condition->where('company_division', $this->division);
            }
            if (!empty($this->search)) {
                $pat = '%' . addcslashes($this->search, '%_\\') . '%';
                $condition = $condition->where('name', 'LIKE', $pat);
            }
            $this->data = $this->getData($condition);
        }

        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.search-company-list');
    }

    public function selectCompany($id)
    {
        $this->paginated = true;
        $items = $this->data['items'];
        $output = [];

        $d = $items->where('id', $id)->first();

        $output = [
            'id' => $this->withBranch ? $d->company_id : $d->id,
            'name' => $d->name,
            'branch_id' => $this->withBranch ? $d->id : '',
            'branch_name' => $this->withBranch ? $d->branch_name : '',
            'selector_id' => $this->selectorId,
            'selector_name' => $this->selectorName,
            'selector_br_id' => $this->selectorBrId,
            'selector_br_name' => $this->selectorBrName,
            'modal_id' => $this->id
        ];

        $this->dispatch('modal-onSelectCompany', data: $output);

        $this->search = '';
        $this->page = 1;
    }
}
