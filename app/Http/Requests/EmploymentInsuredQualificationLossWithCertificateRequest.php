<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationLossWithCertificateRequest extends FormRequest
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
        $rules = new EmploymentInsuredQualificationLossRequest;
        $rules_2 = new EmploymentInsuredRetirementCertificateRequest;

        return array_merge($rules->rules(),$rules_2->rules());
    }
    public function messages()
    {
        $messages = new EmploymentInsuredQualificationLossRequest;
        
        return array_merge($messages->messages());
    }
    public function attributes()
    {
        $attributes = new EmploymentInsuredQualificationLossRequest;
        $attributes_2 = new EmploymentInsuredRetirementCertificateRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
