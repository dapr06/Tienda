<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::orderBy('nombre')->get();
        return view('productos/index', compact('productos'));
    }

    public function create()
    {
        return view('productos/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        $producto = new Productos();
        $producto->id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function show(Productos $producto)
    {
        return view('productos/show', compact('producto'));
    }

    public function edit(Productos $producto)
    {
        return view('productos/edit', compact('producto'));
    }

    public function update(Request $request, Productos $producto)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->route('categorias.index');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
