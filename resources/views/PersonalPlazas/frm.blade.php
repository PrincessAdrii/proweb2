@extends('plantillas/plantilla2')

@section('contenido1')
    @include('PersonalPlazas/tablahtml')
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
  <form action="{{ route('PersonalPlazas.store') }}" method="POST">
@elseif ($accion == 'E')
  <h1>EDITANDO</h1> 
  <form action="{{ route('PersonalPlazas.update', $personalPlaza->idPersonalPlaza) }}" method="POST">
@elseif ($accion == 'D')
  <h1>ELIMINANDO</h1> 
  <form action="{{ route('PersonalPlazas.destroy', $personalPlaza->idPersonalPlaza) }}" method="POST">
@endif

  @csrf

  <!-- Campo idPersonal -->
  <!-- Campo Personal -->
<div class="row mb-3">
  <label for="idPersonal" class="col-sm-3 col-form-label">Personal Asociado</label>
  <div class="col-sm-9">
      <select class="form-control" id="idPersonal" name="idPersonal" {{ $des ?? '' }}>
          @foreach ($personales as $personal)
              <option value="{{ $personal->idPersonal }}" 
                  {{ old('idPersonal', $grupo->idPersonal ?? '') == $personal->idPersonal ? 'selected' : '' }}>
                  {{ $personal->nombre }} {{ $personal->apellidoP }} {{ $personal->apellidoM }}
              </option>
          @endforeach
      </select>
      @error('idPersonal')
          <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
  </div>
</div>


  <!-- Campo idPlaza -->
  <div class="row mb-3">
    <label for="idPlaza" class="col-sm-3 col-form-label">ID Plaza</label>
    <div class="col-sm-9">
      <select class="form-control" id="idPlaza" name="idPlaza" {{ $des }}>
        @foreach ($plazas as $plaza)
          <option value="{{ $plaza->idPlaza }}" 
            {{ old('idPlaza', $personalPlaza->idPlaza ?? '') == $plaza->idPlaza ? 'selected' : '' }}>
            {{ $plaza->nombrePlaza }}
          </option>
        @endforeach
      </select>
      @error('idPlaza')
        <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
    </div>
  </div>

  <!-- Campo tipoNombramiento -->
<div class="row mb-3">
  <label for="tipoNombramiento" class="col-sm-3 col-form-label">Tipo Nombramiento</label>
  <div class="col-sm-9">
    <select name="tipoNombramiento" id="tipoNombramiento" class="form-control" {{ $des }}>
      <option value="10" @if(old('tipoNombramiento', $personalPlaza->tipoNombramiento) == '10') selected @endif>10</option>
      <option value="20" @if(old('tipoNombramiento', $personalPlaza->tipoNombramiento) == '20') selected @endif>20</option>
      <option value="95" @if(old('tipoNombramiento', $personalPlaza->tipoNombramiento) == '95') selected @endif>95</option>
    </select>
    @error('tipoNombramiento')
      <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
  </div>
</div>


  <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
</form>
@endsection
