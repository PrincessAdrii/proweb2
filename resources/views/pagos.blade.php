@extends('inicioAlumno')
@section("contenido2")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e9ecef, #f8f9fa);
            font-family: 'Poppins', sans-serif;
            color: #495057;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 70px; /* Altura del menú */
        }

        .form-container {
            max-width: 600px;
            width: 100%;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .form-container:before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
        }

        .form-container:after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
        }

        .form-container h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 14px;
            padding-left: 40px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #6c757d;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #6610f2);
            border: none;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #6610f2, #007bff);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #6c757d;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Animación */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Menú -->
   

    <!-- Contenido -->
    <div class="content">
        <div class="form-container">



            
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif


@if ($accion == 'C')

  <form action="{{route('pagos.store')}}" method="POST" enctype="multipart/form-data">
    <h1>Agregar Pago</h1>

  @elseif ($accion == 'E')
  <h1>Actualizar Pago</h1>

  <form action="{{route('pagos.update', $pago->noctrl)}}" method="POST" enctype="multipart/form-data">

    
  @endif
  
  @csrf
            
            {{-- <form method="POST" action="{{route('pagos.store')}}" enctype="multipart/form-data"> --}}
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($accion == 'C')
                <div class="form-group">
                    <label for="noctrl" class="form-label"><i class="fa-solid fa-user"></i> Número de Control</label>
                    <input type="text" name="noctrl" id="noctrl" class="form-control" 
                           value="{{$alumno->noctrl}}"
                           placeholder="Ingresa el número de control del alumno" required>
                </div>
                @elseif ($accion == 'E')
                <div class="form-group">
                    <label for="noctrl" class="form-label"><i class="fa-solid fa-user"></i> Número de Control</label>
                    <input type="text" name="noctrl" id="noctrl" class="form-control" 
                           value="{{ old('noctrl', $pago->noctrl ?? '') }}" 
                           placeholder="Ingresa el número de control del alumno" required>
                </div>
                
                @endif
                <!-- Tipo de Pago -->
                <div class="form-group">
                    <label for="tipo_pago" class="form-label"><i class="fa-solid fa-credit-card"></i> Tipo de Pago</label>
                    <select name="tipo_pago" id="tipo_pago" class="form-control" required>
                        <option value="" disabled {{ old('tipo_pago', $pago->tipo_pago ?? '') == '' ? 'selected' : '' }}>Selecciona un tipo de pago</option>
                        <option value="banco" {{ old('tipo_pago', $pago->tipo_pago ?? '') == 'banco' ? 'selected' : '' }}>Pago por Banco</option>
                        <option value="transferencia" {{ old('tipo_pago', $pago->tipo_pago ?? '') == 'transferencia' ? 'selected' : '' }}>Pago por Transferencia</option>
                    </select>
                </div>
            
                <!-- Monto -->
                <div class="form-group">
                    <label for="monto_pago" class="form-label"><i class="fa-solid fa-dollar-sign"></i> Monto</label>
                    <input type="number" name="monto_pago" id="monto_pago" class="form-control" 
                           value="{{ old('monto_pago', $pago->monto_pago ?? '') }}" 
                           placeholder="Ingresa el monto" required>
                </div>
            
                <!-- Fecha -->
                <div class="form-group">
                    <label for="fecha_pago" class="form-label"><i class="fa-solid fa-calendar-day"></i> Fecha de Pago</label>
                    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" 
                           value="{{ old('fecha_pago', $pago->fecha_pago ?? '') }}" 
                           required>
                </div>
            
                <!-- Referencia -->
                <div class="form-group">
                    <label for="referencia" class="form-label"><i class="fa-solid fa-pen"></i> Referencia o Detalles</label>
                    <textarea name="referencia" id="referencia" rows="3" class="form-control" 
                              placeholder="Escribe detalles o referencia del pago">{{ old('referencia', $pago->referencia ?? '') }}</textarea>
                </div>
            
                <!-- Comprobante de Pago -->
                <div class="form-group">
                    <label for="comprobante_pago" class="form-label"><i class="fa-solid fa-camera"></i> Comprobante de Pago</label>
                    <input type="file" name="comprobante_pago" id="comprobante_pago" class="form-control" accept="image/*">
                    @if (isset($pago) && $pago->comprobante_pago)
                        <small class="text-muted" required>Comprobante actual: {{ $pago->comprobante_pago }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary w-100">{{$txtbtn}}</button>
            </form>

            <div class="footer">
                
            </div>
        </div>
    </div>
</body>
</html>
@endsection