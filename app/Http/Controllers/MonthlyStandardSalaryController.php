<?php

namespace App\Http\Controllers;

use App\Livewire\FilterColumn;
use App\Models\CurrentUser;
use App\Models\FilterEmployeeList;
use App\Models\UserFilterEmployeeList;
use App\Models\Wage;
use App\Models\WageAllowance;
use App\Models\WageColumns;
use App\Models\WageFilterConfig;
use App\Models\WageInsuranceColumn;
use App\Models\WageOvertime;
use App\Models\WageSalary;
use App\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MonthlyStandardSalaryController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1 || !$userPermission->isBasicDepartment()) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(21) || !$userPermission->isWritableFor(21)) {
            return redirect()->route('home.index');
        }

        $currentCompany = CurrentUser::CurrentCompany();
        $current_company_id = $currentCompany->id;

        return view('employee.monthly-standard-salary', ['company_id' => $current_company_id]);
    }
}
