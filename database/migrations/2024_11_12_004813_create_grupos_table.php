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
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('idGrupo')->primary();
            $table->date('fecha');
            $table->string("grupo", 5);
            $table->string("descripcion", 200);
            $table->tinyInteger('maxAlumnos');

            $table->string('idPeriodo',15);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos');
            $table->string('idMateria',15);
            $table->foreign('idMateria')->references('idMateria')->on('materias');
            $table->string('idPersonal',15)->nullable();
            $table->foreign('idPersonal')->references('idPersonal')->on('personals');

            $table->timestamps();

            $table->unique(['grupo', 'idPeriodo','idMateria','idPersonal']);
            $table->unique(['idPeriodo','idMateria','idPersonal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
