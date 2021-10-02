<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_linea',
        'descripcion',
        'sublinea_id'
    ];
    public function datos_productos()
    {
        return $this->hasMany(Datos_Producto::class,'lineas_id');
    }
}
