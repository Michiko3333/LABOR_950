<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CurrentUser;
use App\Models\Certificate;

use Exception;

use App\Permission;

use function PHPUnit\Framework\throwException;

class ListController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if ($userPermission->denyProcedure() || !$userPermission->isBasicDepartment() || !$userPermission->isReadableFor(8) || !$userPermission->isWritableFor(8)) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
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

        return view('ledger/ledger', compact('certificate', 'egovAcount'));
    }
}
