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
        Schema::table('m_company', function (Blueprint $table) {
            $table->bigInteger('annual_sales')->nullable()->change()->comment('年間売上高（連結）');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_company', function (Blueprint $table) {
            $table->integer('annual_sales')->nullable()->change()->comment('年間売上高（連結）');
        });
    }
};
