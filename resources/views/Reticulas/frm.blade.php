
@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Reticulas/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif


@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Reticulas.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Reticulas.update',$reticula->idReticula)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Reticulas.destroy',$reticula)}}" method="POST">
    
  @endif
  
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

    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


