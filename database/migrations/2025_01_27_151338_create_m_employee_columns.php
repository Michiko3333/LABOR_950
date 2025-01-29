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
        Schema::create('m_employee_columns', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50)->comment('カラム物理名');
            $table->string('name', 50)->comment('カラム論理名');
            $table->string('type', 10)->comment('項目入力形式');
            $table->integer('width')->nullable()->default(120)->comment('カラム幅');
            $table->integer('order')->nullable()->default(0)->comment('整列順');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_employee_columns');
    }
};
