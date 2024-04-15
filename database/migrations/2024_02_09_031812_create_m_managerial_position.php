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
        Schema::create('m_managerial_position', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('役職ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('name', 255)->comment('役職名');
            $table->string('name_kana', 255)->comment('役職名（カナ）');
            $table->integer('rank', 255)->default(0)->comment('ランク');
            $table->tinyInteger('representative_flg')->default(0)->comment('代表取締役フラグ');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('役職マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_managerial_position');
    }
};
