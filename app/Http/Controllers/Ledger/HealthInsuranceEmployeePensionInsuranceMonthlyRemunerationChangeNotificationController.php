<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationRequest;
use Illuminate\Support\Facades\File;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;
use App\EgovAPI\MixXmlEgovSigner;

class HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController extends Controller
{
    public function index(Request $request)
    {
        $imagePath = public_path('img/tyohyo158.png');
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

        return view('ledger.health_insurance_employee_pension_insurance_monthly_remuneration_change_notification', ['company' => $company, 'todaySet' => $todaySet, 'dataUri' => $dataUri, 'certificate' => $certificate]);
    }

    public function post(HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationRequest $request)
    {
        try {
            $data = [
                "today_year" => $request->input('today_year'),
                "today_month" => $request->input('today_japan_era_month'),
                "today_date" => $request->input('today_date'),
                "pension_office_reference_prefecture" => $request->input('pension_office_reference_prefecture'),
                "pension_office_reference_no_cities" => $request->input('pension_office_reference_no_cities'),
                "pension_office_reference_no_office" => $request->input('pension_office_reference_no_office'),
                "branch_post_code_parent" => $request->input('branch_post_code_parent'),
                "branch_post_code_child" => $request->input('branch_post_code_child'),
                "branch_address" => $request->input('branch_address'),
                "business_name" => $request->input('business_name'),
                "employer_company_managerial_position_name" => $request->input('employer_company_managerial_position_name'),
                "branch_tel_area_code" => $request->input('branch_tel_area_code'),
                "branch_tel_city_code" => $request->input('branch_tel_city_code'),
                "branch_tel_subscriber_code" => $request->input('branch_tel_subscriber_code'),
                "labor_consultant_submission_agent_name" => $request->input('labor_consultant_submission_agent_name'),
                "insurer_reference_no" => $request->input('insurer_reference_no'),
                "insured_fullname_kana" => $request->input('insured_fullname_kana'),
                "insured_fullname" => $request->input('insured_fullname'),
                "birthday_era" => $request->input('birthday_era'),
                "birthday_year" => $request->input('birthday_year'),
                "birthday_month" => $request->input('birthday_month'),
                "birthday_date" => $request->input('birthday_date'),
                "revision_date_era" => $request->input('revision_date_era'),
                "revision_date_year" => $request->input('revision_date_year'),
                "revision_date_month" => $request->input('revision_date_month'),
                "previous_average_monthly_salary_health_insurance" => $request->input('previous_average_monthly_salary_health_insurance'),
                "previous_average_monthly_salary_pension" => $request->input('previous_average_monthly_salary_pension'),
                "before_revision_date_year" => $request->input('before_revision_date_year'),
                "before_revision_date_month" => $request->input('before_revision_date_month'),
                "salary_raise_and_reduction_month" => $request->input('salary_raise_and_reduction_month'),
                "salary_raise_and_reduction" => $request->input('salary_raise_and_reduction'),
                "retroactive_payment_month" => $request->input('retroactive_payment_month'),
                "retroactive_payment_amount" => $request->input('retroactive_payment_amount'),
                "salary_payment_month1" => $request->input('salary_payment_month1'),
                "salary_payment_month2" => $request->input('salary_payment_month2'),
                "salary_payment_month3" => $request->input('salary_payment_month3'),
                "salary_calculation_basic_days1" => $request->input('salary_calculation_basic_days1'),
                "salary_calculation_basic_days2" => $request->input('salary_calculation_basic_days2'),
                "salary_calculation_basic_days3" => $request->input('salary_calculation_basic_days3'),
                "monthly_salary_currency1" => $request->input('monthly_salary_currency1'),
                "monthly_salary_currency2" => $request->input('monthly_salary_currency2'),
                "monthly_salary_currency3" => $request->input('monthly_salary_currency3'),
                "monthly_salary_in_kind1" => $request->input('monthly_salary_in_kind1'),
                "monthly_salary_in_kind2" => $request->input('monthly_salary_in_kind2'),
                "monthly_salary_in_kind3" => $request->input('monthly_salary_in_kind3'),
                "monthly_salary_sum1" => $request->input('monthly_salary_sum1'),
                "monthly_salary_sum2" => $request->input('monthly_salary_sum2'),
                "monthly_salary_sum3" => $request->input('monthly_salary_sum3'),
                "sum" => $request->input('sum'),
                "average_amount" => $request->input('average_amount'),
                "adjusted_average_amount" => $request->input('adjusted_average_amount'),
                "mynumber_no_or_pension_no" => $request->input('mynumber_no_or_pension_no'),
                "remarks_over_70_monthly_salary_change" => $request->input('remarks_over_70_monthly_salary_change'),
                "remarks_multi_work" => $request->input('remarks_multi_work'),
                "remarks_part_time_workers" => $request->input('remarks_part_time_workers'),
                "remarks_salary_raise_and_reduction_reasons" => $request->input('remarks_salary_raise_and_reduction_reasons'),
                "remarks_only_health_insurance_salary_change" => $request->input('remarks_only_health_insurance_salary_change'),
                "remarks_and_others" => $request->input('remarks_and_others'),
                "remarks_salary_raise_and_reduction_reasons_text" => $request->input('remarks_salary_raise_and_reduction_reasons_text'),
                "remarks_others" => $request->input('remarks_others'),
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);            
            if ( $response[0] == false ){
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
