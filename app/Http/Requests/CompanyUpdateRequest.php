<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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

        if (isset($data['name_abbreviation'])) {
            $data['name_abbreviation'] = mb_convert_kana($data['name_abbreviation'], 'AS');
            $data['name_abbreviation'] = str_replace(['-', '－', '―'], '‐', $data['name_abbreviation']);
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
            'name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            'name_kana' => 'string|max:255|regex:/^[ァ-ヴー＆’，‐．・]+$/u',
            'name_en' => 'nullable|string|max:255|regex:/^[!-~]+$/',
            'name_abbreviation' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            'company_no' => 'string|max:20|regex:/^[a-zA-Z0-9]+$/',
            'company_type_id' => 'integer|between:1,17',
            'license_no' => 'nullable|string|max:255',
            'business_type' => 'integer|between:1,3',
            'listed_type' => 'nullable|integer|between:1,6',
            'stock_code' => 'nullable|string|max:20|regex:/^[a-zA-Z0-9]+$/',
            'capital' => 'nullable|integer',
            'annual_sales' => 'nullable|integer',
            'employee_sum' => 'nullable|integer',
            'qualification' => 'nullable|string',
            'authorized_shares' => 'nullable|integer',
            'issued_shares' => 'nullable|integer',
            'supplier_company' => 'nullable|string|max:255',
            'outsourcing_company' => 'nullable|string|max:255',
            'sales_company' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255|url',
            'purpose' => 'string|max:255',
            'company_division' => 'integer',
        ];
    }
}
