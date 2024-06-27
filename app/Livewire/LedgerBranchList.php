<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LedgerBranchList extends BaseTable
{
    public $search = '';
    public $branch_list = [];

    public $total = 0;
    public $limit = 5;

    public $disablePrev = false;
    public $disableNext = false;

    public $selected_id = 0;

    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $company_id = $currentCompany->id;
        $branch_list = Branch::where('company_id', $company_id)->where('delete_flg', 0)->pluck('name', 'id')->toArray();

        $this->branch_list = $branch_list;

        $condition = Branch::whereIn('id', array_keys($branch_list));

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where('name', 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);

        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.ledger-branch-list');
    }

    public function selectBranch($id)
    {
        $this->paginated = true;

        $branch = Branch::join('m_prefecture', 'm_branch.address_prefecture', '=', 'm_prefecture.id')
            ->select('m_branch.*', 'm_prefecture.name as address_prefecture')
            ->where('m_branch.id', $id)
            ->first();

        $branch_data = $branch;

        $output = [
            'branch' => $branch_data
        ];

        $this->selected_id = $id;

        $this->dispatch('onSelectBranch', data: $output);
    }
}
