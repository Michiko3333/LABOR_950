<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrentUser;

class FirstWageCertificatesEmploymentInsuredAtSixtyController extends Controller
{
    public function index(Request $request)
    {
        // 操作する会社が設定されているか
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();

        return view('ledger.first_wage_certificates_employment_insured_at_sixty', ['company' => $company]);
    }

    public function post(Request $request)
    {
    }
}
