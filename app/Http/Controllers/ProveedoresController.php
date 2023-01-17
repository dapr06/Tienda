<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{

    public function index()
    {
        $proveedores = Proveedores::orderBy('nombre')->get();
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

        $proveedores = new Proveedores();
        $proveedores->nombre = $request->nombre;
        $proveedores->correo_electronico = $request->correo_electronico;
        $proveedores->direccion = $request->direccion;

        $proveedores->save();

        return redirect()->route('proveedores.index');
    }

    public function show(Proveedores $proveedor)
    {
        return view('proveedores/show', compact('proveedor'));
    }

    public function edit(Proveedores $proveedor)
    {
        return view('proveedores/edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedores $proveedor)
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

    public function destroy(Proveedores $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
