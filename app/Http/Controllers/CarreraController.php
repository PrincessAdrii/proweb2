<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public $val;

public function __construct(){
    $this->val=[
        'nombreCarrera' => ['required'],
        'nombreMediano' => ['required'],
        'nombreCorto'   => ['required'],
        'idDepto'       => ['required', 'exists:deptos,idDepto'],
        // 'idCarrera'     => ['required', 'string', 'max:15'] // Ensure max is set to 15
    ];
}


    public function index()
{
    $carreras = Carrera::paginate(5);
    return view('Carreras.index', compact('carreras'));
}


    public function create()
    {
        $carreras= Carrera::paginate(5); 
        $carrera=new Carrera;
        
        $deptos=Depto::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Carreras/frm",compact("carreras",'carrera',"accion",'txtbtn','des','deptos'));
    }

   
    public function store(Request $request)
    {
        // var_dump($request)
         
       $val= $request->validate($this->val);
       $val['idCarrera'] = fake()->bothify("????####");
        Carrera::create($val);
        return redirect()->route('Carreras.index')->with("mensaje",'se inserto correctamente.');
        
    }

 
    public function show(Carrera $carrera)
    {
        $carreras=Carrera::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $deptos= Depto::all();
        
        $des='disabled';
        return view("Carreras.frm",compact('carreras','carrera','accion','txtbtn','des','deptos'));
    }

  
    public function edit(Carrera $carrera)
{   
    $carreras = Carrera::Paginate(5);
    $accion = 'E';
    $txtbtn = 'actualizar';
    $deptos = Depto::all(); 
    $des = '';
    return view("Carreras.frm", compact('carreras', 'carrera', 'accion', 'txtbtn', 'des', 'deptos'));
}


  
    public function update(Request $request, Carrera $carrera)
    {   
        $val= $request->validate($this->val);
        $carrera->update($val);
        return redirect()->route('Carreras.index');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
{
    $carrera->delete();
    return redirect()->route('Carreras.index');
}

    
}