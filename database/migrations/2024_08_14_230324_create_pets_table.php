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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            // --> Manera Larga de hacer una relacion
            $table->string('customer_cedula', 8)->nullable();
            $table->foreign('customer_cedula')->references('cedula')->on('customers')->onDelete('set null')->onUpdate('cascade');

            $table->foreignId('breed_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade'); // --> Manera Corta de hacer una relacion
            $table->string('name');
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->date('fecha_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
