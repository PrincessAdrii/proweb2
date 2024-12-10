<ul></ul>
@isset($mensaje)
    <p>{{$mensaje}}</p>
@endisset
<H1>RETICULAS</H1>
<a href="{{route('Reticulas.create')}}" class="btn btn-dark mb-3" role="button">
    <i class="fas fa-plus"></i> Insertar
</a>

<div class="table-md">
    <table class="table table-hover table-striped"> <!-- Mantenido el estilo general -->
        <thead class="thead-dark"> <!-- Clase para el color negro en los <th> -->
            <tr>
                
                <th scope="col">Descripción</th>
                <th scope="col">Fecha Vigor</th>
                <th scope="col">Carrera</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                <th scope="col">VER</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($reticulas as $reticula)
                <tr>
                   
                    <td>{{ $reticula->descripcion }}</td>
                    <td>{{ $reticula->fechaEnVigor }}</td>
                    <td>{{ $reticula->carrera->nombreCarrera }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('Reticulas.edit', $reticula->idReticula) }}" role="button">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('Reticulas.show', $reticula->idReticula) }}" role="button">Eliminar</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('Reticulas.show', $reticula->idReticula) }}" role="button">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reticulas->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
</div>
