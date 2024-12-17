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
        Schema::table('m_ledger', function (Blueprint $table) {
            $table->string('formal_procedure_name')->nullable()->comment('手続名称（正式名称）')->after('procedure_name');
            $table->string('abbreviation')->nullable()->comment('手続名称（略称）')->after('formal_procedure_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_ledger', function (Blueprint $table) {
            $table->dropColumn('formal_procedure_name');
            $table->dropColumn('abbreviation');
        });
    }
};
