
<ul>

</ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>ALUMNOS</H1>
<a href="{{route('Alumnos2.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
    
</a>
<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>

                <th scope="col">No Ctrl</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Sexo</th>
                <th scope="col">Carrera</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->noctrl }}  </td>
                <td>{{ $alumno->nombre }}  </td>
                <td>{{ $alumno->apellidoP }}</td>
                <td>{{ $alumno->apellidoM }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->carrera->nombreCarrera ?? 'N/A' }}</td> 
                <td>
                    <a href="{{route('Alumnos2.edit', $alumno->noctrl)}}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show', $alumno->noctrl)}}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show', $alumno->noctrl)}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $alumnos->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
    
    
</div>
