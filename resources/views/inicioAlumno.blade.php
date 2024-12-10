
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú Alumno</title>
    @vite(['resources/js/app.js'])
    
</head>
<body>
    <div class="container text-center">
        <div class="row">
          <div class="col">
            @include("menuAlumno")
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            @yield("contenido1")

            @empty($__env->yieldContent('contenido1'))
            {{-- <p class="center-text">BIENVENIDOS A MI PAGINA</p> --}}
            @endempty
          </div>
        </div>


        <div class="row">
          <div class="col">
            @yield("contenido2")

            @empty($__env->yieldContent('contenido2'))
              @if(session('turno') && session('turno')->fecha <= \Carbon\Carbon::today()->toDateString() &&
                  session('horario'))
                  <div class="body">
                    <div class="message-container">
                        <p class="center-text3">Su horario del periodo <b>{{ session('horario')->periodo }}</b> se ha guardado correctamente. Puede visualizarlo en la opción "Ver Horario".</p>
                    </div>
                  </div>
              @endif
              {{-- @php
              echo \Carbon\Carbon::now();
              echo ">";
              echo \Carbon\Carbon::parse(session('turno')->hora)->addHour();
              @endphp --}}
              @if(session('turno') && session('turno')->fecha <= \Carbon\Carbon::today()->toDateString() &&
              \Carbon\Carbon::now() > \Carbon\Carbon::parse(session('turno')->hora)->addHour() 
              && empty(session('horario')
              )) 
                  <div class="body">
                    <div class="message-container">
                        <p class="center-text4">¡¡Su turno de {{ session('turno')->inscripcion }} ya ha pasado y no se ha registrado su horario!!</p>
                    </div>
                  </div>
              @endif
              @if(session('turno') && session('turno')->fecha >= \Carbon\Carbon::today()->toDateString() &&
              \Carbon\Carbon::now() <= \Carbon\Carbon::parse(session('turno')->hora)->addHour() 
              && empty(session('horario'))) 
                  <div class="body">
                      <div class="message-container">
                          <p class="center-text">Su turno de {{ session('turno')->inscripcion }} es el día <b>{{ \Carbon\Carbon::parse(session('turno')->fecha)->translatedFormat('d \d\e F \d\e Y') }}</b> a las <b>{{ session('turno')->hora }}</b>. </p>
                          <p class="center-text2">Cuando sea su turno para elegir su horario, se le habilitará la opción "Elegir Horario" en su menú.</p>
                      </div>
                  </div>
              @endif
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