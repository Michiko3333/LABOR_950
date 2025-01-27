<?php

namespace App\Livewire;

use App\Livewire\BaseTable;
use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Employee_department;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class WagesEmployeeList extends BaseTable
{
    public $search = '';
    public $branch_name = '';
    public $type = 0;
    public $useColumnFilter = true;

    public $showColumns = [
        ['name' => '氏名', 'value' => 'full_name'],
        ['name' => '役職', 'value' => 'managerial_position'],
        ['name' => '部署', 'value' => 'departments'],
        ['name' => '事業所', 'value' => 'branch'],
    ];

    public $selected = [];
    public $all_select = 0;
    public $all_ids = [];

    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $currentCompanyId = $currentCompany->id;
        $prefectures = Prefecture::pluck('name', 'id');
        $condition = Employee::select([
            'm_employee.id',
            'employee_type',
            'last_name',
            'first_name',
            'position.name as position_name',
            'branch.name as branch_name',
            'm_employee.address_prefecture as address_prefecture',
            'm_employee.address_city as address_city',
            'm_employee.address_ward as address_ward',
            'm_employee.address_apartment as address_apartment',
            'm_employee.mail_address1 as mail_address1',
            'm_employee.mail_address2 as mail_address2',
            'm_employee.tel_area_code as tel_area_code',
            'm_employee.tel_city_code as tel_city_code',
            'm_employee.tel_subscriber_code as tel_subscriber_code',
            'm_employee.icon_path as icon_path'
        ])
            ->leftJoin('m_branch as branch', 'm_employee.branch_id', '=', 'branch.id')
            ->leftJoin('m_company as company', 'branch.company_id', '=', 'company.id')
            ->leftJoin('m_managerial_position as position', function ($join) {
                $join->on('position.id', '=', 'managerial_position_id')
                    ->where('position.delete_flg', 0);
            })
            ->where('company.id', $currentCompanyId);

        if (!empty($this->search)) {
            $pat = '%' . addcslashes($this->search, '%_\\') . '%';
            $condition = $condition->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', $pat);
        }

        $this->data = $this->getData($condition);
        $this->all_ids = $condition->get()->select('id')->pluck('id')->toArray();
        $items = $this->data['items'];
        foreach ($items as &$item) {
            $item->departments = Employee_department::select('name')
                ->where('m_employee_department.delete_flg', 0)
                ->leftJoin('m_department as dep', 'm_employee_department.department_id', '=', 'dep.id')
                ->where('employee_id', $item->id)
                ->pluck('name');

            $directory = 'photo/' . $currentCompanyId;
            $files = Storage::files($directory);
            $filePath = '';
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int)$fileName === $item->id) {
                    $filePath = '/' . $file . '?v=' . time();
                }
            }
            if (empty($filePath)) {
                $filePath = '/img/image.png';
            }
            $item->icon = $filePath;

            $item->address_prefecture_name = $prefectures[$item->address_prefecture];
        }
        return view('livewire.wages-employee-list');
    }

    public function checkState($id)
    {
        if (array_key_exists($id, $this->selected)) {
            return $this->selected[$id] == 1;
        }
        return false;
    }

    #[On('request-reload')]
    public function handleRequestReload($data)
    {
        // $this->company_name = $data['name'];
    }
    public function toEdit($id)
    {
        $items = $this->data['items'];
        redirect()->route('employee_update', ['id' => $id]);
    }
    public function toPermission($id)
    {
        redirect()->route('employee_permission', ['id' => $id]);
    }

    public function checkAll()
    {
        if (!empty($this->all_select)) {
            $this->selected = $this->all_ids;
        } else {
            $this->selected = [];
        }
    }

    public function checkCol()
    {
        $this->all_select = false;
    }
}
