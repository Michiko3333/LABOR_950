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
        Schema::create('m_employee_salary_breakdown', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('社員給与内訳ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('salary_breakdown_id')->nullable()->comment('給与内訳ID');
            $table->integer('amonut')->comment('金額');
            $table->timestamps();
            $table->comment('社員給与内訳マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_employee_salary_breakdown');
    }
};
