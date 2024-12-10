@extends('plantillas/plantilla2')
@section('contenido1')
    @include('Deptos/tablahtml')
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Editando</h1>
<form action="{{route('Deptos.update',$depto->idDepto)}}" method="POST">
  @csrf

  <div class="row mb-3">
    <label for="nombredepto" class="col-sm-3 col-form-label">Nombre del Departamento</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombredepto" name="nombredepto" value="{{old('nombredepto',$depto->nombredepto)}}" {{$des}}>
      @error('nombredepto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>
  <div class="row mb-3">
    <label for="nombremediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombremediano" name="nombremediano" value="{{old('nombremediano',$depto->nombremediano)}}" {{$des}}>
      @error('nombremediano')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="nombrecorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{old('nombrecorto',$depto->nombrecorto)}}" {{$des}}>
      @error('nombrecorto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    
  </form>

@endsection


