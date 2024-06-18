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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            "certificate_checkbox_2" => 'nullable|string|in:提出',
            "certification_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:certification_month,certification_day',
            "certification_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:certification_year,certification_day',
            "certification_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:certification_month,certification_year',
            "medical_insurer_post_code_former" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "medical_insurer_post_code_latter" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "medical_insurer_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ－　]+\z/u',
            "medical_insurer_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "medical_insurer_representative" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "medical_insurer_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "medical_insurer_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "medical_insurer_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            if(!empty($data['certification_month']) && !empty($data['certification_day'])){
                if(ctype_digit($data['certification_month'])){
                    if (!checkdate($data['certification_month'], $data['certification_day'], '2000')) {
                    $validator->errors()->add('certification_day','3枚目_7_認定年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($data['certification_year'] == 1 && ($data['certification_month'] < 5 )) {
                $validator->errors()->add('certification_day', '3枚目_7_認定年月日は正しい日付を入力してください。');
            }
        });
    }

    public function messages()
    {
        return [
            'certification_year.required_with' => '3枚目_7_認定年月日_年を入力してください。',
            'certification_month.required_with' => '3枚目_7_認定年月日_月を入力してください。',
            'certification_day.required_with' => '3枚目_7_認定年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'certificate_checkbox_2' => '3枚目_提出チェックボックス',
            'certification_year' => '3枚目_7_認定年月日_年',
            'certification_month' => '3枚目_7_認定年月日_月',
            'certification_day' => '3枚目_7_認定年月日_日',
            'medical_insurer_post_code_former' => '3枚目_8_事業主等_郵便番号3桁',
            'medical_insurer_post_code_latter' => '3枚目_8_事業主等_郵便番号4桁',
            'medical_insurer_address' => '3枚目_8_事業主等_所在地（住所）',
            'medical_insurer_name' => '3枚目_8_事業主等_名称（氏名）',
            'medical_insurer_representative' => '3枚目_8_事業主等_事業主氏名（代表者氏名）',
            'medical_insurer_tel_area_code' => '3枚目_8_事業主等_電話番号_市外局番',
            'medical_insurer_tel_city_code' => '3枚目_8_事業主等_電話番号_市内局番',
            'medical_insurer_tel_subscriber_code' => '3枚目_8_事業主等_電話番号_加入者番号',
        ];
    }
}
