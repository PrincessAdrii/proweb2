<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'noctrl'    =>['required','min:8'],
            'nombre'    =>['required','min:3'],
            'apellidoP' =>['required'],
            'apellidoM' =>['required'],
            'sexo'      =>['required'],
            'email' =>['required'],
          
            'idCarrera'      =>['required'],

        ];
    }

    // public function index()
    // {
        
    //     $alumnos= Alumno::all(); 
    //     $alumno=new Alumno;
    //     $carreras=Carrera::all();
    //     $turnos = Turno::paginate(3);

    //     $accion='C';
    //     $txtbtn='Guardar';
    //     $des='';
    //     return view("Alumnos2/index",compact("alumnos",'alumno',"accion",'txtbtn','des','carreras','turnos'));
    // }

    // public function index()
    // {
    //     if (session()->has('alumno')) {
    //         $alumno = session('alumno');
    
    //         // Verificar si el usuario de alumno contiene números
    //         if (preg_match('/\d/', $alumno->noctrl)) {
    //             // Redirigir a la página específica si contiene números
    //             $turno = Turno::all();
    //             return view('Alumnos2/inicioAlumnos', compact('alumno', 'turno'));
    //         } else {
    //             // Redirigir a otra página o manejar el caso donde no tiene números
    //             return redirect('/otraPagina')->withErrors(['error' => 'Usuario no válido para esta sección']);
    //         }
    //     }
    //     // Verificar si el usuario está autenticado
    //     if (session()->has('admin')) {
    //         // Obtener el administrador desde la sesión
    //         $admin = session('admin');
    
    //         // Obtener los datos necesarios para los administradores
    //         $alumnos = Alumno::all();
    //         $alumno = new Alumno;
    //         $carreras = Carrera::all();
    //         $turnos = Turno::paginate(3);
    
    //         $accion = 'C';
    //         $txtbtn = 'Guardar';
    //         $des = '';
    
    //         // Redirigir a la vista para administradores
    //         return view('Alumnos2/index', compact('alumnos', 'alumno', 'carreras', 'turnos', 'admin', 'accion', 'txtbtn', 'des'));
    //     }
    
       
    
    //     // Si no está autenticado, redirigir a la página de login
    //     return redirect('/inicio');
    // }


    public function index()
    {
        $alumno = session('alumno');
    
        if ($alumno) {
            // Consultar nuevamente los datos del alumno y su turno
            $alumno = Alumno::with('turno')->where('noctrl', $alumno->noctrl)->first();
    
            // Actualizar la sesión con los datos más recientes
            $turno = $alumno->turno()->orderBy('created_at', 'desc')->first();
            session(['alumno' => $alumno, 'turno' => $turno]);
    
            // Obtener todos los turnos disponibles (si necesitas mostrarlos)
            $turnos = Turno::all();
    
            return view('Alumnos2/inicioAlumnos', compact('alumno', 'turnos','turno'));
        }
    
        // Si no hay alumno válido en la sesión, redirigir al inicio
        return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para acceder a esta sección.']);
    }
    
    

// Método para la vista del administrador
public function index2()
{
    $admin = session('admin');

    // Obtener los datos necesarios para los administradores
    $alumnos = Alumno::all();
    $alumno = new Alumno;
    $carreras = Carrera::all();
    $turnos = Turno::paginate(3);

    $accion = 'C';
    $txtbtn = 'Guardar';
    $des = '';

    // Redirigir a la vista para administradores
    return view('Alumnos2/index', compact('alumnos', 'alumno', 'carreras', 'turnos', 'admin', 'accion', 'txtbtn', 'des'));
}

