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
        Schema::create('m_salary_breakdown', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('給与内訳ID');
            $table->integer('branch_id')->nullable()->comment('支店ID');
            $table->string('name', 255)->nullable()->comment('支給項目名');
            $table->tinyInteger('bonus_flg')->nullable()->comment('賞与フラグ');
            $table->timestamps();
            $table->comment('給与内訳マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_salary_breakdown');
    }
};
