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
        Schema::create('m_pension_office', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('年金事務所ID');
            $table->string('name', 255)->nullable()->comment('年金事務所名');
            $table->string('name_kana', 255)->nullable()->comment('年金事務所名（カナ）');
            $table->string('identifier_e', 255)->nullable()->comment('提出先識別子E');
            $table->string('submit_name_e', 255)->nullable()->comment('提出先名称E');
            $table->string('submit_union_name_e', 255)->nullable()->comment('提出先名称E（県名込み）');
            $table->string('identifier_f', 255)->nullable()->comment('提出先識別子F');
            $table->string('submit_name_f', 255)->nullable()->comment('提出先名称F');
            $table->string('submit_union_name_f', 255)->nullable()->comment('提出先名称F（県名込み）');
            $table->string('identifier_g', 255)->nullable()->comment('提出先識別子G');
            $table->string('submit_name_g', 255)->nullable()->comment('提出先名称G');
            $table->string('submit_union_name_g', 255)->nullable()->comment('提出先名称G（県名込み）');
            $table->string('identifier_m', 255)->nullable()->comment('提出先識別子M');
            $table->string('submit_name_m', 255)->nullable()->comment('提出先名称M');
            $table->string('submit_union_name_m', 255)->nullable()->comment('提出先名称M（県名込み）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('section', 255)->nullable()->comment('所属課');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('url', 2083)->nullable()->comment('URL');
            $table->timestamps();
            $table->comment('年金事務所マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pension_office');
    }
};
