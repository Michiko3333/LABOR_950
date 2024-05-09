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
        Schema::create('m_ledger', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('帳票ID');
            $table->bigInteger('procedure_id')->unique()->nullable()->comment('手続ID');
            $table->string('procedure_name', 255)->nullable()->comment('手続名称');
            $table->integer('procedure_type')->nullable()->comment('手続分類');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('帳票マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ledger');
    }
};
