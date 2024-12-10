<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Edificio;
use App\Models\Reticula;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use App\Models\MateriasAbierta;
use Illuminate\Support\Facades\DB;


class JsonController extends Controller
{
    public function periodos(){
        $periodos= Periodo::get();
        return $periodos;
    }
    public function carreras(){
        $carreras= Carrera::get();
        return $carreras;
    }

    public function semestres(){
        $semestres=Materia::get();
        $semestres=DB::table('materias')
        ->select('semestre')
        ->groupBy('semestre')
        ->orderBy('semestre')
        ->get();
        return $semestres;
    }

    public function edificios(){
        $edificios= Edificio::get();
        return $edificios;
    }

    public function departamentos(){
        $departamentos= Depto::get();
        return $departamentos;
    }
    public function alumnos()
    {
        $alumnos = Alumno::select( 'nombre', 'apellidos', 'sexo')->get();
        return response()->json($alumnos);
    }
    


 
    public function materiasa(string $semestre) {
        $materiasa = MateriaAbierta::with('materia.reticula.carrera')
            ->whereHas('materia', 
            function($query) use ($semestre) {
                $query->where('semestre', $semestre);
            })
            ->get();
    
        return $materiasa;
    }
    

}
