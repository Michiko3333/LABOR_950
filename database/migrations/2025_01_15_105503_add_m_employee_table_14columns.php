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
            $table->string('grade')->nullable()->comment('等級')->after('employee_status');
            $table->integer('work_category')->comment('勤務区分')->after('grade');
            $table->integer('enrollment_category')->comment('在籍区分')->after('work_category');
            $table->date('transfer_date')->nullable()->comment('転勤・出向　年月日')->after('enrollment_category');
            $table->string('private_introduction')->nullable()->comment('会社名（就職経路）')->after('transfer_date');
            $table->integer('recruitment_category')->comment('採用区分')->after('private_introduction');
            $table->integer('recruitment_category_detail')->comment('採用区分選択')->after('recruitment_category');
            $table->integer('pay_type')->comment('給与区分')->after('recruitment_category_detail');
            $table->string('bank_name')->nullable()->comment('銀行名称')->after('caregiver_leave_benefit_receive_bank_id');
            $table->string('bank_name_kana')->nullable()->comment('銀行名称（カナ）')->after('bank_name');
            $table->tinyInteger('head_office_or_branch_office')->nullable()->comment('本店・支店フラグ')->after('bank_name_kana');
            $table->string('financial_institution_code', 4)->nullable()->comment('金融機関コード')->after('head_office_or_branch_office');
            $table->string('store_code', 3)->nullable()->comment('店舗コード')->after('financial_institution_code');
            $table->tinyInteger('japan_bank_flg')->nullable()->comment('ゆうちょ銀行フラグ')->after('store_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->dropColumn('grade');
            $table->dropColumn('work_category');
            $table->dropColumn('enrollment_category');
            $table->dropColumn('transfer_date');
            $table->dropColumn('private_introduction');
            $table->dropColumn('recruitment_category');
            $table->dropColumn('recruitment_category_detail');
            $table->dropColumn('pay_type');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_name_kana');
            $table->dropColumn('head_office_or_branch_office');
            $table->dropColumn('financial_institution_code');
            $table->dropColumn('store_code');
            $table->dropColumn('japan_bank_flg');
        });
    }
};
