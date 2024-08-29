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
        Schema::table('m_branch', function (Blueprint $table) {
            $table->integer('labor_insurance_category')->nullable()->comment('労災種類の分類')->after('labor_insurance_payment_method');
            $table->string('kenpo_no', 20)->nullable()->comment('協会けんぽNo')->after('labor_insurance_establishment_date');
            $table->string('insurance_office_name', 100)->nullable()->comment('健康保険組合・名称')->after('kenpo_no');
            $table->integer('insurance_applicable_date')->nullable()->comment('社保適用年月')->after('pension_office_reference_no_office');
            $table->string('bonus_payment_month', 255)->nullable()->comment('賞与支払い月')->after('insurance_applicable_date');
            $table->string('pension_office_name', 100)->nullable()->comment('厚生年金基金・名称')->after('bonus_payment_month');
            $table->integer('employment_insurance_rate')->nullable()->comment('雇用保険料率区分')->after('employment_insurance_office_no');
            $table->integer('rate_pattern_id')->nullable()->comment('料率パターン')->after('employment_insurance_establishment_date');
            $table->integer('fractional_adjustment_pattern_id')->nullable()->comment('端数調整パターン')->after('rate_pattern_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_branch', function (Blueprint $table) {
            $table->dropColumn('labor_insurance_category');
            $table->dropColumn('kenpo_no');
            $table->dropColumn('insurance_office_name');
            $table->dropColumn('insurance_applicable_date');
            $table->dropColumn('bonus_payment_month');
            $table->dropColumn('pension_office_name');
            $table->dropColumn('employment_insurance_rate');
            $table->dropColumn('rate_pattern_id');
            $table->dropColumn('fractional_adjustment_pattern_id');
        });
    }
};
