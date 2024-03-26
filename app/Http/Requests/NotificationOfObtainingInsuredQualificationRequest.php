<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationOfObtainingInsuredQualificationRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "health_insurance" => 'nullable|int|in:1',
            "welfare_pension_insurance" => 'nullable|int|in:1',
            "input_date_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "input_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "input_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_pension_office_reference_prefecture" => 'string|regex:/^[0-9]{2}$/u', 
            "employee_pension_office_reference_no_cities" => 'string|regex:/^[0-9]{2}$/u',
            "employee_pension_office_reference_no_office" => 'string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_insurance_office_no" => 'string|regex:/^[0-9]{5}$/u',
            "branch_post_code_first" => 'string|regex:/^[0-9]{3}$/u',
            "branch_post_code_last" => 'string|regex:/^[0-9]{4}$/u',
            "branch_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "branch_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９　]+\z/u',
            "company_representative" => 'string|max:255',
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_acting_as_agent" => 'nullable|string|max:255',
            "employee_name_kana" =>  'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "employee_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "employee_birthday_japan_era" => 'int|in:5,7,9',
            "employee_birthday_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insured_person_type" => 'int|in:1,2,3,5,6,7',
            "employee_insured_type" => 'int|in:1,3,4,0',
            "employee_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{10,12}$/u',
            "employee_employment_insured_date_japan_era" => 'int|in:7,9',
            "employee_employment_insured_date_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_dependent_flg" => 'string|in:有,無',
            "monthly_remuneration_all" => 'int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_part" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_total" => 'int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "note_over_70_years_old" => 'nullable|int|in:1',
            "note_multiple_office_workers" => 'nullable|int|in:1',
            "note_short_time_work" => 'nullable|int|in:1',
            "note_continued_reemployment_after_retirement" => 'nullable|int|in:1',
            "note_others" => 'nullable|int|in:1',
            "note_others_in" => 'nullable|string|max:255',
            "employee_post_code_first" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "employee_post_code_last" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "employee_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "acquisition_reason" => 'nullable|string|in:海外在住,短期在留,その他',
            "other_acquisition_reason" =>   'nullable|string|max:255',
        ];
    }
}
