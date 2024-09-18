<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class HealthInsurancePensionInsuredQualificationRequest extends BaseRequest
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

        if (isset($data['name'])) {
            $data['name'] = mb_convert_kana($data['name'], 'S');
        }
        if (isset($data['name_kana'])) {
            $data['name_kana'] = mb_convert_kana($data['name_kana'], 'S');
        }
        if (isset($data['entrepreneur_name'])) {
            $data['entrepreneur_name'] = mb_convert_kana($data['entrepreneur_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
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
            "file_insurance" => 'required_unless:radio_file_insurance,1|file|mimes:jpg,pdf|max:50000',
            "radio_file_other" => 'nullable|string|in:2',
            "file_dependent" => 'required_unless:radio_file_dependent,1|file|mimes:jpg,pdf|max:50000',
            "file_remote_dependent" => 'required_if:radio_file_load,2|file|mimes:jpg,pdf|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'health_insurance' => 'nullable|int|in:1',
            'pension' => 'nullable|int|in:1',
            'submission_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'submission_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'submission_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'pension_office_reference_prefecture' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_cities' => 'string|regex:/^[0-9]{2}$/u',
            'pension_office_reference_no_office' => 'string|max:4|regex:/\A[ァ-ヴーa-zA-Z0-9　]+\z/u',
            'insurance_office_no' => 'string|regex:/^[0-9]{5}$/u',
            'post_code_former' => 'string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'string|regex:/^[0-9]{4}$/u',
            'branch_address' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            'branch_name' => ['required', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
            'entrepreneur_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'branch_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'insured_reference_number' => 'nullable|string|regex:/^[0-9]{1,6}$/u',
            'name_kana' =>  'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            'name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'birthday_era' => 'string|in:5,7,9',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' =>  'nullable|string|max:12|regex:/^[0-9]{10,12}$/u',
            'loss_era' => 'nullable|string|in:平成,令和|required_with:loss_year,loss_month,loss_day',
            'loss_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:loss_era,loss_month,loss_day',
            'loss_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:loss_year,loss_era,loss_day',
            'loss_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:loss_year,loss_month,loss_era',
            'retirement_date_era' => 'nullable|string|in:平成,令和|required_with:retirement_date_year,retirement_date_month,retirement_date_day',
            'retirement_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:retirement_date_era,retirement_date_month,retirement_date_day',
            'retirement_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:retirement_date_year,retirement_date_era,retirement_date_day',
            'retirement_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:retirement_date_year,retirement_date_month,retirement_date_era',
            'passed_away_date_era' => 'nullable|string|in:平成,令和|required_with:passed_away_date_year,passed_away_date_month,passed_away_date_day',
            'passed_away_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:passed_away_date_era,passed_away_date_month,passed_away_date_day',
            'passed_away_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:passed_away_date_year,passed_away_date_era,passed_away_date_day',
            'passed_away_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:passed_away_date_year,passed_away_date_month,passed_away_date_era',
            'remarks_other_details' => 'nullable|string|max:255',
            'insurance_card_attached' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insurance_card_irrepayable' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'over_70_non_applicable_date_era' => 'nullable|string|in:7,9|required_with:over_70_non_applicable_date_year,over_70_non_applicable_date_month,over_70_non_applicable_date_day',
            'over_70_non_applicable_date_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:over_70_non_applicable_date_era,over_70_non_applicable_date_month,over_70_non_applicable_date_day',
            'over_70_non_applicable_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:over_70_non_applicable_date_year,over_70_non_applicable_date_era,over_70_non_applicable_date_day',
            'over_70_non_applicable_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:over_70_non_applicable_date_year,over_70_non_applicable_date_month,over_70_non_applicable_date_era',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $submission_japan_year = $data['submission_year'] ?? "";
            if (isset($data['submission_year']) && ctype_digit($data['submission_year'])) {
                $submission_year = 2018 + $data['submission_year'];
            }
            $submission_month = $data['submission_month'] ?? "";
            $submission_day = $data['submission_day'] ?? "";
            $birthday_era = $data['birthday_era'] ?? "";
            $birthday_japan_year = $data['birthday_year'] ?? "";
            if (isset($data['birthday_year']) && ctype_digit($data['birthday_year'])) {
                if ($birthday_era === '5') {
                    $birthday_year = 1925 + $data['birthday_year'];
                } elseif ($birthday_era === '7') {
                    $birthday_year = 1988 + $data['birthday_year'];
                } elseif ($birthday_era === '9') {
                    $birthday_year = 2018 + $data['birthday_year'];
                }
            }
            $birthday_month = $data['birthday_month'] ?? "";
            $birthday_day = $data['birthday_day'] ?? "";
            $loss_era = $data['loss_era'] ?? "";
            $loss_japan_year = $data['loss_year'] ?? "";
            if (isset($data['loss_year']) && ctype_digit($data['loss_year'])) {
                if ($loss_era === '平成') {
                    $loss_year = 1988 + $data['loss_year'];
                } elseif ($loss_era === '令和') {
                    $loss_year = 2018 + $data['loss_year'];
                }
            }
            $loss_month = $data['loss_month'] ?? "";
            $loss_day = $data['loss_day'] ?? "";
            $retirement_date_era = $data['retirement_date_era'] ?? "";
            $retirement_date_japan_year = $data['retirement_date_year'] ?? "";
            if (isset($data['retirement_date_year']) && ctype_digit($data['retirement_date_year'])) {
                if ($retirement_date_era === '平成') {
                    $retirement_date_year = 1988 + $data['retirement_date_year'];
                } elseif ($retirement_date_era === '令和') {
                    $retirement_date_year = 2018 + $data['retirement_date_year'];
                }
            }
            $retirement_date_month = $data['retirement_date_month'] ?? "";
            $retirement_date_day = $data['retirement_date_day'] ?? "";
            $passed_away_date_era = $data['passed_away_date_era'] ?? "";
            $passed_away_date_japan_year = $data['passed_away_date_year'] ?? "";
            if (isset($data['passed_away_date_year']) && ctype_digit($data['passed_away_date_year'])) {
                if ($passed_away_date_era === '平成') {
                    $passed_away_date_year = 1988 + $data['passed_away_date_year'];
                } elseif ($passed_away_date_era === '令和') {
                    $passed_away_date_year = 2018 + $data['passed_away_date_year'];
                }
            }
            $passed_away_date_month = $data['passed_away_date_month'] ?? "";
            $passed_away_date_day = $data['passed_away_date_day'] ?? "";
            $over_70_non_applicable_date_era = $data['over_70_non_applicable_date_era'] ?? "";
            $over_70_non_applicable_date_japan_year = $data['over_70_non_applicable_date_year'] ?? "";
            if (isset($data['over_70_non_applicable_date_year']) && ctype_digit($data['over_70_non_applicable_date_year'])) {
                if ($over_70_non_applicable_date_era === '7') {
                    $over_70_non_applicable_date_year = 1988 + $data['over_70_non_applicable_date_year'];
                } elseif ($over_70_non_applicable_date_era === '9') {
                    $over_70_non_applicable_date_year = 2018 + $data['over_70_non_applicable_date_year'];
                }
            }
            $over_70_non_applicable_date_month = $data['over_70_non_applicable_date_month'] ?? "";
            $over_70_non_applicable_date_day = $data['over_70_non_applicable_date_day'] ?? "";

            if (!empty($submission_month) && !empty($submission_day) && !empty($submission_year)) {
                if (ctype_digit($submission_month) && ctype_digit($submission_day)) {
                    if (!checkdate($submission_month, $submission_day, $submission_year)) {
                        $validator->errors()->add('submission_day', '提出年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($submission_japan_year == 1 && ($submission_month < 5)) {
                $validator->errors()->add('submission_day', '提出年月日は正しい日付を入力してください。');
            }

            if (!empty($birthday_month) && !empty($birthday_day) && !empty($birthday_year)) {
                if (ctype_digit($birthday_month) && ctype_digit($birthday_day)) {
                    if (!checkdate($birthday_month, $birthday_day, $birthday_year)) {
                        $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($birthday_era === '5') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 12 || ($birthday_month == 12 && $birthday_day < 25))) ||
                    ($birthday_japan_year == 64 && ($birthday_month > 1 || ($birthday_month == 1 && $birthday_day > 7))) ||
                    ($birthday_japan_year > 64)
                ) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '7') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 1 || ($birthday_month == 1 && $birthday_day < 8))) ||
                    ($birthday_japan_year == 31 && ($birthday_month > 4 || ($birthday_month == 4 && $birthday_day > 30))) ||
                    ($birthday_japan_year > 31)
                ) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '9') {
                if ($birthday_japan_year == 1 && ($birthday_month < 5 || ($birthday_month == 5 && $birthday_day < 1))) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($loss_month) && !empty($loss_day) && !empty($loss_year)) {
                if (ctype_digit($loss_month) && ctype_digit($loss_day)) {
                    if (!checkdate($loss_month, $loss_day, $loss_year)) {
                        $validator->errors()->add('loss_day', '喪失年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($loss_era === '平成') {
                if (
                    ($loss_japan_year == 1 && ($loss_month < 1 || ($loss_month == 1 && $loss_day < 8))) ||
                    ($loss_japan_year == 31 && ($loss_month > 4 || ($loss_month == 4 && $loss_day > 30))) ||
                    ($loss_japan_year > 31)
                ) {
                    $validator->errors()->add('loss_day', '喪失年月日は正しい日付を入力してください。');
                }
            } elseif ($loss_era === '令和') {
                if ($loss_japan_year == 1 && $loss_month < 5) {
                    $validator->errors()->add('loss_day', '喪失年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($retirement_date_month) && !empty($retirement_date_day) && !empty($retirement_date_year)) {
                if (ctype_digit($retirement_date_month) && ctype_digit($retirement_date_day)) {
                    if (!checkdate($retirement_date_month, $retirement_date_day, $retirement_date_year)) {
                        $validator->errors()->add('retirement_date_day', '喪失原因_退職等年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($retirement_date_era === '平成') {
                if (
                    ($retirement_date_japan_year == 1 && ($retirement_date_month < 1 || ($retirement_date_month == 1 && $retirement_date_day < 8))) ||
                    ($retirement_date_japan_year == 31 && ($retirement_date_month > 4 || ($retirement_date_month == 4 && $retirement_date_day > 30))) ||
                    ($retirement_date_japan_year > 31)
                ) {
                    $validator->errors()->add('retirement_date_day', '喪失原因_退職等年月日は正しい日付を入力してください。');
                }
            } elseif ($retirement_date_era === '令和') {
                if ($retirement_date_japan_year == 1 && $retirement_date_month < 5) {
                    $validator->errors()->add('retirement_date_day', '喪失原因_退職等年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($passed_away_date_month) && !empty($passed_away_date_day) && !empty($passed_away_date_year)) {
                if (ctype_digit($passed_away_date_month) && ctype_digit($passed_away_date_day)) {
                    if (!checkdate($passed_away_date_month, $passed_away_date_day, $passed_away_date_year)) {
                        $validator->errors()->add('passed_away_date_day', '喪失原因_死亡年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($passed_away_date_era === '平成') {
                if (
                    ($passed_away_date_japan_year == 1 && ($passed_away_date_month < 1 || ($passed_away_date_month == 1 && $passed_away_date_day < 8))) ||
                    ($passed_away_date_japan_year == 31 && ($passed_away_date_month > 4 || ($passed_away_date_month == 4 && $passed_away_date_day > 30))) ||
                    ($passed_away_date_japan_year > 31)
                ) {
                    $validator->errors()->add('passed_away_date_day', '喪失原因_死亡年月日は正しい日付を入力してください。');
                }
            } elseif ($passed_away_date_era === '令和') {
                if ($passed_away_date_japan_year == 1 && $passed_away_date_month < 5) {
                    $validator->errors()->add('passed_away_date_day', '喪失原因_死亡年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($over_70_non_applicable_date_month) && !empty($over_70_non_applicable_date_day) && !empty($over_70_non_applicable_date_year)) {
                if (ctype_digit($over_70_non_applicable_date_month) && ctype_digit($over_70_non_applicable_date_day)) {
                    if (!checkdate($over_70_non_applicable_date_month, $over_70_non_applicable_date_day, $over_70_non_applicable_date_year)) {
                        $validator->errors()->add('over_70_non_applicable_date_day', '70歳不該当年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($over_70_non_applicable_date_era === '7') {
                if (
                    ($over_70_non_applicable_date_japan_year == 1 && ($over_70_non_applicable_date_month < 1 || ($over_70_non_applicable_date_month == 1 && $over_70_non_applicable_date_day < 8))) ||
                    ($over_70_non_applicable_date_japan_year == 31 && ($over_70_non_applicable_date_month > 4 || ($over_70_non_applicable_date_month == 4 && $over_70_non_applicable_date_day > 30))) ||
                    ($over_70_non_applicable_date_japan_year > 31)
                ) {
                    $validator->errors()->add('over_70_non_applicable_date_day', '70歳不該当年月日は正しい日付を入力してください。');
                }
            } elseif ($over_70_non_applicable_date_era === '9') {
                if ($over_70_non_applicable_date_japan_year == 1 && $over_70_non_applicable_date_month < 5) {
                    $validator->errors()->add('over_70_non_applicable_date_day', '70歳不該当年月日は正しい日付を入力してください。');
                }
            }

            if ($this->hasFile('file_insurance')) {
                $totalSize += $this->file('file_insurance')->getSize();
            }
            if ($this->hasFile('file_dependent')) {
                $totalSize += $this->file('file_dependent')->getSize();
            }
            if ($this->hasFile('file_remote_dependent')) {
                $totalSize += $this->file('file_remote_dependent')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            "radio_file_other" => '当該帳票では添付ファイルに別送を選択することはできません。',
            'loss_era.required_with' => '喪失年月日_年号を入力してください。',
            'loss_year.required_with' => '喪失年月日_年を入力してください。',
            'loss_month.required_with' => '喪失年月日_月を入力してください。',
            'loss_day.required_with' => '喪失年月日_日を入力してください。',
            'retirement_date_era.required_with' => '喪失原因_退職等年月日_年号を入力してください。',
            'retirement_date_year.required_with' => '喪失原因_退職等年月日_年を入力してください。',
            'retirement_date_month.required_with' => '喪失原因_退職等年月日_月を入力してください。',
            'retirement_date_day.required_with' => '喪失原因_退職等年月日_日を入力してください。',
            'passed_away_date_era.required_with' => '喪失原因_死亡等年月日_年号を入力してください。',
            'passed_away_date_year.required_with' => '喪失原因_死亡等年月日_年を入力してください。',
            'passed_away_date_month.required_with' => '喪失原因_死亡等年月日_月を入力してください。',
            'passed_away_date_day.required_with' => '喪失原因_死亡等年月日_日を入力してください。',
            'over_70_non_applicable_date_era.required_with' => '70歳不該当年月日_年号を入力してください。',
            'over_70_non_applicable_date_year.required_with' => '70歳不該当年月日_年を入力してください。',
            'over_70_non_applicable_date_month.required_with' => '70歳不該当年月日_月を入力してください。',
            'over_70_non_applicable_date_day.required_with' => '70歳不該当年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            "file_insurance" => '添付ファイル_被保険者証',
            "file_dependent" => '添付ファイル_被扶養者証',
            "file_remote_dependent" => '添付ファイル_遠隔地被扶養者証',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'health_insurance' => '健康保険_最上部チェックボックス',
            'pension' => '厚生年金保険_最上部チェックボックス',
            'submission_year' => '提出日_年',
            'submission_month' => '提出日_月',
            'submission_day' => '提出日_日',
            'pension_office_reference_prefecture' => '事業所整理記号_都道府県コード',
            'pension_office_reference_no_cities' => '事業所整理記号_群市区符号',
            'pension_office_reference_no_office' => '事業所整理記号_事業所記号',
            'insurance_office_no' => '事業所番号',
            'post_code_former' => '事業所郵便番号3桁',
            'post_code_latter' => '事業所郵便番号4桁',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'entrepreneur_name' => '事業主氏名',
            'branch_tel_area_code' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'labor_consultant_name' => '提出代行者名記載欄',
            'insured_reference_number' => '被保険者整理番号',
            'name_kana' => '被保険者氏名（フリガナ）',
            'name' => '被保険者氏名',
            'birthday_era' => '生年月日_年号',
            'birthday_year' => '生年月日_年',
            'birthday_month' => '生年月日_月',
            'birthday_day' => '生年月日_日',
            'mynumber_card_no' => '個人番号（または基礎年金番号）',
            'loss_era' => '喪失年月日_年号',
            'loss_year' => '喪失年月日_年',
            'loss_month' => '喪失年月日_月',
            'loss_day' => '喪失年月日_日',
            'retirement_date_era' => '喪失原因_退職等年月日_年号',
            'retirement_date_year' => '喪失原因_退職等年月日_年',
            'retirement_date_month' => '喪失原因_退職等年月日_月',
            'retirement_date_day' => '喪失原因_退職等年月日_日',
            'passed_away_date_era' => '喪失原因_死亡年月日_年号',
            'passed_away_date_year' => '喪失原因_死亡年月日_年',
            'passed_away_date_month' => '喪失原因_死亡等年月日_月',
            'passed_away_date_day' => '喪失原因_死亡等年月日_日',
            'remarks_other_details' => '備考_その他入力欄',
            'insurance_card_attached' => '備考_保険証回収_添付',
            'insurance_card_irrepayable' => '備考_保険証回収_返不能',
            'over_70_non_applicable_date_era' => '70歳不該当年月日_年号',
            'over_70_non_applicable_date_year' => '70歳不該当年月日_年',
            'over_70_non_applicable_date_month' => '70歳不該当年月日_月',
            'over_70_non_applicable_date_day' => '70歳不該当年月日_日',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
