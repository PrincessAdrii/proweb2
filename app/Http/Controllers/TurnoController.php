<?php

namespace App\Http\Controllers;

use App\Models\turno;
use App\Models\Alumno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'fecha' => 'required',
            'hora' => 'required',
           
            'noctrl' => 'required',
            
        ];
    }

    public function index()
    {
        $turnos = Turno::paginate(5);
        return view('Turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $turnos = Turno::paginate(5); 
        $turno = new Turno();
        $alumnos = Alumno::all();
    
        $accion = 'C';
        $txtbtn = 'Guardar';
        $des = '';
    
        // Recibir el número de control del alumno (si está disponible)
        $noctrl = $request->get('noctrl', null);
    
        return view("Turnos/form", compact("turnos", "turno", "accion", "txtbtn", "des", "alumnos", "noctrl"));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $val = $request->validate($this->val);
    
    //     try {
    //         // Generar un ID único para el turno
    //         $val['idTurno'] = fake()->bothify("?????");
    
    //         // Intentar crear el turno
    //         Turno::create($val);
    
    //         // Si todo es correcto, redirigimos con un mensaje de éxito
    //         return redirect()->route('Alumnos.index')->with("mensaje", 'Turno asignado correctamente.');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         // Si el código de error es 23000, es un conflicto de clave única
    //         if ($e->getCode() == 23000) {
    //             return redirect()->back()
    //                              ->with('error', 'Horario ocupado, elija otro.')
    //                              ->withInput();  // Retorna con los datos ingresados para corrección
    //         }
    
    //         // Para cualquier otro error, lo capturamos aquí
    //         return redirect()->back()
    //                          ->with('error', 'Ocurrió un error al guardar el turno.')
    //                          ->withInput();
    //     }
    // }
    
    public function store(Request $request)
    {
        $val = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required', 
         
            'noctrl' => 'required',
        ]);
    
        // Verificar si ya existe un turno con la misma fecha y hora
        $turnoExistente = Turno::where('fecha', $val['fecha'])
                               ->where('hora', $val['hora'])
                               ->first();
    
        if ($turnoExistente) {
            return redirect()->back()
                             ->with('error', 'El turno ya está ocupado. Por favor, elija otra fecha u hora.')
                             ->withInput();
        }
    
        try {
            // Generar un ID único para el turno
            $val['idTurno'] = fake()->bothify("?????");
    
            // Crear el turno
            Turno::create($val);
    
            // Si todo es correcto, redirigir con mensaje de éxito
            return redirect()->route('admin.index')->with("mensaje", 'Turno asignado correctamente.');
        } catch (\Exception $e) {
            // Capturar cualquier error adicional
            return redirect()->back()
                             ->with('error', 'Ocurrió un error al guardar el turno.')
                             ->withInput();
        }
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        $turnos=Turno::Paginate(5);
            $accion='D';
            $txtbtn='confirmar la eliminacion';
        
            
            $des='disabled';
            return view("Turnos.form",compact('turnos','turno','accion','txtbtn','des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idTurno)
{
    $turno = Turno::find($idTurno);

    if (!$turno) {
        abort(404, "Turno con idTurno {$idTurno} no encontrado.");
    }

    $turnos = Turno::paginate(5);
    $accion = 'E';
    $txtbtn = 'actualizar';
    $des = '';
    return view("Turnos.form", compact('turnos', 'turno', 'accion', 'txtbtn', 'des'));
}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $idTurno)
{
    // Recupera el turno por el idTurno
    $turno = Turno::find($idTurno);

    if (!$turno) {
        // Si no se encuentra el turno, aborta con un mensaje de error
        return redirect()->route('Alumnos.index')->with('error', 'Turno no encontrado.');
    }

    // Valida los datos recibidos
    $val = $request->validate([
        'noctrl' => 'required',
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'inscripcion' => 'required|string|max:255',
    ]);

    // Actualiza el turno con los nuevos datos
    $turno->update($val);

    // Redirige a la vista principal con un mensaje de éxito
    return redirect()->route('Alumnos.index')->with('mensaje', 'Turno actualizado correctamente.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turno $turno)
    {
        //
    }
}
