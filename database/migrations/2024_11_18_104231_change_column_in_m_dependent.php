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
        Schema::table('m_dependent', function (Blueprint $table) {
            $table->string('insurer_no',10)->nullable()->comment('被保険者番号（健保）')->after('contact');
            $table->string('remarks',255)->nullable()->comment('備考')->after('insurer_no');
            $table->dropColumn('other_1');
            $table->dropColumn('other_2');
            $table->string('insurance_office_no', 20)->nullable()->comment('被保険者番号（雇用）')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_dependent', function (Blueprint $table) {
            $table->dropColumn('insurer_no');
            $table->dropColumn('remarks');
            $table->string('other_1',255)->nullable()->comment('その他①');
            $table->string('other_2',255)->nullable()->comment('その他②');
            $table->string('insurance_office_no', 20)->nullable()->comment('被保険者番号')->change();
        });
    }
};
