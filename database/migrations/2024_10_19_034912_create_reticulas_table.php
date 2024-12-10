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
        Schema::create('reticulas', function (Blueprint $table) {
            $table->string('idReticula',16)->primary();
            $table->string('descripcion',250)->nullable();
            $table->date('fechaEnVigor')->nullable();
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
        Schema::dropIfExists('reticulas');
    }
};
