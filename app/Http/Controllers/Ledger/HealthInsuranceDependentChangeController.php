<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use App\Http\Requests\HealthInsuranceDependentChangeWithCertificateRequest;
use Illuminate\Http\Request;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\EgovAPI\MixXmlEgovSigner;
use App\Models\Branch;
use App\Permission;

class HealthInsuranceDependentChangeController extends Controller
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
        $imagePath1 = public_path('img/health_insurance_dependent_change.jpg');
        $imageData1 = File::get($imagePath1);
        $base64Data1 = base64_encode($imageData1);
        $dataUri1 = 'data:image/png;base64,' . $base64Data1;
        $imagePath2 = public_path('img/employer_certificate_etc.jpg');
        $imageData2 = File::get($imagePath2);
        $base64Data2 = base64_encode($imageData2);
        $dataUri2 = 'data:image/png;base64,' . $base64Data2;
        $imagePath3 = public_path('img/medical_insurer_certificate.jpg');
        $imageData3 = File::get($imagePath3);
        $base64Data3 = base64_encode($imageData3);
        $dataUri3 = 'data:image/png;base64,' . $base64Data3;
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
        $convertYesterday = $this->convertWesternCalendarToJapaneseCalendar(Carbon::yesterday());
        $yesterday = [
            'era' => $convertYesterday['japanese_calendar_era_string'],
            'year' => $convertYesterday['japanese_calendar_result']->year,
            'month' => $convertYesterday['japanese_calendar_result']->month,
            'date' => $convertYesterday['japanese_calendar_result']->day,
        ];
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.health_insurance_dependent_change', [
            'company' => $company,
            'dataUri1' => $dataUri1,
            'dataUri2' => $dataUri2,
            'dataUri3' => $dataUri3,
            'today' => $today,
            'yesterday' => $yesterday,
            'certificate' => $certificate,
            'egovAcount' => $egovAcount,
            'procedureName' => $procedureName,
            'current_employee' => $current_employee,
            'current_branch' => $current_branch,
        ]);
    }

    public function post(HealthInsuranceDependentChangeWithCertificateRequest $request)
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

        $radio_keys = ["radio_file_insurance", "radio_file_dependent", "radio_file_tax_exempt", "radio_file_currently_enrolled", "radio_file_basic_pension", "radio_file_livelihood_maintenance", "radio_file_business_owner", "radio_file_medical_insurer", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                'submission_year' => $request->input('submission_year'),
                'submission_month' => $request->input('submission_month'),
                'submission_day' => $request->input('submission_day'),
                'pension_office_reference_prefecture' => $request->input('pension_office_reference_prefecture'),
                'pension_office_reference_no_cities' => $request->input('pension_office_reference_no_cities'),
                'pension_office_reference_no_office' => $request->input('pension_office_reference_no_office'),
                'branch_post_code_former' => $request->input('branch_post_code_former'),
                'branch_post_code_latter' => $request->input('branch_post_code_latter'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'branch_name' => $request->input('branch_name'),
                'branch_tel_area_code' => $request->input('branch_tel_area_code'),
                'branch_tel_city_code' => $request->input('branch_tel_city_code'),
                'branch_tel_subscriber_code' => $request->input('branch_tel_subscriber_code'),
                'labor_consultant_name' => $request->input('labor_consultant_name'),
                'accepted_year' => $request->input('accepted_year'),
                'accepted_month' => $request->input('accepted_month'),
                'accepted_day' => $request->input('accepted_day'),
                'application_category' => $request->input('application_category'),
                'insured_reference_number' => $request->input('insured_reference_number'),
                'name' => $request->input('name'),
                'name_kana' => $request->input('name_kana'),
                'sex' => $request->input('sex'),
                'birthday_era' => $request->input('birthday_era'),
                'birthday_year' => $request->input('birthday_year'),
                'birthday_month' => $request->input('birthday_month'),
                'birthday_day' => $request->input('birthday_day'),
                'mynumber_card_no' => $request->input('mynumber_card_no'),
                'acquisition_era' => $request->input('acquisition_era'),
                'acquisition_year' => $request->input('acquisition_year'),
                'acquisition_month' => $request->input('acquisition_month'),
                'acquisition_day' => $request->input('acquisition_day'),
                'annual_income' => $request->input('annual_income'),
                'employee_post_code_former' => $request->input('employee_post_code_former'),
                'employee_post_code_latter' => $request->input('employee_post_code_latter'),
                'employee_address' => $request->input('employee_address'),
                'notification_year' => $request->input('notification_year'),
                'notification_month' => $request->input('notification_month'),
                'notification_day' => $request->input('notification_day'),
                'spouse_name' => $request->input('spouse_name'),
                'spouse_name_kana' => $request->input('spouse_name_kana'),
                'spouse_sex' => $request->input('spouse_sex'),
                'spouse_birthday_era' => $request->input('spouse_birthday_era'),
                'spouse_birthday_year' => $request->input('spouse_birthday_year'),
                'spouse_birthday_month' => $request->input('spouse_birthday_month'),
                'spouse_birthday_day' => $request->input('spouse_birthday_day'),
                'spouse_mynumber_card_no' => $request->input('spouse_mynumber_card_no'),
                'spouse_country' => $request->input('spouse_country'),
                'spouse_alias_name' => $request->input('spouse_alias_name'),
                'spouse_alias_name_kana' => $request->input('spouse_alias_name_kana'),
                'spouse_living_type' => $request->input('spouse_living_type'),
                'spouse_post_code_former' => $request->input('spouse_post_code_former'),
                'spouse_post_code_latter' => $request->input('spouse_post_code_latter'),
                'spouse_address' => $request->input('spouse_address'),
                'spouse_tel_type' => $request->input('spouse_tel_type'),
                'spouse_tel_area_code' => $request->input('spouse_tel_area_code'),
                'spouse_tel_city_code' => $request->input('spouse_tel_city_code'),
                'spouse_tel_subscriber_code' => $request->input('spouse_tel_subscriber_code'),
                'confirmation_notification_0' => $request->input('confirmation_notification_0'),
                'spouse_become_date_era' => $request->input('spouse_become_date_era'),
                'spouse_become_date_year' => $request->input('spouse_become_date_year'),
                'spouse_become_date_month' => $request->input('spouse_become_date_month'),
                'spouse_become_date_day' => $request->input('spouse_become_date_day'),
                'spouse_remove_date_era' => $request->input('spouse_remove_date_era'),
                'spouse_remove_date_year' => $request->input('spouse_remove_date_year'),
                'spouse_remove_date_month' => $request->input('spouse_remove_date_month'),
                'spouse_remove_date_day' => $request->input('spouse_remove_date_day'),
                'spouse_reason_type' => $request->input('spouse_reason_type'),
                'spouse_passed_away_date_year' => $request->input('spouse_passed_away_date_year'),
                'spouse_passed_away_date_month' => $request->input('spouse_passed_away_date_month'),
                'spouse_passed_away_date_day' => $request->input('spouse_passed_away_date_day'),
                'spouse_reason' => $request->input('spouse_reason'),
                'spouse_occupation_type' => $request->input('spouse_occupation_type'),
                'spouse_occupation' => $request->input('spouse_occupation'),
                'dependent_annual_income' => $request->input('dependent_annual_income'),
                'spouse_special_requirements_applicable_flg' => $request->input('spouse_special_requirements_applicable_flg'),
                'spouse_special_requirements_applicable_date__era' => $request->input('spouse_special_requirements_applicable_date__era'),
                'spouse_special_requirements_applicable_date__year' => $request->input('spouse_special_requirements_applicable_date__year'),
                'spouse_special_requirements_applicable_date__month' => $request->input('spouse_special_requirements_applicable_date__month'),
                'spouse_special_requirements_applicable_date__day' => $request->input('spouse_special_requirements_applicable_date__day'),
                'spouse_special_requirements_applicable_reason_type' => $request->input('spouse_special_requirements_applicable_reason_type'),
                'spouse_special_requirements_applicable_reason' => $request->input('spouse_special_requirements_applicable_reason'),
                'spouse_special_requirements_non_applicable_date_era' => $request->input('spouse_special_requirements_non_applicable_date_era'),
                'spouse_special_requirements_non_applicable_date_year' => $request->input('spouse_special_requirements_non_applicable_date_year'),
                'spouse_special_requirements_non_applicable_date_month' => $request->input('spouse_special_requirements_non_applicable_date_month'),
                'spouse_special_requirements_non_applicable_date_day' => $request->input('spouse_special_requirements_non_applicable_date_day'),
                'spouse_special_requirements_non_applicable_reason_type' => $request->input('spouse_special_requirements_non_applicable_reason_type'),
                'spouse_special_requirements_non_applicable_reason' => $request->input('spouse_special_requirements_non_applicable_reason'),
                'spouse_domestic_transfer_date_year' => $request->input('spouse_domestic_transfer_date_year'),
                'spouse_domestic_transfer_date_month' => $request->input('spouse_domestic_transfer_date_month'),
                'spouse_domestic_transfer_date_day' => $request->input('spouse_domestic_transfer_date_day'),
                'spouse_remarks' => $request->input('spouse_remarks'),
                'spouse_confirmation_relationship_0' => $request->input('spouse_confirmation_relationship_0'),
                'spouse_annual_income' => $request->input('spouse_annual_income'),
                'other_dependent1_name' => $request->input('other_dependent1_name'),
                'other_dependent1_name_kana' => $request->input('other_dependent1_name_kana'),
                'other_dependent1_sex' => $request->input('other_dependent1_sex'),
                'other_dependent1_relationship' => $request->input('other_dependent1_relationship'),
                'other_dependent1_birthday_era' => $request->input('other_dependent1_birthday_era'),
                'other_dependent1_birthday_year' => $request->input('other_dependent1_birthday_year'),
                'other_dependent1_birthday_month' => $request->input('other_dependent1_birthday_month'),
                'other_dependent1_birthday_day' => $request->input('other_dependent1_birthday_day'),
                'other_dependent1_mynumber_card_no' => $request->input('other_dependent1_mynumber_card_no'),
                'other_dependent1_living_type' => $request->input('other_dependent1_living_type'),
                'other_dependent1_post_code_former' => $request->input('other_dependent1_post_code_former'),
                'other_dependent1_post_code_latter' => $request->input('other_dependent1_post_code_latter'),
                'other_dependent1_address' => $request->input('other_dependent1_address'),
                'other_dependent1_become_date_era' => $request->input('other_dependent1_become_date_era'),
                'other_dependent1_become_date_year' => $request->input('other_dependent1_become_date_year'),
                'other_dependent1_become_date_month' => $request->input('other_dependent1_become_date_month'),
                'other_dependent1_become_date_day' => $request->input('other_dependent1_become_date_day'),
                'other_dependent1_remove_date_era' => $request->input('other_dependent1_remove_date_era'),
                'other_dependent1_remove_date_year' => $request->input('other_dependent1_remove_date_year'),
                'other_dependent1_remove_date_month' => $request->input('other_dependent1_remove_date_month'),
                'other_dependent1_remove_date_day' => $request->input('other_dependent1_remove_date_day'),
                'other_dependent1_reason_type' => $request->input('other_dependent1_reason_type'),
                'other_dependent1_reason' => $request->input('other_dependent1_reason'),
                'other_dependent1_occupation_type' => $request->input('other_dependent1_occupation_type'),
                'other_dependent1_occupation' => $request->input('other_dependent1_occupation'),
                'other_dependent1_occupation_type_grade' => $request->input('other_dependent1_occupation_type_grade'),
                'other_dependent1_annual_income' => $request->input('other_dependent1_annual_income'),
                'other_dependent1_special_requirements_applicable_flg' => $request->input('other_dependent1_special_requirements_applicable_flg'),
                'other_dependent1_special_requirements_applicable_reason_type' => $request->input('other_dependent1_special_requirements_applicable_reason_type'),
                'other_dependent1_special_requirements_applicable_reason' => $request->input('other_dependent1_special_requirements_applicable_reason'),
                'other_dependent1_special_requirements_non_applicable_reason_type' => $request->input('other_dependent1_special_requirements_non_applicable_reason_type'),
                'other_dependent1_special_requirements_non_applicable_reason' => $request->input('other_dependent1_special_requirements_non_applicable_reason'),
                'other_dependent1_domestic_transfer_date_year' => $request->input('other_dependent1_domestic_transfer_date_year'),
                'other_dependent1_domestic_transfer_date_month' => $request->input('other_dependent1_domestic_transfer_date_month'),
                'other_dependent1_domestic_transfer_date_day' => $request->input('other_dependent1_domestic_transfer_date_day'),
                'other_dependent1_remarks' => $request->input('other_dependent1_remarks'),
                'other_dependent1_confirmation_relationship_0' => $request->input('other_dependent1_confirmation_relationship_0'),
                'other_dependent2_name' => $request->input('other_dependent2_name'),
                'other_dependent2_name_kana' => $request->input('other_dependent2_name_kana'),
                'other_dependent2_sex' => $request->input('other_dependent2_sex'),
                'other_dependent2_relationship' => $request->input('other_dependent2_relationship'),
                'other_dependent2_birthday_era' => $request->input('other_dependent2_birthday_era'),
                'other_dependent2_birthday_year' => $request->input('other_dependent2_birthday_year'),
                'other_dependent2_birthday_month' => $request->input('other_dependent2_birthday_month'),
                'other_dependent2_birthday_day' => $request->input('other_dependent2_birthday_day'),
                'other_dependent2_mynumber_card_no' => $request->input('other_dependent2_mynumber_card_no'),
                'other_dependent2_living_type' => $request->input('other_dependent2_living_type'),
                'other_dependent2_post_code_former' => $request->input('other_dependent2_post_code_former'),
                'other_dependent2_post_code_latter' => $request->input('other_dependent2_post_code_latter'),
                'other_dependent2_address' => $request->input('other_dependent2_address'),
                'other_dependent2_become_date_era' => $request->input('other_dependent2_become_date_era'),
                'other_dependent2_become_date_year' => $request->input('other_dependent2_become_date_year'),
                'other_dependent2_become_date_month' => $request->input('other_dependent2_become_date_month'),
                'other_dependent2_become_date_day' => $request->input('other_dependent2_become_date_day'),
                'other_dependent2_remove_date_era' => $request->input('other_dependent2_remove_date_era'),
                'other_dependent2_remove_date_year' => $request->input('other_dependent2_remove_date_year'),
                'other_dependent2_remove_date_month' => $request->input('other_dependent2_remove_date_month'),
                'other_dependent2_remove_date_day' => $request->input('other_dependent2_remove_date_day'),
                'other_dependent2_reason_type' => $request->input('other_dependent2_reason_type'),
                'other_dependent2_reason' => $request->input('other_dependent2_reason'),
                'other_dependent2_occupation_type' => $request->input('other_dependent2_occupation_type'),
                'other_dependent2_occupation' => $request->input('other_dependent2_occupation'),
                'other_dependent2_occupation_type_grade' => $request->input('other_dependent2_occupation_type_grade'),
                'other_dependent2_annual_income' => $request->input('other_dependent2_annual_income'),
                'other_dependent2_special_requirements_applicable_flg' => $request->input('other_dependent2_special_requirements_applicable_flg'),
                'other_dependent2_special_requirements_applicable_reason_type' => $request->input('other_dependent2_special_requirements_applicable_reason_type'),
                'other_dependent2_special_requirements_applicable_reason' => $request->input('other_dependent2_special_requirements_applicable_reason'),
                'other_dependent2_special_requirements_non_applicable_reason_type' => $request->input('other_dependent2_special_requirements_non_applicable_reason_type'),
                'other_dependent2_special_requirements_non_applicable_reason' => $request->input('other_dependent2_special_requirements_non_applicable_reason'),
                'other_dependent2_domestic_transfer_date_year' => $request->input('other_dependent2_domestic_transfer_date_year'),
                'other_dependent2_domestic_transfer_date_month' => $request->input('other_dependent2_domestic_transfer_date_month'),
                'other_dependent2_domestic_transfer_date_day' => $request->input('other_dependent2_domestic_transfer_date_day'),
                'other_dependent2_remarks' => $request->input('other_dependent2_remarks'),
                'headquarters_post_code_former' => $request->input('headquarters_post_code_former'),
                'headquarters_post_code_latter' => $request->input('headquarters_post_code_latter'),
                'headquarters_address' => $request->input('headquarters_address'),
                'headquarters_representative' => $request->input('headquarters_representative'),
                'headquarters_tel_area_code' => $request->input('headquarters_tel_area_code'),
                'headquarters_tel_city_code' => $request->input('headquarters_tel_city_code'),
                'headquarters_tel_subscriber_code' => $request->input('headquarters_tel_subscriber_code'),
                'certification_year' => $request->input('certification_year'),
                'certification_month' => $request->input('certification_month'),
                'certification_day' => $request->input('certification_day'),
                'medical_insurer_post_code_former' => $request->input('medical_insurer_post_code_former'),
                'medical_insurer_post_code_latter' => $request->input('medical_insurer_post_code_latter'),
                'medical_insurer_address' => $request->input('medical_insurer_address'),
                'medical_insurer_representative' => $request->input('medical_insurer_representative'),
                'medical_insurer_tel_area_code' => $request->input('medical_insurer_tel_area_code'),
                'medical_insurer_tel_city_code' => $request->input('medical_insurer_tel_city_code'),
                'medical_insurer_tel_subscriber_code' => $request->input('medical_insurer_tel_subscriber_code'),
                'certificate_checkbox_1' => $request->input('certificate_checkbox_1'),
                'certificate_checkbox_2' => $request->input('certificate_checkbox_2'),
                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')
            ];
            $eraMapping = [
                '' => '',
                '5' => '昭和',
                '7' => '平成',
                '9' => '令和',
            ];
            $spouse_birthday_era_kanji = $request->input('spouse_birthday_era');
            $request['spouse_birthday_era_kanji'] = $eraMapping[$spouse_birthday_era_kanji];
            $birthday_era_kanji = $request->input('birthday_era');
            $request['birthday_era_kanji'] = $eraMapping[$birthday_era_kanji];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request);
            if ($response[0] == false) {
                $errorMessage = $response[1];
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $this->putSuccess("送信に成功しました");
            return redirect()->route('ledger.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
