<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; // Desactiva los timestamps
    protected $table = 'permiso';

}
