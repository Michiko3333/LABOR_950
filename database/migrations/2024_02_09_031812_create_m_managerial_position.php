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
        Schema::create('m_managerial_position', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('役職ID');
            $table->integer('company_id')->nullable()->comment('会社ID');
            $table->string('name', 255)->nullable()->comment('役職名');
            $table->string('name_kana', 255)->nullable()->comment('役職名（カナ）');
            $table->timestamps();
            $table->comment('役職マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_managerial_position');
    }
};
