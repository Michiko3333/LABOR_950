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
        Schema::create('t_company_files', function (Blueprint $table) {
            $table->id()->comment('会社書類ID');
            $table->integer('company_id')->nullable()->comment('会社ID');
            $table->integer('document_type')->comment('書類種類');
            $table->string('file_name')->nullable()->comment('書類名');
            $table->binary('data')->comment('書類データ');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('会社書類テーブル');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_company_files');
    }
};
