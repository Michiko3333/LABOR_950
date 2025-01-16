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
        Schema::table('t_wage', function (Blueprint $table) {
            $table->integer('total_amount')->nullable()->comment('総支給額')->after('wage_type');
            $table->integer('overtime_label')->nullable()->comment('残業手当合計')->after('wage_base_amount');
            $table->integer('allowance_label')->nullable()->comment('諸手当合計')->after('overtime_label');
            $table->integer('salary_amount')->nullable()->comment('支給合計')->after('non_taxable_paymment');
            $table->integer('social_insurance_amount')->nullable()->comment('社会保険料合計額')->after('other_insurance_deduction');
            $table->integer('deduction_sum')->nullable()->comment('控除合計額')->after('other_deduction');
            $table->integer('wage_amount')->nullable()->comment('差引支給額')->after('deduction_sum');

            $table->dropColumn('social_insurance_deduction');

            $table->comment = '賃金情報テーブル';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_wage', function (Blueprint $table) {
            $table->dropColumn('total_amount');
            $table->dropColumn('overtime_label');
            $table->dropColumn('allowance_label');
            $table->dropColumn('salary_amount');
            $table->dropColumn('social_insurance_amount');
            $table->dropColumn('deduction_sum');
            $table->dropColumn('wage_amount');

            $table->integer('social_insurance_deduction')->nullable()->comment('社会保険控除');
        });
    }
};
