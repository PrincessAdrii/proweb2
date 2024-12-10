<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depto extends Model
{
    /** @use HasFactory<\Database\Factories\DeptoFactory> */
    use HasFactory;
    public function carreras(): HasMany{
        return $this->hasMany(Carrera::class,'idDepto');
    }
     // Definir la clave primaria
     protected $primaryKey= 'idDepto'; 
     protected $casts = ['idDepto'=>'string'];
     public $incrementing = false;
 
     // Agrega los campos que se pueden asignar masivamente, incluyendo idDepto
     protected $fillable = [
         'idDepto',  
         'nombreDepto',
         'nombreMediano',
         'nombreCorto',
     ];
 }


 

   

   
   
   

   
  