<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_movimiento',
        'cedula_movimiento',
        'nombre_movimiento',
        'fecha_movimiento',
        'valor_total_movimiento'
    ];
}
