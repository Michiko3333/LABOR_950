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
        Schema::create('m_values_employee_insured_type', function (Blueprint $table) {
            $table->id()->comment('社員の被保険者資格取得区分設定値ID');
            $table->string('name', 255)->nullable()->comment('項目名');
            $table->timestamps();
            $table->comment('社員の被保険者資格取得区分設定値マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_values_employee_insured_type');
    }
};
