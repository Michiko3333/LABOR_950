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
        Schema::create('m_shift_calendar', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->string('title', 100)->comment('カレンダー名');
            $table->string('year', 100)->comment('起算日（年）');
            $table->string('month', 100)->comment('起算日（月）');
            $table->string('day', 100)->comment('起算日（日）');
            $table->string('week', 100)->comment('曜日の始まり');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('勤務予定カレンダー');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_shift_calendar');
    }
};
