<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'noctrl',
        'tipo_pago',
        'monto_pago',
        'fecha_pago',
        'referencia',
        'comprobante_pago',
    ];

    // Relación inversa con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'noctrl', 'noctrl');
    }
}
