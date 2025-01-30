<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareLeaveBenefitEmploymentInsuranceCareLeaveBenefitApplicationRequest extends BaseRequest
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
            $data['employment_fullname'] = mb_convert_kana($data['employment_fullname'], 'AKS');
        }
        if (isset($data['employment_lastname'])) {
            $data['employment_lastname'] = mb_convert_kana($data['employment_lastname'], 'K');
        }
        if (isset($data['employment_firstname'])) {
            $data['employment_firstname'] = mb_convert_kana($data['employment_firstname'], 'K');
        }
        if (isset($data['employment_fullname_kana'])) {
            $data['employment_fullname_kana'] = mb_convert_kana($data['employment_fullname_kana'], 'KS');
        }
        if (isset($data['dependent_lastname_kana'])) {
            $data['dependent_lastname_kana'] = mb_convert_kana($data['dependent_lastname_kana'], 'K');
        }
        if (isset($data['dependent_firstname_kana'])) {
            $data['dependent_firstname_kana'] = mb_convert_kana($data['dependent_firstname_kana'], 'K');
        }
        if (isset($data['dependent_lastname'])) {
            $data['dependent_lastname'] = mb_convert_kana($data['dependent_lastname'], 'K');
        }
        if (isset($data['dependent_firstname'])) {
            $data['dependent_firstname'] = mb_convert_kana($data['dependent_firstname'], 'K');
        }
        if (isset($data['entrepreneur_name'])) {
            $data['entrepreneur_name'] = mb_convert_kana($data['entrepreneur_name'], 'AKS');
        }
        if (isset($data['bank_name_kana'])) {
            $data['bank_name_kana'] = mb_convert_kana($data['bank_name_kana'], 'KS');
        }
        if (isset($data['bank_name'])) {
            $data['bank_name'] = mb_convert_kana($data['bank_name'], 'AKS');
        }
        if (isset($data['branch'])) {
            $data['branch'] = mb_convert_kana($data['branch'], 'AKS');
            $data['branch'] = str_replace(['-', '‐', '―'], '－', $data['branch']);
        }
        if (isset($data['employment_address'])) {
            $data['employment_address'] = mb_convert_kana($data['employment_address'], 'AKS');
            $data['employment_address'] = str_replace(['-', '‐', '―'], '－', $data['employment_address']);
        }
        if (isset($data['creation_date_submission_agent'])) {
            $data['creation_date_submission_agent'] = mb_convert_kana($data['creation_date_submission_agent'], 'AKS');
        }
        if (isset($data['submission_agent'])) {
            $data['submission_agent'] = mb_convert_kana($data['submission_agent'], 'AKS');
        }
        if (isset($data['labor_consultant_fullname'])) {
            $data['labor_consultant_fullname'] = mb_convert_kana($data['labor_consultant_fullname'], 'AKS');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AKS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['entrepreneur_address'])) {
            $data['entrepreneur_address'] = mb_convert_kana($data['entrepreneur_address'], 'AKS');
            $data['entrepreneur_address'] = str_replace(['-', '‐', '―'], '－', $data['entrepreneur_address']);
        }

        $this->merge($data);

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

        return array_merge($rules->rules(), $rules_2->rules());
    }
    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator_1 = new CaregiverLeaveBenefitApplicationRequest;
        $validator_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);
    }
    public function messages()
    {
        $messages = new CaregiverLeaveBenefitApplicationRequest;
        $messages_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($messages->messages(), $messages_2->messages());
    }
    public function attributes()
    {
        $attributes = new CaregiverLeaveBenefitApplicationRequest;
        $attributes_2 = new WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
