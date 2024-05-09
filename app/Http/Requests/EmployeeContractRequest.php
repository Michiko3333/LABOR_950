<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EmployeeContractRequest extends FormRequest
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
            'contract_type' => 'required',
            'era' => 'required',
            'month' => 'required',
            'day' => 'required',
            'full_name' => 'required|string',
            'title' => 'required|string',
            'company_address' => 'required',
            'company_name' => 'required',
            'company_representative' => 'required',
            'employment_period' => 'nullable|string',
            'work_place' => 'nullable|string',
            'employer_type' => 'required|string',
            'probation_period' => 'required|string',
            'probation_period_detail' => 'required|string',
            'duties' => 'required|string',
            'duties_detail' => 'required|string',
            'start_end_and_break_time' => 'required|string',
            'holiday' => 'required|string',
            'overtime_work' => 'required|string',
            'vacation' => 'required|string',
            'wages' => 'required|string',
            'renewal' => 'nullable|string',
            'matters_of_retirement' => 'nullable|string',
            'matters_of_retirement_and_premature_termination' => 'nullable|string',
            'other_contract_matters' => 'nullable|string',
            'other_contract_matters_and_convenant' => 'nullable|string',
        ];
    }
}
