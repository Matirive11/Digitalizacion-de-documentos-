<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    /**
     * Almacena una nueva admisión en la base de datos.
     */
    public function store(Request $request)
    {
        // Reglas de validación
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

        // Almacenamiento de datos
        $admission = Admission::create($request->all());

        // Retornar respuesta
        return response()->json([
            'message' => 'Admisión creada exitosamente.',
            'data' => $admission
        ], 201);
    }
}
