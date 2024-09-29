<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoArchivo;

class TipoArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoarchivo = TipoArchivo::all();
        // 2) Devolver la vista del listado con los registros
        return view('tipo_archivo.index', [
            'tipoarchivo' => $tipoarchivo,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_archivo.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'descripcion' => 'required|max:255',
        ]);
        // 3) Guardar el curso en la BD
        // INSERT INTO cursos(nombre, instructor, categoria, nivel) VALUES ('PHP intermedio', 'Gaston Paredes', 'Desarrollo Web', 'Intermedio');
        TipoArchivo::create([
            'descripcion' => $datos['descripcion'],
        ]);
        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('tipo_archivo.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoarchivo = TipoArchivo::find($id);
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($tipoarchivo === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('tipo_archivo.show', [
            'tipoarchivo' => $tipoarchivo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoarchivo = TipoArchivo::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($tipoarchivo === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('tipo_archivo.edit', [
            'tipoarchivo' => $tipoarchivo,
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'descripcion' => 'required|max:255',
        ]);
        TipoArchivo::where('id', $id)
        ->update([
            'descripcion' => $datos['descripcion'],
        ]);
        return redirect()->route('tipo_archivo.index', ['rol' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TipoArchivo::where('id', $id)->delete();
        return redirect()->route('tipo_archivo.index');
    }
}
