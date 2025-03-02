<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('matriculacion.form1'); // Asegúrate de que esta vista exista
    }

    /**
     * Guardar una nueva admisión en la base de datos
     */
    public function store(Request $request)
    {
        dd($request->all()); // Muestra los datos y detiene la ejecución

        $request->validate([
            // Datos del solicitante
            'apellido' => 'required|string|max:30',
            'nombre' => 'required|string|max:30',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:50',
            'provincia_nacimiento' => 'nullable|string|max:30',
            'pais_nacimiento' => 'nullable|string|max:30',
            'tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'documento' => 'nullable|string|max:12',
            'genero' => 'nullable|in:M,F',
            'direccion' => 'nullable|string|max:100',
            'codigo_postal' => 'nullable|string|max:10',
            'ciudad' => 'nullable|string|max:30',
            'provincia' => 'nullable|string|max:30',
            'pais' => 'nullable|string|max:30',
            'telefono_fijo' => 'nullable|string|max:20',
            'numero_telefono' => 'nullable|string|max:20',
            'email' => 'required|email|max:50|unique:admissions,email',
            'religion' => 'nullable|string|max:50',
            'adventista' => 'nullable|boolean',
            'bautizado' => 'nullable|boolean',
            'iglesia' => 'nullable|string|max:50',
            'estado_civil' => 'nullable|in:soltero,casado,viudo,divorciado,separado',
            'cuil' => 'nullable|string|max:15',

            // Carrera y educación
            'carrera_interes' => 'nullable|string|max:50',
            'anio_estudio' => 'nullable|in:1°,2°,3°,4°',
            'nivel_secundario' => 'nullable|in:completo,proceso,incompleto',

            // Vida estudiantil
            'residencia_isam' => 'nullable|boolean',
            'residencia_no_isam' => 'nullable|boolean',
            'mayor_20' => 'nullable|boolean',
            'menor_20_vive_con' => 'nullable|string|max:50',
            'nombre_tutor' => 'nullable|string|max:50',
            'telefono_tutor' => 'nullable|string|max:20',
            'direccion_tutor' => 'nullable|string|max:100',
            'email_tutor' => 'nullable|string|max:50',
            'vinculo_tutor' => 'nullable|string|max:30',

            // Becas y préstamos
            'beca_parcial' => 'nullable|boolean',
            'beca_total' => 'nullable|boolean',
            'prestamo_honor' => 'nullable|boolean',

            // Información sobre ISAM
            'como_supo_isam' => 'nullable|string|max:100',
            'nombre_recomendado' => 'nullable|string|max:50',
            'razon_estudio' => 'nullable|string',

            // Salud
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
            'padre_tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'padre_documento' => 'nullable|string|max:12',
            'padre_edad' => 'nullable|integer',
            'padre_ocupacion' => 'nullable|string|max:50',
            // Responsable financiero
            'madre_nombre' => 'nullable|string|max:50',
            'madre_apellido' => 'nullable|string|max:50',
            'madre_direccion' => 'nullable|string|max:100',
            'madre_cp' => 'nullable|string|max:10',
            'madre_localidad' => 'nullable|string|max:30',
            'madre_provincia' => 'nullable|string|max:30',
            'madre_pais' => 'nullable|string|max:30',
            'madre_telefono' => 'nullable|string|max:20',
            'madre_email' => 'nullable|string|max:50',
            'madre_tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'madre_documento' => 'nullable|string|max:12',
            'madre_edad' => 'nullable|integer',
            'madre_ocupacion' => 'nullable|string|max:50',
            // Responsable financiero
            'resp_financiero_nombre' => 'nullable|string|max:50',
            'resp_financiero_apellido' => 'nullable|string|max:50',
            'resp_financiero_direccion' => 'nullable|string|max:100',
            'resp_financiero_cp' => 'nullable|string|max:10',
            'resp_financiero_localidad' => 'nullable|string|max:30',
            'resp_financiero_provincia' => 'nullable|string|max:30',
            'resp_financiero_pais' => 'nullable|string|max:30',
            'resp_financiero_telefono' => 'nullable|string|max:20',
            'resp_financiero_email' => 'nullable|string|max:50',
            'resp_financiero_tipo_documento' => 'nullable|in:DNI,Pasaporte',
            'resp_financiero_documento' => 'nullable|string|max:12',
            'resp_financiero_edad' => 'nullable|integer',
            'resp_financiero_ocupacion' => 'nullable|string|max:50',
        ]);

        $admission = Admission::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->all()
        );

        return redirect()->route('dashboard')->with('status', 'Inscripción guardada exitosamente.');
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
    public function edit($id)
    {
        $admission = Admission::findOrFail($id);

        return view('admin.admissions.edit', [
            'admission' => $admission,
        ]);
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
}
