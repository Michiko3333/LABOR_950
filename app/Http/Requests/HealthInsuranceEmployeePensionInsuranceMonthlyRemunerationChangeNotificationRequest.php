<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationRequest extends FormRequest
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
            "file_wage_ledger" => 'required_if:radio_file_form1,2|file|mimes:jpg,pdf|max:50000',
            "file_attendance_record" => 'required_if:radio_file_form2,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            "today_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "today_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "today_date" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "pension_office_reference_prefecture" => 'required|string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_cities" => 'required|string|max:2|regex:/^[0-9]+$/',
            "pension_office_reference_no_office" => 'required|string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_post_code_parent" => 'required|string|max:3|regex:/^[0-9]+$/',
            "branch_post_code_child" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_address" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "branch_name" => 'required|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "employer_company_managerial_position_name" => 'required|string|max:255',
            "branch_tel_area_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:6|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:1|regex:/^[0-9]+$/',
            "labor_consultant_submission_agent_name" => 'nullable|string|max:255',
            "insurer_reference_no" => 'nullable|string|max:6',
            "insured_fullname_kana" => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "insured_fullname" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "birthday_era" => 'required|int|in:1,3,5,7,9',
            "birthday_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "birthday_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "birthday_date" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "revision_date_era" => 'required|int|in:7,9',
            "revision_date_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "revision_date_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "previous_average_monthly_salary_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_average_monthly_salary_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "before_revision_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/',
            "before_revision_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_raise_and_reduction_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_raise_and_reduction" => 'nullable|string|in:昇給,降給',
            "retroactive_payment_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "salary_payment_month1" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month2" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month3" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "salary_calculation_basic_days1" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "salary_calculation_basic_days2" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "salary_calculation_basic_days3" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "monthly_salary_currency1" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_currency2" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_currency3" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum1" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum2" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_salary_sum3" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "sum" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "average_amount" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "adjusted_average_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "mynumber_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]+$/',
            "remarks_over_70_monthly_salary_change" => 'nullable|int|in:1',
            "remarks_multi_work" => 'nullable|int|in:1',
            "remarks_part_time_workers" => 'nullable|int|in:1',
            "remarks_salary_raise_and_reduction_reasons" => 'nullable|int|in:1',
            "remarks_only_health_insurance_salary_change" => 'nullable|int|in:1',
            "remarks_and_others" => 'nullable|int|in:1',
            "remarks_salary_raise_and_reduction_reasons_text" => 'nullable|string|max:255',
            "remarks_others" => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_wage_ledger')) {
                $totalSize += $this->file('file_form1')->getSize();
            }
            if ($this->hasFile('file_attendance_record')) {
                $totalSize += $this->file('file_form2')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }

    public function attributes()

    {
        return [
            'today_year' => '提出年月日/年',
            'today_month' => '提出年月日/月',
            'today_date' => '提出年月日/日',
            'pension_office_reference_prefecture' => '事業所整理記号/都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号/郡市区符号',
            'pension_office_reference_no_office' => '事業所整理記号/事業所記号',
            'branch_post_code_parent' => '事業所郵便番号3桁',
            'branch_post_code_child' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'employer_company_managerial_position_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号（市外局番）',
            'branch_tel_city_code' => '事業所電話番号（市内局番）',
            'branch_tel_subscriber_code' => '事業所電話番号（加入者番号）',
            'labor_consultant_submission_agent_name' => '提出代行者名記載欄',
            'insurer_reference_no' => '被保険者整理番号',
            'insured_fullname_kana' => '被保険者氏名（フリガナ）',
            'insured_fullname' => '被保険者氏名',
            'birthday_era' => '生年月日/年号',
            'birthday_year' => '生年月日/年',
            'birthday_month' => '生年月日/月',
            'birthday_date' => '生年月日/日',
            'revision_date_era' => '改定年月/年号',
            'revision_date_year' => '改定年月/年',
            'revision_date_month' => '改定年月/月',
            'previous_average_monthly_salary_health_insurance' => '従前の標準報酬月額/健康保険',
            'previous_average_monthly_salary_pension' => '従前の標準報酬月額/厚生年金保険',
            'before_revision_date_year' => '従前改定月/年',
            'before_revision_date_month' => '従前改定月/月',
            'salary_raise_and_reduction_month' => '昇（降）給/月',
            'salary_raise_and_reduction' => '昇（降）給',
            'retroactive_payment_month' => '遡及支払額/月',
            'retroactive_payment_amount' => '遡及支払額/円',
            'salary_payment_month1' => '給与支給月_1',
            'salary_payment_month2' => '給与支給月_2',
            'salary_payment_month3' => '給与支給月_3',
            'salary_calculation_basic_days1' => '給与計算の基礎日数_1',
            'salary_calculation_basic_days2' => '給与計算の基礎日数_2',
            'salary_calculation_basic_days3' => '給与計算の基礎日数_3',
            'monthly_salary_currency1' => '報酬月額/通貨によるものの額_1',
            'monthly_salary_currency2' => '報酬月額/通貨によるものの額_2',
            'monthly_salary_currency3' => '報酬月額/通貨によるものの額_3',
            'monthly_salary_in_kind1' => '報酬月額/現物によるものの額_1',
            'monthly_salary_in_kind2' => '報酬月額/現物によるものの額_2',
            'monthly_salary_in_kind3' => '報酬月額/現物によるものの額_3',
            'monthly_salary_sum1' => '報酬月額/合計_1',
            'monthly_salary_sum2' => '報酬月額/合計_2',
            'monthly_salary_sum3' => '報酬月額/合計_3',
            'sum' => '総計',
            'average_amount' => '平均額',
            'adjusted_average_amount' => '修正平均額',
            'mynumber_no_or_pension_no' => '個人番号（または基礎年金番号）',
            'remarks_over_70_monthly_salary_change' => '備考/70歳以上被用者月額変更',
            'remarks_multi_work' => '備考/二以上勤務',
            'remarks_part_time_workers' => '備考/短時間労働者（特定適用事業所のみ）',
            'remarks_salary_raise_and_reduction_reasons' => '備考/昇給・降給の理由',
            'remarks_only_health_insurance_salary_change' => '備考/健康保険のみ月額変更（70歳到達時の契約変更等）',
            'remarks_and_others' => '備考/その他',
            'remarks_salary_raise_and_reduction_reasons_text' => '備考/昇給・降給の理由/記入欄',
            'remarks_others' => '備考/その他/記入欄',
        ];
    }
}
