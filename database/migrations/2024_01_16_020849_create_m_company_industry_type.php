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
        Schema::create('m_company_industry_type', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('会社業種ID');
            $table->integer('company_id')->comment('会社ID');
            // 業種IDとのリレーションが必要だが労務の業種か、厚生労働省の業種かどちらと連携するか定まっていないのでいったん外す
            // $table->integer('industry_type_id')->nullable()->comment('業種ID');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('会社業種マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_company_industry_type');
    }
};
