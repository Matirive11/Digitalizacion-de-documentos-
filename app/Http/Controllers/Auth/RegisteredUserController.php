<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\UserRegistered;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Maneja el registro de un nuevo usuario.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'dni'        => ['required', 'integer', 'unique:users,dni'],
            'telefono'   => ['required', 'string', 'max:20'],
            'email'      => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Crear el usuario
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'dni'        => $request->dni,
            'telefono'   => $request->telefono,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'estado'     => 1,
        ]);

        // Asignar rol automáticamente
        if (User::count() === 1) {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }

        // Notificar a administradores del nuevo registro
        $admins = User::role('admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new UserRegisteredMail($user));
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
