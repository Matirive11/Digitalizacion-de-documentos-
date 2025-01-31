<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;

class AdmissionController extends Controller
{
    /**
     * Almacena una nueva admisión en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:admissions,email',
            'numero_telefono' => 'nullable|string|max:15',
            'documento' => 'nullable|string|max:20',
            'estado_civil' => 'nullable|in:soltero,casado,viudo,divorciado,separado',
            'cuil' => 'nullable|string|max:15',
            'genero' => 'nullable|in:M,F',
            'nacionalidad' => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
            'ciudad' => 'nullable|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'pais' => 'nullable|string|max:100',
            'nivel_educativo' => 'nullable|string|max:100',
            'carrera_interes' => 'nullable|string|max:100',
        ]);

        // Asignar la inscripción al usuario autenticado
        $admission = Admission::updateOrCreate(
            ['user_id' => Auth::id()], // Si ya existe, actualiza
            $request->all()
        );

        return redirect()->route('dashboard')->with('status', 'Inscripción guardada exitosamente.');
    }
}
