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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->text('name')->nullable();
            $table->text('page_title')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->longText('highlights')->nullable();
            $table->longText('description')->nullable();
            $table->longText('itinerary')->nullable();
            $table->string('duration')->nullable();
            $table->string('cancellation_duration')->nullable();
            $table->integer('booking_count')->nullable();
            $table->integer('discount_offer')->nullable();
            $table->integer('most_popular_activity')->nullable();
            $table->integer('home_activity')->nullable();
            $table->integer('available_activity')->nullable();
            $table->integer('home_experience_activity')->nullable();
            $table->integer('otherexpereience_activity')->nullable();
            $table->json('features')->nullable();
            $table->string('language')->nullable();
            $table->longText('meetup')->nullable();
            $table->longText('whats_included')->nullable();
            $table->longText('whats_not_included')->nullable();
            $table->integer('minimum_travelers')->nullable();
            $table->string('image')->nullable();
            $table->time('start_time')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};