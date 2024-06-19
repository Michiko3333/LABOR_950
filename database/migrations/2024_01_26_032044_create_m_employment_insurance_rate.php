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
        Schema::create('m_employment_insurance_rate', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('雇用保険料率ID');
            $table->string('industry_type', 255)->nullable()->comment('事業種類');
            $table->decimal('rate_worker', 8, 5)->nullable()->comment('労働者負担');
            $table->decimal('rate_owner', 8, 5)->nullable()->comment('事業主負担');
            $table->decimal('rate_unemployment_and_childcare', 8, 5)->nullable()->comment('失業や育児休業給付の料率');
            $table->decimal('rate_closed_and_change_job', 8, 5)->nullable()->comment('雇用保険二事業の料率');
            $table->decimal('rate_sum', 8, 5)->nullable()->comment('合計料率');
            $table->timestamps();
            $table->comment('雇用保険料率マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_employment_insurance_rate');
    }
};
