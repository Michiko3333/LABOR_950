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
        Schema::create('m_country', function (Blueprint $table) {
            $table->id('country_id')->autoIncrement()->comment('国名ID');
            $table->string('country_code', 2)->unique()->nullable()->default(0)->comment('国名コード');
            $table->string('country_name', 255)->nullable()->comment('国又は地域名(日本語表記)');
            $table->string('country_name_en', 255)->nullable()->comment('国又は地域名(英語表記)');
            $table->timestamps();
            $table->comment('国マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_country');
    }
};
