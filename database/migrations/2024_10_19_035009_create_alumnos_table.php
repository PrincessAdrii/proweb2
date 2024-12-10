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
        Schema::create('alumnos', function (Blueprint $table) {
            
            $table->string('noctrl', 8)->primary();
            $table->string('nombre',50);
            $table->string('apellidoP',50);
            $table->string('apellidoM',50);
            $table->string('sexo',1);
            $table->string('email',50);
            $table->tinyInteger('semestreActual')->default('1');
            $table->string('idCarrera',15);
            $table->foreign('idCarrera')->references('idCarrera')->on('carreras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
