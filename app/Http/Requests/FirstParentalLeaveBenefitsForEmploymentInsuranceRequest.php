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
        return array_merge(
            ParentalLeaveBenefitsClaimFormRequest::rules(),
            EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest::rules()
        );
    }

    public function attributes()
    {
        $parentalRequest = new ParentalLeaveBenefitsClaimFormRequest();
        $attributes = $parentalRequest->attributes();
    
        $employmentRequest = new EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest();
        $attributes_2 = $employmentRequest->attributes();
    
        // 属性を結合して返す
        return array_merge($attributes, $attributes_2);
    }
}
