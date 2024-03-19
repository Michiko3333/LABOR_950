<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuranceChildcareLeaveApplicationRequest extends FormRequest
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
            'ledger_type' => 'string|regex:/^[0-9]{1,5}$/u',
            'fullname_kana_number_symbol' => 'string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'employment_insured_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'string|max:2',
            'qualifications_japan_era_year' => 'int|max:99',
            'qualifications_month' => 'int|max:12',
            'qualifications_day' => 'int|max:31',
            'childcare_start_date_japane_era' => 'string|max:2',
            'childcare_start_date_japane_era_year' => 'int|max:99',
            'childcare_start_date_month' => 'int|max:12',
            'childcare_start_date_day' => 'int|max:31',
            'employment_insurance_office_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'birth_date_japan_era' => 'string|max:2',
            'birth_date_japan_era_year' => 'int|max:99',
            'birth_date_month' => 'int|max:12',
            'birth_date_day' => 'int|max:31',
            'fullname' => 'string|regex:/^[ぁ-んァ-ン一-龥　]+\z/u',
            'fullname_kana' => 'string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era_year1' => 'nullable|int|max:99',
            'payer_month1' => 'nullable|int|max:12',
            'payer_day1' => 'nullable|int|max:31',
            'payer_end_month1' => 'nullable|int|max:12',
            'payer_end_day1' => 'nullable|int|max:31',
            'workday_count1' => 'nullable|int|max:99',
            'working_hours1' => 'nullable|int|max:999',
            'wages_paid1' => 'nullable|int|digits:1,7',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|max:99',
            'payer_month2' => 'nullable|int|max:12',
            'payer_day2' => 'nullable|int|max:31',
            'payer_end_month2' => 'nullable|int|max:12',
            'payer_end_day2' => 'nullable|int|max:31',
            'workday_count2' => 'nullable|int|max:99',
            'working_hours2' => 'nullable|int|max:999',
            'wages_paid2' => 'nullable|int|digits:1,7',
            'last_payer_japan_era' => 'nullable|string|max:2',
            'last_payer_japan_era_year' => 'nullable|int|max:99',
            'last_payer_month' => 'nullable|int|max:12',
            'last_payer_japan_day' => 'nullable|int|max:31',
            'last_payer_end_month' => 'nullable|int|max:12',
            'last_payer_end_day' => 'nullable|int|max:31',
            'workday_count3' => 'nullable|int|max:31',
            'working_hours3' => 'nullable|int|max:999',
            'wages_paid3' => 'nullable|int|digits:1,7',
            'return_from_resignation_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_japan_era_year' => 'nullable|int|max:99',
            'return_from_resignation_month' => 'nullable|int|max:12',
            'return_from_resignation_day' => 'nullable|int|max:31',
            'payment_period_extension_reason' => 'nullable|int|max:9',
            'payment_period_extension_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_japan_era_year' => 'nullable|int|max:99',
            'payment_period_extension_month' => 'nullable|int|max:12',
            'payment_period_extension_day' => 'nullable|int|max:31',
            'payment_period_extension_end_month' => 'nullable|int|max:12',
            'payment_period_extension_end_day' => 'nullable|int|max:31',
            'partner_childcare_leave_taken' => 'nullable|int|max:9',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'today_japan_era' => 'string|max:2',
            'today_japan_era_year' => 'int|max:99',
            'today_japan_month' => 'int|max:12',
            'today_japan_day' => 'int|max:31',
            'headquarters_address' => 'string|regex:/^[ぁ-んァ-ン一-龥A-Z　]+\z/u',
            'headquarters_tel_treacode' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'string|regex:/^[ぁ-んァ-ン一-龥A-Z　]+\z/u',
            'destination' => 'string|regex:/^[ぁ-んァ-ン一-龥A-Z　]+\z/u',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'wage_deadline' => 'nullable|int|max:31',
            'wage_payment' => 'nullable|string|max:4',
            'wage_payment_day' => 'nullable|int|max:31',
            'commuting_allowance_period' => 'nullable|string|max:4',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'unsettled_japan_era' => 'nullable|string|max:2',
            'unsettled_japan_era_year' => 'nullable|int|max:99',
            'unsettled_month' => 'nullable|int|max:12',
            'unsettled_day' => 'nullable|int|max:31',
            'note' => 'nullable|string|max:255',
        ];
    }
}
