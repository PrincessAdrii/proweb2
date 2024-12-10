<ul></ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>PERIODOS</H1>
<a href="{{route('Periodos.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Periodo</th>
                <th scope="col">Descripcion Corta</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodos as $periodo)
            <tr>
                {{-- <td>{{ $periodo->idPeriodo }}</td> --}}
                <td>{{ $periodo->periodo }}</td>
                <td>{{ $periodo->descCorta }}</td>
                <td>{{ $periodo->fechaIni ? $periodo->fechaIni->format('Y-m-d') : 'N/A' }}</td>
                <td>{{ $periodo->fechaFin ? $periodo->fechaFin->format('Y-m-d') : 'N/A' }}</td>
                <td>
                    <a href="{{ route('Periodos.edit', $periodo->idPeriodo) }}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Periodos.show', $periodo->idPeriodo) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Periodos.show', $periodo->idPeriodo) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $periodos->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
