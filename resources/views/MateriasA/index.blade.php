@extends('plantillas.plantilla2')

@section('contenido2')
<div class="container">
    <h3 class="text-center mb-4">Apertura de Materias</h3>

    <!-- Filtros -->
    <form method="GET" action="{{ route('MateriasA.index') }}" class="mb-4">
        <div class="row">
            <!-- Filtro de Periodo -->
            <div class="col-md-6">
                <label for="idPeriodo" class="form-label">Selecciona un Periodo</label>
                <select name="idPeriodo" id="idPeriodo" class="form-control" onchange="this.form.submit()">
                    <option value="-1">-- Seleccionar --</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->idPeriodo }}" {{ $periodo->idPeriodo == $idPeriodo ? 'selected' : '' }}>
                            {{ $periodo->periodo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filtro de Carrera -->
            <div class="col-md-6">
                <label for="idCarrera" class="form-label">Selecciona una Carrera</label>
                <select name="idCarrera" id="idCarrera" class="form-control" onchange="this.form.submit()">
                    <option value="-1">-- Seleccionar --</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->idCarrera }}" {{ $carrera->idCarrera == $idCarrera ? 'selected' : '' }}>
                            {{ $carrera->nombreCarrera }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- Materias -->
    <div class="row">
        @if ($materiasPorSemestre->isEmpty())
            <p class="text-center">No hay materias disponibles para la selección actual.</p>
        @else
            @foreach ($materiasPorSemestre as $semestre => $materias)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">{{ $semestre }}</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('MateriasA.store') }}">
                                @csrf
                                <input type="hidden" name="idPeriodo" value="{{ $idPeriodo }}">
                                <input type="hidden" name="idCarrera" value="{{ $idCarrera }}">
                                <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">

                                @foreach ($materias as $materia)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="materias[]" 
                                            value="{{ $materia->idMateria }}" 
                                            onchange="enviar(this)"
                                            {{ in_array($materia->idMateria, $materiasAbiertas) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $materia->nombreMateria }}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    function enviar(chbox) {
        chbox.form.eliminar.value = chbox.checked ? "NOELIMINAR" : chbox.value;
        chbox.form.submit();
    }
</script>
@endsection
