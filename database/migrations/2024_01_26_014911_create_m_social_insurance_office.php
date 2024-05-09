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
        Schema::create('m_social_insurance_office', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('社会保険事務所ID');
            $table->string('name', 255)->nullable()->comment('社会保険事務所名');
            $table->string('name_kana', 255)->nullable()->comment('社会保険事務所名（カナ）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('section', 255)->nullable()->comment('所属課');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('fax', 20)->nullable()->comment('FAX番号');
            $table->string('url', 2083)->nullable()->comment('URL');
            $table->timestamps();
            $table->comment('社会保険事務所マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_social_insurance_office');
    }
};
