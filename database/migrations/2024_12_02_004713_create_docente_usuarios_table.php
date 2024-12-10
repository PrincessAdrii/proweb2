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
        Schema::create('docente_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('idPersonal', 255);
            $table->foreign('idPersonal')->references('idPersonal')->on('personals')->onDelete('cascade');
            $table->string('nip', 4)->unique(); // NIP único
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_usuarios');
    }
};
