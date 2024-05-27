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
        if (isset($data['company_name'])) {
            $data['company_name'] = mb_convert_kana($data['company_name'], 'AS');
            $data['company_name'] = str_replace(['-', '－', '―'], '‐', $data['company_name']);
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
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '－', '―'], '‐', $data['headquarters_address']);
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
            "file_insurance" => 'required_if:radio_file_insurance,2|file|mimes:jpg,pdf|max:50000',
            "file_dependent" => 'required_if:radio_file_dependent,2|file|mimes:jpg,pdf|max:50000',
            "file_tax_exempt" => 'required_if:radio_file_tax_exempt,2|file|mimes:jpg,pdf|max:50000',
            "file_currently_enrolled" => 'required_if:radio_file_currently_enrolled,2|file|mimes:jpg,pdf|max:50000',
            "file_basic_pension" => 'required_if:radio_file_basic_pension,2|file|mimes:jpg,pdf|max:50000',
            "file_livelihood_maintenance" => 'required_if:radio_file_livelihood_maintenance,2|file|mimes:jpg,pdf|max:50000',
            "file_business_owner" => 'required_if:radio_file_business_owner,2|file|mimes:jpg,pdf|max:50000',
            "file_medical_insurer" => 'required_if:radio_file_medical_insurer,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "submission_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "submission_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "submission_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "pension_office_reference_prefecture" => 'string|regex:/^[0-9]{2}$/u',
            "pension_office_reference_no_cities" => 'string|regex:/^[0-9]{2}$/u',
            "pension_office_reference_no_office" => 'string|regex:/^[ァ-ン]{1,4}$/u',
            "headquarters_post_code_former" => 'string|regex:/^[0-9]{3}$/u',
            "headquarters_post_code_latter" => 'string|regex:/^[0-9]{4}$/u',
            "company_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "headquarters_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "headquarters_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_representative" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "accepted_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "accepted_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "accepted_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employer_confirmation" => 'nullable|string|in:有',
            "application_category" => 'required|string|max:10|in:該当,非該当,変更',
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
            "other_dependent2_confirmation_relationship_0" => 'nullable|string|in:確認済',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string',
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
            if ($this->hasFile('file_tax_exempt')) {
                $totalSize += $this->file('file_tax_exempt')->getSize();
            }
            if ($this->hasFile('file_currently_enrolledfile_tax_exempt_income')) {
                $totalSize += $this->file('file_currently_enrolledfile_tax_exempt_income')->getSize();
            }
            if ($this->hasFile('file_basic_pension')) {
                $totalSize += $this->file('file_basic_pension')->getSize();
            }
            if ($this->hasFile('file_livelihood_maintenance')) {
                $totalSize += $this->file('file_livelihood_maintenance')->getSize();
            }
            if ($this->hasFile('file_business_owner')) {
                $totalSize += $this->file('file_business_owner')->getSize();
            }
            if ($this->hasFile('file_medical_insurer')) {
                $totalSize += $this->file('file_medical_insurer')->getSize();
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
            'birthday_era' => '1枚目_7_生年月日_年号は昭和,平成,令和のいずれかである必要があります。',
            'acquisition_era' => '1枚目_10_取得年月日_年号は昭和,平成,令和のいずれかである必要があります。',
            'spouse_birthday_era' => '1枚目_14_生年月日_年号は昭和,平成,令和のいずれかである必要があります。',
            'spouse_sex' => '1枚目_15_性別は夫,妻,夫(未届),妻(未届)のいずれかである必要があります。',
            'spouse_become_date_era' => '1枚目_22_被扶養者になった日_年号は平成,令和のいずれかである必要があります。',
            'spouse_remove_date_era' => '1枚目_26_被扶養者でなくなった日_年号は平成,令和のいずれかである必要があります。',
            'spouse_special_requirements_applicable_reason_type' => '1枚目_28_理由は選択肢のいずれかである必要があります。',
            'spouse_special_requirements_non_applicable_reason_type' => '1枚目_30_理由は選択肢のいずれかである必要があります。',
            'other_dependent1_birthday_era' => '1枚目_34_生年月日_年号は昭和,平成,令和のいずれかである必要があります。',
            'other_dependent1_sex' => '1枚目_35_性別は男,女のいずれかである必要があります。',
            'other_dependent1_become_date_era' => '1枚目_39_被扶養者になった日_年号は平成,令和のいずれかである必要があります。',
            'other_dependent1_remove_date_era' => '1枚目_42_被扶養者でなくなった日_年号は平成,令和のいずれかである必要があります。',
            'other_dependent1_special_requirements_applicable_flg' => '1枚目_45_海外特例要件は該当,非該当のいずれかである必要があります。',
            'other_dependent1_special_requirements_applicable_reason_type' => '1枚目_46_理由は留学,同行旅行,特定活動,海外婚姻,その他のいずれかである必要があります。',
            'other_dependent1_special_requirements_non_applicable_reason_type' => '1枚目_47_理由は国内転入,その他のいずれかである必要があります。',
            'other_dependent2_birthday_era' => '1枚目_49_生年月日_年号は昭和,平成,令和のいずれかである必要があります。',
            'other_dependent2_sex' => '1枚目_50_性別は男,女のいずれかである必要があります。',
            'other_dependent2_remove_date_era' => '1枚目_57_被扶養者でなくなった日_年号は平成,令和のいずれかである必要があります。',
            'other_dependent2_special_requirements_applicable_flg' => '1枚目_60_海外特例要件は該当,非該当のいずれかである必要があります。',
            'other_dependent2_special_requirements_applicable_reason_type' => '1枚目_61_理由は留学,同行旅行,特定活動,海外婚姻,その他のいずれかである必要があります。',
            'other_dependent2_special_requirements_non_applicable_reason_type' => '1枚目_62_理由は国内転入,その他のいずれかである必要があります。',
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }
    public function attributes()
    {
        return [
            "file_insurance" => '添付ファイル_被保険者証',
            "file_dependent" => '添付ファイル_被扶養者証',
            "file_tax_exempt" => '添付ファイル_非課税証明書',
            "file_currently_enrolled" => '添付ファイル_在学証明書など',
            "file_basic_pension" => '添付ファイル_基礎年金番号通知書 又は 基礎年金番号を確認できる書類',
            "file_livelihood_maintenance" => '添付ファイル_生計維持を確認できる書類',
            "file_business_owner" => '添付ファイル_事業主等証明書',
            "file_medical_insurer" => '添付ファイル_医療保険者証明書',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'submission_year' => '1枚目_提出日_年',
            'submission_month' => '1枚目_提出日_月',
            'submission_day' => '1枚目_提出日_日',
            'pension_office_reference_prefecture' => '1枚目_1_事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '1枚目_1_事業所整理記号_群市区符号',
            'pension_office_reference_no_office' => '1枚目_1_事業所整理記号_事業所記号',
            'headquarters_post_code_former' => '1枚目_2_事業所郵便番号3桁',
            'headquarters_post_code_latter' => '1枚目_2_事業所郵便番号4桁',
            'company_name' => '1枚目_2_事業所名称',
            'headquarters_address' => '1枚目_2_事業所所在地',
            'headquarters_tel_area_code' => '1枚目_2_事業所電話番号_市外局番',
            'headquarters_tel_city_code' => '1枚目_2_事業所電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '1枚目_2_事業所電話番号_加入者番号',
            'headquarters_representative' => '1枚目_2_事業主氏名',
            'labor_consultant_name' => '1枚目_4_提出代行者名記載欄',
            'accepted_year' => '1枚目_3_事業主等受付年月日_年',
            'accepted_month' => '1枚目_3_事業主等受付年月日_月',
            'accepted_day' => '1枚目_3_事業主等受付年月日_日',
            'employer_confirmation' => '1枚目_3_事業主確認チェックボックス',
            'application_category' => '1枚目_該当・非該当・変更選択欄',
            'insured_reference_number' => '1枚目_5_被保険者整理番号',
            'name' => '1枚目_6_氏名',
            'name_kana' => '1枚目_6_氏名（フリガナ）',
            'birthday_era' => '1枚目_7_生年月日_年号',
            'birthday_year' => '1枚目_7_生年月日_年',
            'birthday_month' => '1枚目_7_生年月日_月',
            'birthday_day' => '1枚目_7_生年月日_日',
            'sex' => '1枚目_8_性別',
            'mynumber_card_no' => '1枚目_9_個人番号（または基礎年金番号）',
            'acquisition_era' => '1枚目_10_取得年月日_年号',
            'acquisition_year' => '1枚目_10_取得年月日_年',
            'acquisition_month' => '1枚目_10_取得年月日_月',
            'acquisition_day' => '1枚目_10_取得年月日_日',
            'annual_income' => '1枚目_11_収入（年収）',
            'employee_post_code_former' => '1枚目_12_住所_郵便番号3桁',
            'employee_post_code_latter' => '1枚目_12_住所_郵便番号4桁',
            'employee_address' => '1枚目_12_住所_所在地',
            'notification_year' => '1枚目_13_氏名_日付_年',
            'notification_month' => '1枚目_13_氏名_日付_月',
            'notification_day' => '1枚目_13_氏名_日付_日',
            'spouse_name' => '1枚目_13_氏名',
            'spouse_name_kana' => '1枚目_13_氏名（フリガナ）',
            'spouse_birthday_era' => '1枚目_14_生年月日_年号',
            'spouse_birthday_year' => '1枚目_14_生年月日_年',
            'spouse_birthday_month' => '1枚目_14_生年月日_月',
            'spouse_birthday_day' => '1枚目_14_生年月日_日',
            'spouse_sex' => '1枚目_15_性別',
            'spouse_mynumber_card_no' => '1枚目_16_個人番号（または基礎年金番号）',
            'appointment' => '1枚目_13_委任チェックボックス',
            'spouse_country' => '1枚目_17_外国籍',
            'spouse_alias_name' => '1枚目_18_外国人通称名',
            'spouse_alias_name_kana' => '1枚目_18_外国人通称名（フリガナ）',
            'spouse_living_type' => '1枚目_19_住所_共同居住状況',
            'spouse_post_code_former' => '1枚目_19_住所_郵便番号3桁',
            'spouse_post_code_latter' => '1枚目_19_住所_郵便番号_4桁',
            'spouse_address' => '1枚目_19_住所_所在地',
            'spouse_tel_type' => '1枚目_20_電話番号_連絡先',
            'spouse_tel_area_code' => '1枚目_20_電話番号_市外局番',
            'spouse_tel_city_code' => '1枚目_20_電話番号_市内局番',
            'spouse_tel_subscriber_code' => '1枚目_20_電話番号_加入者番号',
            'confirmation_notification_0' => '1枚目_21_届出意思確認済チェックボックス',
            'spouse_become_date_era' => '1枚目_22_被扶養者になった日_年号',
            'spouse_become_date_year' => '1枚目_22_被扶養者になった日_年',
            'spouse_become_date_month' => '1枚目_22_被扶養者になった日_月',
            'spouse_become_date_day' => '1枚目_22_被扶養者になった日_日',
            'spouse_reason_type' => '1枚目_23_理由',
            'spouse_remove_date_era' => '1枚目_26_被扶養者でなくなった日_年号',
            'spouse_remove_date_year' => '1枚目_26_被扶養者でなくなった日_年',
            'spouse_remove_date_month' => '1枚目_26_被扶養者でなくなった日_月',
            'spouse_remove_date_day' => '1枚目_26_被扶養者でなくなった日_日',
            'spouse_passed_away_date_year' => '1枚目_23_理由_死亡年月日_年',
            'spouse_passed_away_date_month' => '1枚目_23_理由_死亡年月日_月',
            'spouse_passed_away_date_day' => '1枚目_23_理由_死亡年月日_日',
            'spouse_reason' => '1枚目_23_理由_その他入力欄',
            'spouse_occupation_type' => '1枚目_24_職業',
            'spouse_occupation' => '1枚目_24_職業_その他入力欄',
            'dependent_annual_income' => '1枚目_25_収入（年収）',
            'spouse_special_requirements_applicable_flg' => '1枚目_海外特例要件',
            'spouse_special_requirements_applicable_date_era' => '1枚目_27_海外特例要件に該当した日_年号',
            'spouse_special_requirements_applicable_date_year' => '1枚目_27_海外特例要件に該当した日_年',
            'spouse_special_requirements_applicable_date_month' => '1枚目_27_海外特例要件に該当した日_月',
            'spouse_special_requirements_applicable_date_day' => '1枚目_27_海外特例要件に該当した日_日',
            'spouse_special_requirements_applicable_reason_type' => '1枚目_28_理由',
            'spouse_special_requirements_applicable_reason' => '1枚目_28_その他入力欄',
            'spouse_special_requirements_non_applicable_date_era' => '1枚目_29_海外特例要件に非該当となった日_年号',
            'spouse_special_requirements_non_applicable_date_year' => '1枚目_29_海外特例要件に非該当となった日_年',
            'spouse_special_requirements_non_applicable_date_month' => '1枚目_29_海外特例要件に非該当となった日_月',
            'spouse_special_requirements_non_applicable_date_day' => '1枚目_29_海外特例要件に非該当となった日_日',
            'spouse_special_requirements_non_applicable_reason_type' => '1枚目_30_理由',
            'spouse_domestic_transfer_date_year' => '1枚目_30_理由_国内転入日_年',
            'spouse_domestic_transfer_date_month' => '1枚目_30_理由_国内転入日_月',
            'spouse_domestic_transfer_date_day' => '1枚目_30_理由_国内転入日_日',
            'spouse_special_requirements_non_applicable_reason' => '1枚目_30_理由_その他入力欄',
            'spouse_remarks' => '1枚目_31_備考',
            'spouse_confirmation_relationship_0' => '1枚目_31_備考_続柄確認済みチェックボックス',
            'spouse_annual_income' => '1枚目_32_配偶者の収入（年収）',
            'other_dependent1_name' => '1枚目_33_氏名',
            'other_dependent1_name_kana' => '1枚目_33_氏名（フリガナ）',
            'other_dependent1_birthday_era' => '1枚目_34_生年月日_年号',
            'other_dependent1_birthday_year' => '1枚目_34_生年月日_年',
            'other_dependent1_birthday_month' => '1枚目_34_生年月日_月',
            'other_dependent1_birthday_day' => '1枚目_34_生年月日_日',
            'other_dependent1_sex' => '1枚目_35_性別',
            'other_dependent1_relationship' => '1枚目_36_続柄',
            'other_dependent1_mynumber_card_no' => '1枚目_37_個人番号',
            'other_dependent1_living_type' => '1枚目_38_住所_共同居住状況',
            'other_dependent1_post_code_former' => '1枚目_38_住所_郵便番号3桁',
            'other_dependent1_post_code_latter' => '1枚目_38_住所_郵便番号4桁',
            'other_dependent1_address' => '1枚目_38_住所_所在地',
            'other_dependent1_become_date_era' => '1枚目_39_被扶養者になった日_年号',
            'other_dependent1_become_date_year' => '1枚目_39_被扶養者になった日_年',
            'other_dependent1_become_date_month' => '1枚目_39_被扶養者になった日_月',
            'other_dependent1_become_date_day' => '1枚目_39_被扶養者になった日_日',
            'other_dependent1_reason_type' => '1枚目_43_理由',
            'other_dependent1_remove_date_era' => '1枚目_42_被扶養者でなくなった日_年号',
            'other_dependent1_remove_date_year' => '1枚目_42_被扶養者でなくなった日_年',
            'other_dependent1_remove_date_month' => '1枚目_42_被扶養者でなくなった日_月',
            'other_dependent1_remove_date_day' => '1枚目_42_被扶養者でなくなった日_日',
            'other_dependent1_reason' => '1枚目_43_理由_その他入力欄',
            'other_dependent1_occupation_type' => '1枚目_40_職業',
            'other_dependent1_occupation' => '1枚目_40_職業_その他入力欄',
            'other_dependent1_occupation_type_grade' => '1枚目_40_職業_高・大学生の場合の学年',
            'other_dependent1_annual_income' => '1枚目_41_収入（年収）',
            'other_dependent1_special_requirements_applicable_flg' => '1枚目_45_海外特例要件',
            'other_dependent1_special_requirements_applicable_reason_type' => '1枚目_46_理由',
            'other_dependent1_special_requirements_applicable_reason' => '1枚目_46_理由_その他入力欄',
            'other_dependent1_special_requirements_non_applicable_reason_type' => '1枚目_47_理由',
            'other_dependent1_domestic_transfer_date_year' => '1枚目_47_国内転入日_年',
            'other_dependent1_domestic_transfer_date_month' => '1枚目_47_国内転入日_月',
            'other_dependent1_domestic_transfer_date_day' => '1枚目_47_国内転入日_日',
            'other_dependent1_special_requirements_non_applicable_reason' => '1枚目_47_理由_その他入力欄',
            'other_dependent1_remarks' => '1枚目_44_備考',
            'other_dependent1_confirmation_relationship_0' => '1枚目_44_備考_続柄確認済みチェックボックス',
            'other_dependent2_name' => '1枚目_48_氏名',
            'other_dependent2_name_kana' => '1枚目_48_氏名（フリガナ）',
            'other_dependent2_birthday_era' => '1枚目_49_生年月日_年号',
            'other_dependent2_birthday_year' => '1枚目_49_生年月日_年',
            'other_dependent2_birthday_month' => '1枚目_49_生年月日_月',
            'other_dependent2_birthday_day' => '1枚目_49_生年月日_日',
            'other_dependent2_sex' => '1枚目_50_性別',
            'other_dependent2_relationship' => '1枚目_51_続柄',
            'other_dependent2_mynumber_card_no' => '1枚目_52_個人番号',
            'other_dependent2_living_type' => '1枚目_53_住所_共同居住状況',
            'other_dependent2_post_code_former' => '1枚目_53_住所_郵便番号3桁',
            'other_dependent2_post_code_latter' => '1枚目_53_住所_郵便番号4桁',
            'other_dependent2_address' => '1枚目_53_住所_所在地',
            'other_dependent2_become_date_era' => '1枚目_54_被扶養者になった日_年号',
            'other_dependent2_become_date_year' => '1枚目_54_被扶養者になった日_年',
            'other_dependent2_become_date_month' => '1枚目_54_被扶養者になった日_月',
            'other_dependent2_become_date_day' => '1枚目_54_被扶養者になった日_日',
            'other_dependent2_reason_type' => '1枚目_58_理由',
            'other_dependent2_remove_date_era' => '1枚目_57_被扶養者でなくなった日_年号',
            'other_dependent2_remove_date_year' => '1枚目_57_被扶養者でなくなった日_年',
            'other_dependent2_remove_date_month' => '1枚目_57_被扶養者でなくなった日_月',
            'other_dependent2_remove_date_day' => '1枚目_57_被扶養者でなくなった日_日',
            'other_dependent2_reason' => '1枚目_57_理由_その他入力欄',
            'other_dependent2_occupation_type' => '1枚目_55_職業',
            'other_dependent2_occupation' => '1枚目_55_職業_その他入力欄',
            'other_dependent2_occupation_type_grade' => '1枚目_55_職業_高・大学生の場合の学年',
            'other_dependent2_annual_income' => '1枚目_56_収入（年収）',
            'other_dependent2_special_requirements_applicable_flg' => '1枚目_60_海外特例要件',
            'other_dependent2_special_requirements_applicable_reason_type' => '1枚目_61_理由',
            'other_dependent2_special_requirements_applicable_reason' => '1枚目_61_理由_その他入力欄',
            'other_dependent2_special_requirements_non_applicable_reason_type' => '1枚目_62_理由',
            'other_dependent2_domestic_transfer_date_year' => '1枚目_62_国内転入日_年',
            'other_dependent2_domestic_transfer_date_month' => '1枚目_62_国内転入日_月',
            'other_dependent2_domestic_transfer_date_day' => '1枚目_62_国内転入日_日',
            'other_dependent2_special_requirements_non_applicable_reason' => '1枚目_62_理由_その他入力欄',
            'other_dependent2_remarks' => '1枚目_59_備考',
            'other_dependent2_confirmation_relationship_0' => '1枚目_59_備考_続柄確認済みチェックボックス',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
