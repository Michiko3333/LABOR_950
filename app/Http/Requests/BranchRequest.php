<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'br-name' => 'required|array',
            'br-name.*' => 'string|max:255',
            'br-branch_type' => 'required|array',
            'br-branch_type.*' => 'integer',
            'br-place_type' => 'required|array',
            'br-place_type.*' => 'integer|regex:/^[12]+\z/',
            'br-post_code' => 'required|array',
            'br-post_code.*' => 'string|max:7|regex:/\A[0-9]+\z/u',
            'br-address_prefecture' => 'required|array',
            'br-address_prefecture.*' => 'string|max:2',
            "br-address_city" => 'required|array',
            "br-address_city.*" => 'string|max:255|max:255|regex:/\A[ぁ-んァ-ン一-龥]+\z/u',
            "br-address_ward" => 'required|array',
            "br-address_ward.*" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            "br-address_apartment" => 'required|array',
            "br-address_apartment.*" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９Ａ-Ｚ　‐]+\z/u',
            "br-tel_area_code" => 'array',
            "br-tel_area_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_city_code" => 'array',
            "br-tel_city_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_subscriber_code" => 'array',
            "br-tel_subscriber_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_overseas" => 'array',
            "br-tel_overseas.*" => 'nullable|max:15|regex:/\A[0-9]+\z/u',
            "br-mail_address" => 'array',
            "br-mail_address.*" => 'required|regex:/^[a-zA-Z0-9_+-]+(.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/',
            "br-labor_insurance_no" => 'array',
            "br-labor_insurance_no.*" => 'nullable|regex:/^\d{14}$/',
            "br-labor_insurance_payment_method" => 'array',
            "br-labor_insurance_payment_method.*" => 'nullable|integer',
            "br-insurance_office_no" => 'array',
            "br-insurance_office_no.*" => 'nullable|string|max:20',
            "br-insurance_office_reference_no" => 'array',
            "br-insurance_office_reference_no.*" => 'nullable|string|max:20',
            "br-pension_office_id" => 'array',
            "br-pension_office_id.*" => 'nullable|integer',
            "br-pension_office_no" => 'array',
            "br-pension_office_no.*" => 'nullable|string|max:10',
            "br-pension_office_reference_prefecture" => 'array',
            "br-pension_office_reference_prefecture.*" => 'nullable|string|max:10',
            "br-pension_office_reference_no_cities" => 'array',
            "br-pension_office_reference_no_cities.*" => 'nullable|string|max:10',
            "br-pension_office_reference_no_office" => 'array',
            "br-pension_office_reference_no_office.*" => 'nullable|string|max:10',
            "br-employment_insurance_office_no" => 'array',
            "br-employment_insurance_office_no.*" => 'nullable|string|max:20',
            "br-hello_work_id" => 'array',
            "br-hello_work_id.*" => 'nullable|integer',
            "br-labor_bureau_id" => 'array',
            "br-labor_bureau_id.*" => 'nullable|integer',
            "br-labor_supervision_id" => 'array',
            "br-labor_supervision_id.*" => 'nullable|integer',
            "br-start_date_of_month" => 'array',
            "br-start_date_of_month.*" => 'nullable|integer',
            "br-start_days_of_week" => 'array',
            "br-start_days_of_week.*" => 'nullable|integer',
            "br-start_time_of_day" => 'array',
            "br-start_time_of_day.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-work_time_start" => 'array',
            "br-work_time_start.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-work_time_end" => 'array',
            "br-work_time_end.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]:[0-5][0-9]/',
            "br-agreed_hours_year" => 'array',
            "br-agreed_hours_year.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_month" => 'array',
            "br-agreed_hours_month.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_week" => 'array',
            "br-agreed_hours_week.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-agreed_hours_day" => 'array',
            "br-agreed_hours_day.*" => 'nullable|regex:/^[0-2][0-4]:[0-5][0-9]/',
            "br-working_days_yearly" => 'array',
            "br-working_days_yearly.*" => 'nullable|integer',
            "br-working_days_monthly" => 'array',
            "br-working_days_monthly.*" => 'nullable|integer',
            "br-holiday_yearly" => 'array',
            "br-holiday_yearly.*" => 'nullable|integer',
            "br-hoiday_monthly" => 'array',
            "br-hoiday_monthly.*" => 'nullable|integer',
            "br-work_style_type" => 'array',
            "br-work_style_type.*" => 'nullable|integer',
            "br-holiday_legal" => 'array',
            "br-holiday_legal.*" => 'nullable|string|max:8',
            "br-holiday_not_logal" => 'array',
            "br-holiday_not_logal.*" => 'nullable|string|max:8',
        ];
    }
}
