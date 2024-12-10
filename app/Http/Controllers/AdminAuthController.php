<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{ 
    public function iniciosADMIN(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        // Consulta en la tabla `admin_usuarios`
        $admin = DB::table('admin_usuarios')->where('username', $username)->first();
    
        if ($admin 
        //&& Hash::check($password, $admin->password)
        ) {
            // Guardar datos del administrador en la sesión
            session(['admin' => $admin]);
    
            // Redirigir a la vista inicio2
            return redirect('/inicio2')->with('success', 'Inicio de sesión exitoso.');
        }
     }
    

    public function cerrar()
    {
        // Cerrar sesión
        session()->forget('admin');
        return redirect('/inicio')->with('success', 'Sesión cerrada correctamente.');
    }

    public function registroAdmin(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'username' => 'required',
           
            'password' => 'required',
        ]);

        // Insertar en la tabla AdminUsuario
        DB::table('admin_usuarios')->insert([
            'username' => $request->input('username'),
         
            'password' => Hash::make($request->input('password')), // Encriptar la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirigir al login con mensaje de éxito
        return redirect('/inicio2')->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
    }
}
