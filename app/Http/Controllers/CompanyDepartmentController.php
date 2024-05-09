<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentUser;

class CompanyDepartmentController extends Controller
{
    public function current_company_department_update(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $current_company_id = $current_company->id;
        $current_company_name = $current_company->name;
        return view('current_department', ['company_id' => $current_company_id, 'company_name' => $current_company_name]);
    }
}