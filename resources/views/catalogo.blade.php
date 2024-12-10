@extends('inicio2')

@section("contenido2")

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    nav {
    width: 200px;
    height: 100vh;
    background-color: #f8f9fa;
    padding: 15px;
      }

      nav a {
          display: block;
          margin: 5px 0;
          color: #333;
          text-decoration: none;
      }

      nav a:hover {
          background-color: #e2e6ea;
          border-radius: 5px;
      }

  </style>
</head>
<body>
  <div class="d-flex">
    <nav class="nav flex-column bg-light p-3" style="width: 200px; height: 100vh;">
        <a class="nav-link" href="{{route ('Periodos.index')}}">Periodos</a>
        <a class="nav-link" href="{{ route('Plazas.index') }}">Plazas</a>
        <a class="nav-link" href="{{ route('Puestos.index') }}">Puestos</a>
        <a class="nav-link" href="{{route ('Alumnos.index')}}">Alumnos</a>
        <a class="nav-link" href="{{route ('Deptos.index')}}">Deptos.</a>
        <a class="nav-link" href="{{route ('Carreras.index')}}">Carreras</a>
        <a class="nav-link" href="{{route ('Reticulas.index')}}">Retículas</a>
        <a class="nav-link" href="{{route ('Materias.index')}}">Materias</a>
        <a class="nav-link" href="{{route ('MateriasA.index')}}">Materias Abiertas</a>
        <a class="nav-link" href="#">Personal Plaza</a>
        <a class="nav-link" href="#">Personal</a>
        <a class="nav-link" href="#">Edificios</a>
        <a class="nav-link" href="#">Lugares</a>
       
    </nav>

    <div class="col-md-10">
      <!-- Tab panes -->
      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
              <!-- Contenido para la pestaña 1 -->
          </div>
          <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
          <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
          <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
          <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
      </div>
      @yield("contenido1")
  </div>
</div>
</div>

<!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
<script>
  var triggerEl = document.querySelector("#navId a");
  bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
  </script>
  @endsection