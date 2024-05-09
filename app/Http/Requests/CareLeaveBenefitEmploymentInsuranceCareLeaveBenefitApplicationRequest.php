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
        $rules = new CaregiverLeaveBenefitApplicationRequest;
        $rules_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($rules->rules(),$rules_2->rules());
    }
    public function messages()
    {
        $messages = new CaregiverLeaveBenefitApplicationRequest;
        $messages_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($messages->messages(),$messages_2->messages());
    }
    public function attributes()
    {
        $attributes = new CaregiverLeaveBenefitApplicationRequest;
        $attributes_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
