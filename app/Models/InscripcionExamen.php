<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionExamen extends Model
{
    use HasFactory;

    protected $table = 'inscripcion_examenes'; // 👈 CORRECTO

    protected $fillable = [
        'user_id',
        'materia_id',
        'fecha_inscripcion',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
