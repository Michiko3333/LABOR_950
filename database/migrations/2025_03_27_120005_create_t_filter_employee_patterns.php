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
        Schema::create('t_filter_employee_patterns', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('従業員ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('name', 50)->comment('名称');
            $table->tinyInteger('default_flg')->nullable()->default(0)->comment('常時設定フラグ');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_filter_employee_patterns');
    }
};
