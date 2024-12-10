<?php

use App\Models\PersonalPlaza;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReticulaController;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DocenteAuthController;
use App\Http\Controllers\AlumnosClaseController;
use App\Http\Controllers\AlumnoHorarioController;
use App\Http\Controllers\AlumnoUsuarioController;
use App\Http\Controllers\PersonalPlazaController;
use App\Http\Controllers\MateriasAbiertaController;

// Route::get('/', function () {
//     return view('welcome');
// });


//RUTAS DE KEREN
Route::get('/Turnos.index', [TurnoController::class, 'index'])->name('Turnos.index');
    Route::get('/Turnos.create', [TurnoController::class, 'create'])->name('Turnos.create');
    Route::post('/Turnos.store', [TurnoController::class, 'store'])->name('Turnos.store');
    Route::get('/Turnos.editar/{idTurno}', [TurnoController::class, 'edit'])->name('Turnos.editar');
    Route::get('/Turnos.ver/{idTurno}', [TurnoController::class, 'show'])->name('Turnos.ver');
    Route::post('/Turnos.eliminar/{idTurno}', [TurnoController::class, 'destroy'])->name('Turnos.eliminar');
    Route::post('/Turnos.update/{idTurno}', [TurnoController::class, 'update'])->name('Turnos.update');
    Route::post('/Turnos.update/{noctrl}', [TurnoController::class, 'update'])->name('Turnos2.update');
    Route::get('/turnos/search', [TurnoController::class, 'search'])->name('Turnos.search');
   
    Route::get('/Alumnos2/sinPago', function () {
        return view('/Alumnos2/sinPago'); // Vista del formulario de inicio de sesión
    })->name('/Alumnos2/sinPago');
    Route::get('/Alumnos2/logOut', function () {
        return view('/Alumnos2/logOut'); // Vista del formulario de inicio de sesión
    })->name('/Alumnos2/logOut');
    ///

    Route::get('Alumno2/inicioAlumnos', [AuthController::class, 'inicioAlumno'])->name('inicioAlumnos');


    Route::get('/Alumnos2.index', [AlumnoController::class, 'index'])->name('Alumnos.index');
    Route::get('/Alumnos2.form', [AlumnoController::class, 'index2'])->name('admin.index');

    Route::get('/Alumnos2.create', [AlumnoController::class, 'create'])->name('Alumnos.create');
    Route::post('/Alumnos2.store', [AlumnoController::class, 'store'])->name('Alumnos.store');

    Route::get('/Alumnos2.formAlum/{alumno}', [AlumnoController::class, 'edit'])->name('Alumnos.editar');
    Route::get('/Alumnos2.editar/{alumno}', [AlumnoController::class, 'edit2'])->name('admin.editar');

    Route::get('/Alumnos2.ver/{alumno}', [AlumnoController::class, 'show'])->name('Alumnos.ver');
    Route::post('/Alumnos2.eliminar/{alumno}', [AlumnoController::class, 'destroy'])->name('Alumnos.eliminar');

    Route::post('/Alumnos2.update/{alumno}', [AlumnoController::class, 'update'])->name('Alumnos.update');
    Route::post('/Alumnos2.form/{alumno}', [AlumnoController::class, 'update2'])->name('admin.update');
  




    Route::get('/Alumnos2/inicioAlumnos', function () {
        return view('/Alumnos2/inicioAlumnos'); // Vista del formulario de inicio de sesión
    })->name('/Alumnos2/inicioAlumnos');
    Route::get('/Alumnos2/formAlum', function () {
        return view('/Alumnos2/formAlum'); // Vista del formulario de inicio de sesión
    })->name('/Alumnos2/formAlum');
  
 

//RUTAS DE YESSICA Y KEREN->DOCUMENTACION

Route::get('/form/{noctrl}', [DocumentoController::class, 'create'])->name('documentos.create');
Route::post('/form/{noctrl}', [DocumentoController::class, 'store'])->name('documentos.store');

//RUTAS DE YESSICA -> PAGOS
Route::get('/pagos{noctrl}', [PagoController::class, 'create'])->name('pagos');

Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos/{noctrl}', [PagoController::class, 'edit'])->name('pagos.edit');
Route::post('/pagos.update/{noctrl}', [PagoController::class, 'update'])->name('pagos.update');

// INICIO
Route::get('/', function () {
    return view('inicio');
})->name("inicio");



Route::get('/ayuda',function (){
    return view('ayuda');
})->name('ayuda');

