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
        Schema::create('m_csv_count', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->nullable()->comment('支店ID');
            $table->integer('employee_id')->nullable()->comment('社会保険労務士ID');
            $table->integer('count')->comment('媒体通番カウント');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_csv_count');
    }
};
