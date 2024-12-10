<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteAuthController extends Controller
{
    /**
     * Inicio de sesión para docentes.
     */
    public function inicios(Request $request)
    {
        $idPersonal = $request->input('idPersonal');
        $nip = $request->input('nip');

        // Consulta la tabla docente_usuarios
        $user = DB::table('docente_usuarios')
            ->where('idPersonal', $idPersonal)
            ->where('nip', $nip)
            ->first();

        if ($user) {
            // Consulta los datos del docente desde la tabla personals
            $docente = DB::table('personals')
                ->where('idPersonal', $user->idPersonal)
                ->first();

            // Guardar los datos del usuario y docente en la sesión
            session([
                'user' => $user,
                'docente' => $docente, // Contiene nombre y otros datos
            ]);

            return redirect()->route('inicioDocente');

        }
 
        // Credenciales incorrectas
        return back()->withErrors(['inicios' => 'ID de Personal o NIP incorrectos']);
    }

    /**
     * Cerrar sesión de docente.
     */
    public function cerrar()
    {
        // Cerrar sesión
        session()->forget('user');
        session()->forget('docente');
        return redirect('/inicio');
    }

    
    
    public function registro(Request $request)
{
    // Validación de los datos
    $validated = $request->validate([
        'idPersonal' => 'required|unique:docente_usuarios,idPersonal', // Evita duplicados en docente_usuarios
        'nip' => 'required|min:4',
    ]);

    // Limpia cualquier sesión existente
    session()->forget('user');
    session()->forget('docente');

    // Inserta en la tabla docente_usuarios
    DB::table('docente_usuarios')->insert([
        'idPersonal' => $validated['idPersonal'],
        'nip' => $validated['nip'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Obtiene el registro recién insertado
    $user = DB::table('docente_usuarios')->where('idPersonal', $validated['idPersonal'])->first();

    // Verifica si existe un docente en la tabla personals con el idPersonal
    $docente = DB::table('personals')->where('idPersonal', $user->idPersonal)->first();

    if (!$docente) {
        return back()->withErrors(['docente' => 'No se encontró información del docente con el ID proporcionado.']);
    }

    // Guarda al usuario y al docente en la sesión
    session([
        'user' => $user,
        'docente' => $docente,
    ]);

    // Redirige al inicio del docente con éxito
    return redirect('/inicioDocente')->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
}

}