Route::get('/contactanos',function (){
    return view('contactanos');
})->name('contactanos');

Route::get('/inicios', function () {
    return view('inicios'); // Vista del formulario de inicio de sesión
})->name('inicios');

Route::get('/menuAlumno', function () {
    return view('menuAlumno'); // Vista del formulario de inicio de sesión
})->name('menuAlumno');

Route::get('/menuDocente', function () {
    return view('menuDocente'); // Vista del formulario de inicio de sesión
})->name('menuDocente');

Route::get('/menuAdmin', function () {
    return view('menuAdmin'); // Vista del formulario de inicio de sesión
})->name('menuAdmin');

Route::get('/docentes', function () {
    return view('docentes'); // Vista del formulario de inicio de sesión
})->name('docentes');

Route::get('/iniciosA', function () {
    return view('iniciosA'); // Vista del formulario de inicio de sesión
})->name('iniciosA');

Route::get('/registro', function () {
    return view('registro'); // Vista del formulario de registro
})->name('registro');

Route::get('/verhorarioalumno', function(){
    return view('verhorarioalumno');
})->name("verhorarioalumno");

Route::get('/registroA', function () {
    return view('registroA'); // Vista del formulario de registro
})->name('registroA');

Route::get('/registroAdmin', function () {
    return view('registroAdmin'); // Vista del formulario de registro
})->name('registroAdmin');

Route::get('/iniciosADMIN', function () {
    return view('iniciosADMIN');
})->name("iniciosADMIN");

Route::get('/inicioAlumno', function () {
    return view('inicioAlumno'); // Vista del formulario de inicio de sesión
})->name('inicioAlumno');

Route::get('/inicioDocente', function () {
    return view('inicioDocente'); // Vista del formulario de inicio de sesión
})->name('inicioDocente');
 
// Route::get('/menu3', function () {
//     return view('menu3');
// })->name('menu3');

// Route::get('/inserthorario', function () {
//     return view('inserthorario'); 
// })->name('inserthorario');
 
Route::get('/horarioalumno.pdf',function (){
    return view('pdf');
})->name('horarioalumno.pdf');

Route::get('/horarioalumno/pdf', [AlumnoHorarioController::class, 'descargarHorarioAlumno'])->name('horarioalumno.pdf');

Route::post('/inserthorario', [AlumnoHorarioController::class, 'insert'])->name('inserthorario.store');
Route::get('/inserthorario', function () {
    return view('inserthorario'); 
})->name('inserthorario.view');

// Procesar inicio de sesión del administrador
Route::post('/iniciosADMIN', [AdminAuthController::class, 'iniciosADMIN']);

Route::post('/cerrar', [AdminAuthController::class, 'cerrar']);
Route::post('/registroAdmin', [AdminAuthController::class, 'registroAdmin']);


Route::post('/inicios', [DocenteAuthController::class, 'inicios']);
Route::post('/cerrar', [DocenteAuthController::class, 'cerrar']);
Route::post('/registro', [DocenteAuthController::class, 'registro']);

 
Route::post('/iniciosA', [AuthController::class, 'iniciosA']);
Route::post('/cerrarA', [AuthController::class, 'cerrarA']);
Route::post('/registroA', [AuthController::class, 'registroA']);
Route::get('/verhorarioalumno', [AlumnoHorarioController::class, 'showAlumnoHorario'])->name('verhorarioalumno.show');
Route::post('/verhorarioalumno', [AlumnoHorarioController::class, 'verHorarioAlumno'])->name('verhorarioalumno');
// Route::post('/inserthorario', [AlumnoHorarioController::class, 'insert'])->name('inserthorario');
// Route::get('/inserthorario', [AlumnoHorarioController::class, 'alumnoHorario'])->name('inserthorario.show');


Route::get('/horarioalumno', [AlumnoHorarioController::class, 'periodoAct'])->name('horarioalumno');
Route::post('/vergrupos', [AlumnoHorarioController::class, 'showMaterias'])->name('vergrupos');
Route::post('/verhorariogrupo', [AlumnoHorarioController::class, 'showHorarioGrupo'])->name('verhorariogrupo');


Route::get('/form', [DocumentoController::class, 'create'])->name('form');

// Procesar los datos enviados desde el formulario




