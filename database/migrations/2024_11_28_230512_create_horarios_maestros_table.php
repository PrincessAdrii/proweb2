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
        Schema::create('horarios_maestros', function (Blueprint $table) {
            $table->string("idHorarioM");
            $table->string("fecha");
            $table->string("observaciones",200);
            $table->string('idPeriodo',15);
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos');
            $table->string('idPersonal',15)->nullable();
            $table->foreign('idPersonal')->references('idPersonal')->on('personals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_maestros');
    }
};
