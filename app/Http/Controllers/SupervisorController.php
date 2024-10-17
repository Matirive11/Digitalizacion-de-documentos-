<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener supervisores con su usuario relacionado
        $supervisores = Supervisor::with('usuario')->get();

        return view('supervisor.index', [
            'supervisores' => $supervisores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios disponibles
        $usuarios = Usuario::all();

        return view('supervisor.create', [
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Crear el supervisor
        Supervisor::create($datos);

        return redirect()->route('supervisor.index')->with('exito', 'Supervisor creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el supervisor con el usuario relacionado
        $supervisor = Supervisor::with('usuario')->find($id);

        if ($supervisor === null) {
            abort(404);
        }

        return view('supervisor.show', [
            'supervisor' => $supervisor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supervisor = Supervisor::find($id);

        if ($supervisor === null) {
            abort(404);
        }

        // Obtener todos los usuarios disponibles para editar
        $usuarios = Usuario::all();

        return view('supervisor.edit', [
            'supervisor' => $supervisor,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $supervisor = Supervisor::find($id);

        if ($supervisor === null) {
            abort(404);
        }

        // Actualizar el supervisor
        $supervisor->update($datos);

        return redirect()->route('supervisor.index')->with('exito', 'Supervisor actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supervisor = Supervisor::find($id);

        if ($supervisor === null) {
            abort(404);
        }

        $supervisor->delete();

        return redirect()->route('supervisor.index')->with('exito', 'Supervisor eliminado con éxito.');
    }
}
