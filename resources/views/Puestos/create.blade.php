@extends('catalogo')
@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Puestos/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{route('Puestos.store')}}" method="POST">
  @csrf
  <div class="row mb-3">
    <label for="idPuesto" class="col-sm-3 col-form-label">idPuesto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="idPuesto" name="idPuesto">
    </div>
  </div>

    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
    </div>

    <div class="row mb-3">
      <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tipo" name="tipo">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Grabar</button>
    
  </form>

@endsection


