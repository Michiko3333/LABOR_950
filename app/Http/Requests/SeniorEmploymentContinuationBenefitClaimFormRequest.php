<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeniorEmploymentContinuationBenefitClaimFormRequest extends FormRequest
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
            'labor_consultant_acting_as_agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255',
            'ledger_type' => 'string|regex:/^[0-9]{1,5}$/u',
            'employment_insured_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'string|max:255|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era_year' => 'string|max:2',
            'qualifications_month' => 'int|max:12',
            'qualifications_day' => 'int|max:31',
            'fullname' =>  'string|regex:/^[ぁ-んァ-ン一-龥　]+\z/u',
            'payer_japan_era_year1' => 'nullable|string|max:2',
            'payer_month1' => 'nullable|int|max:12',
            'wages_paid1' => 'nullable|int|digits:1,7',
            'wage_reduction_days1' => 'nullable|int|max:31',
            'payer_japan_era_year2' => 'nullable|string|max:2',
            'payer_month2' => 'nullable|int|max:12',
            'wages_paid2' => 'nullable|int|digits:1,7',
            'wage_reduction_days2' => 'nullable|int|max:31',
            'payer_japan_era_year3' => 'nullable|string|max:2',
            'payer_month3' => 'nullable|int|max:12',
            'wages_paid3' => 'nullable|int|digits:1,7',
            'wage_reduction_days3' => 'nullable|int|max:31',
            'note' => 'nullable|string|max:255',
            'jurisdiction' => 'nullable|int|digits:1',
            'employment_insurance_office_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'special_note_on_wages3' => 'nullable|string|max:255',
            'today_japan_era_year' => 'int|max:99',
            'today_japan_era_month' => 'int|max:12',
            'today_japan_era_day' => 'int|max:31',
            'destination' => 'string|max:10',
            'employer_name' => 'string|max:255',
            'headquarters_address' => 'string|max:255',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'benefits_types' => 'int|between:1,2',
            'fullname_kana' => 'string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'wage_deadline' => 'nullable|int|max:99',
            'wage_payment_day' => 'nullable|int|max:31',
            'wage_payment' => 'nullable|string|max:3',
            'wage_structure_other' => 'nullable|string|max:5',
            'wage_structure' => 'nullable|string|max:3',
            'prescribed_working_days1' => 'nullable|int|max:99',
            'prescribed_working_days2' => 'nullable|int|max:99',
            'prescribed_working_days3' => 'nullable|int|max:99',
            'commuting_allowance' => 'nullable|string|max:1',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'branch_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era3' => 'nullable|string|max:2',
            'today_japan_era' => 'string|max:2',
        ];
    }
}
