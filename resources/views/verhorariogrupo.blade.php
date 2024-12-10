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
</style>
@extends('inicioAlumno')

@section('title', 'Ver Horario Grupo')

@section('contenido2')
    <br>
    @foreach($periodos as $periodo)
        <input type="hidden" name="idPeriodo" id="idPeriodo" value="{{ $periodo->idPeriodo }}">
    @endforeach

    @if(isset($grupoHorarios) 
    // && $grupoHorarios->count() > 0
    )
        <div class="table-responsive">
            <table class="horario-table">
                <thead>
                    <tr>
                        <th colspan="4">Grupo</th>
                        <th colspan="4">Periodo</th>
                    </tr>
                </thead>
                @php
                    $grupoHorario = $grupoHorarios->first();
                @endphp
                <tbody>
                    @if ($grupoHorario)
                        <tr>
                            <td class="td" colspan="4">{{ $grupoHorario->grupo }}</td>
                            <td class="td" colspan="4">{{ $grupoHorario->periodo }}</td>
                        </tr>
                    @endif
                </tbody>
                <thead>
                    <tr>
                        <th colspan="3">Materia</th>
                        <th colspan="1">L</th>
                        <th colspan="1">M</th>
                        <th colspan="1">X</th>
                        <th colspan="1">J</th>
                        <th colspan="1">V</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grupoHorarios as $grupoHorario)
                        <tr>
                            <td colspan="3">
                                {{-- <b>{{ $grupoHorario->idMateria }}</b> <br> --}}
                                {{ $grupoHorario->nombreMateria }} <br>
                                {{ $grupoHorario->personal_nombre ?? 'Sin docente asignado' }} 
                                {{ $grupoHorario->personal_apellidoP ?? '' }} 
                                {{ $grupoHorario->personal_apellidoM ?? '' }}
                            </td>
                            @if($grupoHorario->lunes_horas && $grupoHorario->lunes_lugar)
                                <td class="td" colspan="1">
                                    {{ $grupoHorario->lunes_horas }} - {{ $grupoHorario->lunes_horas+1 }} <br>
                                    {{ $grupoHorario->lunes_lugar }}
                                </td>
                            @else
                                <td class="td" colspan="1"></td>
                            @endif
                            @if($grupoHorario->martes_horas && $grupoHorario->martes_lugar)
                                <td class="td" colspan="1">
                                    {{ $grupoHorario->martes_horas }} - {{ $grupoHorario->martes_horas+1 }}<br>
                                    {{ $grupoHorario->martes_lugar }}
                                </td>
                            @else
                                <td class="td" colspan="1"></td>
                            @endif
                            @if($grupoHorario->miercoles_horas && $grupoHorario->miercoles_lugar)
                                <td class="td" colspan="1">
                                    {{ $grupoHorario->miercoles_horas }} - {{ $grupoHorario->miercoles_horas+1 }}<br>
                                    {{ $grupoHorario->miercoles_lugar }}
                                </td>
                            @else
                                <td class="td" colspan="1"></td>
                            @endif
                            @if($grupoHorario->jueves_horas && $grupoHorario->jueves_lugar)
                                <td class="td" colspan="1">
                                    {{ $grupoHorario->jueves_horas }} - {{ $grupoHorario->jueves_horas+1 }}<br>
                                    {{ $grupoHorario->jueves_lugar }}
                                </td>
                            @else
                                <td class="td" colspan="1"></td>
                            @endif
                            @if($grupoHorario->viernes_horas && $grupoHorario->viernes_lugar)
                                <td class="td" colspan="1">
                                    {{ $grupoHorario->viernes_horas }} - {{ $grupoHorario->viernes_horas+1 }}<br>
                                    {{ $grupoHorario->viernes_lugar }}
                                </td>
                            @else
                                <td class="td" colspan="1"></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $grupoHorarios->links() }} <!-- Paginación -->
        </div>
    {{-- @elseif(isset($grupoHorarios) && $grupoHorarios->count() == 0)
        <p>Adios</p> --}}
    @endif
@endsection