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
            $table->string('repetition_type', 2)->nullable()->comment('繰り返し番号')->after('contents');
            $table->string('identifier')->nullable()->comment('繰り返し予定識別子')->after('repetition_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_calendar_event', function (Blueprint $table) {
            $table->dropColumn('repetition_type');
            $table->dropColumn('identifier');
        });
    }
};
