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
            $table->bigInteger('authorized_shares')->nullable()->change()->comment('発行可能株式総数');
            $table->bigInteger('issued_shares')->nullable()->change()->comment('発行済株式総数');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_company', function (Blueprint $table) {
            $table->integer('authorized_shares')->nullable()->change()->comment('発行可能株式総数');
            $table->integer('issued_shares')->nullable()->change()->comment('発行済株式総数');
        });
    }
};
