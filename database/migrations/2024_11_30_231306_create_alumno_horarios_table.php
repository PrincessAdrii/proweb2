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
        Schema::create('alumno_horarios', function (Blueprint $table) {
            $table->id("idAlumnoHorario");
            $table->integer('semestre');
            $table->string('noctrl',8);
            $table->foreign('noctrl')->references('noctrl')->on('alumnos');
            $table->string('idHorarios',15);
            $table->foreign('idHorarios')->references('idHorarios')->on('grupo_horarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_horarios');
    }
};
