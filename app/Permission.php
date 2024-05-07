<?php

namespace App;

use App\Models\Account_permission;
use App\Models\CurrentUser;
use App\Models\Employee_department;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class Permission
{
    private $role_id = '';
    private $external_advsor = false;
    private $employee_type = 0;
    private $employee_status = 0;
    private $department_permissions = [];
    private $features = [];

    public function __construct()
    {
        $user = Auth::user();
        if (!empty($user)) {
            if (session()->has('permissions')) {
                \Log::info('CACHED DATA');
                $d = session()->get('permissions');
                $this->role_id = $d['role_id'];
                $this->external_advsor = $d['external_advsor'];
                $this->employee_type = $d['employee_type'];
                $this->employee_status = $d['employee_status'];
                $this->department_permissions = $d['department_permissions'];
                $this->features = $d['features'];
            } else {
                \Log::info('NEW DATA');
                $employee = CurrentUser::info();
                $employee_id = $employee->id;
                $this->role_id = $employee->role_id;
                $this->external_advsor = $employee->external_advsor == 1;
                $this->employee_type = $employee->employee_type;
                $this->employee_status = $employee->employee_status;

                $employeeDepartments = Employee_department::select('department_id')->where('employee_id', $employee_id)->where('delete_flg', 0)->get();
                $departmentPermissions = $employeeDepartments->map(function ($employeeDepartment) {
                    return $employeeDepartment->department->department_permission_id;
                });
                $this->department_permissions = array_unique($departmentPermissions->toArray());

                $this->features = Account_permission::select('feature_id', 'read', 'write')->where('employee_id', $employee_id)
                    ->where(function ($query) {
                        $query->where('read', '<>', 0)->orWhere('write', '<>', 0);
                    })->get()->toArray();

                session()->put('permissions', [
                    'role_id' => $this->role_id,
                    'external_advsor' => $this->external_advsor,
                    'employee_type' => $this->employee_type,
                    'employee_status' => $this->employee_status,
                    'department_permissions' => $this->department_permissions,
                    'features' => $this->features,
                ]);
            }
        }
    }

    public function getRoleId()
    {
        return $this->role_id;
    }

    public function isAdmin()
    {
        return $this->role_id == '999';
    }

    public function isLabor()
    {
        return $this->role_id == '500';
    }

    public function isExternalAdvisor()
    {
        return $this->external_advsor;
    }

    public function getEmployeeType()
    {
        return $this->employee_type;
    }

    public function getEmployeeStatus()
    {
        return $this->employee_status;
    }

    public function getDepartmentPermission()
    {
        return $this->department_permissions;
    }
    public function getDepartmentPermissionById($id)
    {
        return array_search($id, $this->department_permissions) !== false;
    }

    public function getFeaturePermissionById($feature_id)
    {
        $permission = array_values(array_filter($this->features, function ($permission) use ($feature_id) {
            return $permission['feature_id'] === $feature_id;
        }));

        if (!empty($permission)) {
            return [
                'read' => $permission[0]['read'],
                'write' => $permission[0]['write'],
            ];
        }
        return [
            'read' => 0,
            'write' => 0,
        ];
    }
    public function getReadFeaturePermissionById($feature_id)
    {
        $permission = array_values(array_filter($this->features, function ($permission) use ($feature_id) {
            return $permission['feature_id'] === $feature_id;
        }));

        if (!empty($permission)) {
            return $permission[0]['read'];
        }
        return 0;
    }

    public function getWriteFeaturePermissionById($feature_id)
    {
        $permission = array_values(array_filter($this->features, function ($permission) use ($feature_id) {
            return $permission['feature_id'] === $feature_id;
        }));

        if (!empty($permission)) {
            return $permission[0]['write'];
        }
        return 0;
    }
}
