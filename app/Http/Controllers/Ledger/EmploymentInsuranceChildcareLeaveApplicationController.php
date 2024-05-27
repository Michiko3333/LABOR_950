<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\EmploymentInsuranceChildcareLeaveApplicationRequest;
use App\EgovAPI\MixXmlEgovSigner;
use App\Models\CurrentUser;
use App\Models\Certificate;

use function Laravel\Prompts\text;

class EmploymentInsuranceChildcareLeaveApplicationController extends Controller
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
        $current_employee = CurrentUser::info();

        $japanEra = '令和';
        $year = date("Y");
        $japanEraYear = $year - 2018;
        $month = ltrim(date("m"), '0');
        $day = ltrim(date("d"), '0');
        $todaySet = array(
            "japanEra" => $japanEra,
            "japanEraYear" => $japanEraYear,
            "year" => $year,
            "month" => $month,
            "day" => $day
        );
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.employment_insurance_childcare_leave_application', ['company' => $company, 'todaySet' => $todaySet, 'certificate' => $certificate, 'procedureName' => $procedureName, 'current_employee' => $current_employee,  'egovAcount' => $egovAcount]);
    }

    public function post(EmploymentInsuranceChildcareLeaveApplicationRequest $request)
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

        $radio_keys = ["radio_file_amount_days_time", "radio_file_written_consent", "radio_file_extension_reason", "radio_file_spouse", "radio_file_spouse_childcare_leave", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'note' => $request->input('note'),
                'labor_consultant_acting_as_agent_name' => $request->input('labor_consultant_acting_as_agent_name'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'ledger_type' => $request->input('ledger_type'),
                'fullname_kana_number_symbol' => $request->input('fullname_kana_number_symbol'),
                'childcare_start_date_japan_era' => $request->input('childcare_start_date_japan_era'),
                'childcare_start_date_japan_era_year' => $request->input('childcare_start_date_japan_era_year'),
                'childcare_start_date_month' => $request->input('childcare_start_date_month'),
                'childcare_start_date_day' => $request->input('childcare_start_date_day'),
                'employment_insurance_office_no_4digit' => $request->input('employment_insurance_office_no_4digit'),
                'employment_insurance_office_no_6digit' => $request->input('employment_insurance_office_no_6digit'),
                'employment_insurance_office_no_CD' => $request->input('employment_insurance_office_no_CD'),
                'jurisdiction' => $request->input('jurisdiction'),
                'payer_japan_era1' => $request->input('payer_japan_era1'),
                'payer_japan_era_year1' => $request->input('payer_japan_era_year1'),
                'payer_month1' => $request->input('payer_month1'),
                'payer_day1' => $request->input('payer_day1'),
                'payer_end_month1' => $request->input('payer_end_month1'),
                'payer_end_day1' => $request->input('payer_end_day1'),
                'workday_count1' => $request->input('workday_count1'),
                'working_hours1' => $request->input('working_hours1'),
                'payer_japan_era2' => $request->input('payer_japan_era2'),
                'payer_japan_era_year2' => $request->input('payer_japan_era_year2'),
                'payer_month2' => $request->input('payer_month2'),
                'payer_day2' => $request->input('payer_day2'),
                'payer_end_month2' => $request->input('payer_end_month2'),
                'payer_end_day2' => $request->input('payer_end_day2'),
                'return_from_resignation_japan_era' => $request->input('return_from_resignation_japan_era'),
                'return_from_resignation_japan_era_year' => $request->input('return_from_resignation_japan_era_year'),
                'return_from_resignation_month' => $request->input('return_from_resignation_month'),
                'return_from_resignation_day' => $request->input('return_from_resignation_day'),
                'workday_count2' => $request->input('workday_count2'),
                'working_hours2' => $request->input('working_hours2'),
                'wages_paid2' => $request->input('wages_paid2'),
                'wages_paid1' => $request->input('wages_paid1'),
                'today_japan_era' => $request->input('today_japan_era'),
                'today_japan_era_year' => $request->input('today_japan_era_year'),
                'today_japan_month' => $request->input('today_japan_month'),
                'today_japan_day' => $request->input('today_japan_day'),
                'headquarters_address' => $request->input('headquarters_address'),
                'employer_company_managerial_position_name' => $request->input('employer_company_managerial_position_name'),
                'destination' => $request->input('destination'),
                'fullname' => $request->input('fullname'),
                'labor_consultant_tel_treacode' => $request->input('labor_consultant_tel_treacode'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'special_note_on_wages1' => $request->input('special_note_on_wages1'),
                'special_note_on_wages2' => $request->input('special_note_on_wages2'),
                'employment_insured_no_4digit' => $request->input('employment_insured_no_4digit'),
                'employment_insured_no_6digit' => $request->input('employment_insured_no_6digit'),
                'employment_insured_no_CD' => $request->input('employment_insured_no_CD'),
                'qualifications_japan_era_year' => $request->input('qualifications_japan_era_year'),
                'qualifications_month' => $request->input('qualifications_month'),
                'qualifications_day' => $request->input('qualifications_day'),
                'payment_period_extension_japan_era' => $request->input('payment_period_extension_japan_era'),
                'payment_period_extension_japan_era_year' => $request->input('payment_period_extension_japan_era_year'),
                'payment_period_extension_month' => $request->input('payment_period_extension_month'),
                'payment_period_extension_day' => $request->input('payment_period_extension_day'),
                'payment_period_extension_end_month' => $request->input('payment_period_extension_end_month'),
                'payment_period_extension_end_day' => $request->input('payment_period_extension_end_day'),
                'payment_period_extension_reason' => $request->input('payment_period_extension_reason'),
                'birth_date_japan_era' => $request->input('birth_date_japan_era'),
                'birth_date_japan_era_year' => $request->input('birth_date_japan_era_year'),
                'birth_date_month' => $request->input('birth_date_month'),
                'birth_date_day' => $request->input('birth_date_day'),
                'wage_deadline' => $request->input('wage_deadline'),
                'wage_payment_day' => $request->input('wage_payment_day'),
                'wage_payment' => $request->input('wage_payment'),
                'commuting_allowance_period' => $request->input('commuting_allowance_period'),
                'commuting_allowance_period_other' => $request->input('commuting_allowance_period_other'),
                'unsettled_japan_era' => $request->input('unsettled_japan_era'),
                'unsettled_japan_era_year' => $request->input('unsettled_japan_era_year'),
                'unsettled_month' => $request->input('unsettled_month'),
                'unsettled_day' => $request->input('unsettled_day'),
                'headquarters_tel_treacode' => $request->input('headquarters_tel_treacode'),
                'headquarters_tel_city_code' => $request->input('headquarters_tel_city_code'),
                'headquarters_tel_subscriber_code' => $request->input('headquarters_tel_subscriber_code'),
                'qualifications_japan_era' => $request->input('qualifications_japan_era'),
                'fullname_kana' => $request->input('fullname_kana'),
                'last_payer_japan_era' => $request->input('last_payer_japan_era'),
                'last_payer_japan_era_year' => $request->input('last_payer_japan_era_year'),
                'last_payer_month' => $request->input('last_payer_month'),
                'last_payer_japan_day' => $request->input('last_payer_japan_day'),
                'last_payer_end_month' => $request->input('last_payer_end_month'),
                'last_payer_end_day' => $request->input('last_payer_end_day'),
                'workday_count3' => $request->input('workday_count3'),
                'working_hours3' => $request->input('working_hours3'),
                'wages_paid3' => $request->input('wages_paid3'),
                'partner_insured_no_4digit' => $request->input('partner_insured_no_4digit'),
                'partner_insured_no_6digit' => $request->input('partner_insured_no_6digit'),
                'partner_insured_no_CD' => $request->input('partner_insured_no_CD'),
                'partner_childcare_leave_taken' => $request->input('partner_childcare_leave_taken'),
                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request, $separater = True);
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
