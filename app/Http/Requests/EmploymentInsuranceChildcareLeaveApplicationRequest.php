<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentInsuranceChildcareLeaveApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "file_amount_days_time" => 'required_unless:radio_file_amount_days_time,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_written_consent" => 'required_if:radio_file_written_consent,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_extension_reason" => 'required_if:radio_file_extension_reason,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse" => 'required_if:radio_file_spouse,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse_childcare_leave" => 'required_if:radio_file_spouse_childcare_leave,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'ledger_type' => 'required|string|regex:/^[0-9]{1,5}$/u',
            'fullname_kana_number_symbol' => 'required|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'required|string|max:2',
            'qualifications_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_japane_era' => 'required|string|max:2',
            'childcare_start_date_japane_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'employment_insurance_office_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'birth_date_japan_era' => 'nullable|string|max:2',
            'birth_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birth_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birth_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'fullname' => 'required|string|regex:/^[ぁ-んァ-ン一-龥　]+\z/u',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'payer_japan_era1' => 'required|string|max:2',
            'payer_japan_era_year1' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day1' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payer_end_month1' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_end_day1' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payer_end_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_end_day2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'last_payer_japan_era' => 'nullable|string|max:2',
            'last_payer_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'last_payer_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'last_payer_japan_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'last_payer_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'last_payer_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason' => 'nullable|int|between:1,6|regex:/^[0-6]{1}$/u',
            'payment_period_extension_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_end_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_end_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'partner_childcare_leave_taken' => 'nullable|int|regex:/^1$/u',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'special_note_on_wages1' => 'nullable|string|max:255',
            'special_note_on_wages2' => 'nullable|string|max:255',
            'today_japan_era' => 'required|string|max:2',
            'today_japan_era_year' => 'required|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_month' => 'required|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_day' => 'required|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥ａ-ｚＡ-Ｚ　]+\z/u',
            'headquarters_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'destination' => 'required|string|max:255|regex:/\A[ぁ-んァ-ンー一-龥０-９ａ-ｚＡ-Ｚ　]+\z/u',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+[　][ぁ-んァ-ヴー一-龥ａ-ｚＡ-Ｚ]+$/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'wage_deadline' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:4',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance_period' => 'nullable|string|max:4',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'unsettled_japan_era' => 'nullable|string|max:2',
            'unsettled_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'unsettled_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'unsettled_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'note' => 'nullable|string|max:255',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_amount_days_time')) {
                $totalSize += $this->file('file_amount_days_time')->getSize();
            }
            if ($this->hasFile('file_written_consent')) {
                $totalSize += $this->file('file_written_consent')->getSize();
            }
            if ($this->hasFile('file_extension_reason')) {
                $totalSize += $this->file('file_extension_reason')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
            }
            if ($this->hasFile('file_other')) {
                $totalSize += $this->file('file_other')->getSize();
            }
            if ($totalSize > 99 * 1024 * 1024) {
                $validator->errors()->add('file_total_size', 'ファイルの合計サイズは99MB以下である必要があります。');
            }
        });
    }
    

    public function attributes()
    {
        return [
            'ledger_type' => '帳票種別',
            'fullname_kana_number_symbol' => '氏名',
            'employment_insured_no_4digit' => '被保険者番号4桁',
            'employment_insured_no_6digit' => '被保険者番号6桁',
            'employment_insured_no_CD' => '被保険者番号1桁',
            'qualifications_japan_era' => '資格取得年月日/年号',
            'qualifications_japan_era_year' => '資格取得年月日/年',
            'qualifications_month' => '資格取得年月日/月',
            'qualifications_day' => '資格取得年月日/日',
            'childcare_start_date_japane_era' => '育児休業開始年月日/年号',
            'childcare_start_date_japane_era_year' => '育児休業開始年月日/年',
            'childcare_start_date_month' => '育児休業開始年月日/月',
            'childcare_start_date_day' => '育児休業開始年月日/日',
            'employment_insurance_office_no_4digit' => '事業所番号4桁',
            'employment_insurance_office_no_6digit' => '事業所番号6桁',
            'employment_insurance_office_no_CD' => '事業所番号1桁',
            'birth_date_japan_era' => '出産年月日/年号',
            'birth_date_japan_era_year' => '出産年月日/年',
            'birth_date_month' => '出産年月日/月',
            'birth_date_day' => '出産年月日/日',
            'fullname' => '被保険者氏名',
            'fullname_kana' => 'フリガナ（カタカナ）',
            'payer_japan_era1' => '支給単位期間_1（初日）/年号',
            'payer_japan_era_year1' => '支給単位期間_1（初日）/年',
            'payer_month1' => '支給単位期間_1（初日）/月',
            'payer_day1' => '支給単位期間_1（初日）/日',
            'payer_end_month1' => '支給単位期間_1（末日）/月',
            'payer_end_day1' => '支給単位期間_1（末日）/日',
            'workday_count1' => '就業日数_1',
            'working_hours1' => '就業時間_1',
            'wages_paid1' => '支払われた賃金額_1',
            'payer_japan_era2' => '支給単位期間_2（初日）/年号',
            'payer_japan_era_year2' => '支給単位期間_2（初日）/年',
            'payer_month2' => '支給単位期間_2（初日）/月',
            'payer_day2' => '支給単位期間_2（初日）/日',
            'payer_end_month2' => '支給単位期間_2（末日）/月',
            'payer_end_day2' => '支給単位期間_2（末日）/日',
            'workday_count2' => '就業日数_2',
            'working_hours2' => '就業時間_2',
            'wages_paid2' => '支払われた賃金額_2',
            'last_payer_japan_era' => '最終支給単位期間（初日）/年号',
            'last_payer_japan_era_year' => '最終支給単位期間（初日）/年',
            'last_payer_month' => '最終支給単位期間（初日）/月',
            'last_payer_japan_day' => '最終支給単位期間（初日）/日',
            'last_payer_end_month' => '最終支給単位期間（末日）/月',
            'last_payer_end_day' => '最終支給単位期間（末日）/日',
            'workday_count3' => '就業日数_最終',
            'working_hours3' => '就業時間_最終',
            'wages_paid3' => '支払われた賃金額_最終',
            'return_from_resignation_japan_era' => '職場復帰年月日/年号',
            'return_from_resignation_japan_era_year' => '職場復帰年月日/年',
            'return_from_resignation_month' => '職場復帰年月日/月',
            'return_from_resignation_day' => '職場復帰年月日/日',
            'payment_period_extension_reason' => '支給対象となる期間の延長事由',
            'payment_period_extension_japan_era' => '支給対象となる期間の延長期間_初日/年号',
            'payment_period_extension_japan_era_year' => '支給対象となる期間の延長期間_初日/年',
            'payment_period_extension_month' => '支給対象となる期間の延長期間_初日/月',
            'payment_period_extension_day' => '支給対象となる期間の延長期間_初日/日',
            'payment_period_extension_end_month' => '支給対象となる期間の延長期間_末日/月',
            'payment_period_extension_end_day' => '支給対象となる期間の延長期間_末日/日',
            'partner_childcare_leave_taken' => '配偶者育休取得',
            'partner_insured_no_4digit' => '配偶者の被保険者番号4桁',
            'partner_insured_no_6digit' => '配偶者の被保険者番号6桁',
            'partner_insured_no_CD' => '配偶者の被保険者番号1桁',
            'special_note_on_wages1' => 'その他賃金に関する特記事項_1',
            'special_note_on_wages2' => 'その他賃金に関する特記事項_2',
            'today_japan_era' => '証明・申請欄/年月日/年号',
            'today_japan_era_year' => '証明・申請欄/年月日/年',
            'today_japan_month' => '証明・申請欄/年月日/月',
            'today_japan_day' => '証明・申請欄/年月日/日',
            'headquarters_address' => '事業所名（所在地）',
            'headquarters_tel_treacode' => '事業所電話番号（市外局番）',
            'headquarters_tel_city_code' => '事業所電話番号（市内局番）',
            'headquarters_tel_subscriber_code' => '事業所電話番号（加入者番号）',
            'employer_company_managerial_position_name' => '事業主氏名',
            'destination' => '公共職業安定所あて先',
            'labor_consultant_acting_as_agent_name' => '社会保険労務士記載欄/作成年月日・提出代行者・事務代理者',
            'labor_consultant_name' => '社会保険労務士記載欄/氏名',
            'labor_consultant_tel_treacode' => '社会保険労務士記載欄/電話番号（市外局番',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄/電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄/電話番号（加入者番号',
            'wage_deadline' => '備考欄/賃金締切日',
            'wage_payment' => '備考欄/賃金支払日_支払時期',
            'wage_payment_day' => '備考欄/賃金支払日',
            'commuting_allowance_period' => '備考欄/通勤手当頻度',
            'commuting_allowance_period_other' => '備考欄/通勤手当頻度_その他記載欄',
            'unsettled_japan_era' => '備考欄/雇用期間_年月日/年号',
            'unsettled_japan_era_year' => '備考欄/雇用期間_年月日/年',
            'unsettled_month' => '備考欄/雇用期間_年月日/月',
            'unsettled_day' => '備考欄/雇用期間_年月日/日',
            'note' => '備考欄/備考',
        ];
    }
}
