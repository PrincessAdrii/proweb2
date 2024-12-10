@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Lugar/tablahtml')
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{ route('Lugares.store') }}" method="POST">
  @csrf

  {{-- Campo Nombre Lugar --}}
  <div class="row mb-3">
    <label for="nombreLugar" class="col-sm-3 col-form-label">Nombre Lugar</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreLugar" name="nombreLugar">
    </div>
  </div>

  {{-- Campo Nombre Corto --}}
  <div class="row mb-3">
    <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreCorto" name="nombreCorto">
    </div>
  </div>

  {{-- Campo Edificio Asociado --}}
  <div class="row mb-3">
    <label for="idEdificio" class="col-sm-3 col-form-label">Edificio Asociado</label>
    <div class="col-sm-9">
      <select class="form-control" id="idEdificio" name="idEdificio">
        @foreach ($edificios as $edificio)
          <option value="{{ $edificio->idEdificio }}">
            {{ $edificio->nombreEdificio }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
