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
        Schema::create('m_client', function (Blueprint $table) {
            $table->id('client_id')->autoIncrement()->comment('顧客ID');
            $table->integer('branch_id')->comment('支店ID');
            $table->integer('client_company_id')->comment('顧客会社ID');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('顧客マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_client');
    }
};
