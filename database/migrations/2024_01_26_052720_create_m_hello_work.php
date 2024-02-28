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
        Schema::create('m_hello_work', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable()->comment('所名');
            $table->string('office_no', 20)->nullable()->comment('安定所番号');
            $table->string('local_code', 20)->nullable()->comment('局所コード');
            $table->string('identifier_d', 255)->nullable()->comment('提出先識別子D');
            $table->string('submit_name_d', 255)->nullable()->comment('提出先名称D');
            $table->string('submit_union_name_d', 255)->nullable()->comment('提出先名称D（県名込み）');
            $table->string('identifier_h', 255)->nullable()->comment('提出先識別子H');
            $table->string('submit_name_h', 255)->nullable()->comment('提出先名称H');
            $table->string('submit_union_name_h', 255)->nullable()->comment('提出先名称H（県名込み）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('fax', 20)->nullable()->comment('FAX番号');
            $table->string('url', 2083)->nullable()->comment('URL');            
            $table->timestamps();
            $table->comment('公共職業安定所マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_hello_work');
    }
};
