<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Mostrar todas las materias.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    /**
     * Mostrar el formulario para crear una nueva materia.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Guardar una nueva materia en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre',
            'anio' => 'nullable|integer|min:1|max:12',
        ]);

        Materia::create([
            'nombre' => $request->nombre,
            'anio' => $request->anio ?? null,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    /**
     * Mostrar una materia específica.
     */
    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    /**
     * Mostrar el formulario de edición.
     */
    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    /**
     * Actualizar la materia.
     */
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre,' . $materia->id,
            'anio' => 'nullable|integer|min:1|max:12',
        ]);

        $materia->update([
            'nombre' => $request->nombre,
            'anio' => $request->anio ?? null,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Eliminar una materia.
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }

    /**
     * Mostrar la vista de inscripción a materias.
     * Construye $materiasDisponibles con la estructura que tu vista espera.
     */
    public function inscripcion()
    {
        $user = Auth::user();

        // Traer todas las materias (puedes agregar filtros según año, etc.)
        $materias = Materia::orderBy('anio')->get();

        // Construir la estructura que espera la vista:
        // [ 'materia' => Materia, 'estado' => null|'aprobada'|'cursando', 'puede_inscribirse' => bool ]
        $materiasDisponibles = $materias->map(function ($m) use ($user) {
            // Ejemplo simple: comprobar si el usuario ya está inscripto (pivot inscripcion_materias)
            $inscripto = DB::table('inscripcion_materias')
                          ->where('estudiante_id', $user->id)
                          ->where('materia_id', $m->id)
                          ->exists();

            // Aquí podés reemplazar la lógica por la real de correlativas/aprobadas
            $estado = $inscripto ? 'inscripto' : null;

            // Ejemplo simple de permiso: si ya está inscripto, no puede inscribirse de nuevo
            $puedeInscribirse = !$inscripto;

            return [
                'materia' => $m,
                'estado' => $estado,
                'puede_inscribirse' => $puedeInscribirse,
            ];
        })->toArray();

        // Retornar la vista que ya tenés (inscripcionmateria/index.blade.php)
        return view('inscripcionmateria.index', compact('materiasDisponibles'));
    }

    /**
     * Procesar y guardar la inscripción seleccionada por el usuario.
     * RUTA sugerida: Route::post('/inscripcionmateria', [MateriaController::class, 'storeInscripcion'])->name('inscripcionmateria.store');
     */
    public function storeInscripcion(Request $request)
    {
        $request->validate([
            'materias' => 'nullable|array',
            'materias.*' => 'integer|exists:materias,id',
        ]);

        $user = Auth::user();
        $materiasIds = $request->input('materias', []);

        if (!empty($materiasIds)) {
            // Insertar en tabla pivot inscripcion_materias (ajustá el nombre/columnas si difiere)
            foreach ($materiasIds as $mid) {
                // Evitar duplicados
                $exists = DB::table('inscripcion_materias')
                            ->where('estudiante_id', $user->id)
                            ->where('materia_id', $mid)
                            ->exists();

                if (!$exists) {
                    DB::table('inscripcion_materias')->insert([
                        'estudiante_id' => $user->id,
                        'materia_id' => $mid,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->route('materias.inscripcion')->with('success', 'Inscripción guardada correctamente.');
    }

    /**
     * Opcional: mostrar materias inscriptas del usuario
     */
    public function misMaterias()
    {
        $user = Auth::user();

        $materias = Materia::join('inscripcion_materias as im', 'materias.id', '=', 'im.materia_id')
            ->where('im.estudiante_id', $user->id)
            ->select('materias.*', 'im.created_at as inscripto_en')
            ->get();

        return view('inscripcionmateria.mis_materias', compact('materias'));
    }
    
}
