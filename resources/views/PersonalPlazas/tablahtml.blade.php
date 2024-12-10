<ul>
</ul>

@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>PERSONAL PLAZAS</H1>
<a href="{{route('PersonalPlazas.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">Personal</th>
                <th scope="col">Plaza</th>
                <th scope="col">Tipo de Nombramiento</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personalPlazas as $personalPlaza)
                <tr>
                    {{-- <td>{{ $personalPlaza->idPersonalPlaza }}</td> --}}
                    <td>{{ $personalPlaza->personal->nombre ?? 'N/A' }}</td>
                    <td>{{ $personalPlaza->plaza->nombrePlaza }}  </td>
                    <td>{{ $personalPlaza->tipoNombramiento }}</td>
                    <td>
                        <a href="{{ route('PersonalPlazas.edit', $personalPlaza->idPersonalPlaza) }}" class="btn btn-success">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('PersonalPlazas.show', $personalPlaza->idPersonalPlaza) }}" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('PersonalPlazas.show', $personalPlaza->idPersonalPlaza) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $personalPlazas->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
