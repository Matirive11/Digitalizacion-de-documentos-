<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admission;
use App\Models\InscripcionMateria;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 🧠 Si el usuario es ADMIN → mostrar panel administrativo
        if ($user->hasRole('admin')) {
            // Traer todos los alumnos con sus inscripciones (Admission)
            $alumnos = User::whereHas('admission')
                ->with('admission')
                ->get();

            // Enviar a la vista dashboard.admin
            return view('dashboard.admin', compact('user', 'alumnos'));
        }

        // 🧑‍🎓 Si el usuario es alumno → mostrar panel del estudiante
        $inscripcion = Admission::where('user_id', $user->id)->first();
        $tieneInscripcion = $inscripcion !== null;

        // Traer materias del alumno si tiene inscripción
        $inscripciones = collect();
        if ($tieneInscripcion) {
            $inscripciones = InscripcionMateria::where('estudiante_id', $user->id)
                ->with('materia')
                ->get();
        }

        // Definir estado de inscripción
        $estadoInscripcion = $inscripcion->estado ?? 'pendiente';

        // Enviar a la vista dashboard.user
        return view('dashboard.user', compact(
            'user',
            'inscripcion',
            'tieneInscripcion',
            'inscripciones',
            'estadoInscripcion'
        ));
    }
}
