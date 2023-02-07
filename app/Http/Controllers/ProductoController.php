<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('productos/index', compact('productos'));
    }

    public function create()
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('productos/create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'proveedor_id' => 'required',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos/show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('productos/edit', compact('producto' , 'proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'proveedor_id' => 'required',
        ]);

        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
