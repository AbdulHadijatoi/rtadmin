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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->on('activities')->onDelete('cascade');
            $table->string('title');
            $table->string('price')->nullable();
            $table->string('adult_price')->nullable();
            $table->string('child_price')->nullable();
            $table->longText('highlight')->nullable();
            $table->enum('category', ['private', 'sharing'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};