<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationRequest extends FormRequest
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
            "office_number_notification_number" => 'string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "business_location_ship_owner_address" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "business_name_name_of_ship_owner" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "business_owner_name_representative_name" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "changed_bonus_payment_schedule_month1" => 'nullable|numeric|between:1,12',
            "changed_bonus_payment_schedule_month2" => 'nullable|numeric|between:1,12',
            "changed_bonus_payment_schedule_month3" => 'nullable|numeric|between:1,12',
            "changed_bonus_payment_schedule_month4" => 'nullable|numeric|between:1,12',
            "post_code_former" => 'string|max:3|regex:/^[0-9]+$/',
            "post_code_latter" => 'string|max:4|regex:/^[0-9]+$/',
            "branch_tel_area_code" => 'string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'string|max:5|regex:/^[0-9]+$/',
            "today_japan_era_year" => 'numeric|between:1,99',
            "today_japan_era_month" => 'numeric|between:1,12',
            "today_japan_era_day" => 'numeric|between:1,31',
            "scheduled_year_of_bonus_payment" => 'nullable|numeric|between:1,99',
            "scheduled_month_of_bonus_payment" => 'nullable|numeric|between:1,12',
            "office_reference_symbol_office_symbol" => 'nullable|string|max:10|regex:/^[ァ-ヴー　]+\z/u',
            "office_arrangement_code_county_city_ward_code" => 'nullable|string|max:2|regex:/^[0-9]+$/',
            "business_establishment_code_prefecture_code" => 'nullable|string|max:2|regex:/^[0-9]+$/',
            "ship_owner_reference_code_ship_insurance_office_abbreviation_name" => 'nullable|string|max:10|regex:/^[一-龥]+$/',
            "ship_owner_arrangement_symbol_symbol" => 'nullable|string|max:10|regex:/^[ァ-ヴー　]+\z/u',
            "bonus_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "era_name" => 'nullable|int|regex:/9+$/',
            "payment_status" => 'nullable|int|regex:/1+$/',
            "title_types_of_welfare_pension_insurance" => 'nullable|regex:/1+$/',
            "title_different_types_of_seafarers_insurance" => 'nullable|regex:/1+$/',
            "title_different_types_of_health_insurance" => 'nullable|regex:/1+$/',
        ];
    }
}