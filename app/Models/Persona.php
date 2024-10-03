<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps
    protected $table = 'persona';
    protected $primaryKey = 'dni'; // Especifica que la clave primaria es 'dni'

}
