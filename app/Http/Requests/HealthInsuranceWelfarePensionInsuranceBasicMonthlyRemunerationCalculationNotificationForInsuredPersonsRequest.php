<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsRequest extends FormRequest
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
            "today_japan_era_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "today_japan_era_month" => 'int|between:1,12|regex:/^[0-9]+$/',
            "today_japan_era_day" => 'int|between:1,31|regex:/^[0-9]+$/',
            "business_establishment_code_prefecture_code" => 'string|max:2|regex:/^[0-9]+$/',
            "office_arrangement_code_county_city_ward_code" => 'string|max:2|regex:/^[0-9]+$/',
            "office_reference_symbol_office_symbol" => 'string|max:4|regex:/^[ァ-ヴーA-Z0-9]+\z/u',
            "post_code_former" => 'string|max:3|regex:/^[0-9]+$/',
            "post_code_latter" => 'string|max:4|regex:/^[0-9]+$/',
            "business_location" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "business_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "business_owner_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "branch_tel_area_code" => 'string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'string|max:5|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => 'nullable|string|max:255',
            "Insured_person_reference_number" => 'nullable|string|max:6|regex:/^[0-9]+$/',
            "insured_person_name_in_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "Insured_person_name_in_kanji" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "era_name" => 'int|in:1,3,5,7,9',
            "year_of_birth" => 'int|between:1,99|regex:/^[0-9]+$/',
            "month_of_birth" => 'int|between:1,12|regex:/^[0-9]+$/',
            "date_of_birth" => 'int|between:1,31|regex:/^[0-9]+$/',
            "applicable_era_name" => 'int|in:7,9',
            "applicable_year" => 'int|between:1,99|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_employees_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_revision_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/',
            "previous_revision_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "monthly_salary_increase" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_increase" => 'nullable|string|max:2',
            "retroactive_payment_amount_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio1" => 'int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio2" => 'int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio3" => 'int|between:1,31|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency1" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency2" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency3" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total1" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total2" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total3" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "grand_total" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "average_amount" => 'int|between:1,9999999|regex:/^[0-9]+$/',
            "adjusted_average_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "my_number_or_basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/', 
            "remarks_and_calculation_of_employees_aged_70_and_over" => 'nullable|int|in:1',
            "remarks_and_two_or_more_jobs"=> 'nullable|int|in:1',
            "remarks_and_scheduled_monthly_changes"=> 'nullable|int|in:1',
            "remarks_and_Joined_midway"=> 'nullable|int|in:1',
            "remarks_and_sick_leave_childcare_leave"=> 'nullable|int|in:1',
            "remarks_and_part_time_worker"=> 'nullable|int|in:1',
            "remarks_and_part"=> 'nullable|int|in:1',
            "remarks_and_annual_average"=> 'nullable|int|in:1',
            "remarks_and_others"=> 'nullable|int|in:1',
            "remarks_calculation_basic_month_month1"=> 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "remarks_calculation_basic_month_month2"=> 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "others"=> 'nullable|string|max:255',
        ];
    }
}
