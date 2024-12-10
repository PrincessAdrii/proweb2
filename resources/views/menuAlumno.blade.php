<style>
    .center-text {
        text-align: center;
        font-size: 30px;
        margin: auto;
    }

    .center-text2 {
        text-align: center;
        font-size: 20px;
        color: red;
        margin: auto;
    }

    .center-text3 {
        text-align: center;
        font-size: 30px;
        color: rgb(0, 183, 104);
        margin: auto;
    }

    .center-text4 {
        text-align: center;
        font-size: 40px;
        color: red;
        margin: auto;
    }

    .body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
    }

    /* Contenedor principal */
    .message-container {
        background-color: #fff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 1200px;
    }
</style>

 <ul
 class="nav nav-tabs"
 id="navId"
 role="tablist"
>
 <li class="nav-item">
     <a
         href="#tab1Id"
         class="nav-link active"
         data-bs-toggle="tab"
         aria-current="page"
         >Bienvenidos</a
     >
 </li>
 <li class="nav-item" role="presentation">
    <a href="{{ route('inicioAlumno') }}" class="nav-link">Ver Turno</a>
 </li>
 <li class="nav-item" role="presentation">
    <a href="{{ route('verhorarioalumno') }}" class="nav-link">Ver Horarios</a>
 </li>
 {{-- @php
 echo \Carbon\Carbon::today()->toDateString()
 @endphp --}}
 @if(session('turno') && session('turno')->fecha == \Carbon\Carbon::today()->toDateString() 
 
    &&
        \Carbon\Carbon::now()->between(
        \Carbon\Carbon::parse(session('turno')->hora), 
        \Carbon\Carbon::parse(session('turno')->hora)->addHour()
    ))
    <li class="nav-item" role="presentation">
        <a href="{{ route('horarioalumno') }}" class="nav-link">Elegir Horarios</a>
     </li>
 @endif

 <li class="nav-item" role="presentation">
    <a href="{{ route('inicioAlumnos') }}" class="nav-link">Información</a>
 </li>

    <!-- HORARIOS-->
    {{-- <div class="nav-item dropdown">
        <div></div>
        <a class="nav-link dropdown-toggle" href="#" id="horariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Horarios </a>
            <div class="dropdown-menu">
                <div class="d-flex"> --}}
                    {{-- <li>
                        <a class="dropdown-item" href="{{ route('inicioAlumno') }}" class="nav-link"
                            >Ver Turno</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('verhorarioalumno') }}" class="nav-link"
                            >Ver Horarios</a
                        >
                    </li> --}}
                    {{-- @php
                        use Carbon\Carbon;
                    @endphp
                    @if(session('turno') && session('turno')->fecha == \Carbon\Carbon::today()->toDateString() 
                    &&
                        \Carbon\Carbon::now()->between(
                        \Carbon\Carbon::parse(session('turno')->hora), 
                        \Carbon\Carbon::parse(session('turno')->hora)->addHour()
                    ))
                        <li>
                            <a class="dropdown-item" href="{{ route('horarioalumno') }}" class="nav-link"
                                >Elegir Horario</a
                            >
                        </li>
                    @endif --}}
                    {{-- <li class="nav-item" role="presentation">
                        <form action="{{ url('/cerrarA') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="link-button">Cerrar Sesión</button>
                        </form>
                    </li> --}}
                    {{-- @if(session('alumno'))
                        <li class="li">Alumno: {{ session('alumno')->nombre }} {{ session('alumno')->apellidoP }} {{ session('alumno')->apellidoM }}</li>
                    @endif --}}
                    {{--  --}}
                    {{-- <li><a class="dropdown-item" href="{{route('verhorarioalumno')}}">Ver Horario Alumno</a></li>  --}}
                    {{-- <li><a class="dropdown-item" href="{{route('pagos.store')}}">Pago Del Semestre</a></li> --}}
                    {{-- <li><a class="dropdown-item" href="{{route('inicioAlumnos')}}">Informacion</a></li>
                </div>
            </div>
    </div> --}}
    

    <!-- PROYECTOS IND. -->



    {{-- PERIODO - SELECT --}}
    {{-- <li class="nav-item">
        <select class="form-select" aria-label="Seleccionar periodo">
            <option selected disabled>Periodo</option>
            <option value="ene-jun-24">Ene-Jun 24</option>
            <option value="ago-dic-24">Ago-Dic 24</option>
            <option value="ene-jun-25">Ene-Jun 25</option>
        </select>
    </li> --}}
    
    

 {{-- guest estas como invitado --}}
 {{-- si no esta autentificado --}}
 @guest 

 <li class="nav-item" role="presentation">
     <a href="{{route('inicio')}}" class="nav-link" >Log Out</a>
 </li>
@endguest


 {{-- auth si esta autentificado --}}
@auth
<li class="nav-item" role="presentation">
    <form action="{{route('logout')}}" method="POST">
        {{-- csrf se quita el lgin --}}
        @csrf
        <button style="background:rgb(66, 65, 65);color:white">Log Out</button>
    </form>

</li>
@endauth
</ul>
<!-- Tab panes -->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
        
    </div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>
    {{-- @yield("contenido") --}}
    {{-- @empty($__env->yieldContent('contenido'))
        @if(session('turno') && session('turno')->fecha < \Carbon\Carbon::today()->toDateString() &&
            \Carbon\Carbon::now() > \Carbon\Carbon::parse(session('turno')->hora)->addHour())
            
        @endif
        @if(session('turno') && session('turno')->fecha >= \Carbon\Carbon::today()->toDateString() &&
        \Carbon\Carbon::now() <= \Carbon\Carbon::parse(session('turno')->hora)->addHour() 
        && empty(session('horario'))) 
            <div class="body">
                <div class="message-container">
                    <p class="center-text">Su turno de {{ session('turno')->inscripcion }} es el día <b>{{ \Carbon\Carbon::parse(session('turno')->fecha)->translatedFormat('d \d\e F \d\e Y') }}</b> a las <b>{{ session('turno')->hora }}</b>. </p>
                    <p class="center-text2">Cuando sea su turno para elegir su horario, se le habilitará la sección "Horarios" la opción "Elegir horario" en su menú.</p>
                </div>
            </div>
        @endif
    @endempty --}}
    <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
    <script>
    var triggerEl = document.querySelector("#navId a");
    bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>

  
