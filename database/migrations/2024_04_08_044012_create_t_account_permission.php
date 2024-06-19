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
        Schema::create('t_account_permission', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('個別権限ID');
            $table->integer('employee_id')->comment('社員ID');
            $table->integer('feature_id')->comment('機能ID');
            $table->tinyInteger('read')->nullable()->comment('参照フラグ');
            $table->tinyInteger('write')->nullable()->comment('編集フラグ');
            $table->timestamps();
            $table->comment('個別権限テーブル');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_account_permission');
    }
};
