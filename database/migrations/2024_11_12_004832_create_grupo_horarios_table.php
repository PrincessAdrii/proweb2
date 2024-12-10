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
        Schema::create('grupo_horarios', function (Blueprint $table) {
            $table->string('idHorarios')->primary();
            $table->string("dia", 10);
            $table->tinyInteger('hora');
           
      

            $table->string('idGrupo',15);
            $table->foreign('idGrupo')->references('idGrupo')->on('grupos');
            $table->string('idLugar',15);
            $table->foreign('idLugar')->references('idLugar')->on('lugars');
          

            $table->timestamps();

            $table->unique(['dia', 'hora','idLugar']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horarios');
    }
};
