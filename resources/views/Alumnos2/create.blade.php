@extends('plantillas/plantilla2')
  
{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Alumnos2/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{route('Alumnos2.store')}}" method="POST">
  @csrf
    <div class="row mb-3">
      <label for="noctrl" class="col-sm-3 col-form-label">Número de Control</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="noctrl" name="noctrl">
      </div>
    </div>

    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
    </div>

    <div class="row mb-3">
        <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoP" name="apellidoP">
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidoM" class="col-sm-3 col-form-label">Apellido Materno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoM" name="apellidoM">
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Grabar</button>
    
  </form>

@endsection


