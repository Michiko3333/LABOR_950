<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLaborUpdateRequest extends FormRequest
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
            'last_name' => 'required|max:20',
            'last_name_kana' => 'required|max:20',
            'last_name_alphabet' => 'nullable|max:20',
            'first_name' => 'required|max:20',
            'first_name_kana' => 'required|max:20',
            'first_name_alphabet' => 'nullable|max:20',
            'employee_no' => 'required',
            'employee_type' => 'required',
            'company_id' => 'required|integer',
            'branch_id' => 'required|integer',
            'tel_area_code' => 'required',
            'tel_city_code' => 'required',
            'tel_subscriber_code' => 'required',
            'mail_address2' => 'nullable|email'
        ];
    }
}
