<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentalLeaveBenefitsClaimFormRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'file_childcare' => 'required_unless:radio_file_childcare,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_wage_amount' => 'required_if:radio_file_wage_amount,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_wage_certificate' => 'required_if:radio_file_wage_certificate,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_confirmation_document' => 'required_if:radio_file_confirmation_document,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_passbook' => 'required_if:radio_file_passbook,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_extension_reason' => 'required_if:radio_file_extension_reason,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_spouse' => 'required_if:radio_file_spouse,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_spouse_childcare_leave' => 'required_if:radio_file_spouse_childcare_leave,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_other' => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'input_file_other' => 'required_if:checked_other,on|string|max:255',
            'leave_start_wage_monthly_certificate' => 'nullable|int|max:1',
            'reduced_working_hours_wage_certificate_start' => 'nullable|int|max:1',
            'ledger_type' => 'string|regex:/^[0-9]{1,10}$/u',
            'employment_insured_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'string|max:2',
            'qualifications_japan_era_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'employment_insurance_office_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'childcare_start_date_japan_era' => 'nullable|string|max:2',
            'childcare_start_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_date_month,childcare_start_date_day',
            'childcare_start_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_date_japan_era_year,childcare_start_date_day',
            'childcare_start_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:childcare_start_date_japan_era_year,childcare_start_date_month',
            'birth_date_japan_era' => 'string|max:2',
            'birth_date_japan_era_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birth_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birth_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_japan_era' => 'nullable|string|max:2',
            'birth_due_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:birth_due_date_month,birth_due_date_day',
            'birth_due_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:birth_due_date_japan_era_year,birth_due_date_day',
            'birth_due_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:birth_due_date_japan_era_year,birth_due_date_month',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'post_code_former' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'address_prefecture_city' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'address_ward' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'address_apartment' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era_year1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:payer_month1,payer_day1,payer_month_end1,payer_day_end1',
            'payer_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year1,payer_day1,payer_month_end1,payer_day_end1',
            'payer_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year1,payer_month1,payer_month_end1,payer_day_end1',
            'payer_month_end1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year1,payer_month1,payer_day1,payer_day_end1',
            'payer_day_end1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year1,payer_month1,payer_day1,payer_month_end1',
            'workday_count1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:payer_month2,payer_day2,payer_month_end2,payer_day_end2',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year2,payer_day2,payer_month_end2,payer_day_end2',
            'payer_day2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year2,payer_month2,payer_month_end2,payer_day_end2',
            'payer_month_end2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year2,payer_month2,payer_day2,payer_day_end2',
            'payer_day_end2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payer_japan_era_year2,payer_month2,payer_day2,payer_month_end2',
            'workday_count2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payment_period_last_japan_era' => 'nullable|string|max:2',
            'payment_period_last_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:,ayment_period_last_month,payment_period_last_day,payment_period_last_month_end,payment_period_last_day_end',
            'payment_period_last_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_last_japan_era_year,payment_period_last_day,payment_period_last_month_end,payment_period_last_day_end',
            'payment_period_last_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_last_japan_era_year,payment_period_last_month,payment_period_last_month_end,payment_period_last_day_end',
            'payment_period_last_month_end' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_last_japan_era_year,payment_period_last_month,payment_period_last_day,payment_period_last_day_end',
            'payment_period_last_day_end' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_last_japan_era_year,payment_period_last_month,payment_period_last_day,payment_period_last_month_end',
            'workday_count3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_date_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:return_from_resignation_date_month,return_from_resignation_date_day',
            'return_from_resignation_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:return_from_resignation_date_japan_era_year,return_from_resignation_date_day',
            'return_from_resignation_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:return_from_resignation_date_japan_era_year,return_from_resignation_date_month',
            'payment_period_extension_reason' => 'nullable|int|between:1,6',
            'payment_period_extension_reason_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_reason_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:payment_period_extension_reason_month,payment_period_extension_reason_day,payment_period_extension_reason_last_month,payment_period_extension_reason_last_day',
            'payment_period_extension_reason_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_extension_reason_japan_era_year,payment_period_extension_reason_day,payment_period_extension_reason_last_month,payment_period_extension_reason_last_day',
            'payment_period_extension_reason_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_extension_reason_japan_era_year,payment_period_extension_reason_month,payment_period_extension_reason_last_month,payment_period_extension_reason_last_day',
            'payment_period_extension_reason_last_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_extension_reason_japan_era_year,payment_period_extension_reason_month,payment_period_extension_reason_day,payment_period_extension_reason_last_day',
            'payment_period_extension_reason_last_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_extension_reason_japan_era_year,payment_period_extension_reason_month,payment_period_extension_reason_day,payment_period_extension_reason_last_month',
            'partner_childcare_leave_taken' => 'nullable|int|in:1',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'childcare_leave_reacquisition_cause' => 'nullable|int|in:1,2,3,5',
            'today_japan_era' => 'nullable|string|max:2',
            'today_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'headquarters_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code_name' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'nullable|string|max:255',
            'destination' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々　]+\z/u',
            'financial_Institutions_name_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'financial_institution_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥々　]+\z/u',
            'headquarters_or_branch' => 'nullable|string|max:2',
            'financia_iInstitution_code' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'store_code' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'passbook_account_number' => 'nullable|string|regex:/^[0-9]{7}$/u',
            'yucho_bank_former' => 'nullable|string|regex:/^[0-9]{3,5}$/u',
            'yucho_bank_latter' => 'nullable|string|regex:/^[0-9]{7,8}$/u',
            'wage_deadline' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:2',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:2',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'note' => 'nullable|string|max:255',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $qualifications_japan_era = $data['qualifications_japan_era'] ?? "";
            $qualifications_japan_era_year = $data['qualifications_japan_era_year'] ?? "";
            $qualifications_month = $data['qualifications_month'] ?? "";
            $qualifications_day = $data['qualifications_day'] ?? "";
            $childcare_start_date_japan_era = $data['childcare_start_date_japan_era'] ?? "";
            $childcare_start_date_japan_era_year = $data['childcare_start_date_japan_era_year'] ?? "";
            $childcare_start_date_month = $data['childcare_start_date_month'] ?? "";
            $childcare_start_date_day = $data['childcare_start_date_day'] ?? "";
            $birth_date_japan_era = $data['birth_date_japan_era'] ?? "";
            $birth_date_japan_era_year = $data['birth_date_japan_era_year'] ?? "";
            $birth_date_month = $data['birth_date_month'] ?? "";
            $birth_date_day = $data['birth_date_day'] ?? "";
            $birth_due_date_japan_era_year = $data['birth_due_date_japan_era_year'] ?? "";
            $birth_due_date_month = $data['birth_due_date_month'] ?? "";
            $birth_due_date_day = $data['birth_due_date_day'] ?? "";
            $payer_japan_era1 = $data['payer_japan_era1'] ?? "";
            $payer_japan_era_year1 = $data['payer_japan_era_year1'] ?? "";
            $payer_month1 = $data['payer_month1'] ?? "";
            $payer_day1 = $data['payer_day1'] ?? "";
            $payer_month_end1 = $data['payer_month_end1'] ?? "";
            $payer_day_end1 = $data['payer_day_end1'] ?? "";
            $payer_japan_era2 = $data['payer_japan_era2'] ?? "";
            $payer_japan_era_year2 = $data['payer_japan_era_year2'] ?? "";
            $payer_month2 = $data['payer_month2'] ?? "";
            $payer_day2 = $data['payer_day2'] ?? "";
            $payer_month_end2 = $data['payer_month_end2'] ?? "";
            $payer_day_end2 = $data['payer_day_end2'] ?? "";
            $payment_period_last_japan_era = $data['payment_period_last_japan_era'] ?? "";
            $payment_period_last_japan_era_year = $data['payment_period_last_japan_era_year'] ?? "";
            $payment_period_last_month = $data['payment_period_last_month'] ?? "";
            $payment_period_last_day = $data['payment_period_last_day'] ?? "";
            $payment_period_last_month_end = $data['payment_period_last_month_end'] ?? "";
            $payment_period_last_day_end = $data['payment_period_last_day_end'] ?? "";
            $return_from_resignation_date_japan_era = $data['return_from_resignation_date_japan_era'] ?? "";
            $return_from_resignation_date_japan_era_year = $data['return_from_resignation_date_japan_era_year'] ?? "";
            $return_from_resignation_date_month = $data['return_from_resignation_date_month'] ?? "";
            $return_from_resignation_date_day = $data['return_from_resignation_date_day'] ?? "";
            $payment_period_extension_reason_japan_era = $data['payment_period_extension_reason_japan_era'] ?? "";
            $payment_period_extension_reason_japan_era_year = $data['payment_period_extension_reason_japan_era_year'] ?? "";
            $payment_period_extension_reason_month = $data['payment_period_extension_reason_month'] ?? "";
            $payment_period_extension_reason_day = $data['payment_period_extension_reason_day'] ?? "";
            $payment_period_extension_reason_last_month = $data['payment_period_extension_reason_last_month'] ?? "";
            $payment_period_extension_reason_last_day = $data['payment_period_extension_reason_last_day'] ?? "";

            if (!empty($qualifications_month) && !empty($qualifications_day)) {
                if (ctype_digit($qualifications_month)) {
                    if (!checkdate($qualifications_month, $qualifications_day, '2000')) {
                        $validator->errors()->add('qualifications_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($qualifications_japan_era === '昭和') {
                if (
                    ($qualifications_japan_era_year == 1 && ($qualifications_month < 12 || ($qualifications_month == 12 && $qualifications_day < 25))) ||
                    ($qualifications_japan_era_year == 64 && ($qualifications_month > 1 || ($qualifications_month == 1 && $qualifications_day > 7))) ||
                    ($qualifications_japan_era_year > 64)
                ) {
                    $validator->errors()->add('qualifications_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualifications_japan_era === '平成') {
                if (
                    ($qualifications_japan_era_year == 1 && ($qualifications_month < 1 || ($qualifications_month == 1 && $qualifications_day < 8))) ||
                    ($qualifications_japan_era_year == 31 && ($qualifications_month > 4 || ($qualifications_month == 4 && $qualifications_day > 30))) ||
                    ($qualifications_japan_era_year > 31)
                ) {
                    $validator->errors()->add('qualifications_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualifications_japan_era === '令和') {
                if ($qualifications_japan_era_year == 1 && ($qualifications_month < 5 || ($qualifications_month == 5 && $qualifications_day < 1))) {
                    $validator->errors()->add('qualifications_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($childcare_start_date_month) && !empty($childcare_start_date_day)) {
                if (ctype_digit($childcare_start_date_month)) {
                    if (!checkdate($childcare_start_date_month, $childcare_start_date_day, '2000')) {
                        $validator->errors()->add('childcare_start_date_day', '1枚目_育児休業開始年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($childcare_start_date_japan_era === '平成') {
                if (
                    ($childcare_start_date_japan_era_year == 1 && ($childcare_start_date_month < 1 || ($childcare_start_date_month == 1 && $childcare_start_date_day < 8))) ||
                    ($childcare_start_date_japan_era_year == 31 && ($childcare_start_date_month > 4 || ($childcare_start_date_month == 4 && $childcare_start_date_day > 30))) ||
                    ($childcare_start_date_japan_era_year > 31)
                ) {
                    $validator->errors()->add('childcare_start_date_day', '1枚目_育児休業開始年月日は正しい日付を入力してください。');
                }
            } elseif ($childcare_start_date_japan_era === '令和') {
                if ($childcare_start_date_japan_era_year == 1 && ($childcare_start_date_month < 5 || ($childcare_start_date_month == 5 && $childcare_start_date_day < 1))) {
                    $validator->errors()->add('childcare_start_date_day', '1枚目_育児休業開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($birth_date_month) && !empty($birth_date_day)) {
                if (ctype_digit($birth_date_month)) {
                    if (!checkdate($birth_date_month, $birth_date_day, '2000')) {
                        $validator->errors()->add('birth_date_day', '1枚目_出産年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($birth_date_japan_era === '平成') {
                if (
                    ($birth_date_japan_era_year == 1 && ($birth_date_month < 1 || ($birth_date_month == 1 && $birth_date_day < 8))) ||
                    ($birth_date_japan_era_year == 31 && ($birth_date_month > 4 || ($birth_date_month == 4 && $birth_date_day > 30))) ||
                    ($birth_date_japan_era_year > 31)
                ) {
                    $validator->errors()->add('birth_date_day', '1枚目_出産年月日は正しい日付を入力してください。');
                }
            } elseif ($birth_date_japan_era === '令和') {
                if ($birth_date_japan_era_year == 1 && ($birth_date_month < 5 || ($birth_date_month == 5 && $birth_date_day < 1))) {
                    $validator->errors()->add('birth_date_day', '1枚目_出産年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($birth_due_date_month) && !empty($birth_due_date_day)) {
                if (ctype_digit($birth_due_date_month)) {
                    if (!checkdate($birth_due_date_month, $birth_due_date_day, '2000')) {
                        $validator->errors()->add('birth_due_date_day', '1枚目_出産予定日は正しい日付を入力してください。');
                    }
                }
            }

            if ($birth_due_date_japan_era_year == 1 && ($birth_due_date_month < 5)) {
                $validator->errors()->add('birth_due_date_day', '1枚目_出産予定日は正しい日付を入力してください。');
            }

            if (!empty($payer_month1) && !empty($payer_day1)) {
                if (ctype_digit($payer_month1)) {
                    if (!checkdate($payer_month1, $payer_day1, '2000')) {
                        $validator->errors()->add('payer_day1', '1枚目_支給単位期間その１（初日－末日）_初日は正しい日付を入力してください。');
                    }
                }
            }

            if ($payer_japan_era1 === '平成') {
                if (
                    ($payer_japan_era_year1 == 1 && ($payer_month1 < 1 || ($payer_month1 == 1 && $payer_day1 < 8))) ||
                    ($payer_japan_era_year1 == 31 && ($payer_month1 > 4 || ($payer_month1 == 4 && $payer_day1 > 30))) ||
                    ($payer_japan_era_year1 > 31)
                ) {
                    $validator->errors()->add('payer_day1', '1枚目_支給単位期間その１（初日－末日）_初日は正しい日付を入力してください。');
                }
            } elseif ($payer_japan_era1 === '令和') {
                if ($payer_japan_era_year1 == 1 && ($payer_month1 < 5 || ($payer_month1 == 5 && $payer_day1 < 1))) {
                    $validator->errors()->add('payer_day1', '1枚目_支給単位期間その１（初日－末日）_初日は正しい日付を入力してください。');
                }
            }

            if (!empty($payer_month_end1) && !empty($payer_day_end1)) {
                if (ctype_digit($payer_month_end1)) {
                    if (!checkdate($payer_month_end1, $payer_day_end1, '2000')) {
                        $validator->errors()->add('payer_day_end1', '1枚目_支給単位期間その１（初日－末日）_末日は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($payer_month_end1) && !empty($payer_day_end1) && !empty($payer_day1) && !empty($payer_month1)) {
                if ($payer_month_end1 === $payer_month1) {
                    if ($payer_day1 > $payer_day_end1) {
                        $validator->errors()->add('payer_day_end1', '1枚目_支給単位期間その１（初日－末日）_末日は1枚目_支給単位期間その１（初日－末日）_初日以降を入力してください。');
                    }
                } elseif ($payer_month1 > $payer_month_end1) {
                    $validator->errors()->add('payer_day_end1', '1枚目_支給単位期間その１（初日－末日）_末日は1枚目_支給単位期間その１（初日－末日）_初日以降を入力してください。');
                }
            }

            if (!empty($payer_month2) && !empty($payer_day2)) {
                if (ctype_digit($payer_month2)) {
                    if (!checkdate($payer_month2, $payer_day2, '2000')) {
                        $validator->errors()->add('payer_day2', '1枚目_支給単位期間その２（初日－末日）_初日は正しい日付を入力してください。');
                    }
                }
            }

            if ($payer_japan_era2 === '平成') {
                if (
                    ($payer_japan_era_year2 == 1 && ($payer_month2 < 1 || ($payer_month2 == 1 && $payer_day2 < 8))) ||
                    ($payer_japan_era_year2 == 31 && ($payer_month2 > 4 || ($payer_month2 == 4 && $payer_day2 > 30))) ||
                    ($payer_japan_era_year2 > 31)
                ) {
                    $validator->errors()->add('payer_day2', '1枚目_支給単位期間その２（初日－末日）_初日は正しい日付を入力してください。');
                }
            } elseif ($payer_japan_era2 === '令和') {
                if ($payer_japan_era_year2 == 1 && $payer_month2 < 5) {
                    $validator->errors()->add('payer_day2', '1枚目_支給単位期間その２（初日－末日）_初日は正しい日付を入力してください。');
                }
            }

            if (!empty($payer_month_end2) && !empty($payer_day_end2)) {
                if (ctype_digit($payer_month_end2)) {
                    if (!checkdate($payer_month_end2, $payer_day_end2, '2000')) {
                        $validator->errors()->add('payer_day_end2', '1枚目_支給単位期間その２（初日－末日）_末日は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($payer_month_end2) && !empty($payer_day_end2) && !empty($payer_day2) && !empty($payer_month2)) {
                if ($payer_month_end2 === $payer_month2) {
                    if ($payer_day2 > $payer_day_end2) {
                        $validator->errors()->add('payer_day_end2', '1枚目_支給単位期間その２（初日－末日）_末日は1枚目_支給単位期間その２（初日－末日）_初日以降を入力してください。');
                    }
                } elseif ($payer_month2 > $payer_month_end2) {
                    $validator->errors()->add('payer_day_end2', '1枚目_支給単位期間その２（初日－末日）_末日は1枚目_支給単位期間その２（初日－末日）_初日以降を入力してください。');
                }
            }

            if (!empty($payment_period_last_month) && !empty($payment_period_last_day)) {
                if (ctype_digit($payment_period_last_month)) {
                    if (!checkdate($payment_period_last_month, $payment_period_last_day, '2000')) {
                        $validator->errors()->add('payment_period_last_day', '1枚目_最終支給単位期間（初日－末日）_初日は正しい日付を入力してください。');
                    }
                }
            }

            if ($payment_period_last_japan_era === '平成') {
                if (
                    ($payment_period_last_japan_era_year == 1 && ($payment_period_last_month < 1 || ($payment_period_last_month == 1 && $payment_period_last_day < 8))) ||
                    ($payment_period_last_japan_era_year == 31 && ($payment_period_last_month > 4 || ($payment_period_last_month == 4 && $payment_period_last_day > 30))) ||
                    ($payment_period_last_japan_era_year > 31)
                ) {
                    $validator->errors()->add('payment_period_last_day', '1枚目_最終支給単位期間（初日－末日）_初日は正しい日付を入力してください。');
                }
            } elseif ($payment_period_last_japan_era === '令和') {
                if ($payment_period_last_japan_era_year == 1 && ($payment_period_last_month < 5)) {
                    $validator->errors()->add('payment_period_last_day', '1枚目_最終支給単位期間（初日－末日）_初日は正しい日付を入力してください。');
                }
            }

            if (!empty($payment_period_last_month_end) && !empty($payment_period_last_day_end)) {
                if (ctype_digit($payment_period_last_month_end)) {
                    if (!checkdate($payment_period_last_month_end, $payment_period_last_day_end, '2000')) {
                        $validator->errors()->add('payment_period_last_day_end', '1枚目_最終支給単位期間（初日－末日）_末日は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($payment_period_last_month_end) && !empty($payment_period_last_day_end) && !empty($payment_period_last_day) && !empty($payment_period_last_month)) {
                if ($payment_period_last_month_end === $payment_period_last_month) {
                    if ($payment_period_last_day > $payment_period_last_day_end) {
                        $validator->errors()->add('payment_period_last_day_end', '1枚目_最終支給単位期間（初日－末日）_末日は1枚目_最終支給単位期間（初日－末日）_初日以降を入力してください。');
                    }
                } elseif ($payment_period_last_month > $payment_period_last_month_end) {
                    $validator->errors()->add('payment_period_last_day_end', '1枚目_最終支給単位期間（初日－末日）_末日は1枚目_最終支給単位期間（初日－末日）_初日以降を入力してください。');
                }
            }

            if (!empty($return_from_resignation_date_month) && !empty($return_from_resignation_date_day)) {
                if (ctype_digit($return_from_resignation_date_month)) {
                    if (!checkdate($return_from_resignation_date_month, $return_from_resignation_date_day, '2000')) {
                        $validator->errors()->add('return_from_resignation_date_day3', '1枚目_職場復帰年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($return_from_resignation_date_japan_era === '平成') {
                if (
                    ($return_from_resignation_date_japan_era_year == 1 && ($return_from_resignation_date_month < 1 || ($return_from_resignation_date_month == 1 && $return_from_resignation_date_day < 8))) ||
                    ($return_from_resignation_date_japan_era_year == 31 && ($return_from_resignation_date_month > 4 || ($return_from_resignation_date_month == 4 && $return_from_resignation_date_day > 30))) ||
                    ($return_from_resignation_date_japan_era_year > 33)
                ) {
                    $validator->errors()->add('return_from_resignation_date_day3', '1枚目_職場復帰年月日は正しい日付を入力してください。');
                }
            } elseif ($return_from_resignation_date_japan_era === '令和') {
                if ($return_from_resignation_date_japan_era_year == 1 && $return_from_resignation_date_month < 5) {
                    $validator->errors()->add('return_from_resignation_date_day3', '1枚目_職場復帰年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($payment_period_extension_reason_month) && !empty($payment_period_extension_reason_day)) {
                if (ctype_digit($payment_period_extension_reason_month)) {
                    if (!checkdate($payment_period_extension_reason_month, $payment_period_extension_reason_day, '2000')) {
                        $validator->errors()->add('payment_period_extension_reason_day', '1枚目_支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                    }
                }
            }

            if ($payment_period_extension_reason_japan_era === '平成') {
                if (
                    ($payment_period_extension_reason_japan_era_year == 1 && ($payment_period_extension_reason_month < 1 || ($payment_period_extension_reason_month == 1 && $payment_period_extension_reason_day < 8))) ||
                    ($payment_period_extension_reason_japan_era_year == 31 && ($payment_period_extension_reason_month > 4 || ($payment_period_extension_reason_month == 4 && $payment_period_extension_reason_day > 30))) ||
                    ($payment_period_extension_reason_japan_era_year > 31)
                ) {
                    $validator->errors()->add('payment_period_extension_reason_day', '1枚目_支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                }
            } elseif ($payment_period_extension_reason_japan_era === '令和') {
                if ($payment_period_extension_reason_japan_era_year == 1 && $payment_period_extension_reason_month < 5) {
                    $validator->errors()->add('payment_period_extension_reason_day', '1枚目_支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                }
            }

            if (!empty($payment_period_extension_reason_last_month) && !empty($payment_period_extension_reason_last_day)) {
                if (ctype_digit($payment_period_extension_reason_last_month)) {
                    if (!checkdate($payment_period_extension_reason_last_month, $payment_period_extension_reason_last_day, '2000')) {
                        $validator->errors()->add('payment_period_extension_reason_last_day', '1枚目_支給対象となる期間の延長事由－期間_終了日付は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($payment_period_extension_reason_last_month) && !empty($payment_period_extension_reason_last_day) && !empty($payment_period_extension_reason_day) && !empty($payment_period_extension_reason_month)) {
                if ($payment_period_extension_reason_last_month === $payment_period_extension_reason_month) {
                    if ($payment_period_extension_reason_day > $payment_period_extension_reason_last_day) {
                        $validator->errors()->add('payment_period_extension_reason_last_day', '1枚目_支給対象となる期間の延長事由－期間_終了日付は1枚目_支給対象となる期間の延長事由－期間_開始日付以降を入力してください。');
                    }
                } elseif ($payment_period_extension_reason_month > $payment_period_extension_reason_last_month) {
                    $validator->errors()->add('payment_period_extension_reason_last_day', '1枚目_支給対象となる期間の延長事由－期間_終了日付は1枚目_支給対象となる期間の延長事由－期間_開始日付以降を入力してください。');
                }
            }

            if ($this->hasFile('file_childcare')) {
                $totalSize += $this->file('file_childcare')->getSize();
            }
            if ($this->hasFile('file_wage_amount')) {
                $totalSize += $this->file('file_wage_amount')->getSize();
            }
            if ($this->hasFile('file_wage_certificate')) {
                $totalSize += $this->file('file_wage_certificate')->getSize();
            }
            if ($this->hasFile('file_confirmation_document')) {
                $totalSize += $this->file('file_confirmation_document')->getSize();
            }
            if ($this->hasFile('file_passbook')) {
                $totalSize += $this->file('file_passbook')->getSize();
            }
            if ($this->hasFile('file_extension_reason')) {
                $totalSize += $this->file('file_extension_reason')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
            }
            if ($this->hasFile('file_spouse_childcare_leave')) {
                $totalSize += $this->file('file_spouse_childcare_leave')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'childcare_start_date_japan_era_year.required_with' => '1枚目_育児休業開始年月日_年を入力してください。',
            'childcare_start_date_month.required_with' => '1枚目_育児休業開始年月日_月を入力してください。',
            'childcare_start_date_day.required_with' => '1枚目_育児休業開始年月日_日を入力してください。',
            'birth_due_date_japan_era_year.required_with' => '1枚目_出産予定日_年を入力してください。',
            'birth_due_date_month.required_with' => '1枚目_出産予定日_月を入力してください。',
            'birth_due_date_day.required_with' => '1枚目_出産予定日_日を入力してください。',
            'payer_japan_era_year1.required_with' => '1枚目_支給単位期間その１（初日－末日）_初日_年を入力してください。',
            'payer_month1.required_with' => '1枚目_支給単位期間その１（初日－末日）_初日_月を入力してください。',
            'payer_day1.required_with' => '1枚目_支給単位期間その１（初日－末日）_初日_日を入力してください。',
            'payer_month_end1.required_with' => '1枚目_支給単位期間その１（初日－末日）_末日_月を入力してください。',
            'payer_day_end1.required_with' => '1枚目_支給単位期間その１（初日－末日）_末日_日を入力してください。',
            'payer_japan_era_year2.required_with' => '1枚目_支給単位期間その２（初日－末日）_初日_年を入力してください。',
            'payer_month2.required_with' => '1枚目_支給単位期間その２（初日－末日）_初日_月を入力してください。',
            'payer_day2.required_with' => '1枚目_支給単位期間その２（初日－末日）_初日_日を入力してください。',
            'payer_month_end2.required_with' => '1枚目_支給単位期間その２（初日－末日）_末日_月を入力してください。',
            'payer_day_end2.required_with' => '1枚目_支給単位期間その２（初日－末日）_末日_日を入力してください。',
            'payment_period_last_japan_era_year.required_with' => '1枚目_最終支給単位期間（初日－末日）_初日_年を入力してください。',
            'payment_period_last_month.required_with' => '1枚目_最終支給単位期間（初日－末日）_初日_月を入力してください。',
            'payment_period_last_day.required_with' => '1枚目_最終支給単位期間（初日－末日）_初日_日を入力してください。',
            'payment_period_last_month.required_with' => '1枚目_最終支給単位期間（初日－末日）_末日_月を入力してください。',
            'payment_period_last_day.required_with' => '1枚目_最終支給単位期間（初日－末日）_末日_日を入力してください。',
            'return_from_resignation_date_japan_era_year.required_with' => '1枚目_職場復帰年月日_年を入力してください。',
            'return_from_resignation_date_month.required_with' => '1枚目_職場復帰年月日_月を入力してください。',
            'return_from_resignation_date_day.required_with' => '1枚目_職場復帰年月日_日を入力してください。',
            'payment_period_extension_reason_japan_era_year.required_with' => '1枚目_支給対象となる期間の延長事由－期間_開始日付_年を入力してください。',
            'payment_period_extension_reason_month.required_with' => '1枚目_支給対象となる期間の延長事由－期間_開始日付_月を入力してください。',
            'payment_period_extension_reason_day.required_with' => '1枚目_支給対象となる期間の延長事由－期間_開始日付_日を入力してください。',
            'payment_period_extension_reason_month.required_with' => '1枚目_支給対象となる期間の延長事由－期間_終了日付_月を入力してください。',
            'payment_period_extension_reason_day.required_with' => '1枚目_支給対象となる期間の延長事由－期間_終了日付_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_childcare' => '添付ファイル_育児の事実が確認できる書類',
            'file_wage_amount' => '添付ファイル_休業開始時賃金月額証明書に記載された育児休業を開始した日及びその日前の賃金の額が確認できる書類',
            'file_wage_certificate' => '添付ファイル_雇用保険被保険者休業開始時賃金月額証明票',
            'file_confirmation_document' => '添付ファイル_支給申請書に記載した賃金額、就業した日数及び時間、出産予定日、出産日、育児休業開始日、育児休業終了日等記載内容を確認できる書類',
            'file_passbook' => '添付ファイル_払渡希望金融機関の口座に係る被保険者名義の通帳',
            'file_extension_reason' => '添付ファイル_延長事由に該当することを確認できる書類',
            'file_spouse' => '添付ファイル_被保険者の配偶者であることを確認できる書類',
            'file_spouse_childcare_leave' => '添付ファイル_被保険者の配偶者の育児休業の取得を確認できる書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'employment_insured_no_4digit' => '1枚目_被保険者番号4桁',
            'employment_insured_no_6digit' => '1枚目_被保険者番号6桁',
            'employment_insured_no_CD' => '1枚目_被保険者番号1桁',
            'qualifications_japan_era' => '1枚目_資格取得年月日_年号',
            'qualifications_japan_era_year' => '1枚目_資格取得年月日_年',
            'qualifications_month' => '1枚目_資格取得年月日_月',
            'qualifications_day' => '1枚目_資格取得年月日_日',
            'fullname' => '1枚目_被保険者氏名',
            'fullname_kana' => '1枚目_フリガナ（カタカナ）',
            'employment_insurance_office_no_4digit' => '1枚目_事業所番号4桁',
            'employment_insurance_office_no_6digit' => '1枚目_事業所番号6桁',
            'employment_insurance_office_no_CD' => '1枚目_事業所番号1桁',
            'childcare_start_date_japan_era' => '1枚目_育児休業開始年月日_年号',
            'childcare_start_date_japan_era_year' => '1枚目_育児休業開始年月日_年',
            'childcare_start_date_month' => '1枚目_育児休業開始年月日_月',
            'childcare_start_date_day' => '1枚目_育児休業開始年月日_日',
            'birth_date_japan_era' => '1枚目_出産年月日_年号',
            'birth_date_japan_era_year' => '1枚目_出産年月日_年',
            'birth_date_month' => '1枚目_出産年月日_月',
            'birth_date_day' => '1枚目_出産年月日_日',
            'birth_due_date_japan_era' => '1枚目_出産予定日_年号',
            'birth_due_date_japan_era_year' => '1枚目_出産予定日_年',
            'birth_due_date_month' => '1枚目_出産予定日_月',
            'birth_due_date_day' => '1枚目_出産予定日_日',
            'mynumber_card_no' => '1枚目_個人番号',
            'post_code_former' => '1枚目_被保険者の住所（郵便番号）３桁',
            'post_code_latter' => '1枚目_被保険者の住所（郵便番号）４桁',
            'address_prefecture_city' => '1枚目_被保険者の住所（漢字）※市・区・郡及び町村名',
            'address_ward' => '1枚目_被保険者の住所（漢字）※丁目・番地',
            'address_apartment' => '1枚目_被保険者の住所（漢字）※アパート、マンション名等',
            'tel_area_code' => '1枚目_被保険者の電話番号_市外局番',
            'tel_city_code' => '1枚目_被保険者の電話番号_市内局番',
            'tel_subscriber_code' => '1枚目_被保険者の電話番号_加入者番号',
            'payer_japan_era1' => '1枚目_支給単位期間その１（初日－末日）_初日_年号',
            'payer_japan_era_year1' => '1枚目_支給単位期間その１（初日－末日）_初日_年',
            'payer_month1' => '1枚目_支給単位期間その１（初日－末日）_初日_月',
            'payer_day1' => '1枚目_支給単位期間その１（初日－末日）_初日_日',
            'payer_month_end1' => '1枚目_支給単位期間その１（初日－末日）_末日_月',
            'payer_day_end1' => '1枚目_支給単位期間その１（初日－末日）_末日_日',
            'workday_count1' => '1枚目_就業日数_その１',
            'working_hours1' => '1枚目_就業時間_その１',
            'wages_paid1' => '1枚目_支払われた賃金額その１',
            'payer_japan_era2' => '1枚目_支給単位期間その２（初日－末日）_初日_年号',
            'payer_japan_era_year2' => '1枚目_支給単位期間その２（初日－末日）_初日_年',
            'payer_month2' => '1枚目_支給単位期間その２（初日－末日）_初日_月',
            'payer_day2' => '1枚目_支給単位期間その２（初日－末日）_初日_日',
            'payer_month_end2' => '1枚目_支給単位期間その２（初日－末日）_末日_月',
            'payer_day_end2' => '1枚目_支給単位期間その２（初日－末日）_末日_日',
            'workday_count2' => '1枚目_就業日数_その２',
            'working_hours2' => '1枚目_就業時間_その２',
            'wages_paid2' => '1枚目_支払われた賃金額_その２',
            'payment_period_last_japan_era' => '1枚目_最終支給単位期間（初日－末日）_初日_年号',
            'payment_period_last_japan_era_year' => '1枚目_最終支給単位期間（初日－末日）_初日_年',
            'payment_period_last_month' => '1枚目_最終支給単位期間（初日－末日）_初日_月',
            'payment_period_last_day' => '1枚目_最終支給単位期間（初日－末日）_初日_日',
            'payment_period_last_month_end' => '1枚目_最終支給単位期間（初日－末日）_末日_月',
            'payment_period_last_day_end' => '1枚目_最終支給単位期間（初日－末日）_末日_日',
            'workday_count3' => '1枚目_就業日数_最終',
            'working_hours3' => '1枚目_就業時間_最終',
            'wages_paid3' => '1枚目_支払われた賃金額_最終',
            'return_from_resignation_date_japan_era' => '1枚目_職場復帰年月日_年号',
            'return_from_resignation_date_japan_era_year' => '1枚目_職場復帰年月日_年',
            'return_from_resignation_date_month' => '1枚目_職場復帰年月日_月',
            'return_from_resignation_date_day' => '1枚目_職場復帰年月日_日',
            'payment_period_extension_reason' => '1枚目_支給対象となる期間の延長事由－期間_延長事由',
            'payment_period_extension_reason_japan_era' => '1枚目_支給対象となる期間の延長事由－期間_開始_年号',
            'payment_period_extension_reason_japan_era_year' => '1枚目_支給対象となる期間の延長事由－期間_開始_年',
            'payment_period_extension_reason_month' => '1枚目_支給対象となる期間の延長事由－期間_開始_月',
            'payment_period_extension_reason_day' => '1枚目_支給対象となる期間の延長事由－期間_開始_日',
            'payment_period_extension_reason_last_month' => '1枚目_支給対象となる期間の延長事由－期間_終了_月',
            'payment_period_extension_reason_last_day' => '1枚目_支給対象となる期間の延長事由－期間_終了_年',
            'partner_childcare_leave_taken' => '1枚目_配偶者育休取得',
            'partner_insured_no_4digit' => '1枚目_配偶者の被保険者番号4桁',
            'partner_insured_no_6digit' => '1枚目_配偶者の被保険者番号6桁',
            'partner_insured_no_CD' => '1枚目_配偶者の被保険者番号1桁',
            'childcare_leave_reacquisition_cause' => '1枚目_育児休業再取得理由',
            'today_japan_era' => '1枚目_申請年月日_年号',
            'today_japan_era_year' => '1枚目_申請年月日_年',
            'today_japan_era_month' => '1枚目_申請年月日_月',
            'today_japan_era_day' => '1枚目_申請年月日_日',
            'headquarters_address' => '1枚目_事業所名（所在地）',
            'headquarters_tel_treacode' => '1枚目_事業所電話番号_市外局番',
            'headquarters_tel_city_code_name' => '1枚目_事業所電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '1枚目_事業所名電話番号_加入者番号',
            'employer_company_managerial_position_name' => '1枚目_事業主名',
            'destination' => '1枚目_公共職業安定所あて先',
            'financial_Institutions_name_kana' => '1枚目_払渡希望金融機関_フリガナ',
            'financial_institution_name' => '1枚目_払渡希望金融機関_名称',
            'headquarters_or_branch' => '1枚目_払渡希望金融機関_本支店区分',
            'financia_iInstitution_code' => '1枚目_払渡希望金融機関_金融機関コード',
            'store_code' => '1枚目_払渡希望金融機関_店舗コード',
            'passbook_account_number' => '1枚目_払渡希望金融機関_口座番号（普通）',
            'yucho_bank_former' => '1枚目_払渡希望金融機関_記号番号（総合）前半',
            'yucho_bank_latter' => '1枚目_払渡希望金融機関_記号番号（総合）後半',
            'wage_deadline' => '1枚目_備考_賃金締切日',
            'wage_payment' => '1枚目_備考_賃金支払日',
            'wage_payment_day' => '1枚目_備考_賃金支払日_日数',
            'commuting_allowance' => '1枚目_備考_通勤手当_有無',
            'commuting_allowance_period' => '1枚目_備考_通勤手当_機関',
            'commuting_allowance_period_other' => '1枚目_備考_通勤手当_その他記入欄',
            'note' => '1枚目_備考',
            'labor_consultant_acting_as_agent_name' => '1枚目_社会保険労務士記載欄_作成年月日･提出代行者･事務代理者の表示',
            'labor_consultant_name' => '1枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_treacode' => '1枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '1枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '1枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
