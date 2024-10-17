<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol; // Asegúrate de importar el modelo Rol
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de usuarios
        $usuarios = Usuario::with('rol')->get(); // Cargar la relación 'rol'

        // Devolver la vista con los usuarios
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $roles = Rol::all(); // Obtener todos los roles disponibles
        return view('usuario.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $datos = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
            'rol_id' => 'required|exists:roles,id', // Asegúrate que el rol existe
        ]);

        // Crear el usuario
        $datos['password'] = Hash::make($datos['password']); // Encriptar la contraseña
        Usuario::create($datos); // Crear el usuario

        // Redirigir con un mensaje de éxito
        return redirect()->route('usuario.index')->with('exito', 'El usuario se ha creado correctamente.');
    }

    public function show(string $id)
    {
        $usuario = Usuario::with('rol')->find($id); // Cargar la relación 'rol'

        if ($usuario === null) {
            abort(404);
        }

        return view('usuario.show', ['usuario' => $usuario]);
    }

    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        $roles = Rol::all(); // Obtener todos los roles disponibles

        if ($usuario === null) {
            abort(404);
        }

        return view('usuario.edit', [
            'usuario' => $usuario,
            'roles' => $roles, // Pasar roles a la vista
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validar la solicitud
        $datos = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'rol_id' => 'required|exists:roles,id', // Validar rol
        ]);

        $usuario = Usuario::find($id);

        if ($usuario === null) {
            abort(404);
        }

        // Encriptar contraseña si se proporciona
        if (!empty($datos['password'])) {
            $datos['password'] = Hash::make($datos['password']);
        } else {
            unset($datos['password']); // No actualizar si no se proporciona
        }

        // Actualizar el usuario
        $usuario->update($datos);

        return redirect()->route('usuario.index')->with('exito', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        if ($usuario === null) {
            abort(404);
        }

        // Eliminar el usuario
        $usuario->delete();

        return redirect()->route('usuario.index')->with('exito', 'El usuario se ha eliminado correctamente.');
    }
}
