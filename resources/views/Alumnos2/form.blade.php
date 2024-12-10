@extends("inicioAlumno")

@section("contenido1")
<!-- Aquí iría contenido general si es necesario -->
@endsection

@section("contenido2")

<!-- Determinar si es creación o edición -->
@if ($accion == 'C')
    <form action="{{ route('Alumnos.store') }}" method="POST" id="formAlumno">
        <h1>Agregar Alumno</h1>
        @csrf
@endif

@if ($accion == 'E')
    <form action="{{ route('admin.update', $alumno->noctrl) }}" method="POST" id="formAlumno">
        <h1>Información del Alumno </h1>
        @csrf
@endif

<div class="card p-4 shadow-sm">
    <!-- Mostrar mensajes de error de validación -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Mostrar mensajes de sesión -->
 

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Formulario de Alumno -->
    @if ($accion == 'C' || $accion == 'E')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="noctrl" class="form-label">Número de Control</label>
            <input type="text" class="form-control" id="noctrl" name="noctrl" maxlength="8" value="{{ old('noctrl', $alumno->noctrl ?? '') }}" required {{ $accion == 'E' ? 'readonly' : '' }}>
        </div>

        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" value="{{ old('nombre', $alumno->nombre ?? '') }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="apellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellidoP" name="apellidoP" maxlength="50" value="{{ old('apellidoP', $alumno->apellidoP ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="apellidoM" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="apellidoM" name="apellidoM" maxlength="50" value="{{ old('apellidoM', $alumno->apellidoM ?? '') }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="M" {{ old('sexo', $alumno->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('sexo', $alumno->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="50" value="{{ old('email', $alumno->email ?? '') }}" required>
        </div>
    </div>
    <div class="row">
        @if ($accion == 'E')
        <!-- Campo: Semestre Actual -->
        <div class="col-md-6 mb-3">
            <label for="semestreActual" class="form-label">Semestre Actual</label>
            <input  style=" background-color: #e2e2e2;" type="number" class="form-control" id="semestreActual" name="semestreActual" value="{{ old('semestreActual', $alumno->semestreActual ?? 'semestre 1') }}" readonly >
        </div>
        @endif
        <!-- Campo: Carrera -->
        <div class="col-md-6 mb-3">
            <label for="idCarrera" class="form-label">Carrera</label>
            <select class="form-select" id="idCarrera" name="idCarrera" required>
                <option value="">Seleccione una carrera</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->idCarrera }}" {{ old('idCarrera', $alumno->idCarrera ?? '') == $carrera->idCarrera ? 'selected' : '' }}>
                        {{ $carrera->nombreCarrera }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @endif

    <!-- Formulario de Turno -->
    @if ($accion == 'E')
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <label for="hora" class="form-label">Estado</label>
            <input style=" background-color: #e2e2e2;" type="text" class="form-control" id="inscripcion" name="inscripcion" value="{{ old('inscripcion', $turno->inscripcion ?? '') }}" required readonly>
        </div>
        <div class="col-md-6 mb-4">
            <label for="fecha" class="form-label">Fecha del Turno</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $turno->fecha ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-4">
            <label for="hora" class="form-label">Hora del Turno</label>
            <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $turno->hora ?? '') }}" required>
        </div>
    </div>

   

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @endif

    <!-- Botón de Enviar -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">
            {{ $txtbtn }}
        </button>
    </div>
</div>

</form>

@endsection
