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
        Schema::create('m_company_type', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('法人格ID');
            $table->string('company_type_name', 255)->nullable()->comment('法人形態名');
            $table->string('big_category', 255)->nullable()->comment('大分類');
            $table->string('medium_category', 255)->nullable()->comment('中分類');
            $table->string('small_category', 255)->nullable()->comment('小分類');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('法人格マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_company_type');
    }
};
