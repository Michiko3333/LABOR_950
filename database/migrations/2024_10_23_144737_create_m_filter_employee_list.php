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
        Schema::create('m_filter_employee_list', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('カラム名');
            $table->string('value', 100)->comment('カラム識別子');
            $table->integer('order')->default(1)->comment('並び順');
            $table->tinyInteger('hidden_default')->default(0)->comment('デフォルト非表示フラグ');
            $table->tinyInteger('hidden_basic_department')->default(0)->comment('人事経理非表示フラグ');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->unique(['value']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_filter_employee_list');
    }
};
