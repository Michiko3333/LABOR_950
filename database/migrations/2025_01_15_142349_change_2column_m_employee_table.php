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
            $table->text('japan_post_bank_code_no')->nullable()->comment('ゆうちょ銀行記号番号')->change();
            $table->text('bank_account_no')->nullable()->comment('口座番号')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->string('japan_post_bank_code_no')->nullable()->comment('ゆうちょ銀行記号番号')->change();
            $table->string('bank_account_no')->nullable()->comment('口座番号')->change();
        });
    }
};
