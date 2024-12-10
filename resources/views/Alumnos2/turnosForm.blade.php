
@extends("plantillas/plantilla2")

@section("contenido1")


@endsection

@section("contenido2")

    <h1>Insertar Turno</h1>
@endsection

@section("contenido3")
@if ($accion=='C')
<form action="{{route('Alumnos.store')}}" method="POST">
  <h1>Insertar</h1>
  @endif
  @if ($accion=='E')
  <form action="{{route('Alumnos.update',$alumno->noctrl)}}" method="POST">
    <h1>Editar</h1>
@endif
@if ($accion=='D')
<form action="{{route('Alumnos.eliminar', $alumno)}}" method="POST">
  <h1>Ver y Eliminar</h1>
@endif


@csrf
<div class="card p-4 shadow-sm">
  <div class="row">
      <!-- Campo: No. Control -->
      <div class="col-md-6 mb-3">
          <label for="noctrl" class="form-label">Número de Control</label>
          <input type="text" class="form-control" id="noctrl" name="noctrl" maxlength="8" required>
      </div>

      <!-- Campo: Nombre -->
      <div class="col-md-6 mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" required>
      </div>
  </div>

  <div class="row">
      <!-- Campo: Apellido Paterno -->
      <div class="col-md-6 mb-3">
          <label for="apellidoP" class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" id="apellidoP" name="apellidoP" maxlength="50" required>
      </div>

      <!-- Campo: Apellido Materno -->
      <div class="col-md-6 mb-3">
          <label for="apellidoM" class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="apellidoM" name="apellidoM" maxlength="50" required>
      </div>
  </div>

  <div class="row">
      <!-- Campo: Sexo -->
      <div class="col-md-6 mb-3">
          <label for="sexo" class="form-label">Sexo</label>
          <select class="form-select" id="sexo" name="sexo" required>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
          </select>
      </div>

      <!-- Campo: Correo Electrónico -->
      <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="email" name="email" maxlength="50" required>
      </div>
  </div>

  <div class="row">
      <!-- Campo: Semestre Actual -->
      <div class="col-md-6 mb-3">
          <label for="semestreActual" class="form-label">Semestre Actual</label>
          <input type="text" class="form-control" id="semestreActual" name="semestreActual" value="semestre 1" required>
      </div>

      <!-- Campo: Carrera -->
      <div class="col-md-6 mb-3">
          <label for="idCarrera" class="form-label">Carrera</label>
          <select class="form-select" id="idCarrera" name="idCarrera" required>
              <option value="">Seleccione una carrera</option>
              @foreach($carreras as $carrera)
                  <option value="{{ $carrera->idCarrera }}">{{ $carrera->nombreCarrera }}</option>
              @endforeach
          </select>
      </div>
  </div>

  <div class="text-center">
      <button type="submit" class="btn btn-primary">Registrar Alumno</button>
  </div>
</div>
    
  </form>
  @endsection