<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'telefono',
        'email',
        'password',
        'estado',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'inscripcion_materias', 'estudiante_id', 'materia_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(InscripcionMateria::class, 'estudiante_id');
    }

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }
}
