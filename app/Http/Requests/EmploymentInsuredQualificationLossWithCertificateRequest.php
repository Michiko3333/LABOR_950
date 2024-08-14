<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationLossWithCertificateRequest extends BaseRequest
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
        if (isset($data['new_name'])) {
            $data['new_name'] = mb_convert_kana($data['new_name'], 'S');
        }
        if (isset($data['new_name_kana'])) {
            $data['new_name_kana'] = mb_convert_kana($data['new_name_kana'], 'S');
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '‐', '―'], '－', $data['employee_address']);
        }
        if (isset($data['labor_consultant_acting_as_agent_name'])) {
            $data['labor_consultant_acting_as_agent_name'] = mb_convert_kana($data['labor_consultant_acting_as_agent_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['name_alphabet'])) {
            $data['name_alphabet'] = mb_convert_kana($data['name_alphabet'], 'as');
        }
        if (isset($data['company_name'])) {
            $data['company_name'] = mb_convert_kana($data['company_name'], 'AS');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
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
        $rules = new EmploymentInsuredQualificationLossRequest;
        $rules_2 = new EmploymentInsuredRetirementCertificateRequest;

        return array_merge($rules->rules(), $rules_2->rules());
    }
    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator_1 = new EmploymentInsuredQualificationLossRequest;
        $validator_2 = new EmploymentInsuredRetirementCertificateRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);
    }
    public function messages()
    {
        $messages = new EmploymentInsuredQualificationLossRequest;
        $messages_2 = new EmploymentInsuredRetirementCertificateRequest;

        return array_merge($messages->messages(), $messages_2->messages());
    }
    public function attributes()
    {
        $attributes = new EmploymentInsuredQualificationLossRequest;
        $attributes_2 = new EmploymentInsuredRetirementCertificateRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
