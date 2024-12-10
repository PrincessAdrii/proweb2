
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CATALGOS</title>
    {{-- vite sirve el boostrap --}}
    @vite(['resources/js/app.js'])
    
</head>
<body>
    <div class="container text-center">
        <div class="row">
          <div class="col">
           
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            @yield("contenido1")

            @empty($__env->yieldContent('contenido1'))
            
            @endempty
          </div>
        </div>


        <div class="row">
          <div class="col">
            @yield("contenido2")

            @empty($__env->yieldContent('contenido2'))
           
            @endempty
          </div>
        </div>

      

        <footer class="footer mt-auto py-3 bg-light">
          <div class="container">
            <span class="text-muted">
                
                @auth
                {{-- Mostrar información del usuario autenticado --}}
                Usuario: {{ Auth::user()->name }} |
                Correo: {{ Auth::user()->email }}
                
                @endauth
            </span>
          </div>
        </footer>
      </div>
      
</body>
</html>