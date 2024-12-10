
<ul>

</ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>CARRERAS</H1>
<a href="{{route('Carreras.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
    
</a>
<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>

                
                <th scope="col">Nombre Carrera</th>
                <th scope="col">Nombre Mediano</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">Id Depto</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($carreras as $carrera)
            <tr>
                {{-- <td>{{ $carrera->idCarrera }}  </td> --}}
                <td>{{ $carrera->nombreCarrera }}  </td>
                <td>{{ $carrera->nombreMediano }}</td>
                <td>{{ $carrera->nombreCorto }}</td>
                <td>{{ $carrera->depto->nombreDepto ?? 'N/A' }}</td> <!-- Aquí mostramos la carrera -->
                <td>
                    <a href="{{route('Carreras.edit', $carrera->idCarrera)}}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{route('Carreras.show', $carrera->idCarrera)}}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{route('Carreras.show', $carrera->idCarrera)}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $carreras->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
    
    
</div>
