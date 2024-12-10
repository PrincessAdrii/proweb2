<ul>

</ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
 <h1>PLAZAS</h1>
<a href="{{route('Plazas.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                
                <th scope="col">Nombre</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>  
        <tbody>
            @foreach ($plazas as $plaza)
            <tr>
           
                <td scope="row">{{ $plaza->idPlaza }}  </td>
                <td scope="row">{{ $plaza->nombrePlaza }}  </td>
                <td>
                    <a href="{{route('Plazas.edit',$plaza->idPlaza)}}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{route('Plazas.show',$plaza->idPlaza)}}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{route('Plazas.show',$plaza->idPlaza)}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Centrado de la paginación -->
    <div class="d-flex justify-content-center">
        {{ $plazas->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
    </div>
</div>
