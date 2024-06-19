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

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['employment_fullname'])) {
            $data['employment_fullname'] = mb_convert_kana($data['employment_fullname'], 'S');
        }
        if (isset($data['employment_fullname_kana'])) {
            $data['employment_fullname_kana'] = mb_convert_kana($data['employment_fullname_kana'], 'S');
        }
        if (isset($data['entrepreneur_name'])) {
            $data['entrepreneur_name'] = mb_convert_kana($data['entrepreneur_name'], 'S');
        }
        if (isset($data['bank_name_kana'])) {
            $data['bank_name_kana'] = mb_convert_kana($data['bank_name_kana'], 'S');
        }
        if (isset($data['bank_name'])) {
            $data['bank_name'] = mb_convert_kana($data['bank_name'], 'S');
        }
        if (isset($data['branch'])) {
            $data['branch'] = mb_convert_kana($data['branch'], 'AS');
            $data['branch'] = str_replace(['-', '‐', '―'], '－', $data['branch']);
        }
        if (isset($data['employment_address'])) {
            $data['employment_address'] = mb_convert_kana($data['employment_address'], 'AS');
            $data['employment_address'] = str_replace(['-', '‐', '―'], '－', $data['employment_address']);
        }
        if (isset($data['creation_date_submission_agent'])) {
            $data['creation_date_submission_agent'] = mb_convert_kana($data['creation_date_submission_agent'], 'ASKV');
        }
        if (isset($data['submission_agent'])) {
            $data['submission_agent'] = mb_convert_kana($data['submission_agent'], 'ASKV');
        }
        if (isset($data['labor_consultant_fullname'])) {
            $data['labor_consultant_fullname'] = mb_convert_kana($data['labor_consultant_fullname'], 'S');
        }
        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'S');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['entrepreneur_address'])) {
            $data['entrepreneur_address'] = mb_convert_kana($data['entrepreneur_address'], 'AS');
            $data['entrepreneur_address'] = str_replace(['-', '‐', '―'], '－', $data['entrepreneur_address']);
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
        $rules = new CaregiverLeaveBenefitApplicationRequest;
        $rules_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($rules->rules(),$rules_2->rules());
    }
    public function withValidator($validator)
    {
        $validator_1 = new CaregiverLeaveBenefitApplicationRequest;
        $validator_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);

        return $validator;
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
