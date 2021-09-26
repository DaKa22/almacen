<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_Producto extends Model
{
    use HasFactory;
    protected $table= 'datos_productos';
    protected $fillable = [
        'codigo_producto',
        'descripcion',
        'costo_ultimo',
        'stock',
        'lineas_id',
        'sublineas_id'
    ];
}
