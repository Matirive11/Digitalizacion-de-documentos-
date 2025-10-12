<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission; // Modelo de inscripciones

class InscripcionController extends Controller
{
    /**
     * Muestra todas las inscripciones.
     */
    public function index()
    {
        $inscripciones = Admission::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    /**
     * Muestra los detalles de una inscripción específica.
     */
    public function show($id)
    {
        $inscripcion = Admission::findOrFail($id);
        return view('inscripciones.show', compact('inscripcion'));
    }
}
