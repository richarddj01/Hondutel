<?php

namespace App\Http\Controllers;

use App\Models\tipo_servicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    public function index(Request $request)
    {
        $query = tipo_servicio::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('descripcion', 'like', '%'.$search.'%');
        }

        $tipo_servicio = $query->get();

        return view('tipo_servicio.index', compact('tipo_servicio'));
    }

    public function create()
    {
        return view('tipo_servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        tipo_servicio::create($request->all());

        return redirect()->route('tipo_servicio.index')
            ->with('success', 'Registro exitoso.');
    }

    public function show(tipo_servicio $tipo_servicio)
    {
        return view('tipo_servicio.show', compact('tipo_servicio'));
    }

    public function edit(tipo_servicio $tipo_servicio)
    {
        return view('tipo_servicio.edit', compact('tipo_servicio'));
    }

    public function update(Request $request, tipo_servicio $tipo_servicio)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $tipo_servicio->update($request->all());

        return redirect()->route('tipo_servicio.index')
            ->with('success', 'Zona actualizada exitosamente.');
    }

    public function destroy(tipo_servicio $tipo_servicio)
    {
        $tipo_servicio->delete();

        return redirect()->route('tipo_servicio.index')
            ->with('success', 'Zona eliminada exitosamente.');
    }
}
