<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuranceInsuredPersonLeaveStartWageMonthlyCertificateRequest extends FormRequest
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

    public static function rules(): array
    {
        return [
            'leave_start_wage_monthly_certificate' => 'nullable|string|in:1|required_without:reduced_working_hours_wage_certificate_start',
            'reduced_working_hours_wage_certificate_start' => 'nullable|string|in:1',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'employment_insurance_office_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'fullname' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'fullname_kana' => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'childcare_start_date_japan_era' => 'required|string|max:2',
            'childcare_start_date_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'branch_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'branch_address' => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'branch_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'post_code_former' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'address' => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_address' => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'employer_company_managerial_position_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　－‐]+\z/u',
            'leave_start_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:leave_start_date_day',
            'leave_start_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:leave_start_date_month',
            'calculation_duration_start_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1',
            'calculation_duration_start_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_1',
            'calculation_duration_start_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_2',
            'calculation_duration_start_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_3',
            'calculation_duration_start_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_4',
            'calculation_duration_start_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_5',
            'calculation_duration_start_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_6',
            'calculation_duration_start_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_7',
            'calculation_duration_start_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_8',
            'calculation_duration_start_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_9',
            'calculation_duration_start_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_10',
            'calculation_duration_start_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_11',
            'calculation_duration_start_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_12',
            'calculation_duration_start_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_13',
            'calculation_duration_start_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_14',
            'calculation_duration_start_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day1_15',
            'calculation_duration_start_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1',
            'calculation_duration_start_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_1',
            'calculation_duration_start_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_2',
            'calculation_duration_start_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_3',
            'calculation_duration_start_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_4',
            'calculation_duration_start_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_5',
            'calculation_duration_start_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_6',
            'calculation_duration_start_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_7',
            'calculation_duration_start_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_8',
            'calculation_duration_start_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_9',
            'calculation_duration_start_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_10',
            'calculation_duration_start_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_11',
            'calculation_duration_start_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_12',
            'calculation_duration_start_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_13',
            'calculation_duration_start_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_14',
            'calculation_duration_start_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month1_15',
            'calculation_duration_end_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_1',
            'calculation_duration_end_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_2',
            'calculation_duration_end_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_3',
            'calculation_duration_end_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_4',
            'calculation_duration_end_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_5',
            'calculation_duration_end_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_6',
            'calculation_duration_end_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_7',
            'calculation_duration_end_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_8',
            'calculation_duration_end_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_9',
            'calculation_duration_end_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_10',
            'calculation_duration_end_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_11',
            'calculation_duration_end_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_12',
            'calculation_duration_end_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_13',
            'calculation_duration_end_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_14',
            'calculation_duration_end_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day1_15',
            'calculation_duration_end_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_1',
            'calculation_duration_end_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_2',
            'calculation_duration_end_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_3',
            'calculation_duration_end_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_4',
            'calculation_duration_end_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_5',
            'calculation_duration_end_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_6',
            'calculation_duration_end_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_7',
            'calculation_duration_end_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_8',
            'calculation_duration_end_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_9',
            'calculation_duration_end_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_10',
            'calculation_duration_end_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_11',
            'calculation_duration_end_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_12',
            'calculation_duration_end_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_13',
            'calculation_duration_end_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_14',
            'calculation_duration_end_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month1_15',
            'calculation_duration_basic_days' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_start_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1',
            'payment_duration_start_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_1',
            'payment_duration_start_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_2',
            'payment_duration_start_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_3',
            'payment_duration_start_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_4',
            'payment_duration_start_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_5',
            'payment_duration_start_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_6',
            'payment_duration_start_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_7',
            'payment_duration_start_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_8',
            'payment_duration_start_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_9',
            'payment_duration_start_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_10',
            'payment_duration_start_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_11',
            'payment_duration_start_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_12',
            'payment_duration_start_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_13',
            'payment_duration_start_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_14',
            'payment_duration_start_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day1_15',
            'payment_duration_start_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1',
            'payment_duration_start_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_1',
            'payment_duration_start_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_2',
            'payment_duration_start_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_3',
            'payment_duration_start_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_4',
            'payment_duration_start_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_5',
            'payment_duration_start_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_6',
            'payment_duration_start_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_7',
            'payment_duration_start_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_8',
            'payment_duration_start_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_9',
            'payment_duration_start_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_10',
            'payment_duration_start_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_11',
            'payment_duration_start_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_12',
            'payment_duration_start_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_13',
            'payment_duration_start_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_14',
            'payment_duration_start_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month1_15',
            'payment_duration_end_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_1',
            'payment_duration_end_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_2',
            'payment_duration_end_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_3',
            'payment_duration_end_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_4',
            'payment_duration_end_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_5',
            'payment_duration_end_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_6',
            'payment_duration_end_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_7',
            'payment_duration_end_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_8',
            'payment_duration_end_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_9',
            'payment_duration_end_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_10',
            'payment_duration_end_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_11',
            'payment_duration_end_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_12',
            'payment_duration_end_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_13',
            'payment_duration_end_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_14',
            'payment_duration_end_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day1_15',
            'payment_duration_end_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_1',
            'payment_duration_end_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_2',
            'payment_duration_end_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_3',
            'payment_duration_end_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_4',
            'payment_duration_end_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_5',
            'payment_duration_end_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_6',
            'payment_duration_end_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_7',
            'payment_duration_end_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_8',
            'payment_duration_end_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_9',
            'payment_duration_end_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_10',
            'payment_duration_end_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_11',
            'payment_duration_end_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_12',
            'payment_duration_end_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_13',
            'payment_duration_end_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_14',
            'payment_duration_end_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month1_15',
            'payment_duration_basic_days1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_A1' =>  'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'total_wages1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_2' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_3' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_4' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_5' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_7' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_6' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_9' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_8' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_10' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_11' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_12' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_13' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_14' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages1_15' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_note1' => 'nullable|string|max:255',
            'wage_note1_1' => 'nullable|string|max:255',
            'wage_note1_2' => 'nullable|string|max:255',
            'wage_note1_3' => 'nullable|string|max:255',
            'wage_note1_4' => 'nullable|string|max:255',
            'wage_note1_5' => 'nullable|string|max:255',
            'wage_note1_6' => 'nullable|string|max:255',
            'wage_note1_7' => 'nullable|string|max:255',
            'wage_note1_8' => 'nullable|string|max:255',
            'wage_note1_9' => 'nullable|string|max:255',
            'wage_note1_10' => 'nullable|string|max:255',
            'wage_note1_11' => 'nullable|string|max:255',
            'wage_note1_12' => 'nullable|string|max:255',
            'wage_note1_13' => 'nullable|string|max:255',
            'wage_note1_14' => 'nullable|string|max:255',
            'wage_note1_15' => 'nullable|string|max:255',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'employment_duration_set' => 'required|string|max:10',
            'employment_duration_set_japan_era' => 'nullable|string|max:2',
            'employment_duration_set_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:employment_duration_set_month,employment_duration_set_day',
            'employment_duration_set_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:employment_duration_set_japan_era_year,employment_duration_set_day',
            'employment_duration_set_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:employment_duration_set_japan_era_year,employment_duration_set_month',
            'period_with_leave_start_included_year' => 'nullable|int|regex:/^[0-9]{1,2}$/u',
            'period_with_leave_start_included_month' => 'nullable|int|between:0,11|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_japan_era' => 'nullable|string|max:2',
            'labor_consultant_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'other_notes' => 'nullable|string|max:255',
            'calculation_duration_start_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_1',
            'calculation_duration_start_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_2',
            'calculation_duration_start_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_3',
            'calculation_duration_start_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_4',
            'calculation_duration_start_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_5',
            'calculation_duration_start_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_6',
            'calculation_duration_start_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_7',
            'calculation_duration_start_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_8',
            'calculation_duration_start_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_9',
            'calculation_duration_start_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_10',
            'calculation_duration_start_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_11',
            'calculation_duration_start_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_12',
            'calculation_duration_start_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_13',
            'calculation_duration_start_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_14',
            'calculation_duration_start_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_day2_15',
            'calculation_duration_start_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_1',
            'calculation_duration_start_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_2',
            'calculation_duration_start_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_3',
            'calculation_duration_start_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_4',
            'calculation_duration_start_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_5',
            'calculation_duration_start_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_6',
            'calculation_duration_start_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_7',
            'calculation_duration_start_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_8',
            'calculation_duration_start_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_9',
            'calculation_duration_start_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_10',
            'calculation_duration_start_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_11',
            'calculation_duration_start_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_12',
            'calculation_duration_start_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_13',
            'calculation_duration_start_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_14',
            'calculation_duration_start_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_start_month2_15',
            'calculation_duration_end_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_1',
            'calculation_duration_end_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_2',
            'calculation_duration_end_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_3',
            'calculation_duration_end_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_4',
            'calculation_duration_end_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_5',
            'calculation_duration_end_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_6',
            'calculation_duration_end_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_7',
            'calculation_duration_end_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_8',
            'calculation_duration_end_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_9',
            'calculation_duration_end_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_10',
            'calculation_duration_end_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_11',
            'calculation_duration_end_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_12',
            'calculation_duration_end_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_13',
            'calculation_duration_end_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_14',
            'calculation_duration_end_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_day2_15',
            'calculation_duration_end_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_1',
            'calculation_duration_end_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_2',
            'calculation_duration_end_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_3',
            'calculation_duration_end_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_4',
            'calculation_duration_end_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_5',
            'calculation_duration_end_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_6',
            'calculation_duration_end_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_7',
            'calculation_duration_end_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_8',
            'calculation_duration_end_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_9',
            'calculation_duration_end_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_10',
            'calculation_duration_end_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_11',
            'calculation_duration_end_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_12',
            'calculation_duration_end_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_13',
            'calculation_duration_end_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_14',
            'calculation_duration_end_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_duration_end_month2_15',
            'calculation_duration_basic_days2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_duration_basic_days2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_start_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_1',
            'payment_duration_start_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_2',
            'payment_duration_start_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_3',
            'payment_duration_start_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_4',
            'payment_duration_start_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_5',
            'payment_duration_start_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_6',
            'payment_duration_start_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_7',
            'payment_duration_start_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_8',
            'payment_duration_start_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_9',
            'payment_duration_start_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_10',
            'payment_duration_start_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_11',
            'payment_duration_start_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_12',
            'payment_duration_start_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_13',
            'payment_duration_start_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_14',
            'payment_duration_start_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_day2_15',
            'payment_duration_start_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_1',
            'payment_duration_start_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_2',
            'payment_duration_start_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_3',
            'payment_duration_start_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_4',
            'payment_duration_start_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_5',
            'payment_duration_start_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_6',
            'payment_duration_start_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_7',
            'payment_duration_start_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_8',
            'payment_duration_start_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_9',
            'payment_duration_start_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_10',
            'payment_duration_start_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_11',
            'payment_duration_start_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_12',
            'payment_duration_start_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_13',
            'payment_duration_start_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_14',
            'payment_duration_start_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_start_month2_15',
            'payment_duration_end_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_1',
            'payment_duration_end_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_2',
            'payment_duration_end_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_3',
            'payment_duration_end_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_4',
            'payment_duration_end_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_5',
            'payment_duration_end_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_6',
            'payment_duration_end_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_7',
            'payment_duration_end_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_8',
            'payment_duration_end_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_9',
            'payment_duration_end_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_10',
            'payment_duration_end_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_11',
            'payment_duration_end_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_12',
            'payment_duration_end_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_13',
            'payment_duration_end_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_14',
            'payment_duration_end_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_day2_15',
            'payment_duration_end_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_1',
            'payment_duration_end_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_2',
            'payment_duration_end_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_3',
            'payment_duration_end_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_4',
            'payment_duration_end_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_5',
            'payment_duration_end_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_6',
            'payment_duration_end_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_7',
            'payment_duration_end_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_8',
            'payment_duration_end_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_9',
            'payment_duration_end_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_10',
            'payment_duration_end_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_11',
            'payment_duration_end_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_12',
            'payment_duration_end_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_13',
            'payment_duration_end_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_14',
            'payment_duration_end_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_duration_end_month2_15',
            'payment_duration_basic_days2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_duration_basic_days2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_A2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_A2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_B2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'total_wages2_1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_2' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_3' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_4' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_5' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_7' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_6' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_9' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_8' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_10' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_11' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_12' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_13' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_14' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'total_wages2_15' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_note2_1' => 'nullable|string|max:255',
            'wage_note2_2' => 'nullable|string|max:255',
            'wage_note2_3' => 'nullable|string|max:255',
            'wage_note2_4' => 'nullable|string|max:255',
            'wage_note2_5' => 'nullable|string|max:255',
            'wage_note2_6' => 'nullable|string|max:255',
            'wage_note2_7' => 'nullable|string|max:255',
            'wage_note2_8' => 'nullable|string|max:255',
            'wage_note2_9' => 'nullable|string|max:255',
            'wage_note2_10' => 'nullable|string|max:255',
            'wage_note2_11' => 'nullable|string|max:255',
            'wage_note2_12' => 'nullable|string|max:255',
            'wage_note2_13' => 'nullable|string|max:255',
            'wage_note2_14' => 'nullable|string|max:255',
            'wage_note2_15' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();

            if(!empty($data['employment_duration_set_month']) && !empty($data['employment_duration_set_day'])){
                if(ctype_digit($data['employment_duration_set_month'])){
                    if (!checkdate($data['employment_duration_set_month'], $data['employment_duration_set_day'], '2000')) {
                    $validator->errors()->add('employment_duration_set_day','2枚目_14_（休業開始時における）雇用期間_日付は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['employment_duration_set_japan_era'])){
                if ($data['employment_duration_set_japan_era'] === '平成') {
                    if (
                        ($data['employment_duration_set_japan_era_year'] == 1 && ($data['employment_duration_set_month'] < 1 || ($data['employment_duration_set_month'] == 1 && $data['employment_duration_set_day'] < 8))) ||
                        ($data['employment_duration_set_japan_era_year'] == 31 && ($data['employment_duration_set_month'] > 4 || ($data['employment_duration_set_month'] == 4 && $data['employment_duration_set_day'] > 30))) ||
                        ($data['employment_duration_set_japan_era_year'] > 31)
                    ) {
                        $validator->errors()->add('childcare_start_date_day', '2枚目_14_（休業開始時における）雇用期間_日付は正しい日付を入力してください。');
                    }
                } elseif ($data['employment_duration_set_japan_era'] === '令和') {
                    if ($data['employment_duration_set_japan_era_year'] == 1 && ($data['employment_duration_set_month'] < 5)) {
                        $validator->errors()->add('childcare_start_date_day', '2枚目_14_（休業開始時における）雇用期間_日付は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_start_month1']) && !empty($data['calculation_duration_start_day1'])){
                if(ctype_digit($data['calculation_duration_start_month1'])){
                    if (!checkdate($data['calculation_duration_start_month1'], $data['calculation_duration_start_day1'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1','2枚目_7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_start_month1_1']) && !empty($data['calculation_duration_start_day1_1'])){
                if(ctype_digit($data['calculation_duration_start_month1_1'])){
                    if (!checkdate($data['calculation_duration_start_month1_1'], $data['calculation_duration_start_day1_1'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_1','2枚目_7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_2']) && !empty($data['calculation_duration_start_day1_2'])){
                if(ctype_digit($data['calculation_duration_start_month1_2'])){
                    if (!checkdate($data['calculation_duration_start_month1_2'], $data['calculation_duration_start_day1_2'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_2','2枚目_7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_3']) && !empty($data['calculation_duration_start_day1_3'])){
                if(ctype_digit($data['calculation_duration_start_month1_3'])){
                    if (!checkdate($data['calculation_duration_start_month1_3'], $data['calculation_duration_start_day1_3'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_3','2枚目_7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_4']) && !empty($data['calculation_duration_start_day1_4'])){
                if(ctype_digit($data['calculation_duration_start_month1_4'])){
                    if (!checkdate($data['calculation_duration_start_month1_4'], $data['calculation_duration_start_day1_4'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_4','2枚目_7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_5']) && !empty($data['calculation_duration_start_day1_5'])){
                if(ctype_digit($data['calculation_duration_start_month1_5'])){
                    if (!checkdate($data['calculation_duration_start_month1_5'], $data['calculation_duration_start_day1_5'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_5','2枚目_7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_6']) && !empty($data['calculation_duration_start_day1_6'])){
                if(ctype_digit($data['calculation_duration_start_month1_6'])){
                    if (!checkdate($data['calculation_duration_start_month1_6'], $data['calculation_duration_start_day1_6'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_6','2枚目_7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_7']) && !empty($data['calculation_duration_start_day1_7'])){
                if(ctype_digit($data['calculation_duration_start_month1_7'])){
                    if (!checkdate($data['calculation_duration_start_month1_7'], $data['calculation_duration_start_day1_7'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_7','2枚目_7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_8']) && !empty($data['calculation_duration_start_day1_8'])){
                if(ctype_digit($data['calculation_duration_start_month1_8'])){
                    if (!checkdate($data['calculation_duration_start_month1_8'], $data['calculation_duration_start_day1_8'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_8','2枚目_7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_9']) && !empty($data['calculation_duration_start_day1_9'])){
                if(ctype_digit($data['calculation_duration_start_month1_9'])){
                    if (!checkdate($data['calculation_duration_start_month1_9'], $data['calculation_duration_start_day1_9'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_9','2枚目_7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_10']) && !empty($data['calculation_duration_start_day1_10'])){
                if(ctype_digit($data['calculation_duration_start_month1_10'])){
                    if (!checkdate($data['calculation_duration_start_month1_10'], $data['calculation_duration_start_day1_10'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_10','2枚目_7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_11']) && !empty($data['calculation_duration_start_day1_11'])){
                if(ctype_digit($data['calculation_duration_start_month1_11'])){
                    if (!checkdate($data['calculation_duration_start_month1_11'], $data['calculation_duration_start_day1_11'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_11','2枚目_7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_12']) && !empty($data['calculation_duration_start_day1_12'])){
                if(ctype_digit($data['calculation_duration_start_month1_12'])){
                    if (!checkdate($data['calculation_duration_start_month1_12'], $data['calculation_duration_start_day1_12'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_12','2枚目_7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_13']) && !empty($data['calculation_duration_start_day1_13'])){
                if(ctype_digit($data['calculation_duration_start_month1_13'])){
                    if (!checkdate($data['calculation_duration_start_month1_13'], $data['calculation_duration_start_day1_13'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_13','2枚目_7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month1_14']) && !empty($data['calculation_duration_start_day1_14'])){
                if(ctype_digit($data['calculation_duration_start_month1_14'])){
                    if (!checkdate($data['calculation_duration_start_month1_14'], $data['calculation_duration_start_day1_14'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_14','2枚目_7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_start_month1_15']) && !empty($data['calculation_duration_start_day1_15'])){
                if(ctype_digit($data['calculation_duration_start_month1_15'])){
                    if (!checkdate($data['calculation_duration_start_month1_15'], $data['calculation_duration_start_day1_15'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day1_15','2枚目_7_算定対象期間_開始日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_end_month1_1']) && !empty($data['calculation_duration_end_day1_1'])){
                if(ctype_digit($data['calculation_duration_end_month1_1'])){
                    if (!checkdate($data['calculation_duration_end_month1_1'], $data['calculation_duration_end_day1_1'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_1','2枚目_7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_end_month1_2']) && !empty($data['calculation_duration_end_day1_2'])){
                if(ctype_digit($data['calculation_duration_end_month1_2'])){
                    if (!checkdate($data['calculation_duration_end_month1_2'], $data['calculation_duration_end_day1_2'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_2','2枚目_7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_3']) && !empty($data['calculation_duration_end_day1_3'])){
                if(ctype_digit($data['calculation_duration_end_month1_3'])){
                    if (!checkdate($data['calculation_duration_end_month1_3'], $data['calculation_duration_end_day1_3'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_3','2枚目_7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_4']) && !empty($data['calculation_duration_end_day1_4'])){
                if(ctype_digit($data['calculation_duration_end_month1_4'])){
                    if (!checkdate($data['calculation_duration_end_month1_4'], $data['calculation_duration_end_day1_4'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_4','2枚目_7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_5']) && !empty($data['calculation_duration_end_day1_5'])){
                if(ctype_digit($data['calculation_duration_end_month1_5'])){
                    if (!checkdate($data['calculation_duration_end_month1_5'], $data['calculation_duration_end_day1_5'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_5','2枚目_7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_6']) && !empty($data['calculation_duration_end_day1_6'])){
                if(ctype_digit($data['calculation_duration_end_month1_6'])){
                    if (!checkdate($data['calculation_duration_end_month1_6'], $data['calculation_duration_end_day1_6'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_6','2枚目_7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_7']) && !empty($data['calculation_duration_end_day1_7'])){
                if(ctype_digit($data['calculation_duration_end_month1_7'])){
                    if (!checkdate($data['calculation_duration_end_month1_7'], $data['calculation_duration_end_day1_7'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_7','2枚目_7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_8']) && !empty($data['calculation_duration_end_day1_8'])){
                if(ctype_digit($data['calculation_duration_end_month1_8'])){
                    if (!checkdate($data['calculation_duration_end_month1_8'], $data['calculation_duration_end_day1_8'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_8','2枚目_7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_9']) && !empty($data['calculation_duration_end_day1_9'])){
                if(ctype_digit($data['calculation_duration_end_month1_9'])){
                    if (!checkdate($data['calculation_duration_end_month1_9'], $data['calculation_duration_end_day1_9'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_9','2枚目_7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_10']) && !empty($data['calculation_duration_end_day1_10'])){
                if(ctype_digit($data['calculation_duration_end_month1_10'])){
                    if (!checkdate($data['calculation_duration_end_month1_10'], $data['calculation_duration_end_day1_10'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_10','2枚目_7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_11']) && !empty($data['calculation_duration_end_day1_11'])){
                if(ctype_digit($data['calculation_duration_end_month1_11'])){
                    if (!checkdate($data['calculation_duration_end_month1_11'], $data['calculation_duration_end_day1_11'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_11','2枚目_7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_12']) && !empty($data['calculation_duration_end_day1_12'])){
                if(ctype_digit($data['calculation_duration_end_month1_12'])){
                    if (!checkdate($data['calculation_duration_end_month1_12'], $data['calculation_duration_end_day1_12'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_12','2枚目_7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_13']) && !empty($data['calculation_duration_end_day1_13'])){
                if(ctype_digit($data['calculation_duration_end_month1_13'])){
                    if (!checkdate($data['calculation_duration_end_month1_13'], $data['calculation_duration_end_day1_13'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_13','2枚目_7_算定対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month1_14']) && !empty($data['calculation_duration_end_day1_14'])){
                if(ctype_digit($data['calculation_duration_end_month1_14'])){
                    if (!checkdate($data['calculation_duration_end_month1_14'], $data['calculation_duration_end_day1_14'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_14','2枚目_7_算定対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
            
            if(!empty($data['calculation_duration_end_month1_15']) && !empty($data['calculation_duration_end_day1_15'])){
                if(ctype_digit($data['calculation_duration_end_month1_15'])){
                    if (!checkdate($data['calculation_duration_end_month1_15'], $data['calculation_duration_end_day1_15'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day1_15','2枚目_7_算定対象期間_終了日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_duration_start_month1']) && !empty($data['payment_duration_start_day1'])){
                if(ctype_digit($data['payment_duration_start_month1'])){
                    if (!checkdate($data['payment_duration_start_month1'], $data['payment_duration_start_day1'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1','2枚目_9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_duration_start_month1_1']) && !empty($data['payment_duration_start_day1_1'])){
                if(ctype_digit($data['payment_duration_start_month1_1'])){
                    if (!checkdate($data['payment_duration_start_month1_1'], $data['payment_duration_start_day1_1'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_1','2枚目_9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_2']) && !empty($data['payment_duration_start_day1_2'])){
                if(ctype_digit($data['payment_duration_start_month1_2'])){
                    if (!checkdate($data['payment_duration_start_month1_2'], $data['payment_duration_start_day1_2'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_2','2枚目_9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_3']) && !empty($data['payment_duration_start_day1_3'])){
                if(ctype_digit($data['payment_duration_start_month1_3'])){
                    if (!checkdate($data['payment_duration_start_month1_3'], $data['payment_duration_start_day1_3'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_3','2枚目_9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_4']) && !empty($data['payment_duration_start_day1_4'])){
                if(ctype_digit($data['payment_duration_start_month1_4'])){
                    if (!checkdate($data['payment_duration_start_month1_4'], $data['payment_duration_start_day1_4'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_4','2枚目_9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_5']) && !empty($data['payment_duration_start_day1_5'])){
                if(ctype_digit($data['payment_duration_start_month1_5'])){
                    if (!checkdate($data['payment_duration_start_month1_5'], $data['payment_duration_start_day1_5'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_5','2枚目_9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_6']) && !empty($data['payment_duration_start_day1_6'])){
                if(ctype_digit($data['payment_duration_start_month1_6'])){
                    if (!checkdate($data['payment_duration_start_month1_6'], $data['payment_duration_start_day1_6'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_6','2枚目_9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_7']) && !empty($data['payment_duration_start_day1_7'])){
                if(ctype_digit($data['payment_duration_start_month1_7'])){
                    if (!checkdate($data['payment_duration_start_month1_7'], $data['payment_duration_start_day1_7'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_7','2枚目_9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_8']) && !empty($data['payment_duration_start_day1_8'])){
                if(ctype_digit($data['payment_duration_start_month1_8'])){
                    if (!checkdate($data['payment_duration_start_month1_8'], $data['payment_duration_start_day1_8'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_8','2枚目_9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_9']) && !empty($data['payment_duration_start_day1_9'])){
                if(ctype_digit($data['payment_duration_start_month1_9'])){
                    if (!checkdate($data['payment_duration_start_month1_9'], $data['payment_duration_start_day1_9'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_9','2枚目_9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_10']) && !empty($data['payment_duration_start_day1_10'])){
                if(ctype_digit($data['payment_duration_start_month1_10'])){
                    if (!checkdate($data['payment_duration_start_month1_10'], $data['payment_duration_start_day1_10'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_10','2枚目_9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_11']) && !empty($data['payment_duration_start_day1_11'])){
                if(ctype_digit($data['payment_duration_start_month1_11'])){
                    if (!checkdate($data['payment_duration_start_month1_11'], $data['payment_duration_start_day1_11'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_11','2枚目_9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_12']) && !empty($data['payment_duration_start_day1_12'])){
                if(ctype_digit($data['payment_duration_start_month1_12'])){
                    if (!checkdate($data['payment_duration_start_month1_12'], $data['payment_duration_start_day1_12'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_12','2枚目_9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_13']) && !empty($data['payment_duration_start_day1_13'])){
                if(ctype_digit($data['payment_duration_start_month1_13'])){
                    if (!checkdate($data['payment_duration_start_month1_13'], $data['payment_duration_start_day1_13'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_13','2枚目_9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month1_14']) && !empty($data['payment_duration_start_day1_14'])){
                if(ctype_digit($data['payment_duration_start_month1_14'])){
                    if (!checkdate($data['payment_duration_start_month1_14'], $data['payment_duration_start_day1_14'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_14','2枚目_9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
            
            if(!empty($data['payment_duration_start_month1_15']) && !empty($data['payment_duration_start_day1_15'])){
                if(ctype_digit($data['payment_duration_start_month1_15'])){
                    if (!checkdate($data['payment_duration_start_month1_15'], $data['payment_duration_start_day1_15'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day1_15','2枚目_9_賃金支払対象期間_開始日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_period_end_month1_1']) && !empty($data['payment_period_end_day1_1'])){
                if(ctype_digit($data['payment_period_end_month1_1'])){
                    if (!checkdate($data['payment_period_end_month1_1'], $data['payment_period_end_day1_1'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_1','2枚目_9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_period_end_month1_2']) && !empty($data['payment_period_end_day1_2'])){
                if(ctype_digit($data['payment_period_end_month1_2'])){
                    if (!checkdate($data['payment_period_end_month1_2'], $data['payment_period_end_day1_2'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_2','2枚目_9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_3']) && !empty($data['payment_period_end_day1_3'])){
                if(ctype_digit($data['payment_period_end_month1_3'])){
                    if (!checkdate($data['payment_period_end_month1_3'], $data['payment_period_end_day1_3'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_3','2枚目_9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_4']) && !empty($data['payment_period_end_day1_4'])){
                if(ctype_digit($data['payment_period_end_month1_4'])){
                    if (!checkdate($data['payment_period_end_month1_4'], $data['payment_period_end_day1_4'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_4','2枚目_9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_5']) && !empty($data['payment_period_end_day1_5'])){
                if(ctype_digit($data['payment_period_end_month1_5'])){
                    if (!checkdate($data['payment_period_end_month1_5'], $data['payment_period_end_day1_5'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_5','2枚目_9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_6']) && !empty($data['payment_period_end_day1_6'])){
                if(ctype_digit($data['payment_period_end_month1_6'])){
                    if (!checkdate($data['payment_period_end_month1_6'], $data['payment_period_end_day1_6'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_6','2枚目_9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_7']) && !empty($data['payment_period_end_day1_7'])){
                if(ctype_digit($data['payment_period_end_month1_7'])){
                    if (!checkdate($data['payment_period_end_month1_7'], $data['payment_period_end_day1_7'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_7','2枚目_9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_8']) && !empty($data['payment_period_end_day1_8'])){
                if(ctype_digit($data['payment_period_end_month1_8'])){
                    if (!checkdate($data['payment_period_end_month1_8'], $data['payment_period_end_day1_8'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_8','2枚目_9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_9']) && !empty($data['payment_period_end_day1_9'])){
                if(ctype_digit($data['payment_period_end_month1_9'])){
                    if (!checkdate($data['payment_period_end_month1_9'], $data['payment_period_end_day1_9'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_9','2枚目_9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_10']) && !empty($data['payment_period_end_day1_10'])){
                if(ctype_digit($data['payment_period_end_month1_10'])){
                    if (!checkdate($data['payment_period_end_month1_10'], $data['payment_period_end_day1_10'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_10','2枚目_9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_11']) && !empty($data['payment_period_end_day1_11'])){
                if(ctype_digit($data['payment_period_end_month1_11'])){
                    if (!checkdate($data['payment_period_end_month1_11'], $data['payment_period_end_day1_11'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_11','2枚目_9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_12']) && !empty($data['payment_period_end_day1_12'])){
                if(ctype_digit($data['payment_period_end_month1_12'])){
                    if (!checkdate($data['payment_period_end_month1_12'], $data['payment_period_end_day1_12'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_12','2枚目_9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_13']) && !empty($data['payment_period_end_day1_13'])){
                if(ctype_digit($data['payment_period_end_month1_13'])){
                    if (!checkdate($data['payment_period_end_month1_13'], $data['payment_period_end_day1_13'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_13','2枚目_9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_period_end_month1_14']) && !empty($data['payment_period_end_day1_14'])){
                if(ctype_digit($data['payment_period_end_month1_14'])){
                    if (!checkdate($data['payment_period_end_month1_14'], $data['payment_period_end_day1_14'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_14','2枚目_9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month1_15']) && !empty($data['payment_period_end_day1_15'])){
                if(ctype_digit($data['payment_period_end_month1_15'])){
                    if (!checkdate($data['payment_period_end_month1_15'], $data['payment_period_end_day1_15'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_15','2枚目_9_賃金支払対象期間_終了日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_start_month2_1']) && !empty($data['calculation_duration_start_day2_1'])){
                if(ctype_digit($data['calculation_duration_start_month2_1'])){
                    if (!checkdate($data['calculation_duration_start_month2_1'], $data['calculation_duration_start_day2_1'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_1','[続紙]2枚目_7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['calculation_duration_start_month2_2']) && !empty($data['calculation_duration_start_day2_2'])){
                if(ctype_digit($data['calculation_duration_start_month2_2'])){
                    if (!checkdate($data['calculation_duration_start_month2_2'], $data['calculation_duration_start_day2_2'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_2','[続紙]2枚目_7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_3']) && !empty($data['calculation_duration_start_day2_3'])){
                if(ctype_digit($data['calculation_duration_start_month2_3'])){
                    if (!checkdate($data['calculation_duration_start_month2_3'], $data['calculation_duration_start_day2_3'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_3','[続紙]2枚目_7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_4']) && !empty($data['calculation_duration_start_day2_4'])){
                if(ctype_digit($data['calculation_duration_start_month2_4'])){
                    if (!checkdate($data['calculation_duration_start_month2_4'], $data['calculation_duration_start_day2_4'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_4','[続紙]2枚目_7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_5']) && !empty($data['calculation_duration_start_day2_5'])){
                if(ctype_digit($data['calculation_duration_start_month2_5'])){
                    if (!checkdate($data['calculation_duration_start_month2_5'], $data['calculation_duration_start_day2_5'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_5','[続紙]2枚目_7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_6']) && !empty($data['calculation_duration_start_day2_6'])){
                if(ctype_digit($data['calculation_duration_start_month2_6'])){
                    if (!checkdate($data['calculation_duration_start_month2_6'], $data['calculation_duration_start_day2_6'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_6','[続紙]2枚目_7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_7']) && !empty($data['calculation_duration_start_day2_7'])){
                if(ctype_digit($data['calculation_duration_start_month2_7'])){
                    if (!checkdate($data['calculation_duration_start_month2_7'], $data['calculation_duration_start_day2_7'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_7','[続紙]2枚目_7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_8']) && !empty($data['calculation_duration_start_day2_8'])){
                if(ctype_digit($data['calculation_duration_start_month2_8'])){
                    if (!checkdate($data['calculation_duration_start_month2_8'], $data['calculation_duration_start_day2_8'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_8','[続紙]2枚目_7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_9']) && !empty($data['calculation_duration_start_day2_9'])){
                if(ctype_digit($data['calculation_duration_start_month2_9'])){
                    if (!checkdate($data['calculation_duration_start_month2_9'], $data['calculation_duration_start_day2_9'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_9','[続紙]2枚目_7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_10']) && !empty($data['calculation_duration_start_day2_10'])){
                if(ctype_digit($data['calculation_duration_start_month2_10'])){
                    if (!checkdate($data['calculation_duration_start_month2_10'], $data['calculation_duration_start_day2_10'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_10','[続紙]2枚目_7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_11']) && !empty($data['calculation_duration_start_day2_11'])){
                if(ctype_digit($data['calculation_duration_start_month2_11'])){
                    if (!checkdate($data['calculation_duration_start_month2_11'], $data['calculation_duration_start_day2_11'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_11','[続紙]2枚目_7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_12']) && !empty($data['calculation_duration_start_day2_12'])){
                if(ctype_digit($data['calculation_duration_start_month2_12'])){
                    if (!checkdate($data['calculation_duration_start_month2_12'], $data['calculation_duration_start_day2_12'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_12','[続紙]2枚目_7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_13']) && !empty($data['calculation_duration_start_day2_13'])){
                if(ctype_digit($data['calculation_duration_start_month2_13'])){
                    if (!checkdate($data['calculation_duration_start_month2_13'], $data['calculation_duration_start_day2_13'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_13','[続紙]2枚目_7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
            if(!empty($data['calculation_duration_start_month2_14']) && !empty($data['calculation_duration_start_day2_14'])){
                if(ctype_digit($data['calculation_duration_start_month2_14'])){
                    if (!checkdate($data['calculation_duration_start_month2_14'], $data['calculation_duration_start_day2_14'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_14','[続紙]2枚目_7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_start_month2_15']) && !empty($data['calculation_duration_start_day2_15'])){
                if(ctype_digit($data['calculation_duration_start_month2_15'])){
                    if (!checkdate($data['calculation_duration_start_month2_15'], $data['calculation_duration_start_day2_15'], '2000')) {
                    $validator->errors()->add('calculation_duration_start_day2_15','[続紙]2枚目_7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_1']) && !empty($data['calculation_duration_end_day2_1'])){
                if(ctype_digit($data['calculation_duration_end_month2_1'])){
                    if (!checkdate($data['calculation_duration_end_month2_1'], $data['calculation_duration_end_day2_1'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_1','[続紙]2枚目_7_算定対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_2']) && !empty($data['calculation_duration_end_day2_2'])){
                if(ctype_digit($data['calculation_duration_end_month2_2'])){
                    if (!checkdate($data['calculation_duration_end_month2_2'], $data['calculation_duration_end_day2_2'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_2','[続紙]2枚目_7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_3']) && !empty($data['calculation_duration_end_day2_3'])){
                if(ctype_digit($data['calculation_duration_end_month2_3'])){
                    if (!checkdate($data['calculation_duration_end_month2_3'], $data['calculation_duration_end_day2_3'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_3','[続紙]2枚目_7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_4']) && !empty($data['calculation_duration_end_day2_4'])){
                if(ctype_digit($data['calculation_duration_end_month2_4'])){
                    if (!checkdate($data['calculation_duration_end_month2_4'], $data['calculation_duration_end_day2_4'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_4','[続紙]2枚目_7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_5']) && !empty($data['calculation_duration_end_day2_5'])){
                if(ctype_digit($data['calculation_duration_end_month2_5'])){
                    if (!checkdate($data['calculation_duration_end_month2_5'], $data['calculation_duration_end_day2_5'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_5','[続紙]2枚目_7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_6']) && !empty($data['calculation_duration_end_day2_6'])){
            if(ctype_digit($data['calculation_duration_end_month2_6'])){
                    if (!checkdate($data['calculation_duration_end_month2_6'], $data['calculation_duration_end_day2_6'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_6','[続紙]2枚目_7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_7']) && !empty($data['calculation_duration_end_day2_7'])){
                if(ctype_digit($data['calculation_duration_end_month2_7'])){
                    if (!checkdate($data['calculation_duration_end_month2_7'], $data['calculation_duration_end_day2_7'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_7','[続紙]2枚目_7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_8']) && !empty($data['calculation_duration_end_day2_8'])){
                if(ctype_digit($data['calculation_duration_end_month2_8'])){
                    if (!checkdate($data['calculation_duration_end_month2_8'], $data['calculation_duration_end_day2_8'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_8','[続紙]2枚目_7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_9']) && !empty($data['calculation_duration_end_day2_9'])){
                if(ctype_digit($data['calculation_duration_end_month2_9'])){
                    if (!checkdate($data['calculation_duration_end_month2_9'], $data['calculation_duration_end_day2_9'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_9','[続紙]2枚目_7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_10']) && !empty($data['calculation_duration_end_day2_10'])){
                if(ctype_digit($data['calculation_duration_end_month2_10'])){
                    if (!checkdate($data['calculation_duration_end_month2_10'], $data['calculation_duration_end_day2_10'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_10','[続紙]2枚目_7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_11']) && !empty($data['calculation_duration_end_day2_11'])){
                if(ctype_digit($data['calculation_duration_end_month2_11'])){
                    if (!checkdate($data['calculation_duration_end_month2_11'], $data['calculation_duration_end_day2_11'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_11','[続紙]2枚目_7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_12']) && !empty($data['calculation_duration_end_day2_12'])){
                if(ctype_digit($data['calculation_duration_end_month2_12'])){
                    if (!checkdate($data['calculation_duration_end_month2_12'], $data['calculation_duration_end_day2_12'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_12','[続紙]2枚目_7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_13']) && !empty($data['calculation_duration_end_day2_13'])){
                if(ctype_digit($data['calculation_duration_end_month2_13'])){
                    if (!checkdate($data['calculation_duration_end_month2_13'], $data['calculation_duration_end_day2_13'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_13','[続紙]2枚目_7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_14']) && !empty($data['calculation_duration_end_day2_14'])){
                if(ctype_digit($data['calculation_duration_end_month2_14'])){
                    if (!checkdate($data['calculation_duration_end_month2_14'], $data['calculation_duration_end_day2_14'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_14','[続紙]2枚目_7_算定対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['calculation_duration_end_month2_15']) && !empty($data['calculation_duration_end_day2_15'])){
                if(ctype_digit($data['calculation_duration_end_month2_15'])){
                    if (!checkdate($data['calculation_duration_end_month2_15'], $data['calculation_duration_end_day2_15'], '2000')) {
                    $validator->errors()->add('calculation_duration_end_day2_15','[続紙]2枚目_7_算定対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_duration_start_month2_1']) && !empty($data['payment_duration_start_day2_1'])){
                if(ctype_digit($data['payment_duration_start_month2_1'])){
                    if (!checkdate($data['payment_duration_start_month2_1'], $data['payment_duration_start_day2_1'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_1','[続紙]9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_2']) && !empty($data['payment_duration_start_day2_2'])){
                if(ctype_digit($data['payment_duration_start_month2_2'])){
                    if (!checkdate($data['payment_duration_start_month2_2'], $data['payment_duration_start_day2_2'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_2','[続紙]9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_3']) && !empty($data['payment_duration_start_day2_3'])){
                if(ctype_digit($data['payment_duration_start_month2_3'])){
                    if (!checkdate($data['payment_duration_start_month2_3'], $data['payment_duration_start_day2_3'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_3','[続紙]9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_4']) && !empty($data['payment_duration_start_day2_4'])){
                if(ctype_digit($data['payment_duration_start_month2_4'])){
                    if (!checkdate($data['payment_duration_start_month2_4'], $data['payment_duration_start_day2_4'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_4','[続紙]9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_5']) && !empty($data['payment_duration_start_day2_5'])){
                if(ctype_digit($data['payment_duration_start_month2_5'])){
                    if (!checkdate($data['payment_duration_start_month2_5'], $data['payment_duration_start_day2_5'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_5','[続紙]9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_6']) && !empty($data['payment_duration_start_day2_6'])){
                if(ctype_digit($data['payment_duration_start_month2_6'])){
                    if (!checkdate($data['payment_duration_start_month2_6'], $data['payment_duration_start_day2_6'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_6','[続紙]9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_7']) && !empty($data['payment_duration_start_day2_7'])){
                if(ctype_digit($data['payment_duration_start_month2_7'])){
                    if (!checkdate($data['payment_duration_start_month2_7'], $data['payment_duration_start_day2_7'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_7','[続紙]9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_8']) && !empty($data['payment_duration_start_day2_8'])){
                if(ctype_digit($data['payment_duration_start_month2_8'])){
                    if (!checkdate($data['payment_duration_start_month2_8'], $data['payment_duration_start_day2_8'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_8','[続紙]9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_9']) && !empty($data['payment_duration_start_day2_9'])){
                if(ctype_digit($data['payment_duration_start_month2_9'])){
                    if (!checkdate($data['payment_duration_start_month2_9'], $data['payment_duration_start_day2_9'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_9','[続紙]9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_10']) && !empty($data['payment_duration_start_day2_10'])){
                if(ctype_digit($data['payment_duration_start_month2_10'])){
                    if (!checkdate($data['payment_duration_start_month2_10'], $data['payment_duration_start_day2_10'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_10','[続紙]9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_11']) && !empty($data['payment_duration_start_day2_11'])){
                if(ctype_digit($data['payment_duration_start_month2_11'])){
                    if (!checkdate($data['payment_duration_start_month2_11'], $data['payment_duration_start_day2_11'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_11','[続紙]9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_12']) && !empty($data['payment_duration_start_month2_12'])){
                if(ctype_digit($data['payment_duration_start_month2_12'])){
                    if (!checkdate($data['payment_duration_start_month2_12'], $data['payment_duration_start_month2_12'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_12','[続紙]9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_13']) && !empty($data['payment_duration_start_day2_13'])){
                if(ctype_digit($data['payment_duration_start_month2_13'])){
                    if (!checkdate($data['payment_duration_start_month2_13'], $data['payment_duration_start_day2_13'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_13','[続紙]9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_14']) && !empty($data['payment_duration_start_month2_14'])){
                if(ctype_digit($data['payment_duration_start_month2_14'])){
                    if (!checkdate($data['payment_duration_start_month2_14'], $data['payment_duration_start_month2_14'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_14','[続紙]9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_duration_start_month2_15']) && !empty($data['payment_duration_start_day2_15'])){
                if(ctype_digit($data['payment_duration_start_month2_15'])){
                    if (!checkdate($data['payment_duration_start_month2_15'], $data['payment_duration_start_day2_15'], '2000')) {
                    $validator->errors()->add('payment_duration_start_day2_15','[続紙]9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_period_end_month2_1']) && !empty($data['payment_period_end_day2_1'])){
                if(ctype_digit($data['payment_period_end_month2_1'])){
                    if (!checkdate($data['payment_period_end_month2_1'], $data['payment_period_end_day2_1'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_1','[続紙]9_賃金支払対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['payment_period_end_month2_2']) && !empty($data['payment_period_end_day2_2'])){
                if(ctype_digit($data['payment_period_end_month2_2'])){
                    if (!checkdate($data['payment_period_end_month2_2'], $data['payment_period_end_day2_2'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_2','[続紙]9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_3']) && !empty($data['payment_period_end_day2_3'])){
                if(ctype_digit($data['payment_period_end_month2_3'])){
                    if (!checkdate($data['payment_period_end_month2_3'], $data['payment_period_end_day2_3'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_3','[続紙]9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_4']) && !empty($data['payment_period_end_day2_4'])){
                if(ctype_digit($data['payment_period_end_month2_4'])){
                    if (!checkdate($data['payment_period_end_month2_4'], $data['payment_period_end_day2_4'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_4','[続紙]9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_5']) && !empty($data['payment_period_end_day2_5'])){
                if(ctype_digit($data['payment_period_end_month2_5'])){
                    if (!checkdate($data['payment_period_end_month2_5'], $data['payment_period_end_day2_5'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_5','[続紙]9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_6']) && !empty($data['payment_period_end_day2_6'])){
                if(ctype_digit($data['payment_period_end_month2_6'])){
                    if (!checkdate($data['payment_period_end_month2_6'], $data['payment_period_end_day2_6'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_6','[続紙]9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_7']) && !empty($data['payment_period_end_day2_7'])){
                if(ctype_digit($data['payment_period_end_month2_7'])){
                    if (!checkdate($data['payment_period_end_month2_7'], $data['payment_period_end_day2_7'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_7','[続紙]9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_8']) && !empty($data['payment_period_end_day2_8'])){
                if(ctype_digit($data['payment_period_end_month2_8'])){
                    if (!checkdate($data['payment_period_end_month2_8'], $data['payment_period_end_day2_8'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_8','[続紙]9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_9']) && !empty($data['payment_period_end_day2_9'])){
                if(ctype_digit($data['payment_period_end_month2_9'])){
                    if (!checkdate($data['payment_period_end_month2_9'], $data['payment_period_end_day2_9'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_9','[続紙]9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_10']) && !empty($data['payment_period_end_day2_10'])){
                if(ctype_digit($data['payment_period_end_month2_10'])){
                    if (!checkdate($data['payment_period_end_month2_10'], $data['payment_period_end_day2_10'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_10','[続紙]9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_11']) && !empty($data['payment_period_end_day2_11'])){
                if(ctype_digit($data['payment_period_end_month2_11'])){
                    if (!checkdate($data['payment_period_end_month2_11'], $data['payment_period_end_day2_11'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_11','[続紙]9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_12']) && !empty($data['payment_period_end_month2_12'])){
                if(ctype_digit($data['payment_period_end_month2_12'])){
                    if (!checkdate($data['payment_period_end_month2_12'], $data['payment_period_end_month2_12'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_12','[続紙]9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_13']) && !empty($data['payment_period_end_day2_13'])){
                if(ctype_digit($data['payment_period_end_month2_13'])){
                    if (!checkdate($data['payment_period_end_month2_13'], $data['payment_period_end_day2_13'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_13','[続紙]9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_14']) && !empty($data['payment_period_end_month2_14'])){
                if(ctype_digit($data['payment_period_end_month2_14'])){
                    if (!checkdate($data['payment_period_end_month2_14'], $data['payment_period_end_month2_14'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_14','[続紙]9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['payment_period_end_month2_15']) && !empty($data['payment_period_end_day2_15'])){
                if(ctype_digit($data['payment_period_end_month2_15'])){
                    if (!checkdate($data['payment_period_end_month2_15'], $data['payment_period_end_day2_15'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_15','[続紙]9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
        });
    }

    public function messages()
    {
        return [
            'leave_start_wage_monthly_certificate.required_without' => '2枚目_最上部チェックボックスで休業開始時賃金月額証明書、所定労働時間短縮開始時賃金証明書のいずれかである必要があります。','employment_period_date_month.required_with' => '14_（休業開始時における）雇用期間_日付_月を入力してください。',
            'employment_duration_set_japan_era.required_with' => '2枚目_14_（休業開始時における）雇用期間_日付_年号を入力してください。',
            'employment_duration_set_japan_era_year.required_with' => '2枚目_14_（休業開始時における）雇用期間_日付_年を入力してください。',
            'employment_duration_set_month.required_with' => '2枚目_14_（休業開始時における）雇用期間_日付_月を入力してください。',
            'employment_duration_set_day.required_with' => '2枚目_14_（休業開始時における）雇用期間_日付_日を入力してください。',
            'calculation_duration_start_month1.required_with' => '2枚目_7_算定対象期間_開始月_1行目を入力してください。',
            'calculation_duration_start_month1_1.required_with' => '2枚目_7_算定対象期間_開始月_2行目を入力してください。',
            'calculation_duration_start_month1_2.required_with' => '2枚目_7_算定対象期間_開始月_3行目を入力してください。',
            'calculation_duration_start_month1_3.required_with' => '2枚目_7_算定対象期間_開始月_4行目を入力してください。',
            'calculation_duration_start_month1_4.required_with' => '2枚目_7_算定対象期間_開始月_5行目を入力してください。',
            'calculation_duration_start_month1_5.required_with' => '2枚目_7_算定対象期間_開始月_6行目を入力してください。',
            'calculation_duration_start_month1_6.required_with' => '2枚目_7_算定対象期間_開始月_7行目を入力してください。',
            'calculation_duration_start_month1_7.required_with' => '2枚目_7_算定対象期間_開始月_8行目を入力してください。',
            'calculation_duration_start_month1_8.required_with' => '2枚目_7_算定対象期間_開始月_9行目を入力してください。',
            'calculation_duration_start_month1_9.required_with' => '2枚目_7_算定対象期間_開始月_10行目を入力してください。',
            'calculation_duration_start_month1_10.required_with' => '2枚目_7_算定対象期間_開始月_11行目を入力してください。',
            'calculation_duration_start_month1_11.required_with' => '2枚目_7_算定対象期間_開始月_12行目を入力してください。',
            'calculation_duration_start_month1_12.required_with' => '2枚目_7_算定対象期間_開始月_13行目を入力してください。',
            'calculation_duration_start_month1_13.required_with' => '2枚目_7_算定対象期間_開始月_14行目を入力してください。',
            'calculation_duration_start_month1_14.required_with' => '2枚目_7_算定対象期間_開始月_15行目を入力してください。',
            'calculation_duration_start_month1_15.required_with' => '2枚目_7_算定対象期間_開始月_16行目を入力してください。',
            'calculation_duration_start_day1.required_with' => '2枚目_7_算定対象期間_開始日_1行目を入力してください。',
            'calculation_duration_start_day1_1.required_with' => '2枚目_7_算定対象期間_開始日_2行目を入力してください。',
            'calculation_duration_start_day1_2.required_with' => '2枚目_7_算定対象期間_開始日_3行目を入力してください。',
            'calculation_duration_start_day1_3.required_with' => '2枚目_7_算定対象期間_開始日_4行目を入力してください。',
            'calculation_duration_start_day1_4.required_with' => '2枚目_7_算定対象期間_開始日_5行目を入力してください。',
            'calculation_duration_start_day1_5.required_with' => '2枚目_7_算定対象期間_開始日_6行目を入力してください。',
            'calculation_duration_start_day1_6.required_with' => '2枚目_7_算定対象期間_開始日_7行目を入力してください。',
            'calculation_duration_start_day1_7.required_with' => '2枚目_7_算定対象期間_開始日_8行目を入力してください。',
            'calculation_duration_start_day1_8.required_with' => '2枚目_7_算定対象期間_開始日_9行目を入力してください。',
            'calculation_duration_start_day1_9.required_with' => '2枚目_7_算定対象期間_開始日_10行目を入力してください。',
            'calculation_duration_start_day1_10.required_with' => '2枚目_7_算定対象期間_開始日_11行目を入力してください。',
            'calculation_duration_start_day1_11.required_with' => '2枚目_7_算定対象期間_開始日_12行目を入力してください。',
            'calculation_duration_start_day1_12.required_with' => '2枚目_7_算定対象期間_開始日_13行目を入力してください。',
            'calculation_duration_start_day1_13.required_with' => '2枚目_7_算定対象期間_開始日_14行目を入力してください。',
            'calculation_duration_start_day1_14.required_with' => '2枚目_7_算定対象期間_開始日_15行目を入力してください。',
            'calculation_duration_start_day1_15.required_with' => '2枚目_7_算定対象期間_開始日_16行目を入力してください。',
            'calculation_duration_end_month1_1.required_with' => '2枚目_7_算定対象期間_終了月_2行目を入力してください。',
            'calculation_duration_end_month1_2.required_with' => '2枚目_7_算定対象期間_終了月_3行目を入力してください。',
            'calculation_duration_end_month1_3.required_with' => '2枚目_7_算定対象期間_終了月_4行目を入力してください。',
            'calculation_duration_end_month1_4.required_with' => '2枚目_7_算定対象期間_終了月_5行目を入力してください。',
            'calculation_duration_end_month1_5.required_with' => '2枚目_7_算定対象期間_終了月_6行目を入力してください。',
            'calculation_duration_end_month1_6.required_with' => '2枚目_7_算定対象期間_終了月_7行目を入力してください。',
            'calculation_duration_end_month1_7.required_with' => '2枚目_7_算定対象期間_終了月_8行目を入力してください。',
            'calculation_duration_end_month1_8.required_with' => '2枚目_7_算定対象期間_終了月_9行目を入力してください。',
            'calculation_duration_end_month1_9.required_with' => '2枚目_7_算定対象期間_終了月_10行目を入力してください。',
            'calculation_duration_end_month1_10.required_with' => '2枚目_7_算定対象期間_終了月_11行目を入力してください。',
            'calculation_duration_end_month1_11.required_with' => '2枚目_7_算定対象期間_終了月_12行目を入力してください。',
            'calculation_duration_end_month1_12.required_with' => '2枚目_7_算定対象期間_終了月_13行目を入力してください。',
            'calculation_duration_end_month1_13.required_with' => '2枚目_7_算定対象期間_終了月_14行目を入力してください。',
            'calculation_duration_end_month1_14.required_with' => '2枚目_7_算定対象期間_終了月_15行目を入力してください。',
            'calculation_duration_end_month1_15.required_with' => '2枚目_7_算定対象期間_終了月_16行目を入力してください。',
            'calculation_duration_end_day1_1.required_with' => '2枚目_7_算定対象期間_終了日_2行目を入力してください。',
            'calculation_duration_end_day1_2.required_with' => '2枚目_7_算定対象期間_終了日_3行目を入力してください。',
            'calculation_duration_end_day1_3.required_with' => '2枚目_7_算定対象期間_終了日_4行目を入力してください。',
            'calculation_duration_end_day1_4.required_with' => '2枚目_7_算定対象期間_終了日_5行目を入力してください。',
            'calculation_duration_end_day1_5.required_with' => '2枚目_7_算定対象期間_終了日_6行目を入力してください。',
            'calculation_duration_end_day1_6.required_with' => '2枚目_7_算定対象期間_終了日_7行目を入力してください。',
            'calculation_duration_end_day1_7.required_with' => '2枚目_7_算定対象期間_終了日_8行目を入力してください。',
            'calculation_duration_end_day1_8.required_with' => '2枚目_7_算定対象期間_終了日_9行目を入力してください。',
            'calculation_duration_end_day1_9.required_with' => '2枚目_7_算定対象期間_終了日_10行目を入力してください。',
            'calculation_duration_end_day1_10.required_with' => '2枚目_7_算定対象期間_終了日_11行目を入力してください。',
            'calculation_duration_end_day1_11.required_with' => '2枚目_7_算定対象期間_終了日_12行目を入力してください。',
            'calculation_duration_end_day1_12.required_with' => '2枚目_7_算定対象期間_終了日_13行目を入力してください。',
            'calculation_duration_end_day1_13.required_with' => '2枚目_7_算定対象期間_終了日_14行目を入力してください。',
            'calculation_duration_end_day1_14.required_with' => '2枚目_7_算定対象期間_終了日_15行目を入力してください。',
            'calculation_duration_end_day1_15.required_with' => '2枚目_7_算定対象期間_終了日_16行目を入力してください。',
            'payment_duration_start_month1.required_with' => '2枚目_9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_duration_start_month1_1.required_with' => '2枚目_9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_duration_start_month1_2.required_with' => '2枚目_9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_duration_start_month1_3.required_with' => '2枚目_9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_duration_start_month1_4.required_with' => '2枚目_9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_duration_start_month1_5.required_with' => '2枚目_9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_duration_start_month1_6.required_with' => '2枚目_9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_duration_start_month1_7.required_with' => '2枚目_9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_duration_start_month1_8.required_with' => '2枚目_9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_duration_start_month1_9.required_with' => '2枚目_9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_duration_start_month1_10.required_with' => '2枚目_9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_duration_start_month1_11.required_with' => '2枚目_9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_duration_start_month1_12.required_with' => '2枚目_9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_duration_start_month1_13.required_with' => '2枚目_9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_duration_start_month1_14.required_with' => '2枚目_9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_duration_start_month1_15.required_with' => '2枚目_9_賃金支払対象期間_開始月_16行目を入力してください。',
            'payment_duration_start_day1.required_with' => '2枚目_9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_duration_start_day1_1.required_with' => '2枚目_9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_duration_start_day1_2.required_with' => '2枚目_9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_duration_start_day1_3.required_with' => '2枚目_9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_duration_start_day1_4.required_with' => '2枚目_9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_duration_start_day1_5.required_with' => '2枚目_9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_duration_start_day1_6.required_with' => '2枚目_9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_duration_start_day1_7.required_with' => '2枚目_9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_duration_start_day1_8.required_with' => '2枚目_9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_duration_start_day1_9.required_with' => '2枚目_9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_duration_start_day1_10.required_with' => '2枚目_9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_duration_start_day1_11.required_with' => '2枚目_9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_duration_start_day1_12.required_with' => '2枚目_9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_duration_start_day1_13.required_with' => '2枚目_9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_duration_start_day1_14.required_with' => '2枚目_9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_duration_start_day1_15.required_with' => '2枚目_9_賃金支払対象期間_開始日_16行目を入力してください。',
            'payment_period_end_month1_1.required_with' => '2枚目_9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_period_end_month1_2.required_with' => '2枚目_9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_period_end_month1_3.required_with' => '2枚目_9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_period_end_month1_4.required_with' => '2枚目_9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_period_end_month1_5.required_with' => '2枚目_9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_period_end_month1_6.required_with' => '2枚目_9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_period_end_month1_7.required_with' => '2枚目_9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_period_end_month1_8.required_with' => '2枚目_9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_period_end_month1_9.required_with' => '2枚目_9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_period_end_month1_10.required_with' => '2枚目_9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_period_end_month1_11.required_with' => '2枚目_9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_period_end_month1_12.required_with' => '2枚目_9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_period_end_month1_13.required_with' => '2枚目_9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_period_end_month1_14.required_with' => '2枚目_9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_period_end_month1_15.required_with' => '2枚目_9_賃金支払対象期間_終了月_16行目を入力してください。',
            'payment_period_end_day1_1.required_with' => '2枚目_9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_period_end_day1_2.required_with' => '2枚目_9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_period_end_day1_3.required_with' => '2枚目_9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_period_end_day1_4.required_with' => '2枚目_9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_period_end_day1_5.required_with' => '2枚目_9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_period_end_day1_6.required_with' => '2枚目_9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_period_end_day1_7.required_with' => '2枚目_9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_period_end_day1_8.required_with' => '2枚目_9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_period_end_day1_9.required_with' => '2枚目_9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_period_end_day1_10.required_with' => '2枚目_9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_period_end_day1_11.required_with' => '2枚目_9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_period_end_day1_12.required_with' => '2枚目_9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_period_end_day1_13.required_with' => '2枚目_9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_period_end_day1_14.required_with' => '2枚目_9_賃金支払対象期間_終了日_15行目を入力してください。',
            'payment_period_end_day1_15.required_with' => '2枚目_9_賃金支払対象期間_終了日_16行目を入力してください。',
            'calculation_duration_start_month2_1.required_with' => '[続紙]2枚目7_算定対象期間_開始月_1行目を入力してください。',
            'calculation_duration_start_month2_2.required_with' => '[続紙]2枚目7_算定対象期間_開始月_2行目を入力してください。',
            'calculation_duration_start_month2_3.required_with' => '[続紙]2枚目7_算定対象期間_開始月_3行目を入力してください。',
            'calculation_duration_start_month2_4.required_with' => '[続紙]2枚目7_算定対象期間_開始月_4行目を入力してください。',
            'calculation_duration_start_month2_5.required_with' => '[続紙]2枚目7_算定対象期間_開始月_5行目を入力してください。',
            'calculation_duration_start_month2_6.required_with' => '[続紙]2枚目7_算定対象期間_開始月_6行目を入力してください。',
            'calculation_duration_start_month2_7.required_with' => '[続紙]2枚目7_算定対象期間_開始月_7行目を入力してください。',
            'calculation_duration_start_month2_8.required_with' => '[続紙]2枚目7_算定対象期間_開始月_8行目を入力してください。',
            'calculation_duration_start_month2_9.required_with' => '[続紙]2枚目7_算定対象期間_開始月_9行目を入力してください。',
            'calculation_duration_start_month2_10.required_with' => '[続紙]2枚目7_算定対象期間_開始月_10行目を入力してください。',
            'calculation_duration_start_month2_11.required_with' => '[続紙]2枚目7_算定対象期間_開始月_11行目を入力してください。',
            'calculation_duration_start_month2_12.required_with' => '[続紙]2枚目7_算定対象期間_開始月_12行目を入力してください。',
            'calculation_duration_start_month2_13.required_with' => '[続紙]2枚目7_算定対象期間_開始月_13行目を入力してください。',
            'calculation_duration_start_month2_14.required_with' => '[続紙]2枚目7_算定対象期間_開始月_14行目を入力してください。',
            'calculation_duration_start_month2_15.required_with' => '[続紙]2枚目7_算定対象期間_開始月_15行目を入力してください。',
            'calculation_duration_start_day2_1.required_with' => '[続紙]2枚目7_算定対象期間_開始日_1行目を入力してください。',
            'calculation_duration_start_day2_2.required_with' => '[続紙]2枚目7_算定対象期間_開始日_2行目を入力してください。',
            'calculation_duration_start_day2_3.required_with' => '[続紙]2枚目7_算定対象期間_開始日_3行目を入力してください。',
            'calculation_duration_start_day2_4.required_with' => '[続紙]2枚目7_算定対象期間_開始日_4行目を入力してください。',
            'calculation_duration_start_day2_5.required_with' => '[続紙]2枚目7_算定対象期間_開始日_5行目を入力してください。',
            'calculation_duration_start_day2_6.required_with' => '[続紙]2枚目7_算定対象期間_開始日_6行目を入力してください。',
            'calculation_duration_start_day2_7.required_with' => '[続紙]2枚目7_算定対象期間_開始日_7行目を入力してください。',
            'calculation_duration_start_day2_8.required_with' => '[続紙]2枚目7_算定対象期間_開始日_8行目を入力してください。',
            'calculation_duration_start_day2_9.required_with' => '[続紙]2枚目7_算定対象期間_開始日_9行目を入力してください。',
            'calculation_duration_start_day2_10.required_with' => '[続紙]2枚目7_算定対象期間_開始日_10行目を入力してください。',
            'calculation_duration_start_day2_11.required_with' => '[続紙]2枚目7_算定対象期間_開始日_11行目を入力してください。',
            'calculation_duration_start_day2_12.required_with' => '[続紙]2枚目7_算定対象期間_開始日_12行目を入力してください。',
            'calculation_duration_start_day2_13.required_with' => '[続紙]2枚目7_算定対象期間_開始日_13行目を入力してください。',
            'calculation_duration_start_day2_14.required_with' => '[続紙]2枚目7_算定対象期間_開始日_14行目を入力してください。',
            'calculation_duration_start_day2_15.required_with' => '[続紙]2枚目7_算定対象期間_開始日_15行目を入力してください。',
            'calculation_duration_end_month2_1.required_with' => '[続紙]2枚目7_算定対象期間_終了月_1行目を入力してください。',
            'calculation_duration_end_month2_2.required_with' => '[続紙]2枚目7_算定対象期間_終了月_2行目を入力してください。',
            'calculation_duration_end_month2_3.required_with' => '[続紙]2枚目7_算定対象期間_終了月_3行目を入力してください。',
            'calculation_duration_end_month2_4.required_with' => '[続紙]2枚目7_算定対象期間_終了月_4行目を入力してください。',
            'calculation_duration_end_month2_5.required_with' => '[続紙]2枚目7_算定対象期間_終了月_5行目を入力してください。',
            'calculation_duration_end_month2_6.required_with' => '[続紙]2枚目7_算定対象期間_終了月_6行目を入力してください。',
            'calculation_duration_end_month2_7.required_with' => '[続紙]2枚目7_算定対象期間_終了月_7行目を入力してください。',
            'calculation_duration_end_month2_8.required_with' => '[続紙]2枚目7_算定対象期間_終了月_8行目を入力してください。',
            'calculation_duration_end_month2_9.required_with' => '[続紙]2枚目7_算定対象期間_終了月_9行目を入力してください。',
            'calculation_duration_end_month2_10.required_with' => '[続紙]2枚目7_算定対象期間_終了月_10行目を入力してください。',
            'calculation_duration_end_month2_11.required_with' => '[続紙]2枚目7_算定対象期間_終了月_11行目を入力してください。',
            'calculation_duration_end_month2_12.required_with' => '[続紙]2枚目7_算定対象期間_終了月_12行目を入力してください。',
            'calculation_duration_end_month2_13.required_with' => '[続紙]2枚目7_算定対象期間_終了月_13行目を入力してください。',
            'calculation_duration_end_month2_14.required_with' => '[続紙]2枚目7_算定対象期間_終了月_14行目を入力してください。',
            'calculation_duration_end_month2_15.required_with' => '[続紙]2枚目7_算定対象期間_終了月_15行目を入力してください。',
            'calculation_duration_end_day2_1.required_with' => '[続紙]2枚目7_算定対象期間_終了日_1行目を入力してください。',
            'calculation_duration_end_day2_2.required_with' => '[続紙]2枚目7_算定対象期間_終了日_2行目を入力してください。',
            'calculation_duration_end_day2_3.required_with' => '[続紙]2枚目7_算定対象期間_終了日_3行目を入力してください。',
            'calculation_duration_end_day2_4.required_with' => '[続紙]2枚目7_算定対象期間_終了日_4行目を入力してください。',
            'calculation_duration_end_day2_5.required_with' => '[続紙]2枚目7_算定対象期間_終了日_5行目を入力してください。',
            'calculation_duration_end_day2_6.required_with' => '[続紙]2枚目7_算定対象期間_終了日_6行目を入力してください。',
            'calculation_duration_end_day2_7.required_with' => '[続紙]2枚目7_算定対象期間_終了日_7行目を入力してください。',
            'calculation_duration_end_day2_8.required_with' => '[続紙]2枚目7_算定対象期間_終了日_8行目を入力してください。',
            'calculation_duration_end_day2_9.required_with' => '[続紙]2枚目7_算定対象期間_終了日_9行目を入力してください。',
            'calculation_duration_end_day2_10.required_with' => '[続紙]2枚目7_算定対象期間_終了日_10行目を入力してください。',
            'calculation_duration_end_day2_11.required_with' => '[続紙]2枚目7_算定対象期間_終了日_11行目を入力してください。',
            'calculation_duration_end_day2_12.required_with' => '[続紙]2枚目7_算定対象期間_終了日_12行目を入力してください。',
            'calculation_duration_end_day2_13.required_with' => '[続紙]2枚目7_算定対象期間_終了日_13行目を入力してください。',
            'calculation_duration_end_day2_14.required_with' => '[続紙]2枚目7_算定対象期間_終了日_14行目を入力してください。',
            'calculation_duration_end_day2_15.required_with' => '[続紙]2枚目7_算定対象期間_終了日_15行目を入力してください。',
            'payment_duration_start_month2_1.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_duration_start_month2_2.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_duration_start_month2_3.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_duration_start_month2_4.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_duration_start_month2_5.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_duration_start_month2_6.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_duration_start_month2_7.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_duration_start_month2_8.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_duration_start_month2_9.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_duration_start_month2_10.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_duration_start_month2_11.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_duration_start_month2_12.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_duration_start_month2_13.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_duration_start_month2_14.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_duration_start_month2_15.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_duration_start_day2_1.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_duration_start_day2_2.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_duration_start_day2_3.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_duration_start_day2_4.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_duration_start_day2_5.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_duration_start_day2_6.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_duration_start_day2_7.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_duration_start_day2_8.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_duration_start_day2_9.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_duration_start_day2_10.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_duration_start_day2_11.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_duration_start_day2_12.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_duration_start_day2_13.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_duration_start_day2_14.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_duration_start_day2_15.required_with' => '[続紙]2枚目9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_period_end_month2_1.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_1行目を入力してください。',
            'payment_period_end_month2_2.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_period_end_month2_3.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_period_end_month2_4.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_period_end_month2_5.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_period_end_month2_6.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_period_end_month2_7.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_period_end_month2_8.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_period_end_month2_9.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_period_end_month2_10.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_period_end_month2_11.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_period_end_month2_12.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_period_end_month2_13.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_period_end_month2_14.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_period_end_month2_15.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_period_end_day2_1.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_1行目を入力してください。',
            'payment_period_end_day2_2.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_period_end_day2_3.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_period_end_day2_4.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_period_end_day2_5.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_period_end_day2_6.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_period_end_day2_7.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_period_end_day2_8.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_period_end_day2_9.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_period_end_day2_10.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_period_end_day2_11.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_period_end_day2_12.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_period_end_day2_13.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_period_end_day2_14.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_period_end_day2_15.required_with' => '[続紙]2枚目9_賃金支払対象期間_終了日_15行目を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'leave_start_wage_monthly_certificate' => '2枚目_休業開始時賃金月額証明書_最上部チェックボックス',
            'reduced_working_hours_wage_certificate_start' => '2枚目_所定労働時間短縮開始時賃金証明書_最上部チェックボックス',
            'branch_name' => '2枚目_5_事業所名称',
            'branch_address' => '2枚目_5_事業所所在地',
            'branch_tel_area_code' => '2枚目_5_事業所電話番号_市外局番',
            'branch_tel_city_code' => '2枚目_5_事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '2枚目_5_事業所電話番号_加入者番号',
            'post_code_former' => '2枚目_6_休業等を開始した者の郵便番号3桁',
            'post_code_latter' => '2枚目_6_休業等を開始した者の郵便番号4桁',
            'address' => '2枚目_6_休業等を開始した者の住所又は居所',
            'tel_area_code' => '2枚目_6_休業等を開始した者の電話番号_市外局番',
            'tel_city_code' => '2枚目_6_休業等を開始した者の電話番号_市内局番',
            'tel_subscriber_code' => '2枚目_6_休業等を開始した者の電話番号_加入者番号',
            'leave_start_date_month' => '2枚目_7_休業等を開始した日_月',
            'leave_start_date_day' => '2枚目_7_休業等を開始した日_日',
            'calculation_duration_start_month1' => '2枚目_7_算定対象期間_開始月_1行目',
            'calculation_duration_start_month1_1' => '2枚目_7_算定対象期間_開始月_2行目',
            'calculation_duration_start_month1_2' => '2枚目_7_算定対象期間_開始月_3行目',
            'calculation_duration_start_month1_3' => '2枚目_7_算定対象期間_開始月_4行目',
            'calculation_duration_start_month1_4' => '2枚目_7_算定対象期間_開始月_5行目',
            'calculation_duration_start_month1_5' => '2枚目_7_算定対象期間_開始月_6行目',
            'calculation_duration_start_month1_6' => '2枚目_7_算定対象期間_開始月_7行目',
            'calculation_duration_start_month1_7' => '2枚目_7_算定対象期間_開始月_8行目',
            'calculation_duration_start_month1_8' => '2枚目_7_算定対象期間_開始月_9行目',
            'calculation_duration_start_month1_9' => '2枚目_7_算定対象期間_開始月_10行目',
            'calculation_duration_start_month1_10' => '2枚目_7_算定対象期間_開始月_11行目',
            'calculation_duration_start_month1_11' => '2枚目_7_算定対象期間_開始月_12行目',
            'calculation_duration_start_month1_12' => '2枚目_7_算定対象期間_開始月_13行目',
            'calculation_duration_start_month1_13' => '2枚目_7_算定対象期間_開始月_14行目',
            'calculation_duration_start_month1_14' => '2枚目_7_算定対象期間_開始月_15行目',
            'calculation_duration_start_month1_15' => '2枚目_7_算定対象期間_開始月_16行目',
            'calculation_duration_start_day1' => '2枚目_7_算定対象期間_開始日_1行目',
            'calculation_duration_start_day1_1' => '2枚目_7_算定対象期間_開始日_2行目',
            'calculation_duration_start_day1_2' => '2枚目_7_算定対象期間_開始日_3行目',
            'calculation_duration_start_day1_3' => '2枚目_7_算定対象期間_開始日_4行目',
            'calculation_duration_start_day1_4' => '2枚目_7_算定対象期間_開始日_5行目',
            'calculation_duration_start_day1_5' => '2枚目_7_算定対象期間_開始日_6行目',
            'calculation_duration_start_day1_6' => '2枚目_7_算定対象期間_開始日_7行目',
            'calculation_duration_start_day1_7' => '2枚目_7_算定対象期間_開始日_8行目',
            'calculation_duration_start_day1_8' => '2枚目_7_算定対象期間_開始日_9行目',
            'calculation_duration_start_day1_9' => '2枚目_7_算定対象期間_開始日_10行目',
            'calculation_duration_start_day1_10' => '2枚目_7_算定対象期間_開始日_11行目',
            'calculation_duration_start_day1_11' => '2枚目_7_算定対象期間_開始日_12行目',
            'calculation_duration_start_day1_12' => '2枚目_7_算定対象期間_開始日_13行目',
            'calculation_duration_start_day1_13' => '2枚目_7_算定対象期間_開始日_14行目',
            'calculation_duration_start_day1_14' => '2枚目_7_算定対象期間_開始日_15行目',
            'calculation_duration_start_day1_15' => '2枚目_7_算定対象期間_開始日_16行目',
            'calculation_duration_end_month1_1' => '2枚目_7_算定対象期間_終了月_2行目',
            'calculation_duration_end_month1_2' => '2枚目_7_算定対象期間_終了月_3行目',
            'calculation_duration_end_month1_3' => '2枚目_7_算定対象期間_終了月_4行目',
            'calculation_duration_end_month1_4' => '2枚目_7_算定対象期間_終了月_5行目',
            'calculation_duration_end_month1_5' => '2枚目_7_算定対象期間_終了月_6行目',
            'calculation_duration_end_month1_6' => '2枚目_7_算定対象期間_終了月_7行目',
            'calculation_duration_end_month1_7' => '2枚目_7_算定対象期間_終了月_8行目',
            'calculation_duration_end_month1_8' => '2枚目_7_算定対象期間_終了月_9行目',
            'calculation_duration_end_month1_9' => '2枚目_7_算定対象期間_終了月_10行目',
            'calculation_duration_end_month1_10' => '2枚目_7_算定対象期間_終了月_11行目',
            'calculation_duration_end_month1_11' => '2枚目_7_算定対象期間_終了月_12行目',
            'calculation_duration_end_month1_12' => '2枚目_7_算定対象期間_終了月_13行目',
            'calculation_duration_end_month1_13' => '2枚目_7_算定対象期間_終了月_14行目',
            'calculation_duration_end_month1_14' => '2枚目_7_算定対象期間_終了月_15行目',
            'calculation_duration_end_month1_15' => '2枚目_7_算定対象期間_終了月_16行目',
            'calculation_duration_end_day1_1' => '2枚目_7_算定対象期間_終了日_2行目',
            'calculation_duration_end_day1_2' => '2枚目_7_算定対象期間_終了日_3行目',
            'calculation_duration_end_day1_3' => '2枚目_7_算定対象期間_終了日_4行目',
            'calculation_duration_end_day1_4' => '2枚目_7_算定対象期間_終了日_5行目',
            'calculation_duration_end_day1_5' => '2枚目_7_算定対象期間_終了日_6行目',
            'calculation_duration_end_day1_6' => '2枚目_7_算定対象期間_終了日_7行目',
            'calculation_duration_end_day1_7' => '2枚目_7_算定対象期間_終了日_8行目',
            'calculation_duration_end_day1_8' => '2枚目_7_算定対象期間_終了日_9行目',
            'calculation_duration_end_day1_9' => '2枚目_7_算定対象期間_終了日_10行目',
            'calculation_duration_end_day1_10' => '2枚目_7_算定対象期間_終了日_11行目',
            'calculation_duration_end_day1_11' => '2枚目_7_算定対象期間_終了日_12行目',
            'calculation_duration_end_day1_12' => '2枚目_7_算定対象期間_終了日_13行目',
            'calculation_duration_end_day1_13' => '2枚目_7_算定対象期間_終了日_14行目',
            'calculation_duration_end_day1_14' => '2枚目_7_算定対象期間_終了日_15行目',
            'calculation_duration_end_day1_15' => '2枚目_7_算定対象期間_終了日_16行目',
            'calculation_duration_basic_days' => '2枚目_8_賃金支払基礎日数_1行目',
            'calculation_duration_basic_days1_1' => '2枚目_8_賃金支払基礎日数_2行目',
            'calculation_duration_basic_days1_2' => '2枚目_8_賃金支払基礎日数_3行目',
            'calculation_duration_basic_days1_3' => '2枚目_8_賃金支払基礎日数_4行目',
            'calculation_duration_basic_days1_4' => '2枚目_8_賃金支払基礎日数_5行目',
            'calculation_duration_basic_days1_5' => '2枚目_8_賃金支払基礎日数_6行目',
            'calculation_duration_basic_days1_6' => '2枚目_8_賃金支払基礎日数_7行目',
            'calculation_duration_basic_days1_7' => '2枚目_8_賃金支払基礎日数_8行目',
            'calculation_duration_basic_days1_8' => '2枚目_8_賃金支払基礎日数_9行目',
            'calculation_duration_basic_days1_9' => '2枚目_8_賃金支払基礎日数_10行目',
            'calculation_duration_basic_days1_10' => '2枚目_8_賃金支払基礎日数_11行目',
            'calculation_duration_basic_days1_11' => '2枚目_8_賃金支払基礎日数_12行目',
            'calculation_duration_basic_days1_12' => '2枚目_8_賃金支払基礎日数_13行目',
            'calculation_duration_basic_days1_13' => '2枚目_8_賃金支払基礎日数_14行目',
            'calculation_duration_basic_days1_14' => '2枚目_8_賃金支払基礎日数_15行目',
            'calculation_duration_basic_days1_15' => '2枚目_8_賃金支払基礎日数_16行目',
            'payment_duration_start_month1' => '2枚目_9_賃金支払対象期間_開始月_1行目',
            'payment_duration_start_month1_1' => '2枚目_9_賃金支払対象期間_開始月_2行目',
            'payment_duration_start_month1_2' => '2枚目_9_賃金支払対象期間_開始月_3行目',
            'payment_duration_start_month1_3' => '2枚目_9_賃金支払対象期間_開始月_4行目',
            'payment_duration_start_month1_4' => '2枚目_9_賃金支払対象期間_開始月_5行目',
            'payment_duration_start_month1_5' => '2枚目_9_賃金支払対象期間_開始月_6行目',
            'payment_duration_start_month1_6' => '2枚目_9_賃金支払対象期間_開始月_7行目',
            'payment_duration_start_month1_7' => '2枚目_9_賃金支払対象期間_開始月_8行目',
            'payment_duration_start_month1_8' => '2枚目_9_賃金支払対象期間_開始月_9行目',
            'payment_duration_start_month1_9' => '2枚目_9_賃金支払対象期間_開始月_10行目',
            'payment_duration_start_month1_10' => '2枚目_9_賃金支払対象期間_開始月_11行目',
            'payment_duration_start_month1_11' => '2枚目_9_賃金支払対象期間_開始月_12行目',
            'payment_duration_start_month1_12' => '2枚目_9_賃金支払対象期間_開始月_13行目',
            'payment_duration_start_month1_13' => '2枚目_9_賃金支払対象期間_開始月_14行目',
            'payment_duration_start_month1_14' => '2枚目_9_賃金支払対象期間_開始月_15行目',
            'payment_duration_start_month1_15' => '2枚目_9_賃金支払対象期間_開始月_16行目',
            'payment_duration_start_day1' => '2枚目_9_賃金支払対象期間_開始日_1行目',
            'payment_duration_start_day1_1' => '2枚目_9_賃金支払対象期間_開始日_2行目',
            'payment_duration_start_day1_2' => '2枚目_9_賃金支払対象期間_開始日_3行目',
            'payment_duration_start_day1_3' => '2枚目_9_賃金支払対象期間_開始日_4行目',
            'payment_duration_start_day1_4' => '2枚目_9_賃金支払対象期間_開始日_5行目',
            'payment_duration_start_day1_5' => '2枚目_9_賃金支払対象期間_開始日_6行目',
            'payment_duration_start_day1_6' => '2枚目_9_賃金支払対象期間_開始日_7行目',
            'payment_duration_start_day1_7' => '2枚目_9_賃金支払対象期間_開始日_8行目',
            'payment_duration_start_day1_8' => '2枚目_9_賃金支払対象期間_開始日_9行目',
            'payment_duration_start_day1_9' => '2枚目_9_賃金支払対象期間_開始日_10行目',
            'payment_duration_start_day1_10' => '2枚目_9_賃金支払対象期間_開始日_11行目',
            'payment_duration_start_day1_11' => '2枚目_9_賃金支払対象期間_開始日_12行目',
            'payment_duration_start_day1_12' => '2枚目_9_賃金支払対象期間_開始日_13行目',
            'payment_duration_start_day1_13' => '2枚目_9_賃金支払対象期間_開始日_14行目',
            'payment_duration_start_day1_14' => '2枚目_9_賃金支払対象期間_開始日_15行目',
            'payment_duration_start_day1_15' => '2枚目_9_賃金支払対象期間_開始日_16行目',
            'payment_duration_end_month1_1' => '2枚目_9_賃金支払対象期間_終了月_2行目',
            'payment_duration_end_month1_2' => '2枚目_9_賃金支払対象期間_終了月_3行目',
            'payment_duration_end_month1_3' => '2枚目_9_賃金支払対象期間_終了月_4行目',
            'payment_duration_end_month1_4' => '2枚目_9_賃金支払対象期間_終了月_5行目',
            'payment_duration_end_month1_5' => '2枚目_9_賃金支払対象期間_終了月_6行目',
            'payment_duration_end_month1_6' => '2枚目_9_賃金支払対象期間_終了月_7行目',
            'payment_duration_end_month1_7' => '2枚目_9_賃金支払対象期間_終了月_8行目',
            'payment_duration_end_month1_8' => '2枚目_9_賃金支払対象期間_終了月_9行目',
            'payment_duration_end_month1_9' => '2枚目_9_賃金支払対象期間_終了月_10行目',
            'payment_duration_end_month1_10' => '2枚目_9_賃金支払対象期間_終了月_11行目',
            'payment_duration_end_month1_11' => '2枚目_9_賃金支払対象期間_終了月_12行目',
            'payment_duration_end_month1_12' => '2枚目_9_賃金支払対象期間_終了月_13行目',
            'payment_duration_end_month1_13' => '2枚目_9_賃金支払対象期間_終了月_14行目',
            'payment_duration_end_month1_14' => '2枚目_9_賃金支払対象期間_終了月_15行目',
            'payment_duration_end_month1_15' => '2枚目_9_賃金支払対象期間_終了月_16行目',
            'payment_duration_end_day1_1' => '2枚目_9_賃金支払対象期間_終了日_2行目',
            'payment_duration_end_day1_2' => '2枚目_9_賃金支払対象期間_終了日_3行目',
            'payment_duration_end_day1_3' => '2枚目_9_賃金支払対象期間_終了日_4行目',
            'payment_duration_end_day1_4' => '2枚目_9_賃金支払対象期間_終了日_5行目',
            'payment_duration_end_day1_5' => '2枚目_9_賃金支払対象期間_終了日_6行目',
            'payment_duration_end_day1_6' => '2枚目_9_賃金支払対象期間_終了日_7行目',
            'payment_duration_end_day1_7' => '2枚目_9_賃金支払対象期間_終了日_8行目',
            'payment_duration_end_day1_8' => '2枚目_9_賃金支払対象期間_終了日_9行目',
            'payment_duration_end_day1_9' => '2枚目_9_賃金支払対象期間_終了日_10行目',
            'payment_duration_end_day1_10' => '2枚目_9_賃金支払対象期間_終了日_11行目',
            'payment_duration_end_day1_11' => '2枚目_9_賃金支払対象期間_終了日_12行目',
            'payment_duration_end_day1_12' => '2枚目_9_賃金支払対象期間_終了日_13行目',
            'payment_duration_end_day1_13' => '2枚目_9_賃金支払対象期間_終了日_14行目',
            'payment_duration_end_day1_14' => '2枚目_9_賃金支払対象期間_終了日_15行目',
            'payment_duration_end_day1_15' => '2枚目_9_賃金支払対象期間_終了日_16行目',
            'payment_duration_basic_days1' => '2枚目_10_基礎日数_1行目',
            'payment_duration_basic_days1_1' => '2枚目_10_基礎日数_2行目',
            'payment_duration_basic_days1_2' => '2枚目_10_基礎日数_3行目',
            'payment_duration_basic_days1_3' => '2枚目_10_基礎日数_4行目',
            'payment_duration_basic_days1_4' => '2枚目_10_基礎日数_5行目',
            'payment_duration_basic_days1_5' => '2枚目_10_基礎日数_6行目',
            'payment_duration_basic_days1_6' => '2枚目_10_基礎日数_7行目',
            'payment_duration_basic_days1_7' => '2枚目_10_基礎日数_8行目',
            'payment_duration_basic_days1_8' => '2枚目_10_基礎日数_9行目',
            'payment_duration_basic_days1_9' => '2枚目_10_基礎日数_10行目',
            'payment_duration_basic_days1_10' => '2枚目_10_基礎日数_11行目',
            'payment_duration_basic_days1_11' => '2枚目_10_基礎日数_12行目',
            'payment_duration_basic_days1_12' => '2枚目_10_基礎日数_13行目',
            'payment_duration_basic_days1_13' => '2枚目_10_基礎日数_14行目',
            'payment_duration_basic_days1_14' => '2枚目_10_基礎日数_15行目',
            'payment_duration_basic_days1_15' => '2枚目_10_基礎日数_16行目',
            'wage_amount_A1' => '2枚目_11_賃金額_A_1行目',
            'wage_amount_A1_1' => '2枚目_11_賃金額_A_2行目',
            'wage_amount_A1_2' => '2枚目_11_賃金額_A_3行目',
            'wage_amount_A1_3' => '2枚目_11_賃金額_A_4行目',
            'wage_amount_A1_4' => '2枚目_11_賃金額_A_5行目',
            'wage_amount_A1_5' => '2枚目_11_賃金額_A_6行目',
            'wage_amount_A1_6' => '2枚目_11_賃金額_A_7行目',
            'wage_amount_A1_7' => '2枚目_11_賃金額_A_8行目',
            'wage_amount_A1_8' => '2枚目_11_賃金額_A_9行目',
            'wage_amount_A1_9' => '2枚目_11_賃金額_A_10行目',
            'wage_amount_A1_10' => '2枚目_11_賃金額_A_11行目',
            'wage_amount_A1_11' => '2枚目_11_賃金額_A_12行目',
            'wage_amount_A1_12' => '2枚目_11_賃金額_A_13行目',
            'wage_amount_A1_13' => '2枚目_11_賃金額_A_14行目',
            'wage_amount_A1_14' => '2枚目_11_賃金額_A_15行目',
            'wage_amount_A1_15' => '2枚目_11_賃金額_A_16行目',
            'wage_amount_B1' => '2枚目_11_賃金額_B_1行目',
            'wage_amount_B1_1' => '2枚目_11_賃金額_B_2行目',
            'wage_amount_B1_2' => '2枚目_11_賃金額_B_3行目',
            'wage_amount_B1_3' => '2枚目_11_賃金額_B_4行目',
            'wage_amount_B1_4' => '2枚目_11_賃金額_B_5行目',
            'wage_amount_B1_5' => '2枚目_11_賃金額_B_6行目',
            'wage_amount_B1_6' => '2枚目_11_賃金額_B_7行目',
            'wage_amount_B1_7' => '2枚目_11_賃金額_B_8行目',
            'wage_amount_B1_8' => '2枚目_11_賃金額_B_9行目',
            'wage_amount_B1_9' => '2枚目_11_賃金額_B_10行目',
            'wage_amount_B1_10' => '2枚目_11_賃金額_B_11行目',
            'wage_amount_B1_11' => '2枚目_11_賃金額_B_12行目',
            'wage_amount_B1_12' => '2枚目_11_賃金額_B_13行目',
            'wage_amount_B1_13' => '2枚目_11_賃金額_B_14行目',
            'wage_amount_B1_14' => '2枚目_11_賃金額_B_15行目',
            'wage_amount_B1_15' => '2枚目_11_賃金額_B_16行目',
            'total_wages1' => '2枚目_11_賃金額計_1行目',
            'total_wages1_1' => '2枚目_11_賃金額計_2行目',
            'total_wages1_2' => '2枚目_11_賃金額計_3行目',
            'total_wages1_3' => '2枚目_11_賃金額計_4行目',
            'total_wages1_4' => '2枚目_11_賃金額計_5行目',
            'total_wages1_5' => '2枚目_11_賃金額計_6行目',
            'total_wages1_7' => '2枚目_11_賃金額計_7行目',
            'total_wages1_6' => '2枚目_11_賃金額計_8行目',
            'total_wages1_9' => '2枚目_11_賃金額計_9行目',
            'total_wages1_8' => '2枚目_11_賃金額計_10行目',
            'total_wages1_10' => '2枚目_11_賃金額計_11行目',
            'total_wages1_11' => '2枚目_11_賃金額計_12行目',
            'total_wages1_12' => '2枚目_11_賃金額計_13行目',
            'total_wages1_13' => '2枚目_11_賃金額計_14行目',
            'total_wages1_14' => '2枚目_11_賃金額計_15行目',
            'total_wages1_15' => '2枚目_11_賃金額計_16行目',
            'wage_note1' => '2枚目_12_備考_1行目',
            'wage_note1_1' => '2枚目_12_備考_2行目',
            'wage_note1_2' => '2枚目_12_備考_3行目',
            'wage_note1_3' => '2枚目_12_備考_4行目',
            'wage_note1_4' => '2枚目_12_備考_5行目',
            'wage_note1_5' => '2枚目_12_備考_6行目',
            'wage_note1_6' => '2枚目_12_備考_7行目',
            'wage_note1_7' => '2枚目_12_備考_8行目',
            'wage_note1_8' => '2枚目_12_備考_9行目',
            'wage_note1_9' => '2枚目_12_備考_10行目',
            'wage_note1_10' => '2枚目_12_備考_11行目',
            'wage_note1_11' => '2枚目_12_備考_12行目',
            'wage_note1_12' => '2枚目_12_備考_13行目',
            'wage_note1_13' => '2枚目_12_備考_14行目',
            'wage_note1_14' => '2枚目_12_備考_15行目',
            'wage_note1_15' => '2枚目_12_備考_16行目',
            'special_note_on_wages1' => '2枚目_13_賃金に関する特記事項',
            'employment_duration_set' => '2枚目_14_（休業開始時における）雇用期間の定め有無',
            'employment_duration_set_japan_era' => '2枚目_14_（休業開始時における）雇用期間_日付_年号',
            'employment_duration_set_japan_era_year' => '2枚目_14_（休業開始時における）雇用期間_日付_年',
            'employment_duration_set_month' => '2枚目_14_（休業開始時における）雇用期間_日付_月',
            'employment_duration_set_day' => '2枚目_14_（休業開始時における）雇用期間_日付_日',
            'period_with_leave_start_included_year' => '2枚目_14_（休業開始時における）雇用期間_期間_年',
            'period_with_leave_start_included_month' => '2枚目_14_（休業開始時における）雇用期間_期間_月',
            'labor_consultant_japan_era' => '2枚目_社会保険労務士記載欄_年号',
            'labor_consultant_japan_era_year' => '2枚目_社会保険労務士記載欄_年',
            'labor_consultant_month' => '2枚目_社会保険労務士記載欄_月',
            'labor_consultant_day' => '2枚目_社会保険労務士記載欄_日',
            'labor_consultant_acting_as_agent_name' => '2枚目_社会保険労務士記載欄_作成年月日･提出代行者･事務代理者の表示',
            'labor_consultant_name' => '2枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_treacode' => '2枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '2枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '2枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'other_notes' => '2枚目_付記欄',
            'calculation_duration_start_month2_1' => '[続紙]2枚目_7_算定対象期間_開始月_1行目',
            'calculation_duration_start_month2_2' => '[続紙]2枚目_7_算定対象期間_開始月_2行目',
            'calculation_duration_start_month2_3' => '[続紙]2枚目_7_算定対象期間_開始月_3行目',
            'calculation_duration_start_month2_4' => '[続紙]2枚目_7_算定対象期間_開始月_4行目',
            'calculation_duration_start_month2_5' => '[続紙]2枚目_7_算定対象期間_開始月_5行目',
            'calculation_duration_start_month2_6' => '[続紙]2枚目_7_算定対象期間_開始月_6行目',
            'calculation_duration_start_month2_7' => '[続紙]2枚目_7_算定対象期間_開始月_7行目',
            'calculation_duration_start_month2_8' => '[続紙]2枚目_7_算定対象期間_開始月_8行目',
            'calculation_duration_start_month2_9' => '[続紙]2枚目_7_算定対象期間_開始月_9行目',
            'calculation_duration_start_month2_10' => '[続紙]2枚目_7_算定対象期間_開始月_10行目',
            'calculation_duration_start_month2_11' => '[続紙]2枚目_7_算定対象期間_開始月_11行目',
            'calculation_duration_start_month2_12' => '[続紙]2枚目_7_算定対象期間_開始月_12行目',
            'calculation_duration_start_month2_13' => '[続紙]2枚目_7_算定対象期間_開始月_13行目',
            'calculation_duration_start_month2_14' => '[続紙]2枚目_7_算定対象期間_開始月_14行目',
            'calculation_duration_start_month2_15' => '[続紙]2枚目_7_算定対象期間_開始月_15行目',
            'calculation_duration_start_day2_1' => '[続紙]2枚目_7_算定対象期間_開始日_1行目',
            'calculation_duration_start_day2_2' => '[続紙]2枚目_7_算定対象期間_開始日_2行目',
            'calculation_duration_start_day2_3' => '[続紙]2枚目_7_算定対象期間_開始日_3行目',
            'calculation_duration_start_day2_4' => '[続紙]2枚目_7_算定対象期間_開始日_4行目',
            'calculation_duration_start_day2_5' => '[続紙]2枚目_7_算定対象期間_開始日_5行目',
            'calculation_duration_start_day2_6' => '[続紙]2枚目_7_算定対象期間_開始日_6行目',
            'calculation_duration_start_day2_7' => '[続紙]2枚目_7_算定対象期間_開始日_7行目',
            'calculation_duration_start_day2_8' => '[続紙]2枚目_7_算定対象期間_開始日_8行目',
            'calculation_duration_start_day2_9' => '[続紙]2枚目_7_算定対象期間_開始日_9行目',
            'calculation_duration_start_day2_10' => '[続紙]2枚目_7_算定対象期間_開始日_10行目',
            'calculation_duration_start_day2_11' => '[続紙]2枚目_7_算定対象期間_開始日_11行目',
            'calculation_duration_start_day2_12' => '[続紙]2枚目_7_算定対象期間_開始日_12行目',
            'calculation_duration_start_day2_13' => '[続紙]2枚目_7_算定対象期間_開始日_13行目',
            'calculation_duration_start_day2_14' => '[続紙]2枚目_7_算定対象期間_開始日_14行目',
            'calculation_duration_start_day2_15' => '[続紙]2枚目_7_算定対象期間_開始日_15行目',
            'calculation_duration_end_month2_1' => '[続紙]2枚目_7_算定対象期間_終了月_1行目',
            'calculation_duration_end_month2_2' => '[続紙]2枚目_7_算定対象期間_終了月_2行目',
            'calculation_duration_end_month2_3' => '[続紙]2枚目_7_算定対象期間_終了月_3行目',
            'calculation_duration_end_month2_4' => '[続紙]2枚目_7_算定対象期間_終了月_4行目',
            'calculation_duration_end_month2_5' => '[続紙]2枚目_7_算定対象期間_終了月_5行目',
            'calculation_duration_end_month2_6' => '[続紙]2枚目_7_算定対象期間_終了月_6行目',
            'calculation_duration_end_month2_7' => '[続紙]2枚目_7_算定対象期間_終了月_7行目',
            'calculation_duration_end_month2_8' => '[続紙]2枚目_7_算定対象期間_終了月_8行目',
            'calculation_duration_end_month2_9' => '[続紙]2枚目_7_算定対象期間_終了月_9行目',
            'calculation_duration_end_month2_10' => '[続紙]2枚目_7_算定対象期間_終了月_10行目',
            'calculation_duration_end_month2_11' => '[続紙]2枚目_7_算定対象期間_終了月_11行目',
            'calculation_duration_end_month2_12' => '[続紙]2枚目_7_算定対象期間_終了月_12行目',
            'calculation_duration_end_month2_13' => '[続紙]2枚目_7_算定対象期間_終了月_13行目',
            'calculation_duration_end_month2_14' => '[続紙]2枚目_7_算定対象期間_終了月_14行目',
            'calculation_duration_end_month2_15' => '[続紙]2枚目_7_算定対象期間_終了月_15行目',
            'calculation_duration_end_day2_1' => '[続紙]2枚目_7_算定対象期間_終了日_1行目',
            'calculation_duration_end_day2_2' => '[続紙]2枚目_7_算定対象期間_終了日_2行目',
            'calculation_duration_end_day2_3' => '[続紙]2枚目_7_算定対象期間_終了日_3行目',
            'calculation_duration_end_day2_4' => '[続紙]2枚目_7_算定対象期間_終了日_4行目',
            'calculation_duration_end_day2_5' => '[続紙]2枚目_7_算定対象期間_終了日_5行目',
            'calculation_duration_end_day2_6' => '[続紙]2枚目_7_算定対象期間_終了日_6行目',
            'calculation_duration_end_day2_7' => '[続紙]2枚目_7_算定対象期間_終了日_7行目',
            'calculation_duration_end_day2_8' => '[続紙]2枚目_7_算定対象期間_終了日_8行目',
            'calculation_duration_end_day2_9' => '[続紙]2枚目_7_算定対象期間_終了日_9行目',
            'calculation_duration_end_day2_10' => '[続紙]2枚目_7_算定対象期間_終了日_10行目',
            'calculation_duration_end_day2_11' => '[続紙]2枚目_7_算定対象期間_終了日_11行目',
            'calculation_duration_end_day2_12' => '[続紙]2枚目_7_算定対象期間_終了日_12行目',
            'calculation_duration_end_day2_13' => '[続紙]2枚目_7_算定対象期間_終了日_13行目',
            'calculation_duration_end_day2_14' => '[続紙]2枚目_7_算定対象期間_終了日_14行目',
            'calculation_duration_end_day2_15' => '[続紙]2枚目_7_算定対象期間_終了日_15行目',
            'calculation_duration_basic_days2_1' => '[続紙]2枚目_8_賃金支払基礎日数_1行目',
            'calculation_duration_basic_days2_2' => '[続紙]2枚目_8_賃金支払基礎日数_2行目',
            'calculation_duration_basic_days2_3' => '[続紙]2枚目_8_賃金支払基礎日数_3行目',
            'calculation_duration_basic_days2_4' => '[続紙]2枚目_8_賃金支払基礎日数_4行目',
            'calculation_duration_basic_days2_5' => '[続紙]2枚目_8_賃金支払基礎日数_5行目',
            'calculation_duration_basic_days2_6' => '[続紙]2枚目_8_賃金支払基礎日数_6行目',
            'calculation_duration_basic_days2_7' => '[続紙]2枚目_8_賃金支払基礎日数_7行目',
            'calculation_duration_basic_days2_8' => '[続紙]2枚目_8_賃金支払基礎日数_8行目',
            'calculation_duration_basic_days2_9' => '[続紙]2枚目_8_賃金支払基礎日数_9行目',
            'calculation_duration_basic_days2_10' => '[続紙]2枚目_8_賃金支払基礎日数_10行目',
            'calculation_duration_basic_days2_11' => '[続紙]2枚目_8_賃金支払基礎日数_11行目',
            'calculation_duration_basic_days2_12' => '[続紙]2枚目_8_賃金支払基礎日数_12行目',
            'calculation_duration_basic_days2_13' => '[続紙]2枚目_8_賃金支払基礎日数_13行目',
            'calculation_duration_basic_days2_14' => '[続紙]2枚目_8_賃金支払基礎日数_14行目',
            'calculation_duration_basic_days2_15' => '[続紙]2枚目_8_賃金支払基礎日数_15行目',
            'payment_duration_start_month2_1' => '[続紙]2枚目_9_賃金支払対象期間_開始月_1行目',
            'payment_duration_start_month2_2' => '[続紙]2枚目_9_賃金支払対象期間_開始月_2行目',
            'payment_duration_start_month2_3' => '[続紙]2枚目_9_賃金支払対象期間_開始月_3行目',
            'payment_duration_start_month2_4' => '[続紙]2枚目_9_賃金支払対象期間_開始月_4行目',
            'payment_duration_start_month2_5' => '[続紙]2枚目_9_賃金支払対象期間_開始月_5行目',
            'payment_duration_start_month2_6' => '[続紙]2枚目_9_賃金支払対象期間_開始月_6行目',
            'payment_duration_start_month2_7' => '[続紙]2枚目_9_賃金支払対象期間_開始月_7行目',
            'payment_duration_start_month2_8' => '[続紙]2枚目_9_賃金支払対象期間_開始月_8行目',
            'payment_duration_start_month2_9' => '[続紙]2枚目_9_賃金支払対象期間_開始月_9行目',
            'payment_duration_start_month2_10' => '[続紙]2枚目_9_賃金支払対象期間_開始月_10行目',
            'payment_duration_start_month2_11' => '[続紙]2枚目_9_賃金支払対象期間_開始月_11行目',
            'payment_duration_start_month2_12' => '[続紙]2枚目_9_賃金支払対象期間_開始月_12行目',
            'payment_duration_start_month2_13' => '[続紙]2枚目_9_賃金支払対象期間_開始月_13行目',
            'payment_duration_start_month2_14' => '[続紙]2枚目_9_賃金支払対象期間_開始月_14行目',
            'payment_duration_start_month2_15' => '[続紙]2枚目_9_賃金支払対象期間_開始月_15行目',
            'payment_duration_start_day2_1' => '[続紙]2枚目_9_賃金支払対象期間_開始日_1行目',
            'payment_duration_start_day2_2' => '[続紙]2枚目_9_賃金支払対象期間_開始日_2行目',
            'payment_duration_start_day2_3' => '[続紙]2枚目_9_賃金支払対象期間_開始日_3行目',
            'payment_duration_start_day2_4' => '[続紙]2枚目_9_賃金支払対象期間_開始日_4行目',
            'payment_duration_start_day2_5' => '[続紙]2枚目_9_賃金支払対象期間_開始日_5行目',
            'payment_duration_start_day2_6' => '[続紙]2枚目_9_賃金支払対象期間_開始日_6行目',
            'payment_duration_start_day2_7' => '[続紙]2枚目_9_賃金支払対象期間_開始日_7行目',
            'payment_duration_start_day2_8' => '[続紙]2枚目_9_賃金支払対象期間_開始日_8行目',
            'payment_duration_start_day2_9' => '[続紙]2枚目_9_賃金支払対象期間_開始日_9行目',
            'payment_duration_start_day2_10' => '[続紙]2枚目_9_賃金支払対象期間_開始日_10行目',
            'payment_duration_start_day2_11' => '[続紙]2枚目_9_賃金支払対象期間_開始日_11行目',
            'payment_duration_start_day2_12' => '[続紙]2枚目_9_賃金支払対象期間_開始日_12行目',
            'payment_duration_start_day2_13' => '[続紙]2枚目_9_賃金支払対象期間_開始日_13行目',
            'payment_duration_start_day2_14' => '[続紙]2枚目_9_賃金支払対象期間_開始日_14行目',
            'payment_duration_start_day2_15' => '[続紙]2枚目_9_賃金支払対象期間_開始日_15行目',
            'payment_duration_end_month2_1' => '[続紙]2枚目_9_賃金支払対象期間_終了月_1行目',
            'payment_duration_end_month2_2' => '[続紙]2枚目_9_賃金支払対象期間_終了月_2行目',
            'payment_duration_end_month2_3' => '[続紙]2枚目_9_賃金支払対象期間_終了月_3行目',
            'payment_duration_end_month2_4' => '[続紙]2枚目_9_賃金支払対象期間_終了月_4行目',
            'payment_duration_end_month2_5' => '[続紙]2枚目_9_賃金支払対象期間_終了月_5行目',
            'payment_duration_end_month2_6' => '[続紙]2枚目_9_賃金支払対象期間_終了月_6行目',
            'payment_duration_end_month2_7' => '[続紙]2枚目_9_賃金支払対象期間_終了月_7行目',
            'payment_duration_end_month2_8' => '[続紙]2枚目_9_賃金支払対象期間_終了月_8行目',
            'payment_duration_end_month2_9' => '[続紙]2枚目_9_賃金支払対象期間_終了月_9行目',
            'payment_duration_end_month2_10' => '[続紙]2枚目_9_賃金支払対象期間_終了月_10行目',
            'payment_duration_end_month2_11' => '[続紙]2枚目_9_賃金支払対象期間_終了月_11行目',
            'payment_duration_end_month2_12' => '[続紙]2枚目_9_賃金支払対象期間_終了月_12行目',
            'payment_duration_end_month2_13' => '[続紙]2枚目_9_賃金支払対象期間_終了月_13行目',
            'payment_duration_end_month2_14' => '[続紙]2枚目_9_賃金支払対象期間_終了月_14行目',
            'payment_duration_end_month2_15' => '[続紙]2枚目_9_賃金支払対象期間_終了月_15行目',
            'payment_duration_end_day2_1' => '[続紙]2枚目_9_賃金支払対象期間_終了日_1行目',
            'payment_duration_end_day2_2' => '[続紙]2枚目_9_賃金支払対象期間_終了日_2行目',
            'payment_duration_end_day2_3' => '[続紙]2枚目_9_賃金支払対象期間_終了日_3行目',
            'payment_duration_end_day2_4' => '[続紙]2枚目_9_賃金支払対象期間_終了日_4行目',
            'payment_duration_end_day2_5' => '[続紙]2枚目_9_賃金支払対象期間_終了日_5行目',
            'payment_duration_end_day2_6' => '[続紙]2枚目_9_賃金支払対象期間_終了日_6行目',
            'payment_duration_end_day2_7' => '[続紙]2枚目_9_賃金支払対象期間_終了日_7行目',
            'payment_duration_end_day2_8' => '[続紙]2枚目_9_賃金支払対象期間_終了日_8行目',
            'payment_duration_end_day2_9' => '[続紙]2枚目_9_賃金支払対象期間_終了日_9行目',
            'payment_duration_end_day2_10' => '[続紙]2枚目_9_賃金支払対象期間_終了日_10行目',
            'payment_duration_end_day2_11' => '[続紙]2枚目_9_賃金支払対象期間_終了日_11行目',
            'payment_duration_end_day2_12' => '[続紙]2枚目_9_賃金支払対象期間_終了日_12行目',
            'payment_duration_end_day2_13' => '[続紙]2枚目_9_賃金支払対象期間_終了日_13行目',
            'payment_duration_end_day2_14' => '[続紙]2枚目_9_賃金支払対象期間_終了日_14行目',
            'payment_duration_end_day2_15' => '[続紙]2枚目_9_賃金支払対象期間_終了日_15行目',
            'payment_duration_basic_days2_1' => '[続紙]2枚目_10_基礎日数_1行目',
            'payment_duration_basic_days2_2' => '[続紙]2枚目_10_基礎日数_2行目',
            'payment_duration_basic_days2_3' => '[続紙]2枚目_10_基礎日数_3行目',
            'payment_duration_basic_days2_4' => '[続紙]2枚目_10_基礎日数_4行目',
            'payment_duration_basic_days2_5' => '[続紙]2枚目_10_基礎日数_5行目',
            'payment_duration_basic_days2_6' => '[続紙]2枚目_10_基礎日数_6行目',
            'payment_duration_basic_days2_7' => '[続紙]2枚目_10_基礎日数_7行目',
            'payment_duration_basic_days2_8' => '[続紙]2枚目_10_基礎日数_8行目',
            'payment_duration_basic_days2_9' => '[続紙]2枚目_10_基礎日数_9行目',
            'payment_duration_basic_days2_10' => '[続紙]2枚目_10_基礎日数_10行目',
            'payment_duration_basic_days2_11' => '[続紙]2枚目_10_基礎日数_11行目',
            'payment_duration_basic_days2_12' => '[続紙]2枚目_10_基礎日数_12行目',
            'payment_duration_basic_days2_13' => '[続紙]2枚目_10_基礎日数_13行目',
            'payment_duration_basic_days2_14' => '[続紙]2枚目_10_基礎日数_14行目',
            'payment_duration_basic_days2_15' => '[続紙]2枚目_10_基礎日数_15行目',
            'wage_amount_A2_1' => '[続紙]2枚目_11_賃金額_A_1行目',
            'wage_amount_A2_2' => '[続紙]2枚目_11_賃金額_A_2行目',
            'wage_amount_A2_3' => '[続紙]2枚目_11_賃金額_A_3行目',
            'wage_amount_A2_4' => '[続紙]2枚目_11_賃金額_A_4行目',
            'wage_amount_A2_5' => '[続紙]2枚目_11_賃金額_A_5行目',
            'wage_amount_A2_6' => '[続紙]2枚目_11_賃金額_A_6行目',
            'wage_amount_A2_7' => '[続紙]2枚目_11_賃金額_A_7行目',
            'wage_amount_A2_8' => '[続紙]2枚目_11_賃金額_A_8行目',
            'wage_amount_A2_9' => '[続紙]2枚目_11_賃金額_A_9行目',
            'wage_amount_A2_10' => '[続紙]2枚目_11_賃金額_A_10行目',
            'wage_amount_A2_11' => '[続紙]2枚目_11_賃金額_A_11行目',
            'wage_amount_A2_12' => '[続紙]2枚目_11_賃金額_A_12行目',
            'wage_amount_A2_13' => '[続紙]2枚目_11_賃金額_A_13行目',
            'wage_amount_A2_14' => '[続紙]2枚目_11_賃金額_A_14行目',
            'wage_amount_A2_15' => '[続紙]2枚目_11_賃金額_A_15行目',
            'wage_amount_B2_1' => '[続紙]2枚目_11_賃金額_B_1行目',
            'wage_amount_B2_2' => '[続紙]2枚目_11_賃金額_B_2行目',
            'wage_amount_B2_3' => '[続紙]2枚目_11_賃金額_B_3行目',
            'wage_amount_B2_4' => '[続紙]2枚目_11_賃金額_B_4行目',
            'wage_amount_B2_5' => '[続紙]2枚目_11_賃金額_B_5行目',
            'wage_amount_B2_6' => '[続紙]2枚目_11_賃金額_B_6行目',
            'wage_amount_B2_7' => '[続紙]2枚目_11_賃金額_B_7行目',
            'wage_amount_B2_8' => '[続紙]2枚目_11_賃金額_B_8行目',
            'wage_amount_B2_9' => '[続紙]2枚目_11_賃金額_B_9行目',
            'wage_amount_B2_10' => '[続紙]2枚目_11_賃金額_B_10行目',
            'wage_amount_B2_11' => '[続紙]2枚目_11_賃金額_B_11行目',
            'wage_amount_B2_12' => '[続紙]2枚目_11_賃金額_B_12行目',
            'wage_amount_B2_13' => '[続紙]2枚目_11_賃金額_B_13行目',
            'wage_amount_B2_14' => '[続紙]2枚目_11_賃金額_B_14行目',
            'wage_amount_B2_15' => '[続紙]2枚目_11_賃金額_B_15行目',
            'total_wages2_1' => '[続紙]2枚目_11_賃金額計_1行目',
            'total_wages2_2' => '[続紙]2枚目_11_賃金額計_2行目',
            'total_wages2_3' => '[続紙]2枚目_11_賃金額計_3行目',
            'total_wages2_4' => '[続紙]2枚目_11_賃金額計_4行目',
            'total_wages2_5' => '[続紙]2枚目_11_賃金額計_5行目',
            'total_wages2_7' => '[続紙]2枚目_11_賃金額計_6行目',
            'total_wages2_6' => '[続紙]2枚目_11_賃金額計_7行目',
            'total_wages2_9' => '[続紙]2枚目_11_賃金額計_8行目',
            'total_wages2_8' => '[続紙]2枚目_11_賃金額計_9行目',
            'total_wages2_10' => '[続紙]2枚目_11_賃金額計_10行目',
            'total_wages2_11' => '[続紙]2枚目_11_賃金額計_11行目',
            'total_wages2_12' => '[続紙]2枚目_11_賃金額計_12行目',
            'total_wages2_13' => '[続紙]2枚目_11_賃金額計_13行目',
            'total_wages2_14' => '[続紙]2枚目_11_賃金額計_14行目',
            'total_wages2_15' => '[続紙]2枚目_11_賃金額計_15行目',
            'wage_note2_1' => '[続紙]2枚目_12_備考_1行目',
            'wage_note2_2' => '[続紙]2枚目_12_備考_2行目',
            'wage_note2_3' => '[続紙]2枚目_12_備考_3行目',
            'wage_note2_4' => '[続紙]2枚目_12_備考_4行目',
            'wage_note2_5' => '[続紙]2枚目_12_備考_5行目',
            'wage_note2_6' => '[続紙]2枚目_12_備考_6行目',
            'wage_note2_7' => '[続紙]2枚目_12_備考_7行目',
            'wage_note2_8' => '[続紙]2枚目_12_備考_8行目',
            'wage_note2_9' => '[続紙]2枚目_12_備考_9行目',
            'wage_note2_10' => '[続紙]2枚目_12_備考_10行目',
            'wage_note2_11' => '[続紙]2枚目_12_備考_11行目',
            'wage_note2_12' => '[続紙]2枚目_12_備考_12行目',
            'wage_note2_13' => '[続紙]2枚目_12_備考_13行目',
            'wage_note2_14' => '[続紙]2枚目_12_備考_14行目',
            'wage_note2_15' => '[続紙]2枚目_12_備考_15行目',
            'special_note_on_wages2' => '[続紙]2枚目_13_賃金に関する特記事項'
        ];
    }
}
