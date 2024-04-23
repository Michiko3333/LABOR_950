<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\NotificationOfObtainingInsuredQualificationRequest;


use Illuminate\Support\Facades\File;

use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;

class HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController extends Controller
{
    public function index(Request $request)
    {
        $imagePath = public_path('img/tyohyo155.png');
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

        return view('ledger.health_insurance_welfare_pension_insurance_eligibility_acquisition_notification', compact('company', 'todaySet', 'dataUri', 'certificate'));
    }

    public function post(NotificationOfObtainingInsuredQualificationRequest $request)
    {
        $attachment = [];

        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'radio_') === 0) {
                $file_key = substr($key, strlen('radio_'));
                $label_key = 'label_' . $file_key;

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

        $radio_keys = ["radio_file_retirement_date", "radio_file_employment_agreement", "radio_file_continued_rehiring", "radio_file_loss_report", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }    

        try {
            $data = [
                'health_insurance' => $request->input('health_insurance'),
                'welfare_pension_insurance' => $request->input('welfare_pension_insurance'),
                'input_date_japan_era_year' => $request->input('input_date_japan_era_year'),
                'input_date_month' => $request->input('input_date_month'),
                'input_date_day' => $request->input('input_date_day'),
                'employee_pension_office_reference_prefecture' => $request->input('employee_pension_office_reference_prefecture'),
                'employee_pension_office_reference_no_cities' => $request->input('employee_pension_office_reference_no_cities'),
                'employee_pension_office_reference_no_office' => $request->input('employee_pension_office_reference_no_office'),
                'branch_insurance_office_no' => $request->input('branch_insurance_office_no'),
                'branch_post_code_first' => $request->input('branch_post_code_first'),
                'branch_post_code_last' => $request->input('branch_post_code_last'),
                'branch_address' => $request->input('branch_address'),
                'branch_name' => $request->input('branch_name'),
                'company_representative' => $request->input('company_representative'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'labor_consultant_acting_as_agent' => $request->input('labor_consultant_acting_as_agent'),
                'employee_name_kana' => $request->input('employee_name_kana'),
                'employee_name' => $request->input('employee_name'),
                'employee_birthday_japan_era' => $request->input('employee_birthday_japan_era'),
                'employee_birthday_japan_era_year' => $request->input('employee_birthday_japan_era_year'),
                'employee_birthday_month' => $request->input('employee_birthday_month'),
                'employee_birthday_day' => $request->input('employee_birthday_day'),
                'insured_person_type' => $request->input('insured_person_type'),
                'employee_insured_type' => $request->input('employee_insured_type'),
                'employee_mynumber_card_no' => $request->input('employee_mynumber_card_no'),
                'employee_employment_insured_date_japan_era' => $request->input('employee_employment_insured_date_japan_era'),
                'employee_employment_insured_date_japan_era_year' => $request->input('employee_employment_insured_date_japan_era_year'),
                'employee_employment_insured_date_month' => $request->input('employee_employment_insured_date_month'),
                'employee_employment_insured_date_day' => $request->input('employee_employment_insured_date_day'),
                'employee_dependent_flg' => $request->input('employee_dependent_flg'),
                'monthly_remuneration_all' => $request->input('monthly_remuneration_all'),
                'monthly_remuneration_part' => $request->input('monthly_remuneration_part'),
                'monthly_remuneration_total' => $request->input('monthly_remuneration_total'),
                "note_over_70_years_old" => $request->input('note_over_70_years_old'),
                "note_multiple_office_workers" => $request->input('note_multiple_office_workers'),
                "note_short_time_work" => $request->input('note_short_time_work'),
                "note_continued_reemployment_after_retirement" => $request->input('note_continued_reemployment_after_retirement'),
                "note_others" => $request->input('note_others'),
                'note_others_in' => $request->input('note_others_in'),
                'employee_post_code_first' => $request->input('employee_post_code_first'),
                'employee_post_code_last' => $request->input('employee_post_code_last'),
                'employee_address' => $request->input('employee_address'),
                'acquisition_reason' => $request->input('acquisition_reason'),
                'other_acquisition_reason' => $request->input('other_acquisition_reason'),
            ];
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
