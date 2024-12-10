<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    public $val;

public function __construct(){
    $this->val=[
        // 'idReticula' => ['required'],
        'descripcion' => ['nullable'],
        'fechaEnVigor'   => ['required'],
        // 'idCarrera'       => ['required', 'exists:carrera,idCarrera'],
        'idCarrera'     => ['required', 'string', 'max:15'] // Ensure max is set to 15
    ];
}


    public function index()
{
    $reticulas = Reticula::paginate(5);
    return view('Reticulas.index', compact('reticulas'));
}


    public function create()
    {
        $reticulas= Reticula::paginate(5); 
        $reticula=new Reticula;
        
        $carreras=Carrera::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Reticulas/frm",compact("reticulas",'reticula',"accion",'txtbtn','des','carreras'));
    }

   
    public function store(Request $request)
    {
        // var_dump($request)
        
       $val= $request->validate($this->val);
       $val['idReticula'] = fake()->bothify("?????");
       Reticula::create($val);
        return redirect()->route('Reticulas.index')->with("mensaje",'se inserto correctamente.');
        
    }

 
    public function show(Reticula $reticula)
    {
        $reticulas=Reticula::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $carreras= Carrera::all();
        
        $des='disabled';
        return view("Reticulas.frm",compact('reticulas','reticula','accion','txtbtn','des','carreras'));
    }

  
    public function edit(Reticula $reticula)
{   
    $reticulas = Reticula::Paginate(5);
    $accion = 'E';
    $txtbtn = 'actualizar';
    $carreras = Carrera::all(); // Cambiado a minúsculas
    $des = '';
    return view("Reticulas.frm", compact('reticulas', 'reticula', 'accion', 'txtbtn', 'des', 'carreras'));
}


  
    public function update(Request $request, Reticula $reticula)
    {   
        //LO QUE SE DA VALIDADO SE GRABA
        $val= $request->validate($this->val);
        $reticula->update($val);
        return redirect()->route('Reticulas.index');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reticula $reticula)
{
    $reticula->delete();
    return redirect()->route('Reticulas.index');
}

    
}