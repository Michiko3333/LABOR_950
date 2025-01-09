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
        Schema::create('t_wage', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->integer('branch_id')->nullable()->comment('事業所ID');
            $table->integer('employee_id')->nullable()->comment('従業員ID');
            $table->string('employee_no')->comment('社員番号');
            $table->string('employee_name')->comment('従業員氏名');
            $table->string('branch_name')->comment('事業所');
            $table->string('departments')->nullable()->comment('部署');
            $table->string('employment_type')->nullable()->comment('雇用区分');
            $table->string('work_type')->nullable()->comment('勤務区分');
            $table->string('grade')->nullable()->comment('等級区分');
            $table->string('gradational_salary')->nullable()->comment('号棒区分');
            $table->string('other_type')->nullable()->comment('その他区分');
            $table->date('month')->comment('月');
            $table->string('wage_type', 5)->comment('賃金区分');
            $table->integer('wage_base_amount')->nullable()->comment('基本給');
            $table->integer('absence_deduction')->nullable()->comment('欠勤控除');
            $table->integer('late_deduction')->nullable()->comment('遅早控除');
            $table->integer('other_deduction')->nullable()->comment('その他控除');
            $table->integer('taxable_paymment')->nullable()->comment('課税支給額');
            $table->integer('non_taxable_paymment')->nullable()->comment('非課税支給');
            $table->integer('labor_insurance_target')->nullable()->comment('労働保険対象賃金');
            $table->integer('social_insurance_target')->nullable()->comment('社会保険対象賃金');
            $table->integer('health_insurance_deduction')->nullable()->comment('健康保険');
            $table->integer('nursing_care_insurance_deduction')->nullable()->comment('介護保険');
            $table->integer('welfare_pension_deduction')->nullable()->comment('厚生年金');
            $table->integer('welfare_pension_insurance_deduction')->nullable()->comment('厚生年金基金');
            $table->integer('employment_insurance_deduction')->nullable()->comment('雇用保険');
            $table->integer('other_insurance_deduction')->nullable()->comment('その他');
            $table->integer('social_insurance_deduction')->nullable()->comment('社会保険控除');
            $table->integer('withholding_tax')->nullable()->comment('源泉所得税');
            $table->integer('resident_tax')->nullable()->comment('住民税');
            $table->integer('mutual_aid')->nullable()->comment('共済費');
            $table->integer('asset_saving')->nullable()->comment('財形貯蓄');
            $table->integer('other_deduction2')->nullable()->comment('その他控除');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('賃金情報テーブル');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_wage');
    }
};
