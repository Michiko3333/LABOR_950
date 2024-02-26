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
        Schema::create('m_retirement_reason_contract_period_reached_limit', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('雇用期間到来ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('contract_period_once')->nullable()->comment('1回の契約期間');
            $table->integer('contract_period_total')->nullable()->comment('通算契約期間');
            $table->integer('contract_renewal_count')->nullable()->comment('契約更新回数');
            $table->tinyInteger('shortened_contract_renewal_reached_limit_flg')->nullable()->comment('短縮された契約期間・更新回数上限到来フラグ');
            $table->tinyInteger('contract_renewal_reached_limit_flg')->nullable()->comment('契約期間・更新回数上限到来フラグ');
            $table->tinyInteger('rehire_contract_renewal_reached_limit_flg')->nullable()->comment('再雇用時に定めた契約期間・更新回数上限到来フラグ');
            $table->tinyInteger('contract_period_total_reached_limit_flg')->nullable()->comment('通算契約期間上限到来フラグ');
            $table->tinyInteger('contract_period_total_established_before_law_amendment_flg')->nullable()->comment('通算契約期間上限が労働契約法施行以前に定められていたフラグ');
            $table->timestamps();
            $table->comment('離職理由_雇用期間到来');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_retirement_reason_contract_period_reached_limit');
    }
};
