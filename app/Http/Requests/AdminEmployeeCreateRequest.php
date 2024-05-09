<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEmployeeCreateRequest extends FormRequest
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
            'employee_no' => 'string|max:255|regex:/\A[A-Z0-9]+\z/u',
            'branch_id' => 'integer',
            'managerial_position_id' => 'nullable|integer',
            'division_name' => 'nullable|string|max:255',
            'division_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'last_name' => 'string|max:255',
            'last_name_kana' => 'string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'last_name_alphabet' => 'string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name' => 'string|max:255',
            'first_name_kana' => 'string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name_alphabet' => 'string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_last_name' => 'nullable|string|max:255',
            'old_last_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_first_name' => 'nullable|string|max:255',
            'old_first_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'name_common' => 'nullable|string|max:255',
            'name_common_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'sex' => 'integer',
            'birthday' => 'required|date',
            'post_code' => 'required|string|max:20|regex:/\A[0-9]+\z/u',
            'address_prefecture' => 'required|integer',
            'address_city' => 'required|string|max:255',
            'address_ward' => 'required|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'address_apartment' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            // 'address_prefecture_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',DB intなのでまち
            'address_city_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',
            'address_ward_kana' => 'string|max:255|regex:/\A[ァ-ヴー０-９]+\z/u',
            //'address_apartment_kana' => 'string|max:255|regex:/\A[ァ-ヴー０-９]+\z/u',
            'tel_area_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_city_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_subscriber_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'fax' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'mail_address1' => 'nullable|string|max:255|email',
            'mail_address2' => 'nullable|string|max:255|email',
            'emergency_contact1' => 'nullable|string|max:255',
            'emergency_relationship1' => 'nullable|string|max:255',
            'emergency_tel1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture1' => 'nullable|string',
            'emergency_address_city1' => 'nullable|string',
            'emergency_address_ward1' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'emergency_address_apartment1' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'emergency_contact2' => 'nullable|string|max:255',
            'emergency_relationship2' => 'nullable|string|max:255',
            'emergency_tel2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture2' => 'nullable|string|max:255',
            'emergency_address_city2' => 'nullable|string|max:255',
            'emergency_address_ward2' => 'nullable|string|max:255',
            'emergency_address_apartment2' => 'nullable|string|max:255',
            'spouse_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_family_number' => 'integer|nullable',
            'country_id' => 'nullable|integer',
            'salary_notices' => 'nullable|string|max:255',
            'insured_age_type' => 'nullable|integer',
            'residence_card_no' => 'nullable|string|max:20|regex:/^[A-Z]{2}\d{8}[A-Z]{2}+\z/',
            'residential_status_unknown_reason' => 'nullable|string|max:255',
            'unauthorized_activities_permission_flg' => 'nullable|integer',
            'mynumber_card_no' => 'nullable|string|max:20|regex:/^[0-9]{12}+\z/',
            'social_insurance_no' => 'nullable|string|max:10|regex:/\A[A-Z0-9]+\z/u',
            'pension_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            'pension_office_reference_no' => 'nullable|string|max:10',
            'pension_no' => 'nullable|string|max:10|regex:/\A[0-9]+\z/u',
            'labor_insurance_type' => 'nullable|integer',
            'employment_insurance_type' => 'nullable|integer',
            'insurance_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            'insurance_office_reference_no' => 'nullable|string|max:20',
            'employment_insurance_office_no' => 'nullable|string|max:20',
            'insurer_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
            'employee_type' => 'required|integer',
            'employee_status' => 'required|integer',
            'contract_period_flg' => 'nullable|integer',
            'contract_renewal_flg' => 'nullable|integer',
            'resignation_letter_request_flg' => 'nullable|integer',
            'insurance_loss_reason' => 'nullable|integer',
            'over_retired_insurance_loss_reason' => 'nullable|integer',
            //'over_70_non_applicable_flg' => 'nullable|integer',
            'external_advisor_flg' => 'nullable|integer',
            'occupation_type' => 'nullable|string|max:10',
            //'employment_route' => 'nullable|integer',
            //'insured_reason' => 'nullable|integer',
            //'insured_reason_details' => 'nullable|string|max:255',
            //'currency_id' => 'nullable|integer',
            //'salary_payment_system' => 'nullable|integer',
            //'caregiver_leave_benefit_receive_bank_id' => 'nullable|integer',
            //'japan_post_bank_code_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            //'japan_post_bank_account_no' => 'nullable|string|max:7|regex:/\A[0-9]+\z/u',
            //'bank_account_no' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'employment_type' => 'nullable|integer',
            'employment_status' => 'nullable|integer',
            'employer_type' => 'integer',
        ];
    }
}
