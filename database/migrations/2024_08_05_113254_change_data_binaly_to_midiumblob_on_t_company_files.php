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
        Schema::table('t_company_files', function (Blueprint $table) {
            $table->mediumText('data')->charset('binary')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_company_files', function (Blueprint $table) {
            $table->binary('data')->change();
        });
    }
};
