<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class MateriasAbierta extends Model
{
    use HasFactory;

    protected $fillable = [
        'idMateria',
        'idPeriodo',
        'idCarrera',
    ];

    // En el modelo de MateriaAbierta
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'idMateria');
    }

    // En el modelo de MateriaAbierta
    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'idPeriodo');
    }

    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'idCarrera');
    }
}

