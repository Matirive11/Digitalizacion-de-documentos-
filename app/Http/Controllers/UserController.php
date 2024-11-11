<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; // Importar el modelo de roles

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles
        return view('users.create', compact('roles'));
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $datos = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dni' => 'required|unique:users,dni',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'estado' => 'boolean',
            'roles' => 'array', // Los roles que se asignarán
        ]);

        $user = User::create([
            'first_name' => $datos['first_name'],
            'last_name' => $datos['last_name'],
            'dni' => $datos['dni'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password']),
            'estado' => $datos['estado'] ?? 1,
        ]);

        // Asignar roles seleccionados al usuario
        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        return redirect()->route('users.index');
    }
    public function show(string $dni)
    {
        // Buscar el usuario por su DNI
        $user = User::where('dni', $dni)->first();

        // Si el usuario no se encuentra, abortamos con un error 404
        if ($user === null) {
            abort(404); // El usuario no fue encontrado
        }

        // Pasar el usuario a la vista show
        return view('users.show', compact('user'));
    }

    // Mostrar el formulario para editar un usuario
    public function edit(string $dni)
    {
        $user = User::where('dni', $dni)->first();
        $roles = Role::all(); // Obtener todos los roles disponibles

        if ($user === null) {
            abort(404);
        }

        return view('users.edit', compact('user', 'roles'));
    }

    // Actualizar un usuario
    public function update(Request $request, string $dni)
    {
        $datos = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dni' => 'required|unique:users,dni,' . $dni,
            'email' => 'required|email|unique:users,email,' . $dni,
            'password' => 'nullable|min:8|confirmed',
            'estado' => 'boolean',
            'roles' => 'array', // Los roles que se asignarán
        ]);

        $user = User::where('dni', $dni)->first();
        if ($user === null) {
            abort(404);
        }

        $user->update([
            'first_name' => $datos['first_name'],
            'last_name' => $datos['last_name'],
            'dni' => $datos['dni'],
            'email' => $datos['email'],
            'password' => $datos['password'] ? bcrypt($datos['password']) : $user->password,
            'estado' => $datos['estado'] ?? $user->estado,
        ]);

        // Asignar roles seleccionados al usuario
        if ($request->has('roles')) {
            $user->syncRoles($request->roles); // Sincronizar roles
        }

        return redirect()->route('users.index');
    }

    // Eliminar un usuario
    public function destroy(string $dni)
    {
        User::where('dni', $dni)->delete();
        return redirect()->route('users.index');
    }
}
