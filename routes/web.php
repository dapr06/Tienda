<?php

use App\Http\Controllers\ProfileController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

//$user=Auth::user();
$user=Auth::user();

if($user->esAdmin()){
    echo "eres admin";
}else{
    echo "eres cliente";
}

    return view('auth/login');
});

Route::get('/productos', function () {


    $productos = Producto::orderBy('nombre')->get();

    return view('productos/index', compact('productos'));
})->middleware(['auth', 'verified'])->name('productos/index');


Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('productos',\App\Http\Controllers\ProductoController::class);
    Route::resource('proveedores',\App\Http\Controllers\ProveedorController::class);
    Route::resource('lineaPedido', \App\Http\Controllers\LineaPedidoController::class);
    Route::resource('pedidos',\App\Http\Controllers\PedidoController::class);

    Route::get('/recover', [\App\Http\Controllers\LineaPedidoController::class, 'recover'])->name('lineaPedidos.recover');
});

require __DIR__.'/auth.php';

Route::view('contacto','contacto.blade.php')->name('contacto');



