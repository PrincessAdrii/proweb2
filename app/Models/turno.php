<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class turno extends Model
{
    /** @use HasFactory<\Database\Factories\TurnoFactory> */
    use HasFactory;
    protected $fillable = ['idTurno', 'fecha', 'hora', 'inscripcion', 'noctrl'];
    protected $casts = [
        'idTurno' => 'string',
        'fecha' => 'string',
        'hora' => 'string',
        'inscripcion' => 'string',
        'noctrl'=> 'string'
    ];
    public $incrementing=false;
    protected $primaryKey='idTurno';
 

    public function alumno(): BelongsTo
{
    return $this->belongsTo(Alumno::class, 'noctrl', 'noctrl');
}
 
}
