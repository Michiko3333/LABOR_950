<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstSeniorEmploymentContinuationBenefitClaimFormRequest extends FormRequest
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
        return [
            "file_wage_payment_status" => 'required_unless:radio_file_wage_payment_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_insured_age" => 'required_if:radio_file_insured_age,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_separation_form" => 'required_if:radio_file_separation_form,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_insured_period" => 'required_if:radio_file_insured_period,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_passbook" => 'required_if:radio_file_passbook,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "ledgerType" => 'string|regex:/^[0-9]{1,10}$/u',
            "mynumberCardNo" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "financialInstitutionName" => 'nullable|string|max:255',
            "employmentInsuredNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuredNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuredNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "qualificationsJapanEra" => 'string|max:2',
            "qualificationsJapanEraYear" => 'int|max:99',
            "qualificationsMonth" => 'int|max:12',
            "qualificationsDay" => 'int|max:31',
            "fullname" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "fullnameKana" => 'string|max:255|regex:/\A[ァ-ヴー　]+\z/u',
            "employmentInsuranceOfficeNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuranceOfficeNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuranceOfficeNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "benefitsType" => 'int|max:9',
            "payerJapanEra1" => 'nullable|string|max:2',
            "payerJapanEraYear1" => 'nullable|int|max:99',
            "payerMonth1" => 'nullable|int|max:12',
            "wagesPaid1" => 'nullable|int|digits:1,7',
            "wageReductionDays1" => 'nullable|int|max:99',
            "payerJapanEra2" => 'nullable|string|max:2',
            "payerJapanEraYear2" => 'nullable|int|max:99',
            "payerMonth2" => 'nullable|int|max:12',
            "wagesPaid2" => 'nullable|int|digits:1,7',
            "wageReductionDays2" => 'nullable|int|max:99',
            "payerJapanEra3" => 'nullable|string|max:2',
            "payerJapanEraYear3" => 'nullable|int|max:99',
            "payerMonth3" => 'nullable|int|max:12',
            "wagesPaid3" => 'nullable|int|digits:1,7',
            "wageReductionDays3" => 'nullable|int|max:99',
            "specialNoteOnWages1" => 'nullable|string|max:255',
            "specialNoteOnWages2" => 'nullable|string|max:255',
            "specialNoteOnWages3" => 'nullable|string|max:255',
            "todayJapanEra" => 'string|max:2',
            "todayJapanEraYear" => 'int|max:99',
            "todayMonth" => 'int|max:12',
            "todayDay" => 'int|max:31',
            "headquartersAddress" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９A-Z　]+\z/u',
            "headquartersTelAreaCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquartersTelCityCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquartersTelsubscriberCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "company_managerial_employer_name" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９A-Z　]+\z/u',
            "destination" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９　]+\z/u',
            "employee_address" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９A-Z　]+\z/u',
            "financialInstitutionNameKana" => 'nullable|string|max:255|regex:/\A[ァ-ヴー　]+\z/u',
            "financialInstitutionName" => 'nullable|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "headquartersOrBranch" => 'nullable|string|max:2',
            "financialInstitutionCode" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "storeCode" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "passbookAccountNumber" => 'nullable|string|regex:/^[0-9]{1,7}$/u',
            "yuchoBankFormer" => 'nullable|string|regex:/^[0-9]{7}$/u',
            "yuchoBankLatter" => 'nullable|string|regex:/^[0-9]{8}$/u',
            "wageDeadline" => 'nullable|int|max:99',
            "wagePayment" => 'nullable|string|max:2',
            "wagePaymentDay" => 'nullable|int|max:31',
            "wageStructure" => 'nullable|string|max:4',
            "wageStructureOther" => 'nullable|string|max:4',
            "prescribedWorkingDays1" => 'nullable|int|max:99',
            "prescribedWorkingDays2" => 'nullable|int|max:99',
            "prescribedWorkingDays3" => 'nullable|int|max:99',
            "commutingAllowance" => 'nullable|string|max:2',
            "commutingAllowancePeriod" => 'nullable|string|max:4',
            "commutingAllowancePeriodOther" => 'nullable|string|max:4',
            "note" => 'nullable|string|max:255',
            "laborConsultantActingAsAgent" => 'nullable|string|max:255',
            "laborConsultantName" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９　]+\z/u',
            "laborConsultantTelAreaCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelSubscriberCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelCityCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_wage_payment_status')) {
                $totalSize += $this->file('file_wage_payment_status')->getSize();
            }
            if ($this->hasFile('file_insured_age')) {
                $totalSize += $this->file('file_insured_age')->getSize();
            }
            if ($this->hasFile('file_separation_form')) {
                $totalSize += $this->file('file_separation_form')->getSize();
            }
            if ($this->hasFile('file_insured_period')) {
                $totalSize += $this->file('file_insured_period')->getSize();
            }
            if ($this->hasFile('file_passbook')) {
                $totalSize += $this->file('file_passbook')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }
}
