<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EmployeeContractRequest extends BaseRequest
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


    public function attributes()
    {
        return [
            'era' => '契約年',
            'month' => '契約月',
            'day' => '契約日',
            'title' => '契約書のタイトル',
            'company_address' => '事業所所在地',
            'company_name' => '事業所名',
            'company_representative' => '使用者氏名',
            'employment_period' => '雇用期間',
            'work_place' => '勤務場所',
            'employer_type' => '労働者種別',
            'probation_period' => '試用期間',
            'probation_period_detail' => '試用事項',
            'duties' => '業務内容',
            'duties_detail' => '業務内容の詳細事項',
            'start_end_and_break_time' => '始業・終業　休憩の時間',
            'holiday' => '休日',
            'overtime_work' => '時間外勤務の有無',
            'vacation' => '休暇',
            'wages' => '賃金',
            'renewal' => '更新の有無',
            'matters_of_retirement' => '退職に関する事項',
            'matters_of_retirement_and_premature_termination' => '退職および契約の中途解消に関する事項',
            'other_contract_matters' => 'その他の契約事項',
            'other_contract_matters_and_convenant' => 'その他の契約事項および誓約事項',
        ];
    }
}
