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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport')->nullable();
            $table->foreign('sport')->references('id')->on('sports');
            $table->unsignedBigInteger('court')->nullable();
            $table->foreign('court')->references('id')->on('fields');
            $table->float('price')->nullable();
            $table->enum('payment_status', ['pending', 'paid'])->default('pending')->change();
            $table->date('date_of_use')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
