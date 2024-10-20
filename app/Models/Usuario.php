<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'usuarios';

    protected $fillable = [
        'persona_dni', 'correo_electronico', 'contrasenia', 'estado',
    ];

    public $timestamps = true;

    protected $primaryKey = 'id';
}
