<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest extends FormRequest
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
            "file_disqualification_status" => 'required_unless:radio_file_disqualification_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            'employment_insured_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'insurance_office_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'insurance_office_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'insurance_office_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'employment_insured_japan_era' => 'required|string|max:2',
            'employment_insured_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'employment_insured_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'employment_insured_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'retirement_japan_era' => 'required|string|max:2',
            'retirement_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'retirement_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'retirement_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'insurance_loss_reason' => 'required|int|between:1,3|regex:/^[1-3]{1}$/u',
            'agreed_hours_week_hour' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'agreed_hours_week_minute' => 'required|int|between:1,60|regex:/^[0-9]{1,2}$/u',
            'replenishment_recruitment_plan_existence' => 'nullable|regex:/^1$/u',
            'changed_fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'changed_fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'mynumber_card_no' => 'nullable|int|regex:/^[0-9]{12}$/u',
            'insured_fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'insured_sex' => 'nullable|string|max:1',
            'insured_birthday_japan_era' => 'nullable|string|max:2',
            'insured_birthday_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insured_birthday_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'insured_birthday_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'hello_work_office_no' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'branch_name_abbreviation' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'insured_address' => 'required|string|max:110|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'insured_loss_reason' => 'required|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'insured_fullname_alphabet' => 'nullable|string|max:255|regex:/^[a-zA-Z\-]+[ ][a-zA-Z\-]+$/u',
            'residence_card_no' => 'nullable|string|regex:/^[a-zA-Z]{2}\d{8}[a-zA-Z]{2}$/',
            'stay_date_period_year' => 'nullable|int|between:1,9999|regex:/^[0-9]{1,4}$/u',
            'stay_date_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'stay_date_period_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'residential_status_unknown_reason' => 'nullable|string|max:48|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'notification_date_japan_era' => 'required|string|max:2',
            'notification_date_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'notification_date_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'notification_date_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'branch_address' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'entrepreneur_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'branch_tel_area_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'branch_tel_city_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'branch_tel_subscriber_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'hello_work_destination' => 'required|string|max:250|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'labor_consultant_japan_era' => 'nullable|string|max:2',
            'labor_consultant_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'labor_consultant_display' => 'nullable|string|max:12|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'labor_consultant_fullname' => 'nullable|nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_note' => 'nullable|string|max:250|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_disqualification_status')) {
                $totalSize += $this->file('file_disqualification_status')->getSize();
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
            // 例
            // 'employment_insured_no_4digit.string' => 'メッセージのカスタマイズしたい場合はこちらを使用',
        ];
    }

    public function attributes()
    {
        return [
            'employment_insured_no_4' => '被保険者番号4桁',
            'employment_insured_no_6' => '被保険者番号6桁',
            'employment_insured_no_cd' => '被保険者番号1桁',
            'insurance_office_no_4' => '事業所番号4桁',
            'insurance_office_no_6' => '事業所番号6桁',
            'insurance_office_no_cd' => '事業所番号1桁',
            'employment_insured_japan_era' => '資格取得年月日/年号',
            'employment_insured_year' => '資格取得年月日/年',
            'employment_insured_month' => '資格取得年月日/月',
            'employment_insured_day' => '資格取得年月日/日',
            'retirement_japan_era' => '離職年月日/年号',
            'retirement_year' => '離職年月日/年',
            'retirement_month' => '離職年月日/月',
            'retirement_day' => '離職年月日/日',
            'insurance_loss_reason' => '喪失原因',
            'agreed_hours_week_hour' => '1週間の所定労働時間/時間',
            'agreed_hours_week_minute' => '1週間の所定労働時間/分',
            'replenishment_recruitment_plan_existence' => '補充採用予定の有無',
            'changed_fullname' => '新氏名',
            'changed_fullname_kana' => 'フリガナ（カタカナ）',
            'mynumber_card_no' => '個人番号',
            'insured_fullname' => '被保険者氏名',
            'insured_sex' => '性別',
            'insured_birthday_japan_era' => '生年月日/年号',
            'insured_birthday_year' => '生年月日/年',
            'insured_birthday_month' => '生年月日/月',
            'insured_birthday_day' => '生年月日/日',
            'hello_work_office_no' => '管轄安定所番号',
            'branch_name_abbreviation' => '事業所名略称',
            'insured_address' => '被保険者の住所又は居所',
            'insured_loss_reason' => '被保険者でなくなったことの原因',
            'insured_fullname_alphabet' => '被保険者氏名（ローマ字）又は新氏名（ローマ字）',
            'residence_card_no' => '在留カードの番号',
            'stay_date_period_year' => '在留期間/年',
            'stay_date_period_month' => '在留期間/月',
            'stay_date_period_day' => '在留期間/日',
            'residential_status_unknown_reason' => '在留資格/不明理由',
            'notification_date_japan_era' => '届出年月日/年号',
            'notification_date_year' => '届出年月日/年',
            'notification_date_month' => '届出年月日/月',
            'notification_date_day' => '届出年月日/日',
            'branch_address' => '事業主/住所',
            'entrepreneur_name' => '事業主/氏名',
            'branch_tel_area_code' => '事業主/電話番号（市外局番）',
            'branch_tel_city_code' => '事業主/電話番号（市内局番）',
            'branch_tel_subscriber_code' => '事業主/電話番号（加入者番号）',
            'hello_work_destination' => '公共職業安定所あて先',
            'labor_consultant_japan_era' => '社会保険労務士記載/作成年月日/年号',
            'labor_consultant_japan_era_year' => '社会保険労務士記載/作成年月日/年',
            'labor_consultant_month' => '社会保険労務士記載/作成年月日/月',
            'labor_consultant_day' => '社会保険労務士記載/作成年月日/日',
            'labor_consultant_display' => '社会保険労務士記載/提出代行者・事務代理者',
            'labor_consultant_fullname' => '社会保険労務士記載/氏名',
            'labor_consultant_tel_area_code' => '社会保険労務士記載/電話番号（市外局番）',
            'labor_consultant_tel_city_code' => '社会保険労務士記載/電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載/電話番号（加入者番号）',
            'labor_consultant_note' => '社会保険労務士記載/付記欄',
        ];
    }
}
