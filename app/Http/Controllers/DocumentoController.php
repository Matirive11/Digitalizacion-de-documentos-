<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Usuario;
use App\Models\FirmaDigital;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener documentos con su usuario y firma digital relacionados
        $documentos = Documento::with(['usuario', 'firmaDigital'])->get();

        return view('documento.index', [
            'documentos' => $documentos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener usuarios y firmas digitales disponibles
        $usuarios = Usuario::all();
        $firmasDigitales = FirmaDigital::all();

        return view('documento.create', [
            'usuarios' => $usuarios,
            'firmasDigitales' => $firmasDigitales,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'firma_digital_id' => 'nullable|exists:firma_digitals,id',
        ]);

        // Crear el documento
        Documento::create($datos);

        return redirect()->route('documento.index')->with('exito', 'Documento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el documento con el usuario y firma digital relacionados
        $documento = Documento::with(['usuario', 'firmaDigital'])->find($id);

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
        $documento = Documento::find($id);

        if ($documento === null) {
            abort(404);
        }

        // Obtener usuarios y firmas digitales para editar el documento
        $usuarios = Usuario::all();
        $firmasDigitales = FirmaDigital::all();

        return view('documento.edit', [
            'documento' => $documento,
            'usuarios' => $usuarios,
            'firmasDigitales' => $firmasDigitales,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'firma_digital_id' => 'nullable|exists:firma_digitals,id',
        ]);

        $documento = Documento::find($id);

        if ($documento === null) {
            abort(404);
        }

        // Actualizar el documento
        $documento->update($datos);

        return redirect()->route('documento.index')->with('exito', 'Documento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documento = Documento::find($id);

        if ($documento === null) {
            abort(404);
        }

        $documento->delete();

        return redirect()->route('documento.index')->with('exito', 'Documento eliminado con éxito.');
    }
}
