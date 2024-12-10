@extends('plantillas/plantilla2')

@section('contenido1')
    @include('Lugares/tablahtml')
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
  @endforeach
@endif

@if ($accion == 'C')
  <h1>INSERTANDO</h1> 
  <form action="{{ route('Lugares.store') }}" method="POST">
@elseif ($accion == 'E')
  <h1>EDITANDO</h1> 
  <form action="{{ route('Lugares.update', $lugar->idLugar) }}" method="POST">
@elseif ($accion == 'D')
  <h1>ELIMINANDO</h1> 
  <form action="{{ route('Lugares.destroy', $lugar->idLugar) }}" method="POST">
@endif

  @csrf

  <!-- Campo Nombre Lugar -->
  <div class="row mb-3">
    <label for="nombreLugar" class="col-sm-3 col-form-label">Nombre Lugar</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreLugar" name="nombreLugar" 
             value="{{ old('nombreLugar', $lugar->nombreLugar ?? '') }}" {{ $des }}>
      @error('nombreLugar')
        <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
    </div>
  </div>

  <!-- Campo Nombre Corto -->
  <div class="row mb-3">
    <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" 
             value="{{ old('nombreCorto', $lugar->nombreCorto ?? '') }}" {{ $des }}>
      @error('nombreCorto')
        <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
    </div>
  </div>

  <!-- Campo Edificio Asociado -->
  <div class="row mb-3">
    <label for="idEdificio" class="col-sm-3 col-form-label">Edificio Asociado</label>
    <div class="col-sm-9">
      <select class="form-control" id="idEdificio" name="idEdificio" {{ $des }}>
        @foreach ($edificios as $edificio)
          <option value="{{ $edificio->idEdificio }}" 
            {{ old('idEdificio', $lugar->idEdificio ?? '') == $edificio->idEdificio ? 'selected' : '' }}>
            {{ $edificio->nombreEdificio }}
          </option>
        @endforeach
      </select>
      @error('idEdificio')
        <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
</form>
@endsection
