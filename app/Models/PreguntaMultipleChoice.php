<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaMultipleChoice extends Model
{
    use HasFactory;
    
    protected $table = 'preguntas_multiple_choice';

    public function opcionesMultipleChoice()
    {
        return $this->hasMany(OpcionMultipleChoice::class, 'pregunta_id');
    }
}
