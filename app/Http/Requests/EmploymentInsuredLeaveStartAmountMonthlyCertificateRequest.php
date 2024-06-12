<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredLeaveStartAmountMonthlyCertificateRequest extends FormRequest
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

        if (isset($data['employee_name_kana'])) {
            $data['employee_name_kana'] = mb_convert_kana($data['employee_name_kana'], 'S');
        }
        if (isset($data['employee_name'])) {
            $data['employee_name'] = mb_convert_kana($data['employee_name'], 'S');
        }
        if (isset($data['headquarters_employee_name'])) {
            $data['headquarters_employee_name'] = mb_convert_kana($data['headquarters_employee_name'], 'S');
        }
        if (isset($data['labor_consultant_submission_agency_name'])) {
            $data['labor_consultant_submission_agency_name'] = mb_convert_kana($data['labor_consultant_submission_agency_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '‐', '―'], '－', $data['employee_address']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
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
        return [
            "file_wage_certificate_or_payment_status" => 'required_unless:radio_file_wage_certificate_or_payment_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_childcare" => 'required_if:radio_file_childcare,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_nursing_care" => 'required_if:radio_file_nursing_care,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'wage_monthly_certificate_on_leave_start' => 'nullable|string|in:1|required_without:wage_certificate_working_hours_shortened_start',
            'wage_certificate_working_hours_shortened_start' => 'nullable|string|in:1',
            'employee_employment_insured_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'employee_employment_insured_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'employee_employment_insured_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'branch_insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'branch_insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'branch_insurance_office_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'employee_name_kana' => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            'employee_name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々々Ａ-Ｚ]+$/u',
            'employee_childcare_caregiver_leave_start_japan_era' => 'string|in:平成,令和',
            'employee_childcare_caregiver_leave_start_era_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'employee_childcare_caregiver_leave_start_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'employee_childcare_caregiver_leave_start_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'branch_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+/u',
            'branch_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            'branch_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employeepost_code_3' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'employeepost_code_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employee_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            'employee_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employee_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employee_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            'headquarters_employee_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+/u',
            'closing_start_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'closing_start_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'applicable_period_start_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1',
            'applicable_period_start_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1',
            'basic_days1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1',
            'payment_period_start_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1',
            'payment_period_basic_days1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_01' => 'nullable|string|max:255',
            'applicable_period_start_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_1',
            'applicable_period_start_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_1',
            'applicable_period_end_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_1',
            'applicable_period_end_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_1',
            'basic_days_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_1',
            'payment_period_start_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_1',
            'payment_period_end_month1_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_1',
            'payment_period_end_day1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_1',
            'payment_period_basic_days1_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_02' => 'nullable|string|max:255',
            'applicable_period_start_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_2',
            'applicable_period_start_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_2',
            'applicable_period_end_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_2',
            'applicable_period_end_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_2',
            'basic_days_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_2',
            'payment_period_start_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_2',
            'payment_period_end_month1_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_2',
            'payment_period_end_day1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_2',
            'payment_period_basic_days1_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_03' => 'nullable|string|max:255',
            'applicable_period_start_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_3',
            'applicable_period_start_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_3',
            'applicable_period_end_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_3',
            'applicable_period_end_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_3',
            'basic_days_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_3',
            'payment_period_start_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_3',
            'payment_period_end_month1_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_3',
            'payment_period_end_day1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_3',
            'payment_period_basic_days1_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_04' => 'nullable|string|max:255',
            'applicable_period_start_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_4',
            'applicable_period_start_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_4',
            'applicable_period_end_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_4',
            'applicable_period_end_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_4',
            'basic_days_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_4',
            'payment_period_start_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_4',
            'payment_period_end_month1_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_4',
            'payment_period_end_day1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_4',
            'payment_period_basic_days1_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_05' => 'nullable|string|max:255',
            'applicable_period_start_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_5',
            'applicable_period_start_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_5',
            'applicable_period_end_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_5',
            'applicable_period_end_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_5',
            'basic_days_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_5',
            'payment_period_start_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_5',
            'payment_period_end_month1_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_5',
            'payment_period_end_day1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_5',
            'payment_period_basic_days1_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_06' => 'nullable|string|max:255',
            'applicable_period_start_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_6',
            'applicable_period_start_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_6',
            'applicable_period_end_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_6',
            'applicable_period_end_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_6',
            'basic_days_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_6',
            'payment_period_start_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_6',
            'payment_period_end_month1_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_6',
            'payment_period_end_day1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_6',
            'payment_period_basic_days1_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_07' => 'nullable|string|max:255',
            'applicable_period_start_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_7',
            'applicable_period_start_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_7',
            'applicable_period_end_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_7',
            'applicable_period_end_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_7',
            'basic_days_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_7',
            'payment_period_start_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_7',
            'payment_period_end_month1_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_7',
            'payment_period_end_day1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_7',
            'payment_period_basic_days1_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_08' => 'nullable|string|max:255',
            'applicable_period_start_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_8',
            'applicable_period_start_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_8',
            'applicable_period_end_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_8',
            'applicable_period_end_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_8',
            'basic_days_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_8',
            'payment_period_start_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_8',
            'payment_period_end_month1_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_8',
            'payment_period_end_day1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_8',
            'payment_period_basic_days1_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_09' => 'nullable|string|max:255',
            'applicable_period_start_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_9',
            'applicable_period_start_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_9',
            'applicable_period_end_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_9',
            'applicable_period_end_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_9',
            'basic_days_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_9',
            'payment_period_start_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_9',
            'payment_period_end_month1_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_9',
            'payment_period_end_day1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_9',
            'payment_period_basic_days1_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_10' => 'nullable|string|max:255',
            'applicable_period_start_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_10',
            'applicable_period_start_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_10',
            'applicable_period_end_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_10',
            'applicable_period_end_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_10',
            'basic_days_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_10',
            'payment_period_start_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_10',
            'payment_period_end_month1_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_10',
            'payment_period_end_day1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_10',
            'payment_period_basic_days1_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_11' => 'nullable|string|max:255',
            'applicable_period_start_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_11',
            'applicable_period_start_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_11',
            'applicable_period_end_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_11',
            'applicable_period_end_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_11',
            'basic_days_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_11',
            'payment_period_start_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_11',
            'payment_period_end_month1_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_11',
            'payment_period_end_day1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_11',
            'payment_period_basic_days1_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_12' => 'nullable|string|max:255',
            'applicable_period_start_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_12',
            'applicable_period_start_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_12',
            'applicable_period_end_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_12',
            'applicable_period_end_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_12',
            'basic_days_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_12',
            'payment_period_start_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_12',
            'payment_period_end_month1_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_12',
            'payment_period_end_day1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_12',
            'payment_period_basic_days1_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_13' => 'nullable|string|max:255',
            'applicable_period_start_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_13',
            'applicable_period_start_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_13',
            'applicable_period_end_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_13',
            'applicable_period_end_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_13',
            'basic_days_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_13',
            'payment_period_start_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_13',
            'payment_period_end_month1_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_13',
            'payment_period_end_day1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_13',
            'payment_period_basic_days1_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_14' => 'nullable|string|max:255',
            'applicable_period_start_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_14',
            'applicable_period_start_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_14',
            'applicable_period_end_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_14',
            'applicable_period_end_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_14',
            'basic_days_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_14',
            'payment_period_start_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_14',
            'payment_period_end_month1_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_14',
            'payment_period_end_day1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_14',
            'payment_period_basic_days1_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_15' => 'nullable|string|max:255',
            'applicable_period_start_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day1_15',
            'applicable_period_start_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month1_15',
            'applicable_period_end_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day1_15',
            'applicable_period_end_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month1_15',
            'basic_days_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day1_15',
            'payment_period_start_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month1_15',
            'payment_period_end_month1_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day1_15',
            'payment_period_end_day1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month1_15',
            'payment_period_basic_days1_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b1_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note1_16' => 'nullable|string|max:255',
            'employee_salary_notices1' => 'nullable|string|max:255',
            'employment_period' => 'string|in:定めなし,定めあり',
            'employment_period_date_japan_era' => 'nullable|string|required_with:employment_period_date_japan_era_year,employment_period_date_month,employment_period_date_day',
            'employment_period_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:employment_period_date_japan_era,employment_period_date_month,employment_period_date_day',
            'employment_period_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:employment_period_date_japan_era_year,employment_period_date_japan_era,employment_period_date_day',
            'employment_period_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:employment_period_date_japan_era_year,employment_period_date_month,employment_period_date_japan_era',
            'employment_period_japan_era_year' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_japan_era_year' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_submission_agency_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'other_notes' => 'nullable|string|max:255',
            // 2枚目
            'applicable_period_start_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_1',
            'applicable_period_start_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_1',
            'applicable_period_end_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_1',
            'applicable_period_end_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_1',
            'basic_days2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_1',
            'payment_period_start_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_1',
            'payment_period_end_month2_1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_1',
            'payment_period_end_day2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_1',
            'payment_period_basic_days2_1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_1' => 'nullable|string|max:255',
            'applicable_period_start_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_2',
            'applicable_period_start_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_2',
            'applicable_period_end_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_2',
            'applicable_period_end_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_2',
            'basic_days2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_2',
            'payment_period_start_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_2',
            'payment_period_end_month2_2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_2',
            'payment_period_end_day2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_2',
            'payment_period_basic_days2_2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_2' => 'nullable|string|max:255',
            'applicable_period_start_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_3',
            'applicable_period_start_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_3',
            'applicable_period_end_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_3',
            'applicable_period_end_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_3',
            'basic_days2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_3',
            'payment_period_start_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_3',
            'payment_period_end_month2_3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_3',
            'payment_period_end_day2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_3',
            'payment_period_basic_days2_3' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_3' => 'nullable|string|max:255',
            'applicable_period_start_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_4',
            'applicable_period_start_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_4',
            'applicable_period_end_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_4',
            'applicable_period_end_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_4',
            'basic_days2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_4',
            'payment_period_start_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_4',
            'payment_period_end_month2_4' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_4',
            'payment_period_end_day2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_4',
            'payment_period_basic_days2_4' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_4' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_4' => 'nullable|string|max:255',
            'applicable_period_start_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_5',
            'applicable_period_start_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_5',
            'applicable_period_end_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_5',
            'applicable_period_end_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_5',
            'basic_days2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_5',
            'payment_period_start_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_5',
            'payment_period_end_month2_5' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_5',
            'payment_period_end_day2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_5',
            'payment_period_basic_days2_5' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_5' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_5' => 'nullable|string|max:255',
            'applicable_period_start_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_6',
            'applicable_period_start_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_6',
            'applicable_period_end_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_6',
            'applicable_period_end_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_6',
            'basic_days2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_6',
            'payment_period_start_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_6',
            'payment_period_end_month2_6' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_6',
            'payment_period_end_day2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_6',
            'payment_period_basic_days2_6' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_6' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_6' => 'nullable|string|max:255',
            'applicable_period_start_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_7',
            'applicable_period_start_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_7',
            'applicable_period_end_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_7',
            'applicable_period_end_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_7',
            'basic_days2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_7',
            'payment_period_start_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_7',
            'payment_period_end_month2_7' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_7',
            'payment_period_end_day2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_7',
            'payment_period_basic_days2_7' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_7' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_7' => 'nullable|string|max:255',
            'applicable_period_start_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_8',
            'applicable_period_start_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_8',
            'applicable_period_end_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_8',
            'applicable_period_end_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_8',
            'basic_days2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_8',
            'payment_period_start_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_8',
            'payment_period_end_month2_8' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_8',
            'payment_period_end_day2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_8',
            'payment_period_basic_days2_8' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_8' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_8' => 'nullable|string|max:255',
            'applicable_period_start_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_9',
            'applicable_period_start_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_9',
            'applicable_period_end_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_9',
            'applicable_period_end_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_9',
            'basic_days2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_9',
            'payment_period_start_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_9',
            'payment_period_end_month2_9' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_9',
            'payment_period_end_day2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_9',
            'payment_period_basic_days2_9' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_9' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_9' => 'nullable|string|max:255',
            'applicable_period_start_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_10',
            'applicable_period_start_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_10',
            'applicable_period_end_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_10',
            'applicable_period_end_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_10',
            'basic_days2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_10',
            'payment_period_start_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_10',
            'payment_period_end_month2_10' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_10',
            'payment_period_end_day2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_10',
            'payment_period_basic_days2_10' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_10' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_10' => 'nullable|string|max:255',
            'applicable_period_start_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_11',
            'applicable_period_start_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_11',
            'applicable_period_end_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_11',
            'applicable_period_end_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_11',
            'basic_days2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_11',
            'payment_period_start_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_11',
            'payment_period_end_month2_11' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_11',
            'payment_period_end_day2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_11',
            'payment_period_basic_days2_11' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_11' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_11' => 'nullable|string|max:255',
            'applicable_period_start_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_12',
            'applicable_period_start_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_12',
            'applicable_period_end_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_12',
            'applicable_period_end_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_12',
            'basic_days2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_12',
            'payment_period_start_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_12',
            'payment_period_end_month2_12' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_12',
            'payment_period_end_day2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_12',
            'payment_period_basic_days2_12' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_12' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_12' => 'nullable|string|max:255',
            'applicable_period_start_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_13',
            'applicable_period_start_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_13',
            'applicable_period_end_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_13',
            'applicable_period_end_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_13',
            'basic_days2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_13',
            'payment_period_start_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_13',
            'payment_period_end_month2_13' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_13',
            'payment_period_end_day2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_13',
            'payment_period_basic_days2_13' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_13' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_13' => 'nullable|string|max:255',
            'applicable_period_start_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_14',
            'applicable_period_start_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_14',
            'applicable_period_end_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_14',
            'applicable_period_end_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_14',
            'basic_days2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_14',
            'payment_period_start_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_14',
            'payment_period_end_month2_14' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_14',
            'payment_period_end_day2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_14',
            'payment_period_basic_days2_14' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_14' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_14' => 'nullable|string|max:255',
            'applicable_period_start_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_day2_15',
            'applicable_period_start_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_start_month2_15',
            'applicable_period_end_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_day2_15',
            'applicable_period_end_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:applicable_period_end_month2_15',
            'basic_days2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_start_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_day2_15',
            'payment_period_start_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_start_month2_15',
            'payment_period_end_month2_15' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_day2_15',
            'payment_period_end_day2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:payment_period_end_month2_15',
            'payment_period_basic_days2_15' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_amount_a2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_amount_b2_15' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'note2_15' => 'nullable|string|max:255',
            'employee_salary_notices2' => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $employee_childcare_caregiver_leave_start_japan_era = $data['employee_childcare_caregiver_leave_start_japan_era'];
            $employee_childcare_caregiver_leave_start_era_year = $data['employee_childcare_caregiver_leave_start_era_year'];
            $employee_childcare_caregiver_leave_start_month = $data['employee_childcare_caregiver_leave_start_month'];
            $employee_childcare_caregiver_leave_start_day = $data['employee_childcare_caregiver_leave_start_day'];
            $employment_period_date_japan_era = $data['employment_period_date_japan_era'];
            $employment_period_date_japan_era_year = $data['employment_period_date_japan_era_year'];
            $employment_period_date_month = $data['employment_period_date_month'];
            $employment_period_date_day = $data['employment_period_date_day'];

            if(!empty($employee_childcare_caregiver_leave_start_month) && !empty($employee_childcare_caregiver_leave_start_day)){
                if (!checkdate($employee_childcare_caregiver_leave_start_month, $employee_childcare_caregiver_leave_start_day, '2000')) {
                    $validator->errors()->add('employee_childcare_caregiver_leave_start_month','4_休業等を開始した日の年月日は正しい日付を入力してください。');
                }
            }
            if ($employee_childcare_caregiver_leave_start_japan_era === '平成') {
                if (
                    ($employee_childcare_caregiver_leave_start_era_year == 1 && ($employee_childcare_caregiver_leave_start_month < 1 || ($employee_childcare_caregiver_leave_start_month == 1 && $employee_childcare_caregiver_leave_start_day < 8))) ||
                    ($employee_childcare_caregiver_leave_start_era_year == 31 && ($employee_childcare_caregiver_leave_start_month > 4 || ($employee_childcare_caregiver_leave_start_month == 4 && $employee_childcare_caregiver_leave_start_day > 30))) ||
                    ($employee_childcare_caregiver_leave_start_era_year > 31)
                ) {
                    $validator->errors()->add('employee_childcare_caregiver_leave_start_day', '4_休業等を開始した日の年月日は正しい日付を入力してください。');
                }
            } elseif($employee_childcare_caregiver_leave_start_japan_era === '令和'){
                if ($employee_childcare_caregiver_leave_start_era_year == 1 && ($employee_childcare_caregiver_leave_start_month < 5 || ($employee_childcare_caregiver_leave_start_month == 5 && $employee_childcare_caregiver_leave_start_day < 1))) {
                    $validator->errors()->add('employee_childcare_caregiver_leave_start_day', '4_休業等を開始した日の年月日は正しい日付を入力してください。');
                }
            }

            if ($employment_period_date_japan_era === '平成') {
                if (
                    ($employment_period_date_japan_era_year == 1 && ($employment_period_date_month < 1 || ($employment_period_date_month == 1 && $employment_period_date_day < 8))) ||
                    ($employment_period_date_japan_era_year == 31 && ($employment_period_date_month > 4 || ($employment_period_date_month == 4 && $employment_period_date_day > 30))) ||
                    ($employment_period_date_japan_era_year > 31)
                ) {
                    $validator->errors()->add('employment_period_date_day', '14_（休業開始時における）雇用期間_日付は正しい日付を入力してください。');
                }
            } elseif ($employment_period_date_japan_era === '令和') {
                if ($employment_period_date_japan_era_year == 1 && ($employment_period_date_month < 5 || ($employment_period_date_month == 5 && $employment_period_date_day < 1))) {
                    $validator->errors()->add('employment_period_date_day', '14_（休業開始時における）雇用期間_日付は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1']) && !empty($data['applicable_period_start_day1'])){
                if (!checkdate($data['applicable_period_start_month1'], $data['applicable_period_start_day1'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1','7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_start_month1_1']) && !empty($data['applicable_period_start_day1_1'])){
                if (!checkdate($data['applicable_period_start_month1_1'], $data['applicable_period_start_day1_1'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_1','7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_2']) && !empty($data['applicable_period_start_day1_2'])){
                if (!checkdate($data['applicable_period_start_month1_2'], $data['applicable_period_start_day1_2'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_2','7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_3']) && !empty($data['applicable_period_start_day1_3'])){
                if (!checkdate($data['applicable_period_start_month1_3'], $data['applicable_period_start_day1_3'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_3','7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_4']) && !empty($data['applicable_period_start_day1_4'])){
                if (!checkdate($data['applicable_period_start_month1_4'], $data['applicable_period_start_day1_4'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_4','7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_5']) && !empty($data['applicable_period_start_day1_5'])){
                if (!checkdate($data['applicable_period_start_month1_5'], $data['applicable_period_start_day1_5'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_5','7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_6']) && !empty($data['applicable_period_start_day1_6'])){
                if (!checkdate($data['applicable_period_start_month1_6'], $data['applicable_period_start_day1_6'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_6','7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_7']) && !empty($data['applicable_period_start_day1_7'])){
                if (!checkdate($data['applicable_period_start_month1_7'], $data['applicable_period_start_day1_7'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_7','7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_8']) && !empty($data['applicable_period_start_day1_8'])){
                if (!checkdate($data['applicable_period_start_month1_8'], $data['applicable_period_start_day1_8'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_8','7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_9']) && !empty($data['applicable_period_start_day1_9'])){
                if (!checkdate($data['applicable_period_start_month1_9'], $data['applicable_period_start_day1_9'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_9','7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_10']) && !empty($data['applicable_period_start_day1_10'])){
                if (!checkdate($data['applicable_period_start_month1_10'], $data['applicable_period_start_day1_10'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_10','7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_11']) && !empty($data['applicable_period_start_day1_11'])){
                if (!checkdate($data['applicable_period_start_month1_11'], $data['applicable_period_start_day1_11'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_11','7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_12']) && !empty($data['applicable_period_start_day1_12'])){
                if (!checkdate($data['applicable_period_start_month1_12'], $data['applicable_period_start_day1_12'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_12','7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_13']) && !empty($data['applicable_period_start_day1_13'])){
                if (!checkdate($data['applicable_period_start_month1_13'], $data['applicable_period_start_day1_13'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_13','7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month1_14']) && !empty($data['applicable_period_start_day1_14'])){
                if (!checkdate($data['applicable_period_start_month1_14'], $data['applicable_period_start_day1_14'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_14','7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_start_month1_15']) && !empty($data['applicable_period_start_day1_15'])){
                if (!checkdate($data['applicable_period_start_month1_15'], $data['applicable_period_start_day1_15'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day1_15','7_算定対象期間_開始日付_16行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_end_month1_1']) && !empty($data['applicable_period_end_day1_1'])){
                if (!checkdate($data['applicable_period_end_month1_1'], $data['applicable_period_end_day1_1'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_1','7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_end_month1_2']) && !empty($data['applicable_period_end_day1_2'])){
                if (!checkdate($data['applicable_period_end_month1_2'], $data['applicable_period_end_day1_2'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_2','7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_3']) && !empty($data['applicable_period_end_day1_3'])){
                if (!checkdate($data['applicable_period_end_month1_3'], $data['applicable_period_end_day1_3'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_3','7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_4']) && !empty($data['applicable_period_end_day1_4'])){
                if (!checkdate($data['applicable_period_end_month1_4'], $data['applicable_period_end_day1_4'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_4','7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_5']) && !empty($data['applicable_period_end_day1_5'])){
                if (!checkdate($data['applicable_period_end_month1_5'], $data['applicable_period_end_day1_5'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_5','7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_6']) && !empty($data['applicable_period_end_day1_6'])){
                if (!checkdate($data['applicable_period_end_month1_6'], $data['applicable_period_end_day1_6'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_6','7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_7']) && !empty($data['applicable_period_end_day1_7'])){
                if (!checkdate($data['applicable_period_end_month1_7'], $data['applicable_period_end_day1_7'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_7','7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_8']) && !empty($data['applicable_period_end_day1_8'])){
                if (!checkdate($data['applicable_period_end_month1_8'], $data['applicable_period_end_day1_8'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_8','7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_9']) && !empty($data['applicable_period_end_day1_9'])){
                if (!checkdate($data['applicable_period_end_month1_9'], $data['applicable_period_end_day1_9'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_9','7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_10']) && !empty($data['applicable_period_end_day1_10'])){
                if (!checkdate($data['applicable_period_end_month1_10'], $data['applicable_period_end_day1_10'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_10','7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_11']) && !empty($data['applicable_period_end_day1_11'])){
                if (!checkdate($data['applicable_period_end_month1_11'], $data['applicable_period_end_day1_11'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_11','7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_12']) && !empty($data['applicable_period_end_day1_12'])){
                if (!checkdate($data['applicable_period_end_month1_12'], $data['applicable_period_end_day1_12'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_12','7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_13']) && !empty($data['applicable_period_end_day1_13'])){
                if (!checkdate($data['applicable_period_end_month1_13'], $data['applicable_period_end_day1_13'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_13','7_算定対象期間_終了日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month1_14']) && !empty($data['applicable_period_end_day1_14'])){
                if (!checkdate($data['applicable_period_end_month1_14'], $data['applicable_period_end_day1_14'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_14','7_算定対象期間_終了日付_15行目は正しい日付を入力してください。');
                }
            }
            
            if(!empty($data['applicable_period_end_month1_15']) && !empty($data['applicable_period_end_day1_15'])){
                if (!checkdate($data['applicable_period_end_month1_15'], $data['applicable_period_end_day1_15'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day1_15','7_算定対象期間_終了日付_16行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_start_month1']) && !empty($data['payment_period_start_day1'])){
                if (!checkdate($data['payment_period_start_month1'], $data['payment_period_start_day1'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1','9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_start_month1_1']) && !empty($data['payment_period_start_day1_1'])){
                if (!checkdate($data['payment_period_start_month1_1'], $data['payment_period_start_day1_1'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_1','9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_2']) && !empty($data['payment_period_start_day1_2'])){
                if (!checkdate($data['payment_period_start_month1_2'], $data['payment_period_start_day1_2'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_2','9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_3']) && !empty($data['payment_period_start_day1_3'])){
                if (!checkdate($data['payment_period_start_month1_3'], $data['payment_period_start_day1_3'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_3','9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_4']) && !empty($data['payment_period_start_day1_4'])){
                if (!checkdate($data['payment_period_start_month1_4'], $data['payment_period_start_day1_4'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_4','9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_5']) && !empty($data['payment_period_start_day1_5'])){
                if (!checkdate($data['payment_period_start_month1_5'], $data['payment_period_start_day1_5'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_5','9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_6']) && !empty($data['payment_period_start_day1_6'])){
                if (!checkdate($data['payment_period_start_month1_6'], $data['payment_period_start_day1_6'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_6','9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_7']) && !empty($data['payment_period_start_day1_7'])){
                if (!checkdate($data['payment_period_start_month1_7'], $data['payment_period_start_day1_7'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_7','9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_8']) && !empty($data['payment_period_start_day1_8'])){
                if (!checkdate($data['payment_period_start_month1_8'], $data['payment_period_start_day1_8'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_8','9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_9']) && !empty($data['payment_period_start_day1_9'])){
                if (!checkdate($data['payment_period_start_month1_9'], $data['payment_period_start_day1_9'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_9','9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_10']) && !empty($data['payment_period_start_day1_10'])){
                if (!checkdate($data['payment_period_start_month1_10'], $data['payment_period_start_day1_10'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_10','9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_11']) && !empty($data['payment_period_start_day1_11'])){
                if (!checkdate($data['payment_period_start_month1_11'], $data['payment_period_start_day1_11'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_11','9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_12']) && !empty($data['payment_period_start_day1_12'])){
                if (!checkdate($data['payment_period_start_month1_12'], $data['payment_period_start_day1_12'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_12','9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_13']) && !empty($data['payment_period_start_day1_13'])){
                if (!checkdate($data['payment_period_start_month1_13'], $data['payment_period_start_day1_13'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_13','9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month1_14']) && !empty($data['payment_period_start_day1_14'])){
                if (!checkdate($data['payment_period_start_month1_14'], $data['payment_period_start_day1_14'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_14','9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                }
            }
            
            if(!empty($data['payment_period_start_month1_15']) && !empty($data['payment_period_start_day1_15'])){
                if (!checkdate($data['payment_period_start_month1_15'], $data['payment_period_start_day1_15'], '2000')) {
                    $validator->errors()->add('payment_period_start_day1_15','9_賃金支払対象期間_開始日付_16行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_end_month1_1']) && !empty($data['payment_period_end_day1_1'])){
                if (!checkdate($data['payment_period_end_month1_1'], $data['payment_period_end_day1_1'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_1','9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_end_month1_2']) && !empty($data['payment_period_end_day1_2'])){
                if (!checkdate($data['payment_period_end_month1_2'], $data['payment_period_end_day1_2'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_2','9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_3']) && !empty($data['payment_period_end_day1_3'])){
                if (!checkdate($data['payment_period_end_month1_3'], $data['payment_period_end_day1_3'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_3','9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_4']) && !empty($data['payment_period_end_day1_4'])){
                if (!checkdate($data['payment_period_end_month1_4'], $data['payment_period_end_day1_4'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_4','9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_5']) && !empty($data['payment_period_end_day1_5'])){
                if (!checkdate($data['payment_period_end_month1_5'], $data['payment_period_end_day1_5'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_5','9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_6']) && !empty($data['payment_period_end_day1_6'])){
                if (!checkdate($data['payment_period_end_month1_6'], $data['payment_period_end_day1_6'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_6','9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_7']) && !empty($data['payment_period_end_day1_7'])){
                if (!checkdate($data['payment_period_end_month1_7'], $data['payment_period_end_day1_7'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_7','9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_8']) && !empty($data['payment_period_end_day1_8'])){
                if (!checkdate($data['payment_period_end_month1_8'], $data['payment_period_end_day1_8'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_8','9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_9']) && !empty($data['payment_period_end_day1_9'])){
                if (!checkdate($data['payment_period_end_month1_9'], $data['payment_period_end_day1_9'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_9','9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_10']) && !empty($data['payment_period_end_day1_10'])){
                if (!checkdate($data['payment_period_end_month1_10'], $data['payment_period_end_day1_10'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_10','9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_11']) && !empty($data['payment_period_end_day1_11'])){
                if (!checkdate($data['payment_period_end_month1_11'], $data['payment_period_end_day1_11'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_11','9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_12']) && !empty($data['payment_period_end_day1_12'])){
                if (!checkdate($data['payment_period_end_month1_12'], $data['payment_period_end_day1_12'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_12','9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_13']) && !empty($data['payment_period_end_day1_13'])){
                if (!checkdate($data['payment_period_end_month1_13'], $data['payment_period_end_day1_13'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_13','9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_end_month1_14']) && !empty($data['payment_period_end_day1_14'])){
                if (!checkdate($data['payment_period_end_month1_14'], $data['payment_period_end_day1_14'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_14','9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month1_15']) && !empty($data['payment_period_end_day1_15'])){
                if (!checkdate($data['payment_period_end_month1_15'], $data['payment_period_end_day1_15'], '2000')) {
                    $validator->errors()->add('payment_period_end_day1_15','9_賃金支払対象期間_終了日付_16行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_start_month2_1']) && !empty($data['applicable_period_start_day2_1'])){
                if (!checkdate($data['applicable_period_start_month2_1'], $data['applicable_period_start_day2_1'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_1','[続紙]7_算定対象期間_開始日付_1行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['applicable_period_start_month2_2']) && !empty($data['applicable_period_start_day2_2'])){
                if (!checkdate($data['applicable_period_start_month2_2'], $data['applicable_period_start_day2_2'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_2','[続紙]7_算定対象期間_開始日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_3']) && !empty($data['applicable_period_start_day2_3'])){
                if (!checkdate($data['applicable_period_start_month2_3'], $data['applicable_period_start_day2_3'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_3','[続紙]7_算定対象期間_開始日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_4']) && !empty($data['applicable_period_start_day2_4'])){
                if (!checkdate($data['applicable_period_start_month2_4'], $data['applicable_period_start_day2_4'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_4','[続紙]7_算定対象期間_開始日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_5']) && !empty($data['applicable_period_start_day2_5'])){
                if (!checkdate($data['applicable_period_start_month2_5'], $data['applicable_period_start_day2_5'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_5','[続紙]7_算定対象期間_開始日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_6']) && !empty($data['applicable_period_start_day2_6'])){
                if (!checkdate($data['applicable_period_start_month2_6'], $data['applicable_period_start_day2_6'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_6','[続紙]7_算定対象期間_開始日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_7']) && !empty($data['applicable_period_start_day2_7'])){
                if (!checkdate($data['applicable_period_start_month2_7'], $data['applicable_period_start_day2_7'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_7','[続紙]7_算定対象期間_開始日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_8']) && !empty($data['applicable_period_start_day2_8'])){
                if (!checkdate($data['applicable_period_start_month2_8'], $data['applicable_period_start_day2_8'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_8','[続紙]7_算定対象期間_開始日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_9']) && !empty($data['applicable_period_start_day2_9'])){
                if (!checkdate($data['applicable_period_start_month2_9'], $data['applicable_period_start_day2_9'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_9','[続紙]7_算定対象期間_開始日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_10']) && !empty($data['applicable_period_start_day2_10'])){
                if (!checkdate($data['applicable_period_start_month2_10'], $data['applicable_period_start_day2_10'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_10','[続紙]7_算定対象期間_開始日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_11']) && !empty($data['applicable_period_start_day2_11'])){
                if (!checkdate($data['applicable_period_start_month2_11'], $data['applicable_period_start_day2_11'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_11','[続紙]7_算定対象期間_開始日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_12']) && !empty($data['applicable_period_start_day2_12'])){
                if (!checkdate($data['applicable_period_start_month2_12'], $data['applicable_period_start_day2_12'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_12','[続紙]7_算定対象期間_開始日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_13']) && !empty($data['applicable_period_start_day2_13'])){
                if (!checkdate($data['applicable_period_start_month2_13'], $data['applicable_period_start_day2_13'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_13','[続紙]7_算定対象期間_開始日付_13行目は正しい日付を入力してください。');
                }
            }
            if(!empty($data['applicable_period_start_month2_14']) && !empty($data['applicable_period_start_day2_14'])){
                if (!checkdate($data['applicable_period_start_month2_14'], $data['applicable_period_start_day2_14'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_14','[続紙]7_算定対象期間_開始日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_start_month2_15']) && !empty($data['applicable_period_start_day2_15'])){
                if (!checkdate($data['applicable_period_start_month2_15'], $data['applicable_period_start_day2_15'], '2000')) {
                    $validator->errors()->add('applicable_period_start_day2_15','[続紙]7_算定対象期間_開始日付_15行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_1']) && !empty($data['applicable_period_end_day2_1'])){
                if (!checkdate($data['applicable_period_end_month2_1'], $data['applicable_period_end_day2_1'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_1','[続紙]7_算定対象期間_終了日付_1行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_2']) && !empty($data['applicable_period_end_day2_2'])){
                if (!checkdate($data['applicable_period_end_month2_2'], $data['applicable_period_end_day2_2'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_2','[続紙]7_算定対象期間_終了日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_3']) && !empty($data['applicable_period_end_day2_3'])){
                if (!checkdate($data['applicable_period_end_month2_3'], $data['applicable_period_end_day2_3'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_3','[続紙]7_算定対象期間_終了日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_4']) && !empty($data['applicable_period_end_day2_4'])){
                if (!checkdate($data['applicable_period_end_month2_4'], $data['applicable_period_end_day2_4'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_4','[続紙]7_算定対象期間_終了日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_5']) && !empty($data['applicable_period_end_day2_5'])){
                if (!checkdate($data['applicable_period_end_month2_5'], $data['applicable_period_end_day2_5'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_5','[続紙]7_算定対象期間_終了日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_6']) && !empty($data['applicable_period_end_day2_6'])){
               if (!checkdate($data['applicable_period_end_month2_6'], $data['applicable_period_end_day2_6'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_6','[続紙]7_算定対象期間_終了日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_7']) && !empty($data['applicable_period_end_day2_7'])){
                if (!checkdate($data['applicable_period_end_month2_7'], $data['applicable_period_end_day2_7'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_7','[続紙]7_算定対象期間_終了日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_8']) && !empty($data['applicable_period_end_day2_8'])){
                if (!checkdate($data['applicable_period_end_month2_8'], $data['applicable_period_end_day2_8'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_8','[続紙]7_算定対象期間_終了日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_9']) && !empty($data['applicable_period_end_day2_9'])){
                if (!checkdate($data['applicable_period_end_month2_9'], $data['applicable_period_end_day2_9'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_9','[続紙]7_算定対象期間_終了日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_10']) && !empty($data['applicable_period_end_day2_10'])){
                if (!checkdate($data['applicable_period_end_month2_10'], $data['applicable_period_end_day2_10'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_10','[続紙]7_算定対象期間_終了日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_11']) && !empty($data['applicable_period_end_day2_11'])){
                if (!checkdate($data['applicable_period_end_month2_11'], $data['applicable_period_end_day2_11'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_11','[続紙]7_算定対象期間_終了日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_12']) && !empty($data['applicable_period_end_day2_12'])){
                if (!checkdate($data['applicable_period_end_month2_12'], $data['applicable_period_end_day2_12'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_12','[続紙]7_算定対象期間_終了日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['applicable_period_end_month2_13']) && !empty($data['applicable_period_end_day2_13'])){
                if (!checkdate($data['applicable_period_end_month2_13'], $data['applicable_period_end_day2_13'], '2000')) {
                    $validator->errors()->add('applicable_period_end_day2_13','[続紙]7_算定対象期間_終了日付_13行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_start_month2_1']) && !empty($data['payment_period_start_day2_1'])){
                if (!checkdate($data['payment_period_start_month2_1'], $data['payment_period_start_day2_1'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_1','[続紙]9_賃金支払対象期間_開始日付_1行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_2']) && !empty($data['payment_period_start_day2_2'])){
                if (!checkdate($data['payment_period_start_month2_2'], $data['payment_period_start_day2_2'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_2','[続紙]9_賃金支払対象期間_開始日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_3']) && !empty($data['payment_period_start_day2_3'])){
                if (!checkdate($data['payment_period_start_month2_3'], $data['payment_period_start_day2_3'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_3','[続紙]9_賃金支払対象期間_開始日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_4']) && !empty($data['payment_period_start_day2_4'])){
                if (!checkdate($data['payment_period_start_month2_4'], $data['payment_period_start_day2_4'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_4','[続紙]9_賃金支払対象期間_開始日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_5']) && !empty($data['payment_period_start_day2_5'])){
                if (!checkdate($data['payment_period_start_month2_5'], $data['payment_period_start_day2_5'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_5','[続紙]9_賃金支払対象期間_開始日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_6']) && !empty($data['payment_period_start_day2_6'])){
                if (!checkdate($data['payment_period_start_month2_6'], $data['payment_period_start_day2_6'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_6','[続紙]9_賃金支払対象期間_開始日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_7']) && !empty($data['payment_period_start_day2_7'])){
                if (!checkdate($data['payment_period_start_month2_7'], $data['payment_period_start_day2_7'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_7','[続紙]9_賃金支払対象期間_開始日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_8']) && !empty($data['payment_period_start_day2_8'])){
                if (!checkdate($data['payment_period_start_month2_8'], $data['payment_period_start_day2_8'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_8','[続紙]9_賃金支払対象期間_開始日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_9']) && !empty($data['payment_period_start_day2_9'])){
                if (!checkdate($data['payment_period_start_month2_9'], $data['payment_period_start_day2_9'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_9','[続紙]9_賃金支払対象期間_開始日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_10']) && !empty($data['payment_period_start_day2_10'])){
                if (!checkdate($data['payment_period_start_month2_10'], $data['payment_period_start_day2_10'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_10','[続紙]9_賃金支払対象期間_開始日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_11']) && !empty($data['payment_period_start_day2_11'])){
                if (!checkdate($data['payment_period_start_month2_11'], $data['payment_period_start_day2_11'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_11','[続紙]9_賃金支払対象期間_開始日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_12']) && !empty($data['payment_period_start_month2_12'])){
                if (!checkdate($data['payment_period_start_month2_12'], $data['payment_period_start_month2_12'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_12','[続紙]9_賃金支払対象期間_開始日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_13']) && !empty($data['payment_period_start_day2_13'])){
                if (!checkdate($data['payment_period_start_month2_13'], $data['payment_period_start_day2_13'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_13','[続紙]9_賃金支払対象期間_開始日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_14']) && !empty($data['payment_period_start_month2_14'])){
                if (!checkdate($data['payment_period_start_month2_14'], $data['payment_period_start_month2_14'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_14','[続紙]9_賃金支払対象期間_開始日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_start_month2_15']) && !empty($data['payment_period_start_day2_15'])){
                if (!checkdate($data['payment_period_start_month2_15'], $data['payment_period_start_day2_15'], '2000')) {
                    $validator->errors()->add('payment_period_start_day2_15','[続紙]9_賃金支払対象期間_開始日付_15行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_end_month2_1']) && !empty($data['payment_period_end_day2_1'])){
                if (!checkdate($data['payment_period_end_month2_1'], $data['payment_period_end_day2_1'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_1','[続紙]9_賃金支払対象期間_終了日付_1行目は正しい日付を入力してください。');
                }
            }

            if(!empty($data['payment_period_end_month2_2']) && !empty($data['payment_period_end_day2_2'])){
                if (!checkdate($data['payment_period_end_month2_2'], $data['payment_period_end_day2_2'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_2','[続紙]9_賃金支払対象期間_終了日付_2行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_3']) && !empty($data['payment_period_end_day2_3'])){
                if (!checkdate($data['payment_period_end_month2_3'], $data['payment_period_end_day2_3'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_3','[続紙]9_賃金支払対象期間_終了日付_3行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_4']) && !empty($data['payment_period_end_day2_4'])){
                if (!checkdate($data['payment_period_end_month2_4'], $data['payment_period_end_day2_4'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_4','[続紙]9_賃金支払対象期間_終了日付_4行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_5']) && !empty($data['payment_period_end_day2_5'])){
                if (!checkdate($data['payment_period_end_month2_5'], $data['payment_period_end_day2_5'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_5','[続紙]9_賃金支払対象期間_終了日付_5行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_6']) && !empty($data['payment_period_end_day2_6'])){
                if (!checkdate($data['payment_period_end_month2_6'], $data['payment_period_end_day2_6'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_6','[続紙]9_賃金支払対象期間_終了日付_6行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_7']) && !empty($data['payment_period_end_day2_7'])){
                if (!checkdate($data['payment_period_end_month2_7'], $data['payment_period_end_day2_7'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_7','[続紙]9_賃金支払対象期間_終了日付_7行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_8']) && !empty($data['payment_period_end_day2_8'])){
                if (!checkdate($data['payment_period_end_month2_8'], $data['payment_period_end_day2_8'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_8','[続紙]9_賃金支払対象期間_終了日付_8行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_9']) && !empty($data['payment_period_end_day2_9'])){
                if (!checkdate($data['payment_period_end_month2_9'], $data['payment_period_end_day2_9'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_9','[続紙]9_賃金支払対象期間_終了日付_9行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_10']) && !empty($data['payment_period_end_day2_10'])){
                if (!checkdate($data['payment_period_end_month2_10'], $data['payment_period_end_day2_10'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_10','[続紙]9_賃金支払対象期間_終了日付_10行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_11']) && !empty($data['payment_period_end_day2_11'])){
                if (!checkdate($data['payment_period_end_month2_11'], $data['payment_period_end_day2_11'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_11','[続紙]9_賃金支払対象期間_終了日付_11行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_12']) && !empty($data['payment_period_end_month2_12'])){
                if (!checkdate($data['payment_period_end_month2_12'], $data['payment_period_end_month2_12'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_12','[続紙]9_賃金支払対象期間_終了日付_12行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_13']) && !empty($data['payment_period_end_day2_13'])){
                if (!checkdate($data['payment_period_end_month2_13'], $data['payment_period_end_day2_13'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_13','[続紙]9_賃金支払対象期間_終了日付_13行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_14']) && !empty($data['payment_period_end_month2_14'])){
                if (!checkdate($data['payment_period_end_month2_14'], $data['payment_period_end_month2_14'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_14','[続紙]9_賃金支払対象期間_終了日付_14行目は正しい日付を入力してください。');
                }
            }
        
            if(!empty($data['payment_period_end_month2_15']) && !empty($data['payment_period_end_day2_15'])){
                if (!checkdate($data['payment_period_end_month2_15'], $data['payment_period_end_day2_15'], '2000')) {
                    $validator->errors()->add('payment_period_end_day2_15','[続紙]9_賃金支払対象期間_終了日付_15行目は正しい日付を入力してください。');
                }
            }
            
            if ($this->hasFile('file_wage_certificate_or_payment_status')) {
                $totalSize += $this->file('file_wage_certificate_or_payment_status')->getSize();
            }
            if ($this->hasFile('file_childcare')) {
                $totalSize += $this->file('file_childcare')->getSize();
            }
            if ($this->hasFile('file_nursing_care')) {
                $totalSize += $this->file('file_nursing_care')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'wage_monthly_certificate_on_leave_start.required_without' => 'タイトルは休業開始時賃金月額証明書、所定労働時間短縮開始時賃金証明書のいずれかである必要があります。',
            'employment_period_date_japan_era.required_with' => '14_（休業開始時における）雇用期間_日付_年号を入力してください。',
            'employment_period_date_japan_era_year.required_with' => '14_（休業開始時における）雇用期間_日付_年を入力してください。',
            'employment_period_date_month.required_with' => '14_（休業開始時における）雇用期間_日付_月を入力してください。',
            'employment_period_date_day.required_with' => '14_（休業開始時における）雇用期間_日付_日を入力してください。',
            'applicable_period_start_month1.required_with' => '7_算定対象期間_開始月_1行目を入力してください。',
            'applicable_period_start_month1_1.required_with' => '7_算定対象期間_開始月_2行目を入力してください。',
            'applicable_period_start_month1_2.required_with' => '7_算定対象期間_開始月_3行目を入力してください。',
            'applicable_period_start_month1_3.required_with' => '7_算定対象期間_開始月_4行目を入力してください。',
            'applicable_period_start_month1_4.required_with' => '7_算定対象期間_開始月_5行目を入力してください。',
            'applicable_period_start_month1_5.required_with' => '7_算定対象期間_開始月_6行目を入力してください。',
            'applicable_period_start_month1_6.required_with' => '7_算定対象期間_開始月_7行目を入力してください。',
            'applicable_period_start_month1_7.required_with' => '7_算定対象期間_開始月_8行目を入力してください。',
            'applicable_period_start_month1_8.required_with' => '7_算定対象期間_開始月_9行目を入力してください。',
            'applicable_period_start_month1_9.required_with' => '7_算定対象期間_開始月_10行目を入力してください。',
            'applicable_period_start_month1_10.required_with' => '7_算定対象期間_開始月_11行目を入力してください。',
            'applicable_period_start_month1_11.required_with' => '7_算定対象期間_開始月_12行目を入力してください。',
            'applicable_period_start_month1_12.required_with' => '7_算定対象期間_開始月_13行目を入力してください。',
            'applicable_period_start_month1_13.required_with' => '7_算定対象期間_開始月_14行目を入力してください。',
            'applicable_period_start_month1_14.required_with' => '7_算定対象期間_開始月_15行目を入力してください。',
            'applicable_period_start_month1_15.required_with' => '7_算定対象期間_開始月_16行目を入力してください。',
            'applicable_period_start_day1.required_with' => '7_算定対象期間_開始日_1行目を入力してください。',
            'applicable_period_start_day1_1.required_with' => '7_算定対象期間_開始日_2行目を入力してください。',
            'applicable_period_start_day1_2.required_with' => '7_算定対象期間_開始日_3行目を入力してください。',
            'applicable_period_start_day1_3.required_with' => '7_算定対象期間_開始日_4行目を入力してください。',
            'applicable_period_start_day1_4.required_with' => '7_算定対象期間_開始日_5行目を入力してください。',
            'applicable_period_start_day1_5.required_with' => '7_算定対象期間_開始日_6行目を入力してください。',
            'applicable_period_start_day1_6.required_with' => '7_算定対象期間_開始日_7行目を入力してください。',
            'applicable_period_start_day1_7.required_with' => '7_算定対象期間_開始日_8行目を入力してください。',
            'applicable_period_start_day1_8.required_with' => '7_算定対象期間_開始日_9行目を入力してください。',
            'applicable_period_start_day1_9.required_with' => '7_算定対象期間_開始日_10行目を入力してください。',
            'applicable_period_start_day1_10.required_with' => '7_算定対象期間_開始日_11行目を入力してください。',
            'applicable_period_start_day1_11.required_with' => '7_算定対象期間_開始日_12行目を入力してください。',
            'applicable_period_start_day1_12.required_with' => '7_算定対象期間_開始日_13行目を入力してください。',
            'applicable_period_start_day1_13.required_with' => '7_算定対象期間_開始日_14行目を入力してください。',
            'applicable_period_start_day1_14.required_with' => '7_算定対象期間_開始日_15行目を入力してください。',
            'applicable_period_start_day1_15.required_with' => '7_算定対象期間_開始日_16行目を入力してください。',
            'applicable_period_end_month1_1.required_with' => '7_算定対象期間_終了月_2行目を入力してください。',
            'applicable_period_end_month1_2.required_with' => '7_算定対象期間_終了月_3行目を入力してください。',
            'applicable_period_end_month1_3.required_with' => '7_算定対象期間_終了月_4行目を入力してください。',
            'applicable_period_end_month1_4.required_with' => '7_算定対象期間_終了月_5行目を入力してください。',
            'applicable_period_end_month1_5.required_with' => '7_算定対象期間_終了月_6行目を入力してください。',
            'applicable_period_end_month1_6.required_with' => '7_算定対象期間_終了月_7行目を入力してください。',
            'applicable_period_end_month1_7.required_with' => '7_算定対象期間_終了月_8行目を入力してください。',
            'applicable_period_end_month1_8.required_with' => '7_算定対象期間_終了月_9行目を入力してください。',
            'applicable_period_end_month1_9.required_with' => '7_算定対象期間_終了月_10行目を入力してください。',
            'applicable_period_end_month1_10.required_with' => '7_算定対象期間_終了月_11行目を入力してください。',
            'applicable_period_end_month1_11.required_with' => '7_算定対象期間_終了月_12行目を入力してください。',
            'applicable_period_end_month1_12.required_with' => '7_算定対象期間_終了月_13行目を入力してください。',
            'applicable_period_end_month1_13.required_with' => '7_算定対象期間_終了月_14行目を入力してください。',
            'applicable_period_end_month1_14.required_with' => '7_算定対象期間_終了月_15行目を入力してください。',
            'applicable_period_end_month1_15.required_with' => '7_算定対象期間_終了月_16行目を入力してください。',
            'applicable_period_end_day1_1.required_with' => '7_算定対象期間_終了日_2行目を入力してください。',
            'applicable_period_end_day1_2.required_with' => '7_算定対象期間_終了日_3行目を入力してください。',
            'applicable_period_end_day1_3.required_with' => '7_算定対象期間_終了日_4行目を入力してください。',
            'applicable_period_end_day1_4.required_with' => '7_算定対象期間_終了日_5行目を入力してください。',
            'applicable_period_end_day1_5.required_with' => '7_算定対象期間_終了日_6行目を入力してください。',
            'applicable_period_end_day1_6.required_with' => '7_算定対象期間_終了日_7行目を入力してください。',
            'applicable_period_end_day1_7.required_with' => '7_算定対象期間_終了日_8行目を入力してください。',
            'applicable_period_end_day1_8.required_with' => '7_算定対象期間_終了日_9行目を入力してください。',
            'applicable_period_end_day1_9.required_with' => '7_算定対象期間_終了日_10行目を入力してください。',
            'applicable_period_end_day1_10.required_with' => '7_算定対象期間_終了日_11行目を入力してください。',
            'applicable_period_end_day1_11.required_with' => '7_算定対象期間_終了日_12行目を入力してください。',
            'applicable_period_end_day1_12.required_with' => '7_算定対象期間_終了日_13行目を入力してください。',
            'applicable_period_end_day1_13.required_with' => '7_算定対象期間_終了日_14行目を入力してください。',
            'applicable_period_end_day1_14.required_with' => '7_算定対象期間_終了日_15行目を入力してください。',
            'applicable_period_end_day1_15.required_with' => '7_算定対象期間_終了日_16行目を入力してください。',
            'payment_period_start_month1.required_with' => '9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_period_start_month1_1.required_with' => '9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_period_start_month1_2.required_with' => '9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_period_start_month1_3.required_with' => '9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_period_start_month1_4.required_with' => '9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_period_start_month1_5.required_with' => '9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_period_start_month1_6.required_with' => '9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_period_start_month1_7.required_with' => '9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_period_start_month1_8.required_with' => '9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_period_start_month1_9.required_with' => '9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_period_start_month1_10.required_with' => '9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_period_start_month1_11.required_with' => '9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_period_start_month1_12.required_with' => '9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_period_start_month1_13.required_with' => '9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_period_start_month1_14.required_with' => '9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_period_start_month1_15.required_with' => '9_賃金支払対象期間_開始月_16行目を入力してください。',
            'payment_period_start_day1.required_with' => '9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_period_start_day1_1.required_with' => '9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_period_start_day1_2.required_with' => '9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_period_start_day1_3.required_with' => '9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_period_start_day1_4.required_with' => '9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_period_start_day1_5.required_with' => '9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_period_start_day1_6.required_with' => '9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_period_start_day1_7.required_with' => '9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_period_start_day1_8.required_with' => '9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_period_start_day1_9.required_with' => '9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_period_start_day1_10.required_with' => '9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_period_start_day1_11.required_with' => '9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_period_start_day1_12.required_with' => '9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_period_start_day1_13.required_with' => '9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_period_start_day1_14.required_with' => '9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_period_start_day1_16.required_with' => '9_賃金支払対象期間_開始日_16行目を入力してください。',
            'payment_period_end_month1_1.required_with' => '9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_period_end_month1_2.required_with' => '9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_period_end_month1_3.required_with' => '9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_period_end_month1_4.required_with' => '9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_period_end_month1_5.required_with' => '9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_period_end_month1_6.required_with' => '9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_period_end_month1_7.required_with' => '9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_period_end_month1_8.required_with' => '9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_period_end_month1_9.required_with' => '9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_period_end_month1_10.required_with' => '9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_period_end_month1_11.required_with' => '9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_period_end_month1_12.required_with' => '9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_period_end_month1_13.required_with' => '9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_period_end_month1_14.required_with' => '9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_period_end_month1_15.required_with' => '9_賃金支払対象期間_終了月_16行目を入力してください。',
            'payment_period_end_day1_1.required_with' => '9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_period_end_day1_2.required_with' => '9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_period_end_day1_3.required_with' => '9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_period_end_day1_4.required_with' => '9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_period_end_day1_5.required_with' => '9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_period_end_day1_6.required_with' => '9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_period_end_day1_7.required_with' => '9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_period_end_day1_8.required_with' => '9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_period_end_day1_9.required_with' => '9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_period_end_day1_10.required_with' => '9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_period_end_day1_11.required_with' => '9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_period_end_day1_12.required_with' => '9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_period_end_day1_13.required_with' => '9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_period_end_day1_14.required_with' => '9_賃金支払対象期間_終了日_15行目を入力してください。',
            'payment_period_end_day1_16.required_with' => '9_賃金支払対象期間_終了日_16行目を入力してください。',
            'applicable_period_start_month2_1.required_with' => '[続紙]7_算定対象期間_開始月_1行目を入力してください。',
            'applicable_period_start_month2_2.required_with' => '[続紙]7_算定対象期間_開始月_2行目を入力してください。',
            'applicable_period_start_month2_3.required_with' => '[続紙]7_算定対象期間_開始月_3行目を入力してください。',
            'applicable_period_start_month2_4.required_with' => '[続紙]7_算定対象期間_開始月_4行目を入力してください。',
            'applicable_period_start_month2_5.required_with' => '[続紙]7_算定対象期間_開始月_5行目を入力してください。',
            'applicable_period_start_month2_6.required_with' => '[続紙]7_算定対象期間_開始月_6行目を入力してください。',
            'applicable_period_start_month2_7.required_with' => '[続紙]7_算定対象期間_開始月_7行目を入力してください。',
            'applicable_period_start_month2_8.required_with' => '[続紙]7_算定対象期間_開始月_8行目を入力してください。',
            'applicable_period_start_month2_9.required_with' => '[続紙]7_算定対象期間_開始月_9行目を入力してください。',
            'applicable_period_start_month2_10.required_with' => '[続紙]7_算定対象期間_開始月_10行目を入力してください。',
            'applicable_period_start_month2_11.required_with' => '[続紙]7_算定対象期間_開始月_11行目を入力してください。',
            'applicable_period_start_month2_12.required_with' => '[続紙]7_算定対象期間_開始月_12行目を入力してください。',
            'applicable_period_start_month2_13.required_with' => '[続紙]7_算定対象期間_開始月_13行目を入力してください。',
            'applicable_period_start_month2_14.required_with' => '[続紙]7_算定対象期間_開始月_14行目を入力してください。',
            'applicable_period_start_month2_15.required_with' => '[続紙]7_算定対象期間_開始月_15行目を入力してください。',
            'applicable_period_start_day2_1.required_with' => '[続紙]7_算定対象期間_開始日_1行目を入力してください。',
            'applicable_period_start_day2_2.required_with' => '[続紙]7_算定対象期間_開始日_2行目を入力してください。',
            'applicable_period_start_day2_3.required_with' => '[続紙]7_算定対象期間_開始日_3行目を入力してください。',
            'applicable_period_start_day2_4.required_with' => '[続紙]7_算定対象期間_開始日_4行目を入力してください。',
            'applicable_period_start_day2_5.required_with' => '[続紙]7_算定対象期間_開始日_5行目を入力してください。',
            'applicable_period_start_day2_6.required_with' => '[続紙]7_算定対象期間_開始日_6行目を入力してください。',
            'applicable_period_start_day2_7.required_with' => '[続紙]7_算定対象期間_開始日_7行目を入力してください。',
            'applicable_period_start_day2_8.required_with' => '[続紙]7_算定対象期間_開始日_8行目を入力してください。',
            'applicable_period_start_day2_9.required_with' => '[続紙]7_算定対象期間_開始日_9行目を入力してください。',
            'applicable_period_start_day2_10.required_with' => '[続紙]7_算定対象期間_開始日_10行目を入力してください。',
            'applicable_period_start_day2_11.required_with' => '[続紙]7_算定対象期間_開始日_11行目を入力してください。',
            'applicable_period_start_day2_12.required_with' => '[続紙]7_算定対象期間_開始日_12行目を入力してください。',
            'applicable_period_start_day2_13.required_with' => '[続紙]7_算定対象期間_開始日_13行目を入力してください。',
            'applicable_period_start_day2_14.required_with' => '[続紙]7_算定対象期間_開始日_14行目を入力してください。',
            'applicable_period_start_day2_15.required_with' => '[続紙]7_算定対象期間_開始日_15行目を入力してください。',
            'applicable_period_end_month2_1.required_with' => '[続紙]7_算定対象期間_終了月_1行目を入力してください。',
            'applicable_period_end_month2_2.required_with' => '[続紙]7_算定対象期間_終了月_2行目を入力してください。',
            'applicable_period_end_month2_3.required_with' => '[続紙]7_算定対象期間_終了月_3行目を入力してください。',
            'applicable_period_end_month2_4.required_with' => '[続紙]7_算定対象期間_終了月_4行目を入力してください。',
            'applicable_period_end_month2_5.required_with' => '[続紙]7_算定対象期間_終了月_5行目を入力してください。',
            'applicable_period_end_month2_6.required_with' => '[続紙]7_算定対象期間_終了月_6行目を入力してください。',
            'applicable_period_end_month2_7.required_with' => '[続紙]7_算定対象期間_終了月_7行目を入力してください。',
            'applicable_period_end_month2_8.required_with' => '[続紙]7_算定対象期間_終了月_8行目を入力してください。',
            'applicable_period_end_month2_9.required_with' => '[続紙]7_算定対象期間_終了月_9行目を入力してください。',
            'applicable_period_end_month2_10.required_with' => '[続紙]7_算定対象期間_終了月_10行目を入力してください。',
            'applicable_period_end_month2_11.required_with' => '[続紙]7_算定対象期間_終了月_11行目を入力してください。',
            'applicable_period_end_month2_12.required_with' => '[続紙]7_算定対象期間_終了月_12行目を入力してください。',
            'applicable_period_end_month2_13.required_with' => '[続紙]7_算定対象期間_終了月_13行目を入力してください。',
            'applicable_period_end_month2_14.required_with' => '[続紙]7_算定対象期間_終了月_14行目を入力してください。',
            'applicable_period_end_month2_15.required_with' => '[続紙]7_算定対象期間_終了月_15行目を入力してください。',
            'applicable_period_end_day2_1.required_with' => '[続紙]7_算定対象期間_終了日_1行目を入力してください。',
            'applicable_period_end_day2_2.required_with' => '[続紙]7_算定対象期間_終了日_2行目を入力してください。',
            'applicable_period_end_day2_3.required_with' => '[続紙]7_算定対象期間_終了日_3行目を入力してください。',
            'applicable_period_end_day2_4.required_with' => '[続紙]7_算定対象期間_終了日_4行目を入力してください。',
            'applicable_period_end_day2_5.required_with' => '[続紙]7_算定対象期間_終了日_5行目を入力してください。',
            'applicable_period_end_day2_6.required_with' => '[続紙]7_算定対象期間_終了日_6行目を入力してください。',
            'applicable_period_end_day2_7.required_with' => '[続紙]7_算定対象期間_終了日_7行目を入力してください。',
            'applicable_period_end_day2_8.required_with' => '[続紙]7_算定対象期間_終了日_8行目を入力してください。',
            'applicable_period_end_day2_9.required_with' => '[続紙]7_算定対象期間_終了日_9行目を入力してください。',
            'applicable_period_end_day2_10.required_with' => '[続紙]7_算定対象期間_終了日_10行目を入力してください。',
            'applicable_period_end_day2_11.required_with' => '[続紙]7_算定対象期間_終了日_11行目を入力してください。',
            'applicable_period_end_day2_12.required_with' => '[続紙]7_算定対象期間_終了日_12行目を入力してください。',
            'applicable_period_end_day2_13.required_with' => '[続紙]7_算定対象期間_終了日_13行目を入力してください。',
            'applicable_period_end_day2_14.required_with' => '[続紙]7_算定対象期間_終了日_14行目を入力してください。',
            'applicable_period_end_day2_15.required_with' => '[続紙]7_算定対象期間_終了日_15行目を入力してください。',
            'payment_period_start_month2_1.required_with' => '[続紙]9_賃金支払対象期間_開始月_1行目を入力してください。',
            'payment_period_start_month2_2.required_with' => '[続紙]9_賃金支払対象期間_開始月_2行目を入力してください。',
            'payment_period_start_month2_3.required_with' => '[続紙]9_賃金支払対象期間_開始月_3行目を入力してください。',
            'payment_period_start_month2_4.required_with' => '[続紙]9_賃金支払対象期間_開始月_4行目を入力してください。',
            'payment_period_start_month2_5.required_with' => '[続紙]9_賃金支払対象期間_開始月_5行目を入力してください。',
            'payment_period_start_month2_6.required_with' => '[続紙]9_賃金支払対象期間_開始月_6行目を入力してください。',
            'payment_period_start_month2_7.required_with' => '[続紙]9_賃金支払対象期間_開始月_7行目を入力してください。',
            'payment_period_start_month2_8.required_with' => '[続紙]9_賃金支払対象期間_開始月_8行目を入力してください。',
            'payment_period_start_month2_9.required_with' => '[続紙]9_賃金支払対象期間_開始月_9行目を入力してください。',
            'payment_period_start_month2_10.required_with' => '[続紙]9_賃金支払対象期間_開始月_10行目を入力してください。',
            'payment_period_start_month2_11.required_with' => '[続紙]9_賃金支払対象期間_開始月_11行目を入力してください。',
            'payment_period_start_month2_12.required_with' => '[続紙]9_賃金支払対象期間_開始月_12行目を入力してください。',
            'payment_period_start_month2_13.required_with' => '[続紙]9_賃金支払対象期間_開始月_13行目を入力してください。',
            'payment_period_start_month2_14.required_with' => '[続紙]9_賃金支払対象期間_開始月_14行目を入力してください。',
            'payment_period_start_month2_15.required_with' => '[続紙]9_賃金支払対象期間_開始月_15行目を入力してください。',
            'payment_period_start_day2_1.required_with' => '[続紙]9_賃金支払対象期間_開始日_1行目を入力してください。',
            'payment_period_start_day2_2.required_with' => '[続紙]9_賃金支払対象期間_開始日_2行目を入力してください。',
            'payment_period_start_day2_3.required_with' => '[続紙]9_賃金支払対象期間_開始日_3行目を入力してください。',
            'payment_period_start_day2_4.required_with' => '[続紙]9_賃金支払対象期間_開始日_4行目を入力してください。',
            'payment_period_start_day2_5.required_with' => '[続紙]9_賃金支払対象期間_開始日_5行目を入力してください。',
            'payment_period_start_day2_6.required_with' => '[続紙]9_賃金支払対象期間_開始日_6行目を入力してください。',
            'payment_period_start_day2_7.required_with' => '[続紙]9_賃金支払対象期間_開始日_7行目を入力してください。',
            'payment_period_start_day2_8.required_with' => '[続紙]9_賃金支払対象期間_開始日_8行目を入力してください。',
            'payment_period_start_day2_9.required_with' => '[続紙]9_賃金支払対象期間_開始日_9行目を入力してください。',
            'payment_period_start_day2_10.required_with' => '[続紙]9_賃金支払対象期間_開始日_10行目を入力してください。',
            'payment_period_start_day2_11.required_with' => '[続紙]9_賃金支払対象期間_開始日_11行目を入力してください。',
            'payment_period_start_day2_12.required_with' => '[続紙]9_賃金支払対象期間_開始日_12行目を入力してください。',
            'payment_period_start_day2_13.required_with' => '[続紙]9_賃金支払対象期間_開始日_13行目を入力してください。',
            'payment_period_start_day2_14.required_with' => '[続紙]9_賃金支払対象期間_開始日_14行目を入力してください。',
            'payment_period_start_day2_15.required_with' => '[続紙]9_賃金支払対象期間_開始日_15行目を入力してください。',
            'payment_period_end_month2_1.required_with' => '[続紙]9_賃金支払対象期間_終了月_1行目を入力してください。',
            'payment_period_end_month2_2.required_with' => '[続紙]9_賃金支払対象期間_終了月_2行目を入力してください。',
            'payment_period_end_month2_3.required_with' => '[続紙]9_賃金支払対象期間_終了月_3行目を入力してください。',
            'payment_period_end_month2_4.required_with' => '[続紙]9_賃金支払対象期間_終了月_4行目を入力してください。',
            'payment_period_end_month2_5.required_with' => '[続紙]9_賃金支払対象期間_終了月_5行目を入力してください。',
            'payment_period_end_month2_6.required_with' => '[続紙]9_賃金支払対象期間_終了月_6行目を入力してください。',
            'payment_period_end_month2_7.required_with' => '[続紙]9_賃金支払対象期間_終了月_7行目を入力してください。',
            'payment_period_end_month2_8.required_with' => '[続紙]9_賃金支払対象期間_終了月_8行目を入力してください。',
            'payment_period_end_month2_9.required_with' => '[続紙]9_賃金支払対象期間_終了月_9行目を入力してください。',
            'payment_period_end_month2_10.required_with' => '[続紙]9_賃金支払対象期間_終了月_10行目を入力してください。',
            'payment_period_end_month2_11.required_with' => '[続紙]9_賃金支払対象期間_終了月_11行目を入力してください。',
            'payment_period_end_month2_12.required_with' => '[続紙]9_賃金支払対象期間_終了月_12行目を入力してください。',
            'payment_period_end_month2_13.required_with' => '[続紙]9_賃金支払対象期間_終了月_13行目を入力してください。',
            'payment_period_end_month2_14.required_with' => '[続紙]9_賃金支払対象期間_終了月_14行目を入力してください。',
            'payment_period_end_month2_15.required_with' => '[続紙]9_賃金支払対象期間_終了月_15行目を入力してください。',
            'payment_period_end_day2_1.required_with' => '[続紙]9_賃金支払対象期間_終了日_1行目を入力してください。',
            'payment_period_end_day2_2.required_with' => '[続紙]9_賃金支払対象期間_終了日_2行目を入力してください。',
            'payment_period_end_day2_3.required_with' => '[続紙]9_賃金支払対象期間_終了日_3行目を入力してください。',
            'payment_period_end_day2_4.required_with' => '[続紙]9_賃金支払対象期間_終了日_4行目を入力してください。',
            'payment_period_end_day2_5.required_with' => '[続紙]9_賃金支払対象期間_終了日_5行目を入力してください。',
            'payment_period_end_day2_6.required_with' => '[続紙]9_賃金支払対象期間_終了日_6行目を入力してください。',
            'payment_period_end_day2_7.required_with' => '[続紙]9_賃金支払対象期間_終了日_7行目を入力してください。',
            'payment_period_end_day2_8.required_with' => '[続紙]9_賃金支払対象期間_終了日_8行目を入力してください。',
            'payment_period_end_day2_9.required_with' => '[続紙]9_賃金支払対象期間_終了日_9行目を入力してください。',
            'payment_period_end_day2_10.required_with' => '[続紙]9_賃金支払対象期間_終了日_10行目を入力してください。',
            'payment_period_end_day2_11.required_with' => '[続紙]9_賃金支払対象期間_終了日_11行目を入力してください。',
            'payment_period_end_day2_12.required_with' => '[続紙]9_賃金支払対象期間_終了日_12行目を入力してください。',
            'payment_period_end_day2_13.required_with' => '[続紙]9_賃金支払対象期間_終了日_13行目を入力してください。',
            'payment_period_end_day2_14.required_with' => '[続紙]9_賃金支払対象期間_終了日_14行目を入力してください。',
            'payment_period_end_day2_15.required_with' => '[続紙]9_賃金支払対象期間_終了日_15行目を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "file_wage_certificate_or_payment_status" => '添付ファイル_賃金月額証明書 又は 賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
            "file_childcare" => '添付ファイル_育児の事実が確認できる書類',
            "file_nursing_care" => '添付ファイル_介護の事実が確認できる書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'wage_monthly_certificate_on_leave_start' => '休業開始時賃金月額証明書',
            'wage_certificate_working_hours_shortened_start' => '所定労働時間短縮開始時賃金証明書',
            'employee_employment_insured_no_4' => '1_被保険者番号4桁',
            'employee_employment_insured_no_6' => '1_被保険者番号6桁',
            'employee_employment_insured_no_cd' => '1_被保険者番号1桁',
            'branch_insurance_office_no_4' => '2_事業所番号4桁',
            'branch_insurance_office_no_6' => '2_事業所番号6桁',
            'branch_insurance_office_no_cd' => '2_事業所番号1桁',
            'employee_name_kana' => '3_休業等を開始した者の氏名（フリガナ）',
            'employee_name' => '3_休業等を開始した者の氏名',
            'employee_childcare_caregiver_leave_start_japan_era' => '4_休業等を開始した日の年月日_年号',
            'employee_childcare_caregiver_leave_start_era_year' => '4_休業等を開始した日の年月日_年',
            'employee_childcare_caregiver_leave_start_month' => '4_休業等を開始した日の年月日_月',
            'employee_childcare_caregiver_leave_start_day' => '4_休業等を開始した日の年月日_日',
            'branch_name' => '5_事業所名称',
            'branch_address' => '5_事業所所在地',
            'branch_tel_area_code' => '5_事業所電話番号_市外局番',
            'branch_tel_city_code' => '5_事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '5_事業所電話番号_加入者番号',
            'employeepost_code_3' => '6_休業等を開始した者の住所又は居所_郵便番号3桁',
            'employeepost_code_4' => '6_休業等を開始した者の住所又は居所_郵便番号4桁',
            'employee_address' => '6_休業等を開始した者の住所又は居所_所在地',
            'employee_tel_area_code' => '6_休業等を開始した者の電話番号_市外局番',
            'employee_tel_city_code' => '6_休業等を開始した者の電話番号_市内局番',
            'employee_tel_subscriber_code' => '6_休業等を開始した者の電話番号_加入者番号',
            'headquarters_address' => '事業主住所',
            'headquarters_employee_name' => '事業主氏名',
            'closing_start_month' => '7_算定対象期間_休業等を開始した日_月',
            'closing_start_day' => '7_算定対象期間_休業等を開始した日_日',
            'applicable_period_start_month1' => '7_算定対象期間_開始月_1行目',
            'applicable_period_start_day1' => '7_算定対象期間_開始日_1行目',
            'basic_days1' => '8_賃金支払基礎日数_1行目',
            'payment_period_start_month1' => '9_賃金支払対象期間_開始月_1行目',
            'payment_period_start_day1' => '9_賃金支払対象期間_開始日_1行目',
            'payment_period_basic_days1' => '10_基礎日数_1行目',
            'wage_amount_a1' => '11_賃金額_A_1行目',
            'wage_amount_b1' => '11_賃金額_B_1行目',
            'note1_01' => '12_備考_1行目',
            'applicable_period_start_month1_1' => '7_算定対象期間_開始月_2行目',
            'applicable_period_start_day1_1' => '7_算定対象期間_開始日_2行目',
            'applicable_period_end_month1_1' => '7_算定対象期間_終了月_2行目',
            'applicable_period_end_day1_1' => '7_算定対象期間_終了日_2行目',
            'basic_days_1' => '8_賃金支払基礎日数_2行目',
            'payment_period_start_month1_1' => '9_賃金支払対象期間_開始月_2行目',
            'payment_period_start_day1_1' => '9_賃金支払対象期間_開始日_2行目',
            'payment_period_end_month1_1' => '9_賃金支払対象期間_終了月_2行目',
            'payment_period_end_day1_1' => '9_賃金支払対象期間_終了日_2行目',
            'payment_period_basic_days1_1' => '10_基礎日数_2行目',
            'wage_amount_a1_1' => '11_賃金額_A_2行目',
            'wage_amount_b1_1' => '11_賃金額_B_2行目',
            'note1_02' => '12_備考_2行目',
            'applicable_period_start_month1_2' => '7_算定対象期間_開始月_3行目',
            'applicable_period_start_day1_2' => '7_算定対象期間_開始日_3行目',
            'applicable_period_end_month1_2' => '7_算定対象期間_終了月_3行目',
            'applicable_period_end_day1_2' => '7_算定対象期間_終了日_3行目',
            'basic_days_2' => '8_賃金支払基礎日数_3行目',
            'payment_period_start_month1_2' => '9_賃金支払対象期間_開始月_3行目',
            'payment_period_start_day1_2' => '9_賃金支払対象期間_開始日_3行目',
            'payment_period_end_month1_2' => '9_賃金支払対象期間_終了月_3行目',
            'payment_period_end_day1_2' => '9_賃金支払対象期間_終了日_3行目',
            'payment_period_basic_days1_2' => '10_基礎日数_3行目',
            'wage_amount_a1_2' => '11_賃金額_A_3行目',
            'wage_amount_b1_2' => '11_賃金額_B_3行目',
            'note1_03' => '12_備考_3行目',
            'applicable_period_start_month1_3' => '7_算定対象期間_開始月_4行目',
            'applicable_period_start_day1_3' => '7_算定対象期間_開始日_4行目',
            'applicable_period_end_month1_3' => '7_算定対象期間_終了月_4行目',
            'applicable_period_end_day1_3' => '7_算定対象期間_終了日_4行目',
            'basic_days_3' => '8_賃金支払基礎日数_4行目',
            'payment_period_start_month1_3' => '9_賃金支払対象期間_開始月_4行目',
            'payment_period_start_day1_3' => '9_賃金支払対象期間_開始日_4行目',
            'payment_period_end_month1_3' => '9_賃金支払対象期間_終了月_4行目',
            'payment_period_end_day1_3' => '9_賃金支払対象期間_終了日_4行目',
            'payment_period_basic_days1_3' => '10_基礎日数_4行目',
            'wage_amount_a1_3' => '11_賃金額_A_4行目',
            'wage_amount_b1_3' => '11_賃金額_B_4行目',
            'note1_04' => '12_備考_4行目',
            'applicable_period_start_month1_4' => '7_算定対象期間_開始月_5行目',
            'applicable_period_start_day1_4' => '7_算定対象期間_開始日_5行目',
            'applicable_period_end_month1_4' => '7_算定対象期間_終了月_5行目',
            'applicable_period_end_day1_4' => '7_算定対象期間_終了日_5行目',
            'basic_days_4' => '8_賃金支払基礎日数_5行目',
            'payment_period_start_month1_4' => '9_賃金支払対象期間_開始月_5行目',
            'payment_period_start_day1_4' => '9_賃金支払対象期間_開始日_5行目',
            'payment_period_end_month1_4' => '9_賃金支払対象期間_終了月_5行目',
            'payment_period_end_day1_4' => '9_賃金支払対象期間_終了日_5行目',
            'payment_period_basic_days1_4' => '10_基礎日数_5行目',
            'wage_amount_a1_4' => '11_賃金額_A_5行目',
            'wage_amount_b1_4' => '11_賃金額_B_5行目',
            'note1_05' => '12_備考_5行目',
            'applicable_period_start_month1_5' => '7_算定対象期間_開始月_6行目',
            'applicable_period_start_day1_5' => '7_算定対象期間_開始日_6行目',
            'applicable_period_end_month1_5' => '7_算定対象期間_終了月_6行目',
            'applicable_period_end_day1_5' => '7_算定対象期間_終了日_6行目',
            'basic_days_5' => '8_賃金支払基礎日数_6行目',
            'payment_period_start_month1_5' => '9_賃金支払対象期間_開始月_6行目',
            'payment_period_start_day1_5' => '9_賃金支払対象期間_開始日_6行目',
            'payment_period_end_month1_5' => '9_賃金支払対象期間_終了月_6行目',
            'payment_period_end_day1_5' => '9_賃金支払対象期間_終了日_6行目',
            'payment_period_basic_days1_5' => '10_基礎日数_6行目',
            'wage_amount_a1_5' => '11_賃金額_A_6行目',
            'wage_amount_b1_5' => '11_賃金額_B_6行目',
            'note1_06' => '12_備考_6行目',
            'applicable_period_start_month1_6' => '7_算定対象期間_開始月_7行目',
            'applicable_period_start_day1_6' => '7_算定対象期間_開始日_7行目',
            'applicable_period_end_month1_6' => '7_算定対象期間_終了月_7行目',
            'applicable_period_end_day1_6' => '7_算定対象期間_終了日_7行目',
            'basic_days_6' => '8_賃金支払基礎日数_7行目',
            'payment_period_start_month1_6' => '9_賃金支払対象期間_開始月_7行目',
            'payment_period_start_day1_6' => '9_賃金支払対象期間_開始日_7行目',
            'payment_period_end_month1_6' => '9_賃金支払対象期間_終了月_7行目',
            'payment_period_end_day1_6' => '9_賃金支払対象期間_終了日_7行目',
            'payment_period_basic_days1_6' => '10_基礎日数_7行目',
            'wage_amount_a1_6' => '11_賃金額_A_7行目',
            'wage_amount_b1_6' => '11_賃金額_B_7行目',
            'note1_07' => '12_備考_7行目',
            'applicable_period_start_month1_7' => '7_算定対象期間_開始月_8行目',
            'applicable_period_start_day1_7' => '7_算定対象期間_開始日_8行目',
            'applicable_period_end_month1_7' => '7_算定対象期間_終了月_8行目',
            'applicable_period_end_day1_7' => '7_算定対象期間_終了日_8行目',
            'basic_days_7' => '8_賃金支払基礎日数_8行目',
            'payment_period_start_month1_7' => '9_賃金支払対象期間_開始月_8行目',
            'payment_period_start_day1_7' => '9_賃金支払対象期間_開始日_8行目',
            'payment_period_end_month1_7' => '9_賃金支払対象期間_終了月_8行目',
            'payment_period_end_day1_7' => '9_賃金支払対象期間_終了日_8行目',
            'payment_period_basic_days1_7' => '10_基礎日数_8行目',
            'wage_amount_a1_7' => '11_賃金額_A_8行目',
            'wage_amount_b1_7' => '11_賃金額_B_8行目',
            'note1_08' => '12_備考_8行目',
            'applicable_period_start_month1_8' => '7_算定対象期間_開始月_9行目',
            'applicable_period_start_day1_8' => '7_算定対象期間_開始日_9行目',
            'applicable_period_end_month1_8' => '7_算定対象期間_終了月_9行目',
            'applicable_period_end_day1_8' => '7_算定対象期間_終了日_9行目',
            'basic_days_8' => '8_賃金支払基礎日数_9行目',
            'payment_period_start_month1_8' => '9_賃金支払対象期間_開始月_9行目',
            'payment_period_start_day1_8' => '9_賃金支払対象期間_開始日_9行目',
            'payment_period_end_month1_8' => '9_賃金支払対象期間_終了月_9行目',
            'payment_period_end_day1_8' => '9_賃金支払対象期間_終了日_9行目',
            'payment_period_basic_days1_8' => '10_基礎日数_9行目',
            'wage_amount_a1_8' => '11_賃金額_A_9行目',
            'wage_amount_b1_8' => '11_賃金額_B_9行目',
            'note1_09' => '12_備考_9行目',
            'applicable_period_start_month1_9' => '7_算定対象期間_開始月_10行目',
            'applicable_period_start_day1_9' => '7_算定対象期間_開始日_10行目',
            'applicable_period_end_month1_9' => '7_算定対象期間_終了月_10行目',
            'applicable_period_end_day1_9' => '7_算定対象期間_終了日_10行目',
            'basic_days_9' => '8_賃金支払基礎日数_10行目',
            'payment_period_start_month1_9' => '9_賃金支払対象期間_開始月_10行目',
            'payment_period_start_day1_9' => '9_賃金支払対象期間_開始日_10行目',
            'payment_period_end_month1_9' => '9_賃金支払対象期間_終了月_10行目',
            'payment_period_end_day1_9' => '9_賃金支払対象期間_終了日_10行目',
            'payment_period_basic_days1_9' => '10_基礎日数_10行目',
            'wage_amount_a1_9' => '11_賃金額_A_10行目',
            'wage_amount_b1_9' => '11_賃金額_B_10行目',
            'note1_10' => '12_備考_10行目',
            'applicable_period_start_month1_10' => '7_算定対象期間_開始月_11行目',
            'applicable_period_start_day1_10' => '7_算定対象期間_開始日_11行目',
            'applicable_period_end_month1_10' => '7_算定対象期間_終了月_11行目',
            'applicable_period_end_day1_10' => '7_算定対象期間_終了日_11行目',
            'basic_days_10' => '8_賃金支払基礎日数_11行目',
            'payment_period_start_month1_10' => '9_賃金支払対象期間_開始月_11行目',
            'payment_period_start_day1_10' => '9_賃金支払対象期間_開始日_11行目',
            'payment_period_end_month1_10' => '9_賃金支払対象期間_終了月_11行目',
            'payment_period_end_day1_10' => '9_賃金支払対象期間_終了日_11行目',
            'payment_period_basic_days1_10' => '10_基礎日数_11行目',
            'wage_amount_a1_10' => '11_賃金額_A_11行目',
            'wage_amount_b1_10' => '11_賃金額_B_11行目',
            'note1_11' => '12_備考_11行目',
            'applicable_period_start_month1_11' => '7_算定対象期間_開始月_12行目',
            'applicable_period_start_day1_11' => '7_算定対象期間_開始日_12行目',
            'applicable_period_end_month1_11' => '7_算定対象期間_終了月_12行目',
            'applicable_period_end_day1_11' => '7_算定対象期間_終了日_12行目',
            'basic_days_11' => '8_賃金支払基礎日数_12行目',
            'payment_period_start_month1_11' => '9_賃金支払対象期間_開始月_12行目',
            'payment_period_start_day1_11' => '9_賃金支払対象期間_開始日_12行目',
            'payment_period_end_month1_11' => '9_賃金支払対象期間_終了月_12行目',
            'payment_period_end_day1_11' => '9_賃金支払対象期間_終了日_12行目',
            'payment_period_basic_days1_11' => '10_基礎日数_12行目',
            'wage_amount_a1_11' => '11_賃金額_A_12行目',
            'wage_amount_b1_11' => '11_賃金額_B_12行目',
            'note1_12' => '12_備考_12行目',
            'applicable_period_start_month1_12' => '7_算定対象期間_開始月_13行目',
            'applicable_period_start_day1_12' => '7_算定対象期間_開始日_13行目',
            'applicable_period_end_month1_12' => '7_算定対象期間_終了月_13行目',
            'applicable_period_end_day1_12' => '7_算定対象期間_終了日_13行目',
            'basic_days_12' => '8_賃金支払基礎日数_13行目',
            'payment_period_start_month1_12' => '9_賃金支払対象期間_開始月_13行目',
            'payment_period_start_day1_12' => '9_賃金支払対象期間_開始日_13行目',
            'payment_period_end_month1_12' => '9_賃金支払対象期間_終了月_13行目',
            'payment_period_end_day1_12' => '9_賃金支払対象期間_終了日_13行目',
            'payment_period_basic_days1_12' => '10_基礎日数_13行目',
            'wage_amount_a1_12' => '11_賃金額_A_13行目',
            'wage_amount_b1_12' => '11_賃金額_B_13行目',
            'note1_13' => '12_備考_13行目',
            'applicable_period_start_month1_13' => '7_算定対象期間_開始月_14行目',
            'applicable_period_start_day1_13' => '7_算定対象期間_開始日_14行目',
            'applicable_period_end_month1_13' => '7_算定対象期間_終了月_14行目',
            'applicable_period_end_day1_13' => '7_算定対象期間_終了日_14行目',
            'basic_days_13' => '8_賃金支払基礎日数_14行目',
            'payment_period_start_month1_13' => '9_賃金支払対象期間_開始月_14行目',
            'payment_period_start_day1_13' => '9_賃金支払対象期間_開始日_14行目',
            'payment_period_end_month1_13' => '9_賃金支払対象期間_終了月_14行目',
            'payment_period_end_day1_13' => '9_賃金支払対象期間_終了日_14行目',
            'payment_period_basic_days1_13' => '10_基礎日数_14行目',
            'wage_amount_a1_13' => '11_賃金額_A_14行目',
            'wage_amount_b1_13' => '11_賃金額_B_14行目',
            'note1_14' => '12_備考_14行目',
            'applicable_period_start_month1_14' => '7_算定対象期間_開始月_15行目',
            'applicable_period_start_day1_14' => '7_算定対象期間_開始日_15行目',
            'applicable_period_end_month1_14' => '7_算定対象期間_終了月_15行目',
            'applicable_period_end_day1_14' => '7_算定対象期間_終了日_15行目',
            'basic_days_14' => '8_賃金支払基礎日数_15行目',
            'payment_period_start_month1_14' => '9_賃金支払対象期間_開始月_15行目',
            'payment_period_start_day1_14' => '9_賃金支払対象期間_開始日_15行目',
            'payment_period_end_month1_14' => '9_賃金支払対象期間_終了月_15行目',
            'payment_period_end_day1_14' => '9_賃金支払対象期間_終了日_15行目',
            'payment_period_basic_days1_14' => '10_基礎日数_15行目',
            'wage_amount_a1_14' => '11_賃金額_A_15行目',
            'wage_amount_b1_14' => '11_賃金額_B_15行目',
            'note1_15' => '12_備考_15行目',
            'applicable_period_start_month1_15' => '7_算定対象期間_開始月_16行目',
            'applicable_period_start_day1_15' => '7_算定対象期間_開始日_16行目',
            'applicable_period_end_month1_15' => '7_算定対象期間_終了月_16行目',
            'applicable_period_end_day1_15' => '7_算定対象期間_終了日_16行目',
            'basic_days_15' => '8_賃金支払基礎日数_16行目',
            'payment_period_start_month1_15' => '9_賃金支払対象期間_開始月_16行目',
            'payment_period_start_day1_15' => '9_賃金支払対象期間_開始日_16行目',
            'payment_period_end_month1_15' => '9_賃金支払対象期間_終了月_16行目',
            'payment_period_end_day1_15' => '9_賃金支払対象期間_終了日_16行目',
            'payment_period_basic_days1_15' => '10_基礎日数_16行目',
            'wage_amount_a1_15' => '11_賃金額_A_16行目',
            'wage_amount_b1_15' => '11_賃金額_B_16行目',
            'note1_16' => '12_備考_16行目',
            'employee_salary_notices1' => '13_賃金に関する特記事項',
            'employment_period' => '14_（休業開始時における）雇用期間の定め有無',
            'employment_period_date_japan_era_year' => '14_（休業開始時における）雇用期間_日付_年',
            'employment_period_date_month' => '14_（休業開始時における）雇用期間_日付_月',
            'employment_period_date_day' => '14_（休業開始時における）雇用期間_日付_日',
            'employment_period_japan_era_year' => '14_（休業開始時における）雇用期間_期間_年',
            'employment_period_month' => '14_（休業開始時における）雇用期間_期間_月',
            'labor_consultant_japan_era_year' => '社会保険労務士記載欄_年',
            'labor_consultant_month' => '社会保険労務士記載欄_月',
            'labor_consultant_day' => '社会保険労務士記載欄_日',
            'labor_consultant_submission_agency_name' => '社会保険労務士記載欄_提出代行者･事務代理者',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名',
            'labor_consultant_tel_area_code' => '社会保険労務士記載欄_電話番号（市外局番）',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄_電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄_電話番号（加入者番号）',
            'other_notes' => '付記欄',
            //  2枚目
            'applicable_period_start_month2_1' => '[続紙]7_算定対象期間_開始月_1行目',
            'applicable_period_start_day2_1' => '[続紙]7_算定対象期間_開始日_1行目',
            'applicable_period_end_month2_1' => '[続紙]7_算定対象期間_終了月_1行目',
            'applicable_period_end_day2_1' => '[続紙]7_算定対象期間_終了日_1行目',
            'basic_days2_1' => '[続紙]8_賃金支払基礎日数_1行目',
            'payment_period_start_month2_1' => '[続紙]9_賃金支払対象期間_開始月_1行目',
            'payment_period_start_day2_1' => '[続紙]9_賃金支払対象期間_開始日_1行目',
            'payment_period_end_month2_1' => '[続紙]9_賃金支払対象期間_終了月_1行目',
            'payment_period_end_day2_1' => '[続紙]9_賃金支払対象期間_終了日_1行目',
            'payment_period_basic_days2_1' => '[続紙]10_基礎日数_1行目',
            'wage_amount_a2_1' => '[続紙]11_賃金額_A_1行目',
            'wage_amount_b2_1' => '[続紙]11_賃金額_B_1行目',
            'note2_1' => '[続紙]12_備考_1行目',
            'applicable_period_start_month2_2' => '[続紙]7_算定対象期間_開始月_2行目',
            'applicable_period_start_day2_2' => '[続紙]7_算定対象期間_開始日_2行目',
            'applicable_period_end_month2_2' => '[続紙]7_算定対象期間_終了月_2行目',
            'applicable_period_end_day2_2' => '[続紙]7_算定対象期間_終了日_2行目',
            'basic_days2_2' => '[続紙]8_賃金支払基礎日数_2行目',
            'payment_period_start_month2_2' => '[続紙]9_賃金支払対象期間_開始月_2行目',
            'payment_period_start_day2_2' => '[続紙]9_賃金支払対象期間_開始日_2行目',
            'payment_period_end_month2_2' => '[続紙]9_賃金支払対象期間_終了月_2行目',
            'payment_period_end_day2_2' => '[続紙]9_賃金支払対象期間_終了日_2行目',
            'payment_period_basic_days2_2' => '[続紙]10_基礎日数_2行目',
            'wage_amount_a2_2' => '[続紙]11_賃金額_A_2行目',
            'wage_amount_b2_2' => '[続紙]11_賃金額_B_2行目',
            'note2_2' => '[続紙]12_備考_2行目',
            'applicable_period_start_month2_3' => '[続紙]7_算定対象期間_開始月_3行目',
            'applicable_period_start_day2_3' => '[続紙]7_算定対象期間_開始日_3行目',
            'applicable_period_end_month2_3' => '[続紙]7_算定対象期間_終了月_3行目',
            'applicable_period_end_day2_3' => '[続紙]7_算定対象期間_終了日_3行目',
            'basic_days2_3' => '[続紙]8_賃金支払基礎日数_3行目',
            'payment_period_start_month2_3' => '[続紙]9_賃金支払対象期間_開始月_3行目',
            'payment_period_start_day2_3' => '[続紙]9_賃金支払対象期間_開始日_3行目',
            'payment_period_end_month2_3' => '[続紙]9_賃金支払対象期間_終了月_3行目',
            'payment_period_end_day2_3' => '[続紙]9_賃金支払対象期間_終了日_3行目',
            'payment_period_basic_days2_3' => '[続紙]10_基礎日数_3行目',
            'wage_amount_a2_3' => '[続紙]11_賃金額_A_3行目',
            'wage_amount_b2_3' => '[続紙]11_賃金額_B_3行目',
            'note2_3' => '[続紙]12_備考_3行目',
            'applicable_period_start_month2_4' => '[続紙]7_算定対象期間_開始月_4行目',
            'applicable_period_start_day2_4' => '[続紙]7_算定対象期間_開始日_4行目',
            'applicable_period_end_month2_4' => '[続紙]7_算定対象期間_終了月_4行目',
            'applicable_period_end_day2_4' => '[続紙]7_算定対象期間_終了日_4行目',
            'basic_days2_4' => '[続紙]8_賃金支払基礎日数_4行目',
            'payment_period_start_month2_4' => '[続紙]9_賃金支払対象期間_開始月_4行目',
            'payment_period_start_day2_4' => '[続紙]9_賃金支払対象期間_開始日_4行目',
            'payment_period_end_month2_4' => '[続紙]9_賃金支払対象期間_終了月_4行目',
            'payment_period_end_day2_4' => '[続紙]9_賃金支払対象期間_終了日_4行目',
            'payment_period_basic_days2_4' => '[続紙]10_基礎日数_4行目',
            'wage_amount_a2_4' => '[続紙]11_賃金額_A_4行目',
            'wage_amount_b2_4' => '[続紙]11_賃金額_B_4行目',
            'note2_4' => '[続紙]12_備考_4行目',
            'applicable_period_start_month2_5' => '[続紙]7_算定対象期間_開始月_5行目',
            'applicable_period_start_day2_5' => '[続紙]7_算定対象期間_開始日_5行目',
            'applicable_period_end_month2_5' => '[続紙]7_算定対象期間_終了月_5行目',
            'applicable_period_end_day2_5' => '[続紙]7_算定対象期間_終了日_5行目',
            'basic_days2_5' => '[続紙]8_賃金支払基礎日数_5行目',
            'payment_period_start_month2_5' => '[続紙]9_賃金支払対象期間_開始月_5行目',
            'payment_period_start_day2_5' => '[続紙]9_賃金支払対象期間_開始日_5行目',
            'payment_period_end_month2_5' => '[続紙]9_賃金支払対象期間_終了月_5行目',
            'payment_period_end_day2_5' => '[続紙]9_賃金支払対象期間_終了日_5行目',
            'payment_period_basic_days2_5' => '[続紙]10_基礎日数_5行目',
            'wage_amount_a2_5' => '[続紙]11_賃金額_A_5行目',
            'wage_amount_b2_5' => '[続紙]11_賃金額_B_5行目',
            'note2_5' => '[続紙]12_備考_5行目',
            'applicable_period_start_month2_6' => '[続紙]7_算定対象期間_開始月_6行目',
            'applicable_period_start_day2_6' => '[続紙]7_算定対象期間_開始日_6行目',
            'applicable_period_end_month2_6' => '[続紙]7_算定対象期間_終了月_6行目',
            'applicable_period_end_day2_6' => '[続紙]7_算定対象期間_終了日_6行目',
            'basic_days2_6' => '[続紙]8_賃金支払基礎日数_6行目',
            'payment_period_start_month2_6' => '[続紙]9_賃金支払対象期間_開始月_6行目',
            'payment_period_start_day2_6' => '[続紙]9_賃金支払対象期間_開始日_6行目',
            'payment_period_end_month2_6' => '[続紙]9_賃金支払対象期間_終了月_6行目',
            'payment_period_end_day2_6' => '[続紙]9_賃金支払対象期間_終了日_6行目',
            'payment_period_basic_days2_6' => '[続紙]10_基礎日数_6行目',
            'wage_amount_a2_6' => '[続紙]11_賃金額_A_6行目',
            'wage_amount_b2_6' => '[続紙]11_賃金額_B_6行目',
            'note2_6' => '[続紙]12_備考_6行目',
            'applicable_period_start_month2_7' => '[続紙]7_算定対象期間_開始月_7行目',
            'applicable_period_start_day2_7' => '[続紙]7_算定対象期間_開始日_7行目',
            'applicable_period_end_month2_7' => '[続紙]7_算定対象期間_終了月_7行目',
            'applicable_period_end_day2_7' => '[続紙]7_算定対象期間_終了日_7行目',
            'basic_days2_7' => '[続紙]8_賃金支払基礎日数_7行目',
            'payment_period_start_month2_7' => '[続紙]9_賃金支払対象期間_開始月_7行目',
            'payment_period_start_day2_7' => '[続紙]9_賃金支払対象期間_開始日_7行目',
            'payment_period_end_month2_7' => '[続紙]9_賃金支払対象期間_終了月_7行目',
            'payment_period_end_day2_7' => '[続紙]9_賃金支払対象期間_終了日_7行目',
            'payment_period_basic_days2_7' => '[続紙]10_基礎日数_7行目',
            'wage_amount_a2_7' => '[続紙]11_賃金額_A_7行目',
            'wage_amount_b2_7' => '[続紙]11_賃金額_B_7行目',
            'note2_7' => '[続紙]12_備考_7行目',
            'applicable_period_start_month2_8' => '[続紙]7_算定対象期間_開始月_8行目',
            'applicable_period_start_day2_8' => '[続紙]7_算定対象期間_開始日_8行目',
            'applicable_period_end_month2_8' => '[続紙]7_算定対象期間_終了月_8行目',
            'applicable_period_end_day2_8' => '[続紙]7_算定対象期間_終了日_8行目',
            'basic_days2_8' => '[続紙]8_賃金支払基礎日数_8行目',
            'payment_period_start_month2_8' => '[続紙]9_賃金支払対象期間_開始月_8行目',
            'payment_period_start_day2_8' => '[続紙]9_賃金支払対象期間_開始日_8行目',
            'payment_period_end_month2_8' => '[続紙]9_賃金支払対象期間_終了月_8行目',
            'payment_period_end_day2_8' => '[続紙]9_賃金支払対象期間_終了日_8行目',
            'payment_period_basic_days2_8' => '[続紙]10_基礎日数_8行目',
            'wage_amount_a2_8' => '[続紙]11_賃金額_A_8行目',
            'wage_amount_b2_8' => '[続紙]11_賃金額_B_8行目',
            'note2_8' => '[続紙]12_備考_8行目',
            'applicable_period_start_month2_9' => '[続紙]7_算定対象期間_開始月_9行目',
            'applicable_period_start_day2_9' => '[続紙]7_算定対象期間_開始日_9行目',
            'applicable_period_end_month2_9' => '[続紙]7_算定対象期間_終了月_9行目',
            'applicable_period_end_day2_9' => '[続紙]7_算定対象期間_終了日_9行目',
            'basic_days2_9' => '[続紙]8_賃金支払基礎日数_9行目',
            'payment_period_start_month2_9' => '[続紙]9_賃金支払対象期間_開始月_9行目',
            'payment_period_start_day2_9' => '[続紙]9_賃金支払対象期間_開始日_9行目',
            'payment_period_end_month2_9' => '[続紙]9_賃金支払対象期間_終了月_9行目',
            'payment_period_end_day2_9' => '[続紙]9_賃金支払対象期間_終了日_9行目',
            'payment_period_basic_days2_9' => '[続紙]10_基礎日数_9行目',
            'wage_amount_a2_9' => '[続紙]11_賃金額_A_9行目',
            'wage_amount_b2_9' => '[続紙]11_賃金額_B_9行目',
            'note2_9' => '[続紙]12_備考_9行目',
            'applicable_period_start_month2_10' => '[続紙]7_算定対象期間_開始月_10行目',
            'applicable_period_start_day2_10' => '[続紙]7_算定対象期間_開始日_10行目',
            'applicable_period_end_month2_10' => '[続紙]7_算定対象期間_終了月_10行目',
            'applicable_period_end_day2_10' => '[続紙]7_算定対象期間_終了日_10行目',
            'basic_days2_10' => '[続紙]8_賃金支払基礎日数_10行目',
            'payment_period_start_month2_10' => '[続紙]9_賃金支払対象期間_開始月_10行目',
            'payment_period_start_day2_10' => '[続紙]9_賃金支払対象期間_開始日_10行目',
            'payment_period_end_month2_10' => '[続紙]9_賃金支払対象期間_終了月_10行目',
            'payment_period_end_day2_10' => '[続紙]9_賃金支払対象期間_終了日_10行目',
            'payment_period_basic_days2_10' => '[続紙]10_基礎日数_10行目',
            'wage_amount_a2_10' => '[続紙]11_賃金額_A_10行目',
            'wage_amount_b2_10' => '[続紙]11_賃金額_B_10行目',
            'note2_10' => '[続紙]12_備考_10行目',
            'applicable_period_start_month2_11' => '[続紙]7_算定対象期間_開始月_11行目',
            'applicable_period_start_day2_11' => '[続紙]7_算定対象期間_開始日_11行目',
            'applicable_period_end_month2_11' => '[続紙]7_算定対象期間_終了月_11行目',
            'applicable_period_end_day2_11' => '[続紙]7_算定対象期間_終了日_11行目',
            'basic_days2_11' => '[続紙]8_賃金支払基礎日数_11行目',
            'payment_period_start_month2_11' => '[続紙]9_賃金支払対象期間_開始月_11行目',
            'payment_period_start_day2_11' => '[続紙]9_賃金支払対象期間_開始日_11行目',
            'payment_period_end_month2_11' => '[続紙]9_賃金支払対象期間_終了月_11行目',
            'payment_period_end_day2_11' => '[続紙]9_賃金支払対象期間_終了日_11行目',
            'payment_period_basic_days2_11' => '[続紙]10_基礎日数_11行目',
            'wage_amount_a2_11' => '[続紙]11_賃金額_A_11行目',
            'wage_amount_b2_11' => '[続紙]11_賃金額_B_11行目',
            'note2_11' => '[続紙]12_備考_11行目',
            'applicable_period_start_month2_12' => '[続紙]7_算定対象期間_開始月_12行目',
            'applicable_period_start_day2_12' => '[続紙]7_算定対象期間_開始日_12行目',
            'applicable_period_end_month2_12' => '[続紙]7_算定対象期間_終了月_12行目',
            'applicable_period_end_day2_12' => '[続紙]7_算定対象期間_終了日_12行目',
            'basic_days2_12' => '[続紙]8_賃金支払基礎日数_12行目',
            'payment_period_start_month2_12' => '[続紙]9_賃金支払対象期間_開始月_12行目',
            'payment_period_start_day2_12' => '[続紙]9_賃金支払対象期間_開始日_12行目',
            'payment_period_end_month2_12' => '[続紙]9_賃金支払対象期間_終了月_12行目',
            'payment_period_end_day2_12' => '[続紙]9_賃金支払対象期間_終了日_12行目',
            'payment_period_basic_days2_12' => '[続紙]10_基礎日数_12行目',
            'wage_amount_a2_12' => '[続紙]11_賃金額_A_12行目',
            'wage_amount_b2_12' => '[続紙]11_賃金額_B_12行目',
            'note2_12' => '[続紙]12_備考_12行目',
            'applicable_period_start_month2_13' => '[続紙]7_算定対象期間_開始月_13行目',
            'applicable_period_start_day2_13' => '[続紙]7_算定対象期間_開始日_13行目',
            'applicable_period_end_month2_13' => '[続紙]7_算定対象期間_終了月_13行目',
            'applicable_period_end_day2_13' => '[続紙]7_算定対象期間_終了日_13行目',
            'basic_days2_13' => '[続紙]8_賃金支払基礎日数_13行目',
            'payment_period_start_month2_13' => '[続紙]9_賃金支払対象期間_開始月_13行目',
            'payment_period_start_day2_13' => '[続紙]9_賃金支払対象期間_開始日_13行目',
            'payment_period_end_month2_13' => '[続紙]9_賃金支払対象期間_終了月_13行目',
            'payment_period_end_day2_13' => '[続紙]9_賃金支払対象期間_終了日_13行目',
            'payment_period_basic_days2_13' => '[続紙]10_基礎日数_13行目',
            'wage_amount_a2_13' => '[続紙]11_賃金額_A_13行目',
            'wage_amount_b2_13' => '[続紙]11_賃金額_B_13行目',
            'note2_13' => '[続紙]12_備考_13行目',
            'applicable_period_start_month2_14' => '[続紙]7_算定対象期間_開始月_14行目',
            'applicable_period_start_day2_14' => '[続紙]7_算定対象期間_開始日_14行目',
            'applicable_period_end_month2_14' => '[続紙]7_算定対象期間_終了月_14行目',
            'applicable_period_end_day2_14' => '[続紙]7_算定対象期間_終了日_14行目',
            'basic_days2_14' => '[続紙]8_賃金支払基礎日数_14行目',
            'payment_period_start_month2_14' => '[続紙]9_賃金支払対象期間_開始月_14行目',
            'payment_period_start_day2_14' => '[続紙]9_賃金支払対象期間_開始日_14行目',
            'payment_period_end_month2_14' => '[続紙]9_賃金支払対象期間_終了月_14行目',
            'payment_period_end_day2_14' => '[続紙]9_賃金支払対象期間_終了日_14行目',
            'payment_period_basic_days2_14' => '[続紙]10_基礎日数_14行目',
            'wage_amount_a2_14' => '[続紙]11_賃金額_A_14行目',
            'wage_amount_b2_14' => '[続紙]11_賃金額_B_14行目',
            'note2_14' => '[続紙]12_備考_14行目',
            'applicable_period_start_month2_15' => '[続紙]7_算定対象期間_開始月_15行目',
            'applicable_period_start_day2_15' => '[続紙]7_算定対象期間_開始日_15行目',
            'applicable_period_end_month2_15' => '[続紙]7_算定対象期間_終了月_15行目',
            'applicable_period_end_day2_15' => '[続紙]7_算定対象期間_終了日_15行目',
            'basic_days2_15' => '[続紙]8_賃金支払基礎日数_15行目',
            'payment_period_start_month2_15' => '[続紙]9_賃金支払対象期間_開始月_15行目',
            'payment_period_start_day2_15' => '[続紙]9_賃金支払対象期間_開始日_15行目',
            'payment_period_end_month2_15' => '[続紙]9_賃金支払対象期間_終了月_15行目',
            'payment_period_end_day2_15' => '[続紙]9_賃金支払対象期間_終了日_15行目',
            'payment_period_basic_days2_15' => '[続紙]10_基礎日数_15行目',
            'wage_amount_a2_15' => '[続紙]11_賃金額_A_15行目',
            'wage_amount_b2_15' => '[続紙]11_賃金額_B_15行目',
            'note2_15' => '[続紙]12_備考_15行目',
            'employee_salary_notices2' => '[続紙]13_賃金に関する特記事項',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
