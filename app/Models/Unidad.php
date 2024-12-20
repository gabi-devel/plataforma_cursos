<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'curso_id',
        'orden',
        'titulo',
        'contenido',
        'video'
    ];
}
