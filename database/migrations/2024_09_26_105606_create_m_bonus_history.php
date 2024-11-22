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
        Schema::create('m_bonus_history', function (Blueprint $table) {
            $table->id();
            $table->integer('bonus_id')->comment('賞与ID');
            $table->integer('branch_id')->comment('支店ID');
            $table->string('department_id',20)->comment('部署ID');
            $table->string('bonus_payment_month',30)->nullable()->comment('支払月');
            $table->date('applied_date')->nullable()->comment('適用年月');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('賞与マスタ（履歴）');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bonus_history');
    }
};
