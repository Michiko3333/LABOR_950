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
        Schema::table('m_csv_count', function (Blueprint $table) {
            $table->string('branch_id', 10)->nullable()->default(null)->comment('事業所番号（厚生年金）')->change();
            $table->renameColumn('branch_id', 'pension_office_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_csv_count', function (Blueprint $table) {
            $table->renameColumn('pension_office_no', 'branch_id');
            $table->integer('branch_id')->nullable()->comment(null)->change();
        });
    }
};
