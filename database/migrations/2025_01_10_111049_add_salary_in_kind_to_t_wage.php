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
        Schema::table('t_wage', function (Blueprint $table) {
            $table->integer('salary_in_kind')->nullable()->comment('現物給与')->after('wage_base_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_wage', function (Blueprint $table) {
            $table->dropColumn('salary_in_kind');
        });
    }
};
