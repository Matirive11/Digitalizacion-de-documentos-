<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener notificaciones con su users relacionado
        $notificaciones = Notificacion::with('users')->get();

        return view('notificacion.index', [
            'notificaciones' => $notificaciones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener usuarios para asignar a la notificación
        $usuarios = User::all();

        return view('notificacion.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'contenido' => 'required',

        ]);

        // Guardar la notificación en la base de datos
        Notificacion::create($datos);

        return redirect()->route('notificacion.index')->with('exito', 'Notificación creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener la notificación con el users relacionado
        $notificacion = Notificacion::with('users')->find($id);

        if ($notificacion === null) {
            abort(404);
        }

        return view('notificacion.show', [
            'notificacion' => $notificacion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notificacion = Notificacion::find($id);

        if ($notificacion === null) {
            abort(404);
        }

        // Obtener usuarios para editar la notificación
        $usuarios = User::all();

        return view('notificacion.edit', [
            'notificacion' => $notificacion,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'contenido' => 'required',

        ]);

        // Actualizar la notificación
        $notificacion = Notificacion::find($id);

        if ($notificacion === null) {
            abort(404);
        }

        $notificacion->update($datos);

        return redirect()->route('notificacion.index')->with('exito', 'Notificación actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notificacion = Notificacion::find($id);

        if ($notificacion === null) {
            abort(404);
        }

        $notificacion->delete();

        return redirect()->route('notificacion.index')->with('exito', 'Notificación eliminada con éxito.');
    }
}
