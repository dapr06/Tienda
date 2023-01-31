<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // muchos productos a un proveedor
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    // muchos productos a muchos linea_pedido
    public function linea_pedido()
    {
        return $this->belongsToMany(linea_pedido::class);
    }
}
