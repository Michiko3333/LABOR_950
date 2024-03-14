<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LedgerEmployeeList extends BaseTable
{
    public $search = '';
    public $branch_id = null;
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
        $branch_ids = Branch::where('company_id', $company_id)->where('delete_flg', 0)->pluck('name', 'id')->toArray();
        $this->branch_list = $branch_ids;

        $condition = Employee::whereIn('branch_id', array_keys($branch_ids))->where('delete_flg', 0);
        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, first_name)"), 'LIKE', $pat);
        }

        if (!empty($this->branch_id)) {
            $condition = $condition->where('branch_id', $this->branch_id);
        }

        $condition = $condition->with('branch');
        $this->data = $this->getData($condition);

        $this->total = $this->data['pagination']['totalItems'];
        $this->disablePrev = $this->page <= 1;
        $this->disableNext = $this->page >= ceil($this->total / $this->limit);

        return view('livewire.ledger-employee-list');
    }

    public function selectEmployee($id)
    {
        $this->paginated = true;
        $items = $this->data['items'];
        $employee = $items->where('id', $id)->first();

        $employee->aaa = 2;

        $employee_data = $employee->toArray();
        $branch_data = $employee->branch->toArray();

        $output = [
            'employee' => $employee_data,
            'branch' => $branch_data
        ];

        $this->selected_id = $id;

        $this->dispatch('onSelectEmployee', data: $output);
    }
}
