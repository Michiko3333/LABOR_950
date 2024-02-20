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
        Schema::create('m_retirement_reason_employee_decision_reasons', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労働者判断_理由記入ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->string('reason', 255)->nullable()->comment('具体的理由');
            $table->tinyInteger('business_owner_select_flg')->nullable()->default(0)->comment('派遣拒否フラグ');
            $table->timestamps();
            $table->comment('離職理由_労働者判断_理由記入');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_retirement_reason_employee_decision_reasons');
    }
};
