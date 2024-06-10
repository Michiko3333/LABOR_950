<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationLossRequest extends FormRequest
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
        if (isset($data['new_name'])) {
            $data['new_name'] = mb_convert_kana($data['new_name'], 'S');
        }
        if (isset($data['new_name_kana'])) {
            $data['new_name_kana'] = mb_convert_kana($data['new_name_kana'], 'S');
        }
        if (isset($data['company_name_abbreviation'])) {
            $data['company_name_abbreviation'] = mb_convert_kana($data['company_name_abbreviation'], 'AS');
            $data['company_name_abbreviation'] = str_replace(['-', '－', '―'], '‐', $data['company_name_abbreviation']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '－', '―'], '‐', $data['headquarters_address']);
        }
        if (isset($data['employee_address'])) {
            $data['employee_address'] = mb_convert_kana($data['employee_address'], 'AS');
            $data['employee_address'] = str_replace(['-', '－', '―'], '‐', $data['employee_address']);
        }
        if (isset($data['labor_consultant_acting_as_agent_name'])) {
            $data['labor_consultant_acting_as_agent_name'] = mb_convert_kana($data['labor_consultant_acting_as_agent_name'], 'S');
        }
        if (isset($data['labor_consultant_name'])) {
            $data['labor_consultant_name'] = mb_convert_kana($data['labor_consultant_name'], 'S');
        }
        if (isset($data['name_alphabet'])) {
            $data['name_alphabet'] = mb_convert_kana($data['name_alphabet'], 's');
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public static function rules(): array
    {
        return [
            "file_disqualification_status" => 'required_unless:radio_file_disqualification_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "employment_insured_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "employment_insured_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "employment_insured_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "insurance_office_no_4" => 'string|regex:/^[0-9]{4}$/u',
            "insurance_office_no_6" => 'string|regex:/^[0-9]{6}$/u',
            "insurance_office_no_CD" => 'string|regex:/^[0-9]{1}$/u',
            "insured_date_era" => 'string|max:2',
            "insured_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "insured_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "insured_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "retirement_date_era" => 'string|max:2',
            "retirement_date_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "retirement_date_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "retirement_date_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insurance_loss_reason" => 'int|in:1,2,3',
            "agreed_hours_day_hour" => 'string|regex:/^[0-9]{1,2}$/u',
            "agreed_hours_day_minute" => 'string|regex:/^[0-9]{1,2}$/u',
            "new_name" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "new_name_kana" => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "mynumber_card_no" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "name_kana" => 'nullable|string|max:255|regex:/^[０-９＋‐－ー＃￥＆．，：＊　ァ-ヴヵヶＡ-Ｚａ-ｚ]+$/u',
            "sex" => 'nullable|int|in:1,2',
            "birthday_era" => 'string|in:大正,昭和,平成,令和',
            "birthday_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "birthday_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "birthday_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "insured_age_type" => 'nullable|int|between:1,4',
            "hello_work_office_no" => 'nullable|string|regex:/^[0-9]{5}$/u',
            "employment_status" => 'string',
            "company_name_abbreviation" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９ａ-ｚＡ-Ｚ　＆’，‐．・]+\z/u',
            "employee_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－‐]+\z/u',
            "insured_reason" => 'string|max:255',
            "name_alphabet" => 'nullable|string|max:255|regex:/^[A-Z]+[ ][A-Z]+$/u',
            "residence_card_no" => 'nullable|string|regex:/^[A-Z]{2}[0-9]{8}[A-Z]{2}$/u',
            'stay_date_period_year' => 'nullable|int|max:2100|required_with:stay_date_period_month,stay_date_period_day',
            'stay_date_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:stay_date_period_year,stay_date_period_day',
            'stay_date_period_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:stay_date_period_month,stay_date_period_year',
            "employment_type" => 'nullable|int|in:1,2',
            "country" => 'nullable|string|regex:/^[0-9]{1,3}$/u',
            "residential_status" => 'nullable|string|regex:/^[0-9]{1,3}$/u',
            "residential_status_unknown_reason" => 'nullable|string|max:255',
            "notification_era" => 'string|max:2',
            "notification_year" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "notification_month" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "notification_day" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "headquarters_address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'employer_managerial_position_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            "headquarters_tel_area_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_city_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquarters_tel_subscriber_code" => 'string|regex:/^[0-9]{1,5}$/u',
            "hello_work_name" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            "labor_consultant_japan_era" => 'nullable|string|max:2',
            "labor_consultant_japan_era_year" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_month" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_day" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "labor_consultant_acting_as_agent_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_name" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "labor_consultant_tel_area_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_city_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "labor_consultant_tel_subscriber_code" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "other_notes" => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $birthdayEra = $data['birthday_era'];
            $birthdayYear = $data['birthday_year'];
            $birthdayMonth = $data['birthday_month'];
            $birthdayDay = $data['birthday_day'];
            $insuredEra = $data['insured_date_era'];
            $insuredYear = $data['insured_date_year'];
            $insuredMonth = $data['insured_date_month'];
            $insuredDay = $data['insured_date_day'];
            $retirementEra = $data['retirement_date_era'];
            $retirementYear = $data['retirement_date_year'];
            $retirementMonth = $data['retirement_date_month'];
            $retirementDay = $data['retirement_date_day'];
            
            if ($birthdayEra === '大正') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 7 || ($birthdayMonth == 7 && $birthdayDay < 30))) ||
                    ($birthdayYear == 15 && ($birthdayMonth == 12 && $birthdayDay > 25)) ||
                    ($birthdayYear > 15)
                ) {
                    $validator->errors()->add('birthday_day', '1枚目_生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '昭和') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 12 || ($birthdayMonth == 12 && $birthdayDay < 25))) ||
                    ($birthdayYear == 64 && ($birthdayMonth > 1 || ($birthdayMonth == 1 && $birthdayDay > 7))) ||
                    ($birthdayYear > 64)
                ) {
                    $validator->errors()->add('birthday_day', '1枚目_生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '平成') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 1 || ($birthdayMonth == 1 && $birthdayDay < 8))) ||
                    ($birthdayYear == 31 && ($birthdayMonth > 4 || ($birthdayMonth == 4 && $birthdayDay > 30))) ||
                    ($birthdayYear > 31)
                ) {
                    $validator->errors()->add('birthday_day', '1枚目_生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '令和') {
                if ($birthdayYear == 1 && ($birthdayMonth < 5 || ($birthdayMonth == 5 && $birthdayDay < 1))) {
                    $validator->errors()->add('birthday_day', '1枚目_生年月日は正しい日付を入力してください。');
                }
            }
            if(!empty($birthdayMonth) && !empty($birthdayDay)){
                if (!checkdate($birthdayMonth, $birthdayDay, '2000')) {
                    $validator->errors()->add('birthday_day','1枚目_生年月日は正しい日付を入力してください。');
                }
            }

            if ($insuredEra === '昭和') {
                if (
                    ($insuredYear == 1 && ($insuredMonth < 12 || ($insuredMonth == 12 && $insuredDay < 25))) ||
                    ($insuredYear == 64 && ($insuredMonth > 1 || ($insuredMonth == 1 && $insuredDay > 7))) ||
                    ($insuredYear > 64)
                ) {
                    $validator->errors()->add('insured_date_era', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif($insuredEra === '平成') {
                if (
                    ($insuredYear == 1 && ($insuredMonth < 1 || ($insuredMonth == 1 && $insuredDay < 8))) ||
                    ($insuredYear == 31 && ($insuredMonth > 4 || ($insuredMonth == 4 && $insuredDay > 30))) ||
                    ($insuredYear > 31)
                ) {
                    $validator->errors()->add('insured_date_era', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($insuredEra === '令和') {
                if ($insuredYear == 1 && ($insuredMonth < 5 || ($insuredMonth == 5 && $insuredDay < 1))) {
                    $validator->errors()->add('insured_date_era', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }
            if(!empty($insuredMonth) && !empty($insuredDay)){
                if (!checkdate($insuredMonth, $insuredDay, '2000')) {
                    $validator->errors()->add('insured_date_era','1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }

            if ($retirementEra === '平成') {
                if (
                    ($retirementYear == 1 && ($retirementMonth < 1 || ($retirementMonth == 1 && $retirementDay < 8))) ||
                    ($retirementYear == 31 && ($retirementMonth > 4 || ($retirementMonth == 4 && $retirementDay > 30))) ||
                    ($retirementYear > 31)
                ) {
                    $validator->errors()->add('retirement_date_era', '1枚目_離職年月日は正しい日付を入力してください。');
                }
            } elseif ($retirementEra === '令和') {
                if ($retirementYear == 1 && ($retirementMonth < 5 || ($retirementMonth == 5 && $retirementDay < 1))) {
                    $validator->errors()->add('retirement_date_era', '1枚目_離職年月日は正しい日付を入力してください。');
                }
            }
            if(!empty($retirementMonth) && !empty($retirementDay)){
                if (!checkdate($retirementMonth, $retirementDay, '2000')) {
                    $validator->errors()->add('retirement_date_era','1枚目_離職年月日は正しい日付を入力してください。');
                }
            }

            if(!empty($data['stay_date_period_year']) && !empty($data['stay_date_period_month']) && !empty($data['stay_date_period_day'])){
                if (!checkdate($data['stay_date_period_month'], $data['stay_date_period_day'], $data['stay_date_period_year'])) {
                    $validator->errors()->add('stay_date_period_year','1枚目_在留期間は正しい日付を入力してください。');
                }
            }
            if ($this->hasFile('file_disqualification_status')) {
                $totalSize += $this->file('file_disqualification_status')->getSize();
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
            'sex' => '1枚目_性別は選択肢の中のいずれかである必要があります。',
            'birthday_era' => '1枚目_生年月日_年号は選択肢の中のいずれかである必要があります。',
            'employment_status' => '1枚目_雇用形態は選択肢の中のいずれかである必要があります。',
            'country' => '1枚目_国籍・地域は選択肢の中のいずれかである必要があります。',
            'residential_status' => '1枚目_在留資格は選択肢の中のいずれかである必要があります。',
            'stay_date_period_year.required_with' => '1枚目_在留期間_年を入力してください。',
            'stay_date_period_month.required_with' => '1枚目_在留期間_月を入力してください。',
            'stay_date_period_day.required_with' => '1枚目_在留期間_日を入力してください。',
        ];  
    }
    public function attributes()
    {
        return [
            "file_disqualification_status" => '添付ファイル_資格喪失の事実、資格喪失日及び資格喪失の状況が確認できる書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'employment_insured_no_4' => '1枚目_被保険者番号4桁',
            'employment_insured_no_6' => '1枚目_被保険者番号6桁',
            'employment_insured_no_CD' => '1枚目_被保険者番号1桁',
            'insurance_office_no_4' => '1枚目_事業所番号4桁',
            'insurance_office_no_6' => '1枚目_事業所番号6桁',
            'insurance_office_no_CD' => '1枚目_事業所番号1桁',
            'insured_date_era' => '1枚目_資格取得年月日_年号',
            'insured_date_year' => '1枚目_資格取得年月日_年',
            'insured_date_month' => '1枚目_資格取得年月日_月',
            'insured_date_day' => '1枚目_資格取得年月日_日',
            'retirement_date_era' => '1枚目_離職年月日_年号',
            'retirement_date_year' => '1枚目_離職年月日_年',
            'retirement_date_month' => '1枚目_離職年月日_月',
            'retirement_date_day' => '1枚目_離職年月日_日',
            'insurance_loss_reason' => '1枚目_喪失原因',
            'agreed_hours_day_hour' => '1枚目_1週間の所定労働時間_時間',
            'agreed_hours_day_minute' => '1枚目_1週間の所定労働時間_分',
            'new_name' => '1枚目_新氏名',
            'new_name_kana' => '1枚目_新氏名（フリガナ）',
            'mynumber_card_no' => '1枚目_個人番号',
            'name_kana' => '1枚目_被保険者氏名',
            'sex' => '1枚目_性別',
            'birthday_era' => '1枚目_生年月日_年号',
            'birthday_year' => '1枚目_生年月日_年',
            'birthday_month' => '1枚目_生年月日_月',
            'birthday_day' => '1枚目_生年月日_日',
            'insured_age_type' => '1枚目_取得時被保険者種類',
            'hello_work_office_no' => '1枚目_管轄安定所番号',
            'employment_status' => '1枚目_雇用形態',
            'company_name_abbreviation' => '1枚目_事業所名略称',
            'employee_address' => '1枚目_被保険者の住所又は居所',
            'insured_reason' => '1枚目_被保険者でなくなったことの原因',
            'name_alphabet' => '1枚目_被保険者氏名（ローマ字）又は新氏名（ローマ字）',
            'residence_card_no' => '1枚目_在留カードの番号',
            'stay_date_period_year' => '1枚目_在留期間_年',
            'stay_date_period_month' => '1枚目_在留期間_月',
            'stay_date_period_day' => '1枚目_在留期間_日',
            'employment_type' => '1枚目_派遣・請負就労区分',
            'country' => '1枚目_国籍・地域',
            'residential_status' => '1枚目_在留資格',
            'residential_status_unknown_reason' => '1枚目_「不明」等の場合はその理由',
            'notification_era' => '1枚目_届出年月日_年号',
            'notification_year' => '1枚目_届出年月日_年',
            'notification_month' => '1枚目_届出年月日_月',
            'notification_day' => '1枚目_届出年月日_日',
            'headquarters_address' => '1枚目_事業主住所',
            'employer_company_managerial_position_name' => '1枚目_事業主氏名',
            'headquarters_tel_area_code' => '1枚目_事業主電話番号_市外局番',
            'headquarters_tel_city_code' => '1枚目_事業主電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '1枚目_事業主電話番号_加入者番号',
            'hello_work_name' => '1枚目_公共職業安定所あて先',
            'labor_consultant_japan_era' => '1枚目_社会保険労務士記載欄_作成年月日_年号',
            'labor_consultant_japan_era_year' => '1枚目_社会保険労務士記載欄_作成年月日_年',
            'labor_consultant_month' => '1枚目_社会保険労務士記載欄_作成年月日_月',
            'labor_consultant_day' => '1枚目_社会保険労務士記載欄_作成年月日_日',
            'labor_consultant_acting_as_agent_name' => '1枚目_社会保険労務士記載欄_提出代行者・事務代理者の表示',
            'labor_consultant_name' => '1枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_area_code' => '1枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '1枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '1枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'other_notes' => '1枚目_社会保険労務士記載欄下_付記欄',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
