<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PickUpRequest extends BaseRequest
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
            "nursing_care_insurance_premium_deduction_begins" => 'nullable|int|between:1,365',
            "application_for_attainment_wage_certificate" => 'nullable|int|between:1,365',
            "end_of_nursing_care_insurance_premium_deduction" => 'nullable|int|between:1,365',
            "loss_of_eligibility_for_employees_pension_insurance" => 'nullable|int|between:1,365',
            "loss_of_health_insurance_status" => 'nullable|int|between:1,365',
            "labor_insurance_annual_renewal_start_month" => 'nullable|int|between:1,12|required_with:labor_insurance_annual_renewal_start_day,labor_insurance_annual_renewal_end_month,labor_insurance_annual_renewal_end_day',
            "labor_insurance_annual_renewal_start_day" => 'nullable|int|between:1,31|required_with:labor_insurance_annual_renewal_start_month,labor_insurance_annual_renewal_end_month,labor_insurance_annual_renewal_end_day',
            "labor_insurance_annual_renewal_end_month" => 'nullable|int|between:1,12|required_with:labor_insurance_annual_renewal_start_month,labor_insurance_annual_renewal_start_day,labor_insurance_annual_renewal_end_day',
            "labor_insurance_annual_renewal_end_day" => 'nullable|int|between:1,31|required_with:labor_insurance_annual_renewal_start_month,labor_insurance_annual_renewal_start_day,labor_insurance_annual_renewal_end_month',
            "year_end_tax_adjustment_start_month" => 'nullable|int|between:1,12',
            "year_end_tax_adjustment_start_day" => 'nullable|int|between:1,31',
            "year_end_tax_adjustment_end_month" => 'nullable|int|between:1,12',
            "year_end_tax_adjustment_end_day" => 'nullable|int|between:1,31',
            "retirement_age" => 'nullable|int|between:1,365',
            "retirement" => 'nullable|int|between:1,365',
            "officers" => 'nullable|array',
            "officers.*" => 'nullable|int',
            "settlement_date" => 'nullable|int|between:1,365',
            "leave_of_absence" => 'nullable|int|between:1,365',
            "closed" => 'nullable|int|between:1,365',
            "change_in_dependent_status" => 'nullable|int|between:1,365',
            "subsidies_and_grants" => 'nullable|int|between:1,365',
            "report_on_the_status_of_elderly_and_disabled_people_month" => 'nullable|int|between:1,12|required_with:report_on_the_status_of_elderly_and_disabled_people_day',
            "report_on_the_status_of_elderly_and_disabled_people_day" => 'nullable|int|between:1,31|required_with:report_on_the_status_of_elderly_and_disabled_people_month',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $labor_insurance_annual_renewal_start_month = $data['labor_insurance_annual_renewal_start_month'] ?? "";
            $labor_insurance_annual_renewal_start_day = $data['labor_insurance_annual_renewal_start_day'] ?? "";
            $labor_insurance_annual_renewal_end_month = $data['labor_insurance_annual_renewal_end_month'] ?? "";
            $labor_insurance_annual_renewal_end_day = $data['labor_insurance_annual_renewal_end_day'] ?? "";
            $report_on_the_status_of_elderly_and_disabled_people_month = $data['report_on_the_status_of_elderly_and_disabled_people_month'] ?? "";
            $report_on_the_status_of_elderly_and_disabled_people_day = $data['report_on_the_status_of_elderly_and_disabled_people_day'] ?? "";

            if (!empty($labor_insurance_annual_renewal_start_month) && !empty($labor_insurance_annual_renewal_start_day)) {
                if (ctype_digit($labor_insurance_annual_renewal_start_month)) {
                    if (!checkdate($labor_insurance_annual_renewal_start_month, $labor_insurance_annual_renewal_start_day, '2024')) {
                        $validator->errors()->add('labor_insurance_annual_renewal_start_day', '労働保険年度更新（開始）は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($labor_insurance_annual_renewal_end_month) && !empty($labor_insurance_annual_renewal_end_day)) {
                if (ctype_digit($labor_insurance_annual_renewal_end_month)) {
                    if (!checkdate($labor_insurance_annual_renewal_end_month, $labor_insurance_annual_renewal_end_day, '2024')) {
                        $validator->errors()->add('labor_insurance_annual_renewal_end_day', '労働保険年度更新（終了）は正しい日付を入力してください。');
                    }
                }
            }

            if (!empty($report_on_the_status_of_elderly_and_disabled_people_month) && !empty($report_on_the_status_of_elderly_and_disabled_people_day)) {
                if (ctype_digit($report_on_the_status_of_elderly_and_disabled_people_month)) {
                    if (!checkdate($report_on_the_status_of_elderly_and_disabled_people_month, $report_on_the_status_of_elderly_and_disabled_people_day, '2024')) {
                        $validator->errors()->add('report_on_the_status_of_elderly_and_disabled_people_day', '高齢者雇用状況報告書・障碍者状況等報告書は正しい日付を入力してください。');
                    }
                }
            }
        });
    }

    public function messages()
    {
        return [
            "labor_insurance_annual_renewal_start_month.required_with" => '労働保険年度更新（開始月）を入力してください。',
            "labor_insurance_annual_renewal_start_day.required_with" => '労働保険年度更新（開始日）を入力してください。',
            "labor_insurance_annual_renewal_end_month.required_with" => '労働保険年度更新（終了月）を入力してください。',
            "labor_insurance_annual_renewal_end_day.required_with" => '労働保険年度更新（終了日）を入力してください。',
            "report_on_the_status_of_elderly_and_disabled_people_month.required_with" => '高齢者雇用状況報告書・障碍者状況等報告書（月）を入力してください。',
            "report_on_the_status_of_elderly_and_disabled_people_day.required_with" => '高齢者雇用状況報告書・障碍者状況等報告書（日）を入力してください。',
        ];
    }

    public function attributes()
    {
        $Attributes = [
            "nursing_care_insurance_premium_deduction_begins" => '40歳 介護保険料の控除開始',
            "application_for_attainment_wage_certificate" => '60歳 到達時賃金証明書の申請',
            "end_of_nursing_care_insurance_premium_deduction" => '65歳 介護保険料の控除終了',
            "loss_of_eligibility_for_employees_pension_insurance" => '70歳 厚生年金保険被保険者の資格喪失',
            "loss_of_health_insurance_status" => '75歳 健康保険被保険者の資格喪失',
            "labor_insurance_annual_renewal_start_month" => '労働保険年度更新（開始月）',
            "labor_insurance_annual_renewal_start_day" => '労働保険年度更新（開始日）',
            "labor_insurance_annual_renewal_end_month" => '労働保険年度更新（終了月）',
            "labor_insurance_annual_renewal_end_day" => '労働保険年度更新（終了日）',
            "year_end_tax_adjustment_start_month" => '年末調整（開始月）',
            "year_end_tax_adjustment_start_day" => '年末調整（開始日）',
            "year_end_tax_adjustment_end_month" => '年末調整（終了月）',
            "year_end_tax_adjustment_end_day" => '年末調整（終了日）',
            "retirement_age" => '定年退職年齢',
            "retirement" => '定年退職',
            "officers" => '役員の誕生日',
            "settlement_date" => '決算日',
            "leave_of_absence" => '休職',
            "closed" => '休業',
            "change_in_dependent_status" => '扶養変更',
            "subsidies_and_grants" => '助成金・補助金等',
            "report_on_the_status_of_elderly_and_disabled_people_month" => '高齢者雇用状況報告書・障碍者状況等報告書（月）',
            "report_on_the_status_of_elderly_and_disabled_people_day" => '高齢者雇用状況報告書・障碍者状況等報告書（日）',
        ];

        foreach ($this->input('officers', []) as $index => $value) {
            $Attributes["officers.{$index}"] = ($index + 1) . "役員の誕生日";
        }

        return $Attributes;
    }
}
