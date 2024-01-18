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
        Schema::create('m_department', function (Blueprint $table) {
            $table->id('department_id')->autoIncrement()->comment('組織ID');
            $table->integer('branch_id')->comment('支店ID');
            $table->string('name', 255)->nullable()->comment('組織名');
            $table->integer('upper_department_id')->nullable()->comment('上位組織名ID');
            $table->integer('layer')->nullable()->comment('階層');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('組織図マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_department');
    }
};
