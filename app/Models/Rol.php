<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps
<<<<<<< HEAD

    protected $table = 'rol';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps
=======
    protected $fillable = ['nombre', 'descripcion']; // Asegúrate de que estos campos estén en la tabla de roles
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)

    protected $table = 'rol';
}
