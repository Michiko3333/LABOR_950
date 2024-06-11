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
            "radio_file_other" => 'nullable|string|in:2',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "office_number_notification_number" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "business_location_ship_owner_address" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            "business_name_name_of_ship_owner" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "business_owner_name_representative_name" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "changed_bonus_payment_schedule_month1" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month2" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month3" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "changed_bonus_payment_schedule_month4" => ['nullable', 'regex:/^([0-9]|1[0-2]|00)$/'],
            "post_code_former" => 'required|string|regex:/^[0-9]{3}+$/',
            "post_code_latter" => 'required|string|regex:/^[0-9]{4}+$/',
            "branch_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}+$/',
            "today_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "today_japan_era_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "today_japan_era_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "scheduled_year_of_bonus_payment" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "scheduled_month_of_bonus_payment" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "office_reference_symbol_office_symbol" => 'nullable|string|max:4',
            "office_arrangement_code_county_city_ward_code" => 'nullable|string|regex:/^[0-9]{1,4}+$/',
            "business_establishment_code_prefecture_code" => 'nullable|string|regex:/^[0-9]{1,2}+$/',
            "ship_owner_reference_code_ship_insurance_office_abbreviation_name" => 'nullable|string|max:3|regex:/^[一-龥々]+$/',
            "ship_owner_arrangement_symbol_symbol" => 'nullable|string|max:3|regex:/^[ァ-ヴー　]+\z/u',
            "bonus_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            "era_name" => 'nullable|int|in:9',
            "payment_status" => 'nullable|int|in:1',
            "title_types_of_welfare_pension_insurance" => 'nullable|int|in:1',
            "title_different_types_of_seafarers_insurance" => 'nullable|int|in:1',
            "title_different_types_of_health_insurance" => 'nullable|int|in:1',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $scheduled_year_of_bonus_payment = $data['scheduled_year_of_bonus_payment'];
            $scheduled_month_of_bonus_payment = $data['scheduled_month_of_bonus_payment'];

            if ($scheduled_year_of_bonus_payment == 1 && ($scheduled_month_of_bonus_payment < 5)) {
                $validator->errors()->add('scheduled_year_of_bonus_payment', '賞与支払（予定）年月は正しい日付を入力してください。');
            }
        });
    }
    
    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            "radio_file_other" => '当該帳票では添付ファイルに別送を選択することはできません。',
        ];
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'office_number_notification_number' => '事業所番号（告知番号）',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名等',
            'business_location_ship_owner_address' => '事業所所在地（船舶所有者住所）',
            'business_name_name_of_ship_owner' => '事業所名称（船舶所有者氏名）',
            'business_owner_name_representative_name' => '事業主氏名（代表者氏名）',
            'changed_bonus_payment_schedule_month1' => '変更後の賞与支払予定月_1',
            'changed_bonus_payment_schedule_month2' => '変更後の賞与支払予定月_2',
            'changed_bonus_payment_schedule_month3' => '変更後の賞与支払予定月_3',
            'changed_bonus_payment_schedule_month4' => '変更後の賞与支払予定月_4',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'today_japan_era_year' => '提出年月日_年',
            'today_japan_era_month' => '提出年月日_月',
            'today_japan_era_day' => '提出年月日_日',
            'scheduled_year_of_bonus_payment' => '賞与支払（予定）年月_年',
            'scheduled_month_of_bonus_payment' => '賞与支払（予定）年月_月',
            'office_reference_symbol_office_symbol' => '事業所整理記号_3',
            'office_arrangement_code_county_city_ward_code' => '事業所整理記号_2',
            'business_establishment_code_prefecture_code' => '事業所整理記号_1',
            'ship_owner_reference_code_ship_insurance_office_abbreviation_name' => '船舶所有者整理記号_1',
            'ship_owner_arrangement_symbol_symbol' => '船舶所有者整理記号_2',
            'bonus_name' => '賞与の名称',
            'era_name' => '賞与支払（予定）年月_年号',
            'payment_status' => '支給の状況',
            'title_types_of_welfare_pension_insurance' => '厚生年金保険',
            'title_different_types_of_seafarers_insurance' => '船員保険',
            'title_different_types_of_health_insurance' => '健康保険',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
