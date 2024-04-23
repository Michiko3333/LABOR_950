<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceDependentChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['name'])) {
            $data['name'] = mb_convert_kana($data['name'], 'S');
        }
        if (isset($data['name_kana'])) {
            $data['name_kana'] = mb_convert_kana($data['name_kana'], 'S');
        }
        if (isset($data['spouse_name'])) {
            $data['spouse_name'] = mb_convert_kana($data['spouse_name'], 'S');
        }
        if (isset($data['spouse_name_kana'])) {
            $data['spouse_name_kana'] = mb_convert_kana($data['spouse_name_kana'], 'S');
        }
        if (isset($data['spouse_alias_name'])) {
            $data['spouse_alias_name'] = mb_convert_kana($data['spouse_alias_name'], 'S');
        }
        if (isset($data['spouse_alias_name_kana'])) {
            $data['spouse_alias_name_kana'] = mb_convert_kana($data['spouse_alias_name_kana'], 'S');
        }
        if (isset($data['other_dependent1_name'])) {
            $data['other_dependent1_name'] = mb_convert_kana($data['other_dependent1_name'], 'S');
        }
        if (isset($data['other_dependent1_name_kana'])) {
            $data['other_dependent1_name_kana'] = mb_convert_kana($data['other_dependent1_name_kana'], 'S');
        }
        if (isset($data['other_dependent2_name'])) {
            $data['other_dependent2_name'] = mb_convert_kana($data['other_dependent2_name'], 'S');
        }
        if (isset($data['other_dependent2_name_kana'])) {
            $data['other_dependent2_name_kana'] = mb_convert_kana($data['other_dependent2_name_kana'], 'S');
        }
        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'AS');
            $data['branch_name'] = str_replace(['-', '－', '―'], '‐', $data['branch_name']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '－', '―'], '‐', $data['employee_address']);
        }
        if (isset($data['spouse_address'])) {
            $data['spouse_address'] = mb_convert_kana($data['spouse_address'], 'AS');
            $data['spouse_address'] = str_replace(['-', '－', '―'], '‐', $data['spouse_address']);
        }
        if (isset($data['other_dependent1_address'])) {
            $data['other_dependent1_address'] = mb_convert_kana($data['other_dependent1_address'], 'AS');
            $data['other_dependent1_address'] = str_replace(['-', '－', '―'], '‐', $data['other_dependent1_address']);
        }
        if (isset($data['other_dependent2_address'])) {
            $data['other_dependent2_address'] = mb_convert_kana($data['other_dependent2_address'], 'AS');
            $data['other_dependent2_address'] = str_replace(['-', '－', '―'], '‐', $data['other_dependent2_address']);
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '－', '―'], '‐', $data['branch_address']);
        }
        if (isset($data['headquarters_representative'])) {
            $data['headquarters_representative'] = mb_convert_kana($data['headquarters_representative'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }

        return $data;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            "file_tax_exempt_income" => 'required_if:radio_file_tax_exempt_income,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "submission_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "submission_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "submission_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "pension_office_reference_prefecture" => 'string|regex:/^[0-9]{2}$/u',
            "pension_office_reference_no_cities" => 'string|regex:/^[0-9]{2}$/u',
            "pension_office_reference_no_office" => 'string|regex:/^[ァ-ン]{1,4}$/u',
            "branch_post_code_former" => 'string|regex:/^[0-9]{3}$/u',
            "branch_post_code_latter" => 'string|regex:/^[0-9]{4}$/u',
            "branch_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "branch_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_representative" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "accepted_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "accepted_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "accepted_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employer_confirmation" => 'nullable|string|in:有',
            "application_category" => 'string|max:10|in:該当,非該当,変更',
            "insured_reference_number" => 'nullable|int',
            "name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "name_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "birthday_era" => 'int|in:5,7,9',
            "birthday_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "birthday_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "sex" => 'string|in:男,女',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "acquisition_era" => 'int|in:5,7,9',
            "acquisition_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "acquisition_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "acquisition_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "annual_income" => 'int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "employee_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "employee_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "employee_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "notification_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "notification_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "notification_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "spouse_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "spouse_birthday_era" => 'nullable|int|in:5,7,9',
            "spouse_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_sex" => 'nullable|int|in:1,2,3,4',
            "spouse_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "appointment" => 'nullable|string|in:有',
            "spouse_country" => 'nullable|string|max:255|regex:/\A[ァ-ヴー一-龥・（）\/]+\z/u',
            "spouse_alias_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "spouse_alias_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "spouse_living_type" => 'nullable|string|in:同居,別居',
            "spouse_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "spouse_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "spouse_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "spouse_tel_type" => 'nullable|string|max:10',
            "spouse_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "spouse_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "spouse_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "confirmation_notification_0" => 'nullable|int|in:1',
            "spouse_become_date_era" => 'nullable|int|in:7,9',
            "spouse_become_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_become_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_become_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u', 
            "spouse_reason_type" => 'nullable|string|in:配偶者の就職,婚姻,離職,収入減少,死亡,離婚,就職・収入増加,75歳到達,障害認定,その他',
            "spouse_remove_date_era" => 'nullable|int|in:7,9',
            "spouse_remove_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_remove_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_remove_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_passed_away_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_passed_away_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_passed_away_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_reason" => 'nullable|string|max:255',
            "spouse_occupation_type" => 'nullable|string|in:無職,パート,年金受給者,その他',
            "spouse_occupation" => 'nullable|string|max:255',
            "dependent_annual_income" => 'nullable|int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "spouse_special_requirements_applicable_flg" => 'nullable|int|in:1,2',
            "spouse_special_requirements_applicable_date_era" => 'nullable|string|in:9',
            "spouse_special_requirements_applicable_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_applicable_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_applicable_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_applicable_reason_type" => 'nullable|int|in:1,2,3,4,5',
            "spouse_special_requirements_applicable_reason" => 'nullable|string|max:255',
            "spouse_special_requirements_non_applicable_date_era" => 'nullable|int|in:9',
            "spouse_special_requirements_non_applicable_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_non_applicable_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_non_applicable_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_non_applicable_reason_type" => 'nullable|int|in:1,2',
            "spouse_domestic_transfer_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_domestic_transfer_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_domestic_transfer_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "spouse_special_requirements_non_applicable_reason" => 'nullable|string|max:255',
            "spouse_remarks" => 'nullable|string|max:255',
            "spouse_confirmation_relationship_0" => 'nullable|string|in:確認済',
            "spouse_annual_income" => 'nullable|int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "other_dependent1_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "other_dependent1_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "other_dependent1_birthday_era" => 'nullable|string|max:10',
            "other_dependent1_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_sex" => 'nullable|int|in:1,2',
            "other_dependent1_relationship" => 'nullable|string|in:実子・養子,実子養子以外,父母・養父母,義父母,弟妹,兄姉,祖父母,曽祖父母,孫,その他',
            "other_dependent1_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "other_dependent1_living_type" => 'nullable|string|in:同居,別居',
            "other_dependent1_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "other_dependent1_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "other_dependent1_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "other_dependent1_become_date_era" => 'nullable|string|in:7,9',
            "other_dependent1_become_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_become_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_become_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u', 
            "other_dependent1_reason_type" => 'nullable|string|in:出生,離職,収入減,同居,死亡,離婚,就職,収入増加,75歳到達,障害認定,その他',
            "other_dependent1_remove_date_era" => 'nullable|string|in:7,9',
            "other_dependent1_remove_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_remove_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_remove_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_reason" => 'nullable|string|max:255',
            "other_dependent1_occupation_type" => 'nullable|string|in:無職,パート,年金受給者,小・中学生以下,高・大学生,その他',
            "other_dependent1_occupation" => 'nullable|string|max:255',
            "other_dependent1_occupation_type_grade" => 'nullable|int|max:5',
            "other_dependent1_annual_income" => 'nullable|int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "other_dependent1_special_requirements_applicable_flg" => 'nullable|int|in:1,2',
            "other_dependent1_special_requirements_applicable_reason_type" => 'nullable|int|in:1,2,3,4,5',
            "other_dependent1_special_requirements_applicable_reason" => 'nullable|string|max:255',
            "other_dependent1_special_requirements_non_applicable_reason_type" => 'nullable|int|in:1,2',
            "other_dependent1_domestic_transfer_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_domestic_transfer_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_domestic_transfer_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent1_special_requirements_non_applicable_reason" => 'nullable|string|max:255',
            "other_dependent1_remarks" => 'nullable|string|max:255',
            "other_dependent1_confirmation_relationship_0" => 'nullable|string|in:確認済',
            "other_dependent2_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "other_dependent2_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "other_dependent2_birthday_era" => 'nullable|string|max:10',
            "other_dependent2_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_sex" => 'nullable|int|in:1,2',
            "other_dependent2_relationship" => 'nullable|string|in:実子・養子,実子養子以外,父母・養父母,義父母,弟妹,兄姉,祖父母,曽祖父母,孫,その他',
            "other_dependent2_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "other_dependent2_living_type" => 'nullable|string|in:同居,別居',
            "other_dependent2_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "other_dependent2_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "other_dependent2_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "other_dependent2_become_date_era" => 'nullable|int|in:7,9',
            "other_dependent2_become_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_become_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_become_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u', 
            "other_dependent2_reason_type" => 'nullable|string|in:出生,離職,収入減,同居,死亡,離婚,就職,収入増加,75歳到達,障害認定,その他',
            "other_dependent2_remove_date_era" => 'nullable|int|in:7,9',
            "other_dependent2_remove_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_remove_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_remove_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_reason" => 'nullable|string|max:255',
            "other_dependent2_occupation_type" => 'nullable|string|in:無職,パート,年金受給者,小・中学生以下,高・大学生,その他',
            "other_dependent2_occupation" => 'nullable|string|max:255',
            "other_dependent2_occupation_type_grade" => 'nullable|int|max:5',
            "other_dependent2_annual_income" => 'nullable|int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "other_dependent2_special_requirements_applicable_flg" => 'nullable|int|in:1,2',
            "other_dependent2_special_requirements_applicable_reason_type" => 'nullable|int|in:1,2,3,4,5',
            "other_dependent2_special_requirements_applicable_reason" => 'nullable|string|max:255',
            "other_dependent2_special_requirements_non_applicable_reason_type" => 'nullable|int|in:1,2',
            "other_dependent2_domestic_transfer_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_domestic_transfer_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_domestic_transfer_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "other_dependent2_special_requirements_non_applicable_reason" => 'nullable|string|max:255',
            "other_dependent2_remarks" => 'nullable|string|max:255',
            "other_dependent2_confirmation_relationship_0" => 'nullable|string|in:確認済'
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_tax_exempt_income')) {
                $totalSize += $this->file('file_tax_exempt_income')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }
}
