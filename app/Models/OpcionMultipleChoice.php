<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionMultipleChoice extends Model
{
    use HasFactory;

    protected $table = 'opciones_multiple_choice';

    public function pregunta()
    {
        return $this->belongsTo(PreguntaMultipleChoice::class, 'pregunta_id');
    }
}
