<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CurrentUser;
use App\Models\Certificate;
use App\Models\Employee;

use Exception;

use App\Permission;

use function PHPUnit\Framework\throwException;

class ListController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if ($userPermission->denyProcedure() || !$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(8)) {
            return redirect()->route('home.index');
        }
        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();
        if ($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }
        $egovAcount = $this->egovAcount();
        $existPresident = Employee::whereHas('branch', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
            ->where('employee_type', 1)
            ->where('delete_flg', 0)
            ->exists();


        return view('ledger/ledger', compact('certificate', 'egovAcount', 'existPresident'));
    }
}
