@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Carreras/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Carreras.destroy',$carrera)}}" method="POST">
  @csrf 

  
    <div class="row mb-3">
      <label for="nombreCarrera" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCarrera" name="nombreCarrera" disabled value="{{$carrera->nombreCarrera}}">
      </div>
    </div>

    <div class="row mb-3">
        <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" disabled value="{{$carrera->nombreMediano}} ">
        </div>
      </div>

      <div class="row mb-3">
        <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" disabled value="{{$carrera->nombreCorto}} ">
        </div>
      </div>

      <select name="idCarrera" id="idCarrera">
        @foreach ($carreras as $carrera)
            <option value="{{$carrera->idCarrera}}">
              {{$carrera->nombreCarrera}}
            </option>
        @endforeach
      </select>
       
      <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
      <a href="{{route('Carreras.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


