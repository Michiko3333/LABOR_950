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
        Schema::create('t_wage_data', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('社員ID');
            $table->integer('company_id')->comment('会社ID');
            $table->tinyInteger('type')->comment('年度');
            $table->integer('origin_year')->comment('年度');
            $table->integer('year')->comment('年');
            $table->integer('month')->comment('月');
            $table->datetime('date')->comment('年月');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_wage_ledger');
    }
};
