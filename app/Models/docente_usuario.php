<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class docente_usuario extends Model
{
    /** @use HasFactory<\Database\Factories\DocenteUsuarioFactory> */
    use HasFactory;

    protected $fillable =['idPersonal','nip'];
    protected $table = 'docente_usuario';

    public function docenteU():BelongsTo{
        return $this->belongsTo(Alumno::class,'idPersonal');
   
    }
}
