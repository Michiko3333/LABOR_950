<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEmployeeCreateRequest extends FormRequest
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

        if (isset($data['address_ward'])) {
            $data['address_ward'] = mb_convert_kana($data['address_ward'], 'AS');
        }
        if (isset($data['address_apartment'])) {
            $data['address_apartment'] = mb_convert_kana($data['address_apartment'], 'AS');
        }
        if (isset($data['emergency_address_ward1'])) {
            $data['emergency_address_ward1'] = mb_convert_kana($data['emergency_address_ward1'], 'AS');
        }
        if (isset($data['emergency_address_apartment1'])) {
            $data['emergency_address_apartment1'] = mb_convert_kana($data['emergency_address_apartment1'], 'AS');
        }
        if (isset($data['emergency_address_ward2'])) {
            $data['emergency_address_ward2'] = mb_convert_kana($data['emergency_address_ward2'], 'AS');
        }
        if (isset($data['emergency_address_apartment2'])) {
            $data['emergency_address_apartment2'] = mb_convert_kana($data['emergency_address_apartment2'], 'AS');
        }
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_no' => 'string|max:255|regex:/\A[A-Z0-9]+\z/u',
            'company_name' => 'required',
            'branch_id' => 'integer',
            'managerial_position_id' => 'nullable|integer',
            'division_name' => 'nullable|string|max:255',
            'division_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'last_name' => 'string|max:255',
            'last_name_kana' => 'string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name' => 'string|max:255',
            'first_name_kana' => 'string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_last_name' => 'nullable|string|max:255',
            'old_last_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_first_name' => 'nullable|string|max:255',
            'old_first_name_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'name_common' => 'nullable|string|max:255',
            'name_common_kana' => 'nullable|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'sex' => 'required',
            'birthday_date' => 'required',
            'post_code' => 'required|string|max:20|regex:/\A[0-9]+\z/u',
            'address_prefecture' => 'required|integer',
            'address_city' => 'required|string|max:255',
            'address_ward' => 'required|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'address_apartment' => 'required|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            // 'address_prefecture_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',DB intなのでまち
            'address_city_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',
            'address_ward_kana' => 'string|max:255|regex:/\A[ァ-ヴー０-９]+\z/u',
            //'address_apartment_kana' => 'string|max:255|regex:/\A[ァ-ヴー０-９]+\z/u',
            'tel_area_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_city_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_subscriber_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            "fax1" => 'nullable|string|regex:/^0[0-9]{1,4}$/|required_with:fax2,fax2',
            "fax2" => 'nullable|string|regex:/[0-9]{1,4}$/|required_with:fax1,fax3',
            "fax3" => 'nullable|string|regex:/[0-9]{1,8}$/|required_with:fax1,fax2',
            'mail_address1' => 'nullable|string|max:255|email',
            'mail_address2' => 'nullable|string|max:255|email',
            'emergency_post_code1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_contact1' => 'nullable|string|max:255',
            'emergency_relationship1' => 'nullable|string|max:255',
            'emergency_tel1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture1' => 'nullable|string',
            'emergency_address_city1' => 'nullable|string',
            'emergency_address_ward1' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'emergency_address_apartment1' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９]+\z/u',
            'emergency_post_code2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_contact2' => 'nullable|string|max:255',
            'emergency_relationship2' => 'nullable|string|max:255',
            'emergency_tel2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture2' => 'nullable|string|max:255',
            'emergency_address_city2' => 'nullable|string|max:255',
            'emergency_address_ward2' => 'nullable|string|max:255',
            'emergency_address_apartment2' => 'nullable|string|max:255',
            'spouse_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_family_number' => 'integer|nullable',
            'country_id' => 'nullable|integer',
            'salary_notices' => 'nullable|string|max:255',
            'insured_age_type' => 'nullable|integer',
            'residence_card_no' => 'nullable|string|max:20|regex:/^[A-Z]{2}\d{8}[A-Z]{2}+\z/',
            'residential_status_unknown_reason' => 'nullable|string|max:255',
            'unauthorized_activities_permission_flg' => 'nullable|integer',
            'mynumber_card_no' => 'nullable|string|max:20|regex:/^[0-9]{12}+\z/',
            'social_insurance_no' => 'nullable|string|max:10|regex:/\A[A-Z0-9]+\z/u',
            'pension_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            'pension_office_reference_prefecture' => 'nullable|string|max:2',
            'pension_office_reference_no_cities' => 'nullable|integer|size:2',
            'pension_office_reference_no_office' => 'nullable|string|regex:/\A[ぁ-んァ-ン]+\z/u',
            'pension_no' => 'nullable|string|max:10|regex:/\A[0-9]+\z/u',
            'labor_insurance_type' => 'nullable|integer',
            'employment_insurance_type' => 'nullable|integer',
            'insurance_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            'insurance_office_reference_no' => 'nullable|string|max:20',
            'employment_insurance_office_no' => 'nullable|string|max:20',
            'insurer_no' => 'nullable|string|max:8|regex:/\A[0-9]+\z/u',
            'employee_type' => 'required|integer',
            'employee_status' => 'required|integer',
            'contract_period_flg' => 'nullable|integer',
            'contract_renewal_flg' => 'nullable|integer',
            'resignation_letter_request_flg' => 'nullable|integer',
            'insurance_loss_reason' => 'nullable|integer',
            'over_retired_insurance_loss_reason' => 'nullable|integer',
            //'over_70_non_applicable_flg' => 'nullable|integer',
            'external_advisor_flg' => 'nullable|integer',
            'occupation_type' => 'nullable|string|max:10',
            //'employment_route' => 'nullable|integer',
            //'insured_reason' => 'nullable|integer',
            //'insured_reason_details' => 'nullable|string|max:255',
            //'currency_id' => 'nullable|integer',
            //'salary_payment_system' => 'nullable|integer',
            //'caregiver_leave_benefit_receive_bank_id' => 'nullable|integer',
            //'japan_post_bank_code_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
            //'japan_post_bank_account_no' => 'nullable|string|max:7|regex:/\A[0-9]+\z/u',
            //'bank_account_no' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'employment_type' => 'nullable|integer',
            'employment_status' => 'nullable|integer',
            'employer_type' => 'integer',
            'user_email' => 'required|email',
            'user_pass' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'company_name' => '会社を選択してください。',
            'branch_id' => '支店を選択してください。',
            'fax1.required_with' => 'FAX番号_1を入力してください。',
            'fax2.required_with' => 'FAX番号_2を入力してください。',
            'fax3.required_with' => 'FAX番号_3を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'employee_no' => '社員番号',
            'branch_id' => '支店',
            'managerial_position_id' => '役職',
            'last_name' => '氏',
            'last_name_kana' => '氏（カナ）',
            'last_name_alphabet' => '氏（アルファベット）',
            'first_name' => '名',
            'first_name_kana' => '名（カナ）',
            'first_name_alphabet' => '名（アルファベット）',
            'old_last_name' => '旧氏',
            'old_last_name_kana' => '旧氏（カナ）',
            'old_last_name_alphabet' => '旧氏（アルファベット）',
            'old_first_name' => '旧名',
            'old_first_name_kana' => '旧名（カナ）',
            'old_first_name_alphabet' => '旧名（アルファベット）',
            'name_common' => '通称名',
            'name_common_kana' => '通称名（カナ）',
            'sex' => '性別',
            'birthday_date' => '生年月日',
            'post_code' => '郵便番号（ハイフン無し）',
            'address_prefecture' => '住所（都道府県）',
            'address_city' => '住所（市区町村）',
            'address_ward' => '住所（丁目・番地）',
            'address_apartment' => '住所（アパート・マンション名等）',
            'tel_area_code' => '電話番号（市外局番）',
            'tel_city_code' => '電話番号（市内局番）',
            'tel_subscriber_code' => '電話番号（加入者番号）',
            "fax1" => 'FAX番号_1',
            "fax2" => 'FAX番号_2',
            "fax3" => 'FAX番号_3',
            'mail_address1' => 'メールアドレス１',
            'mail_address2' => 'メールアドレス２',
            'emergency_post_code1' => '緊急連絡先郵便番号１',
            'emergency_contact1' => '緊急連絡先名１',
            'emergency_relationship1' => '緊急連絡先続柄１',
            'emergency_tel1' => '緊急連絡先電話番号１',
            'emergency_post_code1' => '緊急連絡先郵便番号１',
            'emergency_address_prefecture1' => '緊急連絡先住所（都道府県）１',
            'emergency_address_city1' => '緊急連絡先住所（市区町村）１',
            'emergency_address_ward1' => '緊急連絡先住所（丁目・番地）１',
            'emergency_address_apartment1' => '緊急連絡先住所（アパート・マンション名等）１',
            'emergency_post_code2' => '緊急連絡先郵便番号２',
            'emergency_contact2' => '緊急連絡先名２',
            'emergency_relationship2' => '緊急連絡先続柄２',
            'emergency_tel2' => '緊急連絡先電話番号２',
            'emergency_post_code2' => '緊急連絡先郵便番号２',
            'emergency_address_prefecture2' => '緊急連絡先住所（都道府県）２',
            'emergency_address_city2' => '緊急連絡先住所（市区町村）２',
            'emergency_address_ward2' => '緊急連絡先住所（丁目・番地）２',
            'emergency_address_apartment2' => '緊急連絡先住所（アパート・マンション名等）２',
            'spouse_flg' => '配偶者の有無',
            'dependent_flg' => '扶養者の有無',
            'dependent_family_number' => '扶養人数',
            'country_id' => '国籍',
            'labor_insurance_type' => '労災保険区分',
            'employment_insurance_type' => '雇用保険区分',
            'residence_card_no' => '在留カード番号',
            'residential_status_unknown_reason' => '在留資格不明理由',
            'unauthorized_activities_permission_flg' => '資格外活動許可の有無',
            'mynumber_card_no' => 'マイナンバーカード番号',
            'social_insurance_no' => '社会保険番号',
            'pension_no' => '基礎年金番号',
            'pension_office_no' => '事業所番号（厚生年金）',
            "pension_office_reference_prefecture" => '事業所整理記号-都道府県コード',
            "pension_office_reference_no_cities" => '事業所整理記号-郡市区記号',
            "pension_office_reference_no_office" => '事業所整理記号-事業所記号',
            'insurance_office_reference_no' => '事業所整理番号（保険）',
            'employment_insurance_office_no' => '事業所番号（雇用保険）',
            'insurer_no' => '保険者番号',
            'employment_insurance_applied_date' => '雇用保険届出日',
            'employment_insured_date' => '雇用保険資格取得日',
            'employee_type' => '社員区分',
            'employee_status' => '社員ステータス',
            'contract_period_flg' => '雇用契約期間の有無',
            'contract_renewal_flg' => '契約更新条項の有無',
            'resignation_letter_request_flg' => '離職票の交付希望の有無',
            'contract_start_date' => '雇用契約開始日',
            'contract_end_date' => '雇用契約終了日',
            'hired_date' => '入社日',
            'retirement_date' => '離職日',
            'intended_retirement_date' => '離職予定日',
            'retired_reason_type' => '離職理由',
            'insurance_loss_reason' => '喪失原因',
            'over_retired_insurance_loss_reason' => '喪失原因（70歳以上）',
            'passed_away_date' => '死亡日',
            'occupation_type' => '職種',
            'external_advisor_flg' => '外部顧問是否',
            'user_email' => 'ログイン用_メールアドレス',
            'user_pass' => 'パスワード',
        ];
    }
}
