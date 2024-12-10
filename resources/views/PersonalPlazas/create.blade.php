@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('PersonalPlazas/tablahtml')
@endsection

{{-- CONTENIDO2 --}}
@section('contenido2')
<h1>Insertando</h1> 
<form action="{{ route('PersonalPlazas.store') }}" method="POST">
  @csrf

  {{-- Campo ID Personal --}}
  <div class="row mb-3">
    <label for="idPersonal" class="col-sm-3 col-form-label">ID Personal</label>
    <div class="col-sm-9">
      <select class="form-control" id="idPersonal" name="idPersonal">
        @foreach ($personales as $personal)
          <option value="{{ $personal->idPersonal }}">
            {{ $personal->nombre }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  {{-- Campo ID Plaza --}}
  <div class="row mb-3">
    <label for="idPlaza" class="col-sm-3 col-form-label">ID Plaza</label>
    <div class="col-sm-9">
      <select class="form-control" id="idPlaza" name="idPlaza">
        @foreach ($plazas as $plaza)
          <option value="{{ $plaza->idPlaza }}">
            {{ $plaza->nombrePlaza }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  {{-- Campo Tipo de Nombramiento --}}
  <div class="row mb-3">
    <label for="tipoNombramiento" class="col-sm-3 col-form-label">Tipo de Nombramiento</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="tipoNombramiento" name="tipoNombramiento">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
