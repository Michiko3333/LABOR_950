<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerCertificateEtcRequest extends FormRequest
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
        if (isset($data['company_name'])) {
            $data['company_name'] = mb_convert_kana($data['company_name'], 'AS');
            $data['company_name'] = str_replace(['-', '－', '―'], '‐', $data['company_name']);
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
            "certificate_checkbox_1" => 'nullable|string|in:提出',
            "spouse_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "spouse_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "spouse_birthday_era" => 'nullable|int|in:1,3,5,7,9',
            "spouse_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "birthday_era" => 'nullable|int|in:1,3,5,7,9',
            "birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "headquarters_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "headquarters_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "headquarters_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "company_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "headquarters_representative" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "headquarters_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "submission_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "submission_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "submission_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function attributes()
    {
        return [
            'certificate_checkbox_1' => '2枚目_提出チェックボックス',
            'spouse_mynumber_card_no' => '2枚目_1_配偶者の個人番号',
            'spouse_name' => '2枚目_2_配偶者の氏名',
            'spouse_birthday_era_kanji' => '2枚目_3_配偶者生年月日_年号',
            'spouse_birthday_year' => '2枚目_3_配偶者生年月日_年',
            'spouse_birthday_month' => '2枚目_3_配偶者生年月日_月',
            'spouse_birthday_day' => '2枚目_3_配偶者生年月日_日',
            'mynumber_card_no' => '2枚目_4_個人番号',
            'name' => '2枚目_5_被保険者氏名',
            'name_kana' => '2枚目_5_被保険者氏名（フリガナ）',
            'birthday_era_kanji' => '2枚目_6_被保険者の生年月日_年号',
            'birthday_year' => '2枚目_6_被保険者の生年月日_年',
            'birthday_month' => '2枚目_6_被保険者の生年月日_月',
            'birthday_day' => '2枚目_6_被保険者の生年月日_日',
            'headquarters_post_code_former' => '2枚目_7_事業主等_郵便番号3桁',
            'headquarters_post_code_latter' => '2枚目_7_事業主等_郵便番号4桁',
            'headquarters_address' => '2枚目_7_事業主等_所在地（住所）',
            'company_name' => '2枚目_7_事業主等_名称（氏名）',
            'headquarters_representative' => '2枚目_7_事業主等_事業主氏名（代表者氏名）',
            'headquarters_tel_area_code' => '2枚目_7_事業主等_電話番号_市外局番',
            'headquarters_tel_city_code' => '2枚目_7_事業主等_電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '2枚目_7_事業主等_電話番号_加入者番号',
            'labor_consultant_name' => '2枚目_8_提出代行者名記載欄',
            'submission_year' => '2枚目_提出年月日_年',
            'submission_month' => '2枚目_提出年月日_月',
            'submission_day' => '2枚目_提出年月日_日',
        ];
    }
}
