@extends("inicioAlumno")


@section("contenido2")

<div class="container mt-4">
    <!-- Card principal -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Información del Alumno</h4>
        </div>
        <div class="card-body">
            <!-- Información del alumno -->
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Número de Control:</strong></p>
                    <p>{{ $alumno->noctrl }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Nombre:</strong></p>
                    <p>{{ $alumno->nombre }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>Semestre:</strong></p>
                    <p>{{ $alumno->semestreActual }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Estado:</strong></p>
                    <p>{{ $turno->inscripcion }}</p>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="text-center mt-4">
                <a href="{{ route('Alumnos.editar', $alumno->noctrl) }}" class="btn btn-primary mx-2">
                    <i class="fas fa-edit"></i> Actualizar información
                </a>
                <a href="{{ route('pagos.edit', $alumno->noctrl) }}" class="btn btn-secondary mx-2">
                    <i class="fas fa-wallet"></i> Actualizar pago
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
