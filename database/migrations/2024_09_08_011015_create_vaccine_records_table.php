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
        Schema::create('vaccine_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_history_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('nombre_vacuna');
            $table->string('observacion')->nullable();
            $table->date('fecha_aplicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_records');
    }
};
