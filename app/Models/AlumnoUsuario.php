<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumnoUsuario extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoUsuarioFactory> */
    use HasFactory;

    protected $fillable =['noctrl','nip'];
    protected $table = 'alumno_usuario';

    public function alumno():BelongsTo{
        return $this->belongsTo(Alumno::class,'noctrl');
   
    }
}