// Método para la vista del alumno

 

    public function create()
    {
        $alumnos= Alumno::paginate(3); 
        $alumno=new Alumno;
        $carreras=Carrera::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Alumnos2/form",compact("alumnos",'alumno',"accion",'txtbtn','des','carreras'));
    }

   
    public function store(Request $request)
{
    $accion = 'C';
    $txtbtn = 'Guardar';
    $des = '';
    $carreras = Carrera::all();
    $alumnos = Alumno::paginate(5);
    

    // Validar y crear el alumno
    $validated = $request->validate($this->val);
    $alumno = Alumno::create($validated);

    // Redirigir al formulario de turnos para asignar un horario de inscripción
    return redirect()->route('Turnos.create', ['noctrl' => $alumno->noctrl]);
}

    


 
    public function show(Alumno $alumno)
    {
        $alumnos=Alumno::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $carreras= [Carrera::find($alumno->idCarrera)];
       
        $des='disabled';
        return view("Alumnos2.form",compact('alumnos','alumno','accion','txtbtn','des','carreras'));
    }

  
    // public function edit(Alumno $alumno)
    // {   
    //     // Obtener todas las carreras para mostrarlas en el dropdown
    //     $carreras = Carrera::all();
    //     $alumnos = Alumno::paginate(5);
    //     $turnos = Turno::all();
    //     $accion = 'E';
    //     $txtbtn = 'actualizar';
    //     $des = 'readonly';
    //     $turnos = Turno::paginate(3);
    //     $turno = new Turno();

    //     return view("Alumnos2.form", compact('alumnos', 'alumno', 'accion', 'txtbtn', 'des', 'carreras','turnos','turno'));
    // }

    // public function edit(Alumno $alumno)
    // {
    //     // Obtener todas las carreras para el dropdown
    //     $carreras = Carrera::all();
    //     $alumnos = Alumno::all();
    //     // Obtener los turnos paginados
    //     $turnos = Turno::paginate(3);
    
    //     // Obtener el turno asociado al alumno (si existe)
    //     $turno = $alumno->turno ?? new Turno();
    
    //     // Variables para la vista
    //     $accion = 'E';
    //     $txtbtn = 'Actualizar';
    //     $des = 'readonly';
    
    //     return view("Alumnos2.form", compact('alumno','alumnos', 'carreras', 'turnos', 'turno', 'accion', 'txtbtn', 'des'));
    // }

   // Método para que el alumno edite su propia información
public function edit(Alumno $alumno)
{
    // Verificar si hay una sesión activa para un alumno
    if (session()->has('alumno')) {
        $carreras = Carrera::all();
        $accion = 'E';
        $txtbtn = 'Actualizar';
        $des = 'readonly';

        // Redirigir a la vista específica para el alumno
        return view("/Alumnos2/formAlum", compact('alumno', 'accion', 'txtbtn', 'des', 'carreras'));
    }

    // Si no hay sesión activa, redirigir al inicio con un error
    return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para acceder a esta página.']);
}

// Método para que el administrador edite la información de un alumno
public function edit2(Alumno $alumno)
{
    // Verificar si hay una sesión activa para un administrador
    if (session()->has('admin')) {
        $carreras = Carrera::all();
        $alumnos = Alumno::all();
        $turnos = Turno::paginate(3);

        // Obtener el turno asociado al alumno (si existe)
        $turno = $alumno->turno ?? new Turno();

        // Variables para la vista
        $accion = 'E';
        $txtbtn = 'Actualizar';
        $des = 'readonly';

        // Redirigir a la vista específica para el administrador
        return view("Alumnos2.form", compact('alumno', 'alumnos', 'carreras', 'turnos', 'turno', 'accion', 'txtbtn', 'des'));
    }

    // Si no hay sesión activa, redirigir al inicio con un error
    return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para acceder a esta página.']);
}


  // Método para que el alumno actualice su información

