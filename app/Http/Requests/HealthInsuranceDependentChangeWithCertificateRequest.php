<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceDependentChangeWithCertificateRequest extends BaseRequest
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

        if (isset($data['name'])) {
            $data['name'] = mb_convert_kana($data['name'], 'S');
        }
        if (isset($data['name_kana'])) {
            $data['name_kana'] = mb_convert_kana($data['name_kana'], 'S');
        }
        if (isset($data['spouse_name'])) {
            $data['spouse_name'] = mb_convert_kana($data['spouse_name'], 'S');
        }
        if (isset($data['spouse_name_kana'])) {
            $data['spouse_name_kana'] = mb_convert_kana($data['spouse_name_kana'], 'S');
        }
        if (isset($data['spouse_alias_name'])) {
            $data['spouse_alias_name'] = mb_convert_kana($data['spouse_alias_name'], 'S');
        }
        if (isset($data['spouse_alias_name_kana'])) {
            $data['spouse_alias_name_kana'] = mb_convert_kana($data['spouse_alias_name_kana'], 'S');
        }
        if (isset($data['other_dependent1_name'])) {
            $data['other_dependent1_name'] = mb_convert_kana($data['other_dependent1_name'], 'S');
        }
        if (isset($data['other_dependent1_name_kana'])) {
            $data['other_dependent1_name_kana'] = mb_convert_kana($data['other_dependent1_name_kana'], 'S');
        }
        if (isset($data['other_dependent2_name'])) {
            $data['other_dependent2_name'] = mb_convert_kana($data['other_dependent2_name'], 'S');
        }
        if (isset($data['other_dependent2_name_kana'])) {
            $data['other_dependent2_name_kana'] = mb_convert_kana($data['other_dependent2_name_kana'], 'S');
        }
        if (isset($data['company_name'])) {
            $data['company_name'] = mb_convert_kana($data['company_name'], 'AS');
            $data['company_name'] = str_replace(['-', '‐', '―'], '－', $data['company_name']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '‐', '―'], '－', $data['employee_address']);
        }
        if (isset($data['spouse_address'])) {
            $data['spouse_address'] = mb_convert_kana($data['spouse_address'], 'AS');
            $data['spouse_address'] = str_replace(['-', '‐', '―'], '－', $data['spouse_address']);
        }
        if (isset($data['other_dependent1_address'])) {
            $data['other_dependent1_address'] = mb_convert_kana($data['other_dependent1_address'], 'AS');
            $data['other_dependent1_address'] = str_replace(['-', '‐', '―'], '－', $data['other_dependent1_address']);
        }
        if (isset($data['other_dependent2_address'])) {
            $data['other_dependent2_address'] = mb_convert_kana($data['other_dependent2_address'], 'AS');
            $data['other_dependent2_address'] = str_replace(['-', '‐', '―'], '－', $data['other_dependent2_address']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
        }
        if (isset($data['headquarters_representative'])) {
            $data['headquarters_representative'] = mb_convert_kana($data['headquarters_representative'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['medical_insurer_name'])) {
            $data['medical_insurer_name'] = mb_convert_kana($data['medical_insurer_name'], 'S');
        }
        if (isset($data['medical_insurer_representative'])) {
            $data['medical_insurer_representative'] = mb_convert_kana($data['medical_insurer_representative'], 'S');
        }
        if (isset($data['medical_insurer_address'])) {
            $data['medical_insurer_address'] = mb_convert_kana($data['medical_insurer_address'], 'AS');
            $data['medical_insurer_address'] = str_replace(['-', '‐', '―'], '－', $data['medical_insurer_address']);
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
        $rules = new HealthInsuranceDependentChangeRequest;
        $rules_2 = new EmployerCertificateEtcRequest;
        $rules_3 = new MedicalInsurerCertificateRequest;

        return array_merge($rules->rules(), $rules_2->rules(), $rules_3->rules());
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator_1 = new HealthInsuranceDependentChangeRequest;
        $validator_2 = new MedicalInsurerCertificateRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);
    }

    public function messages()
    {
        $messages = new HealthInsuranceDependentChangeRequest;
        $messages_2 = new MedicalInsurerCertificateRequest;

        return array_merge($messages->messages(), $messages_2->messages());
    }

    public function attributes()
    {
        $attributes = new HealthInsuranceDependentChangeRequest;
        $attributes_2 = new EmployerCertificateEtcRequest;
        $attributes_3 = new MedicalInsurerCertificateRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes(), $attributes_3->attributes());
    }
}
