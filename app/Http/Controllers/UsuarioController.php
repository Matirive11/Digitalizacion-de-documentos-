<?php
namespace App\Http\Controllers;

use App\Models\Usuario;  // Asegúrate de estar usando el modelo Supervisor
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol; // Asegúrate de tener esta línea para importar el modelo

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        // Obtener todos los roles disponibles
        $roles = Rol::all();

        // Pasar la variable $roles a la vista
        return view('usuario.create', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        Usuario::create($datos);
        return redirect()->route('usuario.index');
    }

    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario === null) {
            abort(404);
        }
        return view('usuario.show', ['usuario' => $usuario]);
    }

    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario === null) {
            abort(404);
        }
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, string $id)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'nullable',

        ]);
        Usuario::where('id', $id)->update($datos);
        return redirect()->route('usuario.index', ['usuario' => $id]);
    }

    public function destroy(string $id)
    {
        Usuario::where('id', $id)->delete();
        return redirect()->route('usuario.index');
    }
}
