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
        Schema::create('t_labor_contract', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労働契約ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('branch_id')->nullable()->comment('支店ID');
            $table->date('contract_start_date')->nullable()->comment('契約開始年月日');
            $table->date('contract_end_date')->nullable()->comment('契約終了年月日');
            $table->integer('employment_status')->nullable()->comment('労働者種別（雇用形態）');
            $table->text('work_place')->nullable()->comment('勤務場所');
            $table->tinyInteger('trial_period_flg')->nullable()->comment('試用期間の有無');
            $table->time('trial_period_start_date')->nullable()->comment('試用期間開始年月日');
            $table->time('trial_period_end_date')->nullable()->comment('試用期間終了年月日');
            $table->text('job_description')->nullable()->comment('業務内容');
            $table->time('work_time_start')->nullable()->comment('就業時間(開始)');
            $table->time('work_time_end')->nullable()->comment('就業時間(終了)');
            $table->text('break_time')->nullable()->comment('休憩時間');
            $table->text('holiday_regulations')->nullable()->comment('休日規定');
            $table->tinyInteger('overtime_work_flg')->nullable()->comment('時間外労働フラグ');
            $table->tinyInteger('holiday_work_flg')->nullable()->comment('休日出勤フラグ');
            $table->text('matters_of_retirement')->nullable()->comment('退職に関する事項');
            $table->text('other_contract_matters')->nullable()->comment('その他の契約事項');
            $table->date('contract_date')->nullable()->comment('契約締結日');
            $table->timestamps();
            $table->comment('労働契約トランザクション');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_labor_contract');
    }
};
