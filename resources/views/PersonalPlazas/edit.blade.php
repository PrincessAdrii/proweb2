@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('PersonalPlazas/tablahtml')
    
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Editando</h1>
<form action="{{route('PersonalPlazas.update',$personalPlaza->idPersonalPlaza)}}" method="POST">
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
    <button type="submit" class="btn btn-primary">Actualizar</button>
    
  </form>

@endsection

