<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentUser;
use App\Models\Company;
use Illuminate\Validation\ValidationException;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        // Admin権限以外のコントローラー使用を拒否する
        $this->middleware(function ($request, $next) {
            $role_id = CurrentUser::info()->role_id;
            if ($role_id !== 999)
                return redirect()->route('auth.logout');
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function company_list(Request $request)
    {
        return view('admin.companies');
    }

    public function company_create(Request $request)
    {
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
        ]);
    }

    public function company_create_post(Request $request)
    {
        try {
            $request->validate([
                'name' => 'string|max:255',
                'name_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',
                'name_en' => 'nullable|string|max:255|regex:/^[!-~]+$/',
                'name_abbreviation' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9]+$/',
                'company_no' => 'string|max:20|regex:/^[a-zA-Z0-9]+$/',
                'company_type_id' => 'integer',
                'license_id' => 'nullable|string|max:255',
                'business_type' => 'integer',
                'listed_type' => 'integer',
                'stock_code' => 'nullable|string|max:20|regex:/^[a-zA-Z0-9]+$/',
                'formatted_founding_date' => 'nullable|date_format:Y-m-d',
                'formatted_establishment_date' => 'nullable|date_format:Y-m-d',
                'capital' => 'nullable|integer',
                'annual_sales' => 'nullable|integer',
                'employee_sum' => 'nullable|integer',
                'qualification' => 'nullable|string',
                'authorized_shares' => 'nullable|integer',
                'issued_shares' => 'nullable|integer',
                'supplier_company' => 'nullable|string|max:255',
                'outsourcing_company' => 'nullable|string|max:255',
                'sales_company' => 'nullable|string|max:255',
                'url' => 'nullable|string|max:255|url',
                'purpose' => 'string',
                'company_division' => 'integer',
            ]);

            $data = [
                'name' => $request->input('name'),
                'name_kana' => $request->input('name_kana'),
                'name_en' => $request->input('name_en'),
                'name_abbreviation' => $request->input('name_abbreviation'),
                'company_no' => $request->input('company_no'),
                'company_type_id' => $request->input('company_type_id'),
                'license_id' => $request->input('license_id'),
                'business_type' => $request->input('business_type'),
                'listed_type' => $request->input('listed_type'),
                'stock_code' => $request->input('stock_code'),
                'founding_date' => $request->input('$formatted_founding_date'),
                'establishment_date' => $request->input('$formatted_establishment_date'),
                'capital' => $request->input('capital'),
                'annual_sales' => $request->input('annual_sales'),
                'employee_sum' => $request->input('employee_sum'),
                'qualification' => $request->input('qualification'),
                'authorized_shares' => $request->input('authorized_shares'),
                'issued_shares' => $request->input('issued_shares'),
                'supplier_company' => $request->input('supplier_company'),
                'outsourcing_company' => $request->input('outsourcing_company'),
                'sales_company' => $request->input('sales_company'),
                'url' => $request->input('url'),
                'purpose' => $request->input('purpose'),
                'company_division' => $request->input('company_division'),
            ];
            Company::create($data);
            return redirect()->route('admin.company');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
