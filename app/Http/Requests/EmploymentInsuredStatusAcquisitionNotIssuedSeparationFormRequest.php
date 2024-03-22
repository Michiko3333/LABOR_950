<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormRequest extends FormRequest
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
            'labor_consultant_japan_era_year' => 'required|int|max:100',
            'labor_consultant_month' => 'required|int|max:12',
            'labor_consultant_day' => 'required|int|max:31'
        ];
    }
}
