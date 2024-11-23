<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCurso extends Model
{
    use HasFactory;

    protected $table = 'usuarios_cursos';

    protected $fillable = ['user_id', 'curso_id', 'unidad_leida'];

    public $timestamps = true; // Si la tabla tiene columnas created_at y updated_at
}
