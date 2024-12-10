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
        Schema::create('materias_abiertas', function (Blueprint $table) {
            $table->id();

            $table->string('idPeriodo',15);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos')->onUpdate('cascade');

            $table->string('idMateria',15);
            $table->foreign('idMateria')->references('idMateria')->on('materias')->onUpdate('cascade');

            $table->string('idCarrera',15);
            $table->foreign('idCarrera')->references('idCarrera')->on('carreras')->onUpdate('cascade');

           
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias_abiertas');

    }
};
