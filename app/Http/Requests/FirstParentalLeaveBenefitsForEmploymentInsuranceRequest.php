<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstParentalLeaveBenefitsForEmploymentInsuranceRequest extends FormRequest
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

        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'S');
        }
        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'S');
        }
        if (isset($data['labor_consultant_acting_as_agent_name'])) {
            $data['labor_consultant_acting_as_agent_name'] = mb_convert_kana($data['labor_consultant_acting_as_agent_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['address'])) {
            $data['address'] = mb_convert_kana($data['address'], 'AS');
            $data['address'] = str_replace(['-', '‐', '―'], '－', $data['address']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
        }
        if (isset($data['financial_Institutions_name_kana'])) {
            $data['financial_Institutions_name_kana'] = mb_convert_kana($data['financial_Institutions_name_kana'], 'S');
        }
        if (isset($data['financial_institution_name'])) {
            $data['financial_institution_name'] = mb_convert_kana($data['financial_institution_name'], 'S');
        }
        if (isset($data['address_prefecture_city'])) {
            $data['address_prefecture_city'] = mb_convert_kana($data['address_prefecture_city'], 'AS');
            $data['address_prefecture_city'] = str_replace(['-', '‐', '―'], '－', $data['address_prefecture_city']);
        }
        if (isset($data['address_ward'])) {
            $data['address_ward'] = mb_convert_kana($data['address_ward'], 'AS');
            $data['address_ward'] = str_replace(['-', '‐', '―'], '－', $data['address_ward']);
        }
        if (isset($data['address_apartment'])) {
            $data['address_apartment'] = mb_convert_kana($data['address_apartment'], 'AS');
            $data['address_apartment'] = str_replace(['-', '‐', '―'], '－', $data['address_apartment']);
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
        $rules = new ParentalLeaveBenefitsClaimFormRequest;
        $rules_2 = new EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest;

        return array_merge($rules->rules(), $rules_2->rules());
    }

    public function messages()
    {
        $messages = new ParentalLeaveBenefitsClaimFormRequest;
        $messages_2 = new EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest;

        return array_merge($messages->messages(), $messages_2->messages());
    }

    public function withValidator($validator)
    {
        $validator_1 = new ParentalLeaveBenefitsClaimFormRequest;
        $validator_2 = new EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);

        return $validator;
    }

    public function attributes()
    {
        $parentalRequest = new ParentalLeaveBenefitsClaimFormRequest();
        $attributes = $parentalRequest->attributes();
    
        $employmentRequest = new EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest();
        $attributes_2 = $employmentRequest->attributes();
    
        return array_merge($attributes, $attributes_2);
    }
}
