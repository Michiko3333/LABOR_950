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
        Schema::table('m_branch', function (Blueprint $table) {
            $table->string('labor_bureau_id', 100)->nullable()->change()->comment('管轄（労働局）');
            $table->string('labor_supervision_id', 100)->nullable()->change()->comment('管轄（労働基準監督署）');
            $table->renameColumn('labor_bureau_id', 'labor_bureau_name');
            $table->renameColumn('labor_supervision_id', 'labor_supervision_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_branch', function (Blueprint $table) {
            $table->renameColumn('labor_bureau_name', 'labor_bureau_id');
            $table->renameColumn('labor_supervision_name', 'labor_supervision_id');
            $table->integer('labor_bureau_id')->nullable()->change()->comment('管轄（労働局）');
            $table->integer('labor_supervision_id')->nullable()->change()->comment('管轄（労働基準監督署）');
        });
    }
};
