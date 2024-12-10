@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')

    @include('Puestos/tablahtml')

@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')

@foreach ( $errors->all() as $error )
  <li>
    {{$error}}
  </li>
@endforeach

@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{ route('Puestos.store') }}" method="POST">
@elseif ($accion == 'E')
  <h1>EDITANDO FORMULARIO</h1> 
  <form action="{{ route('Puestos.update', $puesto->idPuesto) }}" method="POST">
@elseif ($accion == 'D')
  <h1>PARA ELIMINAR</h1> 
  <form action="{{ route('Puestos.destroy', $puesto) }}" method="POST">
@endif

  @csrf

  <div class="row mb-3">
    <label for="nombrePuesto" class="col-sm-3 col-form-label">Nombre</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nombrePuesto" name="nombrePuesto" value="{{ old('nombre', $puesto->nombrePuesto) }}" {{$des}}>
      @error('nombrePuesto')
        <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
    <div class="col-sm-9">
      <select name="tipo" id="tipo" class="form-control" {{$des}}>
        <option value="Docente" @if(old('tipo', $puesto->tipo) == 'Docente') selected @endif>Docente</option>
        <option value="Dirección" @if(old('tipo', $puesto->tipo) == 'Dirección') selected @endif>Dirección</option>
        <option value="No Docente" @if(old('tipo', $puesto->tipo) == 'No Docente') selected @endif>No Docente</option>
        <option value="Auxiliar" @if(old('tipo', $puesto->tipo) == 'Auxiliar') selected @endif>Auxiliar</option>
        <option value="Administrativo" @if(old('tipo', $puesto->tipo) == 'Administrativo') selected @endif>Administrativo</option>
      </select>
      @error('tipo')
        <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>

  
  <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>

</form>

@endsection
