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
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('mascota_id');
            $table->integer('usuario_cedula');
            $table->text('asunto')->nullable();
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_cedula')->references('cedula')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
