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
        Schema::create('alumno_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('noctrl', 8);
            $table->foreign('noctrl')->references('noctrl')->on('alumnos');
            $table->string('nip', 4)->unique();
            $table->timestamps();
            $table->unique(['noctrl']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_usuarios');
    }
};
