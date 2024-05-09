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
        Schema::create('m_compensation_applicable_industry', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労災保険適用事業ID');
            $table->string('industry_classification', 255)->nullable()->comment('事業種類分類');
            $table->string('industry_type_no', 20)->nullable()->comment('業者種類番号');
            $table->string('industry_type', 255)->nullable()->comment('業者種類');
            $table->string('detail_alphabet', 5)->nullable()->comment('細目アルファベット');
            $table->string('detail_summary', 255)->nullable()->comment('細目概要');
            $table->string('detail_no', 20)->nullable()->comment('細目番号');
            $table->string('detail_content1', 255)->nullable()->comment('細目詳細1');
            $table->string('detail_kana', 20)->nullable()->comment('細目細目イロハ');
            $table->string('detail_content2', 255)->nullable()->comment('細目詳細2');
            $table->string('remarks', 255)->nullable()->comment('備考');
            $table->timestamps();
            $table->comment('労災保険適用事業マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_compensation_applicable_industry');
    }
};
