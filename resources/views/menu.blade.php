 <!-- Nav tabs -->
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


 {{-- <li class="nav-item" role="presentation">
    <a href="" class="nav-link" 
        >Acerca de </a>
</li>

<li class="nav-item" role="presentation">
    <a href="" class="nav-link" 
        >Contactanos</a>
</li>

<li class="nav-item" role="presentation">
    <a href="" class="nav-link" 
        >Ayuda </a>
</li> --}}



 {{-- guest estas como invitado --}}
 {{-- si no esta autentificado --}}
 @guest 
 {{-- <li class="nav-item" role="presentation">
     <a href="{{route('login')}}" class="nav-link  text-success" 
         >Login</a>
 </li>

 <li class="nav-item" role="presentation">
    <a href="{{route('register')}}" class="nav-link  text-danger" 
        >Register</a>
</li> --}}
@endguest




 {{-- auth si esta autentificado --}}
@auth
<li class="nav-item" role="presentation">
    <form action="{{route('logout')}}" method="POST">
        {{-- csrf se quita el lgin --}}
        @csrf
        <button>Log Out</button>
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
@auth
{{ Auth::user()->name}}
<br>
{{ Auth::user()->email}}
@endauth


