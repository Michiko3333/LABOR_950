<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthInsurancePensionInsuredQualificationRequest extends FormRequest
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
            "file_insurance" => 'required_unless:radio_file_insurance,1|file|mimes:jpg,pdf|max:50000',
            "file_dependent" => 'required_unless:radio_file_dependent,1|file|mimes:jpg,pdf|max:50000',
            "file_remote_dependent" => 'required_if:radio_file_load,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            'health_insurance' => 'nullable|in:1',
            'pension' => 'nullable|in:1',
            'submission_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'submission_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'submission_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'pension_office_reference_prefecture' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_cities' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_office' => 'string|max:4|regex:/\A[ァ-ヴーa-zA-Z0-9　]+\z/u',
            'insurance_office_no' => 'string|regex:/^[0-9]{5}$/u',
            'post_code_former' => 'string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'string|regex:/^[0-9]{4}$/u',
            'headquarters_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarters_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'entrepreneur_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarters_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_name' => 'nullable|string|max:255',
            'insured_reference_number' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'name_kana' =>  'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            'name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' =>  'nullable|string|regex:/^[0-9]{10,12}$/u',
            'loss_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'loss_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'loss_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'retirement_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'retirement_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'retirement_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'passed_away_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'remarks_other_details' => 'nullable|string|max:255',
            'insurance_card_attached' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insurance_card_irrepayable' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_insurance')) {
                $totalSize += $this->file('file_insurance')->getSize();
            }
            if ($this->hasFile('file_dependent')) {
                $totalSize += $this->file('file_dependent')->getSize();
            }
            if ($this->hasFile('file_remote_dependent')) {
                $totalSize += $this->file('file_remote_dependent')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }
}
