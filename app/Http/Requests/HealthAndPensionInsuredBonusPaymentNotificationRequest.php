<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthAndPensionInsuredBonusPaymentNotificationRequest extends FormRequest
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
            "title_health_insurance" => 'nullable|int|in:1',
            "title_pension_insurance" => 'nullable|int|in:1',
            "today_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "today_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "today_date" => 'int|between:1,31|regex:/^[0-9]+$/',
            "pension_office_reference_prefecture" => 'string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_cities" => 'string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_office" => 'string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_post_code_parent" => 'string|max:3|regex:/^[0-9]+$/',
            "branch_post_code_child" => 'string|max:4|regex:/^[0-9]+$/',
            "branch_address" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "branch_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "employer_company_managerial_position_name" => 'string|max:255',
            "branch_tel_area_code" => 'string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'string|max:5|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_submission_agent_name" => 'string|max:255',
            "employment_insured_no" => 'nullable|int|max:6|regex:/^[0-9]+$/',
            "insured_fullname_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "insured_fullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "employee_birthday_era" => 'int|in:1,3,5,7,9',
            "employee_birthday_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "employee_birthday_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "employee_birthday_date" => 'int|between:1,31|regex:/^[0-9]+$/',
            "bonus_payment_date_era" => 'int|in:7,9',
            "bonus_payment_date_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "bonus_payment_date_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "bonus_payment_date_date" => 'int|between:1,31|regex:/^[0-9]+$/',
            "bonus_payment_currency" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "bonus_payment_goods" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "bonus_payment_sum" => 'int|between:1,9999|regex:/^[0-9]+$/',
            "mynumber_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]+$/',
            "remarks_over_70_insured" => 'nullable|int|in:1',
            "remarks_more_than_twice_work" => 'nullable|int|in:1',
            "remarks_bonus_sum_in_months" => 'nullable|int|in:1',
            "remarks_first_payment_date" => 'int|between:1,31|regex:/^[0-9]+$/',
        ];
    }
}
