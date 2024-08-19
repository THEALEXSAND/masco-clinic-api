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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('observacion')->nullable();
            $table->string('diagnostico');

            $table->foreignId('medical_history_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string('user_cedula', 8)->nullable();
            $table->foreign('user_cedula')->references('cedula')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
