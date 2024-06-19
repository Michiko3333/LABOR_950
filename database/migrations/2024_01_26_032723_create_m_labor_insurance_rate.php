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
        Schema::create('m_labor_insurance_rate', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('雇用保険料率ID');
            $table->string('industry_type_division', 255)->nullable()->comment('業種の種類の分類');
            $table->string('industry_type_no', 10)->nullable()->comment('業種番号');
            $table->string('industry_type_name', 255)->nullable()->comment('事業の種類');
            $table->decimal('rate_unemployment_and_childcare', 8, 5)->nullable()->comment('労災保険率');
            $table->timestamps();
            $table->comment('労災保険料率マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_labor_insurance_rate');
    }
};
