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
        Schema::create('m_work_contract', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('employee_id')->comment('社員ID');
            $table->integer('branch_id')->comment('支店ID');
            $table->string('title')->nullable()->comment('タイトル');
            $table->string('employment_period')->nullable()->comment('雇用期間');
            $table->string('work_place')->nullable()->comment('勤務場所');
            $table->string('employer_type')->nullable()->comment('労働者種別');
            $table->text('probation_period')->nullable()->comment('試用期間');
            $table->text('probation_period_detail')->nullable()->comment('試用期間詳細');
            $table->text('duties')->nullable()->comment('業務内容');
            $table->text('duties_detail')->nullable()->comment('業務内容詳細');
            $table->text('start_end_and_break_time_of_work')->nullable()->comment('始業・終業・休憩の時間');
            $table->text('holiday')->nullable()->comment('休日');
            $table->text('overtime_work')->nullable()->comment('時間外勤務の有無');
            $table->text('vacation')->nullable()->comment('休暇');
            $table->text('wages')->nullable()->comment('賃金');
            $table->text('renewal')->nullable()->comment('更新の有無');
            $table->text('matters_of_retirement')->nullable()->comment('退職に関する事項');
            $table->text('other_contract_matters')->nullable()->comment('その他の契約事項');
            $table->text('matters_of_retirement_and_premature_termination')->nullable()->comment('退職および契約の中途解消に関する事項');
            $table->text('other_contract_matters_and_covenant')->nullable()->comment('その他の契約事項および誓約事項');
            $table->datetime('date')->nullable()->comment('日付');
            $table->tinyInteger('format_flg')->comment('フォーマットフラグ');
            $table->timestamps();
            $table->comment('労働条件通知＆契約書');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_work_contract');
    }
};
