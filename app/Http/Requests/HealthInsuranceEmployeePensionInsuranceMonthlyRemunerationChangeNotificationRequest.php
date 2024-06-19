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
            "over_70_check" => 'nullable|string|in:on',
            "mynumber_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]{1,12}+$/',
            "basic_pension_number" => 'nullable|string|max:10|regex:/^[0-9]{1,12}+$/',
            "file_wage_ledger" => 'required_if:radio_file_wage_ledger,2|file|mimes:csv,jpg,pdf|max:50000',
            "file_attendance_record" => 'required_if:radio_file_attendance_record,2|file|mimes:csv,jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "today_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "today_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "today_date" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_prefecture" => 'required|string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_cities" => 'required|string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_office" => 'required|string|regex:/\A[ァ-ヴー0-9A-Z]{1,4}+\z/u',
            "csv_pension_office_no" => 'required|string|regex:/^[0-9]{5}+$/',
            "branch_post_code_parent" => 'required|string|regex:/^[0-9]{3}+$/',
            "branch_post_code_child" => 'required|string|regex:/^[0-9]{4}+$/',
            "branch_address" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "branch_name" => 'required|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "employer_company_managerial_position_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "branch_tel_area_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_city_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_subscriber_code" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "labor_consultant_submission_agent_name" => 'nullable|string|max:255',
            "insurer_reference_no" => 'nullable|string|regex:/^[0-9]{1,6}+$/',
            "insured_fullname_kana" => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "insured_fullname" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "birthday_era" => 'required|int|in:1,3,5,7,9',
            "birthday_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "birthday_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "birthday_date" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "revision_date_era" => 'required|int|in:7,9',
            "revision_date_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "revision_date_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "previous_average_monthly_salary_health_insurance" => 'nullable|int|between:1,9999|regex:/^[0-9]{1,4}+$/',
            "previous_average_monthly_salary_pension" => 'nullable|int|between:1,9999|regex:/^[0-9]{1,4}+$/',
            "before_revision_date_year" => 'nullable|int|between:1989,9999|regex:/^[0-9]{1,4}+$/',
            "before_revision_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_raise_and_reduction_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_raise_and_reduction" => 'nullable|string|in:昇給,降給',
            "retroactive_payment_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "retroactive_payment_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "salary_payment_month1" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_payment_month2" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_payment_month3" => 'required|int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "salary_calculation_basic_days1" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "salary_calculation_basic_days2" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "salary_calculation_basic_days3" => 'required|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "monthly_salary_currency1" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_currency2" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_currency3" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_in_kind1" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_in_kind2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_in_kind3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_sum1" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_sum2" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "monthly_salary_sum3" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "sum" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "average_amount" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "adjusted_average_amount" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
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
            $data = $validator->getData();
            $birthday_era = $data['birthday_era'] ?? "";
            $birthday_year = $data['birthday_year'] ?? "";
            $birthday_month = $data['birthday_month'] ?? "";
            $birthday_date = $data['birthday_date'] ?? "";
            $revision_date_era = $data['revision_date_era'] ?? "";
            $revision_date_year = $data['revision_date_year'] ?? "";
            $revision_date_month = $data['revision_date_month'] ?? "";

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
                if(ctype_digit($birthday_month)){
                    if (!checkdate($birthday_month, $birthday_date, '2000')) {
                    $validator->errors()->add('birthday_date','生年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($revision_date_era === '7') {
                if (
                    ($revision_date_year == 31 && $revision_date_month > 4) ||
                    ($revision_date_year > 31)
                ) {
                    $validator->errors()->add('revision_date_day', '改定年月は正しい日付を入力してください。');
                }
            } elseif ($revision_date_era === '9') {
                if ($revision_date_year == 1 && ($revision_date_month < 5)) {
                    $validator->errors()->add('revision_date_day', '改定年月は正しい日付を入力してください。');
                }
            }

            if ($this->hasFile('file_wage_ledger')) {
                $totalSize += $this->file('file_wage_ledger')->getSize();
            }
            if ($this->hasFile('file_attendance_record')) {
                $totalSize += $this->file('file_attendance_record')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });

        $validator->sometimes(['mynumber_no_or_pension_no', 'basic_pension_number'], 'required_without_all:mynumber_no_or_pension_no,basic_pension_number', function ($input) {
            return $input->over_70_check === 'on';
        });
    }

    public function messages()
    {
        return [
            'mynumber_no_or_pension_no.required_without_all' => '',
            'basic_pension_number.required_without_all' => '個人番号または基礎年金番号のいずれかを入力してください。',
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }

    public function attributes()

    {
        return [
            "over_70_check" => '70歳以上チェック',
            "file_wage_ledger" => '（様式1）年間報酬の平均で算定することの申立書（随時改定用）',
            "file_attendance_record" => '（様式2）健康保険厚生年金保険被保険者報酬月額変更届・保険者算定申立に係る例年の状況、標準報酬月額の比較及び被保険者の同意書（随時改定用）',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'today_year' => '提出年月日_年',
            'today_month' => '提出年月日_月',
            'today_date' => '提出年月日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_郡市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'csv_pension_office_no' => '事業所番号',
            'branch_post_code_parent' => '事業所郵便番号3桁',
            'branch_post_code_child' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'employer_company_managerial_position_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_submission_agent_name' => '提出代行者名記載欄',
            'insurer_reference_no' => '被保険者整理番号',
            'insured_fullname_kana' => '被保険者氏名（フリガナ）',
            'insured_fullname' => '被保険者氏名',
            'birthday_era' => '生年月日_年号',
            'birthday_year' => '生年月日_年',
            'birthday_month' => '生年月日_月',
            'birthday_date' => '生年月日_日',
            'revision_date_era' => '改定年月_年号',
            'revision_date_year' => '改定年月_年',
            'revision_date_month' => '改定年月_月',
            'previous_average_monthly_salary_health_insurance' => '従前の標準報酬月額_健康保険',
            'previous_average_monthly_salary_pension' => '従前の標準報酬月額_厚生年金保険',
            'before_revision_date_year' => '従前改定月_年',
            'before_revision_date_month' => '従前改定月_月',
            'salary_raise_and_reduction_month' => '昇（降）給_月',
            'salary_raise_and_reduction' => '昇（降）給',
            'retroactive_payment_month' => '遡及支払額_月',
            'retroactive_payment_amount' => '遡及支払額_円',
            'salary_payment_month1' => '給与支給月_1',
            'salary_payment_month2' => '給与支給月_2',
            'salary_payment_month3' => '給与支給月_3',
            'salary_calculation_basic_days1' => '給与計算の基礎日数_1',
            'salary_calculation_basic_days2' => '給与計算の基礎日数_2',
            'salary_calculation_basic_days3' => '給与計算の基礎日数_3',
            'monthly_salary_currency1' => '報酬月額_通貨によるものの額_1',
            'monthly_salary_currency2' => '報酬月額_通貨によるものの額_2',
            'monthly_salary_currency3' => '報酬月額_通貨によるものの額_3',
            'monthly_salary_in_kind1' => '報酬月額_現物によるものの額_1',
            'monthly_salary_in_kind2' => '報酬月額_現物によるものの額_2',
            'monthly_salary_in_kind3' => '報酬月額_現物によるものの額_3',
            'monthly_salary_sum1' => '報酬月額_合計_1',
            'monthly_salary_sum2' => '報酬月額_合計_2',
            'monthly_salary_sum3' => '報酬月額_合計_3',
            'sum' => '総計',
            'average_amount' => '平均額',
            'adjusted_average_amount' => '修正平均額',
            'mynumber_no_or_pension_no' => '個人番号',
            'basic_pension_number' => '基礎年金番号',
            'remarks_over_70_monthly_salary_change' => '備考_70歳以上被用者月額変更',
            'remarks_multi_work' => '備考_二以上勤務',
            'remarks_part_time_workers' => '備考_短時間労働者（特定適用事業所のみ）',
            'remarks_salary_raise_and_reduction_reasons' => '備考_昇給・降給の理由',
            'remarks_only_health_insurance_salary_change' => '備考_健康保険のみ月額変更（70歳到達時の契約変更等）',
            'remarks_and_others' => '備考_その他',
            'remarks_salary_raise_and_reduction_reasons_text' => '備考_昇給・降給の理由_記入欄',
            'remarks_others' => '備考_その他_記入欄',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
