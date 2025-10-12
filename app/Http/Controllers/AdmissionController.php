<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    /**
     * Mostrar formulario de inscripción
     */
    public function create()
    {
        return view('matriculacion.form1');
    }

    /**
     * Guardar los datos del formulario
     */
    public function store(Request $request)
    {
        // Validación básica (podés agregar más reglas si querés)
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        // Convertir checkboxes de la Sección 5 a formato JSON
        $fuenteInformacion = $request->input('fuente_informacion', []);
        if (is_array($fuenteInformacion)) {
            $validatedData['fuente_informacion'] = json_encode($fuenteInformacion);
        }

        // Crear el registro de admisión
        $admission = new Admission();

        $admission->user_id = Auth::id();

        // === SECCIÓN 1 ===
        $admission->nombre = $request->nombre;
        $admission->apellido = $request->apellido;
        $admission->fecha_nacimiento = $request->fecha_nacimiento;
        $admission->documento = $request->documento;
        $admission->estado_civil = $request->estado_civil;
        $admission->cuil = $request->cuil;
        $admission->genero = $request->genero;
        $admission->nacionalidad = $request->nacionalidad;
        $admission->direccion = $request->direccion;
        $admission->ciudad = $request->ciudad;
        $admission->provincia = $request->provincia;
        $admission->pais = $request->pais;
        $admission->codigo_postal = $request->codigo_postal;
        $admission->numero_telefono = $request->numero_telefono;
        $admission->telefono_alternativo = $request->telefono_alternativo;
        $admission->email = $request->email;
        $admission->nivel_educativo = $request->nivel_educativo;
        $admission->carrera_interes = $request->carrera_interes;

        // === SECCIÓN 2 ===
        $admission->nivel_secundario = $request->nivel_secundario;

        // === SECCIÓN 3 ===
        $admission->solicita_residencia = $request->solicita_residencia;
        $admission->mayor_20 = $request->mayor_20;
        $admission->nombre_conviviente = $request->nombre_conviviente;
        $admission->telefono_conviviente = $request->telefono_conviviente;
        $admission->direccion_conviviente = $request->direccion_conviviente;
        $admission->vinculo_familiar = $request->vinculo_familiar;

        // === SECCIÓN 4 ===
        $admission->beca_parcial = $request->beca_parcial ? 1 : 0;
        $admission->beca_total = $request->beca_total ? 1 : 0;
        $admission->prestamo_honor = $request->prestamo_honor ? 1 : 0;

        // === SECCIÓN 5 ===
        $admission->fuente_informacion = $validatedData['fuente_informacion'] ?? null;
        $admission->referente_nombre = $request->referente_nombre;
        $admission->razon_eleccion = $request->razon_eleccion;

        // === SECCIÓN 6 ===
        $admission->blood_type = $request->blood_type;
        $admission->rh_factor = $request->rh_factor;
        $admission->health_problem = $request->health_problem;
        $admission->health_problem_description = $request->health_problem_description;
        $admission->physical_limitation = $request->physical_limitation;
        $admission->physical_limitation_description = $request->physical_limitation_description;
        $admission->medical_treatment_description = $request->medical_treatment_description;
        $admission->social_security_description = $request->social_security_description;
        $admission->affiliate_number = $request->affiliate_number;
        $admission->substance_treatment = $request->substance_treatment;
        $admission->psychological_treatment = $request->psychological_treatment;

        // === SECCIÓN 7 ===
        $admission->father_first_name = $request->father_first_name;
        $admission->father_last_name = $request->father_last_name;
        $admission->father_address = $request->father_address;
        $admission->father_phone = $request->father_phone;
        $admission->father_email = $request->father_email;
        $admission->father_document_number = $request->father_document_number;
        $admission->father_occupation = $request->father_occupation;

        $admission->mother_first_name = $request->mother_first_name;
        $admission->mother_last_name = $request->mother_last_name;
        $admission->mother_address = $request->mother_address;
        $admission->mother_phone = $request->mother_phone;
        $admission->mother_email = $request->mother_email;
        $admission->mother_document_number = $request->mother_document_number;
        $admission->mother_occupation = $request->mother_occupation;

        // === SECCIÓN 8 ===
        $admission->financial_first_name = $request->financial_first_name;
        $admission->financial_last_name = $request->financial_last_name;
        $admission->financial_address = $request->financial_address;
        $admission->financial_postal_code = $request->financial_postal_code;
        $admission->financial_locality = $request->financial_locality;
        $admission->financial_province = $request->financial_province;
        $admission->financial_country = $request->financial_country;
        $admission->financial_phone = $request->financial_phone;
        $admission->financial_email = $request->financial_email;
        $admission->financial_document_type = $request->financial_document_type;
        $admission->financial_document_number = $request->financial_document_number;
        $admission->financial_age = $request->financial_age;
        $admission->financial_occupation = $request->financial_occupation;

        // Guardar en la base de datos
        $admission->save();

        return redirect()->route('dashboard')->with('success', 'Formulario de inscripción enviado correctamente.');
    }
}
