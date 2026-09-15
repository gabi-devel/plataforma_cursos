<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';
    protected $fillable = ['user_id', 'especialidad'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'profesor_id');
    }
}
