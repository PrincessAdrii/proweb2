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
        Schema::create('grupos_abiertos', function (Blueprint $table) {
            $table->string("idGrupoA");
            $table->tinyInteger('cupo');
            $table->string("estado",10);
            $table->string('idGrupo',15);
            $table->foreign('idGrupo')->references('idGrupo')->on('grupos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_abiertos');
    }
};
