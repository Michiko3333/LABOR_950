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
        Schema::create('t_payment_status_before_retirement', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('離職前賃金支払状況ID');
            $table->string('employee_id')->nullable()->comment('社員ID');
            $table->date('computation_period_start_date')->nullable()->comment('算定期間_開始日');
            $table->date('computation_period_end_date')->nullable()->comment('算定期間_終了日');
            $table->string('calculation_basic_period')->nullable()->comment('算定期間基礎日数');
            $table->date('payment_period_start_date')->nullable()->comment('支払期間_開始日');
            $table->date('payment_period_end_date')->nullable()->comment('支払期間_終了日');
            $table->string('payment_basic_period')->nullable()->comment('支払期間基礎日数');
            $table->string('regular_insured')->nullable()->comment('一般被保険賃金額');
            $table->string('short_term_insured')->nullable()->comment('短期被保険者金額');
            $table->string('remarks', 255)->nullable()->comment('備考');
            $table->timestamps();
            $table->comment('離職前賃金支払状況トランザクション');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_payment_status_before_retirement');
    }
};
