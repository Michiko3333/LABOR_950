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
        Schema::create('m_closure_information', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('社員ID');
            $table->integer('closure_type')->nullable()->comment('休業種類');
            $table->date('start_date_of_closed')->nullable()->comment('休業開始日');
            $table->date('end_date_of_losed')->nullable()->comment('休業終了日');
            $table->date('date_of_return_to_work')->nullable()->comment('職場復帰日');
            $table->date('due_date')->nullable()->comment('出産予定日');
            $table->date('planned_end_date_of_closure')->nullable()->comment('休業終了予定日');
            $table->date('date_of_birth')->nullable()->comment('出産日');
            $table->date('date_of_start_of_foster_care')->nullable()->comment('養育開始日');
            $table->date('planned_end_date_of_child_support')->nullable()->comment('養育終了予定日');
            $table->date('end_date_of_foster_care')->nullable()->comment('養育終了日');
            $table->date('date_of_commencement_of_special_childcare_provision')->nullable()->comment('養育特例開始日');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('休業情報マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_closure_information');
    }
};
