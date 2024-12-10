<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrupoHorario extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoHorarioFactory> */
    use HasFactory;
    protected $primaryKey = 'idHorarios';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idHorarios', 
        'dia',
        'hora', 
        'idLugar',
        'idGrupo',
        
         
    ];
    
    public function grupo():BelongsTo{
        return $this->belongsTo(Grupo::class,'idGrupo');
    }

    public function lugar(): BelongsTo
    {
        return $this->belongsTo(Lugar::class, 'idLugar');
    }
    
}
 