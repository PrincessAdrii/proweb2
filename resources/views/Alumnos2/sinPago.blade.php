@extends('/Alumnos2/logOut')

@section("contenido1")

<div class="d-flex align-items-center justify-content-center vh-100" >
    <div class="text-center p-5 shadow rounded" style="background-color: #f0f8ff; animation: fadeIn 1s ease-in-out; max-width: 600px;">
        <h1 class="display-4 text-primary mb-4" style="font-weight: bold;">No cuentas con documentación aún</h1>
        <p class="lead text-dark">Por favor, espera a que se actualicen tus documentos.</p>
        <a href="{{route('inicio')}}" class="btn btn-primary btn-lg mt-4">Volver al inicio</a>
      
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection
