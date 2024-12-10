<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    public $val;
    public function __construct(){
        $this->val=[
        // 'idEdificio'=> ['required'],    
        'nombreEdificio'=> ['required'],
        'nombreCorto' =>['required','max:5'],

        ];
        }

    public function index()
    {
         $edificios = Edificio::paginate(5);
        return view('Edificios.index', compact('edificios'));
    }

    
    public function create()
    {
        $edificios= Edificio::paginate(5); 
        $edificio=new Edificio;
    
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Edificios/frm",compact("edificios",'edificio',"accion",'txtbtn','des'));
    }

    
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        $val['idEdificio'] = fake()->bothify("####");
        Edificio::create($val); 
        return redirect()->route('Edificios.index')->with('success', 'Edificio creado con éxito.');
    }


    
    public function show(Edificio $edificio)
    {
        $edificios=Edificio::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
       
        $des='disabled';
        return view("Edificios.frm",compact("edificios",'edificio',"accion",'txtbtn','des'));
    }

    
    public function edit(Edificio $edificio)
    {
        $edificios = Edificio::paginate(5);
    
        $accion = 'E';
        $txtbtn = 'actualizar';
        $des = '';

        return view("Edificios.frm",compact("edificios",'edificio',"accion",'txtbtn','des'));
    }

    
    public function update(Request $request, Edificio $edificio)
    {
        $val= $request->validate($this->val);
        $edificio->update($val);
        return redirect()->route('Edificios.index');
    }
    
    public function destroy(Edificio $edificio)
    {
        $edificio->delete();
        return redirect()->route('Edificios.index')->with('success', 'Edificio eliminado con éxito.');
    }
}
