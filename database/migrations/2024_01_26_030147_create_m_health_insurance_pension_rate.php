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
        Schema::create('m_health_insurance_pension_rate', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('健保年金料率額ID');
            $table->integer('prefecture_id')->nullable()->comment('都道府県');
            $table->string('salary_grade', 10)->nullable()->comment('等級');
            $table->integer('salary_monthly')->nullable()->comment('月額');
            $table->integer('salary_min')->nullable()->comment('報酬月額(min)');
            $table->integer('salary_max')->nullable()->comment('報酬月額(max)');
            $table->tinyInteger('insurance_type')->nullable()->comment('保険区分');
            $table->tinyInteger('medical_insurance_member_flg')->nullable()->comment('医療保険加入者フラグ');
            $table->decimal('rate', 8, 5)->nullable()->comment('料率');
            $table->string('amount_type')->nullable()->comment('負担区分');
            $table->integer('amount')->nullable()->comment('金額');
            $table->timestamps();
            $table->comment('健保年金料率額マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_health_insurance_pension_rate');
    }
};
