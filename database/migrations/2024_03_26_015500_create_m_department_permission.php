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
        Schema::create('m_department_permission', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10)->nullable()->comment('権限名');
            $table->timestamps();
            $table->comment('部署権限マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_department_permission');
    }
};
