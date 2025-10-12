<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArchivo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps

<<<<<<< HEAD
    protected $table = 'Tipo_archivo';
=======
    protected $table = 'tipo_archivo';
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
}
