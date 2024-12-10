<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        body {
            min-height: 100vh;
        }

        .center-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .center-text {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            gap: 20px;
        }

        .custom-btn {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-docentes {
            background-color: #4CAF50;
        }

        .btn-docentes:hover {
            background-color: #45a049;
        }

        .btn-alumnos {
            background-color: #2196F3;
        }

        .btn-alumnos:hover {
            background-color: #1976d2;
        }

        .btn-admin {
            background-color: #ff8800;
        }

        .btn-admin:hover {
            background-color: #bc5a21;
        }

        footer {
            background-color: #e6e6e6;
            text-align: center;
            padding: 10px;
            margin-top: auto;
            width: 100%;
        }
    </style>
    <title>Document</title>
</head>
<body>

    @include("menu")

    <div class="center-container">
        @yield("contenido1")
        @empty($__env->yieldContent('contenido1'))
        <p class="center-text">SII</p>
        <div class="btn-container">
            <a href="{{ url('/inicios') }}" class="custom-btn btn-docentes">Para Docentes</a>
            <a href="{{ url('/iniciosA') }}" class="custom-btn btn-alumnos">Para Alumnos</a>
            <a href="{{ url('/iniciosADMIN') }}" class="custom-btn btn-admin">Administrador</a>
        </div>
        @endempty
    </div>

    {{-- <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text">
                <a href="https://www.php.net/" target="_blank">PHP</a>
            </span>
        </div>
    
        <div class="container text-center">
            <span class="text">
                <a href="https://www.laravel.com/" target="_blank">LARAVEL</a>
            </span>
        </div>
    
        <div class="container text-center">
            <span class="text">
                <a href="https://lenguajehtml.com/html/" target="_blank">HTML</a>
            </span>
        </div>
    
        <div class="container text-center">
            <span class="text">
                <a href="http://javascript.com" target="_blank">JAVASCRIPT</a>
            </span>
        </div>
    
        <div class="container text-center">
            <span class="text">
                <a href="https://developer.mozilla.org/es/docs/Learn/Getting_started_with_the_web/CSS_basics" target="_blank">CSS</a>
            </span>
        </div>
    
    </footer> --}}
</body>
</html>
