<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    
    use HasFactory;

    public function carrera():BelongsTo{
     return $this->belongsTo(Carrera::class,'idCarrera');

 }
 protected $fillable =['noctrl','nombre','apellidoP','apellidoM','sexo','email','semestreActual','idCarrera'];

 protected $primaryKey= 'noctrl'; //relacion de laravel id
 protected $casts = ['noctrl'=>'string'];
 public $incrementing = false; //me trae los valores incrementable

 public function turno(): HasOne
{
    return $this->hasOne(Turno::class, 'noctrl', 'noctrl');
}
}
