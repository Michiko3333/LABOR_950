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
        Schema::table('m_branch_allowance', function (Blueprint $table) {
            $table->string('allowance',255)->nullable()->comment('手当名')->change();
            $table->dropColumn('remarks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_branch_allowance', function (Blueprint $table) {
            $table->integer('allowance')->nullable()->comment('手当名')->change();
            $table->string('remarks', 30)->nullable()->comment('備考');
        });
    }
};
