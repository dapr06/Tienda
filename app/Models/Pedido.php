<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    // muchos pedidos a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // un pedido puede tener varias linea_pedido
    public function linea_pedido()
    {
        return $this->hasMany(linea_pedido::class);
    }
    protected $fillable = [
        'user_id',
    ];
}
