@isset($mesaje)
    

<p>{{$mensaje}}</p>
@endisset
    <a
        name=""
        id="nuevo"
        class="btn btn-primary"
        href="{{route('Turnos.create')}}"
        role="button"
        >Nuevo</a
    >
   
    {{--  --}}
   <div
    class="table-responsive-md"
   >
    <table
        class="table  table-hover table-striped custom-table"
    >
        <thead class="table-dark ">
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
            @foreach ($turnos as $turno)
                <tr>
                   
                    <td>{{ $turno->fecha }}</td>
                    <td>{{ $turno->noctrl }}</td>
                    <td>{{ $turno->inscripcion }}</td>
   
                
                <td><a
                    name=""
                    id=""
                    class="btn btn-warning"
                    href="{{route('Turnos.editar',$turno->idTurno)}}"
                    role="button"
                    >editar</a
                >
                </td>
                <td><a
                    name=""
                    id=""
                    class="btn btn-danger"
                    href="{{route('Turnos.ver',$turno->idTurno)}}"
                    role="button"
                    >Eliminar</a
                >
                </td>
                <td><a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="{{route('Turnos.ver',$turno->idTurno)}}"
                    role="button"
                    >Ver</a
                >
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
   
   </div>
   

   
         
