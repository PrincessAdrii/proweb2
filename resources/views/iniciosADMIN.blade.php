<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f3f4f6;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.3);
        }

        .form-button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-button:hover {
            background: #2563eb;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 15px;
        }

        .form-link {
            display: block;
            margin-top: 15px;
            color: #3b82f6;
            text-decoration: none;
            font-size: 14px;
        }

        .form-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Iniciar Sesión - Admin</h1>
        <form action="{{ url('/iniciosADMIN') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Usuario Administrador:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="form-button">Iniciar Sesión</button>
        </form>
        
        @if($errors->has('iniciosADMIN'))
            <p class="error-message">{{ $errors->first('iniciosADMIN') }}</p>
        @endif
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        {{-- <p><a href="{{ url('/registroAdmin') }}" class="form-link">¿Aún no tienes una cuenta? Regístrate aquí</a></p> --}}
    </div>
</body>
</html>
