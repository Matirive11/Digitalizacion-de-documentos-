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
        'first_name', 'last_name', 'birth_date', 'age', 'birth_place', 'province', 'country',
        'document_type', 'document_number', 'gender', 'address', 'phone', 'cellphone',
        'postal_code', 'locality', 'email', 'religion', 'adventist', 'baptized', 'church',
        'marital_status', 'cuil',

        // === SECCIÓN 2 ===
        'career', 'study_year', 'secondary_level',

        // === SECCIÓN 3 ===
        'request_residence', 'over_20', 'lives_with_name', 'lives_with_phone',
        'lives_with_cellphone', 'lives_with_address', 'lives_with_email', 'lives_with_relationship',

        // === SECCIÓN 4 ===
        'beca_partial', 'beca_total', 'honor_loan',

        // === SECCIÓN 5 ===
        'promo_student', 'church_info', 'family_info', 'friends_info',
        'flyer_info', 'adventist_institute_info', 'other_info',
        'referrer_name', 'reason_choice',

        // === SECCIÓN 6 ===
        'blood_type', 'rh_factor', 'health_problem', 'health_problem_description',
        'physical_limitation', 'physical_limitation_description', 'medical_treatment_description',
        'social_security_description', 'affiliate_number', 'substance_treatment', 'psychological_treatment',

        // === SECCIÓN 7 ===
        'father_first_name', 'father_last_name', 'father_address', 'father_postal_code', 'father_locality',
        'father_province', 'father_country', 'father_cellphone', 'father_email',
        'father_document_type', 'father_document_number', 'father_age', 'father_occupation',
        'mother_first_name', 'mother_last_name', 'mother_address', 'mother_postal_code', 'mother_locality',
        'mother_province', 'mother_country', 'mother_cellphone', 'mother_email',
        'mother_document_type', 'mother_document_number', 'mother_age', 'mother_occupation',

        // === SECCIÓN 8 ===
        'financial_first_name', 'financial_last_name', 'financial_document_type', 'financial_document_number',
        'financial_address', 'financial_postal_code', 'financial_locality', 'financial_province',
        'financial_country', 'financial_phone', 'financial_email', 'financial_age', 'financial_occupation',
    ];

    // Relación con el usuario (una inscripción pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
