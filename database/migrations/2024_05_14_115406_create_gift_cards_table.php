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
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('recipient_email')->nullable();
            $table->string('code');
            $table->string('discount_price');
            $table->longText('description')->nullable();
            $table->boolean('used_at')->default(false);
            $table->string('valid_date');
            $table->string('type')->default('gift');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_cards');
    }
};