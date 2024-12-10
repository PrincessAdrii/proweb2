<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentoFactory> */
    use HasFactory;

    protected $fillable = [
        'curp',
        'acta_nacimiento',
        'titulo_preparatoria',
        'noctrl', // Asegurarse de que se pueda asignar el noctrl
    ];

    // Relación inversa con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'noctrl', 'noctrl');
    }
}
