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
        Schema::create('m_values_employee_over_retired_insurance_loss_reason', function (Blueprint $table) {
            $table->id()->comment('社員の喪失原因（70歳以上）設定値ID');
            $table->string('name', 255)->nullable()->comment('項目名');
            $table->comment('社員の喪失原因（70歳以上）設定値マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_values_employee_over_retired_insurance_loss_reason');
    }
};
