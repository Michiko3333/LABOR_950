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
        Schema::create('m_ledger_category_medium', function (Blueprint $table) {
            $table->id();
            $table->string('medium_category_name', 255)->comment('中項目名');
            $table->integer('big_category_id')->comment('大項目ID');
            $table->timestamps();
            $table->comment('帳票業務詳細カテゴリー（中項目）マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ledger_category_medium');
    }
};
