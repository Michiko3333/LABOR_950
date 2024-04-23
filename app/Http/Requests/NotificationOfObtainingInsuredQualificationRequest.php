<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationOfObtainingInsuredQualificationRequest extends FormRequest
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
            "file_retirement_date" => 'required_if:radio_file_retirement_date,2|file|mimes:jpg,pdf|max:50000',
            "file_employment_agreement" => 'required_if:radio_file_employment_agreement,2|file|mimes:jpg,pdf|max:50000',
            "file_continued_rehiring" => 'required_if:radio_file_continued_rehiring,2|file|mimes:jpg,pdf|max:50000',
            "file_loss_report" => 'required_if:radio_file_loss_report,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "health_insurance" => 'nullable|int|in:1',
            "welfare_pension_insurance" => 'nullable|int|in:1',
            "input_date_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "input_date_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "input_date_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_pension_office_reference_prefecture" => 'required|string|regex:/^[0-9]{2}$/u', 
            "employee_pension_office_reference_no_cities" => 'required|string|regex:/^[0-9]{2}$/u',
            "employee_pension_office_reference_no_office" => 'required|string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_insurance_office_no" => 'required|string|regex:/^[0-9]{5}$/u',
            "branch_post_code_first" => 'required|string|regex:/^[0-9]{3}$/u',
            "branch_post_code_last" => 'required|string|regex:/^[0-9]{4}$/u',
            "branch_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "branch_name" => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９　]+\z/u',
            "company_representative" => 'required|string|max:255',
            "branch_tel_area_code" => 'required|string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_city_code" => 'required|tring|regex:/^[0-9]{1,5}$/u',
            "branch_tel_subscriber_code" => 'required|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_acting_as_agent" => 'nullable|string|max:255',
            "employee_name_kana" =>  'required|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "employee_name" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            "employee_birthday_japan_era" => 'required|int|in:5,7,9',
            "employee_birthday_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insured_person_type" => 'nullable|int|in:1,2,3,5,6,7',
            "employee_insured_type" => 'nullable|int|in:1,3,4,0',
            "employee_mynumber_card_no" => 'nullable|string|regex:/^[0-9]{10,12}$/u',
            "employee_employment_insured_date_japan_era" => 'required|int|in:7,9',
            "employee_employment_insured_date_japan_era_year" => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_month" => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_day" => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_dependent_flg" => 'nullable|string|in:有,無',
            "monthly_remuneration_all" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_part" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_total" => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "note_over_70_years_old" => 'nullable|int|in:1',
            "note_multiple_office_workers" => 'nullable|int|in:1',
            "note_short_time_work" => 'nullable|int|in:1',
            "note_continued_reemployment_after_retirement" => 'nullable|int|in:1',
            "note_others" => 'nullable|int|in:1',
            "note_others_in" => 'nullable|string|max:255',
            "employee_post_code_first" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "employee_post_code_last" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "employee_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥０-９Ａ-Ｚ　]+\z/u',
            "acquisition_reason" => 'nullable|string|in:海外在住,短期在留,その他',
            "other_acquisition_reason" =>   'nullable|string|max:255',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_retirement_date')) {
                $totalSize += $this->file('file_retirement_date')->getSize();
            }
            if ($this->hasFile('file_employment_agreement')) {
                $totalSize += $this->file('file_employment_agreement')->getSize();
            }
            if ($this->hasFile('file_continued_rehiring')) {
                $totalSize += $this->file('file_continued_rehiring')->getSize();
            }
            if ($this->hasFile('file_loss_report')) {
                $totalSize += $this->file('file_loss_report')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }

    public function attributes()
    {
        return [
            'health_insurance' => '健康保険',
            'welfare_pension_insurance' => '厚生年金保険',
            'input_date_japan_era_year' => '提出年月日/年',
            'input_date_month' => '提出年月日/月',
            'input_date_day' => '提出年月日/日',
            'employee_pension_office_reference_prefecture' => '事業所整理記号/都道府県コード',
            'employee_pension_office_reference_no_cities' => '事業所整理記号/郡市区符号',
            'employee_pension_office_reference_no_office' => '事業所整理記号/事業所記号',
            'branch_insurance_office_no' => '事業所番号',
            'branch_post_code_first' => '事業所郵便番号3桁',
            'branch_post_code_last' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'company_representative' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号（市外局番）',
            'branch_tel_city_code' => '事業所電話番号（市内局番）',
            'branch_tel_subscriber_code' => '事業所電話番号（加入者番号',
            'labor_consultant_acting_as_agent' => '提出代行者名記載欄',
            'employee_name_kana' => '被保険者氏名（フリガナ）',
            'employee_name' => '被保険者氏名',
            'employee_birthday_japan_era' => '生年月日/年号',
            'employee_birthday_japan_era_year' => '生年月日/年',
            'employee_birthday_month' => '生年月日/月',
            'employee_birthday_day' => '生年月日/日',
            'insured_person_type' => '種別',
            'employee_insured_type' => '取得区分',
            'employee_mynumber_card_no' => '個人番号（または基礎年金番号）',
            'employee_employment_insured_date_japan_era' => '取得（該当）年月日/年号',
            'employee_employment_insured_date_japan_era_year' => '取得（該当）年月日/年',
            'employee_employment_insured_date_month' => '取得（該当）年月日/月',
            'employee_employment_insured_date_day' => '取得（該当）年月日/日',
            'employee_dependent_flg' => '被扶養者',
            'monthly_remuneration_all' => '報酬月額/通貨',
            'monthly_remuneration_part' => '報酬月額/現物',
            'monthly_remuneration_total' => '報酬月額/合計',
            'note_over_70_years_old' => '備考/70歳以上被用者該当',
            'note_multiple_office_workers' => '備考/二以上事業所勤務者の取得',
            'note_short_time_work' => '備考/短時間労働者の取得（特定適用事業所のみ）',
            'note_continued_reemployment_after_retirement' => '備考/退職後の継続再雇用者の取得',
            'note_others' => '備考/その他',
            'note_others_in' => '備考/その他/記入欄',
            'employee_post_code_first' => '被保険者住所欄/郵便番号3桁',
            'employee_post_code_last' => '被保険者住所欄/郵便番号4桁',
            'employee_address' => '被保険者住所欄/所在地',
            'acquisition_reason' => '理由',
            'other_acquisition_reason' => '理由/その他記入欄',
        ];
    }
}
