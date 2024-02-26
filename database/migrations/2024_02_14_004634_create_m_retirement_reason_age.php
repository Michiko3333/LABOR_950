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
        Schema::create('m_retirement_reason_age', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('定年ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('retirement_age')->nullable()->comment('定年');
            $table->tinyInteger('reemployment_request_flg')->nullable()->comment('継続雇用希望フラグ');
            $table->string('retirement_reason_type', 4)->nullable()->comment('離職理由区分');
            $table->string('retirement_reason', 255)->nullable()->comment('離職理由記入欄');
            $table->timestamps();
            $table->comment('離職理由_定年');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_retirement_reason_age');
    }
};
