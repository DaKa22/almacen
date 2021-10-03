<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos_Movimiento extends Model
{
    use HasFactory;
    protected $table='articulos_movimientos';
    protected $fillable = [
        'cantidad',
        'valor',
        'datos_productos_id',
        'movimientos_id'
    ];
    public function datos_productos()
    {
        return $this->belongsTo(Datos_Producto::class);
    }
    public function movimientos()
    {
        return $this->belongsTo(Movimiento::class);
    }
}
