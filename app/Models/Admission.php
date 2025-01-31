<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Relación con usuarios
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
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
