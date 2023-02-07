<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineaPedidos extends Model
{
    use HasFactory;
    // muchas lineas de pedido a muchos productos
    public function producto()
    {
        return $this->belongsToMany(Producto::class);
    }
    // muchas lineas_pedido a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

}
