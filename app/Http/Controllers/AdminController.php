<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CurrentUser;
use App\Models\Company;
use Illuminate\Validation\ValidationException;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\UniqueConstraintViolationException;

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

    public function company_list_api(Request $request)
    {
        try {
            $data = Company::select('id', 'name', 'company_no', 'company_type_id', 'business_type', 'company_division')->where('delete_flg', 0)->get();
        } catch (\Exception $e) {
            return response()->json([], 400);
        }
        return response()->json($data, 200);
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
            $formmatted_founding_date = $request->input('founding_date');
            if($formmatted_founding_date){
                $formmatted_founding_date = \DateTime::createFromFormat('Y年n月j日', $formmatted_founding_date);
                $formmatted_founding_date = $formmatted_founding_date->format('Y-m-d');
                $validator = Validator::make(['formatted_date' => $formmatted_founding_date], [
                    'formatted_date' => 'date_format:Y-m-d',
                ]);
                if (!$validator->passes()) {
                    throw new ValidationException($validator);
                }
            }
            $formmatted_establishment_date = $request->input('establishment_date');
            if($formmatted_establishment_date){
                $formmatted_establishment_date = \DateTime::createFromFormat('Y年n月j日', $formmatted_establishment_date);
                $formmatted_establishment_date = $formmatted_establishment_date->format('Y-m-d');
                $validator = Validator::make(['formatted_date' => $formmatted_establishment_date], [
                    'formatted_date' => 'date_format:Y-m-d',
                ]);
                if (!$validator->passes()) {
                    throw new ValidationException($validator);
                }
            }
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
                'founding_date' => $formmatted_founding_date,
                'establishment_date' => $formmatted_establishment_date,
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
        } catch (UniqueConstraintViolationException $e) {
            $errorString = $e->getMessage();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            }else{
                return redirect()->back()->withErrors("")->withInput();
            }
        }
    }

    public function company_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_id' => $id,
            'company' => $company,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
        ]);
    }

    public function company_update_post(Request $request, $id)
    {
        try {
            $formmatted_founding_date = $request->input('founding_date');
            if($formmatted_founding_date){
                $formmatted_founding_date = \DateTime::createFromFormat('Y年n月j日', $formmatted_founding_date);
                $formmatted_founding_date = $formmatted_founding_date->format('Y-m-d');
                $validator = Validator::make(['formatted_date' => $formmatted_founding_date], [
                    'formatted_date' => 'date_format:Y-m-d',
                ]);
                if (!$validator->passes()) {
                    throw new ValidationException($validator);
                }
            }
            $formmatted_establishment_date = $request->input('establishment_date');
            if($formmatted_establishment_date){
                $formmatted_establishment_date = \DateTime::createFromFormat('Y年n月j日', $formmatted_establishment_date);
                $formmatted_establishment_date = $formmatted_establishment_date->format('Y-m-d');
                $validator = Validator::make(['formatted_date' => $formmatted_establishment_date], [
                    'formatted_date' => 'date_format:Y-m-d',
                ]);
                if (!$validator->passes()) {
                    throw new ValidationException($validator);
                }
            }
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
                'founding_date' => $formmatted_founding_date,
                'establishment_date' => $formmatted_establishment_date,
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
            Company::where('id', $id)->update($data);
            return redirect()->route('admin.company');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            $errorString = $e->getMessage();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            }else{
                return redirect()->back()->withErrors("")->withInput();
            }
        }
    }
}
