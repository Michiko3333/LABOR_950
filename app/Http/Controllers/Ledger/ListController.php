<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CurrentUser;
use App\Models\Certificate;

use Exception;

use function PHPUnit\Framework\throwException;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();
        if($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }

        return view('ledger/ledger', compact('certificate'));
    }
}
