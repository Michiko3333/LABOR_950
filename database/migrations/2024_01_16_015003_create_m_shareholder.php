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
        Schema::create('m_shareholder', function (Blueprint $table) {
            $table->id('shareholder_id')->autoIncrement()->comment('株主ID');
            $table->string('name', 255)->nullable()->comment('株主名称');
            $table->tinyInteger('shareholder_type')->nullable()->comment('株主区分');
            $table->string('share_numbers', 20)->nullable()->comment('保有株式数');
            $table->string('company_id', 20)->comment('会社ID');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('株主マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_shareholder');
    }
};
