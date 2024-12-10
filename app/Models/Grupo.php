<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
  
    use HasFactory;

    protected $fillable = [
       'idGrupo', 
        'grupo',
        'fecha', 
        'maxAlumnos', 
        'descripcion',
        // FK
        'idPeriodo',
        'idMateria',
        'idPersonal',
    ];
    protected $casts = ['idGrupo'=>'string'];
    public $incrementing = false;
    protected $primaryKey = 'idGrupo';

    
    
    public function periodo():BelongsTo{
        return $this->belongsTo(Periodo::class,'idPeriodo');
    }

    public function materia():BelongsTo{
        return $this->belongsTo(Materia::class,'idMateria');
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class, 'idPersonal');
    }

    public function alumnosClases()
    {
        return $this->hasMany(alumnos_clase::class, 'idGrupo', 'idGrupo');
    }



    
}
 