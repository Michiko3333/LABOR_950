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
        Schema::create('m_residential_status', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('在留資格ID');
            $table->string('setting_value', 10)->nullable()->comment('設定値');
            $table->string('content', 255)->nullable()->comment('内容');
            $table->tinyInteger('disuse_flg')->default(0)->comment('廃止フラグ');
            $table->timestamps();
            $table->comment('在留資格マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_residential_status');
    }
};
