<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class ChildcareLeaveSalaryChangeNoticeOr70OverChildcareSalaryAdjustmentRequest extends BaseRequest
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
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'AKS');
        }
        if (isset($data['fullname_kana'])) {
            $data['fullname_kana'] = mb_convert_kana($data['fullname_kana'], 'KS');
        }
        if (isset($data['ch_fullname_kana'])) {
            $data['ch_fullname_kana'] = mb_convert_kana($data['ch_fullname_kana'], 'KS');
        }
        if (isset($data['fullname'])) {
            $data['fullname'] = mb_convert_kana($data['fullname'], 'AKS');
        }
        if (isset($data['ch_fullname'])) {
            $data['ch_fullname'] = mb_convert_kana($data['ch_fullname'], 'AKS');
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
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "submission_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "submission_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "submission_day" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "office_arrangement_code_county_city_ward_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "office_reference_symbol_office_symbol" => 'required|string|max:4|regex:/^[あ-んァ-ヴー一-龥々A-Za-z]+$/',
            "post_code_former" => 'required|string|regex:/^[0-9]{3}$/u',
            "post_code_latter" => 'required|string|regex:/^[0-9]{4}$/u',
            "branch_address" => ['required','string','max:75', new FullwidthAndMiscellaneousChars(true)],
            "branch_name" => ['required','string','max:50', new FullwidthAndMiscellaneousChars(true)],
            "employer_company_managerial_position_name" => ['required','string','max:25', new FullwidthAndMiscellaneousChars(true)],
            "branch_tel_area_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_name" => ['nullable','string','max:40', new FullwidthAndMiscellaneousChars(true)],
            "insured_person_reference_number" => 'nullable|int|max_digits:6|regex:/^[0-9]+$/',
            "my_number_or_basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/',
            "fullname_kana" => ['required','string','max:25','regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',new FullwidthAndMiscellaneousChars(true)],
            "fullname" => 'required|string|max:12|regex:/^[あ-んァ-ヴー一-龥々　]+$/',
            "year_of_birth_era" => 'required|int|max_digits:1|in:5,7,9',
            "year_of_birth" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "month_of_birth" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "date_of_birth" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "ch_fullname_kana" => ['nullable','string','max:25','regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',new FullwidthAndMiscellaneousChars(true)],
            "ch_fullname" => 'nullable|string|max:12|regex:/^[あ-んァ-ヴー一-龥々　]+$/',
            "ch_year_of_birth_era" => 'nullable|string|max:2|in:令和|required_with:ch_year_of_birth,ch_month_of_birth,ch_date_of_birth',
            "ch_year_of_birth" => 'nullable|int|between:1,99|regex:/^[0-9]+$/|required_with:ch_year_of_birth_era,ch_month_of_birth,ch_date_of_birth',
            "ch_month_of_birth" => 'nullable|int|between:1,12|regex:/^[0-9]+$/|required_with:ch_year_of_birth_era,ch_year_of_birth,ch_date_of_birth',
            "ch_date_of_birth" => 'nullable|int|between:1,31|regex:/^[0-9]+$/|required_with:ch_year_of_birth_era,ch_year_of_birth,ch_month_of_birth',
            "closure_information_end_era" => 'nullable|string|max:2|in:令和|required_with:closure_information_end_year,closure_information_end_month,closure_information_end_day',
            "closure_information_end_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/|required_with:closure_information_end_era,closure_information_end_month,closure_information_end_day',
            "closure_information_end_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/|required_with:closure_information_end_era,closure_information_end_year,closure_information_end_day',
            "closure_information_end_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/|required_with:closure_information_end_era,closure_information_end_year,closure_information_end_month',
            "pay_month1" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "pay_month2" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "pay_month3" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "Basic_days_payroll_calculation1" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "Basic_days_payroll_calculation2" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "Basic_days_payroll_calculation3" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "currency_1" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "currency_2" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "currency_3" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "genbutsu_1" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "genbutsu_2" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "genbutsu_3" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "sum1" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "sum2" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "sum3" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "total" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "ave_amount" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "adj_amount" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_health_insurance" => 'nullable|int|max_digits:4|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_employees_pension" => 'nullable|int|max_digits:4|regex:/^[0-9]+$/',
            "pay_raise_increase_m" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "pay_raise_increase" => 'nullable|string|max:2|in:昇給,降給',
            "retroactive_payment_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment" => 'nullable|int|max_digits:7|regex:/^[0-9]+$/',
            "revised_era" => 'nullable|int|max_digits:1|in:9|required_with:revised_year,revised_month',
            "revised_year" => 'nullable|int|between:1,99|regex:/^[0-9]+$/|required_with:revised_era,revised_month',
            "revised_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/|required_with:revised_era,revised_year',
            "salary_payroll_deadline" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "salary_payroll_month" => 'nullable|string|max:2|in:当月,翌月',
            "salary_payroll_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "remarks_and_calculation_of_employees_aged_70_and_over" => 'nullable|string|max:1|regex:/^[0-9]+$/|in:有',
            "remarks_and_two_or_more_jobs" => 'nullable|string|max:1|regex:/^[0-9]+$/|in:有',
            "remarks_and_part_time_worker" => 'nullable|string|max:1|regex:/^[0-9]+$/|in:有',
            "remarks_and_part" => 'nullable|string|max:1|regex:/^[0-9]+$/|in:有',
            "remarks_and_others" => 'nullable|string|max:1|regex:/^[0-9]+$/|in:有',
            "comment_other" => 'nullable|string|max:10',
            "month_check" => 'nullable|string|max:8|in:有',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string',
        ];
    }
    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $year_of_birth_era = $data['year_of_birth_era'] ?? "";
            $year_of_birth = $data['year_of_birth'] ?? "";

            $birthday_japan_year = $data['year_of_birth'] ?? "";
            if(isset($data['year_of_birth']) && ctype_digit($data['year_of_birth'])) {
                if($year_of_birth_era === '5') {
                    $year_of_birth = 1925 + $data['year_of_birth'];
                } elseif($year_of_birth_era === '7') {
                    $year_of_birth = 1988 + $data['year_of_birth'];
                } elseif($year_of_birth_era === '9') {
                    $year_of_birth = 2018 + $data['year_of_birth'];
                }
            }
            $month_of_birth = $data['month_of_birth'] ?? "";
            $date_of_birth = $data['date_of_birth'] ?? "";
            $ch_year_of_birth_era = $data['ch_year_of_birth_era'] ?? "";
            $ch_year_of_birth = $data['ch_year_of_birth'] ?? "";
            if(isset($data['ch_year_of_birth']) && ctype_digit($data['ch_year_of_birth'])) {
                if($ch_year_of_birth_era === '令和') {
                    $ch_year_of_birth = 2018 + $data['ch_year_of_birth'];
                }
            }
            $ch_month_of_birth = $data['ch_month_of_birth'] ?? "";
            $ch_date_of_birth = $data['ch_date_of_birth'] ?? "";
            $closure_information_end_era = $data['closure_information_end_era'] ?? "";
            $closure_information_end_year = $data['closure_information_end_year'] ?? "";
            $closure_information_end_month = $data['closure_information_end_month'] ?? "";
            $closure_information_end_day = $data['closure_information_end_day'] ?? "";
            $pay_month1 = $data['pay_month1'] ?? "";
            $pay_month2 = $data['pay_month2'] ?? "";
            $pay_month3 = $data['pay_month3'] ?? "";
            if (!empty($pay_month1) && !empty($pay_month2) && !empty($pay_month3)) {
                if($pay_month1 == $pay_month2) {
                   $validator->errors()->add('pay_month2', '11_支給月は重複しないように入力してください。');
                }
                if($pay_month1 == $pay_month3) {
                   $validator->errors()->add('pay_month3', '11_支給月は重複しないように入力してください。');
                }
                if($pay_month2 == $pay_month3) {
                   $validator->errors()->add('pay_month3', '11_支給月は重複しないように入力してください。');
                }
            }
            $revised_era = $data['revised_era'] ?? "";
            $revised_year = $data['revised_year'] ?? "";
            $revised_japan_year = $data['revised_year'] ?? "";
            if(isset($data['revised_year']) && ctype_digit($data['revised_year'])) {
                if($revised_era === '7') {
                   $revised_year = 1988 + $data['revised_year'];
                } elseif($revised_era === '9') {
                   $revised_year = 2018 + $data['revised_year'];
                }
            }
            $revised_month = $data['revised_month'] ?? "";
            if (!empty($year_of_birth) && !empty($month_of_birth) && !empty($date_of_birth)) {
                try {
                    $input_birthday = new \DateTime("{$year_of_birth}-{$month_of_birth}-{$date_of_birth}");
                    $today = new \DateTime();
                    if ($input_birthday > $today) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は今日以前の日付を入力してください。');
                    }
                } catch (Exception $e) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は無効な日付が入力されました。');
                }
            }
            if(!empty($month_of_birth) && !empty($date_of_birth) && !empty($year_of_birth))  {
                if (ctype_digit($month_of_birth)) {
                    if (!checkdate($month_of_birth, $date_of_birth, $year_of_birth)) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($year_of_birth_era === '5') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 12 || ($month_of_birth == 12 && $date_of_birth < 25))) ||
                    ($birthday_japan_year == 64 && ($month_of_birth > 1 || ($month_of_birth == 1 && $date_of_birth > 7))) ||
                    ($birthday_japan_year > 64)
                ) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($year_of_birth_era === '7') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 1 || ($month_of_birth == 1 && $date_of_birth < 8))) ||
                    ($birthday_japan_year == 31 && ($month_of_birth > 4 || ($month_of_birth == 4 && $date_of_birth > 30))) ||
                    ($birthday_japan_year > 31)
                ) {
                    $validator->errors()->add('date_of_birth', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            } elseif ($year_of_birth_era === '9') {
                if ($birthday_japan_year == 1 && ($month_of_birth < 5 || ($month_of_birth == 5 && $date_of_birth < 1))) {
                        $validator->errors()->add('date_of_birth', '7_被保険者生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($ch_year_of_birth) && !empty($ch_month_of_birth) && !empty($ch_date_of_birth)) {
                try {
                    $input_birthday = new \DateTime("{$ch_year_of_birth}-{$ch_month_of_birth}-{$ch_date_of_birth}");
                    $today = new \DateTime();
                    if ($input_birthday > $today) {
                    $validator->errors()->add('ch_date_of_birth', '9_子の生年月日は今日以前の日付を入力してください。');
                    }
                } catch (Exception $e) {
                    $validator->errors()->add('ch_date_of_birth', '9_子の生年月日は無効な日付が入力されました。');
                }
            }
            if (!empty($ch_month_of_birth) && !empty($ch_date_of_birth)) {
                if (ctype_digit($ch_month_of_birth)) {
                    if (!checkdate($ch_month_of_birth, $ch_date_of_birth, '2000')) {
                    $validator->errors()->add('ch_date_of_birth', '9_子の生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($ch_year_of_birth_era === '令和') {
                if ($ch_year_of_birth == 1 && ($ch_month_of_birth < 5 || ($ch_month_of_birth == 5 && $ch_date_of_birth < 1))) {
                    $validator->errors()->add('ch_date_of_birth', '9_子の生年月日は正しい日付を入力してください。');
                    }
                }
            if (!empty($closure_information_end_month) && !empty($closure_information_end_day)) {
                if (ctype_digit($closure_information_end_month)) {
                    if (!checkdate($closure_information_end_month, $closure_information_end_day, '2000')) {
                        $validator->errors()->add('closure_information_end_day', '10_育児休業等終了年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($closure_information_end_era === '平成') {
                if (
                    ($closure_information_end_year == 1 && ($closure_information_end_month < 1 || ($closure_information_end_month == 1 && $closure_information_end_day < 8))) ||
                    ($closure_information_end_year == 31 && ($closure_information_end_month > 4 || ($closure_information_end_month == 4 && $closure_information_end_day > 30))) ||
                    ($closure_information_end_year > 31)
                ) {
                    $validator->errors()->add('closure_information_end_day', '10_育児休業等終了年月日は正しい日付を入力してください。');
                }
            } elseif ($closure_information_end_era === '令和') {
                if ($closure_information_end_year == 1 && ($closure_information_end_month < 5 || ($closure_information_end_month == 5 && $closure_information_end_day < 1))) {
                    $validator->errors()->add(' ', '10_育児休業等終了年月日は正しい日付を入力してください。');
                }
                        }
            if (!empty($revised_month) && !empty($revised_year))  {
                if (ctype_digit($revised_month)) {
                    if (!checkdate($revised_month, 1, $revised_year)) {
                    $validator->errors()->add('revised_month', '18_改定年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($revised_era === '7') {
                if (
                    ($revised_japan_year == 1 && ($revised_month <= 1 )) ||
                    ($revised_japan_year == 31 && ($revised_month >= 4 )) ||
                    ($revised_japan_year > 31)
                ) {
                    $validator->errors()->add('revised_month', '18_改定年月は正しい日付を入力してください。');
                }
            }  elseif ($revised_era === '9') {
                if ($revised_japan_year == 1 && $revised_month < 5 ) {
                        $validator->errors()->add('revised_month', '18_改定年月は正しい日付を入力してください。');
                }
            }
        });
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'ch_year_of_birth_era.required_with' => '9_子の生年月日（元号）を入力してください。',
            'ch_year_of_birth.required_with' => '9_子の生年月日（年）を入力してください。',
            'ch_month_of_birth.required_with' => '9_子の生年月日（月）を入力してください。',
            'ch_date_of_birth.required_with' => '9_子の生年月日（日）を入力してください。',
            'closure_information_end_era.required_with' => '10_育児休業等終了年月日（元号）を入力してください。',
            'closure_information_end_year.required_with' => '10_育児休業等終了年月日（年）を入力してください。',
            'closure_information_end_month.required_with' => '10_育児休業等終了年月日（月）を入力してください。',
            'closure_information_end_day.required_with' => '10_育児休業等終了年月日（日）を入力してください。',
            'revised_era.required_with' => '18_改定年月（元号）を入力してください。',
            'revised_year.required_with' => '18_改定年月（年）を入力してください。',
            'revised_month.required_with' => '18_改定年月（月）を入力してください。',
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
            'office_arrangement_code_county_city_ward_code' => '1_事業所整理記号（郡市区符号）',
            'office_reference_symbol_office_symbol' => '1_事業所整理記号（事業所記号）',
            'post_code_former' => '2_郵便番号（前３桁）',
            'post_code_latter' => '2_郵便番号（後４桁）',
            'branch_address' => '2_事業所所在地',
            'branch_name' => '2_事業所名称',
            'employer_company_managerial_position_name' => '2_事業主氏名',
            'branch_tel_area_code' => '2_電話番号（市外局番）',
            'branch_tel_city_code' => '2_電話番号（市内局番）',
            'branch_tel_subscriber_code' => '2_電話番号（加入者番号）',
            'labor_consultant_name' => '3_社会保険労務士記載欄',
            'insured_person_reference_number' => '4_被保険者整理番号',
            'my_number_or_basic_pension_number' => '5_個人番号（基礎年金番号）',
            'fullname_kana' => '6_被保険者氏名（フリガナ）',
            'fullname' => '6_被保険者氏名',
            'year_of_birth_era' => '7_被保険者生年月日（元号）',
            'year_of_birth' => '7_被保険者生年月日（年）',
            'month_of_birth' => '7_被保険者生年月日（月）',
            'date_of_birth' => '7_被保険者生年月日（日）',
            'ch_fullname_kana' => '8_子の氏名（カナ）',
            'ch_fullname' => '8_子の氏名',
            'ch_year_of_birth_era' => '9_子の生年月日（元号）',
            'ch_year_of_birth' => '9_子の生年月日（年）',
            'ch_month_of_birth' => '9_子の生年月日（月）',
            'ch_date_of_birth' => '9_子の生年月日（日）',
            'closure_information_end_era' => '10_育児休業等終了年月日（元号）',
            'closure_information_end_year' => '10_育児休業等終了年月日（年）',
            'closure_information_end_month' => '10_育児休業等終了年月日（月）',
            'closure_information_end_day' => '10_育児休業等終了年月日（日）',
            'pay_month1' => '11_支給月_1',
            'pay_month2' => '11_支給月_2',
            'pay_month3' => '11_支給月_3',
            'Basic_days_payroll_calculation1' => '11_給与計算の基礎日数_1',
            'Basic_days_payroll_calculation2' => '11_給与計算の基礎日数_2',
            'Basic_days_payroll_calculation3' => '11_給与計算の基礎日数_3',
            'currency_1' => '11_[ｱ]通貨_1',
            'currency_2' => '11_[ｱ]通貨_2',
            'currency_3' => '11_[ｱ]通貨_3',
            'genbutsu_1' => '11_[ｲ]現物_1',
            'genbutsu_2' => '11_[ｲ]現物_2',
            'genbutsu_3' => '11_[ｲ]現物_3',
            'sum1' => '11_[ｳ]合計([ｱ]+[ｲ])_1',
            'sum2' => '11_[ｳ]合計([ｱ]+[ｲ])_2',
            'sum3' => '11_[ｳ]合計([ｱ]+[ｲ])_3',
            'total' => '12_総計',
            'ave_amount' => '13_平均額',
            'adj_amount' => '14_修正平均額',
            'previous_standard_monthly_remuneration_health_insurance' => '15_従前標準報酬月額_健',
            'previous_standard_monthly_remuneration_employees_pension' => '15_従前標準報酬月額_厚',
            'pay_raise_increase_m' => '16_昇給降給_月',
            'pay_raise_increase' => '16_昇給降給',
            'retroactive_payment_month' => '17_遡及支払額_月',
            'retroactive_payment' => '17_遡及支払額',
            'revised_era' => '18_改定年月（元号）',
            'revised_year' => '18_改定年月（年）',
            'revised_month' => '18_改定年月（月）',
            'salary_payroll_deadline' => '19_給与締切日・支払日_締切日',
            'salary_payroll_month' => '19_支払日_「当月」か「翌月」のみ',
            'salary_payroll_day' => '19_給与締切日・支払日_支払日',
            'remarks_and_calculation_of_employees_aged_70_and_over' => '20_備考_70歳以上被用者',
            'remarks_and_two_or_more_jobs' => '20_備考_二以上勤務被保険者',
            'remarks_and_part_time_worker' => '20_備考_短時間労働者（特定適用事業所のみ）',
            'remarks_and_part' => '20_備考_パート',
            'remarks_and_others' => '20_備考_その他',
            'comment_other' => '20_備考_その他_記入欄',
            'month_check' => '21_開始していません',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '中分類（公共職業安定所）'

        ];
    }
}
