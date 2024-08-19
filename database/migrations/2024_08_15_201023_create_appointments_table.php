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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->string('asunto');
            $table->date('fecha');
            $table->timestamps();

            $table->foreignId('pet_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('user_cedula', 8)->nullable();
            $table->foreign('user_cedula')->references('cedula')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
