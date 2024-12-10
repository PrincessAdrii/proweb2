<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalPlaza extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPersonalPlaza';
    public $incrementing = false;
    protected $fillable = [
        'idPersonal',
        'idPlaza',
        'tipoNombramiento'
    ];

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class, 'idPersonal');
    }

    public function plaza(): BelongsTo
    {
        return $this->belongsTo(Plaza::class, 'idPlaza');
    }
}
