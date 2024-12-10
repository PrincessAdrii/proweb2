<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reticula extends Model
{
    /** @use HasFactory<\Database\Factories\ReticulaFactory> */
    use HasFactory;
    
    protected $fillable = ['idReticula','descripcion',
    'fechaEnVigor','idCarrera'];
    protected $casts = ['idReticula'=>'string'];
    public $incrementing=false;
    protected $primaryKey='idReticula';

    
    public function carrera():BelongsTo{
        return $this->belongsTo(Carrera::class,'idCarrera');
    }
    public function materias():HasMany{
        return $this->hasMany(Materia::class,'idReticula');
    }
}