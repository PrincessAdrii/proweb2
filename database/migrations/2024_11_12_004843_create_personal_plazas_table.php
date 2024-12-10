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
        Schema::create('personal_plazas', function (Blueprint $table) {
            $table->id('idPersonalPlaza');
            $table->string('idPersonal');
            $table->string('idPlaza');
            $table->smallInteger('tipoNombramiento');
             
            $table->timestamps();
            
            $table->foreign('idPersonal')->references('idPersonal')->on('personals')->onDelete('cascade');
            $table->foreign('idPLaza')->references('idPLaza')->on('plazas')->onDelete('cascade');
                
            $table->unique(['idPersonal', 'idPLaza']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_plazas');
    }
};
