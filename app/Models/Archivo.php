<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Archivo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'archivo';
    public function documentos()
    {
        return $this->hasMany(documento::class, 'archivo_id', 'id');
    }
}
