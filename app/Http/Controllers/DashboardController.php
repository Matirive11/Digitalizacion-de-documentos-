<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;
use App\Models\InscripcionMateria;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 🔹 Si es admin → mostrar panel administrativo
        if ($user->hasRole('admin')) {
            $inscripciones = InscripcionMateria::with(['materia', 'estudiante'])->get();

            return view('dashboard.admin', [
                'user' => $user,
                'inscripciones' => $inscripciones
            ]);
        }

        // 🔹 Usuario común → verificar si tiene inscripción principal
        $inscripcion = Admission::where('user_id', $user->id)->first();
        $tieneInscripcion = $inscripcion !== null;

        // 🔹 Si tiene inscripción, cargar sus materias
        $inscripciones = collect();
        if ($tieneInscripcion) {
            $inscripciones = InscripcionMateria::where('estudiante_id', $user->id)
                ->with('materia')
                ->get();
        }

        // 🔹 Estado de inscripción (seguro)
        $estadoInscripcion = 'desconocido';
        if ($inscripcion) {
            $estadoInscripcion = $inscripcion->estado ?? 'pendiente';
        }

        // 🔹 Retornar vista del usuario
        return view('dashboard.user', [
            'user' => $user,
            'inscripciones' => $inscripciones,
            'tieneInscripcion' => $tieneInscripcion,
            'inscripcion' => $inscripcion,
            'estadoInscripcion' => $estadoInscripcion,
        ]);
    }
}
