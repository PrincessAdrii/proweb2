<ul>
</ul>

@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<h1>LUGARES</h1>
<a href="{{route('Lugares.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre Lugar</th>
                <th scope="col">nombre Corto</th>
                <th scope="col">Edificio</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lugares as $lugar)
                <tr>
                    <td>{{ $lugar->nombreLugar}}</td>
                    <td>{{ $lugar->nombreCorto }}</td>
                    <td>{{ $lugar->edificio->nombreEdificio }}  </td>
                    
                    <td>
                        <a href="{{ route('Lugares.edit', $lugar->idLugar) }}" class="btn btn-success">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Lugares.show', $lugar->idLugar) }}" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Lugares.show', $lugar->idLugar) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $lugares->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
