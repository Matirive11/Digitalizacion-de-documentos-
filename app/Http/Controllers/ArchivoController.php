<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\TipoArchivo;
use App\Http\Requests\SubirArchivoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Mostrar todos los archivos.
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
     * Mostrar el formulario para crear un nuevo archivo.
     */
    public function create()
    {
        // Obtener los tipos de archivo desde la base de datos
        $tiposArchivos = TipoArchivo::all();

        // Pasar los tipos de archivo a la vista
        return view('archivo.create', [
            'tiposArchivos' => $tiposArchivos,
        ]);
    }

    /**
     * Guardar un nuevo archivo en el almacenamiento.
     */
    public function store(SubirArchivoRequest $request)
    {
        // Obtener el archivo subido
        $archivo = $request->file('archivo');
        $nombre = $archivo->hashName();
        $ruta = "public/archivos/{$nombre}";

        // Guardar el archivo en el almacenamiento local
        Storage::put($ruta, file_get_contents($archivo));

        // Registrar el archivo en la base de datos
        Archivo::create([
            'nombre' => $archivo->getClientOriginalName(),
            'tipo' => $archivo->extension(),
            'ruta' => $ruta,
            'id_tipo_archivo' => $request->input('id_tipo_archivo'),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('archivo.index')->with('exito', 'El archivo se ha subido correctamente');
    }

    /**
     * Mostrar un archivo específico.
     */
    public function show(string $id)
    {
        $archivo = Archivo::find($id);

        if (!$archivo) {
            abort(404);
        }

        return view('archivo.show', [
            'archivo' => $archivo,
        ]);
    }

    /**
     * Mostrar el formulario para editar un archivo existente.
     */
    public function edit(string $id)
    {
        $archivo = Archivo::find($id);

        if (!$archivo) {
            abort(404);
        }

        $tiposArchivos = TipoArchivo::all();

        return view('archivo.edit', [
            'archivo' => $archivo,
            'tiposArchivos' => $tiposArchivos,
        ]);
    }

    /**
     * Actualizar un archivo existente.
     */
    public function update(SubirArchivoRequest $request, string $id)
    {
        $archivo = Archivo::find($id);

        if (!$archivo) {
            abort(404);
        }

        // Verificar si se subió un nuevo archivo
        if ($request->hasFile('archivo')) {
            $nuevoArchivo = $request->file('archivo');
            $nombre = $nuevoArchivo->hashName();
            $ruta = "public/archivos/{$nombre}";

            // Eliminar el archivo anterior
            Storage::delete($archivo->ruta);

            // Guardar el nuevo archivo
            Storage::put($ruta, file_get_contents($nuevoArchivo));

            // Actualizar los datos en la BD
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
     * Eliminar un archivo del sistema.
     */
    public function destroy(string $id)
    {
        $archivo = Archivo::find($id);

        if (!$archivo) {
            abort(404);
        }

        // Eliminar el archivo del disco
        Storage::delete($archivo->ruta);

        // Eliminar el registro en la base de datos
        $archivo->delete();

        return redirect()->route('archivo.index')->with('exito', 'El archivo se ha eliminado correctamente');
    }
}
