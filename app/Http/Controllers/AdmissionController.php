<?php
namespace App\Http\Controllers;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\AdmissionRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class AdmissionController extends Controller
{
    /**
     * Mostrar todas las admisiones (Solo para Admin/Supervisor)
     */
    public function index()
    {
        $admissions = Admission::all();
        return view('inscripciones.index', [
            'admissions' => $admissions,
        ]);
    }
    /**
     * Mostrar el formulario de admisión
     */
    public function create()
    {
        return view('inscripciones.create');
    }
    /**
     * Guardar una nueva admisión en la base de datos
     */
    public function store(Request $request)
    {
    try{
        $request->merge([
            'adventista' => filter_var($request->adventista, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'bautizado' => filter_var($request->bautizado, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ]);
        // ✅ Validación de los datos
        $validatedData = $request->validate([
            'apellido' => 'required|string|max:30',
            'nombre' => 'required|string|max:30',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:50',
            'provincia_nacimiento' => 'nullable|string|max:30',
            'pais_nacimiento' => 'nullable|string|max:30',
            'tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'documento' => 'nullable|string|max:12',
            'genero' => 'nullable|in:M,F',
            'direccion' => 'required|string|max:100',
            'codigo_postal' => 'nullable|string|max:10',
            'ciudad' => 'nullable|string|max:30',
            'provincia' => 'nullable|string|max:30',
            'pais' => 'nullable|string|max:30',
            'telefono_fijo' => 'nullable|string|max:20',
            'numero_telefono' => 'nullable|string|max:20',
            'email' => 'required|email|max:50',
            'religion' => 'nullable|string|max:50',
            'adventista' => 'nullable|boolean',
            'bautizado' => 'nullable|boolean',
            'iglesia' => 'nullable|string|max:50',
            'estado_civil' => 'nullable|in:soltero,casado,viudo,divorciado,separado',
            'cuil' => 'nullable|string|max:15',

            'carrera_interes' => 'nullable|string|max:50',
            'anio_estudio' => 'nullable|in:1,2,3,4',
            'nivel_secundario' => 'nullable|in:completo,proceso,incompleto',

            'grupo_sanguineo' => 'nullable|string|max:5',
            'factor_rh' => 'nullable|string|max:5',
            'problema_salud' => 'nullable|boolean',
            'detalle_problema_salud' => 'nullable|string',
            'limitacion_fisica' => 'nullable|boolean',
            'detalle_limitacion_fisica' => 'nullable|string',
            'tratamiento_medico' => 'nullable|string',
            'obra_social' => 'nullable|string|max:50',
            'nro_afiliado' => 'nullable|string|max:20',
            'rehabilitacion_sustancias' => 'nullable|in:Nunca,No en el último año,Alguna vez este año',
            'tratamiento_psicologico' => 'nullable|in:Nunca,No en el último año,Alguna vez este año',

            'padre_nombre' => 'nullable|string|max:50',
            'padre_apellido' => 'nullable|string|max:50',
            'padre_direccion' => 'nullable|string|max:100',
            'padre_cp' => 'nullable|string|max:10',
            'padre_localidad' => 'nullable|string|max:30',
            'padre_provincia' => 'nullable|string|max:30',
            'padre_pais' => 'nullable|string|max:30',
            'padre_telefono' => 'nullable|string|max:20',
            'padre_email' => 'nullable|string|max:50',
            'padre_documento' => 'nullable|string|max:12',
            'padre_edad' => 'nullable|integer',
            'padre_ocupacion' => 'nullable|string|max:50',
            'padre_tipo_documento' => 'nullable|in:DNI,Pasaporte',

            'madre_nombre' => 'nullable|string|max:50',
            'madre_apellido' => 'nullable|string|max:50',
            'madre_direccion' => 'nullable|string|max:100',
            'madre_cp' => 'nullable|string|max:10',
            'madre_localidad' => 'nullable|string|max:30',
            'madre_provincia' => 'nullable|string|max:30',
            'madre_pais' => 'nullable|string|max:30',
            'madre_telefono' => 'nullable|string|max:20',
            'madre_email' => 'nullable|string|max:50',
            'madre_documento' => 'nullable|string|max:12',
            'madre_edad' => 'nullable|integer',
            'madre_ocupacion' => 'nullable|string|max:50',
            'madre_tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'resp_financiero_nombre' => 'nullable|string|max:50',
            'resp_financiero_apellido' => 'nullable|string|max:50',
            'resp_financiero_direccion' => 'nullable|string|max:100',
            'resp_financiero_cp' => 'nullable|string|max:10',
            'resp_financiero_localidad' => 'nullable|string|max:30',
            'resp_financiero_provincia' => 'nullable|string|max:30',
            'resp_financiero_pais' => 'nullable|string|max:30',
            'resp_financiero_telefono' => 'nullable|string|max:20',
            'resp_financiero_email' => 'nullable|string|max:50',
            'resp_financiero_documento' => 'nullable|string|max:12',
            'resp_financiero_edad' => 'nullable|integer',
            'resp_financiero_ocupacion' => 'nullable|string|max:50',
            'resp_tipo_documento' => 'nullable|in:DNI,Pasaporte',

            'estado' => 'Pendiente',
        ]);
        // ✅ Guardar los datos en la base de datos
        $admission = Admission::updateOrCreate(['user_id' => Auth::id()], $validatedData);
        $admins = User::role('admin')->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new AdmissionRequestMail($admission));
        }

        return redirect()->route('dashboard')->with('status', 'Inscripción guardada exitosamente.');
    }catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    }
}
    /**
     * Mostrar una admisión específica (Solo Admin/Supervisor)
     */
    public function show($id)
    {
        // Cargar la admisión con los datos del usuario
        $admission = Admission::with('user')->findOrFail($id);

        // Retornar la vista con la variable correctamente pasada
        return view('inscripciones.show', compact('admission'));
    }
    /**
     * Mostrar formulario para editar una admisión existente
     */