// Método para que el administrador actualice la información del alumno y el turno
public function update2(Request $request, Alumno $alumno)
{
    // Verificar si hay sesión activa para un administrador
    if (session()->has('admin')) {
        // Validar los datos del alumno
        $dataAlumno = $request->validate([
            'nombre' => 'required|max:50',
            'apellidoP' => 'required|max:50',
            'apellidoM' => 'required|max:50',
            'email' => 'required|email|max:50',
            'sexo' => 'required|in:M,F',
            'semestreActual' => 'required',
            'idCarrera' => 'required|exists:carreras,idCarrera',
        ]);

        // Validar los datos del turno
        $dataTurno = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'inscripcion' => 'required|string|max:50',
            'noctrl' => 'required',
        ]);

        // Actualizar los datos del alumno
        $alumno->update($dataAlumno);

        // Buscar el turno asociado al alumno
        $turno = Turno::where('noctrl', $alumno->noctrl)->first();

        if ($turno) {
            // Verificar si la combinación de fecha y hora ya existe
            $turnoExistente = Turno::where('fecha', $dataTurno['fecha'])
                ->where('hora', $dataTurno['hora'])
                ->where('idTurno', '!=', $turno->idTurno)
                ->first();

            if ($turnoExistente) {
                return redirect()
                    ->back()
                    ->with('error', 'La combinación de fecha y hora ya está asignada a otro turno. Elija otra.')
                    ->withInput();
            }

            // Actualizar el turno existente
            $turno->update($dataTurno);

            return redirect()
                ->route('admin.index') // Redirigir a la vista del administrador
                ->with('mensaje', 'Alumno y turno actualizados correctamente.');
        }

        return redirect()
            ->route('admin.index')
            ->with('error', 'No se encontró un turno asignado para este alumno.');
    }

    // Si no hay sesión activa para un administrador, redirigir al inicio de sesión
    return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para realizar esta acción.']);
}

