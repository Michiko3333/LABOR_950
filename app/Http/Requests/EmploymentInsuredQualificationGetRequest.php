<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationGetRequest extends FormRequest
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
        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'AS');
            $data['branch_name'] = str_replace(['-', '－', '‐', '－'], 'ー', $data['branch_name']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '－', '‐', '－'], 'ー', $data['headquarters_address']);
        }
        if (isset($data['agent_name'])) {
            $data['agent_name'] = mb_convert_kana($data['agent_name'], 'S');
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
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'employment_insured_no_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'acquisition' => 'int|in:1,2',
            'name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'name_kana' => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'new_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'new_name_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'sex' => 'int|in:1,2',
            'birthday_era' => 'string|in:大正,昭和,平成,令和',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'insured_reason' => 'int|in:1,2,3,4,8',
            'salary_payment_system' => 'int|in:1,2,3,4,5',
            'salary_amonut' => 'int|between:0,9999|regex:/^[0-9]{1,4}$/u',
            'insured_date_era' => 'string|in:平成,令和',
            'insured_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insured_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'insured_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_status' => 'int|in:1,2,3,4,5,6,7',
            'occupation_type' => 'string|between:01,11',
            'employment_route' => 'int|in:1,2,3,4',
            'agreed_hours_week_hour' => 'string|between:0,168|regex:/^[0-9]{1,3}$/u',
            'agreed_hours_week_minute' => 'string|between:0,60|regex:/^[0-9]{1,2}$/u',
            'contract_period_flg' => 'string|in:有,無',
            'contract_start_era' => 'nullable|string|in:平成,令和',
            'contract_start_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'contract_start_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'contract_start_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'contract_renewal_flg' => 'nullable|string|in:有,無',
            'contract_end_era' => 'nullable|string|in:平成,令和',
            'contract_end_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'contract_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'contract_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'branch_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ－　]+\z/u',
            'insured_reason_detail' => 'nullable|string|max:255',
            'first_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z ]+\z/u',
            'residence_card_no' => 'nullable|string|max:12|regex:/\A[0-9A-Z　]+\z/u',
            'stay_date_period_year' => 'nullable|int|max:2100',
            'stay_date_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'stay_date_period_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'unauthorized_activities_permission_flg' => 'nullable|string|in:有,無',
            'employment_type' => 'nullable|int|in:1,2',
            'country' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'residential_status' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'residential_status_unknown_reason' => 'nullable|string|max:255',
            'headquarters_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ－　]+\z/u',
            'employer_company_managerial_position_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥Ａ-Ｚ　]+\z/u',
            'headquarters_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'hello_work_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥　]+\z/u',
            'notification_era' => 'string|in:平成,令和',
            'notification_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'notification_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'notification_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'create_era' => 'nullable|string|in:平成,令和',
            'create_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'create_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'create_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'agent_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥　]+\z/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥　]+\z/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'memo' => 'nullable|string|max:255',
        ];
    }
}
