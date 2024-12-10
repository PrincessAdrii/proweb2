@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Reticulas/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Editando</h1>
<form action="{{route('Reticulas.update',$reticulas->idReticula)}}" method="POST">
  @csrf
   

  <div class="row mb-3">
  <label for="descripcion" class="col-sm-3 col-form-label">Descripcion</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('nombre',$reticula->descripcion)}}" {{$des}}>
    @error('descripcion')
    <p class="text-danger">Error en: {{$message}}</p>
    @enderror
  </div>
</div>
<div class="row mb-3">
  <label for="fechaEnVigor" class="col-sm-3 col-form-label">Fecha en Vigor</label>
  <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaEnVigor" name="fechaEnVigor" value="{{ old('fechaEnVigor', $reticula->fechaEnVigor ?? '') }}" {{$des}}>
      @error('fechaEnVigor')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
  </div>
</div>

<label for="idCarrera">Seleccionar Carrera</label>
<select name="idCarrera" id="idCarrera" class="form-control" {{ $des }}>
  <option value="">-- Seleccione una Carrera --</option>
  @foreach ($carreras as $carrera)
      <option value="{{ $carrera->idCarrera }}" {{ $carrera->idCarrera == $reticula->idCarrera ? 'selected' : '' }}>
          {{ $carrera->nombreCarrera }}
      </option>
  @endforeach
</select>

         
    <button type="submit" class="btn btn-primary">Actualizar</button>
    
  </form>

@endsection

