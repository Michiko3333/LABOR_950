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
        Schema::create('m_pickup_setting', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->integer('nursing_care_insurance_premium_deduction_begins')->nullable()->comment('介護保険料の控除開始');
            $table->integer('application_for_attainment_wage_certificate')->nullable()->comment('到達時賃金証明書の申請');
            $table->integer('end_of_nursing_care_insurance_premium_deduction')->nullable()->comment('介護保険料の控除終了');
            $table->integer('loss_of_eligibility_for_employees_pension_insurance')->nullable()->comment('厚生年金保険被保険者の資格喪失');
            $table->integer('loss_of_health_insurance_status')->nullable()->comment('健康保険被保険者の資格喪失');
            $table->string('labor_insurance_annual_renewal_start', 5)->nullable()->comment('労働保険年度更新(通知開始)');
            $table->string('year_end_tax_adjustment_start', 5)->nullable()->comment('年末調整(通知開始)');
            $table->string('year_end_tax_adjustment_end', 5)->nullable()->comment('年末調整(通知終了)');
            $table->integer('retirement_age')->nullable()->comment('定年退職年齢');
            $table->integer('retirement')->nullable()->comment('定年退職');
            $table->string('officers_ids')->nullable()->comment('役員の誕生日(社員ID)');
            $table->integer('officers_birthday')->nullable()->comment('役員の誕生日');
            $table->integer('settlement_date')->nullable()->comment('決算日');
            $table->integer('start_of_closure')->nullable()->comment('休業開始');
            $table->integer('end_of_closure')->nullable()->comment('休業終了');
            $table->integer('change_in_dependent_status')->nullable()->comment('扶養変更');
            $table->integer('subsidies_and_grants')->nullable()->comment('助成金・補助金等');
            $table->string('report_on_the_status_of_elderly_and_disabled_people', 5)->nullable()->comment('高齢者雇用状況報告書・障碍者状況等報告書');
            $table->integer('bonus_payment_notice')->nullable()->comment('健康保険・厚生年金保険被保険者賞与支払届');
            $table->string('basis_of_calculation', 5)->default('06-15')->comment('算定基礎届');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pickup_setting');
    }
};
