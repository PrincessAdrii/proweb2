@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Lugares/tablahtml')
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Ver todos los datos</h1>
<form action="{{ route('Lugares.destroy', $lugar) }}" method="POST">
  @csrf 
  
  {{-- Campo Nombre del Lugar --}}
  <div class="row mb-3">
      <label for="nombreLugar" class="col-sm-3 col-form-label">Nombre Lugar</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreLugar" name="nombreLugar" disabled value="{{ $lugar->nombreLugar }}">
      </div>
  </div>

  {{-- Campo Nombre Corto --}}
  <div class="row mb-3">
      <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" disabled value="{{ $lugar->nombreCorto }}">
      </div>
  </div>

  {{-- Campo ID Edificio --}}
  <div class="row mb-3">
      <label for="idEdificio" class="col-sm-3 col-form-label">ID Edificio</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="idEdificio" name="idEdificio" disabled value="{{ $lugar->idEdificio }}">
      </div>
  </div>

  {{-- Botones de acción --}}
  <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
  <a href="{{ route('Lugares.index') }}" class="btn btn-primary">Regresar</a>
</form>
@endsection