// INICIO 2
Route::get('/inicio2', function () {
    return view('inicio2');
})->name('dashboard');


    // CATALOGO 
    Route::get('/catalogo',function (){
        return view('catalogo');
    })->name('catalogo');


    
        Route::get('/periodo',function (){
            return view('periodo');
        })->name('periodo');

        Route::get('/carreras',function (){
            return view('carreras');
        })->name('carreras');

        Route::get('/plaza',function (){
            return view('plaza');
        })->middleware(['auth', 'verified'])->name('plaza');

        Route::get('/puesto',function (){
            return view('puesto');
        })->middleware(['auth', 'verified'])->name('puesto');

        Route::get('/depto',function (){
            return view('depto');
        })->middleware(['auth', 'verified'])->name('depto');        

        Route::get('/alumno',function (){
            return view('alumno');
        })->middleware(['auth', 'verified'])->name('alumno');

        
    //    
    Route::get('/Plazas.index', function(){
        return view('Plazas.index');
    })->middleware("auth")->name("Plazas.index");

    Route::get('/puestos.index', function(){
        return view('puestos.index');
    })->middleware("auth")->name("puestos.index");



    Route::get('/horarios',function (){
        return view('horarios');
    })->middleware(['auth', 'verified'])->name('horarios');

    Route::get('/proyectosInd',function (){
        return view('proyectosInd');
    })->middleware(['auth', 'verified'])->name('proyectosInd');
    //HORARIOS
        Route::get('/docentes',function (){
            return view('docentes');
        })->middleware(['auth', 'verified'])->name('docentes');

        Route::get('/AsignacionGrupos',function (){
            return view('AsignacionGrupos');
        })->middleware(['auth', 'verified'])->name('AsignacionGrupos');

        // Route::get('/alumnos',function (){
        //     return view('alumnos');
        // })->middleware(['auth', 'verified'])->name('Halumnos');
    //
    //PROYECTOS INDIVIDUALES
        Route::get('/capacitacion',function (){
            return view('capacitacion');
        })->middleware(['auth', 'verified'])->name('capacitacion');

        Route::get('/asesoria',function (){
            return view('asesoria');
        })->middleware(['auth', 'verified'])->name('asesoria');

        Route::get('/proyectos',function (){
            return view('proyectos');
        })->middleware(['auth', 'verified'])->name('proyectos');
        Route::get('/docentes',function (){
            return view('docentes');
        })->middleware(['auth', 'verified'])->name('docentes');
       

        Route::get('/seleccionar-grupo', function () {
            return view('seleccionarGrupo');
        })->name('seleccionarGrupo');
       


        // Rutas correctas para la funcionalidad de docentes
        Route::get('/docentes', [AlumnosClaseController::class, 'index'])->name('docentes.index'); // Lista grupos
Route::get('/docentes/{idGrupo}/alumnos', [AlumnosClaseController::class, 'getAlumnos'])->name('docentes.alumnos'); // Lista alumnos
Route::post('/docentes/{idGrupo}', [AlumnosClaseController::class, 'update'])->name('docentes.update'); // Guarda calificaciones
Route::post('/docentes/{idGrupo}', [AlumnosClaseController::class, 'guardarCalificaciones']);




Route::post('/validar-empalmes/{idGrupo?}', [GrupoController::class, 'validarEmpalmes']);

        Route::get('/materialD',function (){
            return view('materialD');
        })->middleware(['auth', 'verified'])->name('materialD');
        
        Route::get('/docencia',function (){
            return view('docencia');
        })->middleware(['auth', 'verified'])->name('docencia');

        Route::get('/asesoriaProy',function (){
            return view('asesoriaProy');
        })->middleware(['auth', 'verified'])->name('asesoriaProy');

        Route::get('/asesoriaSS',function (){
            return view('asesoriaSS');
        })->middleware(['auth', 'verified'])->name('asesoriaSS');
///////////////////////////////////////////    ALUMNOS      //////////////////////////////////////////////
        // Route::controller(AlumnoController::class)->group(function(){
        //     Route::get('/Alumnos2.index', [AlumnoController::class, 'index'])->name('Alumnos2.index');    // INDEX
                
        //     Route::get('/Alumnos2.create', [AlumnoController::class, 'create'])->name('Alumnos2.create'); // CREATE
        //     Route::post('/Alumnos2.store', [AlumnoController::class, 'store'])->name('Alumnos2.store');       
                
        //     Route::get('/Alumnos2.edit/{alumno}', [AlumnoController::class, 'edit'])->name('Alumnos2.edit');  // EDIT
        //     Route::get('/Alumnos2.show/{alumno}', [AlumnoController::class, 'show'])->name('Alumnos2.show');  // VER
                
        //     Route::post('/Alumnos2.destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('Alumnos2.destroy');// DESRTOY
        //     Route::post('/Alumnos2.update/{alumno}', [AlumnoController::class, 'update'])->name('Alumnos2.update');//UPDATE       
        // });


