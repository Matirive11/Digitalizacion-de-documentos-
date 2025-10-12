<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Mostrar todas las materias.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    /**
     * Mostrar el formulario para crear una nueva materia.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Guardar una nueva materia en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre',
        ]);

        Materia::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    /**
     * Mostrar una materia específica.
     */
    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    /**
     * Mostrar el formulario de edición.
     */
    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    /**
     * Actualizar la materia.
     */
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre,' . $materia->id,
        ]);

        $materia->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Eliminar una materia.
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
