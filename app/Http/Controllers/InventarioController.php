<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventario;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $query = inventario::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($query) use ($search) {
                $query->where('descripcion', 'like', '%'.$search.'%');
            });
        }

        $inventarios = $query->paginate(10);

        return view('inventarios.index', compact('inventarios'));
    }
    public function create()
    {
        return view('inventarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'cantidad' => 'required',
        ]);

        inventario::create($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Producto registrado exitosamente.');
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
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventarios.index')
            ->with('success', 'Producto eliminada exitosamente.');
    }
}
