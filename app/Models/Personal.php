<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPersonal';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idPersonal', 
        'RFC', 
        'nombre', 
        'apellidoP', 
        'apellidoM', 
        'licenciatura', 
        'lictit', 
        'especializacion', 
        'esptit', 
        'maestria', 
        'maetit',  
        'doctorado',  
        'doctit', 
        'fechaIngSep', 
        'fechaIngIns',
        'idDepto',
        'idPuesto',
    ];

    
    public function depto(): BelongsTo
    {
        return $this->belongsTo(Depto::class, 'idDepto', 'idDepto');
    }

   
    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class, 'idPuesto', 'idPuesto');
    }
       

}
