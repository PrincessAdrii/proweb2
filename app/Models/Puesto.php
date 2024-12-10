<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    /** @use HasFactory<\Database\Factories\PuestoFactory> */
    use HasFactory;
    protected $fillable = ['idPuesto','nombrePuesto','tipo'];
    protected $casts = ['idPuesto'=>'string'];
    protected $primaryKey='idPuesto';
    public $incrementing = false;


        // PERSONAL
        
    // public function personals():HasMany{
    //     return $this->hasMany(Personal::class,'idPuesto','idPuesto');
    // }
}