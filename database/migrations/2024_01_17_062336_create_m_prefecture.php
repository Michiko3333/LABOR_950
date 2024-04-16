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
        Schema::create('m_prefecture', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('都道府県ID');
            $table->string('prefecture_code', 2)->comment('都道府県コード');
            $table->string('name', 255)->nullable()->comment('都道府県名');
            $table->string('name_kana', 255)->nullable()->comment('都道府県名（カナ）');
            $table->timestamps();
            $table->comment('都道府県マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_prefecture');
    }
};
