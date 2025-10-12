<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nombre', 'anio', 'cuatrimestre', 'carrera_id'];

    public function correlativas()
    {
        return $this->belongsToMany(
            Materia::class,
            'correlatividades',
            'materia_id',
            'correlativa_id'
        );
    }

    public function estudiantes()
{
    return $this->belongsToMany(User::class, 'inscripcion_materias', 'materia_id', 'estudiante_id');
}

}
