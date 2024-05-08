<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeniorEmploymentContinuationBenefitClaimFormRequest extends FormRequest
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
        if (isset($data['branch_name'])) {
            $data['branch_name'] = mb_convert_kana($data['branch_name'], 'AS');
            $data['branch_name'] = str_replace(['-', '－', '‐', '－'], 'ー', $data['branch_name']);
        }
        if (isset($data['headquarters_address'])) {
            $data['headquarters_address'] = mb_convert_kana($data['headquarters_address'], 'AS');
            $data['headquarters_address'] = str_replace(['-', '－', '‐', '－'], 'ー', $data['headquarters_address']);
        }
        if (isset($data['agent_name'])) {
            $data['agent_name'] = mb_convert_kana($data['agent_name'], 'S');
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
        return [
            "file_wage_amount" => 'required_unless:radio_file_wage_amount,1|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_written_consent" => 'required_if:radio_file_written_consent,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            'labor_consultant_acting_as_agent' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'ledger_type' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|max:255|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'required|string|max:2',
            'qualifications_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'fullname' =>  'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'payer_japan_era_year1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid1' => 'required|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_japan_era_year3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month3' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'wage_reduction_days3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'note' => 'nullable|string|max:255',
            'jurisdiction' => 'nullable|int|between:1,9|regex:/^[0-9]{1}$/u',
            'employment_insurance_office_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'special_note_on_wages3' => 'nullable|string|max:255',
            'today_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'destination' => 'required|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'employer_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ－　]+\z/u',
            'labor_consultant_tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'benefits_types' => 'nullable|int|between:1,2',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'wage_deadline' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:3',
            'wage_structure_other' => 'nullable|string|max:5',
            'wage_structure' => 'nullable|string|max:3',
            'prescribed_working_days1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'prescribed_working_days2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'prescribed_working_days3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:1',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'branch_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'branch_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era3' => 'nullable|string|max:2',
            'today_japan_era' => 'required|string|max:2',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_wage_amount')) {
                $totalSize += $this->file('file_wage_amount')->getSize();
            }
            if ($this->hasFile('file_written_consent')) {
                $totalSize += $this->file('file_written_consent')->getSize();
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
        ];
    }

    public function attributes()
    {
        return [
            "file_wage_amount" => '添付ファイル_支給申請書に記載した賃金額等記載内容を確認できる書類',
            "file_written_consent" => '添付ファイル_支給申請に係る承諾書',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'labor_consultant_acting_as_agent' => '社会保険労務士記載欄_作成年月日・提出代行者・事務代理者',
            'labor_consultant_name' => '社会保険労務士記載欄_氏名',
            'ledger_type' => '帳票種別',
            'employment_insured_no_4digit' => '被保険者番号4桁',
            'employment_insured_no_6digit' => '被保険者番号6桁',
            'employment_insured_no_CD' => '被保険者番号1桁',
            'qualifications_japan_era' => '資格取得年月日_年号',
            'qualifications_japan_era_year' => '資格取得年月日_年',
            'qualifications_month' => '資格取得年月日_月',
            'qualifications_day' => '資格取得年月日_日',
            'fullname' => '被保険者氏名',
            'payer_japan_era_year1' => '支給対象年月_年_1',
            'payer_month1' => '支給対象年月_月_1',
            'wages_paid1' => '支給対象年月に支払われた賃金額_1',
            'wage_reduction_days1' => '賃金の減額のあった日_1',
            'payer_japan_era_year2' => '支給対象年月_年_1',
            'payer_month2' => '支給対象年月_月_2',
            'wages_paid2' => '支給対象年月に支払われた賃金額_2',
            'wage_reduction_days2' => '賃金の減額のあった日_2',
            'payer_japan_era_year3' => '支給対象年月_年_3',
            'payer_month3' => '支給対象年月_月_3',
            'wages_paid3' => '支給対象年月に支払われた賃金額_3',
            'wage_reduction_days3' => '賃金の減額のあった日_3',
            'note' => '備考欄_備考',
            'jurisdiction' => '管轄区分',
            'employment_insurance_office_no_4digit' => '事業所番号4桁',
            'employment_insurance_office_no_6digit' => '事業所番号6桁',
            'employment_insurance_office_no_CD' => '事業所番号1桁',
            'special_note_on_wages1' => 'その他賃金に関する特記事項_1',
            'special_note_on_wages2' => 'その他賃金に関する特記事項_2',
            'special_note_on_wages3' => 'その他賃金に関する特記事項_3',
            'today_japan_era_year' => '証明・申請欄_年月日_年',
            'today_japan_era_month' => '証明・申請欄_年月日_月',
            'today_japan_era_day' => '証明・申請欄_年月日_日',
            'destination' => '公共職業安定所あて先',
            'employer_name' => '事業主氏名',
            'headquarters_address' => '事業所名（所在地）',
            'labor_consultant_tel_area_code' => '社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄_電話番号_加入者番号',
            'fullname_kana' => 'フリガナ',
            'wage_deadline' => '備考欄_賃金締切日',
            'wage_payment_day' => '備考欄_賃金支払日',
            'wage_payment' => '備考欄_賃金支払日_支払時期',
            'wage_structure_other' => '備考欄_賃金形態_その他記載欄',
            'wage_structure' => '備考欄_賃金形態',
            'prescribed_working_days1' => '備考欄_所定労働日数_1',
            'prescribed_working_days2' => '備考欄_所定労働日数_2',
            'prescribed_working_days3' => '備考欄_所定労働日数_3',
            'commuting_allowance' => '備考欄_通勤手当の有無',
            'commuting_allowance_period' => '備考欄_通勤手当頻度',
            'commuting_allowance_period_other' => '備考欄_通勤手当頻度_その他記載欄',
            'branch_tel_treacode' => '事業所電話番号_市外局番',
            'branch_tel_city_code' => '事業所電話番号_市内局番',
            'branch_tel_subscriber_code' => '事業所電話番号_加入者番号',
            'payer_japan_era1' => '支給対象年月_年号_1',
            'payer_japan_era2' => '支給対象年月_年号_2',
            'payer_japan_era3' => '支給対象年月_年号_3',
            'today_japan_era' => '証明・申請欄_年月日_年号',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
