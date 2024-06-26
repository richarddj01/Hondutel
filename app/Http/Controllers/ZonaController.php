<?php

namespace App\Http\Controllers;

use App\Models\zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar Zonas')->only('index');
        $this->middleware('can:Crear Zonas')->only('create', 'store');
        $this->middleware('can:Upd Zonas')->only('edit', 'update');
        $this->middleware('can:Ver Zona')->only('show');
        $this->middleware('can:Del Zonas')->only('destroy');
    }

    public function index(Request $request)
    {
        $query = zona::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($query) use ($search) {
                $query->where('descripcion', 'like', '%' . $search . '%')
                    ->orWhere('nombre_corto', 'like', '%' . $search . '%');
            });
        }

        //$zonas = $query->get();
        $zonas = $query->paginate(10);

        return view('zonas.index', compact('zonas'));
    }

    public function create()
    {
        return view('zonas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'nombre_corto' => 'required',
        ]);

        zona::create($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona creada exitosamente.');
    }

    public function show(Zona $zona)
    {
        return view('zonas.show', compact('zona'));
    }

    public function edit(Zona $zona)
    {
        return view('zonas.edit', compact('zona'));
    }

    public function update(Request $request, Zona $zona)
    {
        $request->validate([
            'descripcion' => 'required',
            'nombre_corto' => 'required',
        ]);

        $zona->update($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona actualizada exitosamente.');
    }
    public function destroy(Zona $zona)
    {
        $zona->delete();

        return redirect()->route('zonas.index')
            ->with('success', 'Zona eliminada exitosamente.');
    }
}
