<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InscripcionMateria;
use App\Models\InscripcionExamen;
use App\Models\Materia; // ✅ AÑADE ESTA IMPORTACIÓN
use Illuminate\Support\Facades\Auth;

class ExamenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Obtener IDs de materias ya inscriptas en exámenes
        $materiasInscriptas = InscripcionExamen::where('user_id', $user->id)
            ->pluck('materia_id')
            ->toArray();

        // Obtener las materias del usuario con estado Regular o Libre
        $materiasDisponibles = InscripcionMateria::with('materia')
            ->where('estudiante_id', $user->id)
            ->whereIn('estado', ['Regular', 'Libre'])
            ->whereNotIn('materia_id', $materiasInscriptas) // ✅ EXCLUIR LAS YA INSCRIPTAS
            ->get();

        return view('examenes.index', compact('materiasDisponibles'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $materiaId = $request->materia_id;

        // Verificar si ya existe la inscripción
        $yaInscripto = InscripcionExamen::where('user_id', $user->id)
            ->where('materia_id', $materiaId)
            ->exists();

        if ($yaInscripto) {
            return redirect()->back()->with('error', 'Ya estás inscripto a este examen.');
        }

        // Crear inscripción
        InscripcionExamen::create([
            'user_id' => $user->id,
            'materia_id' => $materiaId,
            'estado' => 'Inscripto', // Estado más descriptivo
        ]);

        return redirect()->back()->with('success', 'Inscripción realizada con éxito.');
    }

    public function misExamenes()
    {
        $inscripciones = InscripcionExamen::with('materia')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('examenes.mis-examenes', compact('inscripciones'));
    }

    public function baja($id)
    {
        $examen = InscripcionExamen::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $examen->delete();

        return back()->with('success', 'Te diste de baja correctamente del examen.');
    }

    // ✅ ELIMINA el método create() duplicado o déjalo vacío
    public function create()
    {
        return redirect()->route('examenes.index');
    }
}