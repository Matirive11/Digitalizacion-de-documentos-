<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        // 2) Devolver la vista del listado con los registros
        return view('rol.index', [
            'roles' => $roles,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rol.create');    }

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
        Rol::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
        ]);
        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('rol.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Rol::find($id);
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($roles === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('rol.show', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Rol::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($roles === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('rol.edit', [
            'roles' => $roles,
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
        Rol::where('id', $id)
        ->update([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
        ]);
        return redirect()->route('rol.index', ['rol' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rol::where('id', $id)->delete();
        return redirect()->route('rol.index');
    }
}
