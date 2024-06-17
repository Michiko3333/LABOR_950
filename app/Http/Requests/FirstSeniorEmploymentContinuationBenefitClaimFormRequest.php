<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstSeniorEmploymentContinuationBenefitClaimFormRequest extends FormRequest
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
            "file_wage_payment_status" => 'required_unless:radio_file_wage_payment_status,1|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_insured_age" => 'required_if:radio_file_insured_age,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_separation_form" => 'required_if:radio_file_separation_form,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_insured_period" => 'required_if:radio_file_insured_period,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_passbook" => 'required_if:radio_file_passbook,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "file_other" => 'required_if:radio_file_other,2|file|mimes:doc,docx,jpg,jpeg,pdf,xls,xlsx|max:50000',
            "input_file_other" => 'required_if:checked_other,on|string|max:255',
            "ledgerType" => 'string|regex:/^[0-9]{1,10}$/u',
            "mynumberCardNo" => 'nullable|string|regex:/^[0-9]{12}$/u',
            "employmentInsuredNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuredNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuredNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "qualificationsJapanEra" => 'string|max:2',
            "qualificationsJapanEraYear" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "qualificationsMonth" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "qualificationsDay" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "employeeFullname" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+[　][ぁ-んァ-ヴー一-龥々Ａ-Ｚ]+$/u',
            "employeeFullnameKana" => 'string|max:255|regex:/^[ァ-ヴー]+[　][ァ-ヴー]+$/u',
            "employmentInsuranceOfficeNo4digit" => 'string|regex:/^[0-9]{4}$/u',
            "employmentInsuranceOfficeNo6digit" => 'string|regex:/^[0-9]{6}$/u',
            "employmentInsuranceOfficeNoCD" => 'string|regex:/^[0-9]{1}$/u',
            "benefitsType" => 'int|in:1,2',
            "payerJapanEra1" => 'string|max:2',
            "payerJapanEraYear1" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "payerMonth1" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "wagesPaid1" => 'int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageReductionDays1" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "payerJapanEra2" => 'nullable|string|max:2',
            "payerJapanEraYear2" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:payerMonth2',
            "payerMonth2" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payerJapanEraYear2',
            "wagesPaid2" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageReductionDays2" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "payerJapanEra3" => 'nullable|string|max:2',
            "payerJapanEraYear3" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u|required_with:payerMonth3',
            "payerMonth3" => 'nullable|int|between:1,12|regex:/^[0-9]{1,2}$/u|required_with:payerJapanEraYear3',
            "wagesPaid3" => 'nullable|int|between:1,9999999|regex:/^[0-9]{1,7}$/u',
            "wageReductionDays3" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "specialNoteOnWages1" => 'nullable|string|max:255',
            "specialNoteOnWages2" => 'nullable|string|max:255',
            "specialNoteOnWages3" => 'nullable|string|max:255',
            "todayJapanEra" => 'string|max:2',
            "todayJapanEraYear" => 'int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "todayMonth" => 'int|between:1,12|regex:/^[0-9]{1,2}$/u',
            "todayDay" => 'int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "headquartersAddress" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "headquartersTelAreaCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquartersTelCityCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "headquartersTelsubscriberCode" => 'string|regex:/^[0-9]{1,5}$/u',
            "employer_company_managerial_position_name" => 'string|max:255|regex:/\A[ぁ-んァ-ン一-龥０-９Ａ-Ｚ　]+\z/u',
            "destination" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々　]+\z/u',
            "address" => 'string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々０-９Ａ-Ｚ　－]+\z/u',
            "financialInstitutionNameKana" => 'nullable|string|max:255|regex:/\A[ァ-ヴー　]+\z/u',
            "financialInstitutionName" => 'nullable|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "headquartersOrBranch" => 'nullable|string|max:2',
            "financialInstitutionCode" => 'nullable|string|regex:/^[0-9]{4}$/u',
            "storeCode" => 'nullable|string|regex:/^[0-9]{3}$/u',
            "passbookAccountNumber" => 'nullable|string|regex:/^[0-9]{7}$/u',
            "yuchoBankFormer" => 'nullable|string|regex:/^[0-9]{3,5}$/u',
            "yuchoBankLatter" => 'nullable|string|regex:/^[0-9]{7,8}$/u',
            "wageDeadline" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "wagePayment" => 'nullable|string|max:2',
            "wagePaymentDay" => 'nullable|int|between:1,31|regex:/^[0-9]{1,2}$/u',
            "wageStructure" => 'nullable|string|max:4',
            "wageStructureOther" => 'nullable|string|max:4',
            "prescribedWorkingDays1" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "prescribedWorkingDays2" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "prescribedWorkingDays3" => 'nullable|int|between:1,99|regex:/^[0-9]{1,2}$/u',
            "commutingAllowance" => 'nullable|string|max:2',
            "commutingAllowancePeriod" => 'nullable|string|max:4',
            "commutingAllowancePeriodOther" => 'nullable|string|max:4',
            "note" => 'nullable|string|max:255',
            "laborConsultantActingAsAgent" => 'nullable|string|max:255',
            "laborConsultantName" => 'nullable|string|max:255|regex:/\A[ぁ-んァ-ヴー一-龥々Ａ-Ｚ　]+\z/u',
            "laborConsultantTelAreaCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelSubscriberCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            "laborConsultantTelCityCode" => 'nullable|string|regex:/^[0-9]{1,5}$/u',
            'apply_to_code' => 'required|string',
            'apply_to_name' => 'required|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalSize = 0;
            $data = $validator->getData();
            $qualificationsJapanEra = $data['qualificationsJapanEra'] ?? "";
            $qualificationsJapanEraYear = $data['qualificationsJapanEraYear'] ?? "";
            $qualificationsMonth = $data['qualificationsMonth'] ?? "";
            $qualificationsDay = $data['qualificationsDay'] ?? "";
            $payerJapanEra1 = $data['payerJapanEra1'] ?? "";
            $payerJapanEraYear1 = $data['payerJapanEraYear1'] ?? "";
            $payerMonth1 = $data['payerMonth1'] ?? "";
            $payerJapanEra2 = $data['payerJapanEra2'] ?? "";
            $payerJapanEraYear2 = $data['payerJapanEraYear2'] ?? "";
            $payerMonth2 = $data['payerMonth2'] ?? "";
            $payerJapanEra3 = $data['payerJapanEra3'] ?? "";
            $payerJapanEraYear3 = $data['payerJapanEraYear3'] ?? "";
            $payerMonth3 = $data['payerMonth3'] ?? "";

            if ($qualificationsJapanEra === '昭和') {
                if (
                    ($qualificationsJapanEraYear == 1 && ($qualificationsMonth < 12 || ($qualificationsMonth == 12 && $qualificationsDay < 25))) ||
                    ($qualificationsJapanEraYear == 64 && ($qualificationsMonth > 1 || ($qualificationsMonth == 1 && $qualificationsDay > 7))) ||
                    ($qualificationsJapanEraYear > 64)
                ) {
                    $validator->errors()->add('qualificationsDay', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualificationsJapanEra === '平成') {
                if (
                    ($qualificationsJapanEraYear == 1 && ($qualificationsMonth < 1 || ($qualificationsMonth == 1 && $qualificationsDay < 8))) ||
                    ($qualificationsJapanEraYear == 31 && ($qualificationsMonth > 4 || ($qualificationsMonth == 4 && $qualificationsDay > 30))) ||
                    ($qualificationsJapanEraYear > 31)
                ) {
                    $validator->errors()->add('qualificationsDay', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            } elseif ($qualificationsJapanEra === '令和') {
                if ($qualificationsJapanEraYear == 1 && ($qualificationsMonth < 5 || ($qualificationsMonth == 5 && $qualificationsDay < 1))) {
                    $validator->errors()->add('qualificationsDay', '1枚目_資格取得年月日は正しい日付を入力してください。');
                }
            }
            if ($payerJapanEra1 === '平成') {
                if (($payerJapanEraYear1 == 31 && $payerMonth1 > 4) || ($payerJapanEraYear1 > 31)) {
                    $validator->errors()->add('payerJapanEra1', '1枚目_７欄の支給対象年月その１は正しい日付を入力してください。');
                }
            } elseif ($payerJapanEra1 === '令和') {
                if ($payerJapanEraYear1 == 1 && $payerMonth1 < 5) {
                    $validator->errors()->add('payerJapanEra1', '1枚目_７欄の支給対象年月その１は正しい日付を入力してください。');
                }
            }
            if ($payerJapanEra2 === '平成') {
                if (($payerJapanEraYear2 == 31 && $payerMonth2 > 4) || ($payerJapanEraYear2 > 31)) {
                    $validator->errors()->add('payerJapanEra2', '1枚目_１１欄の支給対象年月その２は正しい日付を入力してください。');
                }
            } elseif ($payerJapanEra2 === '令和') {
                if ($payerJapanEraYear2 == 1 && $payerMonth2 < 5) {
                    $validator->errors()->add('payerJapanEra2', '1枚目_１１欄の支給対象年月その２は正しい日付を入力してください。');
                }
            }
            if ($payerJapanEra3 === '平成') {
                if (($payerJapanEraYear3 == 31 && $payerMonth3 > 4) || ($payerJapanEraYear3 > 31)) {
                    $validator->errors()->add('payerJapanEra3', '1枚目_１５欄の支給対象年月その３は正しい日付を入力してください。');
                }
            } elseif ($payerJapanEra3 === '令和') {
                if ($payerJapanEraYear3 == 1 && $payerMonth3 < 5) {
                    $validator->errors()->add('payerJapanEra3', '1枚目_１５欄の支給対象年月その３は正しい日付を入力してください。');
                }
            }
            if(!empty($qualificationsMonth) && !empty($qualificationsDay)){
                if(ctype_digit($qualificationsMonth)){
                    if (!checkdate($qualificationsMonth, $qualificationsDay, '2000')) {
                    $validator->errors()->add('qualificationsDay','1枚目_資格取得年月日は正しい日付を入力してください。');
                    }
                }
            }

            if ($this->hasFile('file_wage_payment_status')) {
                $totalSize += $this->file('file_wage_payment_status')->getSize();
            }
            if ($this->hasFile('file_insured_age')) {
                $totalSize += $this->file('file_insured_age')->getSize();
            }
            if ($this->hasFile('file_separation_form')) {
                $totalSize += $this->file('file_separation_form')->getSize();
            }
            if ($this->hasFile('file_insured_period')) {
                $totalSize += $this->file('file_insured_period')->getSize();
            }
            if ($this->hasFile('file_passbook')) {
                $totalSize += $this->file('file_passbook')->getSize();
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
            'payerJapanEra2.required_with' => '1枚目_支給対象年月その２_年号を入力してください。',
            'payerJapanEraYear2.required_with' => '1枚目_支給対象年月その２_年を入力してください。',
            'payerMonth2.required_with' => '1枚目_支給対象年月その２_月を入力してください。',
            'payerJapanEra3.required_with' => '1枚目_支給対象年月その３_年号を入力してください。',
            'payerJapanEraYear3.required_with' => '1枚目_支給対象年月その３_年を入力してください。',
            'payerMonth3.required_with' => '1枚目_支給対象年月その３_月を入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'file_wage_payment_status' => '添付ファイル_六十歳到達時等賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
            'file_insured_age' => '添付ファイル_被保険者の年齢が確認できる書類',
            'file_separation_form' => '添付ファイル_直前の被保険者資格喪失の日前の賃金支払い状況を記した雇用保険被保険者離職票－２',
            'file_insured_period' => '添付ファイル_被保険者期間等証明書',
            'file_passbook' => '添付ファイル_払渡希望金融機関の口座に係る被保険者名義の通帳',
            'file_other' => '添付ファイル_その他の添付書類',
            'input_file_other' => '添付ファイル_その他添付書類の名称',
            'ledgerType' => '1枚目_帳票種別',
            'mynumberCardNo' => '1枚目_個人番号',
            'employmentInsuredNo4digit' => '1枚目_被保険者番号4桁',
            'employmentInsuredNo6digit' => '1枚目_被保険者番号6桁',
            'employmentInsuredNoCD' => '1枚目_被保険者番号1桁',
            'qualificationsJapanEra' => '1枚目_資格取得年月日_年号',
            'qualificationsJapanEraYear' => '1枚目_資格取得年月日_年',
            'qualificationsMonth' => '1枚目_資格取得年月日_月',
            'qualificationsDay' => '1枚目_資格取得年月日_日',
            "employeeFullname" => '1枚目_被保険者氏名',
            "employeeFullnameKana" => '1枚目_被保険者氏名（フリガナ）',
            'employmentInsuranceOfficeNo4digit' => '1枚目_事業所番号4桁',
            'employmentInsuranceOfficeNo6digit' => '1枚目_事業所番号6桁',
            'employmentInsuranceOfficeNoCD' => '1枚目_事業所番号1桁',
            'benefitsType' => '1枚目_給付金の種類',
            'payerJapanEra1' => '1枚目_支給対象年月その１_年号',
            'payerJapanEraYear1' => '1枚目_支給対象年月その１_年',
            'payerMonth1' => '1枚目_支給対象年月その１_月',
            'wagesPaid1' => '1枚目_７欄の支給対象年月に支払われた賃金額',
            'wageReductionDays1' => '1枚目_９賃金の減額のあった日数',
            'payerJapanEra2' => '1枚目_支給対象年月その２_年号',
            'payerJapanEraYear2' => '1枚目_支給対象年月その２_年',
            'payerMonth2' => '1枚目_支給対象年月その２_月',
            'wagesPaid2' => '1枚目_１１欄の支給対象年月に支払われた賃金額',
            'wageReductionDays2' => '1枚目_１３賃金の減額のあった日数',
            'payerJapanEra3' => '1枚目_支給対象年月その３_年号',
            'payerJapanEraYear3' => '1枚目_支給対象年月その３_年',
            'payerMonth3' => '1枚目_支給対象年月その３_月',
            'wagesPaid3' => '1枚目_１５欄の支給対象年月に支払われた賃金額',
            'wageReductionDays3' => '1枚目_１７賃金の減額のあった日数',
            'specialNoteOnWages1' => '1枚目_その他賃金に関する特記事項',
            'specialNoteOnWages2' => '1枚目_その他賃金に関する特記事項',
            'specialNoteOnWages3' => '1枚目_その他賃金に関する特記事項',
            'todayJapanEra' => '1枚目_証明・申請年月日_年号',
            'todayJapanEraYear' => '1枚目_証明・申請年月日_年',
            'todayMonth' => '1枚目_証明・申請年月日_月',
            'todayDay' => '1枚目_証明・申請年月日_日',
            'headquartersAddress' => '1枚目_事業所名（所在地）',
            'headquartersTelAreaCode' => '1枚目_事業所名（電話番号）_市外局番',
            'headquartersTelCityCode' => '1枚目_事業所名（電話番号）_市内局番',
            'headquartersTelsubscriberCode' => '1枚目_事業所名（電話番号）_加入者番号',
            "employer_company_managerial_position_name" => '1枚目_事業主氏名',
            'destination' => '1枚目_公共職業安定所あて先',
            'address' => '1枚目_申請者住所',
            'applicantFullnameKana' => '1枚目_申請者氏名（フリガナ）',
            'applicantFullname' => '1枚目_申請者氏名',
            'financialInstitutionNameKana' => '1枚目_払渡希望金融機関_名称（フリガナ）',
            'financialInstitutionName' => '1枚目_払渡希望金融機関_名称',
            'headquartersOrBranch' => '1枚目_本店・支店',
            'financialInstitutionCode' => '1枚目_金融機関コード',
            'storeCode' => '1枚目_店舗コード',
            'passbookAccountNumber' => '1枚目_銀行等_口座番号',
            'yuchoBankFormer' => '1枚目_ゆうちょ銀行_記号番号_前半',
            'yuchoBankLatter' => '1枚目_ゆうちょ銀行_記号番号_後半',
            'wageDeadline' => '1枚目_備考欄_賃金締切日',
            'wagePayment' => '1枚目_備考欄_賃金支払日_時期',
            'wagePaymentDay' => '1枚目_備考欄_賃金支払日_日付',
            'wageStructure' => '1枚目_備考欄_賃金形態_形態',
            'wageStructureOther' => '1枚目_備考欄_賃金形態_その他記入欄',
            'prescribedWorkingDays1' => '1枚目_備考欄_所定労豪日数_7欄',
            'prescribedWorkingDays2' => '1枚目_備考欄_所定労豪日数_11欄',
            'prescribedWorkingDays3' => '1枚目_備考欄_所定労豪日数_15欄',
            'commutingAllowance' => '1枚目_備考欄_通勤手当_有無',
            'commutingAllowancePeriod' => '1枚目_備考欄_通勤手当_時期',
            'commutingAllowancePeriodOther' => '1枚目_備考欄_通勤手当_その他記入欄',
            'note' => '1枚目_備考欄_備考',
            'laborConsultantActingAsAgent' => '1枚目_社会保険労務士記載欄_作成年月日・提出・事務代理者',
            'laborConsultantName' => '1枚目_社会保険労務士記載欄_氏名',
            'laborConsultantTelAreaCode' => '1枚目_社会保険労務士記載欄_電話番号_市外局番',
            'laborConsultantTelSubscriberCode' => '1枚目_社会保険労務士記載欄_電話番号_市内局番',
            'laborConsultantTelCityCode' => '1枚目_社会保険労務士記載欄_電話番号_加入者番号',
            'apply_to_code' => '提出先選択_大分類（都道府県）',
            'apply_to_name' => '提出先選択_中分類（公共職業安定所）'
        ];
    }
}
