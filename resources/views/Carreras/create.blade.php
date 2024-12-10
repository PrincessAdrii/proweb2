@extends('plantillas/plantilla2')
  
{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Carreras/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{route('Carreras.store')}}" method="POST">
  @csrf
    {{-- <div class="row mb-3">
      <label for="noctrl" class="col-sm-3 col-form-label">Número de Control</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="noctrl" name="noctrl">
      </div>
    </div> --}}

                                {{-- NOMBRE CARRERA --}}
    <div class="row mb-3">
      <label for="nombreCarrera" class="col-sm-3 col-form-label">NombreCarrera</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCarrera" name="nombreCarrera">
      </div>
    </div>

                                {{-- NOMBRE MEDIANO --}}
    <div class="row mb-3">
      <label for="nombreMediano" class="col-sm-3 col-form-label">nombreMediano</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreMediano" name="nombreMediano">
      </div>
    </div>

  
                                {{-- NOMBRE CORTO --}}
    <div class="row mb-3">
        <label for="nombreCorto" class="col-sm-3 col-form-label">nombreCorto</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreCorto" name="nombreCorto">
        </div>
    </div>

      
    <button type="submit" class="btn btn-primary">Grabar</button>
    
  </form>

@endsection


