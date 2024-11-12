<?php

namespace App\Http\Controllers;

use App\Models\documento;
use Illuminate\Http\Request;

class documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = documento::all();
        return view('documento.index', [
            'documentos' => $documentos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los tipos de documentos desde la base de datos
        $tipo_Documento = documento::all();

        // Pasar la variable a la vista
        return view('documento.create', [
            'tipo_Documento' => $tipo_Documento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación del formulario
        $datos = $request->validate([
            'Nombre' => 'required|max:255',
            'Descripcion' => 'required|max:255',
            'Tipo_documento' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'Fecha_subida' => 'required|date',
            'Estado' => 'required|in:activo,inactivo',
        ]);

        // Guardar el archivo subido
        if ($request->hasFile('Tipo_documento')) {
            $rutaArchivo = $request->file('Tipo_documento')->store('documentos');
        }

        // Crear el registro en la base de datos
        documento::create([
            'Nombre' => $datos['Nombre'],
            'Descripcion' => $datos['Descripcion'],
            'Tipo_documento' => $rutaArchivo,
            'Fecha_subida' => $datos['Fecha_subida'],
            'Estado' => $datos['Estado'],
        ]);

        return redirect()->route('documento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documento = documento::find($id);

        if ($documento === null) {
            abort(404);
        }

        return view('documento.show', [
            'documento' => $documento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $documento = documento::find($id);

        if ($documento === null) {
            abort(404);
        }

        return view('documento.edit', [
            'documento' => $documento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación del formulario
        $datos = $request->validate([
            'Nombre' => 'required|max:255',
            'Descripcion' => 'required|max:255',
            'Tipo_documento' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'Fecha_subida' => 'required|date',
            'Estado' => 'required|in:activo,inactivo',
        ]);

        // Si se subió un nuevo archivo, guárdalo
        $rutaArchivo = null;
        if ($request->hasFile('Tipo_documento')) {
            $rutaArchivo = $request->file('Tipo_documento')->store('documentos');
        }

        // Actualizar el documento
        $documento = documento::find($id);
        $documento->update([
            'Nombre' => $datos['Nombre'],
            'Descripcion' => $datos['Descripcion'],
            'Tipo_documento' => $rutaArchivo ? $rutaArchivo : $documento->Tipo_documento,
            'Fecha_subida' => $datos['Fecha_subida'],
            'Estado' => $datos['Estado'],
        ]);

        return redirect()->route('documento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        documento::where('id', $id)->delete();
        return redirect()->route('documento.index');
    }
}
