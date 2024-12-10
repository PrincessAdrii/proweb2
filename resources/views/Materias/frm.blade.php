@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Materias/tablahtml')
    
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
  <form action="{{route('Materias.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Materias.update',$materia->idMateria)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Materias.destroy',$materia)}}" method="POST">
    
  @endif
  
  @csrf 
    {{-- <div class="row mb-3">
      <label for="idCarrera" class="col-sm-3 col-form-label">Id Carrera</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="idCarrera" name="idCarrera" value="{{old('idCarrera',$carrera->idCarrera)}}" {{$des}}>
        @error('idCarrera')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div> --}}
  <div class="row mb-3">
    <label for="nombreMateria" class="col-sm-3 col-form-label">Nombre de Materia</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombremateria" name="nombreMateria" 
               value="{{ old('nombreMateria', $materia->nombreMateria ?? '') }}" {{$des}}>
        @error('nombreMateria')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>



<!-- Campo para NombreMediano -->
<div class="row mb-3">
    <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" 
               value="{{ old('nombreMediano', $materia->nombreMediano ?? '') }}" {{$des}}>
        @error('nombreMediano')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

<!-- Campo para NombreCorto -->
<div class="row mb-3">
    <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" 
               value="{{ old('nombreCorto', $materia->nombreCorto ?? '') }}" {{$des}}>
        @error('nombreCorto')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>
{{-- Campo para creditos --}}
<div class="row mb-3">
    <label for="nombreMateria" class="col-sm-3 col-form-label">Creditos</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" id="creditos" name="creditos" 
               value="{{ old('creditos', $materia->creditos ?? '') }}" {{$des}}>
        @error('creditos')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>
<!-- Campo para Nivel -->
<div class="row mb-3">
    <label for="nivel" class="col-sm-3 col-form-label">Nivel</label>
    <div class="col-sm-9">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel" id="nivel1" value="L" {{ old('nivel', $materia->nivel) == 'L' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="nivel1">Licenciatura</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel" id="nivel2" value="M" {{ old('nivel', $materia->nivel) == 'M' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="nivel2">Maestria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel" id="nivel3" value="D" {{ old('nivel', $materia->nivel) == 'D' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="nivel3">Doctorado</label>
        </div>
        @error('nivel')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>


  <!-- Campo para Modalidad -->
  <div class="row mb-3">
    <label for="modalidad" class="col-sm-3 col-form-label">Modalidad</label>
    <div class="col-sm-9">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="modalidad" id="modalidad1" value="M" {{ old('modalidad', $materia->modalidad) == 'M' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="modalidad1">Mixta</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="modalidad" id="modalidad2" value="L" {{ old('modalidad', $materia->modalidad) == 'L' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="modalidad2">Línea</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="modalidad" id="modalidad3" value="P" {{ old('modalidad', $materia->modalidad) == 'P' ? 'checked' : '' }} {{$des}}>
            <label class="form-check-label" for="modalidad3">Presencial</label>
        </div>
        @error('modalidad')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
  </div>



<!-- Seleccionar Retícula -->
<div class="row mb-3">
    <label for="idReticula" class="col-sm-3 col-form-label">Seleccionar Retícula</label>
    <div class="col-sm-9">
        <select name="idReticula" id="idReticula" class="form-control" {{ $des }}>
            <option value="">-- Seleccione una Retícula --</option>
            @foreach ($reticulas as $reticula)
                <option value="{{ $reticula->idReticula }}" {{ $reticula->idReticula == $materia->idReticula ? 'selected' : '' }}>
                    {{ $reticula->descripcion }}
                </option>
            @endforeach
        </select>
        @error('idReticula') 
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>
<!-- Campo para Semestre -->
<div class="row mb-3">
    <label for="semestre" class="col-sm-3 col-form-label">Semestre</label>
    <div class="col-sm-9">
        <select name="semestre" id="semestre" class="form-control" {{ $des }}>
            <option value="">-- Seleccione un Semestre --</option>
            @foreach (['semestre 1', 'semestre 2', 'semestre 3', 'semestre 4', 'semestre 5', 'semestre 6', 'semestre 7', 'semestre 8', 'semestre 9'] as $sem)
                <option value="{{ $sem }}" {{ old('semestre', $materia->semestre) == $sem ? 'selected' : '' }}>{{ $sem }}</option>
            @endforeach
        </select>
        @error('semestre') 
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>


<!-- Botón de envío -->
<button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>

</form>

@endsection