<?php

namespace App\Http\Requests;

use App\Rules\FullwidthAndMiscellaneousChars;
use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuredQualificationGetRequest extends BaseRequest
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
            $data['name'] = mb_convert_kana($data['name'], 'AKS');
        }
        if (isset($data['name_kana'])) {
            $data['name_kana'] = mb_convert_kana($data['name_kana'], 'KS');
        }
        if (isset($data['new_name'])) {
            $data['new_name'] = mb_convert_kana($data['new_name'], 'AKS');
        }
        if (isset($data['new_name_kana'])) {
            $data['new_name_kana'] = mb_convert_kana($data['new_name_kana'], 'KS');
        }
        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'AKS');
            $data['branch_name'] = str_replace(['-', '‐', '―'], '－', $data['branch_name']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AKS');
            $data['headquarters_address'] = str_replace(['-', '‐', '―'], '－', $data['headquarters_address']);
        }
        if (isset($data['agent_name'])) {
            $data['agent_name'] = mb_convert_kana($data['agent_name'], 'AKS');
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
            'file_other' => 'nullable|required_if:radio_file_other,2|file|mimes:jpg,pdf|max:50000',
            'input_file_other' => 'nullable|required_if:radio_file_other,2,1|string|max:255',
            'mynumber_card_no' => 'nullable|string|max:12|regex:/^[0-9]{12}$/u',
            'employment_insured_no_4' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'acquisition' => 'int|in:1,2',
            'name' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'name_kana' => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'new_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'new_name_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'sex' => 'int|in:1,2',
            'birthday_era' => 'string|in:大正,昭和,平成,令和',
            'birthday_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birthday_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birthday_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'insurance_office_no_4' => 'string|regex:/^[0-9]{4}$/u',
            'insurance_office_no_6' => 'string|regex:/^[0-9]{6}$/u',
            'insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'insured_reason' => 'int|in:1,2,3,4,8',
            'salary_payment_system' => 'int|in:1,2,3,4,5',
            'salary_amonut' => 'int|between:0,9999|regex:/^[0-9]{1,4}$/u',
            'insured_date_era' => 'string|in:平成,令和',
            'insured_date_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'insured_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'insured_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_status' => 'int|in:1,2,3,4,5,6,7',
            'occupation_type' => 'string|between:01,11',
            'employment_route' => 'int|in:1,2,3,4',
            'agreed_hours_week_hour' => 'string|between:0,99|regex:/^[0-9]{1,3}$/u',
            'agreed_hours_week_minute' => 'string|between:0,60|regex:/^[0-9]{1,2}$/u',
            'contract_period_flg' => 'string|in:有,無',
            'contract_start_era' => 'nullable|string|in:平成,令和',
            'contract_start_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:contract_start_month,contract_start_day',
            'contract_start_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:contract_start_year,contract_start_day',
            'contract_start_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:contract_start_year,contract_start_month',
            'contract_renewal_flg' => 'nullable|string|in:有,無',
            'contract_end_era' => 'nullable|string|in:平成,令和',
            'contract_end_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:contract_end_month,contract_end_day',
            'contract_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:contract_end_year,contract_end_day',
            'contract_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:contract_end_year,contract_end_month',
            'branch_name' => ['required', 'string', 'max:40', new FullwidthAndMiscellaneousChars(true)],
            'insured_reason_detail' => 'nullable|string|max:255',
            'first_alphabet' => 'nullable|string|max:255|regex:/\A[A-Z ]+\z/u',
            'residence_card_no' => 'nullable|string|max:12|regex:/\A[0-9A-Z]+\z/u',
            'stay_date_period_year' => 'nullable|int|max:2100|required_with:stay_date_period_month,stay_date_period_day',
            'stay_date_period_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:stay_date_period_year,stay_date_period_day',
            'stay_date_period_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:stay_date_period_month,stay_date_period_year',
            'unauthorized_activities_permission_flg' => 'nullable|string|in:有,無',
            'employment_type' => 'nullable|int|in:1,2',
            'country' => 'nullable|string|regex:/^[0-9]{1,3}$/u',
            'residential_status' => 'nullable|string|regex:/^[0-9]{1,3}$/u',
            'residential_status_unknown_reason' => 'nullable|string|max:255',
            'headquarters_address' => ['required', 'string', 'max:64', new FullwidthAndMiscellaneousChars(true)],
            'employer_company_managerial_position_name' => ['required', 'string', 'max:32', new FullwidthAndMiscellaneousChars(true)],
            'headquarters_tel_area_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'string|regex:/^[0-9]{1,5}$/u',
            'hello_work_name' => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'notification_era' => 'string|in:平成,令和',
            'notification_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'notification_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'notification_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'create_era' => 'nullable|string|in:平成,令和',
            'create_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:create_month,create_day',
            'create_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:create_year,create_day',
            'create_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u|required_with:create_year,create_month',
            'agent_name' => 'nullable|string|max:12|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_name' => ['nullable', 'string', 'max:30', new FullwidthAndMiscellaneousChars(true)],
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u|required_with:labor_consultant_tel_city_code,labor_consultant_tel_subscriber_code',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u|required_with:labor_consultant_tel_area_code,labor_consultant_tel_subscriber_code',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u|required_with:labor_consultant_tel_area_code,labor_consultant_tel_city_code',
            'memo' => 'nullable|string|max:255',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }

    public function withValidator($validator): void
    {
        parent::withValidator($validator);
        $validator->after(function ($validator) {
            $data = $validator->getData();
            $birthdayEra = $data['birthday_era'] ?? "";
            $birthdayYear = $data['birthday_year'] ?? "";
            $birthdayMonth = $data['birthday_month'] ?? "";
            $birthdayDay = $data['birthday_day'] ?? "";
            $insuredEra = $data['insured_date_era'] ?? "";
            $insuredYear = $data['insured_date_year'] ?? "";
            $insuredMonth = $data['insured_date_month'] ?? "";
            $insuredDay = $data['insured_date_day'] ?? "";

            if ($birthdayEra === '大正') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 7 || ($birthdayMonth == 7 && $birthdayDay < 30))) ||
                    ($birthdayYear == 15 && ($birthdayMonth == 12 && $birthdayDay > 25)) ||
                    ($birthdayYear > 15)
                ) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '昭和') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 12 || ($birthdayMonth == 12 && $birthdayDay < 25))) ||
                    ($birthdayYear == 64 && ($birthdayMonth > 1 || ($birthdayMonth == 1 && $birthdayDay > 7))) ||
                    ($birthdayYear > 64)
                ) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '平成') {
                if (
                    ($birthdayYear == 1 && ($birthdayMonth < 1 || ($birthdayMonth == 1 && $birthdayDay < 8))) ||
                    ($birthdayYear == 31 && ($birthdayMonth > 4 || ($birthdayMonth == 4 && $birthdayDay > 30))) ||
                    ($birthdayYear > 31)
                ) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            } elseif ($birthdayEra === '令和') {
                if ($birthdayYear == 1 && ($birthdayMonth < 5 || ($birthdayMonth == 5 && $birthdayDay < 1))) {
                    $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                }
            }

            if (!empty($birthdayMonth) && !empty($birthdayDay)) {
                if (ctype_digit($birthdayMonth)) {
                    if (!checkdate($birthdayMonth, $birthdayDay, '2000')) {
                        $validator->errors()->add('birthday_day', '生年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($insuredEra === '平成') {
                if (
                    ($insuredYear == 1 && ($insuredMonth < 1 || ($insuredMonth == 1 && $insuredDay < 8))) ||
                    ($insuredYear == 31 && ($insuredMonth > 4 || ($insuredMonth == 4 && $insuredDay > 30))) ||
                    ($insuredYear > 31)
                ) {
                    $validator->errors()->add('insured_date_era', '資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($insuredEra === '令和') {
                if ($insuredYear == 1 && ($insuredMonth < 5 || ($insuredMonth == 5 && $insuredDay < 1))) {
                    $validator->errors()->add('insured_date_era', '資格取得年月日は正しい日付を入力してください。');
                }
            }
            if (!empty($insuredMonth) && !empty($insuredDay)) {
                if (ctype_digit($insuredMonth)) {
                    if (!checkdate($insuredMonth, $insuredDay, '2000')) {
                        $validator->errors()->add('insured_date_era', '資格取得年月日は正しい日付を入力してください。');
                    }
                }
            }
            if (!empty($data['stay_date_period_year']) && !empty($data['stay_date_period_month']) && !empty($data['stay_date_period_day'])) {
                if (ctype_digit($data['stay_date_period_month'])) {
                    if (!checkdate($data['stay_date_period_month'], $data['stay_date_period_day'], $data['stay_date_period_year'])) {
                        $validator->errors()->add('stay_date_period_year', '在留期間は正しい日付を入力してください。');
                    }
                }
            }
            if (!empty($data['contract_end_era'])) {
                if ($data['contract_end_era'] === '平成') {
                    if (
                        ($data['contract_end_year'] == 1 && ($data['contract_end_month'] < 1 || ($data['contract_end_month'] == 1 && $data['contract_end_day'] < 8))) ||
                        ($data['contract_end_year'] == 31 && ($data['contract_end_month'] > 4 || ($data['contract_end_month'] == 4 && $data['contract_end_day'] > 30))) ||
                        ($data['contract_end_year'] > 31)
                    ) {
                        $validator->errors()->add('contract_end_day', '契約期間_終了年月日は正しい日付を入力してください。');
                    }
                } elseif ($data['contract_end_era'] === '令和') {
                    if ($data['contract_end_year'] == 1 && $data['contract_end_month'] < 5) {
                        $validator->errors()->add('contract_end_day', '契約期間_終了年月日は正しい日付を入力してください。');
                    }
                }
                if (!empty($data['contract_end_month']) && !empty($data['contract_end_day'])) {
                    if (ctype_digit($data['contract_end_month'])) {
                        if (!checkdate($data['contract_end_month'], $data['contract_end_day'], '2000')) {
                            $validator->errors()->add('contract_end_day', '契約期間_終了年月日は正しい日付を入力してください。');
                        }
                    }
                }
            }
        });
        $validator->sometimes('contract_end_era', 'in:令和', function ($input) {
            return $input->contract_start_era === '令和';
        });
        $validator->sometimes('contract_end_year', 'gt:contract_start_year', function ($input) {
            return $input->contract_start_era === $input->contract_end_era && $input->contract_start_year > $input->contract_end_year;
        });
        $validator->sometimes('contract_end_month', 'gt:contract_start_month', function ($input) {
            return $input->contract_start_era === $input->contract_end_era && $input->contract_start_year === $input->contract_end_year && $input->contract_start_month > $input->contract_end_month;
        });
        $validator->sometimes('contract_end_day', 'gt:contract_start_day', function ($input) {
            return $input->contract_start_era === $input->contract_end_era && $input->contract_start_year === $input->contract_end_year && $input->contract_start_month === $input->contract_end_month && $input->contract_start_day >= $input->contract_end_day;
        });

        $validator->sometimes('contract_start_month', 'gte:5', function ($input) {
            return $input->contract_start_era === '令和' && $input->contract_start_year == 1;
        });
        $validator->sometimes('contract_start_day', 'gte:8', function ($input) {
            return $input->contract_start_era === '平成' && $input->contract_start_year == 1 && $input->contract_start_month == 1;
        });
        $validator->sometimes('contract_start_month', 'lte:4', function ($input) {
            return $input->contract_start_era === '平成' && $input->contract_start_year >= 31;
        });
        $validator->sometimes('contract_start_day', 'lte:30', function ($input) {
            return $input->contract_start_era === '平成' && $input->contract_start_year >= 31 && $input->contract_start_month === 4;
        });
    }

    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
            'contract_end_year' => '契約期間_終了年月日_年は契約期間_開始年月日_年以降を入力してください。',
            'contract_end_month' => '契約期間_終了年月日_月は契約期間_開始年月日_月以降を入力してください。',
            'contract_end_day' => '契約期間_終了年月日_日は契約期間_開始年月日_日以降を入力してください。',
            'contract_start_era.required_with' => '契約期間_開始年月日_年号を入力してください。',
            'contract_start_year.required_with' => '契約期間_開始年月日_年を入力してください。',
            'contract_start_month.required_with' => '契約期間_開始年月日_月を入力してください。',
            'contract_start_day.required_with' => '契約期間_開始年月日_日を入力してください。',
            'contract_end_era.required_with' => '契約期間_終了年月日_年号を入力してください。',
            'contract_end_year.required_with' => '契約期間_終了年月日_年を入力してください。',
            'contract_end_month.required_with' => '契約期間_終了年月日_月を入力してください。',
            'contract_end_day.required_with' => '契約期間_終了年月日_日を入力してください。',
            'stay_date_period_year.required_with' => '在留期間_年を入力してください。',
            'stay_date_period_month.required_with' => '在留期間_月を入力してください。',
            'stay_date_period_day.required_with' => '在留期間_日を入力してください。',
            'create_year.required_with' => '社会保険労務士記載欄_作成年月日_年を入力してください。',
            'create_month.required_with' => '社会保険労務士記載欄_作成年月日_月を入力してください。',
            'create_day.required_with' => '社会保険労務士記載欄_作成年月日_日を入力してください。',
            'labor_consultant_tel_area_code.required_with' => '社会保険労務士記載欄_電話番号_市外局番を入力してください。',
            'labor_consultant_tel_city_code.required_with' => '社会保険労務士記載欄_電話番号_市内局番を入力してください。',
            'labor_consultant_tel_subscriber_code.required_with' => '社会保険労務士記載欄_電話番号_加入者番号を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'mynumber_card_no' => '個人番号',
            'employment_insured_no_4' => '被保険者番号4桁',
            'employment_insured_no_6' => '被保険者番号6桁',
            'employment_insured_no_CD' => '被保険者番号1桁',
            'acquisition' => '取得区分',
            'name' => '被保険者氏名',
            'name_kana' => '被保険者氏名（フリガナ）',
            'new_name' => '変更後の氏名',
            'new_name_kana' => '変更後の氏名（フリガナ）',
            'sex' => '性別',
            'birthday_era' => '生年月日_年号',
            'birthday_year' => '生年月日_年',
            'birthday_month' => '生年月日_月',
            'birthday_day' => '生年月日_日',
            'insurance_office_no_4' => '事業所番号4桁',
            'insurance_office_no_6' => '事業所番号6桁',
            'insurance_office_no_CD' => '事業所番号1桁',
            'insured_reason' => '被保険者となったことの原因',
            'salary_payment_system' => '賃金_支払いの形態',
            'salary_amonut' => '賃金_賃金月額',
            'insured_date_era' => '資格取得年月日_年号',
            'insured_date_year' => '資格取得年月日_年',
            'insured_date_month' => '資格取得年月日_月',
            'insured_date_day' => '資格取得年月日_日',
            'employment_status' => '雇用形態',
            'occupation_type' => '職種',
            'employment_route' => '就職経路',
            'agreed_hours_week_hour' => '1週間の所定労働時間_時間',
            'agreed_hours_week_minute' => '1週間の所定労働時間_分',
            'contract_period_flg' => '契約期間の定め',
            'contract_start_era' => '契約期間_開始年月日_年号',
            'contract_start_year' => '契約期間_開始年月日_年',
            'contract_start_month' => '契約期間_開始年月日_月',
            'contract_start_day' => '契約期間_開始年月日_日',
            'contract_renewal_flg' => '契約更新条項の有無',
            'contract_end_era' => '契約期間_終了年月日_年号',
            'contract_end_year' => '契約期間_終了年月日_年',
            'contract_end_month' => '契約期間_終了年月日_月',
            'contract_end_day' => '契約期間_終了年月日_日',
            'branch_name' => '事業所名',
            'insured_reason_detail' => '備考',
            'first_alphabet' => '被保険者氏名（ローマ字）',
            'residence_card_no' => '在留カードの番号',
            'stay_date_period_year' => '在留期間_年',
            'stay_date_period_month' => '在留期間_月',
            'stay_date_period_day' => '在留期間_日',
            'unauthorized_activities_permission_flg' => '資格外活動の許可の有無',
            'employment_type' => '派遣・請負就労区分',
            'country' => '国籍・地域',
            'residential_status' => '在留資格',
            'residential_status_unknown_reason' => '「不明」等の場合の理由',
            'headquarters_address' => '事業主住所',
            'employer_company_managerial_position_name' => '事業主氏名',
            'headquarters_tel_area_code' => '事業主電話番号_市外局番',
            'headquarters_tel_city_code' => '事業主電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '事業主電話番号_加入者番号',
            'hello_work_name' => '公共職業安定所あて先',
            'notification_era' => '届出年月日_年号',
            'notification_year' => '届出年月日_年',
            'notification_month' => '届出年月日_月',
            'notification_day' => '届出年月日_日',
            'create_era' => '社会保険労務士記載欄_作成年月日_年号',
            'create_year' => '社会保険労務士記載欄_作成年月日_年',
            'create_month' => '社会保険労務士記載欄_作成年月日_月',
            'create_day' => '社会保険労務士記載欄_作成年月日_日',
            'agent_name' => '社会保険労務士記載欄_提出代行者・事務代理者の表示',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名',
            'labor_consultant_tel_area_code' => '社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄_電話番号_加入者番号',
            'memo' => '社会保険労務士記載欄_付記欄',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '中分類（公共職業安定所）'
        ];
    }
}
