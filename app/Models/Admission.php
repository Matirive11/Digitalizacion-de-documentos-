<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    // Propiedad para permitir la asignación masiva de estos campos
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'email',
        'numero_telefono',
        'documento',
        'estado_civil',
        'cuil',
        'genero',
        'nacionalidad',
        'direccion',
        'codigo_postal',
        'ciudad',
        'provincia',
        'pais',
        'nivel_educativo',
        'carrera_interes',
        'nombre_referencia',
        'telefono_referencia',
        'estado_solicitud',
    ];
}
