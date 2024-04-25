<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationRequest extends FormRequest
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
            "office_number_notification_number" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥　]+\z/u',
            "business_location_ship_owner_address" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            "business_name_name_of_ship_owner" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            "business_owner_name_representative_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            "changed_bonus_payment_schedule_month1" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month2" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month3" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month4" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "post_code_former" => 'required|string|max:3|regex:/^[0-9]+$/',
            "post_code_latter" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_area_code" => 'nullable|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'nullable|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'nullable|string|max:5|regex:/^[0-9]+$/',
            "today_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "today_japan_era_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "today_japan_era_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "scheduled_year_of_bonus_payment" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "scheduled_month_of_bonus_payment" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "office_reference_symbol_office_symbol" => 'nullable|string|max:10|regex:/^[ァ-ヴー　]+\z/u',
            "office_arrangement_code_county_city_ward_code" => 'nullable|string|max:4|regex:/^[0-9]+$/',
            "business_establishment_code_prefecture_code" => 'nullable|string|max:2|regex:/^[0-9]+$/',
            "ship_owner_reference_code_ship_insurance_office_abbreviation_name" => 'nullable|string|max:10|regex:/^[一-龥]+$/',
            "ship_owner_arrangement_symbol_symbol" => 'nullable|string|max:10|regex:/^[ァ-ヴー　]+\z/u',
            "bonus_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            "era_name" => 'nullable|int|regex:/9+$/',
            "payment_status" => 'nullable|int|regex:/1+$/',
            "title_types_of_welfare_pension_insurance" => 'nullable|regex:/1+$/',
            "title_different_types_of_seafarers_insurance" => 'nullable|regex:/1+$/',
            "title_different_types_of_health_insurance" => 'nullable|regex:/1+$/',
        ];
    }

    public function attributes()
    {
        return [
            'office_number_notification_number' => '事業所番号（告知番号）',
            'labor_consultant_name' => '社会保険労務士記載欄/氏名等',
            'business_location_ship_owner_address' => '事業所所在地（船舶所有者住所）',
            'business_name_name_of_ship_owner' => '事業所名称（船舶所有者氏名）',
            'business_owner_name_representative_name' => '事業主氏名（代表者氏名）',
            'changed_bonus_payment_schedule_month1' => '変更後の賞与支払予定月_1',
            'changed_bonus_payment_schedule_month2' => '変更後の賞与支払予定月_2',
            'changed_bonus_payment_schedule_month3' => '変更後の賞与支払予定月_3',
            'changed_bonus_payment_schedule_month4' => '変更後の賞与支払予定月_4',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'branch_tel_area_code' => '事業所電話番号（市外局番）',
            'branch_tel_city_code' => '事業所電話番号（市内局番）',
            'branch_tel_subscriber_code' => '事業所電話番号（加入者番号）',
            'today_japan_era_year' => '提出年月日/年',
            'today_japan_era_month' => '提出年月日/月',
            'today_japan_era_day' => '提出年月日/日',
            'scheduled_year_of_bonus_payment' => '賞与支払（予定）年月/年',
            'scheduled_month_of_bonus_payment' => '賞与支払（予定）年月/月',
            'office_reference_symbol_office_symbol' => '事業所整理記号_3',
            'office_arrangement_code_county_city_ward_code' => '事業所整理記号_2',
            'business_establishment_code_prefecture_code' => '事業所整理記号_1',
            'ship_owner_reference_code_ship_insurance_office_abbreviation_name' => '船舶所有者整理記号_1',
            'ship_owner_arrangement_symbol_symbol' => '船舶所有者整理記号_2',
            'bonus_name' => '賞与の名称',
            'era_name' => '賞与支払（予定）年月/年号',
            'payment_status' => '支給の状況',
            'title_types_of_welfare_pension_insurance' => '厚生年金保険',
            'title_different_types_of_seafarers_insurance' => '船員保険',
            'title_different_types_of_health_insurance' => '健康保険',
        ];
    }
}