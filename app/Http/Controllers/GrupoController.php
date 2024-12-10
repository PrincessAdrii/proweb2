<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Personal;
use App\Models\Lugar;
use App\Models\Periodo;
use App\Models\Materia;
use App\Models\Depto;
use App\Models\Edificio;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public $val;
    public function __construct(){
        $this->val=[  
        'grupo'=> ['required'],
        'maxAlumnos' =>['required','max:5'],
        'descripcion' =>['required'],
        'idPeriodo' =>['required'],
        'idMateria' =>['required'],
        // 'idPersonal' =>['nullable'],
        'idPersonal'       => ['nullable', 'exists:personals,idPersonal'],
        ];
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::paginate(5);
        $grupo=new Grupo;
    
        $periodos = Periodo::orderBy('periodo', 'asc')->get();
        $materias=Materia::all();
        $carreras=Carrera::all();
        $personales=Personal::all();
        $lugares = Lugar::orderByRaw("CAST(SUBSTRING_INDEX(nombreLugar, ' ', -1) AS UNSIGNED) ASC")->get();

        $edificios=Edificio::all();
        $deptos=Depto::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Grupos/frm",compact("grupos",'grupo',"accion",'txtbtn','des', 'periodos','materias','carreras','personales',
    'lugares','deptos','edificios'));
    }

    public function create()
    {
        $grupos= Grupo::paginate(5); 
        $grupo=new Grupo;
    
        $periodos=Periodo::all();
        $materias=Materia::all();
        $carreras=Carrera::all();
        $personales=Personal::all();
        $lugares=Lugar::all();
        $edificios=Edificio::all();
        $deptos=Depto::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Grupos.frm",compact("grupos",'grupo',"accion",'txtbtn','des', 'periodos','materias','carreras','personales',
    'lugares','deptos','edificios'));
    }

    public function store(Request $request)
{
    // Validar los datos del grupo y horarios
    $validatedData = $request->validate([
        'grupo' => 'required|string|max:5',
        'fecha' => 'required|date',
        'descripcion' => 'nullable|string|max:200',
        'maxAlumnos' => 'nullable|integer',
        'idPeriodo' => 'required|string|exists:periodos,idPeriodo',
        'idMateria' => 'required|string|exists:materias,idMateria',
        'idPersonal' => 'nullable|string|exists:personals,idPersonal',
        'horarios' => 'nullable|array', // Ahora opcional, requerido si se ingresa 'idPersonal'
        'horarios.*' => 'string', // Cada horario en el array debe ser un string "dia,hora"
        'idLugar' => 'nullable|string|exists:lugars,idLugar', // Opcional, depende de 'horarios'
    ]);

    // Buscar si el grupo ya existe
    $grupo = Grupo::where('grupo', $validatedData['grupo'])->first();

    if ($grupo) {
        // Si el grupo ya existe, lo actualizamos
        $grupo->update([
            'descripcion' => $validatedData['descripcion'],
            'fecha' => $validatedData['fecha'],
            'maxAlumnos' => $validatedData['maxAlumnos'],
            'idPeriodo' => $validatedData['idPeriodo'],
            'idMateria' => $validatedData['idMateria'],
            'idPersonal' => $validatedData['idPersonal'] ?? null,
        ]);
        $message = 'Grupo actualizado con éxito.';
    } else {
        // Si el grupo no existe, lo creamos
        $grupo = Grupo::create([
            'idGrupo' => fake()->bothify("####"),
            'grupo' => $validatedData['grupo'],
            'fecha' => $validatedData['fecha'],
            'descripcion' => $validatedData['descripcion'],
            'maxAlumnos' => $validatedData['maxAlumnos'],
            'idPeriodo' => $validatedData['idPeriodo'],
            'idMateria' => $validatedData['idMateria'],
            'idPersonal' => $validatedData['idPersonal'] ?? null,
        ]);
        $message = 'Grupo creado con éxito.';
    }

    // Crear o actualizar los registros de horarios asociados al grupo si existen horarios
    if (!empty($validatedData['horarios']) && !empty($validatedData['idLugar'])) {
        foreach ($validatedData['horarios'] as $horario) {
            [$dia, $hora] = explode(',', $horario);

            // Verificar si el horario ya existe
            $existingHorario = GrupoHorario::where('idGrupo', $grupo->idGrupo)
                                           ->where('dia', $dia)
                                           ->where('hora', $hora)
                                           ->first();

            if (!$existingHorario) {
                // Crear nuevo horario si no existe
                GrupoHorario::create([
                    'idHorarios' => fake()->bothify("####"),
                    'dia' => $dia,
                    'hora' => $hora,
                    'idGrupo' => $grupo->idGrupo,
                    'idLugar' => $validatedData['idLugar'], 
                ]);
            }
        }
    }

    // Redirigir con un mensaje de éxito y pasar los datos del grupo para el formulario
    return back()->with('success', $message)->with('grupo', $grupo);
}



    
    /**
     * Display the specified resource.
     */
    public function show($idGrupo)
{
    $grupo = Grupo::with(['periodo', 'materia', 'personal'])->findOrFail($idGrupo); // Cargar relaciones necesarias
    $grupos = Grupo::paginate(5); // Lista de grupos para mostrar en la vista
    
    $accion = 'D'; // Acción para identificar que es vista/detalle
    $txtbtn = 'Confirmar la eliminación'; // Texto del botón
    $des = 'disabled'; // Deshabilitar campos para solo vista
    
    return view("Grupos.frm", compact(
        'grupos', 
        'grupo', 
        'accion', 
        'txtbtn', 
        'des'
    ));
}


    /**
     * Show the frm for editing the specified resource.
     */
    public function edit($idGrupo)
    {
        $grupo = Grupo::findOrFail($idGrupo); // Buscar el grupo por su ID
        $grupos = Grupo::paginate(5); // Paginar los grupos
    
        // Cargar los datos necesarios para el formulario
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $materias = Materia::all();
        $personales = Personal::all();
        $lugares = Lugar::all();
        $deptos = Depto::all();
        $edificios = Edificio::all(); // Si también se necesitan edificios
    
        $accion = 'E'; // Acción para identificar edición
        $txtbtn = 'Actualizar'; // Texto del botón
        $des = ''; // Texto adicional si se necesita
    
        // Pasar los datos necesarios a la vista
        return view("Grupos.frm", compact(
            "grupos", 
            "grupo", 
            "accion", 
            "txtbtn", 
            "des", 
            "periodos", 
            "carreras", 
            "materias", 
            "personales", 
            "lugares", 
            "deptos", 
            "edificios"
        ));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idGrupo)
    {
        $validatedData = $request->validate([
            'grupo' => 'required|string|max:5',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string|max:200',
            'maxAlumnos' => 'nullable|integer',
            'idPeriodo' => 'required|exists:periodos,idPeriodo',
            'idMateria' => 'required|exists:materias,idMateria',
            'idPersonal' => 'nullable|exists:personals,idPersonal',
        ]);
    
        $grupo = Grupo::findOrFail($idGrupo);
    
        $grupo->update($validatedData);
    
        return redirect()->route('Grupos.index')->with('success', 'Grupo actualizado con éxito.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
