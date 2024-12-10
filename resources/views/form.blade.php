<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(145deg, #ffffff, #e8eff1);
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background-color: #343a40;
            padding: 10px;
        }

        .navbar .nav-link {
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #007bff;
        }

        .content-container {
            margin-top: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
        }

        .form-container {
            max-width: 600px;
            width: 100%;
            padding: 40px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-in-out;
        }

        .form-container h1 {
            text-align: center;
            font-size: 32px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 30px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
            display: flex;
            align-items: center;
        }

        .form-label i {
            color: #2575fc;
            margin-right: 8px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            padding-left: 40px;
            position: relative;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #555;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            border: none;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 15px;
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 91, 187, 0.4);
        }

        .btn-primary:active {
            transform: translateY(1px);
        }

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

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #777;
        }

        .footer a {
            color: #2575fc;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
@extends('inicioAlumno')

@section('contenido2')
<body>
   

    <div class="content-container">
        <div class="form-container">
            <h1>Subir Documentos</h1>
            <form method="POST" action="{{ route('documentos.store', $alumno->noctrl) }}" enctype="multipart/form-data">

                @csrf
                <div class="mb-4 position-relative">
                    <label for="noctrl" class="form-label"><i class="fa-solid fa-id-badge"></i> Número de Control</label>
                    <input type="text" name="noctrl" id="noctrl" class="form-control" value="{{$alumno->noctrl}}" required readonly>
                    <i class="fa-solid fa-file-upload input-icon"></i>
                </div>
                <div class="mb-4 position-relative">
                    <label for="curp" class="form-label"><i class="fa-solid fa-id-card"></i> CURP</label>
                    <input type="file" name="curp" id="curp" class="form-control" required>
                    <i class="fa-solid fa-file-upload input-icon"></i>
                </div>

                <div class="mb-4 position-relative">
                    <label for="acta_nacimiento" class="form-label"><i class="fa-solid fa-scroll"></i> Acta de Nacimiento</label>
                    <input type="file" name="acta_nacimiento" id="acta_nacimiento" class="form-control" required>
                    <i class="fa-solid fa-file-upload input-icon"></i>
                </div>

                <div class="mb-4 position-relative">
                    <label for="titulo_preparatoria" class="form-label"><i class="fa-solid fa-graduation-cap"></i> Título de la Preparatoria</label>
                    <input type="file" name="titulo_preparatoria" id="titulo_preparatoria" class="form-control" required>
                    <i class="fa-solid fa-file-upload input-icon"></i>
                </div>

                <button type="submit" class="btn btn-primary w-100">Subir Documentos</button>
            </form>

            <div class="footer"></div>
        </div>
    </div>
</body>

</html>

@endsection
