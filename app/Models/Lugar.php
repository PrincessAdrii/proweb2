<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lugar extends Model
{
    use HasFactory;

    protected $primaryKey = 'idLugar';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idLugar', 
        'nombreLugar', 
        'nombreCorto', 
        'idEdificio'
    ];

    public function edificio(): BelongsTo
    {
        return $this->belongsTo(Edificio::class, 'idEdificio');
    }
}
