<?php

namespace App\Http\Requests;

use App\Rules\noEmoji;
use App\Rules\noSymbol;
use App\Rules\NumberOnly;
use App\Rules\katakanaOnly;
use Illuminate\Foundation\Http\FormRequest;

class AdminEmployeeUpdateRequest extends BaseRequest
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

        if (isset($data['address_city'])) {
            $data['address_city'] = mb_convert_kana($data['address_city'], 'RANKS');
            $data['address_city'] = str_replace(['-', '‐'],  '－', $data['address_city']);
        }
        if (isset($data['address_ward'])) {
            $data['address_ward'] = mb_convert_kana($data['address_ward'], 'RANKS');
            $data['address_ward'] = str_replace(['-', '‐'],  '－', $data['address_ward']);
        }
        if (isset($data['address_apartment'])) {
            $data['address_apartment'] = mb_convert_kana($data['address_apartment'], 'RANKS');
            $data['address_apartment'] = str_replace(['-', '‐'],  '－', $data['address_apartment']);
        }
        if (isset($data['emergency_address_city1'])) {
            $data['emergency_address_city1'] = mb_convert_kana($data['emergency_address_city1'], 'RANKS');
            $data['emergency_address_city1'] = str_replace(['-', '‐'],  '－', $data['emergency_address_city1']);
        }
        if (isset($data['emergency_address_ward1'])) {
            $data['emergency_address_ward1'] = mb_convert_kana($data['emergency_address_ward1'], 'RANKS');
            $data['emergency_address_ward1'] = str_replace(['-', '‐'], '－', $data['emergency_address_ward1']);
        }
        if (isset($data['emergency_address_apartment1'])) {
            $data['emergency_address_apartment1'] = mb_convert_kana($data['emergency_address_apartment1'], 'RANKS');
            $data['emergency_address_apartment1'] = str_replace(['-', '‐'], '－', $data['emergency_address_apartment1']);
        }
        if (isset($data['emergency_address_city2'])) {
            $data['emergency_address_city2'] = mb_convert_kana($data['emergency_address_city2'], 'RANKS');
            $data['emergency_address_city2'] = str_replace(['-', '‐'],  '－', $data['emergency_address_city2']);
        }
        if (isset($data['emergency_address_ward2'])) {
            $data['emergency_address_ward2'] = mb_convert_kana($data['emergency_address_ward2'], 'RANKS');
            $data['emergency_address_ward2'] = str_replace(['-', '‐'], '－', $data['emergency_address_ward2']);
        }
        if (isset($data['emergency_address_apartment2'])) {
            $data['emergency_address_apartment2'] = mb_convert_kana($data['emergency_address_apartment2'], 'RANKS');
            $data['emergency_address_apartment2'] = str_replace(['-', '‐'], '－', $data['emergency_address_apartment2']);
        }
        return $data;
    }

    public function withValidator($validator): void
    {
        // 絵文字バリデーションの扶養情報配列対応
        $rules = [];
        foreach ($this->request as $key => $value) {
            if (strpos($key, 'de-') === 0) {
                $rules[$key . ".*"] = new noEmoji;
            } else {
                $rules[$key] = new noEmoji;
            }
        }
        $validator->addRules($rules);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        noSymbol::$attributes = $this->attributes();
        NumberOnly::$attributes = $this->attributes();
        katakanaOnly::$attributes = $this->attributes();
        return [
            'icon_file' => 'nullable|file|mimetypes:image/jpeg,image/jpg,image/png|max:5000',
            'employee_id' => 'required|integer',
            'employee_no' => 'string|max:255|regex:/\A[A-Z0-9]+\z/u',
            'branch_id' => 'integer',
            'managerial_position_id' => 'nullable|integer',
            'division_name' => 'nullable|string|max:255',
            'division_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'last_name' => 'string|max:255',
            'last_name_kana' => ['string', 'max:255', new katakanaOnly(false)],
            'last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name' => 'string|max:255',
            'first_name_kana' => ['string', 'max:255', new katakanaOnly(false)],
            'first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_last_name' => 'nullable|string|max:255',
            'old_last_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'old_last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'old_first_name' => 'nullable|string|max:255',
            'old_first_name_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'old_first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'name_common' => 'nullable|string|max:255',
            'name_common_kana' => ['nullable', 'string', 'max:255', new katakanaOnly(false)],
            'sex' => 'required',
            'birthday_date' => 'required',
            'post_code' => 'required|string|max:20|regex:/\A[0-9]+\z/u',
            'address_prefecture' => 'required|integer',
            'address_city' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'address_ward' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'address_apartment' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            // 'address_prefecture_kana' => 'string|max:255|regex:/\A[ァ-ヴー]+\z/u',DB intなのでまち
            'address_city_kana' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'address_ward_kana' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            // 'address_apartment_kana' => 'string|max:255|regex:/\A[ァ-ヴー０-９]+\z/u',
            'tel_area_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_city_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            'tel_subscriber_code' => 'string|max:10|regex:/\A[0-9]+\z/u',
            "fax1" => 'nullable|string|regex:/^0[0-9]{1,4}$/|required_with:fax2,fax2',
            "fax2" => 'nullable|string|regex:/[0-9]{1,4}$/|required_with:fax1,fax3',
            "fax3" => 'nullable|string|regex:/[0-9]{1,8}$/|required_with:fax1,fax2',
            'mail_address1' => 'nullable|string|max:255|email:rfc',
            'mail_address2' => 'nullable|string|max:255|email:rfc',
            'emergency_post_code1' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_contact1' => 'nullable|string|max:255',
            'emergency_relationship1' => 'nullable|string|max:255',
            'emergency_tel1' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture1' => 'nullable|string',
            'emergency_address_city1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_address_ward1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_address_apartment1' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_post_code2' => 'nullable|string|max:20|regex:/\A[0-9]+\z/u',
            'emergency_contact2' => 'nullable|string|max:255',
            'emergency_relationship2' => 'nullable|string|max:255',
            'emergency_tel2' => 'nullable|string|max:12|regex:/\A[0-9]+\z/u',
            'emergency_address_prefecture2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_address_city2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_address_ward2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'emergency_address_apartment2' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            'spouse_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_flg' => 'integer|nullable|regex:/^[01]+\z/u',
            'dependent_family_number' => 'integer|nullable',
            'country_id' => 'nullable|integer',
            'blood_type' => 'nullable|string|in:A,B,AB,O',
            'qualifications' => 'nullable|string|max:255',
            'salary_notices' => 'nullable|string|max:255',
            'insured_age_type' => 'nullable|integer',
            'insurer_reference_no' => 'nullable|string|max:6|regex:/\A[0-9]+\z/u',
            'employment_insured_no' => 'nullable|string|max:11|regex:/\A[0-9]+\z/u',
            'residence_card_no' => 'nullable|string|max:12|regex:/^[A-Z]{2}\d{8}[A-Z]{2}+\z/',
            'residential_status_unknown_reason' => 'nullable|string|max:255',
            'unauthorized_activities_permission_flg' => 'nullable|integer',
            'mynumber_card_no' => 'nullable|string|max:12|regex:/^[0-9]{12}+\z/',
            'social_insurance_no' => 'nullable|string|max:8|regex:/\A[A-Z0-9]+\z/u',
            'pension_no' => 'nullable|string|max:10|regex:/\A[0-9]+\z/u',
            'labor_insurance_type' => 'nullable|integer',
            'employment_insurance_type' => 'nullable|integer',
            'insurance_office_no' => 'nullable|string|max:5|regex:/\A[0-9]+\z/u',
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
            "de-last_name" => 'array',
            "de-last_name.*" => ['nullable', 'string', 'max:255', 'required_with:de-relationship_spouse.*,de-relationship_dependent.*'],
            "de-last_name_kana" => 'array',
            "de-last_name_kana.*" => ['nullable', 'string', 'max:255', new katakanaOnly(false), 'required_with:de-relationship_spouse.*,de-relationship_dependent.*'],
            "de-first_name" => 'array',
            "de-first_name.*" => ['nullable', 'string', 'max:255', 'required_with:de-relationship_spouse.*,de-relationship_dependent.*'],
            "de-first_name_kana" => 'array',
            "de-first_name_kana.*" => ['nullable', 'string', 'max:255', new katakanaOnly(false), 'required_with:de-relationship_spouse.*,de-relationship_dependent.*'],
            "de-sex" => 'array',
            "de-sex.*" => 'nullable|integer|in:1,2',
            "de-relationship_spouse" => 'array',
            "de-relationship_spouse.*" => 'nullable|integer|in:1,2,3,4|required_with:de-spouse_flag.*',
            "de-relationship_dependent" => 'array',
            "de-relationship_dependent.*" => 'nullable|integer|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15|required_without:de-spouse_flag.*',
            "de-spouse_flag" => 'array',
            "de-spouse_flag.*" => 'nullable|integer|in:1',
            "de-age" => 'array',
            "de-age.*" => 'nullable|integer|digits_between:1,3',
            "de-contact" => 'array',
            "de-contact.*" => ['nullable', 'string', new NumberOnly(13)],
            "de-occupation" => 'array',
            "de-occupation.*" => ['nullable', 'string', 'max:255', new noSymbol(false)],
            "de-annual_income" => 'array',
            "de-annual_income.*" => 'nullable|integer|digits_between:1,7',
            "de-mynumber_card_no" => 'array',
            "de-mynumber_card_no.*" => ['nullable', 'string', new NumberOnly(12)],
            "de-pension_no" => 'array',
            "de-pension_no.*" => ['nullable', 'string', new NumberOnly(10)],
            "de-dependent_type" => 'array',
            "de-dependent_type.*" => 'nullable|integer|in:1,2,3,4',
            "de-other_1" => 'array',
            "de-other_1.*" => ['nullable', 'string', 'max:255', new noSymbol(false)],
            "de-other_2" => 'array',
            "de-other_2.*" => ['nullable', 'string', 'max:255', new noSymbol(false)],
            'insured_status' => 'nullable|string|max:21',
            'health_insurance_association_number' => ['nullable', 'string', new NumberOnly(8)],
            'acquisition_of_distinction' => 'nullable|integer',
            'welfare_pension' => 'nullable|integer',
            'overseas_special_exception' => 'nullable|integer',
            'dispatch_contract_completion' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        $messages = [
            'fax1.required_with' => 'FAX番号_1を入力してください。',
            'fax2.required_with' => 'FAX番号_2を入力してください。',
            'fax3.required_with' => 'FAX番号_3を入力してください。',
            'icon_file.mimetypes' => 'アイコン画像はjpeg,jpg,pngのいずれかである必要があります。',
        ];

        foreach ($this->input('de-last_name', []) as $index => $value) {
            $messages["de-last_name.{$index}.required_with"] = ($index + 1) . "扶養者の氏を入力してください。";
        }
        foreach ($this->input('de-last_name_kana', []) as $index => $value) {
            $messages["de-last_name_kana.{$index}.required_with"] = ($index + 1) . "扶養者の氏（カナ）を入力してください。";
        }
        foreach ($this->input('de-first_name', []) as $index => $value) {
            $messages["de-first_name.{$index}.required_with"] = ($index + 1) . "扶養者の名を入力してください。";
        }
        foreach ($this->input('de-first_name_kana', []) as $index => $value) {
            $messages["de-first_name_kana.{$index}.required_with"] = ($index + 1) . "扶養者の名（カナ）を入力してください。";
        }
        foreach ($this->input('de-relationship_dependent', []) as $index => $value) {
            $messages["de-relationship_dependent.{$index}.required_without"] = ($index + 1) . "扶養者の続柄を選択してください。";
        }
        foreach ($this->input('de-relationship_spouse', []) as $index => $value) {
            $messages["de-relationship_spouse.{$index}.required_with"] = ($index + 1) . "扶養者の続柄を選択してください。";
        }

        return $messages;
    }

    public function attributes()
    {
        $Attributes =  [
            'icon_file' => 'アイコン画像',
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
            'insurer_no' => '被保険者番号',
            'insured_age_type' => '取得時被保険者種類',
            'insurer_reference_no' => '被保険者整理番号',
            'employment_insurance_applied_date' => '雇用保険届出日',
            'employment_insured_date' => '雇用保険取得日',
            'employment_insured_no' => '雇用保険番号',
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
            'qualifications' => '資格情報',
            'insured_status' => '被保険者状況',
            'health_insurance_association_number' => '健保組合番号',
            'acquisition_of_distinction' => '取得区分',
            'welfare_pension' => '厚生年金基金',
            'overseas_special_exception' => '海外特例',
            'dispatch_contract_completion' => '派遣請負修了区分',
        ];

        foreach ($this->input('de-last_name', []) as $index => $value) {
            $Attributes["de-last_name.{$index}"] = ($index + 1) . "扶養者_氏";
        }
        foreach ($this->input('de-last_name_kana', []) as $index => $value) {
            $Attributes["de-last_name_kana.{$index}"] = ($index + 1) . "扶養者_氏（カナ）";
        }
        foreach ($this->input('de-first_name', []) as $index => $value) {
            $Attributes["de-first_name.{$index}"] = ($index + 1) . "扶養者_名";
        }
        foreach ($this->input('de-first_name_kana', []) as $index => $value) {
            $Attributes["de-first_name_kana.{$index}"] = ($index + 1) . "扶養者_名（カナ）";
        }
        foreach ($this->input('de-sex', []) as $index => $value) {
            $Attributes["de-sex.{$index}"] = ($index + 1) . "扶養者_性別";
        }
        foreach ($this->input('de-relationship_spouse', []) as $index => $value) {
            $Attributes["de-relationship_spouse.{$index}"] = ($index + 1) . "扶養者_続柄（配偶者）";
        }
        foreach ($this->input('de-relationship_dependent', []) as $index => $value) {
            $Attributes["de-relationship_dependent.{$index}"] = ($index + 1) . "扶養者_続柄（扶養者）";
        }
        foreach ($this->input('de-spouse_flag', []) as $index => $value) {
            $Attributes["de-spouse_flag.{$index}"] = ($index + 1) . "扶養者_配偶者フラグ";
        }
        foreach ($this->input('de-age', []) as $index => $value) {
            $Attributes["de-age.{$index}"] = ($index + 1) . "扶養者_年齢";
        }
        foreach ($this->input('de-contact', []) as $index => $value) {
            $Attributes["de-contact.{$index}"] = ($index + 1) . "扶養者_連絡先";
        }
        foreach ($this->input('de-occupation', []) as $index => $value) {
            $Attributes["de-occupation.{$index}"] = ($index + 1) . "扶養者_職業";
        }
        foreach ($this->input('de-annual_income', []) as $index => $value) {
            $Attributes["de-annual_income.{$index}"] = ($index + 1) . "扶養者_収入（年収）";
        }
        foreach ($this->input('de-mynumber_card_no', []) as $index => $value) {
            $Attributes["de-mynumber_card_no.{$index}"] = ($index + 1) . "扶養者_マイナンバーカード番号";
        }
        foreach ($this->input('de-pension_no', []) as $index => $value) {
            $Attributes["de-pension_no.{$index}"] = ($index + 1) . "扶養者_基礎年金番号";
        }
        foreach ($this->input('de-dependent_type', []) as $index => $value) {
            $Attributes["de-dependent_type.{$index}"] = ($index + 1) . "扶養者_扶養区分";
        }
        foreach ($this->input('de-other_1', []) as $index => $value) {
            $Attributes["de-other_1.{$index}"] = ($index + 1) . "扶養者_その他①";
        }
        foreach ($this->input('de-other_2', []) as $index => $value) {
            $Attributes["de-other_2.{$index}"] = ($index + 1) . "扶養者_その他②";
        }

        return $Attributes;
    }
}
