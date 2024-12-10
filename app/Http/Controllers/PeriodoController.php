<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
           
            'periodo'    =>['required'],
            'descCorta'  =>['nullable'],
            'fechaIni'  =>['required'],
            'fechaFin'  =>['required'],
        ];
    }

    public function index()
    {
        $periodos= Periodo::paginate(5);
        return view("Periodos/index",compact("periodos"));

    }


    public function create()
    {
        $periodos= Periodo::paginate(5); 
        $periodo=new Periodo;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Periodos/frm",compact("periodos",'periodo',"accion",'txtbtn','des'));
    }

 
    public function store(Request $request)
    {
        $val= $request->validate($this->val);

         $val['idPeriodo']=fake()->bothify("?????");
        Periodo::create($val);
        return redirect()->route('Periodos.index')->with("mensaje",'se inserto correctamente.');
    }

 

    
    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        $periodos=Periodo::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Periodos/frm",compact('periodos','periodo','accion','txtbtn','des'));
    }

   
    public function edit(Periodo $periodo)
    {
        $periodos=Periodo::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Periodos.frm",compact('periodos','periodo','accion','txtbtn','des'));
    }

    
    public function update(Request $request, Periodo $periodo)
    {
        $periodo->update($request->all());
        return redirect()->route('Periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route('Periodos.index');
    }
}