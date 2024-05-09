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
        Schema::create('m_application_form', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('申請書ID');
            $table->integer('ledger_id')->nullable()->comment('帳票ID');
            $table->bigInteger('style_id')->nullable()->comment('様式ID');
            $table->string('style_name', 255)->nullable()->comment('様式名称');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('申請書マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_application_form');
    }
};
