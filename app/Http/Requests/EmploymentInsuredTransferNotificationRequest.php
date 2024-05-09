<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredTransferNotificationRequest extends FormRequest
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
            'employment_insured_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'birthday_era' => 'in:大正,昭和,平成,令和',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'name_kanji' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]+[　][ぁ-んァ-ヴー一-龥々]+$/u',
            'name_kana' => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_alphabet' => 'nullable|string|max:255|regex:/^[A-Z]+[ ][A-Z]+$/u',
            'employment_insured_date_era' => 'string|in:昭和,平成,令和',
            'employment_insured_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'employment_insured_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'employment_insured_date_date' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'previous_employment_insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'previous_employment_insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'previous_employment_insurance_office_no_cd' => 'string|regex:/^[0-9]{1}$/u',
            'transfer_date_era' => 'string|in:平成,令和',
            'transfer_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'transfer_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'transfer_date_date' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'office_before_transfer' => 'string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'name_before_changed_kanji' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]+[　][ぁ-んァ-ヴー一-龥々]+$/u',
            'name_before_changed_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_changed_date_era' => 'nullable|in:平成,令和',
            'name_changed_date_year' => 'nullable|int|between:1,99',
            'name_changed_date_month' => 'nullable|int|between:1,12',
            'name_changed_date_date' => 'nullable|int|between:1,31',
            'remarks' => 'nullable|string|max:255',
            'headquarter_address' => 'string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９Ａ-Ｚ　]+\z/u',
            'headquarter_name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々]+[　][ぁ-んァ-ヴー一-龥々]+$/u',
            'headquarter_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarter_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarter_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'today_era' => 'string|in:平成,令和',
            'today_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_date' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_today_era' => 'nullable|string|in:平成,令和',
            'labor_consultant_today_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_today_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_today_date' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_note' => 'nullable|string|max:255',
            'hello_work' => 'string|max:255|regex:/\A[ぁ-んァ-ンー一-龥々　]+\z/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',  
        ];
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'employment_insured_no_4' => '被保険者番号4桁',
            'employment_insured_no_6' => '被保険者番号6桁',
            'employment_insured_no_cd' => '被保険者番号1桁',
            'birthday_era' => '生年月日_年号',
            'birthday_year' => '生年月日_年',
            'birthday_month' => '生年月日_月',
            'birthday_day' => '生年月日_日',
            'name_kanji' => '被保険者氏名',
            'name_kana' => '被保険者氏名（フリガナ）',
            'name_alphabet' => '被保険者氏名（ローマ字）',
            'employment_insured_date_era' => '資格取得年月日_年号',
            'employment_insured_date_year' => '資格取得年月日_年',
            'employment_insured_date_month' => '資格取得年月日_月',
            'employment_insured_date_date' => '資格取得年月日_日',
            'employment_insurance_office_no_4' => '事業所番号4桁',
            'employment_insurance_office_no_6' => '事業所番号6桁',
            'employment_insurance_office_no_cd' => '事業所番号1桁',
            'previous_employment_insurance_office_no_4' => '転勤前の事業所番号4桁',
            'previous_employment_insurance_office_no_6' => '転勤前の事業所番号6桁',
            'previous_employment_insurance_office_no_cd' => '転勤前の事業所番号1桁',
            'transfer_date_era' => '転勤年月日_年号',
            'transfer_date_year' => '転勤年月日_年',
            'transfer_date_month' => '転勤年月日_月',
            'transfer_date_date' => '転勤年月日_日',
            'office_before_transfer' => '転勤前事業所名称・所在地',
            'name_before_changed_kanji' => '変更前氏名',
            'name_before_changed_kana' => '変更前氏名（フリガナ）',
            'name_changed_date_era' => '氏名変更年月_年号',
            'name_changed_date_year' => '氏名変更年月_年',
            'name_changed_date_month' => '氏名変更年月_月',
            'name_changed_date_date' => '氏名変更年月_日',
            'remarks' => '備考',
            'headquarter_address' => '事業主住所',
            'headquarter_name' => '事業主氏名',
            'headquarter_tel_area_code' => '事業主電話番号（市外局番）',
            'headquarter_tel_city_code' => '事業主電話番号（市内局番）',
            'headquarter_tel_subscriber_code' => '事業主電話番号（加入者番号）',
            'today_era' => '届出年月日_年号',
            'today_year' => '届出年月日_年',
            'today_month' => '届出年月日_月',
            'today_date' => '届出年月日_日',
            'labor_consultant_today_era' => '社会保険労務士記載欄_作成年月日_年号',
            'labor_consultant_today_year' => '社会保険労務士記載欄_作成年月日_年',
            'labor_consultant_today_month' => '社会保険労務士記載欄_作成年月日_月',
            'labor_consultant_today_date' => '社会保険労務士記載欄_作成年月日_日',
            'agent' => '社会保険労務士記載欄_提出代行者･事務代理者の表示',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名',
            'labor_consultant_tel_area_code' => '社会保険労務士記載欄_電話番号（市外局番）',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄_電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄_電話番号（加入者番号）',
            'labor_consultant_note' => '付記欄',
            'hello_work' => '公共職業安定所あて先',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
