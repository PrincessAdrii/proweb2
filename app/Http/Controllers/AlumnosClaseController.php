<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\alumnos_clase;
use App\Models\AlumnosClase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlumnosClaseController extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'noctrl'    => ['required', 'string', 'min:8', 'max:8'],
            'idGrupo'   => ['required', 'string', 'min:1'],
            'calificacion' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    /**
     * Muestra todos los grupos.
     */
    public function index()
    {
        // Obtener el docente autenticado desde la sesión
        $docente = session('docente');
    
        if (!$docente) {
            return redirect('/inicios')->withErrors(['error' => 'Debe iniciar sesión']);
        }
    
        // Filtrar los grupos asignados al docente
        $grupos = Grupo::where('idPersonal', $docente->idPersonal)->get();
    
        // Pasar los datos del docente y los grupos a la vista
        return view('docentes', compact('grupos', 'docente'));
    }
    
    /**
     * Devuelve los alumnos de un grupo específico.
     */
    public function getAlumnos($idGrupo)
    {
        $idPersonal = session('docente')->idPersonal;
    
        // Verificar que el grupo pertenece al docente autenticado
        $grupo = Grupo::where('idGrupo', $idGrupo)
                      ->where('idPersonal', $idPersonal)
                      ->with('alumnosClases.alumno')
                      ->first();
    
        if (!$grupo) {
            return response()->json(['error' => 'El grupo seleccionado no está asignado a este docente'], 403);
        }
    
        // Determinar si todos los alumnos tienen calificación
        $alumnos = $grupo->alumnosClases;
        $todosCalificados = $alumnos->every(fn($alumnoClase) => $alumnoClase->calificacion !== null);
    
        return response()->json([
            'grupo' => $grupo->grupo,
            'alumnos' => $alumnos->map(function ($alumnoClase) {
                return [
                    'id' => $alumnoClase->idClases,
                    'noctrl' => $alumnoClase->noctrl,
                    'nombre' => $alumnoClase->alumno->nombre ?? 'Sin Nombre',
                    'calificacion' => $alumnoClase->calificacion,
                ];
            }),
            'todosCalificados' => $todosCalificados, // Indicador si todos están calificados
        ]);
    }
    



    /**
     * Actualiza las calificaciones de los alumnos en el grupo.
     */
    public function update(Request $request, $idGrupo)
    {
        try {
            // Validar datos
            $request->validate([
                'calificaciones.*' => 'required|numeric|min:0|max:100',
            ]);
            

            // Guardar las calificaciones
            foreach ($request->calificaciones as $id => $calificacion) {
                $alumnoClase = alumnos_clase::findOrFail($id);
                $alumnoClase->calificacion = $calificacion;
                $alumnoClase->save();
            }

            return redirect()->route('docentes.index')->with('success', 'Calificaciones guardadas correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar calificaciones: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Error al guardar las calificaciones.']);
        }
    }

    


    /**
     * Guarda las calificaciones de los alumnos en el grupo (AJAX).
     */
    public function guardarCalificaciones(Request $request, $idGrupo)
{
    try {
        $request->validate([
            'calificaciones' => 'required|array',
            'calificaciones.*' => 'numeric|min:0|max:100',
        ]);

        foreach ($request->calificaciones as $id => $calificacion) {
            $alumnoClase = alumnos_clase::findOrFail($id);
            $alumnoClase->calificacion = $calificacion;
            $alumnoClase->save();
        }

        // Retorna un JSON válido
        return response()->json([
            'success' => true,
            'message' => 'Calificaciones guardadas correctamente.',
        ]);
    } catch (\Exception $e) {
        Log::error('Error al guardar calificaciones:', ['error' => $e->getMessage()]);

        // Manejo del error con un JSON válido
        return response()->json([
            'success' => false,
            'message' => 'Ocurrió un error al guardar las calificaciones.',
        ], 500);
    }
}

    
     
     
     
     
     
    
}
