<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsurancePensionInsuredQualificationRequest extends FormRequest
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
            "file_insurance" => 'required_unless:radio_file_insurance,1|file|mimes:jpg,pdf|max:50000',
            "file_dependent" => 'required_unless:radio_file_dependent,1|file|mimes:jpg,pdf|max:50000',
            "file_remote_dependent" => 'required_if:radio_file_load,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'health_insurance' => 'nullable|int|in:1|required_without:pension',
            'pension' => 'nullable|int|in:1',
            'submission_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'submission_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'submission_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'pension_office_reference_prefecture' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_cities' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_office' => 'string|max:4|regex:/\A[ァ-ヴーa-zA-Z0-9　]+\z/u',
            'insurance_office_no' => 'string|regex:/^[0-9]{5}$/u',
            'post_code_former' => 'string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'string|regex:/^[0-9]{4}$/u',
            'branch_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'branch_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'entrepreneur_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'branch_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'insured_reference_number' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'name_kana' =>  'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            'name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'birthday_era' => 'string|in:昭和,7,9',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' =>  'nullable|string|regex:/^[0-9]{10,12}$/u',
            'loss_era' => 'nullable|string|in:平成,令和',
            'loss_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'loss_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'loss_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'retirement_date_era' => 'nullable|string|in:平成,令和',
            'retirement_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'retirement_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'retirement_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_era' => 'nullable|string|in:平成,令和',
            'passed_away_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'remarks_other_details' => 'nullable|string|max:255',
            'insurance_card_attached' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insurance_card_irrepayable' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_insurance')) {
                $totalSize += $this->file('file_insurance')->getSize();
            }
            if ($this->hasFile('file_dependent')) {
                $totalSize += $this->file('file_dependent')->getSize();
            }
            if ($this->hasFile('file_remote_dependent')) {
                $totalSize += $this->file('file_remote_dependent')->getSize();
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
            'health_insurance.required_without' => 'タイトルのチェックボックスで健康保険、厚生年金保険のいずれかである必要があります。',
        ];
    }

    public function attributes()
    {
        return [
            "file_insurance" => '添付ファイル_被保険者証',
            "file_dependent" => '添付ファイル_被扶養者証',
            "file_remote_dependent" => '添付ファイル_遠隔地被扶養者証',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'health_insurance' => '健康保険_最上部チェックボックス',
            'pension' => '厚生年金保険_最上部チェックボックス',
            'submission_year' => '提出日_年',
            'submission_month' => '提出日_月',
            'submission_day' => '提出日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_群市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'insurance_office_no' => '事業所番号',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'entrepreneur_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_name' => '提出代行者名記載欄',
            'insured_reference_number' => '被保険者整理番号',
            'name_kana' => '被保険者氏名（フリガナ）',
            'name' => '被保険者氏名',
            'birthday_era' => '生年月日_年号',
            'birthday_year' => '生年月日_年',
            'birthday_month' => '生年月日_月',
            'birthday_day' => '生年月日_日',
            'mynumber_card_no' => '個人番号（または基礎年金番号）',
            'loss_era' => '喪失年月日_年号',
            'loss_year' => '喪失年月日_年',
            'loss_month' => '喪失年月日_月',
            'loss_day' => '喪失年月日_日',
            'retirement_date_era' => '喪失原因_退職等年月日_年号',
            'retirement_date_year' => '喪失原因_退職等年月日_年',
            'retirement_date_month' => '喪失原因_退職等年月日_月',
            'retirement_date_day' => '喪失原因_退職等年月日_日',
            'passed_away_date_era' => '喪失原因_死亡年月日_年号',
            'passed_away_date_year' => '喪失原因_死亡年月日_年',
            'passed_away_date_month' => '喪失原因_死亡等年月日_月',
            'passed_away_date_day' => '喪失原因_死亡等年月日_日',
            'remarks_other_details' => '備考_その他入力欄',
            'insurance_card_attached' => '備考_保険証回収_添付',
            'insurance_card_irrepayable' => '備考_保険証回収_返不能',
            'over_70_non_applicable_date_year' => '70歳不該当年月日_年',
            'over_70_non_applicable_date_month' => '70歳不該当年月日_月',
            'over_70_non_applicable_date_day' => '70歳不該当年月日_日',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
