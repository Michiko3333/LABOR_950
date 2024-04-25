<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationLossRequest extends FormRequest
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

        if (isset($data['name'])) {
            $data['name'] = mb_convert_kana($data['name'], 'S');
        }
        if (isset($data['name_kana'])) {
            $data['name_kana'] = mb_convert_kana($data['name_kana'], 'S');
        }
        if (isset($data['new_name'])) {
            $data['new_name'] = mb_convert_kana($data['new_name'], 'S');
        }
        if (isset($data['new_name_kana'])) {
            $data['new_name_kana'] = mb_convert_kana($data['new_name_kana'], 'S');
        }
        if (isset($data['company_name_abbreviation'])) {
            $data['company_name_abbreviation'] = mb_convert_kana($data['company_name_abbreviation'], 'AS');
            $data['company_name_abbreviation'] = str_replace(['-', '－', '―'], '‐', $data['company_name_abbreviation']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '－', '―'], '‐', $data['headquarters_address']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '－', '―'], '‐', $data['employee_address']);
        }
        if (isset($data['labor_consultant_acting_as_agent_name'])) {
            $data['labor_consultant_acting_as_agent_name'] = mb_convert_kana($data['labor_consultant_acting_as_agent_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['name_alphabet'])) {
            $data['name_alphabet'] = mb_convert_kana($data['name_alphabet'], 's');
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
  
    public static function rules(): array
    {
        return [
            "file_disqualification_status" => 'required_unless:radio_file_disqualification_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            "employment_insured_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "employment_insured_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "employment_insured_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "insurance_office_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "insurance_office_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "insurance_office_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "insured_date_era" => 'string|max:2',
            "insured_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "insured_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "insured_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "retirement_date_era" => 'string|max:2',
            "retirement_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "retirement_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "retirement_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insurance_loss_reason" => 'int|in:1,2,3',
            "agreed_hours_day_hour" => 'string|regex:/^[0-9]{1,2}$/u',
            "agreed_hours_day_minute" => 'string|regex:/^[0-9]{1,2}$/u',
            "new_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "new_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "sex" => 'nullable|int|in:1,2',
            "birthday_era" => 'string|in:大正,昭和,平成,令和',
            "birthday_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "birthday_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insured_age_type" => 'nullable|int|between:1,4',
            "hello_work_office_no" => 'nullable|string|regex:/^[0-9]{5}$/u',
            "employment_status" => 'int|between:1,7|regex:/^[1-7]$/u',
            "company_name_abbreviation" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "employee_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            "insured_reason" => 'string|max:255',
            "name_alphabet" => 'nullable|string|max:255|regex:/^[A-Z]+[ ][A-Z]+$/u',
            "residence_card_no" => 'nullable|string|regex:/^[A-Z]{2}[0-9]{8}[A-Z]{2}$/u',
            "stay_date_period_year" => 'nullable|int|between:1,2100',
            "stay_date_period_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "stay_date_period_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employment_type" => 'nullable|int|in:1,2',
            "country" => 'nullable|int|max:999',
            "residential_status" => 'nullable|int|max:99',
            "residential_status_unknown_reason" => 'nullable|string|max:255',
            "notification_era" => 'string|max:2',
            "notification_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "notification_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "notification_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "headquarters_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            "employer_company_managerial_position_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴ一-龥々　]+\z/u',
            "headquarters_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "hello_work_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            "labor_consultant_japan_era" => 'nullable|string|max:2',
            "labor_consultant_japan_era_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_acting_as_agent_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "other_notes" => 'nullable|string|max:255',
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_disqualification_status')) {
                $totalSize += $this->file('file_disqualification_status')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }
}
