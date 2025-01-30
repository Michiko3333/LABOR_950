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
        Schema::create('m_pickup', function (Blueprint $table) {
            $table->id()->comment('Pick upID');
            $table->integer('company_id')->comment('会社ID');
            $table->integer('pickup_type_id')->comment('pickup種類ID');
            $table->integer('employee_id')->nullable()->comment('対象者（社員ID）');
            $table->integer('dependent_id')->nullable()->comment('扶養者ID');
            $table->integer('closure_information_id')->nullable()->comment('休業情報ID');
            $table->integer('year')->nullable()->comment('年');
            $table->integer('month')->nullable()->comment('月');
            $table->date('starting_date')->nullable()->comment('起点日');
            $table->date('due_date')->nullable()->comment('期日');
            $table->integer('calendar_event_id')->nullable()->comment('カレンダーイベントID');
            $table->string('business_name')->comment('業務名');
            $table->string('content')->nullable()->comment('内容');
            $table->integer('responder_id')->nullable()->comment('対応者（社員ID）');
            $table->integer('pickup_situation_id')->default(1)->comment('pickup状態ID');
            $table->tinyInteger('anonymous_flg')->default(0)->comment('非通知フラグ');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pickup');
    }
};
