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
        Schema::table('m_employee', function (Blueprint $table) {
            $table->integer('work_category')->nullable()->comment('勤務区分')->change();
            $table->integer('enrollment_category')->nullable()->comment('在籍区分')->change();
            $table->integer('recruitment_category')->nullable()->comment('採用区分')->change();
            $table->integer('recruitment_category_detail')->nullable()->comment('採用区分選択')->change();
            $table->integer('pay_type')->nullable()->comment('給与区分')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_employee', function (Blueprint $table) {
            $table->integer('work_category')->comment('勤務区分')->change();
            $table->integer('enrollment_category')->comment('在籍区分')->change();
            $table->integer('recruitment_category')->comment('採用区分')->change();
            $table->integer('recruitment_category_detail')->comment('採用区分選択')->change();
            $table->integer('pay_type')->comment('給与区分')->change();
        });
    }
};
