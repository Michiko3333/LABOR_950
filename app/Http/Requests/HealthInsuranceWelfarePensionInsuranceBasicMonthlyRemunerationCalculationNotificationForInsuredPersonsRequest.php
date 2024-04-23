<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsRequest extends FormRequest
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
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "today_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "today_japan_era_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "today_japan_era_day" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "business_establishment_code_prefecture_code" => 'required|string|max:2|regex:/^[0-9]+$/',
            "office_arrangement_code_county_city_ward_code" => 'required|string|max:2|regex:/^[0-9]+$/',
            "office_reference_symbol_office_symbol" => 'required|string|max:4|regex:/^[ァ-ヴーA-Z0-9]+\z/u',
            "post_code_former" => 'required|string|max:3|regex:/^[0-9]+$/',
            "post_code_latter" => 'required|string|max:4|regex:/^[0-9]+$/',
            "business_location" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "business_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "business_owner_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/',
            "branch_tel_area_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => 'nullable|string|max:255',
            "Insured_person_reference_number" => 'nullable|string|max:6|regex:/^[0-9]+$/',
            "insured_person_name_in_kana" => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "Insured_person_name_in_kanji" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "era_name" => 'required|int|in:1,3,5,7,9',
            "year_of_birth" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "month_of_birth" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "date_of_birth" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "applicable_era_name" => 'required|int|in:7,9',
            "applicable_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_employees_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]+$/',
            "previous_revision_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/',
            "previous_revision_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "monthly_salary_increase" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_increase" => 'nullable|string|max:2',
            "retroactive_payment_amount_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio1" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio2" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio3" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency1" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency2" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency3" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total1" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total2" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total3" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "grand_total" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "average_amount" => 'required|int|between:1,9999999|regex:/^[0-9]+$/',
            "adjusted_average_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]+$/',
            "my_number_or_basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/', 
            "remarks_and_calculation_of_employees_aged_70_and_over" => 'nullable|int|in:1',
            "remarks_and_two_or_more_jobs"=> 'nullable|int|in:1',
            "remarks_and_scheduled_monthly_changes"=> 'nullable|int|in:1',
            "remarks_and_Joined_midway"=> 'nullable|int|in:1',
            "remarks_and_sick_leave_childcare_leave"=> 'nullable|int|in:1',
            "remarks_and_part_time_worker"=> 'nullable|int|in:1',
            "remarks_and_part"=> 'nullable|int|in:1',
            "remarks_and_annual_average"=> 'nullable|int|in:1',
            "remarks_and_others"=> 'nullable|int|in:1',
            "remarks_calculation_basic_month_month1"=> 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "remarks_calculation_basic_month_month2"=> 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "others"=> 'nullable|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'today_japan_era_year' => '提出年月日/年',
            'today_japan_era_month' => '提出年月日/月',
            'today_japan_era_day' => '提出年月日/日',
            'business_establishment_code_prefecture_code' => '事業所整理記号/都道府県コード',
            'office_arrangement_code_county_city_ward_code' => '事業所整理記号/郡市区符号',
            'office_reference_symbol_office_symbol' => '事業所整理記号/事業所記号',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'business_location' => '事業所所在地',
            'business_name' => '事業所名称',
            'business_owner_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号（市外局番）',
            'branch_tel_city_code' => '事業所電話番号（市内局番）',
            'branch_tel_subscriber_code' => '事業所電話番号（加入者番号）',
            'labor_consultant_name' => '提出代行者名記載欄',
            'Insured_person_reference_number' => '被保険者整理番号',
            'insured_person_name_in_kana' => '被保険者氏名（フリガナ）',
            'Insured_person_name_in_kanji' => '被保険者氏名',
            'era_name' => '生年月日/年号',
            'year_of_birth' => '生年月日/年',
            'month_of_birth' => '生年月日/月',
            'date_of_birth' => '生年月日/日',
            'applicable_era_name' => '適用年月/年号',
            'applicable_year' => '適用年月/年',
            'previous_standard_monthly_remuneration_health_insurance' => '従前の標準報酬月額/健康保険',
            'previous_standard_monthly_remuneration_employees_pension' => '従前の標準報酬月額/厚生年金保険',
            'previous_revision_year' => '従前改定月/年',
            'previous_revision_month' => '従前改定月/月',
            'monthly_salary_increase' => '昇（降）給/月',
            'salary_increase' => '昇（降）給',
            'retroactive_payment_amount_month' => '遡及支払額/月',
            'retroactive_payment_amount' => '遡及支払額/円',
            'basic_number_of_days_for_payroll_calculatio1' => '給与計算の基礎日数_1',
            'basic_number_of_days_for_payroll_calculatio2' => '給与計算の基礎日数_2',
            'basic_number_of_days_for_payroll_calculatio3' => '給与計算の基礎日数_3',
            'monthly_remuneration_amount_in_currency1' => '報酬月額/通貨によるものの額_1',
            'monthly_remuneration_amount_in_currency2' => '報酬月額/通貨によるものの額_2',
            'monthly_remuneration_amount_in_currency3' => '報酬月額/通貨によるものの額_3',
            'monthly_remuneration_amount_in_kind1' => '報酬月額/現物によるものの額_1',
            'monthly_remuneration_amount_in_kind2' => '報酬月額/現物によるものの額_2',
            'monthly_remuneration_amount_in_kind3' => '報酬月額/現物によるものの額_3',
            'monthly_remuneration_total1' => '報酬月額/合計_1',
            'monthly_remuneration_total2' => '報酬月額/合計_2',
            'monthly_remuneration_total3' => '報酬月額/合計_3',
            'grand_total' => '総計',
            'average_amount' => '平均額',
            'adjusted_average_amount' => '修正平均額',
            'my_number_or_basic_pension_number' => '個人番号（または基礎年金番号）',
            'remarks_and_calculation_of_employees_aged_70_and_over' => '備考/70歳以上被用者算定',
            'remarks_and_two_or_more_jobs=>' => '備考/二以上勤務',
            'remarks_and_scheduled_monthly_changes=>' => '備考/途中入社',
            'remarks_and_Joined_midway=>' => '備考/短時間労働者（特定適用事業所のみ）',
            'remarks_and_sick_leave_childcare_leave=>' => '備考/パート',
            'remarks_and_part_time_worker=>' => '備考/その他',
            'remarks_and_part=>' => '備考/月額変更予定',
            'remarks_and_annual_average=>' => '備考/病欠・育休・休職等',
            'remarks_and_others=>' => '備考/年間平均',
            'remarks_calculation_basic_month_month1=>' => '備考/70歳以上被用者算定/算定基礎月_1',
            'remarks_calculation_basic_month_month2=>' => '備考/70歳以上被用者算定/算定基礎月_2',
            'others=>' => '備考/その他_記入欄',
        ];
    }
}
