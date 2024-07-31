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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('infant')->nullable();
            $table->longText('package_title')->nullable();
            $table->double('total_price')->nullable();
            $table->string('package_category')->nullable();
            $table->foreignId('package_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};