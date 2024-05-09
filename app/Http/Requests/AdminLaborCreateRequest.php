<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLaborCreateRequest extends FormRequest
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
            'last_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+$/u',
            'last_name_kana' => 'required|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'last_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+$/u',
            'first_name_kana' => 'required|string|max:255|regex:/\A[ァ-ヴー!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'first_name_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+\z/u',
            'employee_no' => 'required',
            'employee_type' => 'required',
            'company_id' => 'required|integer',
            'branch_id' => 'required|integer',
            'tel_area_code' => 'required',
            'tel_city_code' => 'required',
            'tel_subscriber_code' => 'required',
            'mail_address2' => 'nullable|email',
            'user_email' => 'required|email',
            'user_pass' => 'required',
        ];
    }
}
