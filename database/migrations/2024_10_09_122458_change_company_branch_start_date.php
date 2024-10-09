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
            $table->integer('start_month_of_year')->default(1)->comment('起算日(月の始まり)')->after('company_division');
            $table->integer('start_day_of_month')->default(1)->comment('起算日(日の始まり)')->after('start_month_of_year');
            $table->integer('start_day_of_week')->default(7)->comment('起算日(曜日の始まり)')->after('start_day_of_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_company', function (Blueprint $table) {
            $table->dropColumn('start_month_of_year');
            $table->dropColumn('start_day_of_month');
            $table->dropColumn('start_day_of_week');
        });
    }
};
