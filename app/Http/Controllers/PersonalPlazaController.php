<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use App\Models\Personal;
use Illuminate\Http\Request;
use App\Models\PersonalPlaza;

class PersonalPlazaController extends Controller
{
    public $val;
    public function __construct(){
        $this->val=[
            'idPersonal' =>['required'],
            'idPlaza' =>['required'],
            'tipoNombramiento' =>['required'],
            
        ];
    } 
    
    public function index()
    {
        $personalPlazas = PersonalPlaza::paginate(5);
        return view('PersonalPlazas.index', compact('personalPlazas'));
    }
    
    public function create()
    {
        $personalPlazas= PersonalPlaza::paginate(5); 
        $personalPlaza=new PersonalPlaza;
        $plazas = Plaza::all();
        $personales = Personal::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("PersonalPlazas/frm",compact("personalPlazas",'personalPlaza',"accion",'txtbtn','des','plazas','personales'));
    }

    
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        $val['idPersonalPlaza'] = fake()->bothify("####");
            PersonalPlaza::create($val);
        return redirect()->route('PersonalPlazas.index')->with('success', 'Personal creado con éxito.');
    }


    
    public function show(PersonalPlaza $personalPlaza)
    {
        $personalPlazas=PersonalPlaza::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $plazas= [Plaza::find($personalPlaza->idPlaza)];
        $personales= [Personal::find($personalPlaza->idPersonal)];
   
       
        $des='disabled';
        return view("PersonalPlazas.frm",compact("personalPlazas",'personalPlaza',"accion",'txtbtn','des','plazas','personales'));
    }

    
    public function edit(PersonalPlaza $personalPlaza)
    {
        $plazas = Plaza::all();
        $personales = Personal::all();
        $personalPlazas = PersonalPlaza::paginate(5);
        
        $accion = 'E';
        $txtbtn = 'actualizar';
        $des = '';

        return view("PersonalPlazas.frm",compact("personalPlazas",'personalPlaza',"accion",'txtbtn','des','plazas','personales'));
    }


    
    public function update(Request $request, PersonalPlaza $personalPlaza)
    {
        $val= $request->validate($this->val);
        $personalPlaza->update($val);
        return redirect()->route('PersonalPlazas.index');
    }


    
    public function destroy(PersonalPlaza $personalPlaza)
    {
        $personalPlaza->delete();
        return redirect()->route('PersonalPlazas.index')->with('success', 'Personal eliminado con éxito.');
    }
}
