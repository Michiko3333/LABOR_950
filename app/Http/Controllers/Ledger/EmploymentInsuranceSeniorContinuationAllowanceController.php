<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SeniorEmploymentContinuationBenefitClaimFormRequest;
use App\Models\Branch;
use App\Models\Certificate;
use App\Models\CurrentUser;
use Carbon\Carbon;
use App\EgovAPI\MixXmlEgovSigner;


class EmploymentInsuranceSeniorContinuationAllowanceController extends Controller
{
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
        $currentEmployee = CurrentUser::info();
        $currentBranch = Branch::where('id', $currentEmployee->branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $procedureName = $this->getProcedureName($request);
        $today = [
            'japanEra' => $convertToday['japanese_calendar_era_string'],
            'japanEraYear' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'day' => $convertToday['japanese_calendar_result']->day,
        ];
        return view('ledger.employment_insurance_senior_continuation_allowance', [
            'company' => $company,
            'current_employee' => $currentEmployee,
            'current_branch' => $currentBranch,
            'todaySet' => $today,
            'certificate' => $certificate,
            'procedureName' => $procedureName
        ]);
    }

    public function post(SeniorEmploymentContinuationBenefitClaimFormRequest $request)
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

        $radio_keys = ["radio_file_wage_amount", "radio_file_written_consent", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'labor_consultant_acting_as_agent' => $request->input('labor_consultant_acting_as_agent'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'ledger_type' => $request->input('ledger_type'),
                'employment_insured_no_4digit' => $request->input('employment_insured_no_4digit'),
                'employment_insured_no_6digit' => $request->input('employment_insured_no_6digit'),
                'employment_insured_no_CD' => $request->input('employment_insured_no_CD'),
                'qualifications_japan_era_year' => $request->input('qualifications_japan_era_year'),
                'qualifications_month' => $request->input('qualifications_month'),
                'qualifications_day' => $request->input('qualifications_day'),
                'fullname' => $request->input('fullname'),
                'payer_japan_era_year1' => $request->input('payer_japan_era_year1'),
                'payer_month1' => $request->input('payer_month1'),
                'wages_paid1' => $request->input('wages_paid1'),
                'wage_reduction_days1' => $request->input('wage_reduction_days1'),
                'payer_japan_era_year2' => $request->input('payer_japan_era_year2'),
                'payer_month2' => $request->input('payer_month2'),
                'wages_paid2' => $request->input('wages_paid2'),
                'wage_reduction_days2' => $request->input('wage_reduction_days2'),
                'payer_japan_era_year3' => $request->input('payer_japan_era_year3'),
                'payer_month3' => $request->input('payer_month3'),
                'wages_paid3' => $request->input('wages_paid3'),
                'wage_reduction_days3' => $request->input('wage_reduction_days3'),
                'note' => $request->input('note'),
                'jurisdiction' => $request->input('jurisdiction'),
                'employment_insurance_office_no_4digit' => $request->input('employment_insurance_office_no_4digit'),
                'employment_insurance_office_no_6digit' => $request->input('employment_insurance_office_no_6digit'),
                'employment_insurance_office_no_CD' => $request->input('employment_insurance_office_no_CD'),
                'special_note_on_wages1' => $request->input('special_note_on_wages1'),
                'special_note_on_wages2' => $request->input('special_note_on_wages2'),
                'special_note_on_wages3' => $request->input('special_note_on_wages3'),
                'today_japan_era_year' => $request->input('today_japan_era_year'),
                'today_japan_era_month' => $request->input('today_japan_era_month,_'),
                'today_japan_era_day' => $request->input('today_japan_era_day'),
                'destination' => $request->input('destination'),
                'employer_name' => $request->input('employer_name'),
                'headquarters_address' => $request->input('headquarters_address'),
                'labor_consultant_tel_area_code' => $request->input('labor_consultant_tel_area_code'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'benefits_types' => $request->input('benefits_types'),
                'fullname_kana' => $request->input('fullname_kana'),
                'wage_deadline' => $request->input('wage_deadline'),
                'wage_payment_day' => $request->input('wage_payment_day'),
                'wage_payment' => $request->input('wage_payment'),
                'wage_structure_other' => $request->input('wage_structure_other'),
                'wage_structure' => $request->input('wage_structure'),
                'prescribed_working_days1' => $request->input('prescribed_working_days1'),
                'prescribed_working_days2' => $request->input('prescribed_working_days2'),
                'prescribed_working_days3' => $request->input('prescribed_working_days3'),
                'commuting_allowance' => $request->input('commuting_allowance'),
                'commuting_allowance_period' => $request->input('commuting_allowance_period'),
                'commuting_allowance_period_other' => $request->input('commuting_allowance_period_other'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'payer_japan_era1' => $request->input('payer_japan_era1'),
                'payer_japan_era2' => $request->input('payer_japan_era2'),
                'payer_japan_era3' => $request->input('payer_japan_era3'),
                'today_japan_era' => $request->input('today_japan_era'),
                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
