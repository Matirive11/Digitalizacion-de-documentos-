<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los campos de entrada
        $request->validate([
            'dni' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar con los datos proporcionados desde la tabla `usuarios`
        $usuario = Usuario::where('correo_electronico', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->contrasenia)) {
            // Aquí puedes implementar la lógica para autenticar el usuario
            Auth::login($usuario); // O cualquier otra lógica de autenticación que prefieras

            return redirect()->intended('/dashboard'); // Redirigir al dashboard o la ruta que prefieras
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }
}
