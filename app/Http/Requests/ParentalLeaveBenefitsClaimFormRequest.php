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
            'file_childcare' => 'required_unless:radio_file_childcare,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_wage_amount' => 'required_if:radio_file_wage_amount,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_wage_certificate' => 'required_if:radio_file_wage_certificate,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_confirmation_document' => 'required_if:radio_file_confirmation_document,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_passbook' => 'required_if:radio_file_passbook,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_extension_reason' => 'required_if:radio_file_extension_reason,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_spouse' => 'required_if:radio_file_spouse,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_spouse_childcare_leave' => 'required_if:radio_file_spouse_childcare_leave,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'file_other' => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            'input_file_other' => 'required_if:checked_other,on|string|max:255',
            'leave_start_wage_monthly_certificate' => 'nullable|int|max:1',
            'reduced_working_hours_wage_certificate_start' => 'nullable|int|max:1',
            'ledger_type' => 'string|regex:/^[0-9]{1,10}$/u',
            'employment_insured_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insured_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insured_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'qualifications_japan_era' => 'string|max:2',
            'qualifications_japan_era_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'qualifications_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'qualifications_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'fullname' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            'fullname_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+\z/u',
            'employment_insurance_office_no_4digit' => 'string|regex:/^[0-9]{4}$/u',
            'employment_insurance_office_no_6digit' => 'string|regex:/^[0-9]{6}$/u',
            'employment_insurance_office_no_CD' => 'string|regex:/^[0-9]{1}$/u',
            'childcare_start_date_japan_era' => 'nullable|string|max:2',
            'childcare_start_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'childcare_start_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'birth_date_japan_era' => 'string|max:2',
            'birth_date_japan_era_year' => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birth_date_month' => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birth_date_day' => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_japan_era' => 'nullable|string|max:2',
            'birth_due_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'birth_due_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'mynumber_card_no' => 'nullable|string|regex:/^[0-9]{12}$/u',
            'post_code_former' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'post_code_latter' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'address_prefecture_city' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'address_ward' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'address_apartment' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'tel_area_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'payer_japan_era1' => 'nullable|string|max:2',
            'payer_japan_era_year1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end1' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end1' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count1' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours1' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid1' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payer_japan_era2' => 'nullable|string|max:2',
            'payer_japan_era_year2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payer_month2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payer_month_end2' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payer_day_end2' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count2' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours2' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid2' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'payment_period_last_japan_era' => 'nullable|string|max:2',
            'payment_period_last_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_month_end' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_last_day_end' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'workday_count3' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'working_hours3' => 'nullable|int|between:1,999|regex:/^[0-9]{1,3}$/u',
            'wages_paid3' => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            'return_from_resignation_date_japan_era' => 'nullable|string|max:2',
            'return_from_resignation_date_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'return_from_resignation_date_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason' => 'nullable|int|between:1,6',
            'payment_period_extension_reason_japan_era' => 'nullable|string|max:2',
            'payment_period_extension_reason_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'payment_period_extension_reason_last_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'partner_childcare_leave_taken' => 'nullable|int|in:1',
            'partner_insured_no_4digit' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'partner_insured_no_6digit' => 'nullable|string|regex:/^[0-9]{6}$/u',
            'partner_insured_no_CD' => 'nullable|string|regex:/^[0-9]{1}$/u',
            'childcare_leave_reacquisition_cause' => 'nullable|int|in:1,2,3,5',
            'today_japan_era' => 'nullable|string|max:2',
            'today_japan_era_year' => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_month' => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u',
            'today_japan_era_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'headquarters_address' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　‐]+\z/u',
            'headquarters_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_city_code_name' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'headquarters_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'employer_company_managerial_position_name' => 'nullable|string|max:255',
            'destination' => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々　]+\z/u',
            'financial_Institutions_name_kana' => 'nullable|string|max:255|regex:/^[ァ-ヴー　]+\z/u',
            'financial_institution_name' => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴ０-９ー一-龥々　]+\z/u',
            'headquarters_or_branch' => 'nullable|string|max:2',
            'financia_iInstitution_code' => 'nullable|string|regex:/^[0-9]{4}$/u',
            'store_code' => 'nullable|string|regex:/^[0-9]{3}$/u',
            'passbook_account_number' => 'nullable|string|regex:/^[0-9]{10,11}$/u',
            'yucho_bank_former' => 'nullable|string|regex:/^[0-9]{3,5}$/u',
            'yucho_bank_latter' => 'nullable|string|regex:/^[0-9]{7,8}$/u',
            'wage_deadline' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'wage_payment' => 'nullable|string|max:2',
            'wage_payment_day' => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            'commuting_allowance' => 'nullable|string|max:2',
            'commuting_allowance_period' => 'nullable|string|max:3',
            'commuting_allowance_period_other' => 'nullable|string|max:4',
            'note' => 'nullable|string|max:255',
            'labor_consultant_acting_as_agent_name' => 'nullable|string|max:255',
            'labor_consultant_name' => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            'labor_consultant_tel_treacode' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_city_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'labor_consultant_tel_subscriber_code' => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string'
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
    public function messages()
    {
        return [
            'input_file_other' => '添付ファイル_その他添付書類の名称は正しい形式で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_childcare' => '添付ファイル_育児の事実が確認できる書類',
            'file_wage_amount' => '添付ファイル_休業開始時賃金月額証明書に記載された育児休業を開始した日及びその日前の賃金の額が確認できる書類',
            'file_wage_certificate' => '添付ファイル_雇用保険被保険者休業開始時賃金月額証明票',
            'file_confirmation_document' => '添付ファイル_支給申請書に記載した賃金額、就業した日数及び時間、出産予定日、出産日、育児休業開始日、育児休業終了日等記載内容を確認できる書類',
            'file_passbook' => '添付ファイル_払渡希望金融機関の口座に係る被保険者名義の通帳',
            'file_extension_reason' => '添付ファイル_延長事由に該当することを確認できる書類',
            'file_spouse' => '添付ファイル_被保険者の配偶者であることを確認できる書類',
            'file_spouse_childcare_leave' => '添付ファイル_被保険者の配偶者の育児休業の取得を確認できる書類',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'employment_insured_no_4digit' => '1枚目_被保険者番号4桁',
            'employment_insured_no_6digit' => '1枚目_被保険者番号6桁',
            'employment_insured_no_CD' => '1枚目_被保険者番号1桁',
            'qualifications_japan_era' => '1枚目_資格取得年月日_年号',
            'qualifications_japan_era_year' => '1枚目_資格取得年月日_年',
            'qualifications_month' => '1枚目_資格取得年月日_月',
            'qualifications_day' => '1枚目_資格取得年月日_日',
            'fullname' => '1枚目_被保険者氏名',
            'fullname_kana' => '1枚目_フリガナ（カタカナ）',
            'employment_insurance_office_no_4digit' => '1枚目_事業所番号4桁',
            'employment_insurance_office_no_6digit' => '1枚目_事業所番号6桁',
            'employment_insurance_office_no_CD' => '1枚目_事業所番号1桁',
            'childcare_start_date_japan_era' => '1枚目_育児休業開始年月日_年号',
            'childcare_start_date_japan_era_year' => '1枚目_育児休業開始年月日_年',
            'childcare_start_date_month' => '1枚目_育児休業開始年月日_月',
            'childcare_start_date_day' => '1枚目_育児休業開始年月日_日',
            'birth_date_japan_era' => '1枚目_出産年月日_年号',
            'birth_date_japan_era_year' => '1枚目_出産年月日_年',
            'birth_date_month' => '1枚目_出産年月日_月',
            'birth_date_day' => '1枚目_出産年月日_日',
            'birth_due_date_japan_era' => '1枚目_出産予定日_年号',
            'birth_due_date_japan_era_year' => '1枚目_出産予定日_年',
            'birth_due_date_month' => '1枚目_出産予定日_月',
            'birth_due_date_day' => '1枚目_出産予定日_日',
            'mynumber_card_no' => '1枚目_個人番号',
            'post_code_former' => '1枚目_被保険者の住所（郵便番号）３桁',
            'post_code_latter' => '1枚目_被保険者の住所（郵便番号）４桁',
            'address_prefecture_city' => '1枚目_被保険者の住所（漢字）※市・区・郡及び町村名',
            'address_ward' => '1枚目_被保険者の住所（漢字）※丁目・番地',
            'address_apartment' => '1枚目_被保険者の住所（漢字）※アパート、マンション名等',
            'tel_area_code' => '1枚目_被保険者の電話番号_市外局番',
            'tel_city_code' => '1枚目_被保険者の電話番号_市内局番',
            'tel_subscriber_code' => '1枚目_被保険者の電話番号_加入者番号',
            'payer_japan_era1' => '1枚目_支給単位期間その１（初日－末日）_初日_年号',
            'payer_japan_era_year1' => '1枚目_支給単位期間その１（初日－末日）_初日_年',
            'payer_month1' => '1枚目_支給単位期間その１（初日－末日）_初日_月',
            'payer_day1' => '1枚目_支給単位期間その１（初日－末日）_初日_日',
            'payer_month_end1' => '1枚目_支給単位期間その１（初日－末日）_末日_月',
            'payer_day_end1' => '1枚目_支給単位期間その１（初日－末日）_末日_日',
            'workday_count1' => '1枚目_就業日数_その１',
            'working_hours1' => '1枚目_就業時間_その１',
            'wages_paid1' => '1枚目_支払われた賃金額その１',
            'payer_japan_era2' => '1枚目_支給単位期間その２（初日－末日）_初日_年号',
            'payer_japan_era_year2' => '1枚目_支給単位期間その２（初日－末日）_初日_年',
            'payer_month2' => '1枚目_支給単位期間その２（初日－末日）_初日_月',
            'payer_day2' => '1枚目_支給単位期間その２（初日－末日）_初日_日',
            'payer_month_end2' => '1枚目_支給単位期間その２（初日－末日）_末日_月',
            'payer_day_end2' => '1枚目_支給単位期間その２（初日－末日）_末日_日',
            'workday_count2' => '1枚目_就業日数_その２',
            'working_hours2' => '1枚目_就業時間_その２',
            'wages_paid2' => '1枚目_支払われた賃金額_その２',
            'payment_period_last_japan_era' => '1枚目_最終支給単位期間（初日－末日）_初日_年号',
            'payment_period_last_japan_era_year' => '1枚目_最終支給単位期間（初日－末日）_初日_年',
            'payment_period_last_month' => '1枚目_最終支給単位期間（初日－末日）_初日_月',
            'payment_period_last_day' => '1枚目_最終支給単位期間（初日－末日）_初日_日',
            'payment_period_last_month_end' => '1枚目_最終支給単位期間（初日－末日）_末日_月',
            'payment_period_last_day_end' => '1枚目_最終支給単位期間（初日－末日）_末日_日',
            'workday_count3' => '1枚目_就業日数_最終',
            'working_hours3' => '1枚目_就業時間_最終',
            'wages_paid3' => '1枚目_支払われた賃金額_最終',
            'return_from_resignation_date_japan_era' => '1枚目_職場復帰年月日_年号',
            'return_from_resignation_date_japan_era_year' => '1枚目_職場復帰年月日_年',
            'return_from_resignation_date_month' => '1枚目_職場復帰年月日_月',
            'return_from_resignation_date_day' => '1枚目_職場復帰年月日_日',
            'payment_period_extension_reason' => '1枚目_支給対象となる期間の延長事由－期間_延長事由',
            'payment_period_extension_reason_japan_era' => '1枚目_支給対象となる期間の延長事由－期間_開始_年号',
            'payment_period_extension_reason_japan_era_year' => '1枚目_支給対象となる期間の延長事由－期間_開始_年',
            'payment_period_extension_reason_month' => '1枚目_支給対象となる期間の延長事由－期間_開始_月',
            'payment_period_extension_reason_day' => '1枚目_支給対象となる期間の延長事由－期間_開始_日',
            'payment_period_extension_reason_last_month' => '1枚目_支給対象となる期間の延長事由－期間_終了_月',
            'payment_period_extension_reason_last_day' => '1枚目_支給対象となる期間の延長事由－期間_終了_年',
            'partner_childcare_leave_taken' => '1枚目_配偶者育休取得',
            'partner_insured_no_4digit' => '1枚目_配偶者の被保険者番号4桁',
            'partner_insured_no_6digit' => '1枚目_配偶者の被保険者番号6桁',
            'partner_insured_no_CD' => '1枚目_配偶者の被保険者番号1桁',
            'childcare_leave_reacquisition_cause' => '1枚目_育児休業再取得理由',
            'today_japan_era' => '1枚目_申請年月日_年号',
            'today_japan_era_year' => '1枚目_申請年月日_年',
            'today_japan_era_month' => '1枚目_申請年月日_月',
            'today_japan_era_day' => '1枚目_申請年月日_日',
            'headquarters_address' => '1枚目_事業所名（所在地）',
            'headquarters_tel_treacode' => '1枚目_事業所電話番号_市外局番',
            'headquarters_tel_city_code_name' => '1枚目_事業所電話番号_市内局番',
            'headquarters_tel_subscriber_code' => '1枚目_事業所名電話番号_加入者番号',
            'employer_company_managerial_position_name' => '1枚目_事業主名',
            'destination' => '1枚目_公共職業安定所あて先',
            'financial_Institutions_name_kana' => '1枚目_払渡希望金融機関_フリガナ',
            'financial_institution_name' => '1枚目_払渡希望金融機関_名称',
            'headquarters_or_branch' => '1枚目_払渡希望金融機関_本支店区分',
            'financia_iInstitution_code' => '1枚目_払渡希望金融機関_金融機関コード',
            'store_code' => '1枚目_払渡希望金融機関_店舗コード',
            'passbook_account_number' => '1枚目_払渡希望金融機関_口座番号（普通）',
            'yucho_bank_former' => '1枚目_払渡希望金融機関_記号番号（総合）前半',
            'yucho_bank_latter' => '1枚目_払渡希望金融機関_記号番号（総合）後半',
            'wage_deadline' => '1枚目_備考_賃金締切日',
            'wage_payment' => '1枚目_備考_賃金支払日',
            'wage_payment_day' => '1枚目_備考_賃金支払日_日数',
            'commuting_allowance' => '1枚目_備考_通勤手当_有無',
            'commuting_allowance_period' => '1枚目_備考_通勤手当_機関',
            'commuting_allowance_period_other' => '1枚目_備考_通勤手当_その他記入欄',
            'note' => '1枚目_備考',
            'labor_consultant_acting_as_agent_name' => '1枚目_社会保険労務士記載欄_作成年月日･提出代行者･事務代理者の表示',
            'labor_consultant_name' => '1枚目_社会保険労務士記載欄_氏名',
            'labor_consultant_tel_treacode' => '1枚目_社会保険労務士記載欄_電話番号_市外局番',
            'labor_consultant_tel_city_code' => '1枚目_社会保険労務士記載欄_電話番号_市内局番',
            'labor_consultant_tel_subscriber_code' => '1枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
