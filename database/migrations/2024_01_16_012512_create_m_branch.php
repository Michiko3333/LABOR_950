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
        Schema::create('m_branch', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('支店ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('name', 255)->nullable()->comment('名称');
            $table->string('tel_area_code', 10)->nullable()->comment('電話番号（市外局番）');
            $table->string('tel_city_code', 10)->nullable()->comment('電話番号（市内局番）');
            $table->string('tel_subscriber_code', 10)->nullable()->comment('電話番号（加入者番号）');
            $table->string('tel_overseas', 10)->nullable()->comment('国外電話番号');
            $table->tinyInteger('place_type')->default(1)->comment('国内外');
            $table->tinyInteger('branch_type')->nullable()->comment('区分');
            $table->string('labor_insurance_no', 20)->nullable()->comment('労働保険番号');
            $table->tinyInteger('labor_insurance_payment_method')->nullable()->comment('労働保険納付区分');
            $table->integer('insurance_type_id')->nullable()->comment('労働保険種類の分類');
            $table->date('labor_insurance_establishment_date')->nullable()->comment('労働保険成立年月日');
            $table->string('insurance_office_no', 20)->nullable()->comment('事業所番号（保険）');
            $table->string('insurance_office_reference_no', 20)->nullable()->comment('事業所整理番号（保険）');
            $table->string('pension_office_no', 10)->nullable()->comment('事業所番号（厚生年金）');
            $table->string('pension_office_reference_no', 10)->nullable()->comment('事業所整理番号（厚生年金）');
            $table->integer('pension_office_id')->nullable()->comment('年金事務所ID');
            $table->string('employment_insurance_office_no', 20)->nullable()->comment('事業所番号（雇用保険）');
            $table->date('employment_insurance_establishment_date')->nullable()->comment('雇用保険設立年月日');
            $table->integer('hello_work_id')->nullable()->comment('管轄（公共職業安定所）');
            $table->integer('labor_bureau_id')->nullable()->comment('管轄（労働局）');
            $table->integer('labor_supervision_id')->nullable()->comment('管轄（労働基準監督）');
            $table->tinyInteger('start_date_of_month')->nullable()->comment('開始設定(月の始まり)');
            $table->tinyInteger('start_days_of_week')->nullable()->comment('開始設定(週の始まり)');
            $table->time('start_time_of_day')->nullable()->comment('開始設定(日の始まり)');
            $table->time('work_time_start')->nullable()->comment('就業時間(開始)');
            $table->time('work_time_end')->nullable()->comment('就業時間(終了)');
            $table->integer('work_time_standards_id')->nullable()->comment('年金事務所ID');
            $table->text('agreed_hours_year')->nullable()->comment('所定労働時間(年)');
            $table->time('agreed_hours_month')->nullable()->comment('所定労働時間(月)');
            $table->time('agreed_hours_week')->nullable()->comment('所定労働時間(週)');
            $table->time('agreed_hours_day')->nullable()->comment('所定労働時間(日)');
            $table->integer('working_days_yearly')->nullable()->comment('労働日数(年間)');
            $table->tinyInteger('working_days_monthly')->nullable()->comment('労働日数(月間)');
            $table->integer('holiday_yearly')->nullable()->comment('休日日数(年間)');
            $table->tinyInteger('hoiday_monthly')->nullable()->comment('休日日数(月間)');
            $table->text('holiday_legal')->nullable()->comment('休日内容(基本の法定休日)');
            $table->text('holiday_not_logal')->nullable()->comment('休日内容(法定外休日)');
            $table->tinyInteger('work_style_type')->nullable()->comment('体制区分');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('支店マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_branch');
    }
};

