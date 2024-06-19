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
        Schema::create('recipes', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('consulta_id'); // relación futura con consultations
            $table->unsignedBigInteger('medicamento_id'); // relación futura con medicines
            $table->integer('cantidad');
            $table->text('indicaciones');
            $table->timestamps();

            // Relaciones (descomentar cuando se creen las tablas relacionadas)
            // $table->foreign('consulta_id')->references('id')->on('consultations')->onDelete('cascade');
            // $table->foreign('medicamento_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
