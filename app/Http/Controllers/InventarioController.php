<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventario;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Inventario')->only('index');
        $this->middleware('can:Crear Inventario')->only('create', 'store');
        $this->middleware('can:Upd Inventario')->only('edit', 'update');
        $this->middleware('can:Del Inventario')->only('destroy');
        $this->middleware('can:Ver Inventario')->only('show');
    }

    public function index(Request $request)
    {
        $query = inventario::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($query) use ($search) {
                $query->where('descripcion', 'like', '%' . $search . '%');
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
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:0', // Asegura que la cantidad ingresada sea un número entero positivo
        ]);

        // Busca el producto en el inventario por su ID
        $inventario = Inventario::findOrFail(1);

        // Obtiene la cantidad actual del producto en el inventario
        $cantidad_actual = $inventario->cantidad;

        // Obtiene la cantidad adicional ingresada por el usuario
        $cantidad_adicional = $request->cantidad;

        // Suma la cantidad actual con la cantidad adicional
        $nueva_cantidad = $cantidad_actual + $cantidad_adicional;

        // Actualiza la cantidad del producto en el inventario con la nueva cantidad calculada
        $inventario->update(['cantidad' => $nueva_cantidad]);

        return redirect()->route('inventarios.index')->with('success', 'Cantidad actualizada exitosamente.');

    }
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventarios.index')
            ->with('success', 'Producto eliminada exitosamente.');
    }
}
