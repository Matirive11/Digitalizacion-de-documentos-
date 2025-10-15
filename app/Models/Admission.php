<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // === SECCIÓN 1 ===
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'documento',
        'cuil',
        'email',
        'estado_civil',
        'genero',
        'nacionalidad',
        'direccion',
        'ciudad',
        'provincia',
        'pais',
        'codigo_postal',
        'numero_telefono',
        'telefono_alternativo',
        'nivel_educativo',
        'carrera_interes',

        // === SECCIÓN 2 ===
        'nivel_secundario',

        // === SECCIÓN 3 ===
        'solicita_residencia',
        'mayor_20',
        'nombre_conviviente',
        'telefono_conviviente',
        'direccion_conviviente',
        'vinculo_familiar',

        // === SECCIÓN 4 ===
        'beca_parcial',
        'beca_total',
        'no_quiero_beca',

        // === SECCIÓN 5 ===
        'fuente_informacion',
        'referente_nombre',
        'razon_eleccion',

        // === SECCIÓN 6 ===
        'blood_type',
        'rh_factor',
        'health_problem',
        'health_problem_description',
        'physical_limitation',
        'physical_limitation_description',
        'medical_treatment_description',
        'social_security_description',
        'affiliate_number',
        'substance_treatment',
        'psychological_treatment',

        // === SECCIÓN 7: Padres ===
        'father_first_name',
        'father_last_name',
        'father_address',
        'father_phone',
        'father_email',
        'father_document_number',
        'father_occupation',

        'mother_first_name',
        'mother_last_name',
        'mother_address',
        'mother_phone',
        'mother_email',
        'mother_document_number',
        'mother_occupation',

        // === SECCIÓN 8: Responsable financiero ===
        'financial_first_name',
        'financial_last_name',
        'financial_address',
        'financial_postal_code',
        'financial_locality',
        'financial_province',
        'financial_country',
        'financial_phone',
        'financial_email',
        'financial_document_type',
        'financial_document_number',
        'financial_age',
        'financial_occupation',

        // === NUEVO CAMPO ===
        'estado',
    ];

    // Relación con el usuario (una inscripción pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
