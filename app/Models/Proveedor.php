<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    // proveddor 1 a N productos
    public function producto(){
        return $this->hasMany(Producto::class);

    }
}
