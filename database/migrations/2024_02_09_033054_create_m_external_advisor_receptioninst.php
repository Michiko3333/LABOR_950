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
        Schema::create('m_external_advisor_receptionist', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('外部顧問担当ID');
            $table->integer('external_advisor_id')->nullable()->comment('外部顧問ID');
            $table->integer('company_id')->nullable()->comment('会社ID');
            $table->timestamps();
            $table->comment('外部顧問担当マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_external_advisor_receptionist');
    }
};
