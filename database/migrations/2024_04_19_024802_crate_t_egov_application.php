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
        Schema::create('t_egov_application', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->comment('会社ID');
            $table->string('arrive_id', 20)->nullable(false)->comment('到達番号');
            $table->dateTime('arrive_date')->nullable(false)->comment('到達日時');
            $table->string('corporation_name', 256)->nullable(false)->comment('法人名');
            $table->string('applicant_name', 256)->nullable(false)->comment('申請者名');
            $table->string('apply_type', 5)->nullable(false)->comment('申請区分（新規申請または再提出）');
            $table->string('proc_name', 1024)->nullable(false)->comment('手続名');
            $table->string('ministry_name', 12)->nullable(false)->comment('府省名');
            $table->string('submission_destination', 256)->nullable(false)->comment('提出先');
            $table->text('apply_form')->nullable()->comment('申請した各様式・書類の内容');
            $table->text('apply_pay_list')->nullable()->comment('納付情報');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_egov_application');
    }
};
