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
        Schema::table('m_allowance', function (Blueprint $table) {
            $table->date('applied_date')->nullable()->comment('適用日')->after('name');
            $table->date('end_date_of_application')->nullable()->comment('適用終了日')->after('applied_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_allowance', function (Blueprint $table) {
            $table->dropColumn('applied_date');
            $table->dropColumn('end_date_of_application');
        });
    }
};
