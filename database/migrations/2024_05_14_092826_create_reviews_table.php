<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained()->on('activities')->onDelete('cascade');
            $table->text('comment');
            $table->integer('rating');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
