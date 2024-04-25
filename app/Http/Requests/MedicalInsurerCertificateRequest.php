<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalInsurerCertificateRequest extends FormRequest
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
        if (isset($data['medical_insurer_name'])) {
            $data['medical_insurer_name'] = mb_convert_kana($data['medical_insurer_name'], 'AS');
            $data['medical_insurer_name'] = str_replace(['-', '－', '―'], '‐', $data['medical_insurer_name']);
        }
        if (isset($data['medical_insurer_address'])) {
            $data['medical_insurer_address'] = mb_convert_kana($data['medical_insurer_address'], 'AS');
            $data['medical_insurer_address'] = str_replace(['-', '－', '―'], '‐', $data['medical_insurer_address']);
        }
        if (isset($data['medical_insurer_representative'])) {
            $data['medical_insurer_representative'] = mb_convert_kana($data['medical_insurer_representative'], 'S');
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
            "certificate_checkbox_2" => 'nullable|string|in:提出',
            "spouse_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "spouse_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "spouse_birthday_era_kanji" => 'nullable|string|in:明治,大正,昭和,平成,令和',
            "spouse_birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "spouse_birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "birthday_era_kanji" => 'nullable|string|in:明治,大正,昭和,平成,令和',
            "birthday_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "birthday_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "birthday_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "certification_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "certification_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "certification_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "medical_insurer_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "medical_insurer_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "medical_insurer_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            "medical_insurer_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "medical_insurer_representative" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "medical_insurer_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "medical_insurer_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "medical_insurer_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "submission_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "submission_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "submission_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
}
