<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\AlumnoUsuario;

class AlumnoUsuarioController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'idAlumnoUsuario'   =>['required'],
            'noctrl'            =>['required'],
            'nip'               =>['required']
        ];
    }

    public function index()
    {
        $alumnoUsuarios= AlumnoUsuario::paginate(5);
        return view("verhorarioalumno",compact("alumnoUsuarios"));
    }

    public function create()
    {
        $alumnoUsuarios= AlumnoUsuario::paginate(5); 
        $alumnoUsuario=new AlumnoUsuario;
        $alumnos=Alumno::all();
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("verhorarioalumno",compact("alumnoUsuarios",'alumnoUsuario',"accion",'txtbtn','des','alumnos'));
    }

    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        AlumnoUsuario::create($val);
        return redirect()->route('verhorarioalumno')->with("mensaje",'se inserto correctamente.');
    }

    public function show(AlumnoUsuario $alumnoUsuario)
    {
        $alumnoUsuarios=AlumnoUsuario::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $alumnos= [Alumno::find($alumnoUsuarios->noctrl)];
        $des='disabled';
        return view("verhorarioalumno",compact('alumnoUsuarios','alumnoUsuario','accion','txtbtn','des','alumnos'));
    }

    public function edit(AlumnoUsuario $alumnoUsuario)
    {
        $alumnos = Alumno::all();
        $alumnoUsuarios = AlumnoUsuario::paginate(5);
        $accion = 'E';
        $txtbtn = 'actualizar';
        $des = '';
        return view("verhorarioalumno", compact('alumnoUsuarios', 'alumnoUsuario', 'accion', 'txtbtn', 'des', 'alumnos'));
    }

    public function update(Request $request, AlumnoUsuario $alumnoUsuario)
    {
        $val= $request->validate($this->val);
        $alumnoUsuario->update($val);
        return redirect()->route('verhorarioalumno');
    }

    public function destroy(AlumnoUsuario $alumnoUsuario)
    {
        $alumnoUsuario->delete();
        return redirect()->route('verhorarioalumno');
    }
}
