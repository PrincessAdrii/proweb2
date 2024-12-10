@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Edificios/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>VER TDOOS LOS DATOS</h1>
<form action="{{route('Edificios.destroy',$edificio)}}" method="POST">
  @csrf 

  
    <div class="row mb-3">
      <label for="nombreEdificio" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreEdificio" name="nombreEdificio" disabled value="{{$edificio->nombreEdificio}}">
      </div>
    </div>


      <div class="row mb-3">
        <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" disabled value="{{$edificio->nombreCorto}} ">
        </div>
      </div>

  
       
      <button type="submit" class="btn btn-danger">Confirma la Eliminacion</button>
      <a href="{{route('Edificios.index')}}" class="btn btn-primary">Regresar</a>
    
  </form>

@endsection


