<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthAndPensionInsuredBonusPaymentNotificationRequest extends FormRequest
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
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "title_health_insurance" => 'nullable|int|in:1|required_without:title_pension_insurance',
            "title_pension_insurance" => 'nullable|int|in:1',
            "today_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "today_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "today_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_prefecture" => 'string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_cities" => 'string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_office" => 'string|regex:/\A[ァ-ヴー0-9A-Z]{1,4}+\z/u',
            "branch_post_code_parent" => 'string|regex:/^[0-9]{3}+$/',
            "branch_post_code_child" => 'string|regex:/^[0-9]{4}+$/',
            "branch_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            "branch_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "employer_company_managerial_position_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "labor_consultant_submission_agent_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "employment_insured_no" => 'nullable|int|regex:/^[0-9]{1,6}+$/',
            "insured_fullname_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "insured_fullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "employee_birthday_era" => 'int|in:1,3,5,7,9',
            "employee_birthday_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "employee_birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "employee_birthday_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_era" => 'int|in:7,9',
            "bonus_payment_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_currency" => 'int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "bonus_payment_goods" => 'int|between:1,9999999|regex:/^[0-9]{1,7}+$/',
            "bonus_payment_sum" => 'int|between:1,9999|regex:/^[0-9]{1,4}+$/',
            "mynumber_no_or_pension_no" => 'nullable|string|regex:/^[0-9]{1,12}+$/',
            "remarks_over_70_insured" => 'nullable|int|in:1',
            "remarks_more_than_twice_work" => 'nullable|int|in:1',
            "remarks_bonus_sum_in_months" => 'nullable|int|in:1',
            "remarks_first_payment_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'title_health_insurance.required_without' => 'タイトルのチェックボックスで健康保険、厚生年金保険のいずれかである必要があります。',
        ];
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'title_health_insurance' => '健康保険_最上部チェックボックス',
            'title_pension_insurance' => '厚生年金保険_最上部チェックボックス',
            'today_year' => '提出日_年',
            'today_month' => '提出日_月',
            'today_date' => '提出日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_群市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'branch_post_code_parent' => '事業所郵便番号3桁',
            'branch_post_code_child' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'employer_company_managerial_position_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_submission_agent_name' => '提出代行者名記載欄',
            'employment_insured_no' => '被保険者整理番号',
            'insured_fullname_kana' => '被保険者氏名（フリガナ）',
            'insured_fullname' => '被保険者氏名',
            'employee_birthday_era' => '生年月日_年号',
            'employee_birthday_year' => '生年月日_年',
            'employee_birthday_month' => '生年月日_月',
            'employee_birthday_date' => '生年月日_日',
            'bonus_payment_date_era' => '賞与支払年月日_年号',
            'bonus_payment_date_year' => '賞与支払年月日_年',
            'bonus_payment_date_month' => '賞与支払年月日_月',
            'bonus_payment_date_date' => '賞与支払年月日_日',
            'bonus_payment_currency' => '賞与支払額_通貨',
            'bonus_payment_goods' => '賞与支払額_現物',
            'bonus_payment_sum' => '賞与支払額_合計',
            'mynumber_no_or_pension_no' => '個人番号（または基礎年金番号）',
            'remarks_over_70_insured' => '備考_70歳以上被用者',
            'remarks_more_than_twice_work' => '備考_二以上勤務',
            'remarks_bonus_sum_in_months' => '備考_同一月内の賞与合計',
            'remarks_first_payment_date' => '備考_同一月内の賞与合計_初回支払日',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
