<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest;
use App\Models\Branch;
use App\Models\CurrentUser;
use App\Models\Prefecture;
use App\Models\Country;
use App\Models\Residential_status;
use App\Models\Values_employee_employment_status;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EgovAPI\MixXmlEgovSigner;

class EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController extends Controller
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
        if($certificate !== null) {
            $certificate = true;
        } else {
            $certificate = false;
        }

        $current_employee = CurrentUser::info();
        $current_branch_id = $current_employee->branch_id;
        $current_branch = Branch::where('id', $current_branch_id)->first();
        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];

        $countries = Country::all();
        $residentials = Residential_status::all();
        $employmentStatuses = Values_employee_employment_status::all();
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view(
            'ledger.employment_insured_status_acquisition_not_issued_separation_form',
            [
                'company' => $company,
                'current_employee' => $current_employee,
                'current_branch' => $current_branch,
                'today' => $today,
                'countries' => $countries,
                'residentials' => $residentials,
                'employmentStatuses' => $employmentStatuses,
                'certificate' => $certificate,
                'egovAcount' => $egovAcount,
                'procedureName' => $procedureName
            ]
        );
    }

    public function post(EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest $request)
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
        $radio_keys = ["radio_file_disqualification_status", "radio_file_other"];
        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'ledger_type' => $request->input('ledger_type'),
                'employment_insured_no_4' => $request->input('employment_insured_no_4'),
                'employment_insured_no_6' => $request->input('employment_insured_no_6'),
                'employment_insured_no_cd' => $request->input('employment_insured_no_cd'),
                'insurance_office_no_4' => $request->input('insurance_office_no_4'),
                'insurance_office_no_6' => $request->input('insurance_office_no_6'),
                'insurance_office_no_cd' => $request->input('insurance_office_no_cd'),
                'employment_insured_japan_era' => $request->input('employment_insured_japan_era'),
                'employment_insured_year' => $request->input('employment_insured_year'),
                'employment_insured_month' => $request->input('employment_insured_month'),
                'employment_insured_day' => $request->input('employment_insured_day'),
                'retirement_japan_era' => $request->input('retirement_japan_era'),
                'retirement_year' => $request->input('retirement_year'),
                'retirement_month' => $request->input('retirement_month'),
                'retirement_day' => $request->input('retirement_day'),
                'insurance_loss_reason' => $request->input('insurance_loss_reason'),
                'resignation_letter_request_flg' => $request->input('resignation_letter_request_flg'),
                'agreed_hours_week_hour' => $request->input('agreed_hours_week_hour'),
                'agreed_hours_week_minute' => $request->input('agreed_hours_week_minute'),
                'replenishment_recruitment_plan_existence' => $request->input('replenishment_recruitment_plan_existence'),
                'changed_fullname' => $request->input('changed_fullname'),
                'changed_fullname_kana' => $request->input('changed_fullname_kana'),
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'insured_fullname' => $request->input('insured_fullname'),
                'insured_sex' => $request->input('insured_sex'),
                'insured_birthday_japan_era' => $request->input('insured_birthday_japan_era'),
                'insured_birthday_year' => $request->input('insured_birthday_year'),
                'insured_birthday_month' => $request->input('insured_birthday_month'),
                'insured_birthday_day' => $request->input('insured_birthday_day'),
                'insured_age_type' => $request->input('insured_age_type'),
                'hello_work_office_no' => $request->input('hello_work_office_no'),
                'employment_status' => $request->input('employment_status'),
                'branch_name_abbreviation' => $request->input('branch_name_abbreviation'),
                'insured_address' => $request->input('insured_address'),
                'insured_loss_reason' => $request->input('insured_loss_reason'),
                'insured_fullname_alphabet' => $request->input('insured_fullname_alphabet'),
                'residence_card_no' => $request->input('residence_card_no'),
                'stay_date_period_year' => $request->input('stay_date_period_year'),
                'stay_date_period_month' => $request->input('stay_date_period_month'),
                'stay_date_period_day' => $request->input('stay_date_period_day'),
                'employment_type' => $request->input('employment_type'),
                'country_id' => $request->input('country_id'),
                'residential_status_id' => $request->input('residential_status_id'),
                'residential_status_unknown_reason' => $request->input('residential_status_unknown_reason'),
                'notification_date_japan_era' => $request->input('notification_date_japan_era'),
                'notification_date_year' => $request->input('notification_date_year'),
                'notification_date_month' => $request->input('notification_date_month'),
                'notification_date_day' => $request->input('notification_date_day'),
                'branch_address' => $request->input('branch_address'),
                'entrepreneur_name' => $request->input('entrepreneur_name'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'hello_work_destination' => $request->input('hello_work_destination'),
                'labor_consultant_japan_era' => $request->input('labor_consultant_japan_era'),
                'labor_consultant_japan_era_year' => $request->input('labor_consultant_japan_era_year'),
                'labor_consultant_month' => $request->input('labor_consultant_month'),
                'labor_consultant_day' => $request->input('labor_consultant_day'),
                'labor_consultant_display' => $request->input('labor_consultant_display'),
                'labor_consultant_fullname' => $request->input('labor_consultant_fullname'),
                'labor_consultant_tel_area_code' => $request->input('labor_consultant_tel_area_code'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'labor_consultant_note' => $request->input('labor_consultant_note'),
                'note' => $request->input('note'),
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
