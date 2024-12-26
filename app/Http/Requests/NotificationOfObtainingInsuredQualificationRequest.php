<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class NotificationOfObtainingInsuredQualificationRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();

        if (isset($data['employee_name_kana'])) {
            $data['employee_name_kana'] = mb_convert_kana($data['employee_name_kana'], 'S');
        }
        if (isset($data['employee_name'])) {
            $data['employee_name'] = mb_convert_kana($data['employee_name'], 'S');
        }
        if (isset($data['new_name_kana'])) {
            $data['new_name_kana'] = mb_convert_kana($data['new_name_kana'], 'S');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '‐', '―'], '－', $data['employee_address']);
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "health_insurance" => 'string|in:健康保険',
            "welfare_pension_insurance" => 'string|in:厚生年金保険',
            "input_date_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "input_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "input_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_pension_office_reference_prefecture" => 'string|regex:/^[0-9]{2}$/u',
            "employee_pension_office_reference_no_cities" => 'string|regex:/^[0-9]{2}$/u',
            "employee_pension_office_reference_no_office" => 'string|max:4|regex:/\A[ァ-ヴー0-9A-Z]+\z/u',
            "branch_insurance_office_no" => 'string|regex:/^[0-9]{5}$/u',
            "branch_post_code_first" => 'string|regex:/^[0-9]{3}$/u',
            "branch_post_code_last" => 'string|regex:/^[0-9]{4}$/u',
            "branch_address" => ['nullable', 'string', 'max:50', new FullwidthAndMiscellaneousChars(true)],
            "branch_name" => ['required', 'string', 'max:34', new FullwidthAndMiscellaneousChars(true)],
            "company_representative" => ['required', 'string', 'max:25', new FullwidthAndMiscellaneousChars(true)],
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "branch_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_acting_as_agent" => 'nullable|string|max:255',
            "employee_name_kana" =>  'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            "employee_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "employee_birthday_japan_era" => 'int|in:5,7,9',
            "employee_birthday_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_birthday_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insured_person_type" => 'nullable|int|in:1,2,3,5,6,7',
            "employee_insured_type" => 'nullable|int|in:1,3,4,0',
            "employee_mynumber_card_no" => 'nullable|string|max:12|regex:/^[0-9]{10,12}$/u',
            "employee_employment_insured_date_japan_era" => 'int|in:7,9',
            "employee_employment_insured_date_japan_era_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "employee_employment_insured_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employee_dependent_flg" => 'nullable|string|in:有,無',
            "monthly_remuneration_all" => 'int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_part" => 'nullable|int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "monthly_remuneration_total" => 'int|between:0,9999999|regex:/^[0-9]{1,7}$/u',
            "note_over_70_years_old" => 'nullable|int|in:1',
            "note_multiple_office_workers" => 'nullable|int|in:1',
            "note_short_time_work" => 'nullable|int|in:1',
            "note_continued_reemployment_after_retirement" => 'nullable|int|in:1',
            "note_others" => 'nullable|int|in:1',
            "note_others_in" => 'nullable|string|max:255',
            "employee_post_code_first" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "employee_post_code_last" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "employee_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "acquisition_reason" => 'nullable|string|in:海外在住,短期在留,その他',
            "other_acquisition_reason" =>   'nullable|string|max:255',
            "eligibility_confirmation_letter" => 'nullable|int|in:1',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $input_date_japan_era_japan_year = $data['input_date_japan_era_year'] ?? "";
            if (isset($data['input_date_japan_era_year']) && ctype_digit($data['input_date_japan_era_year'])) {
                $input_date_japan_era_year = 2018 + $data['input_date_japan_era_year'];
            }
            $input_date_month = $data['input_date_month'] ?? "";
            $input_date_day = $data['input_date_day'] ?? "";
            $employee_birthday_japan_era = $data['employee_birthday_japan_era'] ?? "";
            $employee_birthday_japan_era_japan_year = $data['employee_birthday_japan_era_year'] ?? "";
            if (isset($data['employee_birthday_japan_era_year']) && ctype_digit($data['employee_birthday_japan_era_year'])) {
                if ($employee_birthday_japan_era === '5') {
                    $employee_birthday_japan_era_year = 1925 + $data['employee_birthday_japan_era_year'];
                } elseif ($employee_birthday_japan_era === '7') {
                    $employee_birthday_japan_era_year = 1988 + $data['employee_birthday_japan_era_year'];
                } elseif ($employee_birthday_japan_era === '9') {
                    $employee_birthday_japan_era_year = 2018 + $data['employee_birthday_japan_era_year'];
                }
            }
            $employee_birthday_month = $data['employee_birthday_month'] ?? "";
            $employee_birthday_day = $data['employee_birthday_day'] ?? "";
            $employee_employment_insured_date_japan_era = $data['employee_employment_insured_date_japan_era'] ?? "";
            $employee_employment_insured_date_japan_era_japan_year = $data['employee_employment_insured_date_japan_era_year'] ?? "";
            if (isset($data['employee_employment_insured_date_japan_era_year']) && ctype_digit($data['employee_employment_insured_date_japan_era_year'])) {
                if ($employee_employment_insured_date_japan_era === '7') {
                    $employee_employment_insured_date_japan_era_year = 1988 + $data['employee_employment_insured_date_japan_era_year'];
                } elseif ($employee_employment_insured_date_japan_era === '9') {
                    $employee_employment_insured_date_japan_era_year = 2018 + $data['employee_employment_insured_date_japan_era_year'];
                }
            }
            $employee_employment_insured_date_month = $data['employee_employment_insured_date_month'] ?? "";
            $employee_employment_insured_date_day = $data['employee_employment_insured_date_day'] ?? "";

            if (!empty($input_date_month) && !empty($input_date_day) && !empty($input_date_japan_era_year)) {
                if (ctype_digit($input_date_month) && ctype_digit($input_date_day)) {
                    if (!checkdate($input_date_month, $input_date_day, $input_date_japan_era_year)) {
                        $validator->errors()->add('input_date_day', '提出年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($input_date_japan_era_japan_year == 1 && ($input_date_month < 5)) {
                $validator->errors()->add('input_date_day', '提出年月日は正しい日付を入力してください。');
            }

            if (!empty($employee_birthday_month) && !empty($employee_birthday_day) && !empty($employee_birthday_japan_era_year)) {
                if (ctype_digit($employee_birthday_month) && ctype_digit($employee_birthday_day)) {
                    if (!checkdate($employee_birthday_month, $employee_birthday_day, $employee_birthday_japan_era_year)) {
                        $validator->errors()->add('employee_birthday_day', '生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($employee_birthday_japan_era === '5') {
                if (
                    ($employee_birthday_japan_era_japan_year == 1 && ($employee_birthday_month < 12 || ($employee_birthday_month == 12 && $employee_birthday_day < 25))) ||
                    ($employee_birthday_japan_era_japan_year == 64 && ($employee_birthday_month > 1 || ($employee_birthday_month == 1 && $employee_birthday_day > 7))) ||
                    ($employee_birthday_japan_era_japan_year > 64)
                ) {
                    $validator->errors()->add('employee_birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($employee_birthday_japan_era === '7') {
                if (
                    ($employee_birthday_japan_era_japan_year == 1 && ($employee_birthday_month < 1 || ($employee_birthday_month == 1 && $employee_birthday_day < 8))) ||
                    ($employee_birthday_japan_era_japan_year == 31 && ($employee_birthday_month > 4 || ($employee_birthday_month == 4 && $employee_birthday_day > 30))) ||
                    ($employee_birthday_japan_era_japan_year > 31)
                ) {
                    $validator->errors()->add('employee_birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($employee_birthday_japan_era === '9') {
                if ($employee_birthday_japan_era_japan_year == 1 && ($employee_birthday_month < 5 || ($employee_birthday_month == 5 && $employee_birthday_day < 1))) {
                    $validator->errors()->add('employee_birthday_day', '生年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($employee_employment_insured_date_month) && !empty($employee_employment_insured_date_day) && !empty($employee_employment_insured_date_japan_era_year)) {
                if (ctype_digit($employee_employment_insured_date_month) && ctype_digit($employee_employment_insured_date_day)) {
                    if (!checkdate($employee_employment_insured_date_month, $employee_employment_insured_date_day, $employee_employment_insured_date_japan_era_year)) {
                        $validator->errors()->add('employee_employment_insured_date_day', '取得（該当）年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($employee_employment_insured_date_japan_era === '7') {
                if (
                    ($employee_employment_insured_date_japan_era_japan_year == 1 && ($employee_employment_insured_date_month < 1 || ($employee_employment_insured_date_month == 1 && $employee_employment_insured_date_day < 8))) ||
                    ($employee_employment_insured_date_japan_era_japan_year == 31 && ($employee_employment_insured_date_month > 4 || ($employee_employment_insured_date_month == 4 && $employee_employment_insured_date_day > 30))) ||
                    ($employee_employment_insured_date_japan_era_japan_year > 31)
                ) {
                    $validator->errors()->add('employee_employment_insured_date_day', '取得（該当）年月日は正しい日付を入力してください。');
                }
            } elseif ($employee_employment_insured_date_japan_era === '9') {
                if ($employee_employment_insured_date_japan_era_japan_year == 1 && $employee_employment_insured_date_month < 5) {
                    $validator->errors()->add('employee_employment_insured_date_day', '取得（該当）年月日は正しい日付を入力してください。');
                }
            }
        });
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'health_insurance' => '健康保険',
            'welfare_pension_insurance' => '厚生年金保険',
            'input_date_japan_era_year' => '提出年月日_年',
            'input_date_month' => '提出年月日_月',
            'input_date_day' => '提出年月日_日',
            'employee_pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'employee_pension_office_reference_no_cities' => '事業所整理記号_郡市区符号',
            'employee_pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'branch_insurance_office_no' => '事業所番号',
            'branch_post_code_first' => '事業所郵便番号3桁',
            'branch_post_code_last' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'company_representative' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_acting_as_agent' => '提出代行者名記載欄',
            'employee_name_kana' => '被保険者氏名（フリガナ）',
            'employee_name' => '被保険者氏名',
            'employee_birthday_japan_era' => '生年月日_年号',
            'employee_birthday_japan_era_year' => '生年月日_年',
            'employee_birthday_month' => '生年月日_月',
            'employee_birthday_day' => '生年月日_日',
            'insured_person_type' => '種別',
            'employee_insured_type' => '取得区分',
            'employee_mynumber_card_no' => '個人番号（または基礎年金番号）',
            'employee_employment_insured_date_japan_era' => '取得（該当）年月日_年号',
            'employee_employment_insured_date_japan_era_year' => '取得（該当）年月日_年',
            'employee_employment_insured_date_month' => '取得（該当）年月日_月',
            'employee_employment_insured_date_day' => '取得（該当）年月日_日',
            'employee_dependent_flg' => '被扶養者',
            'monthly_remuneration_all' => '報酬月額_通貨',
            'monthly_remuneration_part' => '報酬月額_現物',
            'monthly_remuneration_total' => '報酬月額_合計',
            'note_over_70_years_old' => '備考_70歳以上被用者該当',
            'note_multiple_office_workers' => '備考_二以上事業所勤務者の取得',
            'note_short_time_work' => '備考_短時間労働者の取得（特定適用事業所のみ）',
            'note_continued_reemployment_after_retirement' => '備考_退職後の継続再雇用者の取得',
            'note_others' => '備考_その他',
            'note_others_in' => '備考_その他_記入欄',
            'employee_post_code_first' => '被保険者住所欄_郵便番号3桁',
            'employee_post_code_last' => '被保険者住所欄_郵便番号4桁',
            'employee_address' => '被保険者住所欄_所在地',
            'acquisition_reason' => '理由',
            'other_acquisition_reason' => '理由_その他記入欄',
            'eligibility_confirmation_letter' => '資格確認書発行要否',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
