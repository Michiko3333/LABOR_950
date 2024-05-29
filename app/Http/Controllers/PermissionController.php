<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Employee;
use App\Models\Account_permission;
use App\Permission;

class PermissionController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            \Log::info(print_r($userPermission->isAdmin(), true));
            if (!$userPermission->isAdmin() && $userPermission->getEmployeeType() != 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function employee_permission($id)
    {
        $features = Feature::all();
        $employee = Employee::find($id);

        return view('admin.permission', ['features' => $features, 'employee' => $employee]);
    }

    public function employee_permission_post(Request $request, $id)
    {
        $permissions = $request->input('permissions');
        $features = Feature::all();
        foreach ($features as $feature) {
            $readPermission = 0;
            $writePermission = 0;

            if (isset($permissions[$feature->id])) {
                $permission = $permissions[$feature->id];
                $readPermission = isset($permission['read']) ? 1 : 0;
                $writePermission = isset($permission['write']) ? 1 : 0;
            }

            $employeePermission = Account_permission::updateOrCreate(
                ['employee_id' => $id, 'feature_id' => $feature->id],
                ['read' => $readPermission, 'write' => $writePermission]
            );
        }
        $this->putSuccess($request);
        return redirect()->route('employee_permission', ['id' => $id]);
    }

    public function labor_permission($id)
    {
        $features = Feature::all();
        $employee = Employee::find($id);

        return view('admin.permission', ['features' => $features, 'employee' => $employee]);
    }

    public function labor_permission_post(Request $request, $id)
    {
        $permissions = $request->input('permissions');
        $features = Feature::all();
        foreach ($features as $feature) {
            $readPermission = 0;
            $writePermission = 0;

            if (isset($permissions[$feature->id])) {
                $permission = $permissions[$feature->id];
                $readPermission = isset($permission['read']) ? 1 : 0;
                $writePermission = isset($permission['write']) ? 1 : 0;
            }

            $employeePermission = Account_permission::updateOrCreate(
                ['employee_id' => $id, 'feature_id' => $feature->id],
                ['read' => $readPermission, 'write' => $writePermission]
            );
        }
        $this->putSuccess($request);
        return redirect()->route('labor_permission', ['id' => $id]);
    }
}
