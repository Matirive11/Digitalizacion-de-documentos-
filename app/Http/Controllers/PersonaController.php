<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        // 2) Devolver la vista del listado con los registros
        return view('persona.index', [
            'persona' => $personas,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persona.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
        ]);
        // 3) Guardar el curso en la BD
        // INSERT INTO cursos(nombre, instructor, categoria, nivel) VALUES ('PHP intermedio', 'Gaston Paredes', 'Desarrollo Web', 'Intermedio');
        Persona::create([
            'dni'   =>  $datos['dni'],
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'email' => $datos['email'],
            'telefono' => $datos['telefono'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
        ]);
        // 4) Redirigir al usuario a la pagina de index del curso
        return redirect()->route('persona.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $dni)
    {
        $personas = Persona::find($dni);
        // 2) Comprobar que el Id se corresponda con un registro valido
        if($personas === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('persona.show', [
            'persona' => $personas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personas = Persona::find($id);

        // 2) Comprobar que el Id se corresponda con un registro valido
        if($personas === null) {
            abort(404);
        }
        // 3) Devolver la vista con el dato encontrado
        return view('persona.edit', [
            'persona' => $personas,
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $dni)
    {
        $datos = $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
        ]);
        Persona::where('dni', $dni)
        ->update([
            'dni'   =>  $datos['dni'],
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'email' => $datos['email'],
            'telefono' => $datos['telefono'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
        ]);
        return redirect()->route('persona.index', ['persona' => $dni]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $dni)
    {
        Persona::where('dni', $dni)->delete();
        return redirect()->route('persona.index');
    }
}
