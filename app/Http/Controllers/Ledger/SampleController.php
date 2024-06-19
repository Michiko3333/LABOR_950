<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrentUser;
use App\Permission;

class SampleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission;
            if (!$userPermission->isSelectedCompany() || $userPermission->denyProcedure() || !$userPermission->isReadableFor(8) || !$userPermission->isWritableFor(8) || !$userPermission->isBasicDepartment()) {

                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // 操作する会社が設定されているか
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();

        return view('ledger.sample', ['company' => $company]);
    }

    public function post(Request $request)
    {
        return redirect()->route('ledger.index');
    }
}
