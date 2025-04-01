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
            $data['office_reference_symbol_office_symbol'] = mb_convert_kana($data['office_reference_symbol_office_symbol'], 'KS');
            $data['office_reference_symbol_office_symbol'] = str_replace(['-', '‐', '―'], '－', $data['office_reference_symbol_office_symbol']);
        }

        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AKS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }

        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'AKS');
            $data['branch_name'] = str_replace(['-', '‐', '―'], '－', $data['branch_name']);
        }

        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'AKS');
            $data['employer_company_managerial_position_name'] = str_replace(['-', '‐', '―'], '－', $data['employer_company_managerial_position_name']);
        }

        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'AKS');
            $data['labor_consultant_name'] = str_replace(['-', '‐', '―'], '－', $data['labor_consultant_name']);
        }

        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'KS');
            $data['fullname_kana'] = str_replace(['-', '‐', '―'], '－', $data['fullname_kana']);
        }

        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'AKS');
            $data['fullname'] = str_replace(['-', '‐', '―'], '－', $data['fullname']);
        }

        if (isset($data['remarks'])) {
            $data['remarks'] = mb_convert_kana($data['remarks'], 'AKS');
            $data['remarks'] = str_replace(['-', '‐', '―'], '－', $data['remarks']);
        }

        if (isset($data['input_file_other'])) {
            $data['input_file_other'] = mb_convert_kana($data['input_file_other'], 'AKS');
            $data['input_file_other'] = str_replace(['-', '‐', '―'], '－', $data['input_file_other']);
        }

        $this->merge($data);
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
            "branch_address" => ['required','string','max:37',new FullwidthAndMiscellaneousChars(true)],
            "branch_name" => 'required|string|max:25',
            "employer_company_managerial_position_name" => 'required|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            "branch_tel_area_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => ['nullable','string','max:40',new FullwidthAndMiscellaneousChars(true)],
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
            "remarks" => ['nullable','string','max:117',new FullwidthAndMiscellaneousChars(true)],
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
            "file_other" => 'nullable|required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => ['nullable','required_if:radio_file_other,2,1','string','max:255',new FullwidthAndMiscellaneousChars(false)],
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();

            function change_seireki($era,$wareki) {
				if ($era == '1') {
					$seireki = $wareki + 1867;
					return $seireki;
                } elseif ($era == '3') {
					$seireki = $wareki + 1911;
					return $seireki;
                } elseif ($era == '5' && $wareki < 65) {
					$seireki = $wareki + 1925;
					return $seireki;
                } elseif ($era == '7' && $wareki < 32) {
					$seireki = $wareki + 1988;
					return $seireki;
                } elseif ($era == '9') {
					$seireki = $wareki + 2018;
					return $seireki;
				} else {
                    return false;
                }
			}

            function check_today($era, $wareki, $month, $day) {
                $seireki = change_seireki($era, $wareki);
                if($seireki) {
                    $timevalue = $seireki.'-'.$month.'-'.$day;
                    if (strtotime($timevalue) <= strtotime('now')) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }

            function check_wareki($era, $wareki, $month, $day) {
                if ($era = 1) {
                    if ($wareki = 1) {
                        if ($month < 9 || ($month = 9 || $day < 8)) {
                            return false;
                        } else {
                            return true;
                        }
                    } elseif ($wareki < 45) {
                        return true;
                    } elseif ($wareki = 45) {
                        if (($month = 7 && $day = 31) || $month > 7) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return false;
                    }
                } elseif ($era = 3) {
                    if ($wareki = 1) {
                        if ($month < 7 || ($month = 7 && $day < 30)) {
                            return false;
                        } else {
                            return true;
                        }
                    } elseif ($wareki < 15) {
                        return true;
                    } elseif ($wareki = 15) {
                        if ($month = 12 && $day > 25) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return false;
                    }
				} elseif ($era = 5) {
                    if ($wareki = 1) {
                        if ($month = 12 && $day >= 25) {
                            return true;
                        } else {
                            return false;
                        }
                    } elseif ($wareki < 64) {
                        return true;
                    } elseif ($wareki = 64) {
                        if ($month = 1 && $day <= 7) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } if ($era = 7) {
                    if ($wareki = 1) {
                        if ($month = 1 && $day < 8) {
                            return false;
                        } else {
                            return true;
                        }
                    } elseif ($wareki < 31) {
                        return true;
                    } elseif ($wareki = 31) {
                        if ($month <= 4) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } if ($era = 9) {
                    if ($wareki = 1) {
                        if ($month < 5) {
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }

            if (is_null($data['mynumber_card_no']) && is_null($data['basic_pension_number'])) {
                $validator->errors()->add('mynumber_card_no', '個人番号と基礎年金番号は、どちらかを必ず記載してください。');
            }

            if ($data['submission_year'] && $data['submission_month'] && $data['submission_day']) {
                if (!checkdate($data['submission_month'], $data['submission_day'], change_seireki('9',$data['submission_year']))) {
                    $validator->errors()->add('submission_year', '提出年月日に、存在しない日付が入力されています。');
                }
            }

            if ($data['year_of_birth_era'] && $data['year_of_birth'] && $data['month_of_birth'] && $data['date_of_birth']) {
                if (!checkdate($data['month_of_birth'], $data['date_of_birth'], change_seireki($data['year_of_birth_era'],$data['year_of_birth']))) {
                    $validator->errors()->add('year_of_birth', '7：被保険者生年月日に、存在しない日付が入力されています。');
                }
            }

            if ($data['due_date_year'] && $data['due_date_month'] && $data['due_date_day']) {
                if (!checkdate($data['due_date_month'], $data['due_date_day'], change_seireki('9',$data['due_date_year']))) {
                    $validator->errors()->add('due_date_year', '8：出産予定日に、存在しない日付が入力されています。');
                }
            }

            if ($data['maternity_leave_start_date_year'] && $data['maternity_leave_start_date_month'] && $data['maternity_leave_start_date_day']) {
                if (!checkdate($data['maternity_leave_start_date_month'], $data['maternity_leave_start_date_day'], change_seireki('9',$data['maternity_leave_start_date_year']))) {
                    $validator->errors()->add('maternity_leave_start_date_year', '10：産前産後休業開始年月日に、存在しない日付が入力されています。');
                }
            }

            if ($data['maternity_leave_end_date_year'] && $data['maternity_leave_end_date_month'] && $data['maternity_leave_end_date_day']) {
                if (!checkdate($data['maternity_leave_end_date_month'], $data['maternity_leave_end_date_day'], change_seireki('9',$data['maternity_leave_end_date_year']))) {
                    $validator->errors()->add('maternity_leave_end_date_year', '11：産前産後休業終了予定年月日に、存在しない日付が入力されています。');
                }
            }

            if ($data['date_of_birth_year'] && $data['date_of_birth_month'] && $data['date_of_birth_day']) {
                if (!checkdate($data['date_of_birth_month'], $data['date_of_birth_day'], change_seireki('9',$data['date_of_birth_year']))) {
                    $validator->errors()->add('date_of_birth_year', '12：出産年月日に、存在しない日付が入力されています。');
                }
            } elseif ($data['date_of_birth_year'] || $data['date_of_birth_month'] || $data['date_of_birth_day']) {
                $validator->errors()->add('date_of_birth_year', '12：出産年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($data['change_due_date_year'] && $data['change_due_date_month'] && $data['change_due_date_day']) {
                if (!checkdate($data['change_due_date_month'], $data['change_due_date_day'], change_seireki('9',$data['change_due_date_year']))) {
                    $validator->errors()->add('change_due_date_year', '14：変更後の出産（予定）年月日に、存在しない日付が入力されています。');
                }
            } elseif ($data['change_due_date_year'] || $data['change_due_date_month'] || $data['change_due_date_day']) {
                $validator->errors()->add('change_due_date_year', '14：変更後の出産（予定）年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($data['change_maternity_leave_start_date_year'] && $data['change_maternity_leave_start_date_month'] && $data['change_maternity_leave_start_date_day']) {
                if (!checkdate($data['change_maternity_leave_start_date_month'], $data['change_maternity_leave_start_date_day'], change_seireki('9',$data['change_maternity_leave_start_date_year']))) {
                    $validator->errors()->add('change_maternity_leave_start_date_year', '16：変更後の産前産後休業開始年月日に、存在しない日付が入力されています。');
                }
            } elseif ($data['change_maternity_leave_start_date_year'] || $data['change_maternity_leave_start_date_month'] || $data['change_maternity_leave_start_date_day']) {
                $validator->errors()->add('change_maternity_leave_start_date_year', '16：変更後の産前産後休業開始年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($data['change_maternity_leave_end_date_year'] && $data['change_maternity_leave_end_date_month'] && $data['change_maternity_leave_end_date_day']) {
                if (!checkdate($data['change_maternity_leave_end_date_month'], $data['change_maternity_leave_end_date_day'], change_seireki('9',$data['change_maternity_leave_end_date_year']))) {
                    $validator->errors()->add('change_maternity_leave_end_date_year', '17：変更後の産前産後休業終了予定年月日に、存在しない日付が入力されています。');
                }
            } elseif ($data['change_maternity_leave_end_date_year'] || $data['change_maternity_leave_end_date_month'] || $data['change_maternity_leave_end_date_day']) {
                $validator->errors()->add('change_maternity_leave_end_date_year', '17：変更後の産前産後休業終了予定年月日を記載する場合は、年月日の項目を全て入力してください。');
            }

            if ($data['early_maternity_leave_end_date_year'] && $data['early_maternity_leave_end_date_month'] && $data['early_maternity_leave_end_date_day']) {
                if (!checkdate($data['early_maternity_leave_end_date_month'], $data['early_maternity_leave_end_date_day'], change_seireki('9',$data['early_maternity_leave_end_date_year']))) {
                    $validator->errors()->add('early_maternity_leave_end_date_year', '18：産前産後休業終了年月日に、存在しない日付が入力されています。');
                }
            } elseif ($data['early_maternity_leave_end_date_year'] || $data['early_maternity_leave_end_date_month'] || $data['early_maternity_leave_end_date_day']) {
                $validator->errors()->add('early_maternity_leave_end_date_year', '18：産前産後休業終了年月日を記載する場合は、年月日の項目を全て入力してください。');
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
            'business_establishment_code_prefecture_code' => '1：事業所整理記号（都道府県コード）',
            'office_arrangement_code_county_city_ward_code' => '1：事業所整理記号（郡市区記号）',
            'office_reference_symbol_office_symbol' => '1：事業所整理記号（事業所記号）',
            'csv_pension_office_no' => '事業所番号',
            'post_code_former' => '2：郵便番号（前３桁）',
            'post_code_latter' => '2：郵便番号（後４桁）',
            'branch_address' => '2：事業所所在地',
            'branch_name' => '2：事業所名称',
            'employer_company_managerial_position_name' => '2：事業主氏名',
            'branch_tel_area_code' => '2：電話番号（市外局番）',
            'branch_tel_city_code' => '2：電話番号（市内局番）',
            'branch_tel_subscriber_code' => '2：電話番号（加入者番号）',
            'labor_consultant_name' => '3：社会保険労務士記載欄',
            'insured_person_reference_number' => '4：被保険者整理番号',
            'mynumber_card_no' => '5：個人番号',
            'basic_pension_number' => '5：基礎年金番号',
            'fullname_kana' => '6：被保険者氏名（フリガナ）',
            'fullname' => '6：被保険者氏名',
            'year_of_birth_era' => '7：被保険者生年月日（元号）',
            'year_of_birth' => '7：被保険者生年月日（年）',
            'month_of_birth' => '7：被保険者生年月日（月）',
            'date_of_birth' => '7：被保険者生年月日（日）',
            'due_date_year' => '8：出産予定日（年）',
            'due_date_month' => '8：出産予定日（月）',
            'due_date_day' => '8：出産予定日（日）',
            'birth_type' => '9：出産種別',
            'maternity_leave_start_date_year' => '10：産前産後休業開始年月日（年）',
            'maternity_leave_start_date_month' => '10：産前産後休業開始年月日（月）',
            'maternity_leave_start_date_day' => '10：産前産後休業開始年月日（日）',
            'maternity_leave_end_date_year' => '11：産前産後休業終了予定年月日（年）',
            'maternity_leave_end_date_month' => '11：産前産後休業終了予定年月日（月）',
            'maternity_leave_end_date_day' => '11：産前産後休業終了予定年月日（日）',
            'date_of_birth_year' => '12：出産年月日（年）',
            'date_of_birth_month' => '12：出産年月日（月）',
            'date_of_birth_day' => '12：出産年月日（日）',
            'remarks' => '備考',
            'change_due_date_year' => '14：変更後の出産（予定）年月日（年）',
            'change_due_date_month' => '14：変更後の出産（予定）年月日（月）',
            'change_due_date_day' => '14：変更後の出産（予定）年月日（日）',
            'change_birth_type' => '15：変更後の出産種別',
            'change_maternity_leave_start_date_year' => '16：変更後の産前産後休業開始年月日（年）',
            'change_maternity_leave_start_date_month' => '16：変更後の産前産後休業開始年月日（月）',
            'change_maternity_leave_start_date_day' => '16：変更後の産前産後休業開始年月日（日）',
            'change_maternity_leave_end_date_year' => '17：変更後の産前産後休業終了予定年月日（年）',
            'change_maternity_leave_end_date_month' => '17：変更後の産前産後休業終了予定年月日（月）',
            'change_maternity_leave_end_date_day' => '17：変更後の産前産後休業終了予定年月日（日）',
            'early_maternity_leave_end_date_year' => '18：産前産後休業終了年月日（年）',
            'early_maternity_leave_end_date_month' => '18：産前産後休業終了年月日（月）',
            'early_maternity_leave_end_date_day' => '18：産前産後休業終了年月日（日）',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（年金事務所）'
        ];
    }
}
