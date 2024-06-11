<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceDependentChangeWithCertificateRequest extends FormRequest
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
        $rules = new HealthInsuranceDependentChangeRequest;
        $rules_2 = new EmployerCertificateEtcRequest;
        $rules_3 = new MedicalInsurerCertificateRequest;

        return array_merge($rules->rules(), $rules_2->rules(), $rules_3->rules());
    }

    public function withValidator($validator)
    {
        $validator_1 = new HealthInsuranceDependentChangeRequest;
        $validator_2 = new MedicalInsurerCertificateRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);

        return $validator;
    }

    public function messages()
    {
        $messages = new HealthInsuranceDependentChangeRequest;
        $messages_2 = new MedicalInsurerCertificateRequest;

        return array_merge($messages->messages(),$messages_2->messages());
    }

    public function attributes()
    {
        $attributes = new HealthInsuranceDependentChangeRequest;
        $attributes_2 = new EmployerCertificateEtcRequest;
        $attributes_3 = new MedicalInsurerCertificateRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes(), $attributes_3->attributes());
    }
}
