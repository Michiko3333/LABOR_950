<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaregiverLeaveBenefitApplicationRequest extends FormRequest
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
            "file_nursing_facts" => 'required_unless:radio_file_nursing_facts,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_nursing_care_recipient" => 'required_unless:radio_file_nursing_care_recipient,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_wage_payment_status" => 'required_if:radio_file_wage_payment_status,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_closing_starts" => 'required_if:radio_file_closing_starts,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'employment_mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'employment_insured_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'employment_insured_date_era' => 'string|max:2',
            'employment_insured_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'employment_insured_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'employment_insured_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]+[　][ぁ-んァ-ヴー一-龥々]+\z/u',
            'employment_fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'insurance_office_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'employment_lastname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]/u',
            'employment_firstname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]/u',
            'caregiver_leave_start_date_era' => 'string|max:2',
            'caregiver_leave_start_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'caregiver_leave_start_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'caregiver_leave_start_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'dependent_mynumber_card_no' => 'string|regex:/^[0-9]{12}$/u',
            'dependent_lastname_kana' => 'string|max:255|regex:/^[ァ-ヴー]+\z/u',
            'dependent_firstname_kana' => 'string|max:255|regex:/^[ァ-ヴー]+\z/u',
            'dependent_sex' => 'int|in:1,2',
            'dependent_relationship' => 'int|in:1,2,3,4,5,6,7',
            'dependent_lastname' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]/u',
            'dependent_firstname' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]/u',
            'care_target_family_birthday_era' => 'string|max:2',
            'care_target_family_birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'care_target_family_birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'care_target_family_birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'pay_target_period_era_1' => 'string|max:2',
            'pay_target_period_year_start_1' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'pay_target_period_month_start_1' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'pay_target_period_day_start_1' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'pay_target_period_month_end_1' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'pay_target_period_day_end_1' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'full_time_leave_days_1' => 'int|between:1,99|regex:/^[0-9]{1,7}$/u',
            'paid_wage_amount_1' => 'int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'pay_target_period_era_2' => 'nullable|string|max:2',
            'pay_target_period_year_start_2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_2,pay_target_period_day_start_2,pay_target_period_month_end_2,pay_target_period_day_end_2',
            'pay_target_period_month_start_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_year_start_2,pay_target_period_day_start_2,pay_target_period_month_end_2,pay_target_period_day_end_2',
            'pay_target_period_day_start_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_2,pay_target_period_year_start_2,pay_target_period_month_end_2,pay_target_period_day_end_2',
            'pay_target_period_month_end_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_2,pay_target_period_day_start_2,pay_target_period_year_start_2,pay_target_period_day_end_2',
            'pay_target_period_day_end_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_2,pay_target_period_day_start_2,pay_target_period_month_end_2,pay_target_period_year_start_2',
            'full_time_leave_days_2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,7}$/u',
            'paid_wage_amount_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'pay_target_period_era_3' => 'nullable|string|max:2',
            'pay_target_period_year_start_3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_3,pay_target_period_day_start_3,pay_target_period_month_end_3,pay_target_period_day_end_3',
            'pay_target_period_month_start_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_year_start_3,pay_target_period_day_start_3,pay_target_period_month_end_3,pay_target_period_day_end_3',
            'pay_target_period_day_start_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_3,pay_target_period_year_start_3,pay_target_period_month_end_3,pay_target_period_day_end_3',
            'pay_target_period_month_end_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_3,pay_target_period_day_start_3,pay_target_period_year_start_3,pay_target_period_day_end_3',
            'pay_target_period_day_end_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:pay_target_period_month_start_3,pay_target_period_day_start_3,pay_target_period_month_end_3,pay_target_period_year_start_3',
            'full_time_leave_days_3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,7}$/u',
            'paid_wage_amount_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'caregiver_leave_end_date_era' => 'nullable|string|max:2',
            'caregiver_leave_end_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:caregiver_leave_end_date_month,caregiver_leave_end_date_day',
            'caregiver_leave_end_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:caregiver_leave_end_date_year,caregiver_leave_end_date_year',
            'caregiver_leave_end_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:caregiver_leave_end_date_month,caregiver_leave_end_date_year',
            'caregiver_leave_end_reason' => 'nullable|string|max:255',
            'verification_date_era' => 'nullable|string|max:2',
            'verification_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'verification_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'verification_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'branch' => 'nullable|string|max:255',
            'entrepreneur_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'application_date_era' => 'string|max:2',
            'application_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'application_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'application_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'hello_work_destination' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            'bank_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            'bank_name_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー　]/u',
            'bank_head_office_branch_office_type' => 'nullable|string|max:2',
            'bank_code' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'bank_store_code' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'bank_account_no' => 'nullable|string|regex:/^[0-9]{1,13}$/u',
            'japan_post_bank_code_no' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'japan_post_bank_account_no' => 'nullable|string|regex:/^[0-9]{8}$/u',
            'wage_deadline_date' => 'nullable|int|between:1,99|regex:/^[0-9]{1,7}$/u',
            'wage_due_date_month' => 'nullable|string|max:2',
            'wage_due_date' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance_existence' => 'nullable|string|max:1',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:255',
            'note_main' => 'nullable|string|max:255',
            'creation_date_submission_agent' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_fullname' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employment_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　]+/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $employment_insured_date_era = $data['employment_insured_date_era'];
            $employment_insured_date_year = $data['employment_insured_date_year'];
            $employment_insured_date_month = $data['employment_insured_date_month'];
            $employment_insured_date_day = $data['employment_insured_date_day'];
            $caregiver_leave_start_date_era = $data['caregiver_leave_start_date_era'];
            $caregiver_leave_start_date_year = $data['caregiver_leave_start_date_year'];
            $caregiver_leave_start_date_month = $data['caregiver_leave_start_date_month'];
            $caregiver_leave_start_date_day = $data['caregiver_leave_start_date_day'];
            $care_target_family_birthday_era = $data['care_target_family_birthday_era'];
            $care_target_family_birthday_year = $data['care_target_family_birthday_year'];
            $care_target_family_birthday_month = $data['care_target_family_birthday_month'];
            $care_target_family_birthday_day = $data['care_target_family_birthday_day'];
            $pay_target_period_era_1 = $data['pay_target_period_era_1'];
            $pay_target_period_year_start_1 = $data['pay_target_period_year_start_1'];
            $pay_target_period_month_start_1 = $data['pay_target_period_month_start_1'];
            $pay_target_period_day_start_1 = $data['pay_target_period_day_start_1'];
            $pay_target_period_month_end_1 = $data['pay_target_period_month_end_1'];
            $pay_target_period_day_end_1 = $data['pay_target_period_day_end_1'];
            $pay_target_period_era_2 = $data['pay_target_period_era_2'];
            $pay_target_period_year_start_2 = $data['pay_target_period_year_start_2'];
            $pay_target_period_month_start_2 = $data['pay_target_period_month_start_2'];
            $pay_target_period_day_start_2 = $data['pay_target_period_day_start_2'];
            $pay_target_period_month_end_2 = $data['pay_target_period_month_end_2'];
            $pay_target_period_day_end_2 = $data['pay_target_period_day_end_2'];
            $pay_target_period_era_3 = $data['pay_target_period_era_3'];
            $pay_target_period_year_start_3 = $data['pay_target_period_year_start_3'];
            $pay_target_period_month_start_3 = $data['pay_target_period_month_start_3'];
            $pay_target_period_day_start_3 = $data['pay_target_period_day_start_3'];
            $pay_target_period_month_end_3 = $data['pay_target_period_month_end_3'];
            $pay_target_period_day_end_3 = $data['pay_target_period_day_end_3'];
            $caregiver_leave_end_date_era = $data['caregiver_leave_end_date_era'];
            $caregiver_leave_end_date_year = $data['caregiver_leave_end_date_year'];
            $caregiver_leave_end_date_month = $data['caregiver_leave_end_date_month'];
            $caregiver_leave_end_date_day = $data['caregiver_leave_end_date_day'];

            if(!empty($employment_insured_date_month) && !empty($employment_insured_date_day)){
                if (!checkdate($employment_insured_date_month, $employment_insured_date_day, '2000')) {
                    $validator->errors()->add('employment_insured_date_day','1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }

            if ($employment_insured_date_era === '平成') {
                if (
                    ($employment_insured_date_year == 1 && ($employment_insured_date_month < 1 || ($employment_insured_date_month == 1 && $employment_insured_date_day < 8))) ||
                    ($employment_insured_date_year == 31 && ($employment_insured_date_month > 4 || ($employment_insured_date_month == 4 && $employment_insured_date_day > 30))) ||
                    ($employment_insured_date_year > 31)
                ) {
                    $validator->errors()->add('employment_insured_date_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($employment_insured_date_era === '令和') {
                if ($employment_insured_date_year == 1 && ($employment_insured_date_month < 5 || ($employment_insured_date_month == 5 && $employment_insured_date_day < 1))) {
                    $validator->errors()->add('employment_insured_date_day', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }

            if(!empty($caregiver_leave_start_date_month) && !empty($caregiver_leave_start_date_day)){
                if (!checkdate($caregiver_leave_start_date_month, $caregiver_leave_start_date_day, '2000')) {
                    $validator->errors()->add('caregiver_leave_start_date_day','1枚目_介護休業開始年月日は正しい日付を入力してください。');
                }
            }

            if ($caregiver_leave_start_date_era === '平成') {
                if (
                    ($caregiver_leave_start_date_year == 1 && ($caregiver_leave_start_date_month < 1 || ($caregiver_leave_start_date_month == 1 && $caregiver_leave_start_date_day < 8))) ||
                    ($caregiver_leave_start_date_year == 31 && ($caregiver_leave_start_date_month > 4 || ($caregiver_leave_start_date_month == 4 && $caregiver_leave_start_date_day > 30))) ||
                    ($caregiver_leave_start_date_year > 31)
                ) {
                    $validator->errors()->add('caregiver_leave_start_date_day', '1枚目_介護休業開始年月日は正しい日付を入力してください。');
                }
            } elseif ($caregiver_leave_start_date_era === '令和') {
                if ($caregiver_leave_start_date_year == 1 && ($caregiver_leave_start_date_month < 5 || ($caregiver_leave_start_date_month == 5 && $caregiver_leave_start_date_day < 1))) {
                    $validator->errors()->add('caregiver_leave_start_date_day', '1枚目_介護休業開始年月日は正しい日付を入力してください。');
                }
            }
        
            if(!empty($care_target_family_birthday_month) && !empty($care_target_family_birthday_day)){
                if (!checkdate($care_target_family_birthday_month, $care_target_family_birthday_day, '2000')) {
                    $validator->errors()->add('care_target_family_birthday_day','1枚目_介護対象家族の生年月日は正しい日付を入力してください。');
                }
            }

            if ($care_target_family_birthday_era === '大正') {
                if (
                    ($care_target_family_birthday_year == 1 && $care_target_family_birthday_month < 7) ||
                    ($care_target_family_birthday_year == 15 && ($care_target_family_birthday_month == 12 && $care_target_family_birthday_day > 25)) ||
                    ($care_target_family_birthday_year > 15)
                ) {
                    $validator->errors()->add('birthday_day', '1枚目_介護対象家族の生年月日は正しい日付を入力してください。');
                }
            } elseif ($care_target_family_birthday_era === '平成') {
                if (
                    ($care_target_family_birthday_year == 1 && ($care_target_family_birthday_month < 1 || ($care_target_family_birthday_month == 1 && $care_target_family_birthday_day < 8))) ||
                    ($care_target_family_birthday_year == 31 && ($care_target_family_birthday_month > 4 || ($care_target_family_birthday_month == 4 && $care_target_family_birthday_day > 30))) ||
                    ($care_target_family_birthday_year > 31)
                ) {
                    $validator->errors()->add('care_target_family_birthday_day', '1枚目_介護対象家族の生年月日は正しい日付を入力してください。');
                }
            } elseif ($care_target_family_birthday_era === '令和') {
                if ($care_target_family_birthday_year == 1 && ($care_target_family_birthday_month < 5 || ($care_target_family_birthday_month == 5 && $care_target_family_birthday_day < 1))) {
                    $validator->errors()->add('care_target_family_birthday_day', '1枚目_介護対象家族の生年月日は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_start_1) && !empty($pay_target_period_day_start_1)){
                if (!checkdate($pay_target_period_month_start_1, $pay_target_period_day_start_1, '2000')) {
                    $validator->errors()->add('pay_target_period_day_start_1','1枚目_支給単位期間その１（初日）は正しい日付を入力してください。');
                }
            }

            if ($pay_target_period_era_1 === '平成') {
                if (
                    ($pay_target_period_year_start_1 == 1 && ($pay_target_period_month_start_1 < 1 || ($pay_target_period_month_start_1 == 1 && $pay_target_period_day_start_1 < 8))) ||
                    ($pay_target_period_year_start_1 == 31 && ($pay_target_period_month_start_1 > 4 || ($pay_target_period_month_start_1 == 4 && $pay_target_period_day_start_1 > 30))) ||
                    ($pay_target_period_year_start_1 > 31)
                ) {
                    $validator->errors()->add('pay_target_period_day_start_1', '1枚目_支給単位期間その１（初日）は正しい日付を入力してください。');
                }
            } elseif ($pay_target_period_era_1 === '令和') {
                if ($pay_target_period_year_start_1 == 1 && ($pay_target_period_month_start_1 < 5 || ($pay_target_period_month_start_1 == 5 && $pay_target_period_day_start_1 < 1))) {
                    $validator->errors()->add('pay_target_period_day_start_1', '1枚目_支給単位期間その１（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_1) && !empty($pay_target_period_day_end_1)){
                if (!checkdate($pay_target_period_month_end_1, $pay_target_period_day_end_1, '2000')) {
                    $validator->errors()->add('pay_target_period_day_end_1','1枚目_支給単位期間その１（末日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_1) && !empty($pay_target_period_day_end_1) && !empty($pay_target_period_day_start_1) && !empty($pay_target_period_month_start_1)){
                if ($pay_target_period_month_end_1 === $pay_target_period_month_start_1) {
                    if($pay_target_period_day_start_1 > $pay_target_period_day_end_1){
                        $validator->errors()->add('pay_target_period_day_end_1','1枚目_支給単位期間その１（末日）は1枚目_支給単位期間その１（初日）以降を入力してください。');
                    }
                } elseif ($pay_target_period_month_start_1 > $pay_target_period_month_end_1){
                    $validator->errors()->add('pay_target_period_day_end_1','1枚目_支給単位期間その１（末日）は1枚目_支給単位期間その１（初日）以降を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_start_2) && !empty($pay_target_period_day_start_2)){
                if (!checkdate($pay_target_period_month_start_2, $pay_target_period_day_start_2, '2000')) {
                    $validator->errors()->add('pay_target_period_day_start_2','1枚目_支給単位期間その２（初日）は正しい日付を入力してください。');
                }
            }

            if ($pay_target_period_era_2 === '平成') {
                if (
                    ($pay_target_period_year_start_2 == 1 && ($pay_target_period_month_start_2 < 1 || ($pay_target_period_month_start_2 == 1 && $pay_target_period_day_start_2 < 8))) ||
                    ($pay_target_period_year_start_2 == 31 && ($pay_target_period_month_start_2 > 4 || ($pay_target_period_month_start_2 == 4 && $pay_target_period_day_start_2 > 30))) ||
                    ($pay_target_period_year_start_2 > 31)
                ) {
                    $validator->errors()->add('pay_target_period_day_start_2', '1枚目_支給単位期間その２（初日）は正しい日付を入力してください。');
                }
            } elseif ($pay_target_period_era_2 === '令和') {
                if ($pay_target_period_year_start_2 == 1 && $pay_target_period_month_start_2 < 5) {
                    $validator->errors()->add('pay_target_period_day_start_2', '1枚目_支給単位期間その２（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_2) && !empty($pay_target_period_day_end_2)){
                if (!checkdate($pay_target_period_month_end_2, $pay_target_period_day_end_2, '2000')) {
                    $validator->errors()->add('pay_target_period_day_end_2','1枚目_支給単位期間その２（末日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_2) && !empty($pay_target_period_day_end_2) && !empty($pay_target_period_day_start_2) && !empty($pay_target_period_month_start_2)){
                if ($pay_target_period_month_end_2 === $pay_target_period_month_start_2) {
                    if($pay_target_period_day_start_2 > $pay_target_period_day_end_2){
                        $validator->errors()->add('pay_target_period_day_end_2','1枚目_支給単位期間その２（末日）は1枚目_支給単位期間その２（初日）以降を入力してください。');
                    }
                } elseif ($pay_target_period_month_start_2 > $pay_target_period_month_end_2){
                    $validator->errors()->add('pay_target_period_day_end_2','1枚目_支給単位期間その２（末日）は1枚目_支給単位期間その２（初日）以降を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_start_3) && !empty($pay_target_period_day_start_3)){
                if (!checkdate($pay_target_period_month_start_3, $pay_target_period_day_start_3, '2000')) {
                    $validator->errors()->add('pay_target_period_day_start_3','1枚目_支給単位期間その３（初日）は正しい日付を入力してください。');
                }
            }

            if ($pay_target_period_era_3 === '平成') {
                if (
                    ($pay_target_period_year_start_3 == 1 && ($pay_target_period_month_start_3 < 1 || ($pay_target_period_month_start_3 == 1 && $pay_target_period_day_start_3 < 8))) ||
                    ($pay_target_period_year_start_3 == 31 && ($pay_target_period_month_start_3 > 4 || ($pay_target_period_month_start_3 == 4 && $pay_target_period_day_start_3 > 30))) ||
                    ($pay_target_period_year_start_3 > 31)
                ) {
                    $validator->errors()->add('pay_target_period_day_start_3', '1枚目_支給単位期間その３（初日）は正しい日付を入力してください。');
                }
            } elseif ($pay_target_period_era_3 === '令和') {
                if ($pay_target_period_year_start_3 == 1 && $pay_target_period_month_start_3 < 5) {
                    $validator->errors()->add('pay_target_period_day_start_3', '1枚目_支給単位期間その３（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_3) && !empty($pay_target_period_day_end_3)){
                if (!checkdate($pay_target_period_month_end_3, $pay_target_period_day_end_3, '2000')) {
                    $validator->errors()->add('pay_target_period_day_end_3','1枚目_支給単位期間その３（末日）は正しい日付を入力してください。');
                }
            }

            if(!empty($pay_target_period_month_end_3) && !empty($pay_target_period_day_end_3) && !empty($pay_target_period_day_start_3) && !empty($pay_target_period_month_start_3)){
                if ($pay_target_period_month_end_3 === $pay_target_period_month_start_3) {
                    if($pay_target_period_day_start_3 > $pay_target_period_day_end_3){
                        $validator->errors()->add('pay_target_period_day_end_3','1枚目_支給単位期間その３（末日）は1枚目_支給単位期間その３（初日）以降を入力してください。');
                    }
                } elseif ($pay_target_period_month_start_3 > $pay_target_period_month_end_3){
                    $validator->errors()->add('pay_target_period_day_end_3','1枚目_支給単位期間その３（末日）は1枚目_支給単位期間その３（初日）以降を入力してください。');
                }
            }

            if(!empty($caregiver_leave_end_date_month) && !empty($caregiver_leave_end_date_day)){
                if (!checkdate($caregiver_leave_end_date_month, $caregiver_leave_end_date_day, '2000')) {
                    $validator->errors()->add('caregiver_leave_end_date_day3','1枚目_介護休業終了年月日は正しい日付を入力してください。');
                }
            }

            if ($caregiver_leave_end_date_era === '平成') {
                if (
                    ($caregiver_leave_end_date_year == 1 && ($caregiver_leave_end_date_month < 1 || ($caregiver_leave_end_date_month == 1 && $caregiver_leave_end_date_day < 8))) ||
                    ($caregiver_leave_end_date_year == 31 && ($caregiver_leave_end_date_month > 4 || ($caregiver_leave_end_date_month == 4 && $caregiver_leave_end_date_day > 30))) ||
                    ($caregiver_leave_end_date_year > 33)
                ) {
                    $validator->errors()->add('caregiver_leave_end_date_day3', '1枚目_介護休業終了年月日は正しい日付を入力してください。');
                }
            } elseif ($caregiver_leave_end_date_era === '令和') {
                if ($caregiver_leave_end_date_year == 1 && $caregiver_leave_end_date_month < 5) {
                    $validator->errors()->add('caregiver_leave_end_date_day3', '1枚目_介護休業終了年月日は正しい日付を入力してください。');
                }
            }

            if ($this->hasFile('file_nursing_facts')) {
                $totalSize += $this->file('file_nursing_facts')->getSize();
            }
            if ($this->hasFile('file_nursing_care_recipient')) {
                $totalSize += $this->file('file_nursing_care_recipient')->getSize();
            }
            if ($this->hasFile('file_wage_payment_status')) {
                $totalSize += $this->file('file_wage_payment_status')->getSize();
            }
            if ($this->hasFile('file_closing_starts')) {
                $totalSize += $this->file('file_closing_starts')->getSize();
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
            'pay_target_period_year_start_2.required_with' => '1枚目_支給単位期間その２（初日）_年を入力してください。',
            'pay_target_period_month_start_2.required_with' => '1枚目_支給単位期間その２（初日）_月を入力してください。',
            'pay_target_period_day_start_2.required_with' => '1枚目_支給単位期間その２（初日）_日を入力してください。',
            'pay_target_period_month_end_2.required_with' => '1枚目_支給単位期間その２（末日）_月を入力してください。',
            'pay_target_period_day_end_2.required_with' => '1枚目_支給単位期間その２（末日）_日を入力してください。',
            'pay_target_period_year_start_3.required_with' => '1枚目_支給単位期間その３（初日）_年を入力してください。',
            'pay_target_period_month_start_3.required_with' => '1枚目_支給単位期間その３（初日）_月を入力してください。',
            'pay_target_period_day_start_3.required_with' => '1枚目_支給単位期間その３（初日）_日を入力してください。',
            'pay_target_period_month_end_3.required_with' => '1枚目_支給単位期間その３（末日）_月を入力してください。',
            'pay_target_period_day_end_3.required_with' => '1枚目_支給単位期間その３（末日）_日を入力してください。',
            'caregiver_leave_end_date_year.required_with' => '1枚目_介護休業終了年月日_年を入力してください。',
            'caregiver_leave_end_date_month.required_with' => '1枚目_介護休業終了年月日_月を入力してください。',
            'caregiver_leave_end_date_day.required_with' => '1枚目_介護休業終了年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "file_nursing_facts" => '添付ファイル_介護の事実が確認できる書類',
            "file_nursing_care_recipient" => '添付ファイル_介護対象家族の氏名、申請者本人との続柄、性別、生年月日が確認できる書類',
            "file_wage_payment_status" => '添付ファイル_休業開始時賃金月額証明書に記載された賃金支払い状況の内容が確認できる書類',
            "file_closing_starts" => '添付ファイル_雇用保険被保険者休業開始時賃金月額証明票',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'employment_mynumber_card_no' => '1枚目_介護休業被保険者の個人番号',
            'employment_insured_no_4' => '1枚目_被保険者番号4桁',
            'employment_insured_no_6' => '1枚目_被保険者番号6桁',
            'employment_insured_no_cd' => '1枚目_被保険者番号1桁',
            'employment_insured_date_era' => '1枚目_資格取得年月日_年号',
            'employment_insured_date_year' => '1枚目_資格取得年月日_年',
            'employment_insured_date_month' => '1枚目_資格取得年月日_月',
            'employment_insured_date_day' => '1枚目_資格取得年月日_日',
            'employment_fullname' => '1枚目_被保険者氏名',
            'employment_fullname_kana' => '1枚目_フリガナ（カタカナ）',
            'insurance_office_no_4' => '1枚目_事業所番号4桁',
            'insurance_office_no_6' => '1枚目_事業所番号6桁',
            'insurance_office_no_cd' => '1枚目_事業所番号1桁',
            'employment_lastname' => '1枚目_姓（漢字）',
            'employment_firstname' => '1枚目_名（漢字）',
            'caregiver_leave_start_date_era' => '1枚目_介護休業開始年月日_年号',
            'caregiver_leave_start_date_year' => '1枚目_介護休業開始年月日_年',
            'caregiver_leave_start_date_month' => '1枚目_介護休業開始年月日_月',
            'caregiver_leave_start_date_day' => '1枚目_介護休業開始年月日_日',
            'dependent_mynumber_card_no' => '1枚目_介護対象家族の個人番号',
            'dependent_lastname_kana' => '1枚目_介護対象家族の姓（カタカナ）',
            'dependent_firstname_kana' => '1枚目_介護対象家族の名（カタカナ）',
            'dependent_sex' => '1枚目_介護対象家族の性別',
            'dependent_relationship' => '1枚目_介護対象家族の続柄',
            'dependent_lastname' => '1枚目_介護対象家族の姓',
            'dependent_firstname' => '1枚目_介護対象家族の名',
            'care_target_family_birthday_era' => '1枚目_介護対象家族の生年月日_年号',
            'care_target_family_birthday_year' => '1枚目_介護対象家族の生年月日_年',
            'care_target_family_birthday_month' => '1枚目_介護対象家族の生年月日_月',
            'care_target_family_birthday_day' => '1枚目_介護対象家族の生年月日_日',
            'pay_target_period_era_1' => '1枚目_支給対象期間その１（初日－末日）_初日_年号',
            'pay_target_period_year_start_1' => '1枚目_支給対象期間その１（初日－末日）_初日_年',
            'pay_target_period_month_start_1' => '1枚目_支給対象期間その１（初日－末日）_初日_月',
            'pay_target_period_day_start_1' => '1枚目_支給対象期間その１（初日－末日）_初日_日',
            'pay_target_period_month_end_1' => '1枚目_支給対象期間その１（初日－末日）_末日_月',
            'pay_target_period_day_end_1' => '1枚目_支給対象期間その１（初日－末日）_末日_日',
            'full_time_leave_days_1' => '1枚目_全日休業日数その１',
            'paid_wage_amount_1' => '1枚目_支払われた賃金額その１',
            'pay_target_period_era_2' => '1枚目_支給対象期間その２（初日－末日）_初日_年号',
            'pay_target_period_year_start_2' => '1枚目_支給対象期間その２（初日－末日）_初日_年',
            'pay_target_period_month_start_2' => '1枚目_支給対象期間その２（初日－末日）_初日_月',
            'pay_target_period_day_start_2' => '1枚目_支給対象期間その２（初日－末日）_初日_日',
            'pay_target_period_month_end_2' => '1枚目_支給対象期間その２（初日－末日）_末日_月',
            'pay_target_period_day_end_2' => '1枚目_支給対象期間その２（初日－末日）_末日_日',
            'full_time_leave_days_2' => '1枚目_全日休業日数その２',
            'paid_wage_amount_2' => '1枚目_支払われた賃金額_その２',
            'pay_target_period_era_3' => '1枚目_支給対象期間その３（初日－末日）_初日_年号',
            'pay_target_period_year_start_3' => '1枚目_支給対象期間その３（初日－末日）_初日_年',
            'pay_target_period_month_start_3' => '1枚目_支給対象期間その３（初日－末日）_初日_月',
            'pay_target_period_day_start_3' => '1枚目_支給対象期間その３（初日－末日）_初日_日',
            'pay_target_period_month_end_3' => '1枚目_支給対象期間その３（初日－末日）_末日_月',
            'pay_target_period_day_end_3' => '1枚目_支給対象期間その３（初日－末日）_末日_日',
            'full_time_leave_days_3' => '1枚目_全日休業日数その３',
            'paid_wage_amount_3' => '1枚目_支払われた賃金額_その３',
            'caregiver_leave_end_date_era' => '1枚目_介護休業終了年月日_年号',
            'caregiver_leave_end_date_year' => '1枚目_介護休業終了年月日_年',
            'caregiver_leave_end_date_month' => '1枚目_介護休業終了年月日_月',
            'caregiver_leave_end_date_day' => '1枚目_介護休業終了年月日_日',
            'caregiver_leave_end_reason' => '1枚目_終了事由',
            'verification_date_era' => '1枚目_証明年月日_年号',
            'verification_date_year' => '1枚目_証明年月日_年',
            'verification_date_month' => '1枚目_証明年月日_月',
            'verification_date_day' => '1枚目_証明年月日_日',
            'branch' => '1枚目_事業所名（所在地・電話番号）',
            'entrepreneur_name' => '1枚目_事業主氏名',
            'application_date_era' => '1枚目_申請年月日_年号',
            'application_date_year' => '1枚目_申請年月日_年',
            'application_date_month' => '1枚目_申請年月日_月',
            'application_date_day' => '1枚目_申請年月日_日',
            'hello_work_destination' => '1枚目_公共職業安定所名',
            'bank_name' => '1枚目_銀行名称',
            'bank_name_kana' => '1枚目_銀行名称_（カタカナ）',
            'bank_head_office_branch_office_type' => '1枚目_本店支店区分',
            'bank_code' => '1枚目_金融機関コード',
            'bank_store_code' => '1枚目_店舗コード',
            'bank_account_no' => '1枚目_銀行等(ゆうちょ以外)_口座番号',
            'japan_post_bank_code_no' => '1枚目_ゆうちょ銀行_記号',
            'japan_post_bank_account_no' => '1枚目_ゆうちょ銀行_番号',
            'wage_deadline_date' => '1枚目_賃金締切日',
            'wage_due_date_month' => '1枚目_賃金支払日_当翌月',
            'wage_due_date' => '1枚目_賃金支払日_日',
            'commuting_allowance_existence' => '1枚目_通勤手当_有無',
            'commuting_allowance_period' => '1枚目_通勤手当_期間',
            'commuting_allowance_period_other' => '1枚目_通勤手当_期間_その他',
            'note_main' => '1枚目_備考',
            'creation_date_submission_agent' => '1枚目_社会保険労務士記載欄_作成年月日･提出代行者･事務代理者の表示',
            'labor_consultant_fullname' => '1枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_treacode' => '1枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '1枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '1枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'employment_address' => '1枚目_申請者住所',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
