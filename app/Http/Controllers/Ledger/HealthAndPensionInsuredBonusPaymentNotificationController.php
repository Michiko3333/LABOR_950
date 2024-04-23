<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HealthAndPensionInsuredBonusPaymentNotificationRequest;
use App\Models\CurrentUser;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class HealthAndPensionInsuredBonusPaymentNotificationController extends Controller
{
    public function index(Request $request)
    {
         // 画像のパス
        $imagePath = public_path('img/tyohyo160.png');

         // 画像の読み込み
        $imageData = File::get($imagePath);

         // 画像をBase64にエンコード
        $base64Data = base64_encode($imageData);

         // Base64データをデータURIに組み込む
        $dataUri = 'data:image/png;base64,' . $base64Data;

         // 操作する会社が設定されているか
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

        return view('ledger.health_and_pension_insured_bonus_payment_notification', ['company' => $company, 'todaySet' => $todaySet, 'dataUri' => $dataUri, 'certificate' => $certificate]);
    }

    public function post(HealthAndPensionInsuredBonusPaymentNotificationRequest $request)
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

        $radio_keys = ["radio_file_other"];

        foreach ($radio_keys as $key) {
            if (!$request->has($key)) {
                $request->merge([$key => 0]);
            }
        }    

        try {
            $data = [
                "title_health_insurance"  => $request->input('title_health_insurance'),
                "title_pension_insurance"  => $request->input('title_pension_insurance'),
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
            ];
            return view('admin.companies', ['send_data' => $data]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
