<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest extends FormRequest
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
            CaregiverLeaveBenefitApplicationRequest::rules(),
            WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest::rules()
        );
    }

    public function attributes()
    {
        $attributes = new CaregiverLeaveBenefitApplicationRequest;
        $attributes_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
