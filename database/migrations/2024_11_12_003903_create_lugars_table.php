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
        Schema::create('lugars', function (Blueprint $table) {
            $table->string('idLugar')->primary();
            $table->string('nombreLugar', 25)->unique();
            $table->string('nombreCorto', 5)->unique();
            $table->string('idEdificio'); // Clave foránea al edificio

            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('idEdificio')->references('idEdificio')->on('edificios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugars');
    }
};
