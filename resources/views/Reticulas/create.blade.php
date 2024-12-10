@extends('plantillas/plantilla2')
  
{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Reticulas/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{route('Reticulas.store')}}" method="POST">
  @csrf
    {{-- <div class="row mb-3">
      <label for="noctrl" class="col-sm-3 col-form-label">Número de Control</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="noctrl" name="noctrl">
      </div>
    </div> --}}

                                {{-- DESCRIPCION --}}
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
        <input type="date" class="form-control" id="fechaEnVigor" name="fechaEnVigor" value="{{ old('fechav', $reticula->fechaEnVigor ?? '') }}" {{$des}}>
        @error('fechaEnVigor')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

      
    <button type="submit" class="btn btn-primary">Grabar</button>
    
  </form>

@endsection


