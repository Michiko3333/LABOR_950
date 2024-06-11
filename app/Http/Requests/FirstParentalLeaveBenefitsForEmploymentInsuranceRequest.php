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
