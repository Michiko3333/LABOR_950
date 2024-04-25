<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmploymentInsuredTransferNotificationRequest;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;
use App\EgovAPI\MixXmlEgovSigner;

class EmploymentInsuredTransferNotificationController extends Controller
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

        $convertToday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::today());
        $today = [
            'era' => $convertToday['japanese_calendar_era_string'],
            'year' => $convertToday['japanese_calendar_result']->year,
            'month' => $convertToday['japanese_calendar_result']->month,
            'date' => $convertToday['japanese_calendar_result']->day,
        ];
        $procedureName = $this->getProcedureName($request);

        return view('ledger.employment_insured_transfer_notification', ['company' => $company, 'today' => $today, 'certificate' => $certificate, 'procedureName' => $procedureName, 'current_employee' => $current_employee]);
    }

    public function post(EmploymentInsuredTransferNotificationRequest $request)
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

        $radio_keys = ["radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'employment_insured_no_4' => $request->input('employment_insured_no_4'),
                'employment_insured_no_6' => $request->input('employment_insured_no_6'),
                'employment_insured_no_CD' => $request->input('employment_insured_no_CD'),
                'birthday_era' => $request->input('birthday_era'),
                'birthday_year' => $request->input('birthday_year'),
                'birthday_month' => $request->input('birthday_month'),
                'birthday_day' => $request->input('birthday_day'),
                'name_kanji' => $request->input('name_kanji'),
                'name_kana' => $request->input('name_kana'),
                'name_alphabet' => $request->input('name_alphabet'),
                'employment_insured_date_era' => $request->input('employment_insured_date_era'),
                'employment_insured_date_year' => $request->input('employment_insured_date_year'),
                'employment_insured_date_month' => $request->input('employment_insured_date_month'),
                'employment_insured_date_date' => $request->input('employment_insured_date_date'),
                'employment_insurance_office_no_4' => $request->input('employment_insurance_office_no_4'),
                'employment_insurance_office_no_6' => $request->input('employment_insurance_office_no_6'),
                'employment_insurance_office_no_CD' => $request->input('employment_insurance_office_no_CD'),
                'previous_employment_insurance_office_no_4' => $request->input('previous_employment_insurance_office_no_4'),
                'previous_employment_insurance_office_no_6' => $request->input('previous_employment_insurance_office_no_6'),
                'previous_employment_insurance_office_no_CD' => $request->input('previous_employment_insurance_office_no_CD'),
                'transfer_date_era' => $request->input('transfer_date_era'),
                'transfer_date_year' => $request->input('transfer_date_year'),
                'transfer_date_month' => $request->input('transfer_date_month'),
                'transfer_date_date' => $request->input('transfer_date_date'),
                'office_before_transfer' => $request->input('office_before_transfer'),
                'name_before_changed_kanji' => $request->input('name_before_changed_kanji'),
                'name_before_changed_kana' => $request->input('name_before_changed_kana'),
                'name_changed_date_era' => $request->input('name_changed_date_era'),
                'name_changed_date_year' => $request->input('name_changed_date_year'),
                'name_changed_date_month' => $request->input('name_changed_date_month'),
                'name_changed_date_date' => $request->input('name_changed_date_date'),
                'remarks' => $request->input('remarks'),
                'headquarters_address' => $request->input('headquarters_address'),
                'headquarter_name' => $request->input('employer_company_managerial_position_name'),
                'headquarters_tel_area_code' => $request->input('headquarters_tel_area_code'),
                'headquarters_tel_city_code' => $request->input('headquarters_tel_city_code'),
                'headquarters_tel_subscriber_code' => $request->input('headquarters_tel_subscriber_code'),
                'today_era' => $request->input('today_era'),
                'today_year' => $request->input('today_year'),
                'today_month' => $request->input('today_month'),
                'today_date' => $request->input('today_date'),
                'labor_consultant_today_era' => $request->input('labor_consultant_today_era'),
                'labor_consultant_today_year' => $request->input('labor_consultant_today_year'),
                'labor_consultant_today_month' => $request->input('labor_consultant_today_month'),
                'labor_consultant_today_date' => $request->input('labor_consultant_today_date'),
                'agent' => $request->input('agent'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'labor_consultant_tel_area_code' => $request->input('labor_consultant_tel_area_code'),
                'labor_consultant_tel_city_code' => $request->input('labor_consultant_tel_city_code'),
                'labor_consultant_tel_subscriber_code' => $request->input('labor_consultant_tel_subscriber_code'),
                'labor_consultant_note' => $request->input('labor_consultant_note'),
                'hello_work' => $request->input('hello_work'),
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
