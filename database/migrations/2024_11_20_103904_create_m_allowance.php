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
        Schema::create('m_allowance', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->comment('支店ID');
            $table->string('name',255)->nullable()->comment('名称');
            $table->tinyInteger('history_flg')->nullable()->default(0)->comment('履歴フラグ');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('手当マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_allowance');
    }
};
