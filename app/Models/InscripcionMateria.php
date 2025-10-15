<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscripcionMateria extends Model
{
    protected $table = 'inscripcion_materias';
    protected $fillable = ['estudiante_id', 'materia_id', 'fecha_inscripcion', 'estado'];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }

    // 👇 Alias para usar 'user' y no romper código existente
    public function user()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }
    
}
