<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentUser;
use App\Permission;

class CompanyDepartmentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }
    public function current_company_department_update(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(3)) {
            return redirect()->route('home.index');
        }
        $current_company = CurrentUser::currentCompany();
        $current_company_id = $current_company->id;
        $current_company_name = $current_company->name;
        return view('current_department', ['company_id' => $current_company_id, 'company_name' => $current_company_name]);
    }
}
