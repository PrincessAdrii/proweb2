@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Alumnos2/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Editando</h1>
<form action="{{route('Alumnos2.update',$alumno->noctrl)}}" method="POST">
  @csrf
   


    <div class="row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$alumno->nombre}}">
      </div>
    </div>

    <div class="row mb-3">
        <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{$alumno->apellidoP}}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="apellidoM" class="col-sm-3 col-form-label">Apellido Materno</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{$alumno->apellidoM}}">
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

        <select name="idCarrera" id="idCarrera">
          @foreach ($carreras as $carrera)
              <option value="{{$carrera->idCarrera}}">
                {{$carrera->nombreCarrera}}
              </option>
          @endforeach
        </select>
         
    <button type="submit" class="btn btn-primary">Actualizar</button>
    
  </form>

@endsection

