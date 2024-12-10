@extends('inicio2')

@section('contenido1')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Grupos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Asignación de Grupos</h1>
        <div class="form-group">
            <label>Fecha:</label>
            <input type="date">
            <label>Grupo:</label>
            <input type="text" placeholder="Grupo">
            <label>Max. Alu:</label>
            <input type="number" placeholder="Máximo de Alumnos">
            <label>Descripción:</label>
            <input type="text" placeholder="Descripción">
            <button>Iniciar Horario del Grupo</button>
        </div>

        <div class="selections">
            <div class="semester">
                <label for="semester">Semestre</label>
                <select id="semester">
                    <option>Semestre 1</option>
                    <option>Semestre 2</option>
                    <!-- Más opciones de semestre -->
                </select>
                <div class="subjects">
                    <label><input type="radio" name="subject"> Mat 1</label>
                    <label><input type="radio" name="subject"> Pro 1</label>
                    <label><input type="radio" name="subject"> BD 1</label>
                    <!-- Más materias -->
                </div>
            </div>

            <div class="professor">
                <label for="professor">Profesores</label>
                <select id="professor">
                    <option>Ing. Antonio Ch.</option>
                    <option>Ing. David C.</option>
                    <!-- Más opciones de profesor -->
                </select>
            </div>

            <div class="building">
                <label for="building">Edificio</label>
                <select id="building">
                    <option>Edificio K</option>
                    <!-- Más edificios -->
                </select>
                <div class="classrooms">
                    <label><input type="radio" name="classroom"> Salón K1</label>
                    <label><input type="radio" name="classroom"> Salón K2</label>
                    <!-- Más salones -->
                </div>
            </div>
        </div>

        <div class="schedule">
            <table>
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>L</th>
                        <th>M</th>
                        <th>Mi</th>
                        <th>J</th>
                        <th>V</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Genera filas para cada hora -->
                    <tr>
                        <td>8-9</td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <!-- Más filas para otras horas -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


@endsection

