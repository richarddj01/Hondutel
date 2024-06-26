<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Servicios')->only('index');
        $this->middleware('can:Crear Servicios')->only('create', 'store');
        $this->middleware('can:Upd Servicios')->only('edit', 'update');
        $this->middleware('can:Ver Servicio')->only('show');
    }

    public function index(Request $request)
    {
        $query = servicio::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('descripcion', 'like', '%' . $search . '%');
        }

        $servicios = $query->paginate(10);

        return view('servicio.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        servicio::create($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Registro exitoso.');
    }

    public function show(servicio $servicio)
    {
        return view('servicio.show', compact('servicio'));
    }

    public function edit(servicio $servicio)
    {
        return view('servicio.edit', compact('servicio'));
    }

    public function update(Request $request, servicio $servicio)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado exitosamente.');
    }
}
