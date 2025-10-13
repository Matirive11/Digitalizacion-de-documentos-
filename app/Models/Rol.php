<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps
    protected $fillable = ['nombre', 'descripcion']; // Asegúrate de que estos campos estén en la tabla de roles

    protected $table = 'rol';
}

