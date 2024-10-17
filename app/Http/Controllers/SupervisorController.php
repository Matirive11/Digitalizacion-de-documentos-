<?php
namespace App\Http\Controllers;

use App\Models\Supervisor;  // Asegúrate de estar usando el modelo Supervisor
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisores = Supervisor::all();
        // 2) Devolver la vista del listado con los registros
        return view('supervisor.index', [
            'supervisores' => $supervisores,  // Cambio de nombre de variable para pluralizar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'Especialidad' => 'required',
            'Fecha_contratacion' => 'required|max:255',
        ]);

        // 3) Guardar el supervisor en la BD
        Supervisor::create([
            'Especialidad' => $datos['Especialidad'],
            'Fecha_contratacion' => $datos['Fecha_contratacion'],
        ]);

        // 4) Redirigir al usuario a la página de index de supervisores
        return redirect()->route('supervisor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supervisor = Supervisor::find($id);

        // 2) Comprobar que el Id se corresponda con un registro válido
        if ($supervisor === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
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

        // 2) Comprobar que el Id se corresponda con un registro válido
        if ($supervisor === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
        return view('supervisor.edit', [
            'supervisor' => $supervisor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'Especialidad' => 'required',
            'Fecha_contratacion' => 'required|max:255',
        ]);

        Supervisor::where('id', $id)->update([
            'Especialidad' => $datos['Especialidad'],
            'Fecha_contratacion' => $datos['Fecha_contratacion'],
        ]);

        return redirect()->route('supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supervisor::where('id', $id)->delete();
        return redirect()->route('supervisor.index');
    }
}
