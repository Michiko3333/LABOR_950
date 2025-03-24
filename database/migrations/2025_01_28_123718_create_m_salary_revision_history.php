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
        Schema::create('m_salary_revision_history', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('社員ID');
            $table->integer('monthly_standard_salary')->comment('標準報酬月額');
            $table->integer('health_insurance')->comment('健康保険');
            $table->integer('welfare_annuity_insurance')->comment('厚生年金保険');
            $table->date('revision_date')->comment('改定年月');
            $table->timestamps();
            $table->comment('標準報酬月額改定履歴マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_salary_revision_history');
    }
};
