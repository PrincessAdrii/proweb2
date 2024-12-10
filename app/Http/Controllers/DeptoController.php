<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $val;

    public function __construct(){
        $this->val=[
            // 'idDepto'       =>['required'],
            'nombreDepto'    =>['required','min:3'],
            'nombreMediano' =>['required'],
            'nombreCorto' =>['required'],
        ];
    }

    public function index()
    {
        $deptos= Depto::paginate(5);
        return view("Deptos/index",compact("deptos"));

    }


    public function create()
    {
        $deptos= Depto::paginate(5); 
        $depto=new Depto;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Deptos/frm",compact("deptos",'depto',"accion",'txtbtn','des'));
    }

 
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        $val['idDepto'] = fake()->bothify("????####");
        
        Depto::create($val);
        return redirect()->route('Deptos.index')->with("mensaje",'se inserto correctamente.');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Depto $depto)
    {
        $deptos=Depto::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Deptos/frm",compact('deptos','depto','accion','txtbtn','des'));
    }

   
    public function edit(Depto $depto)
    {
        $deptos=Depto::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Deptos.frm",compact('deptos','depto','accion','txtbtn','des'));
    }

    
    public function update(Request $request, Depto $depto)
    {
        $depto->update($request->all());
        return redirect()->route('Deptos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depto $depto)
    {
        $depto->delete();
        return redirect()->route('Deptos.index');
    }
}