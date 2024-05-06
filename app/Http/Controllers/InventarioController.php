<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventario;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $inventarios = inventario::all();

        return view('inventarios.index', compact('inventarios'));
    }
    public function show(Inventario $inventario)
    {
        $producto = inventario::get()->first();

        return view('inventarios.show', compact('producto'));
    }
    public function edit(Inventario $inventario)
    {
        $producto = $inventario;
        return view('inventarios.edit', compact('producto'));
    }
    public function update(Request $request,Inventario $inventario)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }
}
