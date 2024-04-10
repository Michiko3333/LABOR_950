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
        Schema::create('m_feature', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('機能ID');
            $table->string('name', 20)->comment('機能名');
            $table->timestamps();
            $table->comment('機能マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_feature');
    }
};
