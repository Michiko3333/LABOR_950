<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class MaternityLeaveApplicationOrChangeEndNoticeRequest extends BaseRequest
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

        if (isset($data['office_reference_symbol_office_symbol'])) {
            $data['office_reference_symbol_office_symbol'] = mb_convert_kana($data['office_reference_symbol_office_symbol'], 'S');
            $data['office_reference_symbol_office_symbol'] = str_replace(['-', '‐', '―'], '－', $data['office_reference_symbol_office_symbol']);
        }

        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'S');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }

        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'S');
            $data['branch_name'] = str_replace(['-', '‐', '―'], '－', $data['branch_name']);
        }

        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'S');
            $data['employer_company_managerial_position_name'] = str_replace(['-', '‐', '―'], '－', $data['employer_company_managerial_position_name']);
        }

        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
            $data['labor_consultant_name'] = str_replace(['-', '‐', '―'], '－', $data['labor_consultant_name']);
        }

        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'S');
            $data['fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['fullname_kana']);
        }

        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'S');
            $data['fullname'] = str_replace(['-', '‐', '―'], '－', $data['fullname']);
        }

        if (isset($data['remarks'])) {
            $data['remarks'] = mb_convert_kana($data['remarks'], 'S');
            $data['remarks'] = str_replace(['-', '‐', '―'], '－', $data['remarks']);
        }

        if (isset($data['input_file_other'])) {
            $data['input_file_other'] = mb_convert_kana($data['input_file_other'], 'S');
            $data['input_file_other'] = str_replace(['-', '‐', '―'], '－', $data['input_file_other']);
        }

        return $data;
    }

    public function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            "submission_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "submission_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "submission_day" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "business_establishment_code_prefecture_code" => 'required|string|digits:2|regex:/^[0-9]+$/',
            "office_arrangement_code_county_city_ward_code" => 'required|string|max_digits:4|regex:/^[0-9]+$/',
            "office_reference_symbol_office_symbol" => 'required|string|max:4|regex:/^[0-9０-９ァ-ヴー]+$/u',
            "csv_pension_office_no" => 'required|string|regex:/^[0-9]{1,5}+$/',
            "post_code_former" => 'required|string|regex:/^[0-9]{3}$/u',
            "post_code_latter" => 'required|string|regex:/^[0-9]{4}$/u',
            "branch_address" => 'required|string|max:37',
            "branch_name" => 'required|string|max:25',
            "employer_company_managerial_position_name" => 'required|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "branch_tel_area_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => 'nullable|string|max:40',
            "insured_person_reference_number" => 'nullable|string|max:6|regex:/^[0-9]+$/',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}+$/',
            "basic_pension_number" => 'nullable|string|regex:/^[0-9]{10}+$/',
            "fullname_kana" => 'required|string|max:25|regex:/^[ァ-ヴー　]+[　][ァ-ヴー　]+\z/u',
            "fullname" => 'nullable|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "year_of_birth_era" => 'required|int|digits:1|regex:/^[0-9]+$/',
            "year_of_birth" => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "month_of_birth" => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "date_of_birth" => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "due_date_year" => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "due_date_month" => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "due_date_day" => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "birth_type" => 'required|int|between:0,1|digits:1|regex:/^[0-9]+$/',
            "maternity_leave_start_date_year" => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "maternity_leave_start_date_month" => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "maternity_leave_start_date_day" => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "maternity_leave_end_date_year" => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "maternity_leave_end_date_month" => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "maternity_leave_end_date_day" => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "date_of_birth_year" => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "date_of_birth_month" => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "date_of_birth_day" => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "remarks" => 'nullable|string|max:117',
            "change_due_date_year" => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "change_due_date_month" => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "change_due_date_day" => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "change_birth_type" => 'nullable|int|between:0,1|digits:1|regex:/^[0-9]+$/',
            "change_maternity_leave_start_date_year" => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "change_maternity_leave_start_date_month" => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "change_maternity_leave_start_date_day" => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "change_maternity_leave_end_date_year" => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "change_maternity_leave_end_date_month" => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "change_maternity_leave_end_date_day" => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "early_maternity_leave_end_date_year" => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            "early_maternity_leave_end_date_month" => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            "early_maternity_leave_end_date_day" => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            if (is_null($data['mynumber_card_no']) && is_null($data['basic_pension_number'])) {
                $validator->errors()->add('mynumber_card_no', '個人番号と基礎年金番号は、どちらかを必ず記載してください。');
            }

            if (isset($data['date_of_birth_year']) || isset($data['date_of_birth_month']) || isset($data['date_of_birth_day'])) {
                if (is_null($data['date_of_birth_year'])) {
                    $validator->errors()->add('date_of_birth_year', '出産年月日を入力する場合、出産年を入力してください。');
                }
                if (is_null($data['date_of_birth_month'])) {
                    $validator->errors()->add('date_of_birth_year', '出産年月日を入力する場合、出産月を入力してください。');
                }
                if (is_null($data['date_of_birth_day'])) {
                    $validator->errors()->add('date_of_birth_year', '出産年月日を入力する場合、出産日を入力してください。');
                }
            }

            if (isset($data['change_due_date_year']) || isset($data['change_due_date_month']) || isset($data['change_due_date_day']) || isset($data['change_birth_type'])) {
                if (is_null($data['change_due_date_year'])) {
                    $validator->errors()->add('change_due_date_year', '変更後の出産予定年月日を入力する場合、変更後の出産予定年を入力してください。');
                }
                if (is_null($data['change_due_date_month'])) {
                    $validator->errors()->add('change_due_date_year', '変更後の出産予定年月日を入力する場合、変更後の出産予定月を入力してください。');
                }
                if (is_null($data['change_due_date_day'])) {
                    $validator->errors()->add('change_due_date_year', '変更後の出産予定年月日を入力する場合、変更後の出産予定日を入力してください。');
                }
                if (is_null($data['change_birth_type'])) {
                    $validator->errors()->add('change_birth_type', '変更後の出産予定年月日を入力する場合、変更後の出産種別を入力してください。');
                }
            }

            if (isset($data['change_maternity_leave_start_date_year']) || isset($data['change_maternity_leave_start_date_month']) || isset($data['change_maternity_leave_start_date_day'])) {
                if (is_null($data['change_maternity_leave_start_date_year'])) {
                    $validator->errors()->add('change_maternity_leave_start_date_year', '変更後の産前産後休業開始年月日を入力する場合、変更後の産前産後休業開始年を入力してください。');
                }
                if (is_null($data['change_maternity_leave_start_date_month'])) {
                    $validator->errors()->add('change_maternity_leave_start_date_year', '変更後の産前産後休業開始年月日を入力する場合、変更後の産前産後休業開始月を入力してください。');
                }
                if (is_null($data['change_maternity_leave_start_date_day'])) {
                    $validator->errors()->add('change_maternity_leave_start_date_year', '変更後の産前産後休業開始年月日を入力する場合、変更後の産前産後休業開始日を入力してください。');
                }
            }

            if (isset($data['change_maternity_leave_end_date_year']) || isset($data['change_maternity_leave_end_date_month']) || isset($data['change_maternity_leave_end_date_day'])) {
                if (is_null($data['change_maternity_leave_end_date_year'])) {
                    $validator->errors()->add('change_maternity_leave_end_date_year', '変更後の産前産後休業終了予定年月日を入力する場合、変更後の産前産後休業終了予定年を入力してください。');
                }
                if (is_null($data['change_maternity_leave_end_date_month'])) {
                    $validator->errors()->add('change_maternity_leave_end_date_year', '変更後の産前産後休業終了予定年月日を入力する場合、変更後の産前産後休業終了予定月を入力してください。');
                }
                if (is_null($data['change_maternity_leave_end_date_day'])) {
                    $validator->errors()->add('change_maternity_leave_end_date_year', '変更後の産前産後休業終了予定年月日を入力する場合、変更後の産前産後休業終了予定日を入力してください。');
                }
            }

            if (isset($data['early_maternity_leave_end_date_year']) || isset($data['early_maternity_leave_end_date_month']) || isset($data['early_maternity_leave_end_date_day'])) {
                if (is_null($data['early_maternity_leave_end_date_year'])) {
                    $validator->errors()->add('early_maternity_leave_end_date_year', '産前産後休業終了年月日を入力する場合、産前産後休業終了年を入力してください。');
                }
                if (is_null($data['early_maternity_leave_end_date_month'])) {
                    $validator->errors()->add('early_maternity_leave_end_date_year', '産前産後休業終了年月日を入力する場合、産前産後休業終了月を入力してください。');
                }
                if (is_null($data['early_maternity_leave_end_date_day'])) {
                    $validator->errors()->add('early_maternity_leave_end_date_year', '産前産後休業終了年月日を入力する場合、産前産後休業終了日を入力してください。');
                }
            }

            $totalSize = 0;
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
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。'
        ];
    }

    public function attributes()
    {
        return [
            'submission_year' => '提出年',
            'submission_month' => '提出月',
            'submission_day' => '提出日',
            'business_establishment_code_prefecture_code' => '事業所整理記号（都道府県コード）',
            'office_arrangement_code_county_city_ward_code' => '事業所整理記号（郡市区符号）',
            'office_reference_symbol_office_symbol' => '事業所整理記号（事業所記号）',
            'csv_pension_office_no' => '事業所番号',
            'post_code_former' => '郵便番号（前３桁）',
            'post_code_latter' => '郵便番号（後４桁）',
            'branch_address' => '事業所所在地',
            'branch_name' => '事業所名称',
            'employer_company_managerial_position_name' => '事業主氏名',
            'branch_tel_area_code' => '電話番号（市外局番）',
            'branch_tel_city_code' => '電話番号（市内局番）',
            'branch_tel_subscriber_code' => '電話番号（加入者番号）',
            'labor_consultant_name' => '社会保険労務士記載欄',
            'insured_person_reference_number' => '被保険者整理番号',
            'mynumber_card_no' => '個人番号',
            'basic_pension_number' => '基礎年金番号',
            'fullname_kana' => '被保険者氏名（フリガナ）',
            'fullname' => '被保険者氏名',
            'year_of_birth_era' => '被保険者生年月日（元号）',
            'year_of_birth' => '被保険者生年月日（年）',
            'month_of_birth' => '被保険者生年月日（月）',
            'date_of_birth' => '被保険者生年月日（日）',
            'due_date_year' => '出産予定日（年）',
            'due_date_month' => '出産予定日（月）',
            'due_date_day' => '出産予定日（日）',
            'birth_type' => '出産種別',
            'maternity_leave_start_date_year' => '産前産後休業開始年月日（年）',
            'maternity_leave_start_date_month' => '産前産後休業開始年月日（月）',
            'maternity_leave_start_date_day' => '産前産後休業開始年月日（日）',
            'maternity_leave_end_date_year' => '産前産後休業終了予定年月日（年）',
            'maternity_leave_end_date_month' => '産前産後休業終了予定年月日（月）',
            'maternity_leave_end_date_day' => '産前産後休業終了予定年月日（日）',
            'date_of_birth_year' => '出産年月日（年）',
            'date_of_birth_month' => '出産年月日（月）',
            'date_of_birth_day' => '出産年月日（日）',
            'remarks' => '備考',
            'change_due_date_year' => '変更後の出産（予定）年月日（年）',
            'change_due_date_month' => '変更後の出産（予定）年月日（月）',
            'change_due_date_day' => '変更後の出産（予定）年月日（日）',
            'change_birth_type' => '変更後の出産種別',
            'change_maternity_leave_start_date_year' => '変更後の産前産後休業開始年月日（年）',
            'change_maternity_leave_start_date_month' => '変更後の産前産後休業開始年月日（月）',
            'change_maternity_leave_start_date_day' => '変更後の産前産後休業開始年月日（日）',
            'change_maternity_leave_end_date_year' => '変更後の産前産後休業終了予定年月日（年）',
            'change_maternity_leave_end_date_month' => '変更後の産前産後休業終了予定年月日（月）',
            'change_maternity_leave_end_date_day' => '変更後の産前産後休業終了予定年月日（日）',
            'early_maternity_leave_end_date_year' => '産前産後休業終了年月日（年）',
            'early_maternity_leave_end_date_month' => '産前産後休業終了年月日（月）',
            'early_maternity_leave_end_date_day' => '産前産後休業終了年月日（日）',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（年金事務所）'
        ];
    }
}
