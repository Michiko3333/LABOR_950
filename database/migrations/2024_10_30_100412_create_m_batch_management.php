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
        Schema::create('m_batch_management', function (Blueprint $table) {
            $table->id()->comment('バッチ管理ID');
            $table->string('class')->comment('クラス');
            $table->string('command')->comment('コマンド');
            $table->string('time_specification')->comment('指定時間');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_batch_management');
    }
};
