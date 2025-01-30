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
            $data['employeeFullname'] = mb_convert_kana($data['employeeFullname'], 'AKS');
        }
        if (isset($data['employeeFullnameKana'])) {
            $data['employeeFullnameKana'] = mb_convert_kana($data['employeeFullnameKana'], 'KS');
        }
        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'AKS');
        }
        if (isset($data['financialInstitutionNameKana'])) {
            $data['financialInstitutionNameKana'] = mb_convert_kana($data['financialInstitutionNameKana'], 'AKS');
        }
        if (isset($data['financialInstitutionName'])) {
            $data['financialInstitutionName'] = mb_convert_kana($data['financialInstitutionName'], 'AKS');
        }
        if (isset($data['address'])) {
            $data['address'] = mb_convert_kana($data['address'], 'AKS');
            $data['address'] = str_replace(['-', '‐', '―'], '－', $data['address']);
        }
        if (isset($data['headquartersAddress'])) {
            $data['headquartersAddress'] = mb_convert_kana($data['headquartersAddress'], 'AKS');
            $data['headquartersAddress'] = str_replace(['-', '‐', '―'], '－', $data['headquartersAddress']);
        }
        if (isset($data['laborConsultantName'])) {
            $data['laborConsultantName'] = mb_convert_kana($data['laborConsultantName'], 'AKS');
        }
        if (isset($data['company_managerial_employer_name'])) {
            $data['company_managerial_employer_name'] = mb_convert_kana($data['company_managerial_employer_name'], 'AKS');
        }
        if (isset($data['branchAddress'])) {
            $data['branchAddress'] = mb_convert_kana($data['branchAddress'], 'AKS');
            $data['branchAddress'] = str_replace(['-', '‐', '―'], '－', $data['branchAddress']);
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
