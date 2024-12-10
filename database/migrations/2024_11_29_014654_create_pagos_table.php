<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            
            $table->enum('tipo_pago', ['banco', 'transferencia']);
            $table->decimal('monto_pago', 10, 2);
            $table->date('fecha_pago');
            $table->text('referencia')->nullable();
            $table->string('comprobante_pago')->nullable();
            $table->timestamps();

            // Relación con la tabla alumnos (clave foránea)
            $table->string('noctrl'); // Definimos la clave foránea
            $table->foreign('noctrl')->references('noctrl')->on('alumnos')->onDelete('cascade'); // Elimina los pagos si el alumno es eliminado
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
