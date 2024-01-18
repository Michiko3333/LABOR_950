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
        Schema::create('m_currency', function (Blueprint $table) {
            $table->id('currency_id')->autoIncrement()->comment('通貨ID');
            $table->string('currency_no', 3)->nullable()->default(0)->comment('通貨番号');
            $table->string('currency_code', 3)->nullable()->default(0)->comment('通貨コード');
            $table->string('country', 255)->nullable()->comment('国名');
            $table->string('currency', 255)->nullable()->comment('通貨');
            $table->timestamps();
            $table->comment('通貨マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_currency');
    }
};
