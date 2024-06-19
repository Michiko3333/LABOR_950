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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            "certificate_checkbox_1" => 'nullable|string|in:提出',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function attributes()
    {
        return [
            'certificate_checkbox_1' => '2枚目_提出チェックボックス',
        ];
    }
}
