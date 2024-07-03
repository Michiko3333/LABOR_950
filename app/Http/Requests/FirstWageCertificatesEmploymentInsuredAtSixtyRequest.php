<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstWageCertificatesEmploymentInsuredAtSixtyRequest extends BaseRequest
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

        if (isset($data['employeeFullname'])) {
            $data['employeeFullname'] = mb_convert_kana($data['employeeFullname'], 'S');
        }
        if (isset($data['employeeFullnameKana'])) {
            $data['employeeFullnameKana'] = mb_convert_kana($data['employeeFullnameKana'], 'S');
        }
        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'S');
        }
        if (isset($data['financialInstitutionNameKana'])) {
            $data['financialInstitutionNameKana'] = mb_convert_kana($data['financialInstitutionNameKana'], 'S');
        }
        if (isset($data['financialInstitutionName'])) {
            $data['financialInstitutionName'] = mb_convert_kana($data['financialInstitutionName'], 'S');
        }
        if (isset($data['address'])) {
            $data['address'] = mb_convert_kana($data['address'], 'AS');
            $data['address'] = str_replace(['-', '‐', '―'], '－', $data['address']);
        }
        if (isset($data['headquartersAddress'])) {
            $data['headquartersAddress'] = mb_convert_kana($data['headquartersAddress'], 'AS');
            $data['headquartersAddress'] = str_replace(['-', '‐', '―'], '－', $data['headquartersAddress']);
        }
        if (isset($data['laborConsultantName'])) {
            $data['laborConsultantName'] = mb_convert_kana($data['laborConsultantName'], 'S');
        }
        if (isset($data['branchName'])) {
            $data['branchName'] = mb_convert_kana($data['branchName'], 'S');
        }
        if (isset($data['company_managerial_employer_name'])) {
            $data['company_managerial_employer_name'] = mb_convert_kana($data['company_managerial_employer_name'], 'S');
        }
        if (isset($data['branchAddress'])) {
            $data['branchAddress'] = mb_convert_kana($data['branchAddress'], 'AS');
            $data['branchAddress'] = str_replace(['-', '‐', '―'], '－', $data['branchAddress']);
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
        $rules = new FirstSeniorEmploymentContinuationBenefitClaimFormRequest;
        $rules_2 = new EmploymentInsuranceInsuredPersonWageCertificateAtSixtyRequest;

        return array_merge($rules->rules(), $rules_2->rules());
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator_1 = new FirstSeniorEmploymentContinuationBenefitClaimFormRequest;
        $validator_2 = new EmploymentInsuranceInsuredPersonWageCertificateAtSixtyRequest;
        $validator_1->withValidator($validator);
        $validator_2->withValidator($validator);

        return $validator;
    }

    public function messages()
    {
        $messages = new FirstSeniorEmploymentContinuationBenefitClaimFormRequest;
        $messages_2 = new EmploymentInsuranceInsuredPersonWageCertificateAtSixtyRequest;

        return array_merge($messages->messages(), $messages_2->messages());
    }

    public function attributes()
    {
        $attributes = new FirstSeniorEmploymentContinuationBenefitClaimFormRequest;
        $attributes_2 = new EmploymentInsuranceInsuredPersonWageCertificateAtSixtyRequest;

        return array_merge($attributes->attributes(), $attributes_2->attributes());
    }
}
