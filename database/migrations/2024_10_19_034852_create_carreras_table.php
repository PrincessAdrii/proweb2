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
        Schema::create('carreras', function (Blueprint $table) {
            $table->string('idCarrera',15)->primary();
            $table->String('nombreCarrera',200)->unique();
            $table->String('nombreMediano',50)->unique();
            $table->String('nombreCorto',5)->unique();
            //FK
            $table->string('idDepto',20);
            $table->foreign('idDepto')->references('idDepto')->on('deptos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
