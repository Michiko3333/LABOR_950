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
        Schema::create('m_branch_allowance', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->comment('支店ID');
            $table->integer('allowance')->nullable()->comment('手当名');
            $table->integer('amount')->nullable()->comment('金額');
            $table->integer('pay_month')->nullable()->comment('支払月');
            $table->string('target', 30)->nullable()->comment('対象者');
            $table->string('remarks', 30)->nullable()->comment('備考');
            $table->date('applied_date')->nullable()->comment('適用年月');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('支店手当マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_branch_allowance');
    }
};
