@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Grupos/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Grupos.destroy',$grupos)}}" method="POST">

    @csrf
    <div>
        <label for="grupo">Grupo</label>
        <input type="text" id="grupo" name="grupo" value="{{ $grupo->grupo }}" {{ $des }}>
    </div>
    <div>
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" value="{{ $grupo->fecha }}" {{ $des }}>
    </div>
    <div>
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ $grupo->descripcion }}" {{ $des }}>
    </div>
    <div>
        <label for="maxAlumnos">Máx. Alumnos</label>
        <input type="number" id="maxAlumnos" name="maxAlumnos" value="{{ $grupo->maxAlumnos }}" {{ $des }}>
    </div>
    <div>
        <label for="idPeriodo">Periodo</label>
        <input type="text" id="idPeriodo" name="idPeriodo" value="{{ $grupo->periodo->periodo }}" {{ $des }}>
    </div>
    <div>
        <label for="idMateria">Materia</label>
        <input type="text" id="idMateria" name="idMateria" value="{{ $grupo->materia->nombreMateria }}" {{ $des }}>
    </div>
    <div>
        <label for="idPersonal">Docente</label>
        <input type="text" id="idPersonal" name="idPersonal" 
            value="{{ $grupo->personal ? $grupo->personal->nombre . ' ' . $grupo->personal->apellidoP : '' }}" {{ $des }}>
    </div>
    @if ($accion == 'D')
        <button type="submit" class="btn btn-danger">{{ $txtbtn }}</button>
    @endif
</form>
