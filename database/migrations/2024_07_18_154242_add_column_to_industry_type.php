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
        Schema::dropIfExists('m_industry_type');

        Schema::create('m_industry_type', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('業種ID');
            $table->string('industry_type_code', 255)->unique()->comment('分類コード');
            $table->string('big_category_name',255)->comment('大分類名');
            $table->string('big_category_code', 10)->comment('大分類コード');
            $table->string('medium_category_name',255)->comment('中分類名');
            $table->string('medium_category_code', 10)->comment('中分類コード');
            $table->string('small_category_name',255)->comment('小分類名');
            $table->string('small_category_code', 10)->comment('小分類コード');
            $table->string('tiny_category_name',255)->comment('細分類名');
            $table->string('tiny_category_code', 10)->comment('細分類コード');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
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

        Schema::create('m_industry_type', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('業種ID');
            $table->string('industry_type_code', 10)->unique()->nullable()->comment('業種コード');
            $table->string('industry_type_no', 10)->nullable()->comment('業種番号');
            $table->string('name', 255)->nullable()->comment('業種名');
            $table->string('big_category', 255)->nullable()->comment('大分類');
            $table->string('big_category_alphabet',10)->nullable()->comment('大分類アルファベット');
            $table->string('medium_category', 255)->nullable()->comment('中分類');
            $table->string('medium_category_no', 10)->nullable()->comment('中分類番号');
            $table->string('small_category', 255)->nullable()->comment('小分類');
            $table->string('small_category_no', 10)->nullable()->comment('小分類番号');
            $table->timestamps();
            $table->comment('業種マスタ');
        });
    }
};
