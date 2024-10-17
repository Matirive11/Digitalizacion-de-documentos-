<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Tipo_documento',
        'Fecha_subida',
        'Estado',
    ];
}
