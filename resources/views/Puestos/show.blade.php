@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Puestos/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Puestos.destroy',$puesto)}}" method="POST">
  @csrf 
  
    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" disabled value="{{$puesto->nombrePuesto}}">
      </div>
    </div>

    <div class="row mb-3">
      <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tipo" name="tipo" disabled value="{{$puesto->tipo}}">
      </div>
    </div>

    <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
    <a href="{{route('Puestos.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


