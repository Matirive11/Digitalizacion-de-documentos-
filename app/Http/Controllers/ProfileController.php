<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Mostrar formulario de edición del perfil.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Si el usuario tiene una inscripción (admission), mostrar su carrera y año
        $admission = $user->admission; // relación definida en el modelo User
        $carrera = $admission?->carrera?->nombre ?? 'No inscripto';
        $anio = $admission?->anio ?? 'No especificado';

        return view('profile.edit', compact('user', 'admission', 'carrera', 'anio'));
    }

    /**
     * Actualizar información del perfil.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name'    => 'nullable|string|max:255',
            'last_name'     => 'nullable|string|max:255',
            'telefono'      => 'nullable|string|max:20',
            'email'         => 'required|email|max:255|unique:users,email,' . $request->user()->id,
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // 📸 Guardar o reemplazar la foto de perfil
        if ($request->hasFile('profile_photo')) {
            // Eliminar foto anterior si existe
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Subir nueva foto
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        // ✏️ Actualizar datos básicos del perfil
        $user->fill($request->only(['first_name', 'last_name', 'telefono', 'email']));

        // Si cambió el email, reiniciar verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
        $user->refresh(); // 🔄 Recargar el modelo actualizado

        return Redirect::route('profile.edit')->with('status', 'Perfil actualizado correctamente.');
    }

    /**
     * Eliminar foto de perfil actual.
     */
    public function deletePhoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'Foto de perfil eliminada.');
    }
}
