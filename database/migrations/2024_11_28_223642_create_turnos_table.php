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
        Schema::create('turnos', function (Blueprint $table) {
            $table->string("idTurno")->primary();
            $table->string("fecha");
            $table->string("hora");
            $table->string("inscripcion")->default('inscripcion');
            $table->string('noctrl',15);
            $table->foreign('noctrl')->references('noctrl')->on('alumnos');
            $table->unique(['fecha', 'hora']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