///////////////////////////////////////////    PLAZAS      //////////////////////////////////////////////
        Route::get('/Plazas.index', [PlazaController::class, 'index'])->name('Plazas.index');    // INDEX
    
        Route::get('/Plazas.create', [PlazaController::class, 'create'])->name('Plazas.create'); // CREATE
        Route::post('/Plazas.store', [PlazaController::class, 'store'])->name('Plazas.store');       
        Route::get('/Plazas.edit/{plaza}', [PlazaController::class, 'edit'])->name('Plazas.edit');       // EDIT
        Route::get('/Plazas.show/{plaza}', [PlazaController::class, 'show'])->name('Plazas.show');       // VER
            
        Route::post('/Plazas.destroy/{plaza}', [PlazaController::class, 'destroy'])->name('Plazas.destroy');// DESRTOY
        Route::post('/Plazas.update/{plaza}', [PlazaController::class, 'update'])->name('Plazas.update');//UPDATE

        ///////////////////////////////////////////    GRUPOS      //////////////////////////////////////////////
        Route::get('/Grupos.index', [GrupoController::class, 'index'])->name('Grupos.index');    // INDEX
    
        Route::get('/Grupos.create', [GrupoController::class, 'create'])->name('Grupos.create'); // CREATE
        Route::post('/Grupos.store', [GrupoController::class, 'store'])->name('Grupos.store');       
        Route::get('/Grupos.edit/{grupo}', [GrupoController::class, 'edit'])->name('Grupos.edit');       // EDIT
        Route::get('/Grupos.show/{grupo}', [GrupoController::class, 'show'])->name('Grupos.show');       // VER
            
        Route::post('/Grupos.destroy/{grupo}', [GrupoController::class, 'destroy'])->name('Grupos.destroy');// DESRTOY
        Route::post('/Grupos.update/{grupo}', [GrupoController::class, 'update'])->name('Grupos.update');//UPDATE
        


///////////////////////////////////////////    PUESTO      //////////////////////////////////////////////
        Route::get('/Puestos.index', [PuestoController::class, 'index'])->name('Puestos.index');    // INDEX
            
        Route::get('/Puestos.create', [PuestoController::class, 'create'])->name('Puestos.create'); // CREATE
        Route::post('/Puestos.store', [PuestoController::class, 'store'])->name('Puestos.store');       

        Route::get('/Puestos.edit/{puesto}', [PuestoController::class, 'edit'])->name('Puestos.edit');       // EDIT
        Route::get('/Puestos.show/{puesto}', [PuestoController::class, 'show'])->name('Puestos.show');       // VER

        Route::post('/Puestos.destroy/{puesto}', [PuestoController::class, 'destroy'])->name('Puestos.destroy');// DESRTOY
        Route::post('/Puestos.update/{puesto}', [PuestoController::class, 'update'])->name('Puestos.update');//UPDATE


///////////////////////////////////////////    DEPTOS      //////////////////////////////////////////////
        Route::get('/Deptos.index', [DeptoController::class, 'index'])->name('Deptos.index');    // INDEX
            
        Route::get('/Deptos.create', [DeptoController::class, 'create'])->name('Deptos.create'); // CREATE
        Route::post('/Deptos.store', [DeptoController::class, 'store'])->name('Deptos.store');       

        Route::get('/Deptos.edit/{depto}', [DeptoController::class, 'edit'])->name('Deptos.edit');       // EDIT
        Route::get('/Deptos.show/{depto}', [DeptoController::class, 'show'])->name('Deptos.show');       // VER

        Route::post('/Deptos.destroy/{depto}', [DeptoController::class, 'destroy'])->name('Deptos.destroy');// DESRTOY
        Route::post('/Deptos.update/{depto}', [DeptoController::class, 'update'])->name('Deptos.update');//UPDATE
        
