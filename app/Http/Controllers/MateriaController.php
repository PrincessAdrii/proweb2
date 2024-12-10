<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
  
    public $val;

public function __construct(){
    $this->val=[
        // 'idMateria' => ['required'],

        'nombreMateria' => ['required'],
        'nivel'   => ['required'],
        'nombreMediano'   => ['required'],
        'nombreCorto'   => ['required'],
        'modalidad'   => ['required'],
        'semestre'   => ['required'],
        'creditos'   => ['required'],

        //FK
        'idReticula'       => ['required', 'exists:reticulas,idReticula'],
      
    ];
}


public function index()
{
    // Realizar un join entre materias y reticulas para ordenar por semestre
    $materias = Materia::join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->orderBy('materias.semestre', 'asc') // Ordenar por semestre de la tabla materias
        ->select('materias.*') // Seleccionar todas las columnas de materias
        ->paginate(5); // Paginación

    return view('Materias.index', compact('materias'));
}


    public function create()
    {
        $materias= Materia::paginate(5); 
        $materia=new Materia;
        
        $reticulas=Reticula::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Materias/frm",compact("materias",'materia',"accion",'txtbtn','des','reticulas'));
    }

   
    public function store(Request $request)
    {
        // var_dump($request)
        
       $val= $request->validate($this->val);
       $val['idMateria'] = fake()->bothify("?????");
       Materia::create($val);
        return redirect()->route('Materias.index')->with("mensaje",'se inserto correctamente.');
        
    }

 
    public function show(Materia $materia)
    {
        $materias=Materia::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $reticulas= Reticula::all();
        
        $des='disabled';
        return view("Materias.frm",compact('materias','materia','accion','txtbtn','des','reticulas'));
    }

  
    public function edit(Materia $materia)
{   
    $materias = Materia::Paginate(5);
    $accion = 'E';
    $txtbtn = 'actualizar';
    $reticulas = Reticula::all(); // Cambiado a minúsculas
    $des = '';
    return view("Materias.frm", compact('materias', 'materia', 'accion', 'txtbtn', 'des', 'reticulas'));
}


  
    public function update(Request $request, Materia $materia)
    {   
        //LO QUE SE DA VALIDADO SE GRABA
        $val= $request->validate($this->val);
        $materia->update($val);
        return redirect()->route('Materias.index');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
{
    $materia->delete();
    return redirect()->route('Materias.index');
}

    
}