public function update(Request $request)
{
   

    // Verificar si hay sesión activa para un alumno
    if (session()->has('alumno')) {
        $alumnoSesion = session('alumno'); // Recupera el objeto o atributo de la sesión

        // Verifica si $alumnoSesion es un objeto o un atributo directamente
        $noctrl = is_object($alumnoSesion) ? $alumnoSesion->noctrl : $alumnoSesion;

        // Obtener al alumno desde la base de datos
        $alumno = Alumno::where('noctrl', $noctrl)->first();

       
        // Validar los datos del formulario
        $dataAlumno = $request->validate([
            'nombre' => 'required|max:50',
            'apellidoP' => 'required|max:50',
            'apellidoM' => 'required|max:50',
            'email' => 'required|email|max:50',
            'sexo' => 'required|in:M,F',
            'semestreActual' => 'required',
            'idCarrera' => 'required|exists:carreras,idCarrera',
        ]);

        // Actualizar los datos del alumno
        $alumno->update($dataAlumno);

        return redirect()
            ->route('Alumnos.index') // Redirigir a la vista del alumno
            ->with('mensaje', 'Datos actualizados correctamente.');
    }

    // Si no hay sesión activa para un alumno, redirigir al inicio de sesión
    return redirect('/inicio')->withErrors(['error' => 'No tienes permisos para realizar esta acción.']);
}



    // public function update(Request $request, Alumno $alumno)
    // {   
       
    //     $val= $request->validate($this->val);
    //     $alumno->update($val);
    //     return redirect()->route('Alumnos.index');
    // }
    // public function update(Request $request, Alumno $alumno)
    // {
    //     // Verifica si llega correctamente el alumno
    //     Log::info('Actualizando alumno:', $alumno->toArray());
    
    //     // Validar datos del alumno
    //     $dataAlumno = $request->validate([
    //         'nombre' => 'required|max:50',
    //         'apellidoP' => 'required|max:50',
    //         'apellidoM' => 'required|max:50',
    //         'email' => 'required|email|max:50',
    //         'sexo' => 'required|in:M,F',
    //         'semestreActual' => 'required',
    //         'idCarrera' => 'required|exists:carreras,idCarrera',
    //     ]);
    
    //     // Validar datos del turno
    //     $dataTurno = $request->validate([
    //         'fecha' => 'required|date',
    //         'hora' => 'required|date_format:H:i',
    //         'inscripcion' => 'required|string|max:50',
    //         'noctrl' => 'required',
    //     ]);
    
    //     // Actualiza los datos del alumno
    //     $alumno->update($dataAlumno);
    
    //     // Buscar el turno asociado al alumno
    //     $turno = Turno::where('noctrl', $alumno->noctrl)->first();
    
    //     if ($turno) {
    //         // Verificar si la combinación de fecha y hora ya existe en otro turno
    //         $turnoExistente = Turno::where('fecha', $dataTurno['fecha'])
    //                                ->where('hora', $dataTurno['hora'])
    //                                ->where('idTurno', '!=', $turno->idTurno) // Excluir el turno actual
    //                                ->first();
    
    //         if ($turnoExistente) {
    //             return redirect()->back()
    //                              ->with('error', 'La combinación de fecha y hora ya está asignada a otro turno. Por favor, elija otra.')
    //                              ->withInput(); // Mantener los datos ingresados
    //         }
    
    //         // Actualizar el turno existente
    //         $turno->update($dataTurno);
    
    //         return redirect()->route('Alumnos.index')
    //                          ->with('mensaje', 'Alumno y turno actualizados correctamente.');
    //     } else {
    //         return redirect()->route('Alumnos.index')
    //                          ->with('error', 'No se encontró un turno asignado para este alumno.');
    //     }
    // }
    // -------------------------Ultimo metodo usado------------------------------
    // public function update(Request $request, Alumno $alumno)
    // {
    //     // Verifica si hay sesión activa
    //     if (session()->has('user')) {
    //         // Si hay sesión activa, solo actualizar los datos del alumno
    //         $dataAlumno = $request->validate([
    //             'nombre' => 'required|max:50',
    //             'apellidoP' => 'required|max:50',
    //             'apellidoM' => 'required|max:50',
    //             'email' => 'required|email|max:50',
    //             'sexo' => 'required|in:M,F',
    //             'semestreActual' => 'required',
    //             'idCarrera' => 'required|exists:carreras,idCarrera',
    //         ]);
    
    //         // Actualiza los datos del alumno
    //         $alumno->update($dataAlumno);
    
    //         return redirect()->route('/Alumnos2/inicioAlumnos') // Redirigir a la vista de inicio de alumnos
    //                          ->with('mensaje', 'Datos del alumno actualizados correctamente.');
    //     }
    
    //     // Si no hay sesión activa, realizar la funcionalidad completa
    //     // Validar datos del alumno
    //     $dataAlumno = $request->validate([
    //         'nombre' => 'required|max:50',
    //         'apellidoP' => 'required|max:50',
    //         'apellidoM' => 'required|max:50',
    //         'email' => 'required|email|max:50',
    //         'sexo' => 'required|in:M,F',
    //         'semestreActual' => 'required',
    //         'idCarrera' => 'required|exists:carreras,idCarrera',
    //     ]);
    
    //     // Validar datos del turno
    //     $dataTurno = $request->validate([
    //         'fecha' => 'required|date',
    //         'hora' => 'required|date_format:H:i',
    //         'inscripcion' => 'required|string|max:50',
    //         'noctrl' => 'required',
    //     ]);
    
    //     // Actualiza los datos del alumno
    //     $alumno->update($dataAlumno);
    
    //     // Buscar el turno asociado al alumno
    //     $turno = Turno::where('noctrl', $alumno->noctrl)->first();
    
    //     if ($turno) {
    //         // Verificar si la combinación de fecha y hora ya existe en otro turno
    //         $turnoExistente = Turno::where('fecha', $dataTurno['fecha'])
    //                                ->where('hora', $dataTurno['hora'])
    //                                ->where('idTurno', '!=', $turno->idTurno) // Excluir el turno actual
    //                                ->first();
    
    //         if ($turnoExistente) {
    //             return redirect()->back()
    //                              ->with('error', 'La combinación de fecha y hora ya está asignada a otro turno. Por favor, elija otra.')
    //                              ->withInput(); // Mantener los datos ingresados
    //         }
    
    //         // Actualizar el turno existente
    //         $turno->update($dataTurno);
    
    //         return redirect()->route('admin.index')
    //                          ->with('mensaje', 'Alumno y turno actualizados correctamente.');
    //     } else {
    //         return redirect()->route('admin.index')
    //                          ->with('error', 'No se encontró un turno asignado para este alumno.');
    //     }
    // }
    
 
   
    public function destroy(Alumno $alumno)
{
    $alumno->delete();
    return redirect()->route('Alumnos.index');
}



}
