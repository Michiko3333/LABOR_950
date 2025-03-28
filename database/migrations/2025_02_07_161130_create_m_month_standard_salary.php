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
        Schema::create('m_month_standard_salary', function (Blueprint $table) {
            $table->id();
            $table->integer('monthly_standard_salary')->comment('標準報酬月額');
            $table->integer('standard_salary_level')->comment('標準報酬等級');
            $table->integer('monthly_salary_min')->comment('報酬月額最小値');
            $table->integer('monthly_salary_max')->comment('報酬月額最大値');
            $table->date('applied_date')->comment('適用年月');
            $table->timestamps();
            $table->comment('標準報酬月額マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_month_standard_salary');
    }
};
