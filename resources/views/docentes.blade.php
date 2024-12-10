@extends('inicioDocente')

@section('title', 'Gestión de Calificaciones')

@section('contenido1')
<div class="container mt-5">
    <!-- Título principal -->
    <div class="text-center mb-4">
        <h1 class="display-5">Gestión de Calificaciones</h1>
        <p class="text-muted">Administra las calificaciones de tus alumnos de forma sencilla.</p>
    </div>

    <!-- Información del Docente -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="mb-0">Bienvenido, 
                <span class="text-primary">{{ $docente->nombre }} {{ $docente->apellidoP }} {{ $docente->apellidoM }}</span>
            </h4>
            <small class="text-muted">Por favor, selecciona un grupo para continuar.</small>
        </div>
    </div>

    <!-- Selección de Grupo -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Seleccionar Grupo</h5>
            <select id="grupoSelect" name="grupo" class="form-select">
                <option value="">-- Selecciona un grupo --</option>
                @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->idGrupo }}">{{ $grupo->grupo }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Tabla de Alumnos -->
    <div id="alumnosContainer" class="card shadow mb-4" style="display: none;">
        <div class="card-body">
            <h5 class="card-title">Lista de Alumnos</h5>
            <form id="calificacionesForm" method="POST">
                @csrf
                <table class="table table-bordered table-hover">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Número de Control</th>
                            <th>Nombre</th>
                            <th>Calificación</th>
                        </tr>
                    </thead>
                    <tbody id="alumnosTableBody">
                        <!-- Contenido generado por AJAX -->
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success w-100 mt-3" disabled>Guardar Calificaciones</button>
            </form>
        </div>
    </div>
</div>

<!-- Script -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const grupoSelect = document.getElementById('grupoSelect');
    const alumnosContainer = document.getElementById('alumnosContainer');
    const alumnosTableBody = document.getElementById('alumnosTableBody');
    const calificacionesForm = document.getElementById('calificacionesForm');
    const submitButton = calificacionesForm.querySelector('button[type="submit"]');

    // Contenedor del mensaje
    const mensajeFaltanCalificaciones = document.createElement('p');
    mensajeFaltanCalificaciones.style.color = 'red';
    mensajeFaltanCalificaciones.style.fontWeight = 'bold';
    mensajeFaltanCalificaciones.style.marginTop = '10px';
    mensajeFaltanCalificaciones.style.display = 'none'; // Inicialmente oculto
    mensajeFaltanCalificaciones.textContent = 'Faltan alumnos por calificar.';
    alumnosContainer.appendChild(mensajeFaltanCalificaciones);

    grupoSelect.addEventListener('change', function () {
        const idGrupo = this.value;

        if (idGrupo) {
            calificacionesForm.action = `/docentes/${idGrupo}`;
            fetch(`/docentes/${idGrupo}/alumnos`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    alumnosTableBody.innerHTML = '';

                    if (data.alumnos.length > 0) {
                        let faltanCalificaciones = false;

                        data.alumnos.forEach(alumno => {
                            const faltaCalificacion = alumno.calificacion === null;

                            alumnosTableBody.innerHTML += `
                                <tr class="text-center">
                                    <td>${alumno.noctrl}</td>
                                    <td>${alumno.nombre}</td>
                                    <td>
                                        <input type="number" name="calificaciones[${alumno.id}]" 
                                               value="${alumno.calificacion !== null ? alumno.calificacion : ''}" 
                                               class="form-control" 
                                               min="0" 
                                               max="100" 
                                               ${faltaCalificacion ? '' : 'disabled'}>
                                    </td>
                                </tr>`;
                            if (faltaCalificacion) {
                                faltanCalificaciones = true;
                            }
                        });

                        // Mostrar mensaje si faltan calificaciones
                        mensajeFaltanCalificaciones.style.display = faltanCalificaciones ? 'block' : 'none';
                        submitButton.disabled = faltanCalificaciones;
                        alumnosContainer.style.display = 'block';
                    } else {
                        alumnosTableBody.innerHTML = `
                            <tr>
                                <td colspan="3" class="text-center">No hay alumnos en este grupo.</td>
                            </tr>`;
                        submitButton.disabled = true;
                        mensajeFaltanCalificaciones.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar los alumnos.');
                });
        }
    });
 
    alumnosTableBody.addEventListener('input', function () {
        const inputs = alumnosTableBody.querySelectorAll('input[type="number"]');
        let faltanCalificaciones = false;

        inputs.forEach(input => {
            if (!input.value) {
                faltanCalificaciones = true;
            }
        });

        mensajeFaltanCalificaciones.style.display = faltanCalificaciones ? 'block' : 'none';
        submitButton.disabled = faltanCalificaciones;
    });

    calificacionesForm.addEventListener('submit', function (event) {
        event.preventDefault();

        fetch(calificacionesForm.action, {
            method: 'POST',
            body: new FormData(calificacionesForm),
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor.');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message || 'Calificaciones guardadas correctamente.');

                    const inputs = alumnosTableBody.querySelectorAll('input[type="number"]');
                    inputs.forEach(input => input.disabled = true);

                    submitButton.disabled = true;
                    mensajeFaltanCalificaciones.style.display = 'none';
                } else {
                    alert(data.message || 'Error al guardar calificaciones.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error inesperado al guardar las calificaciones. Verifica los logs.');
            });
    });
});


    
</script>

@endsection

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 10px;
    }

     .table thead th {
        background-color: #007bff;
        color: white;
    }

    .btn {
        font-size: 1.1rem;
    }
</style>
