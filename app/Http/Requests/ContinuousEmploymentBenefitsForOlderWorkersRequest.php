<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContinuousEmploymentBenefitsForOlderWorkersRequest extends FormRequest
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
            'file_wage_amount' => 'required_unless:radio_file_wage_amount,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_stable_job' => 'required_unless:radio_file_stable_job,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_eligibility' => 'required_if:radio_file_eligibility,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_written_consent' => 'required_if:radio_file_written_consent,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_other' => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'labor_consultant_acting_as_agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'ledger_type' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|max:255|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'required|string|max:2',
            'qualifications_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'fullname' =>  'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'payer_japan_era_year1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid1' => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_japan_era_year3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'note' => 'nullable|string|max:250|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'jurisdiction' => 'nullable|int|between:1,9|regex:/^[0-9]{1}$/u',
            'employment_insurance_office_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'special_note_on_wages3' => 'nullable|string|max:255',
            'today_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'destination' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'employer_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'benefits_types' => 'nullable|int|between:1,2',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'wage_deadline' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:3',
            'wage_structure_other' => 'nullable|string|max:5',
            'wage_structure' => 'nullable|string|max:3',
            'prescribed_working_days1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'prescribed_working_days2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'prescribed_working_days3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:1',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'branch_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era3' => 'nullable|string|max:2',
            'today_japan_era' => 'required|string|max:2',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_wage_amount')) {
                $totalSize += $this->file('file_wage_amount')->getSize();
            }
            if ($this->hasFile('file_stable_job')) {
                $totalSize += $this->file('file_stable_job')->getSize();
            }
            if ($this->hasFile('file_eligibility')) {
                $totalSize += $this->file('file_eligibility')->getSize();
            }
            if ($this->hasFile('file_written_consent')) {
                $totalSize += $this->file('file_written_consent')->getSize();
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
