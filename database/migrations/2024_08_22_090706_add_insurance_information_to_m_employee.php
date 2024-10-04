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
            $table->string('insured_status',21)->nullable()->comment('被保険者状況')->after('employment_end_date');
            $table->string('health_insurance_association_number',8)->nullable()->comment('健保組合番号')->after('insured_status');
            $table->string('acquisition_of_distinction',5)->nullable()->comment('取得区分')->after('health_insurance_association_number');
            $table->date('health_insurance_acquisition_date')->nullable()->comment('健康保険取得日')->after('acquisition_of_distinction');
            $table->date('health_insurance_loss_date')->nullable()->comment('健康保険喪失日')->after('health_insurance_acquisition_date');
            $table->tinyInteger('welfare_pension')->nullable()->comment('厚生年金基金')->after('health_insurance_loss_date');
            $table->tinyInteger('overseas_special_exception')->nullable()->comment('海外特例')->after('welfare_pension');
            $table->date('overseas_special_exception_date')->nullable()->comment('海外特例該当日')->after('overseas_special_exception');
            $table->date('overseas_special_not_exception_date')->nullable()->comment('海外特例非該当日')->after('overseas_special_exception_date');
            $table->tinyInteger('dispatch_contract_completion')->nullable()->comment('派遣請負就労区分')->after('overseas_special_not_exception_date');
            $table->date('employment_not_insured_date')->nullable()->comment('雇用保険喪失日')->after('dispatch_contract_completion');
            $table->string('insurer_no', 10)->nullable()->comment('被保険者番号')->change();
            $table->string('insurer_reference_no', 10)->nullable()->comment('被保険者整理番号')->change();
            $table->date('employment_insured_date')->nullable()->comment('雇用保険取得日')->change();
            $table->string('employment_insured_no', 20)->nullable()->comment('雇用保険番号')->change();
            $table->tinyInteger('unauthorized_activities_permission_flg')->nullable()->comment('資格外許可の有無')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->dropColumn('insured_status');
            $table->dropColumn('health_insurance_association_number');
            $table->dropColumn('acquisition_of_distinction');
            $table->dropColumn('health_insurance_acquisition_date');
            $table->dropColumn('health_insurance_loss_date');
            $table->dropColumn('welfare_pension');
            $table->dropColumn('overseas_special_exception');
            $table->dropColumn('overseas_special_exception_date');
            $table->dropColumn('overseas_special_not_exception_date');
            $table->dropColumn('dispatch_contract_completion');
            $table->dropColumn('employment_not_insured_date');
            $table->string('insurer_no', 10)->nullable()->comment('保険者番号')->change();
            $table->string('insurer_reference_no', 10)->nullable()->comment('保険者整理番号')->change();
            $table->date('employment_insured_date')->nullable()->comment('雇用保険資格取得日')->change();
            $table->string('employment_insured_no', 20)->nullable()->comment('雇用保険被保険者番号')->change();
            $table->tinyInteger('unauthorized_activities_permission_flg')->nullable()->comment('資格外活動許可フラグ')->change();
        });
    }
};
