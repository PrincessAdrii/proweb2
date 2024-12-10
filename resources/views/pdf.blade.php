<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f9;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    @if($alumnoHorarios->isNotEmpty())
        <div class="header">
            <h2>Horario del Alumno</h2>
            <p>Periodo: {{ $alumnoHorarios->first()->periodo }}</p>
            <p>No. de Control: {{ $alumnoHorarios->first()->noctrl }}</p>
            <p>Nombre: {{ $alumnoHorarios->first()->nombre }} {{ $alumnoHorarios->first()->apellidoP }} {{ $alumnoHorarios->first()->apellidoM }}</p>
            <p>Carrera: {{ $alumnoHorarios->first()->nombreCarrera }}</p>
            <p>Especialidad: {{ $alumnoHorarios->first()->descripcion }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Grupo</th>
                    <th>Créditos</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnoHorarios as $horario)
                <tr>
                    <td>
                        <b>{{ $horario->idMateria }}</b> <br>
                        {{ $horario->nombreMateria }} <br>
                        {{ $horario->personal_nombre }} {{ $horario->personal_apellidoP }} {{ $horario->personal_apellidoM }}
                    </td>
                    <td>{{ $horario->grupo }}</td>
                    <td>{{ $horario->creditos }}</td>
                    <td>{{ $horario->lunes }}</td>
                    <td>{{ $horario->martes }}</td>
                    <td>{{ $horario->miercoles }}</td>
                    <td>{{ $horario->jueves }}</td>
                    <td>{{ $horario->viernes }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron horarios para este período.</p>
    @endif

    <div class="footer">
        <p>Generado el {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
