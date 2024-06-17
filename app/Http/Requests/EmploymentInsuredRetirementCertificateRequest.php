<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredRetirementCertificateRequest extends FormRequest
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
            "insurance_office_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "insurance_office_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "insurance_office_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "employment_insured_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "employment_insured_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "employment_insured_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "name_kana" => 'string|max:255|regex:/^[０-９＋‐－ー＃￥＆．，：＊　ァ-ヴヵヶＡ-Ｚａ-ｚ]+$/u',
            "retirement_date_era" => 'string|max:2',
            "retirement_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "retirement_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "retirement_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "branch_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "branch_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "employee_post_code_former" => 'string|regex:/^[0-9]{3}$/u',
            "employee_post_code_latter" => 'string|regex:/^[0-9]{4}$/u',
            "employee_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "employee_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "employee_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "employee_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "company_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "headquarters_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "employer_managerial_position_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            "the_day_after_retirement_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:the_day_after_retirement_date_day',
            "the_day_after_retirement_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:the_day_after_retirement_date_month',
            "insured_period_start_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day',
            "insured_period_start_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month',
            "basic_days_for_salary_payment_of_insured_period" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day',
            "salary_payment_period_start_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month',
            "basic_days_of_salary_payment_period" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo" => 'nullable|string|max:255',
            "insured_period_start_month_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_1',
            "insured_period_start_day_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_1',
            "insured_period_end_month_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_1',
            "insured_period_end_day_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_1',
            "insured_period_month_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_1',
            "salary_payment_period_start_day_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_1',
            "salary_payment_period_end_month_1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_1',
            "salary_payment_period_end_day_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_1',
            "basic_days_of_salary_payment_period_1" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_1" => 'nullable|string|max:255',
            "insured_period_start_month_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_2',
            "insured_period_start_day_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_2',
            "insured_period_end_month_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_2',
            "insured_period_end_day_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_2',
            "insured_period_month_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_2',
            "salary_payment_period_start_day_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_2',
            "salary_payment_period_end_month_2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_2',
            "salary_payment_period_end_day_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_2',
            "basic_days_of_salary_payment_period_2" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_2" => 'nullable|string|max:255',
            "insured_period_start_month_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_3',
            "insured_period_start_day_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_3',
            "insured_period_end_month_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_3',
            "insured_period_end_day_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_3',
            "insured_period_month_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_3',
            "salary_payment_period_start_day_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_3',
            "salary_payment_period_end_month_3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_3',
            "salary_payment_period_end_day_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_3',
            "basic_days_of_salary_payment_period_3" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_3" => 'nullable|string|max:255',
            "insured_period_start_month_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_4',
            "insured_period_start_day_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_4',
            "insured_period_end_month_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_4',
            "insured_period_end_day_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_4',
            "insured_period_month_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_4',
            "salary_payment_period_start_day_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_4',
            "salary_payment_period_end_month_4" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_4',
            "salary_payment_period_end_day_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_4',
            "basic_days_of_salary_payment_period_4" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_4" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_4" => 'nullable|string|max:255',
            "insured_period_start_month_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_5',
            "insured_period_start_day_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_5',
            "insured_period_end_month_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_5',
            "insured_period_end_day_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_5',
            "insured_period_month_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_5',
            "salary_payment_period_start_day_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_5',
            "salary_payment_period_end_month_5" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_5',
            "salary_payment_period_end_day_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_5',
            "basic_days_of_salary_payment_period_5" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_5" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_5" => 'nullable|string|max:255',
            "insured_period_start_month_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_6',
            "insured_period_start_day_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_6',
            "insured_period_end_month_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_6',
            "insured_period_end_day_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_6',
            "insured_period_month_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_6',
            "salary_payment_period_start_day_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_6',
            "salary_payment_period_end_month_6" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_6',
            "salary_payment_period_end_day_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_6',
            "basic_days_of_salary_payment_period_6" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_6" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_6" => 'nullable|string|max:255',
            "insured_period_start_month_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_7',
            "insured_period_start_day_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_7',
            "insured_period_end_month_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_7',
            "insured_period_end_day_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_7',
            "insured_period_month_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_7',
            "salary_payment_period_start_day_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_7',
            "salary_payment_period_end_month_7" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_7',
            "salary_payment_period_end_day_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_7',
            "basic_days_of_salary_payment_period_7" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_7" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_7" => 'nullable|string|max:255',
            "insured_period_start_month_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_8',
            "insured_period_start_day_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_8',
            "insured_period_end_month_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_8',
            "insured_period_end_day_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_8',
            "insured_period_month_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_8',
            "salary_payment_period_start_day_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_8',
            "salary_payment_period_end_month_8" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_8',
            "salary_payment_period_end_day_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_8',
            "basic_days_of_salary_payment_period_8" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_8" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_8" => 'nullable|string|max:255',
            "insured_period_start_month_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_9',
            "insured_period_start_day_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_9',
            "insured_period_end_month_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_9',
            "insured_period_end_day_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_9',
            "insured_period_month_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_9',
            "salary_payment_period_start_day_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_9',
            "salary_payment_period_end_month_9" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_9',
            "salary_payment_period_end_day_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_9',
            "basic_days_of_salary_payment_period_9" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_9" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_9" => 'nullable|string|max:255',
            "insured_period_start_month_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_10',
            "insured_period_start_day_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_10',
            "insured_period_end_month_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_10',
            "insured_period_end_day_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_10',
            "insured_period_month_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_10',
            "salary_payment_period_start_day_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_10',
            "salary_payment_period_end_month_10" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_10',
            "salary_payment_period_end_day_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_10',
            "basic_days_of_salary_payment_period_10" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_10" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_10" => 'nullable|string|max:255',
            "insured_period_start_month_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_11',
            "insured_period_start_day_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_11',
            "insured_period_end_month_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_11',
            "insured_period_end_day_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_11',
            "insured_period_month_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_11',
            "salary_payment_period_start_day_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_11',
            "salary_payment_period_end_month_11" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_11',
            "salary_payment_period_end_day_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_11',
            "basic_days_of_salary_payment_period_11" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_11" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_11" => 'nullable|string|max:255',
            "insured_period_start_month_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_12',
            "insured_period_start_day_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_12',
            "insured_period_end_month_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_12',
            "insured_period_end_day_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_12',
            "insured_period_month_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_12',
            "salary_payment_period_start_day_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_12',
            "salary_payment_period_end_month_12" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_12',
            "salary_payment_period_end_day_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_12',
            "basic_days_of_salary_payment_period_12" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_12" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_12" => 'nullable|string|max:255',
            "insured_period_start_month_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_13',
            "insured_period_start_day_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_13',
            "insured_period_end_month_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_13',
            "insured_period_end_day_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_13',
            "insured_period_month_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_13',
            "salary_payment_period_start_day_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_13',
            "salary_payment_period_end_month_13" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_13',
            "salary_payment_period_end_day_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_13',
            "basic_days_of_salary_payment_period_13" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_13" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_13" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_13" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_13" => 'nullable|string|max:255',
            "insured_period_start_month_14" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_14',
            "insured_period_start_day_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_14',
            "insured_period_end_month_14" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_14',
            "insured_period_end_day_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_14',
            "insured_period_month_14" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_14" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_14',
            "salary_payment_period_start_day_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_14',
            "salary_payment_period_end_month_14" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_14',
            "salary_payment_period_end_day_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_14',
            "basic_days_of_salary_payment_period_14" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_14" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_14" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_14" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_14" => 'nullable|string|max:255',
            "insured_period_start_month_15" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_15',
            "insured_period_start_day_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_15',
            "insured_period_end_month_15" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_15',
            "insured_period_end_day_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_15',
            "insured_period_month_15" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_15" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_15',
            "salary_payment_period_start_day_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_15',
            "salary_payment_period_end_month_15" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_15',
            "salary_payment_period_end_day_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_15',
            "basic_days_of_salary_payment_period_15" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_15" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_15" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_15" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_15" => 'nullable|string|max:255',
            "insured_period_start_month_16" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_16',
            "insured_period_start_day_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_16',
            "insured_period_end_month_16" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_16',
            "insured_period_end_day_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_16',
            "insured_period_month_16" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_16" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_16',
            "salary_payment_period_start_day_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_16',
            "salary_payment_period_end_month_16" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_16',
            "salary_payment_period_end_day_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_16',
            "basic_days_of_salary_payment_period_16" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_16" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_16" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_16" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_16" => 'nullable|string|max:255',
            "insured_period_start_month_17" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_17',
            "insured_period_start_day_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_17',
            "insured_period_end_month_17" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_17',
            "insured_period_end_day_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_17',
            "insured_period_month_17" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_17" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_17',
            "salary_payment_period_start_day_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_17',
            "salary_payment_period_end_month_17" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_17',
            "salary_payment_period_end_day_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_17',
            "basic_days_of_salary_payment_period_17" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_17" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_17" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_17" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_17" => 'nullable|string|max:255',
            "insured_period_start_month_18" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_18',
            "insured_period_start_day_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_18',
            "insured_period_end_month_18" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_18',
            "insured_period_end_day_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_18',
            "insured_period_month_18" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_18" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_18',
            "salary_payment_period_start_day_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_18',
            "salary_payment_period_end_month_18" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_18',
            "salary_payment_period_end_day_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_18',
            "basic_days_of_salary_payment_period_18" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_18" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_18" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_18" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_18" => 'nullable|string|max:255',
            "insured_period_start_month_19" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_19',
            "insured_period_start_day_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_19',
            "insured_period_end_month_19" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_19',
            "insured_period_end_day_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_19',
            "insured_period_month_19" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_19" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_19',
            "salary_payment_period_start_day_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_19',
            "salary_payment_period_end_month_19" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_19',
            "salary_payment_period_end_day_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_19',
            "basic_days_of_salary_payment_period_19" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_19" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_19" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_19" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_19" => 'nullable|string|max:255',
            "insured_period_start_month_20" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_20',
            "insured_period_start_day_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_20',
            "insured_period_end_month_20" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_20',
            "insured_period_end_day_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_20',
            "insured_period_month_20" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_20" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_20',
            "salary_payment_period_start_day_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_20',
            "salary_payment_period_end_month_20" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_20',
            "salary_payment_period_end_day_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_20',
            "basic_days_of_salary_payment_period_20" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_20" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_20" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_20" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_20" => 'nullable|string|max:255',
            "insured_period_start_month_21" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_21',
            "insured_period_start_day_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_21',
            "insured_period_end_month_21" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_21',
            "insured_period_end_day_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_21',
            "insured_period_month_21" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:',
            "basic_days_for_salary_payment_of_insured_period_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_21" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_21',
            "salary_payment_period_start_day_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_21',
            "salary_payment_period_end_month_21" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_21',
            "salary_payment_period_end_day_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_21',
            "basic_days_of_salary_payment_period_21" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_21" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_21" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_21" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_21" => 'nullable|string|max:255',
            "insured_period_start_month_22" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_22',
            "insured_period_start_day_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_22',
            "insured_period_end_month_22" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_22',
            "insured_period_end_day_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_22',
            "insured_period_month_22" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_22" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_22',
            "salary_payment_period_start_day_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_22',
            "salary_payment_period_end_month_22" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_22',
            "salary_payment_period_end_day_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_22',
            "basic_days_of_salary_payment_period_22" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_22" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_22" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_22" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_22" => 'nullable|string|max:255',
            "insured_period_start_month_23" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_23',
            "insured_period_start_day_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_23',
            "insured_period_end_month_23" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_23',
            "insured_period_end_day_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_23',
            "insured_period_month_23" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_23" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_23',
            "salary_payment_period_start_day_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_23',
            "salary_payment_period_end_month_23" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_23',
            "salary_payment_period_end_day_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_23',
            "basic_days_of_salary_payment_period_23" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_23" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_23" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_23" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_23" => 'nullable|string|max:255',
            "insured_period_start_month_24" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_day_24',
            "insured_period_start_day_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_start_month_24',
            "insured_period_end_month_24" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_day_24',
            "insured_period_end_day_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:insured_period_end_month_24',
            "insured_period_month_24" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "basic_days_for_salary_payment_of_insured_period_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_payment_period_start_month_24" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_day_24',
            "salary_payment_period_start_day_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_start_month_24',
            "salary_payment_period_end_month_24" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_day_24',
            "salary_payment_period_end_day_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:salary_payment_period_end_month_24',
            "basic_days_of_salary_payment_period_24" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "salary_amount_A_24" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_B_24" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "salary_amount_total_24" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "memo_24" => 'nullable|string|max:255',
            "salary_notices" => 'nullable|string|max:255',
            "salary_notices_1" => 'nullable|string|max:255',
            "remarks" => 'nullable|string|max:255',
            "remarks_1" => 'nullable|string|max:255',
            "labor_consultant_japan_era" => 'nullable|string|max:2',
            "labor_consultant_japan_era_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_acting_as_agent_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　]+\z/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　]+\z/u',
            "labor_consultant_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "contract_period_reached_limit_contract_period_once" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "contract_period_reached_limit_contract_period_total" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "contract_period_reached_limit_contract_renewal_count" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "eternal_hire_contract_period_once" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "eternal_hire_contract_period_total" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "eternal_hire_contract_renewal_count" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "except_eternal_hire_contract_period_once" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "except_eternal_hire_contract_period_total" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "except_eternal_hire_contract_renewal_count" => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            "retirement_age" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "shortened_contract_renewal_reached_limit_flg" => 'nullable|string|in:する,しない',
            "contract_renewal_reached_limit_flg" => 'nullable|string|in:する,しない',
            "rehire_contract_renewal_reached_limit_flg" => 'nullable|string|in:ある,ない',
            "contract_period_total_reached_limit_flg" => 'nullable|string|in:ある,ない',
            "contract_period_total_established_before_law_amendment_flg" => 'nullable|string|in:いた,いなかった',
            "eternal_hire_contract_renewal_guarantee_agreement_flg" => 'nullable|string|in:有,無',
            "contract_non_renewal_flg" => 'nullable|string|in:有,無',
            "employment_termination_notice_flg" => 'nullable|string|in:有,無',
            "non_renewal_clause_addition_flg" => 'nullable|string|in:ある,ない',
            "eternal_hire_contract_renewal_request_type" => 'nullable|string|in:希望する申出有,希望しない申出有,申出無',
            "contract_renewal_guarantee_agreement_flg" => 'nullable|string|in:有,無',
            "no_contract_renewal_flg" => 'nullable|string|in:有,無',
            "contract_renewal_request_type" => 'nullable|string|in:希望する申出有,希望しない申出有,申出無',
            "employment_instructions_type" => 'nullable|string|in:労働者が適用基準に派遣就業の指示を拒否したことによる場合,事業主が派遣就業の指示を行わなかったことによる場合',
            "education_training_flg" => 'nullable|string|in:有,無',
            "objection_retirement_reason_flg" => 'nullable|string|in:有,無',
            "dispatched_employee_flg" => 'nullable|string|in:常時雇用される労働者,常時雇用される労働者以外',
            "reemployment_request_flg" => 'nullable|string|in:有,無',
            "retirement_reason_type" => 'nullable|string|in:就業規則に定める事由に該当したため,労使協定に定めた基準に該当しなかったため,その他',
            "retirement_reason" => 'nullable|string|max:255',
            "retirement_recommendation_reason" => 'nullable|string|max:255',
            "change_office_place" => 'nullable|string|max:255',
            "employee_decision_reasons" => 'nullable|string|max:255',
            "other_reasons" => 'nullable|string|max:255',
            "memo_for_employer" => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();

            if(!empty($data['the_day_after_retirement_date_month']) && !empty($data['the_day_after_retirement_date_day'])){
                if(ctype_digit($data['the_day_after_retirement_date_month'])){
                    if (!checkdate($data['the_day_after_retirement_date_month'], $data['the_day_after_retirement_date_day'], '2000')) {
                    $validator->errors()->add('the_day_after_retirement_date_month','2枚目_算定対象期間_離職日の翌日は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month']) && !empty($data['insured_period_start_day'])){
                if(ctype_digit($data['insured_period_start_month'])){
                    if (!checkdate($data['insured_period_start_month'], $data['insured_period_start_day'], '2000')) {
                    $validator->errors()->add('insured_period_start_day','2枚目_8_算定対象期間_A_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_1']) && !empty($data['insured_period_start_day_1'])){
                if(ctype_digit($data['insured_period_start_month_1'])){
                    if (!checkdate($data['insured_period_start_month_1'], $data['insured_period_start_day_1'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_1','2枚目_8_算定対象期間_A_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_2']) && !empty($data['insured_period_start_day_2'])){
                if(ctype_digit($data['insured_period_start_month_2'])){
                    if (!checkdate($data['insured_period_start_month_2'], $data['insured_period_start_day_2'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_2','2枚目_8_算定対象期間_A_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_3']) && !empty($data['insured_period_start_day_3'])){
                if(ctype_digit($data['insured_period_start_month_3'])){
                    if (!checkdate($data['insured_period_start_month_3'], $data['insured_period_start_day_3'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_3','2枚目_8_算定対象期間_A_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_4']) && !empty($data['insured_period_start_day_4'])){
                if(ctype_digit($data['insured_period_start_month_4'])){
                    if (!checkdate($data['insured_period_start_month_4'], $data['insured_period_start_day_4'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_4','2枚目_8_算定対象期間_A_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_5']) && !empty($data['insured_period_start_day_5'])){
                if(ctype_digit($data['insured_period_start_month_5'])){
                    if (!checkdate($data['insured_period_start_month_5'], $data['insured_period_start_day_5'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_5','2枚目_8_算定対象期間_A_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['insured_period_start_month_6']) && !empty($data['insured_period_start_day_6'])){
                if(ctype_digit($data['insured_period_start_month_6'])){
                    if (!checkdate($data['insured_period_start_month_6'], $data['insured_period_start_day_6'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_6','2枚目_8_算定対象期間_A_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_7']) && !empty($data['insured_period_start_day_7'])){
                if(ctype_digit($data['insured_period_start_month_7'])){
                    if (!checkdate($data['insured_period_start_month_7'], $data['insured_period_start_day_7'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_7','2枚目_8_算定対象期間_A_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_8']) && !empty($data['insured_period_start_day_8'])){
                if(ctype_digit($data['insured_period_start_month_8'])){
                    if (!checkdate($data['insured_period_start_month_8'], $data['insured_period_start_day_8'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_8','2枚目_8_算定対象期間_A_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_9']) && !empty($data['insured_period_start_day_9'])){
                if(ctype_digit($data['insured_period_start_month_9'])){
                    if (!checkdate($data['insured_period_start_month_9'], $data['insured_period_start_day_9'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_9','2枚目_8_算定対象期間_A_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_10']) && !empty($data['insured_period_start_day_10'])){
                if(ctype_digit($data['insured_period_start_month_10'])){
                    if (!checkdate($data['insured_period_start_month_10'], $data['insured_period_start_day_10'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_10','2枚目_8_算定対象期間_A_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_11']) && !empty($data['insured_period_start_day_11'])){
                if(ctype_digit($data['insured_period_start_month_11'])){
                    if (!checkdate($data['insured_period_start_month_11'], $data['insured_period_start_day_11'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_11','2枚目_8_算定対象期間_A_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_12']) && !empty($data['insured_period_start_day_12'])){
                if(ctype_digit($data['insured_period_start_month_12'])){
                    if (!checkdate($data['insured_period_start_month_12'], $data['insured_period_start_day_12'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_12','2枚目_8_算定対象期間_A_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_1']) && !empty($data['insured_period_end_day_1'])){
                if(ctype_digit($data['insured_period_end_month_1'])){
                    if (!checkdate($data['insured_period_end_month_1'], $data['insured_period_end_day_1'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_1','2枚目_8_算定対象期間_A_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
                
            if(!empty($data['insured_period_end_month_2']) && !empty($data['insured_period_end_day_2'])){
                if(ctype_digit($data['insured_period_end_month_2'])){
                    if (!checkdate($data['insured_period_end_month_2'], $data['insured_period_end_day_2'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_2','2枚目_8_算定対象期間_A_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['insured_period_end_month_3']) && !empty($data['insured_period_end_day_3'])){
                if(ctype_digit($data['insured_period_end_month_3'])){
                    if (!checkdate($data['insured_period_end_month_3'], $data['insured_period_end_day_3'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_3','2枚目_8_算定対象期間_A_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_4']) && !empty($data['insured_period_end_day_4'])){
                if(ctype_digit($data['insured_period_end_month_4'])){
                    if (!checkdate($data['insured_period_end_month_4'], $data['insured_period_end_day_4'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_4','2枚目_8_算定対象期間_A_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_5']) && !empty($data['insured_period_end_day_5'])){
                if(ctype_digit($data['insured_period_end_month_5'])){
                    if (!checkdate($data['insured_period_end_month_5'], $data['insured_period_end_day_5'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_5','2枚目_8_算定対象期間_A_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_6']) && !empty($data['insured_period_end_day_6'])){
                if(ctype_digit($data['insured_period_end_month_6'])){
                    if (!checkdate($data['insured_period_end_month_6'], $data['insured_period_end_day_6'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_6','2枚目_8_算定対象期間_A_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_7']) && !empty($data['insured_period_end_day_7'])){
                if(ctype_digit($data['insured_period_end_month_7'])){
                    if (!checkdate($data['insured_period_end_month_7'], $data['insured_period_end_day_7'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_7','2枚目_8_算定対象期間_A_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_8']) && !empty($data['insured_period_end_day_8'])){
                if(ctype_digit($data['insured_period_end_month_8'])){
                    if (!checkdate($data['insured_period_end_month_8'], $data['insured_period_end_day_8'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_8','2枚目_8_算定対象期間_A_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_9']) && !empty($data['insured_period_end_day_9'])){
                if(ctype_digit($data['insured_period_end_month_9'])){
                    if (!checkdate($data['insured_period_end_month_9'], $data['insured_period_end_day_9'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_9','2枚目_8_算定対象期間_A_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_10']) && !empty($data['insured_period_end_day_10'])){
                if(ctype_digit($data['insured_period_end_month_10'])){
                    if (!checkdate($data['insured_period_end_month_10'], $data['insured_period_end_day_10'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_10','2枚目_8_算定対象期間_A_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_11']) && !empty($data['insured_period_end_day_11'])){
                if(ctype_digit($data['insured_period_end_month_11'])){
                    if (!checkdate($data['insured_period_end_month_11'], $data['insured_period_end_day_11'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_11','2枚目_8_算定対象期間_A_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_12']) && !empty($data['insured_period_end_day_12'])){
                if(ctype_digit($data['insured_period_end_month_12'])){
                    if (!checkdate($data['insured_period_end_month_12'], $data['insured_period_end_day_12'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_12','2枚目_8_算定対象期間_A_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
                
            if(!empty($data['salary_payment_period_start_month']) && !empty($data['salary_payment_period_start_day'])){
                if(ctype_digit($data['salary_payment_period_start_month'])){
                    if (!checkdate($data['salary_payment_period_start_month'], $data['salary_payment_period_start_day'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day','2枚目_10_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['salary_payment_period_start_month_1']) && !empty($data['salary_payment_period_start_day_1'])){
                if(ctype_digit($data['salary_payment_period_start_month_1'])){
                    if (!checkdate($data['salary_payment_period_start_month_1'], $data['salary_payment_period_start_day_1'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_1','2枚目_10_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_2']) && !empty($data['salary_payment_period_start_day_2'])){
                if(ctype_digit($data['salary_payment_period_start_month_2'])){
                    if (!checkdate($data['salary_payment_period_start_month_2'], $data['salary_payment_period_start_day_2'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_2','2枚目_10_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_3']) && !empty($data['salary_payment_period_start_day_3'])){
                if(ctype_digit($data['salary_payment_period_start_month_3'])){
                    if (!checkdate($data['salary_payment_period_start_month_3'], $data['salary_payment_period_start_day_3'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_3','2枚目_10_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_4']) && !empty($data['salary_payment_period_start_day_4'])){
                if(ctype_digit($data['salary_payment_period_start_month_4'])){
                    if (!checkdate($data['salary_payment_period_start_month_4'], $data['salary_payment_period_start_day_4'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_4','2枚目_10_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_5']) && !empty($data['salary_payment_period_start_day_5'])){
                if(ctype_digit($data['salary_payment_period_start_month_5'])){
                    if (!checkdate($data['salary_payment_period_start_month_5'], $data['salary_payment_period_start_day_5'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_5','2枚目_10_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_6']) && !empty($data['salary_payment_period_start_day_6'])){
                if(ctype_digit($data['salary_payment_period_start_month_6'])){
                    if (!checkdate($data['salary_payment_period_start_month_6'], $data['salary_payment_period_start_day_6'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_6','2枚目_10_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_7']) && !empty($data['salary_payment_period_start_day_7'])){
                if(ctype_digit($data['salary_payment_period_start_month_7'])){
                    if (!checkdate($data['salary_payment_period_start_month_7'], $data['salary_payment_period_start_day_7'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_7','2枚目_10_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_8']) && !empty($data['salary_payment_period_start_day_8'])){
                if(ctype_digit($data['salary_payment_period_start_month_8'])){
                    if (!checkdate($data['salary_payment_period_start_month_8'], $data['salary_payment_period_start_day_8'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_8','2枚目_10_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_9']) && !empty($data['salary_payment_period_start_day_9'])){
                if(ctype_digit($data['salary_payment_period_start_month_9'])){
                    if (!checkdate($data['salary_payment_period_start_month_9'], $data['salary_payment_period_start_day_9'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_9','2枚目_10_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_10']) && !empty($data['salary_payment_period_start_day_10'])){
                if(ctype_digit($data['salary_payment_period_start_month_10'])){
                    if (!checkdate($data['salary_payment_period_start_month_10'], $data['salary_payment_period_start_day_10'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_10','2枚目_10_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_11']) && !empty($data['salary_payment_period_start_day_11'])){
                if(ctype_digit($data['salary_payment_period_start_month_11'])){
                    if (!checkdate($data['salary_payment_period_start_month_11'], $data['salary_payment_period_start_day_11'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_11','2枚目_10_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_12']) && !empty($data['salary_payment_period_start_day_12'])){
                if(ctype_digit($data['salary_payment_period_start_month_12'])){
                    if (!checkdate($data['salary_payment_period_start_month_12'], $data['salary_payment_period_start_day_12'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_12','2枚目_10_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_1']) && !empty($data['salary_payment_period_end_day_1'])){
                if(ctype_digit($data['salary_payment_period_end_month_1'])){
                    if (!checkdate($data['salary_payment_period_end_month_1'], $data['salary_payment_period_end_day_1'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_1','2枚目_10_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_2']) && !empty($data['salary_payment_period_end_day_2'])){
                if(ctype_digit($data['salary_payment_period_end_month_2'])){
                    if (!checkdate($data['salary_payment_period_end_month_2'], $data['salary_payment_period_end_day_2'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_2','2枚目_10_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }

            if(!empty($data['salary_payment_period_end_month_3']) && !empty($data['salary_payment_period_end_day_3'])){
                if(ctype_digit($data['salary_payment_period_end_month_3'])){
                    if (!checkdate($data['salary_payment_period_end_month_3'], $data['salary_payment_period_end_day_3'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_3','2枚目_10_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_4']) && !empty($data['salary_payment_period_end_day_4'])){
                if(ctype_digit($data['salary_payment_period_end_month_4'])){
                    if (!checkdate($data['salary_payment_period_end_month_4'], $data['salary_payment_period_end_day_4'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_4','2枚目_10_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_5']) && !empty($data['salary_payment_period_end_day_5'])){
                if(ctype_digit($data['salary_payment_period_end_month_5'])){
                    if (!checkdate($data['salary_payment_period_end_month_5'], $data['salary_payment_period_end_day_5'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_5','2枚目_10_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_6']) && !empty($data['salary_payment_period_end_day_6'])){
                if(ctype_digit($data['salary_payment_period_end_month_6'])){
                    if (!checkdate($data['salary_payment_period_end_month_6'], $data['salary_payment_period_end_day_6'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_6','2枚目_10_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_7']) && !empty($data['salary_payment_period_end_day_7'])){
                if(ctype_digit($data['salary_payment_period_end_month_7'])){
                    if (!checkdate($data['salary_payment_period_end_month_7'], $data['salary_payment_period_end_day_7'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_7','2枚目_10_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_8']) && !empty($data['salary_payment_period_end_day_8'])){
                if(ctype_digit($data['salary_payment_period_end_month_8'])){
                    if (!checkdate($data['salary_payment_period_end_month_8'], $data['salary_payment_period_end_day_8'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_8','2枚目_10_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_9']) && !empty($data['salary_payment_period_end_day_9'])){
                if(ctype_digit($data['salary_payment_period_end_month_9'])){
                    if (!checkdate($data['salary_payment_period_end_month_9'], $data['salary_payment_period_end_day_9'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_9','2枚目_10_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_10']) && !empty($data['salary_payment_period_end_day_10'])){
                if(ctype_digit($data['salary_payment_period_end_month_10'])){
                    if (!checkdate($data['salary_payment_period_end_month_10'], $data['salary_payment_period_end_day_10'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_10','2枚目_10_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_11']) && !empty($data['salary_payment_period_end_day_11'])){
                if(ctype_digit($data['salary_payment_period_end_month_11'])){
                    if (!checkdate($data['salary_payment_period_end_month_11'], $data['salary_payment_period_end_day_11'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_11','2枚目_10_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_12']) && !empty($data['salary_payment_period_end_day_12'])){
                if(ctype_digit($data['salary_payment_period_end_month_12'])){
                    if (!checkdate($data['salary_payment_period_end_month_12'], $data['salary_payment_period_end_day_12'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_12','2枚目_10_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_13']) && !empty($data['insured_period_start_day_13'])){
                if(ctype_digit($data['insured_period_start_month_13'])){
                    if (!checkdate($data['insured_period_start_month_13'], $data['insured_period_start_day_13'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_13','2枚目(続紙)_8_算定対象期間_A_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_14']) && !empty($data['insured_period_start_day_14'])){
                if(ctype_digit($data['insured_period_start_month_14'])){
                    if (!checkdate($data['insured_period_start_month_14'], $data['insured_period_start_day_14'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_14','2枚目(続紙)_8_算定対象期間_A_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_15']) && !empty($data['insured_period_start_day_15'])){
                if(ctype_digit($data['insured_period_start_month_15'])){
                    if (!checkdate($data['insured_period_start_month_15'], $data['insured_period_start_day_15'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_15','2枚目(続紙)_8_算定対象期間_A_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_16']) && !empty($data['insured_period_start_day_16'])){
                if(ctype_digit($data['insured_period_start_month_16'])){
                    if (!checkdate($data['insured_period_start_month_16'], $data['insured_period_start_day_16'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_16','2枚目(続紙)_8_算定対象期間_A_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_17']) && !empty($data['insured_period_start_day_17'])){
                if(ctype_digit($data['insured_period_start_month_17'])){
                    if (!checkdate($data['insured_period_start_month_17'], $data['insured_period_start_day_17'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_17','2枚目(続紙)_8_算定対象期間_A_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_18']) && !empty($data['insured_period_start_day_18'])){
                if(ctype_digit($data['insured_period_start_month_18'])){
                    if (!checkdate($data['insured_period_start_month_18'], $data['insured_period_start_day_18'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_18','2枚目(続紙)_8_算定対象期間_A_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_19']) && !empty($data['insured_period_start_day_19'])){
                if(ctype_digit($data['insured_period_start_month_19'])){
                    if (!checkdate($data['insured_period_start_month_19'], $data['insured_period_start_day_19'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_19','2枚目(続紙)_8_算定対象期間_A_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_20']) && !empty($data['insured_period_start_day_20'])){
                if(ctype_digit($data['insured_period_start_month_20'])){
                    if (!checkdate($data['insured_period_start_month_20'], $data['insured_period_start_day_20'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_20','2枚目(続紙)_8_算定対象期間_A_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_21']) && !empty($data['insured_period_start_day_21'])){
                if(ctype_digit($data['insured_period_start_month_21'])){
                    if (!checkdate($data['insured_period_start_month_21'], $data['insured_period_start_day_21'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_21','2枚目(続紙)_8_算定対象期間_A_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_22']) && !empty($data['insured_period_start_day_22'])){
                if(ctype_digit($data['insured_period_start_month_22'])){
                    if (!checkdate($data['insured_period_start_month_22'], $data['insured_period_start_day_22'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_22','2枚目(続紙)_8_算定対象期間_A_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_23']) && !empty($data['insured_period_start_day_23'])){
                if(ctype_digit($data['insured_period_start_month_23'])){
                    if (!checkdate($data['insured_period_start_month_23'], $data['insured_period_start_day_23'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_23','2枚目(続紙)_8_算定対象期間_A_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_start_month_24']) && !empty($data['insured_period_start_day_24'])){
                if(ctype_digit($data['insured_period_start_month_24'])){
                    if (!checkdate($data['insured_period_start_month_24'], $data['insured_period_start_day_24'], '2000')) {
                    $validator->errors()->add('insured_period_start_day_24','2枚目(続紙)_8_算定対象期間_A_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_13']) && !empty($data['insured_period_end_day_13'])){
                if(ctype_digit($data['insured_period_end_month_13'])){
                    if (!checkdate($data['insured_period_end_month_13'], $data['insured_period_end_day_13'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_13','2枚目(続紙)_8_算定対象期間_A_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_14']) && !empty($data['insured_period_end_day_14'])){
                if(ctype_digit($data['insured_period_end_month_14'])){
                    if (!checkdate($data['insured_period_end_month_14'], $data['insured_period_end_day_14'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_14','2枚目(続紙)_8_算定対象期間_A_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_15']) && !empty($data['insured_period_end_day_15'])){
                if(ctype_digit($data['insured_period_end_month_15'])){
                    if (!checkdate($data['insured_period_end_month_15'], $data['insured_period_end_day_15'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_15','2枚目(続紙)_8_算定対象期間_A_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_16']) && !empty($data['insured_period_end_day_16'])){
                if(ctype_digit($data['insured_period_end_month_16'])){
                    if (!checkdate($data['insured_period_end_month_16'], $data['insured_period_end_day_16'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_16','2枚目(続紙)_8_算定対象期間_A_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_17']) && !empty($data['insured_period_end_day_17'])){
                if(ctype_digit($data['insured_period_end_month_17'])){
                    if (!checkdate($data['insured_period_end_month_17'], $data['insured_period_end_day_17'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_17','2枚目(続紙)_8_算定対象期間_A_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_18']) && !empty($data['insured_period_end_day_18'])){
                if(ctype_digit($data['insured_period_end_month_18'])){
                    if (!checkdate($data['insured_period_end_month_18'], $data['insured_period_end_day_18'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_18','2枚目(続紙)_8_算定対象期間_A_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_19']) && !empty($data['insured_period_end_day_19'])){
                if(ctype_digit($data['insured_period_end_month_19'])){
                    if (!checkdate($data['insured_period_end_month_19'], $data['insured_period_end_day_19'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_19','2枚目(続紙)_8_算定対象期間_A_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_20']) && !empty($data['insured_period_end_day_20'])){
                if(ctype_digit($data['insured_period_end_month_20'])){
                    if (!checkdate($data['insured_period_end_month_20'], $data['insured_period_end_day_20'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_20','2枚目(続紙)_8_算定対象期間_A_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_21']) && !empty($data['insured_period_end_day_21'])){
                if(ctype_digit($data['insured_period_end_month_21'])){
                    if (!checkdate($data['insured_period_end_month_21'], $data['insured_period_end_day_21'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_21','2枚目(続紙)_8_算定対象期間_A_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_22']) && !empty($data['insured_period_end_day_22'])){
                if(ctype_digit($data['insured_period_end_month_22'])){
                    if (!checkdate($data['insured_period_end_month_22'], $data['insured_period_end_day_22'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_22','2枚目(続紙)_8_算定対象期間_A_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_23']) && !empty($data['insured_period_end_day_23'])){
                if(ctype_digit($data['insured_period_end_month_23'])){
                    if (!checkdate($data['insured_period_end_month_23'], $data['insured_period_end_day_23'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_23','2枚目(続紙)_8_算定対象期間_A_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['insured_period_end_month_24']) && !empty($data['insured_period_end_day_24'])){
                if(ctype_digit($data['insured_period_end_month_24'])){
                    if (!checkdate($data['insured_period_end_month_24'], $data['insured_period_end_day_24'], '2000')) {
                    $validator->errors()->add('insured_period_end_day_24','2枚目(続紙)_8_算定対象期間_A_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_13']) && !empty($data['salary_payment_period_start_day_13'])){
                if(ctype_digit($data['salary_payment_period_start_month_13'])){
                    if (!checkdate($data['salary_payment_period_start_month_13'], $data['salary_payment_period_start_day_13'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_13','2枚目(続紙)_10_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_14']) && !empty($data['salary_payment_period_start_day_14'])){
                if(ctype_digit($data['salary_payment_period_start_month_14'])){
                    if (!checkdate($data['salary_payment_period_start_month_14'], $data['salary_payment_period_start_day_14'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_14','2枚目(続紙)_10_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_15']) && !empty($data['salary_payment_period_start_day_15'])){
                if(ctype_digit($data['salary_payment_period_start_month_15'])){
                    if (!checkdate($data['salary_payment_period_start_month_15'], $data['salary_payment_period_start_day_15'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_15','2枚目(続紙)_10_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_16']) && !empty($data['salary_payment_period_start_day_16'])){
                if(ctype_digit($data['salary_payment_period_start_month_16'])){
                    if (!checkdate($data['salary_payment_period_start_month_16'], $data['salary_payment_period_start_day_16'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_16','2枚目(続紙)_10_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_17']) && !empty($data['salary_payment_period_start_day_17'])){
                if(ctype_digit($data['salary_payment_period_start_month_17'])){
                    if (!checkdate($data['salary_payment_period_start_month_17'], $data['salary_payment_period_start_day_17'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_17','2枚目(続紙)_10_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_18']) && !empty($data['salary_payment_period_start_day_18'])){
                if(ctype_digit($data['salary_payment_period_start_month_18'])){
                    if (!checkdate($data['salary_payment_period_start_month_18'], $data['salary_payment_period_start_day_18'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_18','2枚目(続紙)_10_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_19']) && !empty($data['salary_payment_period_start_day_19'])){
                if(ctype_digit($data['salary_payment_period_start_month_19'])){
                    if (!checkdate($data['salary_payment_period_start_month_19'], $data['salary_payment_period_start_day_19'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_19','2枚目(続紙)_10_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_20']) && !empty($data['salary_payment_period_start_day_20'])){
                if(ctype_digit($data['salary_payment_period_start_month_20'])){
                    if (!checkdate($data['salary_payment_period_start_month_20'], $data['salary_payment_period_start_day_20'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_20','2枚目(続紙)_10_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_21']) && !empty($data['salary_payment_period_start_day_21'])){
                if(ctype_digit($data['salary_payment_period_start_month_21'])){
                    if (!checkdate($data['salary_payment_period_start_month_21'], $data['salary_payment_period_start_day_21'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_21','2枚目(続紙)_10_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_22']) && !empty($data['salary_payment_period_start_day_22'])){
                if(ctype_digit($data['salary_payment_period_start_month_22'])){
                    if (!checkdate($data['salary_payment_period_start_month_22'], $data['salary_payment_period_start_day_22'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_22','2枚目(続紙)_10_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_23']) && !empty($data['salary_payment_period_start_day_23'])){
                if(ctype_digit($data['salary_payment_period_start_month_23'])){
                    if (!checkdate($data['salary_payment_period_start_month_23'], $data['salary_payment_period_start_day_23'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_23','2枚目(続紙)_10_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_start_month_24']) && !empty($data['salary_payment_period_start_day_24'])){
                if(ctype_digit($data['salary_payment_period_start_month_24'])){
                    if (!checkdate($data['salary_payment_period_start_month_24'], $data['salary_payment_period_start_day_24'], '2000')) {
                    $validator->errors()->add('salary_payment_period_start_day_24','2枚目(続紙)_10_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_13']) && !empty($data['salary_payment_period_end_day_13'])){
                if(ctype_digit($data['salary_payment_period_end_month_13'])){
                    if (!checkdate($data['salary_payment_period_end_month_13'], $data['salary_payment_period_end_day_13'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_13','2枚目(続紙)_10_賃金支払対象期間_終了日付_1行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_14']) && !empty($data['salary_payment_period_end_day_14'])){
                if(ctype_digit($data['salary_payment_period_end_month_14'])){
                    if (!checkdate($data['salary_payment_period_end_month_14'], $data['salary_payment_period_end_day_14'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_14','2枚目(続紙)_10_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_15']) && !empty($data['salary_payment_period_end_day_15'])){
                if(ctype_digit($data['salary_payment_period_end_month_15'])){
                    if (!checkdate($data['salary_payment_period_end_month_15'], $data['salary_payment_period_end_day_15'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_15','2枚目(続紙)_10_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_16']) && !empty($data['salary_payment_period_end_day_16'])){
                if(ctype_digit($data['salary_payment_period_end_month_16'])){
                    if (!checkdate($data['salary_payment_period_end_month_16'], $data['salary_payment_period_end_day_16'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_16','2枚目(続紙)_10_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_17']) && !empty($data['salary_payment_period_end_day_17'])){
                if(ctype_digit($data['salary_payment_period_end_month_17'])){
                    if (!checkdate($data['salary_payment_period_end_month_17'], $data['salary_payment_period_end_day_17'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_17','2枚目(続紙)_10_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_18']) && !empty($data['salary_payment_period_end_day_18'])){
                if(ctype_digit($data['salary_payment_period_end_month_18'])){
                    if (!checkdate($data['salary_payment_period_end_month_18'], $data['salary_payment_period_end_day_18'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_18','2枚目(続紙)_10_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_19']) && !empty($data['salary_payment_period_end_day_19'])){
                if(ctype_digit($data['salary_payment_period_end_month_19'])){
                    if (!checkdate($data['salary_payment_period_end_month_19'], $data['salary_payment_period_end_day_19'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_19','2枚目(続紙)_10_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_20']) && !empty($data['salary_payment_period_end_day_20'])){
                if(ctype_digit($data['salary_payment_period_end_month_20'])){
                    if (!checkdate($data['salary_payment_period_end_month_20'], $data['salary_payment_period_end_day_20'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_20','2枚目(続紙)_10_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_21']) && !empty($data['salary_payment_period_end_day_21'])){
                if(ctype_digit($data['salary_payment_period_end_month_21'])){
                    if (!checkdate($data['salary_payment_period_end_month_21'], $data['salary_payment_period_end_day_21'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_21','2枚目(続紙)_10_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_22']) && !empty($data['salary_payment_period_end_day_22'])){
                if(ctype_digit($data['salary_payment_period_end_month_22'])){
                    if (!checkdate($data['salary_payment_period_end_month_22'], $data['salary_payment_period_end_day_22'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_22','2枚目(続紙)_10_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_23']) && !empty($data['salary_payment_period_end_day_23'])){
                if(ctype_digit($data['salary_payment_period_end_month_23'])){
                    if (!checkdate($data['salary_payment_period_end_month_23'], $data['salary_payment_period_end_day_23'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_23','2枚目(続紙)_10_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                    }
                }
            }
        
            if(!empty($data['salary_payment_period_end_month_24']) && !empty($data['salary_payment_period_end_day_24'])){
                if(ctype_digit($data['salary_payment_period_end_month_24'])){
                    if (!checkdate($data['salary_payment_period_end_month_24'], $data['salary_payment_period_end_day_24'], '2000')) {
                    $validator->errors()->add('salary_payment_period_end_day_24','2枚目(続紙)_10_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                    }
                }
            }
        });
    }

    
    public function messages()
    {
        return[
            'the_day_after_retirement_date_month.required_with' => '2枚目_算定対象期間_離職日の翌日_月を入力してください。',
            'the_day_after_retirement_date_day.required_with' => '2枚目_算定対象期間_離職日の翌日_日を入力してください。',
            'insured_period_start_month.required_with' => '2枚目_8_算定対象期間_A_開始月_1行目を入力してください。',
            'insured_period_start_month_1.required_with' => '2枚目_8_算定対象期間_A_開始月_2行目を入力してください。',
            'insured_period_start_month_2.required_with' => '2枚目_8_算定対象期間_A_開始月_3行目を入力してください。',
            'insured_period_start_month_3.required_with' => '2枚目_8_算定対象期間_A_開始月_4行目を入力してください。',
            'insured_period_start_month_4.required_with' => '2枚目_8_算定対象期間_A_開始月_5行目を入力してください。',
            'insured_period_start_month_5.required_with' => '2枚目_8_算定対象期間_A_開始月_6行目を入力してください。',
            'insured_period_start_month_6.required_with' => '2枚目_8_算定対象期間_A_開始月_7行目を入力してください。',
            'insured_period_start_month_7.required_with' => '2枚目_8_算定対象期間_A_開始月_8行目を入力してください。',
            'insured_period_start_month_8.required_with' => '2枚目_8_算定対象期間_A_開始月_9行目を入力してください。',
            'insured_period_start_month_9.required_with' => '2枚目_8_算定対象期間_A_開始月_10行目を入力してください。',
            'insured_period_start_month_10.required_with' => '2枚目_8_算定対象期間_A_開始月_11行目を入力してください。',
            'insured_period_start_month_11.required_with' => '2枚目_8_算定対象期間_A_開始月_12行目を入力してください。',
            'insured_period_start_month_12.required_with' => '2枚目_8_算定対象期間_A_開始月_13行目を入力してください。',
            'insured_period_start_day.required_with' => '2枚目_8_算定対象期間_A_開始日_1行目を入力してください。',
            'insured_period_start_day_1.required_with' => '2枚目_8_算定対象期間_A_開始日_2行目を入力してください。',
            'insured_period_start_day_2.required_with' => '2枚目_8_算定対象期間_A_開始日_3行目を入力してください。',
            'insured_period_start_day_3.required_with' => '2枚目_8_算定対象期間_A_開始日_4行目を入力してください。',
            'insured_period_start_day_4.required_with' => '2枚目_8_算定対象期間_A_開始日_5行目を入力してください。',
            'insured_period_start_day_5.required_with' => '2枚目_8_算定対象期間_A_開始日_6行目を入力してください。',
            'insured_period_start_day_6.required_with' => '2枚目_8_算定対象期間_A_開始日_7行目を入力してください。',
            'insured_period_start_day_7.required_with' => '2枚目_8_算定対象期間_A_開始日_8行目を入力してください。',
            'insured_period_start_day_8.required_with' => '2枚目_8_算定対象期間_A_開始日_9行目を入力してください。',
            'insured_period_start_day_9.required_with' => '2枚目_8_算定対象期間_A_開始日_10行目を入力してください。',
            'insured_period_start_day_10.required_with' => '2枚目_8_算定対象期間_A_開始日_11行目を入力してください。',
            'insured_period_start_day_11.required_with' => '2枚目_8_算定対象期間_A_開始日_12行目を入力してください。',
            'insured_period_start_day_12.required_with' => '2枚目_8_算定対象期間_A_開始日_13行目を入力してください。',
            'insured_period_end_month_1.required_with' => '2枚目_8_算定対象期間_A_終了月_2行目を入力してください。',
            'insured_period_end_month_2.required_with' => '2枚目_8_算定対象期間_A_終了月_3行目を入力してください。',
            'insured_period_end_month_3.required_with' => '2枚目_8_算定対象期間_A_終了月_4行目を入力してください。',
            'insured_period_end_month_4.required_with' => '2枚目_8_算定対象期間_A_終了月_5行目を入力してください。',
            'insured_period_end_month_5.required_with' => '2枚目_8_算定対象期間_A_終了月_6行目を入力してください。',
            'insured_period_end_month_6.required_with' => '2枚目_8_算定対象期間_A_終了月_7行目を入力してください。',
            'insured_period_end_month_7.required_with' => '2枚目_8_算定対象期間_A_終了月_8行目を入力してください。',
            'insured_period_end_month_8.required_with' => '2枚目_8_算定対象期間_A_終了月_9行目を入力してください。',
            'insured_period_end_month_9.required_with' => '2枚目_8_算定対象期間_A_終了月_10行目を入力してください。',
            'insured_period_end_month_10.required_with' => '2枚目_8_算定対象期間_A_終了月_11行目を入力してください。',
            'insured_period_end_month_11.required_with' => '2枚目_8_算定対象期間_A_終了月_12行目を入力してください。',
            'insured_period_end_month_12.required_with' => '2枚目_8_算定対象期間_A_終了月_13行目を入力してください。',
            'insured_period_end_day_1.required_with' => '2枚目_8_算定対象期間_A_終了日_2行目を入力してください。',
            'insured_period_end_day_2.required_with' => '2枚目_8_算定対象期間_A_終了日_3行目を入力してください。',
            'insured_period_end_day_3.required_with' => '2枚目_8_算定対象期間_A_終了日_4行目を入力してください。',
            'insured_period_end_day_4.required_with' => '2枚目_8_算定対象期間_A_終了日_5行目を入力してください。',
            'insured_period_end_day_5.required_with' => '2枚目_8_算定対象期間_A_終了日_6行目を入力してください。',
            'insured_period_end_day_6.required_with' => '2枚目_8_算定対象期間_A_終了日_7行目を入力してください。',
            'insured_period_end_day_7.required_with' => '2枚目_8_算定対象期間_A_終了日_8行目を入力してください。',
            'insured_period_end_day_8.required_with' => '2枚目_8_算定対象期間_A_終了日_9行目を入力してください。',
            'insured_period_end_day_9.required_with' => '2枚目_8_算定対象期間_A_終了日_10行目を入力してください。',
            'insured_period_end_day_10.required_with' => '2枚目_8_算定対象期間_A_終了日_11行目を入力してください。',
            'insured_period_end_day_11.required_with' => '2枚目_8_算定対象期間_A_終了日_12行目を入力してください。',
            'insured_period_end_day_12.required_with' => '2枚目_8_算定対象期間_A_終了日_13行目を入力してください。',
            'salary_payment_period_start_month.required_with' => '2枚目_10_賃金支払対象期間_開始月_1行目を入力してください。',
            'salary_payment_period_start_month_1.required_with' => '2枚目_10_賃金支払対象期間_開始月_2行目を入力してください。',
            'salary_payment_period_start_month_2.required_with' => '2枚目_10_賃金支払対象期間_開始月_3行目を入力してください。',
            'salary_payment_period_start_month_3.required_with' => '2枚目_10_賃金支払対象期間_開始月_4行目を入力してください。',
            'salary_payment_period_start_month_4.required_with' => '2枚目_10_賃金支払対象期間_開始月_5行目を入力してください。',
            'salary_payment_period_start_month_5.required_with' => '2枚目_10_賃金支払対象期間_開始月_6行目を入力してください。',
            'salary_payment_period_start_month_6.required_with' => '2枚目_10_賃金支払対象期間_開始月_7行目を入力してください。',
            'salary_payment_period_start_month_7.required_with' => '2枚目_10_賃金支払対象期間_開始月_8行目を入力してください。',
            'salary_payment_period_start_month_8.required_with' => '2枚目_10_賃金支払対象期間_開始月_9行目を入力してください。',
            'salary_payment_period_start_month_9.required_with' => '2枚目_10_賃金支払対象期間_開始月_10行目を入力してください。',
            'salary_payment_period_start_month_10.required_with' => '2枚目_10_賃金支払対象期間_開始月_11行目を入力してください。',
            'salary_payment_period_start_month_11.required_with' => '2枚目_10_賃金支払対象期間_開始月_12行目を入力してください。',
            'salary_payment_period_start_month_12.required_with' => '2枚目_10_賃金支払対象期間_開始月_13行目を入力してください。',
            'salary_payment_period_start_day.required_with' => '2枚目_10_賃金支払対象期間_開始日_1行目を入力してください。',
            'salary_payment_period_start_day_1.required_with' => '2枚目_10_賃金支払対象期間_開始日_2行目を入力してください。',
            'salary_payment_period_start_day_2.required_with' => '2枚目_10_賃金支払対象期間_開始日_3行目を入力してください。',
            'salary_payment_period_start_day_3.required_with' => '2枚目_10_賃金支払対象期間_開始日_4行目を入力してください。',
            'salary_payment_period_start_day_4.required_with' => '2枚目_10_賃金支払対象期間_開始日_5行目を入力してください。',
            'salary_payment_period_start_day_5.required_with' => '2枚目_10_賃金支払対象期間_開始日_6行目を入力してください。',
            'salary_payment_period_start_day_6.required_with' => '2枚目_10_賃金支払対象期間_開始日_7行目を入力してください。',
            'salary_payment_period_start_day_7.required_with' => '2枚目_10_賃金支払対象期間_開始日_8行目を入力してください。',
            'salary_payment_period_start_day_8.required_with' => '2枚目_10_賃金支払対象期間_開始日_9行目を入力してください。',
            'salary_payment_period_start_day_9.required_with' => '2枚目_10_賃金支払対象期間_開始日_10行目を入力してください。',
            'salary_payment_period_start_day_10.required_with' => '2枚目_10_賃金支払対象期間_開始日_11行目を入力してください。',
            'salary_payment_period_start_day_11.required_with' => '2枚目_10_賃金支払対象期間_開始日_12行目を入力してください。',
            'salary_payment_period_start_day_12.required_with' => '2枚目_10_賃金支払対象期間_開始日_13行目を入力してください。',
            'salary_payment_period_end_month_1.required_with' => '2枚目_10_賃金支払対象期間_終了月_2行目を入力してください。',
            'salary_payment_period_end_month_2.required_with' => '2枚目_10_賃金支払対象期間_終了月_3行目を入力してください。',
            'salary_payment_period_end_month_3.required_with' => '2枚目_10_賃金支払対象期間_終了月_4行目を入力してください。',
            'salary_payment_period_end_month_4.required_with' => '2枚目_10_賃金支払対象期間_終了月_5行目を入力してください。',
            'salary_payment_period_end_month_5.required_with' => '2枚目_10_賃金支払対象期間_終了月_6行目を入力してください。',
            'salary_payment_period_end_month_6.required_with' => '2枚目_10_賃金支払対象期間_終了月_7行目を入力してください。',
            'salary_payment_period_end_month_7.required_with' => '2枚目_10_賃金支払対象期間_終了月_8行目を入力してください。',
            'salary_payment_period_end_month_8.required_with' => '2枚目_10_賃金支払対象期間_終了月_9行目を入力してください。',
            'salary_payment_period_end_month_9.required_with' => '2枚目_10_賃金支払対象期間_終了月_10行目を入力してください。',
            'salary_payment_period_end_month_10.required_with' => '2枚目_10_賃金支払対象期間_終了月_11行目を入力してください。',
            'salary_payment_period_end_month_11.required_with' => '2枚目_10_賃金支払対象期間_終了月_12行目を入力してください。',
            'salary_payment_period_end_month_12.required_with' => '2枚目_10_賃金支払対象期間_終了月_13行目を入力してください。',
            'salary_payment_period_end_day_1.required_with' => '2枚目_10_賃金支払対象期間_終了日_2行目を入力してください。',
            'salary_payment_period_end_day_2.required_with' => '2枚目_10_賃金支払対象期間_終了日_3行目を入力してください。',
            'salary_payment_period_end_day_3.required_with' => '2枚目_10_賃金支払対象期間_終了日_4行目を入力してください。',
            'salary_payment_period_end_day_4.required_with' => '2枚目_10_賃金支払対象期間_終了日_5行目を入力してください。',
            'salary_payment_period_end_day_5.required_with' => '2枚目_10_賃金支払対象期間_終了日_6行目を入力してください。',
            'salary_payment_period_end_day_6.required_with' => '2枚目_10_賃金支払対象期間_終了日_7行目を入力してください。',
            'salary_payment_period_end_day_7.required_with' => '2枚目_10_賃金支払対象期間_終了日_8行目を入力してください。',
            'salary_payment_period_end_day_8.required_with' => '2枚目_10_賃金支払対象期間_終了日_9行目を入力してください。',
            'salary_payment_period_end_day_9.required_with' => '2枚目_10_賃金支払対象期間_終了日_10行目を入力してください。',
            'salary_payment_period_end_day_10.required_with' => '2枚目_10_賃金支払対象期間_終了日_11行目を入力してください。',
            'salary_payment_period_end_day_11.required_with' => '2枚目_10_賃金支払対象期間_終了日_12行目を入力してください。',
            'salary_payment_period_end_day_12.required_with' => '2枚目_10_賃金支払対象期間_終了日_13行目を入力してください。',
            'insured_period_start_month_13.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_1行目を入力してください。',
            'insured_period_start_month_14.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_2行目を入力してください。',
            'insured_period_start_month_15.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_3行目を入力してください。',
            'insured_period_start_month_16.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_4行目を入力してください。',
            'insured_period_start_month_17.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_5行目を入力してください。',
            'insured_period_start_month_18.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_6行目を入力してください。',
            'insured_period_start_month_19.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_7行目を入力してください。',
            'insured_period_start_month_20.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_8行目を入力してください。',
            'insured_period_start_month_21.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_9行目を入力してください。',
            'insured_period_start_month_22.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_10行目を入力してください。',
            'insured_period_start_month_23.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_11行目を入力してください。',
            'insured_period_start_month_24.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始月_12行目を入力してください。',
            'insured_period_start_day_13.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_1行目を入力してください。',
            'insured_period_start_day_14.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_2行目を入力してください。',
            'insured_period_start_day_15.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_3行目を入力してください。',
            'insured_period_start_day_16.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_4行目を入力してください。',
            'insured_period_start_day_17.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_5行目を入力してください。',
            'insured_period_start_day_18.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_6行目を入力してください。',
            'insured_period_start_day_19.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_7行目を入力してください。',
            'insured_period_start_day_20.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_8行目を入力してください。',
            'insured_period_start_day_21.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_9行目を入力してください。',
            'insured_period_start_day_22.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_10行目を入力してください。',
            'insured_period_start_day_23.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_11行目を入力してください。',
            'insured_period_start_day_24.required_with' => '2枚目(続紙)_8_算定対象期間_A_開始日_12行目を入力してください。',
            'insured_period_end_month_13.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_1行目を入力してください。',
            'insured_period_end_month_14.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_2行目を入力してください。',
            'insured_period_end_month_15.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_3行目を入力してください。',
            'insured_period_end_month_16.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_4行目を入力してください。',
            'insured_period_end_month_17.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_5行目を入力してください。',
            'insured_period_end_month_18.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_6行目を入力してください。',
            'insured_period_end_month_19.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_7行目を入力してください。',
            'insured_period_end_month_20.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_8行目を入力してください。',
            'insured_period_end_month_21.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_9行目を入力してください。',
            'insured_period_end_month_22.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_10行目を入力してください。',
            'insured_period_end_month_23.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_11行目を入力してください。',
            'insured_period_end_month_24.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了月_12行目を入力してください。',
            'insured_period_end_day_13.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_1行目を入力してください。',
            'insured_period_end_day_14.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_2行目を入力してください。',
            'insured_period_end_day_15.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_3行目を入力してください。',
            'insured_period_end_day_16.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_4行目を入力してください。',
            'insured_period_end_day_17.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_5行目を入力してください。',
            'insured_period_end_day_18.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_6行目を入力してください。',
            'insured_period_end_day_19.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_7行目を入力してください。',
            'insured_period_end_day_20.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_8行目を入力してください。',
            'insured_period_end_day_21.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_9行目を入力してください。',
            'insured_period_end_day_22.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_10行目を入力してください。',
            'insured_period_end_day_23.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_11行目を入力してください。',
            'insured_period_end_day_24.required_with' => '2枚目(続紙)_8_算定対象期間_A_終了日_12行目を入力してください。',
            'salary_payment_period_start_month_13.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_1行目を入力してください。',
            'salary_payment_period_start_month_14.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_2行目を入力してください。',
            'salary_payment_period_start_month_15.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_3行目を入力してください。',
            'salary_payment_period_start_month_16.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_4行目を入力してください。',
            'salary_payment_period_start_month_17.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_5行目を入力してください。',
            'salary_payment_period_start_month_18.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_6行目を入力してください。',
            'salary_payment_period_start_month_19.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_7行目を入力してください。',
            'salary_payment_period_start_month_20.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_8行目を入力してください。',
            'salary_payment_period_start_month_21.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_9行目を入力してください。',
            'salary_payment_period_start_month_22.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_10行目を入力してください。',
            'salary_payment_period_start_month_23.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_11行目を入力してください。',
            'salary_payment_period_start_month_24.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始月_12行目を入力してください。',
            'salary_payment_period_start_day_13.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_1行目を入力してください。',
            'salary_payment_period_start_day_14.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_2行目を入力してください。',
            'salary_payment_period_start_day_15.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_3行目を入力してください。',
            'salary_payment_period_start_day_16.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_4行目を入力してください。',
            'salary_payment_period_start_day_17.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_5行目を入力してください。',
            'salary_payment_period_start_day_18.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_6行目を入力してください。',
            'salary_payment_period_start_day_19.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_7行目を入力してください。',
            'salary_payment_period_start_day_20.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_8行目を入力してください。',
            'salary_payment_period_start_day_21.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_9行目を入力してください。',
            'salary_payment_period_start_day_22.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_10行目を入力してください。',
            'salary_payment_period_start_day_23.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_11行目を入力してください。',
            'salary_payment_period_start_day_24.required_with' => '2枚目(続紙)_10_賃金支払対象期間_開始日_12行目を入力してください。',
            'salary_payment_period_end_month_13.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_1行目を入力してください。',
            'salary_payment_period_end_month_14.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_2行目を入力してください。',
            'salary_payment_period_end_month_15.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_3行目を入力してください。',
            'salary_payment_period_end_month_16.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_4行目を入力してください。',
            'salary_payment_period_end_month_17.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_5行目を入力してください。',
            'salary_payment_period_end_month_18.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_6行目を入力してください。',
            'salary_payment_period_end_month_19.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_7行目を入力してください。',
            'salary_payment_period_end_month_20.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_8行目を入力してください。',
            'salary_payment_period_end_month_21.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_9行目を入力してください。',
            'salary_payment_period_end_month_22.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_10行目を入力してください。',
            'salary_payment_period_end_month_23.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_11行目を入力してください。',
            'salary_payment_period_end_month_24.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了月_12行目を入力してください。',
            'salary_payment_period_end_day_13.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_1行目を入力してください。',
            'salary_payment_period_end_day_14.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_2行目を入力してください。',
            'salary_payment_period_end_day_15.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_3行目を入力してください。',
            'salary_payment_period_end_day_16.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_4行目を入力してください。',
            'salary_payment_period_end_day_17.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_5行目を入力してください。',
            'salary_payment_period_end_day_18.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_6行目を入力してください。',
            'salary_payment_period_end_day_19.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_7行目を入力してください。',
            'salary_payment_period_end_day_20.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_8行目を入力してください。',
            'salary_payment_period_end_day_21.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_9行目を入力してください。',
            'salary_payment_period_end_day_22.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_10行目を入力してください。',
            'salary_payment_period_end_day_23.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_11行目を入力してください。',
            'salary_payment_period_end_day_24.required_with' => '2枚目(続紙)_10_賃金支払対象期間_終了日_12行目を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '2枚目_3_離職者氏名',
            'name_kana' => '2枚目_3_離職者氏名（フリガナ）',
            'branch_name' => '2枚目_5_事業所名称',
            'branch_address' => '2枚目_5_事業所所在地',
            'branch_tel_area_code' => '2枚目_5_事業所電話番号_市外局番',
            'branch_tel_city_code' => '2枚目_5_事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '2枚目_5_事業所電話番号_加入者番号',
            'employee_post_code_former' => '2枚目_6_離職者の住所又は居所_郵便番号3桁',
            'employee_post_code_latter' => '2枚目_6_離職者の住所又は居所_郵便番号4桁',
            'employee_tel_area_code' => '2枚目_6_離職者の住所又は居所_電話番号_市外局番',
            'employee_tel_city_code' => '2枚目_6_離職者の住所又は居所_電話番号_市内局番',
            'employee_tel_subscriber_code' => '2枚目_6_離職者の住所又は居所_電話番号_加入者番号',
            'company_name' => '2枚目_事業主氏名_会社名',
            'employer_managerial_position_name' => '2枚目_事業主氏名_会社名',
            'the_day_after_retirement_date_month' => '2枚目_算定対象期間_離職日の翌日_月',
            'the_day_after_retirement_date_day' => '2枚目_算定対象期間_離職日の翌日_日',
            'insured_period_start_month' => '2枚目_8_算定対象期間_A_開始月_1行目',
            'insured_period_start_day' => '2枚目_8_算定対象期間_A_開始日_1行目',
            'basic_days_for_salary_payment_of_insured_period' => '2枚目_9_賃金支払基礎日数_1行目',
            'salary_payment_period_start_month' => '2枚目_10_賃金支払対象期間_開始月_1行目',
            'salary_payment_period_start_day' => '2枚目_10_賃金支払対象期間_開始日_1行目',
            'basic_days_of_salary_payment_period' => '2枚目_11_基礎日数_1行目',
            'salary_amount_A' => '2枚目_12_賃金額_A_1行目',
            'salary_amount_B' => '2枚目_12_賃金額_B_1行目',
            'salary_amount_total' => '2枚目_12_賃金額_計_1行目',
            'memo' => '2枚目_13_備考_1行目',
            'insured_period_start_month_1' => '2枚目_8_算定対象期間_A_開始月_2行目',
            'insured_period_start_day_1' => '2枚目_8_算定対象期間_A_開始日_2行目',
            'insured_period_end_month_1' => '2枚目_8_算定対象期間_A_終了月_2行目',
            'insured_period_end_day_1' => '2枚目_8_算定対象期間_A_終了日_2行目',
            'insured_period_month_1' => '2枚目_8‗算定対象期間_B_2行目',
            'basic_days_for_salary_payment_of_insured_period_1' => '2枚目_9_賃金支払基礎日数_2行目',
            'salary_payment_period_start_month_1' => '2枚目_10_賃金支払対象期間_開始月_2行目',
            'salary_payment_period_start_day_1' => '2枚目_10_賃金支払対象期間_開始日_2行目',
            'salary_payment_period_end_month_1' => '2枚目_10_賃金支払対象期間_終了月_2行目',
            'salary_payment_period_end_day_1' => '2枚目_10_賃金支払対象期間_終了日_2行目',
            'basic_days_of_salary_payment_period_1' => '2枚目_11_基礎日数_2行目',
            'salary_amount_A_1' => '2枚目_12_賃金額_A_2行目',
            'salary_amount_B_1' => '2枚目_12_賃金額_B_2行目',
            'salary_amount_total_1' => '2枚目_12_賃金額_計_2行目',
            'memo_1' => '2枚目_13_備考_2行目',
            'insured_period_start_month_2' => '2枚目_8_算定対象期間_A_開始月_3行目',
            'insured_period_start_day_2' => '2枚目_8_算定対象期間_A_開始日_3行目',
            'insured_period_end_month_2' => '2枚目_8_算定対象期間_A_終了月_3行目',
            'insured_period_end_day_2' => '2枚目_8_算定対象期間_A_終了日_3行目',
            'insured_period_month_2' => '2枚目_8‗算定対象期間_B_3行目',
            'basic_days_for_salary_payment_of_insured_period_2' => '2枚目_9_賃金支払基礎日数_3行目',
            'salary_payment_period_start_month_2' => '2枚目_10_賃金支払対象期間_開始月_3行目',
            'salary_payment_period_start_day_2' => '2枚目_10_賃金支払対象期間_開始日_3行目',
            'salary_payment_period_end_month_2' => '2枚目_10_賃金支払対象期間_終了月_3行目',
            'salary_payment_period_end_day_2' => '2枚目_10_賃金支払対象期間_終了日_3行目',
            'basic_days_of_salary_payment_period_2' => '2枚目_11_基礎日数_3行目',
            'salary_amount_A_2' => '2枚目_12_賃金額_A_3行目',
            'salary_amount_B_2' => '2枚目_12_賃金額_B_3行目',
            'salary_amount_total_2' => '2枚目_12_賃金額_計_3行目',
            'memo_2' => '2枚目_13_備考_3行目',
            'insured_period_start_month_3' => '2枚目_8_算定対象期間_A_開始月_4行目',
            'insured_period_start_day_3' => '2枚目_8_算定対象期間_A_開始日_4行目',
            'insured_period_end_month_3' => '2枚目_8_算定対象期間_A_終了月_4行目',
            'insured_period_end_day_3' => '2枚目_8_算定対象期間_A_終了日_4行目',
            'insured_period_month_3' => '2枚目_8‗算定対象期間_B_4行目',
            'basic_days_for_salary_payment_of_insured_period_3' => '2枚目_9_賃金支払基礎日数_4行目',
            'salary_payment_period_start_month_3' => '2枚目_10_賃金支払対象期間_開始月_4行目',
            'salary_payment_period_start_day_3' => '2枚目_10_賃金支払対象期間_開始日_4行目',
            'salary_payment_period_end_month_3' => '2枚目_10_賃金支払対象期間_終了月_4行目',
            'salary_payment_period_end_day_3' => '2枚目_10_賃金支払対象期間_終了日_4行目',
            'basic_days_of_salary_payment_period_3' => '2枚目_11_基礎日数_4行目',
            'salary_amount_A_3' => '2枚目_12_賃金額_A_4行目',
            'salary_amount_B_3' => '2枚目_12_賃金額_B_4行目',
            'salary_amount_total_3' => '2枚目_12_賃金額_計_4行目',
            'memo_3' => '2枚目_13_備考_4行目',
            'insured_period_start_month_4' => '2枚目_8_算定対象期間_A_開始月_5行目',
            'insured_period_start_day_4' => '2枚目_8_算定対象期間_A_開始日_5行目',
            'insured_period_end_month_4' => '2枚目_8_算定対象期間_A_終了月_5行目',
            'insured_period_end_day_4' => '2枚目_8_算定対象期間_A_終了日_5行目',
            'insured_period_month_4' => '2枚目_8‗算定対象期間_B_5行目',
            'basic_days_for_salary_payment_of_insured_period_4' => '2枚目_9_賃金支払基礎日数_5行目',
            'salary_payment_period_start_month_4' => '2枚目_10_賃金支払対象期間_開始月_5行目',
            'salary_payment_period_start_day_4' => '2枚目_10_賃金支払対象期間_開始日_5行目',
            'salary_payment_period_end_month_4' => '2枚目_10_賃金支払対象期間_終了月_5行目',
            'salary_payment_period_end_day_4' => '2枚目_10_賃金支払対象期間_終了日_5行目',
            'basic_days_of_salary_payment_period_4' => '2枚目_11_基礎日数_5行目',
            'salary_amount_A_4' => '2枚目_12_賃金額_A_5行目',
            'salary_amount_B_4' => '2枚目_12_賃金額_B_5行目',
            'salary_amount_total_4' => '2枚目_12_賃金額_計_5行目',
            'memo_4' => '2枚目_13_備考_5行目',
            'insured_period_start_month_5' => '2枚目_8_算定対象期間_A_開始月_6行目',
            'insured_period_start_day_5' => '2枚目_8_算定対象期間_A_開始日_6行目',
            'insured_period_end_month_5' => '2枚目_8_算定対象期間_A_終了月_6行目',
            'insured_period_end_day_5' => '2枚目_8_算定対象期間_A_終了日_6行目',
            'insured_period_month_5' => '2枚目_8‗算定対象期間_B_6行目',
            'basic_days_for_salary_payment_of_insured_period_5' => '2枚目_9_賃金支払基礎日数_6行目',
            'salary_payment_period_start_month_5' => '2枚目_10_賃金支払対象期間_開始月_6行目',
            'salary_payment_period_start_day_5' => '2枚目_10_賃金支払対象期間_開始日_6行目',
            'salary_payment_period_end_month_5' => '2枚目_10_賃金支払対象期間_終了月_6行目',
            'salary_payment_period_end_day_5' => '2枚目_10_賃金支払対象期間_終了日_6行目',
            'basic_days_of_salary_payment_period_5' => '2枚目_11_基礎日数_6行目',
            'salary_amount_A_5' => '2枚目_12_賃金額_A_6行目',
            'salary_amount_B_5' => '2枚目_12_賃金額_B_6行目',
            'salary_amount_total_5' => '2枚目_12_賃金額_計_6行目',
            'memo_5' => '2枚目_13_備考_6行目',
            'insured_period_start_month_6' => '2枚目_8_算定対象期間_A_開始月_7行目',
            'insured_period_start_day_6' => '2枚目_8_算定対象期間_A_開始日_7行目',
            'insured_period_end_month_6' => '2枚目_8_算定対象期間_A_終了月_7行目',
            'insured_period_end_day_6' => '2枚目_8_算定対象期間_A_終了日_7行目',
            'insured_period_month_6' => '2枚目_8‗算定対象期間_B_7行目',
            'basic_days_for_salary_payment_of_insured_period_6' => '2枚目_9_賃金支払基礎日数_7行目',
            'salary_payment_period_start_month_6' => '2枚目_10_賃金支払対象期間_開始月_7行目',
            'salary_payment_period_start_day_6' => '2枚目_10_賃金支払対象期間_開始日_7行目',
            'salary_payment_period_end_month_6' => '2枚目_10_賃金支払対象期間_終了月_7行目',
            'salary_payment_period_end_day_6' => '2枚目_10_賃金支払対象期間_終了日_7行目',
            'basic_days_of_salary_payment_period_6' => '2枚目_11_基礎日数_7行目',
            'salary_amount_A_6' => '2枚目_12_賃金額_A_7行目',
            'salary_amount_B_6' => '2枚目_12_賃金額_B_7行目',
            'salary_amount_total_6' => '2枚目_12_賃金額_計_7行目',
            'memo_6' => '2枚目_13_備考_7行目',
            'insured_period_start_month_7' => '2枚目_8_算定対象期間_A_開始月_8行目',
            'insured_period_start_day_7' => '2枚目_8_算定対象期間_A_開始日_8行目',
            'insured_period_end_month_7' => '2枚目_8_算定対象期間_A_終了月_8行目',
            'insured_period_end_day_7' => '2枚目_8_算定対象期間_A_終了日_8行目',
            'insured_period_month_7' => '2枚目_8‗算定対象期間_B_8行目',
            'basic_days_for_salary_payment_of_insured_period_7' => '2枚目_9_賃金支払基礎日数_8行目',
            'salary_payment_period_start_month_7' => '2枚目_10_賃金支払対象期間_開始月_8行目',
            'salary_payment_period_start_day_7' => '2枚目_10_賃金支払対象期間_開始日_8行目',
            'salary_payment_period_end_month_7' => '2枚目_10_賃金支払対象期間_終了月_8行目',
            'salary_payment_period_end_day_7' => '2枚目_10_賃金支払対象期間_終了日_8行目',
            'basic_days_of_salary_payment_period_7' => '2枚目_11_基礎日数_8行目',
            'salary_amount_A_7' => '2枚目_12_賃金額_A_8行目',
            'salary_amount_B_7' => '2枚目_12_賃金額_B_8行目',
            'salary_amount_total_7' => '2枚目_12_賃金額_計_8行目',
            'memo_7' => '2枚目_13_備考_8行目',
            'insured_period_start_month_8' => '2枚目_8_算定対象期間_A_開始月_9行目',
            'insured_period_start_day_8' => '2枚目_8_算定対象期間_A_開始日_9行目',
            'insured_period_end_month_8' => '2枚目_8_算定対象期間_A_終了月_9行目',
            'insured_period_end_day_8' => '2枚目_8_算定対象期間_A_終了日_9行目',
            'insured_period_month_8' => '2枚目_8‗算定対象期間_B_9行目',
            'basic_days_for_salary_payment_of_insured_period_8' => '2枚目_9_賃金支払基礎日数_9行目',
            'salary_payment_period_start_month_8' => '2枚目_10_賃金支払対象期間_開始月_9行目',
            'salary_payment_period_start_day_8' => '2枚目_10_賃金支払対象期間_開始日_9行目',
            'salary_payment_period_end_month_8' => '2枚目_10_賃金支払対象期間_終了月_9行目',
            'salary_payment_period_end_day_8' => '2枚目_10_賃金支払対象期間_終了日_9行目',
            'basic_days_of_salary_payment_period_8' => '2枚目_11_基礎日数_9行目',
            'salary_amount_A_8' => '2枚目_12_賃金額_A_9行目',
            'salary_amount_B_8' => '2枚目_12_賃金額_B_9行目',
            'salary_amount_total_8' => '2枚目_12_賃金額_計_9行目',
            'memo_8' => '2枚目_13_備考_9行目',
            'insured_period_start_month_9' => '2枚目_8_算定対象期間_A_開始月_10行目',
            'insured_period_start_day_9' => '2枚目_8_算定対象期間_A_開始日_10行目',
            'insured_period_end_month_9' => '2枚目_8_算定対象期間_A_終了月_10行目',
            'insured_period_end_day_9' => '2枚目_8_算定対象期間_A_終了日_10行目',
            'insured_period_month_9' => '2枚目_8‗算定対象期間_B_10行目',
            'basic_days_for_salary_payment_of_insured_period_9' => '2枚目_9_賃金支払基礎日数_10行目',
            'salary_payment_period_start_month_9' => '2枚目_10_賃金支払対象期間_開始月_10行目',
            'salary_payment_period_start_day_9' => '2枚目_10_賃金支払対象期間_開始日_10行目',
            'salary_payment_period_end_month_9' => '2枚目_10_賃金支払対象期間_終了月_10行目',
            'salary_payment_period_end_day_9' => '2枚目_10_賃金支払対象期間_終了日_10行目',
            'basic_days_of_salary_payment_period_9' => '2枚目_11_基礎日数_10行目',
            'salary_amount_A_9' => '2枚目_12_賃金額_A_10行目',
            'salary_amount_B_9' => '2枚目_12_賃金額_B_10行目',
            'salary_amount_total_9' => '2枚目_12_賃金額_計_10行目',
            'memo_9' => '2枚目_13_備考_10行目',
            'insured_period_start_month_10' => '2枚目_8_算定対象期間_A_開始月_11行目',
            'insured_period_start_day_10' => '2枚目_8_算定対象期間_A_開始日_11行目',
            'insured_period_end_month_10' => '2枚目_8_算定対象期間_A_終了月_11行目',
            'insured_period_end_day_10' => '2枚目_8_算定対象期間_A_終了日_11行目',
            'insured_period_month_10' => '2枚目_8‗算定対象期間_B_11行目',
            'basic_days_for_salary_payment_of_insured_period_10' => '2枚目_9_賃金支払基礎日数_11行目',
            'salary_payment_period_start_month_10' => '2枚目_10_賃金支払対象期間_開始月_11行目',
            'salary_payment_period_start_day_10' => '2枚目_10_賃金支払対象期間_開始日_11行目',
            'salary_payment_period_end_month_10' => '2枚目_10_賃金支払対象期間_終了月_11行目',
            'salary_payment_period_end_day_10' => '2枚目_10_賃金支払対象期間_終了日_11行目',
            'basic_days_of_salary_payment_period_10' => '2枚目_11_基礎日数_11行目',
            'salary_amount_A_10' => '2枚目_12_賃金額_A_11行目',
            'salary_amount_B_10' => '2枚目_12_賃金額_B_11行目',
            'salary_amount_total_10' => '2枚目_12_賃金額_計_11行目',
            'memo_10' => '2枚目_13_備考_11行目',
            'insured_period_start_month_11' => '2枚目_8_算定対象期間_A_開始月_12行目',
            'insured_period_start_day_11' => '2枚目_8_算定対象期間_A_開始日_12行目',
            'insured_period_end_month_11' => '2枚目_8_算定対象期間_A_終了月_12行目',
            'insured_period_end_day_11' => '2枚目_8_算定対象期間_A_終了日_12行目',
            'insured_period_month_11' => '2枚目_8‗算定対象期間_B_12行目',
            'basic_days_for_salary_payment_of_insured_period_11' => '2枚目_9_賃金支払基礎日数_12行目',
            'salary_payment_period_start_month_11' => '2枚目_10_賃金支払対象期間_開始月_12行目',
            'salary_payment_period_start_day_11' => '2枚目_10_賃金支払対象期間_開始日_12行目',
            'salary_payment_period_end_month_11' => '2枚目_10_賃金支払対象期間_終了月_12行目',
            'salary_payment_period_end_day_11' => '2枚目_10_賃金支払対象期間_終了日_12行目',
            'basic_days_of_salary_payment_period_11' => '2枚目_11_基礎日数_12行目',
            'salary_amount_A_11' => '2枚目_12_賃金額_A_12行目',
            'salary_amount_B_11' => '2枚目_12_賃金額_B_12行目',
            'salary_amount_total_11' => '2枚目_12_賃金額_計_12行目',
            'memo_11' => '2枚目_13_備考_12行目',
            'insured_period_start_month_12' => '2枚目_8_算定対象期間_A_開始月_13行目',
            'insured_period_start_day_12' => '2枚目_8_算定対象期間_A_開始日_13行目',
            'insured_period_end_month_12' => '2枚目_8_算定対象期間_A_終了月_13行目',
            'insured_period_end_day_12' => '2枚目_8_算定対象期間_A_終了日_13行目',
            'insured_period_month_12' => '2枚目_8‗算定対象期間_B_13行目',
            'basic_days_for_salary_payment_of_insured_period_12' => '2枚目_9_賃金支払基礎日数_13行目',
            'salary_payment_period_start_month_12' => '2枚目_10_賃金支払対象期間_開始月_13行目',
            'salary_payment_period_start_day_12' => '2枚目_10_賃金支払対象期間_開始日_13行目',
            'salary_payment_period_end_month_12' => '2枚目_10_賃金支払対象期間_終了月_13行目',
            'salary_payment_period_end_day_12' => '2枚目_10_賃金支払対象期間_終了日_13行目',
            'basic_days_of_salary_payment_period_12' => '2枚目_11_基礎日数_13行目',
            'salary_amount_A_12' => '2枚目_12_賃金額_A_13行目',
            'salary_amount_B_12' => '2枚目_12_賃金額_B_13行目',
            'salary_amount_total_12' => '2枚目_12_賃金額_計_13行目',
            'memo_12' => '2枚目_13_備考_13行目',
            'insured_period_start_month_13' => '2枚目(続紙)_8_算定対象期間_A_開始月_1行目',
            'insured_period_start_day_13' => '2枚目(続紙)_8_算定対象期間_A_開始日_1行目',
            'insured_period_end_month_13' => '2枚目(続紙)_8_算定対象期間_A_終了月_1行目',
            'insured_period_end_day_13' => '2枚目(続紙)_8_算定対象期間_A_終了日_1行目',
            'insured_period_month_13' => '2枚目(続紙)_8‗算定対象期間_B_1行目',
            'basic_days_for_salary_payment_of_insured_period_13' => '2枚目(続紙)_9_賃金支払基礎日数_1行目',
            'salary_payment_period_start_month_13' => '2枚目(続紙)_10_賃金支払対象期間_開始月_1行目',
            'salary_payment_period_start_day_13' => '2枚目(続紙)_10_賃金支払対象期間_開始日_1行目',
            'salary_payment_period_end_month_13' => '2枚目(続紙)_10_賃金支払対象期間_終了月_1行目',
            'salary_payment_period_end_day_13' => '2枚目(続紙)_10_賃金支払対象期間_終了日_1行目',
            'basic_days_of_salary_payment_period_13' => '2枚目(続紙)_11_基礎日数_1行目',
            'salary_amount_A_13' => '2枚目(続紙)_12_賃金額_A_1行目',
            'salary_amount_B_13' => '2枚目(続紙)_12_賃金額_B_1行目',
            'salary_amount_total_13' => '2枚目(続紙)_12_賃金額_計_1行目',
            'memo_13' => '2枚目(続紙)_13_備考_1行目',
            'insured_period_start_month_14' => '2枚目(続紙)_8_算定対象期間_A_開始月_2行目',
            'insured_period_start_day_14' => '2枚目(続紙)_8_算定対象期間_A_開始日_2行目',
            'insured_period_end_month_14' => '2枚目(続紙)_8_算定対象期間_A_終了月_2行目',
            'insured_period_end_day_14' => '2枚目(続紙)_8_算定対象期間_A_終了日_2行目',
            'insured_period_month_14' => '2枚目(続紙)_8‗算定対象期間_B_2行目',
            'basic_days_for_salary_payment_of_insured_period_14' => '2枚目(続紙)_9_賃金支払基礎日数_2行目',
            'salary_payment_period_start_month_14' => '2枚目(続紙)_10_賃金支払対象期間_開始月_2行目',
            'salary_payment_period_start_day_14' => '2枚目(続紙)_10_賃金支払対象期間_開始日_2行目',
            'salary_payment_period_end_month_14' => '2枚目(続紙)_10_賃金支払対象期間_終了月_2行目',
            'salary_payment_period_end_day_14' => '2枚目(続紙)_10_賃金支払対象期間_終了日_2行目',
            'basic_days_of_salary_payment_period_14' => '2枚目(続紙)_11_基礎日数_2行目',
            'salary_amount_A_14' => '2枚目(続紙)_12_賃金額_A_2行目',
            'salary_amount_B_14' => '2枚目(続紙)_12_賃金額_B_2行目',
            'salary_amount_total_14' => '2枚目(続紙)_12_賃金額_計_2行目',
            'memo_14' => '2枚目(続紙)_13_備考_2行目',
            'insured_period_start_month_15' => '2枚目(続紙)_8_算定対象期間_A_開始月_3行目',
            'insured_period_start_day_15' => '2枚目(続紙)_8_算定対象期間_A_開始日_3行目',
            'insured_period_end_month_15' => '2枚目(続紙)_8_算定対象期間_A_終了月_3行目',
            'insured_period_end_day_15' => '2枚目(続紙)_8_算定対象期間_A_終了日_3行目',
            'insured_period_month_15' => '2枚目(続紙)_8‗算定対象期間_B_3行目',
            'basic_days_for_salary_payment_of_insured_period_15' => '2枚目(続紙)_9_賃金支払基礎日数_3行目',
            'salary_payment_period_start_month_15' => '2枚目(続紙)_10_賃金支払対象期間_開始月_3行目',
            'salary_payment_period_start_day_15' => '2枚目(続紙)_10_賃金支払対象期間_開始日_3行目',
            'salary_payment_period_end_month_15' => '2枚目(続紙)_10_賃金支払対象期間_終了月_3行目',
            'salary_payment_period_end_day_15' => '2枚目(続紙)_10_賃金支払対象期間_終了日_3行目',
            'basic_days_of_salary_payment_period_15' => '2枚目(続紙)_11_基礎日数_3行目',
            'salary_amount_A_15' => '2枚目(続紙)_12_賃金額_A_3行目',
            'salary_amount_B_15' => '2枚目(続紙)_12_賃金額_B_3行目',
            'salary_amount_total_15' => '2枚目(続紙)_12_賃金額_計_3行目',
            'memo_15' => '2枚目(続紙)_13_備考_3行目',
            'insured_period_start_month_16' => '2枚目(続紙)_8_算定対象期間_A_開始月_4行目',
            'insured_period_start_day_16' => '2枚目(続紙)_8_算定対象期間_A_開始日_4行目',
            'insured_period_end_month_16' => '2枚目(続紙)_8_算定対象期間_A_終了月_4行目',
            'insured_period_end_day_16' => '2枚目(続紙)_8_算定対象期間_A_終了日_4行目',
            'insured_period_month_16' => '2枚目(続紙)_8‗算定対象期間_B_4行目',
            'basic_days_for_salary_payment_of_insured_period_16' => '2枚目(続紙)_9_賃金支払基礎日数_4行目',
            'salary_payment_period_start_month_16' => '2枚目(続紙)_10_賃金支払対象期間_開始月_4行目',
            'salary_payment_period_start_day_16' => '2枚目(続紙)_10_賃金支払対象期間_開始日_4行目',
            'salary_payment_period_end_month_16' => '2枚目(続紙)_10_賃金支払対象期間_終了月_4行目',
            'salary_payment_period_end_day_16' => '2枚目(続紙)_10_賃金支払対象期間_終了日_4行目',
            'basic_days_of_salary_payment_period_16' => '2枚目(続紙)_11_基礎日数_4行目',
            'salary_amount_A_16' => '2枚目(続紙)_12_賃金額_A_4行目',
            'salary_amount_B_16' => '2枚目(続紙)_12_賃金額_B_4行目',
            'salary_amount_total_16' => '2枚目(続紙)_12_賃金額_計_4行目',
            'memo_16' => '2枚目(続紙)_13_備考_4行目',
            'insured_period_start_month_17' => '2枚目(続紙)_8_算定対象期間_A_開始月_5行目',
            'insured_period_start_day_17' => '2枚目(続紙)_8_算定対象期間_A_開始日_5行目',
            'insured_period_end_month_17' => '2枚目(続紙)_8_算定対象期間_A_終了月_5行目',
            'insured_period_end_day_17' => '2枚目(続紙)_8_算定対象期間_A_終了日_5行目',
            'insured_period_month_17' => '2枚目(続紙)_8‗算定対象期間_B_5行目',
            'basic_days_for_salary_payment_of_insured_period_17' => '2枚目(続紙)_9_賃金支払基礎日数_5行目',
            'salary_payment_period_start_month_17' => '2枚目(続紙)_10_賃金支払対象期間_開始月_5行目',
            'salary_payment_period_start_day_17' => '2枚目(続紙)_10_賃金支払対象期間_開始日_5行目',
            'salary_payment_period_end_month_17' => '2枚目(続紙)_10_賃金支払対象期間_終了月_5行目',
            'salary_payment_period_end_day_17' => '2枚目(続紙)_10_賃金支払対象期間_終了日_5行目',
            'basic_days_of_salary_payment_period_17' => '2枚目(続紙)_11_基礎日数_5行目',
            'salary_amount_A_17' => '2枚目(続紙)_12_賃金額_A_5行目',
            'salary_amount_B_17' => '2枚目(続紙)_12_賃金額_B_5行目',
            'salary_amount_total_17' => '2枚目(続紙)_12_賃金額_計_5行目',
            'memo_17' => '2枚目(続紙)_13_備考_5行目',
            'insured_period_start_month_18' => '2枚目(続紙)_8_算定対象期間_A_開始月_6行目',
            'insured_period_start_day_18' => '2枚目(続紙)_8_算定対象期間_A_開始日_6行目',
            'insured_period_end_month_18' => '2枚目(続紙)_8_算定対象期間_A_終了月_6行目',
            'insured_period_end_day_18' => '2枚目(続紙)_8_算定対象期間_A_終了日_6行目',
            'insured_period_month_18' => '2枚目(続紙)_8‗算定対象期間_B_6行目',
            'basic_days_for_salary_payment_of_insured_period_18' => '2枚目(続紙)_9_賃金支払基礎日数_6行目',
            'salary_payment_period_start_month_18' => '2枚目(続紙)_10_賃金支払対象期間_開始月_6行目',
            'salary_payment_period_start_day_18' => '2枚目(続紙)_10_賃金支払対象期間_開始日_6行目',
            'salary_payment_period_end_month_18' => '2枚目(続紙)_10_賃金支払対象期間_終了月_6行目',
            'salary_payment_period_end_day_18' => '2枚目(続紙)_10_賃金支払対象期間_終了日_6行目',
            'basic_days_of_salary_payment_period_18' => '2枚目(続紙)_11_基礎日数_6行目',
            'salary_amount_A_18' => '2枚目(続紙)_12_賃金額_A_6行目',
            'salary_amount_B_18' => '2枚目(続紙)_12_賃金額_B_6行目',
            'salary_amount_total_18' => '2枚目(続紙)_12_賃金額_計_6行目',
            'memo_18' => '2枚目(続紙)_13_備考_6行目',
            'insured_period_start_month_19' => '2枚目(続紙)_8_算定対象期間_A_開始月_7行目',
            'insured_period_start_day_19' => '2枚目(続紙)_8_算定対象期間_A_開始日_7行目',
            'insured_period_end_month_19' => '2枚目(続紙)_8_算定対象期間_A_終了月_7行目',
            'insured_period_end_day_19' => '2枚目(続紙)_8_算定対象期間_A_終了日_7行目',
            'insured_period_month_19' => '2枚目(続紙)_8‗算定対象期間_B_7行目',
            'basic_days_for_salary_payment_of_insured_period_19' => '2枚目(続紙)_9_賃金支払基礎日数_7行目',
            'salary_payment_period_start_month_19' => '2枚目(続紙)_10_賃金支払対象期間_開始月_7行目',
            'salary_payment_period_start_day_19' => '2枚目(続紙)_10_賃金支払対象期間_開始日_7行目',
            'salary_payment_period_end_month_19' => '2枚目(続紙)_10_賃金支払対象期間_終了月_7行目',
            'salary_payment_period_end_day_19' => '2枚目(続紙)_10_賃金支払対象期間_終了日_7行目',
            'basic_days_of_salary_payment_period_19' => '2枚目(続紙)_11_基礎日数_7行目',
            'salary_amount_A_19' => '2枚目(続紙)_12_賃金額_A_7行目',
            'salary_amount_B_19' => '2枚目(続紙)_12_賃金額_B_7行目',
            'salary_amount_total_19' => '2枚目(続紙)_12_賃金額_計_7行目',
            'memo_19' => '2枚目(続紙)_13_備考_7行目',
            'insured_period_start_month_20' => '2枚目(続紙)_8_算定対象期間_A_開始月_8行目',
            'insured_period_start_day_20' => '2枚目(続紙)_8_算定対象期間_A_開始日_8行目',
            'insured_period_end_month_20' => '2枚目(続紙)_8_算定対象期間_A_終了月_8行目',
            'insured_period_end_day_20' => '2枚目(続紙)_8_算定対象期間_A_終了日_8行目',
            'insured_period_month_20' => '2枚目(続紙)_8‗算定対象期間_B_8行目',
            'basic_days_for_salary_payment_of_insured_period_20' => '2枚目(続紙)_9_賃金支払基礎日数_8行目',
            'salary_payment_period_start_month_20' => '2枚目(続紙)_10_賃金支払対象期間_開始月_8行目',
            'salary_payment_period_start_day_20' => '2枚目(続紙)_10_賃金支払対象期間_開始日_8行目',
            'salary_payment_period_end_month_20' => '2枚目(続紙)_10_賃金支払対象期間_終了月_8行目',
            'salary_payment_period_end_day_20' => '2枚目(続紙)_10_賃金支払対象期間_終了日_8行目',
            'basic_days_of_salary_payment_period_20' => '2枚目(続紙)_11_基礎日数_8行目',
            'salary_amount_A_20' => '2枚目(続紙)_12_賃金額_A_8行目',
            'salary_amount_B_20' => '2枚目(続紙)_12_賃金額_B_8行目',
            'salary_amount_total_20' => '2枚目(続紙)_12_賃金額_計_8行目',
            'memo_20' => '2枚目(続紙)_13_備考_8行目',
            'insured_period_start_month_21' => '2枚目(続紙)_8_算定対象期間_A_開始月_9行目',
            'insured_period_start_day_21' => '2枚目(続紙)_8_算定対象期間_A_開始日_9行目',
            'insured_period_end_month_21' => '2枚目(続紙)_8_算定対象期間_A_終了月_9行目',
            'insured_period_end_day_21' => '2枚目(続紙)_8_算定対象期間_A_終了日_9行目',
            'insured_period_month_21' => '2枚目(続紙)_8‗算定対象期間_B_9行目',
            'basic_days_for_salary_payment_of_insured_period_21' => '2枚目(続紙)_9_賃金支払基礎日数_9行目',
            'salary_payment_period_start_month_21' => '2枚目(続紙)_10_賃金支払対象期間_開始月_9行目',
            'salary_payment_period_start_day_21' => '2枚目(続紙)_10_賃金支払対象期間_開始日_9行目',
            'salary_payment_period_end_month_21' => '2枚目(続紙)_10_賃金支払対象期間_終了月_9行目',
            'salary_payment_period_end_day_21' => '2枚目(続紙)_10_賃金支払対象期間_終了日_9行目',
            'basic_days_of_salary_payment_period_21' => '2枚目(続紙)_11_基礎日数_9行目',
            'salary_amount_A_21' => '2枚目(続紙)_12_賃金額_A_9行目',
            'salary_amount_B_21' => '2枚目(続紙)_12_賃金額_B_9行目',
            'salary_amount_total_21' => '2枚目(続紙)_12_賃金額_計_9行目',
            'memo_21' => '2枚目(続紙)_13_備考_9行目',
            'insured_period_start_month_22' => '2枚目(続紙)_8_算定対象期間_A_開始月_10行目',
            'insured_period_start_day_22' => '2枚目(続紙)_8_算定対象期間_A_開始日_10行目',
            'insured_period_end_month_22' => '2枚目(続紙)_8_算定対象期間_A_終了月_10行目',
            'insured_period_end_day_22' => '2枚目(続紙)_8_算定対象期間_A_終了日_10行目',
            'insured_period_month_22' => '2枚目(続紙)_8‗算定対象期間_B_10行目',
            'basic_days_for_salary_payment_of_insured_period_22' => '2枚目(続紙)_9_賃金支払基礎日数_10行目',
            'salary_payment_period_start_month_22' => '2枚目(続紙)_10_賃金支払対象期間_開始月_10行目',
            'salary_payment_period_start_day_22' => '2枚目(続紙)_10_賃金支払対象期間_開始日_10行目',
            'salary_payment_period_end_month_22' => '2枚目(続紙)_10_賃金支払対象期間_終了月_10行目',
            'salary_payment_period_end_day_22' => '2枚目(続紙)_10_賃金支払対象期間_終了日_10行目',
            'basic_days_of_salary_payment_period_22' => '2枚目(続紙)_11_基礎日数_10行目',
            'salary_amount_A_22' => '2枚目(続紙)_12_賃金額_A_10行目',
            'salary_amount_B_22' => '2枚目(続紙)_12_賃金額_B_10行目',
            'salary_amount_total_22' => '2枚目(続紙)_12_賃金額_計_10行目',
            'memo_22' => '2枚目(続紙)_13_備考_10行目',
            'insured_period_start_month_23' => '2枚目(続紙)_8_算定対象期間_A_開始月_11行目',
            'insured_period_start_day_23' => '2枚目(続紙)_8_算定対象期間_A_開始日_11行目',
            'insured_period_end_month_23' => '2枚目(続紙)_8_算定対象期間_A_終了月_11行目',
            'insured_period_end_day_23' => '2枚目(続紙)_8_算定対象期間_A_終了日_11行目',
            'insured_period_month_23' => '2枚目(続紙)_8‗算定対象期間_B_11行目',
            'basic_days_for_salary_payment_of_insured_period_23' => '2枚目(続紙)_9_賃金支払基礎日数_11行目',
            'salary_payment_period_start_month_23' => '2枚目(続紙)_10_賃金支払対象期間_開始月_11行目',
            'salary_payment_period_start_day_23' => '2枚目(続紙)_10_賃金支払対象期間_開始日_11行目',
            'salary_payment_period_end_month_23' => '2枚目(続紙)_10_賃金支払対象期間_終了月_11行目',
            'salary_payment_period_end_day_23' => '2枚目(続紙)_10_賃金支払対象期間_終了日_11行目',
            'basic_days_of_salary_payment_period_23' => '2枚目(続紙)_11_基礎日数_11行目',
            'salary_amount_A_23' => '2枚目(続紙)_12_賃金額_A_11行目',
            'salary_amount_B_23' => '2枚目(続紙)_12_賃金額_B_11行目',
            'salary_amount_total_23' => '2枚目(続紙)_12_賃金額_計_11行目',
            'memo_23' => '2枚目(続紙)_13_備考_11行目',
            'insured_period_start_month_24' => '2枚目(続紙)_8_算定対象期間_A_開始月_12行目',
            'insured_period_start_day_24' => '2枚目(続紙)_8_算定対象期間_A_開始日_12行目',
            'insured_period_end_month_24' => '2枚目(続紙)_8_算定対象期間_A_終了月_12行目',
            'insured_period_end_day_24' => '2枚目(続紙)_8_算定対象期間_A_終了日_12行目',
            'insured_period_month_24' => '2枚目(続紙)_8‗算定対象期間_B_12行目',
            'basic_days_for_salary_payment_of_insured_period_24' => '2枚目(続紙)_9_賃金支払基礎日数_12行目',
            'salary_payment_period_start_month_24' => '2枚目(続紙)_10_賃金支払対象期間_開始月_12行目',
            'salary_payment_period_start_day_24' => '2枚目(続紙)_10_賃金支払対象期間_開始日_12行目',
            'salary_payment_period_end_month_24' => '2枚目(続紙)_10_賃金支払対象期間_終了月_12行目',
            'salary_payment_period_end_day_24' => '2枚目(続紙)_10_賃金支払対象期間_終了日_12行目',
            'basic_days_of_salary_payment_period_24' => '2枚目(続紙)_11_基礎日数_12行目',
            'salary_amount_A_24' => '2枚目(続紙)_12_賃金額_A_12行目',
            'salary_amount_B_24' => '2枚目(続紙)_12_賃金額_B_12行目',
            'salary_amount_total_24' => '2枚目(続紙)_12_賃金額_計_12行目',
            'memo_24' => '2枚目(続紙)_13_備考_12行目',
            'salary_notices' => '2枚目_14_特記事項',
            'salary_notices_1' => '2枚目(続紙)_14_特記事項',
            'remarks' => '2枚目_社会保険労務士記載欄下_付記欄',
            'remarks_1' => '2枚目(続紙)_社会保険労務士記載欄下_付記欄',
            'contract_period_reached_limit_contract_period_once' => '2枚目(右)_3(1)_1回の契約期間',
            'contract_period_reached_limit_contract_period_total' => '2枚目(右)_3(1)_通算契約期間',
            'contract_period_reached_limit_contract_renewal_count' => '2枚目(右)_3(1)_契約更新回数',
            'eternal_hire_contract_period_once' => '2枚目(右)_3(2)[1]_1回の契約期間',
            'eternal_hire_contract_period_total' => '2枚目(右)_3(2)[1]_通算契約期間',
            'eternal_hire_contract_renewal_count' => '2枚目(右)_3(2)[1]_契約更新回数',
            'except_eternal_hire_contract_period_once' => '2枚目(右)_3(2)[2]_1回の契約期間',
            'except_eternal_hire_contract_period_total' => '2枚目(右)_3(2)[2]_通算契約期間',
            'except_eternal_hire_contract_renewal_count' => '2枚目(右)_3(2)[2]_契約更新回数',
            'retirement_age' => '2枚目(右)_2_定年による離職',
            'shortened_contract_renewal_reached_limit_flg' => '2枚目(右)_3(1)_契約期間の上限を短縮しその上限到来による離職に該当',
            'contract_renewal_reached_limit_flg' => '2枚目(右)_3(1)_契約期間の上限を設けその上限到来による離職に該当',
            'rehire_contract_renewal_reached_limit_flg' => '2枚目(右)_3(1)_雇用期限到来による離職の有無',
            'contract_period_total_reached_limit_flg' => '2枚目(右)_3(1)_4年6ヵ月以上5年以下の雇用期間の上限到来による離職の有無',
            'contract_period_total_established_before_law_amendment_flg' => '2枚目(右)_3(1)_平成24年8月10日前から定めの有無',
            'eternal_hire_contract_renewal_guarantee_agreement_flg' => '2枚目(右)_3(2)[1]_合意の有無',
            'contract_non_renewal_flg' => '2枚目(右)_3(2)[1]_明示の有無',
            'employment_termination_notice_flg' => '2枚目(右)_3(2)[1]_通知の有無',
            'non_renewal_clause_addition_flg' => '2枚目(右)_3(2)[1]_追加の有無',
            'eternal_hire_contract_renewal_request_type' => '2枚目(右)_3(2)[1]_更新・延長の申出',
            'contract_renewal_guarantee_agreement_flg' => '2枚目(右)_3(2)[2]_合意の有無',
            'no_contract_renewal_flg' => '2枚目(右)_3(2)[2]_明示の有無',
            'contract_renewal_request_type' => '2枚目(右)_3(2)[2]_更新・延長の申出',
            'employment_instructions_type' => '2枚目(右)_3(2)[2]_a,b',
            'education_training_flg' => '2枚目(右)_5(1)[5]_教育訓練の有無',
            'objection_retirement_reason_flg' => '2枚目(右)_16_異議の有無',
            'dispatched_employee_flg' => '2枚目(右)_3(2)_常時雇用の有無',
            'reemployment_request_flg' => '2枚目(右)_2_継続雇用希望の有無',
            'retirement_reason_type' => '2枚目(右)_2_a,b,c',
            'retirement_reason' => '2枚目(右)_2_その他記入欄',
            'retirement_recommendation_reason' => '2枚目(右)_4(3)[2]_その他記入欄',
            'change_office_place' => '2枚目(右)_5(1)[6]_所在地',
            'employee_decision_reasons' => '2枚目(右)_5(1)[7]_その他記入欄',
            'other_reasons' => '2枚目(右)_6_その他記入欄',
            'memo_for_employer' => '2枚目(右)_具体的事情記載欄',
        ];
    }
}
