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
        Schema::table('t_attendance', function (Blueprint $table) {
            $table->index('branch_name');
            $table->index('departments');
            $table->index('employment_type');
            $table->index('work_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_attendance', function (Blueprint $table) {
            $table->dropIndex('branch_name');
            $table->dropIndex('departments');
            $table->dropIndex('employment_type');
            $table->dropIndex('work_type');
        });
    }
};
