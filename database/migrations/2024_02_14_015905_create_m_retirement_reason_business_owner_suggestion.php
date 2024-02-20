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
        Schema::create('m_retirement_reason_business_owner_suggestion', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('事業主の提案ID');
            $table->integer('employee_id')->nullable()->comment('社員ID');
            $table->string('retirement_recommendation_reason', 255)->nullable()->comment('退職勧奨の理由記入欄');
            $table->timestamps();
            $table->comment('離職理由_事業主の提案');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_retirement_reason_business_owner_suggestion');
    }
};
