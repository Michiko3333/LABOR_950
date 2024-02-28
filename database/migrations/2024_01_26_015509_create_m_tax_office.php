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
        Schema::create('m_tax_office', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('税務署ID');
            $table->string('name', 255)->nullable()->comment('税務署名');
            $table->string('kana_name', 255)->nullable()->comment('税務署名(フリガナ)');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('coverage_area', 255)->nullable()->comment('管轄地域');
            $table->string('office_no', 10)->nullable()->comment('署番号');
            $table->string('url', 2083)->nullable()->comment('URL');
            $table->timestamps();
            $table->comment('税務署マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_tax_office');
    }
};
