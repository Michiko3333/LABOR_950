<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminHolidaysRequest extends BaseRequest
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
            'select_year' => 'required|int|between:2025,9999',
            'holiday_name' => 'array',
            'holiday_name.*' => 'required|string',
            'holiday_date' => 'array',
            'holiday_date.*' => 'required',
        ];
    }

    public function attributes()
    {
        $Attributes = [
            'select_year' => '年',
            'holiday_name' => '祝日名称',
            'holiday_date' => '祝日年月日',
        ];

        foreach ($this->input('holiday_name', []) as $index => $value) {
            $Attributes["holiday_name.{$index}"] = ($index + 1) . "祝日名称";
        }
        foreach ($this->input('holiday_date', []) as $index => $value) {
            $Attributes["holiday_date.{$index}"] = ($index + 1) . "祝日年月日";
        }

        return $Attributes;
    }
}
