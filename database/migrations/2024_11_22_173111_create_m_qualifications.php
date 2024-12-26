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
        Schema::create('m_qualifications', function (Blueprint $table) {
            $table->id()->comment('資格ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('qualification_name')->comment('資格名');
            $table->integer('qualification_allowance')->nullable()->comment('資格手当');
            $table->integer('applicable_grade')->nullable()->comment('該当等級');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_qualifications');
    }
};
