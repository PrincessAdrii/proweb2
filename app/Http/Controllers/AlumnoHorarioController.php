<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Alumno;
use Barryvdh\DomPDF;
use App\Models\Periodo;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;
use App\Models\AlumnoHorario;
use Illuminate\Support\Facades\DB;

class AlumnoHorarioController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'noctrl'        =>['required','min:8'],
            'idHorarios'    =>['required'],
        ];
    }
    
    public function index()
    {
        $alumnoHorarios= AlumnoHorario::paginate(5);
        return view("AlumnoHorarios.index",compact("alumnoHorarios"));
    }

    public function create()
    {
        $alumnoHorarios= AlumnoHorario::paginate(5); 
        $alumnoHorario=new AlumnoHorario;
        $alumnos=Alumno::all();
        $grupohorarios=GrupoHorario::with([
            'grupo.materia.reticula.carrera' 
        ])->get();
        $grupohorariosperi=GrupoHorario::with([
            'grupo.periodo' 
        ])->get();
        $grupohorariospers=GrupoHorario::with([
            'grupo.personal' 
        ])->get();
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("AlumnoHorarios/form",compact("alumnoHorarios",'alumnoHorario',"accion",'txtbtn','des','alumnos','grupohorarios','grupohorariosperi','grupohorariospers'));
    }

    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        AlumnoHorario::create($val);
        return redirect()->route('AlumnoHorarios.index')->with("mensaje",'se inserto correctamente.');
    }
    
    public function show(AlumnoHorario $alumnoHorario)
    {
        $alumnoHorarios=AlumnoHorario::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $alumnos= [Alumno::find($alumnoHorario->noctrl)];
        $grupohorarios= GrupoHorario::with([
            'grupo.materia.reticula.carrera'
        ])->where('idHorarios', $alumnoHorario->idHorarios)->get();
        $grupohorariosperi= GrupoHorario::with([
            'grupo.periodo'
        ])->where('idHorarios', $alumnoHorario->idHorarios)->get();
        $grupohorariospers= GrupoHorario::with([
            'grupo.personal'
        ])->where('idHorarios', $alumnoHorario->idHorarios)->get();
        $des='disabled';
        return view("AlumnoHorarios.form",compact('alumnoHorarios','alumnoHorario','accion','txtbtn','des','alumnos','grupohorarios','grupohorariosperi','grupohorariospers'));
    }

    public function edit(AlumnoHorario $alumnoHorario)
    {
        $alumnos = Alumno::all();
        $grupohorarios=GrupoHorario::with([
            'grupo.materia.reticula.carrera' 
        ])->get();
        $grupohorariosperi=GrupoHorario::with([
            'grupo.periodo' 
        ])->get();
        $grupohorariospers=GrupoHorario::with([
            'grupo.personal' 
        ])->get();
        $alumnoHorarios = AlumnoHorario::paginate(5);
        
        $accion = 'E';
        $txtbtn = 'actualizar';
        $des = '';

        return view("AlumnoHorarios.form", compact('alumnoHorarios', 'alumnoHorario', 'accion', 'txtbtn', 'des','alumnos','grupohorarios','grupohorariosperi','grupohorariospers'));
    }

    public function update(Request $request, AlumnoHorario $alumnoHorario)
    {
        $val= $request->validate($this->val);
        $alumnoHorario->update($val);
        return redirect()->route('AlumnoHorarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlumnoHorario $alumnoHorario)
    {
        $alumnoHorario->delete();
        return redirect()->route('AlumnoHorarios.index');
    }

    public function periodoAct(){
        $noctrl = session('alumno')->noctrl;
        $idCarrera = session('alumno')->idCarrera;
        
        $periodos = DB::table('periodos')
        ->where('fechaIni', '<=', DB::raw('CURDATE()'))
        ->where('fechaFin', '>=', DB::raw('CURDATE()'))
        ->select(
            'periodos.idPeriodo',
            'periodos.periodo',
        )
        ->distinct()
        ->paginate(10);

        $semestreActual = DB::table('alumnos')
        ->where('noctrl', '=', $noctrl)
        ->select(
            'semestreActual',
        )
        ->distinct()
        ->paginate(10);

        $materiasCursadas = DB::table('materias')
        ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
        ->leftJoin('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
        ->leftJoin('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
        ->leftJoin('alumnos_clases', 'grupos.idGrupo', '=', 'alumnos_clases.idGrupo')
        ->where('carreras.idCarrera', $idCarrera)
        ->where('noctrl', $noctrl)
        ->select('materias.nombreMateria')
        ->groupBy('materias.nombreMateria');

        $materiasNoCursadas = DB::table('materias')
        ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
        ->whereNotIn('materias.nombreMateria', $materiasCursadas)
        ->where('carreras.idCarrera', $idCarrera)
        ->select(
            'materias.idMateria as id_materias_no_cursadas',
            'materias.nombreMateria as materias_no_cursadas',
            'materias.semestre as semestre_materias_no_cursadas'
        )
        ->get();

        // Subconsulta externa que filtra las materias no cursadas
        $materiasNoCursadas2 = DB::table('materias')
        ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
        // Se agregaron 2 inner join
        ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
        ->join('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
        // ********************
        ->whereNotIn('materias.nombreMateria', $materiasCursadas)
        ->where('carreras.idCarrera', $idCarrera)
        ->select(
            'materias.idMateria as id_materias_no_cursadas',
            'materias.nombreMateria as materias_no_cursadas',
            'materias.semestre as semestre_materias_no_cursadas'
        )
        // Se agregó distinct
        ->distinct()
        // **********************
        ->get();

        $materiasCursadasConDetalles = DB::table('materias')
        ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
        ->leftJoin('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
        ->leftJoin('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
        ->leftJoin('alumnos_clases', 'grupos.idGrupo', '=', 'alumnos_clases.idGrupo')
        ->where('carreras.idCarrera', $idCarrera)
        ->where('noctrl', $noctrl)
        ->select(
            'alumnos_clases.idClases as id_alumnos_clases_cursadas',
            'materias.idMateria as id_materias_cursadas',
            'materias.nombreMateria as materias_cursadas',
            'alumnos_clases.calificacion',
            'alumnos_clases.noctrl',
            'materias.semestre as semestre_materias_cursadas'
        )
        ->orderBy('alumnos_clases.idClases', 'DESC')
        ->distinct()
        // ->limit(1)
        ->get();

        return view('horarioalumno', compact('periodos', 'materiasNoCursadas', 'materiasNoCursadas2', 'materiasCursadasConDetalles', 'semestreActual'));
    }

    public function insert(Request $request){
        $noctrl = session('alumno')->noctrl;
        $idGrupoGM1R = $request->input('gruposrgm1', []);
        $idGrupoGM2R = $request->input('gruposrgm2', []);
        $idGrupoGM1C = $request->input('gruposcgm1', []);
        $idGrupoGM2C = $request->input('gruposcgm2', []);

        $idGrupoGV1R = $request->input('gruposrgv1', []);
        $idGrupoGV2R = $request->input('gruposrgv2', []);
        $idGrupoGV1C = $request->input('gruposcgv1', []);
        $idGrupoGV2C = $request->input('gruposcgv2', []);
        
        // dd($noctrl);
        function generateRandomString($length = 10) {
            return bin2hex(random_bytes($length)); // Genera una cadena aleatoria de $length bytes, y la convierte en hexadecimal
        }

        if (!empty($idGrupoGM1R)) {
            foreach ($idGrupoGM1R as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGM1R = collect(); 
        }

        if (!empty($idGrupoGM2R)) {
            foreach ($idGrupoGM2R as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGM2R = collect(); 
        }

        if (!empty($idGrupoGM1C)) {
            foreach ($idGrupoGM1C as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGM1C = collect(); 
        }

        if (!empty($idGrupoGM2C)) {
            foreach ($idGrupoGM2C as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');
                
                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGM2C = collect(); 
        }

        if (!empty($idGrupoGV1R)) {
            foreach ($idGrupoGV1R as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGV1R = collect(); 
        }

        if (!empty($idGrupoGV2R)) {
            foreach ($idGrupoGV2R as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGV2R = collect(); 
        }

        if (!empty($idGrupoGV1C)) {
            foreach ($idGrupoGV1C as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGV1C = collect(); 
        }

        if (!empty($idGrupoGV2C)) {
            foreach ($idGrupoGV2C as $idGrupo) {
                $id = DB::table('grupo_horarios')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'idHorarios'
                )
                ->pluck('idHorarios');

                $semestres = DB::table('grupos')
                ->join('materias', 'materias.idMateria', '=', 'grupos.idMateria')
                ->where('idGrupo', '=', $idGrupo)
                ->select(
                    'semestre'
                )
                ->pluck('semestre'); 
                    // dd($semestres);
                foreach ($semestres as $semestre) {
                    if ($semestre == 'Semestre 1') {
                        $s = 1;
                    }
                    if ($semestre == 'Semestre 2') {
                        $s = 2;
                    }
                    if ($semestre == 'Semestre 3') {
                        $s = 3;
                    }
                    if ($semestre == 'Semestre 4') {
                        $s = 4;
                    }
                    if ($semestre == 'Semestre 5') {
                        $s = 5;
                    }
                    if ($semestre == 'Semestre 6') {
                        $s = 6;
                    }
                    if ($semestre == 'Semestre 7') {
                        $s = 7;
                    }
                    if ($semestre == 'Semestre 8') {
                        $s = 8;
                    }
                    if ($semestre == 'Semestre 9') {
                        $s = 9;
                    }

                    foreach ($id as $idHorario) {
                        DB::table('alumno_horarios')->insert([
                            'semestre' => $s,
                            'idHorarios' => $idHorario,
                            'noctrl' => $noctrl,
                            'created_at' => DB::raw('NOW()'),
                            'updated_at' => DB::raw('NOW()')
                        ]);
                    }
                }
                
                // Generar un idClases aleatorio
                $idClases = generateRandomString(10);
                
                // Verificar si el idClases ya existe en la tabla
                while (DB::table('alumnos_clases')->where('idClases', $idClases)->exists()) {
                    // Si existe, generar un nuevo idClases
                    $idClases = generateRandomString(10);
                }

                DB::table('alumnos_clases')->insert([
                    'idClases' => $idClases,
                    'calificacion' => NULL,
                    'noctrl' => $noctrl,
                    'idGrupo' => $idGrupo,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        } else {
            $idGrupoGV2C = collect(); 
        }

        return view('inserthorario');
    }

    public function showMaterias(Request $request)
    {
        $noctrl = session('alumno')->noctrl;
        $materiasSeleccionadas = $request->input('materias', []);
        if (!empty($materiasSeleccionadas)) {
            // $gruposrep = DB::table('materias')
            // ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
            // ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            // ->join('alumnos_clases', 'grupos.idGrupo', '=', 'alumnos_clases.idGrupo')
            // ->join('alumnos', 'alumnos_clases.noctrl', '=', 'alumnos.noctrl')
            // ->whereIn('materias.idMateria', $materiasSeleccionadas) 
            // ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            // ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            // ->where('alumnos.noctrl', '=', $noctrl)
            // ->where('calificacion', '=', function ($query) use ($noctrl) {
            //     $query->selectRaw('MAX(calificacion)')
            //           ->from('alumnos_clases as ac')
            //           ->join('grupos as g', 'ac.idGrupo', '=', 'g.idGrupo')
            //           ->whereRaw('g.idMateria = materias.idMateria')
            //           ->where('ac.noctrl', '=', $noctrl);
            // })
            // ->select(
            //     'nombreMateria',
            //     'alumnos_clases.idClases',
            //     'calificacion',
            //     'materias.idMateria',
            //     'grupo',
            //     'grupos.idGrupo',
            //     'periodos.idPeriodo',
            //     )
            // ->orderBy('alumnos_clases.idClases', 'DESC')
            // ->paginate(10);

            $gr = DB::table('materias')
            ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->join('alumnos_clases', 'grupos.idGrupo', '=', 'alumnos_clases.idGrupo')
            ->join('alumnos', 'alumnos_clases.noctrl', '=', 'alumnos.noctrl')
            ->whereIn('materias.idMateria', $materiasSeleccionadas) 
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            ->where('alumnos.noctrl', '=', $noctrl)
            ->where('calificacion', '=', function ($query) use ($noctrl) {
                $query->selectRaw('MAX(calificacion)')
                      ->from('alumnos_clases as ac')
                      ->join('grupos as g', 'ac.idGrupo', '=', 'g.idGrupo')
                      ->whereRaw('g.idMateria = materias.idMateria')
                      ->where('ac.noctrl', '=', $noctrl);
            })
            ->select(
                'materias.idMateria' // Solo necesitamos el idMateria para filtrar
            )
            ->distinct() // Evita duplicados
            ->get()
            ->pluck('idMateria');

            $gr2 = DB::table('materias')
            ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->join('alumnos_clases', 'grupos.idGrupo', '=', 'alumnos_clases.idGrupo')
            ->join('alumnos', 'alumnos_clases.noctrl', '=', 'alumnos.noctrl')
            ->whereIn('materias.idMateria', $materiasSeleccionadas) 
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            ->where('alumnos.noctrl', '=', $noctrl)
            ->where('calificacion', '=', function ($query) use ($noctrl) {
                $query->selectRaw('MAX(calificacion)')
                      ->from('alumnos_clases as ac')
                      ->join('grupos as g', 'ac.idGrupo', '=', 'g.idGrupo')
                      ->whereRaw('g.idMateria = materias.idMateria')
                      ->where('ac.noctrl', '=', $noctrl);
            })
            ->select(
                'materias.nombreMateria' // Solo necesitamos el idMateria para filtrar
            )
            ->distinct() // Evita duplicados
            ->get()
            ->pluck('nombreMateria');

            $grupos = DB::table('materias')
            ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->join('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
            ->whereIn('materias.idMateria', $materiasSeleccionadas) 
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            ->whereNotIn('materias.idMateria', $gr)
            ->select(
                'nombreMateria',
                'materias.idMateria',
                'grupo',
                'grupos.idGrupo',
                'periodos.idPeriodo',
                )
            ->distinct()
            ->paginate(10);

            $grupos2 = DB::table('materias')
            ->join('grupos', 'materias.idMateria', '=', 'grupos.idMateria')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->join('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
            ->whereIn('materias.idMateria', $materiasSeleccionadas) 
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            // ->whereNotIn('grupos.grupo', $gr2)
            ->whereIn('materias.nombreMateria', $gr2)
            ->select(
                'nombreMateria',
                'materias.idMateria',
                'grupo',
                'grupos.idGrupo',
                'periodos.idPeriodo',
                )
            ->distinct()
            ->paginate(10);
            // dd($grupos2);
        } else {
            $grupos = collect(); 
            $grupos2 = collect(); 
        }
        return view('vergrupos', compact('materiasSeleccionadas','grupos2','grupos'));
    }

    public function showHorarioGrupo(Request $request)
    {
        $periodos = DB::table('periodos')
        ->where('fechaIni', '<=', DB::raw('CURDATE()'))
        ->where('fechaFin', '>=', DB::raw('CURDATE()'))
        ->select(
            'periodos.idPeriodo',
            // 'periodos.periodo',
        )
        ->distinct()
        ->paginate(10);

        $periodo = $request->input('idPeriodo');

        $idMateria = $request->input('idMateria');
        $grupo = $request->input('grupo');

        // dd($periodo);
        // dd($grupo);
        $grupoHorarios = DB::table('grupos')
        ->join('grupo_horarios', 'grupos.idGrupo', '=', 'grupo_horarios.idGrupo')
        ->join('lugars', 'grupo_horarios.idLugar', '=', 'lugars.idLugar')
        ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
        ->join('materias', 'grupos.idMateria', '=', 'materias.idMateria')
        ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
        ->where('grupos.grupo', '=', $grupo)
        ->where('materias.idMateria', '=', $idMateria)
        ->where('periodos.idPeriodo', '=', $periodo)
        ->select(
            'grupos.idGrupo',
            'grupos.grupo',
            'materias.nombreMateria',
            'periodos.idPeriodo',
            'periodos.periodo',
            // 'personals.nombre AS personal_nombre',
            // 'personals.apellidoP AS personal_apellidoP',
            // 'personals.apellidoM AS personal_apellidoM',
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_horas"),
            
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_lugar"),

            DB::raw("IFNULL(personals.nombre, 'Sin docente asignado') as personal_nombre"),
            DB::raw("IFNULL(personals.apellidoP, '') as personal_apellidoP"),
            DB::raw("IFNULL(personals.apellidoM, '') as personal_apellidoM")
        )
        ->groupBy(
            'grupos.idGrupo',
            'grupos.grupo',
            'materias.nombreMateria',
            'periodos.idPeriodo',
            'periodos.periodo',
            'personals.nombre',
            'personals.apellidoP',
            'personals.apellidoM'
        )
        ->paginate(10);

        return view('verhorariogrupo', compact('grupoHorarios','periodos'));
    }
    
    public function showAlumnoHorario()
    {
        $noctrl = session('alumno')->noctrl;
        $periodos = DB::table('alumno_horarios')
        ->join('alumnos', 'alumno_horarios.noctrl', '=', 'alumnos.noctrl')
        ->join('grupo_horarios', 'alumno_horarios.idHorarios', '=', 'grupo_horarios.idHorarios')
        ->join('grupos', 'grupo_horarios.idGrupo', '=', 'grupos.idGrupo')
        ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
        ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
        ->where('alumno_horarios.noctrl', '=', $noctrl)
        ->select(
            'periodos.idPeriodo',
            'periodos.periodo',
        )
        ->distinct()
        ->paginate(10);
        return view('verhorarioalumno', compact('periodos'));
    }

    public function verHorarioAlumno(Request $request)
    {
        $noctrl = session('alumno')->noctrl;
        $idPeriodo = $request->input('periodo');
        
        $alumnoHorarios = DB::table('alumno_horarios')
        ->join('alumnos', 'alumno_horarios.noctrl', '=', 'alumnos.noctrl')
        ->join('grupo_horarios', 'alumno_horarios.idHorarios', '=', 'grupo_horarios.idHorarios')
        ->join('grupos', 'grupo_horarios.idGrupo', '=', 'grupos.idGrupo')
        ->join('lugars', 'grupo_horarios.idLugar', '=', 'lugars.idLugar')
        ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
        ->join('materias', 'grupos.idMateria', '=', 'materias.idMateria')
        ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
        ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
        ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
        ->where('alumnos.noctrl', '=', $noctrl)
        ->where('periodos.idPeriodo', '=', $idPeriodo)
        ->select(
            'alumnos.noctrl',
            'alumnos.nombre',
            'alumnos.apellidoP',
            'alumnos.apellidoM',
            'periodos.periodo',
            'carreras.nombreCarrera',
            'reticulas.descripcion',
            'materias.idMateria',
            'materias.nombreMateria',
            // 'personals.nombre AS personal_nombre',
            // 'personals.apellidoP AS personal_apellidoP',
            // 'personals.apellidoM AS personal_apellidoM',
            'grupos.grupo',
            'materias.creditos',
            'alumno_horarios.semestre',
            // Concatenación de horarios y lugares por día
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_horas"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_horas"),
            
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_lugar"),
            DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_lugar"),

            DB::raw("IFNULL(personals.nombre, 'Sin docente asignado') as personal_nombre"),
            DB::raw("IFNULL(personals.apellidoP, '') as personal_apellidoP"),
            DB::raw("IFNULL(personals.apellidoM, '') as personal_apellidoM")
        )
        ->groupBy(
            'alumnos.noctrl',
            'alumnos.nombre',
            'alumnos.apellidoP',
            'alumnos.apellidoM',
            'periodos.periodo',
            'carreras.nombreCarrera',
            'reticulas.descripcion',
            'materias.idMateria',
            'materias.nombreMateria',
            'personals.nombre',
            'personals.apellidoP',
            'personals.apellidoM',
            'grupos.grupo',
            'materias.creditos',
            'alumno_horarios.semestre'
        )
        ->paginate(10);

        $periodos = DB::table('alumno_horarios')
        ->join('grupo_horarios', 'alumno_horarios.idHorarios', '=', 'grupo_horarios.idHorarios')
        ->join('grupos', 'grupo_horarios.idGrupo', '=', 'grupos.idGrupo')
        ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
        ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
        ->where('alumno_horarios.noctrl', '=', $noctrl)
        ->select(
            'periodos.idPeriodo',
            'periodos.periodo',
        )
        ->distinct()
        ->paginate(10);

        return view('verhorarioalumno', compact('periodos', 'alumnoHorarios', 'idPeriodo'));
    }

    public function pdf(Request $request)
    {
        $noctrl = session('alumno')->noctrl;
        $periodos = DB::table('periodos')
            ->where('fechaIni', '<=', DB::raw('CURDATE()'))
            ->where('fechaFin', '>=', DB::raw('CURDATE()'))
            ->select('idPeriodo', 'periodo')
            ->get();

        return view('pdf', compact('periodos'));
    }

    public function descargarHorarioAlumno(Request $request)
    {
        $noctrl = session('alumno')->noctrl;
        $idPeriodo = $request->input('periodo');

        // Obtener los horarios del alumno
        $alumnoHorarios = DB::table('alumno_horarios')
            ->join('alumnos', 'alumno_horarios.noctrl', '=', 'alumnos.noctrl')
            ->join('grupo_horarios', 'alumno_horarios.idHorarios', '=', 'grupo_horarios.idHorarios')
            ->join('grupos', 'grupo_horarios.idGrupo', '=', 'grupos.idGrupo')
            ->join('lugars', 'grupo_horarios.idLugar', '=', 'lugars.idLugar')
            ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
            ->join('materias', 'grupos.idMateria', '=', 'materias.idMateria')
            ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
            ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
            ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
            ->where('alumnos.noctrl', '=', $noctrl)
            ->where('periodos.idPeriodo', '=', $idPeriodo)
            ->select(
                'alumnos.noctrl',
                'alumnos.nombre',
                'alumnos.apellidoP',
                'alumnos.apellidoM',
                'periodos.periodo',
                'carreras.nombreCarrera',
                'reticulas.descripcion',
                'materias.idMateria',
                'materias.nombreMateria',
                'grupos.grupo',
                'materias.creditos',
                DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN CONCAT(grupo_horarios.hora, ' - ', grupo_horarios.hora+1, ' / ', lugars.nombreCorto) END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes"),
                DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN CONCAT(grupo_horarios.hora, ' - ', grupo_horarios.hora+1, ' / ', lugars.nombreCorto) END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes"),
                DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN CONCAT(grupo_horarios.hora, ' - ', grupo_horarios.hora+1, ' / ', lugars.nombreCorto) END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles"),
                DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN CONCAT(grupo_horarios.hora, ' - ', grupo_horarios.hora+1, ' / ', lugars.nombreCorto) END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves"),
                DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN CONCAT(grupo_horarios.hora, ' - ', grupo_horarios.hora+1, ' / ', lugars.nombreCorto) END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes"),
                
                DB::raw("IFNULL(personals.nombre, 'Sin docente asignado') as personal_nombre"),
                DB::raw("IFNULL(personals.apellidoP, '') as personal_apellidoP"),
                DB::raw("IFNULL(personals.apellidoM, '') as personal_apellidoM")
            )
            ->groupBy(
                'alumnos.noctrl',
                'alumnos.nombre',
                'alumnos.apellidoP',
                'alumnos.apellidoM',
                'periodos.periodo',
                'personals.nombre',
                'personals.apellidoP',
                'personals.apellidoM',
                'carreras.nombreCarrera',
                'reticulas.descripcion',
                'materias.idMateria',
                'materias.nombreMateria',
                'grupos.grupo',
                'materias.creditos'
            )
            ->get();

        // Verifica si no hay datos
        if ($alumnoHorarios->isEmpty()) {
            return redirect()->back()->with('error', 'No hay horarios disponibles para el período seleccionado.');
        }

        // Generar el PDF
        $pdf = PDF::loadView('pdf', compact('alumnoHorarios'));
        return $pdf->download('horarioalumno.pdf');
    }

    // public function descargarHorarioAlumno(Request $request)
    // {
    //     $noctrl = session('alumno')->noctrl;
    //     $idPeriodo = $request->input('periodo');

    //     // Obtener los horarios del alumno
    //     $alumnoHorarios = DB::table('alumno_horarios')
    //     ->join('alumnos', 'alumno_horarios.noctrl', '=', 'alumnos.noctrl')
    //     ->join('grupo_horarios', 'alumno_horarios.idHorarios', '=', 'grupo_horarios.idHorarios')
    //     ->join('grupos', 'grupo_horarios.idGrupo', '=', 'grupos.idGrupo')
    //     ->join('lugars', 'grupo_horarios.idLugar', '=', 'lugars.idLugar')
    //     ->join('periodos', 'grupos.idPeriodo', '=', 'periodos.idPeriodo')
    //     ->join('materias', 'grupos.idMateria', '=', 'materias.idMateria')
    //     ->join('reticulas', 'materias.idReticula', '=', 'reticulas.idReticula')
    //     ->join('carreras', 'reticulas.idCarrera', '=', 'carreras.idCarrera')
    //     ->leftJoin('personals', 'grupos.idPersonal', '=', 'personals.idPersonal')
    //     ->where('alumnos.noctrl', '=', $noctrl)
    //     ->where('periodos.idPeriodo', '=', $idPeriodo)
    //     ->select(
    //         'alumnos.noctrl',
    //         'alumnos.nombre',
    //         'alumnos.apellidoP',
    //         'alumnos.apellidoM',
    //         'periodos.periodo',
    //         'carreras.nombreCarrera',
    //         'reticulas.descripcion',
    //         'materias.idMateria',
    //         'materias.nombreMateria',
    //         // 'personals.nombre AS personal_nombre',
    //         // 'personals.apellidoP AS personal_apellidoP',
    //         // 'personals.apellidoM AS personal_apellidoM',
    //         'grupos.grupo',
    //         'materias.creditos',
    //         'alumno_horarios.semestre',
    //         // Concatenación de horarios y lugares por día
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_horas"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_horas"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_horas"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_horas"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN grupo_horarios.hora END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_horas"),
            
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Lunes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS lunes_lugar"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Martes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS martes_lugar"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Miércoles' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS miercoles_lugar"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Jueves' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS jueves_lugar"),
    //         DB::raw("GROUP_CONCAT(DISTINCT CASE WHEN grupo_horarios.dia = 'Viernes' THEN lugars.nombreCorto END ORDER BY grupo_horarios.hora SEPARATOR ', ') AS viernes_lugar"),

    //         DB::raw("IFNULL(personals.nombre, 'Sin docente asignado') as personal_nombre"),
    //         DB::raw("IFNULL(personals.apellidoP, '') as personal_apellidoP"),
    //         DB::raw("IFNULL(personals.apellidoM, '') as personal_apellidoM")
    //     )
    //     ->groupBy(
    //         'alumnos.noctrl',
    //         'alumnos.nombre',
    //         'alumnos.apellidoP',
    //         'alumnos.apellidoM',
    //         'periodos.periodo',
    //         'carreras.nombreCarrera',
    //         'reticulas.descripcion',
    //         'materias.idMateria',
    //         'materias.nombreMateria',
    //         'personals.nombre',
    //         'personals.apellidoP',
    //         'personals.apellidoM',
    //         'grupos.grupo',
    //         'materias.creditos',
    //         'alumno_horarios.semestre'
    //     )
    //     ->get();

    //     // Verifica si no hay datos
    //     if ($alumnoHorarios->isEmpty()) {
    //         return redirect()->back()->with('error', 'No hay horarios disponibles para el periodo seleccionado.');
    //     }

    //     // Generar el PDF
    //     $pdf = PDF::loadView('pdf', compact('alumnoHorarios'));
    //     return $pdf->download('horarioalumno.pdf');
    // }
}
