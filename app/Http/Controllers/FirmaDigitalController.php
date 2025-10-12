<?php

namespace App\Http\Controllers;

use App\Models\FirmaDigital;
use App\Models\Usuario;
use Illuminate\Http\Request;

class FirmaDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener firmas digitales con su usuario relacionado
        $firmas = FirmaDigital::with('usuario')->get();

        return view('firma_digital.index', [
            'firmas' => $firmas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios disponibles
        $usuarios = Usuario::all();

        return view('firma_digital.create', [
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'archivo' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Crear la firma digital
        FirmaDigital::create($datos);

        return redirect()->route('firma_digital.index')->with('exito', 'Firma digital creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener la firma digital con el usuario relacionado
        $firma = FirmaDigital::with('usuario')->find($id);

        if ($firma === null) {
            abort(404);
        }

        return view('firma_digital.show', [
            'firma' => $firma,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $firma = FirmaDigital::find($id);

        if ($firma === null) {
            abort(404);
        }

        // Obtener todos los usuarios para editar la firma digital
        $usuarios = Usuario::all();

        return view('firma_digital.edit', [
            'firma' => $firma,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'archivo' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $firma = FirmaDigital::find($id);

        if ($firma === null) {
            abort(404);
        }

        // Actualizar la firma digital
        $firma->update($datos);

        return redirect()->route('firma_digital.index')->with('exito', 'Firma digital actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $firma = FirmaDigital::find($id);

        if ($firma === null) {
            abort(404);
        }

        $firma->delete();

        return redirect()->route('firma_digital.index')->with('exito', 'Firma digital eliminada con éxito.');
    }
}
