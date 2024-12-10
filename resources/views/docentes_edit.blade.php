@extends("inicio2")
@section('title', 'Editar Calificaciones')

@section('contenido1')
<div class="container mt-4">
    <div class="content">
        <h1 class="text-center mb-4">Editar Calificaciones - Grupo {{ $grupo->grupo }}</h1>

        <form action="{{ route('docentes.update', $grupo->idGrupo) }}" method="POST">
            @csrf
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Número de Control</th>
                        <th>Nombre</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->noctrl }}</td>
                        <td>{{ $alumno->alumno->nombre ?? 'Sin Nombre' }}</td>
                        <td>
                            <input type="number" name="calificaciones[{{ $alumno->id }}]" value="{{ $alumno->calificacion }}" class="form-control" min="0" max="100" step="0.1" required>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success w-100">Guardar Calificaciones</button>
        </form>
    </div>
</div>
@endsection
