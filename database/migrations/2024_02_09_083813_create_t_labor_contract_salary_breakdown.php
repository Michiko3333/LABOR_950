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
        Schema::create('t_labor_contract_salary_breakdown', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労働契約の給料内訳ID');
            $table->integer('labor_contract_id')->nullable()->comment('労働契約ID');
            $table->integer('salary_breakdown_id')->nullable()->comment('給与内訳ID');
            $table->integer('amount')->nullable()->comment('金額');
            $table->timestamps();
            $table->comment('労働契約の給料内訳トランザクション');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_labor_contract_salary_breakdown');
    }
};
