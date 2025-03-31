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
            $table->string('indication_of_labor',20)->nullable()->comment('社会保険労務士欄の表示')->after('labor_and_social_security_attorney_registration_no');
            $table->string('indication_of_agent',20)->nullable()->comment('提出代行者欄の表示')->after('indication_of_labor');
            $table->string('labor_and_social_security_association',20)->nullable()->comment('社会保険労務士会')->after('indication_of_agent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->dropColumn('indication_of_labor');
            $table->dropColumn('indication_of_agent');
            $table->dropColumn('labor_and_social_security_association');
        });
    }
};
