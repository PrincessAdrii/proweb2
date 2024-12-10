@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Personal/tablahtml')
@endsection

<style>
  .academic-section {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    background-color: #7878781a;
  }
  .academic-section h5 {
    margin-bottom: 10px;
    color: #333;
  }

  .academic-row {
    display: flex;
    gap: 30px; /* Adjust the space between columns */
  }

  .academic-column {
    flex: 1; /* Make each input field take equal space */
  }
</style>

{{-- CONTENIDO2 --}}
@section('contenido2')

@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach

@if ($accion == 'C')
  <h1>INSERTANDO</h1> 
  <form action="{{ route('Personal.store') }}" method="POST">
@elseif ($accion == 'E')
  <h1>EDITANDO PERSONAL</h1> 
  <form action="{{ route('Personal.update', $personal->idPersonal) }}" method="POST">
@elseif ($accion == 'D')
  <h1>PARA ELIMINAR</h1> 
  <form action="{{ route('Personal.destroy', $personal) }}" method="POST">
@endif

  @csrf

  <!-- RFC, Nombre, Apellidos -->
  <div class="row mb-3">
    <label for="RFC" class="col-sm-3 col-form-label">RFC</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="RFC" name="RFC" value="{{ old('RFC', $personal->RFC ) }}" required {{ $des }}>
    </div>
  </div>

  <div class="row mb-3">
    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $personal->nombre ) }}" required {{ $des }}>
    </div>
  </div>

  <div class="row mb-3">
    <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{ old('apellidoP', $personal->apellidoP ) }}" {{ $des }}>
      @error('apellidoP')
        <p class="text-danger">Error en: {{ $message }}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="apellidoM" class="col-sm-3 col-form-label">Apellido Materno</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{ old('apellidoM', $personal->apellidoM ) }}" required {{ $des }}>
    </div>
  </div>

  <!-- Academic Degrees Section -->
  <div class="academic-section mb-4">
    <h5 class="fw-bold">Formación Académica</h5>

    <div class="academic-row">
      <div class="academic-column">
        <label for="licenciatura" class="col-form-label">Licenciatura</label>
        <input type="text" class="form-control" id="licenciatura" name="licenciatura" value="{{ old('licenciatura', $personal->licenciatura ) }}" {{ $des }}>
        <label for="lictit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="lictit_yes" name="lictit" value="1" {{ old('lictit', $personal->lictit ?? '') == '1' ? 'checked' : '' }}>
          <label for="lictit_yes">Sí</label>
          <input type="radio" id="lictit_NO" name="lictit" value="0" {{ old('lictit', $personal->lictit ?? '') == '0' ? 'checked' : '' }} {{ $des }}>
          <label for="lictit_NO">No</label>
        </div>
      </div>

      <div class="academic-column">
        <label for="especializacion" class="col-form-label">Especialización</label>
        <input type="text" class="form-control" id="especializacion" name="especializacion" value="{{ old('especializacion', $personal->especializacion) }}" {{ $des }}>
        <label for="esptit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="esptit_yes" name="esptit" value="1" {{ old('esptit', $personal->esptit ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
          <label for="esptit_yes">Sí</label>
          <input type="radio" id="esptit_no" name="esptit" value="0" {{ old('esptit', $personal->esptit ?? '') == '0' ? 'checked' : '' }} {{ $des }}>
          <label for="esptit_no">No</label>
        </div>
      </div>

      <div class="academic-column">
        <label for="maestria" class="col-form-label">Maestría</label>
        <input type="text" class="form-control" id="maestria" name="maestria" value="{{ old('maestria', $personal->maestria ) }}" {{ $des }}>
        <label for="maetit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="maetit_yes" name="maetit" value="1" {{ old('maetit', $personal->maetit ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
          <label for="maetit_yes">Sí</label>
          <input type="radio" id="maetit_no" name="maetit" value="0" {{ old('maetit', $personal->maetit ?? '') == '0' ? 'checked' : '' }} {{ $des }}>
          <label for="maetit_no">No</label>
        </div>
      </div>

      <div class="academic-column">
        <label for="doctorado" class="col-form-label">Doctorado</label>
        <input type="text" class="form-control" id="doctorado" name="doctorado" value="{{ old('doctorado', $personal->doctorado ) }}" {{ $des }}>
        <label for="doctit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="doctit_yes" name="doctit" value="1" {{ old('doctit', $personal->doctit ?? '') == '1' ? 'checked' : '' }} {{ $des }}>
          <label for="doctit_yes">Si</label>
          <input type="radio" id="doctit_no" name="doctit" value="0" {{ old('doctit', $personal->doctit ?? '') == '0' ? 'checked' : '' }} {{ $des }}>
          <label for="doctit_no">No</label>
        </div>
      </div>
    </div>
  </div>

 
  <div class="row mb-3">
    <label for="fechaIngSep" class="col-sm-3 col-form-label">Fecha Ingreso SEP</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaIngSep" name="fechaIngSep" value="{{ old('fechaIngSep', $personal->fechaIngSep ) }}" {{ $des }}>
    </div>
  </div>

  <div class="row mb-3">
    <label for="fechaIngIns" class="col-sm-3 col-form-label">Fecha Ingreso Institución</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="fechaIngIns" name="fechaIngIns" value="{{ old('fechaIngIns', $personal->fechaIngIns ) }}" {{ $des }}>
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
        @php $uniqueTipos = []; @endphp
@foreach($puestos as $puesto)
    @if(!in_array($puesto->tipo, $uniqueTipos))
        <option value="{{ $puesto->idPuesto }}" 
                {{ $puesto->idPuesto == old('idPuesto', $personal->idPuesto ?? '') ? 'selected' : '' }} 
                {{ $des }}>
            {{ $puesto->tipo }}
        </option>
        @php $uniqueTipos[] = $puesto->tipo; @endphp
    @endif
@endforeach

      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>
</form>
@endsection
