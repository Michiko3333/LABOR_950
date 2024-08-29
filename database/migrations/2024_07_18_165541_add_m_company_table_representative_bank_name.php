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
        Schema::table('m_company', function (Blueprint $table) {
            $table->string('representative', 100)->nullable()->after('sales_company')->comment('代表者');
            $table->string('bank_name', 350)->nullable()->after('representative')->comment('銀行名');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_company', function (Blueprint $table) {
            $table->dropColumn('representative');
            $table->dropColumn('bank_name');
        });
    }
};
