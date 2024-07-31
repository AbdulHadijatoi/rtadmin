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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('activity_name');
            $table->string('title')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->date('date');
            $table->string('reference_id')->unique();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('pickup_location')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->default('fail');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};