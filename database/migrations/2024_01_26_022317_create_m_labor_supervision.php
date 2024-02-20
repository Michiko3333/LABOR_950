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
        Schema::create('m_labor_supervision', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('労働基準監督署ID');
            $table->string('name', 255)->nullable()->comment('労働基準監督署名');
            $table->string('name_kana', 255)->nullable()->comment('労働基準監督署名（カナ）');
            $table->string('identifier_hij', 255)->nullable()->comment('提出先識別子HIJ');
            $table->string('system_name_hij', 255)->nullable()->comment('提出先名称HIJ');
            $table->string('system_union_name_hij', 255)->nullable()->comment('提出先名称HIJ（県名込み）');
            $table->string('identifier_l', 255)->nullable()->comment('提出先識別子L');
            $table->string('system_name_l', 255)->nullable()->comment('提出先名称L');
            $table->string('system_union_name_l', 255)->nullable()->comment('提出先名称L（県名込み）');
            $table->string('identifier_n', 255)->nullable()->comment('提出先識別子N');
            $table->string('system_name_n', 255)->nullable()->comment('提出先名称N');
            $table->string('system_union_name_n', 255)->nullable()->comment('提出先名称N（県名込み）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_more_details', 255)->nullable()->comment('住所（他）');
            $table->string('section', 255)->nullable()->comment('所属課');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->string('url', 2083)->nullable()->comment('URL');
            $table->timestamps();
            $table->comment('労働基準監督署マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_labor_supervision');
    }
};
