@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Personal/tablahtml')
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando Personal</h1> 
<form action="{{ route('Personal.store') }}" method="POST">
  @csrf

  <div class="row mb-3">
    <label for="RFC" class="col-sm-3 col-form-label">RFC</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="RFC" name="RFC" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="apellidoP" name="apellidoP" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="apellidoM" class="col-sm-3 col-form-label">Apellido Materno</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="apellidoM" name="apellidoM" required>
    </div>
  </div>

  <div class="academic-section mb-4">
    <h5 class="fw-bold">Formación Académica</h5>
  
    <div class="academic-row">
      <div class="academic-column">
        <label for="licenciatura" class="col-form-label">Licenciatura</label>
        <input type="text" class="form-control" id="licenciatura" name="licenciatura" value="{{ old('licenciatura', $personal->licenciatura) }}" {{ $des }}>
        <label for="licenciatura_titulado" class="col-form-label">Titulado</label>
        <input type="checkbox" id="licenciatura_titulado" name="licenciatura_titulado" value="1" {{ old('licenciatura_titulado', $personal->licenciatura_titulado ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
      </div>
  
      <div class="academic-column">
        <label for="especializacion" class="col-form-label">Especialización</label>
        <input type="text" class="form-control" id="especializacion" name="especializacion" value="{{ old('especializacion', $personal->especializacion) }}" {{ $des }}>
        <label for="especializacion_titulado" class="col-form-label">Titulado</label>
        <input type="checkbox" id="especializacion_titulado" name="especializacion_titulado" value="1" {{ old('especializacion_titulado', $personal->especializacion_titulado ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
      </div>
  
      <div class="academic-column">
        <label for="maestria" class="col-form-label">Maestría</label>
        <input type="text" class="form-control" id="maestria" name="maestria" value="{{ old('maestria', $personal->maestria) }}" {{ $des }}>
        <label for="maestria_titulado" class="col-form-label">Titulado</label>
        <input type="checkbox" id="maestria_titulado" name="maestria_titulado" value="1" {{ old('maestria_titulado', $personal->maestria_titulado ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
      </div>
  
      <div class="academic-column">
        <label for="doctorado" class="col-form-label">Doctorado</label>
        <input type="text" class="form-control" id="doctorado" name="doctorado" value="{{ old('doctorado', $personal->doctorado) }}" {{ $des }}>
        <label for="doctorado_titulado" class="col-form-label">Titulado</label>
        <input type="checkbox" id="doctorado_titulado" name="doctorado_titulado" value="1" {{ old('doctorado_titulado', $personal->doctorado_titulado ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
      </div>
    </div>
  </div>
  

  <div class="row mb-3">
    <label for="fechaIngSep" class="col-sm-3 col-form-label">Fecha Ingreso SEP</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaIngSep" name="fechaIngSep">
    </div>
  </div>

  <div class="row mb-3">
    <label for="fechaIngIns" class="col-sm-3 col-form-label">Fecha Ingreso Institución</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaIngIns" name="fechaIngIns">
    </div>
  </div>

  <div class="row mb-3">
    <label for="idDepto" class="col-sm-3 col-form-label">Departamento</label>
    <div class="col-sm-9">
      <select class="form-control" id="idDepto" name="idDepto" required {{ $des }}>
        @foreach ($deptos as $depto)
          <option value="{{ $depto->idDepto }}" {{ $depto->idDepto == old('idDepto', $personal->idDepto ?? '') ? 'selected' : '' }}  >
            {{ $depto->nombreDepto }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="idPuesto" class="col-sm-3 col-form-label">Puesto</label>
    <div class="col-sm-9">
      <select class="form-control" id="idPuesto" name="idPuesto" required {{ $des }}>
        @foreach($puestos as $puesto)
          <option value="{{ $puesto->idPuesto }}" {{ $puesto->idPuesto == old('idPuesto', $personal->idPuesto ?? '') ? 'selected' : '' }} {{ $des }}>
            {{ $puesto->nombrePuesto }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Grabar</button>
</form>
@endsection
