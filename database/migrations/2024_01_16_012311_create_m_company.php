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
        Schema::create('m_company', function (Blueprint $table) {
            $table->id('company_id')->autoIncrement()->comment('会社ID');
            $table->string('name', 255)->nullable()->comment('会社名');
            $table->string('name_kana', 255)->nullable()->comment('会社名（カナ）');
            $table->string('name_en', 255)->nullable()->comment('会社名（英語表記）');
            $table->string('name_abbreviation', 255)->nullable()->comment('会社名（略称表記）');
            $table->string('company_no', 20)->nullable()->comment('法人番号');
            $table->tinyInteger('company_type_id')->nullable()->comment('法人格');
            // 保険関連一旦保留
            // $table->string('employment_insurance_office_no', 10)->nullable()->comment('事業所番号（雇用保険）');
            // $table->string('pension_insurance_office_no', 10)->nullable()->comment('事業所整理記号（厚生年金保険）');
            // $table->string('pension_insurance_office_reference_no', 20)->nullable()->comment('事業所番号（厚生年金保険）');
            // $table->string('health_insurance_no', 20)->nullable()->comment('事業所整理記号（健康保険）');
            // $table->string('labor_insurance_no', 20)->nullable()->comment('労働保険番号');
            $table->string('license_id')->nullable()->comment('許認可番号');
            $table->tinyInteger('business_type')->nullable()->comment('企業区分');
            $table->tinyInteger('listed_type')->nullable()->comment('上場区分');
            $table->string('stock_code', 20)->unique()->nullable()->comment('証券コード');
            $table->date('founding_date')->nullable()->comment('創業年月');
            $table->date('establishment_date')->nullable()->comment('設立年月');
            $table->integer('capital')->nullable()->comment('資本金');
            $table->integer('annual_sales')->nullable()->comment('年間売上高（連結）');
            $table->integer('employee_sum')->nullable()->comment('従業員数');
            $table->text('qualification')->nullable()->comment('保有資格');
            $table->string('representative', 255)->nullable()->comment('代表者氏名');
            $table->string('representative_kana', 255)->nullable()->comment('代表者氏名カナ');
            $table->integer('authorized_shares')->nullable()->comment('発行可能株式総数');
            $table->integer('issued_shares')->nullable()->comment('発行済株式総数');
            $table->string('supplier_company', 255)->nullable()->comment('仕入先名称');
            $table->string('outsourcing_company', 255)->nullable()->comment('外注先名称');
            $table->string('sales_company', 255)->nullable()->comment('販売先名称');
            $table->integer('external_advisor_id')->nullable()->comment('外部顧問社員ID');
            $table->string('url', 255)->nullable()->comment('ホームページアドレス');
            $table->text('purpose')->nullable()->comment('事業目的');
            $table->tinyInteger('company_division')->nullable()->comment('会社区分');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('会社マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_company');
    }
};
