<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('proveedores/index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'direccion' => 'required',
        ]);

        $proveedores = new Proveedor();
        $proveedores->nombre = $request->nombre;
        $proveedores->correo_electronico = $request->correo_electronico;
        $proveedores->direccion = $request->direccion;
        $proveedores->save();
        return redirect()->route('proveedores.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores/show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores/edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'direccion' => 'required',
        ]);

        $proveedor->nombre = $request->nombre;
        $proveedor->correo_electronico = $request->correo_electronico;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
