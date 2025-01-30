<?php

namespace App\Livewire;

use App\Models\CurrentUser;
use App\Models\UserFilterEmployeeList;
use Livewire\Attributes\On;

class FilterEmployeeList extends FilterColumn
{

    #[On('save-filter-column')]
    public function saveFilterEmployeeList()
    {
        $currentUser = CurrentUser::info();
        $list = $this->getUserList();

        $cond = [];
        UserFilterEmployeeList::where('employee_id', $currentUser->id)->update(['delete_flg' => 1]);
        for ($i = 0; $i < count($list); $i++) {
            $column = $list[$i];
            $d = [
                'employee_id' => $currentUser->id,
                'value' => $column['value'],
                'order' => $i + 1,
                'delete_flg' => 0
            ];
            if (UserFilterEmployeeList::where('employee_id', $currentUser->id)->where('value', $column['value'])->exists()) {
                UserFilterEmployeeList::where('employee_id', $currentUser->id)->where('value', $column['value'])->update($d);
            } else {
                UserFilterEmployeeList::create($d);
            }
        }

        $this->tmp = $this->list_show;
        $this->dispatchFilterColumn();
    }
}
