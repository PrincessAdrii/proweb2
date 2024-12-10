<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;

class PlazaController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            // 'idPlaza'    =>['required'],
            'nombrePlaza'    =>['required'],
        ];
    }
    
    public function index()
    {
        $plazas= Plaza::paginate(5);
        return view("Plazas/index",compact("plazas"));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $plazas= Plaza::paginate(5); 
        $plaza=new Plaza;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Plazas.frm", compact("plazas","plaza","accion",'txtbtn','des'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        $val['idPlaza']=fake()->bothify("???####");
        Plaza::create($val);
        return redirect()->route('Plazas.index')->with("mensaje",'se inserto correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plaza $plaza)
    {
        $plazas=Plaza::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Plazas.show",compact('plazas','plaza','accion','txtbtn','des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plaza $plaza)
    {
        $plazas=Plaza::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Plazas.frm",compact('plazas','plaza','accion','txtbtn','des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plaza $plaza)
    {
        $val= $request->validate($this->val);
        $plaza->update($val);
        return redirect()->route('Plazas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plaza $plaza)
    {
        $plaza->delete();
        return redirect()->route("Plazas.index");
    }
}
