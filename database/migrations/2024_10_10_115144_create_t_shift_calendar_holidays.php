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
        Schema::create('t_shift_calendar_holidays', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->integer('shift_calendar_id')->comment('勤務予定カレンダーID');
            $table->string('year', 100)->comment('年');
            $table->string('month', 100)->comment('月');
            $table->string('day', 100)->comment('日');
            $table->date('full_date')->nullable()->comment('日時');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('勤務予定カレンダー休日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_shift_calendar_holidays');
    }
};
