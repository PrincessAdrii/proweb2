<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ORIGINAL DE EMMA
    // public function iniciosA(Request $request)
    // {
    //     $noctrl = $request->input('noctrl');
    //     $nip = $request->input('nip');
    
    //     // Consulta la tabla AlumnoUsuario
    //     $user = DB::table('alumno_usuarios')->where('noctrl', $noctrl)->where('nip', $nip)->first();
    
    //     if ($user) {
    //         // Obtener los datos del alumno
    //         $alumno = DB::table('alumnos')
    //             ->where('noctrl', $user->noctrl)
    //             ->first();
            
    //         // Obtener el turno del alumno
    //         $turno = DB::table('turnos')
    //             ->where('noctrl', $user->noctrl)
    //             ->orderBy('created_at', 'desc') // Ordenar por created_at
    //             ->first();
    
    //         // Guardar los datos del usuario, alumno y turno en la sesión
    //         session([
    //             'user' => $user,
    //             'alumno' => $alumno, // Contiene los datos del alumno
    //             'turno' => $turno,
    //         ]);
            
    //         // Redirigir a la página del alumno
    //         return redirect('/inicioAlumno');
    //     }
    
    //     // Credenciales incorrectas
    //     return back()->withErrors(['iniciosA' => 'Número de control o NIP incorrectos']);
    // }

    public function iniciosA(Request $request)
{
    $noctrl = $request->input('noctrl');
    $nip = $request->input('nip');

    // Consulta la tabla AlumnoUsuario
    $user = DB::table('alumno_usuarios')->where('noctrl', $noctrl)->where('nip', $nip)->first();

    if ($user) {
        // Obtener los datos del alumno
        $alumno = DB::table('alumnos')->where('noctrl', $user->noctrl)->first();

        // Verificar si el alumno tiene un pago asociado
        $pago = DB::table('pagos')->where('noctrl', $user->noctrl)->exists();

        if (!$pago) {
            // Si no tiene un pago, redirigir con mensaje de error
            return redirect('/Alumnos2/sinPago')->withErrors(['error' => 'No tienes permisos para acceder a esta sección.']);
        }

        // Obtener el turno del alumno
        $turno = DB::table('turnos')
            ->where('noctrl', $user->noctrl)
            ->orderBy('created_at', 'desc') // Ordenar por created_at
            ->first();

        $horario = DB::table('alumnos_clases')
            ->join('grupos', 'alumnos_clases.idGrupo', '=', 'grupos.idGrupo')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->where('noctrl', $user->noctrl)
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            ->orderBy('alumnos_clases.updated_at', 'desc') // Ordenar por created_at
            ->first();

        // Guardar los datos del usuario, alumno y turno en la sesión
        session([
            'user' => $user,
            'alumno' => $alumno,
            'turno' => $turno,
            'horario' => $horario,
        ]);

        // Redirigir a la página del alumno
        return redirect('/inicioAlumno');
    }

    // Credenciales incorrectas
    return back()->withErrors(['iniciosA' => 'Número de control o NIP incorrectos']);
}

    
    public function inicioAlumno()
    {
        // Recuperar el alumno y el turno desde la sesión
        $alumno = session('alumno');
        $turno = session('turno');
    
        if ($alumno) {
            // Pasar los datos del alumno y el turno a la vista
            return view('Alumnos2/inicioAlumnos', compact('alumno', 'turno'));
        }
    
        // Si no hay datos en la sesión, redirigir a la página de inicio
        return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para acceder a esta sección.']);
    }

    public function cerrarA()
    {
        // Cerrar sesión
        session()->forget('user');
        session()->forget('alumno');
        session()->forget('turno');
        return redirect('/menuAlumno');
    }

    public function registroA(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'noctrl' => 'required',
            'nip' => 'required'
        ]);

        // Insertar en la tabla AlumnoUsuario
        DB::table('alumno_usuarios')->insert([
            'noctrl' => $request->input('noctrl'),
            'nip' => $request->input('nip'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = DB::table('alumno_usuarios')->where('noctrl', $request->input('noctrl'))->first();
        $alumno = DB::table('alumnos')
                ->where('noctrl', $user->noctrl)
                ->first();
            $turno = DB::table('turnos')
                ->where('noctrl', $user->noctrl)
                ->orderBy('created_at', 'desc') // Ordenar por created_at
                ->first();

        // Guardar al usuario en la sesión
        session([
            'user' => $user,
            'alumno' => $alumno, // Contiene nombre y apellidos
            'turno' => $turno,
        ]);

        // Redirigir al login con mensaje de éxito
        return redirect('/inicioAlumno')->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
    }
}