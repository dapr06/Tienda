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

    public function show(Proveedores $proveedores)
    {
        return view('proveedores/show', compact('proveedores'));
    }

    public function edit(Proveedores $proveedores)
    {
        return view('proveedores/edit', compact('proveedores'));
    }

    public function update(Request $request, Proveedores $proveedores)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'direccion' => 'required',
        ]);

        $proveedores->nombre = $request->nombre;
        $proveedores->correo_electronico = $request->correo_electronico;
        $proveedores->direccion = $request->direccion;
        $proveedores->save();

        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedores $proveedores)
    {
        $proveedores->delete();
        return redirect()->route('proveedores.index');
    }
}
