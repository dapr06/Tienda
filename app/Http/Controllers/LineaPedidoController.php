<?php

namespace App\Http\Controllers;

use App\Models\lineaPedidos;
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



        $lineaPedido = lineaPedidos::all();



        $productos = Producto::orderBy('nombre')->get();
        return view('carrito/index', compact('lineaPedido','productos'));
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
        $stock= $request->input('stock');
        // Busca un pedido activo para el usuario actual o crea uno nuevo
        $pedido = Pedido::where('user_id', auth::id())
            ->where('estado', 'activo')
            ->firstOrCreate([
                'user_id' => auth::id(),
                'estado' => 'activo',
            ]);

        $lineaPedido = lineaPedidos::where('pedido_id',$pedido->id)
            ->where ('producto_id',$product_id)
            ->first();

        $producto = Producto::find($product_id);

        if($producto && $producto->stock >= $cant){
            $producto->stock -= $cant;
            $producto->save();


            if ($lineaPedido) {
                $lineaPedido->cantidad += $cant;
                $lineaPedido->save();
            } else {
                $lineaPedido = new lineaPedidos();
                $lineaPedido->producto_id = $product_id;
                $lineaPedido->cantidad = $cant;

                $lineaPedido->pedido_id = $pedido->id;
                $lineaPedido->save();
            }

            return redirect()->route('lineaPedido.index', compact('lineaPedido'));
        }else {
            return back()->with('error', 'No hay suficiente stock para este producto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lineaPedidos  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function show(lineaPedidos $lineaPedido)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lineaPedidos  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // editar cantidad de producto
        $lineaPedido = lineaPedidos::findOrFail($id);
        return view('carrito/edit', compact('lineaPedido'));
    }


    /**
     * Update the specified resource in storage.

     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lineaPedidos  $linea_pedido
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // editar la cantidad del producto en el carrito
        $lineaPedido = lineaPedidos::findOrFail($id);
        $producto = Producto::findOrFail($lineaPedido->producto_id);

        //Restar la cantidad antigua del stock

        $producto->stock += $lineaPedido->cantidad;

        //Actualizar la cntidad en la linea de pedido

        $lineaPedido->cantidad = $request->input('cantidad');
        $lineaPedido->save();

        //Restar la nueva cantidad del stock

        $producto->stock -=$lineaPedido->cantidad;
        $producto->save();

        return redirect()->route('lineaPedido.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lineaPedidos  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Este código elimina una linea_pedido y redirige al usuario a la página de índice de lineas_pedidos con un mensaje de éxito.
        $lineaPedido = lineaPedidos::findOrFail($id);
        // Almacena la información sobre la línea de pedido eliminada en una variable de sesión
        session(['deletedLineaPedido' => $lineaPedido]);
        // Delete the linea_pedido
        $lineaPedido->delete();



        return redirect()->route('lineaPedido.index')
            ->with('eliminada','Producto eliminada correctamente');

    }
    // La nueva acción en el controlador que recupere la línea de pedido
    // eliminada de la variable de sesión y la guarde de nuevo en la base de
    // datos
    public function recover(Request $request)
    {
        // Recupera la línea de pedido eliminada de la variable de sesión
        $lineaPedido = session('deletedLineaPedido');

        // Aquí debes guardar de nuevo la línea de pedido en la base de datos

        $lineaPedido->save();

        // Redirige al usuario a la página de índice de lineas_pedidos con un mensaje de éxito
        return redirect()->route('lineaPedido.index')
            ->with('eliminada', 'Producto recuperada correctamente');
    }

}
