<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Http\Requests\CompanyUpdateRequest;
use App\Models\CurrentUser;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;
use App\Models\Company_type;
use App\Models\Prefecture;
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;

class CompanyController extends Controller
{
    public function company_edit()
    {
        $currentCompany = CurrentUser::currentCompany();
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        return view('company', [
            'currentCompany' => $currentCompany,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function company_edit_post(CompanyUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $this->data_company($request);
            $currentCompany = CurrentUser::currentCompany();
            $currentCompany->update($data);
            DB::commit();
            $this->putSuccess($request);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            DB::rollback();
            $errorString = $e->getMessage();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput();
            }
        }
        return redirect()->route('company_edit');
    }

    private function data_company(Request $request)
    {
        $formmatted_founding_date = $request->input('founding_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('founding_date'))->format('Y-m-d') : null;
        $formmatted_establishment_date = $request->input('establishment_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('establishment_date'))->format('Y-m-d') : null;
        return [
            'name' => $request->input('name'),
            'name_kana' => $request->input('name_kana'),
            'name_en' => $request->input('name_en'),
            'name_abbreviation' => $request->input('name_abbreviation'),
            'company_no' => $request->input('company_no'),
            'company_type_id' => $request->input('company_type_id'),
            'license_no' => $request->input('license_no'),
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
            'purpose' => $request->input('purpose')
        ];
    }
}
