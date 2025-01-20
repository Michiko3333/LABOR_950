<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class NationalPensionCategory3InsuredPersonNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['npc3ipn_1_branch_address'])) {
            $data['npc3ipn_1_branch_address'] = mb_convert_kana($data['npc3ipn_1_branch_address'], 'AKS');
            $data['npc3ipn_1_branch_address'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_branch_address']);
        }

        if (isset($data['npc3ipn_1_company_name'])) {
            $data['npc3ipn_1_company_name'] = mb_convert_kana($data['npc3ipn_1_company_name'], 'AKS');
            $data['npc3ipn_1_company_name'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_company_name']);
        }

        if (isset($data['branch_npc3ipn_1_business_owner_namename'])) {
            $data['npc3ipn_1_business_owner_name'] = mb_convert_kana($data['npc3ipn_1_business_owner_name'], 'AKS');
            $data['npc3ipn_1_business_owner_name'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_business_owner_name']);
        }

        if (isset($data['npc3ipn_1_labor_consultant_name'])) {
            $data['npc3ipn_1_labor_consultant_name'] = mb_convert_kana($data['npc3ipn_1_labor_consultant_name'], 'AKS');
            $data['npc3ipn_1_labor_consultant_name'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_labor_consultant_name']);
        }

        if (isset($data['npc3ipn_1_employee_fullname_kana'])) {
            $data['npc3ipn_1_employee_fullname_kana'] = mb_convert_kana($data['npc3ipn_1_employee_fullname_kana'], 'KS');
            $data['npc3ipn_1_employee_fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_employee_fullname_kana']);
        }

        if (isset($data['npc3ipn_1_employee_fullname'])) {
            $data['npc3ipn_1_employee_fullname'] = mb_convert_kana($data['npc3ipn_1_employee_fullname'], 'AKS');
            $data['npc3ipn_1_employee_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_employee_fullname']);
        }

        if (isset($data['npc3ipn_1_employee_address'])) {
            $data['npc3ipn_1_employee_address'] = mb_convert_kana($data['npc3ipn_1_employee_address'], 'AKS');
            $data['npc3ipn_1_employee_address'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_employee_address']);
        }

        if (isset($data['npc3ipn_1_dependent_fullname_kana'])) {
            $data['npc3ipn_1_dependent_fullname_kana'] = mb_convert_kana($data['npc3ipn_1_dependent_fullname_kana'], 'KS');
            $data['npc3ipn_1_dependent_fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_dependent_fullname_kana']);
        }

        if (isset($data['npc3ipn_1_dependent_fullname'])) {
            $data['npc3ipn_1_dependent_fullname'] = mb_convert_kana($data['npc3ipn_1_dependent_fullname'], 'AKS');
            $data['npc3ipn_1_dependent_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_dependent_fullname']);
        }

        if (isset($data['npc3ipn_1_dependent_foreign_nationality'])) {
            $data['npc3ipn_1_dependent_foreign_nationality'] = mb_convert_kana($data['npc3ipn_1_dependent_foreign_nationality'], 'AKS');
            $data['npc3ipn_1_dependent_foreign_nationality'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_dependent_foreign_nationality']);
        }

        if (isset($data['npc3ipn_1_dependent_foreigner_nickname'])) {
            $data['npc3ipn_1_dependent_foreigner_nickname'] = mb_convert_kana($data['npc3ipn_1_dependent_foreigner_nickname'], 'AKS');
            $data['npc3ipn_1_dependent_foreigner_nickname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_dependent_foreigner_nickname']);
        }

        if (isset($data['npc3ipn_1_dependent_address'])) {
            $data['npc3ipn_1_dependent_address'] = mb_convert_kana($data['npc3ipn_1_dependent_address'], 'AKS');
            $data['npc3ipn_1_dependent_address'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_dependent_address']);
        }

        if (isset($data['npc3ipn_1_other_input_fields'])) {
            $data['npc3ipn_1_other_input_fields'] = mb_convert_kana($data['npc3ipn_1_other_input_fields'], 'AKS');
            $data['npc3ipn_1_other_input_fields'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_other_input_fields']);
        }

        if (isset($data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other'])) {
            $data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other'] = mb_convert_kana($data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other'], 'AKS');
            $data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other']);
        }

        if (isset($data['npc3ipn_2_dependent_fullname'])) {
            $data['npc3ipn_2_dependent_fullname'] = mb_convert_kana($data['npc3ipn_2_dependent_fullname'], 'AKS');
            $data['npc3ipn_2_dependent_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_dependent_fullname']);
        }

        if (isset($data['npc3ipn_2_employee_fullname_kana'])) {
            $data['npc3ipn_2_employee_fullname_kana'] = mb_convert_kana($data['npc3ipn_2_employee_fullname_kana'], 'AKS');
            $data['npc3ipn_2_employee_fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_employee_fullname_kana']);
        }

        if (isset($data['npc3ipn_2_employee_fullname'])) {
            $data['npc3ipn_2_employee_fullname'] = mb_convert_kana($data['npc3ipn_2_employee_fullname'], 'AKS');
            $data['npc3ipn_2_employee_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_employee_fullname']);
        }

        if (isset($data['npc3ipn_2_business_owners_address'])) {
            $data['npc3ipn_2_business_owners_address'] = mb_convert_kana($data['npc3ipn_2_business_owners_address'], 'AKS');
            $data['npc3ipn_2_business_owners_address'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_business_owners_address']);
        }

        if (isset($data['npc3ipn_2_business_owners_location'])) {
            $data['npc3ipn_2_business_owners_location'] = mb_convert_kana($data['npc3ipn_2_business_owners_location'], 'AKS');
            $data['npc3ipn_2_business_owners_location'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_business_owners_location']);
        }

        if (isset($data['npc3ipn_2_business_owners_fullname'])) {
            $data['npc3ipn_2_business_owners_fullname'] = mb_convert_kana($data['npc3ipn_2_business_owners_fullname'], 'AKS');
            $data['npc3ipn_2_business_owners_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_business_owners_fullname']);
        }

        if (isset($data['npc3ipn_2_labor_consultant_name'])) {
            $data['npc3ipn_2_labor_consultant_name'] = mb_convert_kana($data['npc3ipn_2_labor_consultant_name'], 'AKS');
            $data['npc3ipn_2_labor_consultant_name'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_2_labor_consultant_name']);
        }

        if (isset($data['npc3ipn_3_dependent_fullname'])) {
            $data['npc3ipn_3_dependent_fullname'] = mb_convert_kana($data['npc3ipn_3_dependent_fullname'], 'AKS');
            $data['npc3ipn_3_dependent_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_dependent_fullname']);
        }

        if (isset($data['npc3ipn_3_employee_fullname_kana'])) {
            $data['npc3ipn_3_employee_fullname_kana'] = mb_convert_kana($data['npc3ipn_3_employee_fullname_kana'], 'KS');
            $data['npc3ipn_3_employee_fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_employee_fullname_kana']);
        }

        if (isset($data['npc3ipn_3_employee_fullname'])) {
            $data['npc3ipn_3_employee_fullname'] = mb_convert_kana($data['npc3ipn_3_employee_fullname'], 'AKS');
            $data['npc3ipn_3_employee_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_employee_fullname']);
        }

        if (isset($data['npc3ipn_3_business_owners_address'])) {
            $data['npc3ipn_3_business_owners_address'] = mb_convert_kana($data['npc3ipn_3_business_owners_address'], 'AKS');
            $data['npc3ipn_3_business_owners_address'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_business_owners_address']);
        }

        if (isset($data['npc3ipn_3_business_owners_location'])) {
            $data['npc3ipn_3_business_owners_location'] = mb_convert_kana($data['npc3ipn_3_business_owners_location'], 'AKS');
            $data['npc3ipn_3_business_owners_location'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_business_owners_location']);
        }

        if (isset($data['npc3ipn_3_business_owners_fullname'])) {
            $data['npc3ipn_3_business_owners_fullname'] = mb_convert_kana($data['npc3ipn_3_business_owners_fullname'], 'AKS');
            $data['npc3ipn_3_business_owners_fullname'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_business_owners_fullname']);
        }

        if (isset($data['npc3ipn_3_labor_consultant_name'])) {
            $data['npc3ipn_3_labor_consultant_name'] = mb_convert_kana($data['npc3ipn_3_labor_consultant_name'], 'AKS');
            $data['npc3ipn_3_labor_consultant_name'] = str_replace(['-', '‐', '―'], '－', $data['npc3ipn_3_labor_consultant_name']);
        }

        $this->merge($data);
        return $data;
    }

    public function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            "file_basic_pension" => 'required_if:radio_file_basic_pension,2|file|mimes:jpg,pdf|max:50000',
            "file_livelihood_maintenance" => 'required_if:radio_file_livelihood_maintenance,2|file|mimes:jpg,pdf|max:50000',
            "file_business_owner" => 'required_if:radio_file_business_owner,2|file|mimes:jpg,pdf|max:50000',
            "file_medical_insurer" => 'required_if:radio_file_medical_insurer,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "npc3ipn_1_submission_year" => 'required|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_submission_month" => 'required|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_submission_day" => 'required|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_post_code_former" => 'nullable|string|regex:/^[0-9]{3}+$/u',
			"npc3ipn_1_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}+$/u',
			"npc3ipn_1_branch_address" => 'nullable|string|max:50|nullable|string|max:50|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_1_company_name" => 'nullable|string|max:25|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_1_business_owner_name" => 'nullable|string|max:25|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_1_branch_tel_area_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_1_branch_tel_city_code" => 'nullable|string|max:4|regex:/^[0-9]+$/u',
			"npc3ipn_1_branch_tel_subscriber_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_receipt_era" => 'nullable|int|in:5,7,9',
			"npc3ipn_1_date_of_receipt_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_receipt_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_receipt_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_labor_consultant_name" => ['nullable', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_labor_and_social_security_attorney_registration_no" => 'nullable|string|regex:/^[0-9]+$/u',
			"npc3ipn_1_employee_fullname_kana" => 'nullable|string|max:25|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
			"npc3ipn_1_employee_fullname" => 'required|string|max:12|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_1_employee_birthday_era" => 'required|int|in:5,7,9',
			"npc3ipn_1_employee_birthday_year" => 'required|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_employee_birthday_month" => 'required|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_employee_birthday_day" => 'required|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_employee_sex" => 'required|string|in:男,女',
			"npc3ipn_1_employee_my_number_or_basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/u',
			"npc3ipn_1_employee_address_post_code_former" => 'nullable|string|regex:/^[0-9]{3}+$/u',
			"npc3ipn_1_employee_address_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}+$/u',
			"npc3ipn_1_employee_address" => ['nullable', 'string', 'max:37', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_notification_date_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_notification_date_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_notification_date_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_fullname_kana" => ['nullable', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_dependent_fullname" => 'nullable|string|max:12|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_1_delegate_to_employee" => 'nullable|string|in:有',
			"npc3ipn_1_dependent_birthday_era" => 'nullable|int|in:5,7,9',
			"npc3ipn_1_dependent_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_sex_relationship" => 'required|int|in:1,2,3,4',
			"npc3ipn_1_dependent_my_number_or_basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_foreign_nationality" => ['nullable', 'string', 'max:12', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_dependent_foreigner_nickname" => ['nullable', 'string', 'max:12', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_living_together_or_separately" => 'required|string|in:同居,別居',
			"npc3ipn_1_dependent_post_code_former" => 'nullable|string|regex:/^[0-9]{3}+$/u',
			"npc3ipn_1_dependent_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}+$/u',
			"npc3ipn_1_dependent_address" => ['nullable', 'string', 'max:37', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_dependent_tell_area_code" => 'nullable|int|max_digits:5|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_tell_city_code" => 'nullable|int|max_digits:4|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_tell_subscriber_code" => 'nullable|int|max_digits:5|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_tell_number_type" => 'nullable|string|in:自宅,携帯,勤務先,その他',
			"npc3ipn_1_applicable_or_not_applicable" => 'nullable|string|in:該当,非該当',
			"npc3ipn_1_date_of_authorisation_era" => 'nullable|int|in:7,9',
			"npc3ipn_1_date_of_authorisation_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_authorisation_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_authorisation_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_dependent_enrollment_system" => 'nullable|int|in:31,36,30,32,37',
			"npc3ipn_1_date_of_expiry_era" => 'nullable|int|in:7,9',
			"npc3ipn_1_date_of_expiry_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_expiry_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_expiry_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_reason_for_cancellation" => 'nullable|string|in:配偶者就職,婚姻,離職,収入減少,死亡,離婚,収入増加,その他',
			"npc3ipn_1_date_of_death_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_death_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_death_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_other_input_fields" => 'nullable|string|max:8|regex:/^[0-9０-９あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_1_remark" => ['nullable', 'string', 'max:39', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_1_overseas_special_requirements_category" => 'nullable|int|in:1,2',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era" => 'nullable|int|in:9',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason" => 'nullable|int|in:1,2,3,4,5',
			"npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other" => 'nullable|string|max:11|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era" => 'nullable|int|in:9',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason" => 'nullable|int|in:1,2',
			"npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason_other" => 'nullable|string|max:11|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
            "npc3ipn_1_date_of_moving_into_japan_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_moving_into_japan_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_1_date_of_moving_into_japan_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_2_dependent_mynumber_card_no_or_pension_no" => 'nullable|string|max_digits:12|regex:/^[0-9]+$/u',
			"npc3ipn_2_dependent_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_2_dependent_birthday_era" => 'nullable|string|in:明治,大正,昭和,平成,令和',
			"npc3ipn_2_dependent_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_2_dependent_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_2_dependent_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_2_employee_mynumber_card_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]+$/u',
			"npc3ipn_2_employee_fullname_kana" => 'nullable|string|max:25|regex:/^[ァ-ヴー－　]+$/u',
			"npc3ipn_2_employee_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_2_employee_birthday_era" => 'nullable|string|in:明治,大正,昭和,平成,令和',
			"npc3ipn_2_employee_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_2_employee_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_2_employee_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_2_business_owners_post_code_former" => 'nullable|string|regex:/^[0-9]{3}+$/u',
			"npc3ipn_2_business_owners_post_code_letter" => 'nullable|string|regex:/^[0-9]{4}+$/u',
			"npc3ipn_2_business_owners_address" => 'nullable|string|max:50|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_2_business_owners_location" => ['nullable', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_2_business_owners_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_2_business_owners_tel_area_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_2_business_owners_tel_city_code" => 'nullable|string|max:4|regex:/^[0-9]+$/u',
			"npc3ipn_2_business_owners_tel_subscriber_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_2_date_of_submission_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_2_date_of_submission_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_2_date_of_submission_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_2_labor_consultant_name" => ['nullable', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_3_dependent_mynumber_card_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]+$/u',
			"npc3ipn_3_dependent_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_3_dependent_birthday_era" => 'nullable|string|in:明治,大正,昭和,平成,令和',
			"npc3ipn_3_dependent_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_3_dependent_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_3_dependent_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_3_employee_mynumber_card_no_or_pension_no" => 'nullable|string|max:12|regex:/^[0-9]+$/u',
			"npc3ipn_3_employee_fullname_kana" => 'nullable|string|max:25|regex:/^[ァ-ヴー－　]+$/u',
			"npc3ipn_3_employee_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_3_employee_birthday_era" => 'nullable|string|in:明治,大正,昭和,平成,令和',
			"npc3ipn_3_employee_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_3_employee_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_3_employee_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_certification_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_certification_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_certification_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_3_business_owners_post_code_former" => 'nullable|string|regex:/^[0-9]{3}+$/u',
			"npc3ipn_3_business_owners_post_code_letter" => 'nullable|string|regex:/^[0-9]{4}+$/u',
			"npc3ipn_3_business_owners_address" => 'nullable|string|max:50|regex:/^[0-9０-９A-Za-zａ-ｚＡ-Ｚあ-んァ-ヴー－一-龥々　]+$/u',
			"npc3ipn_3_business_owners_location" => ['nullable', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
			"npc3ipn_3_business_owners_fullname" => 'nullable|string|max:25|regex:/^[あ-んァ-ヴー－一-龥々A-Za-z　]+$/u',
			"npc3ipn_3_business_owners_tell_area_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_3_business_owners_tell_city_code" => 'nullable|string|max:4|regex:/^[0-9]+$/u',
			"npc3ipn_3_business_owners_tell_subscriber_code" => 'nullable|string|max:5|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_submission_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_submission_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/u',
			"npc3ipn_3_date_of_submission_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/u',
			"npc3ipn_3_labor_consultant_name" => ['nullable', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

	public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $npc3ipn_1_submission_year = intval($data['npc3ipn_1_submission_year']) ?? "";
            $npc3ipn_1_submission_month = intval($data['npc3ipn_1_submission_month']) ?? "";
            $npc3ipn_1_submission_day = intval($data['npc3ipn_1_submission_day']) ?? "";
            $npc3ipn_1_date_of_receipt_era = $data['npc3ipn_1_date_of_receipt_era'] ?? "";
            $npc3ipn_1_date_of_receipt_year = intval($data['npc3ipn_1_date_of_receipt_year']) ?? "";
            $npc3ipn_1_date_of_receipt_month = intval($data['npc3ipn_1_date_of_receipt_month']) ?? "";
            $npc3ipn_1_date_of_receipt_day = intval($data['npc3ipn_1_date_of_receipt_day']) ?? "";
            $npc3ipn_1_employee_birthday_era = $data['npc3ipn_1_employee_birthday_era'] ?? "";
            $npc3ipn_1_employee_birthday_year = intval($data['npc3ipn_1_employee_birthday_year']) ?? "";
            $npc3ipn_1_employee_birthday_month = intval($data['npc3ipn_1_employee_birthday_month']) ?? "";
            $npc3ipn_1_employee_birthday_day = intval($data['npc3ipn_1_employee_birthday_day']) ?? "";
            $npc3ipn_1_employee_my_number_or_basic_pension_number = $data['npc3ipn_1_employee_my_number_or_basic_pension_number'] ?? "";
            $npc3ipn_1_notification_date_year = intval($data['npc3ipn_1_notification_date_year']) ?? "";
            $npc3ipn_1_notification_date_month = intval($data['npc3ipn_1_notification_date_month']) ?? "";
            $npc3ipn_1_notification_date_day = intval($data['npc3ipn_1_notification_date_day']) ?? "";
            $npc3ipn_1_dependent_birthday_era = $data['npc3ipn_1_dependent_birthday_era'] ?? "";
            $npc3ipn_1_dependent_birthday_year = intval($data['npc3ipn_1_dependent_birthday_year']) ?? "";
            $npc3ipn_1_dependent_birthday_month = intval($data['npc3ipn_1_dependent_birthday_month']) ?? "";
            $npc3ipn_1_dependent_birthday_day = intval($data['npc3ipn_1_dependent_birthday_day']) ?? "";
            $npc3ipn_1_dependent_my_number_or_basic_pension_number = $data['npc3ipn_1_dependent_my_number_or_basic_pension_number'] ?? "";
            $npc3ipn_1_date_of_authorisation_era = $data['npc3ipn_1_date_of_authorisation_era'] ?? "";
            $npc3ipn_1_date_of_authorisation_year = intval($data['npc3ipn_1_date_of_authorisation_year']) ?? "";
            $npc3ipn_1_date_of_authorisation_month = intval($data['npc3ipn_1_date_of_authorisation_month']) ?? "";
            $npc3ipn_1_date_of_authorisation_day = intval($data['npc3ipn_1_date_of_authorisation_day']) ?? "";
            $npc3ipn_1_date_of_expiry_era = $data['npc3ipn_1_date_of_expiry_era'] ?? "";
            $npc3ipn_1_date_of_expiry_year = intval($data['npc3ipn_1_date_of_expiry_year']) ?? "";
            $npc3ipn_1_date_of_expiry_month = intval($data['npc3ipn_1_date_of_expiry_month']) ?? "";
            $npc3ipn_1_date_of_expiry_day = intval($data['npc3ipn_1_date_of_expiry_day']) ?? "";
            $npc3ipn_1_date_of_death_era = $data['npc3ipn_1_date_of_death_era'] ?? "";
            $npc3ipn_1_date_of_death_year = intval($data['npc3ipn_1_date_of_death_year']) ?? "";
            $npc3ipn_1_date_of_death_month = intval($data['npc3ipn_1_date_of_death_month']) ?? "";
            $npc3ipn_1_date_of_death_day = intval($data['npc3ipn_1_date_of_death_day']) ?? "";
            $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era = $data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era'] ?? "";
            $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year = intval($data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year']) ?? "";
            $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month = intval($data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month']) ?? "";
            $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day = intval($data['npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day']) ?? "";
            $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era = $data['npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era'] ?? "";
            $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year = intval($data['npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year']) ?? "";
            $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month = intval($data['npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month']) ?? "";
            $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day = intval($data['npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day']) ?? "";
            $npc3ipn_2_dependent_mynumber_card_no_or_pension_no = $data['npc3ipn_2_dependent_mynumber_card_no_or_pension_no'] ?? "";
            $npc3ipn_2_dependent_birthday_era = $data['npc3ipn_2_dependent_birthday_era'] ?? "";
            $npc3ipn_2_dependent_birthday_year = intval($data['npc3ipn_2_dependent_birthday_year']) ?? "";
            $npc3ipn_2_dependent_birthday_month = intval($data['npc3ipn_2_dependent_birthday_month']) ?? "";
            $npc3ipn_2_dependent_birthday_day = intval($data['npc3ipn_2_dependent_birthday_day']) ?? "";
            $npc3ipn_2_employee_mynumber_card_no_or_pension_no = $data['npc3ipn_2_employee_mynumber_card_no_or_pension_no'] ?? "";
            $npc3ipn_2_employee_birthday_era = $data['npc3ipn_2_employee_birthday_era'] ?? "";
            $npc3ipn_2_employee_birthday_year = intval($data['npc3ipn_2_employee_birthday_year']) ?? "";
            $npc3ipn_2_employee_birthday_month = intval($data['npc3ipn_2_employee_birthday_month']) ?? "";
            $npc3ipn_2_employee_birthday_day = intval($data['npc3ipn_2_employee_birthday_day']) ?? "";
            $npc3ipn_3_dependent_mynumber_card_no_or_pension_no = $data['npc3ipn_3_dependent_mynumber_card_no_or_pension_no'] ?? "";
            $npc3ipn_3_dependent_birthday_era = $data['npc3ipn_3_dependent_birthday_era'] ?? "";
            $npc3ipn_3_dependent_birthday_year = intval($data['npc3ipn_3_dependent_birthday_year']) ?? "";
            $npc3ipn_3_dependent_birthday_month = intval($data['npc3ipn_3_dependent_birthday_month']) ?? "";
            $npc3ipn_3_dependent_birthday_day = intval($data['npc3ipn_3_dependent_birthday_day']) ?? "";
            $npc3ipn_3_employee_mynumber_card_no_or_pension_no = $data['npc3ipn_3_employee_mynumber_card_no_or_pension_no'] ?? "";
            $npc3ipn_3_employee_birthday_era = $data['npc3ipn_3_employee_birthday_era'] ?? "";
            $npc3ipn_3_employee_birthday_year = intval($data['npc3ipn_3_employee_birthday_year']) ?? "";
            $npc3ipn_3_employee_birthday_month = intval($data['npc3ipn_3_employee_birthday_month']) ?? "";
            $npc3ipn_3_employee_birthday_day = intval($data['npc3ipn_3_employee_birthday_day']) ?? "";
            $npc3ipn_3_date_of_certification_year = intval($data['npc3ipn_3_date_of_certification_year']) ?? "";
            $npc3ipn_3_date_of_certification_month = intval($data['npc3ipn_3_date_of_certification_month']) ?? "";
            $npc3ipn_3_date_of_certification_day = intval($data['npc3ipn_3_date_of_certification_day']) ?? "";
            $npc3ipn_3_date_of_submission_year = intval($data['npc3ipn_3_date_of_submission_year']) ?? "";
            $npc3ipn_3_date_of_submission_month = intval($data['npc3ipn_3_date_of_submission_month']) ?? "";
            $npc3ipn_3_date_of_submission_day = intval($data['npc3ipn_3_date_of_submission_day']) ?? "";
            $npc3ipn_1_date_of_moving_into_japan_year = intval($data['npc3ipn_1_date_of_moving_into_japan_year']) ?? "";
            $npc3ipn_1_date_of_moving_into_japan_month = intval($data['npc3ipn_1_date_of_moving_into_japan_month']) ?? "";
            $npc3ipn_1_date_of_moving_into_japan_day = intval($data['npc3ipn_1_date_of_moving_into_japan_day']) ?? "";

			function change_seireki($era,$wareki) {
                $wareki = intval($wareki);
				if ($era == '1' || $era == '明治') {
					$seireki = $wareki + 1867;
					return $seireki;
                } elseif ($era == '3' || $era == '大正') {
					$seireki = $wareki + 1911;
					return $seireki;
                } elseif ($era == '5' || $era == '昭和') {
					$seireki = $wareki + 1925;
					return $seireki;
                } elseif ($era == '7' || $era == '平成') {
					$seireki = $wareki + 1988;
					return $seireki;
                } elseif ($era == '9' || $era == '令和') {
					$seireki = $wareki + 2018;
					return $seireki;
				}
			}

            function check_today($era, $wareki, $month, $day) {
                $seireki = change_seireki($era, $wareki);
                $timevalue = $seireki.'-'.$month.'-'.$day;
                if (strtotime($timevalue) <= strtotime('now')) {
                    return true;
                } else {
                    return false;
                }
            }

            function check_wareki($era, $wareki, $month, $day) {
                if (is_numeric($era)) {
                    $eraMap = [
                        3 => "大正",
                        5 => "昭和",
                        7 => "平成",
                        9 => "令和"
                    ];
                    $era = $eraMap[$era] ?? null;
                }
                $eras = [
                    "大正" => ["start" => [1912, 7, 30], "end" => [1926, 12, 25]],
                    "昭和" => ["start" => [1926, 12, 25], "end" => [1989, 1, 7]],
                    "平成" => ["start" => [1989, 1, 8], "end" => [2019, 4, 30]],
                    "令和" => ["start" => [2019, 5, 1], "end" => null],
                ];

                if (!isset($eras[$era])) {
                    return false;
                }

                $startYear = $eras[$era]["start"][0];
                $year = $startYear + $wareki - 1;

                $startDate = $eras[$era]["start"];
                $endDate = $eras[$era]["end"];
                if (
                    ($year < $startDate[0]) ||
                    ($endDate && ($year > $endDate[0])) ||
                    ($year == $startDate[0] && ($month < $startDate[1] || ($month == $startDate[1] && $day < $startDate[2]))) ||
                    ($endDate && $year == $endDate[0] && ($month > $endDate[1] || ($month == $endDate[1] && $day > $endDate[2])))
                ) {
                    return false;
                }
                if (!checkdate($month, $day, $year)) {
                    return false;
                }

                return true;
            }

            if ($npc3ipn_1_submission_year && $npc3ipn_1_submission_month && $npc3ipn_1_submission_day) {
                if (!checkdate($npc3ipn_1_submission_month, $npc3ipn_1_submission_day, change_seireki('9',$npc3ipn_1_submission_year)))
                    $validator->errors()->add('npc3ipn_1_submission_year', '1枚目_提出年月日に、存在しない日付が入力されています。');
                }

            if ($npc3ipn_1_date_of_receipt_era && $npc3ipn_1_date_of_receipt_year && $npc3ipn_1_date_of_receipt_month && $npc3ipn_1_date_of_receipt_day) {
                if (!checkdate($npc3ipn_1_date_of_receipt_month, $npc3ipn_1_date_of_receipt_day, change_seireki($npc3ipn_1_date_of_receipt_era,$npc3ipn_1_date_of_receipt_year))
                    ||   !(check_wareki($npc3ipn_1_date_of_receipt_era, $npc3ipn_1_date_of_receipt_year, $npc3ipn_1_date_of_receipt_month, $npc3ipn_1_date_of_receipt_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_receipt_year', '1枚目_2：事業主等受付年月日に、存在しない日付が入力されています。');
                }
                $seireki = change_seireki($npc3ipn_1_date_of_receipt_era, $npc3ipn_1_date_of_receipt_year);
                $timevalue = $seireki.'-'.$npc3ipn_1_date_of_receipt_month.'-'.$npc3ipn_1_date_of_receipt_day;
                $day_after = (strtotime('now') - strtotime($timevalue))/60/60/24;
                if ($day_after < 1 || $day_after > 2) {
                    $validator->errors()->add('npc3ipn_1_date_of_receipt_year', '1枚目_2：事業主等受付年月日は、1枚目_提出年月日の前日の日付を入力してください。');
                }
            } elseif ($npc3ipn_1_date_of_receipt_era || $npc3ipn_1_date_of_receipt_year || $npc3ipn_1_date_of_receipt_month || $npc3ipn_1_date_of_receipt_day) {
                $validator->errors()->add('npc3ipn_1_date_of_receipt_year', '1枚目_2：事業主等受付年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_employee_birthday_era && $npc3ipn_1_employee_birthday_year && $npc3ipn_1_employee_birthday_month && $npc3ipn_1_employee_birthday_day) {
                if (!checkdate($npc3ipn_1_employee_birthday_month, $npc3ipn_1_employee_birthday_day, change_seireki($npc3ipn_1_employee_birthday_era,$npc3ipn_1_employee_birthday_year))
                ||   !(check_wareki($npc3ipn_1_employee_birthday_era, $npc3ipn_1_employee_birthday_year, $npc3ipn_1_employee_birthday_month, $npc3ipn_1_employee_birthday_day))) {
                    $validator->errors()->add('npc3ipn_1_employee_birthday_year', '1枚目_5：配偶者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_employee_birthday_era || $npc3ipn_1_employee_birthday_year || $npc3ipn_1_employee_birthday_month || $npc3ipn_1_employee_birthday_day) {
                $validator->errors()->add('npc3ipn_1_employee_birthday_year', '1枚目_5：配偶者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_notification_date_year && $npc3ipn_1_notification_date_month && $npc3ipn_1_notification_date_day) {
                if (!checkdate($npc3ipn_1_notification_date_month, $npc3ipn_1_notification_date_day, change_seireki('9',$npc3ipn_1_notification_date_year))) {
                    $validator->errors()->add('npc3ipn_1_notification_date_year', '1枚目_9：第3号被保険者の届出年月日に、存在しない日付が入力されています。');
                }
            } elseif ('9' || $npc3ipn_1_notification_date_year || $npc3ipn_1_notification_date_month || $npc3ipn_1_notification_date_day) {
                $validator->errors()->add('npc3ipn_1_notification_date_year', '1枚目_9：第3号被保険者の届出年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_dependent_birthday_era && $npc3ipn_1_dependent_birthday_year && $npc3ipn_1_dependent_birthday_month && $npc3ipn_1_dependent_birthday_day) {
                if (!checkdate($npc3ipn_1_dependent_birthday_month, $npc3ipn_1_dependent_birthday_day, change_seireki($npc3ipn_1_dependent_birthday_era,$npc3ipn_1_dependent_birthday_year))
                ||   !(check_wareki($npc3ipn_1_dependent_birthday_era, $npc3ipn_1_dependent_birthday_year, $npc3ipn_1_dependent_birthday_month, $npc3ipn_1_dependent_birthday_day))) {
                    $validator->errors()->add('npc3ipn_1_dependent_birthday_year', '1枚目_10：第3号被保険者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_dependent_birthday_era || $npc3ipn_1_dependent_birthday_year || $npc3ipn_1_dependent_birthday_month || $npc3ipn_1_dependent_birthday_day) {
                $validator->errors()->add('npc3ipn_1_dependent_birthday_year', '1枚目_10：第3号被保険者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_authorisation_era && $npc3ipn_1_date_of_authorisation_year && $npc3ipn_1_date_of_authorisation_month && $npc3ipn_1_date_of_authorisation_day) {
                if (!checkdate($npc3ipn_1_date_of_authorisation_month, $npc3ipn_1_date_of_authorisation_day, change_seireki($npc3ipn_1_date_of_authorisation_era,$npc3ipn_1_date_of_authorisation_year))
                ||   !(check_wareki($npc3ipn_1_date_of_authorisation_era, $npc3ipn_1_date_of_authorisation_year, $npc3ipn_1_date_of_authorisation_month, $npc3ipn_1_date_of_authorisation_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_authorisation_year', '1枚目_17：第3号被保険者になった年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_authorisation_era || $npc3ipn_1_date_of_authorisation_year || $npc3ipn_1_date_of_authorisation_month || $npc3ipn_1_date_of_authorisation_day) {
                $validator->errors()->add('npc3ipn_1_date_of_authorisation_year', '1枚目_17：第3号被保険者になった年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_expiry_era && $npc3ipn_1_date_of_expiry_year && $npc3ipn_1_date_of_expiry_month && $npc3ipn_1_date_of_expiry_day) {
                if (!checkdate($npc3ipn_1_date_of_expiry_month, $npc3ipn_1_date_of_expiry_day, change_seireki($npc3ipn_1_date_of_expiry_era,$npc3ipn_1_date_of_expiry_year))
                ||   !(check_wareki($npc3ipn_1_date_of_expiry_era, $npc3ipn_1_date_of_expiry_year, $npc3ipn_1_date_of_expiry_month, $npc3ipn_1_date_of_expiry_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_expiry_year', '1枚目_19：第3号被保険者でなくなった日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_expiry_era || $npc3ipn_1_date_of_expiry_year || $npc3ipn_1_date_of_expiry_month || $npc3ipn_1_date_of_expiry_day) {
                $validator->errors()->add('npc3ipn_1_date_of_expiry_year', '1枚目_19：第3号被保険者でなくなった日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_death_year && $npc3ipn_1_date_of_death_month && $npc3ipn_1_date_of_death_day) {
                if (!checkdate($npc3ipn_1_date_of_death_month, $npc3ipn_1_date_of_death_day, change_seireki('9',$npc3ipn_1_date_of_death_year))
                ||   !(check_wareki('9', $npc3ipn_1_date_of_death_year, $npc3ipn_1_date_of_death_month, $npc3ipn_1_date_of_death_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_death_year', '1枚目_20：死亡年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_death_year || $npc3ipn_1_date_of_death_month || $npc3ipn_1_date_of_death_day) {
                $validator->errors()->add('npc3ipn_1_date_of_death_year', '1枚目_20：死亡年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era && $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year && $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month && $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day) {
                if (!checkdate($npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month, $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day, change_seireki($npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era,$npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year))
                ||   !(check_wareki($npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era, $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year, $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month, $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year', '1枚目_22：海外特例要件に該当した年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era || $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year || $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month || $npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day) {
                $validator->errors()->add('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year', '1枚目_22：海外特例要件に該当した年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era && $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year && $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month && $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day) {
                if (!checkdate($npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month, $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day, change_seireki($npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era,$npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year))
                ||   !(check_wareki($npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era, $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year, $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month, $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day))) {
                    $validator->errors()->add('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year', '1枚目_24：海外特例要件に非該当となった年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era || $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year || $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month || $npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day) {
                $validator->errors()->add('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year', '1枚目_24：海外特例要件に非該当となった年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_1_date_of_moving_into_japan_year && $npc3ipn_1_date_of_moving_into_japan_month && $npc3ipn_1_date_of_moving_into_japan_day) {
                if (!checkdate($npc3ipn_1_date_of_moving_into_japan_month, $npc3ipn_1_date_of_moving_into_japan_day, change_seireki('9',$npc3ipn_1_date_of_moving_into_japan_year))) {
                    $validator->errors()->add('npc3ipn_1_date_of_moving_into_japan_year', '1枚目_国内転入年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_1_date_of_moving_into_japan_year || $npc3ipn_1_date_of_moving_into_japan_month || $npc3ipn_1_date_of_moving_into_japan_day) {
                $validator->errors()->add('npc3ipn_1_date_of_moving_into_japan_year', '1枚目_国内転入年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_2_dependent_birthday_era && $npc3ipn_2_dependent_birthday_year && $npc3ipn_2_dependent_birthday_month && $npc3ipn_2_dependent_birthday_day) {
                if (!checkdate($npc3ipn_2_dependent_birthday_month, $npc3ipn_2_dependent_birthday_day, change_seireki($npc3ipn_2_dependent_birthday_era,$npc3ipn_2_dependent_birthday_year))) {
                    $validator->errors()->add('npc3ipn_2_dependent_birthday_year', '2枚目_3：配偶者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_2_dependent_birthday_era || $npc3ipn_2_dependent_birthday_year || $npc3ipn_2_dependent_birthday_month || $npc3ipn_2_dependent_birthday_day) {
                $validator->errors()->add('npc3ipn_2_dependent_birthday_year', '2枚目_3：配偶者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_2_employee_birthday_era && $npc3ipn_2_employee_birthday_year && $npc3ipn_2_employee_birthday_month && $npc3ipn_2_employee_birthday_day) {
                if (!checkdate($npc3ipn_2_employee_birthday_month, $npc3ipn_2_employee_birthday_day, change_seireki($npc3ipn_2_employee_birthday_era,$npc3ipn_2_employee_birthday_year))) {
                    $validator->errors()->add('npc3ipn_2_employee_birthday_year', '2枚目_6：被保険者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_2_employee_birthday_era || $npc3ipn_2_employee_birthday_year || $npc3ipn_2_employee_birthday_month || $npc3ipn_2_employee_birthday_day) {
                $validator->errors()->add('npc3ipn_2_employee_birthday_year', '2枚目_6：被保険者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_3_dependent_birthday_era && $npc3ipn_3_dependent_birthday_year && $npc3ipn_3_dependent_birthday_month && $npc3ipn_3_dependent_birthday_day) {
                if (!checkdate($npc3ipn_3_dependent_birthday_month, $npc3ipn_3_dependent_birthday_day, change_seireki($npc3ipn_3_dependent_birthday_era,$npc3ipn_3_dependent_birthday_year))) {
                    $validator->errors()->add('npc3ipn_3_dependent_birthday_year', '3枚目_3：配偶者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_3_dependent_birthday_era || $npc3ipn_3_dependent_birthday_year || $npc3ipn_3_dependent_birthday_month || $npc3ipn_3_dependent_birthday_day) {
                $validator->errors()->add('npc3ipn_3_dependent_birthday_year', '3枚目_3：配偶者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_3_employee_birthday_era && $npc3ipn_3_employee_birthday_year && $npc3ipn_3_employee_birthday_month && $npc3ipn_3_employee_birthday_day) {
                if (!checkdate($npc3ipn_3_employee_birthday_month, $npc3ipn_3_employee_birthday_day, change_seireki($npc3ipn_3_employee_birthday_era,$npc3ipn_3_employee_birthday_year))) {
                    $validator->errors()->add('npc3ipn_3_employee_birthday_year', '3枚目_6：被保険者の生年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_3_employee_birthday_era || $npc3ipn_3_employee_birthday_year || $npc3ipn_3_employee_birthday_month || $npc3ipn_3_employee_birthday_day) {
                $validator->errors()->add('npc3ipn_3_employee_birthday_year', '3枚目_6：被保険者の生年月日を記載する場合は、年号と年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_3_date_of_certification_year && $npc3ipn_3_date_of_certification_month && $npc3ipn_3_date_of_certification_day) {
                if (!checkdate($npc3ipn_3_date_of_certification_month, $npc3ipn_3_date_of_certification_day, change_seireki('9',$npc3ipn_3_date_of_certification_year))) {
                    $validator->errors()->add('npc3ipn_3_date_of_certification_year', '3枚目_認定年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_3_date_of_certification_year || $npc3ipn_3_date_of_certification_month || $npc3ipn_3_date_of_certification_day) {
                $validator->errors()->add('npc3ipn_3_date_of_certification_year', '3枚目_認定年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($npc3ipn_3_date_of_submission_year && $npc3ipn_3_date_of_submission_month && $npc3ipn_3_date_of_submission_day) {
                if (!checkdate($npc3ipn_3_date_of_submission_month, $npc3ipn_3_date_of_submission_day, change_seireki('9',$npc3ipn_3_date_of_submission_year))) {
                    $validator->errors()->add('npc3ipn_3_date_of_submission_year', '3枚目_提出年月日に、存在しない日付が入力されています。');
                }
            } elseif ($npc3ipn_3_date_of_submission_year || $npc3ipn_3_date_of_submission_month || $npc3ipn_3_date_of_submission_day) {
                $validator->errors()->add('npc3ipn_3_date_of_submission_year', '3枚目_提出年月日を記載する場合は、年月日の項目を全て入力してください。');
            }


            if ($npc3ipn_1_employee_my_number_or_basic_pension_number) {
                if (mb_strlen($npc3ipn_1_employee_my_number_or_basic_pension_number) != 10 && mb_strlen($npc3ipn_1_employee_my_number_or_basic_pension_number) != 12) {
                    $validator->errors()->add('npc3ipn_1_employee_my_number_or_basic_pension_number', '1枚目_7：配偶者の個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($npc3ipn_1_dependent_my_number_or_basic_pension_number) {
                if (mb_strlen($npc3ipn_1_dependent_my_number_or_basic_pension_number) != 10 && mb_strlen($npc3ipn_1_dependent_my_number_or_basic_pension_number) != 12) {
                    $validator->errors()->add('npc3ipn_1_dependent_my_number_or_basic_pension_number', '1枚目_12：第3号被保険者の個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($npc3ipn_2_dependent_mynumber_card_no_or_pension_no) {
                if (mb_strlen($npc3ipn_2_dependent_mynumber_card_no_or_pension_no) != 10 && mb_strlen($npc3ipn_2_dependent_mynumber_card_no_or_pension_no) != 12) {
                    $validator->errors()->add('npc3ipn_2_dependent_mynumber_card_no_or_pension_no', '2枚目_1：配偶者の個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($npc3ipn_2_employee_mynumber_card_no_or_pension_no) {
                if (mb_strlen($npc3ipn_2_employee_mynumber_card_no_or_pension_no) != 10 && mb_strlen($npc3ipn_2_employee_mynumber_card_no_or_pension_no) != 12) {
                    $validator->errors()->add('npc3ipn_2_employee_mynumber_card_no_or_pension_no', '2枚目_4：個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($npc3ipn_3_dependent_mynumber_card_no_or_pension_no) {
                if (mb_strlen($npc3ipn_3_dependent_mynumber_card_no_or_pension_no) != 10 && mb_strlen($npc3ipn_3_dependent_mynumber_card_no_or_pension_no) != 12) {
                    $validator->errors()->add('npc3ipn_3_dependent_mynumber_card_no_or_pension_no', '3枚目_1：配偶者の個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($npc3ipn_3_employee_mynumber_card_no_or_pension_no) {
                if (mb_strlen($npc3ipn_3_employee_mynumber_card_no_or_pension_no) != 10 && mb_strlen($npc3ipn_3_employee_mynumber_card_no_or_pension_no) != 12) {
                    $validator->errors()->add('npc3ipn_3_employee_mynumber_card_no_or_pension_no', '3枚目_1：配偶者の個人番号または基礎年金番号は、個人番号の場合は12桁、基礎年金番号の場合は10桁で入力してください。');
                }
            }

            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
                $totalSize += $this->file('file_basic_pension')->getSize();
                $totalSize += $this->file('file_livelihood_maintenance')->getSize();
                $totalSize += $this->file('file_business_owner')->getSize();
                $totalSize += $this->file('file_medical_insurer')->getSize();
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
            'npc3ipn_1_date_of_receipt_era' => '1枚目_2：事業主等受付年月日（元号）は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_employee_birthday_era' => '1枚目_5：配偶者の生年月日（元号）は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_employee_sex' => '1枚目_6：配偶者の性別は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_dependent_birthday_era' => '1枚目_10：第3号被保険者の生年月日（元号）は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_sex_relationship' => '1枚目_11：第3号被保険者の性別は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_living_together_or_separately' => '1枚目_15：同居別居区分は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_dependent_tell_number_type' => '1枚目_16：第3号被保険者の電話番号区分は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_applicable_or_not_applicable' => '1枚目_該当非該当区分は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_date_of_authorisation_era' => '1枚目_17：第3号被保険者になった年月日（元号）は選択肢の中のいずれかである必要があります。',
            'npc3ipn_1_dependent_enrollment_system' => '1枚目_18：配偶者の加入制度は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_date_of_expiry_era' => '1枚目_19：第3号被保険者でなくなった年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_reason_for_cancellation' => '1枚目_20：第3号被保険者の理由は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_overseas_special_requirements_category' => '1枚目_海外特例要件該当非該当区分は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era' => '1枚目_22：海外特例要件に該当した年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason' => '1枚目_23：海外特例要件の該当理由は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era' => '1枚目_24：海外特例要件に非該当となった年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason' => '1枚目_25：海外特例要件の非該当理由は選択肢の中のいずれかである必要があります',
            'npc3ipn_2_dependent_birthday_era' => '2枚目_3：配偶者の生年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_2_employee_birthday_era' => '2枚目_6：被保険者の生年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_3_dependent_birthday_era' => '3枚目_3：配偶者の生年月日（元号）は選択肢の中のいずれかである必要があります',
            'npc3ipn_3_employee_birthday_era' => '3枚目_6：被保険者の生年月日（元号）は選択肢の中のいずれかである必要があります'
        ];
    }

    public function attributes()
    {
        return [
            'file_basic_pension' => '添付ファイル_基礎年金番号通知書、または、基礎年金番号を確認できる書類',
            'file_livelihood_maintenance' => '添付ファイル_生計維持を確認できる書類',
            'file_business_owner' => '添付ファイル_事業主等証明書',
            'file_medical_insurer' => '添付ファイル_医療保険者証明書',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'npc3ipn_1_submission_year' => '1枚目_提出年月日（年）',
			'npc3ipn_1_submission_month' => '1枚目_提出年月日（月）',
			'npc3ipn_1_submission_day' => '1枚目_提出年月日（日）',
			'npc3ipn_1_post_code_former' => '1枚目_1：事業所の郵便番号（前3桁）',
			'npc3ipn_1_post_code_latter' => '1枚目_1：事業所の郵便番号（後4桁）',
			'npc3ipn_1_branch_address' => '1枚目_1：事業所所在地',
			'npc3ipn_1_company_name' => '1枚目_1：事業所名称',
			'npc3ipn_1_business_owner_name' => '1枚目_1：事業主氏名',
			'npc3ipn_1_branch_tel_area_code' => '1枚目_1：事業所の電話番号（市外局番）',
			'npc3ipn_1_branch_tel_city_code' => '1枚目_1：事業所の電話番号（市内局番）',
			'npc3ipn_1_branch_tel_subscriber_code' => '1枚目_1：事業所の電話番号（加入者番号）',
			'npc3ipn_1_date_of_receipt_era' => '1枚目_2：事業主等受付年月日（元号）',
			'npc3ipn_1_date_of_receipt_year' => '1枚目_2：事業主等受付年月日（年）',
			'npc3ipn_1_date_of_receipt_month' => '1枚目_2：事業主等受付年月日（月）',
			'npc3ipn_1_date_of_receipt_day' => '1枚目_2：事業主等受付年月日（日）',
			'npc3ipn_1_labor_consultant_name' => '1枚目_3：社会保険労務士の提出代行者名',
			'npc3ipn_1_labor_and_social_security_attorney_registration_no' => '1枚目_3：社会保険労務士番号',
			'npc3ipn_1_employee_fullname_kana' => '1枚目_4：配偶者氏名（カナ）',
			'npc3ipn_1_employee_fullname' => '1枚目_4：配偶者氏名',
			'npc3ipn_1_employee_birthday_era' => '1枚目_5：配偶者の生年月日（元号）',
			'npc3ipn_1_employee_birthday_year' => '1枚目_5：配偶者の生年月日（年）',
			'npc3ipn_1_employee_birthday_month' => '1枚目_5：配偶者の生年月日（月）',
			'npc3ipn_1_employee_birthday_day' => '1枚目_5：配偶者の生年月日（日）',
			'npc3ipn_1_employee_sex' => '1枚目_6：配偶者の性別',
			'npc3ipn_1_employee_my_number_or_basic_pension_number' => '1枚目_7：配偶者の個人番号または基礎年金番号',
			'npc3ipn_1_employee_address_post_code_former' => '1枚目_8：配偶者の郵便番号（前3桁）',
			'npc3ipn_1_employee_address_post_code_latter' => '1枚目_8：配偶者の郵便番号（後4桁）',
			'npc3ipn_1_employee_address' => '1枚目_8：配偶者の住所',
			'npc3ipn_1_notification_date_year' => '1枚目_9：第3号被保険者の届出年月日（年）',
			'npc3ipn_1_notification_date_month' => '1枚目_9：第3号被保険者の届出年月日（月）',
			'npc3ipn_1_notification_date_day' => '1枚目_9：第3号被保険者の届出年月日（日）',
			'npc3ipn_1_dependent_fullname_kana' => '1枚目_9：第3号被保険者氏名（カナ）',
			'npc3ipn_1_dependent_fullname' => '1枚目_9：第3号被保険者氏名',
			'npc3ipn_1_delegate_to_employee' => '1枚目_9：提出届委任区分',
			'npc3ipn_1_dependent_birthday_era' => '1枚目_10：第3号被保険者の生年月日（元号）',
			'npc3ipn_1_dependent_birthday_year' => '1枚目_10：第3号被保険者の生年月日（年）',
			'npc3ipn_1_dependent_birthday_month' => '1枚目_10：第3号被保険者の生年月日（月）',
			'npc3ipn_1_dependent_birthday_day' => '1枚目_10：第3号被保険者の生年月日（日）',
			'npc3ipn_1_sex_relationship' => '1枚目_11：第3号被保険者の性別',
			'npc3ipn_1_dependent_my_number_or_basic_pension_number' => '1枚目_12：第3号被保険者の個人番号または基礎年金番号',
			'npc3ipn_1_dependent_foreign_nationality' => '1枚目_13：第3号被保険者の外国籍',
			'npc3ipn_1_dependent_foreigner_nickname' => '1枚目_14：第3号被保険者の外国人通称名',
			'npc3ipn_1_living_together_or_separately' => '1枚目_15：同居別居区分',
			'npc3ipn_1_dependent_post_code_former' => '1枚目_15：第3号被保険者の郵便番号（前3桁）',
			'npc3ipn_1_dependent_post_code_latter' => '1枚目_15：第3号被保険者の郵便番号（後4桁）',
			'npc3ipn_1_dependent_address' => '1枚目_15：第3号被保険者の住所',
			'npc3ipn_1_dependent_tell_area_code' => '1枚目_16：第3号被保険者の市外局番',
			'npc3ipn_1_dependent_tell_city_code' => '1枚目_16：第3号被保険者の市内局番',
			'npc3ipn_1_dependent_tell_subscriber_code' => '1枚目_16：第3号被保険者の加入者番号',
			'npc3ipn_1_dependent_tell_number_type' => '1枚目_16：第3号被保険者の電話番号区分',
			'npc3ipn_1_applicable_or_not_applicable' => '1枚目_該当非該当区分',
			'npc3ipn_1_date_of_authorisation_era' => '1枚目_17：第3号被保険者になった年月日（元号）',
			'npc3ipn_1_date_of_authorisation_year' => '1枚目_17：第3号被保険者になった年月日（年）',
			'npc3ipn_1_date_of_authorisation_month' => '1枚目_17：第3号被保険者になった年月日（月）',
			'npc3ipn_1_date_of_authorisation_day' => '1枚目_17：第3号被保険者になった年月日（日）',
			'npc3ipn_1_dependent_enrollment_system' => '1枚目_18：配偶者の加入制度',
			'npc3ipn_1_date_of_expiry_era' => '1枚目_19：第3号被保険者でなくなった年月日（元号）',
			'npc3ipn_1_date_of_expiry_year' => '1枚目_19：第3号被保険者でなくなった年月日（年）',
			'npc3ipn_1_date_of_expiry_month' => '1枚目_19：第3号被保険者でなくなった年月日（月）',
			'npc3ipn_1_date_of_expiry_day' => '1枚目_19：第3号被保険者でなくなった年月日（日）',
			'npc3ipn_1_reason_for_cancellation' => '1枚目_20：第3号被保険者の理由',
			'npc3ipn_1_date_of_death_year' => '1枚目_20：死亡年月日（年）',
			'npc3ipn_1_date_of_death_month' => '1枚目_20：死亡年月日（月）',
			'npc3ipn_1_date_of_death_day' => '1枚目_20：死亡年月日（日）',
			'npc3ipn_1_other_input_fields' => '1枚目_20：その他入力欄（第3号被保険者の理由）',
			'npc3ipn_1_remark' => '1枚目_21：備考',
			'npc3ipn_1_overseas_special_requirements_category' => '1枚目_海外特例要件該当非該当区分',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era' => '1枚目_22：海外特例要件に該当した年月日（元号）',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year' => '1枚目_22：海外特例要件に該当した年月日（年）',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month' => '1枚目_22：海外特例要件に該当した年月日（月）',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day' => '1枚目_22：海外特例要件に該当した年月日（日）',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason' => '1枚目_23：海外特例要件の該当理由',
			'npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other' => '1枚目_23：その他入力欄（海外特例要件の該当理由）',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era' => '1枚目_24：海外特例要件に非該当となった年月日（元号）',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year' => '1枚目_24：海外特例要件に非該当となった年月日（年）',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month' => '1枚目_24：海外特例要件に非該当となった年月日（月）',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day' => '1枚目_24：海外特例要件に非該当となった年月日（日）',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason' => '1枚目_25：海外特例要件の非該当理由',
			'npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason_other' => '1枚目_25：その他入力欄（海外特例要件の非該当理由）',
            'npc3ipn_1_date_of_moving_into_japan_year' => '1枚目_国内転入年月日（年）',
			'npc3ipn_1_date_of_moving_into_japan_month' => '1枚目_国内転入年月日（月）',
			'npc3ipn_1_date_of_moving_into_japan_day' => '1枚目_国内転入年月日（日）',
			'npc3ipn_2_dependent_mynumber_card_no_or_pension_no' => '2枚目_1：配偶者の個人番号または基礎年金番号',
			'npc3ipn_2_dependent_fullname' => '2枚目_2：配偶者氏名',
			'npc3ipn_2_dependent_birthday_era' => '2枚目_3：配偶者の生年月日（元号）',
			'npc3ipn_2_dependent_birthday_year' => '2枚目_3：配偶者の生年月日（年）',
			'npc3ipn_2_dependent_birthday_month' => '2枚目_3：配偶者の生年月日（月）',
			'npc3ipn_2_dependent_birthday_day' => '2枚目_3：配偶者の生年月日（日）',
			'npc3ipn_2_employee_mynumber_card_no_or_pension_no' => '2枚目_4：個人番号または基礎年金番号',
			'npc3ipn_2_employee_fullname_kana' => '2枚目_5：被保険者氏名（カナ）',
			'npc3ipn_2_employee_fullname' => '2枚目_5：被保険者氏名（漢字）',
			'npc3ipn_2_employee_birthday_era' => '2枚目_6：被保険者の生年月日（元号）',
			'npc3ipn_2_employee_birthday_year' => '2枚目_6：被保険者の生年月日（年）',
			'npc3ipn_2_employee_birthday_month' => '2枚目_6：被保険者の生年月日（月）',
			'npc3ipn_2_employee_birthday_day' => '2枚目_6：被保険者の生年月日（日）',
			'npc3ipn_2_business_owners_post_code_former' => '2枚目_7：事業所の郵便番号（前3桁）',
			'npc3ipn_2_business_owners_post_code_letter' => '2枚目_7：事業所の郵便番号（後4桁）',
			'npc3ipn_2_business_owners_address' => '2枚目_7：事業所の所在地',
			'npc3ipn_2_business_owners_location' => '2枚目_7：事業所の名称',
			'npc3ipn_2_business_owners_fullname' => '2枚目_7：事業主氏名',
			'npc3ipn_2_business_owners_tel_area_code' => '2枚目_7：事業所の電話番号（市外局番）',
			'npc3ipn_2_business_owners_tel_city_code' => '2枚目_7：事業所の電話番号（市内局番）',
			'npc3ipn_2_business_owners_tel_subscriber_code' => '2枚目_7：事業所の電話番号（加入者番号）',
			'npc3ipn_2_date_of_submission_year' => '2枚目_提出年月日（年）',
			'npc3ipn_2_date_of_submission_month' => '2枚目_提出年月日（月）',
			'npc3ipn_2_date_of_submission_day' => '2枚目_提出年月日（日）',
			'npc3ipn_2_labor_consultant_name' => '2枚目_8：社会保険労務士の提出代行者名記載欄',
			'npc3ipn_3_dependent_mynumber_card_no_or_pension_no' => '3枚目_1：配偶者の個人番号または基礎年金番号',
			'npc3ipn_3_dependent_fullname' => '3枚目_2：配偶者の氏名',
			'npc3ipn_3_dependent_birthday_era' => '3枚目_3：配偶者の生年月日（元号）',
			'npc3ipn_3_dependent_birthday_year' => '3枚目_3：配偶者の生年月日（年）',
			'npc3ipn_3_dependent_birthday_month' => '3枚目_3：配偶者の生年月日（月）',
			'npc3ipn_3_dependent_birthday_day' => '3枚目_3：配偶者の生年月日（日）',
			'npc3ipn_3_employee_mynumber_card_no_or_pension_no' => '3枚目_4：個人番号または基礎年金番号',
			'npc3ipn_3_employee_fullname_kana' => '3枚目_5：被保険者氏名（カナ）',
			'npc3ipn_3_employee_fullname' => '3枚目_5：被保険者氏名',
			'npc3ipn_3_employee_birthday_era' => '3枚目_6：被保険者の生年月日（元号）',
			'npc3ipn_3_employee_birthday_year' => '3枚目_6：被保険者の生年月日（年）',
			'npc3ipn_3_employee_birthday_month' => '3枚目_6：被保険者の生年月日（月）',
			'npc3ipn_3_employee_birthday_day' => '3枚目_6：被保険者の生年月日（日）',
			'npc3ipn_3_date_of_certification_year' => '3枚目_認定年月日（年）',
			'npc3ipn_3_date_of_certification_month' => '3枚目_認定年月日（月）',
			'npc3ipn_3_date_of_certification_day' => '3枚目_認定年月日（日）',
			'npc3ipn_3_business_owners_post_code_former' => '3枚目_8：医療保険者の郵便番号（前3桁）',
			'npc3ipn_3_business_owners_post_code_letter' => '3枚目_8：医療保険者の郵便番号（後4桁）',
			'npc3ipn_3_business_owners_address' => '3枚目_8：医療保険者の所在地',
			'npc3ipn_3_business_owners_location' => '3枚目_8：医療保険者の名称',
			'npc3ipn_3_business_owners_fullname' => '3枚目_8：医療保険者の代表者等氏名',
			'npc3ipn_3_business_owners_tell_area_code' => '3枚目_8：医療保険者の電話番号（市外局番）',
			'npc3ipn_3_business_owners_tell_city_code' => '3枚目_8：医療保険者の電話番号（市内局番）',
			'npc3ipn_3_business_owners_tell_subscriber_code' => '3枚目_8：医療保険者の電話番号（加入者番号）',
			'npc3ipn_3_date_of_submission_year' => '3枚目_提出年月日（年）',
			'npc3ipn_3_date_of_submission_month' => '3枚目_提出年月日（月）',
			'npc3ipn_3_date_of_submission_day' => '3枚目_提出年月日（日）',
			'npc3ipn_3_labor_consultant_name' => '3枚目_9：社会保険労務士の提出代行者名記載欄',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（年金事務所）'
        ];
    }
}
