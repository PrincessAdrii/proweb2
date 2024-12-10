<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumnoHorario extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoHorarioFactory> */
    use HasFactory;
    
    protected $fillable =['semestre','noctrl','idHorarios'];

    public function alumno():BelongsTo{
        return $this->belongsTo(Alumno::class,'noctrl');
    }

    public function grupohorario():BelongsTo{
        return $this->belongsTo(GrupoHorario::class,'idHorarios');
    }
}
