<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\CurrentUser;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Values_company_listed_type;
use App\Models\Values_company_business_type;
use App\Models\Company_type;
use App\Models\Prefecture;
use App\Models\Values_employee_labor_insurance_type;

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
        $paginate = [
            'page' => $request->input('page', 1),
            'limit' => 20,
            'search' => $request->input('search'),
        ];
        return view('admin.companies', compact('paginate'));
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
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $insuranceTypes = Values_employee_labor_insurance_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => [],
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'insuranceTypes' => $insuranceTypes
        ]);
    }

    public function company_create_post(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->validate_company($request);
            $data = $this->data_company($request);
            $company_id = Company::create($data)->id;
            $brname = $request->input('br-name');
            foreach ($brname as $index => $name) {
                $brdata = $this->data_branch($request, $index, $company_id);
                Branch::create($brdata);
            }
            DB::commit();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (UniqueConstraintViolationException $e) {
            $errorString = $e->getMessage();
            DB::rollback();
            if (strpos($errorString, 'stock_code_unique') !== false) {
                $errorMessage = '{"stock_code_unique":["入力された証券コードは既に登録されています."]}';
                return redirect()->back()->withErrors(json_decode($errorMessage, true))->withInput();
            } else {
                return redirect()->back()->withErrors("")->withInput();
            }
        }
        return redirect()->route('admin.company');
    }

    public function company_update(Request $request, $id)
    {
        $company = Company::find($id);
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $branch = $company->branch()->where('delete_flg', 0)->get();
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $insuranceTypes = Values_employee_labor_insurance_type::pluck('name', 'id');
        return view('admin.company_create', [
            'company_id' => $company->id,
            'company' => $company,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => $branch,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'insuranceTypes' => $insuranceTypes
        ]);
    }

    public function company_update_post(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->validate_company($request);
            $data = $this->data_company($request);
            Company::where('id', $id)->update($data);
            $brids = $request->input('br-id');
            $excepts = [];
            foreach ($brids as $index => $brid) {
                $brdata = $this->data_branch($request, $index, $id);
                if ($brid > 0) {
                    Branch::where('id', $brid)->update($brdata);
                    $excepts[] = $brid;
                } else {
                    $created_id = Branch::create($brdata)->id;
                    $excepts[] = $created_id;
                }
            }
            Branch::where('company_id', $id)->whereNotIn('id', $excepts)->update(['delete_flg' => 1]);
            DB::commit();
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
        return redirect()->route('admin.company');
    }
    private function validateAndFormatDate($inputDate)
    {
        if ($inputDate) {
            $formattedDate = \DateTime::createFromFormat('Y年n月j日', $inputDate);
            $formattedDate = $formattedDate->format('Y-m-d');
            $validator = Validator::make(['formatted_date' => $formattedDate], [
                'formatted_date' => 'date_format:Y-m-d',
            ]);
            if (!$validator->passes()) {
                throw new ValidationException($validator);
            }
            return $formattedDate;
        }
        return null;
    }

    private function validate_company(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'name_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',
            'name_en' => 'nullable|string|max:255|regex:/^[!-~]+$/',
            'name_abbreviation' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9]+$/',
            'company_no' => 'string|max:20|regex:/^[a-zA-Z0-9]+$/',
            'company_type_id' => 'integer',
            'license_no' => 'nullable|string|max:255',
            'business_type' => 'integer',
            'listed_type' => 'nullable|integer',
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
            'purpose' => 'string|max:255',
            'company_division' => 'integer',
            'br-name' => 'required|array',
            'br-name.*' => 'string|max:255',
            'br-branch_type' => 'required|array',
            'br-branch_type.*' => 'integer',
            'br-place_type' => 'required|array',
            'br-place_type.*' => 'integer|regex:/^[12]+\z/',
            'br-post_code' => 'required|array',
            'br-post_code.*' => 'string|max:7|regex:/\A[0-9]+\z/u',
            'br-address_prefecture' => 'required|array',
            'br-address_prefecture.*' => 'string|max:2',
            "br-address_city" => 'required|array',
            "br-address_city.*" => 'string|max:255',
            "br-address_ward" => 'required|array',
            "br-address_ward.*" => 'string|max:255',
            "br-address_apartment" => 'required|array',
            "br-address_apartment.*" => 'string|max:255',
            "br-tel_area_code" => 'array',
            "br-tel_area_code.*" => 'nullable|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_city_code" => 'array',
            "br-tel_city_code.*" => 'nullable|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_subscriber_code" => 'array',
            "br-tel_subscriber_code.*" => 'nullable|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_overseas" => 'array',
            "br-tel_overseas.*" => 'nullable|max:15|regex:/\A[0-9]+\z/u',
            "br-labor_insurance_no" => 'array',
            "br-labor_insurance_no.*" => 'nullable|regex:/^\d{14}$/',
            "br-labor_insurance_payment_method" => 'array',
            "br-labor_insurance_payment_method.*" => 'nullable|integer',
            "br-insurance_type_id" => 'array',
            "br-insurance_type_id.*" => 'nullable|integer',
            "br-insurance_office_no" => 'array',
            "br-insurance_office_no.*" => 'nullable|string|max:20',
            "br-insurance_office_reference_no" => 'array',
            "br-insurance_office_reference_no.*" => 'nullable|string|max:20',
            "br-pension_office_id" => 'array',
            "br-pension_office_id.*" => 'nullable|integer',
            "br-pension_office_no" => 'array',
            "br-pension_office_no.*" => 'nullable|string|max:10',
            "br-employment_insurance_office_no" => 'array',
            "br-employment_insurance_office_no.*" => 'nullable|string|max:20',
            "br-hello_work_id" => 'array',
            "br-hello_work_id.*" => 'nullable|integer',
            "br-labor_bureau_id" => 'array',
            "br-labor_bureau_id.*" => 'nullable|integer',
            "br-labor_supervision_id" => 'array',
            "br-labor_supervision_id.*" => 'nullable|integer',
            "br-start_date_of_month" => 'array',
            "br-start_date_of_month.*" => 'nullable|integer',
            "br-start_days_of_week" => 'array',
            "br-start_days_of_week.*" => 'nullable|integer',
            "br-start_time_of_day" => 'array',
            "br-start_time_of_day.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-work_time_start" => 'array',
            "br-work_time_start.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-work_time_end" => 'array',
            "br-work_time_end.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-agreed_hours_year" => 'array',
            "br-agreed_hours_year.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_month" => 'array',
            "br-agreed_hours_month.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_week" => 'array',
            "br-agreed_hours_week.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_day" => 'array',
            "br-agreed_hours_day.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-working_days_yearly" => 'array',
            "br-working_days_yearly.*" => 'nullable|integer',
            "br-working_days_monthly" => 'array',
            "br-working_days_monthly.*" => 'nullable|integer',
            "br-holiday_yearly" => 'array',
            "br-holiday_yearly.*" => 'nullable|integer',
            "br-hoiday_monthly" => 'array',
            "br-hoiday_monthly.*" => 'nullable|integer',
            "br-work_style_type" => 'array',
            "br-work_style_type.*" => 'nullable|integer',
            "br-holiday_legal" => 'array',
            "br-holiday_legal.*" => 'nullable|string|max:8',
            "br-holiday_not_logal" => 'array',
            "br-holiday_not_logal.*" => 'nullable|string|max:8',
        ]);
    }

    private function data_company(Request $request)
    {
        $formmatted_founding_date = $request->input('founding_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('founding_date'))->format('Y-m-d') : null;
        $formmatted_establishment_date = $request->input('establishment_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('establishment_date'))->format('Y-m-d') : null;
        // $formmatted_br_employment_insurance_establishment_date = $this->validateAndFormatDate($request->input('br-employment_insurance_establishment_date'));
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
            'purpose' => $request->input('purpose'),
            'company_division' => $request->input('company_division'),
        ];
    }

    private function data_branch(Request $request, $index, $company_id)
    {
        $formmatted_br_labor_insurance_establishment_date = $request->input('br-labor_insurance_establishment_date')[$index] ? Carbon::createFromFormat('Y年n月j日', $request->input('br-labor_insurance_establishment_date')[$index])->format('Y-m-d') : null;

        return [
            'name' => $request->input('br-name')[$index],
            'company_id' => $company_id,
            'post_code' => $request->input('br-post_code')[$index],
            'address_prefecture' => $request->input('br-address_prefecture')[$index],
            'address_city' => $request->input('br-address_city')[$index],
            'address_ward' => $request->input('br-address_ward')[$index],
            'address_apartment' => $request->input('br-address_apartment')[$index],
            'tel_area_code' => $request->input('br-tel_area_code')[$index],
            'tel_city_code' => $request->input('br-tel_city_code')[$index],
            'tel_subscriber_code' => $request->input('br-tel_subscriber_code')[$index],
            'tel_overseas' => $request->input('br-tel_overseas')[$index],
            'place_type' => $request->input('br-place_type')[$index],
            'branch_type' => $request->input('br-branch_type')[$index],
            'labor_insurance_no' => $request->input('br-labor_insurance_no')[$index],
            'labor_insurance_payment_method' => $request->input('br-labor_insurance_payment_method')[$index],
            'insurance_type_id' => $request->input('br-insurance_type_id')[$index],
            'labor_insurance_establishment_date' => $formmatted_br_labor_insurance_establishment_date,
            'insurance_office_no' => $request->input('br-insurance_office_no')[$index],
            'insurance_office_reference_no' => $request->input('br-insurance_office_reference_no')[$index],
            'pension_office_no' => $request->input('br-pension_office_no')[$index],
            'pension_office_id' => $request->input('br-pension_office_id')[$index],
            'employment_insurance_office_no' => $request->input('br-employment_insurance_office_no')[$index],
            'employment_insurance_establishment_date' => $request->input('br-employment_insurance_establishment_date')[$index],
            'hello_work_id' => $request->input('br-hello_work_id')[$index],
            'labor_bureau_id' => $request->input('br-labor_bureau_id')[$index],
            'labor_supervision_id' => $request->input('br-labor_supervision_id')[$index],
            'start_date_of_month' => $request->input('br-start_date_of_month')[$index],
            'start_days_of_week' => $request->input('br-start_days_of_week')[$index],
            'start_time_of_day' => $request->input('br-start_time_of_day')[$index],
            'work_time_start' => $request->input('br-work_time_start')[$index],
            'work_time_end' => $request->input('br-work_time_end')[$index],
            'agreed_hours_year' => $request->input('br-agreed_hours_year')[$index],
            'agreed_hours_month' => $request->input('br-agreed_hours_month')[$index],
            'agreed_hours_week' => $request->input('br-agreed_hours_week')[$index],
            'agreed_hours_day' => $request->input('br-agreed_hours_day')[$index],
            'working_days_yearly' => $request->input('br-working_days_yearly')[$index],
            'working_days_monthly' => $request->input('br-working_days_monthly')[$index],
            'holiday_yearly' => $request->input('br-holiday_yearly')[$index],
            'hoiday_monthly' => $request->input('br-hoiday_monthly')[$index],
            'holiday_legal' => $request->input('br-holiday_legal')[$index],
            'holiday_not_logal' => $request->input('br-holiday_not_logal')[$index],
            'work_style_type' => $request->input('br-work_style_type')[$index],
        ];
    }
}
