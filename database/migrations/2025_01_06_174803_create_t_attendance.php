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
        Schema::create('t_attendance', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->integer('branch_id')->nullable()->comment('事業所ID');
            $table->integer('employee_id')->nullable()->comment('従業員ID');
            $table->string('employee_no')->comment('社員番号');
            $table->string('employee_name')->comment('所属部署');
            $table->string('branch_name')->comment('部署');
            $table->string('departments')->comment('部署');
            $table->string('employment_type')->comment('雇用区分');
            $table->string('work_type')->nullable()->comment('勤務区分');
            $table->date('month')->comment('年月');
            $table->float('actual_working_days')->comment('実働日数');
            $table->float('working_days')->nullable()->comment('出勤日数');
            $table->float('working_off_days')->comment('休出日数');
            $table->float('working_legal_days')->comment('法出日数');
            $table->float('working_time')->comment('勤務時間');
            $table->float('overtime')->nullable()->comment('残業時間');
            $table->float('overtime_low')->nullable()->comment('所定残業時間');
            $table->float('overtime_normal')->nullable()->comment('普通残業時間');
            $table->float('overtime_early')->nullable()->comment('早出残業時間');
            $table->float('overtime_late')->nullable()->comment('深夜残業時間');
            $table->float('overtime_off')->nullable()->comment('休出残業時間');
            $table->float('holidays')->nullable()->comment('休日日数');
            $table->float('holidays_special')->comment('特休日数');
            $table->float('holidays_comp')->comment('代休日数');
            $table->float('holidays_legal')->comment('公休日数');
            $table->float('holidays_public')->comment('振休日数');
            $table->float('holidays_transfered')->comment('代替休日数');
            $table->float('absent_days')->nullable()->comment('欠勤日数');
            $table->float('paid_leave')->comment('有給取得日数');
            $table->float('remaining_paid_leave')->comment('有給残日数');
            $table->float('late_days')->nullable()->comment('遅刻日数');
            $table->float('early_days')->nullable()->comment('早退日数');
            $table->float('maternity_leave')->nullable()->comment('産前産後休日日数');
            $table->float('childcare_leave')->nullable()->comment('育児休業日数');
            $table->float('nursing_leave')->nullable()->comment('介護休業日数');
            $table->float('other1')->nullable()->comment('その他１（企業特有）');
            $table->float('other2')->nullable()->comment('その他２（企業特有）');
            $table->float('other3')->nullable()->comment('その他３（企業特有）');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_attendance');
    }
};
