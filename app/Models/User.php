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
        'profile_photo_path',
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

    // 🔹 Relaciones
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

    // 🔹 Métodos de roles (Spatie)
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isAlumno()
    {
        return $this->hasRole('alumno');
    }

    public function isSupervisor()
    {
        return $this->hasRole('supervisor');
    }

    // ✅ Nombre completo (si no hay nombre, muestra "Sin nombre")
    public function getNameAttribute()
    {
        $nombre = trim("{$this->first_name} {$this->last_name}");
        return $nombre !== '' ? $nombre : 'Sin nombre';
    }
}
