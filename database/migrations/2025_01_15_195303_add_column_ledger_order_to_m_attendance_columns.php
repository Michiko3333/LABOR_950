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
        Schema::table('m_attendance_columns', function (Blueprint $table) {
            $table->integer('ledger_order')->nullable()->default(0)->comment('台帳整列順');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_attendance_columns', function (Blueprint $table) {
            //
        });
    }
};
