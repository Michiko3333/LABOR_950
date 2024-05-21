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
            $request->request->remove('_token');
            $data = $request->validationData($request);
            $companyData = $this->data_company($data);
            $currentCompany = CurrentUser::currentCompany();
            $currentCompany->update($companyData);
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

    private function data_company(array $requestData)
    {
        $formatted_founding_date = $requestData['founding_date'] ? Carbon::createFromFormat('Y年n月j日', $requestData['founding_date'])->format('Y-m-d') : null;
        $formatted_establishment_date = $requestData['establishment_date'] ? Carbon::createFromFormat('Y年n月j日', $requestData['establishment_date'])->format('Y-m-d') : null;
        return [
            'name' => $requestData['name'],
            'name_kana' => $requestData['name_kana'],
            'name_en' => $requestData['name_en'],
            'name_abbreviation' => $requestData['name_abbreviation'],
            'company_no' => $requestData['company_no'],
            'company_type_id' => $requestData['company_type_id'],
            'license_no' => $requestData['license_no'],
            'business_type' => $requestData['business_type'],
            'listed_type' => $requestData['listed_type'],
            'stock_code' => $requestData['stock_code'],
            'founding_date' => $formatted_founding_date,
            'establishment_date' => $formatted_establishment_date,
            'capital' => $requestData['capital'],
            'annual_sales' => $requestData['annual_sales'],
            'employee_sum' => $requestData['employee_sum'],
            'qualification' => $requestData['qualification'],
            'authorized_shares' => $requestData['authorized_shares'],
            'issued_shares' => $requestData['issued_shares'],
            'supplier_company' => $requestData['supplier_company'],
            'outsourcing_company' => $requestData['outsourcing_company'],
            'sales_company' => $requestData['sales_company'],
            'url' => $requestData['url'],
            'purpose' => $requestData['purpose'],
        ];
    }
}
