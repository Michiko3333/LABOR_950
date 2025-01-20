<?php

namespace App\Http\Requests;
use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class MaternityLeaveSalaryChangeNoticeOr70OverMaternitySalaryAdjustmentRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData()
    {
        $data = $this->all();
        if(isset($data['employer_company_managerial_position_name'])){
            $data['employer_company_managerial_position_name'] = mb_convert_kana($data['employer_company_managerial_position_name'],'AKS');
        }
        if (isset($data['insured_person_name_in_kana'])) {
            $data['insured_person_name_in_kana'] = mb_convert_kana($data['insured_person_name_in_kana'], 'KS');
        }
        if (isset($data['insured_person_name_in_kanji'])) {
            $data['insured_person_name_in_kanji'] = mb_convert_kana($data['insured_person_name_in_kanji'], 'AKS');
        }
        if (isset($data['child_insured_person_name_in_kana'])) {
            $data['child_insured_person_name_in_kana'] = mb_convert_kana($data['child_insured_person_name_in_kana'], 'KS');
        }
        if (isset($data['child_insured_person_name_in_kanji'])) {
            $data['child_insured_person_name_in_kanji'] = mb_convert_kana($data['child_insured_person_name_in_kanji'], 'AKS');
        }
        if (isset($data['labor_consultant_acting_as_agent'])) {
            $data['labor_consultant_acting_as_agent'] = mb_convert_kana($data['labor_consultant_acting_as_agent'], 'AKS');
        }
        if (isset($data['branch_address'])) {
            $data['branch_address'] = mb_convert_kana($data['branch_address'], 'AKS');
            $data['branch_address'] = str_replace(['-', '‐', '―'], '－', $data['branch_address']);
        }
        $this->merge($data);
        return $data;
    }
    public function rules(): array
    {
        FullwidthAndMiscellaneousChars::$attributes = $this->attributes();
        return[
            "today_year" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "today_month" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "today_date" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "office_arrangement_code_county_city_ward_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "office_reference_symbol_office_symbol" => 'required|string|max:4|regex:/^[0-9ァ-ヴー]+$/',
            "post_code_former" =>'required|string|regex:/^[0-9]{3}$/u',
            "post_code_latter" => 'required|string|regex:/^[0-9]{4}$/u',
            "branch_address" =>['required','string','max:75',new FullwidthAndMiscellaneousChars(true)],
            "branch_name" => ['required', 'string', 'max:50', new FullwidthAndMiscellaneousChars(true)],
            "employer_company_managerial_position_name" => ['required','string','max:25','regex:/^[あ-んァ-ヴー一-龥々A-Za-z]+$/',new FullwidthAndMiscellaneousChars(true)],
            "branch_tel_area_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "branch_tel_city_code" => 'required|string|max:4|regex:/^[0-9]+$/',
            "branch_tel_subscriber_code" => 'required|string|max:5|regex:/^[0-9]+$/',
            "labor_consultant_acting_as_agent" => ['nullable','string','max:40',new FullwidthAndMiscellaneousChars(true)],
            "insured_person_reference_number" =>'nullable|int|digits_between:0,6',
            "mynumber_card_no" => 'nullable|string|max:12|regex:/^[0-9]+$/',
            "basic_pension_number" => 'nullable|string|max:12|regex:/^[0-9]+$/',
            "insured_person_name_in_kana" =>[ 'required','string','max:25','regex:/^[ァ-ヴー　]+$/u',new FullwidthAndMiscellaneousChars(true)],
            "insured_person_name_in_kanji" => 'required|string|max:12|regex:/^[あ-んァ-ヴー一-龥々　]+$/',
            "birthday_era" => 'required|int|digits:1|regex:/^[0-9]+$/',
            "year_of_birth" => 'required|int|between:1,99|regex:/^[0-9]+$/',
            "month_of_birth" => 'required|int|between:1,12|regex:/^[0-9]+$/',
            "date_of_birth" => 'required|int|between:1,31|regex:/^[0-9]+$/',
            "child_insured_person_name_in_kana" =>  ['nullable','string','max:25','regex:/^[ァ-ヴー　]+$/u',new FullwidthAndMiscellaneousChars(true)],
            "child_insured_person_name_in_kanji" => 'nullable|string|max:12|regex:/^[あ-んァ-ヴー一-龥々　]+$/',
            "child_birthday_era" => 'nullable|in:令和|required_with:child_year_of_birth,child_month_of_birth,child_date_of_birth',
            "child_year_of_birth" =>  'nullable|int|between:1,99|required_with:child_birthday_era,child_month_of_birth,child_date_of_birth',
            "child_month_of_birth" => 'nullable|int|between:1,12|required_with:child_year_of_birth,child_birthday_era,child_date_of_birth',
            "child_date_of_birth" => 'nullable|int|between:1,31|required_with:child_year_of_birth,child_month_of_birth,child_birthday_era',
            "prenatal_postnatal_end_date_japane_era" =>'nullable|in:令和|required_with:prenatal_postnatal_end_date_year,prenatal_postnatal_end_date_mont,prenatal_postnatal_end_date_day',
            "prenatal_postnatal_end_date_year" => 'nullable|int|between:1,99|required_with:prenatal_postnatal_end_date_japane_era,prenatal_postnatal_end_date_month,prenatal_postnatal_end_date_day',
            "prenatal_postnatal_end_date_month" =>  'nullable|int|between:1,12|required_with:prenatal_postnatal_end_date_japane_era,prenatal_postnatal_end_date_year,prenatal_postnatal_end_date_day',
            "prenatal_postnatal_end_date_day" => 'nullable|int|between:1,31|required_with:prenatal_postnatal_end_date_japane_era,prenatal_postnatal_end_date_year,prenatal_postnatal_end_date_month',
            "salary_payment_month1" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month2" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_payment_month3" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio1" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio2" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "basic_number_of_days_for_payroll_calculatio3" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency1" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind1" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total1" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "grand_total" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "average_amount" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "adjusted_average_amount" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency2" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind2" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total2" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_currency3" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_amount_in_kind3" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "monthly_remuneration_total3" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration_health_insurance" => 'nullable|int|between:0,9999|regex:/^[0-9]+$/',
            "previous_standard_monthly_remuneration" => 'nullable|int|between:0,9999|regex:/^[0-9]+$/',
            "monthly_salary_increase" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "salary_ncrease" =>'nullable|String|in:昇給,降給',
            "retroactive_payment_amount_month" => 'nullable|int|between:1,12|regex:/^[0-9]+$/',
            "retroactive_payment_amount" => 'nullable|int|between:0,9999999|regex:/^[0-9]+$/',
            "previous_revision_date_era" =>'nullable|in:9|required_with:previous_revision_year,previous_revision_year',
            "previous_revision_year" => 'nullable|int|between:1,99|required_with:previous_revision_date_era,previous_revision_month',
            "previous_revision_month" =>'nullable|int|between:1,12|required_with:previous_revision_date_era,previous_revision_year',
            "salary_payroll_deadline" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "salary_payroll_month" =>'nullable|String|in:当月,翌月',
            "salary_payroll_day" => 'nullable|int|between:1,31|regex:/^[0-9]+$/',
            "remarks_and_calculation_of_employees_aged_70_and_over" => 'nullable|String|in:有',
            "remarks_and_two_or_more_jobs" => 'nullable|String|in:有',
            "remarks_and_part_time_worker" => 'nullable|String|in:有',
            "remarks_and_part" => 'nullable|String|in:有',
            "remarks_and_others" => 'nullable|String|in:有',
            "text_remarks_and_others" => 'nullable|string|max:10',
            "month_applicable" => 'nullable|string|in:開始していません|max:8',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'selected_prefecture'=>'required|string',
            'selected_pension_office'=> 'required|string',
        ];
    }
    public function withValidator($validator): void{
        parent::withValidator($validator);
        $validator->after(function ($validator){
            $data = $validator->getData();
            $today_year = $data['today_year'] ?? "";
            $today_month =$data['today_month'] ?? "";
            $birthday_era = $data['birthday_era'] ?? "";
            $birthday_japan_year = $data['year_of_birth'] ?? "";
            $month_of_birth = $data['month_of_birth'] ?? "";
            $date_of_birth = $data['date_of_birth'] ?? "";
            $child_birthday_era = $data['child_birthday_era'] ?? "";
            $child_year_of_birth = $data['child_year_of_birth'] ?? "";
            $child_month_of_birth = $data['child_month_of_birth'] ?? "";
            $child_date_of_birth = $data['child_date_of_birth'] ?? "";
            $prenatal_postnatal_end_date_japane_era = $data['prenatal_postnatal_end_date_japane_era'] ?? "";
            $prenatal_postnatal_end_date_year = $data['prenatal_postnatal_end_date_year'] ?? "";
            $prenatal_postnatal_end_date_month = $data['prenatal_postnatal_end_date_month'] ?? "";
            $prenatal_postnatal_end_date_day = $data['prenatal_postnatal_end_date_day'] ?? "";
            $salary_payment_month1 = $data['salary_payment_month1'] ?? "";
            $salary_payment_month2 = $data['salary_payment_month2'] ?? "";
            $salary_payment_month3 = $data['salary_payment_month3'] ?? "";

            if (!empty($salary_payment_month1) && !empty($salary_payment_month2) && !empty($salary_payment_month3)) {

                if ($salary_payment_month1== $salary_payment_month2) {
                    $validator->errors()->add('salary_payment_month2', '⑨支給月は重複しないように入力してください。');
                }
                if ($salary_payment_month1== $salary_payment_month3) {
                    $validator->errors()->add('salary_payment_month3', '⑨支給月は重複しないように入力してください。');
                }
                if ($salary_payment_month2== $salary_payment_month3) {
                    $validator->errors()->add('salary_payment_month3', '⑨支給月は重複しないように入力してください。');
                }
            }

            if (isset($data['today_year']) && ctype_digit($data['today_year'])) {
                $today_year = 2018 + $data['today_year'];
            }
            if(isset($data['year_of_birth']) && ctype_digit($data['year_of_birth'])) {
                if($birthday_era === '1') {
                        $year_of_birth = 1867 + $data['year_of_birth'];
                    } elseif($birthday_era === '3') {
                        $year_of_birth = 1911 + $data['year_of_birth'];
                    } elseif($birthday_era === '5') {
                        $year_of_birth = 1925 + $data['year_of_birth'];
                    } elseif($birthday_era === '7') {
                        $year_of_birth = 1988 + $data['year_of_birth'];
                    } elseif($birthday_era === '9') {
                        $year_of_birth = 2018 + $data['year_of_birth'];
                    }
            }

            if(isset($data['child_year_of_birth']) && ctype_digit($data['child_year_of_birth'])) {
                if($child_birthday_era === '令和') {
                        $child_year_of_birth = 2018 + $data['child_year_of_birth'];
                    }
            }

            if (!empty($child_month_of_birth) && !empty($child_date_of_birth) && !empty($child_year_of_birth)) {
                if (ctype_digit($child_month_of_birth) && ctype_digit($child_date_of_birth)) {
                    if (!checkdate($child_month_of_birth,$child_date_of_birth,$child_year_of_birth)) {
                        $validator->errors()->add('child_date_of_birth', '⑨子の生年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($child_birthday_era === '令和') {
                if ($data['child_year_of_birth']== 1 && ($child_month_of_birth < 5 || ($child_month_of_birth == 5 && $child_date_of_birth < 1))) {
                    $validator->errors()->add('child_date_of_birth', '⑨子の生年月日は正しい日付を入力してください。');
                }
            }
            if(isset($data['prenatal_postnatal_end_date_year']) && ctype_digit($data['prenatal_postnatal_end_date_year'])) {
                if($prenatal_postnatal_end_date_japane_era === '令和') {
                        $prenatal_postnatal_end_date_year = 2018 + $data['prenatal_postnatal_end_date_year'];
                    }
            }

            if (!empty($prenatal_postnatal_end_date_month) && !empty($prenatal_postnatal_end_date_day) && !empty($prenatal_postnatal_end_date_year)) {
                if (ctype_digit($prenatal_postnatal_end_date_month) && ctype_digit($prenatal_postnatal_end_date_day)) {
                    if (!checkdate($prenatal_postnatal_end_date_month,$prenatal_postnatal_end_date_day,$prenatal_postnatal_end_date_year)) {
                        $validator->errors()->add('prenatal_postnatal_end_date_day', '⑩産前産後休業終了年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($prenatal_postnatal_end_date_japane_era === '令和') {
                if ($data['prenatal_postnatal_end_date_year']== 1 && ($prenatal_postnatal_end_date_month < 5 || ($prenatal_postnatal_end_date_month == 5 && $prenatal_postnatal_end_date_day < 1))) {
                    $validator->errors()->add('prenatal_postnatal_end_date_day', '⑩産前産後休業終了年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($today_month) && !empty($today_date) && !empty($today_year)) {
                if (ctype_digit($today_month) && ctype_digit($today_date)) {
                    if (!checkdate($today_month, $today_date, $today_year)) {
                        $validator->errors()->add('today_date', '提出年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($today_year == 1 && ($today_month < 5)) {
                $validator->errors()->add('today_date', '提出年月日は正しい日付を入力してください。');
            }

            if (!empty($month_of_birth) && !empty($date_of_birth) && !empty($year_of_birth)) {
                if (ctype_digit($month_of_birth) && ctype_digit($date_of_birth)) {
                    if (!checkdate($month_of_birth, $date_of_birth, $year_of_birth)) {
                        $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                    }
                }
            }
            if ($birthday_era === '1') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 9 || ($month_of_birth == 9 && $date_of_birth < 8))) ||
                    ($birthday_japan_year == 45 && ($month_of_birth > 7 || ($month_of_birth == 7 && $date_of_birth > 30))) ||
                    ($birthday_japan_year > 45)
                ) {
                    $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '3') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 7 || ($month_of_birth == 7 && $date_of_birth < 30))) ||
                    ($birthday_japan_year == 15 && ($month_of_birth == 12 && $date_of_birth > 25)) ||
                    ($birthday_japan_year > 15)
                ) {
                    $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '5') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 12 || ($month_of_birth == 12 && $date_of_birth < 25))) ||
                    ($birthday_japan_year == 64 && ($month_of_birth > 1 || ($month_of_birth == 1 && $date_of_birth > 7))) ||
                    ($birthday_japan_year > 64)
                ) {
                    $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '7') {
                if (
                    ($birthday_japan_year == 1 && ($month_of_birth < 1 || ($month_of_birth == 1 && $date_of_birth < 8))) ||
                    ($birthday_japan_year == 31 && ($month_of_birth > 4 || ($month_of_birth == 4 && $date_of_birth > 30))) ||
                    ($birthday_japan_year > 31)
                ) {
                    $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthday_era === '9') {
                if ($birthday_japan_year == 1 && ($month_of_birth < 5 || ($month_of_birth == 5 && $date_of_birth < 1))) {
                    $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($year_of_birth) && !empty($month_of_birth) && !empty($date_of_birth)) {
                try {
                    $input_birthday = new \DateTime("{$year_of_birth}-{$month_of_birth}-{$date_of_birth}");
                    $today = new \DateTime();
                    if ($input_birthday > $today) {
                        $validator->errors()->add('date_of_birth', '⑦被保険者の生年月日は今日以前の日付を入力してください。');
                    }
                } catch (Exception $e) {
                    $validator->errors()->add('date_of_birth', '⑦無効な日付が入力されました。');
                }
            }

        });
    }

    public function messages()
    {
        return[
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'child_birthday_era' => '⑨子の生年月日（元号）を入力してください。',
            'child_year_of_birth' => '⑨子の生年月日（年）を入力してください。',
            'child_month_of_birth' =>'⑨子の生年月日（月）を入力してください。',
            'child_date_of_birth' => '⑨子の生年月日（日）を入力してください。',
            'prenatal_postnatal_end_date_japane_era' =>'⑩産前産後休業終了年月日（元号）を入力してください。',
            'prenatal_postnatal_end_date_year' => '⑩産前産後休業終了年月日（年）を入力してください。',
            'prenatal_postnatal_end_date_month' => '⑩産前産後休業終了年月日（月）を入力してください。',
            'prenatal_postnatal_end_date_day' =>'⑩産前産後休業終了年月日（日）を入力してください。',
            "previous_revision_date_era" =>'⑱改定年月（元号）を入力してください。',
            "previous_revision_year" => '⑱改定年月（年）を入力してください。',
            "previous_revision_month" =>'⑱改定年月（月）を入力してください。',

        ];
    }
    public function attributes()
    {
        return [
            'today_year' => '提出年',
            'today_month' => '提出月',
            'today_date' => '提出日',
            'office_arrangement_code_county_city_ward_code' => '①事業所整理記号-郡市区記号',
            'office_reference_symbol_office_symbol' => '①事業所整理記号-事業所記号',
            'post_code_former' => '②郵便番号（前３桁）',
            'post_code_latter' => '②郵便番号（後４桁）',
            'branch_address' => '②事業所所在地',
            'branch_name' => '②事業所名称',
            'employer_company_managerial_position_name' => '②事業主氏名',
            'branch_tel_area_code' => '②電話番号（市外局番）',
            'branch_tel_city_code' => '②電話番号（市内局番）',
            'branch_tel_subscriber_code' => '②電話番号（加入者番号）',
            'labor_consultant_acting_as_agent' => '③社会保険労務士記載欄',
            'insured_person_reference_number' => '④被保険者整理番号',
            'mynumber_card_no' => '⑤個人番号',
            'basic_pension_number' => '⑤基礎年金番号',
            'insured_person_name_in_kana' => '⑥被保険者氏名（フリガナ）',
            'insured_person_name_in_kanji' => '⑥被保険者氏名',
            'birthday_era' => '⑦被保険者生年月日（元号）',
            'year_of_birth' => '⑦被保険者生年月日（年）',
            'month_of_birth' => '⑦被保険者生年月日（月）',
            'date_of_birth' => '⑦被保険者生年月日（日）',
            'child_insured_person_name_in_kana' => '⑧子の氏名（フリガナ）',
            'child_insured_person_name_in_kanji' => '⑧子の氏名',
            'child_birthday_era' => '⑨子の生年月日（元号）',
            'child_year_of_birth' => '⑨子の生年月日（年）',
            'child_month_of_birth' => '⑨子の生年月日（月）',
            'child_date_of_birth' => '⑨子の生年月日（日）',
            'prenatal_postnatal_end_date_japane_era' => '⑩産前産後休業終了年月日（元号）',
            'prenatal_postnatal_end_date_year' => '⑩産前産後休業終了年月日（年）',
            'prenatal_postnatal_end_date_month' => '⑩産前産後休業終了年月日（月）',
            'prenatal_postnatal_end_date_day' => '⑩産前産後休業終了年月日（日）',
            'salary_payment_month1' => '⑪支給月1x月',
            'basic_number_of_days_for_payroll_calculatio1' => '⑪給与計算の基礎日数1x日',
            'monthly_remuneration_amount_in_currency1' => '⑪通貨1',
            'monthly_remuneration_amount_in_kind1' => '⑪現物1',
            'monthly_remuneration_total1' => '⑪合計1',
            'grand_total' => '⑫総計',
            'average_amount' => '⑬平均額',
            'adjusted_average_amount' => '⑭修正平均額',
            'salary_payment_month2' => '⑪支給月2x月',
            'basic_number_of_days_for_payroll_calculatio2' => '⑪給与計算の基礎日数2x日',
            'monthly_remuneration_amount_in_currency2' => '⑪通貨2',
            'monthly_remuneration_amount_in_kind2' => '⑪現物2',
            'monthly_remuneration_total2' => '⑪合計2',
            'salary_payment_month3' => '⑪支給月3x月',
            'basic_number_of_days_for_payroll_calculatio3' => '⑪給与計算の基礎日数3x日',
            'monthly_remuneration_amount_in_currency3' => '⑪通貨3',
            'monthly_remuneration_amount_in_kind3' => '⑪現物3',
            'monthly_remuneration_total3' => '⑪合計3',
            'previous_standard_monthly_remuneration_health_insurance' => '⑮従前標準報酬月額x健',
            'previous_standard_monthly_remuneration' => '⑮従前標準報酬月額x厚',
            'monthly_salary_increase' => '⑯昇給降給x月',
            'salary_ncrease' => '⑯昇給降給区分',
            'retroactive_payment_amount_month' => '⑰遡及支払額x月',
            'retroactive_payment_amount' => '⑰遡及支払額',
            'previous_revision_date_era' => '⑱改定年月（元号）',
            'previous_revision_year' => '⑱改定年月（年）',
            'previous_revision_month' => '⑱改定年月（月）',
            'salary_payroll_deadline' => '⑲給与締切日',
            'salary_payroll_month' => '⑲給与支払日x選択',
            'salary_payroll_day' => '⑲給与支払日x日',
            'remarks_and_calculation_of_employees_aged_70_and_over' => '⑳備考x選択x70歳以上被利用者',
            'remarks_and_two_or_more_jobs' => '⑳備考x選択x二以上勤務被保険者',
            'remarks_and_part_time_worker' => '⑳備考x選択x短時間労働者',
            'remarks_and_part' => '⑳備考x選択xパート',
            'remarks_and_others' => '⑳備考x選択xその他',
            'text_remarks_and_others' => '⑳備考xその他',
            'month_applicable' => '㉑月変該当の確認',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'selected_prefecture'=> '提出先選択_大分類（都道府県）',
            'selected_pension_office'=> '提出先選択_中分類（年金事務所）'
        ];
    }
}
