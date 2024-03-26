<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationRequest extends FormRequest
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
            "today_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "today_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "today_date" => 'int|between:1,31|regex:/^[0-9]+$/',
            "pension_office_reference_prefecture" => 'string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_cities" => 'string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_office" => 'string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_post_code_parent" => 'string|max:3|regex:/^[0-9]+$/',
            "branch_post_code_child" => 'string|max:4|regex:/^[0-9]+$/',
            "branch_address" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "branch_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "employer_company_managerial_position_name" => 'string|max:255',
            "branch_tel_area_code" => 'string|max:4|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'string|max:6|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'string|max:1|regex:/^[0-9]+$/',
            "labor_consultant_submission_agent_name" => 'nullable|string|max:255',
            "insurer_reference_no" => 'nullable|string|max:6',
            "insured_fullname_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "insured_fullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "birthday_era" => 'int|in:1,3,5,7,9',
            "birthday_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "birthday_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "birthday_date" => 'int|between:1,31|regex:/^[0-9]+$/',
            "revision_date_era" => 'int|in:7,9',
            "revision_date_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "revision_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "previous_average_monthly_salary_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_average_monthly_salary_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "before_revision_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/',
            "before_revision_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_raise_and_reduction_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_raise_and_reduction" => 'nullable|string|in:昇給,降給',
            "retroactive_payment_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "salary_payment_month1" => 'int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month2" => 'int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month3" => 'int|between:1,12|regex:/^[0-9]+$/',
            "salary_calculation_basic_days1" => 'int|between:1,31|regex:/^[0-9]+$/',
            "salary_calculation_basic_days2" => 'int|between:1,31|regex:/^[0-9]+$/',
            "salary_calculation_basic_days3" => 'int|between:1,31|regex:/^[0-9]+$/',
            "monthly_salary_currency1" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_currency2" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_currency3" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum1" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum2" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum3" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "sum" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "average_amount"=> 'int|between:1,9999999|regex:/^[0-9]+$/',
            "adjusted_average_amount"=> 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "mynumber_no_or_pension_no"=> 'nullable|string|max:12|regex:/^[0-9]+$/',
            "remarks_over_70_monthly_salary_change"=> 'nullable|int|in:1',
            "remarks_multi_work"=> 'nullable|int|in:1',
            "remarks_part_time_workers"=> 'nullable|int|in:1',
            "remarks_salary_raise_and_reduction_reasons"=> 'nullable|int|in:1',
            "remarks_only_health_insurance_salary_change"=> 'nullable|int|in:1',
            "remarks_and_others"=> 'nullable|int|in:1',
            "remarks_salary_raise_and_reduction_reasons_text"=> 'nullable|string|max:255',
            "remarks_others"=> 'nullable|string|max:255',
        ];
    }
}
