<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use App\Models\docente_usuario;

class DocenteUsuarioController extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'idPersonal' => ['required'], 
            'nip'        => ['required', 'min:4'], 
        ];
    }

    /**
     * Muestra una lista paginada de los docentes-usuarios.
     */
    public function index()
    {
        $docenteUsuarios = docente_usuario::paginate(5);
        return view("docentes", compact("docenteUsuarios"));
    }

    /**
     * Muestra el formulario para crear un nuevo docente-usuario.
     */
    public function create()
    {
        $docenteUsuarios = docente_usuario::paginate(5);
        $docenteUsuario = new docente_usuario;
        $docentes = Personal::all(); // Todos los docentes (personals)
        $accion = 'C';
        $txtbtn = 'Guardar';
        $des = '';

        return view("docentes", compact("docenteUsuarios", 'docenteUsuario', "accion", 'txtbtn', 'des', 'docentes'));
    }

    /**
     * Almacena un nuevo registro de docente-usuario.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        docente_usuario::create($val);

        return redirect()->route('docentes')->with("mensaje", 'El usuario del docente se creó correctamente.');
    }

    /**
     * Muestra un registro de docente-usuario específico.
     */
    public function show(docente_usuario $docenteUsuario)
    {
        $docenteUsuarios = docente_usuario::paginate(5);
        $accion = 'D';
        $txtbtn = 'Confirmar eliminación';
        $docentes = [Personal::find($docenteUsuario->idPersonal)];
        $des = 'disabled';

        return view("docentes", compact('docenteUsuarios', 'docenteUsuario', 'accion', 'txtbtn', 'des', 'docentes'));
    }

    /**
     * Muestra el formulario para editar un docente-usuario.
     */
    public function edit(docente_usuario $docenteUsuario)
    {
        $docentes = Personal::all();
        $docenteUsuarios = docente_usuario::paginate(5);
        $accion = 'E';
        $txtbtn = 'Actualizar';
        $des = '';

        return view("docentes", compact('docenteUsuarios', 'docenteUsuario', 'accion', 'txtbtn', 'des', 'docentes'));
    }

    /**
     * Actualiza un registro de docente-usuario específico.
     */
    public function update(Request $request, docente_usuario $docenteUsuario)
    {
        $val = $request->validate($this->val);
        $docenteUsuario->update($val);

        return redirect()->route('docentes')->with("mensaje", 'El usuario del docente se actualizó correctamente.');
    }

    /**
     * Elimina un registro de docente-usuario.
     */
    public function destroy(docente_usuario $docenteUsuario)
    {
        $docenteUsuario->delete();

        return redirect()->route('docentes')->with("mensaje", 'El usuario del docente se eliminó correctamente.');
    }
}
