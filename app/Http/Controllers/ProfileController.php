<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
<<<<<<< HEAD
    /**
     * Display the user's profile form.
     */
=======
    public function create()
    {
        return view('profile.complete');
    }
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
<<<<<<< HEAD
=======
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'gender' => 'required|string',
        ]);

        // Guardar la información adicional del perfil
        $request->user()->profile()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
        ]);

        return redirect()->route('dashboard')->with('status', 'Perfil completado con éxito');
    }
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
}
