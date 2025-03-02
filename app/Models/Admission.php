<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        // Datos del solicitante
        'user_id', 'apellido', 'nombre', 'fecha_nacimiento', 'lugar_nacimiento',
        'provincia', 'pais', 'tipo_documento', 'documento', 'genero', 'direccion',
        'codigo_postal', 'ciudad', 'telefono_fijo', 'numero_telefono', 'email',
        'religion', 'adventista', 'bautizado', 'iglesia', 'estado_civil', 'cuil',

        // Carrera y educación
        'carrera_interes', 'anio_estudio', 'nivel_secundario',

        // Vida estudiantil
        'residencia_isam', 'residencia_no_isam', 'mayor_20', 'menor_20_vive_con',
        'nombre_tutor', 'telefono_tutor', 'direccion_tutor', 'email_tutor', 'vinculo_tutor',

        // Becas y préstamos
        'beca_parcial', 'beca_total', 'prestamo_honor',

        // Información sobre ISAM
        'como_supo_isam', 'nombre_recomendado', 'razon_estudio',

        // Salud
        'grupo_sanguineo', 'factor_rh', 'problema_salud', 'detalle_problema_salud',
        'limitacion_fisica', 'detalle_limitacion_fisica', 'tratamiento_medico',
        'obra_social', 'nro_afiliado', 'rehabilitacion_sustancias', 'tratamiento_psicologico',

        // Datos del padre
        'padre_nombre', 'padre_apellido', 'padre_direccion', 'padre_cp',
        'padre_localidad', 'padre_provincia', 'padre_pais', 'padre_telefono',
        'padre_email', 'padre_tipo_documento', 'padre_documento',
        'padre_edad', 'padre_ocupacion',

        // Datos de la madre
        'madre_nombre', 'madre_apellido', 'madre_direccion', 'madre_cp',
        'madre_localidad', 'madre_provincia', 'madre_pais', 'madre_telefono',
        'madre_email', 'madre_tipo_documento', 'madre_documento',
        'madre_edad', 'madre_ocupacion',

        // Responsable financiero
        'responsable_financiero_tipo', 'resp_financiero_nombre', 'resp_financiero_apellido',
        'resp_financiero_direccion', 'resp_financiero_cp', 'resp_financiero_localidad',
        'resp_financiero_provincia', 'resp_financiero_pais', 'resp_financiero_telefono',
        'resp_financiero_email', 'resp_financiero_tipo_documento', 'resp_financiero_documento',
        'resp_financiero_edad', 'resp_financiero_ocupacion'
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
