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
        Schema::create('m_pickup_type', function (Blueprint $table) {
            $table->id()->comment('Pick upタイプID');
            $table->string('name')->comment('名称');
            $table->integer('pickup_message_id')->nullable()->comment('PickupメッセージID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pickup_type');
    }
};
