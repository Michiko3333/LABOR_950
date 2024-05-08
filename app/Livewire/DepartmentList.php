<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\DepartmentPermission;
use Livewire\Component;
use Livewire\Attributes\On;

class DepartmentList extends Component
{
    public $company_id = 0;
    public $data = [];
    public $parent_list = [];
    public $permission_list = [];

    public $form_id = 0;
    public $form_name = 'abc';
    public $form_permission = '1';
    public $form_parent = '';

    public $departments = [];

    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    public function render()
    {
        $this->permission_list = DepartmentPermission::pluck('name', 'id')->toArray();
        $department = Department::where('company_id', $this->company_id)->where('delete_flg', 0);
        $this->departments = $department->select('id', 'name', 'department_permission_id', 'upper_department_id')->get();
        $this->parent_list = $department->pluck('name', 'id')->toArray();
        return view('livewire.department-list');
    }

    public function select($id)
    {
        $d = Department::find($id);
        $this->form_id = $d->id;
        $this->form_name = $d->name;
        $this->form_permission = $d->department_permission_id;
        $this->form_parent = $d->upper_department_id;
    }

    public function new()
    {
        $this->resetForm();
    }

    public function edit($id)
    {
        $this->resetForm();
        $department = Department::where('company_id', $this->company_id)->where('id', $id)->first();
        $this->form_id = $id;
        $this->form_name = $department->name;
        $this->form_permission = $department->department_permission_id;
        $this->form_parent = $department->upper_department_id;
    }

    public function remove($id)
    {
        Department::where('id', $id)->update([
            'delete_flg' => 1
        ]);
        Department::where('upper_department_id', $id)->update([
            'upper_department_id' => 0
        ]);
    }

    #[On('onCancelDepartment')]
    public function onCancelDepartment()
    {
        $this->resetForm();
    }

    #[On('onEditDepartment')]
    public function onEditDepartment()
    {
        $this->validate([
            'form_name' => 'required',
        ]);

        if (!empty($this->form_id)) {
            Department::where('id', $this->form_id)->update([
                'name' => $this->form_name,
                'department_permission_id' => (int) $this->form_permission,
                'upper_department_id' => (int) $this->form_parent,
            ]);
        } else {
            Department::insert([
                'name' => $this->form_name,
                'department_permission_id' => (int) $this->form_permission,
                'upper_department_id' => (int) $this->form_parent,
                'company_id' => $this->company_id
            ]);
        }
    }

    private function resetForm()
    {
        $this->form_id = 0;
        $this->form_name = '';
        $this->form_permission = '1';
        $this->form_parent = '';
    }
}
