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
        Schema::create('m_certificate', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->binary('file');
            $table->string('password', 255)->nullable()->comment('パスワード');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('電子証明書マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_certificate');
    }
};
