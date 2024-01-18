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
        Schema::create('m_bank', function (Blueprint $table) {
            $table->id('bank_id')->autoIncrement()->comment('銀行ID');
            $table->string('bank_code', 4)->unique()->nullable()->comment('銀行コード');
            $table->string('name', 255)->comment('銀行名');
            $table->string('branch_code', 3)->nullable()->comment('支店コード');
            $table->string('branch_name', 255)->nullable()->comment('支店名');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('銀行マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bank');
    }
};
