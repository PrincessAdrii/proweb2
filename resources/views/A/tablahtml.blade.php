<ul>

</ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset

<a href="{{route('Alumnos2.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
    
</a>
<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">No Ctrl</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Sexo</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td scope="row">{{ $alumno->id }}</td>
                <td>{{ $alumno->noctrl }}  </td>
                <td>{{ $alumno->nombre }}  </td>
                <td>{{ $alumno->apellidoP }}</td>
                <td>{{ $alumno->apellidoM }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>
                    <a href="{{route('Alumnos2.edit',$alumno->id)}}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show',$alumno->id)}}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show',$alumno->id)}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $alumnos->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
    
    
</div>
