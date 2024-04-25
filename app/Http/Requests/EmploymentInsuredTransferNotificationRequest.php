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
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            'employment_insured_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'birthday_era' => 'required|in:大正,昭和,平成,令和',
            'birthday_year' => 'required|numeric|between:1,99',
            'birthday_month' => 'required|numeric|between:1,12',
            'birthday_day' => 'required|numeric|between:1,31',
            'name_kanji' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'name_kana' => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_alphabet' => 'nullable|string|max:255|regex:/^[a-zA-Z\-]+[ ][a-zA-Z\-]+$/u',
            'employment_insured_date_era' => 'required|in:昭和,平成,令和',
            'employment_insured_date_year' => 'required|numeric|between:1,99',
            'employment_insured_date_month' => 'required|numeric|between:1,12',
            'employment_insured_date_date' => 'required|numeric|between:1,31',
            'employment_insurance_office_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'previous_employment_insurance_office_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'previous_employment_insurance_office_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'previous_employment_insurance_office_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'transfer_date_era' => 'required|in:平成,令和',
            'transfer_date_year' => 'required|numeric|between:1,99',
            'transfer_date_month' => 'required|numeric|between:1,12',
            'transfer_date_date' => 'required|numeric|between:1,31',
            'office_before_transfer' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'name_before_changed_kanji' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'name_before_changed_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_changed_date_era' => 'nullable|in:平成,令和',
            'name_changed_date_year' => 'nullable|numeric|between:1,99',
            'name_changed_date_month' => 'nullable|numeric|between:1,12',
            'name_changed_date_date' => 'nullable|numeric|between:1,31',
            'remarks' => 'nullable|string|max:784|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarter_address' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarter_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'headquarter_tel_area_code' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'headquarter_tel_city_code' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'headquarter_tel_subscriber_code' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'today_era' => 'required|in:平成,令和',
            'today_year' => 'required|numeric|between:1,99',
            'today_month' => 'required|numeric|between:1,12',
            'today_date' => 'required|numeric|between:1,31',
            'labor_consultant_today_era' => 'nullable|in:平成,令和',
            'labor_consultant_today_year' => 'nullable|numeric|between:1,99',
            'labor_consultant_today_month' => 'nullable|numeric|between:1,12',
            'labor_consultant_today_date' => 'nullable|numeric|between:1,31',
            'agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_note' => 'nullable|string|max:784',
            'hello_work' => 'required|string|max:250|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'employment_insured_no_4' => '被保険者番号4桁',
            'employment_insured_no_6' => '被保険者番号6桁',
            'employment_insured_no_cd' => '被保険者番号1桁',
            'birthday_era' => '生年月日/年号',
            'birthday_year' => '生年月日/年',
            'birthday_month' => '生年月日/月',
            'birthday_day' => '生年月日/日',
            'name_kanji' => '被保険者氏名',
            'name_kana' => '被保険者氏名（フリガナ）',
            'name_alphabet' => '被保険者氏名（ローマ字）',
            'employment_insured_date_era' => '資格取得年月日/年号',
            'employment_insured_date_year' => '資格取得年月日/年',
            'employment_insured_date_month' => '資格取得年月日/月',
            'employment_insured_date_date' => '資格取得年月日/日',
            'employment_insurance_office_no_4' => '事業所番号4桁',
            'employment_insurance_office_no_6' => '事業所番号6桁',
            'employment_insurance_office_no_cd' => '事業所番号1桁',
            'previous_employment_insurance_office_no_4' => '転勤前の事業所番号4桁',
            'previous_employment_insurance_office_no_6' => '転勤前の事業所番号6桁',
            'previous_employment_insurance_office_no_cd' => '転勤前の事業所番号1桁',
            'transfer_date_era' => '転勤年月日/年号',
            'transfer_date_year' => '転勤年月日/年',
            'transfer_date_month' => '転勤年月日/月',
            'transfer_date_date' => '転勤年月日/日',
            'office_before_transfer' => '転勤前事業所名称・所在地',
            'name_before_changed_kanji' => '変更前氏名',
            'name_before_changed_kana' => '変更前氏名（フリガナ）',
            'name_changed_date_era' => '氏名変更年月/年号',
            'name_changed_date_year' => '氏名変更年月/年',
            'name_changed_date_month' => '氏名変更年月/月',
            'name_changed_date_date' => '氏名変更年月/日',
            'remarks' => '備考',
            'headquarter_address' => '事業主住所',
            'headquarter_name' => '事業主氏名',
            'headquarter_tel_area_code' => '事業主電話番号（市外局番）',
            'headquarter_tel_city_code' => '事業主電話番号（市内局番）',
            'headquarter_tel_subscriber_code' => '事業主電話番号（加入者番号）',
            'today_era' => '届出年月日/年号',
            'today_year' => '届出年月日/年',
            'today_month' => '届出年月日/月',
            'today_date' => '届出年月日/日',
            'labor_consultant_today_era' => '社会保険労務士記載欄/作成年月日/年号',
            'labor_consultant_today_year' => '社会保険労務士記載欄/作成年月日/年',
            'labor_consultant_today_month' => '社会保険労務士記載欄/作成年月日/月',
            'labor_consultant_today_date' => '社会保険労務士記載欄/作成年月日/日',
            'agent' => '社会保険労務士記載欄/提出代行者･事務代理者の表示',
            'labor_consultant_name' => '社会保険労務士記載欄/氏名',
            'labor_consultant_tel_area_code' => '社会保険労務士記載欄/電話番号（市外局番）',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄/電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄/電話番号（加入者番号）',
            'labor_consultant_note' => '付記欄',
            'hello_work' => '公共職業安定所あて先',
        ];
    }
}
