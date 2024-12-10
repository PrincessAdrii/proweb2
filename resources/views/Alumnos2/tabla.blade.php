@extends("inicioAlumno")

<style>
    .main-content {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .form-container {
        flex-grow: 1;
        margin-bottom: 30px;
    }
</style>

@section("contenido1")


@if(session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<div class="container">
    <h1>Alumnos</h1>
    @if($alumnos->isEmpty())
        <p>Aún no hay alumnos en el sistema.</p>
        <a href="{{ route('Alumnos.create') }}" class="btn btn-primary mt-3">Agregar Alumno</a>
    @else
        <a href="{{ route('Alumnos.create') }}" class="btn btn-primary mt-3 mb-4">Agregar Alumno</a>

        <!-- Select para filtrar por inscripción o reinscripción -->
       

        <div class="row" id="turnosContainer">
            @foreach($turnos as $turno)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 turno-option" data-inscripcion="{{ $turno->inscripcion }}">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $turno->alumno->nombre }} {{ $turno->alumno->apellidoP }} {{$turno->alumno->apellidoM}}</h5>
                            <p class="card-text">
                                Turno de {{ $turno->inscripcion }}: {{ $turno->fecha }} a las {{ $turno->hora }}
                            </p>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('admin.editar', $turno->noctrl) }}" class="btn btn-warning btn-sm">Ver información</a>
                                <a href="{{ route('documentos.create', $turno->noctrl) }}" class="btn btn-primary btn-sm">Agregar documentación</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{ $turnos->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>

@endsection

<script>
    function filtrarTurnos() {
        var inscripcionSeleccionada = document.getElementById('filterSelect').value;
        
        // Mostrar todos los turnos si no hay filtro seleccionado
        if (inscripcionSeleccionada === "") {
            var turnos = document.querySelectorAll('.turno-option');
            turnos.forEach(function(turno) {
                turno.style.display = 'block'; // Muestra todos los turnos
            });
        } else {
            // Filtrar los turnos por tipo de inscripción
            var turnos = document.querySelectorAll('.turno-option');
            turnos.forEach(function(turno) {
                var inscripcionTurno = turno.getAttribute('data-inscripcion');
                if (inscripcionTurno === inscripcionSeleccionada) {
                    turno.style.display = 'block'; // Muestra el turno que coincide
                } else {
                    turno.style.display = 'none'; // Oculta el turno que no coincide
                }
            });
        }
    }
</script>
