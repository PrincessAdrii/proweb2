<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plaza extends Model
{
    /** @use HasFactory<\Database\Factories\PlazaFactory> */
    use HasFactory;
    protected $cast = [
        "idPlaza"=> "string",
    ];
    protected $primaryKey = 'idPlaza';
    public $incrementing = false; 
    protected $fillable = ['idPlaza','nombrePlaza'];

    // PERSONAL
    
    // public function personals():BelongsToMany{
    //     return $this->belongsToMany(Personal::class,'personal_plazas','idPlaza','RFC')
    //     ->withPivot('tipoNombramiento')
    //     ->withTimestamps();
    // }
}