<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class alumnos_clase extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'alumnos_clases';
    protected $primaryKey = 'idClases';

    public $incrementing = false;

    // Tipo de datos de la clave primaria
    protected $keyType = 'string';

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'idClases',
        'calificacion',
        'noctrl',
        'idGrupo',
    ];

    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'noctrl', 'noctrl');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'idGrupo', 'idGrupo');
    }
}
