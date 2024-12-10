@extends('inicio2')

@section('title', 'Verificación de Docente')

@section('contenido1')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Materias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .content {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .btn:disabled {
            background-color: #cccccc;
            border-color: #cccccc;
        }

        .checkbox-group {
            margin-bottom: 20px;
        }

        .checkbox-group label {
            font-size: 16px;
            font-weight: 500;
            color: #495057;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }

        .materia-section {
            margin-bottom: 30px;
        }

        .materia-section h5 {
            color: #007bff;
        }

        .materia-info {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="text-center mb-4">Selección de Materias</h1>

        <!-- Datos del Alumno -->
        <div>
            <h4>Información del Alumno</h4>
            <p><strong>Número de Control:</strong> 12345</p>
            <p><strong>Nombre:</strong> Juan Pérez</p>
            <p><strong>Carrera:</strong> Ingeniería en Sistemas</p>
        </div>

        <!-- Formulario de Selección de Materias -->
        <form method="GET" action="/guardar-seleccion">
            @csrf <!-- Este campo es obligatorio si planeas usarlo con Laravel -->

            <!-- Materias Mañana -->
            <div class="materia-section">
                <h5>Materias de la Mañana</h5>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="materia1" name="materias[]" value="Matemáticas Avanzadas" checked>
                    <label class="form-check-label" for="materia1">
                        Matemáticas Avanzadas
                    </label>
                    <div class="materia-info">Docente: Dr. Sergio Castillon | Horario: 08:00 AM - 10:00 AM</div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="materia2" name="materias[]" value="Programación I" checked>
                    <label class="form-check-label" for="materia2">
                        Programación I
                    </label>
                    <div class="materia-info">Docente: Mtra. Hilda Patricia | Horario: 10:00 AM - 12:00 PM</div>
                </div>
            </div>

            <!-- Materias Tarde -->
            <div class="materia-section">
                <h5>Materias de la Tarde</h5>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="materia3" name="materias[]" value="Estructuras de Datos">
                    <label class="form-check-label" for="materia3">
                        Estructuras de Datos
                    </label>
                    <div class="materia-info">Docente: Dr. Roberto Espinoza | Horario: 02:00 PM - 04:00 PM</div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="materia4" name="materias[]" value="Redes de Computadoras">
                    <label class="form-check-label" for="materia4">
                        Redes de Computadoras
                    </label>
                    <div class="materia-info">Docente: Ing. Antonio Chavez Soto | Horario: 04:00 PM - 06:00 PM</div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="materia5" name="materias[]" value="Bases de Datos">
                    <label class="form-check-label" for="materia5">
                        Bases de Datos
                    </label>
                    <div class="materia-info">Docente: Mtra. Flor de Maria Rivera | Horario: 06:00 PM - 08:00 PM</div>
                </div>
            </div>

            <!-- Botón para continuar -->
            {{-- <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-100" formaction="{{ route('inscribirse') }}">Inscribirse</button>

            </div> --}}
        </form>
    </div>
</body>
</html>
@endsection
