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
        Schema::table('t_attendance', function (Blueprint $table) {
            $table->string('departments')->nullable()->comment('部署')->change();
            $table->float('working_off_days')->nullable()->comment('休出日数')->change();
            $table->float('working_legal_days')->nullable()->comment('法出日数')->change();
            $table->float('working_time')->nullable()->comment('勤務時間')->change();
            $table->float('holidays_special')->nullable()->comment('特休日数')->change();
            $table->float('holidays_comp')->nullable()->comment('代休日数')->change();
            $table->float('holidays_legal')->nullable()->comment('公休日数')->change();
            $table->float('holidays_public')->nullable()->comment('振休日数')->change();
            $table->float('holidays_transfered')->nullable()->comment('代替休日数')->change();
            $table->float('paid_leave')->nullable()->comment('有給取得日数')->change();
            $table->float('remaining_paid_leave')->nullable()->comment('有給残日数')->change();
            $table->float('late_time')->nullable()->comment('遅刻時間')->after('early_days');
            $table->float('early_time')->nullable()->comment('早退時間')->after('late_time');
            $table->float('working_normal_days')->nullable()->comment('通常出勤')->after('working_days');
            $table->float('working_off_time')->nullable()->comment('休日労働時間数')->after('overtime_off');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_attendance', function (Blueprint $table) {
            $table->string('departments')->comment('部署')->change();
            $table->float('working_off_days')->comment('休出日数')->change();
            $table->float('working_legal_days')->comment('法出日数')->change();
            $table->float('working_time')->comment('勤務時間')->change();
            $table->float('holidays_special')->comment('特休日数')->change();
            $table->float('holidays_comp')->comment('代休日数')->change();
            $table->float('holidays_legal')->comment('公休日数')->change();
            $table->float('holidays_public')->comment('振休日数')->change();
            $table->float('holidays_transfered')->comment('代替休日数')->change();
            $table->float('paid_leave')->comment('有給取得日数')->change();
            $table->float('remaining_paid_leave')->comment('有給残日数')->change();
            $table->dropColumn('late_time');
            $table->dropColumn('early_time');
            $table->dropColumn('working_normal_days');
            $table->dropColumn('working_off_time');
        });
    }
};
