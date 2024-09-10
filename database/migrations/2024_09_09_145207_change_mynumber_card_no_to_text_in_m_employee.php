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
            $table->text('mynumber_card_no')->nullable()->comment('マイナンバーカード番号')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->string('mynumber_card_no', 20)->nullable()->comment('マイナンバーカード番号')->change();
        });
    }
};
