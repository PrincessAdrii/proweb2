@extends('plantillas/plantilla2')
  
{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Edificios/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{route('Edificios.store')}}" method="POST">
  @csrf
   

                                {{-- NOMBRE Edificio --}}
    <div class="row mb-3">
      <label for="nombreEdificio" class="col-sm-3 col-form-label">nombre Edificio</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreEdificio" name="nombreEdificio">
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


