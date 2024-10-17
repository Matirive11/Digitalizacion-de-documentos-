<?php
namespace App\Http\Controllers;

use App\Models\Usuario;  // Asegúrate de estar usando el modelo Supervisor
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = usuario::all();
        // 2) Devolver la vista del listado con los registros
        return view('usuario.index', [
            'usuario' => $usuarios,  // Cambio de nombre de variable para pluralizar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'Correo_electronico' => 'required|email',
            'Contrasenia' => 'required|max:255', // Asegúrate de que esto coincida con el nombre del campo
            'Fecha_creacion' => 'required|date',
            'Estado' => 'required|in:activo,inactivo',
        ]);

        // Encriptar la contraseña antes de almacenarla
        $contraseniaEncriptada = bcrypt($datos['Contrasenia']);

        // 3) Guardar el usuario en la BD
        Usuario::create([
            'Correo_electronico' => $datos['Correo_electronico'],
            'contrasenia' => $contraseniaEncriptada, // Asegúrate de usar el nombre correcto aquí
            'Fecha_creacion' => $datos['Fecha_creacion'],
            'Estado' => $datos['Estado'],
        ]);

        // 4) Redirigir al usuario a la página de index de usuarios
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarios = Usuario::find($id);

        // 2) Comprobar que el Id se corresponda con un registro válido
        if ($usuarios === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
        return view('usuario.show', [
            'usuario' => $usuarios,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuarios = Usuario::find($id);

        // 2) Comprobar que el Id se corresponda con un registro válido
        if ($usuarios === null) {
            abort(404);
        }

        // 3) Devolver la vista con el dato encontrado
        return view('usuario.edit', [
            'usuario' => $usuarios,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'Correo_electronico' => 'required|email',
            'Contrasenia' => 'required|max:255',
            'Fecha_creacion' => 'required|date',
            'Estado' => 'required|in:activo,inactivo',
        ]);


        Usuario::where('id', $id)->update([
            'Correo_electronico' => $datos['Correo_electronico'],
            'Contrasenia' => $datos['Contrasenia'],
            'Fecha_creacion' => $datos['Fecha_creacion'],
            'Estado' => $datos['Estado'],
        ]);

        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::where('id', $id)->delete();
        return redirect()->route('usuario.index');
    }
}
