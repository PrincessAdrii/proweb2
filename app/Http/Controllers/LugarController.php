<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public $val;
    public function __construct(){
        $this->val=[
        'nombreLugar' => ['required'],
        'nombreCorto' =>['required','max:5'],
        'idEdificio'=> ['required'],
        ];
        }
    public function index()
    {
        $lugares = Lugar::paginate(5);
        return view('Lugares.index', compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lugares= Lugar::paginate(5); 
        $lugar=new Lugar;
        $edificios = Edificio::all();
       

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Lugares/frm",compact("lugares",'lugar',"accion",'txtbtn','des','edificios'));
    }

   
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        $val['idLugar'] = fake()->unique()->bothify('####');
        Lugar::create($val);
    return redirect()->route('Lugares.index')->with('success', 'Lugar creado con éxito.');
}

    
    public function show(Lugar $lugar)
    {
        $lugares=Lugar::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $edificios= [Edificio::find($lugar->idEdificio)];
       
        $des='disabled';
        return view("Lugares.frm",compact("lugares",'lugar',"accion",'txtbtn','des','edificios'));
    }

    
    public function edit(Lugar $lugar)
    {
        $edificios = Edificio::all();
        $lugares = Lugar::paginate(5);
        
        $accion = 'E';
        $txtbtn = 'actualizar';
        $des = '';

        return view("Lugares.frm",compact("lugares",'lugar',"accion",'txtbtn','des','edificios'));
    }

    
    public function update(Request $request, Lugar $lugar)
    {
        $val= $request->validate($this->val);
        $lugar->update($val);
        return redirect()->route('Lugares.index');
    }

    
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route('Lugares.index')->with('success', 'Lugar eliminado con éxito.');
    }
}