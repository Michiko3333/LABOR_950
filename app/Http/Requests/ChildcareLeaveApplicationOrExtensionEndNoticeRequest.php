<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;

class ChildcareLeaveApplicationOrExtensionEndNoticeRequest extends BaseRequest
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

        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'AKS');
        }
        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'KS');
        }
        if (isset($data['employer_company_managerial_position_name'])) {
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'], 'AKS');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'AKS');
        }
        if (isset($data['child_fullname'])) {
            $data['child_fullname'] = mb_convert_kana($data['child_fullname'], 'AKS');
        }
        if (isset($data['child_fullname_kana'])) {
            $data['child_fullname_kana'] = mb_convert_kana($data['child_fullname_kana'], 'KS');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AKS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
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
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return [
            'file_other' => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            'input_file_other' => 'required_if:checked_other,on|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string',
            'submission_year' => 'required|int|between:1,99|regex:/^[0-9]+$/',
            'submission_month' => 'required|int|between:1,12|regex:/^[0-9]+$/',
            'submission_day' => 'required|int|between:1,31|regex:/^[0-9]+$/',
            'business_establishment_code_prefecture_code' => 'required|string|digits:2|regex:/^[0-9]+$/',
            'office_arrangement_code_county_city_ward_code' => 'required|string|max_digits:2|regex:/^[0-9]+$/',
            'office_reference_symbol_office_symbol' => 'required|string|max:4|regex:/^[0-9A-Za-zァ-ヶー]+\z/u',
            'csv_pension_office_no' => 'required|string|regex:/^[0-9]{1,5}+$/',
            'post_code_former' => 'required|string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'required|string|regex:/^[0-9]{4}$/u',
            'branch_address' => 'required|string|max:50|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　－]+\z/u',
            'branch_office_name' => 'required|string|max:25',
            'employer_company_managerial_position_name' => 'required|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+\z/u',
            'branch_tel_area_code' => 'required|string|max:5|regex:/^[0-9]+$/',
            'branch_tel_city_code' => 'required|string|max:4|regex:/^[0-9]+$/',
            'branch_tel_subscriber_code' => 'required|string|max:5|regex:/^[0-9]+$/',
            'labor_consultant_name' => 'nullable|string|max:40',
            'insured_person_reference_number' => 'nullable|string|max:6|regex:/^[0-9]+$/',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}+$/',
            'basic_pension_number' => 'nullable|string|regex:/^[0-9]{10}+$/',
            'fullname_kana' => 'required|string|max:25|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'fullname' => 'required|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'year_of_birth_era' => 'required|int|in:5,7,9',
            'year_of_birth' => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            'month_of_birth' => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            'date_of_birth' => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            'sex' => 'required|int|in:1,2',
            'child_fullname_kana' => 'required|string|max:25|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'child_fullname' => 'nullable|string|max:12|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'child_year_of_birth_era' => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            'child_month_of_birth' => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            'child_date_of_birth' => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            'classification' => 'required|int|in:1,2',
            'child_raising_start_dete_year' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_if:classification,2',
            'child_raising_start_dete_month' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_if:classification,2',
            'child_raising_start_dete_day' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_if:classification,2',
            'childcare_start_date_japane_era_year' => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            'childcare_start_date_month' => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            'childcare_start_date_day' => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            'childcare_end_date_japane_era_year' => 'required|int|between:1,99|max_digits:2|regex:/^[0-9]+$/',
            'childcare_end_date_month' => 'required|int|between:1,12|max_digits:2|regex:/^[0-9]+$/',
            'childcare_end_date_day' => 'required|int|between:1,31|max_digits:2|regex:/^[0-9]+$/',
            'parental_leave_count' => 'nullable|int|between:14,30|max_digits:2|regex:/^[0-9]+$/',
            'workday_count' => 'nullable|int|between:0,16|max_digits:2|regex:/^[0-9]+$/',
            'papa_mama_plus_classification' => 'nullable|int|in:1',
            'note' => 'nullable|string|max:75',
            'childcare_extension_scheduled_end_date_japane_era_year' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_scheduled_end_date_month,childcare_extension_scheduled_end_date_day',
            'childcare_extension_scheduled_end_date_month' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_scheduled_end_date_japane_era_year,childcare_extension_scheduled_end_date_day',
            'childcare_extension_scheduled_end_date_day' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_scheduled_end_date_japane_era_year,childcare_extension_scheduled_end_date_month',
            'after_parental_leave_count_20' => 'nullable|int|between:14,30|max_digits:2',
            'childcare_extension_end_date_japane_era_year' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_end_date_month,childcare_extension_end_date_day',
            'childcare_extension_end_date_month' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_end_date_japane_era_year,childcare_extension_end_date_day',
            'childcare_extension_end_date_day' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_extension_end_date_japane_era_year,childcare_extension_end_date_month',
            'after_parental_leave_count_22' => 'nullable|int|between:1,30|max_digits:2',
            'childcare_start_date_japane_era_year1' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_month1,childcare_start_date_day1,childcare_end_date_japane_era_year1,childcare_end_date_month1,childcare_end_date_day1',
            'childcare_start_date_month1' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year1,childcare_start_date_day1,childcare_end_date_japane_era_year1,childcare_end_date_month1,childcare_end_date_day1',
            'childcare_start_date_day1' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year1,childcare_start_date_month1,childcare_end_date_japane_era_year1,childcare_end_date_month1,childcare_end_date_day1',
            'childcare_end_date_japane_era_year1' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_month1,childcare_end_date_day1,childcare_start_date_japane_era_year1,childcare_start_date_month1,childcare_start_date_day1',
            'childcare_end_date_month1' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year1,childcare_end_date_day1,childcare_start_date_japane_era_year1,childcare_start_date_month1,childcare_start_date_day1',
            'childcare_end_date_day1' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year1,childcare_end_date_month1,childcare_start_date_japane_era_year1,childcare_start_date_month1,childcare_start_date_day1',
            'parental_leave_count1' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
            'workday_count1' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
            'childcare_start_date_japane_era_year2' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_month2,childcare_start_date_day2,childcare_end_date_japane_era_year2,childcare_end_date_month2,childcare_end_date_day2',
            'childcare_start_date_month2' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year2,childcare_start_date_day2,childcare_end_date_japane_era_year2,childcare_end_date_month2,childcare_end_date_day2',
            'childcare_start_date_day2' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year2,childcare_start_date_month2,childcare_end_date_japane_era_year2,childcare_end_date_month2,childcare_end_date_day2',
            'childcare_end_date_japane_era_year2' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_month2,childcare_end_date_day2,childcare_start_date_japane_era_year2,childcare_start_date_month2,childcare_start_date_day2',
            'childcare_end_date_month2' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year2,childcare_end_date_day2,childcare_start_date_japane_era_year2,childcare_start_date_month2,childcare_start_date_day2',
            'childcare_end_date_day2' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year2,childcare_end_date_month2,childcare_start_date_japane_era_year2,childcare_start_date_month2,childcare_start_date_day2',
            'parental_leave_count2' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
            'workday_count2' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
            'childcare_start_date_japane_era_year3' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_month3,childcare_start_date_day3,childcare_end_date_japane_era_year3,childcare_end_date_month3,childcare_end_date_day3',
            'childcare_start_date_month3' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year3,childcare_start_date_day3,childcare_end_date_japane_era_year3,childcare_end_date_month3,childcare_end_date_day3',
            'childcare_start_date_day3' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year3,childcare_start_date_month3,childcare_end_date_japane_era_year3,childcare_end_date_month3,childcare_end_date_day3',
            'childcare_end_date_japane_era_year3' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_month3,childcare_end_date_day3,childcare_start_date_japane_era_year3,childcare_start_date_month3,childcare_start_date_day3',
            'childcare_end_date_month3' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year3,childcare_end_date_day3,childcare_start_date_japane_era_year3,childcare_start_date_month3,childcare_start_date_day3',
            'childcare_end_date_day3' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year3,childcare_end_date_month3,childcare_start_date_japane_era_year3,childcare_start_date_month3,childcare_start_date_day3',
            'parental_leave_count3' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
            'childcare_start_date_japane_era_year4' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_month4,childcare_start_date_day4,childcare_end_date_japane_era_year4,childcare_end_date_month4,childcare_end_date_day4',
            'childcare_start_date_month4' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year4,childcare_start_date_day4,childcare_end_date_japane_era_year4,childcare_end_date_month4,childcare_end_date_day4',
            'childcare_start_date_day4' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_start_date_japane_era_year4,childcare_start_date_month4,childcare_end_date_japane_era_year4,childcare_end_date_month4,childcare_end_date_day4',
            'childcare_end_date_japane_era_year4' => 'nullable|int|between:1,99|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_month4,childcare_end_date_day4,childcare_start_date_japane_era_year4,childcare_start_date_month4,childcare_start_date_day4',
            'childcare_end_date_month4' => 'nullable|int|between:1,12|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year4,childcare_end_date_day4,childcare_start_date_japane_era_year4,childcare_start_date_month4,childcare_start_date_day4',
            'childcare_end_date_day4' => 'nullable|int|between:1,31|max_digits:2|regex:/^[0-9]+$/|required_with:childcare_end_date_japane_era_year4,childcare_end_date_month4,childcare_start_date_japane_era_year4,childcare_start_date_month4,childcare_start_date_day4',
            'parental_leave_count4' => 'nullable|int|max_digits:2|regex:/^[0-9]+$/',
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $today_japan_year = $data['submission_year'] ?? "";
            if (isset($data['submission_year']) && ctype_digit($data['submission_year'])) {
                $today_year = 2018 + $data['submission_year'];
            }
            $today_month = $data['submission_month'] ?? "";
            $today_date = $data['submission_day'] ?? "";

            if (!empty($today_month) && !empty($today_date) && !empty($today_year)) {
                if (ctype_digit($today_month) && ctype_digit($today_date)) {
                    if (!checkdate($today_month, $today_date, $today_year)) {
                        $validator->errors()->add('today_date', '提出年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($today_japan_year == 1 && ($today_month < 5)) {
                $validator->errors()->add('today_date', '提出年月日は正しい日付を入力してください。');
            }

            if (is_null($data['mynumber_card_no']) && is_null($data['basic_pension_number'])) {
                $validator->errors()->add('mynumber_card_no', '個人番号と基礎年金番号は、どちらかを必ず記載してください。');
            }

            $birthday_era = $data['year_of_birth_era'] ?? "";
            $birthday_japan_year = $data['year_of_birth'] ?? "";
            $birthday_year = '';

            if (isset($data['year_of_birth']) && ctype_digit($data['year_of_birth'])) {
                if ($birthday_era === '5') {
                    $birthday_year = 1925 + $data['year_of_birth'];
                } elseif ($birthday_era === '7') {
                    $birthday_year = 1988 + $data['year_of_birth'];
                } elseif ($birthday_era === '9') {
                    $birthday_year = 2018 + $data['year_of_birth'];
                }
            }

            $birthday_month = $data['month_of_birth'] ?? "";
            $birthday_date = $data['date_of_birth'] ?? "";

            if (!empty($birthday_month) && !empty($birthday_date) && !empty($birthday_year)) {
                if (ctype_digit($birthday_month) && ctype_digit($birthday_date)) {
                    if (!checkdate($birthday_month, $birthday_date, $birthday_year)) {
                        $validator->errors()->add('birthday_date', '7_被保険者生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($birthday_era === '5') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 12 || ($birthday_month == 12 && $birthday_date < 25))) ||
                    ($birthday_japan_year == 64 && ($birthday_month > 1 || ($birthday_month == 1 && $birthday_date > 7))) ||
                    ($birthday_japan_year > 64)
                ) {
                    $validator->errors()->add('birthday_date', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '7') {
                if (
                    ($birthday_japan_year == 1 && ($birthday_month < 1 || ($birthday_month == 1 && $birthday_date < 8))) ||
                    ($birthday_japan_year == 31 && ($birthday_month > 4 || ($birthday_month == 4 && $birthday_date > 30))) ||
                    ($birthday_japan_year > 31)
                ) {
                    $validator->errors()->add('birthday_date', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '9') {
                if ($birthday_japan_year == 1 && ($birthday_month < 5 || ($birthday_month == 5 && $birthday_date < 1))) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($birthday_year) && !empty($birthday_month) && !empty($birthday_date)) {
                try {
                    $input_birthday = new \DateTime("{$birthday_year}-{$birthday_month}-{$birthday_date}");
                    $today = new \DateTime();
                    if ($input_birthday > $today) {
                        $validator->errors()->add('date_of_birth', '7_被保険者生年月日は今日以前の日付を入力してください。');
                    }
                } catch (Exception $e) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日で無効な日付が入力されました。');
                }
            }

            if ($data['child_year_of_birth_era'] == 1 && ($data['child_month_of_birth'] < 5 || ($data['child_month_of_birth'] == 5 && $data['child_date_of_birth'] < 1))) {
                $validator->errors()->add('birthday_date', '10_養育する子の生年月日は正しい日付を入力してください。');
            }
            $child_year_of_birth_era = 2018 + $data['child_year_of_birth_era'];
            $child_month_of_birth = $data['child_month_of_birth'] ?? "";
            $child_date_of_birth = $data['child_date_of_birth'] ?? "";
            if (!empty($child_year_of_birth_era) && !empty($child_month_of_birth) && !empty($child_date_of_birth)) {
                if (ctype_digit($child_month_of_birth) && ctype_digit($child_date_of_birth)) {
                    if (!checkdate($child_month_of_birth, $child_date_of_birth,$child_year_of_birth_era)) {
                        $validator->errors()->add('child_date_of_birth', '10_養育する子の生年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($data['childcare_start_date_japane_era_year'] == 1 && ($data['childcare_start_date_month'] < 5 || ($data['childcare_start_date_month'] == 5 && $data['childcare_start_date_day'] < 1))) {
                $validator->errors()->add('childcare_start_date_day', '13_育児休業等開始年月日は正しい日付を入力してください。');
            }
            $childcare_start_date_japane_era_year = 2018 + $data['childcare_start_date_japane_era_year'];
            $childcare_start_date_month = $data['childcare_start_date_month'] ?? "";
            $childcare_start_date_day = $data['childcare_start_date_day'] ?? "";
            if (ctype_digit($childcare_start_date_month) && ctype_digit($childcare_start_date_day)) {
                if (!checkdate($childcare_start_date_month, $childcare_start_date_day,$childcare_start_date_japane_era_year)) {
                    $validator->errors()->add('childcare_start_date_day', '13_育児休業等開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_end_date_japane_era_year']) && !empty($data['childcare_end_date_month']) && !empty($data['childcare_end_date_day'])){
                if ($data['childcare_end_date_japane_era_year'] == 1 && ($data['childcare_end_date_month'] < 5 || ($data['childcare_end_date_month'] == 5 && $data['childcare_end_date_day'] < 1))) {
                    $validator->errors()->add('childcare_end_date_day', '14_育児休業等終了(予定)年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] > $data['childcare_end_date_japane_era_year']) {
                    $validator->errors()->add('childcare_end_date_japane_era_year', '14_育児休業等終了(予定)年月日_年は、13_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_end_date_japane_era_year'] && $data['childcare_start_date_month'] > $data['childcare_end_date_month']) {
                    $validator->errors()->add('childcare_end_date_month', '14_育児休業等終了(予定)年月日_月は、13_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_end_date_japane_era_year'] && $data['childcare_start_date_month'] === $data['childcare_end_date_month'] && $data['childcare_start_date_day'] > $data['childcare_end_date_day']) {
                    $validator->errors()->add('childcare_end_date_day', '14_育児休業等終了(予定)年月日_日は、13_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_end_date_japane_era_year = 2018 + $data['childcare_end_date_japane_era_year'];
            $childcare_end_date_month = $data['childcare_end_date_month'] ?? "";
            $childcare_end_date_day = $data['childcare_end_date_day'] ?? "";
            if (ctype_digit($childcare_end_date_month) && ctype_digit($childcare_end_date_day)) {
                if (!checkdate($childcare_end_date_month, $childcare_end_date_day,$childcare_end_date_japane_era_year)) {
                    $validator->errors()->add('childcare_end_date_day', '14_育児休業等終了(予定)年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_extension_scheduled_end_date_japane_era_year']) && !empty($data['childcare_extension_scheduled_end_date_month']) && !empty($data['childcare_extension_scheduled_end_date_day'])) {
                if ($data['childcare_extension_scheduled_end_date_japane_era_year'] == 1 && ($data['childcare_extension_scheduled_end_date_month'] < 5 || ($data['childcare_extension_scheduled_end_date_month'] == 5 && $data['childcare_extension_scheduled_end_date_day'] < 1))) {
                        $validator->errors()->add('childcare_extension_scheduled_end_date_day', '19_育児休業等終了(予定)年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] > $data['childcare_extension_scheduled_end_date_japane_era_year']) {
                    $validator->errors()->add('childcare_extension_scheduled_end_date_japane_era_year', '19_育児休業等終了(予定)年月日_年は、13_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_extension_scheduled_end_date_japane_era_year'] && $data['childcare_start_date_month'] > $data['childcare_extension_scheduled_end_date_month']) {
                    $validator->errors()->add('childcare_extension_scheduled_end_date_month', '19_育児休業等終了(予定)年月日_月は、13_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_extension_scheduled_end_date_japane_era_year'] && $data['childcare_start_date_month'] === $data['childcare_extension_scheduled_end_date_month'] && $data['childcare_start_date_day'] > $data['childcare_extension_scheduled_end_date_day']) {
                    $validator->errors()->add('childcare_extension_scheduled_end_date_day', '19_育児休業等終了(予定)年月日_日は、13_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_extension_scheduled_end_date_japane_era_year = 2018 + $data['childcare_extension_scheduled_end_date_japane_era_year'];
            $childcare_extension_scheduled_end_date_month = $data['childcare_extension_scheduled_end_date_month'] ?? "";
            $childcare_extension_scheduled_end_date_day = $data['childcare_extension_scheduled_end_date_day'] ?? "";
            if (ctype_digit($childcare_extension_scheduled_end_date_month) && ctype_digit($childcare_extension_scheduled_end_date_day)) {
                if (!checkdate($childcare_extension_scheduled_end_date_month, $childcare_extension_scheduled_end_date_day,$childcare_extension_scheduled_end_date_japane_era_year)) {
                    $validator->errors()->add('childcare_extension_scheduled_end_date_day', '19_育児休業等終了(予定)年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_extension_end_date_japane_era_year']) && !empty($data['childcare_extension_end_date_month']) && !empty($data['childcare_extension_end_date_day'])) {
                if ($data['childcare_extension_end_date_japane_era_year'] == 1 && ($data['childcare_extension_end_date_month'] < 5 || ($data['childcare_extension_end_date_month'] == 5 && $data['childcare_extension_end_date_day'] < 1))) {
                        $validator->errors()->add('childcare_extension_end_date_day', '21_育児休業等終了年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] > $data['childcare_extension_end_date_japane_era_year']) {
                    $validator->errors()->add('childcare_extension_end_date_japane_era_year', '21_育児休業等終了年月日_年は、13_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_extension_end_date_japane_era_year'] && $data['childcare_start_date_month'] > $data['childcare_extension_end_date_month']) {
                    $validator->errors()->add('childcare_extension_end_date_month', '21_育児休業等終了年月日_月は、13_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year'] === $data['childcare_extension_end_date_japane_era_year'] && $data['childcare_start_date_month'] === $data['childcare_extension_end_date_month'] && $data['childcare_start_date_day'] > $data['childcare_extension_end_date_day']) {
                    $validator->errors()->add('childcare_extension_end_date_day', '21_育児休業等終了年月日_日は、13_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_extension_end_date_japane_era_year = 2018 + $data['childcare_extension_end_date_japane_era_year'];
            $childcare_extension_end_date_month = $data['childcare_extension_end_date_month'] ?? "";
            $childcare_extension_end_date_day = $data['childcare_extension_end_date_day'] ?? "";
            if (ctype_digit($childcare_extension_end_date_month) && ctype_digit($childcare_extension_end_date_day)) {
                if (!checkdate($childcare_extension_end_date_month, $childcare_extension_end_date_day,$childcare_extension_end_date_japane_era_year)) {
                    $validator->errors()->add('childcare_extension_end_date_day', '21_育児休業等終了年月日は正しい日付を入力してください。');
                }
            }

            if ($data['childcare_start_date_japane_era_year1'] == 1 && ($data['childcare_start_date_month1'] < 5 || ($data['childcare_start_date_month1'] == 5 && $data['childcare_start_date_day1'] < 1))) {
                $validator->errors()->add('childcare_start_date_day1', '23_育児休業等開始年月日は正しい日付を入力してください。');
            }
            $childcare_start_date_japane_era_year1 = 2018 + $data['childcare_start_date_japane_era_year1'];
            $childcare_start_date_month1 = $data['childcare_start_date_month1'] ?? "";
            $childcare_start_date_day1 = $data['childcare_start_date_day1'] ?? "";
            if (ctype_digit($childcare_start_date_month1) && ctype_digit($childcare_start_date_day1)) {
                if (!checkdate($childcare_start_date_month1, $childcare_start_date_day1,$childcare_start_date_japane_era_year1)) {
                    $validator->errors()->add('childcare_start_date_day1', '23_育児休業等開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_end_date_japane_era_year1']) && !empty($data['childcare_end_date_month1']) && !empty($data['childcare_end_date_day1'])) {
                if ($data['childcare_end_date_japane_era_year1'] == 1 && ($data['childcare_end_date_month1'] < 5 || ($data['childcare_end_date_month1'] == 5 && $data['childcare_end_date_day1'] < 1))) {
                    $validator->errors()->add('childcare_end_date_day1', '24_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year1'] > $data['childcare_end_date_japane_era_year1']) {
                    $validator->errors()->add('childcare_end_date_japane_era_year1', '24_育児休業等終了（予定）年月日_年は、23_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year1'] === $data['childcare_end_date_japane_era_year1'] && $data['childcare_start_date_month1'] > $data['childcare_end_date_month1']) {
                    $validator->errors()->add('childcare_end_date_month1', '24_育児休業等終了（予定）年月日_月は、23_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year1'] === $data['childcare_end_date_japane_era_year1'] && $data['childcare_start_date_month1'] === $data['childcare_end_date_month1'] && $data['childcare_start_date_day1'] > $data['childcare_end_date_day1']) {
                    $validator->errors()->add('childcare_end_date_day1', '24_育児休業等終了（予定）年月日_日は、23_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_end_date_japane_era_year1 = 2018 + $data['childcare_end_date_japane_era_year1'];
            $childcare_end_date_month1 = $data['childcare_end_date_month1'] ?? "";
            $childcare_end_date_day1 = $data['childcare_end_date_day1'] ?? "";
            if (ctype_digit($childcare_start_date_month1) && ctype_digit($childcare_end_date_day1)) {
                if (!checkdate($childcare_end_date_month1, $childcare_end_date_day1,$childcare_end_date_japane_era_year1)) {
                    $validator->errors()->add('childcare_end_date_day1', '24_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
            }

            if ($data['childcare_start_date_japane_era_year2'] == 1 && ($data['childcare_start_date_month2'] < 5 || ($data['childcare_start_date_month2'] == 5 && $data['childcare_start_date_day2'] < 1))) {
                $validator->errors()->add('childcare_start_date_day2', '27_育児休業等開始年月日は正しい日付を入力してください。');
            }
            $childcare_start_date_japane_era_year2 = 2018 + $data['childcare_start_date_japane_era_year2'];
            $childcare_start_date_month2 = $data['childcare_start_date_month2'] ?? "";
            $childcare_start_date_day2 = $data['childcare_start_date_day2'] ?? "";
            if (ctype_digit($childcare_start_date_month2) && ctype_digit($childcare_start_date_day2)) {
                if (!checkdate($childcare_start_date_month2, $childcare_start_date_day2,$childcare_start_date_japane_era_year2)) {
                    $validator->errors()->add('childcare_start_date_day2', '27_育児休業等開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_end_date_japane_era_year2']) && !empty($data['childcare_end_date_month2']) && !empty($data['childcare_end_date_day2'])) {
                if ($data['childcare_end_date_japane_era_year2'] == 1 && ($data['childcare_end_date_month2'] < 5 || ($data['childcare_end_date_month2'] == 5 && $data['childcare_end_date_day2'] < 1))) {
                    $validator->errors()->add('childcare_end_date_day2', '28_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year2'] > $data['childcare_end_date_japane_era_year2']) {
                    $validator->errors()->add('childcare_end_date_japane_era_year2', '28_育児休業等終了（予定）年月日_年は、27_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year2'] === $data['childcare_end_date_japane_era_year2'] && $data['childcare_start_date_month2'] > $data['childcare_end_date_month2']) {
                    $validator->errors()->add('childcare_end_date_month2', '28_育児休業等終了（予定）年月日_月は、27_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year2'] === $data['childcare_end_date_japane_era_year2'] && $data['childcare_start_date_month2'] === $data['childcare_end_date_month2'] && $data['childcare_start_date_day2'] > $data['childcare_end_date_day2']) {
                    $validator->errors()->add('childcare_end_date_day2', '28_育児休業等終了（予定）年月日_日は、27_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_end_date_japane_era_year2 = 2018 + $data['childcare_end_date_japane_era_year2'];
            $childcare_end_date_month2 = $data['childcare_end_date_month2'] ?? "";
            $childcare_end_date_day2 = $data['childcare_end_date_day2'] ?? "";
            if (ctype_digit($childcare_end_date_month2) && ctype_digit($childcare_end_date_day2)) {
                if (!checkdate($childcare_end_date_month2, $childcare_end_date_day2,$childcare_end_date_japane_era_year2)) {
                    $validator->errors()->add('childcare_end_date_day2', '28_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
            }

            if ($data['childcare_start_date_japane_era_year3'] == 1 && ($data['childcare_start_date_month3'] < 5 || ($data['childcare_start_date_month3'] == 5 && $data['childcare_start_date_day3'] < 1))) {
                $validator->errors()->add('childcare_start_date_day3', '31_育児休業等開始年月日は正しい日付を入力してください。');
            }
            $childcare_start_date_japane_era_year3 = 2018 + $data['childcare_start_date_japane_era_year3'];
            $childcare_start_date_month3 = $data['childcare_start_date_month3'] ?? "";
            $childcare_start_date_day3 = $data['childcare_start_date_day3'] ?? "";
            if (ctype_digit($childcare_start_date_month3) && ctype_digit($childcare_start_date_day3)) {
                if (!checkdate($childcare_start_date_month3, $childcare_start_date_day3,$childcare_start_date_japane_era_year3)) {
                    $validator->errors()->add('childcare_start_date_day3', '31_育児休業等開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_end_date_japane_era_year3']) && !empty($data['childcare_end_date_month3']) && !empty($data['childcare_end_date_day3'])) {
                if ($data['childcare_end_date_japane_era_year3'] == 1 && ($data['childcare_end_date_month3'] < 5 || ($data['childcare_end_date_month3'] == 5 && $data['childcare_end_date_day3'] < 1))) {
                    $validator->errors()->add('childcare_end_date_day3', '32_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year3'] > $data['childcare_end_date_japane_era_year3']) {
                    $validator->errors()->add('childcare_end_date_japane_era_year3', '32_育児休業等終了（予定）年月日_年は、31_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year3'] === $data['childcare_end_date_japane_era_year3'] && $data['childcare_start_date_month3'] > $data['childcare_end_date_month3']) {
                    $validator->errors()->add('childcare_end_date_month3', '32_育児休業等終了（予定）年月日_月は、31_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year3'] === $data['childcare_end_date_japane_era_year3'] && $data['childcare_start_date_month3'] === $data['childcare_end_date_month3'] && $data['childcare_start_date_day3'] > $data['childcare_end_date_day3']) {
                    $validator->errors()->add('childcare_end_date_day3', '32_育児休業等終了（予定）年月日_日は、31_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_end_date_japane_era_year3 = 2018 + $data['childcare_end_date_japane_era_year3'];
            $childcare_end_date_month3 = $data['childcare_end_date_month3'] ?? "";
            $childcare_end_date_day3 = $data['childcare_end_date_day3'] ?? "";
            if (ctype_digit($childcare_end_date_month3) && ctype_digit($childcare_end_date_day3)) {
                if (!checkdate($childcare_end_date_month3, $childcare_end_date_day3,$childcare_end_date_japane_era_year3)) {
                    $validator->errors()->add('childcare_end_date_day3', '32_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
            }

            if ($data['childcare_start_date_japane_era_year4'] == 1 && ($data['childcare_start_date_month4'] < 5 || ($data['childcare_start_date_month4'] == 5 && $data['childcare_start_date_day4'] < 1))) {
                $validator->errors()->add('childcare_start_date_day4', '35_育児休業等開始年月日は正しい日付を入力してください。');
            }
            $childcare_start_date_japane_era_year4 = 2018 + $data['childcare_start_date_japane_era_year4'];
            $childcare_start_date_month4 = $data['childcare_start_date_month4'] ?? "";
            $childcare_start_date_day4 = $data['childcare_start_date_day4'] ?? "";
            if (ctype_digit($childcare_start_date_month4) && ctype_digit($childcare_start_date_day4)) {
                if (!checkdate($childcare_start_date_month4, $childcare_start_date_day4,$childcare_start_date_japane_era_year4)) {
                    $validator->errors()->add('childcare_start_date_day4', '35_育児休業等開始年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($data['childcare_end_date_japane_era_year4']) && !empty($data['childcare_end_date_month4']) && !empty($data['childcare_end_date_day4'])) {
                if ($data['childcare_end_date_japane_era_year4'] == 1 && ($data['childcare_end_date_month4'] < 5 || ($data['childcare_end_date_month4'] == 5 && $data['childcare_end_date_day4'] < 1))) {
                    $validator->errors()->add('childcare_end_date_day4', '36_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year4'] > $data['childcare_end_date_japane_era_year4']) {
                    $validator->errors()->add('childcare_end_date_japane_era_year4', '36_育児休業等終了（予定）年月日_年は、35_育児休業等開始年月日_年以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year4'] === $data['childcare_end_date_japane_era_year4'] && $data['childcare_start_date_month4'] > $data['childcare_end_date_month4']) {
                    $validator->errors()->add('childcare_end_date_month4', '36_育児休業等終了（予定）年月日_月は、35_育児休業等開始年月日_月以降を入力してください。');
                }
                if ($data['childcare_start_date_japane_era_year4'] === $data['childcare_end_date_japane_era_year4'] && $data['childcare_start_date_month4'] === $data['childcare_end_date_month4'] && $data['childcare_start_date_day4'] > $data['childcare_end_date_day4']) {
                    $validator->errors()->add('childcare_end_date_day4', '36_育児休業等終了（予定）年月日_日は、35_育児休業等開始年月日_日以降を入力してください。');
                }
            }
            $childcare_end_date_japane_era_year4 = 2018 + $data['childcare_end_date_japane_era_year4'];
            $childcare_end_date_month4 = $data['childcare_end_date_month4'] ?? "";
            $childcare_end_date_day4 = $data['childcare_end_date_day4'] ?? "";
            if (ctype_digit($childcare_end_date_month4) && ctype_digit($childcare_end_date_day4)) {
                if (!checkdate($childcare_end_date_month4, $childcare_end_date_day4,$childcare_end_date_japane_era_year4)) {
                    $validator->errors()->add('childcare_end_date_day4', '36_育児休業等終了（予定）年月日は正しい日付を入力してください。');
                }
            }

            //区分がその他を選択された場合の、入力チェック
            $child_raising_start_dete_year_seireki = 2018 + $data['child_raising_start_dete_year'];
            $child_raising_start_dete_year = $data['child_raising_start_dete_year'] ?? null;
            $child_raising_start_dete_month = $data['child_raising_start_dete_month'] ?? null;
            $child_raising_start_dete_day = $data['child_raising_start_dete_day'] ?? null;

            if ($data['classification'] === '2') {
                if ($child_raising_start_dete_year == 1 && ($child_raising_start_dete_month < 5 || ($child_raising_start_dete_month == 5 && $child_raising_start_dete_day < 1))) {
                    $validator->errors()->add('child_raising_start_dete_day', '12_養育開始年月日(実子以外)は正しい日付を入力してください。');
                }
                if (ctype_digit($child_raising_start_dete_month) && ctype_digit($child_raising_start_dete_day)) {
                    if (!checkdate($child_raising_start_dete_month, $child_raising_start_dete_day,$child_raising_start_dete_year_seireki)) {
                        $validator->errors()->add('child_raising_start_dete_day', '12_養育開始年月日(実子以外)は正しい日付を入力してください。');
                    }
                }
                if (!empty($child_raising_start_dete_year) && !empty($child_raising_start_dete_month) && !empty($child_raising_start_dete_day)){
                    $start_year = $data['childcare_start_date_japane_era_year'];
                    $start_month = $data['childcare_start_date_month'];
                    $start_day = $data['childcare_start_date_day'];

                    if ($child_raising_start_dete_year > $start_year) {
                        $validator->errors()->add('child_raising_start_dete_year', '12_養育開始年月日(実子以外)_年は、13_育児休業等開始年月日_年以前を入力してください。');
                    }
                    if ($child_raising_start_dete_year == $start_year && $child_raising_start_dete_month > $start_month) {
                        $validator->errors()->add('child_raising_start_dete_month', '12_養育開始年月日(実子以外)_月は、13_育児休業等開始年月日_月以前を入力してください。');
                    }
                    if ($child_raising_start_dete_year == $start_year && $child_raising_start_dete_month == $start_month && $child_raising_start_dete_day > $start_day) {
                        $validator->errors()->add('child_raising_start_dete_day', '12_養育開始年月日(実子以外)_日は、13_育児休業等開始年月日_日以前を入力してください。');
                    }
                }
            }

            //開始月と終了日翌日が同月だった場合に、育行休業等終了等取得日数＆就業予定日数が入力されているかのチェック
            //育行休業等終了等取得日数が、”終了年月日ー開始年月日”の日数であることのチェック
            if (isset($data['childcare_start_date_japane_era_year'],$data['childcare_start_date_month'], $data['childcare_start_date_day'], 
            $data['childcare_end_date_japane_era_year'], $data['childcare_end_date_month'], $data['childcare_end_date_day'])) {

                $start13_year = null;
                $end14_year = null;

                if (isset($data['childcare_start_date_japane_era_year']) && ctype_digit($data['childcare_start_date_japane_era_year'])) {
                    $start13_year = 2018 + $data['childcare_start_date_japane_era_year'];
                }
                if (isset($data['childcare_end_date_japane_era_year']) && ctype_digit($data['childcare_end_date_japane_era_year'])) {
                    $end14_year = 2018 + $data['childcare_end_date_japane_era_year'];
                }

                $start_13_date = mktime(0,0,0,$data['childcare_start_date_month'],$data['childcare_start_date_day'],$start13_year);
                $end_14_date = mktime(0,0,0,$data['childcare_end_date_month'],$data['childcare_end_date_day'],$end14_year);
                $end_14_next_day = strtotime( '+1 day',$end_14_date);

                if (date('m',$start_13_date) == date('m',$end_14_next_day) && $data['childcare_end_date_day'] > $data['childcare_start_date_day']){
                    $parental_leave_count = $data['parental_leave_count'] ?? null;
                    $workday_count = $data['workday_count'] ?? null;
                    if(empty($parental_leave_count)){
                        $validator->errors()->add('parental_leave_count', '15_育児休業等終了等取得日数を入力してください。');
                    }
                    if(!isset($workday_count)){
                        $validator->errors()->add('workday_count', '16_就業予定日数を入力してください。');
                    }
                    $diff_15_days = ($end_14_date - $start_13_date) /86400;
                    if ((int)$parental_leave_count !== $diff_15_days) {
                        $validator->errors()->add('parental_leave_count', '15_育児休業等終了等取得日数は、13_育児休業等開始年月日から14_育児休業等終了(予定)年月日までの日数である必要があります。');

                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year'],$data['childcare_start_date_month'], $data['childcare_start_date_day'], 
                        $data['childcare_extension_scheduled_end_date_japane_era_year'], $data['childcare_extension_scheduled_end_date_month'], $data['childcare_extension_scheduled_end_date_day'])) {

                $start13_year = null;
                $end19_year = null;

                if (isset($data['childcare_start_date_japane_era_year']) && ctype_digit($data['childcare_start_date_japane_era_year'])) {
                    $start13_year = 2018 + $data['childcare_start_date_japane_era_year'];
                }
                if (isset($data['childcare_extension_scheduled_end_date_japane_era_year']) && ctype_digit($data['childcare_extension_scheduled_end_date_japane_era_year'])) {
                    $end19_year = 2018 + $data['childcare_extension_scheduled_end_date_japane_era_year'];
                }

                $start_13_date = mktime(0,0,0,$data['childcare_start_date_month'],$data['childcare_start_date_day'],$start13_year);
                $end_19_date = mktime(0,0,0,$data['childcare_extension_scheduled_end_date_month'],$data['childcare_extension_scheduled_end_date_day'],$end19_year);
                $end_19_next_day = strtotime( '+1 day',$end_19_date);

                if (date('m',$start_13_date) == date('m',$end_19_next_day) && $data['childcare_extension_scheduled_end_date_day'] > $data['childcare_start_date_day']){
                    $after_parental_leave_count_20 = $data['after_parental_leave_count_20'] ?? null;
                    if(empty($after_parental_leave_count_20)){
                        $validator->errors()->add('after_parental_leave_count_20', '20_変更後の育児休業等取得日数を入力してください。');
                    }
                    $diff_20_days = ($end_19_date - $start_13_date) /86400;
                    if ((int)$after_parental_leave_count_20 !== $diff_20_days) {
                        $validator->errors()->add('after_parental_leave_count_20', '20_変更後の育児休業等取得日数は、13_育児休業等開始年月日から14_育児休業等終了(予定)年月日までの日数である必要があります。');

                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year'],$data['childcare_start_date_month'], $data['childcare_start_date_day'], 
                        $data['childcare_extension_end_date_japane_era_year'], $data['childcare_extension_end_date_month'], $data['childcare_extension_end_date_day'])) {

                $start13_year = null;
                $end21_year = null;

                if (isset($data['childcare_start_date_japane_era_year']) && ctype_digit($data['childcare_start_date_japane_era_year'])) {
                    $start13_year = 2018 + $data['childcare_start_date_japane_era_year'];
                }
                if (isset($data['childcare_extension_end_date_japane_era_year']) && ctype_digit($data['childcare_extension_end_date_japane_era_year'])) {
                    $end21_year = 2018 + $data['childcare_extension_end_date_japane_era_year'];
                }

                $start_13_date = mktime(0,0,0,$data['childcare_start_date_month'],$data['childcare_start_date_day'],$start13_year);
                $end_21_date = mktime(0,0,0,$data['childcare_extension_end_date_month'],$data['childcare_extension_end_date_day'],$end21_year);
                $end_21_next_day = strtotime( '+1 day',$end_21_date);

                if (date('m',$start_13_date) == date('m',$end_21_next_day) && $data['childcare_extension_end_date_day'] > $data['childcare_start_date_day']){
                    $after_parental_leave_count_22 = $data['after_parental_leave_count_22'] ?? null;
                    if(empty($after_parental_leave_count_22)){
                        $validator->errors()->add('after_parental_leave_count_22', '22_変更後の育児休業等取得日数を入力してください。');
                    }
                    $diff_22_days = ($end_21_date - $start_13_date) /86400;
                    if ((int)$after_parental_leave_count_22 !== $diff_22_days) {
                        $validator->errors()->add('after_parental_leave_count_22', '22_変更後の育児休業等取得日数は、13_育児休業等開始年月日から14_育児休業等終了(予定)年月日までの日数である必要があります。');
                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year1'],$data['childcare_start_date_month1'], $data['childcare_start_date_day1'],
                        $data['childcare_end_date_japane_era_year1'], $data['childcare_end_date_month1'], $data['childcare_end_date_day1'])) {

                $start23_year = null;
                $end24_year = null;

                if (isset($data['childcare_start_date_japane_era_year1']) && ctype_digit($data['childcare_start_date_japane_era_year1'])) {
                    $start23_year = 2018 + $data['childcare_start_date_japane_era_year1'];
                }
                if (isset($data['childcare_end_date_japane_era_year1']) && ctype_digit($data['childcare_end_date_japane_era_year1'])) {
                    $end24_year = 2018 + $data['childcare_end_date_japane_era_year1'];
                }

                $start_23_date = mktime(0,0,0,$data['childcare_start_date_month1'],$data['childcare_start_date_day1'],$start23_year);
                $end_24_date = mktime(0,0,0,$data['childcare_end_date_month1'],$data['childcare_end_date_day1'],$end24_year);
                $end_24_next_day = strtotime( '+1 day',$end_24_date);

                if (date('m',$start_23_date) == date('m',$end_24_next_day) && $data['childcare_end_date_day1'] > $data['childcare_start_date_day1']){
                    $parental_leave_count1 = $data['parental_leave_count1'] ?? null;
                    $workday_count1 = $data['workday_count1'] ?? null;
                    if(empty($parental_leave_count1)){
                        $validator->errors()->add('parental_leave_count1', '25_育児休業等取得日数を入力してください。');
                    }
                    if(!isset($workday_count1)){
                        $validator->errors()->add('workday_count1', '26_就業予定日数を入力してください。');
                    }
                    $diff_25_days = ($end_24_date - $start_23_date) /86400;
                    if ((int)$parental_leave_count1 !== $diff_25_days) {
                        $validator->errors()->add('parental_leave_count1', '25_育児休業等取得日数は、23_育児休業等開始年月日から24_育児休業等終了(予定)年月日までの日数である必要があります。');
                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year2'],$data['childcare_start_date_month2'], $data['childcare_start_date_day2'],
                        $data['childcare_end_date_japane_era_year2'], $data['childcare_end_date_month2'], $data['childcare_end_date_day2'])) {

                $start27_year = null;
                $end28_year = null;

                if (isset($data['childcare_start_date_japane_era_year2']) && ctype_digit($data['childcare_start_date_japane_era_year2'])) {
                    $start27_year = 2018 + $data['childcare_start_date_japane_era_year2'];
                }
                if (isset($data['childcare_end_date_japane_era_year2']) && ctype_digit($data['childcare_end_date_japane_era_year2'])) {
                    $end28_year = 2018 + $data['childcare_end_date_japane_era_year2'];
                }

                $start_27_date = mktime(0,0,0,$data['childcare_start_date_month2'],$data['childcare_start_date_day2'],$start27_year);
                $end_28_date = mktime(0,0,0,$data['childcare_end_date_month2'],$data['childcare_end_date_day2'],$end28_year);
                $end_28_next_day = strtotime( '+1 day',$end_28_date);

                if (date('m',$start_27_date) == date('m',$end_28_next_day) && $data['childcare_end_date_day2'] > $data['childcare_start_date_day2']){
                    $parental_leave_count2 = $data['parental_leave_count2'] ?? null;
                    $workday_count2 = $data['workday_count2'] ?? null;
                    if(empty($parental_leave_count2)){
                        $validator->errors()->add('parental_leave_count2', '29_育児休業等取得日数を入力してください。');
                    }
                    if(!isset($workday_count2)){
                        $validator->errors()->add('workday_count2', '30_就業予定日数を入力してください。');
                    }
                    $diff_29_days = ($end_28_date - $start_27_date) /86400;
                    if ((int)$parental_leave_count2 !== $diff_29_days) {
                        $validator->errors()->add('parental_leave_count2', '29_育児休業等取得日数は、27_育児休業等開始年月日から28_育児休業等終了(予定)年月日までの日数である必要があります。');
                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year3'],$data['childcare_start_date_month3'], $data['childcare_start_date_day3'],
                        $data['childcare_end_date_japane_era_year3'], $data['childcare_end_date_month3'], $data['childcare_end_date_day3'])) {

                $start31_year = null;
                $end32_year = null;

                if (isset($data['childcare_start_date_japane_era_year3']) && ctype_digit($data['childcare_start_date_japane_era_year3'])) {
                    $start31_year = 2018 + $data['childcare_start_date_japane_era_year3'];
                }
                if (isset($data['childcare_end_date_japane_era_year3']) && ctype_digit($data['childcare_end_date_japane_era_year3'])) {
                    $end32_year = 2018 + $data['childcare_end_date_japane_era_year3'];
                }

                $start_31_date = mktime(0,0,0,$data['childcare_start_date_month3'],$data['childcare_start_date_day3'],$start31_year);
                $end_32_date = mktime(0,0,0,$data['childcare_end_date_month3'],$data['childcare_end_date_day3'],$end32_year);
                $end_32_next_day = strtotime( '+1 day',$end_32_date);

                if (date('m',$start_31_date) == date('m',$end_32_next_day) && $data['childcare_end_date_day3'] > $data['childcare_start_date_day3']){
                    $parental_leave_count3 = $data['parental_leave_count3'] ?? null;
                    if(empty($parental_leave_count3)){
                        $validator->errors()->add('parental_leave_count3', '33_育児休業等取得日数を入力してください。');
                    }
                    $diff_33_days = ($end_32_date - $start_31_date) /86400;
                    if ((int)$parental_leave_count3 !== $diff_33_days) {
                        $validator->errors()->add('parental_leave_count3', '33_育児休業等取得日数は、31_育児休業等開始年月日から32_育児休業等終了(予定)年月日までの日数である必要があります。');
                    }
                }
            }

            if (isset($data['childcare_start_date_japane_era_year4'],$data['childcare_start_date_month4'], $data['childcare_start_date_day4'],
                        $data['childcare_end_date_japane_era_year4'], $data['childcare_end_date_month4'], $data['childcare_end_date_day4'])) {

                $start35_year = null;
                $end36_year = null;

                if (isset($data['childcare_start_date_japane_era_year4']) && ctype_digit($data['childcare_start_date_japane_era_year4'])) {
                    $start35_year = 2018 + $data['childcare_start_date_japane_era_year4'];
                }
                if (isset($data['childcare_end_date_japane_era_year4']) && ctype_digit($data['childcare_end_date_japane_era_year4'])) {
                    $end36_year = 2018 + $data['childcare_end_date_japane_era_year4'];
                }

                $start_35_date = mktime(0,0,0,$data['childcare_start_date_month4'],$data['childcare_start_date_day4'],$start35_year);
                $end_36_date = mktime(0,0,0,$data['childcare_end_date_month4'],$data['childcare_end_date_day4'],$end36_year);
                $end_36_next_day = strtotime( '+1 day',$end_36_date);

                if (date('m',$start_35_date) == date('m',$end_36_next_day) && $data['childcare_end_date_day4'] > $data['childcare_start_date_day4']){
                    $parental_leave_count4 = $data['parental_leave_count4'] ?? null;
                    if(empty($parental_leave_count4)){
                        $validator->errors()->add('parental_leave_count4', '37_育児休業等取得日数を入力してください。');
                    }
                    $diff_37_days = ($end_36_date - $start_35_date) /86400;
                    if ((int)$parental_leave_count4 !== $diff_37_days) {
                        $validator->errors()->add('parental_leave_count4', '37_育児休業等取得日数は、35_育児休業等開始年月日から36_育児休業等終了(予定)年月日までの日数である必要があります。');
                    }
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
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'child_raising_start_dete_year.required_if' => '12_養育開始年月日（年）を入力してください。',
            'child_raising_start_dete_month.required_if' => '12_養育開始年月日（月）を入力してください。',
            'child_raising_start_dete_day.required_if' => '12_養育開始年月日（日）を入力してください。',
            'childcare_extension_scheduled_end_date_japane_era_year.required_with' => '19_育児休業等終了(予定)年月日_年を入力してください。',
            'childcare_extension_scheduled_end_date_month.required_with' => '19_育児休業等終了(予定)年月日_月を入力してください。',
            'childcare_extension_scheduled_end_date_day.required_with' => '19_育児休業等終了(予定)年月日_日を入力してください。',
            'childcare_extension_end_date_japane_era_year.required_with' => '21_育児休業等終了年月日_年を入力してください。',
            'childcare_extension_end_date_month.required_with' => '21_育児休業等終了年月日_月を入力してください。',
            'childcare_extension_end_date_day.required_with' => '21_育児休業等終了年月日_日を入力してください。',
            'childcare_start_date_japane_era_year1.required_with' => '23_育児休業等開始年月日_年を入力してください。',
            'childcare_start_date_japane_era_year2.required_with' => '27_育児休業等開始年月日_年を入力してください。',
            'childcare_start_date_japane_era_year3.required_with' => '31_育児休業等開始年月日_年を入力してください。',
            'childcare_start_date_japane_era_year4.required_with' => '35_育児休業等開始年月日_年を入力してください。',
            'childcare_start_date_month1.required_with' => '23_育児休業等開始年月日_月を入力してください。',
            'childcare_start_date_month2.required_with' => '27_育児休業等開始年月日_月を入力してください。',
            'childcare_start_date_month3.required_with' => '31_育児休業等開始年月日_月を入力してください。',
            'childcare_start_date_month4.required_with' => '35_育児休業等開始年月日_月を入力してください。',
            'childcare_start_date_day1.required_with' => '23_育児休業等開始年月日_日を入力してください。',
            'childcare_start_date_day2.required_with' => '27_育児休業等開始年月日_日を入力してください。',
            'childcare_start_date_day3.required_with' => '31_育児休業等開始年月日_日を入力してください。',
            'childcare_start_date_day4.required_with' => '35_育児休業等開始年月日_日を入力してください。',
            'childcare_end_date_japane_era_year1.required_with' => '24_育児休業等終了（予定）年月日_年を入力してください。',
            'childcare_end_date_japane_era_year2.required_with' => '28_育児休業等終了（予定）年月日_年を入力してください。',
            'childcare_end_date_japane_era_year3.required_with' => '32_育児休業等終了（予定）年月日_年を入力してください。',
            'childcare_end_date_japane_era_year4.required_with' => '36_育児休業等終了（予定）年月日_年を入力してください。',
            'childcare_end_date_month1.required_with' => '24_育児休業等終了（予定）年月日_月を入力してください。',
            'childcare_end_date_month2.required_with' => '28_育児休業等終了（予定）年月日_月を入力してください。',
            'childcare_end_date_month3.required_with' => '32_育児休業等終了（予定）年月日_月を入力してください。',
            'childcare_end_date_month4.required_with' => '36_育児休業等終了（予定）年月日_月を入力してください。',
            'childcare_end_date_day1.required_with' => '24_育児休業等終了（予定）年月日_日を入力してください。',
            'childcare_end_date_day2.required_with' => '28_育児休業等終了（予定）年月日_日を入力してください。',
            'childcare_end_date_day3.required_with' => '32_育児休業等終了（予定）年月日_日を入力してください。',
            'childcare_end_date_day4.required_with' => '36_育児休業等終了（予定）年月日_日を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'submission_year' => '提出年',
            'submission_month' => '提出月',
            'submission_day' => '提出日',
            'business_establishment_code_prefecture_code' => '1_事業所整理番号（都道府県コード）',
            'office_arrangement_code_county_city_ward_code' => '1_事業所整理記号（郡市区符号）',
            'office_reference_symbol_office_symbol' => '1_事業所整理記号（事業所記号）',
            'csv_pension_office_no' => '事業所番号',
            'post_code_former' => '2_郵便番号（前３桁）',
            'post_code_latter' => '2_郵便番号（後４桁）',
            'branch_address' => '2_事業所所在地',
            'branch_office_name' => '2_事業所名称',
            'employer_company_managerial_position_name' => '2_事業主氏名',
            'branch_tel_area_code' => '2_電話番号（市外局番）',
            'branch_tel_city_code' => '2_電話番号（市内局番）',
            'branch_tel_subscriber_code' => '2_電話番号（加入者番号）',
            'labor_consultant_name' => '3_社会保険労務士記載欄',
            'insured_person_reference_number' => '4_被保険者整理番号',
            'mynumber_card_no' => '個人番号',
            'basic_pension_number' => '基礎年金番号',
            'fullname_kana' => '6_被保険者氏名（フリガナ）',
            'fullname' => '6_被保険者氏名',
            'year_of_birth_era' => '7_被保険者生年月日（元号）',
            'year_of_birth' => '7_被保険者生年月日（年）',
            'month_of_birth' => '7_被保険者生年月日（月）',
            'date_of_birth' => '7_被保険者生年月日（日）',
            'sex' => '8_性別',
            'child_fullname_kana' => '9_養育する子の氏名（フリガナ）',
            'child_fullname' => '9_養育する子の氏名',
            'child_year_of_birth_era' => '10_養育する子の生年月日 （年）',
            'child_month_of_birth' => '10_養育する子の生年月日 （月）',
            'child_date_of_birth' => '10_養育する子の生年月日 （日）',
            'classification' => '11_区分',
            'child_raising_start_dete_year' => '12_養育開始年月日（年）',
            'child_raising_start_dete_month' => '12_養育開始年月日（月）',
            'child_raising_start_dete_day' => '12_養育開始年月日（日）',
            'childcare_start_date_japane_era_year' => '13_育児休業等開始年月日（年）',
            'childcare_start_date_month' => '13_育児休業等開始年月日（月）',
            'childcare_start_date_day' => '13_育児休業等開始年月日（日）',
            'childcare_end_date_japane_era_year' => '14_育児休業等終了(予定)年月日（年）',
            'childcare_end_date_month' => '14_育児休業等終了(予定)年月日（月）',
            'childcare_end_date_day' => '14_育児休業等終了(予定)年月日（日）',
            'parental_leave_count' => '15_育児休業等終了等取得日数',
            'workday_count' => '16_就業予定日数',
            'papa_mama_plus_classification' => '17_パパママ育休プラス該当区分',
            'note' => '18_備考',
            'childcare_extension_scheduled_end_date_japane_era_year' => '19_育児休業等終了(予定)年月日（年）',
            'childcare_extension_scheduled_end_date_month' => '19_育児休業等終了(予定)年月日（月）',
            'childcare_extension_scheduled_end_date_day' => '19_育児休業等終了(予定)年月日（日）',
            'after_parental_leave_count_20' => '20_変更後の育児休業等取得日数',
            'childcare_extension_end_date_japane_era_year' => '21_育児休業等終了年月日（年）',
            'childcare_extension_end_date_month' => '21_育児休業等終了年月日（月）',
            'childcare_extension_end_date_day' => '21_育児休業等終了年月日（日）',
            'after_parental_leave_count_22' => '22_変更後の育児休業等取得日数',
            'childcare_start_date_japane_era_year1' => '23_育児休業等開始年月日（年）',
            'childcare_start_date_month1' => '23_育児休業等開始年月日（月）',
            'childcare_start_date_day1' => '23_育児休業等開始年月日（日）',
            'childcare_end_date_japane_era_year1' => '24_育児休業等終了(予定)年月日（年）',
            'childcare_end_date_month1' => '24_育児休業等終了(予定)年月日（月）',
            'childcare_end_date_day1' => '24_育児休業等終了(予定)年月日（日）',
            'parental_leave_count1' => '25_育児休業等取得日数 ',
            'workday_count1' => '26_就業予定日数',
            'childcare_start_date_japane_era_year2' => '27_育児休業等開始年月日（年）',
            'childcare_start_date_month2' => '27_育児休業等開始年月日（月）',
            'childcare_start_date_day2' => '27_育児休業等開始年月日（日）',
            'childcare_end_date_japane_era_year2' => '28_育児休業等終了(予定)年月日（年）',
            'childcare_end_date_month2' => '28_育児休業等終了(予定)年月日（月）',
            'childcare_end_date_day2' => '28_育児休業等終了(予定)年月日（日）',
            'parental_leave_count2' => '29_育児休業等取得日数 ',
            'workday_count2' => '30_就業予定日数',
            'childcare_start_date_japane_era_year3' => '31_育児休業等開始年月日（年）',
            'childcare_start_date_month3' => '31_育児休業等開始年月日（月）',
            'childcare_start_date_day3' => '31_育児休業等開始年月日（日）',
            'childcare_end_date_japane_era_year3' => '32_育児休業等終了(予定)年月日（年）',
            'childcare_end_date_month3' => '32_育児休業等終了(予定)年月日（月）',
            'childcare_end_date_day3' => '32_育児休業等終了(予定)年月日（日）',
            'parental_leave_count3' => '33_育児休業等取得日数 ',
            'childcare_start_date_japane_era_year4' => '35_育児休業等開始年月日（年）',
            'childcare_start_date_month4' => '35_育児休業等開始年月日（月）',
            'childcare_start_date_day4' => '35_育児休業等開始年月日（日）',
            'childcare_end_date_japane_era_year4' => '36_育児休業等終了(予定)年月日（年）',
            'childcare_end_date_month4' => '36_育児休業等終了(予定)年月日（月）',
            'childcare_end_date_day4' => '36_育児休業等終了(予定)年月日（日）',
            'parental_leave_count4' => '37_育児休業等取得日数 ',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '中分類（公共職業安定所）'
        ];
    }
}
