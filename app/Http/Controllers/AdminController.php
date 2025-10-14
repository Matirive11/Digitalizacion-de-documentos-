<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\InscripcionMateria;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $inscripciones = Admission::with('user')->get();
        $materias = InscripcionMateria::with(['materia', 'user'])->get();

        return view('admin.inscripciones.index', compact('inscripciones', 'materias'));
    }

    public function aprobarInscripcion($id)
    {
        $inscripcion = Admission::findOrFail($id);
        $inscripcion->estado = 'aprobada';
        $inscripcion->save();

        return back()->with('success', 'La inscripción fue aprobada correctamente.');
    }

    public function rechazarInscripcion($id)
    {
        $inscripcion = Admission::findOrFail($id);
        $inscripcion->estado = 'rechazada';
        $inscripcion->save();

        return back()->with('success', 'La inscripción fue rechazada.');
    }

    public function actualizarEstadoMateria(Request $request, $id)
    {
        $materia = InscripcionMateria::findOrFail($id);
        $materia->estado = $request->input('estado');
        $materia->save();

        return back()->with('success', 'El estado de la materia fue actualizado.');
    }
}
