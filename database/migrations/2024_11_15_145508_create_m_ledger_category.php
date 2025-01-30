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
        Schema::create('m_ledger_category', function (Blueprint $table) {
            $table->id();
            $table->integer('big_category_id')->comment('大項目ID');
            $table->integer('medium_category_id')->nullable()->comment('中項目ID');
            $table->integer('ledger_id')->comment('帳票ID');
            $table->timestamps();
            $table->comment('帳票カテゴリーマスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ledger_category');
    }
};
