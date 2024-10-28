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
        Schema::table('m_shift_calendar', function (Blueprint $table) {
            $table->integer('branch_id')->nullable()->comment('事業所ID')->after('company_id');
            $table->integer('is_default')->nullable()->default(0)->comment('デフォルトフラグ')->after('week');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_shift_calendar', function (Blueprint $table) {
            $table->dropColumn('branch_id');
            $table->dropColumn('is_default');
        });
    }
};
