
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

    <!-- HORARIOS-->
    {{-- <div class="nav-item dropdown">
        <div></div>
        <a class="nav-link dropdown-toggle" href="#" id="horariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Horarios </a>
            <div class="dropdown-menu">
                <div class="d-flex"> --}}
                    <li class="nav-item" role="presentation">
                        <a  href="docentes" class="nav-link">Gestión de Calificaciones</a>
                    </li>
{{-- 
                </div>
            </div>
        </div>
     --}}

    <!-- PROYECTOS IND. -->
{{-- <div class="nav-item dropdown">
    <div></div>
    <a class="nav-link dropdown-toggle" href="#" id="catalogoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Proyectos Ind.
    </a>
    <div class="dropdown-menu">
        <div class="d-flex">
            <li><a class="dropdown-item" href="#">Capacitación</a></li>
            <li><a class="dropdown-item" href="#">Asesorías Doc.</a></li>
            <li><a class="dropdown-item" href="#">Proyectos</a></li>
            <li><a class="dropdown-item" href="#">Material Didáctico</a></li>
            <li><a class="dropdown-item" href="#">Docencia e Inv</a></li>
            <li><a class="dropdown-item" href="#">Asesorías Proyectos Ext.</a></li>
        </div>
    </div>
</div> --}}

    {{-- INSTRUMENTACION --}}
    {{-- <li class="nav-item" role="presentation">
        <a href="#" class="nav-link">Instrumentacion</a>
    </li> --}}

    {{-- TUTORIAS --}}
    {{-- <li class="nav-item" role="presentation">
        <a href="#" class="nav-link" 
            >Tutorias </a>
    </li> --}}

    {{-- PERIODO - SELECT --}}
    <li class="nav-item">
        <select class="form-select" aria-label="Seleccionar periodo">
            <option selected disabled>Periodo</option>
            <option value="ene-jun-24">Ene-Jun 24</option>
            <option value="ago-dic-24">Ago-Dic 24</option>
            <option value="ene-jun-25">Ene-Jun 25</option>
        </select>
    </li>
    
    

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
    
    <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
    <script>
    var triggerEl = document.querySelector("#navId a");
    bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>

  
