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
        Schema::table('m_qualifications', function (Blueprint $table) {
            $table->string('managerial_position_ids')->nullable()->comment('該当役職')->after('applicable_grade');
            $table->string('other')->nullable()->comment('備考')->after('managerial_position_ids');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_qualifications', function (Blueprint $table) {
            $table->dropColumn('managerial_position_ids');
            $table->dropColumn('other');
        });
    }
};
