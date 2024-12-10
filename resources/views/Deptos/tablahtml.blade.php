<ul></ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>DEPARTAMENTOS</H1>
<a href="{{route('Deptos.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped"> <!-- Cambié las clases de la tabla -->
        <thead class="thead-dark"> <!-- Clase para el color negro en los <th> -->
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Del Departamento</th>
                <th scope="col">Nombre Mediano</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deptos as $depto)
            <tr>
                <td>{{ $depto->idDepto }}</td>
                <td>{{ $depto->nombreDepto }}</td>
                <td>{{ $depto->nombreMediano }}</td>
                <td>{{ $depto->nombreCorto }}</td>
                <td>
                    <a href="{{ route('Deptos.edit', $depto->idDepto) }}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Deptos.show', $depto->idDepto) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Deptos.show', $depto->idDepto) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $deptos->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
