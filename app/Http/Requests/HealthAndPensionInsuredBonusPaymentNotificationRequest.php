<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthAndPensionInsuredBonusPaymentNotificationRequest extends BaseRequest
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

        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AKS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'AKS');
        }
        if (isset($data['labor_consultant_submission_agent_name'])) {
            $data['labor_consultant_submission_agent_name'] = mb_convert_kana($data['labor_consultant_submission_agent_name'], 'AKS');
        }
        if (isset($data['insured_fullname_kana'])) {
            $data['insured_fullname_kana'] = mb_convert_kana($data['insured_fullname_kana'], 'KS');
        }
        if (isset($data['insured_fullname'])) {
            $data['insured_fullname'] = mb_convert_kana($data['insured_fullname'], 'AKS');
        }

        $this->merge($data);

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "over_70_check" => 'nullable|string|in:on',
            "mynumber_no_or_pension_no" => 'nullable|string|regex:/^[0-9]{1,12}+$/',
            "basic_pension_number" => 'nullable|string|regex:/^[0-9]{1,10}+$/',
            "file_wage_ledger" => 'required_if:radio_file_wage_ledger,2|file|mimes:csv,jpg,pdf|max:50000',
            "file_other" => 'nullable|required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'nullable|required_if:radio_file_other,2,1|string|max:255',
            "title_health_insurance" => 'nullable|int|in:1',
            "title_pension_insurance" => 'nullable|int|in:1',
            "today_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "today_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "today_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_prefecture" => 'string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_cities" => 'string|regex:/^[0-9]{1,2}+$/',
            "pension_office_reference_no_office" => 'string|regex:/\A[ァ-ヴー0-9A-Z]{1,4}+\z/u',
            "csv_pension_office_no" => 'required|string|regex:/^[0-9]{5}+$/',
            "branch_post_code_parent" => 'string|regex:/^[0-9]{3}+$/',
            "branch_post_code_child" => 'string|regex:/^[0-9]{4}+$/',
            "branch_address" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            "branch_name" => 'string|max:40',
            "employer_company_managerial_position_name" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "branch_tel_area_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_city_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "branch_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}+$/',
            "labor_consultant_submission_agent_name" => 'nullable|string|max:255',
            "employment_insured_no" => 'nullable|int|regex:/^[0-9]{1,6}+$/',
            "insured_fullname_kana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "insured_fullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "employee_birthday_era" => 'int|in:1,3,5,7,9',
            "employee_birthday_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "employee_birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "employee_birthday_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_era" => 'int|in:7,9',
            "bonus_payment_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_date_date" => 'int|between:1,31|regex:/^[0-9]{1,2}+$/',
            "bonus_payment_currency" => 'int|between:0,9999999|regex:/^[0-9]{1,7}+$/',
            "bonus_payment_goods" => 'int|between:0,9999999|regex:/^[0-9]{1,7}+$/',
            "bonus_payment_sum" => 'int|between:0,9999|regex:/^[0-9]{1,4}+$/',
            "remarks_over_70_insured" => 'nullable|int|in:1',
            "remarks_more_than_twice_work" => 'nullable|int|in:1',
            "remarks_bonus_sum_in_months" => 'nullable|int|in:1',
            "remarks_first_payment_date" => 'required_if:remarks_bonus_sum_in_months,1|nullable|int|between:1,31|regex:/^[0-9]{1,2}+$/',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $today_japan_year = $data['today_year'] ?? "";
            if (isset($data['today_year']) && ctype_digit($data['today_year'])) {
                $today_year = 2018 + $data['today_year'];
            }
            $today_month = $data['today_month'] ?? "";
            $today_date = $data['today_date'] ?? "";
            $birthday_era = $data['employee_birthday_era'] ?? "";
            $birthday_japan_year = $data['employee_birthday_year'] ?? "";
            if (isset($data['employee_birthday_year']) && ctype_digit($data['employee_birthday_year'])) {
                if ($birthday_era === '1') {
                    $birthday_year = 1867 + $data['employee_birthday_year'];
                } elseif ($birthday_era === '3') {
                    $birthday_year = 1911 + $data['employee_birthday_year'];
                } elseif ($birthday_era === '5') {
                    $birthday_year = 1925 + $data['employee_birthday_year'];
                } elseif ($birthday_era === '7') {
                    $birthday_year = 1988 + $data['employee_birthday_year'];
                } elseif ($birthday_era === '9') {
                    $birthday_year = 2018 + $data['employee_birthday_year'];
                }
            }
            $birthday_month = $data['employee_birthday_month'] ?? "";
            $birthday_date = $data['employee_birthday_date'] ?? "";
            $bonus_payment_date_era = $data['bonus_payment_date_era'] ?? "";
            $bonus_payment_date_japan_year = $data['bonus_payment_date_year'] ?? "";
            if (isset($data['bonus_payment_date_year']) && ctype_digit($data['bonus_payment_date_year'])) {
                if ($bonus_payment_date_era === '7') {
                    $bonus_payment_date_year = 1988 + $data['bonus_payment_date_year'];
                } elseif ($bonus_payment_date_era === '9') {
                    $bonus_payment_date_year = 2018 + $data['bonus_payment_date_year'];
                }
            }
            $bonus_payment_date_month = $data['bonus_payment_date_month'] ?? "";
            $bonus_payment_date_date = $data['bonus_payment_date_date'] ?? "";

            if (!empty($today_month) && !empty($today_date) && !empty($today_year)) {
                if (ctype_digit($today_month) && ctype_digit($today_date)) {
                    if (!checkdate($today_month, $today_date, $today_year)) {
                        $validator->errors()->add('today_date', '提出年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($today_japan_year == 1 && ($today_month < 5)) {
                $validator->errors()->add('today_month', '提出年月日は正しい日付を入力してください。');
            }

            if (!empty($birthday_month) && !empty($birthday_date) && !empty($birthday_year)) {
                if (ctype_digit($birthday_month) && ctype_digit($birthday_date)) {
                    if (!checkdate($birthday_month, $birthday_date, $birthday_year)) {
                        $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($birthday_era === '1') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 9 || ($birthday_month == 9 && $birthday_date < 8))) ||
                    ($birthday_japan_year == 45 && ($birthday_month > 7 || ($birthday_month == 7 && $birthday_date > 30))) ||
                    ($birthday_japan_year > 45)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '3') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 7 || ($birthday_month == 7 && $birthday_date < 30))) ||
                    ($birthday_japan_year == 15 && ($birthday_month == 12 && $birthday_date > 25)) ||
                    ($birthday_japan_year > 15)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '5') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 12 || ($birthday_month == 12 && $birthday_date < 25))) ||
                    ($birthday_japan_year == 64 && ($birthday_month > 1 || ($birthday_month == 1 && $birthday_date > 7))) ||
                    ($birthday_japan_year > 64)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '7') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 1 || ($birthday_month == 1 && $birthday_date < 8))) ||
                    ($birthday_japan_year == 31 && ($birthday_month > 4 || ($birthday_month == 4 && $birthday_date > 30))) ||
                    ($birthday_japan_year > 31)
                ) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '9') {
                if ($birthday_japan_year == 1 && ($birthday_month < 5 || ($birthday_month == 5 && $birthday_date < 1))) {
                    $validator->errors()->add('birthday_date', '生年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($bonus_payment_date_month) && !empty($bonus_payment_date_date) && !empty($bonus_payment_date_year)) {
                if (ctype_digit($bonus_payment_date_month) && ctype_digit($bonus_payment_date_date)) {
                    if (!checkdate($bonus_payment_date_month, $bonus_payment_date_date, $bonus_payment_date_year)) {
                        $validator->errors()->add('bonus_payment_date_date', '賞与支払年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($bonus_payment_date_era === '7') {
                if (
                    ($bonus_payment_date_japan_year == 1 && ($bonus_payment_date_month < 1 || ($bonus_payment_date_month == 1 && $bonus_payment_date_date < 8))) ||
                    ($bonus_payment_date_japan_year == 31 && ($bonus_payment_date_month > 4 || ($bonus_payment_date_month == 4 && $bonus_payment_date_date > 30))) ||
                    ($bonus_payment_date_japan_year > 31)
                ) {
                    $validator->errors()->add('bonus_payment_date_date', '賞与支払年月日は正しい日付を入力してください。');
                }
            } elseif ($bonus_payment_date_era === '9') {
                if ($bonus_payment_date_japan_year == 1 && $bonus_payment_date_month < 5) {
                    $validator->errors()->add('bonus_payment_date_date', '賞与支払年月日は正しい日付を入力してください。');
                }
            }
        });
        $validator->sometimes(['mynumber_no_or_pension_no', 'basic_pension_number'], 'required_without_all:mynumber_no_or_pension_no,basic_pension_number', function ($input) {
            return $input->over_70_check === 'on';
        });
    }

    public function messages()
    {
        return [
            'mynumber_no_or_pension_no.required_without_all' => '',
            'basic_pension_number.required_without_all' => '個人番号または基礎年金番号のいずれかを入力してください。',
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "file_wage_ledger" => '健康保険　標準賞与額累計申出書',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'today_year' => '提出日_年',
            'today_month' => '提出日_月',
            'today_date' => '提出日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_群市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'csv_pension_office_no' => '事業所番号',
            'branch_post_code_parent' => '事業所郵便番号3桁',
            'branch_post_code_child' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'employer_company_managerial_position_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_submission_agent_name' => '提出代行者名記載欄',
            'employment_insured_no' => '被保険者整理番号',
            'insured_fullname_kana' => '被保険者氏名（フリガナ）',
            'insured_fullname' => '被保険者氏名',
            'employee_birthday_era' => '生年月日_年号',
            'employee_birthday_year' => '生年月日_年',
            'employee_birthday_month' => '生年月日_月',
            'employee_birthday_date' => '生年月日_日',
            'bonus_payment_date_era' => '賞与支払年月日_年号',
            'bonus_payment_date_year' => '賞与支払年月日_年',
            'bonus_payment_date_month' => '賞与支払年月日_月',
            'bonus_payment_date_date' => '賞与支払年月日_日',
            'bonus_payment_currency' => '賞与支払額_通貨',
            'bonus_payment_goods' => '賞与支払額_現物',
            'bonus_payment_sum' => '賞与支払額_合計',
            'mynumber_no_or_pension_no' => '個人番号',
            'basic_pension_number' => '基礎年金番号',
            'remarks_over_70_insured' => '備考_70歳以上被用者',
            'remarks_more_than_twice_work' => '備考_二以上勤務',
            'remarks_bonus_sum_in_months' => '備考_同一月内の賞与合計',
            'remarks_first_payment_date' => '備考_同一月内の賞与合計_初回支払日',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
