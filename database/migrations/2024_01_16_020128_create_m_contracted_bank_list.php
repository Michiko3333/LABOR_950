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
        // 関係値のファイルまた別で切ろう
        Schema::create('m_contracted_bank_list', function (Blueprint $table) {
            $table->id('contracted_bank_list_id')->autoIncrement()->comment('契約銀行ID');
            $table->integer('company_id')->comment('会社ID');
            $table->integer('bank_id')->comment('銀行ID');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('契約銀行マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_contracted_bank_list');
    }
};
