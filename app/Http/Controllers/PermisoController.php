<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permiso::all();
        // 2) Devolver la vista del listado con los registros
        return view('permiso.index', [
            'permiso' => $permisos,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permiso.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);
        // 3) Guardar el curso en la BD
        // INSERT INTO cursos(nombre, instructor, categoria, nivel) VALUES ('PHP intermedio', 'Gaston Paredes', 'Desarrollo Web', 'Intermedio');
        Permiso::create([
            'nombre' => $datos['nombre'],

            'descripcion' => $datos['descripcion'],
        ]);
        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('permiso.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permisos = Permiso::find($id);
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($permisos === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('permiso.show', [
            'permiso' => $permisos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permisos = Permiso::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($permisos === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('permiso.edit', [
            'permiso' => $permisos,
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
        ]);
        Permiso::where('id', $id)
        ->update([
            'nombre' => 'required',
            'descripcion' => $datos['descripcion'],
        ]);
        return redirect()->route('permiso.index', ['permiso' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permiso::where('id', $id)->delete();
        return redirect()->route('permiso.index');
    }
}
