<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDato extends Model
{
    use HasFactory;

    protected $table = 'users_datos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        /* 'nombre', 'apellido', 'cargo' */
        'declaracion_jurada',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
