<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmploymentInsuredLeaveStartAmountMonthlyCertificateRequest;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\EgovAPI\MixXmlEgovSigner;
use App\Models\Branch;
use App\Permission;

class EmploymentInsuredLeaveStartAmountMonthlyCertificateController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $userPermission = new Permission;
            if (!$userPermission->isSelectedCompany() || $userPermission->denyProcedure() || !$userPermission->isReadableFor(8) || !$userPermission->isWritableFor(8) || !$userPermission->isBasicDepartment()) {

                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (!$this->isSelectedCompany()) {
            return redirect()->route('home.select');
        }

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        $certificate = Certificate::where('company_id', $companyId)
            ->where('delete_flg', 0)
            ->first();
        if ($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }
        $current_employee = CurrentUser::info();
        $current_branch = Branch::where('id', $current_employee->branch_id)->first();

        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.employment_insured_leave_start_amount_monthly_certificate', [
            'company' => $company,
            'today' => $today,
            'certificate' => $certificate,
            'procedureName' => $procedureName,
            'current_employee' => $current_employee,
            'egovAcount' => $egovAcount,
            'current_branch' => $current_branch,
        ]);
    }

    public function post(EmploymentInsuredLeaveStartAmountMonthlyCertificateRequest $request)
    {
        $attachment = [];

        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = ($file_key === 'file_other') ? 'input_file_other' : 'label_' . $file_key;

                $attachment_type = ($value === '2') ? '添付' : '別送';

                $attached_document_name = $request->input($label_key);

                $attachment_file_name = '';
                if ($value === '2' && $request->hasFile($file_key)) {
                    $file = $request->file($file_key);
                    $attachment_file_name = $file->getClientOriginalName();
                }

                $attachment[] = [
                    'attachment_type' => $attachment_type,
                    'attached_document_name' => $attached_document_name,
                    'attachment_file_name' => $attachment_file_name,
                    'submission_info' => '1'
                ];
            }
        }

        if (!empty($attachment)) {
            $request->merge(['attachment' => $attachment]);
        }

        $radio_keys = ["radio_file_wage_certificate_or_payment_status", "radio_file_childcare", "radio_file_nursing_care", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                // １枚目
                'employee_employment_insured_no_4' => $request->input('employee_employment_insured_no_4'),
                'employee_employment_insured_no_6' => $request->input('employee_employment_insured_no_6'),
                'employee_employment_insured_no_cd' => $request->input('employee_employment_insured_no_cd'),
                'branch_insurance_office_no_4' => $request->input('branch_insurance_office_no_4'),
                'branch_insurance_office_no_6' => $request->input('branch_insurance_office_no_6'),
                'branch_insurance_office_no_cd' => $request->input('branch_insurance_office_no_cd'),
                'employee_name_kana' => $request->input('employee_name_kana'),
                'employee_name' => $request->input('employee_name'),
                'employee_childcare_caregiver_leave_start_era_year' => $request->input('employee_childcare_caregiver_leave_start_era_year'),
                'employee_childcare_caregiver_leave_start_month' => $request->input('employee_childcare_caregiver_leave_start_month'),
                'employee_childcare_caregiver_leave_start_day' => $request->input('employee_childcare_caregiver_leave_start_day'),
                'branch_name' => $request->input('branch_name'),
                'branch_address' => $request->input('branch_address'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'employeepost_code_3' => $request->input('employeepost_code_3'),
                'employeepost_code_4' =>  $request->input('employeepost_code_4'),
                'employee_address' => $request->input('employee_address'),
                'employee_tel_area_code' => $request->input('employee_tel_area_code'),
                'employee_tel_city_code' => $request->input('employee_tel_city_code'),
                'employee_tel_subscriber_code' => $request->input('employee_tel_subscriber_code'),
                'headquarters_address' => $request->input('headquarters_address'),
                'headquarters_employee_name' => $request->input('headquarters_employee_name'),
                'closing_start_month' => $request->input('closing_start_month'),
                'closing_start_day' => $request->input('closing_start_day'),
                'applicable_period_start_month1' => $request->input('applicable_period_start_month1'),
                'applicable_period_start_day1' => $request->input('applicable_period_start_day1'),
                'basic_days1' => $request->input('basic_days1'),
                'payment_period_start_month1' => $request->input('payment_period_start_month1'),
                'payment_period_start_day1' => $request->input('payment_period_start_day1'),
                'payment_period_basic_days1' => $request->input('payment_period_basic_days1'),
                'wage_amount_a1' => $request->input('wage_amount_a1'),
                'wage_amount_b1' => $request->input('wage_amount_b1'),
                'note1_01' => $request->input('note1_01'),
                'applicable_period_start_month1_1' => $request->input('applicable_period_start_month1_1'),
                'applicable_period_start_day1_1' => $request->input('applicable_period_start_day1_1'),
                'basic_days1_1' => $request->input('basic_days1_1'),
                'payment_period_start_month1_1' => $request->input('payment_period_start_month1_1'),
                'payment_period_start_day1_1' => $request->input('payment_period_start_day1_1'),
                'payment_period_basic_days1_1' => $request->input('payment_period_basic_days1_1'),
                'wage_amount_a1_1' => $request->input('wage_amount_a1_1'),
                'wage_amount_b1_1' => $request->input('wage_amount_b1_1'),
                'note1_02' => $request->input('note1_02'),
                'applicable_period_start_month1_2' => $request->input('applicable_period_start_month1_2'),
                'applicable_period_start_day1_2' => $request->input('applicable_period_start_day1_2'),
                'basic_days1_2' => $request->input('basic_days1_2'),
                'payment_period_start_month1_2' => $request->input('payment_period_start_month1_2'),
                'payment_period_start_day1_2' => $request->input('payment_period_start_day1_2'),
                'payment_period_basic_days1_2' => $request->input('payment_period_basic_days1_2'),
                'wage_amount_a1_2' => $request->input('wage_amount_a1_2'),
                'wage_amount_b1_2' => $request->input('wage_amount_b1_2'),
                'note1_03' => $request->input('note1_03'),
                'applicable_period_start_month1_3' => $request->input('applicable_period_start_month1_3'),
                'applicable_period_start_day1_3' => $request->input('applicable_period_start_day1_3'),
                'basic_days1_3' => $request->input('basic_days1_3'),
                'payment_period_start_month1_3' => $request->input('payment_period_start_month1_3'),
                'payment_period_start_day1_3' => $request->input('payment_period_start_day1_3'),
                'payment_period_basic_days1_3' => $request->input('payment_period_basic_days1_3'),
                'wage_amount_a1_3' => $request->input('wage_amount_a1_3'),
                'wage_amount_b1_3' => $request->input('wage_amount_b1_3'),
                'note1_04' => $request->input('note1_04'),
                'applicable_period_start_month1_4' => $request->input('applicable_period_start_month1_4'),
                'applicable_period_start_day1_4' => $request->input('applicable_period_start_day1_4'),
                'basic_days1_4' => $request->input('basic_days1_4'),
                'payment_period_start_month1_4' => $request->input('payment_period_start_month1_4'),
                'payment_period_start_day1_4' => $request->input('payment_period_start_day1_4'),
                'payment_period_basic_days1_4' => $request->input('payment_period_basic_days1_4'),
                'wage_amount_a1_4' => $request->input('wage_amount_a1_4'),
                'wage_amount_b1_4' => $request->input('wage_amount_b1_4'),
                'note1_05' => $request->input('note1_05'),
                'applicable_period_start_month1_5' => $request->input('applicable_period_start_month1_5'),
                'applicable_period_start_day1_5' => $request->input('applicable_period_start_day1_5'),
                'basic_days1_5' => $request->input('basic_days1_5'),
                'payment_period_start_month1_5' => $request->input('payment_period_start_month1_5'),
                'payment_period_start_day1_5' => $request->input('payment_period_start_day1_5'),
                'payment_period_basic_days1_5' => $request->input('payment_period_basic_days1_5'),
                'wage_amount_a1_5' => $request->input('wage_amount_a1_5'),
                'wage_amount_b1_5' => $request->input('wage_amount_b1_5'),
                'note1_06' => $request->input('note1_06'),
                'applicable_period_start_month1_6' => $request->input('applicable_period_start_month1_6'),
                'applicable_period_start_day1_6' => $request->input('applicable_period_start_day1_6'),
                'basic_days1_6' => $request->input('basic_days1_6'),
                'payment_period_start_month1_6' => $request->input('payment_period_start_month1_6'),
                'payment_period_start_day1_6' => $request->input('payment_period_start_day1_6'),
                'payment_period_basic_days1_6' => $request->input('payment_period_basic_days1_6'),
                'wage_amount_a1_6' => $request->input('wage_amount_a1_6'),
                'wage_amount_b1_6' => $request->input('wage_amount_b1_6'),
                'note1_07' => $request->input('note1_07'),
                'applicable_period_start_month7' => $request->input('applicable_period_start_month7'),
                'applicable_period_start_day7' => $request->input('applicable_period_start_day7'),
                'basic_days7' => $request->input('basic_days7'),
                'payment_period_start_month7' => $request->input('payment_period_start_month7'),
                'payment_period_start_day7' => $request->input('payment_period_start_day7'),
                'payment_period_basic_days7' => $request->input('payment_period_basic_days7'),
                'wage_amount_a7' => $request->input('wage_amount_a7'),
                'wage_amount_b7' => $request->input('wage_amount_b7'),
                'note1_08' => $request->input('note1_08'),
                'applicable_period_start_month1_8' => $request->input('applicable_period_start_month1_8'),
                'applicable_period_start_day1_8' => $request->input('applicable_period_start_day1_8'),
                'basic_days1_8' => $request->input('basic_days1_8'),
                'payment_period_start_month1_8' => $request->input('payment_period_start_month1_8'),
                'payment_period_start_day1_8' => $request->input('payment_period_start_day1_8'),
                'payment_period_basic_days1_8' => $request->input('payment_period_basic_days1_8'),
                'wage_amount_a1_8' => $request->input('wage_amount_a1_8'),
                'wage_amount_b1_8' => $request->input('wage_amount_b1_8'),
                'note1_09' => $request->input('note1_09'),
                'applicable_period_start_month1_9' => $request->input('applicable_period_start_month1_9'),
                'applicable_period_start_day1_9' => $request->input('applicable_period_start_day1_9'),
                'basic_days1_9' => $request->input('basic_days1_9'),
                'payment_period_start_month1_9' => $request->input('payment_period_start_month1_9'),
                'payment_period_start_day1_9' => $request->input('payment_period_start_day1_9'),
                'payment_period_basic_days1_9' => $request->input('payment_period_basic_days1_9'),
                'wage_amount_a1_9' => $request->input('wage_amount_a1_9'),
                'wage_amount_b1_9' => $request->input('wage_amount_b1_9'),
                'note1_10' => $request->input('note1_10'),
                'applicable_period_start_month1_10' => $request->input('applicable_period_start_month1_10'),
                'applicable_period_start_day1_10' => $request->input('applicable_period_start_day1_10'),
                'basic_days1_10' => $request->input('basic_days1_10'),
                'payment_period_start_month1_10' => $request->input('payment_period_start_month1_10'),
                'payment_period_start_day1_10' => $request->input('payment_period_start_day1_10'),
                'payment_period_basic_days1_10' => $request->input('payment_period_basic_days1_10'),
                'wage_amount_a1_10' => $request->input('wage_amount_a1_10'),
                'wage_amount_b1_10' => $request->input('wage_amount_b1_10'),
                'note1_11' => $request->input('note1_11'),
                'applicable_period_start_month1_11' => $request->input('applicable_period_start_month1_11'),
                'applicable_period_start_day1_11' => $request->input('applicable_period_start_day1_11'),
                'basic_days1_11' => $request->input('basic_days1_11'),
                'payment_period_start_month1_11' => $request->input('payment_period_start_month1_11'),
                'payment_period_start_day1_11' => $request->input('payment_period_start_day1_11'),
                'payment_period_basic_days1_11' => $request->input('payment_period_basic_days1_11'),
                'wage_amount_a1_11' => $request->input('wage_amount_a1_11'),
                'wage_amount_b1_11' => $request->input('wage_amount_b1_11'),
                'note1_12' => $request->input('note1_12'),
                'applicable_period_start_month1_12' => $request->input('applicable_period_start_month1_12'),
                'applicable_period_start_day1_12' => $request->input('applicable_period_start_day1_12'),
                'basic_days1_12' => $request->input('basic_days1_12'),
                'payment_period_start_month1_12' => $request->input('payment_period_start_month1_12'),
                'payment_period_start_day1_12' => $request->input('payment_period_start_day1_12'),
                'payment_period_basic_days1_12' => $request->input('payment_period_basic_days1_12'),
                'wage_amount_a1_12' => $request->input('wage_amount_a1_12'),
                'wage_amount_b1_12' => $request->input('wage_amount_b1_12'),
                'note1_13' => $request->input('note1_13'),
                'applicable_period_start_month1_13' => $request->input('applicable_period_start_month1_13'),
                'applicable_period_start_day1_13' => $request->input('applicable_period_start_day1_13'),
                'basic_days1_13' => $request->input('basic_days1_13'),
                'payment_period_start_month1_13' => $request->input('payment_period_start_month1_13'),
                'payment_period_start_day1_13' => $request->input('payment_period_start_day1_13'),
                'payment_period_basic_days1_13' => $request->input('payment_period_basic_days1_13'),
                'wage_amount_a1_13' => $request->input('wage_amount_a1_13'),
                'wage_amount_b1_13' => $request->input('wage_amount_b1_13'),
                'note1_14' => $request->input('note1_14'),
                'applicable_period_start_month1_14' => $request->input('applicable_period_start_month1_14'),
                'applicable_period_start_day1_14' => $request->input('applicable_period_start_day1_14'),
                'basic_days1_14' => $request->input('basic_days1_14'),
                'payment_period_start_month1_14' => $request->input('payment_period_start_month1_14'),
                'payment_period_start_day1_14' => $request->input('payment_period_start_day1_14'),
                'payment_period_basic_days1_14' => $request->input('payment_period_basic_days1_14'),
                'wage_amount_a1_14' => $request->input('wage_amount_a1_14'),
                'wage_amount_b1_14' => $request->input('wage_amount_b1_14'),
                'note1_15' => $request->input('note1_15'),
                'applicable_period_start_month1_15' => $request->input('applicable_period_start_month1_15'),
                'applicable_period_start_day1_15' => $request->input('applicable_period_start_day1_15'),
                'basic_days1_15' => $request->input('basic_days1_15'),
                'payment_period_start_month1_15' => $request->input('payment_period_start_month1_15'),
                'payment_period_start_day1_15' => $request->input('payment_period_start_day1_15'),
                'payment_period_basic_days1_15' => $request->input('payment_period_basic_days1_15'),
                'wage_amount_a1_15' => $request->input('wage_amount_a1_15'),
                'wage_amount_b1_15' => $request->input('wage_amount_b1_15'),
                'note1_16' => $request->input('note1_16'),
                'employee_salary_notices1' => $request->input('employee_salary_notices1'),
                'employment_period_date_japan_era_year' => $request->input('employment_period_date_japan_era_year'),
                'employment_period_date_month' => $request->input('employment_period_date_month'),
                'employment_period_date_day' => $request->input('employment_period_date_day'),
                'employment_period_japan_era_year' => $request->input('employment_period_japan_era_year'),
                'employment_period_month' => $request->input('employment_period_month'),
                'labor_consultant_japan_era_year' => $request->input('labor_consultant_japan_era_year'),
                'labor_consultant_month' => $request->input('labor_consultant_month'),
                'labor_consultant_day' => $request->input('labor_consultant_day'),
                'labor_consultant_submission_agency_name' => $request->input('labor_consultant_submission_agency_name'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'labor_consultant_tel_area_code' => $request->input('labor_consultant_tel_area_code'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'other_notes' => $request->input('other_notes'),
                // 2枚目
                'applicable_period_start_month2_1' => $request->input('applicable_period_start_month2_1'),
                'applicable_period_start_day2_1' => $request->input('applicable_period_start_day2_1'),
                'applicable_period_end_month2_1' => $request->input('applicable_period_end_month2_1'),
                'applicable_period_end_day2_1' => $request->input('applicable_period_end_day2_1'),
                'basic_days2_1' => $request->input('basic_days2_1'),
                'payment_period_start_month2_1' => $request->input('payment_period_start_month2_1'),
                'payment_period_start_day2_1' => $request->input('payment_period_start_day2_1'),
                'payment_period_end_month2_1' => $request->input('payment_period_end_month2_1'),
                'payment_period_end_day2_1' => $request->input('payment_period_end_day2_1'),
                'payment_period_basic_days2_1' => $request->input('payment_period_basic_days2_1'),
                'wage_amount_a2_1' => $request->input('wage_amount_a2_1'),
                'wage_amount_b2_1' => $request->input('wage_amount_b2_1'),
                'note2_1' => $request->input('note2_1'),
                'applicable_period_start_month2_2' => $request->input('applicable_period_start_month2_2'),
                'applicable_period_start_day2_2' => $request->input('applicable_period_start_day2_2'),
                'applicable_period_end_month2_2' => $request->input('applicable_period_end_month2_2'),
                'applicable_period_end_day2_2' => $request->input('applicable_period_end_day2_2'),
                'basic_days2_2' => $request->input('basic_days2_2'),
                'payment_period_start_month2_2' => $request->input('payment_period_start_month2_2'),
                'payment_period_start_day2_2' => $request->input('payment_period_start_day2_2'),
                'payment_period_end_month2_2' => $request->input('payment_period_end_month2_2'),
                'payment_period_end_day2_2' => $request->input('payment_period_end_day2_2'),
                'payment_period_basic_days2_2' => $request->input('payment_period_basic_days2_2'),
                'wage_amount_a2_2' => $request->input('wage_amount_a2_2'),
                'wage_amount_b2_2' => $request->input('wage_amount_b2_2'),
                'note2_2' => $request->input('note2_2'),
                'applicable_period_start_month2_3' => $request->input('applicable_period_start_month2_3'),
                'applicable_period_start_day2_3' => $request->input('applicable_period_start_day2_3'),
                'applicable_period_end_month2_3' => $request->input('applicable_period_end_month2_3'),
                'applicable_period_end_day2_3' => $request->input('applicable_period_end_day2_3'),
                'basic_days2_3' => $request->input('basic_days2_3'),
                'payment_period_start_month2_3' => $request->input('payment_period_start_month2_3'),
                'payment_period_start_day2_3' => $request->input('payment_period_start_day2_3'),
                'payment_period_end_month2_3' => $request->input('payment_period_end_month2_3'),
                'payment_period_end_day2_3' => $request->input('payment_period_end_day2_3'),
                'payment_period_basic_days2_3' => $request->input('payment_period_basic_days2_3'),
                'wage_amount_a2_3' => $request->input('wage_amount_a2_3'),
                'wage_amount_b2_3' => $request->input('wage_amount_b2_3'),
                'note2_3' => $request->input('note2_3'),
                'applicable_period_start_month2_4' => $request->input('applicable_period_start_month2_4'),
                'applicable_period_start_day2_4' => $request->input('applicable_period_start_day2_4'),
                'applicable_period_end_month2_4' => $request->input('applicable_period_end_month2_4'),
                'applicable_period_end_day2_4' => $request->input('applicable_period_end_day2_4'),
                'basic_days2_4' => $request->input('basic_days2_4'),
                'payment_period_start_month2_4' => $request->input('payment_period_start_month2_4'),
                'payment_period_start_day2_4' => $request->input('payment_period_start_day2_4'),
                'payment_period_end_month2_4' => $request->input('payment_period_end_month2_4'),
                'payment_period_end_day2_4' => $request->input('payment_period_end_day2_4'),
                'payment_period_basic_days2_4' => $request->input('payment_period_basic_days2_4'),
                'wage_amount_a2_4' => $request->input('wage_amount_a2_4'),
                'wage_amount_b2_4' => $request->input('wage_amount_b2_4'),
                'note2_4' => $request->input('note2_4'),
                'applicable_period_start_month2_5' => $request->input('applicable_period_start_month2_5'),
                'applicable_period_start_day2_5' => $request->input('applicable_period_start_day2_5'),
                'applicable_period_end_month2_5' => $request->input('applicable_period_end_month2_5'),
                'applicable_period_end_day2_5' => $request->input('applicable_period_end_day2_5'),
                'basic_days2_5' => $request->input('basic_days2_5'),
                'payment_period_start_month2_5' => $request->input('payment_period_start_month2_5'),
                'payment_period_start_day2_5' => $request->input('payment_period_start_day2_5'),
                'payment_period_end_month2_5' => $request->input('payment_period_end_month2_5'),
                'payment_period_end_day2_5' => $request->input('payment_period_end_day2_5'),
                'payment_period_basic_days2_5' => $request->input('payment_period_basic_days2_5'),
                'wage_amount_a2_5' => $request->input('wage_amount_a2_5'),
                'wage_amount_b2_5' => $request->input('wage_amount_b2_5'),
                'note2_5' => $request->input('note2_5'),
                'applicable_period_start_month2_6' => $request->input('applicable_period_start_month2_6'),
                'applicable_period_start_day2_6' => $request->input('applicable_period_start_day2_6'),
                'applicable_period_end_month2_6' => $request->input('applicable_period_end_month2_6'),
                'applicable_period_end_day2_6' => $request->input('applicable_period_end_day2_6'),
                'basic_days2_6' => $request->input('basic_days2_6'),
                'payment_period_start_month2_6' => $request->input('payment_period_start_month2_6'),
                'payment_period_start_day2_6' => $request->input('payment_period_start_day2_6'),
                'payment_period_end_month2_6' => $request->input('payment_period_end_month2_6'),
                'payment_period_end_day2_6' => $request->input('payment_period_end_day2_6'),
                'payment_period_basic_days2_6' => $request->input('payment_period_basic_days2_6'),
                'wage_amount_a2_6' => $request->input('wage_amount_a2_6'),
                'wage_amount_b2_6' => $request->input('wage_amount_b2_6'),
                'note2_6' => $request->input('note2_6'),
                'applicable_period_start_month2_7' => $request->input('applicable_period_start_month2_7'),
                'applicable_period_start_day2_7' => $request->input('applicable_period_start_day2_7'),
                'applicable_period_end_month2_7' => $request->input('applicable_period_end_month2_7'),
                'applicable_period_end_day2_7' => $request->input('applicable_period_end_day2_7'),
                'basic_days2_7' => $request->input('basic_days2_7'),
                'payment_period_start_month2_7' => $request->input('payment_period_start_month2_7'),
                'payment_period_start_day2_7' => $request->input('payment_period_start_day2_7'),
                'payment_period_end_month2_7' => $request->input('payment_period_end_month2_7'),
                'payment_period_end_day2_7' => $request->input('payment_period_end_day2_7'),
                'payment_period_basic_days2_7' => $request->input('payment_period_basic_days2_7'),
                'wage_amount_a2_7' => $request->input('wage_amount_a2_7'),
                'wage_amount_b2_7' => $request->input('wage_amount_b2_7'),
                'note2_7' => $request->input('note2_7'),
                'applicable_period_start_month2_8' => $request->input('applicable_period_start_month2_8'),
                'applicable_period_start_day2_8' => $request->input('applicable_period_start_day2_8'),
                'applicable_period_end_month2_8' => $request->input('applicable_period_end_month2_8'),
                'applicable_period_end_day2_8' => $request->input('applicable_period_end_day2_8'),
                'basic_days2_8' => $request->input('basic_days2_8'),
                'payment_period_start_month2_8' => $request->input('payment_period_start_month2_8'),
                'payment_period_start_day2_8' => $request->input('payment_period_start_day2_8'),
                'payment_period_end_month2_8' => $request->input('payment_period_end_month2_8'),
                'payment_period_end_day2_8' => $request->input('payment_period_end_day2_8'),
                'payment_period_basic_days2_8' => $request->input('payment_period_basic_days2_8'),
                'wage_amount_a2_8' => $request->input('wage_amount_a2_8'),
                'wage_amount_b2_8' => $request->input('wage_amount_b2_8'),
                'note2_8' => $request->input('note2_8'),
                'applicable_period_start_month2_9' => $request->input('applicable_period_start_month2_9'),
                'applicable_period_start_day2_9' => $request->input('applicable_period_start_day2_9'),
                'applicable_period_end_month2_9' => $request->input('applicable_period_end_month2_9'),
                'applicable_period_end_day2_9' => $request->input('applicable_period_end_day2_9'),
                'basic_days2_9' => $request->input('basic_days2_9'),
                'payment_period_start_month2_9' => $request->input('payment_period_start_month2_9'),
                'payment_period_start_day2_9' => $request->input('payment_period_start_day2_9'),
                'payment_period_end_month2_9' => $request->input('payment_period_end_month2_9'),
                'payment_period_end_day2_9' => $request->input('payment_period_end_day2_9'),
                'payment_period_basic_days2_9' => $request->input('payment_period_basic_days2_9'),
                'wage_amount_a2_9' => $request->input('wage_amount_a2_9'),
                'wage_amount_b2_9' => $request->input('wage_amount_b2_9'),
                'note2_9' => $request->input('note2_9'),
                'applicable_period_start_month2_10' => $request->input('applicable_period_start_month2_10'),
                'applicable_period_start_day2_10' => $request->input('applicable_period_start_day2_10'),
                'applicable_period_end_month2_10' => $request->input('applicable_period_end_month2_10'),
                'applicable_period_end_day2_10' => $request->input('applicable_period_end_day2_10'),
                'basic_days2_10' => $request->input('basic_days2_10'),
                'payment_period_start_month2_10' => $request->input('payment_period_start_month2_10'),
                'payment_period_start_day2_10' => $request->input('payment_period_start_day2_10'),
                'payment_period_end_month2_10' => $request->input('payment_period_end_month2_10'),
                'payment_period_end_day2_10' => $request->input('payment_period_end_day2_10'),
                'payment_period_basic_days2_10' => $request->input('payment_period_basic_days2_10'),
                'wage_amount_a2_10' => $request->input('wage_amount_a2_10'),
                'wage_amount_b2_10' => $request->input('wage_amount_b2_10'),
                'note2_10' => $request->input('note2_10'),
                'applicable_period_start_month2_11' => $request->input('applicable_period_start_month2_11'),
                'applicable_period_start_day2_11' => $request->input('applicable_period_start_day2_11'),
                'applicable_period_end_month2_11' => $request->input('applicable_period_end_month2_11'),
                'applicable_period_end_day2_11' => $request->input('applicable_period_end_day2_11'),
                'basic_days2_11' => $request->input('basic_days2_11'),
                'payment_period_start_month2_11' => $request->input('payment_period_start_month2_11'),
                'payment_period_start_day2_11' => $request->input('payment_period_start_day2_11'),
                'payment_period_end_month2_11' => $request->input('payment_period_end_month2_11'),
                'payment_period_end_day2_11' => $request->input('payment_period_end_day2_11'),
                'payment_period_basic_days2_11' => $request->input('payment_period_basic_days2_11'),
                'wage_amount_a2_11' => $request->input('wage_amount_a2_11'),
                'wage_amount_b2_11' => $request->input('wage_amount_b2_11'),
                'note2_11' => $request->input('note2_11'),
                'applicable_period_start_month2_12' => $request->input('applicable_period_start_month2_12'),
                'applicable_period_start_day2_12' => $request->input('applicable_period_start_day2_12'),
                'applicable_period_end_month2_12' => $request->input('applicable_period_end_month2_12'),
                'applicable_period_end_day2_12' => $request->input('applicable_period_end_day2_12'),
                'basic_days2_12' => $request->input('basic_days2_12'),
                'payment_period_start_month2_12' => $request->input('payment_period_start_month2_12'),
                'payment_period_start_day2_12' => $request->input('payment_period_start_day2_12'),
                'payment_period_end_month2_12' => $request->input('payment_period_end_month2_12'),
                'payment_period_end_day2_12' => $request->input('payment_period_end_day2_12'),
                'payment_period_basic_days2_12' => $request->input('payment_period_basic_days2_12'),
                'wage_amount_a2_12' => $request->input('wage_amount_a2_12'),
                'wage_amount_b2_12' => $request->input('wage_amount_b2_12'),
                'note2_12' => $request->input('note2_12'),
                'applicable_period_start_month2_13' => $request->input('applicable_period_start_month2_13'),
                'applicable_period_start_day2_13' => $request->input('applicable_period_start_day2_13'),
                'applicable_period_end_month2_13' => $request->input('applicable_period_end_month2_13'),
                'applicable_period_end_day2_13' => $request->input('applicable_period_end_day2_13'),
                'basic_days2_13' => $request->input('basic_days2_13'),
                'payment_period_start_month2_13' => $request->input('payment_period_start_month2_13'),
                'payment_period_start_day2_13' => $request->input('payment_period_start_day2_13'),
                'payment_period_end_month2_13' => $request->input('payment_period_end_month2_13'),
                'payment_period_end_day2_13' => $request->input('payment_period_end_day2_13'),
                'payment_period_basic_days2_13' => $request->input('payment_period_basic_days2_13'),
                'wage_amount_a2_13' => $request->input('wage_amount_a2_13'),
                'wage_amount_b2_13' => $request->input('wage_amount_b2_13'),
                'note2_13' => $request->input('note2_13'),
                'applicable_period_start_month2_14' => $request->input('applicable_period_start_month2_14'),
                'applicable_period_start_day2_14' => $request->input('applicable_period_start_day2_14'),
                'applicable_period_end_month2_14' => $request->input('applicable_period_end_month2_14'),
                'applicable_period_end_day2_14' => $request->input('applicable_period_end_day2_14'),
                'basic_days2_14' => $request->input('basic_days2_14'),
                'payment_period_start_month2_14' => $request->input('payment_period_start_month2_14'),
                'payment_period_start_day2_14' => $request->input('payment_period_start_day2_14'),
                'payment_period_end_month2_14' => $request->input('payment_period_end_month2_14'),
                'payment_period_end_day2_14' => $request->input('payment_period_end_day2_14'),
                'payment_period_basic_days2_14' => $request->input('payment_period_basic_days2_14'),
                'wage_amount_a2_14' => $request->input('wage_amount_a2_14'),
                'wage_amount_b2_14' => $request->input('wage_amount_b2_14'),
                'note2_14' => $request->input('note2_14'),
                'applicable_period_start_month2_15' => $request->input('applicable_period_start_month2_15'),
                'applicable_period_start_day2_15' => $request->input('applicable_period_start_day2_15'),
                'applicable_period_end_month2_15' => $request->input('applicable_period_end_month2_15'),
                'applicable_period_end_day2_15' => $request->input('applicable_period_end_day2_15'),
                'basic_days2_15' => $request->input('basic_days2_15'),
                'payment_period_start_month2_15' => $request->input('payment_period_start_month2_15'),
                'payment_period_start_day2_15' => $request->input('payment_period_start_day2_15'),
                'payment_period_end_month2_15' => $request->input('payment_period_end_month2_15'),
                'payment_period_end_day2_15' => $request->input('payment_period_end_day2_15'),
                'payment_period_basic_days2_15' => $request->input('payment_period_basic_days2_15'),
                'wage_amount_a2_15' => $request->input('wage_amount_a2_15'),
                'wage_amount_b2_15' => $request->input('wage_amount_b2_15'),
                'note2_15' => $request->input('note2_15'),
                'employee_salary_notices2' => $request->input('employee_salary_notices2'),

                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')

            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request, $separater = True);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                \Log::error(print_r($response, true));
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            return redirect()->route('ledger.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
