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
        Schema::create('t_filter_employee_columns', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('従業員ID');
            $table->integer('company_id')->comment('会社ID');
            $table->integer('pattern_id')->comment('パターンID');
            $table->string('value', 100)->comment('カラム識別子');
            $table->tinyInteger('order')->default(1)->comment('並び順');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_filter_employee_columns');
    }
};
