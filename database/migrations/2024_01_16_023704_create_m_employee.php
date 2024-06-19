<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_employee', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('社員ID（システム）');
            $table->string('employee_no', 255)->nullable()->comment('社員番号（企業割当）');
            $table->integer('branch_id')->comment('支店ID');
            // 給与支払通貨はdefault日本円に設定予定
            $table->integer('managerial_position_id')->nullable()->comment('役職ID');
            $table->string('division_name', 255)->nullable()->comment('部門名');
            $table->string('division_name_kana', 255)->nullable()->comment('部門名（カナ）');
            $table->string('last_name', 255)->nullable()->comment('氏');
            $table->string('last_name_kana', 255)->nullable()->comment('氏（カナ）');
            $table->string('last_name_alphabet', 255)->nullable()->comment('氏（アルファベット）');
            $table->string('first_name', 255)->nullable()->comment('名');
            $table->string('first_name_kana', 255)->nullable()->comment('名（カナ）');
            $table->string('first_name_alphabet', 255)->nullable()->comment('名（アルファベット）');
            $table->string('old_last_name', 255)->nullable()->comment('旧氏');
            $table->string('old_last_name_kana', 255)->nullable()->comment('旧氏（カナ）');
            $table->string('old_last_name_alphabet', 255)->nullable()->comment('旧氏（アルファベット）');
            $table->string('old_first_name', 255)->nullable()->comment('旧名');
            $table->string('old_first_name_kana', 255)->nullable()->comment('旧名（カナ）');
            $table->string('old_first_name_alphabet', 255)->nullable()->comment('旧名（アルファベット）');
            $table->string('name_common', 255)->nullable()->comment('通称名');
            $table->string('name_common_kana', 255)->nullable()->comment('通称名（カナ）');
            $table->integer('sex')->nullable()->comment('性別');
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_ward', 255)->nullable()->comment('住所（丁目・番地）');
            $table->string('address_apartment', 255)->nullable()->comment('住所（アパート・マンション名等）');
            $table->string('address_prefecture_kana', 255)->nullable()->comment('住所（都道府県）（カナ）');
            $table->string('address_city_kana', 255)->nullable()->comment('住所（市区町村）（カナ）');
            $table->string('address_ward_kana', 255)->nullable()->comment('住所（丁目・番地）（カナ）');
            $table->string('address_apartment_kana', 255)->nullable()->comment('住所（アパート・マンション名等）（カナ）');
            $table->string('tel_area_code', 10)->nullable()->comment('連絡先電話番号（市外局番）');
            $table->string('tel_city_code', 10)->nullable()->comment('連絡先電話番号（市内局番）');
            $table->string('tel_subscriber_code', 10)->nullable()->comment('連絡先電話番号（加入者番号）');
            $table->string('fax', 20)->nullable()->comment('連絡先FAX番号（ハイフン無し）');
            $table->string('mail_address1', 255)->nullable()->comment('メールアドレス１');
            $table->string('mail_address2', 255)->nullable()->comment('メールアドレス２');
            $table->string('emergency_post_code1', 20)->nullable()->comment('緊急連絡先郵便番号１');
            $table->string('emergency_contact1', 255)->nullable()->comment('緊急連絡先名１');
            $table->string('emergency_relationship1', 255)->nullable()->comment('緊急連絡先続柄１');
            $table->string('emergency_tel1', 20)->nullable()->comment('緊急連絡先電話番号１');
            $table->string('emergency_address_prefecture1', 255)->nullable()->comment('緊急連絡先住所（都道府県）１');
            $table->string('emergency_address_city1', 255)->nullable()->comment('緊急連絡先住所（市区町村）１');
            $table->string('emergency_address_ward1', 255)->nullable()->comment('緊急連絡先住所（丁目・番地）１');
            $table->string('emergency_address_apartment1', 255)->nullable()->comment('緊急連絡先住所（アパート・マンション名等）１');
            $table->string('emergency_post_code2', 20)->nullable()->comment('緊急連絡先郵便番号２');
            $table->string('emergency_contact2', 255)->nullable()->comment('緊急連絡先名２');
            $table->string('emergency_relationship2', 255)->nullable()->comment('緊急連絡先続柄２');
            $table->string('emergency_tel2', 20)->nullable()->comment('緊急連絡先電話番号２');
            $table->string('emergency_address_prefecture2', 255)->nullable()->comment('緊急連絡先住所（都道府県）２');
            $table->string('emergency_address_city2', 255)->nullable()->comment('緊急連絡先住所（市区町村）２');
            $table->string('emergency_address_ward2', 255)->nullable()->comment('緊急連絡先住所（丁目・番地）２');
            $table->string('emergency_address_apartment2', 255)->nullable()->comment('緊急連絡先住所（アパート・マンション名等）２');
            $table->tinyInteger('spouse_flg')->nullable()->comment('配偶者の有無');
            $table->tinyInteger('dependent_flg')->nullable()->comment('扶養者の有無');
            $table->integer('dependent_family_number')->nullable()->comment('扶養人数');
            $table->integer('country_id')->nullable()->comment('国籍');
            $table->string('salary_notices', 255)->nullable()->comment('賃金特記事項');
            $table->integer('insured_type')->nullable()->comment('被保険者資格取得区分');
            $table->integer('insured_age_type')->nullable()->comment('取得時被保険者種類');
            $table->string('residence_card_no', 20)->nullable()->comment('在留カード番号');
            $table->date('stay_date_period')->nullable()->comment('在留期間');
            $table->integer('residential_status_id')->nullable()->comment('在留資格');
            $table->string('residential_status_unknown_reason', 255)->nullable()->comment('在留資格不明理由');
            $table->tinyInteger('unauthorized_activities_permission_flg')->nullable()->comment('資格外活動許可フラグ');
            $table->string('mynumber_card_no', 20)->nullable()->comment('マイナンバーカード番号');
            $table->string('social_insurance_no', 10)->nullable()->comment('社会保険番号');
            $table->string('pension_office_no', 10)->nullable()->comment('事業所番号（厚生年金）');
            $table->string('pension_office_reference_prefecture', 10)->nullable()->comment('事業所整理記号（厚生年金）用の都道府県コード');
            $table->string('pension_office_reference_no_cities', 10)->nullable()->comment('事業所整理記号（厚生年金）郡市区記号');
            $table->string('pension_office_reference_no_office', 10)->nullable()->comment('事業所整理記号（厚生年金）事業所記号');
            $table->string('pension_no', 10)->nullable()->comment('基礎年金番号');
            $table->integer('labor_insurance_type')->nullable()->default(1)->comment('労災保険区分');
            $table->integer('employment_insurance_type')->nullable()->default(1)->comment('雇用保険区分');
            $table->string('insurance_office_no', 20)->nullable()->comment('事業所番号（保険）');
            $table->string('insurance_office_reference_no', 20)->nullable()->comment('事業所整理番号（保険）');
            $table->string('insurer_no', 10)->nullable()->comment('保険者番号');
            $table->string('employment_insurance_office_no', 20)->nullable()->comment('事業所番号（雇用保険）');
            $table->date('employment_insurance_applied_date')->nullable()->comment('雇用保険届出日');
            $table->date('employment_insured_date')->nullable()->comment('雇用保険資格取得日');
            $table->string('employment_insured_no', 20)->nullable()->comment('雇用保険被保険者番号');
            $table->integer('employee_type')->nullable()->comment('社員区分');
            $table->integer('employee_status')->nullable()->comment('社員ステータス');
            $table->tinyInteger('contract_period_flg')->nullable()->comment('契約期間フラグ');
            $table->date('contract_start_date')->nullable()->comment('契約開始日');
            $table->date('contract_end_date')->nullable()->comment('契約終了日');
            $table->tinyInteger('contract_renewal_flg')->nullable()->comment('契約更新条項フラグ');
            $table->date('hired_date')->nullable()->comment('入社日');
            $table->date('childcare_leave_start_date')->nullable()->comment('育児休業開始日');
            $table->integer('childcare_extension_reason')->nullable()->comment('育児期間の延長事由');
            $table->integer('childcare_reacquisition_reason')->nullable()->comment('育児休業再取得理由');
            $table->date('childcare_leave_end_date')->nullable()->comment('育児休業終了日');
            $table->date('caregiver_leave_start_date')->nullable()->comment('介護休業開始日');
            $table->date('caregiver_leave_end_date')->nullable()->comment('介護休業終了日');
            $table->date('retirement_date')->nullable()->comment('離職日');
            $table->date('intended_retirement_date')->nullable()->comment('離職予定日');
            $table->tinyInteger('resignation_letter_request_flg')->nullable()->comment('離職票の交付希望フラグ');
            $table->integer('retired_reason_type')->nullable()->comment('離職理由');
            $table->date('insurance_loss_date')->nullable()->comment('喪失日');
            $table->integer('insurance_loss_reason')->nullable()->comment('喪失原因');
            $table->integer('over_retired_insurance_loss_reason')->nullable()->comment('喪失原因（70歳以上）');
            $table->tinyInteger('over_70_applicable_flg')->nullable()->comment('70歳以上被用者該当フラグ');
            $table->date('over_70_non_applicable_date')->nullable()->comment('70歳以上被用者不該当日');
            $table->date('passed_away_date')->nullable()->comment('死亡日');
            $table->tinyInteger('external_advisor_flg')->nullable()->comment('外部顧問フラグ');
            $table->string('occupation_type', 10)->nullable()->comment('職種');
            $table->integer('employment_route')->nullable()->comment('就職経路');
            $table->integer('insured_reason')->nullable()->comment('被保険者となった原因');
            $table->string('insured_reason_details', 255)->nullable()->comment('被保険者となった原因の備考');
            $table->integer('currency_id')->nullable()->comment('給与支払通貨');
            $table->integer('salary_payment_system')->nullable()->comment('支払いの態様');
            $table->integer('caregiver_leave_benefit_receive_bank_id')->nullable()->comment('介護休業給付金受取金融機関');
            $table->string('japan_post_bank_code_no', 10)->nullable()->comment('ゆうちょ記号番号');
            $table->string('japan_post_bank_account_no', 10)->nullable()->comment('ゆうちょ口座番号');
            $table->string('bank_account_no', 20)->nullable()->comment('ゆうちょ以外口座番号');
            $table->integer('employment_type')->nullable()->comment('就労区分');
            $table->integer('employment_status')->nullable()->comment('雇用形態（労働者種別）');
            $table->tinyInteger('employer_type')->nullable()->comment('雇用区分');
            $table->date('employment_start_date')->nullable()->comment('雇用開始年月日');
            $table->date('employment_end_date')->nullable()->comment('雇用終了年月日');
            $table->integer('role_id')->default(100)->comment('権限コード');
            $table->string('icon_path', 255)->nullable()->comment('アイコン画像');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('社員マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_employee');
    }
};
