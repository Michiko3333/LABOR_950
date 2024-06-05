<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HealthAndPensionInsuredBonusPaymentNotificationRequest;
use App\Models\CurrentUser;
use App\Models\Certificate;
use App\Models\Csv_count;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\EgovAPI\MixXmlEgovSigner;
use App\EgovAPI\CsvFormatter;

class HealthAndPensionInsuredBonusPaymentNotificationController extends Controller
{
    public function index(Request $request)
    {
        $imagePath = public_path('img/4950013520991000.png');
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
        if ($certificate !== null) {
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
        $egovAcount = $this->egovAcount();
        $procedureName = $this->getProcedureName($request);

        return view('ledger.health_and_pension_insured_bonus_payment_notification', ['company' => $company, 'todaySet' => $todaySet, 'dataUri' => $dataUri, 'certificate' => $certificate, 'procedureName' => $procedureName, 'egovAcount' => $egovAcount]);
    }

    public function post(HealthAndPensionInsuredBonusPaymentNotificationRequest $request)
    {
        $attachment = [];

        $company = CurrentUser::currentCompany();
        $companyId = $company->id;
        if(!DB::table('m_csv_count')->where('company_id', $companyId)->exists()) {
            Csv_count::create(['company_id' => $companyId, 'count' => 0]);
        }
        $csv_count = Csv_count::select('count')->where('company_id', $companyId)->first();
        $count = $csv_count->count;
        if($count === 999) {
            $count = 1;
        } else {
            $count++;
        }
        Csv_count::where('company_id', $companyId)->update(['count' => $count]);
        $csvFormatter = new CsvFormatter('4950013520991000', $count);
        $csvFormatter->setKanri($request);
        $csvFormatter->setData($request);
        $csvText = $csvFormatter->getCsvText();
        $csvData = $csvFormatter->setCSVSummaryTable($request);

        $request->merge($csvData);

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

        $radio_keys = ["radio_file_wage_ledger", "radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }

        try {
            $data = [
                "today_year"  => $request->input('today_year'),
                "today_month"  => $request->input('today_month'),
                "today_date"  => $request->input('today_date'),
                "pension_office_reference_prefecture"  => $request->input('pension_office_reference_prefecture'),
                "pension_office_reference_no_cities"  => $request->input('pension_office_reference_no_cities'),
                "pension_office_reference_no_office"  => $request->input('pension_office_reference_no_office'),
                "branch_post_code_parent"  => $request->input('branch_post_code_parent'),
                "branch_post_code_child"  => $request->input('branch_post_code_child'),
                "branch_address"  => $request->input('branch_address'),
                "branch_name"  => $request->input('branch_name'),
                "employer_company_managerial_position_name"  => $request->input('employer_company_managerial_position_name'),
                "branch_tel_area_code"  => $request->input('branch_tel_area_code'),
                "branch_tel_city_code"  => $request->input('branch_tel_city_code'),
                "branch_tel_subscriber_code"  => $request->input('branch_tel_subscriber_code'),
                "labor_consultant_submission_agent_name"  => $request->input('labor_consultant_submission_agent_name'),
                "employment_insured_no"  => $request->input('employment_insured_no'),
                "insured_fullname_kana"  => $request->input('insured_fullname_kana'),
                "insured_fullname"  => $request->input('insured_fullname'),
                "employee_birthday_era"  => $request->input('employee_birthday_era'),
                "employee_birthday_year"  => $request->input('employee_birthday_year'),
                "employee_birthday_month"  => $request->input('employee_birthday_month'),
                "employee_birthday_date"  => $request->input('employee_birthday_date'),
                "bonus_payment_date_era"  => $request->input('bonus_payment_date_era'),
                "bonus_payment_date_year"  => $request->input('bonus_payment_date_year'),
                "bonus_payment_date_month"  => $request->input('bonus_payment_date_month'),
                "bonus_payment_date_date"  => $request->input('bonus_payment_date_date'),
                "bonus_payment_currency"  => $request->input('bonus_payment_currency'),
                "bonus_payment_goods"  => $request->input('bonus_payment_goods'),
                "bonus_payment_sum"  => $request->input('bonus_payment_sum'),
                "mynumber_no_or_pension_no"  => $request->input('mynumber_no_or_pension_no'),
                "remarks_over_70_insured"  => $request->input('remarks_over_70_insured'),
                "remarks_more_than_twice_work"  => $request->input('remarks_more_than_twice_work'),
                "remarks_bonus_sum_in_months"  => $request->input('remarks_bonus_sum_in_months'),
                "remarks_first_payment_date"  => $request->input('monthly_remuneration_amount_in_currency1'),
                'apply_to_code' => $request->input('apply_to_code'),
                'apply_to_name' => $request->input('apply_to_name')
            ];
            $XML = new MixXmlEgovSigner($request);
            $response = $XML->run($request, false, $csvText);
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