// Controlador (Ejemplo: AdmissionController.php)
public function edit($id)
{
    $alumno = Admission::findOrFail($id); // Obtiene el alumno por ID
    return view('inscripciones.edit', ['alumno' => $alumno]);
}

    /**
     * Actualizar la admisión en la base de datos
     */
    public function update(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        $admission->update($request->validated());

        return redirect()->route('admin.admissions')->with('success', 'Admisión actualizada correctamente.');
    }
    /**
     * Eliminar una admisión de la base de datos (Solo Admin)
     */
    public function destroy($id)
    {
        Admission::where('id', $id)->delete();
        return redirect()->route('inscripciones.index');
    }
    public function downloadPdf($id)
{
    // Buscar la admisión con sus relaciones
    $admission = Admission::with('user', 'documentos.archivo')->findOrFail($id);

    // Generar el PDF con la vista
    $pdf = PDF::loadView('inscripciones.pdf', compact('admission'));

    // Descargar el PDF con el nombre adecuado
    return $pdf->download("Admisión_{$admission->id}.pdf");
}
public function estadistica(){
    $admissions = Admission::all();
    return view('inscripciones.estadistica', [
        'admissions' => $admissions,
    ]);
}
public function actualizarEstado(Request $request, $id)
{
    // Validación de entrada
    $request->validate([
        'estado' => 'nullable|in:Pendiente,Aprobado,Rechazado,En Observación',
        'observaciones' => 'nullable|string|max:500'
    ]);

    $admission = Admission::findOrFail($id);

    // Si hay observaciones y el estado aún es "Pendiente", cambiarlo a "En Observación"
    if ($request->filled('observaciones') && $admission->estado === 'Pendiente' && !$request->estado) {
        $admission->estado = 'En Observación';
    } elseif ($request->estado) {
        // Si el usuario seleccionó un estado, actualizarlo sin importar observaciones
        $admission->estado = $request->estado;
    }

    // Actualizar observaciones (sin importar el estado)
    $admission->observaciones = $request->observaciones;
    $admission->save();

    return redirect()->back()->with('success', 'Estado y observaciones actualizados correctamente.');
}


}
