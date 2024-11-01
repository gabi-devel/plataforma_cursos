<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Usuario as Authenticatable;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'usuario',
        'email',
        'password'
    ];
}