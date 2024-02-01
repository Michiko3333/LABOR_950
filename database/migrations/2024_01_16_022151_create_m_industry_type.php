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
        Schema::create('m_industry_type', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('業種ID');
            $table->string('industry_type_code', 10)->unique()->nullable()->comment('業種コード');
            $table->string('big_category', 255)->comment('大分類');
            $table->tinyInteger('big_category_alphabet')->nullable()->comment('大分類アルファベット');
            $table->string('medium_category', 255)->nullable()->comment('中分類');
            $table->tinyInteger('medium_category_no')->nullable()->comment('中分類番号');
            $table->string('small_category', 255)->nullable()->comment('小分類');
            $table->tinyInteger('small_category_no')->nullable()->comment('小分類番号');
            $table->timestamps();
            $table->comment('業種マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_industry_type');
    }
};
