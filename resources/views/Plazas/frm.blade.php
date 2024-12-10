@extends('plantillas/plantilla2')


{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Plazas/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')

@foreach ( $errors->all() as $error )
  <li>
   {{$error}}
   </li>
@endforeach
@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Plazas.store')}}" method="POST">
  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Plazas.update',$plaza->idPlaza)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Plazas.destroy',$plaza)}}" method="POST">
    
  @endif
  
  @csrf
    {{-- <div class="row mb-3">
      <label for="idPlaza" class="col-sm-3 col-form-label">Id Plaza</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="idPlaza" name="idPlaza" value="{{old('idPlaza',$plaza->idPlaza)}}" {{$des}}>
        @error('idPlaza')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div> --}}
    
    <div class="row mb-3">
      <label for="nombrePlaza" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombrePlaza" name="nombrePlaza" value="{{old('nombrePlaza',$plaza->nombrePlaza)}}" {{$des}}>
        @error('nombrePlaza')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


