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
        Schema::table('m_company_industry_type', function (Blueprint $table) {
            $table->integer('industry_type_id')->comment('業種ID')->after('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_company_industry_type', function (Blueprint $table) {
            $table->dropColumn('industry_type_id');
        });
    }
};
