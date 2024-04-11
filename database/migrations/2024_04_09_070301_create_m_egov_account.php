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
        Schema::create('m_egov_account', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('egovアカウントID');
            $table->integer('company_id')->comment('会社ID');
            $table->text('access_token')->nullable()->comment('アクセストークン');
            $table->text('refresh_token')->nullable()->comment('リフレッシュトークン');
            $table->string('code')->nullable()->comment('コード');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('egovアカウントマスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_egov_account');
    }
};
