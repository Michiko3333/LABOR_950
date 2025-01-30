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
            $table->string('insurer_no', 10)->nullable()->comment('被保険者番号（健保）')->change();
            $table->string('employment_insured_no', 20)->nullable()->comment('被保険者番号（雇用）')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->string('insurer_no', 10)->nullable()->comment('被保険者番号')->change();
            $table->string('employment_insured_no', 20)->nullable()->comment('雇用保険番号')->change();
        });
    }
};
