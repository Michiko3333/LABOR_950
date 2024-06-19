<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaborCompanyUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;
use App\Permission;

class LaborCompanyController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission();
            if (!$userPermission->isLabor()) {
                return redirect()->route('auth.logout');
            }
            return $next($request);
        });
    }

    public function labor_company_update(Request $request)
    {
        $id = CurrentUser::branch()->value('company_id');

        $company = Company::find($id);
        $company_listed_type = Values_company_listed_type::pluck('name', 'id');
        $businessTypes = Values_company_business_type::pluck('name', 'id');
        $branch = $company->branch()->where('delete_flg', 0)->get();
        $company_type = Company_type::where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        return view('labor.company_update', [
            'company_id' => $company->id,
            'company' => $company,
            'company_listed_type' => $company_listed_type,
            'businessTypes' => $businessTypes,
            'branch' => $branch,
            'company_type' => $company_type,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function labor_company_update_post(LaborCompanyUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $id = CurrentUser::branch()->value('company_id');
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
        return redirect()->route('labor_company_update');
    }

    private function data_company(Request $request)
    {
        $formmatted_founding_date = $request->input('founding_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('founding_date'))->format('Y-m-d') : null;
        $formmatted_establishment_date = $request->input('establishment_date') ? Carbon::createFromFormat('Y年n月j日', $request->input('establishment_date'))->format('Y-m-d') : null;
        return [
            'company_division' => $request->input('company_division'),
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
        ];
    }

    private function data_branch(Request $request, $index, $company_id)
    {
        $formmatted_br_labor_insurance_establishment_date = $request->input('br-labor_insurance_establishment_date')[$index] ? Carbon::createFromFormat('Y年n月j日', $request->input('br-labor_insurance_establishment_date')[$index])->format('Y-m-d') : null;
        $formmatted_br_employment_insurance_establishment_date = $request->input('br-employment_insurance_establishment_date')[$index] ? Carbon::createFromFormat('Y年n月j日', $request->input('br-employment_insurance_establishment_date')[$index])->format('Y-m-d') : null;

        $fax = [];
        $fax1 = $request->input('br-fax1') ?? null;
        $fax2 = $request->input('br-fax2') ?? null;
        $fax3 = $request->input('br-fax3') ?? null;
        $fax1Index = count($request->input('br-fax1')) ?? null;
        $fax2Index = count($request->input('br-fax2')) ?? null;
        $fax3Index = count($request->input('br-fax3')) ?? null;

        if ($fax1 !== null || $fax2 !== null || $fax3 !== null) {
            $count = '';
            if ($fax1Index >= $fax2Index && $fax1Index >= $fax3Index) {
                $count = $fax1Index;
            } elseif ($fax2Index >= $fax1Index && $fax2Index >= $fax3Index) {
                $count = $fax2Index;
            } else {
                $count = $fax3Index;
            }

            for ($i = 0; $i < $count; $i++) {
                $part1 = isset($fax1[$i]) ? $fax1[$i] : '';
                $part2 = isset($fax2[$i]) ? $fax2[$i] : '';
                $part3 = isset($fax3[$i]) ? $fax3[$i] : '';
                if ($part1 === null && $part2 === null && $part3 === null) {
                    continue;
                }
                $fax[] = ($part1 !== '' ? $part1 . '-' : '') . ($part2 !== '' ? $part2 . '-' : '') . ($part3 !== '' ? $part3 : '');
            }
        }

        return [
            'name' => $request->input('br-name')[$index],
            'company_id' => $company_id,
            'post_code' => $request->input('br-post_code')[$index],
            'address_prefecture' => $request->input('br-address_prefecture')[$index],
            'address_city' => $request->input('br-address_city')[$index],
            'address_ward' => $request->input('br-address_ward')[$index],
            'address_apartment' => $request->input('br-address_apartment')[$index],
            'address_city_kana' => $request->input('br-address_city_kana')[$index],
            'address_ward_kana' => $request->input('br-address_ward_kana')[$index],
            'address_apartment_kana' => $request->input('br-address_apartment_kana')[$index],
            'tel_area_code' => $request->input('br-tel_area_code')[$index],
            'tel_city_code' => $request->input('br-tel_city_code')[$index],
            'tel_subscriber_code' => $request->input('br-tel_subscriber_code')[$index],
            'tel_overseas' => $request->input('br-tel_overseas')[$index],
            'fax' => $fax[$index],
            'mail_address' => $request->input('br-mail_address')[$index],
            'place_type' => $request->input('br-place_type')[$index],
            'branch_type' => $request->input('br-branch_type')[$index],
            'labor_insurance_no' => $request->input('br-labor_insurance_no')[$index],
            'labor_insurance_payment_method' => $request->input('br-labor_insurance_payment_method')[$index],
            'labor_insurance_establishment_date' => $formmatted_br_labor_insurance_establishment_date,
            'insurance_office_no' => $request->input('br-insurance_office_no')[$index],
            'insurance_office_reference_no' => $request->input('br-insurance_office_reference_no')[$index],
            'pension_office_no' => $request->input('br-pension_office_no')[$index],
            'pension_office_id' => $request->input('br-pension_office_id')[$index],
            'pension_office_reference_prefecture' => $request->input('br-pension_office_reference_prefecture')[$index],
            'pension_office_reference_no_cities' => $request->input('br-pension_office_reference_no_cities')[$index],
            'pension_office_reference_no_office' => $request->input('br-pension_office_reference_no_office')[$index],
            'employment_insurance_office_no' => $request->input('br-employment_insurance_office_no')[$index],
            'employment_insurance_establishment_date' => $formmatted_br_employment_insurance_establishment_date,
            'hello_work_id' => $request->input('br-hello_work_id')[$index],
            'labor_bureau_id' => $request->input('br-labor_bureau_id')[$index],
            'labor_supervision_id' => $request->input('br-labor_supervision_id')[$index],
            'start_date_of_month' => $request->input('br-start_date_of_month')[$index],
            'start_days_of_week' => $request->input('br-start_days_of_week')[$index],
            'start_time_of_day' => $request->input('br-start_time_of_day')[$index],
            'work_time_start' => $request->input('br-work_time_start')[$index],
            'work_time_end' => $request->input('br-work_time_end')[$index],
            'agreed_hours_year_h' => $request['br-agreed_hours_year_h'][$index],
            'agreed_hours_year_m' => $request['br-agreed_hours_year_m'][$index],
            'agreed_hours_month_h' => $request['br-agreed_hours_month_h'][$index],
            'agreed_hours_month_m' => $request['br-agreed_hours_month_m'][$index],
            'agreed_hours_week_h' => $request['br-agreed_hours_week_h'][$index],
            'agreed_hours_week_m' => $request['br-agreed_hours_week_m'][$index],
            'agreed_hours_day_h' => $request['br-agreed_hours_day_h'][$index],
            'agreed_hours_day_m' => $request['br-agreed_hours_day_m'][$index],
            'working_days_yearly' => $request->input('br-working_days_yearly')[$index],
            'working_days_monthly' => $request->input('br-working_days_monthly')[$index],
            'holiday_yearly' => $request->input('br-holiday_yearly')[$index],
            'holiday_monthly' => $request->input('br-holiday_monthly')[$index],
            'holiday_legal' => $request->input('br-holiday_legal')[$index],
            'holiday_not_logal' => $request->input('br-holiday_not_logal')[$index],
            'work_style_type' => $request->input('br-work_style_type')[$index],
        ];
    }
}
