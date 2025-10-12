<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
=======
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'email',
        'password',
        'estado',
        'telefono',
    ];

    protected $hidden = ['password', 'remember_token'];

>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
<<<<<<< HEAD
=======

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

>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
}
