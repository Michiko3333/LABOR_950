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
        Schema::create('m_ledger_category_big', function (Blueprint $table) {
            $table->id();
            $table->string('big_category_name', 255)->comment('大項目名');
            $table->timestamps();
            $table->comment('帳票業務別カテゴリー（大項目）マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ledger_category_big');
    }
};
