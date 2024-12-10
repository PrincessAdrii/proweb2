<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 20px;
    }

    h2, h3 {
        color: #4CAF50;
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Estilo del formulario */
    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        max-width: 500px;
        margin: 0 auto;
    }

    label,
    .input-select{
        font-size: 16px;
        margin-right: 10px;
    }

    .input-select {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        margin-bottom: 20px;
    }

    .submit-btn {
        display: block;
        margin: 0 auto;  /* Centra el botón */
        background-color: #3b82f6;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #3370d2;
    }

    /* Estilo de la tabla */
    .table-responsive {
        overflow-x: auto;
        margin-top: 30px;
        display: flex;
        justify-content: center;  /* Centra horizontalmente */
        align-items: center;      /* Centra verticalmente */
        height: 100vh;
    }

    /* Tabla con columnas del mismo ancho */
    .horario-table {
        width: 70%;
        border-collapse: collapse;
        table-layout: fixed; /* Forzar columnas del mismo ancho */
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .horario-table th, .td {
        padding: 12px 15px;
        text-align: center; /* Centrar horizontalmente */
        vertical-align: middle; /* Centrar verticalmente */
        border: 1px solid #ddd;
        word-wrap: break-word; /* Permite que el texto se ajuste a la celda */
    }

    .horario-table th {
        background-color: #3b82f6;
        color: white;
        text-align: center;
    }

    .horario-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .horario-table tr:hover {
        background-color: #f1f1f1;
    }


    /* Paginación */
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        color: #4CAF50;
        padding: 8px 16px;
        text-decoration: none;
        margin: 0 5px;
        border-radius: 5px;
    }

    .pagination a:hover {
        background-color: #4CAF50;
        color: white;
    }

    .pagination .disabled {
        color: #ddd;
    }

    .no-horarios {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 15px;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }

    .cuadro-gris {
        border: 2px solid #ccc; /* Borde gris */
        background-color: #f9f9f9; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
    }

    .cuadro-rojo {
        border: 2px solid #ee8383; /* Borde gris */
        background-color: #e88a8a; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
    }

    .cuadro-verde {
        border: 2px solid #83ee8f; /* Borde gris */
        background-color: #83ee8f; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
    }

    .cuadro-azul {
        border: 2px solid #83c7ee; /* Borde gris */
        background-color: #83c7ee; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
    }

    .cuadro-amarillo {
        border: 2px solid #e9ee83; /* Borde gris */
        background-color: #e9ee83; /* Fondo gris claro */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espaciado entre cuadros */
        width: 200px;
    }

    .contenedor-columnas {
        display: flex; /* Organizar por columnas */
        gap: 20px; /* Espaciado entre columnas */
    }

    .columna {
        flex: 1; /* Cada columna ocupa el mismo espacio disponible */
        max-width: 300px; /* Ancho máximo para cada columna */
        text-align: center; 
    }

    .columna label {
        display: block; /* Asegura que el label ocupe toda la línea */
        font-size: 1.2rem; /* Tamaño de fuente más grande */
        font-weight: bold; /* Texto en negritas */
        color: white;
        background-color: #3b82f6;
        padding: 10px; /* Espaciado interno */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        margin-bottom: 20px; /* Espaciado debajo del label */
        width: 200px;
    }
</style>
@extends('inicioAlumno')

@section('title', 'Horario Alumno')

@section('contenido2')
    <br>
    {{-- <form method="POST" action="{{ route('horarioalumno') }}" class="form-container"> --}}
        {{-- @csrf --}}
        <label for="periodo">Período:</label>
        @foreach($periodos as $periodo)
            <p>{{ $periodo->periodo }}</p>
        @endforeach
    {{-- </form> --}}
    <form method="POST" action="{{ route('vergrupos') }}" id="materiasForm">
        @csrf
    <div class="contenedor-columnas">
        <div class="columna">
            <label for="">Semestre 1</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 1" && $semestre->semestreActual == 1)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 1" && $semestre->semestreActual < 1)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 1";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 != 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 2</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 2" && $semestre->semestreActual == 2)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 2" && $semestre->semestreActual < 2)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 2";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 == 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 3</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 3" && $semestre->semestreActual == 3)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 3" && $semestre->semestreActual < 3)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });
                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 3";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 != 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 4</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 4" && $semestre->semestreActual == 4)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p> 
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 4" && $semestre->semestreActual < 4)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 4";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 == 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 5</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 5" && $semestre->semestreActual == 5)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p> 
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 5" && $semestre->semestreActual < 5)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 5";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 != 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <br>
    <div class="contenedor-columnas">
        <div class="columna">
            <label for="">Semestre 6</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 6" && $semestre->semestreActual == 6)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>  
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 6" && $semestre->semestreActual < 6)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 6";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 == 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 7</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 7" && $semestre->semestreActual == 7)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 7" && $semestre->semestreActual < 7)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 7";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 != 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 8</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 8" && $semestre->semestreActual == 8)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>   
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 8" && $semestre->semestreActual < 8)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 8";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 == 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="columna">
            <label for="">Semestre 9</label>
            @foreach($semestreActual as $semestre)
                @foreach($materiasNoCursadas2 as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 9" && $semestre->semestreActual == 9)
                        <div class="cuadro-azul">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p> 
                            <input type="checkbox" name="materias[]" value="{{ $materiaNC->id_materias_no_cursadas }}">
                        </div>   
                    @endif
                @endforeach
                @foreach($materiasNoCursadas as $materiaNC)
                    @if ($materiaNC->semestre_materias_no_cursadas == "Semestre 9" && $semestre->semestreActual < 9)
                        <div class="cuadro-gris">
                            <p><b>{{ $materiaNC->id_materias_no_cursadas }}</b></p>    
                            <p>{{ $materiaNC->materias_no_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
                @php
                    $materiasCursadasConDetalles = $materiasCursadasConDetalles->sortByDesc(function($materiaC) {
                        return $materiaC->calificacion;
                    });

                    $materiasFiltradas = $materiasCursadasConDetalles->filter(function($materiaC) {
                        return $materiaC->semestre_materias_cursadas == "Semestre 9";
                    })->unique('materias_cursadas');
                @endphp
                @foreach($materiasFiltradas as $materiaC)
                    @if ($materiaC->calificacion >= 70 && $materiaC->calificacion != NULL)
                        <div class="cuadro-verde">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                    @if($materiaC->calificacion < 70 && $materiaC->calificacion >= 0 && $materiaC->calificacion !== NULL)
                        <div class="cuadro-rojo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                            @if ($semestre->semestreActual%2 != 0)
                                <input type="checkbox" name="materias[]" value="{{ $materiaC->id_materias_cursadas }}">
                            @endif
                        </div>   
                    @endif
                    @if($materiaC->calificacion == NULL)
                        <div class="cuadro-amarillo">
                            <p><b>{{ $materiaC->id_materias_cursadas }}</b></p>    
                            <p>{{ $materiaC->materias_cursadas }}</p>    
                        </div>   
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <button class="submit-btn" type="submit">Seleccionar Materias</button>
    </form>

    <script>
        document.getElementById('materiasForm').addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="materias[]"]');
            const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
    
            if (!isChecked) {
                event.preventDefault();
                alert('Favor de seleccionar sus materias');
            }
        });
    </script>
@endsection