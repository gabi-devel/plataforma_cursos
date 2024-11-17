<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoExamen extends Model
{
    use HasFactory;

    protected $table = 'alumnos_examenes';

    protected $fillable = ['examen_id', 'user_id', 'resultado'];
}
