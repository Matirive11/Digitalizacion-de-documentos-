<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        // 2) Devolver la vista del listado con los registros
        return view('categoria.index', [
            'categorias' => $categorias,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');    }

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
        Categoria::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
        ]);
        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('categoria.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorias = Categoria::find($id);
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($categorias === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('categoria.show', [
            'categoria' => $categorias,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categoria::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($categorias === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('categoria.edit', [
            'categoria' => $categorias,
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
        Categoria::where('id', $id)
        ->update([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
        ]);
        return redirect()->route('categoria.index', ['categoria' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categoria::where('id', $id)->delete();
        return redirect()->route('categoria.index');
    }
}
