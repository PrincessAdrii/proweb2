@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('PersonalPlazas/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('PersonalPlazas.destroy',$personalPlaza)}}" method="POST">
  @csrf 

  
    <!-- Campo idPersonal -->
  <div class="row mb-3">
    <label for="idPersonal" class="col-sm-3 col-form-label">ID Personal</label>
    <div class="col-sm-9">
      <select class="form-control" id="idPersonal" name="idPersonal" {{ $des }}>
        @foreach ($personales as $personal)
          <option value="{{ $personal->idPersonal }}" 
            {{ old('idPersonal', $personalPlaza->idPersonal ?? '') == $personal->idPersonal ? 'selected' : '' }}>
            {{ $personal->nombre }}
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

  
       
      <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
      <a href="{{route('Edificios.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


