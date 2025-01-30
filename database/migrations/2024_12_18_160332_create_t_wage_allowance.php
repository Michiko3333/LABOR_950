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
        Schema::create('t_wage_allowance', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->integer('wage_id')->comment('賃金ID');
            $table->string('name', 15)->comment('名称');
            $table->integer('amount')->default(0)->comment('金額');
            $table->tinyInteger('delete_flg')->nullable()->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_wage_allowance');
    }
};
