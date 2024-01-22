<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentInforController extends Controller
{
    public function index()
    {
        return view('department_information.department_information');
    }
}