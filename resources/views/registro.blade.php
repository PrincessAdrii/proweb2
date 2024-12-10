<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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

        .form-container h2 {
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

        .success-message {
            color: #10b981;
            font-size: 14px;
            margin-top: 15px;
        }

        .error-messages {
            color: #ef4444;
            font-size: 14px;
            margin-top: 15px;
            text-align: left;
        }

        .form-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #3b82f6;
            text-decoration: none;
        }

        .form-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registro de Docente</h1>
        <form action="{{ url('/registro') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="idPersonal">ID Personal:</label>
                <input type="text" name="idPersonal" id="idPersonal" required>
            </div>
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="password" name="nip" id="nip" required>
            </div>
            <button type="submit" class="form-button">Registrar</button>
        </form>
        @if($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        <p><a href="{{ url('/inicios') }}" class="form-link">¿Ya tienes una cuenta? Inicia sesión aquí</a></p>
    </div>
</body>
</html>
