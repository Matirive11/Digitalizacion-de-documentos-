<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Cargar el usuario con sus roles correctamente
        $user = User::with('roles')->where('id', Auth::id())->first();
        $inscripcion = $user->admission; // Obtener inscripción si existe

        // Verificar si el usuario tiene un rol específico
        if ($user->hasRole('admin')) {
            return view('dashboard.admin', compact('user'));
        } elseif ($user->hasRole('supervisor')) {
            return view('dashboard.supervisor', compact('user'));
        } else {
            return view('dashboard.alumno', compact('user', 'inscripcion'));
        }
    }
}