///////////////////////////////////////////    Carreras      //////////////////////////////////////////////
        Route::get('/Carreras.index', [CarreraController::class, 'index'])->name('Carreras.index');    // INDEX
                    
        Route::get('/Carreras.create', [CarreraController::class, 'create'])->name('Carreras.create'); // CREATE
        Route::post('/Carreras.store', [CarreraController::class, 'store'])->name('Carreras.store');       

        Route::get('/Carreras.edit/{carrera}', [CarreraController::class, 'edit'])->name('Carreras.edit');       // EDIT
        Route::get('/Carreras.show/{carrera}', [CarreraController::class, 'show'])->name('Carreras.show');       // VER

        Route::post('/Carreras.destroy/{carrera}', [CarreraController::class, 'destroy'])->name('Carreras.destroy');// DESRTOY
        Route::post('/Carreras.update/{carrera}', [CarreraController::class, 'update'])->name('Carreras.update');//UPDATE

///////////////////////////////////////////    Periodos      //////////////////////////////////////////////
        Route::get('/Periodos.index', [PeriodoController::class, 'index'])->name('Periodos.index');    // INDEX

        Route::get('/Periodos.create', [PeriodoController::class, 'create'])->name('Periodos.create'); // CREATE
        Route::post('/Periodos.store', [PeriodoController::class, 'store'])->name('Periodos.store');       

        Route::get('/Periodos.edit/{periodo}', [PeriodoController::class, 'edit'])->name('Periodos.edit');       // EDIT
        Route::get('/Periodos.show/{periodo}', [PeriodoController::class, 'show'])->name('Periodos.show');       // VER

        Route::post('/Periodos.destroy/{periodo}', [PeriodoController::class, 'destroy'])->name('Periodos.destroy');// DESRTOY
        Route::post('/Periodos.update/{periodo}', [PeriodoController::class, 'update'])->name('Periodos.update');//UPDATE

///////////////////////////////////////////    Materias      //////////////////////////////////////////////
        Route::get('/Materias.index', [MateriaController::class, 'index'])->name('Materias.index');    // INDEX

        Route::get('/Materias.create', [MateriaController::class, 'create'])->name('Materias.create'); // CREATE
        Route::post('/Materias.store', [MateriaController::class, 'store'])->name('Materias.store');       

        Route::get('/Materias.edit/{materia}', [MateriaController::class, 'edit'])->name('Materias.edit');       // EDIT
        Route::get('/Materias.show/{materia}', [MateriaController::class, 'show'])->name('Materias.show');       // VER

        Route::post('/Materias.destroy/{materia}', [MateriaController::class, 'destroy'])->name('Materias.destroy');// DESRTOY
        Route::post('/Materias.update/{materia}', [MateriaController::class, 'update'])->name('Materias.update');//UPDATE

///////////////////////////////////////////    Reticulas      //////////////////////////////////////////////
        Route::get('/Reticulas.index', [ReticulaController::class, 'index'])->name('Reticulas.index');    // INDEX

        Route::get('/Reticulas.create', [ReticulaController::class, 'create'])->name('Reticulas.create'); // CREATE
        Route::post('/Reticulas.store', [ReticulaController::class, 'store'])->name('Reticulas.store');       

        Route::get('/Reticulas.edit/{reticula}', [ReticulaController::class, 'edit'])->name('Reticulas.edit');       // EDIT
        Route::get('/Reticulas.show/{reticula}', [ReticulaController::class, 'show'])->name('Reticulas.show');       // VER

        Route::post('/Reticulas.destroy/{reticula}', [ReticulaController::class, 'destroy'])->name('Reticulas.destroy');// DESRTOY
        Route::post('/Reticulas.update/{reticula}', [ReticulaController::class, 'update'])->name('Reticulas.update');//UPDATE
///////////////////////////////////////////    Personal      //////////////////////////////////////////////
Route::get('/Personal.index', [PersonalController::class, 'index'])->name('Personal.index');    // INDEX

Route::get('/Personal.create', [PersonalController::class, 'create'])->name('Personal.create'); // CREATE
Route::post('/Personal.store', [PersonalController::class, 'store'])->name('Personal.store');       

Route::get('/Personal.edit/{personal}', [PersonalController::class, 'edit'])->name('Personal.edit');       // EDIT
Route::get('/Personal.show/{personal}', [PersonalController::class, 'show'])->name('Personal.show');       // VER

Route::post('/Personal.destroy/{personal}', [PersonalController::class, 'destroy'])->name('Personal.destroy');// DESRTOY
Route::post('/Personal.update/{personal}', [PersonalController::class, 'update'])->name('Personal.update');//UPDATE

///////////////////////////////////////////    Personal PLAZAS     //////////////////////////////////////////////
Route::get('/PersonalPlazas.index', [PersonalPlazaController::class, 'index'])->name('PersonalPlazas.index');    // INDEX

