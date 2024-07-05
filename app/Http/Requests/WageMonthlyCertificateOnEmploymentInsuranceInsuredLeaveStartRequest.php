<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WageMonthlyCertificateOnEmploymentInsuranceInsuredLeaveStartRequest extends BaseRequest
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
            'leave_start_wage_monthly_certificate' => 'nullable|int|in:1|required_without:reduced_working_hours_wage_certificate_start',
            'reduced_working_hours_wage_certificate_start' => 'nullable|int|in:1',
            'employment_insured_no_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'insurance_office_no_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'insurance_office_no_6' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'insurance_office_no_cd' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'employment_fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]+[　][ぁ-んァ-ヴー一-龥々]+\z/u',
            'employment_fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'branch_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'branch_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'branch_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'post_code_3' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'post_code_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'employment_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employment_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employment_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'entrepreneur_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'entrepreneur_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'caregiver_leave_start_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:caregiver_leave_start_date_day',
            'caregiver_leave_start_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:caregiver_leave_start_date_month',
            'calculation_month_start_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1',
            'calculation_day_start_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1',
            'calculation_month_start_1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_1',
            'calculation_day_start_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_1',
            'calculation_month_end_1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_1',
            'calculation_day_end_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_1',
            'calculation_month_start_1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_2',
            'calculation_day_start_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_2',
            'calculation_month_end_1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_2',
            'calculation_day_end_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_2',
            'calculation_month_start_1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_3',
            'calculation_day_start_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_3',
            'calculation_month_end_1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_3',
            'calculation_day_end_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_3',
            'calculation_month_start_1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_4',
            'calculation_day_start_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_4',
            'calculation_month_end_1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_4',
            'calculation_day_end_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_4',
            'calculation_month_start_1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_5',
            'calculation_day_start_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_5',
            'calculation_month_end_1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_5',
            'calculation_day_end_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_5',
            'calculation_month_start_1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_6',
            'calculation_day_start_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_6',
            'calculation_month_end_1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_6',
            'calculation_day_end_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_6',
            'calculation_month_start_1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_7',
            'calculation_day_start_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_7',
            'calculation_month_end_1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_7',
            'calculation_day_end_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_7',
            'calculation_month_start_1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_8',
            'calculation_day_start_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_8',
            'calculation_month_end_1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_8',
            'calculation_day_end_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_8',
            'calculation_month_start_1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_9',
            'calculation_day_start_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_9',
            'calculation_month_end_1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_9',
            'calculation_day_end_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_9',
            'calculation_month_start_1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_10',
            'calculation_day_start_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_10',
            'calculation_month_end_1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_10',
            'calculation_day_end_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_10',
            'calculation_month_start_1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_11',
            'calculation_day_start_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_11',
            'calculation_month_end_1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_11',
            'calculation_day_end_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_11',
            'calculation_month_start_1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_12',
            'calculation_day_start_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_12',
            'calculation_month_end_1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_12',
            'calculation_day_end_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_12',
            'calculation_month_start_1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_13',
            'calculation_day_start_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_13',
            'calculation_month_end_1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_13',
            'calculation_day_end_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_13',
            'calculation_month_start_1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_14',
            'calculation_day_start_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_14',
            'calculation_month_end_1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_14',
            'calculation_day_end_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_14',
            'calculation_month_start_1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_1_15',
            'calculation_day_start_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_1_15',
            'calculation_month_end_1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_1_15',
            'calculation_day_end_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_1_15',
            'calculation_basic_period_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_month_start_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1',
            'payment_day_start_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1',
            'payment_month_start_1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_1',
            'payment_day_start_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_1',
            'payment_month_end_1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_1',
            'payment_day_end_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_1',
            'payment_month_start_1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_2',
            'payment_day_start_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_2',
            'payment_month_end_1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_2',
            'payment_day_end_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_2',
            'payment_month_start_1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_3',
            'payment_day_start_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_3',
            'payment_month_end_1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_3',
            'payment_day_end_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_3',
            'payment_month_start_1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_4',
            'payment_day_start_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_4',
            'payment_month_end_1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_4',
            'payment_day_end_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_4',
            'payment_month_start_1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_5',
            'payment_day_start_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_5',
            'payment_month_end_1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_5',
            'payment_day_end_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_5',
            'payment_month_start_1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_6',
            'payment_day_start_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_6',
            'payment_month_end_1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_6',
            'payment_day_end_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_6',
            'payment_month_start_1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_7',
            'payment_day_start_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_7',
            'payment_month_end_1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_7',
            'payment_day_end_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_7',
            'payment_month_start_1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_8',
            'payment_day_start_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_8',
            'payment_month_end_1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_8',
            'payment_day_end_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_8',
            'payment_month_start_1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_9',
            'payment_day_start_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_9',
            'payment_month_end_1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_9',
            'payment_day_end_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_9',
            'payment_month_start_1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_10',
            'payment_day_start_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_10',
            'payment_month_end_1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_10',
            'payment_day_end_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_10',
            'payment_month_start_1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_11',
            'payment_day_start_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_11',
            'payment_month_end_1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_11',
            'payment_day_end_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_11',
            'payment_month_start_1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_12',
            'payment_day_start_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_12',
            'payment_month_end_1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_12',
            'payment_day_end_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_12',
            'payment_month_start_1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_13',
            'payment_day_start_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_13',
            'payment_month_end_1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_13',
            'payment_day_end_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_13',
            'payment_month_start_1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_14',
            'payment_day_start_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_14',
            'payment_month_end_1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_14',
            'payment_day_end_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_14',
            'payment_month_start_1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_1_15',
            'payment_day_start_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_1_15',
            'payment_month_end_1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_1_15',
            'payment_day_end_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_1_15',
            'payment_basic_period_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amountA' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_total_1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_2' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_3' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_4' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_5' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_6' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_7' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_8' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_9' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_10' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_11' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_12' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_13' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_14' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_1_15' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'note_1' => 'nullable|string|max:255',
            'note_1_1' => 'nullable|string|max:255',
            'note_1_2' => 'nullable|string|max:255',
            'note_1_3' => 'nullable|string|max:255',
            'note_1_4' => 'nullable|string|max:255',
            'note_1_5' => 'nullable|string|max:255',
            'note_1_6' => 'nullable|string|max:255',
            'note_1_7' => 'nullable|string|max:255',
            'note_1_8' => 'nullable|string|max:255',
            'note_1_9' => 'nullable|string|max:255',
            'note_1_10' => 'nullable|string|max:255',
            'note_1_11' => 'nullable|string|max:255',
            'note_1_12' => 'nullable|string|max:255',
            'note_1_13' => 'nullable|string|max:255',
            'note_1_14' => 'nullable|string|max:255',
            'note_1_15' => 'nullable|string|max:255',
            'wage_note_1' => 'nullable|string|max:255',
            'employment_period_regulation' => 'nullable|string|in:定めなし,定めあり',
            'employment_period_japan_era' => 'nullable|string|max:2',
            'employment_period_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:employment_period_day,employment_period_month',
            'employment_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:employment_period_year,employment_period_day',
            'employment_period_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:employment_period_year,employment_period_month',
            'including_leave_start_date_year' => 'nullable|int|regex:/^[0-9]{1,2}$/u',
            'including_leave_start_date_month' => 'nullable|int|between:0,11|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_note' => 'nullable|string|max:255',
            'creation_date_japan_era' => 'nullable|string|max:2',
            'creation_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'creation_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'creation_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/uu',
            'submission_agent' => 'nullable|string|max:255',
            'labor_consultant_fullname' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'calculation_month_start_2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_1',
            'calculation_day_start_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_1',
            'calculation_month_end_2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_1',
            'calculation_day_end_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_1',
            'calculation_month_start_2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_2',
            'calculation_day_start_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_2',
            'calculation_month_end_2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_2',
            'calculation_day_end_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_2',
            'calculation_month_start_2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_3',
            'calculation_day_start_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_3',
            'calculation_month_end_2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_3',
            'calculation_day_end_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_3',
            'calculation_month_start_2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_4',
            'calculation_day_start_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_4',
            'calculation_month_end_2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_4',
            'calculation_day_end_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_4',
            'calculation_month_start_2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_5',
            'calculation_day_start_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_5',
            'calculation_month_end_2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_5',
            'calculation_day_end_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_5',
            'calculation_month_start_2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_6',
            'calculation_day_start_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_6',
            'calculation_month_end_2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_6',
            'calculation_day_end_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_6',
            'calculation_month_start_2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_7',
            'calculation_day_start_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_7',
            'calculation_month_end_2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_7',
            'calculation_day_end_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_7',
            'calculation_month_start_2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_8',
            'calculation_day_start_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_8',
            'calculation_month_end_2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_8',
            'calculation_day_end_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_8',
            'calculation_month_start_2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_9',
            'calculation_day_start_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_9',
            'calculation_month_end_2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_9',
            'calculation_day_end_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_9',
            'calculation_month_start_2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_10',
            'calculation_day_start_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_10',
            'calculation_month_end_2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_10',
            'calculation_day_end_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_10',
            'calculation_month_start_2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_11',
            'calculation_day_start_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_11',
            'calculation_month_end_2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_11',
            'calculation_day_end_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_11',
            'calculation_month_start_2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_12',
            'calculation_day_start_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_12',
            'calculation_month_end_2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_12',
            'calculation_day_end_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_12',
            'calculation_month_start_2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_13',
            'calculation_day_start_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_13',
            'calculation_month_end_2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_13',
            'calculation_day_end_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_13',
            'calculation_month_start_2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_14',
            'calculation_day_start_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_14',
            'calculation_month_end_2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_14',
            'calculation_day_end_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_14',
            'calculation_month_start_2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_start_2_15',
            'calculation_day_start_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_start_2_15',
            'calculation_month_end_2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:calculation_day_end_2_15',
            'calculation_day_end_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:calculation_month_end_2_15',
            'calculation_basic_period_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'calculation_basic_period_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_month_start_2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_1',
            'payment_day_start_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_1',
            'payment_month_end_2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_1',
            'payment_day_end_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_1',
            'payment_month_start_2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_2',
            'payment_day_start_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_2',
            'payment_month_end_2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_2',
            'payment_day_end_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_2',
            'payment_month_start_2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_3',
            'payment_day_start_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_3',
            'payment_month_end_2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_3',
            'payment_day_end_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_3',
            'payment_month_start_2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_4',
            'payment_day_start_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_4',
            'payment_month_end_2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_4',
            'payment_day_end_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_4',
            'payment_month_start_2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_5',
            'payment_day_start_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_5',
            'payment_month_end_2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_5',
            'payment_day_end_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_5',
            'payment_month_start_2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_6',
            'payment_day_start_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_6',
            'payment_month_end_2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_6',
            'payment_day_end_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_6',
            'payment_month_start_2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_7',
            'payment_day_start_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_7',
            'payment_month_end_2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_7',
            'payment_day_end_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_7',
            'payment_month_start_2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_8',
            'payment_day_start_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_8',
            'payment_month_end_2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_8',
            'payment_day_end_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_8',
            'payment_month_start_2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_9',
            'payment_day_start_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_9',
            'payment_month_end_2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_9',
            'payment_day_end_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_9',
            'payment_month_start_2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_10',
            'payment_day_start_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_10',
            'payment_month_end_2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_10',
            'payment_day_end_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_10',
            'payment_month_start_2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_11',
            'payment_day_start_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_11',
            'payment_month_end_2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_11',
            'payment_day_end_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_11',
            'payment_month_start_2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_12',
            'payment_day_start_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_12',
            'payment_month_end_2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_12',
            'payment_day_end_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_12',
            'payment_month_start_2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_13',
            'payment_day_start_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_13',
            'payment_month_end_2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_13',
            'payment_day_end_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_13',
            'payment_month_start_2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_14',
            'payment_day_start_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_14',
            'payment_month_end_2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_14',
            'payment_day_end_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_14',
            'payment_month_start_2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_start_2_15',
            'payment_day_start_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_start_2_15',
            'payment_month_end_2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_day_end_2_15',
            'payment_day_end_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_month_end_2_15',
            'payment_basic_period_2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_basic_period_2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amountA_2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountA_2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amountB_2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_total_2_1' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_2' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_3' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_4' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_5' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_6' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_7' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_8' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_9' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_10' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_11' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_12' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_13' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_14' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'wage_amount_total_2_15' => 'nullable|int|between:1,19999998|regex:/^[0-9]{1,8}$/u',
            'note_2_1' => 'nullable|string|max:255',
            'note_2_2' => 'nullable|string|max:255',
            'note_2_3' => 'nullable|string|max:255',
            'note_2_4' => 'nullable|string|max:255',
            'note_2_5' => 'nullable|string|max:255',
            'note_2_6' => 'nullable|string|max:255',
            'note_2_7' => 'nullable|string|max:255',
            'note_2_8' => 'nullable|string|max:255',
            'note_2_9' => 'nullable|string|max:255',
            'note_2_10' => 'nullable|string|max:255',
            'note_2_11' => 'nullable|string|max:255',
            'note_2_12' => 'nullable|string|max:255',
            'note_2_13' => 'nullable|string|max:255',
            'note_2_14' => 'nullable|string|max:255',
            'note_2_15' => 'nullable|string|max:255',
            'wage_note_2' => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();

            if (!empty($data['employment_period_month']) && !empty($data['employment_period_day'])) {
                if (ctype_digit($data['employment_period_month'])) {
                    if (!checkdate($data['employment_period_month'], $data['employment_period_day'], '2000')) {
                        $validator->errors()->add('employment_period_month', '2枚目_14_（休業開始時における）雇用期間は正しい日付を入力してください。');
                    }
                }
            }
            if (!empty($data['employment_period_japan_era'])) {
                if ($data['employment_period_japan_era'] === '平成') {
                    if (
                        ($data['employment_period_year'] == 1 && ($data['employment_period_month'] < 1 || ($data['employment_period_month'] == 1 && $data['employment_period_day'] < 8))) ||
                        ($data['employment_period_year'] == 31 && ($data['employment_period_month'] > 4 || ($data['employment_period_month'] == 4 && $data['employment_period_day'] > 30))) ||
                        ($data['employment_period_year'] > 31)
                    ) {
                        $validator->errors()->add('employment_period_month', '2枚目_14_（休業開始時における）雇用期間は正しい日付を入力してください');
                    }
                } elseif ($data['employment_period_japan_era'] === '令和') {
                    if ($data['employment_period_year'] == 1 && $data['employment_period_month'] < 5) {
                        $validator->errors()->add('employment_period_month', '2枚目_14_（休業開始時における）雇用期間は正しい日付を入力してください');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1']) && !empty($data['calculation_day_start_1'])) {
                if (ctype_digit($data['calculation_month_start_1'])) {
                    if (!checkdate($data['calculation_month_start_1'], $data['calculation_day_start_1'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1', '2枚目_7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_1']) && !empty($data['calculation_day_start_1_1'])) {
                if (ctype_digit($data['calculation_month_start_1_1'])) {
                    if (!checkdate($data['calculation_month_start_1_1'], $data['calculation_day_start_1_1'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_1', '2枚目_7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_2']) && !empty($data['calculation_day_start_1_2'])) {
                if (ctype_digit($data['calculation_month_start_1_2'])) {
                    if (!checkdate($data['calculation_month_start_1_2'], $data['calculation_day_start_1_2'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_2', '2枚目_7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_3']) && !empty($data['calculation_day_start_1_3'])) {
                if (ctype_digit($data['calculation_month_start_1_3'])) {
                    if (!checkdate($data['calculation_month_start_1_3'], $data['calculation_day_start_1_3'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_3', '2枚目_7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_4']) && !empty($data['calculation_day_start_1_4'])) {
                if (ctype_digit($data['calculation_month_start_1_4'])) {
                    if (!checkdate($data['calculation_month_start_1_4'], $data['calculation_day_start_1_4'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_4', '2枚目_7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_5']) && !empty($data['calculation_day_start_1_5'])) {
                if (ctype_digit($data['calculation_month_start_1_5'])) {
                    if (!checkdate($data['calculation_month_start_1_5'], $data['calculation_day_start_1_5'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_5', '2枚目_7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_6']) && !empty($data['calculation_day_start_1_6'])) {
                if (ctype_digit($data['calculation_month_start_1_6'])) {
                    if (!checkdate($data['calculation_month_start_1_6'], $data['calculation_day_start_1_6'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_6', '2枚目_7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_7']) && !empty($data['calculation_day_start_1_7'])) {
                if (ctype_digit($data['calculation_month_start_1_7'])) {
                    if (!checkdate($data['calculation_month_start_1_7'], $data['calculation_day_start_1_7'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_7', '2枚目_7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_8']) && !empty($data['calculation_day_start_1_8'])) {
                if (ctype_digit($data['calculation_month_start_1_8'])) {
                    if (!checkdate($data['calculation_month_start_1_8'], $data['calculation_day_start_1_8'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_8', '2枚目_7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_9']) && !empty($data['calculation_day_start_1_9'])) {
                if (ctype_digit($data['calculation_month_start_1_9'])) {
                    if (!checkdate($data['calculation_month_start_1_9'], $data['calculation_day_start_1_9'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_9', '2枚目_7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_10']) && !empty($data['calculation_day_start_1_10'])) {
                if (ctype_digit($data['calculation_month_start_1_10'])) {
                    if (!checkdate($data['calculation_month_start_1_10'], $data['calculation_day_start_1_10'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_10', '2枚目_7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_11']) && !empty($data['calculation_day_start_1_11'])) {
                if (ctype_digit($data['calculation_month_start_1_11'])) {
                    if (!checkdate($data['calculation_month_start_1_11'], $data['calculation_day_start_1_11'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_11', '2枚目_7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_12']) && !empty($data['calculation_day_start_1_12'])) {
                if (ctype_digit($data['calculation_month_start_1_12'])) {
                    if (!checkdate($data['calculation_month_start_1_12'], $data['calculation_day_start_1_12'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_12', '2枚目_7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_13']) && !empty($data['calculation_day_start_1_13'])) {
                if (ctype_digit($data['calculation_month_start_1_13'])) {
                    if (!checkdate($data['calculation_month_start_1_13'], $data['calculation_day_start_1_13'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_13', '2枚目_7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_14']) && !empty($data['calculation_day_start_1_14'])) {
                if (ctype_digit($data['calculation_month_start_1_14'])) {
                    if (!checkdate($data['calculation_month_start_1_14'], $data['calculation_day_start_1_14'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_14', '2枚目_7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_1_15']) && !empty($data['calculation_day_start_1_15'])) {
                if (ctype_digit($data['calculation_month_start_1_15'])) {
                    if (!checkdate($data['calculation_month_start_1_15'], $data['calculation_day_start_1_15'], '2000')) {
                        $validator->errors()->add('calculation_day_start_1_15', '2枚目_7_算定対象期間_開始日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_1']) && !empty($data['calculation_day_end_1_1'])) {
                if (ctype_digit($data['calculation_month_end_1_1'])) {
                    if (!checkdate($data['calculation_month_end_1_1'], $data['calculation_day_end_1_1'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_1', '2枚目_7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_2']) && !empty($data['calculation_day_end_1_2'])) {
                if (ctype_digit($data['calculation_month_end_1_2'])) {
                    if (!checkdate($data['calculation_month_end_1_2'], $data['calculation_day_end_1_2'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_2', '2枚目_7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_3']) && !empty($data['calculation_day_end_1_3'])) {
                if (ctype_digit($data['calculation_month_end_1_3'])) {
                    if (!checkdate($data['calculation_month_end_1_3'], $data['calculation_day_end_1_3'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_3', '2枚目_7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_4']) && !empty($data['calculation_day_end_1_4'])) {
                if (ctype_digit($data['calculation_month_end_1_4'])) {
                    if (!checkdate($data['calculation_month_end_1_4'], $data['calculation_day_end_1_4'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_4', '2枚目_7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_5']) && !empty($data['calculation_day_end_1_5'])) {
                if (ctype_digit($data['calculation_month_end_1_5'])) {
                    if (!checkdate($data['calculation_month_end_1_5'], $data['calculation_day_end_1_5'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_5', '2枚目_7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_6']) && !empty($data['calculation_day_end_1_6'])) {
                if (ctype_digit($data['calculation_month_end_1_6'])) {
                    if (!checkdate($data['calculation_month_end_1_6'], $data['calculation_day_end_1_6'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_6', '2枚目_7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_7']) && !empty($data['calculation_day_end_1_7'])) {
                if (ctype_digit($data['calculation_month_end_1_7'])) {
                    if (!checkdate($data['calculation_month_end_1_7'], $data['calculation_day_end_1_7'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_7', '2枚目_7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_8']) && !empty($data['calculation_day_end_1_8'])) {
                if (ctype_digit($data['calculation_month_end_1_8'])) {
                    if (!checkdate($data['calculation_month_end_1_8'], $data['calculation_day_end_1_8'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_8', '2枚目_7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_9']) && !empty($data['calculation_day_end_1_9'])) {
                if (ctype_digit($data['calculation_month_end_1_9'])) {
                    if (!checkdate($data['calculation_month_end_1_9'], $data['calculation_day_end_1_9'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_9', '2枚目_7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_10']) && !empty($data['calculation_day_end_1_10'])) {
                if (ctype_digit($data['calculation_month_end_1_10'])) {
                    if (!checkdate($data['calculation_month_end_1_10'], $data['calculation_day_end_1_10'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_10', '2枚目_7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_11']) && !empty($data['calculation_day_end_1_11'])) {
                if (ctype_digit($data['calculation_month_end_1_11'])) {
                    if (!checkdate($data['calculation_month_end_1_11'], $data['calculation_day_end_1_11'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_11', '2枚目_7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_12']) && !empty($data['calculation_day_end_1_12'])) {
                if (ctype_digit($data['calculation_month_end_1_12'])) {
                    if (!checkdate($data['calculation_month_end_1_12'], $data['calculation_day_end_1_12'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_12', '2枚目_7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_13']) && !empty($data['calculation_day_end_1_13'])) {
                if (ctype_digit($data['calculation_month_end_1_13'])) {
                    if (!checkdate($data['calculation_month_end_1_13'], $data['calculation_day_end_1_13'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_13', '2枚目_7_算定対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_14']) && !empty($data['calculation_day_end_1_14'])) {
                if (ctype_digit($data['calculation_month_end_1_14'])) {
                    if (!checkdate($data['calculation_month_end_1_14'], $data['calculation_day_end_1_14'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_14', '2枚目_7_算定対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_1_15']) && !empty($data['calculation_day_end_1_15'])) {
                if (ctype_digit($data['calculation_month_end_1_15'])) {
                    if (!checkdate($data['calculation_month_end_1_15'], $data['calculation_day_end_1_15'], '2000')) {
                        $validator->errors()->add('calculation_day_end_1_15', '2枚目_7_算定対象期間_終了日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1']) && !empty($data['payment_day_start_1'])) {
                if (ctype_digit($data['payment_month_start_1'])) {
                    if (!checkdate($data['payment_month_start_1'], $data['payment_day_start_1'], '2000')) {
                        $validator->errors()->add('payment_day_start_1', '2枚目_9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_1']) && !empty($data['payment_day_start_1_1'])) {
                if (ctype_digit($data['payment_month_start_1_1'])) {
                    if (!checkdate($data['payment_month_start_1_1'], $data['payment_day_start_1_1'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_1', '2枚目_9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_2']) && !empty($data['payment_day_start_1_2'])) {
                if (ctype_digit($data['payment_month_start_1_2'])) {
                    if (!checkdate($data['payment_month_start_1_2'], $data['payment_day_start_1_2'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_2', '2枚目_9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_3']) && !empty($data['payment_day_start_1_3'])) {
                if (ctype_digit($data['payment_month_start_1_3'])) {
                    if (!checkdate($data['payment_month_start_1_3'], $data['payment_day_start_1_3'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_3', '2枚目_9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_4']) && !empty($data['payment_day_start_1_4'])) {
                if (ctype_digit($data['payment_month_start_1_4'])) {
                    if (!checkdate($data['payment_month_start_1_4'], $data['payment_day_start_1_4'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_4', '2枚目_9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_5']) && !empty($data['payment_day_start_1_5'])) {
                if (ctype_digit($data['payment_month_start_1_5'])) {
                    if (!checkdate($data['payment_month_start_1_5'], $data['payment_day_start_1_5'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_5', '2枚目_9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_6']) && !empty($data['payment_day_start_1_6'])) {
                if (ctype_digit($data['payment_month_start_1_6'])) {
                    if (!checkdate($data['payment_month_start_1_6'], $data['payment_day_start_1_6'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_6', '2枚目_9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_7']) && !empty($data['payment_day_start_1_7'])) {
                if (ctype_digit($data['payment_month_start_1_7'])) {
                    if (!checkdate($data['payment_month_start_1_7'], $data['payment_day_start_1_7'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_7', '2枚目_9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_8']) && !empty($data['payment_day_start_1_8'])) {
                if (ctype_digit($data['payment_month_start_1_8'])) {
                    if (!checkdate($data['payment_month_start_1_8'], $data['payment_day_start_1_8'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_8', '2枚目_9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_9']) && !empty($data['payment_day_start_1_9'])) {
                if (ctype_digit($data['payment_month_start_1_9'])) {
                    if (!checkdate($data['payment_month_start_1_9'], $data['payment_day_start_1_9'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_9', '2枚目_9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_10']) && !empty($data['payment_day_start_1_10'])) {
                if (ctype_digit($data['payment_month_start_1_10'])) {
                    if (!checkdate($data['payment_month_start_1_10'], $data['payment_day_start_1_10'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_10', '2枚目_9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_11']) && !empty($data['payment_day_start_1_11'])) {
                if (ctype_digit($data['payment_month_start_1_11'])) {
                    if (!checkdate($data['payment_month_start_1_11'], $data['payment_day_start_1_11'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_11', '2枚目_9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_12']) && !empty($data['payment_day_start_1_12'])) {
                if (ctype_digit($data['payment_month_start_1_12'])) {
                    if (!checkdate($data['payment_month_start_1_12'], $data['payment_day_start_1_12'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_12', '2枚目_9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_13']) && !empty($data['payment_day_start_1_13'])) {
                if (ctype_digit($data['payment_month_start_1_13'])) {
                    if (!checkdate($data['payment_month_start_1_13'], $data['payment_day_start_1_13'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_13', '2枚目_9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_14']) && !empty($data['payment_day_start_1_14'])) {
                if (ctype_digit($data['payment_month_start_1_14'])) {
                    if (!checkdate($data['payment_month_start_1_14'], $data['payment_day_start_1_14'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_14', '2枚目_9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_1_15']) && !empty($data['payment_day_start_1_15'])) {
                if (ctype_digit($data['payment_month_start_1_15'])) {
                    if (!checkdate($data['payment_month_start_1_15'], $data['payment_day_start_1_15'], '2000')) {
                        $validator->errors()->add('payment_day_start_1_15', '2枚目_9_賃金支払対象期間_開始日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_1']) && !empty($data['payment_day_end_1_1'])) {
                if (ctype_digit($data['payment_month_end_1_1'])) {
                    if (!checkdate($data['payment_month_end_1_1'], $data['payment_day_end_1_1'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_1', '2枚目_9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_2']) && !empty($data['payment_day_end_1_2'])) {
                if (ctype_digit($data['payment_month_end_1_2'])) {
                    if (!checkdate($data['payment_month_end_1_2'], $data['payment_day_end_1_2'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_2', '2枚目_9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_3']) && !empty($data['payment_day_end_1_3'])) {
                if (ctype_digit($data['payment_month_end_1_3'])) {
                    if (!checkdate($data['payment_month_end_1_3'], $data['payment_day_end_1_3'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_3', '2枚目_9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_4']) && !empty($data['payment_day_end_1_4'])) {
                if (ctype_digit($data['payment_month_end_1_4'])) {
                    if (!checkdate($data['payment_month_end_1_4'], $data['payment_day_end_1_4'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_4', '2枚目_9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_5']) && !empty($data['payment_day_end_1_5'])) {
                if (ctype_digit($data['payment_month_end_1_5'])) {
                    if (!checkdate($data['payment_month_end_1_5'], $data['payment_day_end_1_5'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_5', '2枚目_9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_6']) && !empty($data['payment_day_end_1_6'])) {
                if (ctype_digit($data['payment_month_end_1_6'])) {
                    if (!checkdate($data['payment_month_end_1_6'], $data['payment_day_end_1_6'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_6', '2枚目_9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_7']) && !empty($data['payment_day_end_1_7'])) {
                if (ctype_digit($data['payment_month_end_1_7'])) {
                    if (!checkdate($data['payment_month_end_1_7'], $data['payment_day_end_1_7'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_7', '2枚目_9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_8']) && !empty($data['payment_day_end_1_8'])) {
                if (ctype_digit($data['payment_month_end_1_8'])) {
                    if (!checkdate($data['payment_month_end_1_8'], $data['payment_day_end_1_8'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_8', '2枚目_9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_9']) && !empty($data['payment_day_end_1_9'])) {
                if (ctype_digit($data['payment_month_end_1_9'])) {
                    if (!checkdate($data['payment_month_end_1_9'], $data['payment_day_end_1_9'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_9', '2枚目_9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_10']) && !empty($data['payment_day_end_1_10'])) {
                if (ctype_digit($data['payment_month_end_1_10'])) {
                    if (!checkdate($data['payment_month_end_1_10'], $data['payment_day_end_1_10'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_10', '2枚目_9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_11']) && !empty($data['payment_day_end_1_11'])) {
                if (ctype_digit($data['payment_month_end_1_11'])) {
                    if (!checkdate($data['payment_month_end_1_11'], $data['payment_day_end_1_11'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_11', '2枚目_9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_12']) && !empty($data['payment_day_end_1_12'])) {
                if (ctype_digit($data['payment_month_end_1_12'])) {
                    if (!checkdate($data['payment_month_end_1_12'], $data['payment_day_end_1_12'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_12', '2枚目_9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_13']) && !empty($data['payment_day_end_1_13'])) {
                if (ctype_digit($data['payment_month_end_1_13'])) {
                    if (!checkdate($data['payment_month_end_1_13'], $data['payment_day_end_1_13'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_13', '2枚目_9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_14']) && !empty($data['payment_day_end_1_14'])) {
                if (ctype_digit($data['payment_month_end_1_14'])) {
                    if (!checkdate($data['payment_month_end_1_14'], $data['payment_day_end_1_14'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_14', '2枚目_9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_1_15']) && !empty($data['payment_day_end_1_15'])) {
                if (ctype_digit($data['payment_month_end_1_15'])) {
                    if (!checkdate($data['payment_month_end_1_15'], $data['payment_day_end_1_15'], '2000')) {
                        $validator->errors()->add('payment_day_end_1_15', '2枚目_9_賃金支払対象期間_終了日付_16行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_1']) && !empty($data['calculation_day_start_2_1'])) {
                if (ctype_digit($data['calculation_month_start_2_1'])) {
                    if (!checkdate($data['calculation_month_start_2_1'], $data['calculation_day_start_2_1'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_1', '2枚目_続紙_7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_2']) && !empty($data['calculation_day_start_2_2'])) {
                if (ctype_digit($data['calculation_month_start_2_2'])) {
                    if (!checkdate($data['calculation_month_start_2_2'], $data['calculation_day_start_2_2'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_2', '2枚目_続紙_7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_3']) && !empty($data['calculation_day_start_2_3'])) {
                if (ctype_digit($data['calculation_month_start_2_3'])) {
                    if (!checkdate($data['calculation_month_start_2_3'], $data['calculation_day_start_2_3'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_3', '2枚目_続紙_7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_4']) && !empty($data['calculation_day_start_2_4'])) {
                if (ctype_digit($data['calculation_month_start_2_4'])) {
                    if (!checkdate($data['calculation_month_start_2_4'], $data['calculation_day_start_2_4'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_4', '2枚目_続紙_7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_5']) && !empty($data['calculation_day_start_2_5'])) {
                if (ctype_digit($data['calculation_month_start_2_5'])) {
                    if (!checkdate($data['calculation_month_start_2_5'], $data['calculation_day_start_2_5'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_5', '2枚目_続紙_7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_6']) && !empty($data['calculation_day_start_2_6'])) {
                if (ctype_digit($data['calculation_month_start_2_6'])) {
                    if (!checkdate($data['calculation_month_start_2_6'], $data['calculation_day_start_2_6'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_6', '2枚目_続紙_7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_7']) && !empty($data['calculation_day_start_2_7'])) {
                if (ctype_digit($data['calculation_month_start_2_7'])) {
                    if (!checkdate($data['calculation_month_start_2_7'], $data['calculation_day_start_2_7'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_7', '2枚目_続紙_7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_8']) && !empty($data['calculation_day_start_2_8'])) {
                if (ctype_digit($data['calculation_month_start_2_8'])) {
                    if (!checkdate($data['calculation_month_start_2_8'], $data['calculation_day_start_2_8'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_8', '2枚目_続紙_7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_9']) && !empty($data['calculation_day_start_2_9'])) {
                if (ctype_digit($data['calculation_month_start_2_9'])) {
                    if (!checkdate($data['calculation_month_start_2_9'], $data['calculation_day_start_2_9'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_9', '2枚目_続紙_7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_10']) && !empty($data['calculation_day_start_2_10'])) {
                if (ctype_digit($data['calculation_month_start_2_10'])) {
                    if (!checkdate($data['calculation_month_start_2_10'], $data['calculation_day_start_2_10'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_10', '2枚目_続紙_7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_11']) && !empty($data['calculation_day_start_2_11'])) {
                if (ctype_digit($data['calculation_month_start_2_11'])) {
                    if (!checkdate($data['calculation_month_start_2_11'], $data['calculation_day_start_2_11'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_11', '2枚目_続紙_7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_12']) && !empty($data['calculation_day_start_2_12'])) {
                if (ctype_digit($data['calculation_month_start_2_12'])) {
                    if (!checkdate($data['calculation_month_start_2_12'], $data['calculation_day_start_2_12'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_12', '2枚目_続紙_7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_13']) && !empty($data['calculation_day_start_2_13'])) {
                if (ctype_digit($data['calculation_month_start_2_13'])) {
                    if (!checkdate($data['calculation_month_start_2_13'], $data['calculation_day_start_2_13'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_13', '2枚目_続紙_7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_14']) && !empty($data['calculation_day_start_2_14'])) {
                if (ctype_digit($data['calculation_month_start_2_14'])) {
                    if (!checkdate($data['calculation_month_start_2_14'], $data['calculation_day_start_2_14'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_14', '2枚目_続紙_7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_start_2_15']) && !empty($data['calculation_day_start_2_15'])) {
                if (ctype_digit($data['calculation_month_start_2_15'])) {
                    if (!checkdate($data['calculation_month_start_2_15'], $data['calculation_day_start_2_15'], '2000')) {
                        $validator->errors()->add('calculation_day_start_2_15', '2枚目_続紙_7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_1']) && !empty($data['calculation_day_end_2_1'])) {
                if (ctype_digit($data['calculation_month_end_2_1'])) {
                    if (!checkdate($data['calculation_month_end_2_1'], $data['calculation_day_end_2_1'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_1', '2枚目_続紙_7_算定対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_2']) && !empty($data['calculation_day_end_2_2'])) {
                if (ctype_digit($data['calculation_month_end_2_2'])) {
                    if (!checkdate($data['calculation_month_end_2_2'], $data['calculation_day_end_2_2'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_2', '2枚目_続紙_7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_3']) && !empty($data['calculation_day_end_2_3'])) {
                if (ctype_digit($data['calculation_month_end_2_3'])) {
                    if (!checkdate($data['calculation_month_end_2_3'], $data['calculation_day_end_2_3'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_3', '2枚目_続紙_7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_4']) && !empty($data['calculation_day_end_2_4'])) {
                if (ctype_digit($data['calculation_month_end_2_4'])) {
                    if (!checkdate($data['calculation_month_end_2_4'], $data['calculation_day_end_2_4'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_4', '2枚目_続紙_7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_5']) && !empty($data['calculation_day_end_2_5'])) {
                if (ctype_digit($data['calculation_month_end_2_5'])) {
                    if (!checkdate($data['calculation_month_end_2_5'], $data['calculation_day_end_2_5'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_5', '2枚目_続紙_7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_6']) && !empty($data['calculation_day_end_2_6'])) {
                if (ctype_digit($data['calculation_month_end_2_6'])) {
                    if (!checkdate($data['calculation_month_end_2_6'], $data['calculation_day_end_2_6'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_6', '2枚目_続紙_7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_7']) && !empty($data['calculation_day_end_2_7'])) {
                if (ctype_digit($data['calculation_month_end_2_7'])) {
                    if (!checkdate($data['calculation_month_end_2_7'], $data['calculation_day_end_2_7'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_7', '2枚目_続紙_7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_8']) && !empty($data['calculation_day_end_2_8'])) {
                if (ctype_digit($data['calculation_month_end_2_8'])) {
                    if (!checkdate($data['calculation_month_end_2_8'], $data['calculation_day_end_2_8'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_8', '2枚目_続紙_7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_9']) && !empty($data['calculation_day_end_2_9'])) {
                if (ctype_digit($data['calculation_month_end_2_9'])) {
                    if (!checkdate($data['calculation_month_end_2_9'], $data['calculation_day_end_2_9'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_9', '2枚目_続紙_7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_10']) && !empty($data['calculation_day_end_2_10'])) {
                if (ctype_digit($data['calculation_month_end_2_10'])) {
                    if (!checkdate($data['calculation_month_end_2_10'], $data['calculation_day_end_2_10'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_10', '2枚目_続紙_7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_11']) && !empty($data['calculation_day_end_2_11'])) {
                if (ctype_digit($data['calculation_month_end_2_11'])) {
                    if (!checkdate($data['calculation_month_end_2_11'], $data['calculation_day_end_2_11'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_11', '2枚目_続紙_7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_12']) && !empty($data['calculation_day_end_2_12'])) {
                if (ctype_digit($data['calculation_month_end_2_12'])) {
                    if (!checkdate($data['calculation_month_end_2_12'], $data['calculation_day_end_2_12'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_12', '2枚目_続紙_7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_13']) && !empty($data['calculation_day_end_2_13'])) {
                if (ctype_digit($data['calculation_month_end_2_13'])) {
                    if (!checkdate($data['calculation_month_end_2_13'], $data['calculation_day_end_2_13'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_13', '2枚目_続紙_7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_14']) && !empty($data['calculation_day_end_2_14'])) {
                if (ctype_digit($data['calculation_month_end_2_14'])) {
                    if (!checkdate($data['calculation_month_end_2_14'], $data['calculation_day_end_2_14'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_14', '2枚目_続紙_7_算定対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['calculation_month_end_2_15']) && !empty($data['calculation_day_end_2_15'])) {
                if (ctype_digit($data['calculation_month_end_2_15'])) {
                    if (!checkdate($data['calculation_month_end_2_15'], $data['calculation_day_end_2_15'], '2000')) {
                        $validator->errors()->add('calculation_day_end_2_15', '2枚目_続紙_7_算定対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_1']) && !empty($data['payment_day_start_2_1'])) {
                if (ctype_digit($data['payment_month_start_2_1'])) {
                    if (!checkdate($data['payment_month_start_2_1'], $data['payment_day_start_2_1'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_1', '2枚目_続紙_9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_2']) && !empty($data['payment_day_start_2_2'])) {
                if (ctype_digit($data['payment_month_start_2_2'])) {
                    if (!checkdate($data['payment_month_start_2_2'], $data['payment_day_start_2_2'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_2', '2枚目_続紙_9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_3']) && !empty($data['payment_day_start_2_3'])) {
                if (ctype_digit($data['payment_month_start_2_3'])) {
                    if (!checkdate($data['payment_month_start_2_3'], $data['payment_day_start_2_3'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_3', '2枚目_続紙_9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_4']) && !empty($data['payment_day_start_2_4'])) {
                if (ctype_digit($data['payment_month_start_2_4'])) {
                    if (!checkdate($data['payment_month_start_2_4'], $data['payment_day_start_2_4'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_4', '2枚目_続紙_9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_5']) && !empty($data['payment_day_start_2_5'])) {
                if (ctype_digit($data['payment_month_start_2_5'])) {
                    if (!checkdate($data['payment_month_start_2_5'], $data['payment_day_start_2_5'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_5', '2枚目_続紙_9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_6']) && !empty($data['payment_day_start_2_6'])) {
                if (ctype_digit($data['payment_month_start_2_6'])) {
                    if (!checkdate($data['payment_month_start_2_6'], $data['payment_day_start_2_6'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_6', '2枚目_続紙_9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_7']) && !empty($data['payment_day_start_2_7'])) {
                if (ctype_digit($data['payment_month_start_2_7'])) {
                    if (!checkdate($data['payment_month_start_2_7'], $data['payment_day_start_2_7'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_7', '2枚目_続紙_9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_8']) && !empty($data['payment_day_start_2_8'])) {
                if (ctype_digit($data['payment_month_start_2_8'])) {
                    if (!checkdate($data['payment_month_start_2_8'], $data['payment_day_start_2_8'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_8', '2枚目_続紙_9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_9']) && !empty($data['payment_day_start_2_9'])) {
                if (ctype_digit($data['payment_month_start_2_9'])) {
                    if (!checkdate($data['payment_month_start_2_9'], $data['payment_day_start_2_9'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_9', '2枚目_続紙_9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_10']) && !empty($data['payment_day_start_2_10'])) {
                if (ctype_digit($data['payment_month_start_2_10'])) {
                    if (!checkdate($data['payment_month_start_2_10'], $data['payment_day_start_2_10'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_10', '2枚目_続紙_9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_11']) && !empty($data['payment_day_start_2_11'])) {
                if (ctype_digit($data['payment_month_start_2_11'])) {
                    if (!checkdate($data['payment_month_start_2_11'], $data['payment_day_start_2_11'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_11', '2枚目_続紙_9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_12']) && !empty($data['payment_month_start_2_12'])) {
                if (ctype_digit($data['payment_month_start_2_12'])) {
                    if (!checkdate($data['payment_month_start_2_12'], $data['payment_month_start_2_12'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_12', '2枚目_続紙_9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_13']) && !empty($data['payment_day_start_2_13'])) {
                if (ctype_digit($data['payment_month_start_2_13'])) {
                    if (!checkdate($data['payment_month_start_2_13'], $data['payment_day_start_2_13'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_13', '2枚目_続紙_9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_14']) && !empty($data['payment_day_start_2_14'])) {
                if (ctype_digit($data['payment_month_start_2_14'])) {
                    if (!checkdate($data['payment_month_start_2_14'], $data['payment_day_start_2_14'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_14', '2枚目_続紙_9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_start_2_15']) && !empty($data['payment_day_start_2_15'])) {
                if (ctype_digit($data['payment_month_start_2_15'])) {
                    if (!checkdate($data['payment_month_start_2_15'], $data['payment_day_start_2_15'], '2000')) {
                        $validator->errors()->add('payment_day_start_2_15', '2枚目_続紙_9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_1']) && !empty($data['payment_day_end_2_1'])) {
                if (ctype_digit($data['payment_month_end_2_1'])) {
                    if (!checkdate($data['payment_month_end_2_1'], $data['payment_day_end_2_1'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_1', '2枚目_続紙_9_賃金支払対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_2']) && !empty($data['payment_day_end_2_2'])) {
                if (ctype_digit($data['payment_month_end_2_2'])) {
                    if (!checkdate($data['payment_month_end_2_2'], $data['payment_day_end_2_2'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_2', '2枚目_続紙_9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_3']) && !empty($data['payment_day_end_2_3'])) {
                if (ctype_digit($data['payment_month_end_2_3'])) {
                    if (!checkdate($data['payment_month_end_2_3'], $data['payment_day_end_2_3'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_3', '2枚目_続紙_9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_4']) && !empty($data['payment_day_end_2_4'])) {
                if (ctype_digit($data['payment_month_end_2_4'])) {
                    if (!checkdate($data['payment_month_end_2_4'], $data['payment_day_end_2_4'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_4', '2枚目_続紙_9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_5']) && !empty($data['payment_day_end_2_5'])) {
                if (ctype_digit($data['payment_month_end_2_5'])) {
                    if (!checkdate($data['payment_month_end_2_5'], $data['payment_day_end_2_5'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_5', '2枚目_続紙_9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_6']) && !empty($data['payment_day_end_2_6'])) {
                if (ctype_digit($data['payment_month_end_2_6'])) {
                    if (!checkdate($data['payment_month_end_2_6'], $data['payment_day_end_2_6'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_6', '2枚目_続紙_9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_7']) && !empty($data['payment_day_end_2_7'])) {
                if (ctype_digit($data['payment_month_end_2_7'])) {
                    if (!checkdate($data['payment_month_end_2_7'], $data['payment_day_end_2_7'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_7', '2枚目_続紙_9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_8']) && !empty($data['payment_day_end_2_8'])) {
                if (ctype_digit($data['payment_month_end_2_8'])) {
                    if (!checkdate($data['payment_month_end_2_8'], $data['payment_day_end_2_8'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_8', '2枚目_続紙_9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_9']) && !empty($data['payment_day_end_2_9'])) {
                if (ctype_digit($data['payment_month_end_2_9'])) {
                    if (!checkdate($data['payment_month_end_2_9'], $data['payment_day_end_2_9'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_9', '2枚目_続紙_9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_10']) && !empty($data['payment_day_end_2_10'])) {
                if (ctype_digit($data['payment_month_end_2_10'])) {
                    if (!checkdate($data['payment_month_end_2_10'], $data['payment_day_end_2_10'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_10', '2枚目_続紙_9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_11']) && !empty($data['payment_day_end_2_11'])) {
                if (ctype_digit($data['payment_month_end_2_11'])) {
                    if (!checkdate($data['payment_month_end_2_11'], $data['payment_day_end_2_11'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_11', '2枚目_続紙_9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_12']) && !empty($data['payment_month_end_2_12'])) {
                if (ctype_digit($data['payment_month_end_2_12'])) {
                    if (!checkdate($data['payment_month_end_2_12'], $data['payment_month_end_2_12'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_12', '2枚目_続紙_9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_13']) && !empty($data['payment_day_end_2_13'])) {
                if (ctype_digit($data['payment_month_end_2_13'])) {
                    if (!checkdate($data['payment_month_end_2_13'], $data['payment_day_end_2_13'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_13', '2枚目_続紙_9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_14']) && !empty($data['payment_day_end_2_14'])) {
                if (ctype_digit($data['payment_month_end_2_14'])) {
                    if (!checkdate($data['payment_month_end_2_14'], $data['payment_day_end_2_14'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_14', '2枚目_続紙_9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($data['payment_month_end_2_15']) && !empty($data['payment_day_end_2_15'])) {
                if (ctype_digit($data['payment_month_end_2_15'])) {
                    if (!checkdate($data['payment_month_end_2_15'], $data['payment_day_end_2_15'], '2000')) {
                        $validator->errors()->add('payment_day_end_2_15', '2枚目_続紙_9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                    }
                }
            }
        });
    }

    public function messages()
    {
        return [
            'leave_start_wage_monthly_certificate.required_without' => '2枚目_最上部チェックボックスで休業開始時賃金月額証明書、所定労働時間短縮開始時賃金証明書のいずれかである必要があります。',
            'employment_period_year.required_with' => '2枚目_14_（休業開始時における）雇用期間_年を入力してください。',
            'employment_period_month.required_with' => '2枚目_14_（休業開始時における）雇用期間_月を入力してください。',
            'employment_period_day.required_with' => '2枚目_14_（休業開始時における）雇用期間_日を入力してください。',
            'calculation_month_start_1.required_with' => '2枚目_7_算定対象期間_開始月_1行目を入力してください。',
            'calculation_month_start_1_1.required_with' => '2枚目_7_算定対象期間_開始月_2行目を入力してください。',
            'calculation_month_start_1_2.required_with' => '2枚目_7_算定対象期間_開始月_3行目を入力してください。',
            'calculation_month_start_1_3.required_with' => '2枚目_7_算定対象期間_開始月_4行目を入力してください。',
            'calculation_month_start_1_4.required_with' => '2枚目_7_算定対象期間_開始月_5行目を入力してください。',
            'calculation_month_start_1_5.required_with' => '2枚目_7_算定対象期間_開始月_6行目を入力してください。',
            'calculation_month_start_1_6.required_with' => '2枚目_7_算定対象期間_開始月_7行目を入力してください。',
            'calculation_month_start_1_7.required_with' => '2枚目_7_算定対象期間_開始月_8行目を入力してください。',
            'calculation_month_start_1_8.required_with' => '2枚目_7_算定対象期間_開始月_9行目を入力してください。',
            'calculation_month_start_1_9.required_with' => '2枚目_7_算定対象期間_開始月_10行目を入力してください。',
            'calculation_month_start_1_10.required_with' => '2枚目_7_算定対象期間_開始月_11行目を入力してください。',
            'calculation_month_start_1_11.required_with' => '2枚目_7_算定対象期間_開始月_12行目を入力してください。',
            'calculation_month_start_1_12.required_with' => '2枚目_7_算定対象期間_開始月_13行目を入力してください。',
            'calculation_month_start_1_13.required_with' => '2枚目_7_算定対象期間_開始月_14行目を入力してください。',
            'calculation_month_start_1_14.required_with' => '2枚目_7_算定対象期間_開始月_15行目を入力してください。',
            'calculation_month_start_1_15.required_with' => '2枚目_7_算定対象期間_開始月_16行目を入力してください。',
            'calculation_day_start_1.required_with' => '2枚目_7_算定対象期間_開始日_1行目を入力してください。',
            'calculation_day_start_1_1.required_with' => '2枚目_7_算定対象期間_開始日_2行目を入力してください。',
            'calculation_day_start_1_2.required_with' => '2枚目_7_算定対象期間_開始日_3行目を入力してください。',
            'calculation_day_start_1_3.required_with' => '2枚目_7_算定対象期間_開始日_4行目を入力してください。',
            'calculation_day_start_1_4.required_with' => '2枚目_7_算定対象期間_開始日_5行目を入力してください。',
            'calculation_day_start_1_5.required_with' => '2枚目_7_算定対象期間_開始日_6行目を入力してください。',
            'calculation_day_start_1_6.required_with' => '2枚目_7_算定対象期間_開始日_7行目を入力してください。',
            'calculation_day_start_1_7.required_with' => '2枚目_7_算定対象期間_開始日_8行目を入力してください。',
            'calculation_day_start_1_8.required_with' => '2枚目_7_算定対象期間_開始日_9行目を入力してください。',
            'calculation_day_start_1_9.required_with' => '2枚目_7_算定対象期間_開始日_10行目を入力してください。',
            'calculation_day_start_1_10.required_with' => '2枚目_7_算定対象期間_開始日_11行目を入力してください。',
            'calculation_day_start_1_11.required_with' => '2枚目_7_算定対象期間_開始日_12行目を入力してください。',
            'calculation_day_start_1_12.required_with' => '2枚目_7_算定対象期間_開始日_13行目を入力してください。',
            'calculation_day_start_1_13.required_with' => '2枚目_7_算定対象期間_開始日_14行目を入力してください。',
            'calculation_day_start_1_14.required_with' => '2枚目_7_算定対象期間_開始日_15行目を入力してください。',
            'calculation_day_start_1_15.required_with' => '2枚目_7_算定対象期間_開始日_16行目を入力してください。',
            'calculation_month_end_1_1.required_with' => '2枚目_7_算定対象期間_終了月_2行目を入力してください。',
            'calculation_month_end_1_2.required_with' => '2枚目_7_算定対象期間_終了月_3行目を入力してください。',
            'calculation_month_end_1_3.required_with' => '2枚目_7_算定対象期間_終了月_4行目を入力してください。',
            'calculation_month_end_1_4.required_with' => '2枚目_7_算定対象期間_終了月_5行目を入力してください。',
            'calculation_month_end_1_5.required_with' => '2枚目_7_算定対象期間_終了月_6行目を入力してください。',
            'calculation_month_end_1_6.required_with' => '2枚目_7_算定対象期間_終了月_7行目を入力してください。',
            'calculation_month_end_1_7.required_with' => '2枚目_7_算定対象期間_終了月_8行目を入力してください。',
            'calculation_month_end_1_8.required_with' => '2枚目_7_算定対象期間_終了月_9行目を入力してください。',
            'calculation_month_end_1_9.required_with' => '2枚目_7_算定対象期間_終了月_10行目を入力してください。',
            'calculation_month_end_1_10.required_with' => '2枚目_7_算定対象期間_終了月_11行目を入力してください。',
            'calculation_month_end_1_11.required_with' => '2枚目_7_算定対象期間_終了月_12行目を入力してください。',
            'calculation_month_end_1_12.required_with' => '2枚目_7_算定対象期間_終了月_13行目を入力してください。',
            'calculation_month_end_1_13.required_with' => '2枚目_7_算定対象期間_終了月_14行目を入力してください。',
            'calculation_month_end_1_14.required_with' => '2枚目_7_算定対象期間_終了月_15行目を入力してください。',
            'calculation_month_end_1_15.required_with' => '2枚目_7_算定対象期間_終了月_16行目を入力してください。',
            'calculation_day_end_1_1.required_with' => '2枚目_7_算定対象期間_終了日_2行目を入力してください。',
            'calculation_day_end_1_2.required_with' => '2枚目_7_算定対象期間_終了日_3行目を入力してください。',
            'calculation_day_end_1_3.required_with' => '2枚目_7_算定対象期間_終了日_4行目を入力してください。',
            'calculation_day_end_1_4.required_with' => '2枚目_7_算定対象期間_終了日_5行目を入力してください。',
            'calculation_day_end_1_5.required_with' => '2枚目_7_算定対象期間_終了日_6行目を入力してください。',
            'calculation_day_end_1_6.required_with' => '2枚目_7_算定対象期間_終了日_7行目を入力してください。',
            'calculation_day_end_1_7.required_with' => '2枚目_7_算定対象期間_終了日_8行目を入力してください。',
            'calculation_day_end_1_8.required_with' => '2枚目_7_算定対象期間_終了日_9行目を入力してください。',
            'calculation_day_end_1_9.required_with' => '2枚目_7_算定対象期間_終了日_10行目を入力してください。',
            'calculation_day_end_1_10.required_with' => '2枚目_7_算定対象期間_終了日_11行目を入力してください。',
            'calculation_day_end_1_11.required_with' => '2枚目_7_算定対象期間_終了日_12行目を入力してください。',
            'calculation_day_end_1_12.required_with' => '2枚目_7_算定対象期間_終了日_13行目を入力してください。',
            'calculation_day_end_1_13.required_with' => '2枚目_7_算定対象期間_終了日_14行目を入力してください。',
            'calculation_day_end_1_14.required_with' => '2枚目_7_算定対象期間_終了日_15行目を入力してください。',
            'calculation_day_end_1_15.required_with' => '2枚目_7_算定対象期間_終了日_16行目を入力してください。',
            'payment_month_start_1.required_with' => '2枚目_9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_month_start_1_1.required_with' => '2枚目_9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_month_start_1_2.required_with' => '2枚目_9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_month_start_1_3.required_with' => '2枚目_9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_month_start_1_4.required_with' => '2枚目_9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_month_start_1_5.required_with' => '2枚目_9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_month_start_1_6.required_with' => '2枚目_9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_month_start_1_7.required_with' => '2枚目_9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_month_start_1_8.required_with' => '2枚目_9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_month_start_1_9.required_with' => '2枚目_9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_month_start_1_10.required_with' => '2枚目_9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_month_start_1_11.required_with' => '2枚目_9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_month_start_1_12.required_with' => '2枚目_9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_month_start_1_13.required_with' => '2枚目_9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_month_start_1_14.required_with' => '2枚目_9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_month_start_1_15.required_with' => '2枚目_9_賃金支払対象期間_開始月_16行目を入力してください。',
            'payment_day_start_1.required_with' => '2枚目_9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_day_start_1_1.required_with' => '2枚目_9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_day_start_1_2.required_with' => '2枚目_9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_day_start_1_3.required_with' => '2枚目_9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_day_start_1_4.required_with' => '2枚目_9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_day_start_1_5.required_with' => '2枚目_9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_day_start_1_6.required_with' => '2枚目_9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_day_start_1_7.required_with' => '2枚目_9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_day_start_1_8.required_with' => '2枚目_9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_day_start_1_9.required_with' => '2枚目_9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_day_start_1_10.required_with' => '2枚目_9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_day_start_1_11.required_with' => '2枚目_9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_day_start_1_12.required_with' => '2枚目_9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_day_start_1_13.required_with' => '2枚目_9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_day_start_1_14.required_with' => '2枚目_9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_day_start_1_15.required_with' => '2枚目_9_賃金支払対象期間_開始日_16行目を入力してください。',
            'payment_month_end_1_1.required_with' => '2枚目_9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_month_end_1_2.required_with' => '2枚目_9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_month_end_1_3.required_with' => '2枚目_9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_month_end_1_4.required_with' => '2枚目_9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_month_end_1_5.required_with' => '2枚目_9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_month_end_1_6.required_with' => '2枚目_9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_month_end_1_7.required_with' => '2枚目_9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_month_end_1_8.required_with' => '2枚目_9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_month_end_1_9.required_with' => '2枚目_9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_month_end_1_10.required_with' => '2枚目_9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_month_end_1_11.required_with' => '2枚目_9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_month_end_1_12.required_with' => '2枚目_9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_month_end_1_13.required_with' => '2枚目_9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_month_end_1_14.required_with' => '2枚目_9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_month_end_1_15.required_with' => '2枚目_9_賃金支払対象期間_終了月_16行目を入力してください。',
            'payment_day_end_1_1.required_with' => '2枚目_9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_day_end_1_2.required_with' => '2枚目_9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_day_end_1_3.required_with' => '2枚目_9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_day_end_1_4.required_with' => '2枚目_9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_day_end_1_5.required_with' => '2枚目_9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_day_end_1_6.required_with' => '2枚目_9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_day_end_1_7.required_with' => '2枚目_9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_day_end_1_8.required_with' => '2枚目_9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_day_end_1_9.required_with' => '2枚目_9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_day_end_1_10.required_with' => '2枚目_9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_day_end_1_11.required_with' => '2枚目_9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_day_end_1_12.required_with' => '2枚目_9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_day_end_1_13.required_with' => '2枚目_9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_day_end_1_14.required_with' => '2枚目_9_賃金支払対象期間_終了日_15行目を入力してください。',
            'payment_day_end_1_15.required_with' => '2枚目_9_賃金支払対象期間_終了日_16行目を入力してください。',
            'calculation_month_start_2_1.required_with' => '2枚目_続紙_7_算定対象期間_開始月_1行目を入力してください。',
            'calculation_month_start_2_2.required_with' => '2枚目_続紙_7_算定対象期間_開始月_2行目を入力してください。',
            'calculation_month_start_2_3.required_with' => '2枚目_続紙_7_算定対象期間_開始月_3行目を入力してください。',
            'calculation_month_start_2_4.required_with' => '2枚目_続紙_7_算定対象期間_開始月_4行目を入力してください。',
            'calculation_month_start_2_5.required_with' => '2枚目_続紙_7_算定対象期間_開始月_5行目を入力してください。',
            'calculation_month_start_2_6.required_with' => '2枚目_続紙_7_算定対象期間_開始月_6行目を入力してください。',
            'calculation_month_start_2_7.required_with' => '2枚目_続紙_7_算定対象期間_開始月_7行目を入力してください。',
            'calculation_month_start_2_8.required_with' => '2枚目_続紙_7_算定対象期間_開始月_8行目を入力してください。',
            'calculation_month_start_2_9.required_with' => '2枚目_続紙_7_算定対象期間_開始月_9行目を入力してください。',
            'calculation_month_start_2_10.required_with' => '2枚目_続紙_7_算定対象期間_開始月_10行目を入力してください。',
            'calculation_month_start_2_11.required_with' => '2枚目_続紙_7_算定対象期間_開始月_11行目を入力してください。',
            'calculation_month_start_2_12.required_with' => '2枚目_続紙_7_算定対象期間_開始月_12行目を入力してください。',
            'calculation_month_start_2_13.required_with' => '2枚目_続紙_7_算定対象期間_開始月_13行目を入力してください。',
            'calculation_month_start_2_14.required_with' => '2枚目_続紙_7_算定対象期間_開始月_14行目を入力してください。',
            'calculation_month_start_2_15.required_with' => '2枚目_続紙_7_算定対象期間_開始月_15行目を入力してください。',
            'calculation_day_start_2_1.required_with' => '2枚目_続紙_7_算定対象期間_開始日_1行目を入力してください。',
            'calculation_day_start_2_2.required_with' => '2枚目_続紙_7_算定対象期間_開始日_2行目を入力してください。',
            'calculation_day_start_2_3.required_with' => '2枚目_続紙_7_算定対象期間_開始日_3行目を入力してください。',
            'calculation_day_start_2_4.required_with' => '2枚目_続紙_7_算定対象期間_開始日_4行目を入力してください。',
            'calculation_day_start_2_5.required_with' => '2枚目_続紙_7_算定対象期間_開始日_5行目を入力してください。',
            'calculation_day_start_2_6.required_with' => '2枚目_続紙_7_算定対象期間_開始日_6行目を入力してください。',
            'calculation_day_start_2_7.required_with' => '2枚目_続紙_7_算定対象期間_開始日_7行目を入力してください。',
            'calculation_day_start_2_8.required_with' => '2枚目_続紙_7_算定対象期間_開始日_8行目を入力してください。',
            'calculation_day_start_2_9.required_with' => '2枚目_続紙_7_算定対象期間_開始日_9行目を入力してください。',
            'calculation_day_start_2_10.required_with' => '2枚目_続紙_7_算定対象期間_開始日_10行目を入力してください。',
            'calculation_day_start_2_11.required_with' => '2枚目_続紙_7_算定対象期間_開始日_11行目を入力してください。',
            'calculation_day_start_2_12.required_with' => '2枚目_続紙_7_算定対象期間_開始日_12行目を入力してください。',
            'calculation_day_start_2_13.required_with' => '2枚目_続紙_7_算定対象期間_開始日_13行目を入力してください。',
            'calculation_day_start_2_14.required_with' => '2枚目_続紙_7_算定対象期間_開始日_14行目を入力してください。',
            'calculation_day_start_2_13.required_with' => '2枚目_続紙_7_算定対象期間_開始日_15行目を入力してください。',
            'calculation_month_end_2_1.required_with' => '2枚目_続紙_7_算定対象期間_終了月_1行目を入力してください。',
            'calculation_month_end_2_2.required_with' => '2枚目_続紙_7_算定対象期間_終了月_2行目を入力してください。',
            'calculation_month_end_2_3.required_with' => '2枚目_続紙_7_算定対象期間_終了月_3行目を入力してください。',
            'calculation_month_end_2_4.required_with' => '2枚目_続紙_7_算定対象期間_終了月_4行目を入力してください。',
            'calculation_month_end_2_5.required_with' => '2枚目_続紙_7_算定対象期間_終了月_5行目を入力してください。',
            'calculation_month_end_2_6.required_with' => '2枚目_続紙_7_算定対象期間_終了月_6行目を入力してください。',
            'calculation_month_end_2_7.required_with' => '2枚目_続紙_7_算定対象期間_終了月_7行目を入力してください。',
            'calculation_month_end_2_8.required_with' => '2枚目_続紙_7_算定対象期間_終了月_8行目を入力してください。',
            'calculation_month_end_2_9.required_with' => '2枚目_続紙_7_算定対象期間_終了月_9行目を入力してください。',
            'calculation_month_end_2_10.required_with' => '2枚目_続紙_7_算定対象期間_終了月_10行目を入力してください。',
            'calculation_month_end_2_11.required_with' => '2枚目_続紙_7_算定対象期間_終了月_11行目を入力してください。',
            'calculation_month_end_2_12.required_with' => '2枚目_続紙_7_算定対象期間_終了月_12行目を入力してください。',
            'calculation_month_end_2_13.required_with' => '2枚目_続紙_7_算定対象期間_終了月_13行目を入力してください。',
            'calculation_month_end_2_14.required_with' => '2枚目_続紙_7_算定対象期間_終了月_14行目を入力してください。',
            'calculation_month_end_2_15.required_with' => '2枚目_続紙_7_算定対象期間_終了月_15行目を入力してください。',
            'calculation_day_end_2_1.required_with' => '2枚目_続紙_7_算定対象期間_終了日_1行目を入力してください。',
            'calculation_day_end_2_2.required_with' => '2枚目_続紙_7_算定対象期間_終了日_2行目を入力してください。',
            'calculation_day_end_2_3.required_with' => '2枚目_続紙_7_算定対象期間_終了日_3行目を入力してください。',
            'calculation_day_end_2_4.required_with' => '2枚目_続紙_7_算定対象期間_終了日_4行目を入力してください。',
            'calculation_day_end_2_5.required_with' => '2枚目_続紙_7_算定対象期間_終了日_5行目を入力してください。',
            'calculation_day_end_2_6.required_with' => '2枚目_続紙_7_算定対象期間_終了日_6行目を入力してください。',
            'calculation_day_end_2_7.required_with' => '2枚目_続紙_7_算定対象期間_終了日_7行目を入力してください。',
            'calculation_day_end_2_8.required_with' => '2枚目_続紙_7_算定対象期間_終了日_8行目を入力してください。',
            'calculation_day_end_2_9.required_with' => '2枚目_続紙_7_算定対象期間_終了日_9行目を入力してください。',
            'calculation_day_end_2_10.required_with' => '2枚目_続紙_7_算定対象期間_終了日_10行目を入力してください。',
            'calculation_day_end_2_11.required_with' => '2枚目_続紙_7_算定対象期間_終了日_11行目を入力してください。',
            'calculation_day_end_2_12.required_with' => '2枚目_続紙_7_算定対象期間_終了日_12行目を入力してください。',
            'calculation_day_end_2_13.required_with' => '2枚目_続紙_7_算定対象期間_終了日_13行目を入力してください。',
            'calculation_day_end_2_14.required_with' => '2枚目_続紙_7_算定対象期間_終了日_14行目を入力してください。',
            'calculation_day_end_2_15.required_with' => '2枚目_続紙_7_算定対象期間_終了日_15行目を入力してください。',
            'payment_month_start_2_1.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_month_start_2_2.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_month_start_2_3.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_month_start_2_4.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_month_start_2_5.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_month_start_2_6.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_month_start_2_7.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_month_start_2_8.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_month_start_2_9.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_month_start_2_10.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_month_start_2_11.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_month_start_2_12.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_month_start_2_13.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_month_start_2_14.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_month_start_2_15.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_day_start_2_1.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_day_start_2_2.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_day_start_2_3.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_day_start_2_4.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_day_start_2_5.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_day_start_2_6.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_day_start_2_7.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_day_start_2_8.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_day_start_2_9.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_day_start_2_10.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_day_start_2_11.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_day_start_2_12.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_day_start_2_13.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_day_start_2_14.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_day_start_2_15.required_with' => '2枚目_続紙_9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_month_end_2_1.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_1行目を入力してください。',
            'payment_month_end_2_2.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_month_end_2_3.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_month_end_2_4.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_month_end_2_5.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_month_end_2_6.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_month_end_2_7.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_month_end_2_8.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_month_end_2_9.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_month_end_2_10.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_month_end_2_11.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_month_end_2_12.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_month_end_2_13.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_month_end_2_14.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_month_end_2_15.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_day_end_2_1.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_1行目を入力してください。',
            'payment_day_end_2_2.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_day_end_2_3.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_day_end_2_4.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_day_end_2_5.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_day_end_2_6.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_day_end_2_7.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_day_end_2_8.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_day_end_2_9.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_day_end_2_10.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_day_end_2_11.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_day_end_2_12.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_day_end_2_13.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_day_end_2_14.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_day_end_2_15.required_with' => '2枚目_続紙_9_賃金支払対象期間_終了日_15行目を入力してください。',
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
            'post_code_3' => '2枚目_6_休業等を開始した者の郵便番号3桁',
            'post_code_4' => '2枚目_6_休業等を開始した者の郵便番号4桁',
            'employment_tel_area_code' => '2枚目_6_休業等を開始した者の電話番号_市外局番',
            'employment_tel_city_code' => '2枚目_6_休業等を開始した者の電話番号_市内局番',
            'employment_tel_subscriber_code' => '2枚目_6_休業等を開始した者の電話番号_加入者番号',
            'entrepreneur_address' => '2枚目_事業主住所',
            'entrepreneur_name' => '2枚目_事業主氏名',
            'calculation_month_start_1' => '2枚目_7_算定対象期間_開始月_1行目',
            'calculation_day_start_1' => '2枚目_7_算定対象期間_開始日_1行目',
            'calculation_month_start_1_1' => '2枚目_7_算定対象期間_開始月_2行目',
            'calculation_day_start_1_1' => '2枚目_7_算定対象期間_開始日_2行目',
            'calculation_month_end_1_1' => '2枚目_7_算定対象期間_終了月_2行目',
            'calculation_day_end_1_1' => '2枚目_7_算定対象期間_終了月_2行目',
            'calculation_month_start_1_2' => '2枚目_7_算定対象期間_開始月_3行目',
            'calculation_day_start_1_2' => '2枚目_7_算定対象期間_開始日_3行目',
            'calculation_month_end_1_2' => '2枚目_7_算定対象期間_終了月_3行目',
            'calculation_day_end_1_2' => '2枚目_7_算定対象期間_終了月_3行目',
            'calculation_month_start_1_3' => '2枚目_7_算定対象期間_開始月_4行目',
            'calculation_day_start_1_3' => '2枚目_7_算定対象期間_開始日_4行目',
            'calculation_month_end_1_3' => '2枚目_7_算定対象期間_終了月_4行目',
            'calculation_day_end_1_3' => '2枚目_7_算定対象期間_終了月_4行目',
            'calculation_month_start_1_4' => '2枚目_7_算定対象期間_開始月_5行目',
            'calculation_day_start_1_4' => '2枚目_7_算定対象期間_開始日_5行目',
            'calculation_month_end_1_4' => '2枚目_7_算定対象期間_終了月_5行目',
            'calculation_day_end_1_4' => '2枚目_7_算定対象期間_終了月_5行目',
            'calculation_month_start_1_5' => '2枚目_7_算定対象期間_開始月_6行目',
            'calculation_day_start_1_5' => '2枚目_7_算定対象期間_開始日_6行目',
            'calculation_month_end_1_5' => '2枚目_7_算定対象期間_終了月_6行目',
            'calculation_day_end_1_5' => '2枚目_7_算定対象期間_終了月_6行目',
            'calculation_month_start_1_6' => '2枚目_7_算定対象期間_開始月_7行目',
            'calculation_day_start_1_6' => '2枚目_7_算定対象期間_開始日_7行目',
            'calculation_month_end_1_6' => '2枚目_7_算定対象期間_終了月_7行目',
            'calculation_day_end_1_6' => '2枚目_7_算定対象期間_終了月_7行目',
            'calculation_month_start_1_7' => '2枚目_7_算定対象期間_開始月_8行目',
            'calculation_day_start_1_7' => '2枚目_7_算定対象期間_開始日_8行目',
            'calculation_month_end_1_7' => '2枚目_7_算定対象期間_終了月_8行目',
            'calculation_day_end_1_7' => '2枚目_7_算定対象期間_終了月_8行目',
            'calculation_month_start_1_8' => '2枚目_7_算定対象期間_開始月_9行目',
            'calculation_day_start_1_8' => '2枚目_7_算定対象期間_開始日_9行目',
            'calculation_month_end_1_8' => '2枚目_7_算定対象期間_終了月_9行目',
            'calculation_day_end_1_8' => '2枚目_7_算定対象期間_終了月_9行目',
            'calculation_month_start_1_9' => '2枚目_7_算定対象期間_開始月_10行目',
            'calculation_day_start_1_9' => '2枚目_7_算定対象期間_開始日_10行目',
            'calculation_month_end_1_9' => '2枚目_7_算定対象期間_終了月_10行目',
            'calculation_day_end_1_9' => '2枚目_7_算定対象期間_終了月_10行目',
            'calculation_month_start_1_10' => '2枚目_7_算定対象期間_開始月_11行目',
            'calculation_day_start_1_10' => '2枚目_7_算定対象期間_開始日_11行目',
            'calculation_month_end_1_10' => '2枚目_7_算定対象期間_終了月_11行目',
            'calculation_day_end_1_10' => '2枚目_7_算定対象期間_終了月_11行目',
            'calculation_month_start_1_11' => '2枚目_7_算定対象期間_開始月_12行目',
            'calculation_day_start_1_11' => '2枚目_7_算定対象期間_開始日_12行目',
            'calculation_month_end_1_11' => '2枚目_7_算定対象期間_終了月_12行目',
            'calculation_day_end_1_11' => '2枚目_7_算定対象期間_終了月_12行目',
            'calculation_month_start_1_12' => '2枚目_7_算定対象期間_開始月_13行目',
            'calculation_day_start_1_12' => '2枚目_7_算定対象期間_開始日_13行目',
            'calculation_month_end_1_12' => '2枚目_7_算定対象期間_終了月_13行目',
            'calculation_day_end_1_12' => '2枚目_7_算定対象期間_終了月_13行目',
            'calculation_month_start_1_13' => '2枚目_7_算定対象期間_開始月_14行目',
            'calculation_day_start_1_13' => '2枚目_7_算定対象期間_開始日_14行目',
            'calculation_month_end_1_13' => '2枚目_7_算定対象期間_終了月_14行目',
            'calculation_day_end_1_13' => '2枚目_7_算定対象期間_終了月_14行目',
            'calculation_month_start_1_14' => '2枚目_7_算定対象期間_開始月_15行目',
            'calculation_day_start_1_14' => '2枚目_7_算定対象期間_開始日_15行目',
            'calculation_month_end_1_14' => '2枚目_7_算定対象期間_終了月_15行目',
            'calculation_day_end_1_14' => '2枚目_7_算定対象期間_終了月_15行目',
            'calculation_month_start_1_15' => '2枚目_7_算定対象期間_開始月_16行目',
            'calculation_day_start_1_15' => '2枚目_7_算定対象期間_開始日_16行目',
            'calculation_month_end_1_15' => '2枚目_7_算定対象期間_終了月_16行目',
            'calculation_day_end_1_15' => '2枚目_7_算定対象期間_終了月_16行目',
            'calculation_basic_period_1' => '2枚目_8_賃金支払基礎日数_1行目',
            'calculation_basic_period_1_1' => '2枚目_8_賃金支払基礎日数_2行目',
            'calculation_basic_period_1_2' => '2枚目_8_賃金支払基礎日数_3行目',
            'calculation_basic_period_1_3' => '2枚目_8_賃金支払基礎日数_4行目',
            'calculation_basic_period_1_4' => '2枚目_8_賃金支払基礎日数_5行目',
            'calculation_basic_period_1_5' => '2枚目_8_賃金支払基礎日数_6行目',
            'calculation_basic_period_1_6' => '2枚目_8_賃金支払基礎日数_7行目',
            'calculation_basic_period_1_7' => '2枚目_8_賃金支払基礎日数_8行目',
            'calculation_basic_period_1_8' => '2枚目_8_賃金支払基礎日数_9行目',
            'calculation_basic_period_1_9' => '2枚目_8_賃金支払基礎日数_10行目',
            'calculation_basic_period_1_10' => '2枚目_8_賃金支払基礎日数_11行目',
            'calculation_basic_period_1_11' => '2枚目_8_賃金支払基礎日数_12行目',
            'calculation_basic_period_1_12' => '2枚目_8_賃金支払基礎日数_13行目',
            'calculation_basic_period_1_13' => '2枚目_8_賃金支払基礎日数_14行目',
            'calculation_basic_period_1_14' => '2枚目_8_賃金支払基礎日数_15行目',
            'calculation_basic_period_1_15' => '2枚目_8_賃金支払基礎日数_16行目',
            'payment_month_start_1' => '2枚目_9_賃金支払対象期間_開始月_1行目',
            'payment_day_start_1' => '2枚目_9_賃金支払対象期間_開始日_1行目',
            'payment_month_start_1_1' => '2枚目_9_賃金支払対象期間_開始月_2行目',
            'payment_day_start_1_1' => '2枚目_9_賃金支払対象期間_開始日_2行目',
            'payment_month_end_1_1' => '2枚目_9_賃金支払対象期間_終了月_2行目',
            'payment_day_end_1_1' => '2枚目_9_賃金支払対象期間_終了日_2行目',
            'payment_month_start_1_2' => '2枚目_9_賃金支払対象期間_開始月_3行目',
            'payment_day_start_1_2' => '2枚目_9_賃金支払対象期間_開始日_3行目',
            'payment_month_end_1_2' => '2枚目_9_賃金支払対象期間_終了月_3行目',
            'payment_day_end_1_2' => '2枚目_9_賃金支払対象期間_終了日_3行目',
            'payment_month_start_1_3' => '2枚目_9_賃金支払対象期間_開始月_4行目',
            'payment_day_start_1_3' => '2枚目_9_賃金支払対象期間_開始日_4行目',
            'payment_month_end_1_3' => '2枚目_9_賃金支払対象期間_終了月_4行目',
            'payment_day_end_1_3' => '2枚目_9_賃金支払対象期間_終了日_4行目',
            'payment_month_start_1_4' => '2枚目_9_賃金支払対象期間_開始月_5行目',
            'payment_day_start_1_4' => '2枚目_9_賃金支払対象期間_開始日_5行目',
            'payment_month_end_1_4' => '2枚目_9_賃金支払対象期間_終了月_5行目',
            'payment_day_end_1_4' => '2枚目_9_賃金支払対象期間_終了日_5行目',
            'payment_month_start_1_5' => '2枚目_9_賃金支払対象期間_開始月_6行目',
            'payment_day_start_1_5' => '2枚目_9_賃金支払対象期間_開始日_6行目',
            'payment_month_end_1_5' => '2枚目_9_賃金支払対象期間_終了月_6行目',
            'payment_day_end_1_5' => '2枚目_9_賃金支払対象期間_終了日_6行目',
            'payment_month_start_1_6' => '2枚目_9_賃金支払対象期間_開始月_7行目',
            'payment_day_start_1_6' => '2枚目_9_賃金支払対象期間_開始日_7行目',
            'payment_month_end_1_6' => '2枚目_9_賃金支払対象期間_終了月_7行目',
            'payment_day_end_1_6' => '2枚目_9_賃金支払対象期間_終了日_7行目',
            'payment_month_start_1_7' => '2枚目_9_賃金支払対象期間_開始月_8行目',
            'payment_day_start_1_7' => '2枚目_9_賃金支払対象期間_開始日_8行目',
            'payment_month_end_1_7' => '2枚目_9_賃金支払対象期間_終了月_8行目',
            'payment_day_end_1_7' => '2枚目_9_賃金支払対象期間_終了日_8行目',
            'payment_month_start_1_8' => '2枚目_9_賃金支払対象期間_開始月_9行目',
            'payment_day_start_1_8' => '2枚目_9_賃金支払対象期間_開始日_9行目',
            'payment_month_end_1_8' => '2枚目_9_賃金支払対象期間_終了月_9行目',
            'payment_day_end_1_8' => '2枚目_9_賃金支払対象期間_終了日_9行目',
            'payment_month_start_1_9' => '2枚目_9_賃金支払対象期間_開始月_10行目',
            'payment_day_start_1_9' => '2枚目_9_賃金支払対象期間_開始日_10行目',
            'payment_month_end_1_9' => '2枚目_9_賃金支払対象期間_終了月_10行目',
            'payment_day_end_1_9' => '2枚目_9_賃金支払対象期間_終了日_10行目',
            'payment_month_start_1_10' => '2枚目_9_賃金支払対象期間_開始月_11行目',
            'payment_day_start_1_10' => '2枚目_9_賃金支払対象期間_開始日_11行目',
            'payment_month_end_1_10' => '2枚目_9_賃金支払対象期間_終了月_11行目',
            'payment_day_end_1_10' => '2枚目_9_賃金支払対象期間_終了日_11行目',
            'payment_month_start_1_11' => '2枚目_9_賃金支払対象期間_開始月_12行目',
            'payment_day_start_1_11' => '2枚目_9_賃金支払対象期間_開始日_12行目',
            'payment_month_end_1_11' => '2枚目_9_賃金支払対象期間_終了月_12行目',
            'payment_day_end_1_11' => '2枚目_9_賃金支払対象期間_終了日_12行目',
            'payment_month_start_1_12' => '2枚目_9_賃金支払対象期間_開始月_13行目',
            'payment_day_start_1_12' => '2枚目_9_賃金支払対象期間_開始日_13行目',
            'payment_month_end_1_12' => '2枚目_9_賃金支払対象期間_終了月_13行目',
            'payment_day_end_1_12' => '2枚目_9_賃金支払対象期間_終了日_13行目',
            'payment_month_start_1_13' => '2枚目_9_賃金支払対象期間_開始月_14行目',
            'payment_day_start_1_13' => '2枚目_9_賃金支払対象期間_開始日_14行目',
            'payment_month_end_1_13' => '2枚目_9_賃金支払対象期間_終了月_14行目',
            'payment_day_end_1_13' => '2枚目_9_賃金支払対象期間_終了日_14行目',
            'payment_month_start_1_14' => '2枚目_9_賃金支払対象期間_開始月_15行目',
            'payment_day_start_1_14' => '2枚目_9_賃金支払対象期間_開始日_15行目',
            'payment_month_end_1_14' => '2枚目_9_賃金支払対象期間_終了月_15行目',
            'payment_day_end_1_14' => '2枚目_9_賃金支払対象期間_終了日_15行目',
            'payment_month_start_1_15' => '2枚目_9_賃金支払対象期間_開始月_16行目',
            'payment_day_start_1_15' => '2枚目_9_賃金支払対象期間_開始日_16行目',
            'payment_month_end_1_15' => '2枚目_9_賃金支払対象期間_終了月_16行目',
            'payment_day_end_1_15' => '2枚目_9_賃金支払対象期間_終了日_16行目',
            'payment_basic_period_1' => '2枚目_10_基礎日数_1行目',
            'payment_basic_period_1_1' => '2枚目_10_基礎日数_2行目',
            'payment_basic_period_1_2' => '2枚目_10_基礎日数_3行目',
            'payment_basic_period_1_3' => '2枚目_10_基礎日数_4行目',
            'payment_basic_period_1_4' => '2枚目_10_基礎日数_5行目',
            'payment_basic_period_1_5' => '2枚目_10_基礎日数_6行目',
            'payment_basic_period_1_6' => '2枚目_10_基礎日数_7行目',
            'payment_basic_period_1_7' => '2枚目_10_基礎日数_8行目',
            'payment_basic_period_1_8' => '2枚目_10_基礎日数_9行目',
            'payment_basic_period_1_9' => '2枚目_10_基礎日数_10行目',
            'payment_basic_period_1_10' => '2枚目_10_基礎日数_11行目',
            'payment_basic_period_1_11' => '2枚目_10_基礎日数_12行目',
            'payment_basic_period_1_12' => '2枚目_10_基礎日数_13行目',
            'payment_basic_period_1_13' => '2枚目_10_基礎日数_14行目',
            'payment_basic_period_1_14' => '2枚目_10_基礎日数_15行目',
            'payment_basic_period_1_15' => '2枚目_10_基礎日数_16行目',
            'wage_amountA' => '2枚目_11_賃金額_A_1行目',
            'wage_amountA_1_1' => '2枚目_11_賃金額_A_2行目',
            'wage_amountA_1_2' => '2枚目_11_賃金額_A_3行目',
            'wage_amountA_1_3' => '2枚目_11_賃金額_A_4行目',
            'wage_amountA_1_4' => '2枚目_11_賃金額_A_5行目',
            'wage_amountA_1_5' => '2枚目_11_賃金額_A_6行目',
            'wage_amountA_1_6' => '2枚目_11_賃金額_A_7行目',
            'wage_amountA_1_7' => '2枚目_11_賃金額_A_8行目',
            'wage_amountA_1_8' => '2枚目_11_賃金額_A_9行目',
            'wage_amountA_1_9' => '2枚目_11_賃金額_A_10行目',
            'wage_amountA_1_10' => '2枚目_11_賃金額_A_11行目',
            'wage_amountA_1_11' => '2枚目_11_賃金額_A_12行目',
            'wage_amountA_1_12' => '2枚目_11_賃金額_A_13行目',
            'wage_amountA_1_13' => '2枚目_11_賃金額_A_14行目',
            'wage_amountA_1_14' => '2枚目_11_賃金額_A_15行目',
            'wage_amountA_1_15' => '2枚目_11_賃金額_A_16行目',
            'wage_amountB' => '2枚目_11_賃金額_B_1行目',
            'wage_amountB_1_1' => '2枚目_11_賃金額_B_2行目',
            'wage_amountB_1_2' => '2枚目_11_賃金額_B_3行目',
            'wage_amountB_1_3' => '2枚目_11_賃金額_B_4行目',
            'wage_amountB_1_4' => '2枚目_11_賃金額_B_5行目',
            'wage_amountB_1_5' => '2枚目_11_賃金額_B_6行目',
            'wage_amountB_1_6' => '2枚目_11_賃金額_B_7行目',
            'wage_amountB_1_7' => '2枚目_11_賃金額_B_8行目',
            'wage_amountB_1_8' => '2枚目_11_賃金額_B_9行目',
            'wage_amountB_1_9' => '2枚目_11_賃金額_B_10行目',
            'wage_amountB_1_10' => '2枚目_11_賃金額_B_11行目',
            'wage_amountB_1_11' => '2枚目_11_賃金額_B_12行目',
            'wage_amountB_1_12' => '2枚目_11_賃金額_B_13行目',
            'wage_amountB_1_13' => '2枚目_11_賃金額_B_14行目',
            'wage_amountB_1_14' => '2枚目_11_賃金額_B_15行目',
            'wage_amountB_1_15' => '2枚目_11_賃金額_B_16行目',
            'wage_amount_total_1' => '2枚目_11_賃金額計_1行目',
            'wage_amount_total_1_1' => '2枚目_11_賃金額計_2行目',
            'wage_amount_total_1_2' => '2枚目_11_賃金額計_3行目',
            'wage_amount_total_1_3' => '2枚目_11_賃金額計_4行目',
            'wage_amount_total_1_4' => '2枚目_11_賃金額計_5行目',
            'wage_amount_total_1_5' => '2枚目_11_賃金額計_6行目',
            'wage_amount_total_1_6' => '2枚目_11_賃金額計_7行目',
            'wage_amount_total_1_7' => '2枚目_11_賃金額計_8行目',
            'wage_amount_total_1_8' => '2枚目_11_賃金額計_9行目',
            'wage_amount_total_1_9' => '2枚目_11_賃金額計_10行目',
            'wage_amount_total_1_10' => '2枚目_11_賃金額計_11行目',
            'wage_amount_total_1_11' => '2枚目_11_賃金額計_12行目',
            'wage_amount_total_1_12' => '2枚目_11_賃金額計_13行目',
            'wage_amount_total_1_13' => '2枚目_11_賃金額計_14行目',
            'wage_amount_total_1_14' => '2枚目_11_賃金額計_15行目',
            'wage_amount_total_1_15' => '2枚目_11_賃金額計_16行目',
            'note_1' => '2枚目_12_備考_1行目',
            'note_1_1' => '2枚目_12_備考_2行目',
            'note_1_2' => '2枚目_12_備考_3行目',
            'note_1_3' => '2枚目_12_備考_4行目',
            'note_1_4' => '2枚目_12_備考_5行目',
            'note_1_5' => '2枚目_12_備考_6行目',
            'note_1_6' => '2枚目_12_備考_7行目',
            'note_1_7' => '2枚目_12_備考_8行目',
            'note_1_8' => '2枚目_12_備考_9行目',
            'note_1_9' => '2枚目_12_備考_10行目',
            'note_1_10' => '2枚目_12_備考_11行目',
            'note_1_11' => '2枚目_12_備考_12行目',
            'note_1_12' => '2枚目_12_備考_13行目',
            'note_1_13' => '2枚目_12_備考_14行目',
            'note_1_14' => '2枚目_12_備考_15行目',
            'note_1_15' => '2枚目_12_備考_16行目',
            'wage_note_1' => '2枚目_13_賃金に関する特記事項',
            'employment_period_regulation' => '2枚目_14_（休業開始時における）雇用期間_定め',
            'employment_period_japan_era' => '2枚目_14_（休業開始時における）雇用期間_年号',
            'employment_period_year' => '2枚目_14_（休業開始時における）雇用期間_年',
            'employment_period_month' => '2枚目_14_（休業開始時における）雇用期間_月',
            'employment_period_day' => '2枚目_14_（休業開始時における）雇用期間_日',
            'including_leave_start_date_year' => '2枚目_14_（休業開始時における）雇用期間_休業開始日を含めて_年',
            'including_leave_start_date_month' => '2枚目_14_（休業開始時における）雇用期間_休業開始日を含めて_ヵ月',
            'labor_consultant_note' => '2枚目_社会保険労務士記載欄_付記欄',
            'creation_date_japan_era' => '2枚目_社会保険労務士記載欄_作成年月日_年号',
            'creation_date_year' => '2枚目_社会保険労務士記載欄_作成年月日_年',
            'creation_date_month' => '2枚目_社会保険労務士記載欄_作成年月日_月',
            'creation_date_day' => '2枚目_社会保険労務士記載欄_作成年月日_日',
            'submission_agent' => '2枚目_社会保険労務士記載欄_提出代行者･事務代理者の表示',
            'labor_consultant_fullname_2' => '2枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_area_code' => '2枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '2枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '2枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'calculation_month_start_2_1' => '2枚目_続紙_7_算定対象期間_開始月_1行目',
            'calculation_day_start_2_1' => '2枚目_続紙_7_算定対象期間_開始日_1行目',
            'calculation_month_end_2_1' => '2枚目_続紙_7_算定対象期間_終了月_1行目',
            'calculation_day_end_2_1' => '2枚目_続紙_7_算定対象期間_終了日_1行目',
            'calculation_month_start_2_2' => '2枚目_続紙_7_算定対象期間_開始月_2行目',
            'calculation_day_start_2_2' => '2枚目_続紙_7_算定対象期間_開始日_2行目',
            'calculation_month_end_2_2' => '2枚目_続紙_7_算定対象期間_終了月_2行目',
            'calculation_day_end_2_2' => '2枚目_続紙_7_算定対象期間_終了日_2行目',
            'calculation_month_start_2_3' => '2枚目_続紙_7_算定対象期間_開始月_3行目',
            'calculation_day_start_2_3' => '2枚目_続紙_7_算定対象期間_開始日_3行目',
            'calculation_month_end_2_3' => '2枚目_続紙_7_算定対象期間_終了月_3行目',
            'calculation_day_end_2_3' => '2枚目_続紙_7_算定対象期間_終了日_3行目',
            'calculation_month_start_2_4' => '2枚目_続紙_7_算定対象期間_開始月_4行目',
            'calculation_day_start_2_4' => '2枚目_続紙_7_算定対象期間_開始日_4行目',
            'calculation_month_end_2_4' => '2枚目_続紙_7_算定対象期間_終了月_4行目',
            'calculation_day_end_2_4' => '2枚目_続紙_7_算定対象期間_終了日_4行目',
            'calculation_month_start_2_5' => '2枚目_続紙_7_算定対象期間_開始月_5行目',
            'calculation_day_start_2_5' => '2枚目_続紙_7_算定対象期間_開始日_5行目',
            'calculation_month_end_2_5' => '2枚目_続紙_7_算定対象期間_終了月_5行目',
            'calculation_day_end_2_5' => '2枚目_続紙_7_算定対象期間_終了日_5行目',
            'calculation_month_start_2_6' => '2枚目_続紙_7_算定対象期間_開始月_6行目',
            'calculation_day_start_2_6' => '2枚目_続紙_7_算定対象期間_開始日_6行目',
            'calculation_month_end_2_6' => '2枚目_続紙_7_算定対象期間_終了月_6行目',
            'calculation_day_end_2_6' => '2枚目_続紙_7_算定対象期間_終了日_6行目',
            'calculation_month_start_2_7' => '2枚目_続紙_7_算定対象期間_開始月_7行目',
            'calculation_day_start_2_7' => '2枚目_続紙_7_算定対象期間_開始日_7行目',
            'calculation_month_end_2_7' => '2枚目_続紙_7_算定対象期間_終了月_7行目',
            'calculation_day_end_2_7' => '2枚目_続紙_7_算定対象期間_終了日_7行目',
            'calculation_month_start_2_8' => '2枚目_続紙_7_算定対象期間_開始月_8行目',
            'calculation_day_start_2_8' => '2枚目_続紙_7_算定対象期間_開始日_8行目',
            'calculation_month_end_2_8' => '2枚目_続紙_7_算定対象期間_終了月_8行目',
            'calculation_day_end_2_8' => '2枚目_続紙_7_算定対象期間_終了日_8行目',
            'calculation_month_start_2_9' => '2枚目_続紙_7_算定対象期間_開始月_9行目',
            'calculation_day_start_2_9' => '2枚目_続紙_7_算定対象期間_開始日_9行目',
            'calculation_month_end_2_9' => '2枚目_続紙_7_算定対象期間_終了月_9行目',
            'calculation_day_end_2_9' => '2枚目_続紙_7_算定対象期間_終了日_9行目',
            'calculation_month_start_2_10' => '2枚目_続紙_7_算定対象期間_開始月_10行目',
            'calculation_day_start_2_10' => '2枚目_続紙_7_算定対象期間_開始日_10行目',
            'calculation_month_end_2_10' => '2枚目_続紙_7_算定対象期間_終了月_10行目',
            'calculation_day_end_2_10' => '2枚目_続紙_7_算定対象期間_終了日_10行目',
            'calculation_month_start_2_11' => '2枚目_続紙_7_算定対象期間_開始月_11行目',
            'calculation_day_start_2_11' => '2枚目_続紙_7_算定対象期間_開始日_11行目',
            'calculation_month_end_2_11' => '2枚目_続紙_7_算定対象期間_終了月_11行目',
            'calculation_day_end_2_11' => '2枚目_続紙_7_算定対象期間_終了日_11行目',
            'calculation_month_start_2_12' => '2枚目_続紙_7_算定対象期間_開始月_12行目',
            'calculation_day_start_2_12' => '2枚目_続紙_7_算定対象期間_開始日_12行目',
            'calculation_month_end_2_12' => '2枚目_続紙_7_算定対象期間_終了月_12行目',
            'calculation_day_end_2_12' => '2枚目_続紙_7_算定対象期間_終了日_12行目',
            'calculation_month_start_2_13' => '2枚目_続紙_7_算定対象期間_開始月_13行目',
            'calculation_day_start_2_13' => '2枚目_続紙_7_算定対象期間_開始日_13行目',
            'calculation_month_end_2_13' => '2枚目_続紙_7_算定対象期間_終了月_13行目',
            'calculation_day_end_2_13' => '2枚目_続紙_7_算定対象期間_終了日_13行目',
            'calculation_month_start_2_14' => '2枚目_続紙_7_算定対象期間_開始月_14行目',
            'calculation_day_start_2_14' => '2枚目_続紙_7_算定対象期間_開始日_14行目',
            'calculation_month_end_2_14' => '2枚目_続紙_7_算定対象期間_終了月_14行目',
            'calculation_day_end_2_14' => '2枚目_続紙_7_算定対象期間_終了日_14行目',
            'calculation_month_start_2_15' => '2枚目_続紙_7_算定対象期間_開始月_15行目',
            'calculation_day_start_2_15' => '2枚目_続紙_7_算定対象期間_開始日_15行目',
            'calculation_month_end_2_15' => '2枚目_続紙_7_算定対象期間_終了月_15行目',
            'calculation_day_end_2_15' => '2枚目_続紙_7_算定対象期間_終了日_15行目',
            'calculation_basic_period_2_1' => '2枚目_続紙_8_賃金支払基礎日数_1行目',
            'calculation_basic_period_2_2' => '2枚目_続紙_8_賃金支払基礎日数_2行目',
            'calculation_basic_period_2_3' => '2枚目_続紙_8_賃金支払基礎日数_3行目',
            'calculation_basic_period_2_4' => '2枚目_続紙_8_賃金支払基礎日数_4行目',
            'calculation_basic_period_2_5' => '2枚目_続紙_8_賃金支払基礎日数_5行目',
            'calculation_basic_period_2_6' => '2枚目_続紙_8_賃金支払基礎日数_6行目',
            'calculation_basic_period_2_7' => '2枚目_続紙_8_賃金支払基礎日数_7行目',
            'calculation_basic_period_2_8' => '2枚目_続紙_8_賃金支払基礎日数_8行目',
            'calculation_basic_period_2_9' => '2枚目_続紙_8_賃金支払基礎日数_9行目',
            'calculation_basic_period_2_10' => '2枚目_続紙_8_賃金支払基礎日数_10行目',
            'calculation_basic_period_2_11' => '2枚目_続紙_8_賃金支払基礎日数_11行目',
            'calculation_basic_period_2_12' => '2枚目_続紙_8_賃金支払基礎日数_12行目',
            'calculation_basic_period_2_13' => '2枚目_続紙_8_賃金支払基礎日数_13行目',
            'calculation_basic_period_2_14' => '2枚目_続紙_8_賃金支払基礎日数_14行目',
            'calculation_basic_period_2_15' => '2枚目_続紙_8_賃金支払基礎日数_15行目',
            'payment_month_start_2_1' => '2枚目_続紙_9_賃金支払対象期間_開始月_1行目',
            'payment_day_start_2_1' => '2枚目_続紙_9_賃金支払対象期間_開始日_1行目',
            'payment_month_end_2_1' => '2枚目_続紙_9_賃金支払対象期間_終了月_1行目',
            'payment_day_end_2_1' => '2枚目_続紙_9_賃金支払対象期間_終了日_1行目',
            'payment_month_start_2_2' => '2枚目_続紙_9_賃金支払対象期間_開始月_2行目',
            'payment_day_start_2_2' => '2枚目_続紙_9_賃金支払対象期間_開始日_2行目',
            'payment_month_end_2_2' => '2枚目_続紙_9_賃金支払対象期間_終了月_2行目',
            'payment_day_end_2_2' => '2枚目_続紙_9_賃金支払対象期間_終了日_2行目',
            'payment_month_start_2_3' => '2枚目_続紙_9_賃金支払対象期間_開始月_3行目',
            'payment_day_start_2_3' => '2枚目_続紙_9_賃金支払対象期間_開始日_3行目',
            'payment_month_end_2_3' => '2枚目_続紙_9_賃金支払対象期間_終了月_3行目',
            'payment_day_end_2_3' => '2枚目_続紙_9_賃金支払対象期間_終了日_3行目',
            'payment_month_start_2_4' => '2枚目_続紙_9_賃金支払対象期間_開始月_4行目',
            'payment_day_start_2_4' => '2枚目_続紙_9_賃金支払対象期間_開始日_4行目',
            'payment_month_end_2_4' => '2枚目_続紙_9_賃金支払対象期間_終了月_4行目',
            'payment_day_end_2_4' => '2枚目_続紙_9_賃金支払対象期間_終了日_4行目',
            'payment_month_start_2_5' => '2枚目_続紙_9_賃金支払対象期間_開始月_5行目',
            'payment_day_start_2_5' => '2枚目_続紙_9_賃金支払対象期間_開始日_5行目',
            'payment_month_end_2_5' => '2枚目_続紙_9_賃金支払対象期間_終了月_5行目',
            'payment_day_end_2_5' => '2枚目_続紙_9_賃金支払対象期間_終了日_5行目',
            'payment_month_start_2_6' => '2枚目_続紙_9_賃金支払対象期間_開始月_6行目',
            'payment_day_start_2_6' => '2枚目_続紙_9_賃金支払対象期間_開始日_6行目',
            'payment_month_end_2_6' => '2枚目_続紙_9_賃金支払対象期間_終了月_6行目',
            'payment_day_end_2_6' => '2枚目_続紙_9_賃金支払対象期間_終了日_6行目',
            'payment_month_start_2_7' => '2枚目_続紙_9_賃金支払対象期間_開始月_7行目',
            'payment_day_start_2_7' => '2枚目_続紙_9_賃金支払対象期間_開始日_7行目',
            'payment_month_end_2_7' => '2枚目_続紙_9_賃金支払対象期間_終了月_7行目',
            'payment_day_end_2_7' => '2枚目_続紙_9_賃金支払対象期間_終了日_7行目',
            'payment_month_start_2_8' => '2枚目_続紙_9_賃金支払対象期間_開始月_8行目',
            'payment_day_start_2_8' => '2枚目_続紙_9_賃金支払対象期間_開始日_8行目',
            'payment_month_end_2_8' => '2枚目_続紙_9_賃金支払対象期間_終了月_8行目',
            'payment_day_end_2_8' => '2枚目_続紙_9_賃金支払対象期間_終了日_8行目',
            'payment_month_start_2_9' => '2枚目_続紙_9_賃金支払対象期間_開始月_9行目',
            'payment_day_start_2_9' => '2枚目_続紙_9_賃金支払対象期間_開始日_9行目',
            'payment_month_end_2_9' => '2枚目_続紙_9_賃金支払対象期間_終了月_9行目',
            'payment_day_end_2_9' => '2枚目_続紙_9_賃金支払対象期間_終了日_9行目',
            'payment_month_start_2_10' => '2枚目_続紙_9_賃金支払対象期間_開始月_10行目',
            'payment_day_start_2_10' => '2枚目_続紙_9_賃金支払対象期間_開始日_10行目',
            'payment_month_end_2_10' => '2枚目_続紙_9_賃金支払対象期間_終了月_10行目',
            'payment_day_end_2_10' => '2枚目_続紙_9_賃金支払対象期間_終了日_10行目',
            'payment_month_start_2_11' => '2枚目_続紙_9_賃金支払対象期間_開始月_11行目',
            'payment_day_start_2_11' => '2枚目_続紙_9_賃金支払対象期間_開始日_11行目',
            'payment_month_end_2_11' => '2枚目_続紙_9_賃金支払対象期間_終了月_11行目',
            'payment_day_end_2_11' => '2枚目_続紙_9_賃金支払対象期間_終了日_11行目',
            'payment_month_start_2_12' => '2枚目_続紙_9_賃金支払対象期間_開始月_12行目',
            'payment_day_start_2_12' => '2枚目_続紙_9_賃金支払対象期間_開始日_12行目',
            'payment_month_end_2_12' => '2枚目_続紙_9_賃金支払対象期間_終了月_12行目',
            'payment_day_end_2_12' => '2枚目_続紙_9_賃金支払対象期間_終了日_12行目',
            'payment_month_start_2_13' => '2枚目_続紙_9_賃金支払対象期間_開始月_13行目',
            'payment_day_start_2_13' => '2枚目_続紙_9_賃金支払対象期間_開始日_13行目',
            'payment_month_end_2_13' => '2枚目_続紙_9_賃金支払対象期間_終了月_13行目',
            'payment_day_end_2_13' => '2枚目_続紙_9_賃金支払対象期間_終了日_13行目',
            'payment_month_start_2_14' => '2枚目_続紙_9_賃金支払対象期間_開始月_14行目',
            'payment_day_start_2_14' => '2枚目_続紙_9_賃金支払対象期間_開始日_14行目',
            'payment_month_end_2_14' => '2枚目_続紙_9_賃金支払対象期間_終了月_14行目',
            'payment_day_end_2_14' => '2枚目_続紙_9_賃金支払対象期間_終了日_14行目',
            'payment_month_start_2_15' => '2枚目_続紙_9_賃金支払対象期間_開始月_15行目',
            'payment_day_start_2_15' => '2枚目_続紙_9_賃金支払対象期間_開始日_15行目',
            'payment_month_end_2_15' => '2枚目_続紙_9_賃金支払対象期間_終了月_15行目',
            'payment_day_end_2_15' => '2枚目_続紙_9_賃金支払対象期間_終了日_15行目',
            'payment_basic_period_2_1' => '2枚目_続紙_10_基礎日数_1行目',
            'payment_basic_period_2_2' => '2枚目_続紙_10_基礎日数_2行目',
            'payment_basic_period_2_3' => '2枚目_続紙_10_基礎日数_3行目',
            'payment_basic_period_2_4' => '2枚目_続紙_10_基礎日数_4行目',
            'payment_basic_period_2_5' => '2枚目_続紙_10_基礎日数_5行目',
            'payment_basic_period_2_6' => '2枚目_続紙_10_基礎日数_6行目',
            'payment_basic_period_2_7' => '2枚目_続紙_10_基礎日数_7行目',
            'payment_basic_period_2_8' => '2枚目_続紙_10_基礎日数_8行目',
            'payment_basic_period_2_9' => '2枚目_続紙_10_基礎日数_9行目',
            'payment_basic_period_2_10' => '2枚目_続紙_10_基礎日数_10行目',
            'payment_basic_period_2_11' => '2枚目_続紙_10_基礎日数_11行目',
            'payment_basic_period_2_12' => '2枚目_続紙_10_基礎日数_12行目',
            'payment_basic_period_2_13' => '2枚目_続紙_10_基礎日数_13行目',
            'payment_basic_period_2_14' => '2枚目_続紙_10_基礎日数_14行目',
            'payment_basic_period_2_15' => '2枚目_続紙_10_基礎日数_15行目',
            'wage_amountA_2_1' => '2枚目_続紙_11_賃金額_A_1行目',
            'wage_amountA_2_2' => '2枚目_続紙_11_賃金額_A_2行目',
            'wage_amountA_2_3' => '2枚目_続紙_11_賃金額_A_3行目',
            'wage_amountA_2_4' => '2枚目_続紙_11_賃金額_A_4行目',
            'wage_amountA_2_5' => '2枚目_続紙_11_賃金額_A_5行目',
            'wage_amountA_2_6' => '2枚目_続紙_11_賃金額_A_6行目',
            'wage_amountA_2_7' => '2枚目_続紙_11_賃金額_A_7行目',
            'wage_amountA_2_8' => '2枚目_続紙_11_賃金額_A_8行目',
            'wage_amountA_2_9' => '2枚目_続紙_11_賃金額_A_9行目',
            'wage_amountA_2_10' => '2枚目_続紙_11_賃金額_A_10行目',
            'wage_amountA_2_11' => '2枚目_続紙_11_賃金額_A_11行目',
            'wage_amountA_2_12' => '2枚目_続紙_11_賃金額_A_12行目',
            'wage_amountA_2_13' => '2枚目_続紙_11_賃金額_A_13行目',
            'wage_amountA_2_14' => '2枚目_続紙_11_賃金額_A_14行目',
            'wage_amountA_2_15' => '2枚目_続紙_11_賃金額_A_15行目',
            'wage_amountB_2_1' => '2枚目_続紙_11_賃金額_B_1行目',
            'wage_amountB_2_2' => '2枚目_続紙_11_賃金額_B_2行目',
            'wage_amountB_2_3' => '2枚目_続紙_11_賃金額_B_3行目',
            'wage_amountB_2_4' => '2枚目_続紙_11_賃金額_B_4行目',
            'wage_amountB_2_5' => '2枚目_続紙_11_賃金額_B_5行目',
            'wage_amountB_2_6' => '2枚目_続紙_11_賃金額_B_6行目',
            'wage_amountB_2_7' => '2枚目_続紙_11_賃金額_B_7行目',
            'wage_amountB_2_8' => '2枚目_続紙_11_賃金額_B_8行目',
            'wage_amountB_2_9' => '2枚目_続紙_11_賃金額_B_9行目',
            'wage_amountB_2_10' => '2枚目_続紙_11_賃金額_B_10行目',
            'wage_amountB_2_11' => '2枚目_続紙_11_賃金額_B_11行目',
            'wage_amountB_2_12' => '2枚目_続紙_11_賃金額_B_12行目',
            'wage_amountB_2_13' => '2枚目_続紙_11_賃金額_B_13行目',
            'wage_amountB_2_14' => '2枚目_続紙_11_賃金額_B_14行目',
            'wage_amountB_2_15' => '2枚目_続紙_11_賃金額_B_15行目',
            'wage_amount_total_2_1' => '2枚目_続紙_11_賃金額計_1行目',
            'wage_amount_total_2_2' => '2枚目_続紙_11_賃金額計_2行目',
            'wage_amount_total_2_3' => '2枚目_続紙_11_賃金額計_3行目',
            'wage_amount_total_2_4' => '2枚目_続紙_11_賃金額計_4行目',
            'wage_amount_total_2_5' => '2枚目_続紙_11_賃金額計_5行目',
            'wage_amount_total_2_6' => '2枚目_続紙_11_賃金額計_6行目',
            'wage_amount_total_2_7' => '2枚目_続紙_11_賃金額計_7行目',
            'wage_amount_total_2_8' => '2枚目_続紙_11_賃金額計_8行目',
            'wage_amount_total_2_9' => '2枚目_続紙_11_賃金額計_9行目',
            'wage_amount_total_2_10' => '2枚目_続紙_11_賃金額計_10行目',
            'wage_amount_total_2_11' => '2枚目_続紙_11_賃金額計_11行目',
            'wage_amount_total_2_12' => '2枚目_続紙_11_賃金額計_12行目',
            'wage_amount_total_2_13' => '2枚目_続紙_11_賃金額計_13行目',
            'wage_amount_total_2_14' => '2枚目_続紙_11_賃金額計_14行目',
            'wage_amount_total_2_15' => '2枚目_続紙_11_賃金額計_15行目',
            'note_2_1' => '2枚目_続紙_12_備考_1行目',
            'note_2_2' => '2枚目_続紙_12_備考_2行目',
            'note_2_3' => '2枚目_続紙_12_備考_3行目',
            'note_2_4' => '2枚目_続紙_12_備考_4行目',
            'note_2_5' => '2枚目_続紙_12_備考_5行目',
            'note_2_6' => '2枚目_続紙_12_備考_6行目',
            'note_2_7' => '2枚目_続紙_12_備考_7行目',
            'note_2_8' => '2枚目_続紙_12_備考_8行目',
            'note_2_9' => '2枚目_続紙_12_備考_9行目',
            'note_2_10' => '2枚目_続紙_12_備考_10行目',
            'note_2_11' => '2枚目_続紙_12_備考_11行目',
            'note_2_12' => '2枚目_続紙_12_備考_12行目',
            'note_2_13' => '2枚目_続紙_12_備考_13行目',
            'note_2_14' => '2枚目_続紙_12_備考_14行目',
            'note_2_15' => '2枚目_続紙_12_備考_15行目',
            'wage_note_2' => '2枚目_続紙_13_賃金に関する特記事項',
        ];
    }
}
