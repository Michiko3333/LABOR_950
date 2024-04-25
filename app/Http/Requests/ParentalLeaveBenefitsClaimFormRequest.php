<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentalLeaveBenefitsClaimFormRequest extends FormRequest
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
    public static function rules(): array
    {
        return [
            "file_childcare" => 'required_unless:radio_file_childcare,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_wage_amount" => 'required_if:radio_file_wage_amount,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_wage_certificate" => 'required_if:radio_file_wage_certificate,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_confirmation_document" => 'required_if:radio_file_confirmation_document,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_passbook" => 'required_if:radio_file_passbook,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_extension_reason" => 'required_if:radio_file_extension_reason,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse" => 'required_if:radio_file_spouse,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_spouse_childcare_leave" => 'required_if:radio_file_spouse_childcare_leave,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:radio_file_other,2|string|max:255',
            'leave_start_wage_monthly_certificate' => 'nullable|int|max:1',
            'reduced_working_hours_wage_certificate_start' => 'nullable|int|max:1',
            'ledger_type' => 'string|regex:/^[0-9]{1,10}$/u',
            'employment_insured_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'required|string|max:2',
            'qualifications_japan_era_year' => 'required|int|max:99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'required|int|max:12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'required|int|max:31|regex:/^[0-9]{1,2}$/u',
            'fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥]+[　][ぁ-んァ-ヴー一-龥]+$/u',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'employment_insurance_office_no_4digit' => 'required|string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'required|string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'required|string|regex:/^[0-9]{1}$/u',
            'childcare_start_date_japan_era' => 'nullable|string|max:2',
            'childcare_start_date_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'birth_date_japan_era' => 'required|string|max:2',
            'birth_date_japan_era_year' => 'required|int|max:99|regex:/^[0-9]{1,2}$/u',
            'birth_date_month' => 'required|int|max:12|regex:/^[0-9]{1,2}$/u',
            'birth_date_day' => 'required|int|max:31|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_japan_era' => 'nullable|string|max:2',
            'birth_due_date_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'post_code_former' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'address_prefecture_city' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'address_ward' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'address_apartment' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era_year1' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day1' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end1' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end1' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count1' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day2' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end2' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end2' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count2' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'payment_period_last_japan_era' => 'nullable|string|max:2',
            'payment_period_last_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u', 
            'payment_period_last_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_month_end' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day_end' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'workday_count3' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|max:999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|max:9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_date_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_date_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason' => 'nullable|int|max:9',
            'payment_period_extension_reason_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_reason_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'partner_childcare_leave_taken' => 'nullable|int|max:9',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'childcare_leave_reacquisition_cause' => 'nullable|int|max:9',
            'today_japan_era' => 'nullable|string|max:2',
            'today_japan_era_year' => 'nullable|int|max:99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'nullable|int|max:12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９A-Zー一-龥　]+\z/u',
            'headquarters_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'nullable|string|max:255',
            'destination' => 'required|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'financial_Institutions_name_kana' =>'nullable|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'financial_institution_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥　]+\z/u',
            'headquarters_or_branch' => 'nullable|string|max:2',
            'financia_iInstitution_code' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'store_code' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'passbook_account_number' => 'nullable|string|regex:/^[0-9]{10,11}$/u',
            'yucho_bank_former' => 'nullable|string|regex:/^[0-9]{3,5}$/u',
            'yucho_bank_latter' => 'nullable|string|regex:/^[0-9]{7,8}$/u',
            'wage_deadline' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:2',
            'wage_payment_day' => 'nullable|int|max:31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:2',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'note' => 'nullable|string|max:255', 
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255', 
            'labor_consultant_name' => 'nullable|string|max:255', 
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;

            if ($this->hasFile('file_childcare')) {
                $totalSize += $this->file('file_childcare')->getSize();
            }
            if ($this->hasFile('file_wage_amount')) {
                $totalSize += $this->file('file_wage_amount')->getSize();
            }
            if ($this->hasFile('file_wage_certificate')) {
                $totalSize += $this->file('file_wage_certificate')->getSize();
            }
            if ($this->hasFile('file_confirmation_document')) {
                $totalSize += $this->file('file_confirmation_document')->getSize();
            }
            if ($this->hasFile('file_passbook')) {
                $totalSize += $this->file('file_passbook')->getSize();
            }
            if ($this->hasFile('file_extension_reason')) {
                $totalSize += $this->file('file_extension_reason')->getSize();
            }
            if ($this->hasFile('file_spouse')) {
                $totalSize += $this->file('file_spouse')->getSize();
            }
            if ($this->hasFile('file_spouse_childcare_leave')) {
                $totalSize += $this->file('file_spouse_childcare_leave')->getSize();
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
            'employment_insured_no_4digit' => '被保険者番号4桁',
            'employment_insured_no_6digit' => '被保険者番号6桁',
            'employment_insured_no_CD' => '被保険者番号1桁',
            'qualifications_japan_era' => '資格取得年月日/年号',
            'qualifications_japan_era_year' => '資格取得年月日/年',
            'qualifications_month' => '資格取得年月日/月',
            'qualifications_day' => '資格取得年月日/日',
            'fullname' => '被保険者氏名',
            'fullname_kana' => 'フリガナ（カタカナ）',
            'employment_insurance_office_no_4digit' => '事業所番号4桁',
            'employment_insurance_office_no_6digit' => '事業所番号6桁',
            'employment_insurance_office_no_CD' => '事業所番号1桁',
            'childcare_start_date_japan_era' => '育児休業開始年月日/年号',
            'childcare_start_date_japan_era_year' => '育児休業開始年月日/年',
            'childcare_start_date_month' => '育児休業開始年月日/月',
            'childcare_start_date_day' => '育児休業開始年月日/日',
            'birth_date_japan_era' => '出産年月日/年号',
            'birth_date_japan_era_year' => '出産年月日/年',
            'birth_date_month' => '出産年月日/月',
            'birth_date_day' => '出産年月日/日',
            'birth_due_date_japan_era' => '出産予定日/年号',
            'birth_due_date_japan_era_year' => '出産予定日/年',
            'birth_due_date_month' => '出産予定日/月',
            'birth_due_date_day' => '出産予定日/日',
            'mynumber_card_no' => '個人番号',
            'post_code_former' => '被保険者の住所（郵便番号）３桁',
            'post_code_latter' => '被保険者の住所（郵便番号）４桁',
            'address_prefecture_city' => '被保険者の住所（漢字）※市・区・郡及び町村名',
            'address_ward' => '被保険者の住所（漢字）※丁目・番地',
            'address_apartment' => '被保険者の住所（漢字）※アパート、マンション名等',
            'tel_area_code' => '被保険者の電話番号（市外局番）',
            'tel_city_code' => '被保険者の電話番号（市内局番）',
            'tel_subscriber_code' => '被保険者の電話番号（加入者番号）',
            'payer_japan_era1' => '支給単位期間その１（初日－末日）/初日_年号',
            'payer_japan_era_year1' => '支給単位期間その１（初日－末日）/初日_年',
            'payer_month1' => '支給単位期間その１（初日－末日）/初日_月',
            'payer_day1' => '支給単位期間その１（初日－末日）/初日_日',
            'payer_month_end1' => '支給単位期間その１（初日－末日）/末日_月',
            'payer_day_end1' => '支給単位期間その１（初日－末日）/末日_日',
            'workday_count1' => '就業日数/その１',
            'working_hours1' => '就業時間/その１',
            'wages_paid1' => '支払われた賃金額その１',
            'payer_japan_era2' => '支給単位期間その２（初日－末日）/初日_年号',
            'payer_japan_era_year2' => '支給単位期間その２（初日－末日）/初日_年',
            'payer_month2' => '支給単位期間その２（初日－末日）/初日_月',
            'payer_day2' => '支給単位期間その２（初日－末日）/初日_日',
            'payer_month_end2' => '支給単位期間その２（初日－末日）/末日_月',
            'payer_day_end2' => '支給単位期間その２（初日－末日）/末日_日',
            'workday_count2' => '就業日数/その２',
            'working_hours2' => '就業時間/その２',
            'wages_paid2' => '支払われた賃金額/その２',
            'payment_period_last_japan_era' => '最終支給単位期間（初日－末日）/初日_年号',
            'payment_period_last_japan_era_year' => '最終支給単位期間（初日－末日）/初日_年',
            'payment_period_last_month' => '最終支給単位期間（初日－末日）/初日_月',
            'payment_period_last_day' => '最終支給単位期間（初日－末日）/初日_日',
            'payment_period_last_month_end' => '最終支給単位期間（初日－末日）/末日_月',
            'payment_period_last_day_end' => '最終支給単位期間（初日－末日）/末日_日',
            'workday_count3' => '就業日数/最終',
            'working_hours3' => '就業時間/最終',
            'wages_paid3' => '支払われた賃金額/最終',
            'return_from_resignation_date_japan_era' => '職場復帰年月日/年号',
            'return_from_resignation_date_japan_era_year' => '職場復帰年月日/年',
            'return_from_resignation_date_month' => '職場復帰年月日/月',
            'return_from_resignation_date_day' => '職場復帰年月日/日',
            'payment_period_extension_reason' => '支給対象となる期間の延長事由－期間/延長事由',
            'payment_period_extension_reason_japan_era' => '支給対象となる期間の延長事由－期間/開始_年号',
            'payment_period_extension_reason_japan_era_year' => '支給対象となる期間の延長事由－期間/開始_年',
            'payment_period_extension_reason_month' => '支給対象となる期間の延長事由－期間/開始_月',
            'payment_period_extension_reason_day' => '支給対象となる期間の延長事由－期間/開始_日',
            'payment_period_extension_reason_last_month' => '支給対象となる期間の延長事由－期間/終了_月',
            'payment_period_extension_reason_last_day' => '支給対象となる期間の延長事由－期間/終了_年',
            'partner_childcare_leave_taken' => '配偶者育休取得',
            'partner_insured_no_4digit' => '配偶者の被保険者番号4桁',
            'partner_insured_no_6digit' => '配偶者の被保険者番号6桁',
            'partner_insured_no_CD' => '配偶者の被保険者番号1桁',
            'childcare_leave_reacquisition_cause' => '育児休業再取得理由',
            'today_japan_era' => '申請年月日_年号',
            'today_japan_era_year' => '申請年月日_年',
            'today_japan_era_month' => '申請年月日_月',
            'today_japan_era_day' => '申請年月日_日',
            'headquarters_address' => '事業所名（所在地）',
            'headquarters_tel_treacode' => '事業所電話番号（市外局番）',
            'headquarters_tel_city_code' => '事業所電話番号（市内局番）',
            'headquarters_tel_subscriber_code' => '事業所名電話番号（加入者番号）',
            'employer_company_managerial_position_name' => '事業主名',
            'destination' => '公共職業安定所あて先',
            'financial_Institutions_name_kana' => '払渡希望金融機関/フリガナ',
            'financial_institution_name' => '払渡希望金融機関/名称',
            'headquarters_or_branch' => '払渡希望金融機関/本支店区分',
            'financia_iInstitution_code' => '払渡希望金融機関/金融機関コード',
            'store_code' => '払渡希望金融機関/店舗コード',
            'passbook_account_number' => '払渡希望金融機関/口座番号（普通）',
            'yucho_bank_former' => '払渡希望金融機関/記号番号（総合）前半',
            'yucho_bank_latter' => '払渡希望金融機関/記号番号（総合）後半',
            'wage_deadline' => '備考/賃金締切日',
            'wage_payment' => '備考/賃金支払日',
            'wage_payment_day' => '備考/賃金支払日_日数',
            'commuting_allowance' => '備考/通勤手当_有無',
            'commuting_allowance_period' => '備考/通勤手当_機関',
            'commuting_allowance_period_other' => '備考/通勤手当_その他記入欄',
            'note' => '備考',
            'labor_consultant_acting_as_agent_name' => '社会保険労務士記載欄/作成年月日･提出代行者･事務代理者の表示',
            'labor_consultant_name' => '社会保険労務士記載欄/氏名',
            'labor_consultant_tel_treacode' => '社会保険労務士記載欄/電話番号（市外局番）',
            'labor_consultant_tel_city_code' => '社会保険労務士記載欄/電話番号（市内局番）',
            'labor_consultant_tel_subscriber_code' => '社会保険労務士記載欄/電話番号（加入者番号）',
        ];
    }
}
