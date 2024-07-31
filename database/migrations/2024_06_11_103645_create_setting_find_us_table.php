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
        Schema::create('setting_find_us', function (Blueprint $table) {
            $table->id();
            $table->string('header_image')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('address')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('business_email')->nullable();
            $table->string('press_email')->nullable();
            $table->string('general_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_find_us');
    }
};