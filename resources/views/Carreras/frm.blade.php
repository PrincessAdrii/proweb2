
@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Carreras/tablahtml')
    
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
  <form action="{{route('Carreras.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Carreras.update',$carrera->idCarrera)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Carreras.destroy',$carrera)}}" method="POST">
    
  @endif
  
  @csrf
  
    
    <div class="row mb-3">
      <label for="nombreCarrera" class="col-sm-3 col-form-label">Nombre Carrera</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCarrera" name="nombreCarrera" value="{{old('nombreCarrera',$carrera->nombreCarrera)}}" {{$des}}>
        @error('nombreCarrera')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
        <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" value="{{old('nombreMediano',$carrera->nombreMediano)}}" {{$des}}>
          @error('nombreMediano')
          <p class="text-danger">Error en: {{$message}}</p>
        @enderror
        </div>
      </div>
    
      <div class="row mb-3">
        <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" value="{{old('nombreCorto',$carrera->nombreCorto)}}" {{$des}}>
          @error('nombreCorto')
          <p class="text-danger">Error en: {{$message}}</p>
        @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="idDepto" class="col-sm-3 col-form-label">Departamento</label>
        <div class="col-sm-9">
          <select name="idDepto" id="idDepto" class="form-control" {{ $des }}>
            @foreach ($deptos as $depto)
              <option value="{{ $depto->idDepto }}" {{ $depto->idDepto == old('idDepto', $carrera->idDepto ?? '') ? 'selected' : '' }}>
                {{ $depto->nombreDepto }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
    
      
    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


