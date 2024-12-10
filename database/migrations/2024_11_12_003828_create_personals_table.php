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
        Schema::create('personals', function (Blueprint $table) {
            $table->string('idPersonal')->primary();
            $table->string('RFC', 100)->unique();
            $table->string('nombre', 50);
            $table->string('apellidoP', 50);
            $table->string('apellidoM', 50);
            $table->string('licenciatura', 200)->nullable();
            $table->boolean('lictit')->default(false);
            $table->string('especializacion', 200)->nullable();
            $table->boolean('esptit')->default(false);
            $table->string('maestria', 200)->nullable();
            $table->boolean('maetit')->default(false);
            $table->string('doctorado', 200)->nullable();
            $table->boolean('doctit')->default(false);
            $table->date('fechaIngSep')->nullable();
            $table->date('fechaIngIns')->nullable();
            
            // Foreign Keys
            $table->string('idDepto');
            $table->string('idPuesto');
            
            
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('idDepto')->references('idDepto')->on('deptos');
            $table->foreign('idPuesto')->references('idPuesto')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
