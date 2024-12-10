<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\admin_usuario;
 
class AdminUsuarioController extends Controller
{
    public $validationRules;

    public function __construct()
    {
        $this->validationRules = [
            'username' => ['required', 'string', 'max:255', 'unique:admin_usuarios'],
            'password' => ['required']
          
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminUsuarios = admin_usuario::paginate(5); // Paginación para lista de administradores
        return view('inicio2', compact('adminUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminUsuario = new admin_usuario;
        $accion = 'C';
        $txtbtn = 'Guardar';
        $des = '';
        return view('inicio2', compact('adminUsuario', 'accion', 'txtbtn', 'des'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules);

        // Encriptar la contraseña antes de almacenarla
        $validatedData['password'] = bcrypt($validatedData['password']);

        admin_usuario::create($validatedData);

        return redirect()->route('inicio2')->with('mensaje', 'Administrador registrado correctamente.');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(admin_usuario $adminUsuario)
    {
        $accion = 'D';
        $txtbtn = 'Confirmar eliminación';
        $des = 'disabled';
        return view('inicio2', compact('adminUsuario', 'accion', 'txtbtn', 'des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin_usuario $adminUsuario)
    {
        $accion = 'E';
        $txtbtn = 'Actualizar';
        $des = '';
        return view('inicio2', compact('adminUsuario', 'accion', 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_usuario $adminUsuario)
    {
        $rules = $this->validationRules;

        // Permitir el mismo username y email si no han cambiado
        $rules['username'] = ['required', 'string', 'max:255', 'unique:admin_usuarios,username,' . $adminUsuario->id];
     

        $validatedData = $request->validate($rules);

        // Actualizar contraseña solo si se proporciona una nueva
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $adminUsuario->update($validatedData);

        return redirect()->route('inicio2')->with('mensaje', 'Administrador actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin_usuario $adminUsuario)
    {
        $adminUsuario->delete();

        return redirect()->route('inicio2')->with('mensaje', 'Administrador eliminado correctamente.');
    }
}
