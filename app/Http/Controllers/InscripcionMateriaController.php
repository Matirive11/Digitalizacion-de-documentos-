<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\InscripcionMateria;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class InscripcionMateriaController extends Controller
{
    /**
     * 📚 Mostrar materias disponibles para inscripción (para usuarios normales)
     */
    public function index()
    {
        $user = Auth::user();

        // Si es admin, redirige al panel administrativo
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.inscripciones.index');
        }

        // Materias con sus correlativas
        $materias = Materia::with('correlativas')->get();

        // Inscripciones del usuario actual
        $inscripciones = $user->inscripciones()->with('materia')->get();

        // Procesamos materias disponibles
        $materiasDisponibles = $materias->map(function ($materia) use ($inscripciones) {
            $correlativasIds = $materia->correlativas->pluck('id');

            $cumpleCorrelativas = $correlativasIds->every(function ($id) use ($inscripciones) {
                return $inscripciones
                    ->where('materia_id', $id)
                    ->whereIn('estado', ['Regular', 'Aprobado'])
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

        return view('inscripcionmateria.index', compact('materiasDisponibles', 'inscripciones'));
    }

    /**
     * 💾 Guardar inscripción
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
     * 📘 Materias inscriptas del usuario
     */
    public function misMaterias()
    {
        $user = Auth::user();

        // Admin redirigido al panel
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.inscripciones.index');
        }

        $materias = InscripcionMateria::with('materia')
            ->where('estudiante_id', $user->id)
            ->get();

        return view('inscripcionmateria.mis_materias', compact('materias'));
    }

    /**
     * ❌ Baja de una materia
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

    /**
     * 🧩 Vista para el admin con todas las inscripciones
     */
    public function adminIndex()
    {
        $inscripciones = InscripcionMateria::with(['materia', 'estudiante'])->get();

        return view('admin.inscripciones.index', compact('inscripciones'));
    }

    /**
     * 🧠 Actualizar estado de inscripción (solo admin)
     */
    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Inscripto,Regular,Aprobado,Libre',
        ]);

        $inscripcion = InscripcionMateria::findOrFail($id);
        $inscripcion->estado = $request->estado;
        $inscripcion->save();

        return redirect()->back()->with('success', '✅ Estado actualizado correctamente.');
    }

    /**
     * 📄 Descargar certificado (solo materias aprobadas)
     */
    public function certificado($id)
    {
        $inscripcion = InscripcionMateria::with(['materia', 'estudiante'])->findOrFail($id);

        if ($inscripcion->estado !== 'Aprobado') {
            return redirect()->back()->with('error', 'Solo puedes descargar certificados de materias aprobadas.');
        }

        $pdf = Pdf::loadView('inscripcionmateria.certificado_pdf', compact('inscripcion'));
        return $pdf->download('Certificado_' . $inscripcion->materia->nombre . '.pdf');
    }
}
