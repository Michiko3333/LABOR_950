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
            $table->string('blood_type',2)->nullable()->comment('血液型')->after('country_id');
            $table->string('qualifications',255)->nullable()->comment('資格情報')->after('blood_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->dropColumn('blood_type');
            $table->dropColumn('qualifications');
        });
    }
};
