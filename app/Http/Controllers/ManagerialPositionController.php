<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentUser;

class ManagerialPositionController extends Controller
{
    public function managerial_position(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $current_company_id = $current_company->id;
        $current_company_name = $current_company->name;
        return view('managerial_position', ['company_id' => $current_company_id, 'company_name' => $current_company_name]);
    }
}