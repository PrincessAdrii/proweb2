@extends('catalogo')

@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        th {
            background-color: #111d5e !important;
            color: white !important;
        }
        tr { 
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    

    
        {{-- CONTENIDO2 DERECHA--}}
        <div class="row">
            <div class="col-7">
               @yield('contenido2')
            </div>
        </div>
       
        {{-- CONTENIDO1 IZQEUIRDA--}}
        <div class="row">
            <div class="col-5">
               @yield('contenido1')
            </div>
        </div>
        
 
         {{-- Pie Pagina --}}
        <div class="row">
            <div class="col">
               @yield('piepagina')
            </div>
        </div>

    </div>
    
</body>
</html>

@endsection

