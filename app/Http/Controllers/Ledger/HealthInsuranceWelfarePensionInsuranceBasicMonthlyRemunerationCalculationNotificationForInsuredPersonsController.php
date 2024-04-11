<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsRequest;

use Illuminate\Support\Facades\File;

use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;

class HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController extends Controller
{
    public function index(Request $request)
    {
        $imagePath = public_path('img/tyohyo159.png');
        $imageData = File::get($imagePath);
        $base64Data = base64_encode($imageData);
        $dataUri = 'data:image/png;base64,' . $base64Data;

        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

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

        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $todaySet = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        return view('ledger.health_insurance_welfare_pension_insurance_basic_monthly_remuneration_calculation_notification_forInsured_persons', ['company' => $company, 'todaySet' => $todaySet, 'dataUri' => $dataUri, 'certificate' => $certificate]);
    }

    public function post(HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsRequest $request)
    {
        try {
            $data = [
                "today_japan_era_year"  => $request->input('today_japan_era_year'),
                "today_japan_era_month"  => $request->input('today_japan_era_month'),
                "today_japan_era_day"  => $request->input('today_japan_era_day'),
                "business_establishment_code_prefecture_code"  => $request->input('business_establishment_code_prefecture_code'),
                "office_arrangement_code_county_city_ward_code"  => $request->input('office_arrangement_code_county_city_ward_code'),
                "office_reference_symbol_office_symbol"  => $request->input('office_reference_symbol_office_symbol'),
                "post_code_former"  => $request->input('post_code_former'),
                "post_code_latter"  => $request->input('post_code_latter'),
                "business_location"  => $request->input('business_location'),
                "business_name"  => $request->input('business_name'),
                "business_owner_name"  => $request->input('business_owner_name'),
                "branch_tel_area_code"  => $request->input('branch_tel_area_code'),
                "branch_tel_city_code"  => $request->input('branch_tel_city_code'),
                "branch_tel_subscriber_code"  => $request->input('branch_tel_subscriber_code'),
                "labor_consultant_name"  => $request->input('labor_consultant_name'),
                "Insured_person_reference_number"  => $request->input('Insured_person_reference_number'),
                "insured_person_name_in_kana"  => $request->input('insured_person_name_in_kana'),
                "Insured_person_name_in_kanji"  => $request->input('Insured_person_name_in_kanji'),
                "era_name"  => $request->input('era_name'),
                "year_of_birth"  => $request->input('year_of_birth'),
                "month_of_birth"  => $request->input('month_of_birth'),
                "date_of_birth"  => $request->input('date_of_birth'),
                "applicable_era_name"  => $request->input('applicable_era_name'),
                "applicable_year"  => $request->input('applicable_year'),
                "previous_standard_monthly_remuneration_health_insurance"  => $request->input('previous_standard_monthly_remuneration_health_insurance'),
                "previous_standard_monthly_remuneration_employees_pension"  => $request->input('previous_standard_monthly_remuneration_employees_pension'),
                "previous_revision_year"  => $request->input('previous_revision_year'),
                "previous_revision_month"  => $request->input('previous_revision_month'),
                "monthly_salary_increase"  => $request->input('monthly_salary_increase'),
                "salary_increase"  => $request->input('salary_increase'),
                "retroactive_payment_amount_month"  => $request->input('retroactive_payment_amount_month'),
                "retroactive_payment_amount"  => $request->input('retroactive_payment_amount'),
                "basic_number_of_days_for_payroll_calculatio1"  => $request->input('basic_number_of_days_for_payroll_calculatio1'),
                "basic_number_of_days_for_payroll_calculatio2"  => $request->input('basic_number_of_days_for_payroll_calculatio2'),
                "basic_number_of_days_for_payroll_calculatio3"  => $request->input('basic_number_of_days_for_payroll_calculatio3'),
                "monthly_remuneration_amount_in_currency1"  => $request->input('monthly_remuneration_amount_in_currency1'),
                "monthly_remuneration_amount_in_currency2"  => $request->input('monthly_remuneration_amount_in_currency2'),
                "monthly_remuneration_amount_in_currency3"  => $request->input('monthly_remuneration_amount_in_currency3'),
                "monthly_remuneration_amount_in_kind1"  => $request->input('monthly_remuneration_amount_in_kind1'),
                "monthly_remuneration_amount_in_kind2"  => $request->input('monthly_remuneration_amount_in_kind2'),
                "monthly_remuneration_amount_in_kind3"  => $request->input('monthly_remuneration_amount_in_kind3'),
                "monthly_remuneration_total1"  => $request->input('monthly_remuneration_total1'),
                "monthly_remuneration_total2"  => $request->input('monthly_remuneration_total2'),
                "monthly_remuneration_total3"  => $request->input('monthly_remuneration_total3'),
                "grand_total"  => $request->input('grand_total'),
                "average_amount"  => $request->input('average_amount'),
                "adjusted_average_amount"  => $request->input('adjusted_average_amount'),
                "my_number_or_basic_pension_number"  => $request->input('my_number_or_basic_pension_number'),
                "remarks_and_calculation_of_employees_aged_70_and_over"  => $request->input('remarks_and_calculation_of_employees_aged_70_and_over'),
                "remarks_and_two_or_more_jobs" => $request->input('remarks_and_two_or_more_jobs'),
                "remarks_and_scheduled_monthly_changes" => $request->input('remarks_and_scheduled_monthly_changes'),
                "remarks_and_Joined_midway" => $request->input('remarks_and_Joined_midway'),
                "remarks_and_sick_leave_childcare_leave" => $request->input('remarks_and_sick_leave_childcare_leave'),
                "remarks_and_part_time_worker" => $request->input('remarks_and_part_time_worker'),
                "remarks_and_part" => $request->input('remarks_and_part'),
                "remarks_and_annual_average" => $request->input('remarks_and_annual_average'),
                "remarks_and_others" => $request->input('remarks_and_others'),
                "remarks_calculation_basic_month_month1" => $request->input('remarks_calculation_basic_month_month1'),
                "remarks_calculation_basic_month_month2" => $request->input('remarks_calculation_basic_month_month2'),
                "others" => $request->input('others'),
            ];
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
