@extends('plantillas/plantilla2')
@section('contenido1')
    @include('Deptos/tablahtml')
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Deptos.destroy',$depto)}}" method="POST">
  @csrf 
  
  <div class="row mb-3">
    <label for="nombreDepto" class="col-sm-3 col-form-label">Nombre del Departamento</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreDepto" name="nombreDepto" value="{{old('nombreDepto',$depto->nombreDepto)}}" {{$des}}>
      @error('nombreDepto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>
  <div class="row mb-3">
    <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" value="{{old('nombreMediano',$depto->nombreMediano)}}" {{$des}}>
      @error('nombreMediano')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" value="{{old('nombreCorto',$depto->nombreCorto)}}" {{$des}}>
      @error('nombreCorto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

    <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
    <a href="{{route('Deptos.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


