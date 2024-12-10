<style>
    .body {
        font-family: Arial, sans-serif;
        /* background-color: #f4f4f9; */
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
        max-width: 500px;
    }

    .center-text5 {
        text-align: center;
        font-size: 40px;
        color: rgb(0, 183, 104);
        margin: auto;
    }

    /* Estilos de los párrafos */
    p {
        font-size: 18px;
        color: #333;
    }
</style>
@extends('inicioAlumno')

@section('title', 'Horario')

@section('contenido2')
    <div class="body">
        <div class="message-container">
            <p class="center-text5">¡Su horario ha sido creado exitosamente!</p>
            <p>Puede visualizarlo en la opción "Ver Horarios".</p>
        </div>
    </div>
@endsection