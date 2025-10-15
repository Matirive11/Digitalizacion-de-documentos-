<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admission;
use App\Models\InscripcionMateria;

class AdminController extends Controller
{
    // 📋 Muestra todos los alumnos con formulario enviado
    public function listarAlumnos()
    {
        // Solo usuarios que tengan una admission
        $alumnos = User::whereHas('admission')->with('admission')->get();

        return view('dashboard.admin', compact('alumnos'));
    }

    // 👀 Ver detalle del alumno
    public function inspeccionarAlumno($id)
    {
        $alumno = User::with(['admission', 'inscripciones.materia'])->findOrFail($id);

        $admission = $alumno->admission;
        $materias = $alumno->inscripciones;

        return view('dashboard.inspeccionar', compact('alumno', 'admission', 'materias'));
    }

    // 📝 Actualizar estados
    public function actualizarAlumno(Request $request, $id)
    {
        // ✅ Validar que el estado sea uno de los permitidos
        $request->validate([
            'estado_formulario' => 'nullable|in:pendiente,aprobado,rechazado',
        ]);

        // 🔹 Actualizar estado del formulario
        $admission = Admission::where('user_id', $id)->first();
        if ($admission) {
            $estado = $request->input('estado_formulario');

            // solo actualiza si hay un valor válido
            if (in_array($estado, ['pendiente', 'aprobado', 'rechazado'])) {
                $admission->estado = $estado;
                $admission->save();
            }
        }

        // 🔹 Actualizar estados de materias (si existen)
        if ($request->has('materias')) {
            foreach ($request->materias as $materia_id => $estado) {
                $inscripcion = InscripcionMateria::find($materia_id);
                if ($inscripcion) {
                    $inscripcion->estado = $estado;
                    $inscripcion->save();
                }
            }
        }

        return redirect()->route('admin.dashboard')
            ->with('success', '✅ Alumno actualizado correctamente.');
    }
}
