<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredTransferNotificationRequest extends FormRequest
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
            'employment_insured_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'birthday_era' => 'required|in:大正,昭和,平成,令和',
            'birthday_year' => 'required|numeric|between:1,99',
            'birthday_month' => 'required|numeric|between:1,12',
            'birthday_day' => 'required|numeric|between:1,31',
            'name_kanji' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'name_kana' => 'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_alphabet' => 'nullable|string|max:255|regex:/^[a-zA-Z\-]+[ ][a-zA-Z\-]+$/u',
            'employment_insured_date_era' => 'required|in:昭和,平成,令和',
            'employment_insured_date_year' => 'required|numeric|between:1,99',
            'employment_insured_date_month' => 'required|numeric|between:1,12',
            'employment_insured_date_date' => 'required|numeric|between:1,31',
            'employment_insurance_office_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'previous_employment_insurance_office_no_4' => 'required|string|regex:/^[0-9]{4}$/u',
            'previous_employment_insurance_office_no_6' => 'required|string|regex:/^[0-9]{6}$/u',
            'previous_employment_insurance_office_no_cd' => 'required|string|regex:/^[0-9]{1}$/u',
            'transfer_date_era' => 'required|in:平成,令和',
            'transfer_date_year' => 'required|numeric|between:1,99',
            'transfer_date_month' => 'required|numeric|between:1,12',
            'transfer_date_date' => 'required|numeric|between:1,31',
            'office_before_transfer' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'name_before_changed_kanji' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'name_before_changed_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'name_changed_date_era' => 'nullable|in:平成,令和', 
            'name_changed_date_year' => 'nullable|numeric|between:1,99',
            'name_changed_date_month' => 'nullable|numeric|between:1,12',
            'name_changed_date_date' => 'nullable|numeric|between:1,31',
            'remarks' => 'nullable|string|max:784|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarter_address' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarter_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'headquarter_tel_area_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'headquarter_tel_city_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'headquarter_tel_subscriber_code' => 'required|string|regex:/^[0-9]{5}$/u',
            'today_era' => 'required|in:平成,令和',
            'today_year' => 'required|numeric|between:1,99',
            'today_month' => 'required|numeric|between:1,12',
            'today_date' => 'required|numeric|between:1,31',
            'labor_consultant_today_era' => 'nullable|in:平成,令和',
            'labor_consultant_today_year' => 'nullable|numeric|between:1,99',
            'labor_consultant_today_month' => 'nullable|numeric|between:1,12',
            'labor_consultant_today_date' => 'nullable|numeric|between:1,31',
            'agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{5}$/u',
            'labor_consultant_note' => 'nullable|string|max:500',
            'hello_work' => 'required|string|max:250|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
        ];
    }
}
