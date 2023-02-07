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
    public function edit($id)
    {
        // editar cantidad de producto
        $linea_pedido = linea_pedido::findOrFail($id);
        return view('carrito/edit', compact('linea_pedido'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // editar la cantidad del producto en el carrito
        $linea_pedido = linea_pedido::findOrFail($id);
        $linea_pedido->cantidad = $request->input('cantidad');
        $linea_pedido->save();

        return redirect()->route('lineas_pedidos.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\linea_pedido  $linea_pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Este código elimina una linea_pedido y redirige al usuario a la
        // página de índice de lineas_pedidos con un mensaje de éxito.
        $linea_pedido = linea_pedido::findOrFail($id);
        // Almacena la información sobre la línea de pedido eliminada en una
        // variable de sesión
        session(['deletedLineaPedido' => $linea_pedido]);
        // Delete the linea_pedido
        $linea_pedido->delete();



        return redirect()->route('lineas_pedidos.index')
            ->with('eliminada','Linea pedido eliminada correctamente');

    }
    // La nueva acción en el controlador que recupere la línea de pedido
    // eliminada de la variable de sesión y la guarde de nuevo en la base de
    // datos
    public function recover(Request $request)
    {
        // Recupera la línea de pedido eliminada de la variable de sesión
        $linea_pedido = session('deletedLineaPedido');

        // Aquí debes guardar de nuevo la línea de pedido en la base de datos

        $linea_pedido->save();

        // Redirige al usuario a la página de índice de lineas_pedidos con un mensaje de éxito
        return redirect()->route('lineas_pedidos.index')
            ->with('eliminada', 'Línea de pedido recuperada correctamente');
    }

}