Route::get('/PersonalPlazas.create', [PersonalPlazaController::class, 'create'])->name('PersonalPlazas.create'); // CREATE
Route::post('/PersonalPlazas.store', [PersonalPlazaController::class, 'store'])->name('PersonalPlazas.store');       

Route::get('/PersonalPlazas.edit/{personalPlaza}', [PersonalPlazaController::class, 'edit'])->name('PersonalPlazas.edit');       // EDIT
Route::get('/PersonalPlazas.show/{personalPlaza}', [PersonalPlazaController::class, 'show'])->name('PersonalPlazas.show');       // VER

Route::post('/PersonalPlazas.destroy/{personalPlaza}', [PersonalPlazaController::class, 'destroy'])->name('PersonalPlazas.destroy');// DESRTOY
Route::post('/PersonalPlazas.update/{personalPlaza}', [PersonalPlazaController::class, 'update'])->name('PersonalPlazas.update');//UPDATE

///////////////////////////////////////////    Edificio      //////////////////////////////////////////////
Route::get('/Edificios.index', [EdificioController::class, 'index'])->name('Edificios.index');    // INDEX

Route::get('/Edificios.create', [EdificioController::class, 'create'])->name('Edificios.create'); // CREATE
Route::post('/Edificios.store', [EdificioController::class, 'store'])->name('Edificios.store');       

Route::get('/Edificios.edit/{edificio}', [EdificioController::class, 'edit'])->name('Edificios.edit');       // EDIT
Route::get('/Edificios.show/{edificio}', [EdificioController::class, 'show'])->name('Edificios.show');       // VER

Route::post('/Edificios.destroy/{edificio}', [EdificioController::class, 'destroy'])->name('Edificios.destroy');// DESRTOY
Route::post('/Edificios.update/{edificio}', [EdificioController::class, 'update'])->name('Edificios.update');//UPDATE

///////////////////////////////////////////    LUGARES      //////////////////////////////////////////////
Route::get('/Lugares.index', [LugarController::class, 'index'])->name('Lugares.index');    // INDEX

Route::get('/Lugares.create', [LugarController::class, 'create'])->name('Lugares.create'); // CREATE
Route::post('/Lugares.store', [LugarController::class, 'store'])->name('Lugares.store');       

Route::get('/Lugares.edit/{lugar}', [LugarController::class, 'edit'])->name('Lugares.edit');       // EDIT
Route::get('/Lugares.show/{lugar}', [LugarController::class, 'show'])->name('Lugares.show');       // VER

Route::post('/Lugares.destroy/{lugar}', [LugarController::class, 'destroy'])->name('Lugares.destroy');// DESRTOY
Route::post('/Lugares.update/{lugar}', [LugarController::class, 'update'])->name('Lugares.update');//UPDATE


///////////////////////////////////////////    Materias abiertas     //////////////////////////////////////////////
Route::get('/MateriasA.index', [MateriaController::class, 'index'])->name('MateriasA.index');    // INDEX

Route::get('/MateriasA.create', [MateriaController::class, 'create'])->name('MateriasA.create'); // CREATE
Route::post('/MateriasA.store', [MateriaController::class, 'store'])->name('MateriasA.store');       

Route::get('/MateriasA.edit/{materia}', [MateriaController::class, 'edit'])->name('MateriasA.edit');       // EDIT
Route::get('/MateriasA.show/{materia}', [MateriaController::class, 'show'])->name('MateriasA.show');       // VER

Route::post('/MateriasA.destroy/{materia}', [MateriaController::class, 'destroy'])->name('MateriasA.destroy');// DESRTOY
Route::post('/MateriasA.update/{materia}', [MateriaController::class, 'update'])->name('MateriasA.update');//UPDATE
    //TUTORIAS

    Route::get('/MateriasA.index', [MateriasAbiertaController::class, 'index'])->name('MateriasA.index');       // INDEX
    Route::resource('MateriasA', MateriasAbiertaController::class);
        Route::get('/capacitacion',function (){
            return view('capacitacion');
        })->middleware(['auth', 'verified'])->name('capacitacion');
    //
    // INSTRUMENTACION Y TUTORIAS
    Route::get('/instrumentacion',function (){
        return view('instrumentacion');
    })->middleware(['auth', 'verified'])->name('instrumentacion');

    Route::get('/tutorias',function (){
        return view('tutorias');
    })->middleware(['auth', 'verified'])->name('tutorias');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
