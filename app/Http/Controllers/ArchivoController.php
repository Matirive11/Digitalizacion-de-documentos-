<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\TipoArchivo;
use App\Http\Requests\SubirArchivoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los registros de archivos
        $archivos = Archivo::all();

        // Devolver la vista con los archivos
        return view('archivo.index', [
            'archivos' => $archivos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Obtener las descripciones de los tipos de archivo
       $tiposArchivos = TipoArchivo::all(); // O puedes usar pluck si solo necesitas las descripciones: TipoArchivo::pluck('descripcion', 'id');

       // Pasar las descripciones a la vista
       return view('archivo.create', [
           'tiposArchivos' => $tiposArchivos,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubirArchivoRequest $request)
    {
        // Obtener el archivo subido
        $archivo = $request->file('archivo');
        $nombre = $archivo->hashName();
        $ruta = "public/archivos/{$nombre}";

        // Guardar el archivo en el disco
        Storage::put($ruta, file_get_contents($archivo));

        // Guardar la información del archivo en la base de datos
        Archivo::create([
            'nombre' => $archivo->getClientOriginalName(),
            'tipo' => $archivo->extension(),
            'ruta' => $ruta,
            'id_tipo_archivo' => $request->input('id_tipo_archivo'), // Asume que este campo viene del formulario
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('archivo.index')->with('exito', 'El archivo se ha subido correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $archivo = Archivo::find($id);

        if ($archivo === null) {
            abort(404);
        }

        return view('archivo.show', [
            'archivo' => $archivo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $archivo = Archivo::find($id);

        if ($archivo === null) {
            abort(404);
        }

        return view('archivo.edit', [
            'archivo' => $archivo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubirArchivoRequest $request, string $id)
    {
        $archivo = Archivo::find($id);

        if ($archivo === null) {
            abort(404);
        }

        // Obtener el archivo subido y la información
        if ($request->hasFile('archivo')) {
            $nuevoArchivo = $request->file('archivo');
            $nombre = $nuevoArchivo->hashName();
            $ruta = "public/archivos/{$nombre}";

            // Borrar el archivo anterior si existe
            Storage::delete($archivo->ruta);

            // Guardar el nuevo archivo en el disco
            Storage::put($ruta, file_get_contents($nuevoArchivo));

            // Actualizar la información en la base de datos
            $archivo->update([
                'nombre' => $nuevoArchivo->getClientOriginalName(),
                'tipo' => $nuevoArchivo->extension(),
                'ruta' => $ruta,
                'id_tipo_archivo' => $request->input('id_tipo_archivo'),
            ]);
        }

        return redirect()->route('archivo.index')->with('exito', 'El archivo se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $archivo = Archivo::find($id);

        if ($archivo === null) {
            abort(404);
        }

        // Eliminar el archivo del disco
        Storage::delete($archivo->ruta);

        // Eliminar el registro de la base de datos
        $archivo->delete();

        return redirect()->route('archivo.index')->with('exito', 'El archivo se ha eliminado correctamente');
    }
}
