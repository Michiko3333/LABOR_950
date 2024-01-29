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
        Schema::create('m_receptionist', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('担当ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->integer('client_company_id')->nullable()->comment('顧客会社ID');
            $table->date('contract_start_date')->nullable()->comment('契約開始年月日');
            $table->date('contract_end_date')->nullable()->comment('契約終了年月日');
            $table->timestamps();
            $table->comment('担当マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_receptionist');
    }
};
