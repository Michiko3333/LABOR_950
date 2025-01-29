<?php

namespace App\Http\Requests;

use App\Rules\katakanaOnly;
use App\Rules\NumberOnly;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ImportEmployeeRequest extends BaseRequest
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
            'data' => 'array|required',
            'data.*.employee_no' => 'string|max:255|regex:/\A[A-Z0-9]+\z/u',
            'data.*.branch_name' => 'string|required',
            'data.*.managerial_position_name' => 'nullable|string',
            'data.*.grade' => 'nullable|string',
            'data.*.work_category' => 'required|int|between:1,14',
            'data.*.enrollment_category' => 'required|int|between:1,6',
            'data.*.transfer_date' => 'nullable',
            'data.*.division_name' => 'nullable|string|max:255',
            'data.*.division_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'data.*.last_name' => 'string|max:255',
            'data.*.last_name_kana' => ['string', 'max:255', new katakanaOnly(false)],
            'data.*.last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'data.*.first_name' => 'string|max:255',
            'data.*.first_name_kana' => ['string', 'max:255', new katakanaOnly(false)],
            'data.*.first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'data.*.old_last_name' => 'nullable|string|max:255',
            'data.*.old_last_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'data.*.old_last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'data.*.old_first_name' => 'nullable|string|max:255',
            'data.*.old_first_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'data.*.old_first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'data.*.name_common' => 'nullable|string|max:255',
            'data.*.name_common_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'data.*.sex' => 'required|integer',
            'data.*.birthday' => 'required|before_or_equal:today',
            'data.*.post_code' => 'required|string|max:20|regex:/\A[0-9]+\z/u',
            'data.*.address_prefecture' => 'required|integer',
            'data.*.address_city' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.address_ward' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.address_apartment' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.address_city_kana' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.address_ward_kana' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.tel_area_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'data.*.tel_city_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'data.*.tel_subscriber_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            "data.*.fax1" => 'nullable|string|regex:/^0[0-9]{1,4}$/|required_with:fax2,fax2',
            "data.*.fax2" => 'nullable|string|regex:/[0-9]{1,4}$/|required_with:fax1,fax3',
            "data.*.fax3" => 'nullable|string|regex:/[0-9]{1,8}$/|required_with:fax1,fax2',
            'data.*.mail_address1' => 'nullable|string|max:255|email:rfc',
            'data.*.mail_address2' => 'nullable|string|max:255|email:rfc',
            'data.*.emergency_post_code1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'data.*.emergency_contact1' => 'nullable|string|max:255',
            'data.*.emergency_relationship1' => 'nullable|string|max:255',
            'data.*.emergency_tel1' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'data.*.emergency_address_prefecture1' => 'nullable|string',
            'data.*.emergency_address_city1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_address_ward1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_address_apartment1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_post_code2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'data.*.emergency_contact2' => 'nullable|string|max:255',
            'data.*.emergency_relationship2' => 'nullable|string|max:255',
            'data.*.emergency_tel2' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'data.*.emergency_address_prefecture2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_address_city2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_address_ward2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.emergency_address_apartment2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'data.*.spouse_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'data.*.country_id' => 'nullable|integer',
            'data.*.blood_type' => 'nullable|string|in:A,B,AB,O',
            'data.*.insured_age_type' => 'nullable|integer',
            'data.*.insurer_reference_no' => 'nullable|string|max:6|regex:/\A[0-9]+\z/u',
            'data.*.employment_insured_no' => 'nullable|string|max:11|regex:/\A[0-9]+\z/u',
            'data.*.residence_card_no' => 'nullable|string|max:12|regex:/^[A-Z]{2}\d{8}[A-Z]{2}+\z/',
            'data.*.residential_status_unknown_reason' => 'nullable|string|max:255',
            'data.*.unauthorized_activities_permission_flg' => 'nullable|integer',
            'data.*.mynumber_card_no' => 'nullable|string|max:12|regex:/^[0-9]{12}+\z/',
            'data.*.social_insurance_no' => 'nullable|string|max:8|regex:/\A[A-Z0-9]+\z/u',
            'data.*.pension_no' => 'nullable|string|max:10|regex:/\A[0-9]+\z/u',
            'data.*.labor_insurance_type' => 'nullable|integer',
            'data.*.employment_insurance_type' => 'nullable|integer',
            'data.*.insurance_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            'data.*.insurer_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
            'data.*.employee_type' => 'required|integer',
            'data.*.employee_status' => 'required|integer',
            'data.*.contract_period_flg' => 'nullable|integer',
            'data.*.contract_renewal_flg' => 'nullable|integer',
            'data.*.resignation_letter_request_flg' => 'nullable|integer',
            'data.*.employment_route' => 'required|int|in:1,2,3,4',
            'data.*.private_introduction' => 'nullable|string',
            'data.*.recruitment_category' => 'required|int',
            'data.*.recruitment_category_detail' => 'required|int|between:1,10',
            'data.*.pay_type' => 'required|int|between:1,7',
            'data.*.employment_status' => 'required|int|between:1,7',
            'data.*.insurance_loss_reason' => 'nullable|integer',
            'data.*.over_retired_insurance_loss_reason' => 'nullable|integer',
            'data.*.external_advisor_flg' => 'nullable|integer',
            'data.*.occupation_type' => 'nullable|string|max:10',
            'data.*.japan_post_bank_code_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
            'data.*.employment_type' => 'nullable|integer',
            'data.*.employer_type' => 'integer',

            'data.*.insured_status' => 'nullable|string|max:21',
            'data.*.health_insurance_association_number' => ['nullable', 'string', new NumberOnly(8)],
            'data.*.acquisition_of_distinction' => 'nullable|integer',
            'data.*.welfare_pension' => 'nullable|integer',
            'data.*.overseas_special_exception' => 'nullable|integer',
            'data.*.dispatch_contract_completion' => 'nullable|integer',
            'data.*.bank_name' => 'nullable|string',
            'data.*.bank_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'data.*.head_office_or_branch_office' => 'nullable|int',
            'data.*.financial_institution_code' => 'nullable|string|regex:/\A[0-9]{4}+\z/u',
            'data.*.store_code' => 'nullable|string|regex:/\A[0-9]{3}+\z/u',
            'data.*.japan_bank_flg' => 'nullable|int',
            'data.*.bank_account_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
            'data.*.japan_post_bank_code_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // JSON形式でエラーを返す
        \Log::error(print_r($validator->errors(), true));
        $response = response()->json([
            'result' => 0,
            'errors' => $validator->errors(),
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
