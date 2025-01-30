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
        Schema::create('m_wage_columns', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50)->comment('カラム物理名');
            $table->string('name', 50)->comment('カラム論理名');
            $table->string('type', 10)->comment('項目入力形式');
            $table->integer('width')->nullable()->default(120)->comment('カラム幅');
            $table->tinyInteger('fixed')->nullable()->default(0)->comment('固定フラグ');
            $table->tinyInteger('calc')->nullable()->default(0)->comment('計算タイプ');
            $table->tinyInteger('show')->nullable()->default(0)->comment('常時表示フラグ');
            $table->tinyInteger('is_ledger')->nullable()->default(0)->comment('台帳画面で表示するか');
            $table->integer('order')->comment('整列順');
            $table->integer('ledger_order')->comment('台帳整列順');
            $table->tinyInteger('hide_bonus')->nullable()->default(0)->comment('賞与で表示しない');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_wage_columns');
    }
};
