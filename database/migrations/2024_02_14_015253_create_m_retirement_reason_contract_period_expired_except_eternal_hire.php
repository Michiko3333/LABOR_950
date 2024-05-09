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
        Schema::create('m_retirement_reason_contract_period_expired_except_eternal_hire', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('契約期間満了_常時雇用以外ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('contract_period_once')->nullable()->comment('1回の契約期間');
            $table->integer('contract_period_total')->nullable()->comment('通算契約期間');
            $table->integer('contract_renewal_count')->nullable()->comment('契約更新回数');
            $table->tinyInteger('contract_renewal_guarantee_agreement_flg')->nullable()->comment('契約更新確約合意フラグ');
            $table->tinyInteger('contract_non_renewal_flg')->nullable()->comment('契約更新しないフラグ');
            $table->integer('contract_renewal_request_type')->nullable()->comment('契約更新希望申出区分');
            $table->tinyInteger('employment_instructions_type')->nullable()->comment('派遣就業指示区分');
            $table->integer('business_owner_select_no')->nullable()->comment('事業主記入欄番号');
            $table->timestamps();
            $table->comment('離職理由_契約期間満了_常時雇用以外');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_retirement_reason_contract_period_expired_except_eternal_hire');
    }
};
