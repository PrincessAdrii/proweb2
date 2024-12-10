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
        Schema::create('materias', function (Blueprint $table) {
            $table->string('idMateria',10)->primary();
            $table->string('nombreMateria',200)->nullable();
            $table->string('nombreMediano',25)->nullable();
            $table->string('nombreCorto',10)->nullable();
            $table->string('nivel',1)->nullable();
            $table->string('modalidad',1)->nullable();
            $table->string('semestre');
            $table->integer('creditos');
            $table->string('idReticula',16);
            $table->foreign('idReticula')->references('idReticula')->on('reticulas');
            $table->timestamps();
 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
