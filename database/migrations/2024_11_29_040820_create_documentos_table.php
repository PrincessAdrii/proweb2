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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('curp')->nullable();
            $table->string('acta_nacimiento')->nullable();
            $table->string('titulo_preparatoria')->nullable();
            $table->string('noctrl'); // Agregar la columna noctrl
            $table->foreign('noctrl')->references('noctrl')->on('alumnos')->onDelete('cascade');
            $table->timestamps();

            // Relación con la tabla alumnos (clave foránea)
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
