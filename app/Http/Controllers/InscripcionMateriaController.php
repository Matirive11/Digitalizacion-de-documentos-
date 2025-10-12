<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\InscripcionMateria;
use Illuminate\Support\Facades\Auth;

class InscripcionMateriaController extends Controller
{
    /**
     * Mostrar materias disponibles para inscripción
     */
    public function index()
    {
        $user = Auth::user();

        $materias = Materia::with('correlativas')->get();
        $inscripciones = $user->inscripciones()->with('materia')->get();

        $materiasDisponibles = $materias->map(function ($materia) use ($inscripciones) {
            $correlativasIds = $materia->correlativas->pluck('id');

            // Chequear correlativas aprobadas o regulares
            $cumpleCorrelativas = $correlativasIds->every(function ($id) use ($inscripciones) {
                return $inscripciones
                    ->where('materia_id', $id)
                    ->whereIn('estado', ['regular', 'aprobado'])
                    ->isNotEmpty();
            });

            $inscripcion = $inscripciones->where('materia_id', $materia->id)->first();
            $estadoActual = $inscripcion->estado ?? null;
            $puedeInscribirse = !$estadoActual && $cumpleCorrelativas;

            return [
                'materia' => $materia,
                'estado' => $estadoActual,
                'puede_inscribirse' => $puedeInscribirse,
            ];
        });

        return view('inscripcionmateria.index', compact('materiasDisponibles'));
    }

    /**
     * Guardar inscripción
     */
    public function store(Request $request)
    {
        $request->validate([
            'materias' => 'required|array',
            'materias.*' => 'exists:materias,id',
        ]);

        $userId = Auth::id();

        foreach ($request->materias as $materiaId) {
            $yaInscripto = InscripcionMateria::where('estudiante_id', $userId)
                ->where('materia_id', $materiaId)
                ->exists();

            if (!$yaInscripto) {
                InscripcionMateria::create([
                    'estudiante_id' => $userId,
                    'materia_id' => $materiaId,
                    'fecha_inscripcion' => now(),
                    'estado' => 'Inscripto',
                ]);
            }
        }

        return redirect()->route('inscripcionmateria.index')->with('success', '✅ Inscripción realizada con éxito.');
    }

    /**
     * Materias inscriptas del usuario
     */
    public function misMaterias()
    {
        $materias = Auth::user()->materias;
        return view('inscripcionmateria.mis_materias', compact('materias'));
    }

    /**
     * Baja de una materia
     */
    public function baja($materiaId)
    {
        $estudiante = Auth::user();

        $inscripcion = InscripcionMateria::where('estudiante_id', $estudiante->id)
            ->where('materia_id', $materiaId)
            ->first();

        if ($inscripcion) {
            $inscripcion->delete();
            return redirect()->route('inscripcionmateria.misMaterias')->with('success', 'Te diste de baja correctamente.');
        }

        return redirect()->route('inscripcionmateria.misMaterias')->with('error', 'No se encontró la inscripción.');
    }
}
