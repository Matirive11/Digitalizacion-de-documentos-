<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    /**
     * Mostrar formulario de inscripción nueva
     */
    public function create()
    {
        $data = session('matriculacion_data', []);
        return view('matriculacion.form1', compact('data'));
    }

    /**
     * Guardado automático temporal (AJAX)
     */
    public function autosave(Request $request)
    {
        session(['matriculacion_data' => $request->except(['_token'])]);
        return response()->json(['status' => 'ok']);
    }

    /**
     * Guardar formulario definitivo
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        // Convertir checkboxes a JSON
        $fuenteInformacion = $request->input('fuente_informacion', []);
        if (is_array($fuenteInformacion)) {
            $validatedData['fuente_informacion'] = json_encode($fuenteInformacion);
        }

        $admission = new Admission();
        $admission->user_id = Auth::id();
        $admission->estado = 'pendiente'; // Estado inicial

        // Cargar campos comunes
        $this->fillAdmissionFields($admission, $request, $validatedData);

        $admission->save();

        session()->forget('matriculacion_data');

        return redirect()->route('dashboard')->with('success', 'Formulario de inscripción enviado correctamente.');
    }

    /**
     * Editar inscripción existente (solo si está pendiente)
     */
    public function edit($id)
    {
        $admission = Admission::findOrFail($id);

        // Solo el dueño puede editar su inscripción
        if ($admission->user_id !== Auth::id()) {
            abort(403, 'No autorizado.');
        }

        // Solo si está pendiente
        if ($admission->estado !== 'pendiente') {
            return redirect()->route('dashboard')->with('error', 'No podés editar una inscripción aprobada o rechazada.');
        }

        // Mostrar formulario de edición
        return view('matriculacion.edit', compact('admission'));
    }

    /**
     * Actualizar inscripción existente
     */
    public function update(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);

        if ($admission->user_id !== Auth::id()) {
            abort(403, 'No autorizado.');
        }

        if ($admission->estado !== 'pendiente') {
            return redirect()->route('dashboard')->with('error', 'Solo podés modificar inscripciones pendientes.');
        }

        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $fuenteInformacion = $request->input('fuente_informacion', []);
        if (is_array($fuenteInformacion)) {
            $validatedData['fuente_informacion'] = json_encode($fuenteInformacion);
        }

        $this->fillAdmissionFields($admission, $request, $validatedData);
        $admission->save();

        return redirect()->route('dashboard')->with('success', 'Inscripción actualizada correctamente.');
    }

    /**
     * Método reutilizable para llenar campos
     */
    private function fillAdmissionFields(Admission $admission, Request $request, array $validatedData): void
    {
        $admission->fill([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'documento' => $request->documento,
            'estado_civil' => $request->estado_civil,
            'cuil' => $request->cuil,
            'genero' => $request->genero,
            'nacionalidad' => $request->nacionalidad,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'pais' => $request->pais,
            'codigo_postal' => $request->codigo_postal,
            'numero_telefono' => $request->numero_telefono,
            'telefono_alternativo' => $request->telefono_alternativo,
            'email' => $request->email,
            'nivel_educativo' => $request->nivel_educativo,
            'carrera_interes' => $request->carrera_interes,
            'nivel_secundario' => $request->nivel_secundario,
            'solicita_residencia' => $request->solicita_residencia,
            'mayor_20' => $request->mayor_20,
            'nombre_conviviente' => $request->nombre_conviviente,
            'telefono_conviviente' => $request->telefono_conviviente,
            'direccion_conviviente' => $request->direccion_conviviente,
            'vinculo_familiar' => $request->vinculo_familiar,
            'beca_parcial' => $request->boolean('beca_parcial'),
            'beca_total' => $request->boolean('beca_total'),
            'prestamo_honor' => $request->boolean('prestamo_honor'),
            'fuente_informacion' => $validatedData['fuente_informacion'] ?? null,
            'referente_nombre' => $request->referente_nombre,
            'razon_eleccion' => $request->razon_eleccion,
            'blood_type' => $request->blood_type,
            'rh_factor' => $request->rh_factor,
            'health_problem' => $request->boolean('health_problem'),
            'health_problem_description' => $request->health_problem_description,
            'physical_limitation' => $request->boolean('physical_limitation'),
            'physical_limitation_description' => $request->physical_limitation_description,
            'medical_treatment_description' => $request->medical_treatment_description,
            'social_security_description' => $request->social_security_description,
            'affiliate_number' => $request->affiliate_number,
            'substance_treatment' => $request->substance_treatment,
            'psychological_treatment' => $request->psychological_treatment,
            'father_first_name' => $request->father_first_name,
            'father_last_name' => $request->father_last_name,
            'father_address' => $request->father_address,
            'father_phone' => $request->father_phone,
            'father_email' => $request->father_email,
            'father_document_number' => $request->father_document_number,
            'father_occupation' => $request->father_occupation,
            'mother_first_name' => $request->mother_first_name,
            'mother_last_name' => $request->mother_last_name,
            'mother_address' => $request->mother_address,
            'mother_phone' => $request->mother_phone,
            'mother_email' => $request->mother_email,
            'mother_document_number' => $request->mother_document_number,
            'mother_occupation' => $request->mother_occupation,
            'financial_first_name' => $request->financial_first_name,
            'financial_last_name' => $request->financial_last_name,
            'financial_address' => $request->financial_address,
            'financial_postal_code' => $request->financial_postal_code,
            'financial_locality' => $request->financial_locality,
            'financial_province' => $request->financial_province,
            'financial_country' => $request->financial_country,
            'financial_phone' => $request->financial_phone,
            'financial_email' => $request->financial_email,
            'financial_document_type' => $request->financial_document_type,
            'financial_document_number' => $request->financial_document_number,
            'financial_age' => $request->financial_age,
            'financial_occupation' => $request->financial_occupation,
        ]);
    }
}
