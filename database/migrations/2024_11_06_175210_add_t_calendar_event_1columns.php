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
        Schema::table('t_calendar_event', function (Blueprint $table) {
            $table->string('subsidies_name')->nullable()->comment('助成金・補助金名')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_calendar_event', function (Blueprint $table) {
            $table->dropColumn('subsidies_name');
        });
    }
};
