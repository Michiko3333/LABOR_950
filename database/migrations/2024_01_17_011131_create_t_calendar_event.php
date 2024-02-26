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
        Schema::create('t_calendar_event', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('カレンダーイベントID');
            $table->integer('employee_id')->nullable()->comment('社員ID（システム）');
            $table->integer('category_type')->nullable()->comment('カテゴリ区分');
            $table->string('name', 255)->nullable()->comment('タイトル');
            $table->datetime('from')->nullable()->comment('日付from');
            $table->datetime('to')->nullable()->comment('日付to');
            $table->text('contents')->nullable()->comment('内容');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('カレンダーイベントトランザクション');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_calendar_event');
    }
};
