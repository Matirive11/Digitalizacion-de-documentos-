<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'tipo_documento',
        'descripcion',
        'fecha_subida',
        'usuario_id',
        'archivo_id',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    // Relación con Archivo
    public function archivo()
    {
        return $this->belongsTo(Archivo::class, 'archivo_id', 'id');
    }
}
