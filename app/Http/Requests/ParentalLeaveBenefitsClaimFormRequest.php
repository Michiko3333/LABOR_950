<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentalLeaveBenefitsClaimFormRequest extends FormRequest
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
            'leave_start_wage_monthly_certificate' => 'nullable|int|max:1',
            'reduced_working_hours_wage_certificate_start' => 'nullable|int|max:1',
            'ledger_type' => 'string|regex:/^[0-9]{1,10}$/u',
            'employment_insured_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'string|max:2',
            'qualifications_japan_era_year' => 'int|max:99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'int|max:12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'int|max:31|regex:/^[0-9]{1,2}$/u',
            'fullname' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'fullname_kana' => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'employment_insurance_office_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'childcare_start_date_japane_era' => 'string|max:2',
            'childcare_start_date_japane_era_year' => 'int|max:99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'int|max:12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'int|max:31|regex:/^[0-9]{1,2}$/u',
            'birth_date_japan_era' => 'string|max:2',
            'birth_date_japan_era_year' => 'int|max:99|regex:/^[0-9]{1,2}$/u',
            'birth_date_month' => 'int|max:12|regex:/^[0-9]{1,2}$/u',
            'birth_date_day' => 'int|max:31|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_japan_era' => 'nullable|string|max:2',
            'birth_due_date_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'post_code_former' => 'string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'string|regex:/^[0-9]{4}$/u',
            'address_prefecture_city' => 'string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'address_ward' => 'string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'address_apartment' => 'string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era_year1' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day1' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end1' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end1' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count1' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day2' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end2' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end2' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count2' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'payment_period_last_japan_era' => 'nullable|string|max:2',
            'payment_period_last_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u', 
            'payment_period_last_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_month_end' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day_end' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count3' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_date_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_date_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason' => 'nullable|int|max:9',
            'payment_period_extension_reason_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_reason_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'partner_childcare_leave_taken' => 'nullable|int|max:9',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'childcare_leave_reacquisition_cause' => 'nullable|int|max:9',
            'today_japan_era' => 'string|max:2',
            'today_japan_era_year' => 'int|max:99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'int|max:12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'int|max:31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'headquarters_tel_treacode' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name1' => 'string|max:255',
            'destination' => 'string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'financial_Institutions_name_kana' =>'nullable|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'financial_institution_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'headquarters_or_branch' => 'nullable|string|max:2',
            'financia_iInstitution_code' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'store_code' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'passbook_account_number' => 'nullable|string|regex:/^[0-9]{10,11}$/u',
            'yucho_bank_former' => 'nullable|string|regex:/^[0-9]{3,5}$/u',
            'yucho_bank_latter' => 'nullable|string|regex:/^[0-9]{7,8}$/u',
            'wage_deadline' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:2',
            'wage_payment_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:2',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'note' => 'nullable|string|max:255', 
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255', 
            'labor_consultant_name' => 'nullable|string|max:255', 
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
        ];
    }
}
