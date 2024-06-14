<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuranceChildcareLeaveApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'S');
        }
        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'S');
        }
        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'S');
        }
        if (isset($data['labor_consultant_acting_as_agent_name'])) {
            $data['labor_consultant_acting_as_agent_name'] = mb_convert_kana($data['labor_consultant_acting_as_agent_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "file_amount_days_time" => 'required_unless:radio_file_amount_days_time,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_written_consent" => 'required_if:radio_file_written_consent,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_extension_reason" => 'required_if:radio_file_extension_reason,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse" => 'required_if:radio_file_spouse,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse_childcare_leave" => 'required_if:radio_file_spouse_childcare_leave,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'ledger_type' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'required|string|max:2',
            'qualifications_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_japan_era' => 'required|string|max:2',
            'childcare_start_date_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_insurance_office_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'jurisdiction' => 'nullable|int|regex:/^[0-9]{1}$/u',
            'birth_date_japan_era' => 'nullable|string|max:2',
            'birth_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:birth_date_month,birth_date_day',
            'birth_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:birth_date_japan_era_year,birth_date_day',
            'birth_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:birth_date_month,birth_date_japan_era_year',
            'fullname' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'payer_japan_era1' => 'required|string|max:2',
            'payer_japan_era_year1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day1' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payer_end_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_end_day1' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:payer_month2,payer_day2,payer_month_end2,payer_day_end2',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:payer_japan_era_year2,payer_day2,payer_month_end2,payer_day_end2',
            'payer_day2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:payer_japan_era_year2,payer_month2,payer_month_end2,payer_day_end2',
            'payer_month_end2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:payer_japan_era_year2,payer_month2,payer_day2,payer_day_end2',
            'payer_day_end2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:payer_japan_era_year2,payer_month2,payer_day2,payer_month_end2',
            'workday_count2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'last_payer_japan_era' => 'nullable|string|max:2',
            'last_payer_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:last_payer_month,last_payer_japan_day,last_payer_end_month,last_payer_end_day',
            'last_payer_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:last_payer_japan_era_year,last_payer_japan_day,last_payer_end_month,last_payer_end_day',
            'last_payer_japan_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:last_payer_month,last_payer_japan_era_year,last_payer_end_month,last_payer_end_day',
            'last_payer_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:last_payer_month,last_payer_japan_day,last_payer_japan_era_year,last_payer_end_day',
            'last_payer_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:last_payer_month,last_payer_japan_day,last_payer_end_month,last_payer_japan_era_year',
            'workday_count3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:return_from_resignation_month,return_from_resignation_day',
            'return_from_resignation_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:return_from_resignation_japan_era_year,return_from_resignation_day',
            'return_from_resignation_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:return_from_resignation_japan_era_year,return_from_resignation_month',
            'payment_period_extension_reason' => 'nullable|int|between:1,6|regex:/^[0-6]{1}$/u',
            'payment_period_extension_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:payment_period_extension_month,payment_period_extension_day,payment_period_extension_end_month,payment_period_extension_end_day',
            'payment_period_extension_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:payment_period_extension_japan_era_year,payment_period_extension_day,payment_period_extension_end_month,payment_period_extension_end_day',
            'payment_period_extension_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:payment_period_extension_japan_era_year,payment_period_extension_month,payment_period_extension_end_month,payment_period_extension_end_day',
            'payment_period_extension_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:payment_period_extension_japan_era_year,payment_period_extension_month,payment_period_extension_day,payment_period_extension_end_day',
            'payment_period_extension_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:payment_period_extension_japan_era_year,payment_period_extension_month,payment_period_extension_day,payment_period_extension_end_month',
            'partner_childcare_leave_taken' => 'nullable|int|regex:/^1$/u',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'today_japan_era' => 'required|string|max:2',
            'today_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            'headquarters_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'destination' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥々０-Ａ-Ｚ　]+\z/u',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'wage_deadline' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:4',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance_period' => 'nullable|string|max:4',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'unsettled_japan_era' => 'nullable|string|max:2',
            'unsettled_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_if:unsettled_month,unsettled_day',
            'unsettled_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_if:unsettled_japan_era_year,unsettled_day',
            'unsettled_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_if:unsettled_month,unsettled_japan_era_year',
            'note' => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator)
    {
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
            $payer_japan_era1 = $data['payer_japan_era1'] ?? "";
            $payer_japan_era_year1 = $data['payer_japan_era_year1'] ?? "";
            $payer_month1 = $data['payer_month1'] ?? "";
            $payer_day1 = $data['payer_day1'] ?? "";
            $payer_end_month1 = $data['payer_end_month1'] ?? "";
            $payer_end_day1 = $data['payer_end_day1'] ?? "";
            $payer_japan_era2 = $data['payer_japan_era2'] ?? "";
            $payer_japan_era_year2 = $data['payer_japan_era_year2'] ?? "";
            $payer_month2 = $data['payer_month2'] ?? "";
            $payer_day2 = $data['payer_day2'] ?? "";
            $payer_end_month2 = $data['payer_end_month2'] ?? "";
            $payer_end_day2 = $data['payer_end_day2'] ?? "";
            $payment_period_last_japan_era = $data['last_payer_japan_era'] ?? "";
            $payment_period_last_japan_era_year = $data['last_payer_japan_era_year'] ?? "";
            $payment_period_last_month = $data['last_payer_month'] ?? "";
            $payment_period_last_day = $data['last_payer_japan_day'] ?? "";
            $payment_period_last_month_end = $data['last_payer_end_month'] ?? "";
            $payment_period_last_day_end = $data['last_payer_end_day'] ?? "";
            $return_from_resignation_date_japan_era = $data['return_from_resignation_japan_era'] ?? "";
            $return_from_resignation_date_japan_era_year = $data['return_from_resignation_japan_era_year'] ?? "";
            $return_from_resignation_date_month = $data['return_from_resignation_month'] ?? "";
            $return_from_resignation_date_day = $data['return_from_resignation_day'] ?? "";
            $payment_period_extension_japan_era = $data['payment_period_extension_japan_era'] ?? "";
            $payment_period_extension_japan_era_year = $data['payment_period_extension_japan_era_year'] ?? "";
            $payment_period_extension_month = $data['payment_period_extension_month'] ?? "";
            $payment_period_extension_day = $data['payment_period_extension_day'] ?? "";
            $payment_period_extension_last_month = $data['payment_period_extension_end_month'] ?? "";
            $payment_period_extension_last_day = $data['payment_period_extension_end_day'] ?? "";
            $unsettled_japan_era = $data['unsettled_japan_era'] ?? "";
            $unsettled_japan_era_year = $data['unsettled_japan_era_year'] ?? "";
            $unsettled_month = $data['unsettled_month'] ?? "";
            $unsettled_day = $data['unsettled_day'] ?? "";

            if(!empty($qualifications_month) && !empty($qualifications_day)){
                if(ctype_digit($qualifications_month)){
                    if (!checkdate($qualifications_month, $qualifications_day, '2000')) {
                    $validator->errors()->add('qualifications_day','資格取得年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($qualifications_japan_era === '昭和') {
                if (
                    ($qualifications_japan_era_year == 1 && ($qualifications_month < 12 || ($qualifications_month == 12 && $qualifications_day < 25))) ||
                    ($qualifications_japan_era_year == 64 && ($qualifications_month > 1 || ($qualifications_month == 1 && $qualifications_day > 7))) ||
                    ($qualifications_japan_era_year > 64)
                ) {
                    $validator->errors()->add('qualifications_day', '資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualifications_japan_era === '平成') {
                if (
                    ($qualifications_japan_era_year == 1 && ($qualifications_month < 1 || ($qualifications_month == 1 && $qualifications_day < 8))) ||
                    ($qualifications_japan_era_year == 31 && ($qualifications_month > 4 || ($qualifications_month == 4 && $qualifications_day > 30))) ||
                    ($qualifications_japan_era_year > 31)
                ) {
                    $validator->errors()->add('qualifications_day', '資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualifications_japan_era === '令和') {
                if ($qualifications_japan_era_year == 1 && ($qualifications_month < 5 || ($qualifications_month == 5 && $qualifications_day < 1))) {
                    $validator->errors()->add('qualifications_day', '資格取得年月日は正しい日付を入力してください。');
                }
            }

            if(!empty($childcare_start_date_month) && !empty($childcare_start_date_day)){
                if(ctype_digit($childcare_start_date_month)){
                    if (!checkdate($childcare_start_date_month, $childcare_start_date_day, '2000')) {
                    $validator->errors()->add('childcare_start_date_day','育児休業開始年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($childcare_start_date_japan_era === '平成') {
                if (
                    ($childcare_start_date_japan_era_year == 1 && ($childcare_start_date_month < 1 || ($childcare_start_date_month == 1 && $childcare_start_date_day < 8))) ||
                    ($childcare_start_date_japan_era_year == 31 && ($childcare_start_date_month > 4 || ($childcare_start_date_month == 4 && $childcare_start_date_day > 30))) ||
                    ($childcare_start_date_japan_era_year > 31)
                ) {
                    $validator->errors()->add('childcare_start_date_day', '育児休業開始年月日は正しい日付を入力してください。');
                }
            } elseif ($childcare_start_date_japan_era === '令和') {
                if ($childcare_start_date_japan_era_year == 1 && ($childcare_start_date_month < 5 || ($childcare_start_date_month == 5 && $childcare_start_date_day < 1))) {
                    $validator->errors()->add('childcare_start_date_day', '育児休業開始年月日は正しい日付を入力してください。');
                }
            }
        
            if(!empty($birth_date_month) && !empty($birth_date_day)){
                if(ctype_digit($birth_date_month)){
                    if (!checkdate($birth_date_month, $birth_date_day, '2000')) {
                    $validator->errors()->add('birth_date_day','出産年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($birth_date_japan_era === '平成') {
                if (
                    ($birth_date_japan_era_year == 1 && ($birth_date_month < 1 || ($birth_date_month == 1 && $birth_date_day < 8))) ||
                    ($birth_date_japan_era_year == 31 && ($birth_date_month > 4 || ($birth_date_month == 4 && $birth_date_day > 30))) ||
                    ($birth_date_japan_era_year > 31)
                ) {
                    $validator->errors()->add('birth_date_day', '出産年月日は正しい日付を入力してください。');
                }
            } elseif ($birth_date_japan_era === '令和') {
                if ($birth_date_japan_era_year == 1 && ($birth_date_month < 5 || ($birth_date_month == 5 && $birth_date_day < 1))) {
                    $validator->errors()->add('birth_date_day', '出産年月日は正しい日付を入力してください。');
                }
            }

            if(!empty($payer_month1) && !empty($payer_day1)){
                if(ctype_digit($payer_month1)){
                    if (!checkdate($payer_month1, $payer_day1, '2000')) {
                    $validator->errors()->add('payer_day1','支給単位期間その１（初日）は正しい日付を入力してください。');
                    }
                }
            }

            if ($payer_japan_era1 === '平成') {
                if (
                    ($payer_japan_era_year1 == 1 && ($payer_month1 < 1 || ($payer_month1 == 1 && $payer_day1 < 8))) ||
                    ($payer_japan_era_year1 == 31 && ($payer_month1 > 4 || ($payer_month1 == 4 && $payer_day1 > 30))) ||
                    ($payer_japan_era_year1 > 31)
                ) {
                    $validator->errors()->add('payer_day1', '支給単位期間その１（初日）は正しい日付を入力してください。');
                }
            } elseif ($payer_japan_era1 === '令和') {
                if ($payer_japan_era_year1 == 1 && ($payer_month1 < 5 || ($payer_month1 == 5 && $payer_day1 < 1))) {
                    $validator->errors()->add('payer_day1', '支給単位期間その１（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($payer_end_month1) && !empty($payer_end_day1)){
                if(ctype_digit($payer_end_month1)){
                    if (!checkdate($payer_end_month1, $payer_end_day1, '2000')) {
                    $validator->errors()->add('payer_end_day1','支給単位期間その１（末日）は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($payer_end_month1) && !empty($payer_end_day1) && !empty($payer_day1) && !empty($payer_month1)){
                if ($payer_end_month1 === $payer_month1) {
                    if($payer_day1 > $payer_end_day1){
                        $validator->errors()->add('payer_end_day1','支給単位期間その１（末日）は支給単位期間その１（初日）以降を入力してください。');
                    }
                } elseif ($payer_month1 > $payer_end_month1){
                    $validator->errors()->add('payer_end_day1','支給単位期間その１（末日）は支給単位期間その１（初日）以降を入力してください。');
                }
            }

            if(!empty($payer_month2) && !empty($payer_day2)){
                if(ctype_digit($payer_month2)){
                    if (!checkdate($payer_month2, $payer_day2, '2000')) {
                    $validator->errors()->add('payer_day2','支給単位期間その２（初日）は正しい日付を入力してください。');
                    }
                }
            }

            if ($payer_japan_era2 === '平成') {
                if (
                    ($payer_japan_era_year2 == 1 && ($payer_month2 < 1 || ($payer_month2 == 1 && $payer_day2 < 8))) ||
                    ($payer_japan_era_year2 == 31 && ($payer_month2 > 4 || ($payer_month2 == 4 && $payer_day2 > 30))) ||
                    ($payer_japan_era_year2 > 31)
                ) {
                    $validator->errors()->add('payer_day2', '支給単位期間その２（初日）は正しい日付を入力してください。');
                }
            } elseif ($payer_japan_era2 === '令和') {
                if ($payer_japan_era_year2 == 1 && $payer_month2 < 5) {
                    $validator->errors()->add('payer_day2', '支給単位期間その２（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($payer_end_month2) && !empty($payer_end_day2)){
                if(ctype_digit($payer_end_month2)){
                    if (!checkdate($payer_end_month2, $payer_end_day2, '2000')) {
                    $validator->errors()->add('payer_end_day2','支給単位期間その２（末日）は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($payer_end_month2) && !empty($payer_end_day2) && !empty($payer_day2) && !empty($payer_month2)){
                if ($payer_end_month2 === $payer_month2) {
                    if($payer_day2 > $payer_end_day2){
                        $validator->errors()->add('payer_end_day2','支給単位期間その２（末日）は支給単位期間その２（初日）以降を入力してください。');
                    }
                } elseif ($payer_month2 > $payer_end_month2){
                    $validator->errors()->add('payer_end_day2','支給単位期間その２（末日）は支給単位期間その２（初日）以降を入力してください。');
                }
            }

            if(!empty($payment_period_last_month) && !empty($payment_period_last_day)){
                if(ctype_digit($payment_period_last_month)){
                    if (!checkdate($payment_period_last_month, $payment_period_last_day, '2000')) {
                    $validator->errors()->add('payment_period_last_day','最終支給単位期間（初日）は正しい日付を入力してください。');
                    }
                }
            }

            if ($payment_period_last_japan_era === '平成') {
                if (
                    ($payment_period_last_japan_era_year == 1 && ($payment_period_last_month < 1 || ($payment_period_last_month == 1 && $payment_period_last_day < 8))) ||
                    ($payment_period_last_japan_era_year == 31 && ($payment_period_last_month > 4 || ($payment_period_last_month == 4 && $payment_period_last_day > 30))) ||
                    ($payment_period_last_japan_era_year > 31)
                ) {
                    $validator->errors()->add('payment_period_last_day', '最終支給単位期間（初日）は正しい日付を入力してください。');
                }
            } elseif ($payment_period_last_japan_era === '令和') {
                if ($payment_period_last_japan_era_year == 1 && ($payment_period_last_month < 5)) {
                    $validator->errors()->add('payment_period_last_day', '最終支給単位期間（初日）は正しい日付を入力してください。');
                }
            }

            if(!empty($payment_period_last_month_end) && !empty($payment_period_last_day_end)){
                if(ctype_digit($payment_period_last_month_end)){
                    if (!checkdate($payment_period_last_month_end, $payment_period_last_day_end, '2000')) {
                    $validator->errors()->add('payment_period_last_day_end','最終支給単位期間（末日）は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($payment_period_last_month_end) && !empty($payment_period_last_day_end) && !empty($payment_period_last_day) && !empty($payment_period_last_month)){
                if ($payment_period_last_month_end === $payment_period_last_month) {
                    if($payment_period_last_day > $payment_period_last_day_end){
                        $validator->errors()->add('payment_period_last_day_end','最終支給単位期間（末日）は最終支給単位期間（初日）以降を入力してください。');
                    }
                } elseif ($payment_period_last_month > $payment_period_last_month_end){
                    $validator->errors()->add('payment_period_last_day_end','最終支給単位期間（末日）は最終支給単位期間（初日）以降を入力してください。');
                }
            }

            if(!empty($return_from_resignation_date_month) && !empty($return_from_resignation_date_day)){
                if(ctype_digit($return_from_resignation_date_month)){
                    if (!checkdate($return_from_resignation_date_month, $return_from_resignation_date_day, '2000')) {
                    $validator->errors()->add('return_from_resignation_date_day3','職場復帰年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($return_from_resignation_date_japan_era === '平成') {
                if (
                    ($return_from_resignation_date_japan_era_year == 1 && ($return_from_resignation_date_month < 1 || ($return_from_resignation_date_month == 1 && $return_from_resignation_date_day < 8))) ||
                    ($return_from_resignation_date_japan_era_year == 31 && ($return_from_resignation_date_month > 4 || ($return_from_resignation_date_month == 4 && $return_from_resignation_date_day > 30))) ||
                    ($return_from_resignation_date_japan_era_year > 33)
                ) {
                    $validator->errors()->add('return_from_resignation_date_day3', '職場復帰年月日は正しい日付を入力してください。');
                }
            } elseif ($return_from_resignation_date_japan_era === '令和') {
                if ($return_from_resignation_date_japan_era_year == 1 && $return_from_resignation_date_month < 5) {
                    $validator->errors()->add('return_from_resignation_date_day3', '職場復帰年月日は正しい日付を入力してください。');
                }
            }
            
            if(!empty($payment_period_extension_month) && !empty($payment_period_extension_day)){
                if(ctype_digit($payment_period_extension_month)){
                    if (!checkdate($payment_period_extension_month, $payment_period_extension_day, '2000')) {
                    $validator->errors()->add('payment_period_extension_day','支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                    }
                }
            }

            if ($payment_period_extension_japan_era === '平成') {
                if (
                    ($payment_period_extension_japan_era_year == 1 && ($payment_period_extension_month < 1 || ($payment_period_extension_month == 1 && $payment_period_extension_day < 8))) ||
                    ($payment_period_extension_japan_era_year == 31 && ($payment_period_extension_month > 4 || ($payment_period_extension_month == 4 && $payment_period_extension_day > 30))) ||
                    ($payment_period_extension_japan_era_year > 31)
                ) {
                    $validator->errors()->add('payment_period_extension_day', '支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                }
            } elseif ($payment_period_extension_japan_era === '令和') {
                if ($payment_period_extension_japan_era_year == 1 && $payment_period_extension_month < 5) {
                    $validator->errors()->add('payment_period_extension_day', '支給対象となる期間の延長事由－期間_開始日付は正しい日付を入力してください。');
                }
            }

            if(!empty($payment_period_extension_last_month) && !empty($payment_period_extension_last_day)){
                if(ctype_digit($payment_period_extension_last_month)){
                    if (!checkdate($payment_period_extension_last_month, $payment_period_extension_last_day, '2000')) {
                    $validator->errors()->add('payment_period_extension_last_day','支給対象となる期間の延長事由－期間_終了日付は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($payment_period_extension_last_month) && !empty($payment_period_extension_last_day) && !empty($payment_period_extension_day) && !empty($payment_period_extension_month)){
                if ($payment_period_extension_last_month === $payment_period_extension_month) {
                    if($payment_period_extension_day > $payment_period_extension_last_day){
                        $validator->errors()->add('payment_period_extension_last_day','支給対象となる期間の延長事由－期間_終了日付は支給対象となる期間の延長事由－期間_開始日付以降を入力してください。');
                    }
                } elseif ($payment_period_extension_month > $payment_period_extension_last_month){
                    $validator->errors()->add('payment_period_extension_last_day','支給対象となる期間の延長事由－期間_終了日付は支給対象となる期間の延長事由－期間_開始日付以降を入力してください。');
                }
            }

            if(!empty($unsettled_month) && !empty($unsettled_day)){
                if(ctype_digit($unsettled_month)){
                    if (!checkdate($unsettled_month, $unsettled_day, '2000')) {
                    $validator->errors()->add('unsettled_day','備考欄_雇用期間_年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($unsettled_japan_era === '平成') {
                if (
                    ($unsettled_japan_era_year == 1 && ($unsettled_month < 1 || ($unsettled_month == 1 && $unsettled_day < 8))) ||
                    ($unsettled_japan_era_year == 31 && ($unsettled_month > 4 || ($unsettled_month == 4 && $unsettled_day > 30))) ||
                    ($unsettled_japan_era_year > 31)
                ) {
                    $validator->errors()->add('unsettled_day', '備考欄_雇用期間_年月日は正しい日付を入力してください。');
                }
            } elseif ($unsettled_japan_era === '令和') {
                if ($unsettled_japan_era_year == 1 && $unsettled_month < 5) {
                    $validator->errors()->add('unsettled_day', '備考欄_雇用期間_年月日は正しい日付を入力してください。');
                }
            }
            
            if ($this->hasFile('file_amount_days_time')) {
                $totalSize += $this->file('file_amount_days_time')->getSize();
            }
            if ($this->hasFile('file_written_consent')) {
                $totalSize += $this->file('file_written_consent')->getSize();
            }
            if ($this->hasFile('file_extension_reason')) {
                $totalSize += $this->file('file_extension_reason')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
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
            'birth_date_japan_era_year.required_with' => '出産年月日_年を入力してください。',
            'birth_date_month.required_with' => '出産年月日_月を入力してください。',
            'birth_date_day.required_with' => '出産年月日_日を入力してください。',
            'payer_japan_era_year2.required_with' => '支給単位期間その２（初日）_年を入力してください。',
            'payer_month2.required_with' => '支給単位期間その２（初日）_月を入力してください。',
            'payer_day2.required_with' => '支給単位期間その２（初日）_日を入力してください。',
            'payer_month_end2.required_with' => '支給単位期間その２（末日）_月を入力してください。',
            'payer_day_end2.required_with' => '支給単位期間その２（末日）_日を入力してください。',
            'payment_period_last_japan_era_year.required_with' => '最終支給単位期間（初日）初日_年を入力してください。',
            'payment_period_last_month.required_with' => '最終支給単位期間（初日）初日_月を入力してください。',
            'payment_period_last_day.required_with' => '最終支給単位期間（初日）初日_日を入力してください。',
            'payment_period_last_month.required_with' => '最終支給単位期間（末日）_月を入力してください。',
            'payment_period_last_day.required_with' => '最終支給単位期間（末日）_日を入力してください。',
            'return_from_resignation_date_japan_era_year.required_with' => '職場復帰年月日_年を入力してください。',
            'return_from_resignation_date_month.required_with' => '職場復帰年月日_月を入力してください。',
            'return_from_resignation_date_day.required_with' => '職場復帰年月日_日を入力してください。',
            'payment_period_extension_japan_era_year.required_with' => '支給対象となる期間の延長事由－期間_開始日付_年を入力してください。',
            'payment_period_extension_month.required_with' => '支給対象となる期間の延長事由－期間_開始日付_月を入力してください。',
            'payment_period_extension_day.required_with' => '支給対象となる期間の延長事由－期間_開始日付_日を入力してください。',
            'payment_period_extension_month.required_with' => '支給対象となる期間の延長事由－期間_終了日付_月を入力してください。',
            'payment_period_extension_day.required_with' => '支給対象となる期間の延長事由－期間_終了日付_日を入力してください。',
            'unsettled_japan_era_year.required_with' => '備考欄_雇用期間_年月日_年を入力してください。',
            'unsettled_month.required_with' => '備考欄_雇用期間_年月日_月を入力してください。',
            'unsettled_day.required_with' => '備考欄_雇用期間_年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "file_amount_days_time" => '添付ファイル_支給申請書に記載した賃金額、就業した日数及び時間等記載内容を確認できる書類',
            "file_written_consent" => '添付ファイル_支給申請に係る承諾書',
            "file_extension_reason" => '添付ファイル_延長事由に該当することを確認できる書類',
            "file_spouse" => '添付ファイル_被保険者の配偶者であることを確認できる書類',
            "file_spouse_childcare_leave" => '添付ファイル_被保険者の配偶者の育児休業の取得を確認できる書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'ledger_type' => '帳票種別',
            'employment_insured_no_4digit' => '被保険者番号4桁',
            'employment_insured_no_6digit' => '被保険者番号6桁',
            'employment_insured_no_CD' => '被保険者番号1桁',
            'qualifications_japan_era' => '資格取得年月日_年号',
            'qualifications_japan_era_year' => '資格取得年月日_年',
            'qualifications_month' => '資格取得年月日_月',
            'qualifications_day' => '資格取得年月日_日',
            'childcare_start_date_japan_era' => '育児休業開始年月日_年号',
            'childcare_start_date_japan_era_year' => '育児休業開始年月日_年',
            'childcare_start_date_month' => '育児休業開始年月日_月',
            'childcare_start_date_day' => '育児休業開始年月日_日',
            'employment_insurance_office_no_4digit' => '事業所番号4桁',
            'employment_insurance_office_no_6digit' => '事業所番号6桁',
            'employment_insurance_office_no_CD' => '事業所番号1桁',
            'jurisdiction' => '管轄区分',
            'birth_date_japan_era' => '出産年月日_年号',
            'birth_date_japan_era_year' => '出産年月日_年',
            'birth_date_month' => '出産年月日_月',
            'birth_date_day' => '出産年月日_日',
            'fullname' => '被保険者氏名',
            'fullname_kana' => 'フリガナ（カタカナ）',
            'payer_japan_era1' => '支給単位期間（初日）_年号_1',
            'payer_japan_era_year1' => '支給単位期間（初日）_年_1',
            'payer_month1' => '支給単位期間（初日）_月_1',
            'payer_day1' => '支給単位期間（初日）_日_1',
            'payer_end_month1' => '支給単位期間（末日）_月_1',
            'payer_end_day1' => '支給単位期間（末日）_日_1',
            'workday_count1' => '就業日数_1',
            'working_hours1' => '就業時間_1',
            'wages_paid1' => '支払われた賃金額_1',
            'payer_japan_era2' => '支給単位期間（初日）_年号_2',
            'payer_japan_era_year2' => '支給単位期間（初日）_年_2',
            'payer_month2' => '支給単位期間（初日）_月_2',
            'payer_day2' => '支給単位期間（初日）_日_2',
            'payer_end_month2' => '支給単位期間（末日）_月_2',
            'payer_end_day2' => '支給単位期間（末日）_日_2',
            'workday_count2' => '就業日数_2',
            'working_hours2' => '就業時間_2',
            'wages_paid2' => '支払われた賃金額_2',
            'last_payer_japan_era' => '最終支給単位期間（初日）_年号',
            'last_payer_japan_era_year' => '最終支給単位期間（初日）_年',
            'last_payer_month' => '最終支給単位期間（初日）_月',
            'last_payer_japan_day' => '最終支給単位期間（初日）_日',
            'last_payer_end_month' => '最終支給単位期間（末日）_月',
            'last_payer_end_day' => '最終支給単位期間（末日）_日',
            'workday_count3' => '就業日数_最終',
            'working_hours3' => '就業時間_最終',
            'wages_paid3' => '支払われた賃金額_最終',
            'return_from_resignation_japan_era' => '職場復帰年月日_年号',
            'return_from_resignation_japan_era_year' => '職場復帰年月日_年',
            'return_from_resignation_month' => '職場復帰年月日_月',
            'return_from_resignation_day' => '職場復帰年月日_日',
            'payment_period_extension_reason' => '支給対象となる期間の延長事由',
            'payment_period_extension_japan_era' => '支給対象となる期間の延長期間_初日_年号',
            'payment_period_extension_japan_era_year' => '支給対象となる期間の延長期間_初日_年',
            'payment_period_extension_month' => '支給対象となる期間の延長期間_初日_月',
            'payment_period_extension_day' => '支給対象となる期間の延長期間_初日_日',
            'payment_period_extension_end_month' => '支給対象となる期間の延長期間_末日_月',
            'payment_period_extension_end_day' => '支給対象となる期間の延長期間_末日_日',
            'partner_childcare_leave_taken' => '配偶者育休取得',
            'partner_insured_no_4digit' => '配偶者の被保険者番号4桁',
            'partner_insured_no_6digit' => '配偶者の被保険者番号6桁',
            'partner_insured_no_CD' => '配偶者の被保険者番号1桁',
            'special_note_on_wages1' => 'その他賃金に関する特記事項_1',
            'special_note_on_wages2' => 'その他賃金に関する特記事項_2',
            'today_japan_era' => '証明・申請欄_年月日_年号',
            'today_japan_era_year' => '証明・申請欄_年月日_年',
            'today_japan_month' => '証明・申請欄_年月日_月',
            'today_japan_day' => '証明・申請欄_年月日_日',
            'headquarters_address' => '事業所名（所在地）',
            'headquarters_tel_treacode' => '事業所電話番号_市外局番',
            'headquarters_tel_city_code' => '事業所電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'employer_company_managerial_position_name' => '事業主氏名',
            'destination' => '公共職業安定所あて先',
            'labor_consultant_acting_as_agent_name' => '社会保険労務士記載欄_作成年月日・提出代行者・事務代理者',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名',
            'labor_consultant_tel_treacode' => '社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄_電話番号_加入者番号',
            'wage_deadline' => '備考欄_賃金締切日',
            'wage_payment' => '備考欄_賃金支払日_支払時期',
            'wage_payment_day' => '備考欄_賃金支払日',
            'commuting_allowance_period' => '備考欄_通勤手当頻度',
            'commuting_allowance_period_other' => '備考欄_通勤手当頻度_その他記載欄',
            'unsettled_japan_era' => '備考欄_雇用期間_年月日_年号',
            'unsettled_japan_era_year' => '備考欄_雇用期間_年月日_年',
            'unsettled_month' => '備考欄_雇用期間_年月日_月',
            'unsettled_day' => '備考欄_雇用期間_年月日_日',
            'note' => '備考欄_備考',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
