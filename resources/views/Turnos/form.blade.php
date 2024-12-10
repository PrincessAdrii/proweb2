@extends("inicio2")

@section("contenido1")
<!-- Aquí iría contenido general si es necesario -->
@endsection

@section("contenido2")


@if ($accion=='C')
<form action="{{ route('Turnos.store') }}" method="POST" id="formTurno" class="container">

  @endif
  @if ($accion=='E')
  <form action="{{ route('Turnos.update', ['idTurno' => $turno->idTurno]) }}" method="POST" id="formTurno" class="container">

  

      <h1>Editar</h1>
  @endif
@if ($accion=='D')
<form action="{{route('Turnos.eliminar', $turno)}}" method="POST" id="formTurno" class="container">
  <h1>Ver y Eliminar</h1>
@endif

  @csrf

    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #333;">Asignar Turno</h1>

    <div class="card shadow-lg p-5" style="border-radius: 15px; background-color: #f9f9f9;">
        <div class="row">
            <!-- Campo: Número de Control -->
            <div class="col-md-6 mb-4">
                <label for="noctrl" class="form-label" style="font-weight: 500;">Número de Control</label>
                <input type="text" class="form-control" id="noctrl" name="noctrl" value="{{ old('noctrl', $turno->noctrl ??  $noctrl) }}" maxlength="8" required readonly  
                       style="border-radius: 8px; padding: 12px; background-color: #e9ecef;">
            </div>

            <!-- Campo: Fecha del Turno -->
            <div class="col-md-6 mb-4">
                <label for="fecha" class="form-label" style="font-weight: 500;">Fecha del Turno</label>
                <input type="date" class="form-control" id="fecha" name="fecha" 
                       value="{{ old('fecha', $turno->fecha ?? '') }}" 
                       required 
                       style="border-radius: 8px; padding: 12px;">
            </div>
        </div>

        <div class="row">
            <!-- Campo: Hora del Turno -->
            <div class="col-md-6 mb-4">
                <label for="hora" class="form-label" style="font-weight: 500;">Hora del Turno</label>
                <input type="time" class="form-control" id="hora" name="hora" 
                       value="{{ old('hora', $turno->hora ?? '') }}" 
                       required 
                       style="border-radius: 8px; padding: 12px;">
            </div>

          

        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="btnAsignarTurno" 
                    style="font-weight: 600; font-size: 1.1rem; border-radius: 25px; padding: 12px 40px; 
                           background-color: #007bff; border: none; box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.3);">
                {{$txtbtn}}
            </button>
        </div>
 
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
    @endif
</form>

@endsection

@section("contenido2")
<!-- Aquí puedes incluir otro contenido si es necesario -->
@endsection
