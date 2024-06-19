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
            $data['name_abbreviation'] = mb_convert_kana($data['name_abbreviation'], 'as');
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
            'name' => 'string|max:255',
            'name_kana' => 'string|max:255|regex:/^[ァ-ヴー＆’，‐．・]+$/u',
            'name_en' => 'nullable|string|max:255|regex:/^[!-~]+$/',
            'name_abbreviation' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9., ]+$/',
            'company_no' => 'string|max:20|regex:/^[a-zA-Z0-9]+$/',
            'company_type_id' => 'integer',
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

    public function attributes()
    {
        return [
            'name' => '会社名',
            'name_kana' => '会社名（カナ）',
            'name_en' => '会社名（英語表記）',
            'name_abbreviation' => '会社名（略称表記）',
            'company_no' => '法人番号',
            'company_type_id' => '法人格',
            'license_no' => '許認可番号',
            'business_type' => '企業区分',
            'listed_type' => '上場区分',
            'stock_code' => '証券コード',
            'capital' => '資本金',
            'annual_sales' => '年間売上高（連結）',
            'employee_sum' => '従業員数',
            'qualification' => '保有資格',
            'authorized_shares' => '発行可能株式総数',
            'issued_shares' => '発行済株式総数',
            'supplier_company' => '仕入先名称',
            'outsourcing_company' => '外注先名称',
            'sales_company' => '販売先名称',
            'url' => 'ホームページアドレス',
            'purpose' => '事業目的',
            'procedure_hidden_flg' => '行政手続非表示フラグ',
            'company_division' => '会社区分',
        ];
    }
}
