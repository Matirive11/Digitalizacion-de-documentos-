<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubirArchivoRequest;
use Illuminate\Support\Facades\Storage;
class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archivo.create');
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubirArchivoRequest  $request)
    {
        $archivo = $request->file('archivo');
        $nombre = $archivo->hashName();
        Storage::disk('local')->put("public/logos/{$nombre}", file_get_contents($archivo));

        return redirect()->back()->with([
            'exito' => 'El archivo se ha guardado'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('archivo.show', [
            'url' => Storage::url('logos\wOqU6GpQAesKjTX9NxJKkligXhGcYyXhzFmMSrWC.png')
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd("update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("destroy");
    }
}
