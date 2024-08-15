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
        Schema::table('m_branch', function (Blueprint $table) {
            $table->string('pension_office_reference_no_cities', 10)->nullable()->default(null)->comment('事業所整理記号（厚生年金）郡市区符号')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_branch', function (Blueprint $table) {
            $table->string('pension_office_reference_no_cities', 10)->nullable()->default(null)->comment('事業所整理記号（厚生年金）郡市区記号')->change();
        });
    }
};
