
@extends('plantillas/plantilla2')
{{--  --}}
@extends('inicio2') 
{{-- CONTENIDO1 --}}
@section('contenido')
    @include('Alumnos2/tablahtml')
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Alumnos2.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Alumnos2.update',$alumno->id)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Alumnos2.destroy',$alumno)}}" method="POST">
    
  @endif
  
  @csrf

  <div class="row mb-3">
    <label for="noctrl" class="col-sm-3 col-form-label">No Ctrl</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="noctrl" name="noctrl" value="{{old('noctrl',$alumno->noctrl)}}" {{$des}}>
      @error('noctrl')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

      
    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$alumno->nombre)}}" {{$des}}>
        @error('nombre')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
        <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{old('apellidoP',$alumno->apellidoP)}}" {{$des}}>
          @error('apellidoP')
          <p class="text-danger">Error en: {{$message}}</p>
        @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Materno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{old('apellidoM',$alumno->apellidoM)}}" {{$des}}>
          @error('apellidoM')
          <p class="text-danger">Error en: {{$message}}</p>
        @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="sexo" class="col-sm-3 col-form-label">Sexo</label>
        <div class="col-sm-9">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M"
                {{ old('sexo', $alumno->sexo) == 'M' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="sexoM">
                Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F"
                {{ old('sexo', $alumno->sexo) == 'F' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="sexoF">
                Femenino
            </label>
        </div>
          @error('sexo')
          <p class="text-danger">Error en: {{$message}}</p>
        @enderror
        </div>
      </div>
    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


