@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido')

    @include('Alumnos2/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Alumnos2.destroy',$alumno)}}" method="POST">
  @csrf 
    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" disabled value="{{$alumno->nombre}}">
      </div>
    </div>

    <div class="row mb-3">
        <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoP" name="apellidoP" disabled value="{{$alumno->apellidoP}} ">
        </div>
      </div>

      <div class="row mb-3">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="email" name="email" disabled value="{{$alumno->email}} ">
        </div>
      </div>
    <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
    <a href="{{route('Alumnos2.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


