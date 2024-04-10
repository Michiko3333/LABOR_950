<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BranchRequest;
use App\Models\CurrentUser;
use App\Models\Prefecture;
use App\Models\Values_branch_labor_insurance_payment_method;
use App\Models\Values_branch_place_type;
use App\Models\Values_branch_start_days_of_week;
use App\Models\Values_branch_work_style_type;
use App\Models\Branch;
use Carbon\Carbon;

class BranchController extends Controller
{
    public function branch(Request $request)
    {
        $current_company = CurrentUser::currentCompany();
        $branch = $current_company->branch()->where('delete_flg', 0)->get();
        $prefectures = Prefecture::pluck('name', 'id');
        $labor_insurance_payment_method = Values_branch_labor_insurance_payment_method::pluck('name', 'id');
        $place_type = Values_branch_place_type::pluck('name', 'id');
        $start_days_of_week = Values_branch_start_days_of_week::pluck('name', 'id');
        $work_style_type = Values_branch_work_style_type::pluck('name', 'id');
        return view('branch', [
            'branch' => $branch,
            'prefectures' => $prefectures,
            'labor_insurance_payment_method' => $labor_insurance_payment_method,
            'place_type' => $place_type,
            'start_days_of_week' => $start_days_of_week,
            'work_style_type' => $work_style_type
        ]);
    }

    public function branch_post(BranchRequest $request)
    {
        DB::beginTransaction();
        try {
            $current_company = CurrentUser::currentCompany();
            $id = $current_company->id;
            $brids = $request->input('br-id');
            $excepts = [];
            foreach ($brids as $index => $brid) {
                $brdata = $this->data_branch($request, $index);
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
            $this->putSuccess($request);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        return redirect()->route('branch');
    }

    private function data_branch(Request $request, $index)
    {
        $input_date1 = $request->input('br-labor_insurance_establishment_date')[$index];
        if (!is_null($input_date1) && strtotime($input_date1) === false) {
            $formatted_br_labor_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_br_labor_insurance_establishment_date = $input_date1;
        }
        $input_date2 = $request->input('br-employment_insurance_establishment_date')[$index];
        if (!is_null($input_date2) && strtotime($input_date2) === false) {
            $formatted_br_employment_insurance_establishment_date = Carbon::createFromFormat('Y年n月j日', $input_date1)->format('Y-m-d');
        } else {
            $formatted_br_employment_insurance_establishment_date = $input_date2;
        }
        $current_company = CurrentUser::currentCompany();
        $company_id = $current_company->id;
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
            'labor_insurance_establishment_date' => $formatted_br_labor_insurance_establishment_date,
            'insurance_office_no' => $request->input('br-insurance_office_no')[$index],
            'insurance_office_reference_no' => $request->input('br-insurance_office_reference_no')[$index],
            'pension_office_no' => $request->input('br-pension_office_no')[$index],
            'pension_office_id' => $request->input('br-pension_office_id')[$index],
            'pension_office_reference_prefecture' => $request->input('br-pension_office_reference_prefecture')[$index],
            'pension_office_reference_no_cities' => $request->input('br-pension_office_reference_no_cities')[$index],
            'pension_office_reference_no_office' => $request->input('br-pension_office_reference_no_office')[$index],
            'employment_insurance_office_no' => $request->input('br-employment_insurance_office_no')[$index],
            'employment_insurance_establishment_date' => $formatted_br_employment_insurance_establishment_date,
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
            'holiday_monthly' => $request->input('br-holiday_monthly')[$index],
            'holiday_legal' => $request->input('br-holiday_legal')[$index],
            'holiday_not_logal' => $request->input('br-holiday_not_logal')[$index],
            'work_style_type' => $request->input('br-work_style_type')[$index],
        ];
    }
}