<?php

namespace App\Http\Controllers;

use App\Models\linea_pedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LineaPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $linea_pedido = linea_pedido::all();




        return view('carrito/index', compact('linea_pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos = Producto::all();

        return view('carrito/create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // agregar producto
        $product_id = $request->input('product_id');
        $cant = $request->input('cant');
        // Busca un pedido activo para el usuario actual o crea uno nuevo
        $pedido = Pedido::where('user_id', auth::id())
            ->where('estado', 'activo')
            ->firstOrCreate([
                'user_id' => auth::id(),
                'estado' => 'activo',
            ]);


        // Agrega una nueva linea_pedido para el producto
       // $linea_pedido = new linea_pedido();
        //$linea_pedido->producto_id = $product_id;
        //$linea_pedido->cantidad = $cant; // por defecto
        //$linea_pedido->pedido_id = $pedido->id;
        //$linea_pedido->save();
        // Redirige al usuario de vuelta a la página anterior
        //return back();
        $linea_pedido = linea_pedido::where('pedido_id',$pedido->id)
                ->where ('producto_id',$product_id)
                ->first();

        if ($linea_pedido) {
    $linea_pedido->cantidad += $cant;
    $linea_pedido->save();
} else {
    $linea_pedido = new linea_pedido();
    $linea_pedido->producto_id = $product_id;
    $linea_pedido->cantidad = $cant;
    $linea_pedido->pedido_id = $pedido->id;
    $linea_pedido->save();
}

        return redirect()->route('lineas_pedidos.index', compact('linea_pedido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function show(linea_pedido $linea_pedido)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(linea_pedido $linea_pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, linea_pedido $linea_pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(linea_pedido $linea_pedido)
    {
        //
    }
}
