<?php

namespace App\Livewire;

use App\Models\CurrentUser;
use App\Models\FilterEmployeeColumns;
use App\Models\FilterEmployeePatterns;
use App\Models\UserFilterEmployeeList;
use Livewire\Attributes\On;

class FilterEmployeeList extends FilterColumn
{
    public $pattern_list = [];
    public $pattern_id = 0;
    public $default = [];

    public function mount(array $columns = [], array $default = [], $name = '')
    {
        $currentCompany = CurrentUser::currentCompany();
        $currentUser = CurrentUser::info();
        $this->list_all_base = $columns;
        $this->list_show = $default;

        $this->pattern_list = FilterEmployeePatterns::select('id', 'name')->where('company_id', $currentCompany->id)->where('employee_id', $currentUser->id)->where('delete_flg', 0)->pluck('name', 'id');

        $userList = UserFilterEmployeeList::where('employee_id', $currentUser->id)->where('delete_flg', 0)->orderBy('order')->get()->toArray();
        if (!empty($userList)) {
            $userListData = array_column($userList, 'value');
            $this->list_show = array_filter($this->list_all_base, function ($value) use ($userListData) {
                return in_array($value['value'], $userListData);
            });
            $this->dispatch('filter-set-user-list', false);
        } else {
            $this->dispatch('filter-set-user-list', true);
        }
    }

    #[On('save-filter-column')]
    public function saveFilterEmployeeList()
    {
        $currentUser = CurrentUser::info();
        $list = $this->getUserList();

        UserFilterEmployeeList::where('employee_id', $currentUser->id)->update(['delete_flg' => 1]);
        foreach ($list as $i => $column) {
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

    #[On('filter-filter-column')]
    public function onlyFilterEmployeeList()
    {
        $this->tmp = $this->list_show;
        $this->dispatchFilterColumn();
    }

    #[On('reset-filter-column')]
    public function resetFilterEmployeeList()
    {
        $currentUser = CurrentUser::info();
        UserFilterEmployeeList::where('employee_id', $currentUser->id)->update(['delete_flg' => 1]);
        $this->tmp = $this->list_all;
        $this->dispatchFilterColumn();
    }

    #[On('save-filter-pattern')]
    public function saveFilterPattern($name)
    {
        $currentUser = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();
        $pattern = FilterEmployeePatterns::where('name', $name)->where('company_id', $currentCompany->id)->where('employee_id', $currentUser->id)->where('delete_flg', 0)->first();
        if (!$pattern) {
            $pattern = FilterEmployeePatterns::create([
                'name' => $name,
                'employee_id' => $currentUser->id,
                'company_id' => $currentCompany->id,
                'delete_flg' => 0
            ]);
        }
        FilterEmployeeColumns::where('employee_id', $currentUser->id)->where('company_id', $currentCompany->id)->where('pattern_id', $pattern->id)->update(['delete_flg' => 1]);
        foreach ($this->list_show as $column) {
            FilterEmployeeColumns::create([
                'employee_id' => $currentUser->id,
                'company_id' => $currentCompany->id,
                'pattern_id' => $pattern->id,
                'value' => $column['value'],
                'delete_flg' => 0
            ]);
        }

        $this->pattern_list = FilterEmployeePatterns::select('id', 'name')->where('company_id', $currentCompany->id)->where('delete_flg', 0)->pluck('name', 'id');
        $this->pattern_id = $pattern->id;
    }

    public function removePattern()
    {
        $this->dispatch('remove-filter-pattern');
    }

    #[On('remove-filter-pattern-approved')]
    public function removeFilterPatternApproved()
    {
        $currentUser = CurrentUser::info();
        $currentCompany = CurrentUser::currentCompany();
        FilterEmployeePatterns::where('id', $this->pattern_id)->where('company_id', $currentCompany->id)->where('employee_id', $currentUser->id)->where('delete_flg', 0)->update(['delete_flg' => 1]);
        FilterEmployeeColumns::where('pattern_id', $this->pattern_id)->where('company_id', $currentCompany->id)->where('employee_id', $currentUser->id)->where('delete_flg', 0)->update(['delete_flg' => 1]);
        $this->pattern_list = FilterEmployeePatterns::select('id', 'name')->where('company_id', $currentCompany->id)->where('delete_flg', 0)->pluck('name', 'id');
        $this->pattern_id = 0;
    }


    public function changePattern()
    {
        if ($this->pattern_id == 0) {
            $this->list_show = $this->default;
            $this->dispatchFilterColumn();
            return;
        }
        $currentCompany = CurrentUser::currentCompany();
        $currentUser = CurrentUser::info();
        $pattern = FilterEmployeePatterns::where('id', $this->pattern_id)->where('company_id', $currentCompany->id)->where('employee_id', $currentUser->id)->where('delete_flg', 0)->with('columns')->first();
        $pattern_values = $pattern->columns->pluck('value')->toArray();
        $this->list_show = array_filter($this->list_all_base, function ($value) use ($pattern_values) {
            return in_array($value['value'], $pattern_values);
        });
    }
}
