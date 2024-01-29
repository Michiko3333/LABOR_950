<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->integer('currency_id')->nullable()->comment('給与支払通貨');
            $table->string('name', 255)->nullable()->comment('氏名');
            $table->string('name_kana', 255)->nullable()->comment('氏名（カナ）');
            $table->string('name_alphabet', 255)->nullable()->comment('氏名（アルファベット）');
            $table->string('name_common', 255)->nullable()->comment('通称名');
            $table->string('name_common_kana', 255)->nullable()->comment('通称名（カナ）');
            $table->tinyInteger('sex')->nullable()->comment('性別');
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('tel', 20)->nullable()->comment('連絡先電話番号');
            $table->string('mail_address1', 255)->nullable()->comment('メールアドレス１');
            $table->string('mail_address2', 255)->nullable()->comment('メールアドレス２');
            $table->string('emergency_contact1', 255)->nullable()->comment('緊急連絡先名１');
            $table->string('emergency_relationship1', 255)->nullable()->comment('緊急連絡先属柄１');
            $table->string('emergency_tel1', 20)->nullable()->comment('緊急連絡先電話番号１');
            $table->string('emergency_address_prefecture1', 255)->nullable()->comment('緊急連絡先住所（都道府県）１');
            $table->string('emergency_address_city1', 255)->nullable()->comment('緊急連絡先住所（市区町村）１');
            $table->string('emergency_address_more_details1', 255)->nullable()->comment('緊急連絡先住所（他）１');
            $table->string('emergency_contact2', 255)->nullable()->comment('緊急連絡先名２');
            $table->string('emergency_relationship2', 255)->nullable()->comment('緊急連絡先属柄２');
            $table->string('emergency_tel2', 20)->nullable()->comment('緊急連絡先電話番号２');
            $table->string('emergency_address_prefecture2', 255)->nullable()->comment('緊急連絡先住所（都道府県）２');
            $table->string('emergency_address_city2', 255)->nullable()->comment('緊急連絡先住所（市区町村）２');
            $table->string('emergency_address_more_details2', 255)->nullable()->comment('緊急連絡先住所（他）２');
            $table->tinyInteger('spouse_flg')->nullable()->comment('配偶者の有無');
            $table->integer('dependent_family_number')->nullable()->comment('扶養人数');
            $table->integer('country_id')->nullable()->comment('国籍');
            $table->string('residence_card_no', 20)->nullable()->comment('在留カードNo');
            $table->string('mynumber_card_no', 20)->nullable()->comment('マイナンバーカードNo');
            $table->string('social_insurance_no', 10)->nullable()->comment('社会保険番号');
            $table->string('pension_office_no', 10)->nullable()->comment('事業所番号（厚生年金）');
            $table->string('pension_office_reference_no', 10)->nullable()->comment('事業所整理番号（厚生年金）');
            $table->string('pension_no', 10)->nullable()->comment('基礎年金番号');
            $table->tinyInteger('labor_insurance_type')->nullable()->default(1)->comment('労災保険区分');
            $table->tinyInteger('employment_insurance_type')->nullable()->default(1)->comment('雇用保険区分');
            $table->string('insurance_office_no', 20)->nullable()->comment('事業所番号（保険）');
            $table->string('insurance_office_reference_no', 20)->nullable()->comment('事業所整理番号（保険）');
            $table->string('insurer_no', 10)->nullable()->comment('保険者番号');
            $table->tinyInteger('employee_type')->nullable()->comment('社員区分');
            $table->tinyInteger('employee_status')->nullable()->comment('社員ステータス');
            $table->tinyInteger('personal_information_access_flg')->nullable()->comment('個人情報の取り扱い許可フラグ');
            $table->datetime('personal_information_access_flg_tmsp')->nullable()->comment('個人情報の取り扱い許可タイムスタンプ');
            $table->tinyInteger('external_advisor_flg')->default(0)->comment('外部顧問フラグ');
            $table->tinyInteger('employment_type')->nullable()->comment('雇用区分');
            $table->date('employment_start_date')->nullable()->comment('雇用開始年月日');
            $table->date('employment_end_date')->nullable()->comment('雇用終了年月日');
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