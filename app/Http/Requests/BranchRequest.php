<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends BaseRequest
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

        $data = array_map(function ($value) {
            if (!is_array($value)) {
                if (isset($data['br-address_city'])) {
                    foreach ($data['br-address_city'] as &$ward) {
                        $ward = mb_convert_kana($ward, 'RANKS');
                        $ward = str_replace(['-', '‐'], '－', $ward);
                    }
                }
                if (isset($data['br-address_ward'])) {
                    foreach ($data['br-address_ward'] as &$ward) {
                        $ward = mb_convert_kana($ward, 'RANKS');
                        $ward = str_replace(['-', '‐'], '－', $ward);
                    }
                }
                if (isset($data['br-address_apartment'])) {
                    foreach ($data['br-address_apartment'] as &$apartment) {
                        $apartment = mb_convert_kana($apartment, 'RANKS');
                        $apartment = str_replace(['-', '‐'], '－', $apartment);
                    }
                }
                if (isset($data['br-address_city_kana'])) {
                    foreach ($data['br-address_city_kana'] as &$ward) {
                        $ward = mb_convert_kana($ward, 'RANKS');
                        $ward = str_replace(['-', '‐'], '－', $ward);
                    }
                }
                if (isset($data['br-address_ward_kana'])) {
                    foreach ($data['br-address_ward_kana'] as &$ward) {
                        $ward = mb_convert_kana($ward, 'RANKS');
                        $ward = str_replace(['-', '‐'], '－', $ward);
                    }
                }
                if (isset($data['br-address_apartment_kana'])) {
                    foreach ($data['br-address_apartment_kana'] as &$apartment) {
                        $apartment = mb_convert_kana($apartment, 'RANKS');
                        $apartment = str_replace(['-', '‐'], '－', $apartment);
                    }
                }
            }
            return $value;
        }, $data);
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
            'br-name' => 'required|array',
            'br-name.*' => 'string|max:255',
            'br-branch_type' => 'required|array',
            'br-branch_type.*' => 'integer',
            'br-place_type' => 'required|array',
            'br-place_type.*' => 'integer|regex:/^[12]+\z/',
            'br-post_code' => 'required|array',
            'br-post_code.*' => 'string|max:7|regex:/\A[0-9]+\z/u',
            'br-address_prefecture' => 'required|array',
            'br-address_prefecture.*' => 'string|max:2',
            "br-address_city" => 'required|array',
            "br-address_city.*" => 'string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            "br-address_ward" => 'required|array',
            "br-address_ward.*" => 'required|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            "br-address_apartment" => 'array',
            "br-address_apartment.*" => 'nullable|string|max:255|regex:/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u',
            "br-address_city_kana" => 'required|array',
            "br-address_city_kana.*" => 'required|string|max:255',
            "br-address_ward_kana" => 'array',
            "br-address_ward_kana.*" => 'required|string|max:255',
            "br-address_apartment_kana" => 'array',
            "br-address_apartment_kana.*" => 'nullable|string|max:255',
            "br-tel_area_code" => 'array',
            "br-tel_area_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_city_code" => 'array',
            "br-tel_city_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_subscriber_code" => 'array',
            "br-tel_subscriber_code.*" => 'required|max:5|regex:/\A[0-9]+\z/u',
            "br-tel_overseas" => 'array',
            "br-tel_overseas.*" => 'nullable|max:15|regex:/\A[0-9]+\z/u',
            "br-fax1" => 'array',
            "br-fax1.*" => 'nullable|string|regex:/^0[0-9]{1,4}$/|required_with:br-fax2.*,br-fax3.*',
            "br-fax2" => 'array',
            "br-fax2.*" => 'nullable|string|regex:/[0-9]{1,4}$/|required_with:br-fax1.*,br-fax3.*',
            "br-fax3" => 'array',
            "br-fax3.*" => 'nullable|string|regex:/[0-9]{1,8}$/|required_with:br-fax2.*,br-fax1.*',
            "br-mail_address" => 'array',
            "br-mail_address.*" => 'required|email:rfc',
            "br-labor_insurance_no" => 'array',
            "br-labor_insurance_no.*" => 'nullable|regex:/^\d{14}$/',
            "br-labor_insurance_payment_method" => 'array',
            "br-labor_insurance_payment_method.*" => 'nullable|integer',
            "br-insurance_office_no" => 'array',
            "br-insurance_office_no.*" => 'nullable|string|max:20',
            "br-insurance_office_reference_no" => 'array',
            "br-insurance_office_reference_no.*" => 'nullable|string|max:20',
            "br-pension_office_id" => 'array',
            "br-pension_office_id.*" => 'nullable|integer',
            "br-pension_office_no" => 'array',
            "br-pension_office_no.*" => 'required|string|max:10',
            "br-pension_office_reference_prefecture" => 'array',
            "br-pension_office_reference_prefecture.*" => 'required|string|max:10',
            "br-pension_office_reference_no_cities" => 'array',
            "br-pension_office_reference_no_cities.*" => 'required|string|max:10',
            "br-pension_office_reference_no_office" => 'array',
            "br-pension_office_reference_no_office.*" => 'required|string|max:10',
            "br-employment_insurance_office_no" => 'array',
            "br-employment_insurance_office_no.*" => 'nullable|string|max:20',
            "br-hello_work_id" => 'array',
            "br-hello_work_id.*" => 'nullable|integer',
            "br-labor_bureau_id" => 'array',
            "br-labor_bureau_id.*" => 'nullable|integer',
            "br-labor_supervision_id" => 'array',
            "br-labor_supervision_id.*" => 'nullable|integer',
            "br-start_date_of_month" => 'array',
            "br-start_date_of_month.*" => 'nullable|integer',
            "br-start_days_of_week" => 'array',
            "br-start_days_of_week.*" => 'nullable|integer',
            "br-start_time_of_day" => 'array',
            "br-start_time_of_day.*" => 'nullable|regex:/^[0-2][0-9]:[0-5][0-9]/',
            "br-work_time_start" => 'array',
            "br-work_time_start.*" => 'nullable|regex:/^[0-2][0-9]:[0-5][0-9]/',
            "br-work_time_end" => 'array',
            "br-work_time_end.*" => 'nullable|regex:/^[0-2][0-9]:[0-5][0-9]/',
            "br-agreed_hours_year_h" => 'array',
            "br-agreed_hours_year_h.*" => 'nullable|integer',
            "br-agreed_hours_month_h" => 'array',
            "br-agreed_hours_month_h.*" => 'nullable|integer',
            "br-agreed_hours_week_h" => 'array',
            "br-agreed_hours_week_h.*" => 'nullable|integer',
            "br-agreed_hours_day_h" => 'array',
            "br-agreed_hours_day_h.*" => 'nullable|integer',
            "br-agreed_hours_year_m" => 'array',
            "br-agreed_hours_year_m.*" => 'nullable|integer',
            "br-agreed_hours_month_m" => 'array',
            "br-agreed_hours_month_m.*" => 'nullable|integer',
            "br-agreed_hours_week_m" => 'array',
            "br-agreed_hours_week_m.*" => 'nullable|integer',
            "br-agreed_hours_day_m" => 'array',
            "br-agreed_hours_day_m.*" => 'nullable|integer',
            "br-working_days_yearly" => 'array',
            "br-working_days_yearly.*" => 'nullable|integer',
            "br-working_days_monthly" => 'array',
            "br-working_days_monthly.*" => 'nullable|integer',
            "br-holiday_yearly" => 'array',
            "br-holiday_yearly.*" => 'nullable|integer',
            "br-holiday_monthly" => 'array',
            "br-holiday_monthly.*" => 'nullable|integer',
            "br-work_style_type" => 'array',
            "br-work_style_type.*" => 'nullable|integer',
            "br-holiday_legal" => 'array',
            "br-holiday_legal.*" => 'nullable|string|max:8',
            "br-holiday_not_logal" => 'array',
            "br-holiday_not_logal.*" => 'nullable|string|max:8',
        ];
    }

    public function messages()
    {
        foreach ($this->input('br-fax1', []) as $index => $value) {
            $messages["br-fax1.{$index}.required_with"] = ($index + 1) . "事業所のFAX番号_1を入力してください。";
        }
        foreach ($this->input('br-fax2', []) as $index => $value) {
            $messages["br-fax2.{$index}.required_with"] = ($index + 1) . "事業所のFAX番号_2を入力してください。";
        }
        foreach ($this->input('br-fax3', []) as $index => $value) {
            $messages["br-fax3.{$index}.required_with"] = ($index + 1) . "事業所のFAX番号_3を入力してください。";
        }

        return $messages;
    }

    public function attributes()
    {
        $Attributes = [
            'br-name' => '名称',
            'br-branch_type' => '区分',
            'br-place_type' => '国内外',
            'br-post_code' => '郵便番号',
            'br-address_prefecture' => '住所（都道府県）',
            "br-address_city" => '住所（市区町村）',
            "br-address_ward" => '住所（丁目・番地）',
            "br-address_apartment" => '住所（アパート・マンション名等）',
            "br-address_city_kana" => '住所（市区町村）（カナ）',
            "br-address_ward_kana" => '住所（丁目・番地）（カナ）',
            "br-address_apartment_kana" => '住所（アパート・マンション名等）（カナ）',
            "br-tel_area_code" => '電話番号（市外局番）',
            "br-tel_city_code" => '電話番号（市内局番）',
            "br-tel_subscriber_code" => '電話番号（加入者番号）',
            "br-tel_overseas" => '国外電話番号',
            "br-fax1" => 'FAX番号_1',
            "br-fax2" => 'FAX番号_2',
            "br-fax3" => 'FAX番号_3',
            "br-mail_address" => 'メールアドレス',
            "br-labor_insurance_no" => '労働保険番号',
            "br-labor_insurance_payment_method" => '労働保険納付区分',
            "br-insurance_office_no" => '事業所番号（保険）',
            "br-insurance_office_reference_no" => '事業所整理記号（保険）',
            "br-pension_office_id" => '年金事務所ID',
            "br-pension_office_no" => '事業所番号（厚生年金）',
            "br-pension_office_reference_prefecture" => '事業所整理記号-都道府県コード',
            "br-pension_office_reference_no_cities" => '事業所整理記号-郡市区記号',
            "br-pension_office_reference_no_office" => '事業所整理記号-事業所記号',
            "br-employment_insurance_office_no" => '事業所番号（雇用保険）',
            "br-hello_work_id" => '管轄（公共職業安定所）',
            "br-labor_bureau_id" => '管轄（労働局）',
            "br-labor_supervision_id" => '管轄（労働基準監督）',
            "br-start_date_of_month" => '開始設定(月の始まり)',
            "br-start_days_of_week" => '開始設定(週の始まり)',
            "br-start_time_of_day" => '開始設定(日の始まり)',
            "br-work_time_start" => '就業時間(開始)',
            "br-work_time_end" => '就業時間(終了)',
            "br-agreed_hours_year_h" => '所定労働時間(年)-時間',
            "br-agreed_hours_month_h" => '所定労働時間(月)-時間',
            "br-agreed_hours_week_h" => '所定労働時間(週)-時間',
            "br-agreed_hours_day_h" => '所定労働時間(日)-時間',
            "br-agreed_hours_year_m" => '所定労働時間(年)-分',
            "br-agreed_hours_month_m" => '所定労働時間(月)-分',
            "br-agreed_hours_week_m" => '所定労働時間(週)-分',
            "br-agreed_hours_day_m" => '所定労働時間(日)-分',
            "br-working_days_yearly" => '労働日数(年間)',
            "br-working_days_monthly" => '労働日数(月間)',
            "br-holiday_yearly" => '休日日数(年間)',
            "br-holiday_monthly" => '休日日数(月間)',
            "br-work_style_type" => '体制区分',
            "br-holiday_legal" => '休日内容(基本の法定休日)',
            "br-holiday_not_logal" => '休日内容(法定外休日)',
        ];

        foreach ($this->input('br-name', []) as $index => $value) {
            $Attributes["br-name.{$index}"] = ($index + 1) . "事業所_名称";
        }
        foreach ($this->input('br-branch_type', []) as $index => $value) {
            $Attributes["br-branch_type.{$index}"] = ($index + 1) . "事業所_区分";
        }
        foreach ($this->input('br-place_type', []) as $index => $value) {
            $Attributes["br-place_type.{$index}"] = ($index + 1) . "事業所_国内外";
        }
        foreach ($this->input('br-post_code', []) as $index => $value) {
            $Attributes["br-post_code.{$index}"] = ($index + 1) . "事業所_郵便番号";
        }
        foreach ($this->input('br-address_prefecture', []) as $index => $value) {
            $Attributes["br-address_prefecture.{$index}"] = ($index + 1) . "事業所_住所（都道府県）";
        }
        foreach ($this->input('br-address_city', []) as $index => $value) {
            $Attributes["br-address_city.{$index}"] = ($index + 1) . "事業所_住所（市区町村）";
        }
        foreach ($this->input('br-address_ward', []) as $index => $value) {
            $Attributes["br-address_ward.{$index}"] = ($index + 1) . "事業所_住所（丁目・番地）";
        }
        foreach ($this->input('br-address_apartment', []) as $index => $value) {
            $Attributes["br-address_apartment.{$index}"] = ($index + 1) . "事業所_住所（アパート・マンション名等）";
        }
        foreach ($this->input('br-address_city_kana', []) as $index => $value) {
            $Attributes["br-address_city_kana.{$index}"] = ($index + 1) . "事業所_住所（市区町村）（カナ）";
        }
        foreach ($this->input('br-address_ward_kana', []) as $index => $value) {
            $Attributes["br-address_ward_kana.{$index}"] = ($index + 1) . "事業所_住所（丁目・番地）（カナ）";
        }
        foreach ($this->input('br-address_apartment_kana', []) as $index => $value) {
            $Attributes["br-address_apartment_kana.{$index}"] = ($index + 1) . "事業所_住所（アパート・マンション名等）（カナ）";
        }
        foreach ($this->input('br-tel_area_code', []) as $index => $value) {
            $Attributes["br-tel_area_code.{$index}"] = ($index + 1) . "事業所_電話番号（市外局番）";
        }
        foreach ($this->input('br-tel_city_code', []) as $index => $value) {
            $Attributes["br-tel_city_code.{$index}"] = ($index + 1) . "事業所_電話番号（市内局番）";
        }
        foreach ($this->input('br-tel_subscriber_code', []) as $index => $value) {
            $Attributes["br-tel_subscriber_code.{$index}"] = ($index + 1) . "事業所_電話番号（加入者番号）";
        }
        foreach ($this->input('br-tel_overseas', []) as $index => $value) {
            $Attributes["br-tel_overseas.{$index}"] = ($index + 1) . "事業所_国外電話番号";
        }
        foreach ($this->input('br-fax1', []) as $index => $value) {
            $Attributes["br-fax1.{$index}"] = ($index + 1) . "事業所_FAX番号_1";
        }
        foreach ($this->input('br-fax2', []) as $index => $value) {
            $Attributes["br-fax2.{$index}"] = ($index + 1) . "事業所_FAX番号_2";
        }
        foreach ($this->input('br-fax3', []) as $index => $value) {
            $Attributes["br-fax3.{$index}"] = ($index + 1) . "事業所_FAX番号_3";
        }
        foreach ($this->input('br-mail_address', []) as $index => $value) {
            $Attributes["br-mail_address.{$index}"] = ($index + 1) . "事業所_メールアドレス";
        }
        foreach ($this->input('br-labor_insurance_no', []) as $index => $value) {
            $Attributes["br-labor_insurance_no.{$index}"] = ($index + 1) . "事業所_労働保険番号";
        }
        foreach ($this->input('br-labor_insurance_payment_method', []) as $index => $value) {
            $Attributes["br-labor_insurance_payment_method.{$index}"] = ($index + 1) . "事業所_労働保険納付区分";
        }
        foreach ($this->input('br-insurance_office_no', []) as $index => $value) {
            $Attributes["br-insurance_office_no.{$index}"] = ($index + 1) . "事業所_事業所番号（保険）";
        }
        foreach ($this->input('br-insurance_office_reference_no', []) as $index => $value) {
            $Attributes["br-insurance_office_reference_no.{$index}"] = ($index + 1) . "事業所_事業所整理記号（保険）";
        }
        foreach ($this->input('br-pension_office_id', []) as $index => $value) {
            $Attributes["br-pension_office_id.{$index}"] = ($index + 1) . "事業所_年金事務所ID";
        }
        foreach ($this->input('br-pension_office_no', []) as $index => $value) {
            $Attributes["br-pension_office_no.{$index}"] = ($index + 1) . "事業所_事業所番号（厚生年金）";
        }
        foreach ($this->input('br-pension_office_reference_prefecture', []) as $index => $value) {
            $Attributes["br-pension_office_reference_prefecture.{$index}"] = ($index + 1) . "事業所_事業所整理記号-都道府県コード";
        }
        foreach ($this->input('br-pension_office_reference_no_cities', []) as $index => $value) {
            $Attributes["br-pension_office_reference_no_cities.{$index}"] = ($index + 1) . "事業所_事業所整理記号-郡市区記号";
        }
        foreach ($this->input('br-pension_office_reference_no_office', []) as $index => $value) {
            $Attributes["br-pension_office_reference_no_office.{$index}"] = ($index + 1) . "事業所_事業所整理記号-事業所記号";
        }
        foreach ($this->input('br-employment_insurance_office_no', []) as $index => $value) {
            $Attributes["br-employment_insurance_office_no.{$index}"] = ($index + 1) . "事業所_事業所番号（雇用保険）";
        }
        foreach ($this->input('br-hello_work_id', []) as $index => $value) {
            $Attributes["br-hello_work_id.{$index}"] = ($index + 1) . "事業所_管轄（公共職業安定所）";
        }
        foreach ($this->input('br-labor_bureau_id', []) as $index => $value) {
            $Attributes["br-labor_bureau_id.{$index}"] = ($index + 1) . "事業所_管轄（労働局）";
        }
        foreach ($this->input('br-labor_supervision_id', []) as $index => $value) {
            $Attributes["br-labor_supervision_id.{$index}"] = ($index + 1) . "事業所_管轄（労働基準監督）";
        }
        foreach ($this->input('br-start_date_of_month', []) as $index => $value) {
            $Attributes["br-start_date_of_month.{$index}"] = ($index + 1) . "事業所_開始設定(月の始まり)";
        }
        foreach ($this->input('br-start_days_of_week', []) as $index => $value) {
            $Attributes["br-start_days_of_week.{$index}"] = ($index + 1) . "事業所_開始設定(週の始まり)";
        }
        foreach ($this->input('br-start_time_of_day', []) as $index => $value) {
            $Attributes["br-start_time_of_day.{$index}"] = ($index + 1) . "事業所_開始設定(日の始まり)";
        }
        foreach ($this->input('br-work_time_start', []) as $index => $value) {
            $Attributes["br-work_time_start.{$index}"] = ($index + 1) . "事業所_就業時間(開始)";
        }
        foreach ($this->input('br-work_time_end', []) as $index => $value) {
            $Attributes["br-work_time_end.{$index}"] = ($index + 1) . "事業所_就業時間(終了)";
        }
        foreach ($this->input('br-agreed_hours_year_h', []) as $index => $value) {
            $Attributes["br-agreed_hours_year_h.{$index}"] = ($index + 1) . "事業所_所定労働時間(年)";
        }
        foreach ($this->input('br-agreed_hours_month_h', []) as $index => $value) {
            $Attributes["br-agreed_hours_month_h.{$index}"] = ($index + 1) . "事業所_所定労働時間(月)";
        }
        foreach ($this->input('br-agreed_hours_week_h', []) as $index => $value) {
            $Attributes["br-agreed_hours_week_h.{$index}"] = ($index + 1) . "事業所_所定労働時間(週)";
        }
        foreach ($this->input('br-agreed_hours_day_h', []) as $index => $value) {
            $Attributes["br-agreed_hours_day_h.{$index}"] = ($index + 1) . "事業所_所定労働時間(日)";
        }
        foreach ($this->input('br-agreed_hours_year_m', []) as $index => $value) {
            $Attributes["br-agreed_hours_year_m.{$index}"] = ($index + 1) . "事業所_所定労働時間(年)";
        }
        foreach ($this->input('br-agreed_hours_month_m', []) as $index => $value) {
            $Attributes["br-agreed_hours_month_m.{$index}"] = ($index + 1) . "事業所_所定労働時間(月)";
        }
        foreach ($this->input('br-agreed_hours_week_m', []) as $index => $value) {
            $Attributes["br-agreed_hours_week_m.{$index}"] = ($index + 1) . "事業所_所定労働時間(週)";
        }
        foreach ($this->input('br-agreed_hours_day_m', []) as $index => $value) {
            $Attributes["br-agreed_hours_day_m.{$index}"] = ($index + 1) . "事業所_所定労働時間(日)";
        }
        foreach ($this->input('br-working_days_yearly', []) as $index => $value) {
            $Attributes["br-working_days_yearly.{$index}"] = ($index + 1) . "事業所_労働日数(年間)";
        }
        foreach ($this->input('br-working_days_monthly', []) as $index => $value) {
            $Attributes["br-working_days_monthly.{$index}"] = ($index + 1) . "事業所_労働日数(月間)";
        }
        foreach ($this->input('br-holiday_yearly', []) as $index => $value) {
            $Attributes["br-holiday_yearly.{$index}"] = ($index + 1) . "事業所_休日日数(年間)";
        }
        foreach ($this->input('br-holiday_monthly', []) as $index => $value) {
            $Attributes["br-holiday_monthly.{$index}"] = ($index + 1) . "事業所_休日日数(月間)";
        }
        foreach ($this->input('br-work_style_type', []) as $index => $value) {
            $Attributes["br-work_style_type.{$index}"] = ($index + 1) . "事業所_体制区分";
        }
        foreach ($this->input('br-holiday_legal', []) as $index => $value) {
            $Attributes["br-holiday_legal.{$index}"] = ($index + 1) . "事業所_休日内容(基本の法定休日)";
        }
        foreach ($this->input('br-holiday_not_logal', []) as $index => $value) {
            $Attributes["br-holiday_not_logal.{$index}"] = ($index + 1) . "事業所_休日内容(法定外休日)";
        }

        return $Attributes;
    }
}
