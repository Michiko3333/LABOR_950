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
use App\Models\Company_industry_type;
use App\Models\Company_files;
use App\Models\Industry_type;
use App\Permission;

class CompanyController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isSelectedCompany() || $userPermission->getEmployeeStatus() == 1) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function company_edit()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(1)) {
            return redirect()->route('home.index');
        }

        $currentCompany = CurrentUser::currentCompany();
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        $industry_type = Company_industry_type::where('company_id', $currentCompany->id)->where('delete_flg', 0)->pluck('industry_type_id');
        $financial_statement = Company_files::select('file_name')->where('company_id', $currentCompany->id)->where('document_type', 1)->where('delete_flg', 0)->first();
        $articles_of_incorporation = Company_files::select('file_name')->where('company_id', $currentCompany->id)->where('document_type', 2)->where('delete_flg', 0)->first();
        $stock_information = Company_files::select('file_name')->where('company_id', $currentCompany->id)->where('document_type', 3)->where('delete_flg', 0)->first();
        $current_industry_type = Industry_type::select('id', 'industry_type_code')->whereIn('id', $industry_type)->pluck('industry_type_code');
        \Log::info(print_r($currentCompany, true));
        return view('company', [
            'currentCompany' => $currentCompany,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type,
            'industry_type' => $industry_type,
            'current_industry_type' => $current_industry_type,
            'financial_statement' => $financial_statement->file_name ?? '',
            'articles_of_incorporation' => $articles_of_incorporation->file_name ?? '',
            'stock_information' => $stock_information->file_name ?? ''
        ]);
    }

    public function company_edit_post(CompanyUpdateRequest $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(1) || !$userPermission->isWritableFor(1)) {
            return redirect()->route('home.index');
        }

        DB::beginTransaction();

        try {
            $request->request->remove('_token');
            $data = $request->validationData($request);
            $companyData = $this->data_company($data);
            $currentCompany = CurrentUser::currentCompany();
            $currentCompany->update($companyData);
            $industryTypes = $request->input('industry_type', []);
            Company_industry_type::where('company_id', $currentCompany->id)
                ->where('delete_flg', 1)
                ->whereIn('industry_type_id', $industryTypes)
                ->update(['delete_flg' => 0]);
            Company_industry_type::where('company_id', $currentCompany->id)
                ->whereNotIn('industry_type_id', $industryTypes)
                ->update(['delete_flg' => 1]);
            foreach ($industryTypes as $industryTypeId) {
                Company_industry_type::updateOrCreate(
                    [
                        'company_id' => $currentCompany->id,
                        'industry_type_id' => $industryTypeId,
                    ],
                    [
                        'company_id' => $currentCompany->id,
                        'industry_type_id' => $industryTypeId,
                        'delete_flg' => 0
                    ]
                );
            }

            if ($request->input('financial_statement_delete') == 1) {
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 1)
                    ->update(['delete_flg' => 1]);
            }
            if ($request->input('articles_of_incorporation_delete') == 1) {
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 2)
                    ->update(['delete_flg' => 1]);
            }
            if ($request->input('stock_information_delete') == 1) {
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 3)
                    ->update(['delete_flg' => 1]);
            }

            if ($request->file('financial_statement')) {
                $financial_statement_name = $request->file('financial_statement')->getClientOriginalName();
                $financial_statement = $request->file('financial_statement')->get();
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 1)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $currentCompany->id,
                    'document_type' => 1,
                    'file_name' => $financial_statement_name,
                    'data' => $financial_statement,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('articles_of_incorporation')) {
                $articles_of_incorporation_name = $request->file('articles_of_incorporation')->getClientOriginalName();
                $articles_of_incorporation = $request->file('articles_of_incorporation')->get();
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 2)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $currentCompany->id,
                    'document_type' => 2,
                    'file_name' => $articles_of_incorporation_name,
                    'data' => $articles_of_incorporation,
                    'delete_flg' => 0,
                ]);
            }
            if ($request->file('stock_information')) {
                $stock_information_name = $request->file('stock_information')->getClientOriginalName();
                $stock_information = $request->file('stock_information')->get();
                Company_files::where('company_id', $currentCompany->id)
                    ->where('document_type', 3)
                    ->update(['delete_flg' => 1]);
                Company_files::create([
                    'company_id' => $currentCompany->id,
                    'document_type' => 3,
                    'file_name' => $stock_information_name,
                    'data' => $stock_information,
                    'delete_flg' => 0,
                ]);
            }
            DB::commit();
            $this->putSuccess();
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
            'representative' => $requestData['representative'],
            'bank_name' => $requestData['bank_name'],
            'url' => $requestData['url'],
            'purpose' => $requestData['purpose'],
            'start_month_of_year' => $requestData['start_month_of_year'],
            'start_day_of_month' => $requestData['start_day_of_month'],
            'start_day_of_week' => $requestData['start_day_of_week']
        ];
    }

    public function downloadFile($document_type)
    {
        $currentCompany = CurrentUser::currentCompany();
        $company_id = $currentCompany->id;
        $file = Company_files::select('file_name', 'data')->where('company_id', $company_id)->where('delete_flg', 0)->where('document_type', $document_type)->first();
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        return response()->stream(function () use ($file) {
            echo $file->data;
        }, 200, [
            'Content-Type' => $headers['Content-Type'],
            'Content-Disposition' => 'attachment; filename="' . $file->file_name . '"',
        ]);
    }

    public function get_industry_type(Request $request)
    {

        $industry_type = Industry_type::get(['id', 'industry_type_code']);

        return response()->json($industry_type);
    }
}
