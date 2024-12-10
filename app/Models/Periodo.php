<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periodo extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodoFactory> */
    use HasFactory;
    protected $fillable = ['idPeriodo','periodo','descCorta','fechaIni',
    'fechaFin'];
    protected $casts = [
        'idPeriodo' => 'string',
        'fechaIni' => 'date',
        'fechaFin' => 'date',
    ];
    
    public $incrementing = false;
    protected $primaryKey= 'idPeriodo';


    // public function horarios():HasMany{
    //     return $this->hasMany(Horario::class,'idPeriodo');
    // }
}