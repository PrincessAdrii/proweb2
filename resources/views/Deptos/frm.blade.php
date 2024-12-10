@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Deptos/tablahtml')
    
@endsection

@section('contenido2')
@foreach ( $errors->all() as $error )
  <li>
   {{$error}}
   </li>
@endforeach
@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Deptos.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Deptos.update',$depto->idDepto)}}" method="POST"> 

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Deptos.destroy',$depto)}}" method="POST">
    
  @endif
  
  @csrf
  {{-- <div class="row mb-3">
    <label for="idDepto" class="col-sm-3 col-form-label">Id Depto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="idDepto" name="idDepto" value="{{old('idDepto',$depto->idDepto)}}" {{$des}}>
      @error('idDepto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div> --}}
    
    <div class="row mb-3">
      <label for="nombreDepto" class="col-sm-3 col-form-label">Nombre del Departamento</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreDepto" name="nombreDepto" value="{{old('nombreDepto',$depto->nombreDepto)}}" {{$des}}>
        @error('nombreDepto')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="row mb-3">
      <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" value="{{old('nombreMediano',$depto->nombreMediano)}}" {{$des}}>
        @error('nombreMediano')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" value="{{old('nombreCorto',$depto->nombreCorto)}}" {{$des}}>
        @error('nombreCorto')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


