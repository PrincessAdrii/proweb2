<ul></ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>MATERIAS</H1>
<a href="{{route('Materias.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
              
                <th scope="col">Nombre Materia</th>
                
                <th scope="col">Nombre Mediano</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">creditos</th>
                <th scope="col">Nivel</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Semestre</th>
                <th scope="col">Retícula</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
                <tr>
                    
                    <td>{{ $materia->nombreMateria }}</td>
                    
                    <td>{{ $materia->nombreMediano }}</td>
                    <td>{{ $materia->nombreCorto }}</td>
                    <td>{{ $materia->creditos }}</td>
                    <td>{{ $materia->nivel }}</td>
                    <td>{{ $materia->modalidad }}</td>
                    <td>{{ $materia->semestre }}</td>
                    <td>{{ $materia->reticula->descripcion }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('Materias.edit', $materia->idMateria) }}" role="button">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('Materias.show', $materia->idMateria) }}" role="button">Eliminar</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('Materias.show', $materia->idMateria) }}" role="button">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $materias->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
