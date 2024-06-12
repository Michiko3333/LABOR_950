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
            "over_70_check" => 'nullable|string|in:on',
            "my_number_or_basic_pension_number" => 'nullable|string|regex:/^[0-9]{1,12}+$/',
            "basic_pension_number" => 'nullable|string|regex:/^[0-9]{1,10}+$/',
            "file_wage_ledger" => 'required_if:radio_file_wage_ledger,2|file|mimes:csv,jpg,pdf|max:50000',
            "file_attendance_record" => 'required_if:radio_file_attendance_record,2|file|mimes:csv,jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "today_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "today_japan_era_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "today_japan_era_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_prefecture" => 'required|string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_cities" => 'required|string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_office" => 'required|string|regex:/^[ァ-ヴーA-Z0-9]{1,4}+\z/u',
            "csv_pension_office_no" => 'required|string|regex:/^[0-9]{5}+$/',
            "post_code_former" => 'required|string|regex:/^[0-9]{1,3}+$/',
            "post_code_latter" => 'required|string|regex:/^[0-9]{1,4}+$/',
            "business_location" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "business_name" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "business_owner_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "branch_tel_area_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_city_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_subscriber_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "labor_consultant_name" => 'nullable|string|max:255',
            "Insured_person_reference_number" => 'nullable|string|regex:/^[0-9]{1,6}+$/',
            "insured_person_name_in_kana" => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "Insured_person_name_in_kanji" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "era_name" => 'required|int|in:1,3,5,7,9',
            "year_of_birth" => 'required|int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "month_of_birth" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "date_of_birth" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "applicable_era_name" => 'required|int|in:7,9',
            "applicable_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "previous_standard_monthly_remuneration_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]{1,4}+$/',
            "previous_standard_monthly_remuneration_employees_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]{1,4}+$/',
            "previous_revision_year" => 'nullable|int|between:1989,9999|regex:/^[0-9]{1,4}+$/',
            "previous_revision_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "monthly_salary_increase" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_increase" => 'nullable|string|max:2',
            "retroactive_payment_amount_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "basic_number_of_days_for_payroll_calculatio1" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "basic_number_of_days_for_payroll_calculatio2" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "basic_number_of_days_for_payroll_calculatio3" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "monthly_remuneration_amount_in_currency1" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_amount_in_currency2" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_amount_in_currency3" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_amount_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_amount_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_amount_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_total1" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_total2" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_remuneration_total3" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "grand_total" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "average_amount" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "adjusted_average_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "remarks_and_calculation_of_employees_aged_70_and_over" => 'nullable|int|in:1',
            "remarks_and_two_or_more_jobs" => 'nullable|int|in:1',
            "remarks_and_scheduled_monthly_changes" => 'nullable|int|in:1',
            "remarks_and_Joined_midway" => 'nullable|int|in:1',
            "remarks_and_sick_leave_childcare_leave" => 'nullable|int|in:1',
            "remarks_and_part_time_worker" => 'nullable|int|in:1',
            "remarks_and_part" => 'nullable|int|in:1',
            "remarks_and_annual_average" => 'nullable|int|in:1',
            "remarks_and_others" => 'nullable|int|in:1',
            "remarks_calculation_basic_month_month1" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "remarks_calculation_basic_month_month2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "others" => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator)
    {
        $validator->sometimes(['my_number_or_basic_pension_number', 'basic_pension_number'], 'required_without_all:my_number_or_basic_pension_number,basic_pension_number', function ($input) {
            return $input->over_70_check === 'on';
        });

        $validator->sometimes(['remarks_calculation_basic_month_month1', 'remarks_calculation_basic_month_month2'], 'required_without_all:remarks_calculation_basic_month_month1,remarks_calculation_basic_month_month2', function ($input) {
            return $input->remarks_and_calculation_of_employees_aged_70_and_over === '1';
        
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $birthday_era = $data['era_name'] ?? "";
            $birthday_year = $data['year_of_birth'] ?? "";
            $birthday_month = $data['month_of_birth'] ?? "";
            $birthday_date = $data['date_of_birth'] ?? "";
            $revision_date_era = $data['applicable_era_name'] ?? "";
            $revision_date_year = $data['applicable_year'] ?? "";

            if ($birthday_era === '1') {
                if (
                    ($birthday_year == 1 && ($birthday_month < 9 || ($birthday_month == 9 && $birthday_date < 8))) ||
                    ($birthday_year == 45 && ($birthday_month > 7 || ($birthday_month == 7 && $birthday_date > 30))) ||
                    ($birthday_year > 45)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif($birthday_era === '2') {
                if (
                    ($birthday_year == 1 && ($birthday_month < 7 || ($birthday_month == 7 && $birthday_date < 30))) ||
                    ($birthday_year == 15 && ($birthday_month == 12 && $birthday_date > 25)) ||
                    ($birthday_year > 15)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '5') {
                if (
                    ($birthday_year == 1 && ($birthday_month < 12 || ($birthday_month == 12 && $birthday_date < 25))) ||
                    ($birthday_year == 64 && ($birthday_month > 1 || ($birthday_month == 1 && $birthday_date > 7))) ||
                    ($birthday_year > 64)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '7') {
                if (
                    ($birthday_year == 1 && ($birthday_month < 1 || ($birthday_month == 1 && $birthday_date < 8))) ||
                    ($birthday_year == 31 && ($birthday_month > 4 || ($birthday_month == 4 && $birthday_date > 30))) ||
                    ($birthday_year > 31)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '9') {
                if ($birthday_year == 1 && ($birthday_month < 5 || ($birthday_month == 5 && $birthday_date < 1))) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            }
            if(!empty($birthday_month) && !empty($birthday_date)){
                if (!checkdate($birthday_month, $birthday_date, '2000')) {
                    $validator->errors()->add('birthday_date','生年月日は正しい日付を入力してください。');
                }
            }

            if ($revision_date_era === '7') {
                if (
                    ($revision_date_year == 31) || ($revision_date_year > 31)
                ) {
                    $validator->errors()->add('revision_date_day', '適用年月は正しい日付を入力してください。');
                }
            }
        });
    }

    public function messages()
    {
        return [
            'my_number_or_basic_pension_number.required_without_all' => '',
            'basic_pension_number.required_without_all' => '個人番号または基礎年金番号のいずれかを入力してください。',
            'remarks_calculation_basic_month_month1.required_without_all' => '',
            'remarks_calculation_basic_month_month2.required_without_all' => '備考_70歳以上被用者算定_算定基礎月を入力してください。',
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "over_70_check" => '70歳以上チェック',
            "file_wage_ledger" => '（様式1）年間報酬の平均で算定することの申立書',
            "file_attendance_record" => '（様式2）保険者算定申立に係る例年の状況、標準報酬月額の比較及び被保険者の同意書等',
            'file_other' => '添付ファイル_その他の添付書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'today_japan_era_year' => '提出年月日_年',
            'today_japan_era_month' => '提出年月日_月',
            'today_japan_era_day' => '提出年月日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_郡市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'csv_pension_office_no' => '事業所番号',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'business_location' => '事業所所在地',
            'business_name' => '事業所名称',
            'business_owner_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_name' => '提出代行者名記載欄',
            'Insured_person_reference_number' => '被保険者整理番号',
            'insured_person_name_in_kana' => '被保険者氏名（フリガナ）',
            'Insured_person_name_in_kanji' => '被保険者氏名',
            'era_name' => '生年月日_年号',
            'year_of_birth' => '生年月日_年',
            'month_of_birth' => '生年月日_月',
            'date_of_birth' => '生年月日_日',
            'applicable_era_name' => '適用年月_年号',
            'applicable_year' => '適用年月_年',
            'previous_standard_monthly_remuneration_health_insurance' => '従前の標準報酬月額_健康保険',
            'previous_standard_monthly_remuneration_employees_pension' => '従前の標準報酬月額_厚生年金保険',
            'previous_revision_year' => '従前改定月_年',
            'previous_revision_month' => '従前改定月_月',
            'monthly_salary_increase' => '昇（降）給_月',
            'salary_increase' => '昇（降）給',
            'retroactive_payment_amount_month' => '遡及支払額_月',
            'retroactive_payment_amount' => '遡及支払額_円',
            'basic_number_of_days_for_payroll_calculatio1' => '給与計算の基礎日数_1',
            'basic_number_of_days_for_payroll_calculatio2' => '給与計算の基礎日数_2',
            'basic_number_of_days_for_payroll_calculatio3' => '給与計算の基礎日数_3',
            'monthly_remuneration_amount_in_currency1' => '報酬月額_通貨によるものの額_1',
            'monthly_remuneration_amount_in_currency2' => '報酬月額_通貨によるものの額_2',
            'monthly_remuneration_amount_in_currency3' => '報酬月額_通貨によるものの額_3',
            'monthly_remuneration_amount_in_kind1' => '報酬月額_現物によるものの額_1',
            'monthly_remuneration_amount_in_kind2' => '報酬月額_現物によるものの額_2',
            'monthly_remuneration_amount_in_kind3' => '報酬月額_現物によるものの額_3',
            'monthly_remuneration_total1' => '報酬月額_合計_1',
            'monthly_remuneration_total2' => '報酬月額_合計_2',
            'monthly_remuneration_total3' => '報酬月額_合計_3',
            'grand_total' => '総計',
            'average_amount' => '平均額',
            'adjusted_average_amount' => '修正平均額',
            'my_number_or_basic_pension_number' => '個人番号',
            'basic_pension_number' => '基礎年金番号',
            'remarks_and_calculation_of_employees_aged_70_and_over' => '備考_70歳以上被用者算定',
            'remarks_and_two_or_more_jobs=>' => '備考_二以上勤務',
            'remarks_and_scheduled_monthly_changes=>' => '備考_途中入社',
            'remarks_and_Joined_midway=>' => '備考_短時間労働者（特定適用事業所のみ）',
            'remarks_and_sick_leave_childcare_leave=>' => '備考_パート',
            'remarks_and_part_time_worker=>' => '備考_その他',
            'remarks_and_part=>' => '備考_月額変更予定',
            'remarks_and_annual_average=>' => '備考_病欠・育休・休職等',
            'remarks_and_others=>' => '備考_年間平均',
            'remarks_calculation_basic_month_month1' => '備考_70歳以上被用者算定_算定基礎月_1',
            'remarks_calculation_basic_month_month2' => '備考_70歳以上被用者算定_算定基礎月_2',
            'others' => '備考_その他_記入欄',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
