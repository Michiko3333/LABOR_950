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
        Schema::create('m_salary_history', function (Blueprint $table) {
            $table->id();
            $table->integer('salary_id')->comment('給与ID');
            $table->integer('branch_id')->comment('支店ID');
            $table->string('department_id',20)->comment('部署ID');
            $table->integer('payroll_deadline')->nullable()->comment('締め日');
            $table->integer('payroll_month')->nullable()->comment('支払月');
            $table->integer('payroll_day')->nullable()->comment('支払日');
            $table->date('applied_date')->nullable()->comment('適用年月');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('給与マスタ（履歴）');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_salary_history');
    }
};
