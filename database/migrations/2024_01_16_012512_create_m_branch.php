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
        Schema::create('m_branch', function (Blueprint $table) {
            $table->id('branch_id')->autoIncrement()->comment('支店ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->integer('address1')->nullable()->comment('住所１（都道府県）');
            $table->string('address2', 255)->nullable()->comment('住所２（市区町村）');
            $table->string('address3', 255)->nullable()->comment('住所３');
            $table->string('name', 255)->nullable()->comment('名称');
            $table->string('tel_area_code', 10)->nullable()->comment('電話番号（市外局番）');
            $table->string('tel_city_code', 10)->nullable()->comment('電話番号（市内局番）');
            $table->string('tel_subscriber_code', 10)->nullable()->comment('電話番号（加入者番号）');
            $table->string('tel_overseas', 10)->nullable()->comment('国外電話番号');
            $table->tinyInteger('place_type')->default(1)->comment('国内外');
            $table->tinyInteger('branch_type')->nullable()->comment('区分');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('支店マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_branch');
    }
};

