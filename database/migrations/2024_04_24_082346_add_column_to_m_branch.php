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
            $table->string('fax', 20)->nullable()->comment('FAX番号')->after('tel_overseas');
            $table->string('mail_address', 255)->nullable()->comment('電子メールアドレス')->after('fax');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_branch', function (Blueprint $table) {
            $table->dropColumn('mail_address');
            $table->dropColumn('fax');
        });
    }
};
