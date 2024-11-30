<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'habilitado'
    ];
    /* public $timestamps = false; */

    public function usuarios() {
        return $this->belongsToMany(User::class, 'usuarios_cursos')
                    ->withPivot('unidad_leida')
                    ->withTimestamps();
    }

    public function unidades() {
        return $this->hasMany(Unidad::class, 'curso_id');
    }
}
