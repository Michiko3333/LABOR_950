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
        Schema::create('m_work_time_standards', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労働基準マスタID');
            $table->integer('branch_id')->nullable()->comment('支店ID');
            $table->time('break_time_start')->nullable()->comment('休み時間開始');
            $table->time('break_time_end')->nullable()->comment('休み時間終了');
            $table->timestamps();
            $table->comment('労働時間基準マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_work_time_standards');
    }
};
