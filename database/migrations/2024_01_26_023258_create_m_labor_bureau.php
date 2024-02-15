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
        Schema::create('m_labor_bureau', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('都道府県労働局ID');
            $table->string('name', 255)->nullable()->comment('庁舎名');
            $table->string('department', 255)->nullable()->comment('部署');
            $table->string('section', 255)->nullable()->comment('所属課');
            $table->string('identifier_jk', 255)->nullable()->comment('提出先識別子JK');
            $table->string('system_name_jk', 255)->nullable()->comment('提出先名称JK');
            $table->string('system_union_name_jk', 255)->nullable()->comment('提出先名称JK（県名込み）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('url', 2083)->nullable()->comment('URL');
            $table->timestamps();
            $table->comment('都道府県労働局マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_labor_bureau');
    }
};
