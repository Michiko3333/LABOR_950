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
        Schema::table('m_employee', function (Blueprint $table) {
            $table->string('insurer_reference_no', 10)->nullable()->comment('保険者整理番号')->after('insurer_no');
            $table->integer('currency_id')->nullable()->comment('給与支払通貨')->default(66)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->dropColumn('insurer_reference_no');
            $table->integer('currency_id')->nullable()->comment('給与支払通貨')->change();
        });
    }
};
