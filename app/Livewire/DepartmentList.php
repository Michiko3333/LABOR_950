<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\DepartmentPermission;
use Livewire\Component;
use Livewire\Attributes\On;

use App\Rules\noEmoji;

class DepartmentList extends Component
{
    public $company_id = 0;
    public $data = [];
    public $parent_list = [];
    public $permission_list = [];

    public $form_id = 0;
    public $form_name = '';
    public $form_permission = '1';
    public $form_parent = '';

    public $departments = [];
    public $parent_list_base = [];

    public $remove_tmp = 0;

    public function mount($company_id)
    {
        $this->company_id = $company_id;
        $this->permission_list = DepartmentPermission::pluck('name', 'id')->toArray();
        $department = Department::where('company_id', $this->company_id)->where('delete_flg', 0);
        $this->departments = $department->select('id', 'name', 'department_permission_id', 'upper_department_id')->get();
        $this->parent_list_base = $department->pluck('name', 'id')->toArray();
        $this->parent_list = $this->parent_list_base;
    }
    public function render()
    {
        $department = Department::where('company_id', $this->company_id)->where('delete_flg', 0);
        $this->departments = $department->select('id', 'name', 'department_permission_id', 'upper_department_id')->get();
        $this->parent_list_base = $department->pluck('name', 'id')->toArray();
        $this->parent_list = $this->parent_list_base;
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

    public function setData()
    {
        return [
            'form_id' => $this->form_id,
            'form_name' => $this->form_name,
            'form_permission' => $this->form_permission,
            'form_parent' => $this->form_parent,
            'parent_list' => $this->parent_list
        ];
    }

    public function rec($id)
    {
        return Department::select('id', 'department_permission_id')
            ->where('company_id', $this->company_id)
            ->where('id', $id)
            ->where('department_permission_id', '<>', 0)
            ->first();
    }

    public function new()
    {
        $this->resetForm();
        $this->parent_list = $this->parent_list_base;
        $this->dispatch('showModal', $this->setData());
    }

    public function edit($id)
    {
        $this->resetForm();
        $department = Department::where('company_id', $this->company_id)->where('id', $id)->first();

        if (empty($department)) return;

        $this->form_id = $id;
        $this->form_name = $department->name;
        $this->form_permission = $department->department_permission_id;
        $this->form_parent = $department->upper_department_id;

        $this->parent_list = $this->parent_list_base;
        unset($this->parent_list[$id]);

        $this->dispatch('showModal', $this->setData());
    }

    public function remove($id, $name)
    {
        $this->remove_tmp = $id;
        $this->dispatch('showRemoveModal', ['id' => $id, 'name' => $name]);
    }

    #[On('onRemoveDepartment')]
    public function onRemoveDepartment()
    {
        Department::where('id', $this->remove_tmp)->where('company_id', $this->company_id)->update([
            'delete_flg' => 1
        ]);
        Department::where('upper_department_id', $this->remove_tmp)->where('company_id', $this->company_id)->update([
            'upper_department_id' => 0
        ]);

        $this->remove_tmp = 0;
        $this->render();
    }

    #[On('onCancelDepartment')]
    public function onCancelDepartment()
    {
        $this->resetForm();
    }

    #[On('onEditDepartment')]
    public function onEditDepartment($data = null)
    {
        if (empty($data['form_name']) || empty($data['form_permission'])) {
            $this->dispatch('showErrorMessage');
            return;
        }

        if (noEmoji::isEmoji($data['form_name'])) {
            $this->dispatch('showErrorMessage');
            return;
        }

        if (!empty($data['form_id'])) {
            Department::where('company_id', $this->company_id)->where('id', $data['form_id'])->update([
                'name' => $data['form_name'],
                'department_permission_id' => (int) $data['form_permission'],
                'upper_department_id' => (int) $data['form_parent'],
            ]);
        } else {
            Department::insert([
                'name' => $data['form_name'],
                'department_permission_id' => (int) $data['form_permission'],
                'upper_department_id' => (int) $data['form_parent'],
                'company_id' => $this->company_id
            ]);
        }
        $this->dispatch('closeModal');
        $this->dispatch('success');
        $this->render();
    }

    private function resetForm()
    {
        $this->remove_tmp = 0;

        $this->form_id = 0;
        $this->form_name = '';
        $this->form_permission = '1';
        $this->form_parent = '';
    }
}
