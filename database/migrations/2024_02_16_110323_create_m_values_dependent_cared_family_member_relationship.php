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
        Schema::create('m_values_dependent_cared_family_member_relationship', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('被扶養者の介護対象家族の続柄設定値ID');
            $table->string('name', 255)->nullable()->comment('項目名');
            $table->timestamps();
            $table->comment('被扶養者の介護対象家族の続柄設定値マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_values_dependent_cared_family_member_relationship');
    }
};
